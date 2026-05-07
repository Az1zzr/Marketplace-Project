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

/* user/new.html.twig */
class __TwigTemplate_a8f94e57648c906a8af6cfc3e00e3343 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user/new.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user/new.html.twig"));

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

        yield "New User";
        
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
        yield "<li class=\"breadcrumb-item\"><a href=\"";
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_user_index");
        yield "\">Users</a></li>
<li class=\"breadcrumb-item active\">New User</li>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 10
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

        // line 11
        yield "<div class=\"page-header\">
    <h1><i class=\"bi bi-person-plus me-2\"></i>Add New User</h1>
    <p>Create a new user account</p>
</div>

<div class=\"row justify-content-center\">
    <div class=\"col-lg-8\">
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\"><i class=\"bi bi-person me-2\"></i>User Information</h5>
            </div>
            <div class=\"card-body\">
                ";
        // line 23
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty((isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 23, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 24
            yield "                <div class=\"alert alert-danger\">
                    Please correct the highlighted fields before creating the user.
                </div>
                ";
        }
        // line 28
        yield "                <form method=\"post\" novalidate>
                    <div class=\"row\">
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"nom\" class=\"form-label\">Last Name <span class=\"text-danger\">*</span></label>
                            <input type=\"text\" name=\"nom\" id=\"nom\" class=\"form-control ";
        // line 32
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "nom", [], "any", true, true, false, 32)) {
            yield "is-invalid";
        }
        yield "\" value=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 32, $this->source); })()), "request", [], "any", false, false, false, 32), "request", [], "any", false, false, false, 32), "get", ["nom"], "method", false, false, false, 32), "html", null, true);
        yield "\" placeholder=\"Enter last name\">
                            ";
        // line 33
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "nom", [], "any", true, true, false, 33)) {
            yield "<div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 33, $this->source); })()), "nom", [], "any", false, false, false, 33), "html", null, true);
            yield "</div>";
        }
        // line 34
        yield "                        </div>
                        
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"prenom\" class=\"form-label\">First Name <span class=\"text-danger\">*</span></label>
                            <input type=\"text\" name=\"prenom\" id=\"prenom\" class=\"form-control ";
        // line 38
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "prenom", [], "any", true, true, false, 38)) {
            yield "is-invalid";
        }
        yield "\" value=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 38, $this->source); })()), "request", [], "any", false, false, false, 38), "request", [], "any", false, false, false, 38), "get", ["prenom"], "method", false, false, false, 38), "html", null, true);
        yield "\" placeholder=\"Enter first name\">
                            ";
        // line 39
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "prenom", [], "any", true, true, false, 39)) {
            yield "<div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 39, $this->source); })()), "prenom", [], "any", false, false, false, 39), "html", null, true);
            yield "</div>";
        }
        // line 40
        yield "                        </div>
                    </div>
                    
                    <div class=\"row\">
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"email\" class=\"form-label\">Email <span class=\"text-danger\">*</span></label>
                            <input type=\"text\" name=\"email\" id=\"email\" class=\"form-control ";
        // line 46
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "email", [], "any", true, true, false, 46)) {
            yield "is-invalid";
        }
        yield "\" value=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 46, $this->source); })()), "request", [], "any", false, false, false, 46), "request", [], "any", false, false, false, 46), "get", ["email"], "method", false, false, false, 46), "html", null, true);
        yield "\" placeholder=\"user@gmail.com\">
                            ";
        // line 47
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "email", [], "any", true, true, false, 47)) {
            yield "<div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 47, $this->source); })()), "email", [], "any", false, false, false, 47), "html", null, true);
            yield "</div>";
        }
        // line 48
        yield "                        </div>
                        
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"telephone\" class=\"form-label\">Phone</label>
                            <input type=\"text\" name=\"telephone\" id=\"telephone\" class=\"form-control ";
        // line 52
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "telephone", [], "any", true, true, false, 52)) {
            yield "is-invalid";
        }
        yield "\" value=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 52, $this->source); })()), "request", [], "any", false, false, false, 52), "request", [], "any", false, false, false, 52), "get", ["telephone"], "method", false, false, false, 52), "html", null, true);
        yield "\" placeholder=\"91234567\">
                            ";
        // line 53
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "telephone", [], "any", true, true, false, 53)) {
            yield "<div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 53, $this->source); })()), "telephone", [], "any", false, false, false, 53), "html", null, true);
            yield "</div>";
        }
        // line 54
        yield "                        </div>
                    </div>
                    
                    <div class=\"row\">
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"motDePasse\" class=\"form-label\">Password <span class=\"text-danger\">*</span></label>
                            <input type=\"password\" name=\"motDePasse\" id=\"motDePasse\" class=\"form-control ";
        // line 60
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "motDePasse", [], "any", true, true, false, 60)) {
            yield "is-invalid";
        }
        yield "\" placeholder=\"Enter password\">
                            ";
        // line 61
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "motDePasse", [], "any", true, true, false, 61)) {
            yield "<div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 61, $this->source); })()), "motDePasse", [], "any", false, false, false, 61), "html", null, true);
            yield "</div>";
        }
        // line 62
        yield "                        </div>
                        
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"dateNaissance\" class=\"form-label\">Birth Date</label>
                            <input type=\"date\" name=\"dateNaissance\" id=\"dateNaissance\" class=\"form-control ";
        // line 66
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "dateNaissance", [], "any", true, true, false, 66)) {
            yield "is-invalid";
        }
        yield "\" value=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 66, $this->source); })()), "request", [], "any", false, false, false, 66), "request", [], "any", false, false, false, 66), "get", ["dateNaissance"], "method", false, false, false, 66), "html", null, true);
        yield "\">
                            ";
        // line 67
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "dateNaissance", [], "any", true, true, false, 67)) {
            yield "<div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 67, $this->source); })()), "dateNaissance", [], "any", false, false, false, 67), "html", null, true);
            yield "</div>";
        }
        // line 68
        yield "                        </div>
                    </div>
                    
                    <div class=\"mb-4\">
                        <label for=\"role\" class=\"form-label\">Role</label>
                        <select name=\"role\" id=\"role\" class=\"form-select ";
        // line 73
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "role", [], "any", true, true, false, 73)) {
            yield "is-invalid";
        }
        yield "\">
                            <option value=\"\">-- Select Role --</option>
                            ";
        // line 75
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["roles"]) || array_key_exists("roles", $context) ? $context["roles"] : (function () { throw new RuntimeError('Variable "roles" does not exist.', 75, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["role"]) {
            // line 76
            yield "                            <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["role"], "idRole", [], "any", false, false, false, 76), "html", null, true);
            yield "\" ";
            if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 76, $this->source); })()), "request", [], "any", false, false, false, 76), "request", [], "any", false, false, false, 76), "get", ["role"], "method", false, false, false, 76) == CoreExtension::getAttribute($this->env, $this->source, $context["role"], "idRole", [], "any", false, false, false, 76))) {
                yield "selected";
            }
            yield ">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["role"], "nomRole", [], "any", false, false, false, 76), "html", null, true);
            yield "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['role'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 78
        yield "                        </select>
                        ";
        // line 79
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "role", [], "any", true, true, false, 79)) {
            yield "<div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 79, $this->source); })()), "role", [], "any", false, false, false, 79), "html", null, true);
            yield "</div>";
        }
        // line 80
        yield "                    </div>
                    
                    <hr class=\"my-4\">
                    
                    <div class=\"d-flex gap-2\">
                        <button type=\"submit\" class=\"btn btn-primary\">
                            <i class=\"bi bi-check-lg me-1\"></i> Create User
                        </button>
                        <a href=\"";
        // line 88
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_user_index");
        yield "\" class=\"btn btn-outline-secondary\">
                            <i class=\"bi bi-x-lg me-1\"></i> Cancel
                        </a>
                    </div>
                </form>
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
        return "user/new.html.twig";
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
        return array (  325 => 88,  315 => 80,  309 => 79,  306 => 78,  291 => 76,  287 => 75,  280 => 73,  273 => 68,  267 => 67,  259 => 66,  253 => 62,  247 => 61,  241 => 60,  233 => 54,  227 => 53,  219 => 52,  213 => 48,  207 => 47,  199 => 46,  191 => 40,  185 => 39,  177 => 38,  171 => 34,  165 => 33,  157 => 32,  151 => 28,  145 => 24,  143 => 23,  129 => 11,  116 => 10,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}New User{% endblock %}

