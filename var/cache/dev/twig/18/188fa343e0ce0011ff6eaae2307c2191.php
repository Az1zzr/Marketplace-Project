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

/* feedback/index.html.twig */
class __TwigTemplate_9088e75459d5c9cfdeaee58e584bba8c extends Template
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

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'breadcrumb' => [$this, 'block_breadcrumb'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "feedback/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "feedback/index.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Feedbacks";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_breadcrumb(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "breadcrumb"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "breadcrumb"));

        // line 6
        yield "<li class=\"breadcrumb-item active\" aria-current=\"page\">Feedbacks</li>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 9
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 10
        $context["canCreateFeedback"] = ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_CLIENT") && (isset($context["hasEligibleProductFeedback"]) || array_key_exists("hasEligibleProductFeedback", $context) ? $context["hasEligibleProductFeedback"] : (function () { throw new RuntimeError('Variable "hasEligibleProductFeedback" does not exist.', 10, $this->source); })()));
        // line 11
        yield "<div class=\"page-header d-flex justify-content-between align-items-center\">
    <div>
        <h1>Feedbacks</h1>
        <p class=\"mb-0\">Explore product reviews, delivery-driver reviews, and ongoing discussions</p>
    </div>
    <div class=\"d-flex gap-2\">
        ";
        // line 17
        if ((($tmp = (isset($context["canSeeInsights"]) || array_key_exists("canSeeInsights", $context) ? $context["canSeeInsights"] : (function () { throw new RuntimeError('Variable "canSeeInsights" does not exist.', 17, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 18
            yield "        <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_feedback_export_pdf", ["search" =>             // line 19
(isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 19, $this->source); })()), "sort" =>             // line 20
(isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 20, $this->source); })()), "order" =>             // line 21
(isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 21, $this->source); })()), "sentiment" =>             // line 22
(isset($context["sentimentFilter"]) || array_key_exists("sentimentFilter", $context) ? $context["sentimentFilter"] : (function () { throw new RuntimeError('Variable "sentimentFilter" does not exist.', 22, $this->source); })()), "rating" =>             // line 23
(isset($context["ratingFilter"]) || array_key_exists("ratingFilter", $context) ? $context["ratingFilter"] : (function () { throw new RuntimeError('Variable "ratingFilter" does not exist.', 23, $this->source); })()), "topic" =>             // line 24
(isset($context["topicFilter"]) || array_key_exists("topicFilter", $context) ? $context["topicFilter"] : (function () { throw new RuntimeError('Variable "topicFilter" does not exist.', 24, $this->source); })()), "priority" =>             // line 25
(isset($context["priorityFilter"]) || array_key_exists("priorityFilter", $context) ? $context["priorityFilter"] : (function () { throw new RuntimeError('Variable "priorityFilter" does not exist.', 25, $this->source); })()), "attention" =>             // line 26
(isset($context["attentionFilter"]) || array_key_exists("attentionFilter", $context) ? $context["attentionFilter"] : (function () { throw new RuntimeError('Variable "attentionFilter" does not exist.', 26, $this->source); })())]), "html", null, true);
            // line 27
            yield "\" class=\"btn btn-outline-dark\">
            <i class=\"bi bi-file-earmark-pdf me-1\"></i> Exporter PDF
        </a>
        ";
        }
        // line 31
        yield "        ";
        if ((($tmp = (isset($context["canCreateFeedback"]) || array_key_exists("canCreateFeedback", $context) ? $context["canCreateFeedback"] : (function () { throw new RuntimeError('Variable "canCreateFeedback" does not exist.', 31, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 32
            yield "        <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_feedback_new");
            yield "\" class=\"btn btn-primary\">
            <i class=\"bi bi-plus-lg me-1\"></i> Add Product Feedback
        </a>
        ";
        }
        // line 36
        yield "    </div>
</div>

";
        // line 39
        if (((isset($context["canSeeInsights"]) || array_key_exists("canSeeInsights", $context) ? $context["canSeeInsights"] : (function () { throw new RuntimeError('Variable "canSeeInsights" does not exist.', 39, $this->source); })()) && (isset($context["feedbackInsightsSummary"]) || array_key_exists("feedbackInsightsSummary", $context) ? $context["feedbackInsightsSummary"] : (function () { throw new RuntimeError('Variable "feedbackInsightsSummary" does not exist.', 39, $this->source); })()))) {
            // line 40
            yield "<div class=\"stat-grid mb-4\">
    <div class=\"stat-card\">
        <div class=\"stat-label\">Feedbacks Urgents</div>
        <div class=\"stat-value\">";
            // line 43
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedbackInsightsSummary"]) || array_key_exists("feedbackInsightsSummary", $context) ? $context["feedbackInsightsSummary"] : (function () { throw new RuntimeError('Variable "feedbackInsightsSummary" does not exist.', 43, $this->source); })()), "urgentCount", [], "any", false, false, false, 43), "html", null, true);
            yield "</div>
        <div class=\"stat-note\">Retours prioritaires qui demandent une reaction rapide</div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-label\">A Traiter</div>
        <div class=\"stat-value\">";
            // line 48
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedbackInsightsSummary"]) || array_key_exists("feedbackInsightsSummary", $context) ? $context["feedbackInsightsSummary"] : (function () { throw new RuntimeError('Variable "feedbackInsightsSummary" does not exist.', 48, $this->source); })()), "attentionCount", [], "any", false, false, false, 48), "html", null, true);
            yield "</div>
        <div class=\"stat-note\">Feedbacks critiques ou moyens qui attendent encore une action</div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-label\">Sans Reponse</div>
        <div class=\"stat-value\">";
            // line 53
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedbackInsightsSummary"]) || array_key_exists("feedbackInsightsSummary", $context) ? $context["feedbackInsightsSummary"] : (function () { throw new RuntimeError('Variable "feedbackInsightsSummary" does not exist.', 53, $this->source); })()), "unansweredCount", [], "any", false, false, false, 53), "html", null, true);
            yield "</div>
        <div class=\"stat-note\">Feedbacks qui n'ont encore recu aucune reponse</div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-label\">Sujet Principal</div>
        <div class=\"stat-value fs-3\">";
            // line 58
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedbackInsightsSummary"]) || array_key_exists("feedbackInsightsSummary", $context) ? $context["feedbackInsightsSummary"] : (function () { throw new RuntimeError('Variable "feedbackInsightsSummary" does not exist.', 58, $this->source); })()), "topTopicLabel", [], "any", false, false, false, 58), "html", null, true);
            yield "</div>
        <div class=\"stat-note\">Theme le plus frequent dans les feedbacks visibles</div>
    </div>
</div>
";
        }
        // line 63
        yield "
<div class=\"card mb-4\">
    <div class=\"card-body\">
        <form method=\"get\" class=\"row g-3 align-items-end\" novalidate>
            <div class=\"col-md-3\">
                <label for=\"search\" class=\"form-label\">Search</label>
                <input type=\"text\" name=\"search\" id=\"search\" class=\"form-control\" value=\"";
        // line 69
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 69, $this->source); })()), "html", null, true);
        yield "\" placeholder=\"Search titles, products, drivers...\">
            </div>
            <div class=\"col-md-2\">
                <label for=\"sentiment\" class=\"form-label\">Sentiment</label>
                <select name=\"sentiment\" id=\"sentiment\" class=\"form-select\">
                    <option value=\"\">All Sentiments</option>
                    <option value=\"POSITIF\" ";
        // line 75
        if (((isset($context["sentimentFilter"]) || array_key_exists("sentimentFilter", $context) ? $context["sentimentFilter"] : (function () { throw new RuntimeError('Variable "sentimentFilter" does not exist.', 75, $this->source); })()) == "POSITIF")) {
            yield "selected";
        }
        yield ">POSITIF</option>
                    <option value=\"NEUTRE\" ";
        // line 76
        if (((isset($context["sentimentFilter"]) || array_key_exists("sentimentFilter", $context) ? $context["sentimentFilter"] : (function () { throw new RuntimeError('Variable "sentimentFilter" does not exist.', 76, $this->source); })()) == "NEUTRE")) {
            yield "selected";
        }
        yield ">NEUTRE</option>
                    <option value=\"NEGATIF\" ";
        // line 77
        if (((isset($context["sentimentFilter"]) || array_key_exists("sentimentFilter", $context) ? $context["sentimentFilter"] : (function () { throw new RuntimeError('Variable "sentimentFilter" does not exist.', 77, $this->source); })()) == "NEGATIF")) {
            yield "selected";
        }
        yield ">NEGATIF</option>
                </select>
            </div>
            <div class=\"col-md-2\">
                <label for=\"rating\" class=\"form-label\">Rating</label>
                <select name=\"rating\" id=\"rating\" class=\"form-select\">
                    <option value=\"\">All Ratings</option>
                    <option value=\"5\" ";
        // line 84
        if (((isset($context["ratingFilter"]) || array_key_exists("ratingFilter", $context) ? $context["ratingFilter"] : (function () { throw new RuntimeError('Variable "ratingFilter" does not exist.', 84, $this->source); })()) == "5")) {
            yield "selected";
        }
        yield ">5 Stars</option>
                    <option value=\"4\" ";
        // line 85
        if (((isset($context["ratingFilter"]) || array_key_exists("ratingFilter", $context) ? $context["ratingFilter"] : (function () { throw new RuntimeError('Variable "ratingFilter" does not exist.', 85, $this->source); })()) == "4")) {
            yield "selected";
        }
        yield ">4 Stars</option>
                    <option value=\"3\" ";
        // line 86
        if (((isset($context["ratingFilter"]) || array_key_exists("ratingFilter", $context) ? $context["ratingFilter"] : (function () { throw new RuntimeError('Variable "ratingFilter" does not exist.', 86, $this->source); })()) == "3")) {
            yield "selected";
        }
        yield ">3 Stars</option>
                    <option value=\"2\" ";
        // line 87
        if (((isset($context["ratingFilter"]) || array_key_exists("ratingFilter", $context) ? $context["ratingFilter"] : (function () { throw new RuntimeError('Variable "ratingFilter" does not exist.', 87, $this->source); })()) == "2")) {
            yield "selected";
        }
        yield ">2 Stars</option>
                    <option value=\"1\" ";
        // line 88
        if (((isset($context["ratingFilter"]) || array_key_exists("ratingFilter", $context) ? $context["ratingFilter"] : (function () { throw new RuntimeError('Variable "ratingFilter" does not exist.', 88, $this->source); })()) == "1")) {
            yield "selected";
        }
        yield ">1 Star</option>
                </select>
            </div>
            ";
        // line 91
        if ((($tmp = (isset($context["canSeeInsights"]) || array_key_exists("canSeeInsights", $context) ? $context["canSeeInsights"] : (function () { throw new RuntimeError('Variable "canSeeInsights" does not exist.', 91, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 92
            yield "            <div class=\"col-md-2\">
                <label for=\"topic\" class=\"form-label\">Sujet</label>
                <select name=\"topic\" id=\"topic\" class=\"form-select\">
                    <option value=\"\">Tous</option>
                    ";
            // line 96
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["topicChoices"]) || array_key_exists("topicChoices", $context) ? $context["topicChoices"] : (function () { throw new RuntimeError('Variable "topicChoices" does not exist.', 96, $this->source); })()));
            foreach ($context['_seq'] as $context["value"] => $context["label"]) {
                // line 97
                yield "                    <option value=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["value"], "html", null, true);
                yield "\" ";
                if (((isset($context["topicFilter"]) || array_key_exists("topicFilter", $context) ? $context["topicFilter"] : (function () { throw new RuntimeError('Variable "topicFilter" does not exist.', 97, $this->source); })()) == $context["value"])) {
                    yield "selected";
                }
                yield ">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["label"], "html", null, true);
                yield "</option>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['value'], $context['label'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 99
            yield "                </select>
            </div>
            <div class=\"col-md-2\">
                <label for=\"priority\" class=\"form-label\">Priorite</label>
                <select name=\"priority\" id=\"priority\" class=\"form-select\">
                    <option value=\"\">Toutes</option>
                    ";
            // line 105
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["priorityChoices"]) || array_key_exists("priorityChoices", $context) ? $context["priorityChoices"] : (function () { throw new RuntimeError('Variable "priorityChoices" does not exist.', 105, $this->source); })()));
            foreach ($context['_seq'] as $context["value"] => $context["label"]) {
                // line 106
                yield "                    <option value=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["value"], "html", null, true);
                yield "\" ";
                if (((isset($context["priorityFilter"]) || array_key_exists("priorityFilter", $context) ? $context["priorityFilter"] : (function () { throw new RuntimeError('Variable "priorityFilter" does not exist.', 106, $this->source); })()) == $context["value"])) {
                    yield "selected";
                }
                yield ">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["label"], "html", null, true);
                yield "</option>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['value'], $context['label'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 108
            yield "                </select>
            </div>
            <div class=\"col-md-2\">
                <label for=\"attention\" class=\"form-label\">Suivi</label>
                <select name=\"attention\" id=\"attention\" class=\"form-select\">
                    <option value=\"\">Tous</option>
                    <option value=\"attention\" ";
            // line 114
            if (((isset($context["attentionFilter"]) || array_key_exists("attentionFilter", $context) ? $context["attentionFilter"] : (function () { throw new RuntimeError('Variable "attentionFilter" does not exist.', 114, $this->source); })()) == "attention")) {
                yield "selected";
            }
            yield ">A traiter</option>
                    <option value=\"unanswered\" ";
            // line 115
            if (((isset($context["attentionFilter"]) || array_key_exists("attentionFilter", $context) ? $context["attentionFilter"] : (function () { throw new RuntimeError('Variable "attentionFilter" does not exist.', 115, $this->source); })()) == "unanswered")) {
                yield "selected";
            }
            yield ">Sans reponse</option>
                </select>
            </div>
            ";
        }
        // line 119
        yield "            <div class=\"col-md-2\">
                <label for=\"sort\" class=\"form-label\">Sort by</label>
                <select name=\"sort\" id=\"sort\" class=\"form-select\">
                    <option value=\"dateStatut\" ";
        // line 122
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 122, $this->source); })()) == "dateStatut")) {
            yield "selected";
        }
        yield ">Date</option>
                    <option value=\"note\" ";
        // line 123
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 123, $this->source); })()) == "note")) {
            yield "selected";
        }
        yield ">Rating</option>
                    <option value=\"titre\" ";
        // line 124
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 124, $this->source); })()) == "titre")) {
            yield "selected";
        }
        yield ">Title</option>
                </select>
            </div>
            <div class=\"col-md-1\">
                <label for=\"order\" class=\"form-label\">Order</label>
                <select name=\"order\" id=\"order\" class=\"form-select\">
                    <option value=\"asc\" ";
        // line 130
        if (((isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 130, $this->source); })()) == "asc")) {
            yield "selected";
        }
        yield ">Asc</option>
                    <option value=\"desc\" ";
        // line 131
        if (((isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 131, $this->source); })()) == "desc")) {
            yield "selected";
        }
        yield ">Desc</option>
                </select>
            </div>
            <div class=\"col-md-2\">
                <button type=\"submit\" class=\"btn btn-primary me-2\">
                    <i class=\"bi bi-search\"></i>
                </button>
                <a href=\"";
        // line 138
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_feedback_index");
        yield "\" class=\"btn btn-outline-secondary\">
                    <i class=\"bi bi-x-lg\"></i>
                </a>
            </div>
        </form>
    </div>
