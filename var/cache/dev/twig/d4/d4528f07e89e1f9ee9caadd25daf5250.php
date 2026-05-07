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

/* commande/new.html.twig */
class __TwigTemplate_06ed9f1f32354c0ffa512e9c3b6acee2 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "commande/new.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "commande/new.html.twig"));

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

        yield "New Order";
        
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
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_commande_index");
        yield "\">Orders</a></li>
<li class=\"breadcrumb-item active\">New Order</li>
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
    <h1><i class=\"bi bi-bag-check me-2\"></i>Checkout Current Order</h1>
    <p>Review the products you selected, choose how you want to pay, and confirm your delivery details in Tunisia.</p>
</div>

";
        // line 16
        if (( !(isset($context["cart"]) || array_key_exists("cart", $context) ? $context["cart"] : (function () { throw new RuntimeError('Variable "cart" does not exist.', 16, $this->source); })()) || Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, (isset($context["cart"]) || array_key_exists("cart", $context) ? $context["cart"] : (function () { throw new RuntimeError('Variable "cart" does not exist.', 16, $this->source); })()), "lignesCommande", [], "any", false, false, false, 16)))) {
            // line 17
            yield "<div class=\"card\">
    <div class=\"card-body text-center py-5\">
        <i class=\"bi bi-cart-x\" style=\"font-size: 3rem; color: #94a3b8;\"></i>
        <h5 class=\"mt-3 text-muted\">Your current order is empty</h5>
        <p class=\"text-muted mb-4\">Browse the catalog, add products, then return here to confirm the purchase.</p>
        <a href=\"";
            // line 22
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_index");
            yield "\" class=\"btn btn-primary\">
            <i class=\"bi bi-grid me-1\"></i> Browse Products
        </a>
    </div>
</div>
";
        } else {
            // line 28
            yield "<div class=\"row g-4\">
    <div class=\"col-lg-8\">
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\"><i class=\"bi bi-cart3 me-2\"></i>Products In Your Order</h5>
            </div>
            <div class=\"card-body\">
                ";
            // line 35
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "cart", [], "array", true, true, false, 35)) {
                // line 36
                yield "                <div class=\"alert alert-danger\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 36, $this->source); })()), "cart", [], "array", false, false, false, 36), "html", null, true);
                yield "</div>
                ";
            }
            // line 38
            yield "
                <div class=\"table-responsive\">
                    <table class=\"table align-middle mb-0\">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Subtotal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            ";
            // line 51
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["cart"]) || array_key_exists("cart", $context) ? $context["cart"] : (function () { throw new RuntimeError('Variable "cart" does not exist.', 51, $this->source); })()), "lignesCommande", [], "any", false, false, false, 51));
            foreach ($context['_seq'] as $context["_key"] => $context["ligne"]) {
                // line 52
                yield "                            <tr>
                                <td>
                                    <a href=\"";
                // line 54
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["ligne"], "produit", [], "any", false, false, false, 54), "id", [], "any", false, false, false, 54)]), "html", null, true);
                yield "\" class=\"text-decoration-none fw-semibold\">
                                        ";
                // line 55
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["ligne"], "produit", [], "any", false, false, false, 55), "nomProduit", [], "any", false, false, false, 55), "html", null, true);
                yield "
                                    </a>
                                </td>
                                <td>";
                // line 58
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["ligne"], "quantite", [], "any", false, false, false, 58), "html", null, true);
                yield "</td>
                                <td>";
                // line 59
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["ligne"], "prixUnitaire", [], "any", false, false, false, 59), 2, ".", ","), "html", null, true);
                yield " TND</td>
                                <td>";
                // line 60
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["ligne"], "sousTotal", [], "any", false, false, false, 60), 2, ".", ","), "html", null, true);
                yield " TND</td>
                                <td class=\"text-end\">
                                    <form action=\"";
                // line 62
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_commande_line_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["ligne"], "id", [], "any", false, false, false, 62)]), "html", null, true);
                yield "\" method=\"post\" novalidate>
                                        <button type=\"submit\" class=\"btn btn-outline-danger btn-sm\">
                                            <i class=\"bi bi-trash\"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['ligne'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 70
            yield "                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class=\"col-lg-4\">
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\">Confirm Order</h5>
            </div>
            <div class=\"card-body\">
                ";
            // line 83
            $context["selectedGovernorate"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 83, $this->source); })()), "request", [], "any", false, false, false, 83), "request", [], "any", false, false, false, 83), "get", ["gouvernorat", (((CoreExtension::getAttribute($this->env, $this->source, ($context["cart"] ?? null), "gouvernorat", [], "any", true, true, false, 83) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["cart"]) || array_key_exists("cart", $context) ? $context["cart"] : (function () { throw new RuntimeError('Variable "cart" does not exist.', 83, $this->source); })()), "gouvernorat", [], "any", false, false, false, 83)))) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["cart"]) || array_key_exists("cart", $context) ? $context["cart"] : (function () { throw new RuntimeError('Variable "cart" does not exist.', 83, $this->source); })()), "gouvernorat", [], "any", false, false, false, 83)) : (""))], "method", false, false, false, 83);
            // line 84
            yield "                ";
            $context["deliveryPhone"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 84, $this->source); })()), "request", [], "any", false, false, false, 84), "request", [], "any", false, false, false, 84), "get", ["telephoneLivraison", (((CoreExtension::getAttribute($this->env, $this->source, ($context["cart"] ?? null), "telephoneLivraison", [], "any", true, true, false, 84) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["cart"]) || array_key_exists("cart", $context) ? $context["cart"] : (function () { throw new RuntimeError('Variable "cart" does not exist.', 84, $this->source); })()), "telephoneLivraison", [], "any", false, false, false, 84)))) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["cart"]) || array_key_exists("cart", $context) ? $context["cart"] : (function () { throw new RuntimeError('Variable "cart" does not exist.', 84, $this->source); })()), "telephoneLivraison", [], "any", false, false, false, 84)) : ((((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, true, false, 84), "telephone", [], "any", true, true, false, 84) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 84, $this->source); })()), "user", [], "any", false, false, false, 84), "telephone", [], "any", false, false, false, 84)))) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 84, $this->source); })()), "user", [], "any", false, false, false, 84), "telephone", [], "any", false, false, false, 84)) : (""))))], "method", false, false, false, 84);
            // line 85
            yield "                ";
            $context["deliveryAddress"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 85, $this->source); })()), "request", [], "any", false, false, false, 85), "request", [], "any", false, false, false, 85), "get", ["adresseLivraison", (((CoreExtension::getAttribute($this->env, $this->source, ($context["cart"] ?? null), "adresseLivraison", [], "any", true, true, false, 85) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["cart"]) || array_key_exists("cart", $context) ? $context["cart"] : (function () { throw new RuntimeError('Variable "cart" does not exist.', 85, $this->source); })()), "adresseLivraison", [], "any", false, false, false, 85)))) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["cart"]) || array_key_exists("cart", $context) ? $context["cart"] : (function () { throw new RuntimeError('Variable "cart" does not exist.', 85, $this->source); })()), "adresseLivraison", [], "any", false, false, false, 85)) : (""))], "method", false, false, false, 85);
            // line 86
            yield "                ";
            $context["deliveryComment"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 86, $this->source); })()), "request", [], "any", false, false, false, 86), "request", [], "any", false, false, false, 86), "get", ["commentaireLivraison", (((CoreExtension::getAttribute($this->env, $this->source, ($context["cart"] ?? null), "commentaireLivraison", [], "any", true, true, false, 86) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["cart"]) || array_key_exists("cart", $context) ? $context["cart"] : (function () { throw new RuntimeError('Variable "cart" does not exist.', 86, $this->source); })()), "commentaireLivraison", [], "any", false, false, false, 86)))) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["cart"]) || array_key_exists("cart", $context) ? $context["cart"] : (function () { throw new RuntimeError('Variable "cart" does not exist.', 86, $this->source); })()), "commentaireLivraison", [], "any", false, false, false, 86)) : (""))], "method", false, false, false, 86);
            // line 87
            yield "                <div class=\"mb-3\">
                    <div class=\"text-muted small\">Buyer</div>
                    <div class=\"fw-semibold\">";
            // line 89
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 89, $this->source); })()), "user", [], "any", false, false, false, 89), "nomComplet", [], "any", false, false, false, 89), "html", null, true);
            yield "</div>
                </div>
                <div class=\"mb-3\">
                    <div class=\"text-muted small\">Items</div>
                    <div class=\"fw-semibold\">";
            // line 93
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["cart"]) || array_key_exists("cart", $context) ? $context["cart"] : (function () { throw new RuntimeError('Variable "cart" does not exist.', 93, $this->source); })()), "totalItems", [], "any", false, false, false, 93), "html", null, true);
            yield "</div>
                </div>
                <div class=\"mb-4\">
                    <div class=\"text-muted small\">Total</div>
                    <div class=\"h4 mb-0 text-primary\">";
            // line 97
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, (isset($context["cart"]) || array_key_exists("cart", $context) ? $context["cart"] : (function () { throw new RuntimeError('Variable "cart" does not exist.', 97, $this->source); })()), "montantTotal", [], "any", false, false, false, 97), 2, ".", ","), "html", null, true);
            yield " TND</div>
                </div>

                <form method=\"post\" novalidate>
                    <div class=\"mb-3\">
                        <label for=\"gouvernorat\" class=\"form-label\">Governorate In Tunisia</label>
                        <select name=\"gouvernorat\" id=\"gouvernorat\" class=\"form-select ";
            // line 103
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "gouvernorat", [], "array", true, true, false, 103)) {
                yield "is-invalid";
            }
            yield "\">
                            <option value=\"\">Choose your governorate</option>
                            ";
            // line 105
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["governorates"]) || array_key_exists("governorates", $context) ? $context["governorates"] : (function () { throw new RuntimeError('Variable "governorates" does not exist.', 105, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["governorate"]) {
                // line 106
                yield "                            <option value=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["governorate"], "html", null, true);
                yield "\" ";
                if (((isset($context["selectedGovernorate"]) || array_key_exists("selectedGovernorate", $context) ? $context["selectedGovernorate"] : (function () { throw new RuntimeError('Variable "selectedGovernorate" does not exist.', 106, $this->source); })()) == $context["governorate"])) {
                    yield "selected";
                }
                yield ">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["governorate"], "html", null, true);
                yield "</option>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['governorate'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 108
            yield "                        </select>
                        ";
            // line 109
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "gouvernorat", [], "array", true, true, false, 109)) {
                // line 110
                yield "                        <div class=\"invalid-feedback d-block\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 110, $this->source); })()), "gouvernorat", [], "array", false, false, false, 110), "html", null, true);
                yield "</div>
                        ";
            }
            // line 112
            yield "                    </div>

                    <div class=\"mb-3\">
                        <label for=\"telephoneLivraison\" class=\"form-label\">Delivery Phone Number</label>
                        <input type=\"text\" name=\"telephoneLivraison\" id=\"telephoneLivraison\" class=\"form-control ";
            // line 116
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "telephoneLivraison", [], "array", true, true, false, 116)) {
                yield "is-invalid";
            }
            yield "\" value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["deliveryPhone"]) || array_key_exists("deliveryPhone", $context) ? $context["deliveryPhone"] : (function () { throw new RuntimeError('Variable "deliveryPhone" does not exist.', 116, $this->source); })()), "html", null, true);
            yield "\" placeholder=\"8 digits starting with 2, 5, or 9\">
                        ";
            // line 117
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "telephoneLivraison", [], "array", true, true, false, 117)) {
                // line 118
                yield "                        <div class=\"invalid-feedback d-block\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 118, $this->source); })()), "telephoneLivraison", [], "array", false, false, false, 118), "html", null, true);
                yield "</div>
                        ";
            }
            // line 120
            yield "                    </div>

                    <div class=\"mb-3\">
                        <label for=\"adresseLivraison\" class=\"form-label\">Full Delivery Address</label>
                        <textarea name=\"adresseLivraison\" id=\"adresseLivraison\" class=\"form-control ";
            // line 124
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "adresseLivraison", [], "array", true, true, false, 124)) {
                yield "is-invalid";
            }
            yield "\" rows=\"3\" placeholder=\"Street, area, building, floor, or any full address details\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["deliveryAddress"]) || array_key_exists("deliveryAddress", $context) ? $context["deliveryAddress"] : (function () { throw new RuntimeError('Variable "deliveryAddress" does not exist.', 124, $this->source); })()), "html", null, true);
            yield "</textarea>
                        ";
            // line 125
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "adresseLivraison", [], "array", true, true, false, 125)) {
                // line 126
                yield "                        <div class=\"invalid-feedback d-block\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 126, $this->source); })()), "adresseLivraison", [], "array", false, false, false, 126), "html", null, true);
                yield "</div>
                        ";
            }
            // line 128
            yield "                    </div>

                    <div class=\"mb-4\">
                        <label for=\"commentaireLivraison\" class=\"form-label\">Delivery Comment</label>
                        <textarea name=\"commentaireLivraison\" id=\"commentaireLivraison\" class=\"form-control ";
            // line 132
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "commentaireLivraison", [], "array", true, true, false, 132)) {
                yield "is-invalid";
            }
            yield "\" rows=\"3\" placeholder=\"Tell the delivery person exactly where to find you\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["deliveryComment"]) || array_key_exists("deliveryComment", $context) ? $context["deliveryComment"] : (function () { throw new RuntimeError('Variable "deliveryComment" does not exist.', 132, $this->source); })()), "html", null, true);
            yield "</textarea>
                        ";
            // line 133
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "commentaireLivraison", [], "array", true, true, false, 133)) {
                // line 134
                yield "                        <div class=\"invalid-feedback d-block\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 134, $this->source); })()), "commentaireLivraison", [], "array", false, false, false, 134), "html", null, true);
                yield "</div>
                        ";
            }
            // line 136
            yield "                    </div>

                    <div class=\"d-grid gap-2\">
                        <button type=\"submit\" class=\"btn btn-primary\">
                            <i class=\"bi bi-check-lg me-1\"></i> Confirm Order
                        </button>
                        <a href=\"";
            // line 142
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_index");
            yield "\" class=\"btn btn-outline-secondary\">
                            <i class=\"bi bi-arrow-left me-1\"></i> Continue Shopping
                        </a>
                    </div>
                </form>
            </div>
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
        return "commande/new.html.twig";
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
        return array (  395 => 142,  387 => 136,  381 => 134,  379 => 133,  371 => 132,  365 => 128,  359 => 126,  357 => 125,  349 => 124,  343 => 120,  337 => 118,  335 => 117,  327 => 116,  321 => 112,  315 => 110,  313 => 109,  310 => 108,  295 => 106,  291 => 105,  284 => 103,  275 => 97,  268 => 93,  261 => 89,  257 => 87,  254 => 86,  251 => 85,  248 => 84,  246 => 83,  231 => 70,  217 => 62,  212 => 60,  208 => 59,  204 => 58,  198 => 55,  194 => 54,  190 => 52,  186 => 51,  171 => 38,  165 => 36,  163 => 35,  154 => 28,  145 => 22,  138 => 17,  136 => 16,  129 => 11,  116 => 10,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}New Order{% endblock %}

