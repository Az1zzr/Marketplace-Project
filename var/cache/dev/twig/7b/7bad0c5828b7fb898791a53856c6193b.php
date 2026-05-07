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

/* feedback/reponse_new.html.twig */
class __TwigTemplate_34a8f55e5ffe5a617482c721f9c5cada extends Template
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
            'javascripts' => [$this, 'block_javascripts'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "feedback/reponse_new.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "feedback/reponse_new.html.twig"));

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

        yield "Add Response";
        
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
        yield "<li><a href=\"";
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_feedback_index");
        yield "\">Feedbacks</a></li>
<li><a href=\"";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_feedback_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 7, $this->source); })()), "id", [], "any", false, false, false, 7)]), "html", null, true);
        yield "\">#";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 7, $this->source); })()), "id", [], "any", false, false, false, 7), "html", null, true);
        yield "</a></li>
<li class=\"breadcrumb-item active\" aria-current=\"page\">Add Response</li>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 11
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

        // line 12
        $context["feedbackAuthorName"] = (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 12, $this->source); })()), "auteur", [], "any", false, false, false, 12)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 12, $this->source); })()), "auteur", [], "any", false, false, false, 12), "nomComplet", [], "any", false, false, false, 12)) : ("Deleted user"));
        // line 13
        yield "<div class=\"page-header\">
    <h1><i class=\"bi bi-reply me-2\"></i>Add Response</h1>
    <p>Respond to ";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["feedbackAuthorName"]) || array_key_exists("feedbackAuthorName", $context) ? $context["feedbackAuthorName"] : (function () { throw new RuntimeError('Variable "feedbackAuthorName" does not exist.', 15, $this->source); })()), "html", null, true);
        yield " on discussion #";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 15, $this->source); })()), "id", [], "any", false, false, false, 15), "html", null, true);
        yield "</p>
</div>