{% block breadcrumb %}
<li class=\"breadcrumb-item\"><a href=\"{{ path('app_user_index') }}\">Users</a></li>
<li class=\"breadcrumb-item active\">New User</li>
{% endblock %}

{% block body %}
<div class=\"page-header\">
    <h1><i class=\"bi bi-person-plus me-2\"></i>Add New User</h1>
    <p>Create a new user account</p>
</div>

<div class=\"row justify-content-center\">
    <div class=\"col-lg-8\">
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\"><i class=\"bi bi-person me-2\"></i>User Information</h5>
            </div>
            <div class=\"card-body\">
                {% if errors is not empty %}
                <div class=\"alert alert-danger\">
                    Please correct the highlighted fields before creating the user.
                </div>
                {% endif %}
                <form method=\"post\" novalidate>
                    <div class=\"row\">
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"nom\" class=\"form-label\">Last Name <span class=\"text-danger\">*</span></label>
                            <input type=\"text\" name=\"nom\" id=\"nom\" class=\"form-control {% if errors.nom is defined %}is-invalid{% endif %}\" value=\"{{ app.request.request.get('nom') }}\" placeholder=\"Enter last name\">
                            {% if errors.nom is defined %}<div class=\"invalid-feedback d-block\">{{ errors.nom }}</div>{% endif %}
                        </div>
                        
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"prenom\" class=\"form-label\">First Name <span class=\"text-danger\">*</span></label>
                            <input type=\"text\" name=\"prenom\" id=\"prenom\" class=\"form-control {% if errors.prenom is defined %}is-invalid{% endif %}\" value=\"{{ app.request.request.get('prenom') }}\" placeholder=\"Enter first name\">
                            {% if errors.prenom is defined %}<div class=\"invalid-feedback d-block\">{{ errors.prenom }}</div>{% endif %}
                        </div>
                    </div>
                    
                    <div class=\"row\">
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"email\" class=\"form-label\">Email <span class=\"text-danger\">*</span></label>
                            <input type=\"text\" name=\"email\" id=\"email\" class=\"form-control {% if errors.email is defined %}is-invalid{% endif %}\" value=\"{{ app.request.request.get('email') }}\" placeholder=\"user@gmail.com\">
                            {% if errors.email is defined %}<div class=\"invalid-feedback d-block\">{{ errors.email }}</div>{% endif %}
                        </div>
                        
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"telephone\" class=\"form-label\">Phone</label>
                            <input type=\"text\" name=\"telephone\" id=\"telephone\" class=\"form-control {% if errors.telephone is defined %}is-invalid{% endif %}\" value=\"{{ app.request.request.get('telephone') }}\" placeholder=\"91234567\">
                            {% if errors.telephone is defined %}<div class=\"invalid-feedback d-block\">{{ errors.telephone }}</div>{% endif %}
                        </div>
                    </div>
                    
                    <div class=\"row\">
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"motDePasse\" class=\"form-label\">Password <span class=\"text-danger\">*</span></label>
                            <input type=\"password\" name=\"motDePasse\" id=\"motDePasse\" class=\"form-control {% if errors.motDePasse is defined %}is-invalid{% endif %}\" placeholder=\"Enter password\">
                            {% if errors.motDePasse is defined %}<div class=\"invalid-feedback d-block\">{{ errors.motDePasse }}</div>{% endif %}
                        </div>
                        
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"dateNaissance\" class=\"form-label\">Birth Date</label>
                            <input type=\"date\" name=\"dateNaissance\" id=\"dateNaissance\" class=\"form-control {% if errors.dateNaissance is defined %}is-invalid{% endif %}\" value=\"{{ app.request.request.get('dateNaissance') }}\">
                            {% if errors.dateNaissance is defined %}<div class=\"invalid-feedback d-block\">{{ errors.dateNaissance }}</div>{% endif %}
                        </div>
                    </div>
                    
                    <div class=\"mb-4\">
                        <label for=\"role\" class=\"form-label\">Role</label>
                        <select name=\"role\" id=\"role\" class=\"form-select {% if errors.role is defined %}is-invalid{% endif %}\">
                            <option value=\"\">-- Select Role --</option>
                            {% for role in roles %}
                            <option value=\"{{ role.idRole }}\" {% if app.request.request.get('role') == role.idRole %}selected{% endif %}>{{ role.nomRole }}</option>
                            {% endfor %}
                        </select>
                        {% if errors.role is defined %}<div class=\"invalid-feedback d-block\">{{ errors.role }}</div>{% endif %}
                    </div>
                    
                    <hr class=\"my-4\">
                    
                    <div class=\"d-flex gap-2\">
                        <button type=\"submit\" class=\"btn btn-primary\">
                            <i class=\"bi bi-check-lg me-1\"></i> Create User
                        </button>
                        <a href=\"{{ path('app_user_index') }}\" class=\"btn btn-outline-secondary\">
                            <i class=\"bi bi-x-lg me-1\"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{% endblock %}
", "user/new.html.twig", "C:\\Users\\Skaina\\Desktop\\final version symfony\\Marketplace-Project\\web\\templates\\user\\new.html.twig");
    }
}
