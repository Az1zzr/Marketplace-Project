<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* feedback/export_pdf.html.twig */
class __TwigTemplate_9495e970b7296e07123cc78d6f3bc2c5 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "feedback/export_pdf.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "feedback/export_pdf.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <title>Export Feedback PDF</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            color: #0f172a;
            font-size: 12px;
            margin: 0;
        }

        .page {
            padding: 28px 32px 36px;
        }

        .header {
            border-radius: 18px;
            padding: 22px 24px;
            background: linear-gradient(135deg, #0f172a, #1d4ed8);
            color: #ffffff;
            margin-bottom: 18px;
        }

        .header h1 {
            margin: 0 0 8px;
            font-size: 28px;
        }

        .header p {
            margin: 0;
            font-size: 12px;
            color: rgba(255, 255, 255, 0.88);
        }

        .meta {
            margin-top: 14px;
            font-size: 11px;
            color: rgba(255, 255, 255, 0.8);
        }

        .summary {
            margin-bottom: 18px;
        }

        .summary-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 10px 0;
            margin: 0 -10px;
        }

        .summary-card {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 14px;
            vertical-align: top;
        }

        .summary-label {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #64748b;
            margin-bottom: 8px;
        }

        .summary-value {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 6px;
        }

        .summary-note {
            color: #475569;
            font-size: 11px;
        }

        .filters {
            border: 1px dashed #cbd5e1;
            border-radius: 14px;
            padding: 14px 16px;
            margin-bottom: 18px;
            background: #ffffff;
        }

        .filters h2 {
            margin: 0 0 10px;
            font-size: 14px;
        }

        .filter-row {
            margin-bottom: 4px;
            color: #334155;
        }

        .feedback-card {
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 16px 18px;
            margin-bottom: 14px;
            page-break-inside: avoid;
            background: #ffffff;
        }

        .feedback-header {
            margin-bottom: 10px;
        }

        .feedback-title {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 4px;
        }

        .feedback-meta {
            color: #64748b;
            font-size: 11px;
        }

        .badges {
            margin: 10px 0 12px;
        }

        .badge {
            display: inline-block;
            margin: 0 6px 6px 0;
            padding: 5px 9px;
            border-radius: 999px;
            font-size: 10px;
            font-weight: bold;
        }

        .badge-type { background: #dbeafe; color: #1d4ed8; }
        .badge-sentiment-positive { background: #dcfce7; color: #166534; }
        .badge-sentiment-neutral { background: #e2e8f0; color: #334155; }
        .badge-sentiment-negative { background: #fee2e2; color: #991b1b; }
        .badge-topic { background: #ede9fe; color: #6d28d9; }
        .badge-priority-high { background: #fee2e2; color: #991b1b; }
        .badge-priority-medium { background: #fef3c7; color: #92400e; }
        .badge-priority-low { background: #dcfce7; color: #166534; }
        .badge-attention { background: #fce7f3; color: #9d174d; }
        .badge-unanswered { background: #fef3c7; color: #92400e; }

        .comment {
            border-top: 1px solid #f1f5f9;
            padding-top: 12px;
            color: #1e293b;
            line-height: 1.55;
        }

        .footer {
            margin-top: 24px;
            text-align: center;
            color: #94a3b8;
            font-size: 10px;
        }
    </style>
</head>
<body>
    <div class=\"page\">
        <div class=\"header\">
            <h1>Rapport Feedbacks</h1>
            <p>
                ";
        // line 167
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["viewer"]) || array_key_exists("viewer", $context) ? $context["viewer"] : (function () { throw new RuntimeError('Variable "viewer" does not exist.', 167, $this->source); })()), "roleCode", [], "any", false, false, false, 167) == "admin")) {
            // line 168
            yield "                Vue complete de moderation des feedbacks.
                ";
        } else {
            // line 170
            yield "                Feedbacks recus pour vos produits et vos livraisons.
                ";
        }
        // line 172
        yield "            </p>
            <div class=\"meta\">
                Genere le ";
        // line 174
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate((isset($context["generatedAt"]) || array_key_exists("generatedAt", $context) ? $context["generatedAt"] : (function () { throw new RuntimeError('Variable "generatedAt" does not exist.', 174, $this->source); })()), "d/m/Y H:i"), "html", null, true);
        yield " | ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["viewer"]) || array_key_exists("viewer", $context) ? $context["viewer"] : (function () { throw new RuntimeError('Variable "viewer" does not exist.', 174, $this->source); })()), "nomComplet", [], "any", false, false, false, 174), "html", null, true);
        yield "
            </div>
        </div>

        ";
        // line 178
        if ((($tmp = (isset($context["feedbackInsightsSummary"]) || array_key_exists("feedbackInsightsSummary", $context) ? $context["feedbackInsightsSummary"] : (function () { throw new RuntimeError('Variable "feedbackInsightsSummary" does not exist.', 178, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 179
            yield "        <div class=\"summary\">
            <table class=\"summary-table\">
                <tr>
                    <td class=\"summary-card\">
                        <div class=\"summary-label\">Feedbacks urgents</div>
                        <div class=\"summary-value\">";
            // line 184
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedbackInsightsSummary"]) || array_key_exists("feedbackInsightsSummary", $context) ? $context["feedbackInsightsSummary"] : (function () { throw new RuntimeError('Variable "feedbackInsightsSummary" does not exist.', 184, $this->source); })()), "urgentCount", [], "any", false, false, false, 184), "html", null, true);
            yield "</div>
                        <div class=\"summary-note\">Retours critiques a prioriser</div>
                    </td>
                    <td class=\"summary-card\">
                        <div class=\"summary-label\">A traiter</div>
                        <div class=\"summary-value\">";
            // line 189
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedbackInsightsSummary"]) || array_key_exists("feedbackInsightsSummary", $context) ? $context["feedbackInsightsSummary"] : (function () { throw new RuntimeError('Variable "feedbackInsightsSummary" does not exist.', 189, $this->source); })()), "attentionCount", [], "any", false, false, false, 189), "html", null, true);
            yield "</div>
                        <div class=\"summary-note\">Feedbacks qui demandent une action rapide</div>
                    </td>
                    <td class=\"summary-card\">
                        <div class=\"summary-label\">Sans reponse</div>
                        <div class=\"summary-value\">";
            // line 194
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedbackInsightsSummary"]) || array_key_exists("feedbackInsightsSummary", $context) ? $context["feedbackInsightsSummary"] : (function () { throw new RuntimeError('Variable "feedbackInsightsSummary" does not exist.', 194, $this->source); })()), "unansweredCount", [], "any", false, false, false, 194), "html", null, true);
            yield "</div>
                        <div class=\"summary-note\">Aucune reponse ajoutee pour le moment</div>
                    </td>
                    <td class=\"summary-card\">
                        <div class=\"summary-label\">Sujet principal</div>
                        <div class=\"summary-value\" style=\"font-size: 18px;\">";
            // line 199
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedbackInsightsSummary"]) || array_key_exists("feedbackInsightsSummary", $context) ? $context["feedbackInsightsSummary"] : (function () { throw new RuntimeError('Variable "feedbackInsightsSummary" does not exist.', 199, $this->source); })()), "topTopicLabel", [], "any", false, false, false, 199), "html", null, true);
            yield "</div>
                        <div class=\"summary-note\">Theme le plus frequent</div>
                    </td>
                </tr>
            </table>
        </div>
        ";
        }
        // line 206
        yield "
        <div class=\"filters\">
            <h2>Filtres appliques</h2>
            <div class=\"filter-row\"><strong>Recherche:</strong> ";
        // line 209
        yield (((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 209, $this->source); })())) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["search"], "html", null, true)) : ("Aucune"));
        yield "</div>
            <div class=\"filter-row\"><strong>Sentiment:</strong> ";
        // line 210
        yield (((isset($context["sentimentFilter"]) || array_key_exists("sentimentFilter", $context) ? $context["sentimentFilter"] : (function () { throw new RuntimeError('Variable "sentimentFilter" does not exist.', 210, $this->source); })())) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["sentimentFilter"], "html", null, true)) : ("Tous"));
        yield "</div>
            <div class=\"filter-row\"><strong>Note:</strong> ";
        // line 211
        yield (((isset($context["ratingFilter"]) || array_key_exists("ratingFilter", $context) ? $context["ratingFilter"] : (function () { throw new RuntimeError('Variable "ratingFilter" does not exist.', 211, $this->source); })())) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["ratingFilter"], "html", null, true)) : ("Toutes"));
        yield "</div>
            <div class=\"filter-row\"><strong>Sujet:</strong> ";
        // line 212
        yield (((isset($context["topicFilter"]) || array_key_exists("topicFilter", $context) ? $context["topicFilter"] : (function () { throw new RuntimeError('Variable "topicFilter" does not exist.', 212, $this->source); })())) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["topicFilter"], "html", null, true)) : ("Tous"));
        yield "</div>
            <div class=\"filter-row\"><strong>Priorite:</strong> ";
        // line 213
        yield (((isset($context["priorityFilter"]) || array_key_exists("priorityFilter", $context) ? $context["priorityFilter"] : (function () { throw new RuntimeError('Variable "priorityFilter" does not exist.', 213, $this->source); })())) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["priorityFilter"], "html", null, true)) : ("Toutes"));
        yield "</div>
            <div class=\"filter-row\"><strong>Suivi:</strong> ";
        // line 214
        yield (((isset($context["attentionFilter"]) || array_key_exists("attentionFilter", $context) ? $context["attentionFilter"] : (function () { throw new RuntimeError('Variable "attentionFilter" does not exist.', 214, $this->source); })())) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["attentionFilter"], "html", null, true)) : ("Tous"));
        yield "</div>
        </div>

        ";
        // line 217
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["feedbacksWithSentiment"]) || array_key_exists("feedbacksWithSentiment", $context) ? $context["feedbacksWithSentiment"] : (function () { throw new RuntimeError('Variable "feedbacksWithSentiment" does not exist.', 217, $this->source); })()))) {
            // line 218
            yield "        <div class=\"feedback-card\">
            <div class=\"feedback-title\">Aucun feedback a exporter</div>
            <div class=\"feedback-meta\">Aucun element ne correspond aux filtres actuels.</div>
        </div>
        ";
        } else {
            // line 223
            yield "            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["feedbacksWithSentiment"]) || array_key_exists("feedbacksWithSentiment", $context) ? $context["feedbacksWithSentiment"] : (function () { throw new RuntimeError('Variable "feedbacksWithSentiment" does not exist.', 223, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 224
                yield "                ";
                $context["feedback"] = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "feedback", [], "any", false, false, false, 224);
                // line 225
                yield "                ";
                $context["sentiment"] = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "sentiment", [], "any", false, false, false, 225);
                // line 226
                yield "                ";
                $context["insight"] = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "insight", [], "any", false, false, false, 226);
                // line 227
                yield "                <div class=\"feedback-card\">
                    <div class=\"feedback-header\">
                        <div class=\"feedback-title\">";
                // line 229
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 229, $this->source); })()), "displayTitle", [], "any", false, false, false, 229), "html", null, true);
                yield "</div>
                        <div class=\"feedback-meta\">
                            #";
                // line 231
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 231, $this->source); })()), "id", [], "any", false, false, false, 231), "html", null, true);
                yield " | ";
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 231, $this->source); })()), "auteur", [], "any", false, false, false, 231)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 231, $this->source); })()), "auteur", [], "any", false, false, false, 231), "nomComplet", [], "any", false, false, false, 231), "html", null, true)) : ("Utilisateur supprime"));
                yield " | ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 231, $this->source); })()), "dateStatut", [], "any", false, false, false, 231), "d/m/Y H:i"), "html", null, true);
                yield "
                        </div>
                        <div class=\"feedback-meta\" style=\"margin-top: 4px;\">
                            ";
                // line 234
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 234, $this->source); })()), "produit", [], "any", false, false, false, 234)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 235
                    yield "                            Produit: ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 235, $this->source); })()), "produit", [], "any", false, false, false, 235), "nomProduit", [], "any", false, false, false, 235), "html", null, true);
                    yield "
                            ";
                } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source,                 // line 236
(isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 236, $this->source); })()), "livraison", [], "any", false, false, false, 236)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 237
                    yield "                            Livraison: ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 237, $this->source); })()), "livraison", [], "any", false, false, false, 237), "livreur", [], "any", false, false, false, 237), "html", null, true);
                    yield " | Commande #";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 237, $this->source); })()), "livraison", [], "any", false, false, false, 237), "commande", [], "any", false, false, false, 237), "numeroCommande", [], "any", false, false, false, 237), "html", null, true);
                    yield "
                            ";
                }
                // line 239
                yield "                        </div>
                    </div>

                    <div class=\"badges\">
                        <span class=\"badge badge-type\">";
                // line 243
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 243, $this->source); })()), "isDeliveryFeedback", [], "any", false, false, false, 243)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Livraison") : ("Produit"));
                yield "</span>
                        <span class=\"badge ";
                // line 244
                yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["sentiment"]) || array_key_exists("sentiment", $context) ? $context["sentiment"] : (function () { throw new RuntimeError('Variable "sentiment" does not exist.', 244, $this->source); })()), "sentiment", [], "any", false, false, false, 244) == "POSITIF")) ? ("badge-sentiment-positive") : ((((CoreExtension::getAttribute($this->env, $this->source, (isset($context["sentiment"]) || array_key_exists("sentiment", $context) ? $context["sentiment"] : (function () { throw new RuntimeError('Variable "sentiment" does not exist.', 244, $this->source); })()), "sentiment", [], "any", false, false, false, 244) == "NEGATIF")) ? ("badge-sentiment-negative") : ("badge-sentiment-neutral"))));
                yield "\">Sentiment: ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["sentiment"]) || array_key_exists("sentiment", $context) ? $context["sentiment"] : (function () { throw new RuntimeError('Variable "sentiment" does not exist.', 244, $this->source); })()), "sentiment", [], "any", false, false, false, 244), "html", null, true);
                yield "</span>
                        <span class=\"badge badge-topic\">Sujet: ";
                // line 245
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["insight"]) || array_key_exists("insight", $context) ? $context["insight"] : (function () { throw new RuntimeError('Variable "insight" does not exist.', 245, $this->source); })()), "topicLabel", [], "any", false, false, false, 245), "html", null, true);
                yield "</span>
                        <span class=\"badge ";
                // line 246
                yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["insight"]) || array_key_exists("insight", $context) ? $context["insight"] : (function () { throw new RuntimeError('Variable "insight" does not exist.', 246, $this->source); })()), "priority", [], "any", false, false, false, 246) == "high")) ? ("badge-priority-high") : ((((CoreExtension::getAttribute($this->env, $this->source, (isset($context["insight"]) || array_key_exists("insight", $context) ? $context["insight"] : (function () { throw new RuntimeError('Variable "insight" does not exist.', 246, $this->source); })()), "priority", [], "any", false, false, false, 246) == "medium")) ? ("badge-priority-medium") : ("badge-priority-low"))));
                yield "\">Priorite: ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["insight"]) || array_key_exists("insight", $context) ? $context["insight"] : (function () { throw new RuntimeError('Variable "insight" does not exist.', 246, $this->source); })()), "priorityLabel", [], "any", false, false, false, 246), "html", null, true);
                yield "</span>
                        <span class=\"badge badge-type\">Note: ";
                // line 247
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 247, $this->source); })()), "note", [], "any", false, false, false, 247), "html", null, true);
                yield "/5</span>
                        <span class=\"badge badge-type\">Reponses: ";
                // line 248
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["insight"]) || array_key_exists("insight", $context) ? $context["insight"] : (function () { throw new RuntimeError('Variable "insight" does not exist.', 248, $this->source); })()), "responseCount", [], "any", false, false, false, 248), "html", null, true);
                yield "</span>
                        ";
                // line 249
                if ((($tmp =  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 249, $this->source); })()), "recommande", [], "any", false, false, false, 249))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 250
                    yield "                        <span class=\"badge ";
                    yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 250, $this->source); })()), "recommande", [], "any", false, false, false, 250)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("badge-sentiment-positive") : ("badge-sentiment-negative"));
                    yield "\">";
                    yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 250, $this->source); })()), "recommande", [], "any", false, false, false, 250)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Recommande") : ("Non recommande"));
                    yield "</span>
                        ";
                }
                // line 252
                yield "                        ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["insight"]) || array_key_exists("insight", $context) ? $context["insight"] : (function () { throw new RuntimeError('Variable "insight" does not exist.', 252, $this->source); })()), "needsAttention", [], "any", false, false, false, 252)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 253
                    yield "                        <span class=\"badge badge-attention\">A traiter</span>
                        ";
                }
                // line 255
                yield "                        ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["insight"]) || array_key_exists("insight", $context) ? $context["insight"] : (function () { throw new RuntimeError('Variable "insight" does not exist.', 255, $this->source); })()), "isUnanswered", [], "any", false, false, false, 255)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 256
                    yield "                        <span class=\"badge badge-unanswered\">Sans reponse</span>
                        ";
                }
                // line 258
                yield "                    </div>

                    <div class=\"comment\">";
                // line 260
                yield Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 260, $this->source); })()), "commentaire", [], "any", false, false, false, 260), "html", null, true));
                yield "</div>
                </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 263
            yield "        ";
        }
        // line 264
        yield "
        <div class=\"footer\">
            Marketplace | Export PDF feedbacks
        </div>
    </div>
