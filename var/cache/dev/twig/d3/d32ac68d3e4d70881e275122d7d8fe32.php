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

/* home.html.twig */
class __TwigTemplate_d4674ff353f491279897ff2ad441c4d6 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home.html.twig"));

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

        yield "Dashboard";
        
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
    <h1>Dashboard</h1>
    <p>Welcome back, ";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 12, $this->source); })()), "user", [], "any", false, false, false, 12), "prenom", [], "any", false, false, false, 12), "html", null, true);
        yield "! Here's what's happening today.</p>
</div>

<!-- Stats Row -->
<div class=\"row g-4 mb-4\">
    <div class=\"col-xl-3 col-md-6\">
        <div class=\"card stat-card primary\">
            <div class=\"d-flex justify-content-between align-items-center\">
                <div>
                    <div class=\"stat-label\">Total Products</div>
                    <div class=\"stat-value\">--</div>
                </div>
                <div class=\"stat-icon\"><i class=\"bi bi-box-seam\"></i></div>
            </div>
        </div>
    </div>
    <div class=\"col-xl-3 col-md-6\">
        <div class=\"card stat-card success\">
            <div class=\"d-flex justify-content-between align-items-center\">
                <div>
                    <div class=\"stat-label\">Total Orders</div>
                    <div class=\"stat-value\">--</div>
                </div>
                <div class=\"stat-icon\"><i class=\"bi bi-cart-check\"></i></div>
            </div>
        </div>
    </div>
    <div class=\"col-xl-3 col-md-6\">
        <div class=\"card stat-card warning\">
            <div class=\"d-flex justify-content-between align-items-center\">
                <div>
                    <div class=\"stat-label\">Pending Deliveries</div>
                    <div class=\"stat-value\">--</div>
                </div>
                <div class=\"stat-icon\"><i class=\"bi bi-truck\"></i></div>
            </div>
        </div>
    </div>
    <div class=\"col-xl-3 col-md-6\">
        <div class=\"card stat-card info\">
            <div class=\"d-flex justify-content-between align-items-center\">
                <div>
                    <div class=\"stat-label\">Total Users</div>
                    <div class=\"stat-value\">--</div>
                </div>
                <div class=\"stat-icon\"><i class=\"bi bi-people\"></i></div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class=\"row g-4\">
    <div class=\"col-xl-8\">
        <div class=\"card\">
            <div class=\"card-header d-flex justify-content-between align-items-center\">
                <h5 class=\"mb-0\"><i class=\"bi bi-lightning-charge me-2\"></i>Quick Actions</h5>
            </div>
            <div class=\"card-body\">
                <div class=\"row g-3\">
                    <div class=\"col-md-6 col-lg-4\">
                        <a href=\"";
        // line 73
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_new");
        yield "\" class=\"text-decoration-none\">
                            <div class=\"p-3 rounded border text-center h-100 hover-shadow\" style=\"transition: all 0.2s;\">
                                <div class=\"mb-2\"><i class=\"bi bi-plus-circle fs-1 text-primary\"></i></div>
                                <h6 class=\"mb-1 text-dark\">Add Product</h6>
                                <small class=\"text-muted\">Create new product listing</small>
                            </div>
                        </a>
                    </div>
                    <div class=\"col-md-6 col-lg-4\">
                        <a href=\"";
        // line 82
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_commande_new");
        yield "\" class=\"text-decoration-none\">
                            <div class=\"p-3 rounded border text-center h-100 hover-shadow\" style=\"transition: all 0.2s;\">
                                <div class=\"mb-2\"><i class=\"bi bi-cart-plus fs-1 text-success\"></i></div>
                                <h6 class=\"mb-1 text-dark\">New Order</h6>
                                <small class=\"text-muted\">Create customer order</small>
                            </div>
                        </a>
                    </div>
                    <div class=\"col-md-6 col-lg-4\">
                        <a href=\"";
        // line 91
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_feedback_new");
        yield "\" class=\"text-decoration-none\">
                            <div class=\"p-3 rounded border text-center h-100 hover-shadow\" style=\"transition: all 0.2s;\">
                                <div class=\"mb-2\"><i class=\"bi bi-chat-heart fs-1 text-warning\"></i></div>
                                <h6 class=\"mb-1 text-dark\">Add Feedback</h6>
                                <small class=\"text-muted\">Share your experience</small>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class=\"col-xl-4\">
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\"><i class=\"bi bi-speedometer2 me-2\"></i>Your Info</h5>
            </div>
            <div class=\"card-body\">
                <div class=\"d-flex align-items-center mb-3\">
                    ";
        // line 111
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 111, $this->source); })()), "user", [], "any", false, false, false, 111), "photoPath", [], "any", false, false, false, 111)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 112
            yield "                    <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 112, $this->source); })()), "user", [], "any", false, false, false, 112), "photoPath", [], "any", false, false, false, 112), "html", null, true);
            yield "\" alt=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 112, $this->source); })()), "user", [], "any", false, false, false, 112), "nomComplet", [], "any", false, false, false, 112), "html", null, true);
            yield "\" class=\"rounded-circle me-3 border\" style=\"width: 60px; height: 60px; object-fit: cover;\">
                    ";
        } else {
            // line 114
            yield "                    <div class=\"user-avatar me-3\" style=\"width: 60px; height: 60px; font-size: 1.5rem;\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 114, $this->source); })()), "user", [], "any", false, false, false, 114), "prenom", [], "any", false, false, false, 114)), "html", null, true);
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 114, $this->source); })()), "user", [], "any", false, false, false, 114), "nom", [], "any", false, false, false, 114)), "html", null, true);
            yield "</div>
                    ";
        }
        // line 116
        yield "                    <div>
                        <h5 class=\"mb-1\">";
        // line 117
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 117, $this->source); })()), "user", [], "any", false, false, false, 117), "nomComplet", [], "any", false, false, false, 117), "html", null, true);
        yield "</h5>
                        <p class=\"text-muted mb-0\">";
        // line 118
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 118, $this->source); })()), "user", [], "any", false, false, false, 118), "email", [], "any", false, false, false, 118), "html", null, true);
        yield "</p>
                    </div>
                </div>
                <hr>
                <div class=\"mb-2\">
                    <span class=\"badge bg-primary\">";
        // line 123
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 123, $this->source); })()), "user", [], "any", false, false, false, 123), "role", [], "any", false, false, false, 123), "nomRole", [], "any", false, false, false, 123), "html", null, true);
        yield "</span>
                </div>
                ";
        // line 125
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 125, $this->source); })()), "user", [], "any", false, false, false, 125), "telephone", [], "any", false, false, false, 125)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 126
            yield "                <p class=\"mb-1\"><i class=\"bi bi-telephone me-2 text-muted\"></i>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 126, $this->source); })()), "user", [], "any", false, false, false, 126), "telephone", [], "any", false, false, false, 126), "html", null, true);
            yield "</p>
                ";
        }
        // line 128
        yield "                ";
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 128, $this->source); })()), "user", [], "any", false, false, false, 128), "dateNaissance", [], "any", false, false, false, 128)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 129
            yield "                <p class=\"mb-0\"><i class=\"bi bi-calendar me-2 text-muted\"></i>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 129, $this->source); })()), "user", [], "any", false, false, false, 129), "dateNaissance", [], "any", false, false, false, 129), "Y-m-d"), "html", null, true);
            yield "</p>
                ";
        }
        // line 131
        yield "                <div class=\"mt-3\">
                    <a href=\"";
        // line 132
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_account_profile");
        yield "\" class=\"btn btn-outline-primary btn-sm\">
                        <i class=\"bi bi-person-circle me-1\"></i> Edit My Profile
                    </a>
                </div>
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
        return "home.html.twig";
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
        return array (  298 => 132,  295 => 131,  289 => 129,  286 => 128,  280 => 126,  278 => 125,  273 => 123,  265 => 118,  261 => 117,  258 => 116,  251 => 114,  243 => 112,  241 => 111,  218 => 91,  206 => 82,  194 => 73,  130 => 12,  126 => 10,  113 => 9,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Dashboard{% endblock %}

{% block breadcrumb %}
<li class=\"breadcrumb-item active\" aria-current=\"page\">Dashboard</li>
{% endblock %}

{% block body %}
<div class=\"page-header\">
    <h1>Dashboard</h1>
    <p>Welcome back, {{ app.user.prenom }}! Here's what's happening today.</p>
</div>

<!-- Stats Row -->
<div class=\"row g-4 mb-4\">
    <div class=\"col-xl-3 col-md-6\">
        <div class=\"card stat-card primary\">
            <div class=\"d-flex justify-content-between align-items-center\">
                <div>
                    <div class=\"stat-label\">Total Products</div>
                    <div class=\"stat-value\">--</div>
                </div>
                <div class=\"stat-icon\"><i class=\"bi bi-box-seam\"></i></div>
            </div>
        </div>
    </div>
    <div class=\"col-xl-3 col-md-6\">
        <div class=\"card stat-card success\">
            <div class=\"d-flex justify-content-between align-items-center\">
                <div>
                    <div class=\"stat-label\">Total Orders</div>
                    <div class=\"stat-value\">--</div>
                </div>
                <div class=\"stat-icon\"><i class=\"bi bi-cart-check\"></i></div>
            </div>
        </div>
    </div>
    <div class=\"col-xl-3 col-md-6\">
        <div class=\"card stat-card warning\">
            <div class=\"d-flex justify-content-between align-items-center\">
                <div>
                    <div class=\"stat-label\">Pending Deliveries</div>
                    <div class=\"stat-value\">--</div>
                </div>
                <div class=\"stat-icon\"><i class=\"bi bi-truck\"></i></div>
            </div>
        </div>
    </div>
    <div class=\"col-xl-3 col-md-6\">
        <div class=\"card stat-card info\">
            <div class=\"d-flex justify-content-between align-items-center\">
                <div>
                    <div class=\"stat-label\">Total Users</div>
                    <div class=\"stat-value\">--</div>
                </div>
                <div class=\"stat-icon\"><i class=\"bi bi-people\"></i></div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class=\"row g-4\">
    <div class=\"col-xl-8\">
        <div class=\"card\">
            <div class=\"card-header d-flex justify-content-between align-items-center\">
                <h5 class=\"mb-0\"><i class=\"bi bi-lightning-charge me-2\"></i>Quick Actions</h5>
            </div>
            <div class=\"card-body\">
                <div class=\"row g-3\">
                    <div class=\"col-md-6 col-lg-4\">
                        <a href=\"{{ path('app_produit_new') }}\" class=\"text-decoration-none\">
                            <div class=\"p-3 rounded border text-center h-100 hover-shadow\" style=\"transition: all 0.2s;\">
                                <div class=\"mb-2\"><i class=\"bi bi-plus-circle fs-1 text-primary\"></i></div>
                                <h6 class=\"mb-1 text-dark\">Add Product</h6>
                                <small class=\"text-muted\">Create new product listing</small>
                            </div>
                        </a>
                    </div>
                    <div class=\"col-md-6 col-lg-4\">
                        <a href=\"{{ path('app_commande_new') }}\" class=\"text-decoration-none\">
                            <div class=\"p-3 rounded border text-center h-100 hover-shadow\" style=\"transition: all 0.2s;\">
                                <div class=\"mb-2\"><i class=\"bi bi-cart-plus fs-1 text-success\"></i></div>
                                <h6 class=\"mb-1 text-dark\">New Order</h6>
                                <small class=\"text-muted\">Create customer order</small>
                            </div>
                        </a>
                    </div>
                    <div class=\"col-md-6 col-lg-4\">
                        <a href=\"{{ path('app_feedback_new') }}\" class=\"text-decoration-none\">
                            <div class=\"p-3 rounded border text-center h-100 hover-shadow\" style=\"transition: all 0.2s;\">
                                <div class=\"mb-2\"><i class=\"bi bi-chat-heart fs-1 text-warning\"></i></div>
                                <h6 class=\"mb-1 text-dark\">Add Feedback</h6>
                                <small class=\"text-muted\">Share your experience</small>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class=\"col-xl-4\">
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\"><i class=\"bi bi-speedometer2 me-2\"></i>Your Info</h5>
            </div>
            <div class=\"card-body\">
                <div class=\"d-flex align-items-center mb-3\">
                    {% if app.user.photoPath %}
                    <img src=\"{{ app.user.photoPath }}\" alt=\"{{ app.user.nomComplet }}\" class=\"rounded-circle me-3 border\" style=\"width: 60px; height: 60px; object-fit: cover;\">
                    {% else %}
                    <div class=\"user-avatar me-3\" style=\"width: 60px; height: 60px; font-size: 1.5rem;\">{{ app.user.prenom|first }}{{ app.user.nom|first }}</div>
                    {% endif %}
                    <div>
                        <h5 class=\"mb-1\">{{ app.user.nomComplet }}</h5>
                        <p class=\"text-muted mb-0\">{{ app.user.email }}</p>
                    </div>
                </div>
                <hr>
                <div class=\"mb-2\">
                    <span class=\"badge bg-primary\">{{ app.user.role.nomRole }}</span>
                </div>
                {% if app.user.telephone %}
                <p class=\"mb-1\"><i class=\"bi bi-telephone me-2 text-muted\"></i>{{ app.user.telephone }}</p>
                {% endif %}
                {% if app.user.dateNaissance %}
                <p class=\"mb-0\"><i class=\"bi bi-calendar me-2 text-muted\"></i>{{ app.user.dateNaissance|date('Y-m-d') }}</p>
                {% endif %}
                <div class=\"mt-3\">
                    <a href=\"{{ path('app_account_profile') }}\" class=\"btn btn-outline-primary btn-sm\">
                        <i class=\"bi bi-person-circle me-1\"></i> Edit My Profile
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
{% endblock %}
", "home.html.twig", "C:\\Users\\Skaina\\Desktop\\final version symfony\\Marketplace-Project\\web\\templates\\home.html.twig");
    }
}
