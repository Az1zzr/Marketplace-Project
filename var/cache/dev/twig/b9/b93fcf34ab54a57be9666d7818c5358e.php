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

/* user/index.html.twig */
class __TwigTemplate_e5bbdc6cfadbf7a16eb6a1b30f27fb0c extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user/index.html.twig"));

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

        yield "Users";
        
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
        yield "<li class=\"breadcrumb-item active\">Users</li>
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
        <h1><i class=\"bi bi-people me-2\"></i>Users</h1>
        <p>Manage user accounts</p>
    </div>
    <a href=\"";
        // line 15
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_user_new");
        yield "\" class=\"btn btn-primary\">
        <i class=\"bi bi-plus-lg me-1\"></i> Add User
    </a>
</div>

";
        // line 20
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["users"]) || array_key_exists("users", $context) ? $context["users"] : (function () { throw new RuntimeError('Variable "users" does not exist.', 20, $this->source); })()))) {
            // line 21
            yield "<div class=\"card\">
    <div class=\"card-body text-center py-5\">
        <i class=\"bi bi-people\" style=\"font-size: 3rem; color: #94a3b8;\"></i>
        <h5 class=\"mt-3 text-muted\">No users found</h5>
        <p class=\"text-muted\">Add users to manage access to the system.</p>
        <a href=\"";
            // line 26
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_user_new");
            yield "\" class=\"btn btn-primary mt-2\">
            <i class=\"bi bi-plus-lg me-1\"></i> Add User
        </a>
    </div>
</div>
";
        } else {
            // line 32
            yield "<div class=\"card\">
    <div class=\"card-body p-0\">
        <div class=\"table-responsive\">
            <table class=\"table table-hover mb-0\">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                ";
            // line 46
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["users"]) || array_key_exists("users", $context) ? $context["users"] : (function () { throw new RuntimeError('Variable "users" does not exist.', 46, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
                // line 47
                yield "                    ";
                $context["roleName"] = (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["user"], "role", [], "any", false, false, false, 47)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user"], "role", [], "any", false, false, false, 47), "nomRole", [], "any", false, false, false, 47))) : (""));
                // line 48
                yield "                    <tr>
                        <td>
                            <div class=\"d-flex align-items-center\">
                                ";
                // line 51
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["user"], "photoPath", [], "any", false, false, false, 51)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 52
                    yield "                                <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "photoPath", [], "any", false, false, false, 52), "html", null, true);
                    yield "\" class=\"rounded-circle me-2\" alt=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "nomComplet", [], "any", false, false, false, 52), "html", null, true);
                    yield "\" style=\"width: 40px; height: 40px; object-fit: cover;\">
                                ";
                } else {
                    // line 54
                    yield "                                <div class=\"user-avatar me-2\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["user"], "prenom", [], "any", false, false, false, 54)), "html", null, true);
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["user"], "nom", [], "any", false, false, false, 54)), "html", null, true);
                    yield "</div>
                                ";
                }
                // line 56
                yield "                                <div>
                                    <div class=\"fw-medium\">";
                // line 57
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "nomComplet", [], "any", false, false, false, 57), "html", null, true);
                yield "</div>
                                    <small class=\"text-muted\">ID: ";
                // line 58
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "id", [], "any", false, false, false, 58), "html", null, true);
                yield "</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href=\"mailto:";
                // line 63
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "email", [], "any", false, false, false, 63), "html", null, true);
                yield "\" class=\"text-decoration-none\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "email", [], "any", false, false, false, 63), "html", null, true);
                yield "</a>
                        </td>
                        <td>";
                // line 65
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["user"], "telephone", [], "any", true, true, false, 65) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["user"], "telephone", [], "any", false, false, false, 65)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "telephone", [], "any", false, false, false, 65), "html", null, true)) : ("-"));
                yield "</td>
                        <td>
                            ";
                // line 67
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["user"], "role", [], "any", false, false, false, 67)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 68
                    yield "                            <span class=\"badge ";
                    if (((isset($context["roleName"]) || array_key_exists("roleName", $context) ? $context["roleName"] : (function () { throw new RuntimeError('Variable "roleName" does not exist.', 68, $this->source); })()) == "admin")) {
                        yield "bg-primary";
                    } elseif (CoreExtension::inFilter((isset($context["roleName"]) || array_key_exists("roleName", $context) ? $context["roleName"] : (function () { throw new RuntimeError('Variable "roleName" does not exist.', 68, $this->source); })()), ["fournisseur", "fournisseurs"])) {
                        yield "bg-success";
                    } else {
                        yield "bg-secondary";
                    }
                    yield "\">
                                ";
                    // line 69
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["user"], "role", [], "any", false, false, false, 69), "nomRole", [], "any", false, false, false, 69)), "html", null, true);
                    yield "
                            </span>
                            ";
                } else {
                    // line 72
                    yield "                            <span class=\"text-muted\">-</span>
                            ";
                }
                // line 74
                yield "                        </td>
                        <td>
                            <div class=\"btn-group\" role=\"group\">
                                <a href=\"";
                // line 77
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_user_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["user"], "id", [], "any", false, false, false, 77)]), "html", null, true);
                yield "\" class=\"btn btn-outline-secondary btn-sm\">
                                    <i class=\"bi bi-eye\"></i>
                                </a>
                                <a href=\"";
                // line 80
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_user_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["user"], "id", [], "any", false, false, false, 80)]), "html", null, true);
                yield "\" class=\"btn btn-outline-primary btn-sm\">
                                    <i class=\"bi bi-pencil\"></i>
                                </a>
                                <form action=\"";
                // line 83
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_user_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["user"], "id", [], "any", false, false, false, 83)]), "html", null, true);
                yield "\" method=\"post\" class=\"d-inline\" novalidate>
                                    <input type=\"hidden\" name=\"_token\" value=\"";
                // line 84
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["user"], "id", [], "any", false, false, false, 84))), "html", null, true);
                yield "\">
                                    <button type=\"submit\" class=\"btn btn-outline-danger btn-sm\">
                                        <i class=\"bi bi-trash\"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['user'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 93
            yield "                </tbody>
            </table>
        </div>
    </div>
