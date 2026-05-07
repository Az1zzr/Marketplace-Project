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

/* security/reset_password_verify.html.twig */
class __TwigTemplate_71bc0fda341cd724af8b09cfe08d8bcf extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/reset_password_verify.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/reset_password_verify.html.twig"));

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

        yield "Verify Reset Code";
        
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
    <div class=\"auth-card\" style=\"max-width: 520px;\">
        <div class=\"auth-logo\">📩</div>
        <h2 class=\"text-center mb-4\" style=\"font-weight: 700; color: #1e293b;\">Enter Verification Code</h2>
        <p class=\"text-center text-muted mb-4\">We sent a code by ";
        // line 10
        yield ((((isset($context["channel"]) || array_key_exists("channel", $context) ? $context["channel"] : (function () { throw new RuntimeError('Variable "channel" does not exist.', 10, $this->source); })()) == "sms")) ? ("SMS") : ("email"));
        yield " to <strong>";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["maskedTarget"]) || array_key_exists("maskedTarget", $context) ? $context["maskedTarget"] : (function () { throw new RuntimeError('Variable "maskedTarget" does not exist.', 10, $this->source); })()), "html", null, true);
        yield "</strong>.</p>

        <form method=\"post\" novalidate>
            <div class=\"mb-3\">
                <label for=\"code\" class=\"form-label\">Verification Code</label>
                <input type=\"text\" name=\"code\" id=\"code\" class=\"form-control ";
        // line 15
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "code", [], "any", true, true, false, 15)) {
            yield "is-invalid";
        }
        yield "\" value=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["code"]) || array_key_exists("code", $context) ? $context["code"] : (function () { throw new RuntimeError('Variable "code" does not exist.', 15, $this->source); })()), "html", null, true);
        yield "\" placeholder=\"6 digits\">
                ";
        // line 16
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "code", [], "any", true, true, false, 16)) {
            // line 17
            yield "                <div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 17, $this->source); })()), "code", [], "any", false, false, false, 17), "html", null, true);
            yield "</div>
                ";
        }
        // line 19
        yield "            </div>

            <div class=\"mb-3\">
                <label for=\"password\" class=\"form-label\">New Password</label>
                <input type=\"password\" name=\"password\" id=\"password\" class=\"form-control ";
        // line 23
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "password", [], "any", true, true, false, 23)) {
            yield "is-invalid";
        }
        yield "\" placeholder=\"New password\">
                ";
        // line 24
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "password", [], "any", true, true, false, 24)) {
            // line 25
            yield "                <div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 25, $this->source); })()), "password", [], "any", false, false, false, 25), "html", null, true);
            yield "</div>
                ";
        }
        // line 27
        yield "            </div>

            <div class=\"mb-4\">
                <label for=\"confirmPassword\" class=\"form-label\">Confirm New Password</label>
                <input type=\"password\" name=\"confirmPassword\" id=\"confirmPassword\" class=\"form-control ";
        // line 31
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "confirmPassword", [], "any", true, true, false, 31)) {
            yield "is-invalid";
        }
        yield "\" placeholder=\"Repeat password\">
                ";
        // line 32
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "confirmPassword", [], "any", true, true, false, 32)) {
            // line 33
            yield "                <div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 33, $this->source); })()), "confirmPassword", [], "any", false, false, false, 33), "html", null, true);
            yield "</div>
                ";
        }
        // line 35
        yield "            </div>

            <button type=\"submit\" class=\"btn btn-primary w-100 py-3 mb-3\" style=\"font-weight: 600;\">
                <i class=\"bi bi-check-circle me-2\"></i> Reset Password
            </button>

            <p class=\"text-center text-muted mb-0\">
                Need a new code? <a href=\"";
        // line 42
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_forgot_password");
        yield "\" class=\"text-decoration-none\" style=\"color: var(--primary-color); font-weight: 500;\">Start again</a>
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
        return "security/reset_password_verify.html.twig";
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
        return array (  181 => 42,  172 => 35,  166 => 33,  164 => 32,  158 => 31,  152 => 27,  146 => 25,  144 => 24,  138 => 23,  132 => 19,  126 => 17,  124 => 16,  116 => 15,  106 => 10,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Verify Reset Code{% endblock %}

{% block auth_content %}
<div class=\"auth-container\">
    <div class=\"auth-card\" style=\"max-width: 520px;\">
        <div class=\"auth-logo\">📩</div>
        <h2 class=\"text-center mb-4\" style=\"font-weight: 700; color: #1e293b;\">Enter Verification Code</h2>
        <p class=\"text-center text-muted mb-4\">We sent a code by {{ channel == 'sms' ? 'SMS' : 'email' }} to <strong>{{ maskedTarget }}</strong>.</p>

        <form method=\"post\" novalidate>
            <div class=\"mb-3\">
                <label for=\"code\" class=\"form-label\">Verification Code</label>
                <input type=\"text\" name=\"code\" id=\"code\" class=\"form-control {% if errors.code is defined %}is-invalid{% endif %}\" value=\"{{ code }}\" placeholder=\"6 digits\">
                {% if errors.code is defined %}
                <div class=\"invalid-feedback d-block\">{{ errors.code }}</div>
                {% endif %}
            </div>

            <div class=\"mb-3\">
                <label for=\"password\" class=\"form-label\">New Password</label>
                <input type=\"password\" name=\"password\" id=\"password\" class=\"form-control {% if errors.password is defined %}is-invalid{% endif %}\" placeholder=\"New password\">
                {% if errors.password is defined %}
                <div class=\"invalid-feedback d-block\">{{ errors.password }}</div>
                {% endif %}
            </div>

            <div class=\"mb-4\">
                <label for=\"confirmPassword\" class=\"form-label\">Confirm New Password</label>
                <input type=\"password\" name=\"confirmPassword\" id=\"confirmPassword\" class=\"form-control {% if errors.confirmPassword is defined %}is-invalid{% endif %}\" placeholder=\"Repeat password\">
                {% if errors.confirmPassword is defined %}
                <div class=\"invalid-feedback d-block\">{{ errors.confirmPassword }}</div>
                {% endif %}
            </div>

            <button type=\"submit\" class=\"btn btn-primary w-100 py-3 mb-3\" style=\"font-weight: 600;\">
                <i class=\"bi bi-check-circle me-2\"></i> Reset Password
            </button>

            <p class=\"text-center text-muted mb-0\">
                Need a new code? <a href=\"{{ path('app_forgot_password') }}\" class=\"text-decoration-none\" style=\"color: var(--primary-color); font-weight: 500;\">Start again</a>
            </p>
        </form>
    </div>
</div>
{% endblock %}
", "security/reset_password_verify.html.twig", "C:\\Users\\Skaina\\Desktop\\final version symfony\\Marketplace-Project\\web\\templates\\security\\reset_password_verify.html.twig");
    }
}