</div>

";
        // line 146
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["feedbacksWithSentiment"]) || array_key_exists("feedbacksWithSentiment", $context) ? $context["feedbacksWithSentiment"] : (function () { throw new RuntimeError('Variable "feedbacksWithSentiment" does not exist.', 146, $this->source); })()))) {
            // line 147
            yield "<div class=\"card\">
    <div class=\"card-body text-center py-5\">
        <i class=\"bi bi-chat-dots fs-1 text-muted mb-3\"></i>
        <h4 class=\"text-muted\">No feedbacks found</h4>
        ";
            // line 151
            if (((((((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 151, $this->source); })()) || (isset($context["sentimentFilter"]) || array_key_exists("sentimentFilter", $context) ? $context["sentimentFilter"] : (function () { throw new RuntimeError('Variable "sentimentFilter" does not exist.', 151, $this->source); })())) || (isset($context["ratingFilter"]) || array_key_exists("ratingFilter", $context) ? $context["ratingFilter"] : (function () { throw new RuntimeError('Variable "ratingFilter" does not exist.', 151, $this->source); })())) || (isset($context["topicFilter"]) || array_key_exists("topicFilter", $context) ? $context["topicFilter"] : (function () { throw new RuntimeError('Variable "topicFilter" does not exist.', 151, $this->source); })())) || (isset($context["priorityFilter"]) || array_key_exists("priorityFilter", $context) ? $context["priorityFilter"] : (function () { throw new RuntimeError('Variable "priorityFilter" does not exist.', 151, $this->source); })())) || (isset($context["attentionFilter"]) || array_key_exists("attentionFilter", $context) ? $context["attentionFilter"] : (function () { throw new RuntimeError('Variable "attentionFilter" does not exist.', 151, $this->source); })()))) {
                // line 152
                yield "        <p class=\"text-muted mb-4\">No feedbacks match your search criteria.</p>
        ";
            } else {
                // line 154
                yield "        <p class=\"text-muted mb-4\">Your product and delivery reviews will appear here once you receive an order.</p>
        ";
            }
            // line 156
            yield "        ";
            if ((($tmp = (isset($context["canCreateFeedback"]) || array_key_exists("canCreateFeedback", $context) ? $context["canCreateFeedback"] : (function () { throw new RuntimeError('Variable "canCreateFeedback" does not exist.', 156, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 157
                yield "        <a href=\"";
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_feedback_new");
                yield "\" class=\"btn btn-primary\">
            <i class=\"bi bi-plus-lg me-1\"></i> Add Product Feedback
        </a>
        ";
            }
            // line 161
            yield "    </div>
</div>
";
        } else {
            // line 164
            yield "<div class=\"row\">
";
            // line 165
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["feedbacksWithSentiment"]) || array_key_exists("feedbacksWithSentiment", $context) ? $context["feedbacksWithSentiment"] : (function () { throw new RuntimeError('Variable "feedbacksWithSentiment" does not exist.', 165, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 166
                $context["feedback"] = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "feedback", [], "any", false, false, false, 166);
                // line 167
                $context["sentiment"] = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "sentiment", [], "any", false, false, false, 167);
                // line 168
                $context["insight"] = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "insight", [], "any", false, false, false, 168);
                // line 169
                $context["authorName"] = (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 169, $this->source); })()), "auteur", [], "any", false, false, false, 169)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 169, $this->source); })()), "auteur", [], "any", false, false, false, 169), "nomComplet", [], "any", false, false, false, 169)) : ("Deleted user"));
                // line 170
                $context["canManageFeedback"] = ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN") || ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 170, $this->source); })()), "auteur", [], "any", false, false, false, 170) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 170, $this->source); })()), "user", [], "any", false, false, false, 170)) && (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 170, $this->source); })()), "user", [], "any", false, false, false, 170), "id", [], "any", false, false, false, 170) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 170, $this->source); })()), "auteur", [], "any", false, false, false, 170), "id", [], "any", false, false, false, 170))));
                // line 171
                $context["isDeliveryFeedback"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 171, $this->source); })()), "isDeliveryFeedback", [], "any", false, false, false, 171);
                // line 172
                $context["moodEmoji"] = (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 172, $this->source); })()), "ambiance", [], "any", false, false, false, 172) == "love")) ? ("😍") : ((((CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 172, $this->source); })()), "ambiance", [], "any", false, false, false, 172) == "happy")) ? ("😊") : ((((CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 172, $this->source); })()), "ambiance", [], "any", false, false, false, 172) == "neutral")) ? ("😐") : ((((CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 172, $this->source); })()), "ambiance", [], "any", false, false, false, 172) == "sad")) ? ("😕") : ((((CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 172, $this->source); })()), "ambiance", [], "any", false, false, false, 172) == "angry")) ? ("😡") : ("💬"))))))))));
                // line 173
                yield "<div class=\"col-xl-6 mb-4\">
    <div class=\"card h-100\">
        <div class=\"card-header d-flex justify-content-between align-items-center\">
            <div>
                <span class=\"me-2\">";
                // line 177
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["moodEmoji"]) || array_key_exists("moodEmoji", $context) ? $context["moodEmoji"] : (function () { throw new RuntimeError('Variable "moodEmoji" does not exist.', 177, $this->source); })()), "html", null, true);
                yield "</span>
                <span class=\"star-rating\">
                ";
                // line 179
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(range(1, 5));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 180
                    yield "                ";
                    if (($context["i"] <= $this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 180, $this->source); })()), "note", [], "any", false, false, false, 180)))) {
                        yield "&#9733;";
                    } else {
                        yield "&#9734;";
                    }
                    // line 181
                    yield "                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 182
                yield "                </span>
            </div>
            <div>
                <span class=\"badge ";
                // line 185
                yield (((($tmp = (isset($context["isDeliveryFeedback"]) || array_key_exists("isDeliveryFeedback", $context) ? $context["isDeliveryFeedback"] : (function () { throw new RuntimeError('Variable "isDeliveryFeedback" does not exist.', 185, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("bg-dark") : ("bg-info text-dark"));
                yield " me-1\">
                    ";
                // line 186
                yield (((($tmp = (isset($context["isDeliveryFeedback"]) || array_key_exists("isDeliveryFeedback", $context) ? $context["isDeliveryFeedback"] : (function () { throw new RuntimeError('Variable "isDeliveryFeedback" does not exist.', 186, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Delivery") : ("Product"));
                yield "
                </span>
                <span class=\"badge ";
                // line 188
                yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["sentiment"]) || array_key_exists("sentiment", $context) ? $context["sentiment"] : (function () { throw new RuntimeError('Variable "sentiment" does not exist.', 188, $this->source); })()), "sentiment", [], "any", false, false, false, 188) == "POSITIF")) ? ("bg-success") : ((((CoreExtension::getAttribute($this->env, $this->source, (isset($context["sentiment"]) || array_key_exists("sentiment", $context) ? $context["sentiment"] : (function () { throw new RuntimeError('Variable "sentiment" does not exist.', 188, $this->source); })()), "sentiment", [], "any", false, false, false, 188) == "NEGATIF")) ? ("bg-danger") : ("bg-secondary"))));
                yield "\">
                    <i class=\"bi ";
                // line 189
                yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["sentiment"]) || array_key_exists("sentiment", $context) ? $context["sentiment"] : (function () { throw new RuntimeError('Variable "sentiment" does not exist.', 189, $this->source); })()), "sentiment", [], "any", false, false, false, 189) == "POSITIF")) ? ("bi-emoji-smile") : ((((CoreExtension::getAttribute($this->env, $this->source, (isset($context["sentiment"]) || array_key_exists("sentiment", $context) ? $context["sentiment"] : (function () { throw new RuntimeError('Variable "sentiment" does not exist.', 189, $this->source); })()), "sentiment", [], "any", false, false, false, 189) == "NEGATIF")) ? ("bi-emoji-frown") : ("bi-emoji-neutral"))));
                yield " me-1\"></i>
                    ";
                // line 190
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["sentiment"]) || array_key_exists("sentiment", $context) ? $context["sentiment"] : (function () { throw new RuntimeError('Variable "sentiment" does not exist.', 190, $this->source); })()), "sentiment", [], "any", false, false, false, 190), "html", null, true);
                yield "
                </span>
                <span class=\"badge bg-light text-dark border\">";
                // line 192
                yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["sentiment"] ?? null), "sourceLabel", [], "any", true, true, false, 192) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["sentiment"]) || array_key_exists("sentiment", $context) ? $context["sentiment"] : (function () { throw new RuntimeError('Variable "sentiment" does not exist.', 192, $this->source); })()), "sourceLabel", [], "any", false, false, false, 192)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["sentiment"]) || array_key_exists("sentiment", $context) ? $context["sentiment"] : (function () { throw new RuntimeError('Variable "sentiment" does not exist.', 192, $this->source); })()), "sourceLabel", [], "any", false, false, false, 192), "html", null, true)) : ((((CoreExtension::getAttribute($this->env, $this->source, ($context["sentiment"] ?? null), "source", [], "any", true, true, false, 192) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["sentiment"]) || array_key_exists("sentiment", $context) ? $context["sentiment"] : (function () { throw new RuntimeError('Variable "sentiment" does not exist.', 192, $this->source); })()), "source", [], "any", false, false, false, 192)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["sentiment"]) || array_key_exists("sentiment", $context) ? $context["sentiment"] : (function () { throw new RuntimeError('Variable "sentiment" does not exist.', 192, $this->source); })()), "source", [], "any", false, false, false, 192), "html", null, true)) : ("Unknown"))));
                yield "</span>
                <span class=\"badge bg-primary\">#";
                // line 193
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 193, $this->source); })()), "id", [], "any", false, false, false, 193), "html", null, true);
                yield "</span>
            </div>
        </div>
        <div class=\"card-body\">
            <div class=\"d-flex align-items-center mb-3\">
                ";
                // line 198
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 198, $this->source); })()), "auteur", [], "any", false, false, false, 198)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 199
                    yield "                <div class=\"user-avatar me-2\" style=\"width: 36px; height: 36px; font-size: 0.9rem;\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 199, $this->source); })()), "auteur", [], "any", false, false, false, 199), "prenom", [], "any", false, false, false, 199)), "html", null, true);
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 199, $this->source); })()), "auteur", [], "any", false, false, false, 199), "nom", [], "any", false, false, false, 199)), "html", null, true);
                    yield "</div>
                ";
                } else {
                    // line 201
                    yield "                <div class=\"bg-light rounded-circle d-flex align-items-center justify-content-center me-2\" style=\"width: 36px; height: 36px;\">
                    <i class=\"bi bi-person text-secondary\"></i>
                </div>
                ";
                }
                // line 205
                yield "                <div>
                    <div class=\"fw-medium\">";
                // line 206
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["authorName"]) || array_key_exists("authorName", $context) ? $context["authorName"] : (function () { throw new RuntimeError('Variable "authorName" does not exist.', 206, $this->source); })()), "html", null, true);
                yield "</div>
                    <small class=\"text-muted\">
                        ";
                // line 208
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 208, $this->source); })()), "produit", [], "any", false, false, false, 208)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 209
                    yield "                        Reviewed ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 209, $this->source); })()), "produit", [], "any", false, false, false, 209), "nomProduit", [], "any", false, false, false, 209), "html", null, true);
                    yield "
                        ";
                } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source,                 // line 210
(isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 210, $this->source); })()), "livraison", [], "any", false, false, false, 210)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 211
                    yield "                        Rated driver ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 211, $this->source); })()), "livraison", [], "any", false, false, false, 211), "livreur", [], "any", false, false, false, 211), "html", null, true);
                    yield " for order #";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 211, $this->source); })()), "livraison", [], "any", false, false, false, 211), "commande", [], "any", false, false, false, 211), "numeroCommande", [], "any", false, false, false, 211), "html", null, true);
                    yield "
                        ";
                } else {
                    // line 213
                    yield "                        Started this feedback discussion
                        ";
                }
                // line 215
                yield "                    </small>
                </div>
            </div>
            <h5 class=\"mb-2\">";
                // line 218
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 218, $this->source); })()), "displayTitle", [], "any", false, false, false, 218), "html", null, true);
                yield "</h5>
            ";
                // line 219
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 219, $this->source); })()), "produit", [], "any", false, false, false, 219)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 220
                    yield "            <div class=\"mb-2\">
                <a href=\"";
                    // line 221
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 221, $this->source); })()), "produit", [], "any", false, false, false, 221), "id", [], "any", false, false, false, 221)]), "html", null, true);
                    yield "\" class=\"badge bg-light text-dark text-decoration-none\">
                    <i class=\"bi bi-box-seam me-1\"></i>";
                    // line 222
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 222, $this->source); })()), "produit", [], "any", false, false, false, 222), "nomProduit", [], "any", false, false, false, 222), "html", null, true);
                    yield "
                </a>
            </div>
            ";
                }
                // line 226
                yield "            ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 226, $this->source); })()), "livraison", [], "any", false, false, false, 226)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 227
                    yield "            <div class=\"mb-2\">
                <a href=\"";
                    // line 228
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_commande_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 228, $this->source); })()), "livraison", [], "any", false, false, false, 228), "commande", [], "any", false, false, false, 228), "idCommande", [], "any", false, false, false, 228)]), "html", null, true);
                    yield "\" class=\"badge bg-light text-dark text-decoration-none\">
                    <i class=\"bi bi-truck me-1\"></i>Driver ";
                    // line 229
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 229, $this->source); })()), "livraison", [], "any", false, false, false, 229), "livreur", [], "any", false, false, false, 229), "html", null, true);
                    yield " | Order #";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 229, $this->source); })()), "livraison", [], "any", false, false, false, 229), "commande", [], "any", false, false, false, 229), "numeroCommande", [], "any", false, false, false, 229), "html", null, true);
                    yield "
                </a>
            </div>
            ";
                }
                // line 233
                yield "                ";
                if ((($tmp =  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 233, $this->source); })()), "recommande", [], "any", false, false, false, 233))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 234
                    yield "                <div class=\"mb-2\">
                    <span class=\"badge ";
                    // line 235
                    yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 235, $this->source); })()), "recommande", [], "any", false, false, false, 235)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("bg-success") : ("bg-danger"));
                    yield "\">";
                    yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 235, $this->source); })()), "recommande", [], "any", false, false, false, 235)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Recommended") : ("Not recommended"));
                    yield "</span>
                </div>
                ";
                }
                // line 238
                yield "            ";
                if ((($tmp = (isset($context["canSeeInsights"]) || array_key_exists("canSeeInsights", $context) ? $context["canSeeInsights"] : (function () { throw new RuntimeError('Variable "canSeeInsights" does not exist.', 238, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 239
                    yield "            <div class=\"d-flex flex-wrap gap-2 mb-3\">
                <span class=\"badge ";
                    // line 240
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["insight"]) || array_key_exists("insight", $context) ? $context["insight"] : (function () { throw new RuntimeError('Variable "insight" does not exist.', 240, $this->source); })()), "topicBadgeClass", [], "any", false, false, false, 240), "html", null, true);
                    yield "\">Sujet: ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["insight"]) || array_key_exists("insight", $context) ? $context["insight"] : (function () { throw new RuntimeError('Variable "insight" does not exist.', 240, $this->source); })()), "topicLabel", [], "any", false, false, false, 240), "html", null, true);
                    yield "</span>
                <span class=\"badge ";
                    // line 241
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["insight"]) || array_key_exists("insight", $context) ? $context["insight"] : (function () { throw new RuntimeError('Variable "insight" does not exist.', 241, $this->source); })()), "priorityBadgeClass", [], "any", false, false, false, 241), "html", null, true);
                    yield "\">Priorite: ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["insight"]) || array_key_exists("insight", $context) ? $context["insight"] : (function () { throw new RuntimeError('Variable "insight" does not exist.', 241, $this->source); })()), "priorityLabel", [], "any", false, false, false, 241), "html", null, true);
                    yield "</span>
                ";
                    // line 242
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["insight"]) || array_key_exists("insight", $context) ? $context["insight"] : (function () { throw new RuntimeError('Variable "insight" does not exist.', 242, $this->source); })()), "needsAttention", [], "any", false, false, false, 242)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 243
                        yield "                <span class=\"badge bg-danger-subtle text-danger border border-danger-subtle\">A traiter</span>
                ";
                    }
                    // line 245
                    yield "                ";
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["insight"]) || array_key_exists("insight", $context) ? $context["insight"] : (function () { throw new RuntimeError('Variable "insight" does not exist.', 245, $this->source); })()), "isUnanswered", [], "any", false, false, false, 245)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 246
                        yield "                <span class=\"badge bg-warning-subtle text-warning-emphasis border border-warning-subtle\">Sans reponse</span>
                ";
                    }
                    // line 248
                    yield "            </div>
            ";
                }
                // line 250
                yield "            <p class=\"mb-3\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 250, $this->source); })()), "commentaire", [], "any", false, false, false, 250), 0, 200), "html", null, true);
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 250, $this->source); })()), "commentaire", [], "any", false, false, false, 250)) > 200)) {
                    yield "...";
                }
                yield "</p>
            <div class=\"d-flex align-items-center text-muted small\">
                <i class=\"bi bi-calendar me-1\"></i>
                ";
                // line 253
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 253, $this->source); })()), "dateStatut", [], "any", false, false, false, 253), "Y-m-d H:i"), "html", null, true);
                yield "
                <span class=\"mx-2\">|</span>
                <i class=\"bi bi-chat-dots me-1\"></i>
                ";
                // line 256
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 256, $this->source); })()), "reponses", [], "any", false, false, false, 256)), "html", null, true);
                yield " response(s)
            </div>
        </div>
        <div class=\"card-footer bg-transparent\">
            <div class=\"d-flex gap-2\">
                <a href=\"";
                // line 261
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_feedback_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 261, $this->source); })()), "id", [], "any", false, false, false, 261)]), "html", null, true);
                yield "\" class=\"btn btn-sm btn-primary\">
                    <i class=\"bi bi-eye me-1\"></i> View
                </a>
                ";
                // line 264
                if ((($tmp = (isset($context["canManageFeedback"]) || array_key_exists("canManageFeedback", $context) ? $context["canManageFeedback"] : (function () { throw new RuntimeError('Variable "canManageFeedback" does not exist.', 264, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 265
                    yield "                <a href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_feedback_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 265, $this->source); })()), "id", [], "any", false, false, false, 265)]), "html", null, true);
                    yield "\" class=\"btn btn-sm btn-outline-secondary\">
                    <i class=\"bi bi-pencil me-1\"></i> Edit
                </a>
                <form action=\"";
                    // line 268
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_feedback_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 268, $this->source); })()), "id", [], "any", false, false, false, 268)]), "html", null, true);
                    yield "\" method=\"post\" style=\"display:inline\" novalidate>
                    <button type=\"submit\" class=\"btn btn-sm btn-outline-danger\">
                        <i class=\"bi bi-trash me-1\"></i> Delete
                    </button>
                </form>
                ";
                }
                // line 274
                yield "            </div>
        </div>
    </div>
