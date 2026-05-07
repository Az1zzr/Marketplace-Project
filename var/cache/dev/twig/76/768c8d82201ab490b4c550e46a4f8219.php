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

/* security/forgot_password.html.twig */
class __TwigTemplate_167c8633dc596d183f68e5bad689f20c extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/forgot_password.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/forgot_password.html.twig"));

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

        yield "Forgot Password";
        
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
        <div class=\"auth-logo\">🔐</div>
        <h2 class=\"text-center mb-4\" style=\"font-weight: 700; color: #1e293b;\">Reset Password</h2>
        <p class=\"text-center text-muted mb-4\">Enter your email or phone number, then choose where the verification code should be sent.</p>

        <form method=\"post\" novalidate>
            <div class=\"mb-3\">
                <label for=\"identifier\" class=\"form-label\">Email Or Phone</label>
                <input type=\"text\" name=\"identifier\" id=\"identifier\" class=\"form-control ";
        // line 15
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "identifier", [], "any", true, true, false, 15)) {
            yield "is-invalid";
        }
        yield "\" value=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["identifier"]) || array_key_exists("identifier", $context) ? $context["identifier"] : (function () { throw new RuntimeError('Variable "identifier" does not exist.', 15, $this->source); })()), "html", null, true);
        yield "\" placeholder=\"name@gmail.com or 91234567\">
                ";
        // line 16
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "identifier", [], "any", true, true, false, 16)) {
            // line 17
            yield "                <div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 17, $this->source); })()), "identifier", [], "any", false, false, false, 17), "html", null, true);
            yield "</div>
                ";
        }
        // line 19
        yield "            </div>

            <div class=\"mb-4\">
                <label for=\"channel\" class=\"form-label\">Send Code Via</label>
                <select name=\"channel\" id=\"channel\" class=\"form-select ";
        // line 23
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "channel", [], "any", true, true, false, 23) || CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "delivery", [], "any", true, true, false, 23))) {
            yield "is-invalid";
        }
        yield "\">
                    <option value=\"email\" ";
        // line 24
        if (((isset($context["channel"]) || array_key_exists("channel", $context) ? $context["channel"] : (function () { throw new RuntimeError('Variable "channel" does not exist.', 24, $this->source); })()) == "email")) {
            yield "selected";
        }
        yield ">Email</option>
                    <option value=\"sms\" ";
        // line 25
        if (((isset($context["channel"]) || array_key_exists("channel", $context) ? $context["channel"] : (function () { throw new RuntimeError('Variable "channel" does not exist.', 25, $this->source); })()) == "sms")) {
            yield "selected";
        }
        yield ">SMS</option>
                </select>
                ";
        // line 27
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "channel", [], "any", true, true, false, 27)) {
            // line 28
            yield "                <div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 28, $this->source); })()), "channel", [], "any", false, false, false, 28), "html", null, true);
            yield "</div>
                ";
        }
        // line 30
        yield "                ";
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "delivery", [], "any", true, true, false, 30)) {
            // line 31
            yield "                <div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 31, $this->source); })()), "delivery", [], "any", false, false, false, 31), "html", null, true);
            yield "</div>
                ";
        }
        // line 33
        yield "            </div>

            <button type=\"submit\" class=\"btn btn-primary w-100 py-3 mb-3\" style=\"font-weight: 600;\">
                <i class=\"bi bi-send me-2\"></i> Send Verification Code
            </button>

            <p class=\"text-center text-muted mb-0\">
                Remembered your password? <a href=\"";
        // line 40
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
        yield "\" class=\"text-decoration-none\" style=\"color: var(--primary-color); font-weight: 500;\">Go back to login</a>
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
        return "security/forgot_password.html.twig";
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
        return array (  178 => 40,  169 => 33,  163 => 31,  160 => 30,  154 => 28,  152 => 27,  145 => 25,  139 => 24,  133 => 23,  127 => 19,  121 => 17,  119 => 16,  111 => 15,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Forgot Password{% endblock %}

{% block auth_content %}
<div class=\"auth-container\">
    <div class=\"auth-card\" style=\"max-width: 520px;\">
        <div class=\"auth-logo\">🔐</div>
        <h2 class=\"text-center mb-4\" style=\"font-weight: 700; color: #1e293b;\">Reset Password</h2>
        <p class=\"text-center text-muted mb-4\">Enter your email or phone number, then choose where the verification code should be sent.</p>

        <form method=\"post\" novalidate>
            <div class=\"mb-3\">
                <label for=\"identifier\" class=\"form-label\">Email Or Phone</label>
                <input type=\"text\" name=\"identifier\" id=\"identifier\" class=\"form-control {% if errors.identifier is defined %}is-invalid{% endif %}\" value=\"{{ identifier }}\" placeholder=\"name@gmail.com or 91234567\">
                {% if errors.identifier is defined %}
                <div class=\"invalid-feedback d-block\">{{ errors.identifier }}</div>
                {% endif %}
            </div>

            <div class=\"mb-4\">
                <label for=\"channel\" class=\"form-label\">Send Code Via</label>
                <select name=\"channel\" id=\"channel\" class=\"form-select {% if errors.channel is defined or errors.delivery is defined %}is-invalid{% endif %}\">
                    <option value=\"email\" {% if channel == 'email' %}selected{% endif %}>Email</option>
                    <option value=\"sms\" {% if channel == 'sms' %}selected{% endif %}>SMS</option>
                </select>
                {% if errors.channel is defined %}
                <div class=\"invalid-feedback d-block\">{{ errors.channel }}</div>
                {% endif %}
                {% if errors.delivery is defined %}
                <div class=\"invalid-feedback d-block\">{{ errors.delivery }}</div>
                {% endif %}
            </div>

            <button type=\"submit\" class=\"btn btn-primary w-100 py-3 mb-3\" style=\"font-weight: 600;\">
                <i class=\"bi bi-send me-2\"></i> Send Verification Code
            </button>

            <p class=\"text-center text-muted mb-0\">
                Remembered your password? <a href=\"{{ path('app_login') }}\" class=\"text-decoration-none\" style=\"color: var(--primary-color); font-weight: 500;\">Go back to login</a>
            </p>
        </form>
    </div>
</div>
{% endblock %}
", "security/forgot_password.html.twig", "C:\\Users\\Skaina\\Desktop\\final version symfony\\Marketplace-Project\\web\\templates\\security\\forgot_password.html.twig");
    }
}