{% block breadcrumb %}
<li class=\"breadcrumb-item\"><a href=\"{{ path('app_commande_index') }}\">Orders</a></li>
<li class=\"breadcrumb-item active\">New Order</li>
{% endblock %}

{% block body %}
<div class=\"page-header\">
    <h1><i class=\"bi bi-bag-check me-2\"></i>Checkout Current Order</h1>
    <p>Review the products you selected, choose how you want to pay, and confirm your delivery details in Tunisia.</p>
</div>

{% if not cart or cart.lignesCommande is empty %}
<div class=\"card\">
    <div class=\"card-body text-center py-5\">
        <i class=\"bi bi-cart-x\" style=\"font-size: 3rem; color: #94a3b8;\"></i>
        <h5 class=\"mt-3 text-muted\">Your current order is empty</h5>
        <p class=\"text-muted mb-4\">Browse the catalog, add products, then return here to confirm the purchase.</p>
        <a href=\"{{ path('app_produit_index') }}\" class=\"btn btn-primary\">
            <i class=\"bi bi-grid me-1\"></i> Browse Products
        </a>
    </div>
</div>
{% else %}
<div class=\"row g-4\">
    <div class=\"col-lg-8\">
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\"><i class=\"bi bi-cart3 me-2\"></i>Products In Your Order</h5>
            </div>
            <div class=\"card-body\">
                {% if errors['cart'] is defined %}
                <div class=\"alert alert-danger\">{{ errors['cart'] }}</div>
                {% endif %}

                <div class=\"table-responsive\">
                    <table class=\"table align-middle mb-0\">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Subtotal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            {% for ligne in cart.lignesCommande %}
                            <tr>
                                <td>
                                    <a href=\"{{ path('app_produit_show', {'id': ligne.produit.id}) }}\" class=\"text-decoration-none fw-semibold\">
                                        {{ ligne.produit.nomProduit }}
                                    </a>
                                </td>
                                <td>{{ ligne.quantite }}</td>
                                <td>{{ ligne.prixUnitaire|number_format(2, '.', ',') }} TND</td>
                                <td>{{ ligne.sousTotal|number_format(2, '.', ',') }} TND</td>
                                <td class=\"text-end\">
                                    <form action=\"{{ path('app_commande_line_delete', {'id': ligne.id}) }}\" method=\"post\" novalidate>
                                        <button type=\"submit\" class=\"btn btn-outline-danger btn-sm\">
                                            <i class=\"bi bi-trash\"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            {% endfor %}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class=\"col-lg-4\">
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\">Confirm Order</h5>
            </div>
            <div class=\"card-body\">
                {% set selectedGovernorate = app.request.request.get('gouvernorat', cart.gouvernorat ?? '') %}
                {% set deliveryPhone = app.request.request.get('telephoneLivraison', cart.telephoneLivraison ?? app.user.telephone ?? '') %}
                {% set deliveryAddress = app.request.request.get('adresseLivraison', cart.adresseLivraison ?? '') %}
                {% set deliveryComment = app.request.request.get('commentaireLivraison', cart.commentaireLivraison ?? '') %}
                <div class=\"mb-3\">
                    <div class=\"text-muted small\">Buyer</div>
                    <div class=\"fw-semibold\">{{ app.user.nomComplet }}</div>
                </div>
                <div class=\"mb-3\">
                    <div class=\"text-muted small\">Items</div>
                    <div class=\"fw-semibold\">{{ cart.totalItems }}</div>
                </div>
                <div class=\"mb-4\">
                    <div class=\"text-muted small\">Total</div>
                    <div class=\"h4 mb-0 text-primary\">{{ cart.montantTotal|number_format(2, '.', ',') }} TND</div>
                </div>

                <form method=\"post\" novalidate>
                    <div class=\"mb-3\">
                        <label for=\"gouvernorat\" class=\"form-label\">Governorate In Tunisia</label>
                        <select name=\"gouvernorat\" id=\"gouvernorat\" class=\"form-select {% if errors['gouvernorat'] is defined %}is-invalid{% endif %}\">
                            <option value=\"\">Choose your governorate</option>
                            {% for governorate in governorates %}
                            <option value=\"{{ governorate }}\" {% if selectedGovernorate == governorate %}selected{% endif %}>{{ governorate }}</option>
                            {% endfor %}
                        </select>
                        {% if errors['gouvernorat'] is defined %}
                        <div class=\"invalid-feedback d-block\">{{ errors['gouvernorat'] }}</div>
                        {% endif %}
                    </div>

                    <div class=\"mb-3\">
                        <label for=\"telephoneLivraison\" class=\"form-label\">Delivery Phone Number</label>
                        <input type=\"text\" name=\"telephoneLivraison\" id=\"telephoneLivraison\" class=\"form-control {% if errors['telephoneLivraison'] is defined %}is-invalid{% endif %}\" value=\"{{ deliveryPhone }}\" placeholder=\"8 digits starting with 2, 5, or 9\">
                        {% if errors['telephoneLivraison'] is defined %}
                        <div class=\"invalid-feedback d-block\">{{ errors['telephoneLivraison'] }}</div>
                        {% endif %}
                    </div>

                    <div class=\"mb-3\">
                        <label for=\"adresseLivraison\" class=\"form-label\">Full Delivery Address</label>
                        <textarea name=\"adresseLivraison\" id=\"adresseLivraison\" class=\"form-control {% if errors['adresseLivraison'] is defined %}is-invalid{% endif %}\" rows=\"3\" placeholder=\"Street, area, building, floor, or any full address details\">{{ deliveryAddress }}</textarea>
                        {% if errors['adresseLivraison'] is defined %}
                        <div class=\"invalid-feedback d-block\">{{ errors['adresseLivraison'] }}</div>
                        {% endif %}
                    </div>

                    <div class=\"mb-4\">
                        <label for=\"commentaireLivraison\" class=\"form-label\">Delivery Comment</label>
                        <textarea name=\"commentaireLivraison\" id=\"commentaireLivraison\" class=\"form-control {% if errors['commentaireLivraison'] is defined %}is-invalid{% endif %}\" rows=\"3\" placeholder=\"Tell the delivery person exactly where to find you\">{{ deliveryComment }}</textarea>
                        {% if errors['commentaireLivraison'] is defined %}
                        <div class=\"invalid-feedback d-block\">{{ errors['commentaireLivraison'] }}</div>
                        {% endif %}
                    </div>

                    <div class=\"d-grid gap-2\">
                        <button type=\"submit\" class=\"btn btn-primary\">
                            <i class=\"bi bi-check-lg me-1\"></i> Confirm Order
                        </button>
                        <a href=\"{{ path('app_produit_index') }}\" class=\"btn btn-outline-secondary\">
                            <i class=\"bi bi-arrow-left me-1\"></i> Continue Shopping
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{% endif %}
{% endblock %}
", "commande/new.html.twig", "C:\\Users\\Skaina\\Desktop\\final version symfony\\Marketplace-Project\\web\\templates\\commande\\new.html.twig");
    }
}
