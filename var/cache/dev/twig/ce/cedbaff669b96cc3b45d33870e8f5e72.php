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

/* commande/show.html.twig */
class __TwigTemplate_3208117568c69f37550725d4ef84c022 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "commande/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "commande/show.html.twig"));

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

        yield "Order #";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 3, $this->source); })()), "numeroCommande", [], "any", false, false, false, 3), "html", null, true);
        
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
<li class=\"breadcrumb-item active\">Order #";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 7, $this->source); })()), "numeroCommande", [], "any", false, false, false, 7), "html", null, true);
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
        $context["canLeaveFeedback"] = ((((($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_CLIENT") && CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 11, $this->source); })()), "clientUser", [], "any", false, false, false, 11)) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 11, $this->source); })()), "user", [], "any", false, false, false, 11)) && (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 11, $this->source); })()), "clientUser", [], "any", false, false, false, 11), "id", [], "any", false, false, false, 11) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 11, $this->source); })()), "user", [], "any", false, false, false, 11), "id", [], "any", false, false, false, 11))) && (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 11, $this->source); })())) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 11, $this->source); })()), "statutLivraison", [], "any", false, false, false, 11) == "Livree"));
        // line 12
        $context["canLeaveDeliveryFeedback"] = (((isset($context["canLeaveFeedback"]) || array_key_exists("canLeaveFeedback", $context) ? $context["canLeaveFeedback"] : (function () { throw new RuntimeError('Variable "canLeaveFeedback" does not exist.', 12, $this->source); })()) && (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 12, $this->source); })())) &&  !CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 12, $this->source); })()), "feedback", [], "any", false, false, false, 12));
        // line 13
        yield "<div class=\"page-header d-flex justify-content-between align-items-center\">
    <div>
        <h1><i class=\"bi bi-cart3 me-2\"></i>Order #";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 15, $this->source); })()), "numeroCommande", [], "any", false, false, false, 15), "html", null, true);
        yield "</h1>
        <p>Order details and delivery information</p>
    </div>
    <div class=\"d-flex gap-2\">
        ";
        // line 19
        if ((($tmp = (isset($context["canManageOrder"]) || array_key_exists("canManageOrder", $context) ? $context["canManageOrder"] : (function () { throw new RuntimeError('Variable "canManageOrder" does not exist.', 19, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 20
            yield "        <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_commande_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 20, $this->source); })()), "idCommande", [], "any", false, false, false, 20)]), "html", null, true);
            yield "\" class=\"btn btn-primary\">
            <i class=\"bi bi-pencil me-1\"></i> Edit
        </a>
        ";
        }
        // line 24
        yield "        <a href=\"";
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_commande_index");
        yield "\" class=\"btn btn-outline-secondary\">
            <i class=\"bi bi-arrow-left me-1\"></i> Back
        </a>
    </div>
</div>

<div class=\"row\">
    <div class=\"col-lg-6 mb-4\">
        <div class=\"card h-100\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\"><i class=\"bi bi-receipt me-2\"></i>Order Information</h5>
            </div>
            <div class=\"card-body\">
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Order Number</div>
                    <div class=\"col-sm-8 fw-medium\">#";
        // line 39
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 39, $this->source); })()), "numeroCommande", [], "any", false, false, false, 39), "html", null, true);
        yield "</div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Client</div>
                    <div class=\"col-sm-8\">
                        <div class=\"d-flex align-items-center\">
                            <div class=\"user-avatar me-2\" style=\"width: 32px; height: 32px; font-size: 0.75rem;\">";
        // line 45
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 45, $this->source); })()), "clientDisplayName", [], "any", false, false, false, 45))), "html", null, true);
        yield "</div>
                            <strong>";
        // line 46
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 46, $this->source); })()), "clientDisplayName", [], "any", false, false, false, 46), "html", null, true);
        yield "</strong>
                        </div>
                    </div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Order Date</div>
                    <div class=\"col-sm-8 fw-medium\">
                        <i class=\"bi bi-calendar3 me-1\"></i>";
        // line 53
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 53, $this->source); })()), "dateCommande", [], "any", false, false, false, 53), "Y-m-d"), "html", null, true);
        yield "
                    </div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">";
        // line 57
        yield (((($tmp = (isset($context["isSupplierView"]) || array_key_exists("isSupplierView", $context) ? $context["isSupplierView"] : (function () { throw new RuntimeError('Variable "isSupplierView" does not exist.', 57, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Visible Amount") : ("Total Amount"));
        yield "</div>
                    <div class=\"col-sm-8\">
                        <span class=\"h4 text-primary mb-0\">";
        // line 59
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber((((($tmp = (isset($context["isSupplierView"]) || array_key_exists("isSupplierView", $context) ? $context["isSupplierView"] : (function () { throw new RuntimeError('Variable "isSupplierView" does not exist.', 59, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ((isset($context["visibleMontantTotal"]) || array_key_exists("visibleMontantTotal", $context) ? $context["visibleMontantTotal"] : (function () { throw new RuntimeError('Variable "visibleMontantTotal" does not exist.', 59, $this->source); })())) : (CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 59, $this->source); })()), "montantTotal", [], "any", false, false, false, 59))), 2, ".", ","), "html", null, true);
        yield " TND</span>
                    </div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">";
        // line 63
        yield (((($tmp = (isset($context["isSupplierView"]) || array_key_exists("isSupplierView", $context) ? $context["isSupplierView"] : (function () { throw new RuntimeError('Variable "isSupplierView" does not exist.', 63, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Visible Items") : ("Items"));
        yield "</div>
                    <div class=\"col-sm-8 fw-medium\">";
        // line 64
        yield (((($tmp = (isset($context["isSupplierView"]) || array_key_exists("isSupplierView", $context) ? $context["isSupplierView"] : (function () { throw new RuntimeError('Variable "isSupplierView" does not exist.', 64, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["visibleItemsTotal"]) || array_key_exists("visibleItemsTotal", $context) ? $context["visibleItemsTotal"] : (function () { throw new RuntimeError('Variable "visibleItemsTotal" does not exist.', 64, $this->source); })()), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 64, $this->source); })()), "totalItems", [], "any", false, false, false, 64), "html", null, true)));
        yield "</div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Status</div>
                    <div class=\"col-sm-8\">
                        ";
        // line 69
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 69, $this->source); })()), "statut", [], "any", false, false, false, 69) == "En attente")) {
            // line 70
            yield "                        <span class=\"badge badge-status-pending fs-6\"><i class=\"bi bi-clock me-1\"></i>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 70, $this->source); })()), "statut", [], "any", false, false, false, 70), "html", null, true);
            yield "</span>
                        ";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source,         // line 71
(isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 71, $this->source); })()), "statut", [], "any", false, false, false, 71) == "Confirmee")) {
            // line 72
            yield "                        <span class=\"badge badge-status-confirmed fs-6\"><i class=\"bi bi-check-circle me-1\"></i>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 72, $this->source); })()), "statut", [], "any", false, false, false, 72), "html", null, true);
            yield "</span>
                        ";
        } else {
            // line 74
            yield "                        <span class=\"badge badge-status-cancelled fs-6\"><i class=\"bi bi-x-circle me-1\"></i>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 74, $this->source); })()), "statut", [], "any", false, false, false, 74), "html", null, true);
            yield "</span>
                        ";
        }
        // line 76
        yield "                    </div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Governorate</div>
                    <div class=\"col-sm-8 fw-medium\">";
        // line 80
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["commande"] ?? null), "gouvernorat", [], "any", true, true, false, 80) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 80, $this->source); })()), "gouvernorat", [], "any", false, false, false, 80)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 80, $this->source); })()), "gouvernorat", [], "any", false, false, false, 80), "html", null, true)) : ("-"));
        yield "</div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Delivery Phone</div>
                    <div class=\"col-sm-8 fw-medium\">";
        // line 84
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["commande"] ?? null), "telephoneLivraison", [], "any", true, true, false, 84) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 84, $this->source); })()), "telephoneLivraison", [], "any", false, false, false, 84)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 84, $this->source); })()), "telephoneLivraison", [], "any", false, false, false, 84), "html", null, true)) : ("-"));
        yield "</div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Delivery Address</div>
                    <div class=\"col-sm-8 fw-medium\">
                        <i class=\"bi bi-geo-alt text-primary me-1\"></i>";
        // line 89
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 89, $this->source); })()), "adresseLivraison", [], "any", false, false, false, 89), "html", null, true);
        yield "
                    </div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Delivery Comment</div>
                    <div class=\"col-sm-8 fw-medium\">";
        // line 94
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 94, $this->source); })()), "commentaireLivraison", [], "any", false, false, false, 94)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 94, $this->source); })()), "commentaireLivraison", [], "any", false, false, false, 94), "html", null, true))) : ("-"));
        yield "</div>
                </div>
            </div>
        </div>
    </div>
    
    <div class=\"col-lg-6 mb-4\">
        <div class=\"card h-100\">
            <div class=\"card-header d-flex justify-content-between align-items-center\">
                <h5 class=\"mb-0\"><i class=\"bi bi-truck me-2\"></i>Delivery Information</h5>
                ";
        // line 104
        if (((isset($context["canManageDelivery"]) || array_key_exists("canManageDelivery", $context) ? $context["canManageDelivery"] : (function () { throw new RuntimeError('Variable "canManageDelivery" does not exist.', 104, $this->source); })()) && (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 104, $this->source); })()))) {
            // line 105
            yield "                ";
            if ((($tmp = (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 105, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 106
                yield "                <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_livraison_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 106, $this->source); })()), "idLivraison", [], "any", false, false, false, 106)]), "html", null, true);
                yield "\" class=\"btn btn-sm btn-outline-primary\">
                    <i class=\"bi bi-pencil me-1\"></i> Edit
                </a>
                ";
            }
            // line 110
            yield "                ";
        }
        // line 111
        yield "            </div>
            <div class=\"card-body\">
                ";
        // line 113
        if ((($tmp = (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 113, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 114
            yield "                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">BL Number</div>
                    <div class=\"col-sm-8 fw-medium\">#";
            // line 116
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 116, $this->source); })()), "numeroBL", [], "any", false, false, false, 116), "html", null, true);
            yield "</div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Delivery Date</div>
                    <div class=\"col-sm-8 fw-medium\">
                        <i class=\"bi bi-calendar3 me-1\"></i>";
            // line 121
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 121, $this->source); })()), "dateLivraison", [], "any", false, false, false, 121), "Y-m-d"), "html", null, true);
            yield "
                    </div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Driver</div>
                    <div class=\"col-sm-8 fw-medium\">
                        <i class=\"bi bi-person me-1\"></i>";
            // line 127
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 127, $this->source); })()), "livreur", [], "any", false, false, false, 127), "html", null, true);
            yield "
                    </div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Status</div>
                    <div class=\"col-sm-8\">
                        ";
            // line 133
            if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 133, $this->source); })()), "statutLivraison", [], "any", false, false, false, 133) == "En cours")) {
                // line 134
                yield "                        <span class=\"badge badge-status-progress fs-6\"><i class=\"bi bi-truck me-1\"></i>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 134, $this->source); })()), "statutLivraison", [], "any", false, false, false, 134), "html", null, true);
                yield "</span>
                        ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 135
(isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 135, $this->source); })()), "statutLivraison", [], "any", false, false, false, 135) == "Livree")) {
                // line 136
                yield "                        <span class=\"badge badge-status-delivered fs-6\"><i class=\"bi bi-check-circle me-1\"></i>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 136, $this->source); })()), "statutLivraison", [], "any", false, false, false, 136), "html", null, true);
                yield "</span>
                        ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 137
(isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 137, $this->source); })()), "statutLivraison", [], "any", false, false, false, 137) == "Retardee")) {
                // line 138
                yield "                        <span class=\"badge badge-status-delayed fs-6\"><i class=\"bi bi-exclamation-triangle me-1\"></i>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 138, $this->source); })()), "statutLivraison", [], "any", false, false, false, 138), "html", null, true);
                yield "</span>
                        ";
            } else {
                // line 140
                yield "                        <span class=\"badge bg-secondary fs-6\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 140, $this->source); })()), "statutLivraison", [], "any", false, false, false, 140), "html", null, true);
                yield "</span>
                        ";
            }
            // line 142
            yield "                    </div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Notes</div>
                    <div class=\"col-sm-8\">";
            // line 146
            yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["livraison"] ?? null), "noteDelivery", [], "any", true, true, false, 146) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 146, $this->source); })()), "noteDelivery", [], "any", false, false, false, 146)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 146, $this->source); })()), "noteDelivery", [], "any", false, false, false, 146), "html", null, true)) : ("-"));
            yield "</div>
                </div>
                ";
            // line 148
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 148, $this->source); })()), "hasLocation", [], "any", false, false, false, 148)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 149
                yield "                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">GPS Location</div>
                    <div class=\"col-sm-8\">
                        <i class=\"bi bi-geo-alt text-primary me-1\"></i>";
                // line 152
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 152, $this->source); })()), "latitude", [], "any", false, false, false, 152), "html", null, true);
                yield ", ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 152, $this->source); })()), "longitude", [], "any", false, false, false, 152), "html", null, true);
                yield "
                    </div>
                </div>
                ";
            }
            // line 156
            yield "                
                <hr class=\"my-3\">

                ";
            // line 159
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 159, $this->source); })()), "feedback", [], "any", false, false, false, 159)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 160
                yield "                <div class=\"mb-3\">
                    <a href=\"";
                // line 161
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_feedback_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 161, $this->source); })()), "feedback", [], "any", false, false, false, 161), "id", [], "any", false, false, false, 161)]), "html", null, true);
                yield "\" class=\"btn btn-outline-secondary btn-sm\">
                        <i class=\"bi bi-chat-left-text me-1\"></i> View Driver Feedback
                    </a>
                </div>
                ";
            } elseif ((($tmp =             // line 165
(isset($context["canLeaveDeliveryFeedback"]) || array_key_exists("canLeaveDeliveryFeedback", $context) ? $context["canLeaveDeliveryFeedback"] : (function () { throw new RuntimeError('Variable "canLeaveDeliveryFeedback" does not exist.', 165, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 166
                yield "                <div class=\"mb-3\">
                    <a href=\"";
                // line 167
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_feedback_delivery_new", ["livraisonId" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 167, $this->source); })()), "idLivraison", [], "any", false, false, false, 167)]), "html", null, true);
                yield "\" class=\"btn btn-outline-primary btn-sm\">
                        <i class=\"bi bi-truck-front me-1\"></i> Rate Delivery Driver
                    </a>
                </div>
                ";
            }
            // line 172
            yield "                 
                ";
            // line 173
            if ((($tmp = (isset($context["canManageDelivery"]) || array_key_exists("canManageDelivery", $context) ? $context["canManageDelivery"] : (function () { throw new RuntimeError('Variable "canManageDelivery" does not exist.', 173, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 174
                yield "                <form action=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_livraison_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 174, $this->source); })()), "idLivraison", [], "any", false, false, false, 174)]), "html", null, true);
                yield "\" method=\"post\" class=\"d-inline\" novalidate>
                    <input type=\"hidden\" name=\"_token\" value=\"";
                // line 175
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 175, $this->source); })()), "idLivraison", [], "any", false, false, false, 175))), "html", null, true);
                yield "\">
                    <button type=\"submit\" class=\"btn btn-outline-danger btn-sm\">
                        <i class=\"bi bi-trash me-1\"></i> Delete Delivery
                    </button>
                </form>
                ";
            }
            // line 181
            yield "                ";
        } else {
            // line 182
            yield "                <div class=\"text-center py-4\">
                    <i class=\"bi bi-truck\" style=\"font-size: 3rem; color: #cbd5e1;\"></i>
                    <p class=\"text-muted mt-3\">No delivery assigned yet.</p>
                    ";
            // line 185
            if ((($tmp = (isset($context["canManageDelivery"]) || array_key_exists("canManageDelivery", $context) ? $context["canManageDelivery"] : (function () { throw new RuntimeError('Variable "canManageDelivery" does not exist.', 185, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 186
                yield "                    <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_livraison_new", ["commandeId" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 186, $this->source); })()), "idCommande", [], "any", false, false, false, 186)]), "html", null, true);
                yield "\" class=\"btn btn-primary\">
                        <i class=\"bi bi-plus-lg me-1\"></i> Add Delivery
                    </a>
                    ";
            }
            // line 190
            yield "                </div>
                ";
        }
        // line 192
        yield "            </div>
        </div>
    </div>
</div>

<div class=\"card mb-4\">
    <div class=\"card-header\">
        <h5 class=\"mb-0\"><i class=\"bi bi-bag me-2\"></i>";
        // line 199
        yield (((($tmp = (isset($context["isSupplierView"]) || array_key_exists("isSupplierView", $context) ? $context["isSupplierView"] : (function () { throw new RuntimeError('Variable "isSupplierView" does not exist.', 199, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Products From Your Catalog") : ("Purchased Products"));
        yield "</h5>
    </div>
    <div class=\"card-body p-0\">
        ";
        // line 202
        if ((($tmp = (isset($context["isSupplierView"]) || array_key_exists("isSupplierView", $context) ? $context["isSupplierView"] : (function () { throw new RuntimeError('Variable "isSupplierView" does not exist.', 202, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 203
            yield "        <div class=\"px-3 pt-3 text-muted small\">This view only shows the products from your catalogue that are included in this customer order.</div>
        ";
        }
        // line 205
        yield "        <div class=\"table-responsive\">
            <table class=\"table mb-0 align-middle\">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Subtotal</th>
                        <th>Feedback</th>
                    </tr>
                </thead>
                <tbody>
                    ";
        // line 217
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["visibleLignesCommande"]) || array_key_exists("visibleLignesCommande", $context) ? $context["visibleLignesCommande"] : (function () { throw new RuntimeError('Variable "visibleLignesCommande" does not exist.', 217, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["ligne"]) {
            // line 218
            yield "                    <tr>
                        <td>
                            <a href=\"";
            // line 220
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["ligne"], "produit", [], "any", false, false, false, 220), "id", [], "any", false, false, false, 220)]), "html", null, true);
            yield "\" class=\"text-decoration-none fw-semibold\">
                                ";
            // line 221
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["ligne"], "produit", [], "any", false, false, false, 221), "nomProduit", [], "any", false, false, false, 221), "html", null, true);
            yield "
                            </a>
                        </td>
                        <td>";
            // line 224
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["ligne"], "quantite", [], "any", false, false, false, 224), "html", null, true);
            yield "</td>
                        <td>";
            // line 225
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["ligne"], "prixUnitaire", [], "any", false, false, false, 225), 2, ".", ","), "html", null, true);
            yield " TND</td>
                        <td>";
            // line 226
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["ligne"], "sousTotal", [], "any", false, false, false, 226), 2, ".", ","), "html", null, true);
            yield " TND</td>
                        <td>
                            ";
            // line 228
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["ligne"], "feedback", [], "any", false, false, false, 228)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 229
                yield "                            <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_feedback_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["ligne"], "feedback", [], "any", false, false, false, 229), "id", [], "any", false, false, false, 229)]), "html", null, true);
                yield "\" class=\"btn btn-outline-secondary btn-sm\">
                                <i class=\"bi bi-eye me-1\"></i> View Feedback
                            </a>
                            ";
            } elseif ((($tmp =             // line 232
(isset($context["canLeaveFeedback"]) || array_key_exists("canLeaveFeedback", $context) ? $context["canLeaveFeedback"] : (function () { throw new RuntimeError('Variable "canLeaveFeedback" does not exist.', 232, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 233
                yield "                            <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_feedback_new", ["ligneCommandeId" => CoreExtension::getAttribute($this->env, $this->source, $context["ligne"], "id", [], "any", false, false, false, 233)]), "html", null, true);
                yield "\" class=\"btn btn-outline-primary btn-sm\">
                                <i class=\"bi bi-chat-heart me-1\"></i> Leave Feedback
                            </a>
                            ";
            } else {
                // line 237
                yield "                            <span class=\"text-muted small\">Feedback becomes available once the order is marked as delivered.</span>
                            ";
            }
            // line 239
            yield "                        </td>
                    </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['ligne'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 242
        yield "                </tbody>
            </table>
        </div>
    </div>
</div>

";
        // line 248
        if ((($tmp = (isset($context["canManageOrder"]) || array_key_exists("canManageOrder", $context) ? $context["canManageOrder"] : (function () { throw new RuntimeError('Variable "canManageOrder" does not exist.', 248, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 249
            yield "<div class=\"card\">
    <div class=\"card-header\">
        <h5 class=\"mb-0\"><i class=\"bi bi-trash me-2 text-danger\"></i>Danger Zone</h5>
    </div>
    <div class=\"card-body\">
        <p class=\"text-muted mb-3\">Deleting this order will permanently remove it and all associated delivery data.</p>
        <form action=\"";
            // line 255
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_commande_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 255, $this->source); })()), "idCommande", [], "any", false, false, false, 255)]), "html", null, true);
            yield "\" method=\"post\" novalidate>
            <input type=\"hidden\" name=\"_token\" value=\"";
            // line 256
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 256, $this->source); })()), "idCommande", [], "any", false, false, false, 256))), "html", null, true);
            yield "\">
            <button type=\"submit\" class=\"btn btn-outline-danger\">
                <i class=\"bi bi-trash me-1\"></i> Delete Order
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
        return "commande/show.html.twig";
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
        return array (  591 => 256,  587 => 255,  579 => 249,  577 => 248,  569 => 242,  561 => 239,  557 => 237,  549 => 233,  547 => 232,  540 => 229,  538 => 228,  533 => 226,  529 => 225,  525 => 224,  519 => 221,  515 => 220,  511 => 218,  507 => 217,  493 => 205,  489 => 203,  487 => 202,  481 => 199,  472 => 192,  468 => 190,  460 => 186,  458 => 185,  453 => 182,  450 => 181,  441 => 175,  436 => 174,  434 => 173,  431 => 172,  423 => 167,  420 => 166,  418 => 165,  411 => 161,  408 => 160,  406 => 159,  401 => 156,  392 => 152,  387 => 149,  385 => 148,  380 => 146,  374 => 142,  368 => 140,  362 => 138,  360 => 137,  355 => 136,  353 => 135,  348 => 134,  346 => 133,  337 => 127,  328 => 121,  320 => 116,  316 => 114,  314 => 113,  310 => 111,  307 => 110,  299 => 106,  296 => 105,  294 => 104,  281 => 94,  273 => 89,  265 => 84,  258 => 80,  252 => 76,  246 => 74,  240 => 72,  238 => 71,  233 => 70,  231 => 69,  223 => 64,  219 => 63,  212 => 59,  207 => 57,  200 => 53,  190 => 46,  186 => 45,  177 => 39,  158 => 24,  150 => 20,  148 => 19,  141 => 15,  137 => 13,  135 => 12,  133 => 11,  120 => 10,  107 => 7,  102 => 6,  89 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Order #{{ commande.numeroCommande }}{% endblock %}

{% block breadcrumb %}
<li class=\"breadcrumb-item\"><a href=\"{{ path('app_commande_index') }}\">Orders</a></li>
<li class=\"breadcrumb-item active\">Order #{{ commande.numeroCommande }}</li>
{% endblock %}

{% block body %}
{% set canLeaveFeedback = is_granted('ROLE_CLIENT') and commande.clientUser and app.user and commande.clientUser.id == app.user.id and livraison and livraison.statutLivraison == 'Livree' %}
{% set canLeaveDeliveryFeedback = canLeaveFeedback and livraison and not livraison.feedback %}
<div class=\"page-header d-flex justify-content-between align-items-center\">
    <div>
        <h1><i class=\"bi bi-cart3 me-2\"></i>Order #{{ commande.numeroCommande }}</h1>
        <p>Order details and delivery information</p>
    </div>
    <div class=\"d-flex gap-2\">
        {% if canManageOrder %}
        <a href=\"{{ path('app_commande_edit', {'id': commande.idCommande}) }}\" class=\"btn btn-primary\">
            <i class=\"bi bi-pencil me-1\"></i> Edit
        </a>
        {% endif %}
        <a href=\"{{ path('app_commande_index') }}\" class=\"btn btn-outline-secondary\">
            <i class=\"bi bi-arrow-left me-1\"></i> Back
        </a>
    </div>
</div>

<div class=\"row\">
    <div class=\"col-lg-6 mb-4\">
        <div class=\"card h-100\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\"><i class=\"bi bi-receipt me-2\"></i>Order Information</h5>
            </div>
            <div class=\"card-body\">
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Order Number</div>
                    <div class=\"col-sm-8 fw-medium\">#{{ commande.numeroCommande }}</div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Client</div>
                    <div class=\"col-sm-8\">
                        <div class=\"d-flex align-items-center\">
                            <div class=\"user-avatar me-2\" style=\"width: 32px; height: 32px; font-size: 0.75rem;\">{{ commande.clientDisplayName|first|upper }}</div>
                            <strong>{{ commande.clientDisplayName }}</strong>
                        </div>
                    </div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Order Date</div>
                    <div class=\"col-sm-8 fw-medium\">
                        <i class=\"bi bi-calendar3 me-1\"></i>{{ commande.dateCommande|date('Y-m-d') }}
                    </div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">{{ isSupplierView ? 'Visible Amount' : 'Total Amount' }}</div>
                    <div class=\"col-sm-8\">
                        <span class=\"h4 text-primary mb-0\">{{ (isSupplierView ? visibleMontantTotal : commande.montantTotal)|number_format(2, '.', ',') }} TND</span>
                    </div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">{{ isSupplierView ? 'Visible Items' : 'Items' }}</div>
                    <div class=\"col-sm-8 fw-medium\">{{ isSupplierView ? visibleItemsTotal : commande.totalItems }}</div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Status</div>
                    <div class=\"col-sm-8\">
                        {% if commande.statut == 'En attente' %}
                        <span class=\"badge badge-status-pending fs-6\"><i class=\"bi bi-clock me-1\"></i>{{ commande.statut }}</span>
                        {% elseif commande.statut == 'Confirmee' %}
                        <span class=\"badge badge-status-confirmed fs-6\"><i class=\"bi bi-check-circle me-1\"></i>{{ commande.statut }}</span>
                        {% else %}
                        <span class=\"badge badge-status-cancelled fs-6\"><i class=\"bi bi-x-circle me-1\"></i>{{ commande.statut }}</span>
                        {% endif %}
                    </div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Governorate</div>
                    <div class=\"col-sm-8 fw-medium\">{{ commande.gouvernorat ?? '-' }}</div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Delivery Phone</div>
                    <div class=\"col-sm-8 fw-medium\">{{ commande.telephoneLivraison ?? '-' }}</div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Delivery Address</div>
                    <div class=\"col-sm-8 fw-medium\">
                        <i class=\"bi bi-geo-alt text-primary me-1\"></i>{{ commande.adresseLivraison }}
                    </div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Delivery Comment</div>
                    <div class=\"col-sm-8 fw-medium\">{{ commande.commentaireLivraison ? commande.commentaireLivraison|nl2br : '-' }}</div>
                </div>
            </div>
        </div>
    </div>
    
    <div class=\"col-lg-6 mb-4\">
        <div class=\"card h-100\">
            <div class=\"card-header d-flex justify-content-between align-items-center\">
                <h5 class=\"mb-0\"><i class=\"bi bi-truck me-2\"></i>Delivery Information</h5>
                {% if canManageDelivery and livraison %}
                {% if livraison %}
                <a href=\"{{ path('app_livraison_edit', {'id': livraison.idLivraison}) }}\" class=\"btn btn-sm btn-outline-primary\">
                    <i class=\"bi bi-pencil me-1\"></i> Edit
                </a>
                {% endif %}
                {% endif %}
            </div>
            <div class=\"card-body\">
                {% if livraison %}
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">BL Number</div>
                    <div class=\"col-sm-8 fw-medium\">#{{ livraison.numeroBL }}</div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Delivery Date</div>
                    <div class=\"col-sm-8 fw-medium\">
                        <i class=\"bi bi-calendar3 me-1\"></i>{{ livraison.dateLivraison|date('Y-m-d') }}
                    </div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Driver</div>
                    <div class=\"col-sm-8 fw-medium\">
                        <i class=\"bi bi-person me-1\"></i>{{ livraison.livreur }}
                    </div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Status</div>
                    <div class=\"col-sm-8\">
                        {% if livraison.statutLivraison == 'En cours' %}
                        <span class=\"badge badge-status-progress fs-6\"><i class=\"bi bi-truck me-1\"></i>{{ livraison.statutLivraison }}</span>
                        {% elseif livraison.statutLivraison == 'Livree' %}
                        <span class=\"badge badge-status-delivered fs-6\"><i class=\"bi bi-check-circle me-1\"></i>{{ livraison.statutLivraison }}</span>
                        {% elseif livraison.statutLivraison == 'Retardee' %}
                        <span class=\"badge badge-status-delayed fs-6\"><i class=\"bi bi-exclamation-triangle me-1\"></i>{{ livraison.statutLivraison }}</span>
                        {% else %}
                        <span class=\"badge bg-secondary fs-6\">{{ livraison.statutLivraison }}</span>
                        {% endif %}
                    </div>
                </div>
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">Notes</div>
                    <div class=\"col-sm-8\">{{ livraison.noteDelivery ?? '-' }}</div>
                </div>
                {% if livraison.hasLocation %}
                <div class=\"row mb-3\">
                    <div class=\"col-sm-4 text-muted\">GPS Location</div>
                    <div class=\"col-sm-8\">
                        <i class=\"bi bi-geo-alt text-primary me-1\"></i>{{ livraison.latitude }}, {{ livraison.longitude }}
                    </div>
                </div>
                {% endif %}
                
                <hr class=\"my-3\">

                {% if livraison.feedback %}
                <div class=\"mb-3\">
                    <a href=\"{{ path('app_feedback_show', {'id': livraison.feedback.id}) }}\" class=\"btn btn-outline-secondary btn-sm\">
                        <i class=\"bi bi-chat-left-text me-1\"></i> View Driver Feedback
                    </a>
                </div>
                {% elseif canLeaveDeliveryFeedback %}
                <div class=\"mb-3\">
                    <a href=\"{{ path('app_feedback_delivery_new', {'livraisonId': livraison.idLivraison}) }}\" class=\"btn btn-outline-primary btn-sm\">
                        <i class=\"bi bi-truck-front me-1\"></i> Rate Delivery Driver
                    </a>
                </div>
                {% endif %}
                 
                {% if canManageDelivery %}
                <form action=\"{{ path('app_livraison_delete', {'id': livraison.idLivraison}) }}\" method=\"post\" class=\"d-inline\" novalidate>
                    <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ livraison.idLivraison) }}\">
                    <button type=\"submit\" class=\"btn btn-outline-danger btn-sm\">
                        <i class=\"bi bi-trash me-1\"></i> Delete Delivery
                    </button>
                </form>
                {% endif %}
                {% else %}
                <div class=\"text-center py-4\">
                    <i class=\"bi bi-truck\" style=\"font-size: 3rem; color: #cbd5e1;\"></i>
                    <p class=\"text-muted mt-3\">No delivery assigned yet.</p>
                    {% if canManageDelivery %}
                    <a href=\"{{ path('app_livraison_new', {'commandeId': commande.idCommande}) }}\" class=\"btn btn-primary\">
                        <i class=\"bi bi-plus-lg me-1\"></i> Add Delivery
                    </a>
                    {% endif %}
                </div>
                {% endif %}
            </div>
        </div>
    </div>
