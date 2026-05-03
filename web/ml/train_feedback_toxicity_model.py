from __future__ import annotations

import argparse
import csv
import json
import random
import sys
import unicodedata
from collections import Counter
from datetime import datetime, timezone
from pathlib import Path

try:
    import joblib
    from sklearn.feature_extraction.text import TfidfVectorizer
    from sklearn.linear_model import LogisticRegression
    from sklearn.metrics import accuracy_score, precision_recall_fscore_support
    from sklearn.model_selection import train_test_split
    from sklearn.pipeline import Pipeline
except ImportError as exc:  # pragma: no cover - runtime dependency check
    raise SystemExit(
        'Missing Python dependencies. Install them with: pip install -r ml/requirements.txt'
    ) from exc


RNG = random.Random(42)
DEFAULT_THRESHOLD = 0.60
WORKSPACE_ROOT = Path(__file__).resolve().parents[2]
WEB_ROOT = Path(__file__).resolve().parents[1]
DEFAULT_BAD_WORDS = WEB_ROOT / 'badwordsfrench'
DEFAULT_DICTIONARY = WEB_ROOT / 'french dic'
DEFAULT_DATASET_OUTPUT = WEB_ROOT / 'var' / 'ml' / 'feedback_moderation_dataset.csv'
DEFAULT_MODEL_OUTPUT = WEB_ROOT / 'var' / 'ml' / 'feedback_toxicity_bundle.joblib'

ENGLISH_BAD_WORDS = [
    'fuck', 'fucking', 'shit', 'bitch', 'asshole', 'bastard', 'idiot', 'moron',
    'trash', 'garbage', 'scam', 'useless', 'loser', 'dumb', 'stupid', 'jerk',
    'clown', 'nonsense', 'crap', 'pathetic',
]

FRENCH_BAD_WORDS = [
    'merde', 'putain', 'connard', 'salope', 'encule', 'enculé', 'batard', 'bâtard',
    'con', 'connasse', 'pute', 'chier', 'foutre', 'baiser', 'niquer', 'enfoire',
    'enfoiré', 'enflure', 'trou du cul', 'va te faire', 'ta gueule', 'imbecile',
    'imbécile', 'abruti', 'andouille',
]

FR_SUBJECTS = [
    'produit', 'vendeur', 'livreur', 'commande', 'service client', 'emballage', 'support', 'article',
]

EN_SUBJECTS = [
    'product', 'seller', 'driver', 'order', 'customer service', 'packaging', 'support', 'item',
]

FR_POSITIVE_PHRASES = [
    'est conforme a la description',
    'est arrive rapidement',
    'fonctionne tres bien',
    'est de bonne qualite',
    'a ete traite avec professionnalisme',
    'repond parfaitement a mes attentes',
    'a ete bien emballe',
    'etait poli et respectueux',
    'a ete simple a utiliser',
    'a un bon rapport qualite prix',
]

FR_RESPECTFUL_COMPLAINTS = [
    'est arrive en retard mais le contact est reste correct',
    'etait plus petit que prevu mais le retour a ete facile',
    'n etait pas conforme a mes attentes mais la reponse a ete polie',
    'avait un emballage abime mais l article etait intact',
    'a pris du temps mais le suivi etait clair',
    'a un prix trop eleve pour la qualite proposee',
    'presente quelques defauts mais reste utilisable',
    'n a pas resolu mon besoin mais le vendeur est reste professionnel',
    'a ete annule puis rembourse correctement',
    'est moyen sans etre offensant ni trompeur',
]

EN_POSITIVE_PHRASES = [
    'matches the description',
    'arrived quickly',
    'works very well',
    'has good quality',
    'was handled professionally',
    'meets my expectations',
    'was packaged carefully',
    'was polite and respectful',
    'was easy to use',
    'offers good value for money',
]

EN_RESPECTFUL_COMPLAINTS = [
    'arrived late but the communication stayed polite',
    'was smaller than expected but the return was easy',
    'did not match my expectations but support answered clearly',
    'had damaged packaging but the item still worked',
    'took too long yet the tracking updates were clear',
    'costs too much for the quality provided',
    'has a few defects but remains usable',
    'did not solve my need but the seller stayed professional',
    'was cancelled and refunded correctly',
    'feels average without being offensive or dishonest',
]

