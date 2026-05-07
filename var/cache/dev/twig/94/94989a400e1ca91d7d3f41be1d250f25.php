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

/* role/index.html.twig */
class __TwigTemplate_a5ca5d13670a423e2d88cb490ada6b33 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "role/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "role/index.html.twig"));

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

        yield "Roles";
        
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
        yield "<li class=\"breadcrumb-item active\">Roles</li>
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
        <h1><i class=\"bi bi-shield-lock me-2\"></i>Roles</h1>
        <p>Manage user roles and permissions</p>
    </div>
    <a href=\"";
        // line 15
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_role_new");
        yield "\" class=\"btn btn-primary\">
        <i class=\"bi bi-plus-lg me-1\"></i> Add Role
    </a>
</div>

";
        // line 20
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["roles"]) || array_key_exists("roles", $context) ? $context["roles"] : (function () { throw new RuntimeError('Variable "roles" does not exist.', 20, $this->source); })()))) {
            // line 21
            yield "<div class=\"card\">
    <div class=\"card-body text-center py-5\">
        <i class=\"bi bi-shield-lock\" style=\"font-size: 3rem; color: #94a3b8;\"></i>
        <h5 class=\"mt-3 text-muted\">No roles found</h5>
        <p class=\"text-muted\">Add roles to manage user permissions.</p>
        <a href=\"";
            // line 26
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_role_new");
            yield "\" class=\"btn btn-primary mt-2\">
            <i class=\"bi bi-plus-lg me-1\"></i> Add Role
        </a>
    </div>
</div>
";
        } else {
            // line 32
            yield "<div class=\"row\">
";
            // line 33
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["roles"]) || array_key_exists("roles", $context) ? $context["roles"] : (function () { throw new RuntimeError('Variable "roles" does not exist.', 33, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["role"]) {
                // line 34
                yield "<div class=\"col-md-6 col-lg-4 mb-4\">
    <div class=\"card h-100\">
        <div class=\"card-body\">
            <div class=\"d-flex align-items-center mb-3\">
                <div class=\"bg-primary bg-opacity-10 rounded-circle p-3 me-3\">
                    <i class=\"bi bi-shield-lock text-primary fs-4\"></i>
                </div>
                <div>
                    <h5 class=\"mb-0\">";
                // line 42
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["role"], "nomRole", [], "any", false, false, false, 42), "html", null, true);
                yield "</h5>
                    <small class=\"text-muted\">ID: ";
                // line 43
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["role"], "idRole", [], "any", false, false, false, 43), "html", null, true);
                yield "</small>
                </div>
            </div>
            <div class=\"d-flex align-items-center text-muted mb-3\">
                <i class=\"bi bi-people me-2\"></i>
                <span>";
                // line 48
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["role"], "users", [], "any", false, false, false, 48)), "html", null, true);
                yield " user(s)</span>
            </div>
        </div>
        <div class=\"card-footer bg-transparent border-top-0\">
            <div class=\"d-flex gap-2\">
                <a href=\"";
                // line 53
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_role_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["role"], "idRole", [], "any", false, false, false, 53)]), "html", null, true);
                yield "\" class=\"btn btn-outline-primary btn-sm flex-grow-1\">
                    <i class=\"bi bi-pencil me-1\"></i> Edit
                </a>
                <form action=\"";
                // line 56
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_role_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["role"], "idRole", [], "any", false, false, false, 56)]), "html", null, true);
                yield "\" method=\"post\" class=\"d-inline\" novalidate>
                    <input type=\"hidden\" name=\"_token\" value=\"";
                // line 57
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["role"], "idRole", [], "any", false, false, false, 57))), "html", null, true);
                yield "\">
                    <button type=\"submit\" class=\"btn btn-outline-danger btn-sm\">
                        <i class=\"bi bi-trash\"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['role'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 67
            yield "</div>
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
        return "role/index.html.twig";
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
        return array (  222 => 67,  206 => 57,  202 => 56,  196 => 53,  188 => 48,  180 => 43,  176 => 42,  166 => 34,  162 => 33,  159 => 32,  150 => 26,  143 => 21,  141 => 20,  133 => 15,  126 => 10,  113 => 9,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Roles{% endblock %}

{% block breadcrumb %}
<li class=\"breadcrumb-item active\">Roles</li>
{% endblock %}

{% block body %}
<div class=\"page-header d-flex justify-content-between align-items-center\">
    <div>
        <h1><i class=\"bi bi-shield-lock me-2\"></i>Roles</h1>
        <p>Manage user roles and permissions</p>
    </div>
    <a href=\"{{ path('app_role_new') }}\" class=\"btn btn-primary\">
        <i class=\"bi bi-plus-lg me-1\"></i> Add Role
    </a>
</div>

{% if roles is empty %}
<div class=\"card\">
    <div class=\"card-body text-center py-5\">
        <i class=\"bi bi-shield-lock\" style=\"font-size: 3rem; color: #94a3b8;\"></i>
        <h5 class=\"mt-3 text-muted\">No roles found</h5>
        <p class=\"text-muted\">Add roles to manage user permissions.</p>
        <a href=\"{{ path('app_role_new') }}\" class=\"btn btn-primary mt-2\">
            <i class=\"bi bi-plus-lg me-1\"></i> Add Role
        </a>
    </div>
</div>
{% else %}
<div class=\"row\">
{% for role in roles %}
<div class=\"col-md-6 col-lg-4 mb-4\">
    <div class=\"card h-100\">
        <div class=\"card-body\">
            <div class=\"d-flex align-items-center mb-3\">
                <div class=\"bg-primary bg-opacity-10 rounded-circle p-3 me-3\">
                    <i class=\"bi bi-shield-lock text-primary fs-4\"></i>
                </div>
                <div>
                    <h5 class=\"mb-0\">{{ role.nomRole }}</h5>
                    <small class=\"text-muted\">ID: {{ role.idRole }}</small>
                </div>
            </div>
            <div class=\"d-flex align-items-center text-muted mb-3\">
                <i class=\"bi bi-people me-2\"></i>
                <span>{{ role.users|length }} user(s)</span>
            </div>
        </div>
        <div class=\"card-footer bg-transparent border-top-0\">
            <div class=\"d-flex gap-2\">
                <a href=\"{{ path('app_role_edit', {'id': role.idRole}) }}\" class=\"btn btn-outline-primary btn-sm flex-grow-1\">
                    <i class=\"bi bi-pencil me-1\"></i> Edit
                </a>
                <form action=\"{{ path('app_role_delete', {'id': role.idRole}) }}\" method=\"post\" class=\"d-inline\" novalidate>
                    <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ role.idRole) }}\">
                    <button type=\"submit\" class=\"btn btn-outline-danger btn-sm\">
                        <i class=\"bi bi-trash\"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
{% endfor %}
</div>
{% endif %}
{% endblock %}
", "role/index.html.twig", "C:\\Users\\Skaina\\Desktop\\final version symfony\\Marketplace-Project\\web\\templates\\role\\index.html.twig");
    }
}