<div class=\"row\">
    <div class=\"col-lg-8\">
        <div class=\"card mb-4\">
            <div class=\"card-header bg-light\">
                <h6 class=\"mb-0\"><i class=\"bi bi-chat-left me-2\"></i>Original Feedback</h6>
            </div>
            <div class=\"card-body\">
                <div class=\"d-flex align-items-center mb-3\">
                    ";
        // line 26
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 26, $this->source); })()), "auteur", [], "any", false, false, false, 26)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 27
            yield "                    <div class=\"user-avatar me-2\" style=\"width: 36px; height: 36px; font-size: 0.9rem;\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 27, $this->source); })()), "auteur", [], "any", false, false, false, 27), "prenom", [], "any", false, false, false, 27)), "html", null, true);
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 27, $this->source); })()), "auteur", [], "any", false, false, false, 27), "nom", [], "any", false, false, false, 27)), "html", null, true);
            yield "</div>
                    ";
        } else {
            // line 29
            yield "                    <div class=\"bg-light rounded-circle d-flex align-items-center justify-content-center me-2 border\" style=\"width: 36px; height: 36px;\">
                        <i class=\"bi bi-person text-secondary\"></i>
                    </div>
                    ";
        }
        // line 33
        yield "                    <div>
                        <div class=\"fw-medium\">";
        // line 34
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["feedbackAuthorName"]) || array_key_exists("feedbackAuthorName", $context) ? $context["feedbackAuthorName"] : (function () { throw new RuntimeError('Variable "feedbackAuthorName" does not exist.', 34, $this->source); })()), "html", null, true);
        yield "</div>
                        <small class=\"text-muted\">Original author</small>
                    </div>
                </div>
                <div class=\"mb-3\">
                    <span class=\"star-rating\">
                        ";
        // line 40
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(range(1, 5));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 41
            yield "                            ";
            if (($context["i"] <= $this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 41, $this->source); })()), "note", [], "any", false, false, false, 41)))) {
                yield "&#9733;";
            } else {
                yield "&#9734;";
            }
            // line 42
            yield "                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        yield "                    </span>
                </div>
                <p class=\"mb-0 text-muted\">";
        // line 45
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 45, $this->source); })()), "commentaire", [], "any", false, false, false, 45), "html", null, true);
        yield "</p>
            </div>
        </div>
        
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\">Your Response</h5>
            </div>
            <div class=\"card-body\">
                ";
        // line 54
        if ((array_key_exists("errors", $context) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 54, $this->source); })())) > 0))) {
            // line 55
            yield "                <div class=\"alert alert-danger\">
                    <h6><i class=\"bi bi-exclamation-triangle-fill me-2\"></i>Please fix the following errors:</h6>
                    <ul class=\"mb-0 mt-2\">
                        ";
            // line 58
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 58, $this->source); })()));
            foreach ($context['_seq'] as $context["field"] => $context["error"]) {
                // line 59
                yield "                        <li>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["error"], "html", null, true);
                yield "</li>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['field'], $context['error'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 61
            yield "                    </ul>
                </div>
                ";
        }
        // line 64
        yield "
                <form method=\"post\" novalidate>
                    <div class=\"mb-4\">
                        <label for=\"contenu\" class=\"form-label\">Response Content <span class=\"text-danger\">*</span></label>
                        <textarea 
                            name=\"contenu\" 
                            id=\"contenu\" 
                            class=\"form-control ";
        // line 71
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "contenu", [], "array", true, true, false, 71) || CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "profanity", [], "array", true, true, false, 71))) {
            yield "is-invalid";
        }
        yield "\" 
                            rows=\"5\" 
                            required 
                            placeholder=\"Write your response here... (minimum 10 characters)\"
                        ></textarea>
                        ";
        // line 76
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "contenu", [], "array", true, true, false, 76)) {
            // line 77
            yield "                        <div class=\"invalid-feedback\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 77, $this->source); })()), "contenu", [], "array", false, false, false, 77), "html", null, true);
            yield "</div>
                        ";
        }
        // line 79
        yield "                        ";
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "profanity", [], "array", true, true, false, 79)) {
            // line 80
            yield "                        <div class=\"invalid-feedback d-block\">
                            <i class=\"bi bi-shield-exclamation me-1\"></i>";
            // line 81
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 81, $this->source); })()), "profanity", [], "array", false, false, false, 81), "html", null, true);
            yield "
                        </div>
                        ";
        }
        // line 84
        yield "                        <div class=\"form-text\">Your response will be checked for inappropriate language.</div>
                        <div class=\"mt-3 d-flex align-items-center gap-2 flex-wrap\">
                            <button type=\"button\" class=\"btn btn-outline-primary btn-sm\" data-spellcheck-target=\"#contenu\" data-spellcheck-result=\"#response-spellcheck-result\">
                                <i class=\"bi bi-spellcheck me-1\"></i> Verifier l'orthographe
                            </button>
                        </div>
                        <div id=\"response-spellcheck-result\" hidden></div>
                    </div>
                    
                    <div class=\"d-flex gap-2\">
                        <button type=\"submit\" class=\"btn btn-primary\">
                            <i class=\"bi bi-send me-1\"></i> Submit Response
                        </button>
                        <a href=\"";
        // line 97
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_feedback_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 97, $this->source); })()), "id", [], "any", false, false, false, 97)]), "html", null, true);
        yield "\" class=\"btn btn-outline-secondary\">
                            <i class=\"bi bi-x-lg me-1\"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class=\"col-lg-4\">
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\"><i class=\"bi bi-lightbulb me-2\"></i>Tips</h5>
            </div>
            <div class=\"card-body\">
                <ul class=\"list-unstyled mb-0\">
                    <li class=\"mb-3\">
                        <i class=\"bi bi-check-circle-fill text-success me-2\"></i>
                        Be professional and helpful
                    </li>
                    <li class=\"mb-3\">
                        <i class=\"bi bi-check-circle-fill text-success me-2\"></i>
                        Address the concerns raised
                    </li>
                    <li class=\"mb-3\">
                        <i class=\"bi bi-check-circle-fill text-success me-2\"></i>
                        Offer solutions when possible
                    </li>
                    <li>
                        <i class=\"bi bi-x-circle-fill text-danger me-2\"></i>
                        Keep responses respectful
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 136
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 137
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
";
        // line 138
        yield from $this->load("feedback/_spellcheck_script.html.twig", 138)->unwrap()->yield($context);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "feedback/reponse_new.html.twig";
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
        return array (  363 => 138,  359 => 137,  346 => 136,  297 => 97,  282 => 84,  276 => 81,  273 => 80,  270 => 79,  264 => 77,  262 => 76,  252 => 71,  243 => 64,  238 => 61,  229 => 59,  225 => 58,  220 => 55,  218 => 54,  206 => 45,  202 => 43,  196 => 42,  189 => 41,  185 => 40,  176 => 34,  173 => 33,  167 => 29,  160 => 27,  158 => 26,  142 => 15,  138 => 13,  136 => 12,  123 => 11,  107 => 7,  102 => 6,  89 => 5,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Add Response{% endblock %}

{% block breadcrumb %}
<li><a href=\"{{ path('app_feedback_index') }}\">Feedbacks</a></li>
<li><a href=\"{{ path('app_feedback_show', {'id': feedback.id}) }}\">#{{ feedback.id }}</a></li>
<li class=\"breadcrumb-item active\" aria-current=\"page\">Add Response</li>
{% endblock %}

{% block body %}
{% set feedbackAuthorName = feedback.auteur ? feedback.auteur.nomComplet : 'Deleted user' %}
<div class=\"page-header\">
    <h1><i class=\"bi bi-reply me-2\"></i>Add Response</h1>
    <p>Respond to {{ feedbackAuthorName }} on discussion #{{ feedback.id }}</p>
</div>

<div class=\"row\">
    <div class=\"col-lg-8\">
        <div class=\"card mb-4\">
            <div class=\"card-header bg-light\">
                <h6 class=\"mb-0\"><i class=\"bi bi-chat-left me-2\"></i>Original Feedback</h6>
            </div>
            <div class=\"card-body\">
                <div class=\"d-flex align-items-center mb-3\">
                    {% if feedback.auteur %}
                    <div class=\"user-avatar me-2\" style=\"width: 36px; height: 36px; font-size: 0.9rem;\">{{ feedback.auteur.prenom|first }}{{ feedback.auteur.nom|first }}</div>
                    {% else %}
                    <div class=\"bg-light rounded-circle d-flex align-items-center justify-content-center me-2 border\" style=\"width: 36px; height: 36px;\">
                        <i class=\"bi bi-person text-secondary\"></i>
                    </div>
                    {% endif %}
                    <div>
                        <div class=\"fw-medium\">{{ feedbackAuthorName }}</div>
                        <small class=\"text-muted\">Original author</small>
                    </div>
                </div>
                <div class=\"mb-3\">
                    <span class=\"star-rating\">
                        {% for i in 1..5 %}
                            {% if i <= feedback.note|number_format %}&#9733;{% else %}&#9734;{% endif %}
                        {% endfor %}
                    </span>
                </div>
                <p class=\"mb-0 text-muted\">{{ feedback.commentaire }}</p>
            </div>
        </div>
        
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\">Your Response</h5>
            </div>
            <div class=\"card-body\">
                {% if errors is defined and errors|length > 0 %}
                <div class=\"alert alert-danger\">
                    <h6><i class=\"bi bi-exclamation-triangle-fill me-2\"></i>Please fix the following errors:</h6>
                    <ul class=\"mb-0 mt-2\">
                        {% for field, error in errors %}
                        <li>{{ error }}</li>
                        {% endfor %}
                    </ul>
                </div>
                {% endif %}

                <form method=\"post\" novalidate>
                    <div class=\"mb-4\">
                        <label for=\"contenu\" class=\"form-label\">Response Content <span class=\"text-danger\">*</span></label>
                        <textarea 
                            name=\"contenu\" 
                            id=\"contenu\" 
                            class=\"form-control {% if errors['contenu'] is defined or errors['profanity'] is defined %}is-invalid{% endif %}\" 
                            rows=\"5\" 
                            required 
                            placeholder=\"Write your response here... (minimum 10 characters)\"
                        ></textarea>
                        {% if errors['contenu'] is defined %}
                        <div class=\"invalid-feedback\">{{ errors['contenu'] }}</div>
                        {% endif %}
                        {% if errors['profanity'] is defined %}
                        <div class=\"invalid-feedback d-block\">
                            <i class=\"bi bi-shield-exclamation me-1\"></i>{{ errors['profanity'] }}
                        </div>
                        {% endif %}
                        <div class=\"form-text\">Your response will be checked for inappropriate language.</div>
                        <div class=\"mt-3 d-flex align-items-center gap-2 flex-wrap\">
                            <button type=\"button\" class=\"btn btn-outline-primary btn-sm\" data-spellcheck-target=\"#contenu\" data-spellcheck-result=\"#response-spellcheck-result\">
                                <i class=\"bi bi-spellcheck me-1\"></i> Verifier l'orthographe
                            </button>
                        </div>
                        <div id=\"response-spellcheck-result\" hidden></div>
                    </div>
                    
                    <div class=\"d-flex gap-2\">
                        <button type=\"submit\" class=\"btn btn-primary\">
                            <i class=\"bi bi-send me-1\"></i> Submit Response
                        </button>
                        <a href=\"{{ path('app_feedback_show', {'id': feedback.id}) }}\" class=\"btn btn-outline-secondary\">
                            <i class=\"bi bi-x-lg me-1\"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class=\"col-lg-4\">
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\"><i class=\"bi bi-lightbulb me-2\"></i>Tips</h5>
            </div>
            <div class=\"card-body\">
                <ul class=\"list-unstyled mb-0\">
                    <li class=\"mb-3\">
                        <i class=\"bi bi-check-circle-fill text-success me-2\"></i>
                        Be professional and helpful
                    </li>
                    <li class=\"mb-3\">
                        <i class=\"bi bi-check-circle-fill text-success me-2\"></i>
                        Address the concerns raised
                    </li>
                    <li class=\"mb-3\">
                        <i class=\"bi bi-check-circle-fill text-success me-2\"></i>
                        Offer solutions when possible
                    </li>
                    <li>
                        <i class=\"bi bi-x-circle-fill text-danger me-2\"></i>
                        Keep responses respectful
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
{% endblock %}

{% block javascripts %}
{{ parent() }}
{% include 'feedback/_spellcheck_script.html.twig' %}
{% endblock %}
", "feedback/reponse_new.html.twig", "C:\\Users\\Skaina\\Desktop\\final version symfony\\Marketplace-Project\\web\\templates\\feedback\\reponse_new.html.twig");
    }
}
