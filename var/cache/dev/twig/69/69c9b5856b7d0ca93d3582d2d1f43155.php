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

/* produit/new.html.twig */
class __TwigTemplate_913c84f66f2762f7fde3c67218c1c16b extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "produit/new.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "produit/new.html.twig"));

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

        yield "New Product";
        
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
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_index");
        yield "\">Products</a></li>
<li class=\"breadcrumb-item active\">New Product</li>
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
    <h1><i class=\"bi bi-plus-circle me-2\"></i>Add New Product</h1>
    <p>Fill in the details to add a new product to your catalog</p>
</div>

<div class=\"row justify-content-center\">
    <div class=\"col-lg-8\">
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\"><i class=\"bi bi-box-seam me-2\"></i>Product Information</h5>
            </div>

            <div class=\"card-body\">
                ";
        // line 24
        if ((array_key_exists("errors", $context) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 24, $this->source); })())) > 0))) {
            // line 25
            yield "                <div class=\"alert alert-danger\">
                    <ul class=\"mb-0\">
                        ";
            // line 27
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 27, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 28
                yield "                        <li>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["error"], "html", null, true);
                yield "</li>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 30
            yield "                    </ul>
                </div>
                ";
        }
        // line 33
        yield "
                <form method=\"post\" novalidate>
                    <div class=\"row\">
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"nomProduit\" class=\"form-label\">Product Name <span class=\"text-danger\">*</span></label>
                            <input type=\"text\" name=\"nomProduit\" id=\"nomProduit\" class=\"form-control ";
        // line 38
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "nomProduit", [], "any", true, true, false, 38)) {
            yield "is-invalid";
        }
        yield "\" value=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 38, $this->source); })()), "request", [], "any", false, false, false, 38), "request", [], "any", false, false, false, 38), "get", ["nomProduit"], "method", false, false, false, 38), "html", null, true);
        yield "\" placeholder=\"Enter product name\">
                        </div>

                        <div class=\"col-md-6 mb-3\">
                            <label for=\"adresse\" class=\"form-label\">Address <span class=\"text-danger\">*</span></label>
                            <input type=\"text\" name=\"adresse\" id=\"adresse\" class=\"form-control ";
        // line 43
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "adresse", [], "any", true, true, false, 43)) {
            yield "is-invalid";
        }
        yield "\" value=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 43, $this->source); })()), "request", [], "any", false, false, false, 43), "request", [], "any", false, false, false, 43), "get", ["adresse"], "method", false, false, false, 43), "html", null, true);
        yield "\" placeholder=\"Enter location/address\">
                        </div>
                    </div>

                    ";
        // line 47
        if ((array_key_exists("aiCategorySuggestion", $context) && (isset($context["aiCategorySuggestion"]) || array_key_exists("aiCategorySuggestion", $context) ? $context["aiCategorySuggestion"] : (function () { throw new RuntimeError('Variable "aiCategorySuggestion" does not exist.', 47, $this->source); })()))) {
            // line 48
            yield "                    <div class=\"alert alert-info d-flex justify-content-between align-items-center\">
                        <div>
                            <strong>AI Suggestion:</strong>
                            ";
            // line 51
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["aiCategorySuggestion"]) || array_key_exists("aiCategorySuggestion", $context) ? $context["aiCategorySuggestion"] : (function () { throw new RuntimeError('Variable "aiCategorySuggestion" does not exist.', 51, $this->source); })()), "category", [], "any", false, false, false, 51), "nom", [], "any", false, false, false, 51), "html", null, true);
            yield "
                            (";
            // line 52
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["aiCategorySuggestion"]) || array_key_exists("aiCategorySuggestion", $context) ? $context["aiCategorySuggestion"] : (function () { throw new RuntimeError('Variable "aiCategorySuggestion" does not exist.', 52, $this->source); })()), "confidence", [], "any", false, false, false, 52), "html", null, true);
            yield "%)
                            <div class=\"small text-muted\">";
            // line 53
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["aiCategorySuggestion"]) || array_key_exists("aiCategorySuggestion", $context) ? $context["aiCategorySuggestion"] : (function () { throw new RuntimeError('Variable "aiCategorySuggestion" does not exist.', 53, $this->source); })()), "reason", [], "any", false, false, false, 53), "html", null, true);
            yield "</div>
                        </div>

                        <button type=\"submit\" name=\"suggestCategory\" value=\"1\" class=\"btn btn-sm btn-primary\">
                            Apply Suggestion
                        </button>
                    </div>
                    ";
        }
        // line 61
        yield "
                    <div class=\"mb-3\">
                        <label for=\"categorie\" class=\"form-label\">Category <span class=\"text-danger\">*</span></label>
                        ";
        // line 64
        $context["currentCategory"] = (((array_key_exists("selectedCategoryId", $context) && (isset($context["selectedCategoryId"]) || array_key_exists("selectedCategoryId", $context) ? $context["selectedCategoryId"] : (function () { throw new RuntimeError('Variable "selectedCategoryId" does not exist.', 64, $this->source); })()))) ? ((isset($context["selectedCategoryId"]) || array_key_exists("selectedCategoryId", $context) ? $context["selectedCategoryId"] : (function () { throw new RuntimeError('Variable "selectedCategoryId" does not exist.', 64, $this->source); })())) : (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 64, $this->source); })()), "request", [], "any", false, false, false, 64), "request", [], "any", false, false, false, 64), "get", ["categorie"], "method", false, false, false, 64)));
        // line 65
        yield "                        <select name=\"categorie\" id=\"categorie\" class=\"form-select ";
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "categorie", [], "any", true, true, false, 65)) {
            yield "is-invalid";
        }
        yield "\">
                            <option value=\"\">Choose a category</option>
                            ";
        // line 67
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["categories"]) || array_key_exists("categories", $context) ? $context["categories"] : (function () { throw new RuntimeError('Variable "categories" does not exist.', 67, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["categorie"]) {
            // line 68
            yield "                            <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["categorie"], "id", [], "any", false, false, false, 68), "html", null, true);
            yield "\" ";
            if (((isset($context["currentCategory"]) || array_key_exists("currentCategory", $context) ? $context["currentCategory"] : (function () { throw new RuntimeError('Variable "currentCategory" does not exist.', 68, $this->source); })()) == CoreExtension::getAttribute($this->env, $this->source, $context["categorie"], "id", [], "any", false, false, false, 68))) {
                yield "selected";
            }
            yield ">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["categorie"], "nom", [], "any", false, false, false, 68), "html", null, true);
            yield "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['categorie'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 70
        yield "                        </select>
                    </div>

                    <div class=\"row\">
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"prix\" class=\"form-label\">Price (TND) <span class=\"text-danger\">*</span></label>
                            <div class=\"input-group\">
                                <span class=\"input-group-text\">TND</span>
                                <input type=\"number\" name=\"prix\" id=\"prix\" class=\"form-control ";
        // line 78
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "prix", [], "any", true, true, false, 78)) {
            yield "is-invalid";
        }
        yield "\" step=\"0.01\" min=\"0\" value=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 78, $this->source); })()), "request", [], "any", false, false, false, 78), "request", [], "any", false, false, false, 78), "get", ["prix"], "method", false, false, false, 78), "html", null, true);
        yield "\" placeholder=\"0.00\">
                            </div>
                        </div>

                        <div class=\"col-md-6 mb-3\">
                            <label for=\"quantite\" class=\"form-label\">Initial Quantity <span class=\"text-danger\">*</span></label>
                            <input type=\"number\" name=\"quantite\" id=\"quantite\" class=\"form-control ";
        // line 84
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "quantite", [], "any", true, true, false, 84)) {
            yield "is-invalid";
        }
        yield "\" min=\"0\" value=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 84, $this->source); })()), "request", [], "any", false, false, false, 84), "request", [], "any", false, false, false, 84), "get", ["quantite"], "method", false, false, false, 84), "html", null, true);
        yield "\" placeholder=\"0\">
                        </div>
                    </div>

                    <div class=\"mb-4\">
                        <label for=\"imageURL\" class=\"form-label\">Image URL <span class=\"text-muted small\">(Optional)</span></label>
                        <input type=\"url\" name=\"imageURL\" id=\"imageURL\" class=\"form-control\" value=\"";
        // line 90
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 90, $this->source); })()), "request", [], "any", false, false, false, 90), "request", [], "any", false, false, false, 90), "get", ["imageURL"], "method", false, false, false, 90), "html", null, true);
        yield "\" placeholder=\"https://example.com/image.jpg\">
                        <div class=\"form-text\">Enter a valid image URL (jpg, png, webp)</div>
                    </div>

                    <hr class=\"my-4\">

                    <div class=\"d-flex gap-2\">
                        <button type=\"submit\" class=\"btn btn-primary\">
                            <i class=\"bi bi-check-lg me-1\"></i> Save Product
                        </button>

                        <button type=\"submit\" name=\"suggestCategory\" value=\"1\" class=\"btn btn-outline-info\">
                            <i class=\"bi bi-stars me-1\"></i> Suggest Category
                        </button>

                        <a href=\"";
        // line 105
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_index");
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
        return "produit/new.html.twig";
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
        return array (  312 => 105,  294 => 90,  281 => 84,  268 => 78,  258 => 70,  243 => 68,  239 => 67,  231 => 65,  229 => 64,  224 => 61,  213 => 53,  209 => 52,  205 => 51,  200 => 48,  198 => 47,  187 => 43,  175 => 38,  168 => 33,  163 => 30,  154 => 28,  150 => 27,  146 => 25,  144 => 24,  129 => 11,  116 => 10,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}New Product{% endblock %}

