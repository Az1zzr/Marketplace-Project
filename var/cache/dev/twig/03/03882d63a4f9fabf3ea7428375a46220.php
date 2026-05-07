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

/* dashboard/admin.html.twig */
class __TwigTemplate_8394b15c96eb84eb1403679006a8804b extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard/admin.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard/admin.html.twig"));

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

        yield "Admin Dashboard";
        
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
        yield "<li class=\"breadcrumb-item active\" aria-current=\"page\">Admin Dashboard</li>
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
        yield "<div class=\"page-header\">
    <h1>Admin Dashboard</h1>
    <p>Oversee the marketplace, manage users, and monitor the full activity of the platform.</p>
</div>

<div class=\"stat-grid mb-4\">
    <div class=\"stat-card\">
        <div class=\"stat-label\">Products</div>
        <div class=\"stat-value\">";
        // line 18
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 18, $this->source); })()), "products", [], "any", false, false, false, 18), "html", null, true);
        yield "</div>
        <div class=\"stat-note\">Catalog entries currently available</div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-label\">Orders</div>
        <div class=\"stat-value\">";
        // line 23
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 23, $this->source); })()), "orders", [], "any", false, false, false, 23), "html", null, true);
        yield "</div>
        <div class=\"stat-note\">Total orders recorded in the system</div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-label\">Feedbacks</div>
        <div class=\"stat-value\">";
        // line 28
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 28, $this->source); })()), "feedbacks", [], "any", false, false, false, 28), "html", null, true);
        yield "</div>
        <div class=\"stat-note\">Reviews and discussions to moderate</div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-label\">Users</div>
        <div class=\"stat-value\">";
        // line 33
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 33, $this->source); })()), "users", [], "any", false, false, false, 33), "html", null, true);
        yield "</div>
        <div class=\"stat-note\">All registered accounts across roles</div>
    </div>
</div>

<div class=\"stat-grid mb-4\">
    <div class=\"stat-card\">
        <div class=\"stat-label\">Feedbacks Urgents</div>
        <div class=\"stat-value\">";
        // line 41
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedbackInsights"]) || array_key_exists("feedbackInsights", $context) ? $context["feedbackInsights"] : (function () { throw new RuntimeError('Variable "feedbackInsights" does not exist.', 41, $this->source); })()), "urgentCount", [], "any", false, false, false, 41), "html", null, true);
        yield "</div>
        <div class=\"stat-note\">Retours negatifs ou mal notes qui demandent une moderation rapide</div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-label\">A Traiter</div>
        <div class=\"stat-value\">";
        // line 46
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedbackInsights"]) || array_key_exists("feedbackInsights", $context) ? $context["feedbackInsights"] : (function () { throw new RuntimeError('Variable "feedbackInsights" does not exist.', 46, $this->source); })()), "attentionCount", [], "any", false, false, false, 46), "html", null, true);
        yield "</div>
        <div class=\"stat-note\">Feedbacks qui demandent encore une action rapide</div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-label\">Sans Reponse</div>
        <div class=\"stat-value\">";
        // line 51
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedbackInsights"]) || array_key_exists("feedbackInsights", $context) ? $context["feedbackInsights"] : (function () { throw new RuntimeError('Variable "feedbackInsights" does not exist.', 51, $this->source); })()), "unansweredCount", [], "any", false, false, false, 51), "html", null, true);
        yield "</div>
        <div class=\"stat-note\">Feedbacks qui n'ont recu aucune reponse</div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-label\">Sujet Principal</div>
        <div class=\"stat-value fs-3\">";
        // line 56
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedbackInsights"]) || array_key_exists("feedbackInsights", $context) ? $context["feedbackInsights"] : (function () { throw new RuntimeError('Variable "feedbackInsights" does not exist.', 56, $this->source); })()), "topTopicLabel", [], "any", false, false, false, 56), "html", null, true);
        yield "</div>
        <div class=\"stat-note\">Theme le plus present dans les feedbacks visibles</div>
    </div>
</div>

