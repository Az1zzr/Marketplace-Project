from __future__ import annotations

import argparse
import json
import sys
from pathlib import Path

try:
    import joblib
except ImportError as exc:  # pragma: no cover - runtime dependency check
    raise SystemExit(
        'Missing Python dependencies. Install them with: pip install -r ml/requirements.txt'
    ) from exc


WEB_ROOT = Path(__file__).resolve().parents[1]
DEFAULT_MODEL_PATH = WEB_ROOT / 'var' / 'ml' / 'feedback_toxicity_bundle.joblib'


def parse_args() -> argparse.Namespace:
    parser = argparse.ArgumentParser(description='Predict whether feedback text is toxic using the local model.')
    parser.add_argument('--model', type=Path, default=DEFAULT_MODEL_PATH)
    parser.add_argument('--text', default=None)
    return parser.parse_args()


def main() -> int:
    args = parse_args()
    text = args.text if args.text is not None else sys.stdin.read()
    text = text.strip()

    if not args.model.is_file():
        raise SystemExit(f'Model file not found: {args.model}')

    bundle = joblib.load(args.model)
    model = bundle['model']
    threshold = float(bundle.get('threshold', 0.60))
    probability = float(model.predict_proba([text])[0][1]) if text else 0.0

    print(json.dumps({
        'flagged': probability >= threshold,
        'toxicity_probability': round(probability, 6),
        'threshold': threshold,
        'source': 'self_trained_feedback_model',
        'languages': bundle.get('languages', ['fr', 'en']),
        'trained_at': bundle.get('trained_at'),
    }, ensure_ascii=False))
    return 0


if __name__ == '__main__':
    sys.exit(main())
