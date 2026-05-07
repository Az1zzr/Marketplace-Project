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

/* commande/edit.html.twig */
class __TwigTemplate_33d739b1c606cff11f600a6729f7ece9 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "commande/edit.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "commande/edit.html.twig"));

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

        yield "Edit Order #";
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
<li class=\"breadcrumb-item\"><a href=\"";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_commande_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 7, $this->source); })()), "idCommande", [], "any", false, false, false, 7)]), "html", null, true);
        yield "\">Order #";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 7, $this->source); })()), "numeroCommande", [], "any", false, false, false, 7), "html", null, true);
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
    <h1><i class=\"bi bi-pencil me-2\"></i>Edit Order</h1>
    <p>Update the delivery details and status for <strong>#";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 14, $this->source); })()), "numeroCommande", [], "any", false, false, false, 14), "html", null, true);
        yield "</strong></p>
</div>

<div class=\"row justify-content-center\">
    <div class=\"col-lg-8\">
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\"><i class=\"bi bi-cart3 me-2\"></i>Order Information</h5>
            </div>
            <div class=\"card-body\">
                ";
        // line 24
        $context["selectedGovernorate"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 24, $this->source); })()), "request", [], "any", false, false, false, 24), "request", [], "any", false, false, false, 24), "get", ["gouvernorat", (((CoreExtension::getAttribute($this->env, $this->source, ($context["commande"] ?? null), "gouvernorat", [], "any", true, true, false, 24) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 24, $this->source); })()), "gouvernorat", [], "any", false, false, false, 24)))) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 24, $this->source); })()), "gouvernorat", [], "any", false, false, false, 24)) : (""))], "method", false, false, false, 24);
        // line 25
        yield "                <form method=\"post\" novalidate>
                    <div class=\"mb-3\">
                        <div class=\"text-muted small\">Client</div>
                        <div class=\"fw-semibold\">";
        // line 28
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 28, $this->source); })()), "clientDisplayName", [], "any", false, false, false, 28), "html", null, true);
        yield "</div>
                    </div>

                    <div class=\"mb-3\">
                        <div class=\"text-muted small\">Total Amount</div>
                        <div class=\"fw-semibold\">";
        // line 33
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 33, $this->source); })()), "montantTotal", [], "any", false, false, false, 33), 2, ".", ","), "html", null, true);
        yield " TND</div>
                    </div>

                    <div class=\"row\">
                        <div class=\"col-md-12 mb-3\">
                            <label for=\"gouvernorat\" class=\"form-label\">Governorate In Tunisia</label>
                            <select name=\"gouvernorat\" id=\"gouvernorat\" class=\"form-select ";
        // line 39
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "gouvernorat", [], "array", true, true, false, 39)) {
            yield "is-invalid";
        }
        yield "\">
                                <option value=\"\">Choose your governorate</option>
                                ";
        // line 41
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["governorates"]) || array_key_exists("governorates", $context) ? $context["governorates"] : (function () { throw new RuntimeError('Variable "governorates" does not exist.', 41, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["governorate"]) {
            // line 42
            yield "                                <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["governorate"], "html", null, true);
            yield "\" ";
            if (((isset($context["selectedGovernorate"]) || array_key_exists("selectedGovernorate", $context) ? $context["selectedGovernorate"] : (function () { throw new RuntimeError('Variable "selectedGovernorate" does not exist.', 42, $this->source); })()) == $context["governorate"])) {
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
        // line 44
        yield "                            </select>
                            ";
        // line 45
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "gouvernorat", [], "array", true, true, false, 45)) {
            // line 46
            yield "                            <div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 46, $this->source); })()), "gouvernorat", [], "array", false, false, false, 46), "html", null, true);
            yield "</div>
                            ";
        }
        // line 48
        yield "                        </div>
                    </div>

                    <div class=\"mb-3\">
                        <label for=\"telephoneLivraison\" class=\"form-label\">Delivery Phone Number</label>
                        <input type=\"text\" name=\"telephoneLivraison\" id=\"telephoneLivraison\" class=\"form-control ";
        // line 53
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "telephoneLivraison", [], "array", true, true, false, 53)) {
            yield "is-invalid";
        }
        yield "\" value=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 53, $this->source); })()), "request", [], "any", false, false, false, 53), "request", [], "any", false, false, false, 53), "get", ["telephoneLivraison", CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 53, $this->source); })()), "telephoneLivraison", [], "any", false, false, false, 53)], "method", false, false, false, 53), "html", null, true);
        yield "\" placeholder=\"8 digits starting with 2, 5, or 9\">
                        ";
        // line 54
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "telephoneLivraison", [], "array", true, true, false, 54)) {
            // line 55
            yield "                        <div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 55, $this->source); })()), "telephoneLivraison", [], "array", false, false, false, 55), "html", null, true);
            yield "</div>
                        ";
        }
        // line 57
        yield "                    </div>

                    <div class=\"mb-3\">
                        <label for=\"adresseLivraison\" class=\"form-label\">Full Delivery Address</label>
                        <textarea name=\"adresseLivraison\" id=\"adresseLivraison\" class=\"form-control ";
        // line 61
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "adresseLivraison", [], "array", true, true, false, 61)) {
            yield "is-invalid";
        }
        yield "\" rows=\"3\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 61, $this->source); })()), "request", [], "any", false, false, false, 61), "request", [], "any", false, false, false, 61), "get", ["adresseLivraison", CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 61, $this->source); })()), "adresseLivraison", [], "any", false, false, false, 61)], "method", false, false, false, 61), "html", null, true);
        yield "</textarea>
                        ";
        // line 62
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "adresseLivraison", [], "array", true, true, false, 62)) {
            // line 63
            yield "                        <div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 63, $this->source); })()), "adresseLivraison", [], "array", false, false, false, 63), "html", null, true);
            yield "</div>
                        ";
        }
        // line 65
        yield "                    </div>

                    <div class=\"mb-3\">
                        <label for=\"commentaireLivraison\" class=\"form-label\">Delivery Comment</label>
                        <textarea name=\"commentaireLivraison\" id=\"commentaireLivraison\" class=\"form-control ";
        // line 69
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "commentaireLivraison", [], "array", true, true, false, 69)) {
            yield "is-invalid";
        }
        yield "\" rows=\"3\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 69, $this->source); })()), "request", [], "any", false, false, false, 69), "request", [], "any", false, false, false, 69), "get", ["commentaireLivraison", CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 69, $this->source); })()), "commentaireLivraison", [], "any", false, false, false, 69)], "method", false, false, false, 69), "html", null, true);
        yield "</textarea>
                        ";
        // line 70
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "commentaireLivraison", [], "array", true, true, false, 70)) {
            // line 71
            yield "                        <div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 71, $this->source); })()), "commentaireLivraison", [], "array", false, false, false, 71), "html", null, true);
            yield "</div>
                        ";
        }
        // line 73
        yield "                    </div>
                    
                    <div class=\"mb-4\">
                        <label for=\"statut\" class=\"form-label\">Status</label>
                        <select name=\"statut\" id=\"statut\" class=\"form-select\">
                            <option value=\"En attente\" ";
        // line 78
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 78, $this->source); })()), "request", [], "any", false, false, false, 78), "request", [], "any", false, false, false, 78), "get", ["statut", CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 78, $this->source); })()), "statut", [], "any", false, false, false, 78)], "method", false, false, false, 78) == "En attente")) {
            yield "selected";
        }
        yield ">En attente</option>
                            <option value=\"Confirmee\" ";
        // line 79
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 79, $this->source); })()), "request", [], "any", false, false, false, 79), "request", [], "any", false, false, false, 79), "get", ["statut", CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 79, $this->source); })()), "statut", [], "any", false, false, false, 79)], "method", false, false, false, 79) == "Confirmee")) {
            yield "selected";
        }
        yield ">Confirmee</option>
                            <option value=\"Annulee\" ";
        // line 80
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 80, $this->source); })()), "request", [], "any", false, false, false, 80), "request", [], "any", false, false, false, 80), "get", ["statut", CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 80, $this->source); })()), "statut", [], "any", false, false, false, 80)], "method", false, false, false, 80) == "Annulee")) {
            yield "selected";
        }
        yield ">Annulee</option>
                        </select>
                        ";
        // line 82
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "statut", [], "array", true, true, false, 82)) {
            // line 83
            yield "                        <div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 83, $this->source); })()), "statut", [], "array", false, false, false, 83), "html", null, true);
            yield "</div>
                        ";
        }
        // line 85
        yield "                    </div>
                    
                    <hr class=\"my-4\">
                    
                    <div class=\"d-flex gap-2\">
                        <button type=\"submit\" class=\"btn btn-primary\">
                            <i class=\"bi bi-check-lg me-1\"></i> Update Order
                        </button>
                        <a href=\"";
        // line 93
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_commande_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 93, $this->source); })()), "idCommande", [], "any", false, false, false, 93)]), "html", null, true);
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
        return "commande/edit.html.twig";
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
        return array (  325 => 93,  315 => 85,  309 => 83,  307 => 82,  300 => 80,  294 => 79,  288 => 78,  281 => 73,  275 => 71,  273 => 70,  265 => 69,  259 => 65,  253 => 63,  251 => 62,  243 => 61,  237 => 57,  231 => 55,  229 => 54,  221 => 53,  214 => 48,  208 => 46,  206 => 45,  203 => 44,  188 => 42,  184 => 41,  177 => 39,  168 => 33,  160 => 28,  155 => 25,  153 => 24,  140 => 14,  136 => 12,  123 => 11,  107 => 7,  102 => 6,  89 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Edit Order #{{ commande.numeroCommande }}{% endblock %}

{% block breadcrumb %}
<li class=\"breadcrumb-item\"><a href=\"{{ path('app_commande_index') }}\">Orders</a></li>
<li class=\"breadcrumb-item\"><a href=\"{{ path('app_commande_show', {'id': commande.idCommande}) }}\">Order #{{ commande.numeroCommande }}</a></li>
<li class=\"breadcrumb-item active\">Edit</li>
{% endblock %}

{% block body %}
<div class=\"page-header\">
    <h1><i class=\"bi bi-pencil me-2\"></i>Edit Order</h1>
    <p>Update the delivery details and status for <strong>#{{ commande.numeroCommande }}</strong></p>
</div>

<div class=\"row justify-content-center\">
    <div class=\"col-lg-8\">
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\"><i class=\"bi bi-cart3 me-2\"></i>Order Information</h5>
            </div>
            <div class=\"card-body\">
                {% set selectedGovernorate = app.request.request.get('gouvernorat', commande.gouvernorat ?? '') %}
                <form method=\"post\" novalidate>
                    <div class=\"mb-3\">
                        <div class=\"text-muted small\">Client</div>
                        <div class=\"fw-semibold\">{{ commande.clientDisplayName }}</div>
                    </div>

                    <div class=\"mb-3\">
                        <div class=\"text-muted small\">Total Amount</div>
                        <div class=\"fw-semibold\">{{ commande.montantTotal|number_format(2, '.', ',') }} TND</div>
                    </div>

                    <div class=\"row\">
                        <div class=\"col-md-12 mb-3\">
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
                    </div>

                    <div class=\"mb-3\">
                        <label for=\"telephoneLivraison\" class=\"form-label\">Delivery Phone Number</label>
                        <input type=\"text\" name=\"telephoneLivraison\" id=\"telephoneLivraison\" class=\"form-control {% if errors['telephoneLivraison'] is defined %}is-invalid{% endif %}\" value=\"{{ app.request.request.get('telephoneLivraison', commande.telephoneLivraison) }}\" placeholder=\"8 digits starting with 2, 5, or 9\">
                        {% if errors['telephoneLivraison'] is defined %}
                        <div class=\"invalid-feedback d-block\">{{ errors['telephoneLivraison'] }}</div>
                        {% endif %}
                    </div>

                    <div class=\"mb-3\">
                        <label for=\"adresseLivraison\" class=\"form-label\">Full Delivery Address</label>
                        <textarea name=\"adresseLivraison\" id=\"adresseLivraison\" class=\"form-control {% if errors['adresseLivraison'] is defined %}is-invalid{% endif %}\" rows=\"3\">{{ app.request.request.get('adresseLivraison', commande.adresseLivraison) }}</textarea>
                        {% if errors['adresseLivraison'] is defined %}
                        <div class=\"invalid-feedback d-block\">{{ errors['adresseLivraison'] }}</div>
                        {% endif %}
                    </div>

                    <div class=\"mb-3\">
                        <label for=\"commentaireLivraison\" class=\"form-label\">Delivery Comment</label>
                        <textarea name=\"commentaireLivraison\" id=\"commentaireLivraison\" class=\"form-control {% if errors['commentaireLivraison'] is defined %}is-invalid{% endif %}\" rows=\"3\">{{ app.request.request.get('commentaireLivraison', commande.commentaireLivraison) }}</textarea>
                        {% if errors['commentaireLivraison'] is defined %}
                        <div class=\"invalid-feedback d-block\">{{ errors['commentaireLivraison'] }}</div>
                        {% endif %}
                    </div>
                    
                    <div class=\"mb-4\">
                        <label for=\"statut\" class=\"form-label\">Status</label>
                        <select name=\"statut\" id=\"statut\" class=\"form-select\">
                            <option value=\"En attente\" {% if app.request.request.get('statut', commande.statut) == 'En attente' %}selected{% endif %}>En attente</option>
                            <option value=\"Confirmee\" {% if app.request.request.get('statut', commande.statut) == 'Confirmee' %}selected{% endif %}>Confirmee</option>
                            <option value=\"Annulee\" {% if app.request.request.get('statut', commande.statut) == 'Annulee' %}selected{% endif %}>Annulee</option>
                        </select>
                        {% if errors['statut'] is defined %}
                        <div class=\"invalid-feedback d-block\">{{ errors['statut'] }}</div>
                        {% endif %}
                    </div>
                    
                    <hr class=\"my-4\">
                    
                    <div class=\"d-flex gap-2\">
                        <button type=\"submit\" class=\"btn btn-primary\">
                            <i class=\"bi bi-check-lg me-1\"></i> Update Order
                        </button>
                        <a href=\"{{ path('app_commande_show', {'id': commande.idCommande}) }}\" class=\"btn btn-outline-secondary\">
                            <i class=\"bi bi-x-lg me-1\"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{% endblock %}
", "commande/edit.html.twig", "C:\\Users\\Skaina\\Desktop\\final version symfony\\Marketplace-Project\\web\\templates\\commande\\edit.html.twig");
    }
}
