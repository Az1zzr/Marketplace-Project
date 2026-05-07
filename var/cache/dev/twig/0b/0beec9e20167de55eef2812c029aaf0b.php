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

/* produit/index.html.twig */
class __TwigTemplate_67690856f6d8bfd91659f4aa3131015a extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "produit/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "produit/index.html.twig"));

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

        yield "Products";
        
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
        yield "<li class=\"breadcrumb-item active\">Products</li>
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
        $context["canManageCatalog"] = ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN") || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_FOURNISSEUR"));
        // line 11
        yield "
<div class=\"page-header d-flex justify-content-between align-items-center\">
    <div>
        <h1><i class=\"bi bi-box-seam me-2\"></i>Products</h1>
        <p>";
        // line 15
        if ((($tmp = (isset($context["canManageCatalog"]) || array_key_exists("canManageCatalog", $context) ? $context["canManageCatalog"] : (function () { throw new RuntimeError('Variable "canManageCatalog" does not exist.', 15, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "Manage your product catalog";
        } else {
            yield "Browse products available in the marketplace";
        }
        yield "</p>
    </div>

    ";
        // line 18
        if ((($tmp = (isset($context["canManageCatalog"]) || array_key_exists("canManageCatalog", $context) ? $context["canManageCatalog"] : (function () { throw new RuntimeError('Variable "canManageCatalog" does not exist.', 18, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 19
            yield "    <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_new");
            yield "\" class=\"btn btn-primary\">
        <i class=\"bi bi-plus-lg me-1\"></i> Add Product
    </a>
    ";
        }
        // line 23
        yield "</div>

<div class=\"card mb-4\">
    <div class=\"card-body\">
        <form method=\"get\" class=\"row g-3 align-items-end\" novalidate>
            <div class=\"col-md-4\">
                <label for=\"search\" class=\"form-label\">Search</label>
                <input type=\"text\" name=\"search\" id=\"search\" class=\"form-control\" value=\"";
        // line 30
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 30, $this->source); })()), "html", null, true);
        yield "\" placeholder=\"Search by name or address...\">
            </div>

            <div class=\"col-md-3\">
                <label for=\"categorie\" class=\"form-label\">Category</label>
                <select name=\"categorie\" id=\"categorie\" class=\"form-select\">
                    <option value=\"\">All categories</option>
                    ";
        // line 37
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["categories"]) || array_key_exists("categories", $context) ? $context["categories"] : (function () { throw new RuntimeError('Variable "categories" does not exist.', 37, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["categorie"]) {
            // line 38
            yield "                    <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["categorie"], "id", [], "any", false, false, false, 38), "html", null, true);
            yield "\" ";
            if (((isset($context["selectedCategorieId"]) || array_key_exists("selectedCategorieId", $context) ? $context["selectedCategorieId"] : (function () { throw new RuntimeError('Variable "selectedCategorieId" does not exist.', 38, $this->source); })()) == CoreExtension::getAttribute($this->env, $this->source, $context["categorie"], "id", [], "any", false, false, false, 38))) {
                yield "selected";
            }
            yield ">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["categorie"], "nom", [], "any", false, false, false, 38), "html", null, true);
            yield "</option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['categorie'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        yield "                </select>
            </div>

            <div class=\"col-md-3\">
                <label for=\"sort\" class=\"form-label\">Sort by</label>
                <select name=\"sort\" id=\"sort\" class=\"form-select\">
                    <option value=\"nomProduit\" ";
        // line 46
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 46, $this->source); })()) == "nomProduit")) {
            yield "selected";
        }
        yield ">Name</option>
                    <option value=\"prix\" ";
        // line 47
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 47, $this->source); })()) == "prix")) {
            yield "selected";
        }
        yield ">Price</option>
                    <option value=\"quantite\" ";
        // line 48
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 48, $this->source); })()) == "quantite")) {
            yield "selected";
        }
        yield ">Quantity</option>
                    <option value=\"adresse\" ";
        // line 49
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 49, $this->source); })()) == "adresse")) {
            yield "selected";
        }
        yield ">Address</option>
                </select>
            </div>

            <div class=\"col-md-1\">
                <label for=\"order\" class=\"form-label\">Order</label>
                <select name=\"order\" id=\"order\" class=\"form-select\">
                    <option value=\"asc\" ";
        // line 56
        if (((isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 56, $this->source); })()) == "asc")) {
            yield "selected";
        }
        yield ">Ascending</option>
                    <option value=\"desc\" ";
        // line 57
        if (((isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 57, $this->source); })()) == "desc")) {
            yield "selected";
        }
        yield ">Descending</option>
                </select>
            </div>

            <div class=\"col-md-1 d-flex gap-2\">
                <button type=\"submit\" class=\"btn btn-primary\">
                    <i class=\"bi bi-search\"></i>
                </button>
                <a href=\"";
        // line 65
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_index");
        yield "\" class=\"btn btn-outline-secondary\">
                    <i class=\"bi bi-x-lg\"></i>
                </a>
            </div>
        </form>
    </div>