</div>
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 279
            yield "</div>
";
        }
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "feedback/index.html.twig";
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
        return array (  734 => 279,  724 => 274,  715 => 268,  708 => 265,  706 => 264,  700 => 261,  692 => 256,  686 => 253,  676 => 250,  672 => 248,  668 => 246,  665 => 245,  661 => 243,  659 => 242,  653 => 241,  647 => 240,  644 => 239,  641 => 238,  633 => 235,  630 => 234,  627 => 233,  618 => 229,  614 => 228,  611 => 227,  608 => 226,  601 => 222,  597 => 221,  594 => 220,  592 => 219,  588 => 218,  583 => 215,  579 => 213,  571 => 211,  569 => 210,  564 => 209,  562 => 208,  557 => 206,  554 => 205,  548 => 201,  541 => 199,  539 => 198,  531 => 193,  527 => 192,  522 => 190,  518 => 189,  514 => 188,  509 => 186,  505 => 185,  500 => 182,  494 => 181,  487 => 180,  483 => 179,  478 => 177,  472 => 173,  470 => 172,  468 => 171,  466 => 170,  464 => 169,  462 => 168,  460 => 167,  458 => 166,  454 => 165,  451 => 164,  446 => 161,  438 => 157,  435 => 156,  431 => 154,  427 => 152,  425 => 151,  419 => 147,  417 => 146,  406 => 138,  394 => 131,  388 => 130,  377 => 124,  371 => 123,  365 => 122,  360 => 119,  351 => 115,  345 => 114,  337 => 108,  322 => 106,  318 => 105,  310 => 99,  295 => 97,  291 => 96,  285 => 92,  283 => 91,  275 => 88,  269 => 87,  263 => 86,  257 => 85,  251 => 84,  239 => 77,  233 => 76,  227 => 75,  218 => 69,  210 => 63,  202 => 58,  194 => 53,  186 => 48,  178 => 43,  173 => 40,  171 => 39,  166 => 36,  158 => 32,  155 => 31,  149 => 27,  147 => 26,  146 => 25,  145 => 24,  144 => 23,  143 => 22,  142 => 21,  141 => 20,  140 => 19,  138 => 18,  136 => 17,  128 => 11,  126 => 10,  113 => 9,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Feedbacks{% endblock %}

{% block breadcrumb %}
<li class=\"breadcrumb-item active\" aria-current=\"page\">Feedbacks</li>
{% endblock %}

{% block body %}
{% set canCreateFeedback = is_granted('ROLE_CLIENT') and hasEligibleProductFeedback %}
<div class=\"page-header d-flex justify-content-between align-items-center\">
    <div>
        <h1>Feedbacks</h1>
        <p class=\"mb-0\">Explore product reviews, delivery-driver reviews, and ongoing discussions</p>
    </div>
    <div class=\"d-flex gap-2\">
        {% if canSeeInsights %}
        <a href=\"{{ path('app_feedback_export_pdf', {
            search: search,
            sort: sort,
            order: order,
            sentiment: sentimentFilter,
            rating: ratingFilter,
            topic: topicFilter,
            priority: priorityFilter,
            attention: attentionFilter
        }) }}\" class=\"btn btn-outline-dark\">
            <i class=\"bi bi-file-earmark-pdf me-1\"></i> Exporter PDF
        </a>
        {% endif %}
        {% if canCreateFeedback %}
        <a href=\"{{ path('app_feedback_new') }}\" class=\"btn btn-primary\">
            <i class=\"bi bi-plus-lg me-1\"></i> Add Product Feedback
        </a>
        {% endif %}
    </div>
