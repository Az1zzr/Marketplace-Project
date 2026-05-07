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

/* produit/edit.html.twig */
class __TwigTemplate_646c8586333fa66d9c8308f43f975274 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "produit/edit.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "produit/edit.html.twig"));

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

        yield "Edit ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 3, $this->source); })()), "nomProduit", [], "any", false, false, false, 3), "html", null, true);
        
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
<li class=\"breadcrumb-item\"><a href=\"";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 7, $this->source); })()), "id", [], "any", false, false, false, 7)]), "html", null, true);
        yield "\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 7, $this->source); })()), "nomProduit", [], "any", false, false, false, 7), "html", null, true);
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
    <h1><i class=\"bi bi-pencil me-2\"></i>Edit Product</h1>
    <p>Update product information for <strong>";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 14, $this->source); })()), "nomProduit", [], "any", false, false, false, 14), "html", null, true);
        yield "</strong></p>
</div>

<div class=\"row justify-content-center\">
    <div class=\"col-lg-8\">
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\"><i class=\"bi bi-box-seam me-2\"></i>Product Information</h5>
            </div>

            <div class=\"card-body\">
                ";
        // line 25
        if ((array_key_exists("errors", $context) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 25, $this->source); })())) > 0))) {
            // line 26
            yield "                <div class=\"alert alert-danger\">
                    <ul class=\"mb-0\">
                        ";
            // line 28
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 28, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 29
                yield "                        <li>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["error"], "html", null, true);
                yield "</li>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 31
            yield "                    </ul>
                </div>
                ";
        }
        // line 34
        yield "
                <form method=\"post\" novalidate>
                    <div class=\"row\">
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"nomProduit\" class=\"form-label\">Product Name <span class=\"text-danger\">*</span></label>
                            <input type=\"text\" name=\"nomProduit\" id=\"nomProduit\" class=\"form-control ";
        // line 39
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "nomProduit", [], "any", true, true, false, 39)) {
            yield "is-invalid";
        }
        yield "\" value=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 39, $this->source); })()), "request", [], "any", false, false, false, 39), "request", [], "any", false, false, false, 39), "get", ["nomProduit", CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 39, $this->source); })()), "nomProduit", [], "any", false, false, false, 39)], "method", false, false, false, 39), "html", null, true);
        yield "\">
                        </div>

                        <div class=\"col-md-6 mb-3\">
                            <label for=\"adresse\" class=\"form-label\">Address <span class=\"text-danger\">*</span></label>
                            <input type=\"text\" name=\"adresse\" id=\"adresse\" class=\"form-control ";
        // line 44
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "adresse", [], "any", true, true, false, 44)) {
            yield "is-invalid";
        }
        yield "\" value=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 44, $this->source); })()), "request", [], "any", false, false, false, 44), "request", [], "any", false, false, false, 44), "get", ["adresse", CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 44, $this->source); })()), "adresse", [], "any", false, false, false, 44)], "method", false, false, false, 44), "html", null, true);
        yield "\">
                        </div>
                    </div>

                    ";
        // line 48
        if ((array_key_exists("aiCategorySuggestion", $context) && (isset($context["aiCategorySuggestion"]) || array_key_exists("aiCategorySuggestion", $context) ? $context["aiCategorySuggestion"] : (function () { throw new RuntimeError('Variable "aiCategorySuggestion" does not exist.', 48, $this->source); })()))) {
            // line 49
            yield "                    <div class=\"alert alert-info d-flex justify-content-between align-items-center\">
                        <div>
                            <strong>AI Suggestion:</strong>
                            ";
            // line 52
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["aiCategorySuggestion"]) || array_key_exists("aiCategorySuggestion", $context) ? $context["aiCategorySuggestion"] : (function () { throw new RuntimeError('Variable "aiCategorySuggestion" does not exist.', 52, $this->source); })()), "category", [], "any", false, false, false, 52), "nom", [], "any", false, false, false, 52), "html", null, true);
            yield "
                            (";
            // line 53
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["aiCategorySuggestion"]) || array_key_exists("aiCategorySuggestion", $context) ? $context["aiCategorySuggestion"] : (function () { throw new RuntimeError('Variable "aiCategorySuggestion" does not exist.', 53, $this->source); })()), "confidence", [], "any", false, false, false, 53), "html", null, true);
            yield "%)
                            <div class=\"small text-muted\">";
            // line 54
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["aiCategorySuggestion"]) || array_key_exists("aiCategorySuggestion", $context) ? $context["aiCategorySuggestion"] : (function () { throw new RuntimeError('Variable "aiCategorySuggestion" does not exist.', 54, $this->source); })()), "reason", [], "any", false, false, false, 54), "html", null, true);
            yield "</div>
                        </div>

                        <button type=\"submit\" name=\"suggestCategory\" value=\"1\" class=\"btn btn-sm btn-primary\">
                            Apply Suggestion
                        </button>
                    </div>
                    ";
        }
        // line 62
        yield "
                    <div class=\"mb-3\">
                        <label for=\"categorie\" class=\"form-label\">Category <span class=\"text-danger\">*</span></label>
                        ";
        // line 65
        $context["currentCategory"] = (((array_key_exists("selectedCategoryId", $context) && (isset($context["selectedCategoryId"]) || array_key_exists("selectedCategoryId", $context) ? $context["selectedCategoryId"] : (function () { throw new RuntimeError('Variable "selectedCategoryId" does not exist.', 65, $this->source); })()))) ? ((isset($context["selectedCategoryId"]) || array_key_exists("selectedCategoryId", $context) ? $context["selectedCategoryId"] : (function () { throw new RuntimeError('Variable "selectedCategoryId" does not exist.', 65, $this->source); })())) : (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 65, $this->source); })()), "request", [], "any", false, false, false, 65), "request", [], "any", false, false, false, 65), "get", ["categorie", CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 65, $this->source); })()), "categorie", [], "any", false, false, false, 65), "id", [], "any", false, false, false, 65)], "method", false, false, false, 65)));
        // line 66
        yield "                        <select name=\"categorie\" id=\"categorie\" class=\"form-select ";
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "categorie", [], "any", true, true, false, 66)) {
            yield "is-invalid";
        }
        yield "\">
                            <option value=\"\">Choose a category</option>
                            ";
        // line 68
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["categories"]) || array_key_exists("categories", $context) ? $context["categories"] : (function () { throw new RuntimeError('Variable "categories" does not exist.', 68, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["categorie"]) {
            // line 69
            yield "                            <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["categorie"], "id", [], "any", false, false, false, 69), "html", null, true);
            yield "\" ";
            if (((isset($context["currentCategory"]) || array_key_exists("currentCategory", $context) ? $context["currentCategory"] : (function () { throw new RuntimeError('Variable "currentCategory" does not exist.', 69, $this->source); })()) == CoreExtension::getAttribute($this->env, $this->source, $context["categorie"], "id", [], "any", false, false, false, 69))) {
                yield "selected";
            }
            yield ">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["categorie"], "nom", [], "any", false, false, false, 69), "html", null, true);
            yield "</option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['categorie'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 71
        yield "                        </select>
                    </div>

                    <div class=\"row\">
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"prix\" class=\"form-label\">Price (TND) <span class=\"text-danger\">*</span></label>
                            <div class=\"input-group\">
                                <span class=\"input-group-text\">TND</span>
                                <input type=\"number\" name=\"prix\" id=\"prix\" class=\"form-control ";
        // line 79
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "prix", [], "any", true, true, false, 79)) {
            yield "is-invalid";
        }
        yield "\" step=\"0.01\" min=\"0\" value=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 79, $this->source); })()), "request", [], "any", false, false, false, 79), "request", [], "any", false, false, false, 79), "get", ["prix", CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 79, $this->source); })()), "prix", [], "any", false, false, false, 79)], "method", false, false, false, 79), "html", null, true);
        yield "\">
                            </div>
                        </div>

                        <div class=\"col-md-6 mb-3\">
                            <label for=\"quantite\" class=\"form-label\">Quantity <span class=\"text-danger\">*</span></label>
                            <input type=\"number\" name=\"quantite\" id=\"quantite\" class=\"form-control ";
        // line 85
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "quantite", [], "any", true, true, false, 85)) {
            yield "is-invalid";
        }
        yield "\" min=\"0\" value=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 85, $this->source); })()), "request", [], "any", false, false, false, 85), "request", [], "any", false, false, false, 85), "get", ["quantite", CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 85, $this->source); })()), "quantite", [], "any", false, false, false, 85)], "method", false, false, false, 85), "html", null, true);
        yield "\">
                        </div>
                    </div>

                    <div class=\"mb-4\">
                        <label for=\"imageURL\" class=\"form-label\">Image URL <span class=\"text-muted small\">(Optional)</span></label>
                        <input type=\"url\" name=\"imageURL\" id=\"imageURL\" class=\"form-control\" value=\"";
        // line 91
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 91, $this->source); })()), "request", [], "any", false, false, false, 91), "request", [], "any", false, false, false, 91), "get", ["imageURL", (((CoreExtension::getAttribute($this->env, $this->source, ($context["produit"] ?? null), "imageURL", [], "any", true, true, false, 91) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 91, $this->source); })()), "imageURL", [], "any", false, false, false, 91)))) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 91, $this->source); })()), "imageURL", [], "any", false, false, false, 91)) : (""))], "method", false, false, false, 91), "html", null, true);
        yield "\" placeholder=\"https://example.com/image.jpg\">
                        <div class=\"form-text\">Enter a valid image URL (jpg, png, webp)</div>
                    </div>

                    <hr class=\"my-4\">

                    <div class=\"d-flex gap-2\">
                        <button type=\"submit\" class=\"btn btn-primary\">
                            <i class=\"bi bi-check-lg me-1\"></i> Update Product
                        </button>

                        <button type=\"submit\" name=\"suggestCategory\" value=\"1\" class=\"btn btn-outline-info\">
                            <i class=\"bi bi-stars me-1\"></i> Suggest Category
                        </button>

                        <a href=\"";
        // line 106
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 106, $this->source); })()), "id", [], "any", false, false, false, 106)]), "html", null, true);
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
        return "produit/edit.html.twig";
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
        return array (  322 => 106,  304 => 91,  291 => 85,  278 => 79,  268 => 71,  253 => 69,  249 => 68,  241 => 66,  239 => 65,  234 => 62,  223 => 54,  219 => 53,  215 => 52,  210 => 49,  208 => 48,  197 => 44,  185 => 39,  178 => 34,  173 => 31,  164 => 29,  160 => 28,  156 => 26,  154 => 25,  140 => 14,  136 => 12,  123 => 11,  107 => 7,  102 => 6,  89 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Edit {{ produit.nomProduit }}{% endblock %}

{% block breadcrumb %}
<li class=\"breadcrumb-item\"><a href=\"{{ path('app_produit_index') }}\">Products</a></li>
<li class=\"breadcrumb-item\"><a href=\"{{ path('app_produit_show', {'id': produit.id}) }}\">{{ produit.nomProduit }}</a></li>
<li class=\"breadcrumb-item active\">Edit</li>
{% endblock %}

{% block body %}
<div class=\"page-header\">
    <h1><i class=\"bi bi-pencil me-2\"></i>Edit Product</h1>
    <p>Update product information for <strong>{{ produit.nomProduit }}</strong></p>
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
                            <input type=\"text\" name=\"nomProduit\" id=\"nomProduit\" class=\"form-control {% if errors.nomProduit is defined %}is-invalid{% endif %}\" value=\"{{ app.request.request.get('nomProduit', produit.nomProduit) }}\">
                        </div>

                        <div class=\"col-md-6 mb-3\">
                            <label for=\"adresse\" class=\"form-label\">Address <span class=\"text-danger\">*</span></label>
                            <input type=\"text\" name=\"adresse\" id=\"adresse\" class=\"form-control {% if errors.adresse is defined %}is-invalid{% endif %}\" value=\"{{ app.request.request.get('adresse', produit.adresse) }}\">
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
                        {% set currentCategory = selectedCategoryId is defined and selectedCategoryId ? selectedCategoryId : app.request.request.get('categorie', produit.categorie.id) %}
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
                                <input type=\"number\" name=\"prix\" id=\"prix\" class=\"form-control {% if errors.prix is defined %}is-invalid{% endif %}\" step=\"0.01\" min=\"0\" value=\"{{ app.request.request.get('prix', produit.prix) }}\">
                            </div>
                        </div>

                        <div class=\"col-md-6 mb-3\">
                            <label for=\"quantite\" class=\"form-label\">Quantity <span class=\"text-danger\">*</span></label>
                            <input type=\"number\" name=\"quantite\" id=\"quantite\" class=\"form-control {% if errors.quantite is defined %}is-invalid{% endif %}\" min=\"0\" value=\"{{ app.request.request.get('quantite', produit.quantite) }}\">
                        </div>
                    </div>

                    <div class=\"mb-4\">
                        <label for=\"imageURL\" class=\"form-label\">Image URL <span class=\"text-muted small\">(Optional)</span></label>
                        <input type=\"url\" name=\"imageURL\" id=\"imageURL\" class=\"form-control\" value=\"{{ app.request.request.get('imageURL', produit.imageURL ?? '') }}\" placeholder=\"https://example.com/image.jpg\">
                        <div class=\"form-text\">Enter a valid image URL (jpg, png, webp)</div>
                    </div>

                    <hr class=\"my-4\">

                    <div class=\"d-flex gap-2\">
                        <button type=\"submit\" class=\"btn btn-primary\">
                            <i class=\"bi bi-check-lg me-1\"></i> Update Product
                        </button>

                        <button type=\"submit\" name=\"suggestCategory\" value=\"1\" class=\"btn btn-outline-info\">
                            <i class=\"bi bi-stars me-1\"></i> Suggest Category
                        </button>

                        <a href=\"{{ path('app_produit_show', {'id': produit.id}) }}\" class=\"btn btn-outline-secondary\">
                            <i class=\"bi bi-x-lg me-1\"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{% endblock %}", "produit/edit.html.twig", "C:\\Users\\Skaina\\Desktop\\final version symfony\\Marketplace-Project\\web\\templates\\produit\\edit.html.twig");
    }
}
