# Local Feedback Moderation Model

This folder contains a self-trained machine-learning moderation pipeline for feedback comments and feedback responses.

The model is local-only:
- no external moderation API
- French + English dataset
- `TF-IDF` character n-grams + `LogisticRegression`

## Input files

The training script expects these files by default in the `web/` folder:
- `badwordsfrench`
- `french dic`

They are used as seed data:
- `badwordsfrench` expands the toxic class
- `french dic` expands the safe French vocabulary used in clean examples

## Install dependencies

```powershell
python -m venv .venv
.venv\Scripts\activate
pip install -r ml/requirements.txt
```

If your machine uses the Windows launcher instead of `python`, use:

```powershell
py -3 -m venv .venv
.venv\Scripts\activate
pip install -r ml/requirements.txt
```

## Train the model

```powershell
python ml/train_feedback_toxicity_model.py
```

This generates:
- `var/ml/feedback_moderation_dataset.csv`
- `var/ml/feedback_toxicity_bundle.joblib`

## Test one prediction

```powershell
"ce vendeur est un con" | python ml/predict_feedback_toxicity.py
```

## Symfony integration

`App\Service\FeedbackModerationService` first tries to use the trained Python model.

If the model bundle or Python runtime is missing, it falls back to `ProfanityFilterService` so the feedback flow still works while setup is incomplete.

Only feedback-related moderation uses this new ML path. Messaging still uses the original word-list filter.
