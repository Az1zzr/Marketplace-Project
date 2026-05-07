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

/* user/show.html.twig */
class __TwigTemplate_549f5b3d044f634751d7e5e0349df9a7 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user/show.html.twig"));

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
<li class=\"breadcrumb-item active\">";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 7, $this->source); })()), "nomComplet", [], "any", false, false, false, 7), "html", null, true);
        yield "</li>
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
        yield "<div class=\"page-header d-flex justify-content-between align-items-center\">
    <div>
        <h1><i class=\"bi bi-person me-2\"></i>User Details</h1>
        <p>View user information</p>
    </div>
    <div class=\"d-flex gap-2\">
        <a href=\"";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_user_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 17, $this->source); })()), "id", [], "any", false, false, false, 17)]), "html", null, true);
        yield "\" class=\"btn btn-primary\">
            <i class=\"bi bi-pencil me-1\"></i> Edit
        </a>
        <a href=\"";
        // line 20
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_user_index");
        yield "\" class=\"btn btn-outline-secondary\">
            <i class=\"bi bi-arrow-left me-1\"></i> Back
        </a>
    </div>
</div>

<div class=\"row\">
    <div class=\"col-lg-4 mb-4\">
        <div class=\"card text-center\">
            <div class=\"card-body py-5\">
                ";
        // line 30
        $context["roleName"] = (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 30, $this->source); })()), "role", [], "any", false, false, false, 30)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 30, $this->source); })()), "role", [], "any", false, false, false, 30), "nomRole", [], "any", false, false, false, 30))) : (""));
        // line 31
        yield "                ";
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 31, $this->source); })()), "photoPath", [], "any", false, false, false, 31)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 32
            yield "                <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 32, $this->source); })()), "photoPath", [], "any", false, false, false, 32), "html", null, true);
            yield "\" class=\"rounded-circle mb-3\" alt=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 32, $this->source); })()), "nomComplet", [], "any", false, false, false, 32), "html", null, true);
            yield "\" style=\"width: 150px; height: 150px; object-fit: cover;\">
                ";
        } else {
            // line 34
            yield "                <div class=\"user-avatar mx-auto mb-3\" style=\"width: 150px; height: 150px; font-size: 3rem;\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 34, $this->source); })()), "prenom", [], "any", false, false, false, 34)), "html", null, true);
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 34, $this->source); })()), "nom", [], "any", false, false, false, 34)), "html", null, true);
            yield "</div>
                ";
        }
        // line 36
        yield "                <h4 class=\"mb-1\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 36, $this->source); })()), "nomComplet", [], "any", false, false, false, 36), "html", null, true);
        yield "</h4>
                <p class=\"text-muted mb-2\">";
        // line 37
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 37, $this->source); })()), "email", [], "any", false, false, false, 37), "html", null, true);
        yield "</p>
                ";
        // line 38
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 38, $this->source); })()), "role", [], "any", false, false, false, 38)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 39
            yield "                <span class=\"badge ";
            if (((isset($context["roleName"]) || array_key_exists("roleName", $context) ? $context["roleName"] : (function () { throw new RuntimeError('Variable "roleName" does not exist.', 39, $this->source); })()) == "admin")) {
                yield "bg-primary";
            } elseif (CoreExtension::inFilter((isset($context["roleName"]) || array_key_exists("roleName", $context) ? $context["roleName"] : (function () { throw new RuntimeError('Variable "roleName" does not exist.', 39, $this->source); })()), ["fournisseur", "fournisseurs"])) {
                yield "bg-success";
            } else {
                yield "bg-secondary";
            }
            yield " fs-6\">
                    ";
            // line 40
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 40, $this->source); })()), "role", [], "any", false, false, false, 40), "nomRole", [], "any", false, false, false, 40)), "html", null, true);
            yield "
                </span>
                ";
        }
        // line 43
        yield "            </div>
        </div>
    </div>
    
    <div class=\"col-lg-8 mb-4\">
        <div class=\"card h-100\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\"><i class=\"bi bi-info-circle me-2\"></i>Account Information</h5>
            </div>
            <div class=\"card-body\">
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">User ID</div>
                    <div class=\"col-sm-8 fw-medium\">#";
        // line 55
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 55, $this->source); })()), "id", [], "any", false, false, false, 55), "html", null, true);
        yield "</div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Full Name</div>
                    <div class=\"col-sm-8 fw-medium\">";
        // line 59
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 59, $this->source); })()), "nomComplet", [], "any", false, false, false, 59), "html", null, true);
        yield "</div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Email</div>
                    <div class=\"col-sm-8\">
                        <a href=\"mailto:";
        // line 64
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 64, $this->source); })()), "email", [], "any", false, false, false, 64), "html", null, true);
        yield "\" class=\"text-decoration-none\">
                            <i class=\"bi bi-envelope me-1\"></i>";
        // line 65
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 65, $this->source); })()), "email", [], "any", false, false, false, 65), "html", null, true);
        yield "
                        </a>
                    </div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Phone</div>
                    <div class=\"col-sm-8\">
                        ";
        // line 72
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 72, $this->source); })()), "telephone", [], "any", false, false, false, 72)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 73
            yield "                        <a href=\"tel:";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 73, $this->source); })()), "telephone", [], "any", false, false, false, 73), "html", null, true);
            yield "\" class=\"text-decoration-none\">
                            <i class=\"bi bi-telephone me-1\"></i>";
            // line 74
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 74, $this->source); })()), "telephone", [], "any", false, false, false, 74), "html", null, true);
            yield "
                        </a>
                        ";
        } else {
            // line 77
            yield "                        <span class=\"text-muted\">-</span>
                        ";
        }
        // line 79
        yield "                    </div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Birth Date</div>
                    <div class=\"col-sm-8\">
                        ";
        // line 84
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 84, $this->source); })()), "dateNaissance", [], "any", false, false, false, 84)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 85
            yield "                        <i class=\"bi bi-calendar3 me-1\"></i>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 85, $this->source); })()), "dateNaissance", [], "any", false, false, false, 85), "Y-m-d"), "html", null, true);
            yield "
                        ";
        } else {
            // line 87
            yield "                        <span class=\"text-muted\">-</span>
                        ";
        }
        // line 89
        yield "                    </div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Role</div>
                    <div class=\"col-sm-8\">
                        ";
        // line 94
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 94, $this->source); })()), "role", [], "any", false, false, false, 94)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 95
            yield "                        <span class=\"badge ";
            if (((isset($context["roleName"]) || array_key_exists("roleName", $context) ? $context["roleName"] : (function () { throw new RuntimeError('Variable "roleName" does not exist.', 95, $this->source); })()) == "admin")) {
                yield "bg-primary";
            } elseif (CoreExtension::inFilter((isset($context["roleName"]) || array_key_exists("roleName", $context) ? $context["roleName"] : (function () { throw new RuntimeError('Variable "roleName" does not exist.', 95, $this->source); })()), ["fournisseur", "fournisseurs"])) {
                yield "bg-success";
            } else {
                yield "bg-secondary";
            }
            yield "\">
                            ";
            // line 96
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 96, $this->source); })()), "role", [], "any", false, false, false, 96), "nomRole", [], "any", false, false, false, 96)), "html", null, true);
            yield "
                        </span>
                        ";
        } else {
            // line 99
            yield "                        <span class=\"text-muted\">-</span>
                        ";
        }
        // line 101
        yield "                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class=\"card\">
    <div class=\"card-header\">
        <h5 class=\"mb-0\"><i class=\"bi bi-trash me-2 text-danger\"></i>Danger Zone</h5>
    </div>
    <div class=\"card-body\">
        <p class=\"text-muted mb-3\">Deleting this user will permanently remove their account and all associated data.</p>
        <form action=\"";
        // line 114
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_user_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 114, $this->source); })()), "id", [], "any", false, false, false, 114)]), "html", null, true);
        yield "\" method=\"post\" novalidate>
            <input type=\"hidden\" name=\"_token\" value=\"";
        // line 115
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 115, $this->source); })()), "id", [], "any", false, false, false, 115))), "html", null, true);
        yield "\">
            <button type=\"submit\" class=\"btn btn-outline-danger\">
                <i class=\"bi bi-trash me-1\"></i> Delete User
            </button>
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
        return "user/show.html.twig";
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
        return array (  335 => 115,  331 => 114,  316 => 101,  312 => 99,  306 => 96,  295 => 95,  293 => 94,  286 => 89,  282 => 87,  276 => 85,  274 => 84,  267 => 79,  263 => 77,  257 => 74,  252 => 73,  250 => 72,  240 => 65,  236 => 64,  228 => 59,  221 => 55,  207 => 43,  201 => 40,  190 => 39,  188 => 38,  184 => 37,  179 => 36,  172 => 34,  164 => 32,  161 => 31,  159 => 30,  146 => 20,  140 => 17,  132 => 11,  119 => 10,  106 => 7,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}{{ user.nomComplet }}{% endblock %}