</div>

<div class=\"card mb-4\">
    <div class=\"card-header\">
        <h5 class=\"mb-0\"><i class=\"bi bi-bag me-2\"></i>{{ isSupplierView ? 'Products From Your Catalog' : 'Purchased Products' }}</h5>
    </div>
    <div class=\"card-body p-0\">
        {% if isSupplierView %}
        <div class=\"px-3 pt-3 text-muted small\">This view only shows the products from your catalogue that are included in this customer order.</div>
        {% endif %}
        <div class=\"table-responsive\">
            <table class=\"table mb-0 align-middle\">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Subtotal</th>
                        <th>Feedback</th>
                    </tr>
                </thead>
                <tbody>
                    {% for ligne in visibleLignesCommande %}
                    <tr>
                        <td>
                            <a href=\"{{ path('app_produit_show', {'id': ligne.produit.id}) }}\" class=\"text-decoration-none fw-semibold\">
                                {{ ligne.produit.nomProduit }}
                            </a>
                        </td>
                        <td>{{ ligne.quantite }}</td>
                        <td>{{ ligne.prixUnitaire|number_format(2, '.', ',') }} TND</td>
                        <td>{{ ligne.sousTotal|number_format(2, '.', ',') }} TND</td>
                        <td>
                            {% if ligne.feedback %}
                            <a href=\"{{ path('app_feedback_show', {'id': ligne.feedback.id}) }}\" class=\"btn btn-outline-secondary btn-sm\">
                                <i class=\"bi bi-eye me-1\"></i> View Feedback
                            </a>
                            {% elseif canLeaveFeedback %}
                            <a href=\"{{ path('app_feedback_new', {'ligneCommandeId': ligne.id}) }}\" class=\"btn btn-outline-primary btn-sm\">
                                <i class=\"bi bi-chat-heart me-1\"></i> Leave Feedback
                            </a>
                            {% else %}
                            <span class=\"text-muted small\">Feedback becomes available once the order is marked as delivered.</span>
                            {% endif %}
                        </td>
                    </tr>
                    {% endfor %}
                </tbody>
            </table>
        </div>
    </div>
</div>

{% if canManageOrder %}
<div class=\"card\">
    <div class=\"card-header\">
        <h5 class=\"mb-0\"><i class=\"bi bi-trash me-2 text-danger\"></i>Danger Zone</h5>
    </div>
    <div class=\"card-body\">
        <p class=\"text-muted mb-3\">Deleting this order will permanently remove it and all associated delivery data.</p>
        <form action=\"{{ path('app_commande_delete', {'id': commande.idCommande}) }}\" method=\"post\" novalidate>
            <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ commande.idCommande) }}\">
            <button type=\"submit\" class=\"btn btn-outline-danger\">
                <i class=\"bi bi-trash me-1\"></i> Delete Order
            </button>
        </form>
    </div>
</div>
{% endif %}
{% endblock %}
", "commande/show.html.twig", "C:\\Users\\Skaina\\Desktop\\final version symfony\\Marketplace-Project\\web\\templates\\commande\\show.html.twig");
    }
}
