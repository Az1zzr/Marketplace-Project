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

/* livraison/new.html.twig */
class __TwigTemplate_0880904346148d645a3d4644f18edd2b extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "livraison/new.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "livraison/new.html.twig"));

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

        yield "Add Delivery";
        
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
<li class=\"breadcrumb-item active\">Add Delivery</li>
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
    <h1><i class=\"bi bi-plus-circle me-2\"></i>Add Delivery</h1>
    <p>Assign a driver and tracking details for Order <strong>#";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 14, $this->source); })()), "numeroCommande", [], "any", false, false, false, 14), "html", null, true);
        yield "</strong></p>
</div>

<div class=\"row\">
    <div class=\"col-lg-4 mb-4\">
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\"><i class=\"bi bi-receipt me-2\"></i>Order Summary</h5>
            </div>
            <div class=\"card-body\">
                <div class=\"mb-3\">
                    <span class=\"text-muted small\">Order Number</span>
                    <div class=\"fw-medium\">#";
        // line 26
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 26, $this->source); })()), "numeroCommande", [], "any", false, false, false, 26), "html", null, true);
        yield "</div>
                </div>
                <div class=\"mb-3\">
                    <span class=\"text-muted small\">Client</span>
                    <div class=\"fw-medium\">";
        // line 30
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 30, $this->source); })()), "clientDisplayName", [], "any", false, false, false, 30), "html", null, true);
        yield "</div>
                </div>
                <div class=\"mb-3\">
                    <span class=\"text-muted small\">Governorate</span>
                    <div class=\"fw-medium\">";
        // line 34
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["commande"] ?? null), "gouvernorat", [], "any", true, true, false, 34) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 34, $this->source); })()), "gouvernorat", [], "any", false, false, false, 34)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 34, $this->source); })()), "gouvernorat", [], "any", false, false, false, 34), "html", null, true)) : ("-"));
        yield "</div>
                </div>
                <div class=\"mb-3\">
                    <span class=\"text-muted small\">Delivery Address</span>
                    <div class=\"fw-medium\">
                        <i class=\"bi bi-geo-alt text-primary me-1\"></i>";
        // line 39
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 39, $this->source); })()), "adresseLivraison", [], "any", false, false, false, 39), "html", null, true);
        yield "
                    </div>
                </div>
                <div class=\"mb-3\">
                    <span class=\"text-muted small\">Delivery Phone</span>
                    <div class=\"fw-medium\">";
        // line 44
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["commande"] ?? null), "telephoneLivraison", [], "any", true, true, false, 44) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 44, $this->source); })()), "telephoneLivraison", [], "any", false, false, false, 44)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 44, $this->source); })()), "telephoneLivraison", [], "any", false, false, false, 44), "html", null, true)) : ("-"));
        yield "</div>
                </div>
                <div class=\"mb-3\">
                    <span class=\"text-muted small\">Delivery Comment</span>
                    <div class=\"fw-medium\">";
        // line 48
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 48, $this->source); })()), "commentaireLivraison", [], "any", false, false, false, 48)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 48, $this->source); })()), "commentaireLivraison", [], "any", false, false, false, 48), "html", null, true))) : ("-"));
        yield "</div>
                </div>
                <div>
                    <span class=\"text-muted small\">Total Amount</span>
                    <div class=\"fw-medium text-primary\">";
        // line 52
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 52, $this->source); })()), "montantTotal", [], "any", false, false, false, 52), 2, ".", ","), "html", null, true);
        yield " TND</div>
                </div>
            </div>
        </div>
    </div>
    
    <div class=\"col-lg-8 mb-4\">
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\"><i class=\"bi bi-truck me-2\"></i>Delivery Details</h5>
            </div>
            <div class=\"card-body\">
                <form method=\"post\" novalidate>
                    <div class=\"row\">
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"dateLivraison\" class=\"form-label\">Delivery Date <span class=\"text-danger\">*</span></label>
                            <input type=\"date\" name=\"dateLivraison\" id=\"dateLivraison\" class=\"form-control\" value=\"";
        // line 68
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y-m-d"), "html", null, true);
        yield "\" required>
                        </div>
                        
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"livreur\" class=\"form-label\">Driver Name <span class=\"text-danger\">*</span></label>
                            <input type=\"text\" name=\"livreur\" id=\"livreur\" class=\"form-control\" required placeholder=\"Enter driver name\">
                        </div>
                    </div>
                    
                    <div class=\"mb-3\">
                        <label for=\"statutLivraison\" class=\"form-label\">Status</label>
                        <select name=\"statutLivraison\" id=\"statutLivraison\" class=\"form-select\">
                            <option value=\"En cours\">En cours</option>
                            <option value=\"Livree\">Livree</option>
                            <option value=\"Retardee\">Retardee</option>
                        </select>
                    </div>
                    
                    <div class=\"mb-3\">
                        <label for=\"noteDelivery\" class=\"form-label\">Notes <span class=\"text-muted small\">(Optional)</span></label>
                        <textarea name=\"noteDelivery\" id=\"noteDelivery\" class=\"form-control\" rows=\"2\" placeholder=\"Delivery instructions or notes\"></textarea>
                    </div>
                    
                    <div class=\"card mb-3\">
                        <div class=\"card-header py-2\">
                            <h6 class=\"mb-0\"><i class=\"bi bi-geo-alt me-2\"></i>GPS Location <span class=\"text-muted small\">(Optional)</span></h6>
                        </div>
                        <div class=\"card-body\">
                            <div class=\"row\">
                                <div class=\"col-md-6 mb-2\">
                                    <label for=\"latitude\" class=\"form-label\">Latitude</label>
                                    <input type=\"number\" name=\"latitude\" id=\"latitude\" class=\"form-control\" step=\"0.000001\" placeholder=\"36.8065\">
                                </div>
                                
                                <div class=\"col-md-6 mb-2\">
                                    <label for=\"longitude\" class=\"form-label\">Longitude</label>
                                    <input type=\"number\" name=\"longitude\" id=\"longitude\" class=\"form-control\" step=\"0.000001\" placeholder=\"10.1815\">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <hr class=\"my-4\">
                    
                    <div class=\"d-flex gap-2\">
                        <button type=\"submit\" class=\"btn btn-primary\">
                            <i class=\"bi bi-check-lg me-1\"></i> Create Delivery
                        </button>
                        <a href=\"";
        // line 116
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_commande_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 116, $this->source); })()), "idCommande", [], "any", false, false, false, 116)]), "html", null, true);
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
        return "livraison/new.html.twig";
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
        return array (  268 => 116,  217 => 68,  198 => 52,  191 => 48,  184 => 44,  176 => 39,  168 => 34,  161 => 30,  154 => 26,  139 => 14,  135 => 12,  122 => 11,  106 => 7,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Add Delivery{% endblock %}

{% block breadcrumb %}
<li class=\"breadcrumb-item\"><a href=\"{{ path('app_commande_index') }}\">Orders</a></li>
<li class=\"breadcrumb-item\"><a href=\"{{ path('app_commande_show', {'id': commande.idCommande}) }}\">Order #{{ commande.numeroCommande }}</a></li>
<li class=\"breadcrumb-item active\">Add Delivery</li>
{% endblock %}

{% block body %}
<div class=\"page-header\">
    <h1><i class=\"bi bi-plus-circle me-2\"></i>Add Delivery</h1>
    <p>Assign a driver and tracking details for Order <strong>#{{ commande.numeroCommande }}</strong></p>
</div>

<div class=\"row\">
    <div class=\"col-lg-4 mb-4\">
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\"><i class=\"bi bi-receipt me-2\"></i>Order Summary</h5>
            </div>
            <div class=\"card-body\">
                <div class=\"mb-3\">
                    <span class=\"text-muted small\">Order Number</span>
                    <div class=\"fw-medium\">#{{ commande.numeroCommande }}</div>
                </div>
                <div class=\"mb-3\">
                    <span class=\"text-muted small\">Client</span>
                    <div class=\"fw-medium\">{{ commande.clientDisplayName }}</div>
                </div>
                <div class=\"mb-3\">
                    <span class=\"text-muted small\">Governorate</span>
                    <div class=\"fw-medium\">{{ commande.gouvernorat ?? '-' }}</div>
                </div>
                <div class=\"mb-3\">
                    <span class=\"text-muted small\">Delivery Address</span>
                    <div class=\"fw-medium\">
                        <i class=\"bi bi-geo-alt text-primary me-1\"></i>{{ commande.adresseLivraison }}
                    </div>
                </div>
                <div class=\"mb-3\">
                    <span class=\"text-muted small\">Delivery Phone</span>
                    <div class=\"fw-medium\">{{ commande.telephoneLivraison ?? '-' }}</div>
                </div>
                <div class=\"mb-3\">
                    <span class=\"text-muted small\">Delivery Comment</span>
                    <div class=\"fw-medium\">{{ commande.commentaireLivraison ? commande.commentaireLivraison|nl2br : '-' }}</div>
                </div>
                <div>
                    <span class=\"text-muted small\">Total Amount</span>
                    <div class=\"fw-medium text-primary\">{{ commande.montantTotal|number_format(2, '.', ',') }} TND</div>
                </div>
            </div>
        </div>
    </div>
    
    <div class=\"col-lg-8 mb-4\">
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\"><i class=\"bi bi-truck me-2\"></i>Delivery Details</h5>
            </div>
            <div class=\"card-body\">
                <form method=\"post\" novalidate>
                    <div class=\"row\">
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"dateLivraison\" class=\"form-label\">Delivery Date <span class=\"text-danger\">*</span></label>
                            <input type=\"date\" name=\"dateLivraison\" id=\"dateLivraison\" class=\"form-control\" value=\"{{ \"now\"|date('Y-m-d') }}\" required>
                        </div>
                        
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"livreur\" class=\"form-label\">Driver Name <span class=\"text-danger\">*</span></label>
                            <input type=\"text\" name=\"livreur\" id=\"livreur\" class=\"form-control\" required placeholder=\"Enter driver name\">
                        </div>
                    </div>
                    
                    <div class=\"mb-3\">
                        <label for=\"statutLivraison\" class=\"form-label\">Status</label>
                        <select name=\"statutLivraison\" id=\"statutLivraison\" class=\"form-select\">
                            <option value=\"En cours\">En cours</option>
                            <option value=\"Livree\">Livree</option>
                            <option value=\"Retardee\">Retardee</option>
                        </select>
                    </div>
                    
                    <div class=\"mb-3\">
                        <label for=\"noteDelivery\" class=\"form-label\">Notes <span class=\"text-muted small\">(Optional)</span></label>
                        <textarea name=\"noteDelivery\" id=\"noteDelivery\" class=\"form-control\" rows=\"2\" placeholder=\"Delivery instructions or notes\"></textarea>
                    </div>
                    
                    <div class=\"card mb-3\">
                        <div class=\"card-header py-2\">
                            <h6 class=\"mb-0\"><i class=\"bi bi-geo-alt me-2\"></i>GPS Location <span class=\"text-muted small\">(Optional)</span></h6>
                        </div>
                        <div class=\"card-body\">
                            <div class=\"row\">
                                <div class=\"col-md-6 mb-2\">
                                    <label for=\"latitude\" class=\"form-label\">Latitude</label>
                                    <input type=\"number\" name=\"latitude\" id=\"latitude\" class=\"form-control\" step=\"0.000001\" placeholder=\"36.8065\">
                                </div>
                                
                                <div class=\"col-md-6 mb-2\">
                                    <label for=\"longitude\" class=\"form-label\">Longitude</label>
                                    <input type=\"number\" name=\"longitude\" id=\"longitude\" class=\"form-control\" step=\"0.000001\" placeholder=\"10.1815\">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <hr class=\"my-4\">
                    
                    <div class=\"d-flex gap-2\">
                        <button type=\"submit\" class=\"btn btn-primary\">
                            <i class=\"bi bi-check-lg me-1\"></i> Create Delivery
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
", "livraison/new.html.twig", "C:\\Users\\Skaina\\Desktop\\final version symfony\\Marketplace-Project\\web\\templates\\livraison\\new.html.twig");
    }
}