FR_TOXIC_TEMPLATES = [
    'ce {target} est {word}',
    'franchement {word}',
    '{target} {word}',
    'service de {word}',
    'quelle equipe de {word}',
    'votre reponse est {word}',
]

EN_TOXIC_TEMPLATES = [
    'this {target} is {word}',
    'what a {word} {target}',
    'your answer is {word}',
    '{word} service',
    'that {target} sounds {word}',
    'such a {word} experience',
]


def parse_args() -> argparse.Namespace:
    parser = argparse.ArgumentParser(description='Train a local French/English feedback toxicity model.')
    parser.add_argument('--bad-words', type=Path, default=DEFAULT_BAD_WORDS)
    parser.add_argument('--dictionary', type=Path, default=DEFAULT_DICTIONARY)
    parser.add_argument('--dataset-output', type=Path, default=DEFAULT_DATASET_OUTPUT)
    parser.add_argument('--model-output', type=Path, default=DEFAULT_MODEL_OUTPUT)
    parser.add_argument('--threshold', type=float, default=DEFAULT_THRESHOLD)
    return parser.parse_args()


def normalize_ascii(value: str) -> str:
    normalized = unicodedata.normalize('NFKD', value)
    return ''.join(character for character in normalized if not unicodedata.combining(character))


def read_lines(path: Path) -> list[str]:
    if not path.is_file():
        raise SystemExit(f'Input file not found: {path}')

    values = []
    with path.open('r', encoding='utf-8', errors='ignore') as handle:
        for raw_line in handle:
            line = raw_line.strip()
            if not line:
                continue
            values.append(line)

    return values


def build_safe_dictionary_words(path: Path, blocked_words: set[str]) -> list[str]:
    safe_words = []
    for word in read_lines(path):
        ascii_word = normalize_ascii(word).lower().replace('-', ' ')
        if ' ' in ascii_word:
            continue
        if not ascii_word.isalpha() or not 4 <= len(ascii_word) <= 10:
            continue
        if ascii_word in blocked_words:
            continue
        safe_words.append(ascii_word)

    unique_words = list(dict.fromkeys(safe_words))
    RNG.shuffle(unique_words)
    return unique_words[:600]


def build_toxic_examples(fr_words: list[str], en_words: list[str]) -> list[dict[str, object]]:
    examples = []

    for index, word in enumerate(fr_words):
        template = FR_TOXIC_TEMPLATES[index % len(FR_TOXIC_TEMPLATES)]
        target = FR_SUBJECTS[index % len(FR_SUBJECTS)]
        examples.append({
            'text': template.format(target=target, word=word),
            'label': 1,
            'language': 'fr',
            'source': 'french_bad_words',
        })

    for index, word in enumerate(en_words):
        template = EN_TOXIC_TEMPLATES[index % len(EN_TOXIC_TEMPLATES)]
        target = EN_SUBJECTS[index % len(EN_SUBJECTS)]
        examples.append({
            'text': template.format(target=target, word=word),
            'label': 1,
            'language': 'en',
            'source': 'english_bad_words',
        })

    return examples