</div>

";
        // line 73
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty((isset($context["categories"]) || array_key_exists("categories", $context) ? $context["categories"] : (function () { throw new RuntimeError('Variable "categories" does not exist.', 73, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 74
            yield "<div class=\"mb-4 d-flex flex-wrap gap-2\">
    <a href=\"";
            // line 75
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_index", ["search" => (isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 75, $this->source); })()), "sort" => (isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 75, $this->source); })()), "order" => (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 75, $this->source); })())]), "html", null, true);
            yield "\" class=\"btn btn-sm ";
            if ((null === (isset($context["selectedCategorieId"]) || array_key_exists("selectedCategorieId", $context) ? $context["selectedCategorieId"] : (function () { throw new RuntimeError('Variable "selectedCategorieId" does not exist.', 75, $this->source); })()))) {
                yield "btn-primary";
            } else {
                yield "btn-outline-secondary";
            }
            yield "\">
        All Categories
    </a>

    ";
            // line 79
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["categories"]) || array_key_exists("categories", $context) ? $context["categories"] : (function () { throw new RuntimeError('Variable "categories" does not exist.', 79, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["categorie"]) {
                // line 80
                yield "    <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_index", ["search" => (isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 80, $this->source); })()), "sort" => (isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 80, $this->source); })()), "order" => (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 80, $this->source); })()), "categorie" => CoreExtension::getAttribute($this->env, $this->source, $context["categorie"], "id", [], "any", false, false, false, 80)]), "html", null, true);
                yield "\" class=\"btn btn-sm ";
                if (((isset($context["selectedCategorieId"]) || array_key_exists("selectedCategorieId", $context) ? $context["selectedCategorieId"] : (function () { throw new RuntimeError('Variable "selectedCategorieId" does not exist.', 80, $this->source); })()) == CoreExtension::getAttribute($this->env, $this->source, $context["categorie"], "id", [], "any", false, false, false, 80))) {
                    yield "btn-primary";
                } else {
                    yield "btn-outline-secondary";
                }
                yield "\">
        ";
                // line 81
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["categorie"], "nom", [], "any", false, false, false, 81), "html", null, true);
                yield "
    </a>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['categorie'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 84
            yield "</div>
";
        }
        // line 86
        yield "
