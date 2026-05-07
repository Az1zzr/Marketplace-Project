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

/* dashboard/front.html.twig */
class __TwigTemplate_19559ada7c3869becaf8e4e26330b9a4 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard/front.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard/front.html.twig"));

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

        yield "Marketplace Home";
        
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
        yield "<li class=\"breadcrumb-item active\" aria-current=\"page\">Dashboard</li>
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
    <h1>
        ";
        // line 12
        if (((isset($context["roleCode"]) || array_key_exists("roleCode", $context) ? $context["roleCode"] : (function () { throw new RuntimeError('Variable "roleCode" does not exist.', 12, $this->source); })()) == "fournisseur")) {
            // line 13
            yield "        Fournisseur Dashboard
        ";
        } else {
            // line 15
            yield "        Client Dashboard
        ";
        }
        // line 17
        yield "    </h1>
    <p>
        ";
        // line 19
        if (((isset($context["roleCode"]) || array_key_exists("roleCode", $context) ? $context["roleCode"] : (function () { throw new RuntimeError('Variable "roleCode" does not exist.', 19, $this->source); })()) == "fournisseur")) {
            // line 20
            yield "        Publish products, sort them into categories, receive client orders, and assign delivery drivers.
        ";
        } else {
            // line 22
            yield "        Browse products, place orders, follow deliveries, and share your buying experience.
        ";
        }
        // line 24
        yield "    </p>
</div>

<div class=\"stat-grid mb-4\">
    <div class=\"stat-card\">
        <div class=\"stat-label\">Products</div>
        <div class=\"stat-value\">";
        // line 30
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 30, $this->source); })()), "products", [], "any", false, false, false, 30), "html", null, true);
        yield "</div>
        <div class=\"stat-note\">Products currently visible in the marketplace</div>
    </div>
    ";
        // line 33
        if (((isset($context["roleCode"]) || array_key_exists("roleCode", $context) ? $context["roleCode"] : (function () { throw new RuntimeError('Variable "roleCode" does not exist.', 33, $this->source); })()) == "fournisseur")) {
            // line 34
            yield "    <div class=\"stat-card\">
        <div class=\"stat-label\">Categories</div>
        <div class=\"stat-value\">";
            // line 36
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 36, $this->source); })()), "categories", [], "any", false, false, false, 36), "html", null, true);
            yield "</div>
        <div class=\"stat-note\">Product groups available to organize your catalog</div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-label\">Feedback Threads</div>
        <div class=\"stat-value\">";
            // line 41
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 41, $this->source); })()), "feedbacks", [], "any", false, false, false, 41), "html", null, true);
            yield "</div>
        <div class=\"stat-note\">Customer conversations you can answer</div>
    </div>
    ";
        } else {
            // line 45
            yield "    <div class=\"stat-card\">
        <div class=\"stat-label\">Orders</div>
        <div class=\"stat-value\">";
            // line 47
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 47, $this->source); })()), "orders", [], "any", false, false, false, 47), "html", null, true);
            yield "</div>
        <div class=\"stat-note\">Orders currently tracked by the platform</div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-label\">Feedbacks</div>
        <div class=\"stat-value\">";
            // line 52
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 52, $this->source); })()), "feedbacks", [], "any", false, false, false, 52), "html", null, true);
            yield "</div>
        <div class=\"stat-note\">Community reviews and discussion threads</div>
    </div>
    ";
        }
        // line 56
        yield "</div>