{% block breadcrumb %}
<li class=\"breadcrumb-item\"><a href=\"{{ path('app_produit_index') }}\">Products</a></li>
<li class=\"breadcrumb-item active\">New Product</li>
{% endblock %}

{% block body %}
<div class=\"page-header\">
    <h1><i class=\"bi bi-plus-circle me-2\"></i>Add New Product</h1>
    <p>Fill in the details to add a new product to your catalog</p>
</div>

<div class=\"row justify-content-center\">
    <div class=\"col-lg-8\">
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\"><i class=\"bi bi-box-seam me-2\"></i>Product Information</h5>
            </div>

            <div class=\"card-body\">
                {% if errors is defined and errors|length > 0 %}
                <div class=\"alert alert-danger\">
                    <ul class=\"mb-0\">
                        {% for error in errors %}
                        <li>{{ error }}</li>
                        {% endfor %}
                    </ul>
                </div>
                {% endif %}

                <form method=\"post\" novalidate>
                    <div class=\"row\">
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"nomProduit\" class=\"form-label\">Product Name <span class=\"text-danger\">*</span></label>
                            <input type=\"text\" name=\"nomProduit\" id=\"nomProduit\" class=\"form-control {% if errors.nomProduit is defined %}is-invalid{% endif %}\" value=\"{{ app.request.request.get('nomProduit') }}\" placeholder=\"Enter product name\">
                        </div>

                        <div class=\"col-md-6 mb-3\">
                            <label for=\"adresse\" class=\"form-label\">Address <span class=\"text-danger\">*</span></label>
                            <input type=\"text\" name=\"adresse\" id=\"adresse\" class=\"form-control {% if errors.adresse is defined %}is-invalid{% endif %}\" value=\"{{ app.request.request.get('adresse') }}\" placeholder=\"Enter location/address\">
                        </div>
                    </div>

                    {% if aiCategorySuggestion is defined and aiCategorySuggestion %}
                    <div class=\"alert alert-info d-flex justify-content-between align-items-center\">
                        <div>
                            <strong>AI Suggestion:</strong>
                            {{ aiCategorySuggestion.category.nom }}
                            ({{ aiCategorySuggestion.confidence }}%)
                            <div class=\"small text-muted\">{{ aiCategorySuggestion.reason }}</div>
                        </div>

                        <button type=\"submit\" name=\"suggestCategory\" value=\"1\" class=\"btn btn-sm btn-primary\">
                            Apply Suggestion
                        </button>
                    </div>
                    {% endif %}

                    <div class=\"mb-3\">
                        <label for=\"categorie\" class=\"form-label\">Category <span class=\"text-danger\">*</span></label>
                        {% set currentCategory = selectedCategoryId is defined and selectedCategoryId ? selectedCategoryId : app.request.request.get('categorie') %}
                        <select name=\"categorie\" id=\"categorie\" class=\"form-select {% if errors.categorie is defined %}is-invalid{% endif %}\">
                            <option value=\"\">Choose a category</option>
                            {% for categorie in categories %}
                            <option value=\"{{ categorie.id }}\" {% if currentCategory == categorie.id %}selected{% endif %}>{{ categorie.nom }}</option>
                            {% endfor %}
                        </select>
                    </div>

                    <div class=\"row\">
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"prix\" class=\"form-label\">Price (TND) <span class=\"text-danger\">*</span></label>
                            <div class=\"input-group\">
                                <span class=\"input-group-text\">TND</span>
                                <input type=\"number\" name=\"prix\" id=\"prix\" class=\"form-control {% if errors.prix is defined %}is-invalid{% endif %}\" step=\"0.01\" min=\"0\" value=\"{{ app.request.request.get('prix') }}\" placeholder=\"0.00\">
                            </div>
                        </div>

                        <div class=\"col-md-6 mb-3\">
                            <label for=\"quantite\" class=\"form-label\">Initial Quantity <span class=\"text-danger\">*</span></label>
                            <input type=\"number\" name=\"quantite\" id=\"quantite\" class=\"form-control {% if errors.quantite is defined %}is-invalid{% endif %}\" min=\"0\" value=\"{{ app.request.request.get('quantite') }}\" placeholder=\"0\">
                        </div>
                    </div>

                    <div class=\"mb-4\">
                        <label for=\"imageURL\" class=\"form-label\">Image URL <span class=\"text-muted small\">(Optional)</span></label>
                        <input type=\"url\" name=\"imageURL\" id=\"imageURL\" class=\"form-control\" value=\"{{ app.request.request.get('imageURL') }}\" placeholder=\"https://example.com/image.jpg\">
                        <div class=\"form-text\">Enter a valid image URL (jpg, png, webp)</div>
                    </div>

                    <hr class=\"my-4\">

                    <div class=\"d-flex gap-2\">
                        <button type=\"submit\" class=\"btn btn-primary\">
                            <i class=\"bi bi-check-lg me-1\"></i> Save Product
                        </button>

                        <button type=\"submit\" name=\"suggestCategory\" value=\"1\" class=\"btn btn-outline-info\">
                            <i class=\"bi bi-stars me-1\"></i> Suggest Category
                        </button>

                        <a href=\"{{ path('app_produit_index') }}\" class=\"btn btn-outline-secondary\">
                            <i class=\"bi bi-x-lg me-1\"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{% endblock %}", "produit/new.html.twig", "C:\\Users\\Skaina\\Desktop\\final version symfony\\Marketplace-Project\\web\\templates\\produit\\new.html.twig");
    }
}
