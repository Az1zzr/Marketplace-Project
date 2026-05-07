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

/* produit/show.html.twig */
class __TwigTemplate_5e18af7dc4b1c09ee8427461079c2769 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "produit/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "produit/show.html.twig"));

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

        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 3, $this->source); })()), "nomProduit", [], "any", false, false, false, 3), "html", null, true);
        yield " - Product Details";
        
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
<li class=\"breadcrumb-item active\">";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 7, $this->source); })()), "nomProduit", [], "any", false, false, false, 7), "html", null, true);
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
        $context["canManageCatalog"] = (isset($context["canManageProduct"]) || array_key_exists("canManageProduct", $context) ? $context["canManageProduct"] : (function () { throw new RuntimeError('Variable "canManageProduct" does not exist.', 11, $this->source); })());
        // line 12
        $context["canReviewPurchasedProduct"] =  !(null === (isset($context["eligibleFeedbackLine"]) || array_key_exists("eligibleFeedbackLine", $context) ? $context["eligibleFeedbackLine"] : (function () { throw new RuntimeError('Variable "eligibleFeedbackLine" does not exist.', 12, $this->source); })()));
        // line 13
        yield "<div class=\"page-header d-flex justify-content-between align-items-center\">
    <div>
        <h1><i class=\"bi bi-box-seam me-2\"></i>";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 15, $this->source); })()), "nomProduit", [], "any", false, false, false, 15), "html", null, true);
        yield "</h1>
        <p>Product details and information</p>
    </div>
    <div class=\"d-flex gap-2\">
        ";
        // line 19
        if ((($tmp = (isset($context["canManageCatalog"]) || array_key_exists("canManageCatalog", $context) ? $context["canManageCatalog"] : (function () { throw new RuntimeError('Variable "canManageCatalog" does not exist.', 19, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 20
            yield "        <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 20, $this->source); })()), "id", [], "any", false, false, false, 20)]), "html", null, true);
            yield "\" class=\"btn btn-primary\">
            <i class=\"bi bi-pencil me-1\"></i> Edit
        </a>
        ";
        }
        // line 24
        yield "        <a href=\"";
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_index");
        yield "\" class=\"btn btn-outline-secondary\">
            <i class=\"bi bi-arrow-left me-1\"></i> Back
        </a>
    </div>
</div>

<div class=\"row\">
    <div class=\"col-lg-5 mb-4\">
        <div class=\"card\">
            ";
        // line 33
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 33, $this->source); })()), "imageURL", [], "any", false, false, false, 33)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 34
            yield "            <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 34, $this->source); })()), "imageURL", [], "any", false, false, false, 34), "html", null, true);
            yield "\" class=\"card-img-top\" alt=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 34, $this->source); })()), "nomProduit", [], "any", false, false, false, 34), "html", null, true);
            yield "\" style=\"max-height: 400px; object-fit: cover;\">
            ";
        } else {
            // line 36
            yield "            <div class=\"card-img-top d-flex align-items-center justify-content-center bg-light\" style=\"height: 300px;\">
                <i class=\"bi bi-box-seam\" style=\"font-size: 6rem; color: #cbd5e1;\"></i>
            </div>
            ";
        }
        // line 40
        yield "        </div>

        <div class=\"card mt-4\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\"><i class=\"bi bi-qr-code me-2\"></i>QR Code Produit</h5>
            </div>
            <div class=\"card-body text-center\">
                <img src=\"";
        // line 47
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_qr_code", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 47, $this->source); })()), "id", [], "any", false, false, false, 47)]), "html", null, true);
        yield "\" alt=\"QR code for ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 47, $this->source); })()), "nomProduit", [], "any", false, false, false, 47), "html", null, true);
        yield "\" class=\"img-fluid border rounded-4 p-3 bg-white\" style=\"max-width: 240px;\">
                <p class=\"text-muted mt-3 mb-2\">Scannez ce QR code pour ouvrir directement la fiche de ce produit.</p>
                <div class=\"small text-muted mb-3\">";
        // line 49
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["productUrl"]) || array_key_exists("productUrl", $context) ? $context["productUrl"] : (function () { throw new RuntimeError('Variable "productUrl" does not exist.', 49, $this->source); })()), "html", null, true);
        yield "</div>
                <a href=\"";
        // line 50
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_qr_code", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 50, $this->source); })()), "id", [], "any", false, false, false, 50), "download" => 1]), "html", null, true);
        yield "\" class=\"btn btn-outline-dark btn-sm\">
                    <i class=\"bi bi-download me-1\"></i> Telecharger le QR code SVG
                </a>
            </div>
        </div>
    </div>
    
    <div class=\"col-lg-7 mb-4\">
        <div class=\"card mb-4\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\"><i class=\"bi bi-info-circle me-2\"></i>Product Information</h5>
            </div>
            <div class=\"card-body\">
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Product ID</div>
                    <div class=\"col-sm-8 fw-medium\">#";
        // line 65
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 65, $this->source); })()), "id", [], "any", false, false, false, 65), "html", null, true);
        yield "</div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Name</div>
                    <div class=\"col-sm-8 fw-medium\">";
        // line 69
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 69, $this->source); })()), "nomProduit", [], "any", false, false, false, 69), "html", null, true);
        yield "</div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Address</div>
                    <div class=\"col-sm-8 fw-medium\">
                        <i class=\"bi bi-geo-alt text-primary me-1\"></i>";
        // line 74
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 74, $this->source); })()), "adresse", [], "any", false, false, false, 74), "html", null, true);
        yield "
                    </div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Price</div>
                    <div class=\"col-sm-8\">
                        <span class=\"h4 text-primary mb-0\">";
        // line 80
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 80, $this->source); })()), "prix", [], "any", false, false, false, 80), 2, ".", ","), "html", null, true);
        yield " TND</span>
                        ";
        // line 81
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["convertedPrices"]) || array_key_exists("convertedPrices", $context) ? $context["convertedPrices"] : (function () { throw new RuntimeError('Variable "convertedPrices" does not exist.', 81, $this->source); })()), "available", [], "any", false, false, false, 81)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 82
            yield "                        <div class=\"mt-2 d-flex flex-wrap gap-2\">
                            ";
            // line 83
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["convertedPrices"]) || array_key_exists("convertedPrices", $context) ? $context["convertedPrices"] : (function () { throw new RuntimeError('Variable "convertedPrices" does not exist.', 83, $this->source); })()), "currencies", [], "any", false, false, false, 83));
            foreach ($context['_seq'] as $context["_key"] => $context["currency"]) {
                // line 84
                yield "                            <span class=\"badge bg-light text-dark border\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["currency"], "label", [], "any", false, false, false, 84), "html", null, true);
                yield ": ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["currency"], "amount", [], "any", false, false, false, 84), 2, ".", ","), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["currency"], "code", [], "any", false, false, false, 84), "html", null, true);
                yield "</span>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['currency'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 86
            yield "                        </div>
                        <div class=\"small text-muted mt-2\">
                            Conversion approximative depuis le dinar tunisien via ";
            // line 88
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["convertedPrices"]) || array_key_exists("convertedPrices", $context) ? $context["convertedPrices"] : (function () { throw new RuntimeError('Variable "convertedPrices" does not exist.', 88, $this->source); })()), "sourceLabel", [], "any", false, false, false, 88), "html", null, true);
            yield "
                            ";
            // line 89
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["convertedPrices"]) || array_key_exists("convertedPrices", $context) ? $context["convertedPrices"] : (function () { throw new RuntimeError('Variable "convertedPrices" does not exist.', 89, $this->source); })()), "updatedAt", [], "any", false, false, false, 89)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 90
                yield "                            (maj ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["convertedPrices"]) || array_key_exists("convertedPrices", $context) ? $context["convertedPrices"] : (function () { throw new RuntimeError('Variable "convertedPrices" does not exist.', 90, $this->source); })()), "updatedAt", [], "any", false, false, false, 90), "Y-m-d H:i"), "html", null, true);
                yield ")
                            ";
            }
            // line 92
            yield "                        </div>
                        ";
        } else {
            // line 94
            yield "                        <div class=\"small text-muted mt-2\">Conversion EUR/USD indisponible pour le moment.</div>
                        ";
        }
        // line 96
        yield "                    </div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Category</div>
                    <div class=\"col-sm-8 fw-medium\">
                        <span class=\"badge bg-light text-dark\"><i class=\"bi bi-tag me-1\"></i>";
        // line 101
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 101, $this->source); })()), "categorie", [], "any", false, false, false, 101), "nom", [], "any", false, false, false, 101), "html", null, true);
        yield "</span>
                    </div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Quantity Available</div>
                    <div class=\"col-sm-8\">
                        <span class=\"badge ";
        // line 107
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 107, $this->source); })()), "quantite", [], "any", false, false, false, 107) > 10)) {
            yield "bg-success";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 107, $this->source); })()), "quantite", [], "any", false, false, false, 107) > 0)) {
            yield "bg-warning";
        } else {
            yield "bg-danger";
        }
        yield " fs-6\">
                            ";
        // line 108
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 108, $this->source); })()), "quantite", [], "any", false, false, false, 108), "html", null, true);
        yield " units
                        </span>
                    </div>
                </div>
            </div>
        </div>

        ";
        // line 115
        if ((($tmp = (isset($context["canBuy"]) || array_key_exists("canBuy", $context) ? $context["canBuy"] : (function () { throw new RuntimeError('Variable "canBuy" does not exist.', 115, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 116
            yield "        <div class=\"card mb-4\">
            <div class=\"card-header d-flex justify-content-between align-items-center\">
                <h5 class=\"mb-0\"><i class=\"bi bi-bag-plus me-2\"></i>Buy This Product</h5>
                ";
            // line 119
            if ((($tmp = (isset($context["hasDraftCart"]) || array_key_exists("hasDraftCart", $context) ? $context["hasDraftCart"] : (function () { throw new RuntimeError('Variable "hasDraftCart" does not exist.', 119, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 120
                yield "                <a href=\"";
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_commande_new");
                yield "\" class=\"btn btn-outline-primary btn-sm\">
                    <i class=\"bi bi-bag-check me-1\"></i> Current Order
                </a>
                ";
            }
            // line 124
            yield "            </div>
            <div class=\"card-body\">
                ";
            // line 126
            if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 126, $this->source); })()), "quantite", [], "any", false, false, false, 126) > 0)) {
                // line 127
                yield "                <form action=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_buy", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 127, $this->source); })()), "id", [], "any", false, false, false, 127)]), "html", null, true);
                yield "\" method=\"post\" novalidate>
                    <div class=\"row g-3 align-items-end\">
                        <div class=\"col-md-4\">
                            <label for=\"quantite\" class=\"form-label\">Quantity</label>
                            <input type=\"text\" name=\"quantite\" id=\"quantite\" class=\"form-control\" value=\"1\" placeholder=\"1\">
                        </div>
                        <div class=\"col-md-8 d-flex gap-2\">
                            <button type=\"submit\" class=\"btn btn-primary\">
                                <i class=\"bi bi-cart-plus me-1\"></i> Add To Current Order
                            </button>
                            ";
                // line 137
                if ((($tmp = (isset($context["hasDraftCart"]) || array_key_exists("hasDraftCart", $context) ? $context["hasDraftCart"] : (function () { throw new RuntimeError('Variable "hasDraftCart" does not exist.', 137, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 138
                    yield "                            <a href=\"";
                    yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_commande_new");
                    yield "\" class=\"btn btn-outline-secondary\">
                                <i class=\"bi bi-arrow-right me-1\"></i> Checkout
                            </a>
                            ";
                }
                // line 142
                yield "                        </div>
                    </div>
                </form>
                ";
            } else {
                // line 146
                yield "                <div class=\"alert alert-warning mb-0\">
                    This product is currently out of stock.
                </div>
                ";
            }
            // line 150
            yield "
                <hr class=\"my-4\">

                ";
            // line 153
            if ((($tmp = (isset($context["canReviewPurchasedProduct"]) || array_key_exists("canReviewPurchasedProduct", $context) ? $context["canReviewPurchasedProduct"] : (function () { throw new RuntimeError('Variable "canReviewPurchasedProduct" does not exist.', 153, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 154
                yield "                <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_feedback_new", ["ligneCommandeId" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["eligibleFeedbackLine"]) || array_key_exists("eligibleFeedbackLine", $context) ? $context["eligibleFeedbackLine"] : (function () { throw new RuntimeError('Variable "eligibleFeedbackLine" does not exist.', 154, $this->source); })()), "id", [], "any", false, false, false, 154)]), "html", null, true);
                yield "\" class=\"btn btn-outline-success\">
                    <i class=\"bi bi-chat-heart me-1\"></i> Leave Feedback For This Product
                </a>
                ";
            } else {
                // line 158
                yield "                <p class=\"text-muted mb-0\">Feedback becomes available only after this product has been delivered to your account.</p>
                ";
            }
            // line 160
            yield "            </div>
        </div>
        ";
        }
        // line 163
        yield "
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\"><i class=\"bi bi-tags me-2\"></i>Catalog Information</h5>
            </div>
            <div class=\"card-body\">
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Category</div>
                    <div class=\"col-sm-8 fw-medium\">";
        // line 171
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 171, $this->source); })()), "categorie", [], "any", false, false, false, 171), "nom", [], "any", false, false, false, 171), "html", null, true);
        yield "</div>
                </div>
                ";
        // line 173
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 173, $this->source); })()), "categorie", [], "any", false, false, false, 173), "description", [], "any", false, false, false, 173)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 174
            yield "                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Description</div>
                    <div class=\"col-sm-8\">";
            // line 176
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 176, $this->source); })()), "categorie", [], "any", false, false, false, 176), "description", [], "any", false, false, false, 176), "html", null, true);
            yield "</div>
                </div>
                ";
        }
        // line 179
        yield "                ";
        if ((($tmp = (isset($context["canManageCatalog"]) || array_key_exists("canManageCatalog", $context) ? $context["canManageCatalog"] : (function () { throw new RuntimeError('Variable "canManageCatalog" does not exist.', 179, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 180
            yield "                <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_categorie_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 180, $this->source); })()), "categorie", [], "any", false, false, false, 180), "id", [], "any", false, false, false, 180)]), "html", null, true);
            yield "\" class=\"btn btn-outline-primary btn-sm\">
                    <i class=\"bi bi-pencil me-1\"></i> Manage Category
                </a>
                ";
        }
        // line 184
        yield "            </div>
        </div>
    </div>
</div>

<div class=\"card mb-4\">
    <div class=\"card-header d-flex justify-content-between align-items-center\">
        <h5 class=\"mb-0\"><i class=\"bi bi-chat-left-quote me-2\"></i>Product Feedback (";
        // line 191
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["feedbacks"]) || array_key_exists("feedbacks", $context) ? $context["feedbacks"] : (function () { throw new RuntimeError('Variable "feedbacks" does not exist.', 191, $this->source); })())), "html", null, true);
        yield ")</h5>
        ";
        // line 192
        if ((($tmp = (isset($context["canReviewPurchasedProduct"]) || array_key_exists("canReviewPurchasedProduct", $context) ? $context["canReviewPurchasedProduct"] : (function () { throw new RuntimeError('Variable "canReviewPurchasedProduct" does not exist.', 192, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 193
            yield "        <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_feedback_new", ["ligneCommandeId" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["eligibleFeedbackLine"]) || array_key_exists("eligibleFeedbackLine", $context) ? $context["eligibleFeedbackLine"] : (function () { throw new RuntimeError('Variable "eligibleFeedbackLine" does not exist.', 193, $this->source); })()), "id", [], "any", false, false, false, 193)]), "html", null, true);
            yield "\" class=\"btn btn-outline-primary btn-sm\">
            <i class=\"bi bi-plus-lg me-1\"></i> Add Feedback
        </a>
        ";
        }
        // line 197
        yield "    </div>
    <div class=\"card-body\">
        ";
        // line 199
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["feedbacks"]) || array_key_exists("feedbacks", $context) ? $context["feedbacks"] : (function () { throw new RuntimeError('Variable "feedbacks" does not exist.', 199, $this->source); })()))) {
            // line 200
            yield "        <div class=\"text-center py-4\">
            <i class=\"bi bi-chat-square-text fs-1 text-muted mb-3\"></i>
            <p class=\"text-muted mb-0\">No feedback has been published for this product yet.</p>
        </div>
        ";
        } else {
            // line 205
            yield "        <div class=\"row g-3\">
            ";
            // line 206
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["feedbacks"]) || array_key_exists("feedbacks", $context) ? $context["feedbacks"] : (function () { throw new RuntimeError('Variable "feedbacks" does not exist.', 206, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["feedback"]) {
                // line 207
                yield "            <div class=\"col-lg-6\">
                <div class=\"border rounded-4 p-3 h-100\">
                    <div class=\"d-flex justify-content-between align-items-start mb-2\">
                        <div>
                            <div class=\"fw-semibold\">";
                // line 211
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "auteur", [], "any", false, false, false, 211)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "auteur", [], "any", false, false, false, 211), "nomComplet", [], "any", false, false, false, 211), "html", null, true)) : ("Deleted user"));
                yield "</div>
                            <small class=\"text-muted\">";
                // line 212
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "dateStatut", [], "any", false, false, false, 212), "Y-m-d H:i"), "html", null, true);
                yield "</small>
                        </div>
                        <div class=\"text-warning\">
                            ";
                // line 215
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(range(1, 5));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 216
                    yield "                                ";
                    if (($context["i"] <= $this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "note", [], "any", false, false, false, 216)))) {
                        yield "&#9733;";
                    } else {
                        yield "&#9734;";
                    }
                    // line 217
                    yield "                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 218
                yield "                        </div>
                    </div>
                    <p class=\"mb-3\">";
                // line 220
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "commentaire", [], "any", false, false, false, 220), 0, 200), "html", null, true);
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "commentaire", [], "any", false, false, false, 220)) > 200)) {
                    yield "...";
                }
                yield "</p>
                    <a href=\"";
                // line 221
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_feedback_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["feedback"], "id", [], "any", false, false, false, 221)]), "html", null, true);
                yield "\" class=\"btn btn-outline-secondary btn-sm\">
                        <i class=\"bi bi-eye me-1\"></i> View Discussion
                    </a>
                </div>
            </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['feedback'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 227
            yield "        </div>
        ";
        }
        // line 229
        yield "    </div>