</div>
";
        }
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "user/index.html.twig";
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
        return array (  290 => 93,  275 => 84,  271 => 83,  265 => 80,  259 => 77,  254 => 74,  250 => 72,  244 => 69,  233 => 68,  231 => 67,  226 => 65,  219 => 63,  211 => 58,  207 => 57,  204 => 56,  197 => 54,  189 => 52,  187 => 51,  182 => 48,  179 => 47,  175 => 46,  159 => 32,  150 => 26,  143 => 21,  141 => 20,  133 => 15,  126 => 10,  113 => 9,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Users{% endblock %}

{% block breadcrumb %}
<li class=\"breadcrumb-item active\">Users</li>
{% endblock %}

{% block body %}
<div class=\"page-header d-flex justify-content-between align-items-center\">
    <div>
        <h1><i class=\"bi bi-people me-2\"></i>Users</h1>
        <p>Manage user accounts</p>
    </div>
    <a href=\"{{ path('app_user_new') }}\" class=\"btn btn-primary\">
        <i class=\"bi bi-plus-lg me-1\"></i> Add User
    </a>
</div>

{% if users is empty %}
<div class=\"card\">
    <div class=\"card-body text-center py-5\">
        <i class=\"bi bi-people\" style=\"font-size: 3rem; color: #94a3b8;\"></i>
        <h5 class=\"mt-3 text-muted\">No users found</h5>
        <p class=\"text-muted\">Add users to manage access to the system.</p>
        <a href=\"{{ path('app_user_new') }}\" class=\"btn btn-primary mt-2\">
            <i class=\"bi bi-plus-lg me-1\"></i> Add User
        </a>
    </div>
</div>
{% else %}
<div class=\"card\">
    <div class=\"card-body p-0\">
        <div class=\"table-responsive\">
            <table class=\"table table-hover mb-0\">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                {% for user in users %}
                    {% set roleName = user.role ? user.role.nomRole|lower : '' %}
                    <tr>
                        <td>
                            <div class=\"d-flex align-items-center\">
                                {% if user.photoPath %}
                                <img src=\"{{ user.photoPath }}\" class=\"rounded-circle me-2\" alt=\"{{ user.nomComplet }}\" style=\"width: 40px; height: 40px; object-fit: cover;\">
                                {% else %}
                                <div class=\"user-avatar me-2\">{{ user.prenom|first }}{{ user.nom|first }}</div>
                                {% endif %}
                                <div>
                                    <div class=\"fw-medium\">{{ user.nomComplet }}</div>
                                    <small class=\"text-muted\">ID: {{ user.id }}</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href=\"mailto:{{ user.email }}\" class=\"text-decoration-none\">{{ user.email }}</a>
                        </td>
                        <td>{{ user.telephone ?? '-' }}</td>
                        <td>
                            {% if user.role %}
                            <span class=\"badge {% if roleName == 'admin' %}bg-primary{% elseif roleName in ['fournisseur', 'fournisseurs'] %}bg-success{% else %}bg-secondary{% endif %}\">
                                {{ user.role.nomRole|title }}
                            </span>
                            {% else %}
                            <span class=\"text-muted\">-</span>
                            {% endif %}
                        </td>
                        <td>
                            <div class=\"btn-group\" role=\"group\">
                                <a href=\"{{ path('app_user_show', {'id': user.id}) }}\" class=\"btn btn-outline-secondary btn-sm\">
                                    <i class=\"bi bi-eye\"></i>
                                </a>
                                <a href=\"{{ path('app_user_edit', {'id': user.id}) }}\" class=\"btn btn-outline-primary btn-sm\">
                                    <i class=\"bi bi-pencil\"></i>
                                </a>
                                <form action=\"{{ path('app_user_delete', {'id': user.id}) }}\" method=\"post\" class=\"d-inline\" novalidate>
                                    <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ user.id) }}\">
                                    <button type=\"submit\" class=\"btn btn-outline-danger btn-sm\">
                                        <i class=\"bi bi-trash\"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                {% endfor %}
                </tbody>
            </table>
        </div>
    </div>
</div>
{% endif %}
{% endblock %}
", "user/index.html.twig", "C:\\Users\\Skaina\\Desktop\\final version symfony\\Marketplace-Project\\web\\templates\\user\\index.html.twig");
    }
}