</body>
</html>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "feedback/export_pdf.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  446 => 264,  443 => 263,  434 => 260,  430 => 258,  426 => 256,  423 => 255,  419 => 253,  416 => 252,  408 => 250,  406 => 249,  402 => 248,  398 => 247,  392 => 246,  388 => 245,  382 => 244,  378 => 243,  372 => 239,  364 => 237,  362 => 236,  357 => 235,  355 => 234,  345 => 231,  340 => 229,  336 => 227,  333 => 226,  330 => 225,  327 => 224,  322 => 223,  315 => 218,  313 => 217,  307 => 214,  303 => 213,  299 => 212,  295 => 211,  291 => 210,  287 => 209,  282 => 206,  272 => 199,  264 => 194,  256 => 189,  248 => 184,  241 => 179,  239 => 178,  230 => 174,  226 => 172,  222 => 170,  218 => 168,  216 => 167,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <title>Export Feedback PDF</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            color: #0f172a;
            font-size: 12px;
            margin: 0;
        }

        .page {
            padding: 28px 32px 36px;
        }

        .header {
            border-radius: 18px;
            padding: 22px 24px;
            background: linear-gradient(135deg, #0f172a, #1d4ed8);
            color: #ffffff;
            margin-bottom: 18px;
        }

        .header h1 {
            margin: 0 0 8px;
            font-size: 28px;
        }

        .header p {
            margin: 0;
            font-size: 12px;
            color: rgba(255, 255, 255, 0.88);
        }

        .meta {
            margin-top: 14px;
            font-size: 11px;
            color: rgba(255, 255, 255, 0.8);
        }

        .summary {
            margin-bottom: 18px;
        }

        .summary-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 10px 0;
            margin: 0 -10px;
        }

        .summary-card {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 14px;
            vertical-align: top;
        }

        .summary-label {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #64748b;
            margin-bottom: 8px;
        }

        .summary-value {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 6px;
        }

        .summary-note {
            color: #475569;
            font-size: 11px;
        }

        .filters {
            border: 1px dashed #cbd5e1;
            border-radius: 14px;
            padding: 14px 16px;
            margin-bottom: 18px;
            background: #ffffff;
        }

        .filters h2 {
            margin: 0 0 10px;
            font-size: 14px;
        }

        .filter-row {
            margin-bottom: 4px;
            color: #334155;
        }

        .feedback-card {
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 16px 18px;
            margin-bottom: 14px;
            page-break-inside: avoid;
            background: #ffffff;
        }

        .feedback-header {
            margin-bottom: 10px;
        }

        .feedback-title {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 4px;
        }

        .feedback-meta {
            color: #64748b;
            font-size: 11px;
        }

        .badges {
            margin: 10px 0 12px;
        }

        .badge {
            display: inline-block;
            margin: 0 6px 6px 0;
            padding: 5px 9px;
            border-radius: 999px;
            font-size: 10px;
            font-weight: bold;
        }

        .badge-type { background: #dbeafe; color: #1d4ed8; }
        .badge-sentiment-positive { background: #dcfce7; color: #166534; }
        .badge-sentiment-neutral { background: #e2e8f0; color: #334155; }
        .badge-sentiment-negative { background: #fee2e2; color: #991b1b; }
        .badge-topic { background: #ede9fe; color: #6d28d9; }
        .badge-priority-high { background: #fee2e2; color: #991b1b; }
        .badge-priority-medium { background: #fef3c7; color: #92400e; }
        .badge-priority-low { background: #dcfce7; color: #166534; }
        .badge-attention { background: #fce7f3; color: #9d174d; }
        .badge-unanswered { background: #fef3c7; color: #92400e; }

        .comment {
            border-top: 1px solid #f1f5f9;
            padding-top: 12px;
            color: #1e293b;
            line-height: 1.55;
        }

        .footer {
            margin-top: 24px;
            text-align: center;
            color: #94a3b8;
            font-size: 10px;
        }
    </style>
</head>
<body>
    <div class=\"page\">
        <div class=\"header\">
            <h1>Rapport Feedbacks</h1>
            <p>
                {% if viewer.roleCode == 'admin' %}
                Vue complete de moderation des feedbacks.
                {% else %}
                Feedbacks recus pour vos produits et vos livraisons.
                {% endif %}
            </p>
            <div class=\"meta\">
                Genere le {{ generatedAt|date('d/m/Y H:i') }} | {{ viewer.nomComplet }}
            </div>
        </div>

        {% if feedbackInsightsSummary %}
        <div class=\"summary\">
            <table class=\"summary-table\">
                <tr>
                    <td class=\"summary-card\">
                        <div class=\"summary-label\">Feedbacks urgents</div>
                        <div class=\"summary-value\">{{ feedbackInsightsSummary.urgentCount }}</div>
                        <div class=\"summary-note\">Retours critiques a prioriser</div>
                    </td>
                    <td class=\"summary-card\">
                        <div class=\"summary-label\">A traiter</div>
                        <div class=\"summary-value\">{{ feedbackInsightsSummary.attentionCount }}</div>
                        <div class=\"summary-note\">Feedbacks qui demandent une action rapide</div>
                    </td>
                    <td class=\"summary-card\">
                        <div class=\"summary-label\">Sans reponse</div>
                        <div class=\"summary-value\">{{ feedbackInsightsSummary.unansweredCount }}</div>
                        <div class=\"summary-note\">Aucune reponse ajoutee pour le moment</div>
                    </td>
                    <td class=\"summary-card\">
                        <div class=\"summary-label\">Sujet principal</div>
                        <div class=\"summary-value\" style=\"font-size: 18px;\">{{ feedbackInsightsSummary.topTopicLabel }}</div>
                        <div class=\"summary-note\">Theme le plus frequent</div>
                    </td>
                </tr>
            </table>
        </div>
        {% endif %}

        <div class=\"filters\">
            <h2>Filtres appliques</h2>
            <div class=\"filter-row\"><strong>Recherche:</strong> {{ search ?: 'Aucune' }}</div>
            <div class=\"filter-row\"><strong>Sentiment:</strong> {{ sentimentFilter ?: 'Tous' }}</div>
            <div class=\"filter-row\"><strong>Note:</strong> {{ ratingFilter ?: 'Toutes' }}</div>
            <div class=\"filter-row\"><strong>Sujet:</strong> {{ topicFilter ?: 'Tous' }}</div>
            <div class=\"filter-row\"><strong>Priorite:</strong> {{ priorityFilter ?: 'Toutes' }}</div>
            <div class=\"filter-row\"><strong>Suivi:</strong> {{ attentionFilter ?: 'Tous' }}</div>
        </div>

        {% if feedbacksWithSentiment is empty %}
        <div class=\"feedback-card\">
            <div class=\"feedback-title\">Aucun feedback a exporter</div>
            <div class=\"feedback-meta\">Aucun element ne correspond aux filtres actuels.</div>
        </div>
        {% else %}
            {% for item in feedbacksWithSentiment %}
                {% set feedback = item.feedback %}
                {% set sentiment = item.sentiment %}
                {% set insight = item.insight %}
                <div class=\"feedback-card\">
                    <div class=\"feedback-header\">
                        <div class=\"feedback-title\">{{ feedback.displayTitle }}</div>
                        <div class=\"feedback-meta\">
                            #{{ feedback.id }} | {{ feedback.auteur ? feedback.auteur.nomComplet : 'Utilisateur supprime' }} | {{ feedback.dateStatut|date('d/m/Y H:i') }}
                        </div>
                        <div class=\"feedback-meta\" style=\"margin-top: 4px;\">
                            {% if feedback.produit %}
                            Produit: {{ feedback.produit.nomProduit }}
                            {% elseif feedback.livraison %}
                            Livraison: {{ feedback.livraison.livreur }} | Commande #{{ feedback.livraison.commande.numeroCommande }}
                            {% endif %}
                        </div>
                    </div>

                    <div class=\"badges\">
                        <span class=\"badge badge-type\">{{ feedback.isDeliveryFeedback ? 'Livraison' : 'Produit' }}</span>
                        <span class=\"badge {{ sentiment.sentiment == 'POSITIF' ? 'badge-sentiment-positive' : (sentiment.sentiment == 'NEGATIF' ? 'badge-sentiment-negative' : 'badge-sentiment-neutral') }}\">Sentiment: {{ sentiment.sentiment }}</span>
                        <span class=\"badge badge-topic\">Sujet: {{ insight.topicLabel }}</span>
                        <span class=\"badge {{ insight.priority == 'high' ? 'badge-priority-high' : (insight.priority == 'medium' ? 'badge-priority-medium' : 'badge-priority-low') }}\">Priorite: {{ insight.priorityLabel }}</span>
                        <span class=\"badge badge-type\">Note: {{ feedback.note }}/5</span>
                        <span class=\"badge badge-type\">Reponses: {{ insight.responseCount }}</span>
                        {% if feedback.recommande is not null %}
                        <span class=\"badge {{ feedback.recommande ? 'badge-sentiment-positive' : 'badge-sentiment-negative' }}\">{{ feedback.recommande ? 'Recommande' : 'Non recommande' }}</span>
                        {% endif %}
                        {% if insight.needsAttention %}
                        <span class=\"badge badge-attention\">A traiter</span>
                        {% endif %}
                        {% if insight.isUnanswered %}
                        <span class=\"badge badge-unanswered\">Sans reponse</span>
                        {% endif %}
                    </div>

                    <div class=\"comment\">{{ feedback.commentaire|nl2br }}</div>
                </div>
            {% endfor %}
        {% endif %}

        <div class=\"footer\">
            Marketplace | Export PDF feedbacks
        </div>
    </div>
</body>
</html>
", "feedback/export_pdf.html.twig", "C:\\Users\\Skaina\\Desktop\\final version symfony\\Marketplace-Project\\web\\templates\\feedback\\export_pdf.html.twig");
    }
}