</div>

";
        // line 232
        if ((($tmp = (isset($context["canManageCatalog"]) || array_key_exists("canManageCatalog", $context) ? $context["canManageCatalog"] : (function () { throw new RuntimeError('Variable "canManageCatalog" does not exist.', 232, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 233
            yield "<div class=\"card\">
    <div class=\"card-header\">
        <h5 class=\"mb-0\"><i class=\"bi bi-trash me-2 text-danger\"></i>Danger Zone</h5>
    </div>
    <div class=\"card-body\">
        <p class=\"text-muted mb-3\">Deleting this product will permanently remove it and all associated data.</p>
        <form action=\"";
            // line 239
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 239, $this->source); })()), "id", [], "any", false, false, false, 239)]), "html", null, true);
            yield "\" method=\"post\" novalidate>
            <input type=\"hidden\" name=\"_token\" value=\"";
            // line 240
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 240, $this->source); })()), "id", [], "any", false, false, false, 240))), "html", null, true);
            yield "\">
            <button type=\"submit\" class=\"btn btn-outline-danger\">
                <i class=\"bi bi-trash me-1\"></i> Delete Product
            </button>
        </form>
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
        return "produit/show.html.twig";
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
        return array (  578 => 240,  574 => 239,  566 => 233,  564 => 232,  559 => 229,  555 => 227,  543 => 221,  536 => 220,  532 => 218,  526 => 217,  519 => 216,  515 => 215,  509 => 212,  505 => 211,  499 => 207,  495 => 206,  492 => 205,  485 => 200,  483 => 199,  479 => 197,  471 => 193,  469 => 192,  465 => 191,  456 => 184,  448 => 180,  445 => 179,  439 => 176,  435 => 174,  433 => 173,  428 => 171,  418 => 163,  413 => 160,  409 => 158,  401 => 154,  399 => 153,  394 => 150,  388 => 146,  382 => 142,  374 => 138,  372 => 137,  358 => 127,  356 => 126,  352 => 124,  344 => 120,  342 => 119,  337 => 116,  335 => 115,  325 => 108,  315 => 107,  306 => 101,  299 => 96,  295 => 94,  291 => 92,  285 => 90,  283 => 89,  279 => 88,  275 => 86,  262 => 84,  258 => 83,  255 => 82,  253 => 81,  249 => 80,  240 => 74,  232 => 69,  225 => 65,  207 => 50,  203 => 49,  196 => 47,  187 => 40,  181 => 36,  173 => 34,  171 => 33,  158 => 24,  150 => 20,  148 => 19,  141 => 15,  137 => 13,  135 => 12,  133 => 11,  120 => 10,  107 => 7,  102 => 6,  89 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}{{ produit.nomProduit }} - Product Details{% endblock %}