{% block breadcrumb %}
<li class=\"breadcrumb-item\"><a href=\"{{ path('app_user_index') }}\">Users</a></li>
<li class=\"breadcrumb-item active\">{{ user.nomComplet }}</li>
{% endblock %}

{% block body %}
<div class=\"page-header d-flex justify-content-between align-items-center\">
    <div>
        <h1><i class=\"bi bi-person me-2\"></i>User Details</h1>
        <p>View user information</p>
    </div>
    <div class=\"d-flex gap-2\">
        <a href=\"{{ path('app_user_edit', {'id': user.id}) }}\" class=\"btn btn-primary\">
            <i class=\"bi bi-pencil me-1\"></i> Edit
        </a>
        <a href=\"{{ path('app_user_index') }}\" class=\"btn btn-outline-secondary\">
            <i class=\"bi bi-arrow-left me-1\"></i> Back
        </a>
    </div>
</div>

<div class=\"row\">
    <div class=\"col-lg-4 mb-4\">
        <div class=\"card text-center\">
            <div class=\"card-body py-5\">
                {% set roleName = user.role ? user.role.nomRole|lower : '' %}
                {% if user.photoPath %}
                <img src=\"{{ user.photoPath }}\" class=\"rounded-circle mb-3\" alt=\"{{ user.nomComplet }}\" style=\"width: 150px; height: 150px; object-fit: cover;\">
                {% else %}
                <div class=\"user-avatar mx-auto mb-3\" style=\"width: 150px; height: 150px; font-size: 3rem;\">{{ user.prenom|first }}{{ user.nom|first }}</div>
                {% endif %}
                <h4 class=\"mb-1\">{{ user.nomComplet }}</h4>
                <p class=\"text-muted mb-2\">{{ user.email }}</p>
                {% if user.role %}
                <span class=\"badge {% if roleName == 'admin' %}bg-primary{% elseif roleName in ['fournisseur', 'fournisseurs'] %}bg-success{% else %}bg-secondary{% endif %} fs-6\">
                    {{ user.role.nomRole|title }}
                </span>
                {% endif %}
            </div>
        </div>
    </div>
    
    <div class=\"col-lg-8 mb-4\">
        <div class=\"card h-100\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\"><i class=\"bi bi-info-circle me-2\"></i>Account Information</h5>
            </div>
            <div class=\"card-body\">
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">User ID</div>
                    <div class=\"col-sm-8 fw-medium\">#{{ user.id }}</div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Full Name</div>
                    <div class=\"col-sm-8 fw-medium\">{{ user.nomComplet }}</div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Email</div>
                    <div class=\"col-sm-8\">
                        <a href=\"mailto:{{ user.email }}\" class=\"text-decoration-none\">
                            <i class=\"bi bi-envelope me-1\"></i>{{ user.email }}
                        </a>
                    </div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Phone</div>
                    <div class=\"col-sm-8\">
                        {% if user.telephone %}
                        <a href=\"tel:{{ user.telephone }}\" class=\"text-decoration-none\">
                            <i class=\"bi bi-telephone me-1\"></i>{{ user.telephone }}
                        </a>
                        {% else %}
                        <span class=\"text-muted\">-</span>
                        {% endif %}
                    </div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Birth Date</div>
                    <div class=\"col-sm-8\">
                        {% if user.dateNaissance %}
                        <i class=\"bi bi-calendar3 me-1\"></i>{{ user.dateNaissance|date('Y-m-d') }}
                        {% else %}
                        <span class=\"text-muted\">-</span>
                        {% endif %}
                    </div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Role</div>
                    <div class=\"col-sm-8\">
                        {% if user.role %}
                        <span class=\"badge {% if roleName == 'admin' %}bg-primary{% elseif roleName in ['fournisseur', 'fournisseurs'] %}bg-success{% else %}bg-secondary{% endif %}\">
                            {{ user.role.nomRole|title }}
                        </span>
                        {% else %}
                        <span class=\"text-muted\">-</span>
                        {% endif %}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class=\"card\">
    <div class=\"card-header\">
        <h5 class=\"mb-0\"><i class=\"bi bi-trash me-2 text-danger\"></i>Danger Zone</h5>
    </div>
    <div class=\"card-body\">
        <p class=\"text-muted mb-3\">Deleting this user will permanently remove their account and all associated data.</p>
        <form action=\"{{ path('app_user_delete', {'id': user.id}) }}\" method=\"post\" novalidate>
            <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ user.id) }}\">
            <button type=\"submit\" class=\"btn btn-outline-danger\">
                <i class=\"bi bi-trash me-1\"></i> Delete User
            </button>
        </form>
    </div>
</div>
{% endblock %}
", "user/show.html.twig", "C:\\Users\\Skaina\\Desktop\\final version symfony\\Marketplace-Project\\web\\templates\\user\\show.html.twig");
    }
}