def build_clean_examples(safe_words: list[str]) -> list[dict[str, object]]:
    examples = []

    for subject in FR_SUBJECTS:
        for phrase in FR_POSITIVE_PHRASES:
            examples.append({
                'text': f'Le {subject} {phrase}.',
                'label': 0,
                'language': 'fr',
                'source': 'french_positive_template',
            })

        for phrase in FR_RESPECTFUL_COMPLAINTS:
            examples.append({
                'text': f'Le {subject} {phrase}.',
                'label': 0,
                'language': 'fr',
                'source': 'french_respectful_complaint',
            })

    for subject in EN_SUBJECTS:
        for phrase in EN_POSITIVE_PHRASES:
            examples.append({
                'text': f'The {subject} {phrase}.',
                'label': 0,
                'language': 'en',
                'source': 'english_positive_template',
            })

        for phrase in EN_RESPECTFUL_COMPLAINTS:
            examples.append({
                'text': f'The {subject} {phrase}.',
                'label': 0,
                'language': 'en',
                'source': 'english_respectful_complaint',
            })

    for index in range(min(300, len(safe_words) // 2)):
        first = safe_words[index]
        second = safe_words[-(index + 1)]
        examples.append({
            'text': f'Commentaire calme et respectueux avec les mots {first} et {second}.',
            'label': 0,
            'language': 'fr',
            'source': 'french_dictionary_safe_words',
        })

    return examples


def deduplicate_examples(examples: list[dict[str, object]]) -> list[dict[str, object]]:
    seen = set()
    result = []

    for example in examples:
        text = str(example['text']).strip()
        key = (text.lower(), int(example['label']))
        if key in seen:
            continue
        seen.add(key)
        result.append({**example, 'text': text})

    RNG.shuffle(result)
    return result


def save_dataset(path: Path, examples: list[dict[str, object]]) -> None:
    path.parent.mkdir(parents=True, exist_ok=True)
    with path.open('w', encoding='utf-8', newline='') as handle:
        writer = csv.DictWriter(handle, fieldnames=['text', 'label', 'language', 'source'])
        writer.writeheader()
        writer.writerows(examples)


def train_model(examples: list[dict[str, object]], threshold: float) -> tuple[Pipeline, dict[str, object]]:
    texts = [str(example['text']) for example in examples]
    labels = [int(example['label']) for example in examples]

    x_train, x_test, y_train, y_test = train_test_split(
        texts,
        labels,
        test_size=0.2,
        random_state=42,
        stratify=labels,
    )

    model = Pipeline([
        ('vectorizer', TfidfVectorizer(
            analyzer='char_wb',
            ngram_range=(3, 5),
            lowercase=True,
            min_df=2,
            strip_accents='unicode',
        )),
        ('classifier', LogisticRegression(
            max_iter=2000,
            class_weight='balanced',
            C=4.0,
        )),
    ])
    model.fit(x_train, y_train)

    probabilities = model.predict_proba(x_test)[:, 1]
    predictions = [1 if probability >= threshold else 0 for probability in probabilities]
    precision, recall, f1_score, _ = precision_recall_fscore_support(
        y_test,
        predictions,
        average='binary',
        zero_division=0,
    )

    metrics = {
        'accuracy': round(float(accuracy_score(y_test, predictions)), 4),
        'precision': round(float(precision), 4),
        'recall': round(float(recall), 4),
        'f1': round(float(f1_score), 4),
        'threshold': threshold,
        'train_size': len(x_train),
        'test_size': len(x_test),
    }

    return model, metrics


def main() -> int:
    args = parse_args()

    french_bad_words = list(dict.fromkeys(read_lines(args.bad_words) + FRENCH_BAD_WORDS))
    english_bad_words = list(dict.fromkeys(word.lower() for word in ENGLISH_BAD_WORDS))
    blocked_words = {normalize_ascii(word).lower() for word in french_bad_words}
    blocked_words.update(english_bad_words)
    safe_dictionary_words = build_safe_dictionary_words(args.dictionary, blocked_words)

    dataset = deduplicate_examples(
        build_toxic_examples(french_bad_words, english_bad_words)
        + build_clean_examples(safe_dictionary_words)
    )
    save_dataset(args.dataset_output, dataset)

    model, metrics = train_model(dataset, threshold=args.threshold)
    args.model_output.parent.mkdir(parents=True, exist_ok=True)
    joblib.dump({
        'model': model,
        'threshold': args.threshold,
        'metrics': metrics,
        'languages': ['fr', 'en'],
        'trained_at': datetime.now(timezone.utc).isoformat(),
        'dataset_path': str(args.dataset_output),
        'dataset_size': len(dataset),
        'class_balance': dict(Counter(int(row['label']) for row in dataset)),
    }, args.model_output)

    print(json.dumps({
        'dataset_output': str(args.dataset_output),
        'model_output': str(args.model_output),
        'dataset_size': len(dataset),
        'metrics': metrics,
    }, ensure_ascii=False, indent=2))
    return 0


if __name__ == '__main__':
    sys.exit(main())