";
        // line 87
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["produits"]) || array_key_exists("produits", $context) ? $context["produits"] : (function () { throw new RuntimeError('Variable "produits" does not exist.', 87, $this->source); })()))) {
            // line 88
            yield "<div class=\"card\">
    <div class=\"card-body text-center py-5\">
        <i class=\"bi bi-box-seam\" style=\"font-size: 3rem; color: #94a3b8;\"></i>
        <h5 class=\"mt-3 text-muted\">No products found</h5>

        ";
            // line 93
            if ((($tmp = (isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 93, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 94
                yield "        <p class=\"text-muted\">No products match your search criteria.</p>
        ";
            } else {
                // line 96
                yield "        <p class=\"text-muted\">
            ";
                // line 97
                if ((($tmp = (isset($context["canManageCatalog"]) || array_key_exists("canManageCatalog", $context) ? $context["canManageCatalog"] : (function () { throw new RuntimeError('Variable "canManageCatalog" does not exist.', 97, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 98
                    yield "                Get started by adding your first product.
            ";
                } else {
                    // line 100
                    yield "                Try another category or browse all products.
            ";
                }
                // line 102
                yield "        </p>
        ";
            }
            // line 104
            yield "
        ";
            // line 105
            if ((($tmp = (isset($context["canManageCatalog"]) || array_key_exists("canManageCatalog", $context) ? $context["canManageCatalog"] : (function () { throw new RuntimeError('Variable "canManageCatalog" does not exist.', 105, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 106
                yield "        <a href=\"";
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_new");
                yield "\" class=\"btn btn-primary mt-2\">
            <i class=\"bi bi-plus-lg me-1\"></i> Add Product
        </a>
        ";
            }
            // line 110
            yield "    </div>
</div>
";
        } else {
            // line 113
            yield "<div class=\"row\">
    ";
            // line 114
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["produits"]) || array_key_exists("produits", $context) ? $context["produits"] : (function () { throw new RuntimeError('Variable "produits" does not exist.', 114, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["produit"]) {
                // line 115
                yield "    <div class=\"col-md-6 col-lg-4 mb-4\">
        <div class=\"card h-100\">
            ";
                // line 117
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "imageURL", [], "any", false, false, false, 117)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 118
                    yield "            <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "imageURL", [], "any", false, false, false, 118), "html", null, true);
                    yield "\" class=\"card-img-top\" alt=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "nomProduit", [], "any", false, false, false, 118), "html", null, true);
                    yield "\" style=\"height: 200px; object-fit: cover;\">
            ";
                } else {
                    // line 120
                    yield "            <div class=\"card-img-top d-flex align-items-center justify-content-center bg-light\" style=\"height: 200px;\">
                <i class=\"bi bi-box-seam\" style=\"font-size: 4rem; color: #cbd5e1;\"></i>
            </div>
            ";
                }
                // line 124
                yield "
            <div class=\"card-body\">
                <h5 class=\"card-title\">";
                // line 126
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "nomProduit", [], "any", false, false, false, 126), "html", null, true);
                yield "</h5>
                <p class=\"text-muted small mb-2\">
                    <i class=\"bi bi-geo-alt me-1\"></i>";
                // line 128
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "adresse", [], "any", false, false, false, 128), "html", null, true);
                yield "
                </p>

                <div class=\"d-flex justify-content-between align-items-center mb-2\">
                    <span class=\"h5 mb-0 text-primary\">";
                // line 132
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "prix", [], "any", false, false, false, 132), 2, ".", ","), "html", null, true);
                yield " TND</span>
                    <span class=\"badge ";
                // line 133
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "quantite", [], "any", false, false, false, 133) > 10)) {
                    yield "bg-success";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "quantite", [], "any", false, false, false, 133) > 0)) {
                    yield "bg-warning";
                } else {
                    yield "bg-danger";
                }
                yield "\">
                        ";
                // line 134
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "quantite", [], "any", false, false, false, 134), "html", null, true);
                yield " in stock
                    </span>
                </div>

                <div>
                    <span class=\"badge bg-light text-dark\">
                        <i class=\"bi bi-tag me-1\"></i>";
                // line 140
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "categorie", [], "any", false, false, false, 140), "nom", [], "any", false, false, false, 140), "html", null, true);
                yield "
                    </span>
                </div>
            </div>

            <div class=\"card-footer bg-transparent border-top-0\">
                <div class=\"d-flex gap-2\">
                    <a href=\"";
                // line 147
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "id", [], "any", false, false, false, 147)]), "html", null, true);
                yield "\" class=\"btn btn-outline-secondary btn-sm flex-grow-1\">
                        <i class=\"bi bi-eye me-1\"></i> View
                    </a>

                    ";
                // line 151
                if ((($tmp = (isset($context["canManageCatalog"]) || array_key_exists("canManageCatalog", $context) ? $context["canManageCatalog"] : (function () { throw new RuntimeError('Variable "canManageCatalog" does not exist.', 151, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 152
                    yield "                    <a href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "id", [], "any", false, false, false, 152)]), "html", null, true);
                    yield "\" class=\"btn btn-outline-primary btn-sm flex-grow-1\">
                        <i class=\"bi bi-pencil me-1\"></i> Edit
                    </a>

                    <form action=\"";
                    // line 156
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "id", [], "any", false, false, false, 156)]), "html", null, true);
                    yield "\" method=\"post\" class=\"d-inline\" novalidate>
                        <input type=\"hidden\" name=\"_token\" value=\"";
                    // line 157
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "id", [], "any", false, false, false, 157))), "html", null, true);
                    yield "\">
                        <button type=\"submit\" class=\"btn btn-outline-danger btn-sm\">
                            <i class=\"bi bi-trash\"></i>
                        </button>
                    </form>
                    ";
                }
                // line 163
                yield "                </div>
            </div>
        </div>
    </div>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['produit'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 168
            yield "</div>

<div class=\"d-flex justify-content-center mt-4\">
    ";
            // line 171
            yield $this->env->getRuntime('Knp\Bundle\PaginatorBundle\Twig\Extension\PaginationRuntime')->render($this->env, (isset($context["produits"]) || array_key_exists("produits", $context) ? $context["produits"] : (function () { throw new RuntimeError('Variable "produits" does not exist.', 171, $this->source); })()));
            yield "
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
        return "produit/index.html.twig";
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
        return array (  480 => 171,  475 => 168,  465 => 163,  456 => 157,  452 => 156,  444 => 152,  442 => 151,  435 => 147,  425 => 140,  416 => 134,  406 => 133,  402 => 132,  395 => 128,  390 => 126,  386 => 124,  380 => 120,  372 => 118,  370 => 117,  366 => 115,  362 => 114,  359 => 113,  354 => 110,  346 => 106,  344 => 105,  341 => 104,  337 => 102,  333 => 100,  329 => 98,  327 => 97,  324 => 96,  320 => 94,  318 => 93,  311 => 88,  309 => 87,  306 => 86,  302 => 84,  293 => 81,  282 => 80,  278 => 79,  265 => 75,  262 => 74,  260 => 73,  249 => 65,  236 => 57,  230 => 56,  218 => 49,  212 => 48,  206 => 47,  200 => 46,  192 => 40,  177 => 38,  173 => 37,  163 => 30,  154 => 23,  146 => 19,  144 => 18,  134 => 15,  128 => 11,  126 => 10,  113 => 9,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Products{% endblock %}

{% block breadcrumb %}
<li class=\"breadcrumb-item active\">Products</li>
{% endblock %}

{% block body %}
{% set canManageCatalog = is_granted('ROLE_ADMIN') or is_granted('ROLE_FOURNISSEUR') %}

<div class=\"page-header d-flex justify-content-between align-items-center\">
    <div>
        <h1><i class=\"bi bi-box-seam me-2\"></i>Products</h1>
        <p>{% if canManageCatalog %}Manage your product catalog{% else %}Browse products available in the marketplace{% endif %}</p>
    </div>

    {% if canManageCatalog %}
    <a href=\"{{ path('app_produit_new') }}\" class=\"btn btn-primary\">
        <i class=\"bi bi-plus-lg me-1\"></i> Add Product
    </a>
    {% endif %}
</div>

<div class=\"card mb-4\">
    <div class=\"card-body\">
        <form method=\"get\" class=\"row g-3 align-items-end\" novalidate>
            <div class=\"col-md-4\">
                <label for=\"search\" class=\"form-label\">Search</label>
                <input type=\"text\" name=\"search\" id=\"search\" class=\"form-control\" value=\"{{ search }}\" placeholder=\"Search by name or address...\">
            </div>

            <div class=\"col-md-3\">
                <label for=\"categorie\" class=\"form-label\">Category</label>
                <select name=\"categorie\" id=\"categorie\" class=\"form-select\">
                    <option value=\"\">All categories</option>
                    {% for categorie in categories %}
                    <option value=\"{{ categorie.id }}\" {% if selectedCategorieId == categorie.id %}selected{% endif %}>{{ categorie.nom }}</option>
                    {% endfor %}
                </select>
            </div>

            <div class=\"col-md-3\">
                <label for=\"sort\" class=\"form-label\">Sort by</label>
                <select name=\"sort\" id=\"sort\" class=\"form-select\">
                    <option value=\"nomProduit\" {% if sort == 'nomProduit' %}selected{% endif %}>Name</option>
                    <option value=\"prix\" {% if sort == 'prix' %}selected{% endif %}>Price</option>
                    <option value=\"quantite\" {% if sort == 'quantite' %}selected{% endif %}>Quantity</option>
                    <option value=\"adresse\" {% if sort == 'adresse' %}selected{% endif %}>Address</option>
                </select>
            </div>

            <div class=\"col-md-1\">
                <label for=\"order\" class=\"form-label\">Order</label>
                <select name=\"order\" id=\"order\" class=\"form-select\">
                    <option value=\"asc\" {% if order == 'asc' %}selected{% endif %}>Ascending</option>
                    <option value=\"desc\" {% if order == 'desc' %}selected{% endif %}>Descending</option>
                </select>
            </div>

            <div class=\"col-md-1 d-flex gap-2\">
                <button type=\"submit\" class=\"btn btn-primary\">
                    <i class=\"bi bi-search\"></i>
                </button>
                <a href=\"{{ path('app_produit_index') }}\" class=\"btn btn-outline-secondary\">
                    <i class=\"bi bi-x-lg\"></i>
                </a>
            </div>
        </form>
    </div>
</div>

{% if categories is not empty %}
<div class=\"mb-4 d-flex flex-wrap gap-2\">
    <a href=\"{{ path('app_produit_index', {'search': search, 'sort': sort, 'order': order}) }}\" class=\"btn btn-sm {% if selectedCategorieId is null %}btn-primary{% else %}btn-outline-secondary{% endif %}\">
        All Categories
    </a>

    {% for categorie in categories %}
    <a href=\"{{ path('app_produit_index', {'search': search, 'sort': sort, 'order': order, 'categorie': categorie.id}) }}\" class=\"btn btn-sm {% if selectedCategorieId == categorie.id %}btn-primary{% else %}btn-outline-secondary{% endif %}\">
        {{ categorie.nom }}
    </a>
    {% endfor %}
</div>
{% endif %}

{% if produits is empty %}
<div class=\"card\">
    <div class=\"card-body text-center py-5\">
        <i class=\"bi bi-box-seam\" style=\"font-size: 3rem; color: #94a3b8;\"></i>
        <h5 class=\"mt-3 text-muted\">No products found</h5>

        {% if search %}
        <p class=\"text-muted\">No products match your search criteria.</p>
        {% else %}
        <p class=\"text-muted\">
            {% if canManageCatalog %}
                Get started by adding your first product.
            {% else %}
                Try another category or browse all products.
            {% endif %}
        </p>
        {% endif %}

        {% if canManageCatalog %}
        <a href=\"{{ path('app_produit_new') }}\" class=\"btn btn-primary mt-2\">
            <i class=\"bi bi-plus-lg me-1\"></i> Add Product
        </a>
        {% endif %}
    </div>
</div>
{% else %}
<div class=\"row\">
    {% for produit in produits %}
    <div class=\"col-md-6 col-lg-4 mb-4\">
        <div class=\"card h-100\">
            {% if produit.imageURL %}
            <img src=\"{{ produit.imageURL }}\" class=\"card-img-top\" alt=\"{{ produit.nomProduit }}\" style=\"height: 200px; object-fit: cover;\">
            {% else %}
            <div class=\"card-img-top d-flex align-items-center justify-content-center bg-light\" style=\"height: 200px;\">
                <i class=\"bi bi-box-seam\" style=\"font-size: 4rem; color: #cbd5e1;\"></i>
            </div>
            {% endif %}

            <div class=\"card-body\">
                <h5 class=\"card-title\">{{ produit.nomProduit }}</h5>
                <p class=\"text-muted small mb-2\">
                    <i class=\"bi bi-geo-alt me-1\"></i>{{ produit.adresse }}
                </p>

                <div class=\"d-flex justify-content-between align-items-center mb-2\">
                    <span class=\"h5 mb-0 text-primary\">{{ produit.prix|number_format(2, '.', ',') }} TND</span>
                    <span class=\"badge {% if produit.quantite > 10 %}bg-success{% elseif produit.quantite > 0 %}bg-warning{% else %}bg-danger{% endif %}\">
                        {{ produit.quantite }} in stock
                    </span>
                </div>

                <div>
                    <span class=\"badge bg-light text-dark\">
                        <i class=\"bi bi-tag me-1\"></i>{{ produit.categorie.nom }}
                    </span>
                </div>
            </div>

            <div class=\"card-footer bg-transparent border-top-0\">
                <div class=\"d-flex gap-2\">
                    <a href=\"{{ path('app_produit_show', {'id': produit.id}) }}\" class=\"btn btn-outline-secondary btn-sm flex-grow-1\">
                        <i class=\"bi bi-eye me-1\"></i> View
                    </a>

                    {% if canManageCatalog %}
                    <a href=\"{{ path('app_produit_edit', {'id': produit.id}) }}\" class=\"btn btn-outline-primary btn-sm flex-grow-1\">
                        <i class=\"bi bi-pencil me-1\"></i> Edit
                    </a>

                    <form action=\"{{ path('app_produit_delete', {'id': produit.id}) }}\" method=\"post\" class=\"d-inline\" novalidate>
                        <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ produit.id) }}\">
                        <button type=\"submit\" class=\"btn btn-outline-danger btn-sm\">
                            <i class=\"bi bi-trash\"></i>
                        </button>
                    </form>
                    {% endif %}
                </div>
            </div>
        </div>
    </div>
    {% endfor %}
</div>

<div class=\"d-flex justify-content-center mt-4\">
    {{ knp_pagination_render(produits) }}
</div>
{% endif %}
{% endblock %}", "produit/index.html.twig", "C:\\Users\\Skaina\\Desktop\\final version symfony\\Marketplace-Project\\web\\templates\\produit\\index.html.twig");
    }
}
