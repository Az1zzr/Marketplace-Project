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

/* livraison/index.html.twig */
class __TwigTemplate_8ece6347caa0f36896dcf052669843a3 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "livraison/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "livraison/index.html.twig"));

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

        yield "Deliveries";
        
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
        yield "<li class=\"breadcrumb-item active\">Deliveries</li>
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
        yield "<div class=\"page-header\">
    <h1><i class=\"bi bi-truck me-2\"></i>Deliveries</h1>
    <p>";
        // line 12
        if ((($tmp = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "Manage all delivery assignments";
        } elseif ((($tmp = (isset($context["canManageLivraisons"]) || array_key_exists("canManageLivraisons", $context) ? $context["canManageLivraisons"] : (function () { throw new RuntimeError('Variable "canManageLivraisons" does not exist.', 12, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "Assign and follow deliveries for orders containing your products";
        } else {
            yield "Track the current state of your deliveries";
        }
        yield "</p>
</div>

<div class=\"card mb-4\">
    <div class=\"card-body\">
        <form method=\"get\" class=\"row g-3 align-items-end\" novalidate>
            <div class=\"col-md-3\">
                <label for=\"search\" class=\"form-label\">Search</label>
                <input type=\"text\" name=\"search\" id=\"search\" class=\"form-control\" value=\"";
        // line 20
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 20, $this->source); })()), "html", null, true);
        yield "\" placeholder=\"BL #, driver, notes...\">
            </div>
            <div class=\"col-md-2\">
                <label for=\"statut\" class=\"form-label\">Status</label>
                <select name=\"statut\" id=\"statut\" class=\"form-select\">
                    <option value=\"\">All Statuses</option>
                    <option value=\"En cours\" ";
        // line 26
        if (((isset($context["statut"]) || array_key_exists("statut", $context) ? $context["statut"] : (function () { throw new RuntimeError('Variable "statut" does not exist.', 26, $this->source); })()) == "En cours")) {
            yield "selected";
        }
        yield ">En cours</option>
                    <option value=\"Livree\" ";
        // line 27
        if (((isset($context["statut"]) || array_key_exists("statut", $context) ? $context["statut"] : (function () { throw new RuntimeError('Variable "statut" does not exist.', 27, $this->source); })()) == "Livree")) {
            yield "selected";
        }
        yield ">Livree</option>
                    <option value=\"Retardee\" ";
        // line 28
        if (((isset($context["statut"]) || array_key_exists("statut", $context) ? $context["statut"] : (function () { throw new RuntimeError('Variable "statut" does not exist.', 28, $this->source); })()) == "Retardee")) {
            yield "selected";
        }
        yield ">Retardee</option>
                </select>
            </div>
            <div class=\"col-md-2\">
                <label for=\"sort\" class=\"form-label\">Sort by</label>
                <select name=\"sort\" id=\"sort\" class=\"form-select\">
                    <option value=\"dateLivraison\" ";
        // line 34
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 34, $this->source); })()) == "dateLivraison")) {
            yield "selected";
        }
        yield ">Date</option>
                    <option value=\"numeroBL\" ";
        // line 35
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 35, $this->source); })()) == "numeroBL")) {
            yield "selected";
        }
        yield ">BL Number</option>
                    <option value=\"livreur\" ";
        // line 36
        if (((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 36, $this->source); })()) == "livreur")) {
            yield "selected";
        }
        yield ">Driver</option>
                </select>
            </div>
            <div class=\"col-md-2\">
                <label for=\"order\" class=\"form-label\">Order</label>
                <select name=\"order\" id=\"order\" class=\"form-select\">
                    <option value=\"asc\" ";
        // line 42
        if (((isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 42, $this->source); })()) == "asc")) {
            yield "selected";
        }
        yield ">Ascending</option>
                    <option value=\"desc\" ";
        // line 43
        if (((isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 43, $this->source); })()) == "desc")) {
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
        // line 50
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_livraison_index");
        yield "\" class=\"btn btn-outline-secondary\">
                    <i class=\"bi bi-x-lg me-1\"></i> Reset
                </a>
            </div>
        </form>
    </div>
</div>

";
        // line 58
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["livraisons"]) || array_key_exists("livraisons", $context) ? $context["livraisons"] : (function () { throw new RuntimeError('Variable "livraisons" does not exist.', 58, $this->source); })()))) {
            // line 59
            yield "<div class=\"card\">
    <div class=\"card-body text-center py-5\">
        <i class=\"bi bi-truck\" style=\"font-size: 3rem; color: #94a3b8;\"></i>
        <h5 class=\"mt-3 text-muted\">No deliveries found</h5>
        ";
            // line 63
            if (((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 63, $this->source); })()) || (isset($context["statut"]) || array_key_exists("statut", $context) ? $context["statut"] : (function () { throw new RuntimeError('Variable "statut" does not exist.', 63, $this->source); })()))) {
                // line 64
                yield "        <p class=\"text-muted\">No deliveries match your search criteria.</p>
        ";
            } else {
                // line 66
                yield "        <p class=\"text-muted\">";
                if ((($tmp = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "Deliveries are created from order details pages.";
                } elseif ((($tmp = (isset($context["canManageLivraisons"]) || array_key_exists("canManageLivraisons", $context) ? $context["canManageLivraisons"] : (function () { throw new RuntimeError('Variable "canManageLivraisons" does not exist.', 66, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "Deliveries will appear here after you assign a driver to one of your client orders.";
                } else {
                    yield "Your delivery tracking will appear here once a fournisseur assigns shipment details to one of your orders.";
                }
                yield "</p>
        ";
            }
            // line 68
            yield "        <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_commande_index");
            yield "\" class=\"btn btn-primary mt-2\">
            <i class=\"bi bi-cart3 me-1\"></i> View Orders
        </a>
    </div>
</div>
";
        } else {
            // line 74
            yield "<div class=\"card\">
    <div class=\"card-body p-0\">
        <div class=\"table-responsive\">
            <table class=\"table table-hover mb-0\">
                <thead>
                    <tr>
                        <th>BL Number</th>
                        <th>Order #</th>
                        <th>Date</th>
                        <th>Driver</th>
                        <th>Status</th>
                        <th>GPS</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                ";
            // line 90
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["livraisons"]) || array_key_exists("livraisons", $context) ? $context["livraisons"] : (function () { throw new RuntimeError('Variable "livraisons" does not exist.', 90, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["livraison"]) {
                // line 91
                yield "                    <tr>
                        <td><strong>#";
                // line 92
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "numeroBL", [], "any", false, false, false, 92), "html", null, true);
                yield "</strong></td>
                        <td>
                            ";
                // line 94
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "commande", [], "any", false, false, false, 94)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 95
                    yield "                            <a href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_commande_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "commande", [], "any", false, false, false, 95), "idCommande", [], "any", false, false, false, 95)]), "html", null, true);
                    yield "\" class=\"text-decoration-none\">
                                #";
                    // line 96
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "commande", [], "any", false, false, false, 96), "numeroCommande", [], "any", false, false, false, 96), "html", null, true);
                    yield "
                            </a>
                            ";
                } else {
                    // line 99
                    yield "                            <span class=\"text-muted\">-</span>
                            ";
                }
                // line 101
                yield "                        </td>
                        <td>";
                // line 102
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "dateLivraison", [], "any", false, false, false, 102), "Y-m-d"), "html", null, true);
                yield "</td>
                        <td>
                            <div class=\"d-flex align-items-center\">
                                <div class=\"user-avatar me-2\" style=\"width: 32px; height: 32px; font-size: 0.75rem;\">";
                // line 105
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "livreur", [], "any", false, false, false, 105))), "html", null, true);
                yield "</div>
                                ";
                // line 106
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "livreur", [], "any", false, false, false, 106), "html", null, true);
                yield "
                            </div>
                        </td>
                        <td>
                            ";
                // line 110
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "statutLivraison", [], "any", false, false, false, 110) == "En cours")) {
                    // line 111
                    yield "                            <span class=\"badge badge-status-progress\"><i class=\"bi bi-truck me-1\"></i>";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "statutLivraison", [], "any", false, false, false, 111), "html", null, true);
                    yield "</span>
                            ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 112