{% block breadcrumb %}
<li class=\"breadcrumb-item\"><a href=\"{{ path('app_produit_index') }}\">Products</a></li>
<li class=\"breadcrumb-item active\">{{ produit.nomProduit }}</li>
{% endblock %}

{% block body %}
{% set canManageCatalog = canManageProduct %}
{% set canReviewPurchasedProduct = eligibleFeedbackLine is not null %}
<div class=\"page-header d-flex justify-content-between align-items-center\">
    <div>
        <h1><i class=\"bi bi-box-seam me-2\"></i>{{ produit.nomProduit }}</h1>
        <p>Product details and information</p>
    </div>
    <div class=\"d-flex gap-2\">
        {% if canManageCatalog %}
        <a href=\"{{ path('app_produit_edit', {'id': produit.id}) }}\" class=\"btn btn-primary\">
            <i class=\"bi bi-pencil me-1\"></i> Edit
        </a>
        {% endif %}
        <a href=\"{{ path('app_produit_index') }}\" class=\"btn btn-outline-secondary\">
            <i class=\"bi bi-arrow-left me-1\"></i> Back
        </a>
    </div>
</div>

<div class=\"row\">
    <div class=\"col-lg-5 mb-4\">
        <div class=\"card\">
            {% if produit.imageURL %}
            <img src=\"{{ produit.imageURL }}\" class=\"card-img-top\" alt=\"{{ produit.nomProduit }}\" style=\"max-height: 400px; object-fit: cover;\">
            {% else %}
            <div class=\"card-img-top d-flex align-items-center justify-content-center bg-light\" style=\"height: 300px;\">
                <i class=\"bi bi-box-seam\" style=\"font-size: 6rem; color: #cbd5e1;\"></i>
            </div>
            {% endif %}
        </div>

        <div class=\"card mt-4\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\"><i class=\"bi bi-qr-code me-2\"></i>QR Code Produit</h5>
            </div>
            <div class=\"card-body text-center\">
                <img src=\"{{ path('app_produit_qr_code', {'id': produit.id}) }}\" alt=\"QR code for {{ produit.nomProduit }}\" class=\"img-fluid border rounded-4 p-3 bg-white\" style=\"max-width: 240px;\">
                <p class=\"text-muted mt-3 mb-2\">Scannez ce QR code pour ouvrir directement la fiche de ce produit.</p>
                <div class=\"small text-muted mb-3\">{{ productUrl }}</div>
                <a href=\"{{ path('app_produit_qr_code', {'id': produit.id, 'download': 1}) }}\" class=\"btn btn-outline-dark btn-sm\">
                    <i class=\"bi bi-download me-1\"></i> Telecharger le QR code SVG
                </a>
            </div>
        </div>
    </div>
    
    <div class=\"col-lg-7 mb-4\">
        <div class=\"card mb-4\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\"><i class=\"bi bi-info-circle me-2\"></i>Product Information</h5>
            </div>
            <div class=\"card-body\">
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Product ID</div>
                    <div class=\"col-sm-8 fw-medium\">#{{ produit.id }}</div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Name</div>
                    <div class=\"col-sm-8 fw-medium\">{{ produit.nomProduit }}</div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Address</div>
                    <div class=\"col-sm-8 fw-medium\">
                        <i class=\"bi bi-geo-alt text-primary me-1\"></i>{{ produit.adresse }}
                    </div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Price</div>
                    <div class=\"col-sm-8\">
                        <span class=\"h4 text-primary mb-0\">{{ produit.prix|number_format(2, '.', ',') }} TND</span>
                        {% if convertedPrices.available %}
                        <div class=\"mt-2 d-flex flex-wrap gap-2\">
                            {% for currency in convertedPrices.currencies %}
                            <span class=\"badge bg-light text-dark border\">{{ currency.label }}: {{ currency.amount|number_format(2, '.', ',') }} {{ currency.code }}</span>
                            {% endfor %}
                        </div>
                        <div class=\"small text-muted mt-2\">
                            Conversion approximative depuis le dinar tunisien via {{ convertedPrices.sourceLabel }}
                            {% if convertedPrices.updatedAt %}
                            (maj {{ convertedPrices.updatedAt|date('Y-m-d H:i') }})
                            {% endif %}
                        </div>
                        {% else %}
                        <div class=\"small text-muted mt-2\">Conversion EUR/USD indisponible pour le moment.</div>
                        {% endif %}
                    </div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Category</div>
                    <div class=\"col-sm-8 fw-medium\">
                        <span class=\"badge bg-light text-dark\"><i class=\"bi bi-tag me-1\"></i>{{ produit.categorie.nom }}</span>
                    </div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Quantity Available</div>
                    <div class=\"col-sm-8\">
                        <span class=\"badge {% if produit.quantite > 10 %}bg-success{% elseif produit.quantite > 0 %}bg-warning{% else %}bg-danger{% endif %} fs-6\">
                            {{ produit.quantite }} units
                        </span>
                    </div>
                </div>
            </div>
        </div>

        {% if canBuy %}
        <div class=\"card mb-4\">
            <div class=\"card-header d-flex justify-content-between align-items-center\">
                <h5 class=\"mb-0\"><i class=\"bi bi-bag-plus me-2\"></i>Buy This Product</h5>
                {% if hasDraftCart %}
                <a href=\"{{ path('app_commande_new') }}\" class=\"btn btn-outline-primary btn-sm\">
                    <i class=\"bi bi-bag-check me-1\"></i> Current Order
                </a>
                {% endif %}
            </div>
            <div class=\"card-body\">
                {% if produit.quantite > 0 %}
                <form action=\"{{ path('app_produit_buy', {'id': produit.id}) }}\" method=\"post\" novalidate>
                    <div class=\"row g-3 align-items-end\">
                        <div class=\"col-md-4\">
                            <label for=\"quantite\" class=\"form-label\">Quantity</label>
                            <input type=\"text\" name=\"quantite\" id=\"quantite\" class=\"form-control\" value=\"1\" placeholder=\"1\">
                        </div>
                        <div class=\"col-md-8 d-flex gap-2\">
                            <button type=\"submit\" class=\"btn btn-primary\">
                                <i class=\"bi bi-cart-plus me-1\"></i> Add To Current Order
                            </button>
                            {% if hasDraftCart %}
                            <a href=\"{{ path('app_commande_new') }}\" class=\"btn btn-outline-secondary\">
                                <i class=\"bi bi-arrow-right me-1\"></i> Checkout
                            </a>
                            {% endif %}
                        </div>
                    </div>
                </form>
                {% else %}
                <div class=\"alert alert-warning mb-0\">
                    This product is currently out of stock.
                </div>
                {% endif %}

                <hr class=\"my-4\">

                {% if canReviewPurchasedProduct %}
                <a href=\"{{ path('app_feedback_new', {'ligneCommandeId': eligibleFeedbackLine.id}) }}\" class=\"btn btn-outline-success\">
                    <i class=\"bi bi-chat-heart me-1\"></i> Leave Feedback For This Product
                </a>
                {% else %}
                <p class=\"text-muted mb-0\">Feedback becomes available only after this product has been delivered to your account.</p>
                {% endif %}
            </div>
        </div>
        {% endif %}

        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\"><i class=\"bi bi-tags me-2\"></i>Catalog Information</h5>
            </div>
            <div class=\"card-body\">
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Category</div>
                    <div class=\"col-sm-8 fw-medium\">{{ produit.categorie.nom }}</div>
                </div>
                {% if produit.categorie.description %}
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Description</div>
                    <div class=\"col-sm-8\">{{ produit.categorie.description }}</div>
                </div>
                {% endif %}
                {% if canManageCatalog %}
                <a href=\"{{ path('app_categorie_edit', {'id': produit.categorie.id}) }}\" class=\"btn btn-outline-primary btn-sm\">
                    <i class=\"bi bi-pencil me-1\"></i> Manage Category
                </a>
                {% endif %}
            </div>
        </div>
    </div>