";
        // line 58
        if ((((isset($context["roleCode"]) || array_key_exists("roleCode", $context) ? $context["roleCode"] : (function () { throw new RuntimeError('Variable "roleCode" does not exist.', 58, $this->source); })()) == "fournisseur") && (isset($context["feedbackInsights"]) || array_key_exists("feedbackInsights", $context) ? $context["feedbackInsights"] : (function () { throw new RuntimeError('Variable "feedbackInsights" does not exist.', 58, $this->source); })()))) {
            // line 59
            yield "<div class=\"stat-grid mb-4\">
    <div class=\"stat-card\">
        <div class=\"stat-label\">Feedbacks Urgents</div>
        <div class=\"stat-value\">";
            // line 62
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedbackInsights"]) || array_key_exists("feedbackInsights", $context) ? $context["feedbackInsights"] : (function () { throw new RuntimeError('Variable "feedbackInsights" does not exist.', 62, $this->source); })()), "urgentCount", [], "any", false, false, false, 62), "html", null, true);
            yield "</div>
        <div class=\"stat-note\">Feedbacks prioritaires concernant vos produits ou livraisons</div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-label\">A Traiter</div>
        <div class=\"stat-value\">";
            // line 67
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedbackInsights"]) || array_key_exists("feedbackInsights", $context) ? $context["feedbackInsights"] : (function () { throw new RuntimeError('Variable "feedbackInsights" does not exist.', 67, $this->source); })()), "attentionCount", [], "any", false, false, false, 67), "html", null, true);
            yield "</div>
        <div class=\"stat-note\">Feedbacks a revoir rapidement</div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-label\">Sans Reponse</div>
        <div class=\"stat-value\">";
            // line 72
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedbackInsights"]) || array_key_exists("feedbackInsights", $context) ? $context["feedbackInsights"] : (function () { throw new RuntimeError('Variable "feedbackInsights" does not exist.', 72, $this->source); })()), "unansweredCount", [], "any", false, false, false, 72), "html", null, true);
            yield "</div>
        <div class=\"stat-note\">Clients qui attendent encore une reponse</div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-label\">Sujet Principal</div>
        <div class=\"stat-value fs-3\">";
            // line 77
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedbackInsights"]) || array_key_exists("feedbackInsights", $context) ? $context["feedbackInsights"] : (function () { throw new RuntimeError('Variable "feedbackInsights" does not exist.', 77, $this->source); })()), "topTopicLabel", [], "any", false, false, false, 77), "html", null, true);
            yield "</div>
        <div class=\"stat-note\">Theme le plus frequent dans les feedbacks recus</div>
    </div>
</div>
";
        }
        // line 82
        yield "
