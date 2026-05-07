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

/* commande/index.html.twig */
class __TwigTemplate_65dfa90b54e39562026046336960dc54 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "commande/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "commande/index.html.twig"));

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

        yield "Orders";
        
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
        yield "<li class=\"breadcrumb-item active\">Orders</li>
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
        $context["isBuyer"] = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_CLIENT");
        // line 11
        $context["isSupplier"] = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_FOURNISSEUR");
        // line 12
        $context["canManageOrders"] = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN");
        // line 13
        yield "<div class=\"page-header d-flex justify-content-between align-items-center\">
    <div>
        <h1><i class=\"bi bi-cart3 me-2\"></i>Orders</h1>
        <p>";
        // line 16
        if ((($tmp = (isset($context["canManageOrders"]) || array_key_exists("canManageOrders", $context) ? $context["canManageOrders"] : (function () { throw new RuntimeError('Variable "canManageOrders" does not exist.', 16, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "Review the full marketplace order activity";
        } elseif ((($tmp = (isset($context["isSupplier"]) || array_key_exists("isSupplier", $context) ? $context["isSupplier"] : (function () { throw new RuntimeError('Variable "isSupplier" does not exist.', 16, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "Review client orders that include your products";
        } else {
            yield "Track your purchases and continue your current order";
        }
        yield "</p>
    </div>
    ";
        // line 18
        if ((($tmp = (isset($context["isBuyer"]) || array_key_exists("isBuyer", $context) ? $context["isBuyer"] : (function () { throw new RuntimeError('Variable "isBuyer" does not exist.', 18, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 19
            yield "    <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_commande_new");
            yield "\" class=\"btn btn-primary\">
        <i class=\"bi bi-bag-check me-1\"></i>
        ";
            // line 21
            if (((isset($context["cart"]) || array_key_exists("cart", $context) ? $context["cart"] : (function () { throw new RuntimeError('Variable "cart" does not exist.', 21, $this->source); })()) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["cart"]) || array_key_exists("cart", $context) ? $context["cart"] : (function () { throw new RuntimeError('Variable "cart" does not exist.', 21, $this->source); })()), "totalItems", [], "any", false, false, false, 21) > 0))) {
                // line 22
                yield "        Checkout Current Order (";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["cart"]) || array_key_exists("cart", $context) ? $context["cart"] : (function () { throw new RuntimeError('Variable "cart" does not exist.', 22, $this->source); })()), "totalItems", [], "any", false, false, false, 22), "html", null, true);
                yield ")
        ";
            } else {
                // line 24
                yield "        View Current Order
        ";
            }
            // line 26
            yield "    </a>
    ";
        }
        // line 28
        yield "</div>

<div class=\"card mb-4\">
    <div class=\"card-body\">
        <form method=\"get\" class=\"row g-3 align-items-end\" novalidate>
            <div class=\"col-md-3\">
                <label for=\"search\" class=\"form-label\">Search</label>
                <input type=\"text\" name=\"search\" id=\"search\" class=\"form-control\" value=\"";
        // line 35
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 35, $this->source); })()), "html", null, true);
        yield "\" placeholder=\"Client, order #, address, governorate, phone...\">
            </div>
            <div class=\"col-md-2\">
                <label for=\"statut\" class=\"form-label\">Status</label>
                <select name=\"statut\" id=\"statut\" class=\"form-select\">
                    <option value=\"\">All Statuses</option>
                    <option value=\"En attente\" ";
        // line 41
        if (((isset($context["statut"]) || array_key_exists("statut", $context) ? $context["statut"] : (function () { throw new RuntimeError('Variable "statut" does not exist.', 41, $this->source); })()) == "En attente")) {
            yield "selected";
        }
        yield ">En attente</option>
                    <option value=\"Confirmee\" ";
        // line 42
        if (((isset($context["statut"]) || array_key_exists("statut", $context) ? $context["statut"] : (function () { throw new RuntimeError('Variable "statut" does not exist.', 42, $this->source); })()) == "Confirmee")) {
            yield "selected";
        }
        yield ">Confirmee</option>
                    <option value=\"Annulee\" ";
        // line 43
        if (((isset($context["statut"]) || array_key_exists("statut", $context) ? $context["statut"] : (function () { throw new RuntimeError('Variable "statut" does not exist.', 43, $this->source); })()) == "Annulee")) {
            yield "selected";
        }
        yield ">Annulee</option>
                </select>
            </div>
            <div class=\"col-md-2\">
                <label for=\"sort\" class=\"form-label\">Sort by</label>
                <select name=\"sort\" id=\"sort\" class=\"form-select\">
                    <option value=\"dateCommande\" ";
        // line 49
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 49, $this->source); })()) == "dateCommande")) {
            yield "selected";
        }
        yield ">Date</option>
                    <option value=\"numeroCommande\" ";
        // line 50
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 50, $this->source); })()) == "numeroCommande")) {
            yield "selected";
        }
        yield ">Order #</option>
                    <option value=\"client\" ";
        // line 51
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 51, $this->source); })()) == "client")) {
            yield "selected";
        }
        yield ">Client</option>
                    <option value=\"montantTotal\" ";
        // line 52
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 52, $this->source); })()) == "montantTotal")) {
            yield "selected";
        }
        yield ">Amount</option>
                </select>
            </div>
            <div class=\"col-md-2\">
                <label for=\"order\" class=\"form-label\">Order</label>
                <select name=\"order\" id=\"order\" class=\"form-select\">
                    <option value=\"asc\" ";
        // line 58
        if (((isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 58, $this->source); })()) == "asc")) {
            yield "selected";
        }
        yield ">Ascending</option>
                    <option value=\"desc\" ";
        // line 59
        if (((isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 59, $this->source); })()) == "desc")) {
            yield "selected";
        }
        yield ">Descending</option>
                </select>
            </div>
            <div class=\"col-md-3\">
                <button type=\"submit\" class=\"btn btn-primary me-2\">
                    <i class=\"bi bi-search me-1\"></i> Apply
                </button>
                <a href=\"";
        // line 66
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_commande_index");
        yield "\" class=\"btn btn-outline-secondary\">
                    <i class=\"bi bi-x-lg me-1\"></i> Reset
                </a>
            </div>
        </form>
    </div>