</div>

<div class=\"card mb-4\">
    <div class=\"card-header d-flex justify-content-between align-items-center\">
        <h5 class=\"mb-0\"><i class=\"bi bi-chat-left-quote me-2\"></i>Product Feedback ({{ feedbacks|length }})</h5>
        {% if canReviewPurchasedProduct %}
        <a href=\"{{ path('app_feedback_new', {'ligneCommandeId': eligibleFeedbackLine.id}) }}\" class=\"btn btn-outline-primary btn-sm\">
            <i class=\"bi bi-plus-lg me-1\"></i> Add Feedback
        </a>
        {% endif %}
    </div>
    <div class=\"card-body\">
        {% if feedbacks is empty %}
        <div class=\"text-center py-4\">
            <i class=\"bi bi-chat-square-text fs-1 text-muted mb-3\"></i>
            <p class=\"text-muted mb-0\">No feedback has been published for this product yet.</p>
        </div>
        {% else %}
        <div class=\"row g-3\">
            {% for feedback in feedbacks %}
            <div class=\"col-lg-6\">
                <div class=\"border rounded-4 p-3 h-100\">
                    <div class=\"d-flex justify-content-between align-items-start mb-2\">
                        <div>
                            <div class=\"fw-semibold\">{{ feedback.auteur ? feedback.auteur.nomComplet : 'Deleted user' }}</div>
                            <small class=\"text-muted\">{{ feedback.dateStatut|date('Y-m-d H:i') }}</small>
                        </div>
                        <div class=\"text-warning\">
                            {% for i in 1..5 %}
                                {% if i <= feedback.note|number_format %}&#9733;{% else %}&#9734;{% endif %}
                            {% endfor %}
                        </div>
                    </div>
                    <p class=\"mb-3\">{{ feedback.commentaire|slice(0, 200) }}{% if feedback.commentaire|length > 200 %}...{% endif %}</p>
                    <a href=\"{{ path('app_feedback_show', {'id': feedback.id}) }}\" class=\"btn btn-outline-secondary btn-sm\">
                        <i class=\"bi bi-eye me-1\"></i> View Discussion
                    </a>
                </div>
            </div>
            {% endfor %}
        </div>
        {% endif %}
    </div>
</div>

{% if canManageCatalog %}
<div class=\"card\">
    <div class=\"card-header\">
        <h5 class=\"mb-0\"><i class=\"bi bi-trash me-2 text-danger\"></i>Danger Zone</h5>
    </div>
    <div class=\"card-body\">
        <p class=\"text-muted mb-3\">Deleting this product will permanently remove it and all associated data.</p>
        <form action=\"{{ path('app_produit_delete', {'id': produit.id}) }}\" method=\"post\" novalidate>
            <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ produit.id) }}\">
            <button type=\"submit\" class=\"btn btn-outline-danger\">
                <i class=\"bi bi-trash me-1\"></i> Delete Product
            </button>
        </form>
    </div>
</div>
{% endif %}
{% endblock %}
", "produit/show.html.twig", "C:\\Users\\Skaina\\Desktop\\final version symfony\\Marketplace-Project\\web\\templates\\produit\\show.html.twig");
    }
}