<div class=\"row g-4\">
    <div class=\"col-lg-8\">
        <div class=\"card h-100\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\">Your Main Actions</h5>
            </div>
            <div class=\"card-body\">
                <div class=\"row g-3\">
                    <div class=\"col-md-6\">
                        <a href=\"";
        // line 92
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_index");
        yield "\" class=\"btn btn-outline-primary w-100 py-3\">Browse Products</a>
                    </div>
                    ";
        // line 94
        if (((isset($context["roleCode"]) || array_key_exists("roleCode", $context) ? $context["roleCode"] : (function () { throw new RuntimeError('Variable "roleCode" does not exist.', 94, $this->source); })()) == "fournisseur")) {
            // line 95
            yield "                    <div class=\"col-md-6\">
                        <a href=\"";
            // line 96
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_new");
            yield "\" class=\"btn btn-outline-primary w-100 py-3\">Add Product</a>
                    </div>
                    <div class=\"col-md-6\">
                        <a href=\"";
            // line 99
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_categorie_index");
            yield "\" class=\"btn btn-outline-secondary w-100 py-3\">Manage Categories</a>
                    </div>
                    <div class=\"col-md-6\">
                        <a href=\"";
            // line 102
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_commande_index");
            yield "\" class=\"btn btn-outline-secondary w-100 py-3\">Client Orders</a>
                    </div>
                    <div class=\"col-md-6\">
                        <a href=\"";
            // line 105
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_livraison_index");
            yield "\" class=\"btn btn-outline-secondary w-100 py-3\">Manage Deliveries</a>
                    </div>
                    <div class=\"col-md-6\">
                        <a href=\"";
            // line 108
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_feedback_index");
            yield "\" class=\"btn btn-outline-secondary w-100 py-3\">Reply to Feedback</a>
                    </div>
                    <div class=\"col-md-6\">
                        <a href=\"";
            // line 111
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_feedback_export_pdf");
            yield "\" class=\"btn btn-outline-dark w-100 py-3\">Exporter Feedback PDF</a>
                    </div>
                    ";
        } else {
            // line 114
            yield "                    <div class=\"col-md-6\">
                        <a href=\"";
            // line 115
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_commande_index");
            yield "\" class=\"btn btn-outline-primary w-100 py-3\">My Orders</a>
                    </div>
                    <div class=\"col-md-6\">
                        <a href=\"";
            // line 118
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_livraison_index");
            yield "\" class=\"btn btn-outline-secondary w-100 py-3\">Track Deliveries</a>
                    </div>
                    <div class=\"col-md-6\">
                        <a href=\"";
            // line 121
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_feedback_index");
            yield "\" class=\"btn btn-outline-secondary w-100 py-3\">Write Feedback</a>
                    </div>
                    ";
        }
        // line 124
        yield "                </div>
            </div>
        </div>
    </div>

    <div class=\"col-lg-4\">
        <div class=\"card h-100\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\">Role Summary</h5>
            </div>
            <div class=\"card-body\">
                ";
        // line 135
        if (((isset($context["roleCode"]) || array_key_exists("roleCode", $context) ? $context["roleCode"] : (function () { throw new RuntimeError('Variable "roleCode" does not exist.', 135, $this->source); })()) == "fournisseur")) {
            // line 136
            yield "                <p class=\"text-muted mb-0\">You are in supplier mode. You can manage products and categories, receive client orders for your catalog, and assign deliveries.</p>
                ";
        } else {
            // line 138
            yield "                <p class=\"text-muted mb-0\">You are in client mode. You can browse the marketplace, create orders, follow deliveries, and publish feedback.</p>
                ";
        }
        // line 140
        yield "            </div>
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
        return "dashboard/front.html.twig";
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
        return array (  353 => 140,  349 => 138,  345 => 136,  343 => 135,  330 => 124,  324 => 121,  318 => 118,  312 => 115,  309 => 114,  303 => 111,  297 => 108,  291 => 105,  285 => 102,  279 => 99,  273 => 96,  270 => 95,  268 => 94,  263 => 92,  251 => 82,  243 => 77,  235 => 72,  227 => 67,  219 => 62,  214 => 59,  212 => 58,  208 => 56,  201 => 52,  193 => 47,  189 => 45,  182 => 41,  174 => 36,  170 => 34,  168 => 33,  162 => 30,  154 => 24,  150 => 22,  146 => 20,  144 => 19,  140 => 17,  136 => 15,  132 => 13,  130 => 12,  126 => 10,  113 => 9,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Marketplace Home{% endblock %}

{% block breadcrumb %}
<li class=\"breadcrumb-item active\" aria-current=\"page\">Dashboard</li>
{% endblock %}

{% block body %}
<div class=\"page-header\">
    <h1>
        {% if roleCode == 'fournisseur' %}
        Fournisseur Dashboard
        {% else %}
        Client Dashboard
        {% endif %}
    </h1>
    <p>
        {% if roleCode == 'fournisseur' %}
        Publish products, sort them into categories, receive client orders, and assign delivery drivers.
        {% else %}
        Browse products, place orders, follow deliveries, and share your buying experience.
        {% endif %}
    </p>
</div>

<div class=\"stat-grid mb-4\">
    <div class=\"stat-card\">
        <div class=\"stat-label\">Products</div>
        <div class=\"stat-value\">{{ stats.products }}</div>
        <div class=\"stat-note\">Products currently visible in the marketplace</div>
    </div>
    {% if roleCode == 'fournisseur' %}
    <div class=\"stat-card\">
        <div class=\"stat-label\">Categories</div>
        <div class=\"stat-value\">{{ stats.categories }}</div>
        <div class=\"stat-note\">Product groups available to organize your catalog</div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-label\">Feedback Threads</div>
        <div class=\"stat-value\">{{ stats.feedbacks }}</div>
        <div class=\"stat-note\">Customer conversations you can answer</div>
    </div>
    {% else %}
    <div class=\"stat-card\">
        <div class=\"stat-label\">Orders</div>
        <div class=\"stat-value\">{{ stats.orders }}</div>
        <div class=\"stat-note\">Orders currently tracked by the platform</div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-label\">Feedbacks</div>
        <div class=\"stat-value\">{{ stats.feedbacks }}</div>
        <div class=\"stat-note\">Community reviews and discussion threads</div>
    </div>
    {% endif %}
</div>

{% if roleCode == 'fournisseur' and feedbackInsights %}
<div class=\"stat-grid mb-4\">
    <div class=\"stat-card\">
        <div class=\"stat-label\">Feedbacks Urgents</div>
        <div class=\"stat-value\">{{ feedbackInsights.urgentCount }}</div>
        <div class=\"stat-note\">Feedbacks prioritaires concernant vos produits ou livraisons</div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-label\">A Traiter</div>
        <div class=\"stat-value\">{{ feedbackInsights.attentionCount }}</div>
        <div class=\"stat-note\">Feedbacks a revoir rapidement</div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-label\">Sans Reponse</div>
        <div class=\"stat-value\">{{ feedbackInsights.unansweredCount }}</div>
        <div class=\"stat-note\">Clients qui attendent encore une reponse</div>
    </div>
    <div class=\"stat-card\">
        <div class=\"stat-label\">Sujet Principal</div>
        <div class=\"stat-value fs-3\">{{ feedbackInsights.topTopicLabel }}</div>
        <div class=\"stat-note\">Theme le plus frequent dans les feedbacks recus</div>
    </div>
</div>
{% endif %}

<div class=\"row g-4\">
    <div class=\"col-lg-8\">
        <div class=\"card h-100\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\">Your Main Actions</h5>
            </div>
            <div class=\"card-body\">
                <div class=\"row g-3\">
                    <div class=\"col-md-6\">
                        <a href=\"{{ path('app_produit_index') }}\" class=\"btn btn-outline-primary w-100 py-3\">Browse Products</a>
                    </div>
                    {% if roleCode == 'fournisseur' %}
                    <div class=\"col-md-6\">
                        <a href=\"{{ path('app_produit_new') }}\" class=\"btn btn-outline-primary w-100 py-3\">Add Product</a>
                    </div>
                    <div class=\"col-md-6\">
                        <a href=\"{{ path('app_categorie_index') }}\" class=\"btn btn-outline-secondary w-100 py-3\">Manage Categories</a>
                    </div>
                    <div class=\"col-md-6\">
                        <a href=\"{{ path('app_commande_index') }}\" class=\"btn btn-outline-secondary w-100 py-3\">Client Orders</a>
                    </div>
                    <div class=\"col-md-6\">
                        <a href=\"{{ path('app_livraison_index') }}\" class=\"btn btn-outline-secondary w-100 py-3\">Manage Deliveries</a>
                    </div>
                    <div class=\"col-md-6\">
                        <a href=\"{{ path('app_feedback_index') }}\" class=\"btn btn-outline-secondary w-100 py-3\">Reply to Feedback</a>
                    </div>
                    <div class=\"col-md-6\">
                        <a href=\"{{ path('app_feedback_export_pdf') }}\" class=\"btn btn-outline-dark w-100 py-3\">Exporter Feedback PDF</a>
                    </div>
                    {% else %}
                    <div class=\"col-md-6\">
                        <a href=\"{{ path('app_commande_index') }}\" class=\"btn btn-outline-primary w-100 py-3\">My Orders</a>
                    </div>
                    <div class=\"col-md-6\">
                        <a href=\"{{ path('app_livraison_index') }}\" class=\"btn btn-outline-secondary w-100 py-3\">Track Deliveries</a>
                    </div>
                    <div class=\"col-md-6\">
                        <a href=\"{{ path('app_feedback_index') }}\" class=\"btn btn-outline-secondary w-100 py-3\">Write Feedback</a>
                    </div>
                    {% endif %}
                </div>
            </div>
        </div>
    </div>

    <div class=\"col-lg-4\">
        <div class=\"card h-100\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\">Role Summary</h5>
            </div>
            <div class=\"card-body\">
                {% if roleCode == 'fournisseur' %}
                <p class=\"text-muted mb-0\">You are in supplier mode. You can manage products and categories, receive client orders for your catalog, and assign deliveries.</p>
                {% else %}
                <p class=\"text-muted mb-0\">You are in client mode. You can browse the marketplace, create orders, follow deliveries, and publish feedback.</p>
                {% endif %}
            </div>
        </div>
    </div>
</div>
{% endblock %}
", "dashboard/front.html.twig", "C:\\Users\\Skaina\\Desktop\\final version symfony\\Marketplace-Project\\web\\templates\\dashboard\\front.html.twig");
    }
}
