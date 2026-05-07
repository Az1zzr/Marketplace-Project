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

/* livraison/edit.html.twig */
class __TwigTemplate_13dfb2a54a80c47b797ff9761f06b798 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "livraison/edit.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "livraison/edit.html.twig"));

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

        yield "Edit Delivery";
        
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
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_livraison_index");
        yield "\">Deliveries</a></li>
<li class=\"breadcrumb-item active\">Edit #";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 7, $this->source); })()), "numeroBL", [], "any", false, false, false, 7), "html", null, true);
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
        yield "<div class=\"page-header\">
    <h1><i class=\"bi bi-pencil me-2\"></i>Edit Delivery</h1>
    <p>Update the assigned driver and tracking information for <strong>#";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 13, $this->source); })()), "numeroBL", [], "any", false, false, false, 13), "html", null, true);
        yield "</strong></p>
</div>

<div class=\"row\">
    <div class=\"col-lg-4 mb-4\">
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\"><i class=\"bi bi-info-circle me-2\"></i>Delivery Info</h5>
            </div>
            <div class=\"card-body\">
                <div class=\"mb-3\">
                    <span class=\"text-muted small\">BL Number</span>
                    <div class=\"fw-medium\">#";
        // line 25
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 25, $this->source); })()), "numeroBL", [], "any", false, false, false, 25), "html", null, true);
        yield "</div>
                </div>
                <div class=\"mb-3\">
                    <span class=\"text-muted small\">Order</span>
                    <div class=\"fw-medium\">
                        ";
        // line 30
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 30, $this->source); })()), "commande", [], "any", false, false, false, 30)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 31
            yield "                        <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_commande_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 31, $this->source); })()), "commande", [], "any", false, false, false, 31), "idCommande", [], "any", false, false, false, 31)]), "html", null, true);
            yield "\" class=\"text-decoration-none\">
                            #";
            // line 32
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 32, $this->source); })()), "commande", [], "any", false, false, false, 32), "numeroCommande", [], "any", false, false, false, 32), "html", null, true);
            yield "
                        </a>
                        ";
        } else {
            // line 35
            yield "                        <span class=\"text-muted\">-</span>
                        ";
        }
        // line 37
        yield "                    </div>
                </div>
                ";
        // line 39
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 39, $this->source); })()), "commande", [], "any", false, false, false, 39)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 40
            yield "                <div class=\"mb-3\">
                    <span class=\"text-muted small\">Governorate</span>
                    <div class=\"fw-medium\">";
            // line 42
            yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["livraison"] ?? null), "commande", [], "any", false, true, false, 42), "gouvernorat", [], "any", true, true, false, 42) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 42, $this->source); })()), "commande", [], "any", false, false, false, 42), "gouvernorat", [], "any", false, false, false, 42)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 42, $this->source); })()), "commande", [], "any", false, false, false, 42), "gouvernorat", [], "any", false, false, false, 42), "html", null, true)) : ("-"));
            yield "</div>
                </div>
                <div class=\"mb-3\">
                    <span class=\"text-muted small\">Delivery Phone</span>
                    <div class=\"fw-medium\">";
            // line 46
            yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["livraison"] ?? null), "commande", [], "any", false, true, false, 46), "telephoneLivraison", [], "any", true, true, false, 46) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 46, $this->source); })()), "commande", [], "any", false, false, false, 46), "telephoneLivraison", [], "any", false, false, false, 46)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 46, $this->source); })()), "commande", [], "any", false, false, false, 46), "telephoneLivraison", [], "any", false, false, false, 46), "html", null, true)) : ("-"));
            yield "</div>
                </div>
                <div>
                    <span class=\"text-muted small\">Delivery Comment</span>
                    <div class=\"fw-medium\">";
            // line 50
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 50, $this->source); })()), "commande", [], "any", false, false, false, 50), "commentaireLivraison", [], "any", false, false, false, 50)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 50, $this->source); })()), "commande", [], "any", false, false, false, 50), "commentaireLivraison", [], "any", false, false, false, 50), "html", null, true))) : ("-"));
            yield "</div>
                </div>
                ";
        }
        // line 53
        yield "            </div>
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
        // line 67
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 67, $this->source); })()), "dateLivraison", [], "any", false, false, false, 67), "Y-m-d"), "html", null, true);
        yield "\" required>
                        </div>
                        
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"livreur\" class=\"form-label\">Driver Name <span class=\"text-danger\">*</span></label>
                            <input type=\"text\" name=\"livreur\" id=\"livreur\" class=\"form-control\" value=\"";
        // line 72
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 72, $this->source); })()), "livreur", [], "any", false, false, false, 72), "html", null, true);
        yield "\" required>
                        </div>
                    </div>
                    
                    <div class=\"mb-3\">
                        <label for=\"statutLivraison\" class=\"form-label\">Status</label>
                        <select name=\"statutLivraison\" id=\"statutLivraison\" class=\"form-select\">
                            <option value=\"En cours\" ";
        // line 79
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 79, $this->source); })()), "statutLivraison", [], "any", false, false, false, 79) == "En cours")) {
            yield "selected";
        }
        yield ">En cours</option>
                            <option value=\"Livree\" ";
        // line 80
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 80, $this->source); })()), "statutLivraison", [], "any", false, false, false, 80) == "Livree")) {
            yield "selected";
        }
        yield ">Livree</option>
                            <option value=\"Retardee\" ";
        // line 81
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 81, $this->source); })()), "statutLivraison", [], "any", false, false, false, 81) == "Retardee")) {
            yield "selected";
        }
        yield ">Retardee</option>
                        </select>
                    </div>
                    
                    <div class=\"mb-3\">
                        <label for=\"noteDelivery\" class=\"form-label\">Notes <span class=\"text-muted small\">(Optional)</span></label>
                        <textarea name=\"noteDelivery\" id=\"noteDelivery\" class=\"form-control\" rows=\"2\">";
        // line 87
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["livraison"] ?? null), "noteDelivery", [], "any", true, true, false, 87) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 87, $this->source); })()), "noteDelivery", [], "any", false, false, false, 87)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 87, $this->source); })()), "noteDelivery", [], "any", false, false, false, 87), "html", null, true)) : (""));
        yield "</textarea>
                    </div>
                    
                    <div class=\"card mb-3\">
                        <div class=\"card-header py-2\">
                            <h6 class=\"mb-0\"><i class=\"bi bi-geo-alt me-2\"></i>GPS Location <span class=\"text-muted small\">(Optional)</span></h6>
                        </div>
                        <div class=\"card-body\">
                            <div class=\"row\">
                                <div class=\"col-md-6 mb-2\">
                                    <label for=\"latitude\" class=\"form-label\">Latitude</label>
                                    <input type=\"number\" name=\"latitude\" id=\"latitude\" class=\"form-control\" step=\"0.000001\" value=\"";
        // line 98
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["livraison"] ?? null), "latitude", [], "any", true, true, false, 98) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 98, $this->source); })()), "latitude", [], "any", false, false, false, 98)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 98, $this->source); })()), "latitude", [], "any", false, false, false, 98), "html", null, true)) : (""));
        yield "\" placeholder=\"36.8065\">
                                </div>
                                
                                <div class=\"col-md-6 mb-2\">
                                    <label for=\"longitude\" class=\"form-label\">Longitude</label>
                                    <input type=\"number\" name=\"longitude\" id=\"longitude\" class=\"form-control\" step=\"0.000001\" value=\"";
        // line 103
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["livraison"] ?? null), "longitude", [], "any", true, true, false, 103) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 103, $this->source); })()), "longitude", [], "any", false, false, false, 103)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 103, $this->source); })()), "longitude", [], "any", false, false, false, 103), "html", null, true)) : (""));
        yield "\" placeholder=\"10.1815\">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <hr class=\"my-4\">
                    
                    <div class=\"d-flex gap-2\">
                        <button type=\"submit\" class=\"btn btn-primary\">
                            <i class=\"bi bi-check-lg me-1\"></i> Update Delivery
                        </button>
                        ";
        // line 115
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 115, $this->source); })()), "commande", [], "any", false, false, false, 115)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 116
            yield "                        <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_commande_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 116, $this->source); })()), "commande", [], "any", false, false, false, 116), "idCommande", [], "any", false, false, false, 116)]), "html", null, true);
            yield "\" class=\"btn btn-outline-secondary\">
                            <i class=\"bi bi-x-lg me-1\"></i> Cancel
                        </a>
                        ";
        } else {
            // line 120
            yield "                        <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_livraison_index");
            yield "\" class=\"btn btn-outline-secondary\">
                            <i class=\"bi bi-x-lg me-1\"></i> Cancel
                        </a>
                        ";
        }
        // line 124
        yield "                    </div>
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
        return "livraison/edit.html.twig";
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
        return array (  318 => 124,  310 => 120,  302 => 116,  300 => 115,  285 => 103,  277 => 98,  263 => 87,  252 => 81,  246 => 80,  240 => 79,  230 => 72,  222 => 67,  206 => 53,  200 => 50,  193 => 46,  186 => 42,  182 => 40,  180 => 39,  176 => 37,  172 => 35,  166 => 32,  161 => 31,  159 => 30,  151 => 25,  136 => 13,  132 => 11,  119 => 10,  106 => 7,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Edit Delivery{% endblock %}

{% block breadcrumb %}
<li class=\"breadcrumb-item\"><a href=\"{{ path('app_livraison_index') }}\">Deliveries</a></li>
<li class=\"breadcrumb-item active\">Edit #{{ livraison.numeroBL }}</li>
{% endblock %}

{% block body %}
<div class=\"page-header\">
    <h1><i class=\"bi bi-pencil me-2\"></i>Edit Delivery</h1>
    <p>Update the assigned driver and tracking information for <strong>#{{ livraison.numeroBL }}</strong></p>
</div>

<div class=\"row\">
    <div class=\"col-lg-4 mb-4\">
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\"><i class=\"bi bi-info-circle me-2\"></i>Delivery Info</h5>
            </div>
            <div class=\"card-body\">
                <div class=\"mb-3\">
                    <span class=\"text-muted small\">BL Number</span>
                    <div class=\"fw-medium\">#{{ livraison.numeroBL }}</div>
                </div>
                <div class=\"mb-3\">
                    <span class=\"text-muted small\">Order</span>
                    <div class=\"fw-medium\">
                        {% if livraison.commande %}
                        <a href=\"{{ path('app_commande_show', {'id': livraison.commande.idCommande}) }}\" class=\"text-decoration-none\">
                            #{{ livraison.commande.numeroCommande }}
                        </a>
                        {% else %}
                        <span class=\"text-muted\">-</span>
                        {% endif %}
                    </div>
                </div>
                {% if livraison.commande %}
                <div class=\"mb-3\">
                    <span class=\"text-muted small\">Governorate</span>
                    <div class=\"fw-medium\">{{ livraison.commande.gouvernorat ?? '-' }}</div>
                </div>
                <div class=\"mb-3\">
                    <span class=\"text-muted small\">Delivery Phone</span>
                    <div class=\"fw-medium\">{{ livraison.commande.telephoneLivraison ?? '-' }}</div>
                </div>
                <div>
                    <span class=\"text-muted small\">Delivery Comment</span>
                    <div class=\"fw-medium\">{{ livraison.commande.commentaireLivraison ? livraison.commande.commentaireLivraison|nl2br : '-' }}</div>
                </div>
                {% endif %}
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
                            <input type=\"date\" name=\"dateLivraison\" id=\"dateLivraison\" class=\"form-control\" value=\"{{ livraison.dateLivraison|date('Y-m-d') }}\" required>
                        </div>
                        
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"livreur\" class=\"form-label\">Driver Name <span class=\"text-danger\">*</span></label>
                            <input type=\"text\" name=\"livreur\" id=\"livreur\" class=\"form-control\" value=\"{{ livraison.livreur }}\" required>
                        </div>
                    </div>
                    
                    <div class=\"mb-3\">
                        <label for=\"statutLivraison\" class=\"form-label\">Status</label>
                        <select name=\"statutLivraison\" id=\"statutLivraison\" class=\"form-select\">
                            <option value=\"En cours\" {% if livraison.statutLivraison == 'En cours' %}selected{% endif %}>En cours</option>
                            <option value=\"Livree\" {% if livraison.statutLivraison == 'Livree' %}selected{% endif %}>Livree</option>
                            <option value=\"Retardee\" {% if livraison.statutLivraison == 'Retardee' %}selected{% endif %}>Retardee</option>
                        </select>
                    </div>
                    
                    <div class=\"mb-3\">
                        <label for=\"noteDelivery\" class=\"form-label\">Notes <span class=\"text-muted small\">(Optional)</span></label>
                        <textarea name=\"noteDelivery\" id=\"noteDelivery\" class=\"form-control\" rows=\"2\">{{ livraison.noteDelivery ?? '' }}</textarea>
                    </div>
                    
                    <div class=\"card mb-3\">
                        <div class=\"card-header py-2\">
                            <h6 class=\"mb-0\"><i class=\"bi bi-geo-alt me-2\"></i>GPS Location <span class=\"text-muted small\">(Optional)</span></h6>
                        </div>
                        <div class=\"card-body\">
                            <div class=\"row\">
                                <div class=\"col-md-6 mb-2\">
                                    <label for=\"latitude\" class=\"form-label\">Latitude</label>
                                    <input type=\"number\" name=\"latitude\" id=\"latitude\" class=\"form-control\" step=\"0.000001\" value=\"{{ livraison.latitude ?? '' }}\" placeholder=\"36.8065\">
                                </div>
                                
                                <div class=\"col-md-6 mb-2\">
                                    <label for=\"longitude\" class=\"form-label\">Longitude</label>
                                    <input type=\"number\" name=\"longitude\" id=\"longitude\" class=\"form-control\" step=\"0.000001\" value=\"{{ livraison.longitude ?? '' }}\" placeholder=\"10.1815\">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <hr class=\"my-4\">
                    
                    <div class=\"d-flex gap-2\">
                        <button type=\"submit\" class=\"btn btn-primary\">
                            <i class=\"bi bi-check-lg me-1\"></i> Update Delivery
                        </button>
                        {% if livraison.commande %}
                        <a href=\"{{ path('app_commande_show', {'id': livraison.commande.idCommande}) }}\" class=\"btn btn-outline-secondary\">
                            <i class=\"bi bi-x-lg me-1\"></i> Cancel
                        </a>
                        {% else %}
                        <a href=\"{{ path('app_livraison_index') }}\" class=\"btn btn-outline-secondary\">
                            <i class=\"bi bi-x-lg me-1\"></i> Cancel
                        </a>
                        {% endif %}
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{% endblock %}
", "livraison/edit.html.twig", "C:\\Users\\Skaina\\Desktop\\final version symfony\\Marketplace-Project\\web\\templates\\livraison\\edit.html.twig");
    }
}