</div>

{% if canSeeInsights and feedbackInsightsSummary %}
<div class=\"stat-grid mb-4\">
    <div class=\"stat-card\">
        <div class=\"stat-label\">Feedbacks Urgents</div>
        <div class=\"stat-value\">{{ feedbackInsightsSummary.urgentCount }}</div>
        <div class=\"stat-note\">Retours prioritaires qui demandent une reaction rapide</div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-label\">A Traiter</div>
        <div class=\"stat-value\">{{ feedbackInsightsSummary.attentionCount }}</div>
        <div class=\"stat-note\">Feedbacks critiques ou moyens qui attendent encore une action</div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-label\">Sans Reponse</div>
        <div class=\"stat-value\">{{ feedbackInsightsSummary.unansweredCount }}</div>
        <div class=\"stat-note\">Feedbacks qui n'ont encore recu aucune reponse</div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-label\">Sujet Principal</div>
        <div class=\"stat-value fs-3\">{{ feedbackInsightsSummary.topTopicLabel }}</div>
        <div class=\"stat-note\">Theme le plus frequent dans les feedbacks visibles</div>
    </div>
</div>
{% endif %}

<div class=\"card mb-4\">
    <div class=\"card-body\">
        <form method=\"get\" class=\"row g-3 align-items-end\" novalidate>
            <div class=\"col-md-3\">
                <label for=\"search\" class=\"form-label\">Search</label>
                <input type=\"text\" name=\"search\" id=\"search\" class=\"form-control\" value=\"{{ search }}\" placeholder=\"Search titles, products, drivers...\">
            </div>
            <div class=\"col-md-2\">
                <label for=\"sentiment\" class=\"form-label\">Sentiment</label>
                <select name=\"sentiment\" id=\"sentiment\" class=\"form-select\">
                    <option value=\"\">All Sentiments</option>
                    <option value=\"POSITIF\" {% if sentimentFilter == 'POSITIF' %}selected{% endif %}>POSITIF</option>
                    <option value=\"NEUTRE\" {% if sentimentFilter == 'NEUTRE' %}selected{% endif %}>NEUTRE</option>
                    <option value=\"NEGATIF\" {% if sentimentFilter == 'NEGATIF' %}selected{% endif %}>NEGATIF</option>
                </select>
            </div>
            <div class=\"col-md-2\">
                <label for=\"rating\" class=\"form-label\">Rating</label>
                <select name=\"rating\" id=\"rating\" class=\"form-select\">
                    <option value=\"\">All Ratings</option>
                    <option value=\"5\" {% if ratingFilter == '5' %}selected{% endif %}>5 Stars</option>
                    <option value=\"4\" {% if ratingFilter == '4' %}selected{% endif %}>4 Stars</option>
                    <option value=\"3\" {% if ratingFilter == '3' %}selected{% endif %}>3 Stars</option>
                    <option value=\"2\" {% if ratingFilter == '2' %}selected{% endif %}>2 Stars</option>
                    <option value=\"1\" {% if ratingFilter == '1' %}selected{% endif %}>1 Star</option>
                </select>
            </div>
            {% if canSeeInsights %}
            <div class=\"col-md-2\">
                <label for=\"topic\" class=\"form-label\">Sujet</label>
                <select name=\"topic\" id=\"topic\" class=\"form-select\">
                    <option value=\"\">Tous</option>
                    {% for value, label in topicChoices %}
                    <option value=\"{{ value }}\" {% if topicFilter == value %}selected{% endif %}>{{ label }}</option>
                    {% endfor %}
                </select>
            </div>
            <div class=\"col-md-2\">
                <label for=\"priority\" class=\"form-label\">Priorite</label>
                <select name=\"priority\" id=\"priority\" class=\"form-select\">
                    <option value=\"\">Toutes</option>
                    {% for value, label in priorityChoices %}
                    <option value=\"{{ value }}\" {% if priorityFilter == value %}selected{% endif %}>{{ label }}</option>
                    {% endfor %}
                </select>
            </div>
            <div class=\"col-md-2\">
                <label for=\"attention\" class=\"form-label\">Suivi</label>
                <select name=\"attention\" id=\"attention\" class=\"form-select\">
                    <option value=\"\">Tous</option>
                    <option value=\"attention\" {% if attentionFilter == 'attention' %}selected{% endif %}>A traiter</option>
                    <option value=\"unanswered\" {% if attentionFilter == 'unanswered' %}selected{% endif %}>Sans reponse</option>
                </select>
            </div>
            {% endif %}
            <div class=\"col-md-2\">
                <label for=\"sort\" class=\"form-label\">Sort by</label>
                <select name=\"sort\" id=\"sort\" class=\"form-select\">
                    <option value=\"dateStatut\" {% if sort == 'dateStatut' %}selected{% endif %}>Date</option>
                    <option value=\"note\" {% if sort == 'note' %}selected{% endif %}>Rating</option>
                    <option value=\"titre\" {% if sort == 'titre' %}selected{% endif %}>Title</option>
                </select>
            </div>
            <div class=\"col-md-1\">
                <label for=\"order\" class=\"form-label\">Order</label>
                <select name=\"order\" id=\"order\" class=\"form-select\">
                    <option value=\"asc\" {% if order == 'asc' %}selected{% endif %}>Asc</option>
                    <option value=\"desc\" {% if order == 'desc' %}selected{% endif %}>Desc</option>
                </select>
            </div>
            <div class=\"col-md-2\">
                <button type=\"submit\" class=\"btn btn-primary me-2\">
                    <i class=\"bi bi-search\"></i>
                </button>
                <a href=\"{{ path('app_feedback_index') }}\" class=\"btn btn-outline-secondary\">
                    <i class=\"bi bi-x-lg\"></i>
                </a>
            </div>
        </form>
    </div>
