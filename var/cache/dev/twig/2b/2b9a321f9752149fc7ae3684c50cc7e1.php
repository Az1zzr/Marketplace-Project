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

/* account/profile.html.twig */
class __TwigTemplate_0864d29cb8b5a8a198d6dc46e989750e extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "account/profile.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "account/profile.html.twig"));

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

        yield "My Profile";
        
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
        yield "<li class=\"breadcrumb-item active\" aria-current=\"page\">My Profile</li>
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
        yield "<div class=\"page-header d-flex justify-content-between align-items-center\">
    <div>
        <h1><i class=\"bi bi-person-circle me-2\"></i>My Profile</h1>
        <p>Update your account information, password, and profile photo.</p>
    </div>
    <a href=\"";
        // line 15
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath((((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["accountUser"]) || array_key_exists("accountUser", $context) ? $context["accountUser"] : (function () { throw new RuntimeError('Variable "accountUser" does not exist.', 15, $this->source); })()), "hasRoleCode", ["admin"], "method", false, false, false, 15)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("app_admin_dashboard") : ("app_front_dashboard")));
        yield "\" class=\"btn btn-outline-secondary\">
        <i class=\"bi bi-arrow-left me-1\"></i> Back
    </a>
</div>

<div class=\"row justify-content-center\">
    <div class=\"col-lg-9\">
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\"><i class=\"bi bi-person me-2\"></i>Account Information</h5>
            </div>
            <div class=\"card-body\">
                <form method=\"post\" enctype=\"multipart/form-data\" novalidate>
                    <div class=\"row align-items-center mb-4\">
                        <div class=\"col-md-3 text-center mb-3 mb-md-0\">
                            ";
        // line 30
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["accountUser"]) || array_key_exists("accountUser", $context) ? $context["accountUser"] : (function () { throw new RuntimeError('Variable "accountUser" does not exist.', 30, $this->source); })()), "photoPath", [], "any", false, false, false, 30)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 31
            yield "                            <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["accountUser"]) || array_key_exists("accountUser", $context) ? $context["accountUser"] : (function () { throw new RuntimeError('Variable "accountUser" does not exist.', 31, $this->source); })()), "photoPath", [], "any", false, false, false, 31), "html", null, true);
            yield "\" alt=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["accountUser"]) || array_key_exists("accountUser", $context) ? $context["accountUser"] : (function () { throw new RuntimeError('Variable "accountUser" does not exist.', 31, $this->source); })()), "nomComplet", [], "any", false, false, false, 31), "html", null, true);
            yield "\" class=\"rounded-circle border\" style=\"width: 140px; height: 140px; object-fit: cover;\">
                            ";
        } else {
            // line 33
            yield "                            <div class=\"user-avatar mx-auto\" style=\"width: 140px; height: 140px; font-size: 2.8rem;\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["accountUser"]) || array_key_exists("accountUser", $context) ? $context["accountUser"] : (function () { throw new RuntimeError('Variable "accountUser" does not exist.', 33, $this->source); })()), "prenom", [], "any", false, false, false, 33)), "html", null, true);
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["accountUser"]) || array_key_exists("accountUser", $context) ? $context["accountUser"] : (function () { throw new RuntimeError('Variable "accountUser" does not exist.', 33, $this->source); })()), "nom", [], "any", false, false, false, 33)), "html", null, true);
            yield "</div>
                            ";
        }
        // line 35
        yield "                        </div>
                        <div class=\"col-md-9\">
                            <label for=\"photoProfil\" class=\"form-label\">Profile Photo</label>
                            <input type=\"file\" name=\"photoProfil\" id=\"photoProfil\" class=\"form-control ";
        // line 38
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "photoProfil", [], "any", true, true, false, 38)) {
            yield "is-invalid";
        }
        yield "\" accept=\"image/png,image/jpeg,image/webp\">
                            ";
        // line 39
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "photoProfil", [], "any", true, true, false, 39)) {
            // line 40
            yield "                            <div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 40, $this->source); })()), "photoProfil", [], "any", false, false, false, 40), "html", null, true);
            yield "</div>
                            ";
        }
        // line 42
        yield "                            <div class=\"form-text\">Only JPG, PNG, and WebP images are allowed. Uploaded images are verified for sensitive content before saving.</div>
                        </div>
                    </div>

                    <div class=\"row\">
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"prenom\" class=\"form-label\">First Name</label>
                            <input type=\"text\" name=\"prenom\" id=\"prenom\" class=\"form-control ";
        // line 49
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "prenom", [], "any", true, true, false, 49)) {
            yield "is-invalid";
        }
        yield "\" value=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 49, $this->source); })()), "request", [], "any", false, false, false, 49), "request", [], "any", false, false, false, 49), "get", ["prenom", CoreExtension::getAttribute($this->env, $this->source, (isset($context["accountUser"]) || array_key_exists("accountUser", $context) ? $context["accountUser"] : (function () { throw new RuntimeError('Variable "accountUser" does not exist.', 49, $this->source); })()), "prenom", [], "any", false, false, false, 49)], "method", false, false, false, 49), "html", null, true);
        yield "\">
                            ";
        // line 50
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "prenom", [], "any", true, true, false, 50)) {
            // line 51
            yield "                            <div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 51, $this->source); })()), "prenom", [], "any", false, false, false, 51), "html", null, true);
            yield "</div>
                            ";
        }
        // line 53
        yield "                        </div>
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"nom\" class=\"form-label\">Last Name</label>
                            <input type=\"text\" name=\"nom\" id=\"nom\" class=\"form-control ";
        // line 56
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "nom", [], "any", true, true, false, 56)) {
            yield "is-invalid";
        }
        yield "\" value=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 56, $this->source); })()), "request", [], "any", false, false, false, 56), "request", [], "any", false, false, false, 56), "get", ["nom", CoreExtension::getAttribute($this->env, $this->source, (isset($context["accountUser"]) || array_key_exists("accountUser", $context) ? $context["accountUser"] : (function () { throw new RuntimeError('Variable "accountUser" does not exist.', 56, $this->source); })()), "nom", [], "any", false, false, false, 56)], "method", false, false, false, 56), "html", null, true);
        yield "\">
                            ";
        // line 57
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "nom", [], "any", true, true, false, 57)) {
            // line 58
            yield "                            <div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 58, $this->source); })()), "nom", [], "any", false, false, false, 58), "html", null, true);
            yield "</div>
                            ";
        }
        // line 60
        yield "                        </div>
                    </div>

                    <div class=\"row\">
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"email\" class=\"form-label\">Email</label>
                            <input type=\"text\" name=\"email\" id=\"email\" class=\"form-control ";
        // line 66
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "email", [], "any", true, true, false, 66)) {
            yield "is-invalid";
        }
        yield "\" value=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 66, $this->source); })()), "request", [], "any", false, false, false, 66), "request", [], "any", false, false, false, 66), "get", ["email", CoreExtension::getAttribute($this->env, $this->source, (isset($context["accountUser"]) || array_key_exists("accountUser", $context) ? $context["accountUser"] : (function () { throw new RuntimeError('Variable "accountUser" does not exist.', 66, $this->source); })()), "email", [], "any", false, false, false, 66)], "method", false, false, false, 66), "html", null, true);
        yield "\">
                            ";
        // line 67
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "email", [], "any", true, true, false, 67)) {
            // line 68
            yield "                            <div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 68, $this->source); })()), "email", [], "any", false, false, false, 68), "html", null, true);
            yield "</div>
                            ";
        }
        // line 70
        yield "                        </div>
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"telephone\" class=\"form-label\">Phone</label>
                            <input type=\"text\" name=\"telephone\" id=\"telephone\" class=\"form-control ";
        // line 73
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "telephone", [], "any", true, true, false, 73)) {
            yield "is-invalid";
        }
        yield "\" value=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 73, $this->source); })()), "request", [], "any", false, false, false, 73), "request", [], "any", false, false, false, 73), "get", ["telephone", CoreExtension::getAttribute($this->env, $this->source, (isset($context["accountUser"]) || array_key_exists("accountUser", $context) ? $context["accountUser"] : (function () { throw new RuntimeError('Variable "accountUser" does not exist.', 73, $this->source); })()), "telephone", [], "any", false, false, false, 73)], "method", false, false, false, 73), "html", null, true);
        yield "\">
                            ";
        // line 74
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "telephone", [], "any", true, true, false, 74)) {
            // line 75
            yield "                            <div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 75, $this->source); })()), "telephone", [], "any", false, false, false, 75), "html", null, true);
            yield "</div>
                            ";
        }
        // line 77
        yield "                        </div>
                    </div>

                    <div class=\"mb-4\">
                        <label for=\"dateNaissance\" class=\"form-label\">Birth Date</label>
                        <input type=\"date\" name=\"dateNaissance\" id=\"dateNaissance\" class=\"form-control ";
        // line 82
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "dateNaissance", [], "any", true, true, false, 82)) {
            yield "is-invalid";
        }
        yield "\" value=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 82, $this->source); })()), "request", [], "any", false, false, false, 82), "request", [], "any", false, false, false, 82), "get", ["dateNaissance", (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["accountUser"]) || array_key_exists("accountUser", $context) ? $context["accountUser"] : (function () { throw new RuntimeError('Variable "accountUser" does not exist.', 82, $this->source); })()), "dateNaissance", [], "any", false, false, false, 82)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["accountUser"]) || array_key_exists("accountUser", $context) ? $context["accountUser"] : (function () { throw new RuntimeError('Variable "accountUser" does not exist.', 82, $this->source); })()), "dateNaissance", [], "any", false, false, false, 82), "Y-m-d")) : (""))], "method", false, false, false, 82), "html", null, true);
        yield "\">
                        ";
        // line 83
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "dateNaissance", [], "any", true, true, false, 83)) {
            // line 84
            yield "                        <div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 84, $this->source); })()), "dateNaissance", [], "any", false, false, false, 84), "html", null, true);
            yield "</div>
                        ";
        }
        // line 86
        yield "                    </div>

                    <hr class=\"my-4\">

                    <div class=\"row\">
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"motDePasse\" class=\"form-label\">New Password</label>
                            <input type=\"password\" name=\"motDePasse\" id=\"motDePasse\" class=\"form-control ";
        // line 93
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "motDePasse", [], "any", true, true, false, 93)) {
            yield "is-invalid";
        }
        yield "\" placeholder=\"Leave empty to keep current password\">
                            ";
        // line 94
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "motDePasse", [], "any", true, true, false, 94)) {
            // line 95
            yield "                            <div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 95, $this->source); })()), "motDePasse", [], "any", false, false, false, 95), "html", null, true);
            yield "</div>
                            ";
        }
        // line 97
        yield "                        </div>
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"confirmMotDePasse\" class=\"form-label\">Confirm New Password</label>
                            <input type=\"password\" name=\"confirmMotDePasse\" id=\"confirmMotDePasse\" class=\"form-control ";
        // line 100
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "confirmMotDePasse", [], "any", true, true, false, 100)) {
            yield "is-invalid";
        }
        yield "\" placeholder=\"Repeat the new password\">
                            ";
        // line 101
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "confirmMotDePasse", [], "any", true, true, false, 101)) {
            // line 102
            yield "                            <div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 102, $this->source); })()), "confirmMotDePasse", [], "any", false, false, false, 102), "html", null, true);
            yield "</div>
                            ";
        }
        // line 104
        yield "                        </div>
                    </div>

                    <div class=\"d-flex gap-2\">
                        <button type=\"submit\" class=\"btn btn-primary\">
                            <i class=\"bi bi-check-lg me-1\"></i> Save Changes
                        </button>
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
        return "account/profile.html.twig";
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
        return array (  343 => 104,  337 => 102,  335 => 101,  329 => 100,  324 => 97,  318 => 95,  316 => 94,  310 => 93,  301 => 86,  295 => 84,  293 => 83,  285 => 82,  278 => 77,  272 => 75,  270 => 74,  262 => 73,  257 => 70,  251 => 68,  249 => 67,  241 => 66,  233 => 60,  227 => 58,  225 => 57,  217 => 56,  212 => 53,  206 => 51,  204 => 50,  196 => 49,  187 => 42,  181 => 40,  179 => 39,  173 => 38,  168 => 35,  161 => 33,  153 => 31,  151 => 30,  133 => 15,  126 => 10,  113 => 9,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}My Profile{% endblock %}

