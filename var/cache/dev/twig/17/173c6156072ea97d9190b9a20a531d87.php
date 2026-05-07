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

/* user/edit.html.twig */
class __TwigTemplate_891c5c743f5443de9c5f6e79a1d0a9f1 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user/edit.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user/edit.html.twig"));

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

        yield "Edit ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 3, $this->source); })()), "nomComplet", [], "any", false, false, false, 3), "html", null, true);
        
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
<li class=\"breadcrumb-item\"><a href=\"";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_user_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 7, $this->source); })()), "id", [], "any", false, false, false, 7)]), "html", null, true);
        yield "\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 7, $this->source); })()), "nomComplet", [], "any", false, false, false, 7), "html", null, true);
        yield "</a></li>
<li class=\"breadcrumb-item active\">Edit</li>
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
        yield "<div class=\"page-header\">
    <h1><i class=\"bi bi-pencil me-2\"></i>Edit User</h1>
    <p>Update information for <strong>";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 14, $this->source); })()), "nomComplet", [], "any", false, false, false, 14), "html", null, true);
        yield "</strong></p>
</div>

<div class=\"row justify-content-center\">
    <div class=\"col-lg-8\">
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\"><i class=\"bi bi-person me-2\"></i>User Information</h5>
            </div>
            <div class=\"card-body\">
                ";
        // line 24
        $context["selectedRoleId"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 24, $this->source); })()), "request", [], "any", false, false, false, 24), "request", [], "any", false, false, false, 24), "get", ["role", (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 24, $this->source); })()), "role", [], "any", false, false, false, 24)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 24, $this->source); })()), "role", [], "any", false, false, false, 24), "idRole", [], "any", false, false, false, 24)) : (""))], "method", false, false, false, 24);
        // line 25
        yield "                ";
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty((isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 25, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 26
            yield "                <div class=\"alert alert-danger\">
                    Please correct the highlighted fields before saving the user.
                </div>
                ";
        }
        // line 30
        yield "                <form method=\"post\" novalidate>
                    <div class=\"row\">
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"nom\" class=\"form-label\">Last Name <span class=\"text-danger\">*</span></label>
                            <input type=\"text\" name=\"nom\" id=\"nom\" class=\"form-control ";
        // line 34
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "nom", [], "any", true, true, false, 34)) {
            yield "is-invalid";
        }
        yield "\" value=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 34, $this->source); })()), "request", [], "any", false, false, false, 34), "request", [], "any", false, false, false, 34), "get", ["nom", CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 34, $this->source); })()), "nom", [], "any", false, false, false, 34)], "method", false, false, false, 34), "html", null, true);
        yield "\">
                            ";
        // line 35
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "nom", [], "any", true, true, false, 35)) {
            yield "<div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 35, $this->source); })()), "nom", [], "any", false, false, false, 35), "html", null, true);
            yield "</div>";
        }
        // line 36
        yield "                        </div>
                        
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"prenom\" class=\"form-label\">First Name <span class=\"text-danger\">*</span></label>
                            <input type=\"text\" name=\"prenom\" id=\"prenom\" class=\"form-control ";
        // line 40
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "prenom", [], "any", true, true, false, 40)) {
            yield "is-invalid";
        }
        yield "\" value=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 40, $this->source); })()), "request", [], "any", false, false, false, 40), "request", [], "any", false, false, false, 40), "get", ["prenom", CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 40, $this->source); })()), "prenom", [], "any", false, false, false, 40)], "method", false, false, false, 40), "html", null, true);
        yield "\">
                            ";
        // line 41
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "prenom", [], "any", true, true, false, 41)) {
            yield "<div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 41, $this->source); })()), "prenom", [], "any", false, false, false, 41), "html", null, true);
            yield "</div>";
        }
        // line 42
        yield "                        </div>
                    </div>
                    
                    <div class=\"row\">
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"email\" class=\"form-label\">Email <span class=\"text-danger\">*</span></label>
                            <input type=\"text\" name=\"email\" id=\"email\" class=\"form-control ";
        // line 48
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "email", [], "any", true, true, false, 48)) {
            yield "is-invalid";
        }
        yield "\" value=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 48, $this->source); })()), "request", [], "any", false, false, false, 48), "request", [], "any", false, false, false, 48), "get", ["email", CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 48, $this->source); })()), "email", [], "any", false, false, false, 48)], "method", false, false, false, 48), "html", null, true);
        yield "\">
                            ";
        // line 49
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "email", [], "any", true, true, false, 49)) {
            yield "<div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 49, $this->source); })()), "email", [], "any", false, false, false, 49), "html", null, true);
            yield "</div>";
        }
        // line 50
        yield "                        </div>
                        
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"telephone\" class=\"form-label\">Phone</label>
                            <input type=\"text\" name=\"telephone\" id=\"telephone\" class=\"form-control ";
        // line 54
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "telephone", [], "any", true, true, false, 54)) {
            yield "is-invalid";
        }
        yield "\" value=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 54, $this->source); })()), "request", [], "any", false, false, false, 54), "request", [], "any", false, false, false, 54), "get", ["telephone", (((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "telephone", [], "any", true, true, false, 54) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 54, $this->source); })()), "telephone", [], "any", false, false, false, 54)))) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 54, $this->source); })()), "telephone", [], "any", false, false, false, 54)) : (""))], "method", false, false, false, 54), "html", null, true);
        yield "\">
                            ";
        // line 55
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "telephone", [], "any", true, true, false, 55)) {
            yield "<div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 55, $this->source); })()), "telephone", [], "any", false, false, false, 55), "html", null, true);
            yield "</div>";
        }
        // line 56
        yield "                        </div>
                    </div>
                    
                    <div class=\"row\">
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"motDePasse\" class=\"form-label\">New Password</label>
                            <input type=\"password\" name=\"motDePasse\" id=\"motDePasse\" class=\"form-control ";
        // line 62
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "motDePasse", [], "any", true, true, false, 62)) {
            yield "is-invalid";
        }
        yield "\" placeholder=\"Leave empty to keep current\">
                            ";
        // line 63
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "motDePasse", [], "any", true, true, false, 63)) {
            yield "<div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 63, $this->source); })()), "motDePasse", [], "any", false, false, false, 63), "html", null, true);
            yield "</div>";
        }
        // line 64
        yield "                            <div class=\"form-text\">Leave empty to keep the current password</div>
                        </div>
                        
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"dateNaissance\" class=\"form-label\">Birth Date</label>
                            <input type=\"date\" name=\"dateNaissance\" id=\"dateNaissance\" class=\"form-control ";
        // line 69
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "dateNaissance", [], "any", true, true, false, 69)) {
            yield "is-invalid";
        }
        yield "\" value=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 69, $this->source); })()), "request", [], "any", false, false, false, 69), "request", [], "any", false, false, false, 69), "get", ["dateNaissance", (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 69, $this->source); })()), "dateNaissance", [], "any", false, false, false, 69)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 69, $this->source); })()), "dateNaissance", [], "any", false, false, false, 69), "Y-m-d")) : (""))], "method", false, false, false, 69), "html", null, true);
        yield "\">
                            ";
        // line 70
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "dateNaissance", [], "any", true, true, false, 70)) {
            yield "<div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 70, $this->source); })()), "dateNaissance", [], "any", false, false, false, 70), "html", null, true);
            yield "</div>";
        }
        // line 71
        yield "                        </div>
                    </div>
                    
                    <div class=\"mb-4\">
                        <label for=\"role\" class=\"form-label\">Role</label>
                        <select name=\"role\" id=\"role\" class=\"form-select ";
        // line 76
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "role", [], "any", true, true, false, 76)) {
            yield "is-invalid";
        }
        yield "\">
                            <option value=\"\">-- Select Role --</option>
                            ";
        // line 78
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["roles"]) || array_key_exists("roles", $context) ? $context["roles"] : (function () { throw new RuntimeError('Variable "roles" does not exist.', 78, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["role"]) {
            // line 79
            yield "                            <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["role"], "idRole", [], "any", false, false, false, 79), "html", null, true);
            yield "\" ";
            if (((isset($context["selectedRoleId"]) || array_key_exists("selectedRoleId", $context) ? $context["selectedRoleId"] : (function () { throw new RuntimeError('Variable "selectedRoleId" does not exist.', 79, $this->source); })()) == CoreExtension::getAttribute($this->env, $this->source, $context["role"], "idRole", [], "any", false, false, false, 79))) {
                yield "selected";
            }
            yield ">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["role"], "nomRole", [], "any", false, false, false, 79), "html", null, true);
            yield "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['role'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 81
        yield "                        </select>
                        ";
        // line 82
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "role", [], "any", true, true, false, 82)) {
            yield "<div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 82, $this->source); })()), "role", [], "any", false, false, false, 82), "html", null, true);
            yield "</div>";
        }
        // line 83
        yield "                    </div>
                    
                    <hr class=\"my-4\">
                    
                    <div class=\"d-flex gap-2\">
                        <button type=\"submit\" class=\"btn btn-primary\">
                            <i class=\"bi bi-check-lg me-1\"></i> Update User
                        </button>
                        <a href=\"";
        // line 91
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_user_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 91, $this->source); })()), "id", [], "any", false, false, false, 91)]), "html", null, true);
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
        return "user/edit.html.twig";
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
        return array (  339 => 91,  329 => 83,  323 => 82,  320 => 81,  305 => 79,  301 => 78,  294 => 76,  287 => 71,  281 => 70,  273 => 69,  266 => 64,  260 => 63,  254 => 62,  246 => 56,  240 => 55,  232 => 54,  226 => 50,  220 => 49,  212 => 48,  204 => 42,  198 => 41,  190 => 40,  184 => 36,  178 => 35,  170 => 34,  164 => 30,  158 => 26,  155 => 25,  153 => 24,  140 => 14,  136 => 12,  123 => 11,  107 => 7,  102 => 6,  89 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Edit {{ user.nomComplet }}{% endblock %}

{% block breadcrumb %}
<li class=\"breadcrumb-item\"><a href=\"{{ path('app_user_index') }}\">Users</a></li>
<li class=\"breadcrumb-item\"><a href=\"{{ path('app_user_show', {'id': user.id}) }}\">{{ user.nomComplet }}</a></li>
<li class=\"breadcrumb-item active\">Edit</li>
{% endblock %}

{% block body %}
<div class=\"page-header\">
    <h1><i class=\"bi bi-pencil me-2\"></i>Edit User</h1>
    <p>Update information for <strong>{{ user.nomComplet }}</strong></p>
</div>

<div class=\"row justify-content-center\">
    <div class=\"col-lg-8\">
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\"><i class=\"bi bi-person me-2\"></i>User Information</h5>
            </div>
            <div class=\"card-body\">
                {% set selectedRoleId = app.request.request.get('role', user.role ? user.role.idRole : '') %}
                {% if errors is not empty %}
                <div class=\"alert alert-danger\">
                    Please correct the highlighted fields before saving the user.
                </div>
                {% endif %}
                <form method=\"post\" novalidate>
                    <div class=\"row\">
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"nom\" class=\"form-label\">Last Name <span class=\"text-danger\">*</span></label>
                            <input type=\"text\" name=\"nom\" id=\"nom\" class=\"form-control {% if errors.nom is defined %}is-invalid{% endif %}\" value=\"{{ app.request.request.get('nom', user.nom) }}\">
                            {% if errors.nom is defined %}<div class=\"invalid-feedback d-block\">{{ errors.nom }}</div>{% endif %}
                        </div>
                        
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"prenom\" class=\"form-label\">First Name <span class=\"text-danger\">*</span></label>
                            <input type=\"text\" name=\"prenom\" id=\"prenom\" class=\"form-control {% if errors.prenom is defined %}is-invalid{% endif %}\" value=\"{{ app.request.request.get('prenom', user.prenom) }}\">
                            {% if errors.prenom is defined %}<div class=\"invalid-feedback d-block\">{{ errors.prenom }}</div>{% endif %}
                        </div>
                    </div>
                    
                    <div class=\"row\">
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"email\" class=\"form-label\">Email <span class=\"text-danger\">*</span></label>
                            <input type=\"text\" name=\"email\" id=\"email\" class=\"form-control {% if errors.email is defined %}is-invalid{% endif %}\" value=\"{{ app.request.request.get('email', user.email) }}\">
                            {% if errors.email is defined %}<div class=\"invalid-feedback d-block\">{{ errors.email }}</div>{% endif %}
                        </div>
                        
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"telephone\" class=\"form-label\">Phone</label>
                            <input type=\"text\" name=\"telephone\" id=\"telephone\" class=\"form-control {% if errors.telephone is defined %}is-invalid{% endif %}\" value=\"{{ app.request.request.get('telephone', user.telephone ?? '') }}\">
                            {% if errors.telephone is defined %}<div class=\"invalid-feedback d-block\">{{ errors.telephone }}</div>{% endif %}
                        </div>
                    </div>
                    
                    <div class=\"row\">
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"motDePasse\" class=\"form-label\">New Password</label>
                            <input type=\"password\" name=\"motDePasse\" id=\"motDePasse\" class=\"form-control {% if errors.motDePasse is defined %}is-invalid{% endif %}\" placeholder=\"Leave empty to keep current\">
                            {% if errors.motDePasse is defined %}<div class=\"invalid-feedback d-block\">{{ errors.motDePasse }}</div>{% endif %}
                            <div class=\"form-text\">Leave empty to keep the current password</div>
                        </div>
                        
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"dateNaissance\" class=\"form-label\">Birth Date</label>
                            <input type=\"date\" name=\"dateNaissance\" id=\"dateNaissance\" class=\"form-control {% if errors.dateNaissance is defined %}is-invalid{% endif %}\" value=\"{{ app.request.request.get('dateNaissance', user.dateNaissance ? user.dateNaissance|date('Y-m-d') : '') }}\">
                            {% if errors.dateNaissance is defined %}<div class=\"invalid-feedback d-block\">{{ errors.dateNaissance }}</div>{% endif %}
                        </div>
                    </div>
                    
                    <div class=\"mb-4\">
                        <label for=\"role\" class=\"form-label\">Role</label>
                        <select name=\"role\" id=\"role\" class=\"form-select {% if errors.role is defined %}is-invalid{% endif %}\">
                            <option value=\"\">-- Select Role --</option>
                            {% for role in roles %}
                            <option value=\"{{ role.idRole }}\" {% if selectedRoleId == role.idRole %}selected{% endif %}>{{ role.nomRole }}</option>
                            {% endfor %}
                        </select>
                        {% if errors.role is defined %}<div class=\"invalid-feedback d-block\">{{ errors.role }}</div>{% endif %}
                    </div>
                    
                    <hr class=\"my-4\">
                    
                    <div class=\"d-flex gap-2\">
                        <button type=\"submit\" class=\"btn btn-primary\">
                            <i class=\"bi bi-check-lg me-1\"></i> Update User
                        </button>
                        <a href=\"{{ path('app_user_show', {'id': user.id}) }}\" class=\"btn btn-outline-secondary\">
                            <i class=\"bi bi-x-lg me-1\"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{% endblock %}
", "user/edit.html.twig", "C:\\Users\\Skaina\\Desktop\\final version symfony\\Marketplace-Project\\web\\templates\\user\\edit.html.twig");
    }
}