</div>

{% if feedbacksWithSentiment is empty %}
<div class=\"card\">
    <div class=\"card-body text-center py-5\">
        <i class=\"bi bi-chat-dots fs-1 text-muted mb-3\"></i>
        <h4 class=\"text-muted\">No feedbacks found</h4>
        {% if search or sentimentFilter or ratingFilter or topicFilter or priorityFilter or attentionFilter %}
        <p class=\"text-muted mb-4\">No feedbacks match your search criteria.</p>
        {% else %}
        <p class=\"text-muted mb-4\">Your product and delivery reviews will appear here once you receive an order.</p>
        {% endif %}
        {% if canCreateFeedback %}
        <a href=\"{{ path('app_feedback_new') }}\" class=\"btn btn-primary\">
            <i class=\"bi bi-plus-lg me-1\"></i> Add Product Feedback
        </a>
        {% endif %}
    </div>
</div>
{% else %}
<div class=\"row\">
{% for item in feedbacksWithSentiment %}
{% set feedback = item.feedback %}
{% set sentiment = item.sentiment %}
{% set insight = item.insight %}
{% set authorName = feedback.auteur ? feedback.auteur.nomComplet : 'Deleted user' %}
{% set canManageFeedback = is_granted('ROLE_ADMIN') or (feedback.auteur and app.user and app.user.id == feedback.auteur.id) %}
{% set isDeliveryFeedback = feedback.isDeliveryFeedback %}
{% set moodEmoji = feedback.ambiance == 'love' ? '😍' : (feedback.ambiance == 'happy' ? '😊' : (feedback.ambiance == 'neutral' ? '😐' : (feedback.ambiance == 'sad' ? '😕' : (feedback.ambiance == 'angry' ? '😡' : '💬')))) %}
<div class=\"col-xl-6 mb-4\">
    <div class=\"card h-100\">
        <div class=\"card-header d-flex justify-content-between align-items-center\">
            <div>
                <span class=\"me-2\">{{ moodEmoji }}</span>
                <span class=\"star-rating\">
                {% for i in 1..5 %}
                {% if i <= feedback.note|number_format %}&#9733;{% else %}&#9734;{% endif %}
                {% endfor %}
                </span>
            </div>
            <div>
                <span class=\"badge {{ isDeliveryFeedback ? 'bg-dark' : 'bg-info text-dark' }} me-1\">
                    {{ isDeliveryFeedback ? 'Delivery' : 'Product' }}
                </span>
                <span class=\"badge {{ sentiment.sentiment == 'POSITIF' ? 'bg-success' : (sentiment.sentiment == 'NEGATIF' ? 'bg-danger' : 'bg-secondary') }}\">
                    <i class=\"bi {{ sentiment.sentiment == 'POSITIF' ? 'bi-emoji-smile' : (sentiment.sentiment == 'NEGATIF' ? 'bi-emoji-frown' : 'bi-emoji-neutral') }} me-1\"></i>
                    {{ sentiment.sentiment }}
                </span>
                <span class=\"badge bg-light text-dark border\">{{ sentiment.sourceLabel ?? sentiment.source ?? 'Unknown' }}</span>
                <span class=\"badge bg-primary\">#{{ feedback.id }}</span>
            </div>
        </div>
        <div class=\"card-body\">
            <div class=\"d-flex align-items-center mb-3\">
                {% if feedback.auteur %}
                <div class=\"user-avatar me-2\" style=\"width: 36px; height: 36px; font-size: 0.9rem;\">{{ feedback.auteur.prenom|first }}{{ feedback.auteur.nom|first }}</div>
                {% else %}
                <div class=\"bg-light rounded-circle d-flex align-items-center justify-content-center me-2\" style=\"width: 36px; height: 36px;\">
                    <i class=\"bi bi-person text-secondary\"></i>
                </div>
                {% endif %}
                <div>
                    <div class=\"fw-medium\">{{ authorName }}</div>
                    <small class=\"text-muted\">
                        {% if feedback.produit %}
                        Reviewed {{ feedback.produit.nomProduit }}
                        {% elseif feedback.livraison %}
                        Rated driver {{ feedback.livraison.livreur }} for order #{{ feedback.livraison.commande.numeroCommande }}
                        {% else %}
                        Started this feedback discussion
                        {% endif %}
                    </small>
                </div>
            </div>
            <h5 class=\"mb-2\">{{ feedback.displayTitle }}</h5>
            {% if feedback.produit %}
            <div class=\"mb-2\">
                <a href=\"{{ path('app_produit_show', {'id': feedback.produit.id}) }}\" class=\"badge bg-light text-dark text-decoration-none\">
                    <i class=\"bi bi-box-seam me-1\"></i>{{ feedback.produit.nomProduit }}
                </a>
            </div>
            {% endif %}
            {% if feedback.livraison %}
            <div class=\"mb-2\">
                <a href=\"{{ path('app_commande_show', {'id': feedback.livraison.commande.idCommande}) }}\" class=\"badge bg-light text-dark text-decoration-none\">
                    <i class=\"bi bi-truck me-1\"></i>Driver {{ feedback.livraison.livreur }} | Order #{{ feedback.livraison.commande.numeroCommande }}
                </a>
            </div>
            {% endif %}
                {% if feedback.recommande is not null %}
                <div class=\"mb-2\">
                    <span class=\"badge {{ feedback.recommande ? 'bg-success' : 'bg-danger' }}\">{{ feedback.recommande ? 'Recommended' : 'Not recommended' }}</span>
                </div>
                {% endif %}
            {% if canSeeInsights %}
            <div class=\"d-flex flex-wrap gap-2 mb-3\">
                <span class=\"badge {{ insight.topicBadgeClass }}\">Sujet: {{ insight.topicLabel }}</span>
                <span class=\"badge {{ insight.priorityBadgeClass }}\">Priorite: {{ insight.priorityLabel }}</span>
                {% if insight.needsAttention %}
                <span class=\"badge bg-danger-subtle text-danger border border-danger-subtle\">A traiter</span>
                {% endif %}
                {% if insight.isUnanswered %}
                <span class=\"badge bg-warning-subtle text-warning-emphasis border border-warning-subtle\">Sans reponse</span>
                {% endif %}
            </div>
            {% endif %}
            <p class=\"mb-3\">{{ feedback.commentaire|slice(0, 200) }}{% if feedback.commentaire|length > 200 %}...{% endif %}</p>
            <div class=\"d-flex align-items-center text-muted small\">
                <i class=\"bi bi-calendar me-1\"></i>
                {{ feedback.dateStatut|date('Y-m-d H:i') }}
                <span class=\"mx-2\">|</span>
                <i class=\"bi bi-chat-dots me-1\"></i>
                {{ feedback.reponses|length }} response(s)
            </div>
        </div>
        <div class=\"card-footer bg-transparent\">
            <div class=\"d-flex gap-2\">
                <a href=\"{{ path('app_feedback_show', {'id': feedback.id}) }}\" class=\"btn btn-sm btn-primary\">
                    <i class=\"bi bi-eye me-1\"></i> View
                </a>
                {% if canManageFeedback %}
                <a href=\"{{ path('app_feedback_edit', {'id': feedback.id}) }}\" class=\"btn btn-sm btn-outline-secondary\">
                    <i class=\"bi bi-pencil me-1\"></i> Edit
                </a>
                <form action=\"{{ path('app_feedback_delete', {'id': feedback.id}) }}\" method=\"post\" style=\"display:inline\" novalidate>
                    <button type=\"submit\" class=\"btn btn-sm btn-outline-danger\">
                        <i class=\"bi bi-trash me-1\"></i> Delete
                    </button>
                </form>
                {% endif %}
            </div>
        </div>
    </div>
</div>
{% endfor %}
</div>
{% endif %}
{% endblock %}
", "feedback/index.html.twig", "C:\\Users\\Skaina\\Desktop\\final version symfony\\Marketplace-Project\\web\\templates\\feedback\\index.html.twig");
    }
}