{% block breadcrumb %}
<li class=\"breadcrumb-item active\" aria-current=\"page\">My Profile</li>
{% endblock %}

{% block body %}
<div class=\"page-header d-flex justify-content-between align-items-center\">
    <div>
        <h1><i class=\"bi bi-person-circle me-2\"></i>My Profile</h1>
        <p>Update your account information, password, and profile photo.</p>
    </div>
    <a href=\"{{ path(accountUser.hasRoleCode('admin') ? 'app_admin_dashboard' : 'app_front_dashboard') }}\" class=\"btn btn-outline-secondary\">
        <i class=\"bi bi-arrow-left me-1\"></i> Back
    </a>
</div>

<div class=\"row justify-content-center\">
    <div class=\"col-lg-9\">
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\"><i class=\"bi bi-person me-2\"></i>Account Information</h5>
            </div>
            <div class=\"card-body\">
                <form method=\"post\" enctype=\"multipart/form-data\" novalidate>
                    <div class=\"row align-items-center mb-4\">
                        <div class=\"col-md-3 text-center mb-3 mb-md-0\">
                            {% if accountUser.photoPath %}
                            <img src=\"{{ accountUser.photoPath }}\" alt=\"{{ accountUser.nomComplet }}\" class=\"rounded-circle border\" style=\"width: 140px; height: 140px; object-fit: cover;\">
                            {% else %}
                            <div class=\"user-avatar mx-auto\" style=\"width: 140px; height: 140px; font-size: 2.8rem;\">{{ accountUser.prenom|first }}{{ accountUser.nom|first }}</div>
                            {% endif %}
                        </div>
                        <div class=\"col-md-9\">
                            <label for=\"photoProfil\" class=\"form-label\">Profile Photo</label>
                            <input type=\"file\" name=\"photoProfil\" id=\"photoProfil\" class=\"form-control {% if errors.photoProfil is defined %}is-invalid{% endif %}\" accept=\"image/png,image/jpeg,image/webp\">
                            {% if errors.photoProfil is defined %}
                            <div class=\"invalid-feedback d-block\">{{ errors.photoProfil }}</div>
                            {% endif %}
                            <div class=\"form-text\">Only JPG, PNG, and WebP images are allowed. Uploaded images are verified for sensitive content before saving.</div>
                        </div>
                    </div>

                    <div class=\"row\">
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"prenom\" class=\"form-label\">First Name</label>
                            <input type=\"text\" name=\"prenom\" id=\"prenom\" class=\"form-control {% if errors.prenom is defined %}is-invalid{% endif %}\" value=\"{{ app.request.request.get('prenom', accountUser.prenom) }}\">
                            {% if errors.prenom is defined %}
                            <div class=\"invalid-feedback d-block\">{{ errors.prenom }}</div>
                            {% endif %}
                        </div>
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"nom\" class=\"form-label\">Last Name</label>
                            <input type=\"text\" name=\"nom\" id=\"nom\" class=\"form-control {% if errors.nom is defined %}is-invalid{% endif %}\" value=\"{{ app.request.request.get('nom', accountUser.nom) }}\">
                            {% if errors.nom is defined %}
                            <div class=\"invalid-feedback d-block\">{{ errors.nom }}</div>
                            {% endif %}
                        </div>
                    </div>

                    <div class=\"row\">
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"email\" class=\"form-label\">Email</label>
                            <input type=\"text\" name=\"email\" id=\"email\" class=\"form-control {% if errors.email is defined %}is-invalid{% endif %}\" value=\"{{ app.request.request.get('email', accountUser.email) }}\">
                            {% if errors.email is defined %}
                            <div class=\"invalid-feedback d-block\">{{ errors.email }}</div>
                            {% endif %}
                        </div>
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"telephone\" class=\"form-label\">Phone</label>
                            <input type=\"text\" name=\"telephone\" id=\"telephone\" class=\"form-control {% if errors.telephone is defined %}is-invalid{% endif %}\" value=\"{{ app.request.request.get('telephone', accountUser.telephone) }}\">
                            {% if errors.telephone is defined %}
                            <div class=\"invalid-feedback d-block\">{{ errors.telephone }}</div>
                            {% endif %}
                        </div>
                    </div>

                    <div class=\"mb-4\">
                        <label for=\"dateNaissance\" class=\"form-label\">Birth Date</label>
                        <input type=\"date\" name=\"dateNaissance\" id=\"dateNaissance\" class=\"form-control {% if errors.dateNaissance is defined %}is-invalid{% endif %}\" value=\"{{ app.request.request.get('dateNaissance', accountUser.dateNaissance ? accountUser.dateNaissance|date('Y-m-d') : '') }}\">
                        {% if errors.dateNaissance is defined %}
                        <div class=\"invalid-feedback d-block\">{{ errors.dateNaissance }}</div>
                        {% endif %}
                    </div>

                    <hr class=\"my-4\">

                    <div class=\"row\">
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"motDePasse\" class=\"form-label\">New Password</label>
                            <input type=\"password\" name=\"motDePasse\" id=\"motDePasse\" class=\"form-control {% if errors.motDePasse is defined %}is-invalid{% endif %}\" placeholder=\"Leave empty to keep current password\">
                            {% if errors.motDePasse is defined %}
                            <div class=\"invalid-feedback d-block\">{{ errors.motDePasse }}</div>
                            {% endif %}
                        </div>
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"confirmMotDePasse\" class=\"form-label\">Confirm New Password</label>
                            <input type=\"password\" name=\"confirmMotDePasse\" id=\"confirmMotDePasse\" class=\"form-control {% if errors.confirmMotDePasse is defined %}is-invalid{% endif %}\" placeholder=\"Repeat the new password\">
                            {% if errors.confirmMotDePasse is defined %}
                            <div class=\"invalid-feedback d-block\">{{ errors.confirmMotDePasse }}</div>
                            {% endif %}
                        </div>
                    </div>

                    <div class=\"d-flex gap-2\">
                        <button type=\"submit\" class=\"btn btn-primary\">
                            <i class=\"bi bi-check-lg me-1\"></i> Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{% endblock %}
", "account/profile.html.twig", "C:\\Users\\Skaina\\Desktop\\final version symfony\\Marketplace-Project\\web\\templates\\account\\profile.html.twig");
    }
}
