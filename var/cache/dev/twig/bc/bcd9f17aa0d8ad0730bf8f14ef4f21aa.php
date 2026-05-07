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

/* security/login.html.twig */
class __TwigTemplate_f1c7f2fe9cb16bdb49601fb9d7577672 extends Template
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
            'auth_content' => [$this, 'block_auth_content'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/login.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/login.html.twig"));

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

        yield "Login";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_auth_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "auth_content"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "auth_content"));

        // line 6
        yield "<div class=\"auth-container\">
    <div class=\"auth-card\">
        <div class=\"auth-logo\">🛒</div>
        <h2 class=\"text-center mb-4\" style=\"font-weight: 700; color: #1e293b;\">Welcome Back</h2>
        <p class=\"text-center text-muted mb-4\">Sign in to continue to Marketplace</p>

        ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 12, $this->source); })()), "flashes", ["success"], "method", false, false, false, 12));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 13
            yield "        <div class=\"alert alert-success d-flex align-items-center\" role=\"alert\">
            <i class=\"bi bi-check-circle-fill me-2\"></i>
            ";
            // line 15
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
        </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        yield "
        ";
        // line 19
        if ((($tmp = (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 19, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 20
            yield "        <div class=\"alert alert-danger d-flex align-items-center\" role=\"alert\">
            <i class=\"bi bi-exclamation-triangle-fill me-2\"></i>
            ";
            // line 22
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(CoreExtension::getAttribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 22, $this->source); })()), "messageKey", [], "any", false, false, false, 22), CoreExtension::getAttribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 22, $this->source); })()), "messageData", [], "any", false, false, false, 22), "security"), "html", null, true);
            yield "
        </div>
        ";
        }
        // line 25
        yield "
        <form action=\"";
        // line 26
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
        yield "\" method=\"post\" novalidate>
            <div class=\"mb-3\">
                <label for=\"email\" class=\"form-label\">Email Address</label>
                <div class=\"input-group\">
                    <span class=\"input-group-text bg-light border-end-0\"><i class=\"bi bi-envelope\"></i></span>
                    <input type=\"email\" name=\"email\" id=\"email\" value=\"";
        // line 31
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["last_username"]) || array_key_exists("last_username", $context) ? $context["last_username"] : (function () { throw new RuntimeError('Variable "last_username" does not exist.', 31, $this->source); })()), "html_attr");
        yield "\" class=\"form-control border-start-0\" placeholder=\"Enter your email\" autocomplete=\"username\" autocapitalize=\"none\" inputmode=\"email\" maxlength=\"255\" required autofocus spellcheck=\"false\">
                </div>
            </div>

            <div class=\"mb-4\">
                <label for=\"password\" class=\"form-label\">Password</label>
                <div class=\"input-group\">
                    <span class=\"input-group-text bg-light border-end-0\"><i class=\"bi bi-lock\"></i></span>
                    <input type=\"password\" name=\"password\" id=\"password\" class=\"form-control border-start-0\" placeholder=\"Enter your password\" autocomplete=\"current-password\" maxlength=\"72\" required>
                </div>
            </div>

            <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 43
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("authenticate"), "html", null, true);
        yield "\">

            <button type=\"submit\" class=\"btn btn-primary w-100 py-3 mb-3\" style=\"font-weight: 600;\">
                <i class=\"bi bi-box-arrow-in-right me-2\"></i> Sign In
            </button>

            <p class=\"text-center mb-3\">
                <a href=\"";
        // line 50
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_forgot_password");
        yield "\" class=\"text-decoration-none\" style=\"color: var(--primary-color); font-weight: 500;\">Forgot your password?</a>
            </p>

            <p class=\"text-center text-muted mb-0\">
                Don't have an account? <a href=\"";
        // line 54
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
        yield "\" class=\"text-decoration-none\" style=\"color: var(--primary-color); font-weight: 500;\">Create Account</a>
            </p>
        </form>
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
        return "security/login.html.twig";
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
        return array (  183 => 54,  176 => 50,  166 => 43,  151 => 31,  143 => 26,  140 => 25,  134 => 22,  130 => 20,  128 => 19,  125 => 18,  116 => 15,  112 => 13,  108 => 12,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Login{% endblock %}

{% block auth_content %}
<div class=\"auth-container\">
    <div class=\"auth-card\">
        <div class=\"auth-logo\">🛒</div>
        <h2 class=\"text-center mb-4\" style=\"font-weight: 700; color: #1e293b;\">Welcome Back</h2>
        <p class=\"text-center text-muted mb-4\">Sign in to continue to Marketplace</p>

        {% for message in app.flashes('success') %}
        <div class=\"alert alert-success d-flex align-items-center\" role=\"alert\">
            <i class=\"bi bi-check-circle-fill me-2\"></i>
            {{ message }}
        </div>
        {% endfor %}

        {% if error %}
        <div class=\"alert alert-danger d-flex align-items-center\" role=\"alert\">
            <i class=\"bi bi-exclamation-triangle-fill me-2\"></i>
            {{ error.messageKey|trans(error.messageData, 'security') }}
        </div>
        {% endif %}

        <form action=\"{{ path('app_login') }}\" method=\"post\" novalidate>
            <div class=\"mb-3\">
                <label for=\"email\" class=\"form-label\">Email Address</label>
                <div class=\"input-group\">
                    <span class=\"input-group-text bg-light border-end-0\"><i class=\"bi bi-envelope\"></i></span>
                    <input type=\"email\" name=\"email\" id=\"email\" value=\"{{ last_username|e('html_attr') }}\" class=\"form-control border-start-0\" placeholder=\"Enter your email\" autocomplete=\"username\" autocapitalize=\"none\" inputmode=\"email\" maxlength=\"255\" required autofocus spellcheck=\"false\">
                </div>
            </div>

            <div class=\"mb-4\">
                <label for=\"password\" class=\"form-label\">Password</label>
                <div class=\"input-group\">
                    <span class=\"input-group-text bg-light border-end-0\"><i class=\"bi bi-lock\"></i></span>
                    <input type=\"password\" name=\"password\" id=\"password\" class=\"form-control border-start-0\" placeholder=\"Enter your password\" autocomplete=\"current-password\" maxlength=\"72\" required>
                </div>
            </div>

            <input type=\"hidden\" name=\"_csrf_token\" value=\"{{ csrf_token('authenticate') }}\">

            <button type=\"submit\" class=\"btn btn-primary w-100 py-3 mb-3\" style=\"font-weight: 600;\">
                <i class=\"bi bi-box-arrow-in-right me-2\"></i> Sign In
            </button>

            <p class=\"text-center mb-3\">
                <a href=\"{{ path('app_forgot_password') }}\" class=\"text-decoration-none\" style=\"color: var(--primary-color); font-weight: 500;\">Forgot your password?</a>
            </p>

            <p class=\"text-center text-muted mb-0\">
                Don't have an account? <a href=\"{{ path('app_register') }}\" class=\"text-decoration-none\" style=\"color: var(--primary-color); font-weight: 500;\">Create Account</a>
            </p>
        </form>
    </div>
</div>
{% endblock %}
", "security/login.html.twig", "C:\\Users\\Skaina\\Desktop\\final version symfony\\Marketplace-Project\\web\\templates\\security\\login.html.twig");
    }
}