$context["livraison"], "statutLivraison", [], "any", false, false, false, 112) == "Livree")) {
                    // line 113
                    yield "                            <span class=\"badge badge-status-delivered\"><i class=\"bi bi-check-circle me-1\"></i>";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "statutLivraison", [], "any", false, false, false, 113), "html", null, true);
                    yield "</span>
                            ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 114
$context["livraison"], "statutLivraison", [], "any", false, false, false, 114) == "Retardee")) {
                    // line 115
                    yield "                            <span class=\"badge badge-status-delayed\"><i class=\"bi bi-exclamation-triangle me-1\"></i>";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "statutLivraison", [], "any", false, false, false, 115), "html", null, true);
                    yield "</span>
                            ";
                } else {
                    // line 117
                    yield "                            <span class=\"badge bg-secondary\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "statutLivraison", [], "any", false, false, false, 117), "html", null, true);
                    yield "</span>
                            ";
                }
                // line 119
                yield "                        </td>
                        <td>
                            ";
                // line 121
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "hasLocation", [], "any", false, false, false, 121)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 122
                    yield "                            <span class=\"badge bg-info\"><i class=\"bi bi-geo-alt me-1\"></i>";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "latitude", [], "any", false, false, false, 122), 0, 6), "html", null, true);
                    yield "...</span>
                            ";
                } else {
                    // line 124
                    yield "                            <span class=\"text-muted\">-</span>
                            ";
                }
                // line 126
                yield "                        </td>
                        <td>
                            <div class=\"btn-group\" role=\"group\">
                                ";
                // line 129
                if ((($tmp = (isset($context["canManageLivraisons"]) || array_key_exists("canManageLivraisons", $context) ? $context["canManageLivraisons"] : (function () { throw new RuntimeError('Variable "canManageLivraisons" does not exist.', 129, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 130
                    yield "                                <a href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_livraison_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "idLivraison", [], "any", false, false, false, 130)]), "html", null, true);
                    yield "\" class=\"btn btn-outline-primary btn-sm\">
                                    <i class=\"bi bi-pencil\"></i>
                                </a>
                                ";
                }
                // line 134
                yield "                                ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "commande", [], "any", false, false, false, 134)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 135
                    yield "                                <a href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_commande_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "commande", [], "any", false, false, false, 135), "idCommande", [], "any", false, false, false, 135)]), "html", null, true);
                    yield "\" class=\"btn btn-outline-secondary btn-sm\">
                                    <i class=\"bi bi-eye\"></i>
                                </a>
                                ";
                }
                // line 139
                yield "                                ";
                if ((($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_CLIENT") && (CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "statutLivraison", [], "any", false, false, false, 139) == "Livree")) && (null === CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "feedback", [], "any", false, false, false, 139)))) {
                    // line 140
                    yield "                                <a href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_feedback_delivery_new", ["livraisonId" => CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "idLivraison", [], "any", false, false, false, 140)]), "html", null, true);
                    yield "\" class=\"btn btn-outline-success btn-sm\">
                                    <i class=\"bi bi-chat-heart\"></i>
                                </a>
                                ";
                } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source,                 // line 143
$context["livraison"], "feedback", [], "any", false, false, false, 143)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 144
                    yield "                                <a href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_feedback_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["livraison"], "feedback", [], "any", false, false, false, 144), "id", [], "any", false, false, false, 144)]), "html", null, true);
                    yield "\" class=\"btn btn-outline-secondary btn-sm\">
                                    <i class=\"bi bi-chat-left-text\"></i>
                                </a>
                                ";
                }
                // line 148
                yield "                            </div>
                        </td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['livraison'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 152
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
        return "livraison/index.html.twig";
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
        return array (  433 => 152,  424 => 148,  416 => 144,  414 => 143,  407 => 140,  404 => 139,  396 => 135,  393 => 134,  385 => 130,  383 => 129,  378 => 126,  374 => 124,  368 => 122,  366 => 121,  362 => 119,  356 => 117,  350 => 115,  348 => 114,  343 => 113,  341 => 112,  336 => 111,  334 => 110,  327 => 106,  323 => 105,  317 => 102,  314 => 101,  310 => 99,  304 => 96,  299 => 95,  297 => 94,  292 => 92,  289 => 91,  285 => 90,  267 => 74,  257 => 68,  245 => 66,  241 => 64,  239 => 63,  233 => 59,  231 => 58,  220 => 50,  208 => 43,  202 => 42,  191 => 36,  185 => 35,  179 => 34,  168 => 28,  162 => 27,  156 => 26,  147 => 20,  130 => 12,  126 => 10,  113 => 9,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Deliveries{% endblock %}

{% block breadcrumb %}
<li class=\"breadcrumb-item active\">Deliveries</li>
{% endblock %}

{% block body %}
<div class=\"page-header\">
    <h1><i class=\"bi bi-truck me-2\"></i>Deliveries</h1>
    <p>{% if is_granted('ROLE_ADMIN') %}Manage all delivery assignments{% elseif canManageLivraisons %}Assign and follow deliveries for orders containing your products{% else %}Track the current state of your deliveries{% endif %}</p>
</div>

<div class=\"card mb-4\">
    <div class=\"card-body\">
        <form method=\"get\" class=\"row g-3 align-items-end\" novalidate>
            <div class=\"col-md-3\">
                <label for=\"search\" class=\"form-label\">Search</label>
                <input type=\"text\" name=\"search\" id=\"search\" class=\"form-control\" value=\"{{ search }}\" placeholder=\"BL #, driver, notes...\">
            </div>
            <div class=\"col-md-2\">
                <label for=\"statut\" class=\"form-label\">Status</label>
                <select name=\"statut\" id=\"statut\" class=\"form-select\">
                    <option value=\"\">All Statuses</option>
                    <option value=\"En cours\" {% if statut == 'En cours' %}selected{% endif %}>En cours</option>
                    <option value=\"Livree\" {% if statut == 'Livree' %}selected{% endif %}>Livree</option>
                    <option value=\"Retardee\" {% if statut == 'Retardee' %}selected{% endif %}>Retardee</option>
                </select>
            </div>
            <div class=\"col-md-2\">
                <label for=\"sort\" class=\"form-label\">Sort by</label>
                <select name=\"sort\" id=\"sort\" class=\"form-select\">
                    <option value=\"dateLivraison\" {% if sort == 'dateLivraison' %}selected{% endif %}>Date</option>
                    <option value=\"numeroBL\" {% if sort == 'numeroBL' %}selected{% endif %}>BL Number</option>
                    <option value=\"livreur\" {% if sort == 'livreur' %}selected{% endif %}>Driver</option>
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
                <a href=\"{{ path('app_livraison_index') }}\" class=\"btn btn-outline-secondary\">
                    <i class=\"bi bi-x-lg me-1\"></i> Reset
                </a>
            </div>
        </form>
    </div>
</div>

{% if livraisons is empty %}
<div class=\"card\">
    <div class=\"card-body text-center py-5\">
        <i class=\"bi bi-truck\" style=\"font-size: 3rem; color: #94a3b8;\"></i>
        <h5 class=\"mt-3 text-muted\">No deliveries found</h5>
        {% if search or statut %}
        <p class=\"text-muted\">No deliveries match your search criteria.</p>
        {% else %}
        <p class=\"text-muted\">{% if is_granted('ROLE_ADMIN') %}Deliveries are created from order details pages.{% elseif canManageLivraisons %}Deliveries will appear here after you assign a driver to one of your client orders.{% else %}Your delivery tracking will appear here once a fournisseur assigns shipment details to one of your orders.{% endif %}</p>
        {% endif %}
        <a href=\"{{ path('app_commande_index') }}\" class=\"btn btn-primary mt-2\">
            <i class=\"bi bi-cart3 me-1\"></i> View Orders
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
                        <th>BL Number</th>
                        <th>Order #</th>
                        <th>Date</th>
                        <th>Driver</th>
                        <th>Status</th>
                        <th>GPS</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                {% for livraison in livraisons %}
                    <tr>
                        <td><strong>#{{ livraison.numeroBL }}</strong></td>
                        <td>
                            {% if livraison.commande %}
                            <a href=\"{{ path('app_commande_show', {'id': livraison.commande.idCommande}) }}\" class=\"text-decoration-none\">
                                #{{ livraison.commande.numeroCommande }}
                            </a>
                            {% else %}
                            <span class=\"text-muted\">-</span>
                            {% endif %}
                        </td>
                        <td>{{ livraison.dateLivraison|date('Y-m-d') }}</td>
                        <td>
                            <div class=\"d-flex align-items-center\">
                                <div class=\"user-avatar me-2\" style=\"width: 32px; height: 32px; font-size: 0.75rem;\">{{ livraison.livreur|first|upper }}</div>
                                {{ livraison.livreur }}
                            </div>
                        </td>
                        <td>
                            {% if livraison.statutLivraison == 'En cours' %}
                            <span class=\"badge badge-status-progress\"><i class=\"bi bi-truck me-1\"></i>{{ livraison.statutLivraison }}</span>
                            {% elseif livraison.statutLivraison == 'Livree' %}
                            <span class=\"badge badge-status-delivered\"><i class=\"bi bi-check-circle me-1\"></i>{{ livraison.statutLivraison }}</span>
                            {% elseif livraison.statutLivraison == 'Retardee' %}
                            <span class=\"badge badge-status-delayed\"><i class=\"bi bi-exclamation-triangle me-1\"></i>{{ livraison.statutLivraison }}</span>
                            {% else %}
                            <span class=\"badge bg-secondary\">{{ livraison.statutLivraison }}</span>
                            {% endif %}
                        </td>
                        <td>
                            {% if livraison.hasLocation %}
                            <span class=\"badge bg-info\"><i class=\"bi bi-geo-alt me-1\"></i>{{ livraison.latitude|slice(0, 6) }}...</span>
                            {% else %}
                            <span class=\"text-muted\">-</span>
                            {% endif %}
                        </td>
                        <td>
                            <div class=\"btn-group\" role=\"group\">
                                {% if canManageLivraisons %}
                                <a href=\"{{ path('app_livraison_edit', {'id': livraison.idLivraison}) }}\" class=\"btn btn-outline-primary btn-sm\">
                                    <i class=\"bi bi-pencil\"></i>
                                </a>
                                {% endif %}
                                {% if livraison.commande %}
                                <a href=\"{{ path('app_commande_show', {'id': livraison.commande.idCommande}) }}\" class=\"btn btn-outline-secondary btn-sm\">
                                    <i class=\"bi bi-eye\"></i>
                                </a>
                                {% endif %}
                                {% if is_granted('ROLE_CLIENT') and livraison.statutLivraison == 'Livree' and livraison.feedback is null %}
                                <a href=\"{{ path('app_feedback_delivery_new', {'livraisonId': livraison.idLivraison}) }}\" class=\"btn btn-outline-success btn-sm\">
                                    <i class=\"bi bi-chat-heart\"></i>
                                </a>
                                {% elseif livraison.feedback %}
                                <a href=\"{{ path('app_feedback_show', {'id': livraison.feedback.id}) }}\" class=\"btn btn-outline-secondary btn-sm\">
                                    <i class=\"bi bi-chat-left-text\"></i>
                                </a>
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
", "livraison/index.html.twig", "C:\\Users\\Skaina\\Desktop\\final version symfony\\Marketplace-Project\\web\\templates\\livraison\\index.html.twig");
    }
}