</div>

";
        // line 74
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["commandes"]) || array_key_exists("commandes", $context) ? $context["commandes"] : (function () { throw new RuntimeError('Variable "commandes" does not exist.', 74, $this->source); })()))) {
            // line 75
            yield "<div class=\"card\">
    <div class=\"card-body text-center py-5\">
        <i class=\"bi bi-cart-x\" style=\"font-size: 3rem; color: #94a3b8;\"></i>
        <h5 class=\"mt-3 text-muted\">No orders found</h5>
        ";
            // line 79
            if (((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 79, $this->source); })()) || (isset($context["statut"]) || array_key_exists("statut", $context) ? $context["statut"] : (function () { throw new RuntimeError('Variable "statut" does not exist.', 79, $this->source); })()))) {
                // line 80
                yield "        <p class=\"text-muted\">No orders match your search criteria.</p>
        ";
            } else {
                // line 82
                yield "        <p class=\"text-muted\">";
                if ((($tmp = (isset($context["canManageOrders"]) || array_key_exists("canManageOrders", $context) ? $context["canManageOrders"] : (function () { throw new RuntimeError('Variable "canManageOrders" does not exist.', 82, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "Orders will appear here when customers place them.";
                } elseif ((($tmp = (isset($context["isSupplier"]) || array_key_exists("isSupplier", $context) ? $context["isSupplier"] : (function () { throw new RuntimeError('Variable "isSupplier" does not exist.', 82, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "Orders containing your catalog products will appear here once clients confirm them.";
                } else {
                    yield "Start by adding products to your current order from a product page.";
                }
                yield "</p>
        ";
            }
            // line 84
            yield "        <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath((((($tmp = (isset($context["isBuyer"]) || array_key_exists("isBuyer", $context) ? $context["isBuyer"] : (function () { throw new RuntimeError('Variable "isBuyer" does not exist.', 84, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("app_produit_index") : ("app_commande_index")));
            yield "\" class=\"btn btn-primary mt-2\">
            <i class=\"bi ";
            // line 85
            yield (((($tmp = (isset($context["isBuyer"]) || array_key_exists("isBuyer", $context) ? $context["isBuyer"] : (function () { throw new RuntimeError('Variable "isBuyer" does not exist.', 85, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("bi-grid") : ("bi-cart3"));
            yield " me-1\"></i> ";
            yield (((($tmp = (isset($context["isBuyer"]) || array_key_exists("isBuyer", $context) ? $context["isBuyer"] : (function () { throw new RuntimeError('Variable "isBuyer" does not exist.', 85, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Browse Products") : ("Refresh Orders"));
            yield "
        </a>
    </div>
</div>
";
        } else {
            // line 90
            yield "<div class=\"card\">
    <div class=\"card-body p-0\">
        <div class=\"table-responsive\">
            <table class=\"table table-hover mb-0\">
                <thead>
                    <tr>
                        <th>Order #</th>
                        <th>Client</th>
                        <th>Date</th>
                        <th>Items</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Delivery</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                ";
            // line 107
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["commandes"]) || array_key_exists("commandes", $context) ? $context["commandes"] : (function () { throw new RuntimeError('Variable "commandes" does not exist.', 107, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["commande"]) {
                // line 108
                yield "                    <tr>
                        <td><strong>#";
                // line 109
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "numeroCommande", [], "any", false, false, false, 109), "html", null, true);
                yield "</strong></td>
                        <td>
                            <div class=\"d-flex align-items-center\">
                                <div class=\"user-avatar me-2\" style=\"width: 32px; height: 32px; font-size: 0.75rem;\">";
                // line 112
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "clientDisplayName", [], "any", false, false, false, 112))), "html", null, true);
                yield "</div>
                                ";
                // line 113
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "clientDisplayName", [], "any", false, false, false, 113), "html", null, true);
                yield "
                            </div>
                        </td>
                        <td>";
                // line 116
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "dateCommande", [], "any", false, false, false, 116), "Y-m-d"), "html", null, true);
                yield "</td>
                        <td>";
                // line 117
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "totalItems", [], "any", false, false, false, 117), "html", null, true);
                yield "</td>
                        <td><strong>";
                // line 118
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "montantTotal", [], "any", false, false, false, 118), 2, ".", ","), "html", null, true);
                yield " TND</strong></td>
                        <td>
                            ";
                // line 120
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "statut", [], "any", false, false, false, 120) == "En attente")) {
                    // line 121
                    yield "                            <span class=\"badge badge-status-pending\"><i class=\"bi bi-clock me-1\"></i>";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "statut", [], "any", false, false, false, 121), "html", null, true);
                    yield "</span>
                            ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 122
$context["commande"], "statut", [], "any", false, false, false, 122) == "Confirmee")) {
                    // line 123
                    yield "                            <span class=\"badge badge-status-confirmed\"><i class=\"bi bi-check-circle me-1\"></i>";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "statut", [], "any", false, false, false, 123), "html", null, true);
                    yield "</span>
                            ";
                } else {
                    // line 125
                    yield "                            <span class=\"badge badge-status-cancelled\"><i class=\"bi bi-x-circle me-1\"></i>";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "statut", [], "any", false, false, false, 125), "html", null, true);
                    yield "</span>
                            ";
                }
                // line 127
                yield "                        </td>
                        <td>
                            ";
                // line 129
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "livraison", [], "any", false, false, false, 129)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 130
                    yield "                            <span class=\"badge bg-success\"><i class=\"bi bi-truck me-1\"></i>Assigned</span>
                            ";
                } else {
                    // line 132
                    yield "                            <span class=\"badge bg-secondary\">Not assigned</span>
                            ";
                }
                // line 134
                yield "                        </td>
                        <td>
                            <div class=\"btn-group\" role=\"group\">
                                <a href=\"";
                // line 137
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_commande_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "idCommande", [], "any", false, false, false, 137)]), "html", null, true);
                yield "\" class=\"btn btn-outline-secondary btn-sm\">
                                    <i class=\"bi bi-eye\"></i>
                                </a>
                                ";
                // line 140
                if ((($tmp = (isset($context["isSupplier"]) || array_key_exists("isSupplier", $context) ? $context["isSupplier"] : (function () { throw new RuntimeError('Variable "isSupplier" does not exist.', 140, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 141
                    yield "                                    ";
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "livraison", [], "any", false, false, false, 141)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 142
                        yield "                                    <a href=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_livraison_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "livraison", [], "any", false, false, false, 142), "idLivraison", [], "any", false, false, false, 142)]), "html", null, true);
                        yield "\" class=\"btn btn-outline-primary btn-sm\">
                                        <i class=\"bi bi-truck\"></i>
                                    </a>
                                    ";
                    } else {
                        // line 146
                        yield "                                    <a href=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_livraison_new", ["commandeId" => CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "idCommande", [], "any", false, false, false, 146)]), "html", null, true);
                        yield "\" class=\"btn btn-outline-primary btn-sm\">
                                        <i class=\"bi bi-truck\"></i>
                                    </a>
                                    ";
                    }
                    // line 150
                    yield "                                ";
                }
                // line 151
                yield "                                ";
                if ((($tmp = (isset($context["canManageOrders"]) || array_key_exists("canManageOrders", $context) ? $context["canManageOrders"] : (function () { throw new RuntimeError('Variable "canManageOrders" does not exist.', 151, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 152
                    yield "                                <a href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_commande_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "idCommande", [], "any", false, false, false, 152)]), "html", null, true);
                    yield "\" class=\"btn btn-outline-primary btn-sm\">
                                    <i class=\"bi bi-pencil\"></i>
                                </a>
                                <form action=\"";
                    // line 155
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_commande_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "idCommande", [], "any", false, false, false, 155)]), "html", null, true);
                    yield "\" method=\"post\" class=\"d-inline\" novalidate>
                                    <input type=\"hidden\" name=\"_token\" value=\"";
                    // line 156
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["commande"], "idCommande", [], "any", false, false, false, 156))), "html", null, true);
                    yield "\">
                                    <button type=\"submit\" class=\"btn btn-outline-danger btn-sm\">
                                        <i class=\"bi bi-trash\"></i>
                                    </button>
                                </form>
                                ";
                }
                // line 162
                yield "                            </div>
                        </td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['commande'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 166
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
        return "commande/index.html.twig";
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
        return array (  469 => 166,  460 => 162,  451 => 156,  447 => 155,  440 => 152,  437 => 151,  434 => 150,  426 => 146,  418 => 142,  415 => 141,  413 => 140,  407 => 137,  402 => 134,  398 => 132,  394 => 130,  392 => 129,  388 => 127,  382 => 125,  376 => 123,  374 => 122,  369 => 121,  367 => 120,  362 => 118,  358 => 117,  354 => 116,  348 => 113,  344 => 112,  338 => 109,  335 => 108,  331 => 107,  312 => 90,  302 => 85,  297 => 84,  285 => 82,  281 => 80,  279 => 79,  273 => 75,  271 => 74,  260 => 66,  248 => 59,  242 => 58,  231 => 52,  225 => 51,  219 => 50,  213 => 49,  202 => 43,  196 => 42,  190 => 41,  181 => 35,  172 => 28,  168 => 26,  164 => 24,  158 => 22,  156 => 21,  150 => 19,  148 => 18,  137 => 16,  132 => 13,  130 => 12,  128 => 11,  126 => 10,  113 => 9,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Orders{% endblock %}

{% block breadcrumb %}
<li class=\"breadcrumb-item active\">Orders</li>
{% endblock %}

{% block body %}
{% set isBuyer = is_granted('ROLE_CLIENT') %}
{% set isSupplier = is_granted('ROLE_FOURNISSEUR') %}
{% set canManageOrders = is_granted('ROLE_ADMIN') %}
<div class=\"page-header d-flex justify-content-between align-items-center\">
    <div>
        <h1><i class=\"bi bi-cart3 me-2\"></i>Orders</h1>
        <p>{% if canManageOrders %}Review the full marketplace order activity{% elseif isSupplier %}Review client orders that include your products{% else %}Track your purchases and continue your current order{% endif %}</p>
    </div>
    {% if isBuyer %}
    <a href=\"{{ path('app_commande_new') }}\" class=\"btn btn-primary\">
        <i class=\"bi bi-bag-check me-1\"></i>
        {% if cart and cart.totalItems > 0 %}
        Checkout Current Order ({{ cart.totalItems }})
        {% else %}
        View Current Order
        {% endif %}
    </a>
    {% endif %}
</div>

<div class=\"card mb-4\">
    <div class=\"card-body\">
        <form method=\"get\" class=\"row g-3 align-items-end\" novalidate>
            <div class=\"col-md-3\">
                <label for=\"search\" class=\"form-label\">Search</label>
                <input type=\"text\" name=\"search\" id=\"search\" class=\"form-control\" value=\"{{ search }}\" placeholder=\"Client, order #, address, governorate, phone...\">
            </div>
            <div class=\"col-md-2\">
                <label for=\"statut\" class=\"form-label\">Status</label>
                <select name=\"statut\" id=\"statut\" class=\"form-select\">
                    <option value=\"\">All Statuses</option>
                    <option value=\"En attente\" {% if statut == 'En attente' %}selected{% endif %}>En attente</option>
                    <option value=\"Confirmee\" {% if statut == 'Confirmee' %}selected{% endif %}>Confirmee</option>
                    <option value=\"Annulee\" {% if statut == 'Annulee' %}selected{% endif %}>Annulee</option>
                </select>
            </div>
            <div class=\"col-md-2\">
                <label for=\"sort\" class=\"form-label\">Sort by</label>
                <select name=\"sort\" id=\"sort\" class=\"form-select\">
                    <option value=\"dateCommande\" {% if sort == 'dateCommande' %}selected{% endif %}>Date</option>
                    <option value=\"numeroCommande\" {% if sort == 'numeroCommande' %}selected{% endif %}>Order #</option>
                    <option value=\"client\" {% if sort == 'client' %}selected{% endif %}>Client</option>
                    <option value=\"montantTotal\" {% if sort == 'montantTotal' %}selected{% endif %}>Amount</option>
                </select>
            </div>
            <div class=\"col-md-2\">
                <label for=\"order\" class=\"form-label\">Order</label>
                <select name=\"order\" id=\"order\" class=\"form-select\">
                    <option value=\"asc\" {% if order == 'asc' %}selected{% endif %}>Ascending</option>
                    <option value=\"desc\" {% if order == 'desc' %}selected{% endif %}>Descending</option>
                </select>
            </div>
            <div class=\"col-md-3\">
                <button type=\"submit\" class=\"btn btn-primary me-2\">
                    <i class=\"bi bi-search me-1\"></i> Apply
                </button>
                <a href=\"{{ path('app_commande_index') }}\" class=\"btn btn-outline-secondary\">
                    <i class=\"bi bi-x-lg me-1\"></i> Reset
                </a>
            </div>
        </form>
    </div>
</div>

{% if commandes is empty %}
<div class=\"card\">
    <div class=\"card-body text-center py-5\">
        <i class=\"bi bi-cart-x\" style=\"font-size: 3rem; color: #94a3b8;\"></i>
        <h5 class=\"mt-3 text-muted\">No orders found</h5>
        {% if search or statut %}
        <p class=\"text-muted\">No orders match your search criteria.</p>
        {% else %}
        <p class=\"text-muted\">{% if canManageOrders %}Orders will appear here when customers place them.{% elseif isSupplier %}Orders containing your catalog products will appear here once clients confirm them.{% else %}Start by adding products to your current order from a product page.{% endif %}</p>
        {% endif %}
        <a href=\"{{ path(isBuyer ? 'app_produit_index' : 'app_commande_index') }}\" class=\"btn btn-primary mt-2\">
            <i class=\"bi {{ isBuyer ? 'bi-grid' : 'bi-cart3' }} me-1\"></i> {{ isBuyer ? 'Browse Products' : 'Refresh Orders' }}
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
                        <th>Order #</th>
                        <th>Client</th>
                        <th>Date</th>
                        <th>Items</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Delivery</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                {% for commande in commandes %}
                    <tr>
                        <td><strong>#{{ commande.numeroCommande }}</strong></td>
                        <td>
                            <div class=\"d-flex align-items-center\">
                                <div class=\"user-avatar me-2\" style=\"width: 32px; height: 32px; font-size: 0.75rem;\">{{ commande.clientDisplayName|first|upper }}</div>
                                {{ commande.clientDisplayName }}
                            </div>
                        </td>
                        <td>{{ commande.dateCommande|date('Y-m-d') }}</td>
                        <td>{{ commande.totalItems }}</td>
                        <td><strong>{{ commande.montantTotal|number_format(2, '.', ',') }} TND</strong></td>
                        <td>
                            {% if commande.statut == 'En attente' %}
                            <span class=\"badge badge-status-pending\"><i class=\"bi bi-clock me-1\"></i>{{ commande.statut }}</span>
                            {% elseif commande.statut == 'Confirmee' %}
                            <span class=\"badge badge-status-confirmed\"><i class=\"bi bi-check-circle me-1\"></i>{{ commande.statut }}</span>
                            {% else %}
                            <span class=\"badge badge-status-cancelled\"><i class=\"bi bi-x-circle me-1\"></i>{{ commande.statut }}</span>
                            {% endif %}
                        </td>
                        <td>
                            {% if commande.livraison %}
                            <span class=\"badge bg-success\"><i class=\"bi bi-truck me-1\"></i>Assigned</span>
                            {% else %}
                            <span class=\"badge bg-secondary\">Not assigned</span>
                            {% endif %}
                        </td>
                        <td>
                            <div class=\"btn-group\" role=\"group\">
                                <a href=\"{{ path('app_commande_show', {'id': commande.idCommande}) }}\" class=\"btn btn-outline-secondary btn-sm\">
                                    <i class=\"bi bi-eye\"></i>
                                </a>
                                {% if isSupplier %}
                                    {% if commande.livraison %}
                                    <a href=\"{{ path('app_livraison_edit', {'id': commande.livraison.idLivraison}) }}\" class=\"btn btn-outline-primary btn-sm\">
                                        <i class=\"bi bi-truck\"></i>
                                    </a>
                                    {% else %}
                                    <a href=\"{{ path('app_livraison_new', {'commandeId': commande.idCommande}) }}\" class=\"btn btn-outline-primary btn-sm\">
                                        <i class=\"bi bi-truck\"></i>
                                    </a>
                                    {% endif %}
                                {% endif %}
                                {% if canManageOrders %}
                                <a href=\"{{ path('app_commande_edit', {'id': commande.idCommande}) }}\" class=\"btn btn-outline-primary btn-sm\">
                                    <i class=\"bi bi-pencil\"></i>
                                </a>
                                <form action=\"{{ path('app_commande_delete', {'id': commande.idCommande}) }}\" method=\"post\" class=\"d-inline\" novalidate>
                                    <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ commande.idCommande) }}\">
                                    <button type=\"submit\" class=\"btn btn-outline-danger btn-sm\">
                                        <i class=\"bi bi-trash\"></i>
                                    </button>
                                </form>
                                {% endif %}
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
", "commande/index.html.twig", "C:\\Users\\Skaina\\Desktop\\final version symfony\\Marketplace-Project\\web\\templates\\commande\\index.html.twig");
    }
}