<div class=\"row g-4\">
    <div class=\"col-lg-8\">
        <div class=\"card h-100\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\">Admin Actions</h5>
            </div>
            <div class=\"card-body\">
                <div class=\"row g-3\">
                    <div class=\"col-md-6\">
                        <a href=\"";
        // line 70
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_user_index");
        yield "\" class=\"btn btn-outline-primary w-100 py-3\">Manage Users</a>
                    </div>
                    <div class=\"col-md-6\">
                        <a href=\"";
        // line 73
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_role_index");
        yield "\" class=\"btn btn-outline-primary w-100 py-3\">Manage Roles</a>
                    </div>
                    <div class=\"col-md-6\">
                        <a href=\"";
        // line 76
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_index");
        yield "\" class=\"btn btn-outline-secondary w-100 py-3\">Review Products</a>
                    </div>
                    <div class=\"col-md-6\">
                        <a href=\"";
        // line 79
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_feedback_index");
        yield "\" class=\"btn btn-outline-secondary w-100 py-3\">Moderate Feedback</a>
                    </div>
                    <div class=\"col-md-6\">
                        <a href=\"";
        // line 82
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_feedback_export_pdf");
        yield "\" class=\"btn btn-outline-dark w-100 py-3\">Exporter Feedback PDF</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=\"col-lg-4\">
        <div class=\"card h-100\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\">Current Scope</h5>
            </div>
            <div class=\"card-body\">
                <p class=\"text-muted mb-3\">The back office is now visually separated from the marketplace experience.</p>
                <ul class=\"mb-0 text-muted\">
                    <li>Admin has a dedicated backend layout.</li>
                    <li>Only admin can access user and role management.</li>
                    <li>Operational sections stay visible from one control center.</li>
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

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "dashboard/admin.html.twig";
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
        return array (  236 => 82,  230 => 79,  224 => 76,  218 => 73,  212 => 70,  195 => 56,  187 => 51,  179 => 46,  171 => 41,  160 => 33,  152 => 28,  144 => 23,  136 => 18,  126 => 10,  113 => 9,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Admin Dashboard{% endblock %}

{% block breadcrumb %}
<li class=\"breadcrumb-item active\" aria-current=\"page\">Admin Dashboard</li>
{% endblock %}

{% block body %}
<div class=\"page-header\">
    <h1>Admin Dashboard</h1>
    <p>Oversee the marketplace, manage users, and monitor the full activity of the platform.</p>
</div>

<div class=\"stat-grid mb-4\">
    <div class=\"stat-card\">
        <div class=\"stat-label\">Products</div>
        <div class=\"stat-value\">{{ stats.products }}</div>
        <div class=\"stat-note\">Catalog entries currently available</div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-label\">Orders</div>
        <div class=\"stat-value\">{{ stats.orders }}</div>
        <div class=\"stat-note\">Total orders recorded in the system</div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-label\">Feedbacks</div>
        <div class=\"stat-value\">{{ stats.feedbacks }}</div>
        <div class=\"stat-note\">Reviews and discussions to moderate</div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-label\">Users</div>
        <div class=\"stat-value\">{{ stats.users }}</div>
        <div class=\"stat-note\">All registered accounts across roles</div>
    </div>
</div>

<div class=\"stat-grid mb-4\">
    <div class=\"stat-card\">
        <div class=\"stat-label\">Feedbacks Urgents</div>
        <div class=\"stat-value\">{{ feedbackInsights.urgentCount }}</div>
        <div class=\"stat-note\">Retours negatifs ou mal notes qui demandent une moderation rapide</div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-label\">A Traiter</div>
        <div class=\"stat-value\">{{ feedbackInsights.attentionCount }}</div>
        <div class=\"stat-note\">Feedbacks qui demandent encore une action rapide</div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-label\">Sans Reponse</div>
        <div class=\"stat-value\">{{ feedbackInsights.unansweredCount }}</div>
        <div class=\"stat-note\">Feedbacks qui n'ont recu aucune reponse</div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-label\">Sujet Principal</div>
        <div class=\"stat-value fs-3\">{{ feedbackInsights.topTopicLabel }}</div>
        <div class=\"stat-note\">Theme le plus present dans les feedbacks visibles</div>
    </div>
</div>

<div class=\"row g-4\">
    <div class=\"col-lg-8\">
        <div class=\"card h-100\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\">Admin Actions</h5>
            </div>
            <div class=\"card-body\">
                <div class=\"row g-3\">
                    <div class=\"col-md-6\">
                        <a href=\"{{ path('app_user_index') }}\" class=\"btn btn-outline-primary w-100 py-3\">Manage Users</a>
                    </div>
                    <div class=\"col-md-6\">
                        <a href=\"{{ path('app_role_index') }}\" class=\"btn btn-outline-primary w-100 py-3\">Manage Roles</a>
                    </div>
                    <div class=\"col-md-6\">
                        <a href=\"{{ path('app_produit_index') }}\" class=\"btn btn-outline-secondary w-100 py-3\">Review Products</a>
                    </div>
                    <div class=\"col-md-6\">
                        <a href=\"{{ path('app_feedback_index') }}\" class=\"btn btn-outline-secondary w-100 py-3\">Moderate Feedback</a>
                    </div>
                    <div class=\"col-md-6\">
                        <a href=\"{{ path('app_feedback_export_pdf') }}\" class=\"btn btn-outline-dark w-100 py-3\">Exporter Feedback PDF</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=\"col-lg-4\">
        <div class=\"card h-100\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\">Current Scope</h5>
            </div>
            <div class=\"card-body\">
                <p class=\"text-muted mb-3\">The back office is now visually separated from the marketplace experience.</p>
                <ul class=\"mb-0 text-muted\">
                    <li>Admin has a dedicated backend layout.</li>
                    <li>Only admin can access user and role management.</li>
                    <li>Operational sections stay visible from one control center.</li>
                </ul>
            </div>
        </div>
    </div>
</div>
{% endblock %}
", "dashboard/admin.html.twig", "C:\\Users\\Skaina\\Desktop\\final version symfony\\Marketplace-Project\\web\\templates\\dashboard\\admin.html.twig");
    }
}
