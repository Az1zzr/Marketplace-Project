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

/* feedback/new.html.twig */
class __TwigTemplate_a72080e5275d4d9b9a7bdb0b5eecfb24 extends Template
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
            'javascripts' => [$this, 'block_javascripts'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "feedback/new.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "feedback/new.html.twig"));

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

        yield "New Feedback";
        
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
        yield "<li><a href=\"";
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_feedback_index");
        yield "\">Feedbacks</a></li>
<li class=\"breadcrumb-item active\" aria-current=\"page\">New</li>
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
        $context["isDeliveryFeedback"] = ((isset($context["feedbackType"]) || array_key_exists("feedbackType", $context) ? $context["feedbackType"] : (function () { throw new RuntimeError('Variable "feedbackType" does not exist.', 11, $this->source); })()) == "delivery");
        // line 12
        yield "<div class=\"page-header\">
    <h1><i class=\"bi bi-chat-heart me-2\"></i>Create Feedback</h1>
    <p>";
        // line 14
        if ((($tmp = (isset($context["isDeliveryFeedback"]) || array_key_exists("isDeliveryFeedback", $context) ? $context["isDeliveryFeedback"] : (function () { throw new RuntimeError('Variable "isDeliveryFeedback" does not exist.', 14, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "Share a professional review about the delivery driver and the delivery experience.";
        } else {
            yield "Share your experience about a product you really purchased and received.";
        }
        yield "</p>
</div>

<div class=\"row\">
    <div class=\"col-lg-8\">
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\">Feedback Details</h5>
            </div>
            <div class=\"card-body\">
                ";
        // line 24
        if ((array_key_exists("errors", $context) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 24, $this->source); })())) > 0))) {
            // line 25
            yield "                <div class=\"alert alert-danger\">
                    <h6><i class=\"bi bi-exclamation-triangle-fill me-2\"></i>Please fix the following errors:</h6>
                    <ul class=\"mb-0 mt-2\">
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
                <form method=\"post\" id=\"feedbackForm\" novalidate>
                    ";
        // line 36
        if ((($tmp = (isset($context["isDeliveryFeedback"]) || array_key_exists("isDeliveryFeedback", $context) ? $context["isDeliveryFeedback"] : (function () { throw new RuntimeError('Variable "isDeliveryFeedback" does not exist.', 36, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 37
            yield "                    <div class=\"mb-4\">
                        <label class=\"form-label\">Delivered Order</label>
                        <div class=\"border rounded-4 p-3 bg-light\">
                            <div class=\"fw-semibold\">Driver ";
            // line 40
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["delivery"]) || array_key_exists("delivery", $context) ? $context["delivery"] : (function () { throw new RuntimeError('Variable "delivery" does not exist.', 40, $this->source); })()), "livreur", [], "any", false, false, false, 40), "html", null, true);
            yield "</div>
                            <div class=\"text-muted small mt-1\">
                                Order #";
            // line 42
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["delivery"]) || array_key_exists("delivery", $context) ? $context["delivery"] : (function () { throw new RuntimeError('Variable "delivery" does not exist.', 42, $this->source); })()), "commande", [], "any", false, false, false, 42), "numeroCommande", [], "any", false, false, false, 42), "html", null, true);
            yield " | Delivered on ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["delivery"]) || array_key_exists("delivery", $context) ? $context["delivery"] : (function () { throw new RuntimeError('Variable "delivery" does not exist.', 42, $this->source); })()), "dateLivraison", [], "any", false, false, false, 42), "Y-m-d"), "html", null, true);
            yield "
                            </div>
                        </div>
                        <div class=\"form-text\">You can review the driver only after the delivery has been completed.</div>
                    </div>
                    ";
        } else {
            // line 48
            yield "                    <div class=\"mb-4\">
                        <label for=\"ligneCommandeId\" class=\"form-label\">Purchased Product</label>
                        ";
            // line 50
            if ((($tmp = (isset($context["selectedLine"]) || array_key_exists("selectedLine", $context) ? $context["selectedLine"] : (function () { throw new RuntimeError('Variable "selectedLine" does not exist.', 50, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 51
                yield "                        <div class=\"border rounded-4 p-3 bg-light\">
                            <div class=\"fw-semibold\">";
                // line 52
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["selectedLine"]) || array_key_exists("selectedLine", $context) ? $context["selectedLine"] : (function () { throw new RuntimeError('Variable "selectedLine" does not exist.', 52, $this->source); })()), "produit", [], "any", false, false, false, 52), "nomProduit", [], "any", false, false, false, 52), "html", null, true);
                yield "</div>
                            <div class=\"text-muted small mt-1\">
                                Order #";
                // line 54
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["selectedLine"]) || array_key_exists("selectedLine", $context) ? $context["selectedLine"] : (function () { throw new RuntimeError('Variable "selectedLine" does not exist.', 54, $this->source); })()), "commande", [], "any", false, false, false, 54), "numeroCommande", [], "any", false, false, false, 54), "html", null, true);
                yield " | Quantity ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["selectedLine"]) || array_key_exists("selectedLine", $context) ? $context["selectedLine"] : (function () { throw new RuntimeError('Variable "selectedLine" does not exist.', 54, $this->source); })()), "quantite", [], "any", false, false, false, 54), "html", null, true);
                yield " | ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, (isset($context["selectedLine"]) || array_key_exists("selectedLine", $context) ? $context["selectedLine"] : (function () { throw new RuntimeError('Variable "selectedLine" does not exist.', 54, $this->source); })()), "prixUnitaire", [], "any", false, false, false, 54), 2, ".", ","), "html", null, true);
                yield " TND
                            </div>
                        </div>
                        <input type=\"hidden\" name=\"ligneCommandeId\" value=\"";
                // line 57
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["selectedLine"]) || array_key_exists("selectedLine", $context) ? $context["selectedLine"] : (function () { throw new RuntimeError('Variable "selectedLine" does not exist.', 57, $this->source); })()), "id", [], "any", false, false, false, 57), "html", null, true);
                yield "\">
                        ";
            } else {
                // line 59
                yield "                        <select name=\"ligneCommandeId\" id=\"ligneCommandeId\" class=\"form-select ";
                if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "ligneCommandeId", [], "array", true, true, false, 59)) {
                    yield "is-invalid";
                }
                yield "\">
                            <option value=\"\">Choose a purchased product</option>
                            ";
                // line 61
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable((isset($context["availableFeedbackItems"]) || array_key_exists("availableFeedbackItems", $context) ? $context["availableFeedbackItems"] : (function () { throw new RuntimeError('Variable "availableFeedbackItems" does not exist.', 61, $this->source); })()));
                foreach ($context['_seq'] as $context["_key"] => $context["ligne"]) {
                    // line 62
                    yield "                            <option value=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["ligne"], "id", [], "any", false, false, false, 62), "html", null, true);
                    yield "\" ";
                    if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 62, $this->source); })()), "request", [], "any", false, false, false, 62), "request", [], "any", false, false, false, 62), "get", ["ligneCommandeId"], "method", false, false, false, 62) == CoreExtension::getAttribute($this->env, $this->source, $context["ligne"], "id", [], "any", false, false, false, 62))) {
                        yield "selected";
                    }
                    yield ">
                                ";
                    // line 63
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["ligne"], "produit", [], "any", false, false, false, 63), "nomProduit", [], "any", false, false, false, 63), "html", null, true);
                    yield " | Order #";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["ligne"], "commande", [], "any", false, false, false, 63), "numeroCommande", [], "any", false, false, false, 63), "html", null, true);
                    yield " | Qty ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["ligne"], "quantite", [], "any", false, false, false, 63), "html", null, true);
                    yield "
                            </option>
                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['ligne'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 66
                yield "                        </select>
                        ";
                // line 67
                if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "ligneCommandeId", [], "array", true, true, false, 67)) {
                    // line 68
                    yield "                        <div class=\"invalid-feedback d-block\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 68, $this->source); })()), "ligneCommandeId", [], "array", false, false, false, 68), "html", null, true);
                    yield "</div>
                        ";
                }
                // line 70
                yield "                        ";
            }
            // line 71
            yield "                        <div class=\"form-text\">You can only leave feedback for products from orders that have already been delivered.</div>
                    </div>
                    ";
        }
        // line 74
        yield "
                    <div class=\"mb-4\">
                        <label for=\"titre\" class=\"form-label\">Review Title</label>
                        <input type=\"text\" name=\"titre\" id=\"titre\" class=\"form-control ";
        // line 77
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "titre", [], "array", true, true, false, 77)) {
            yield "is-invalid";
        }
        yield "\" value=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 77, $this->source); })()), "request", [], "any", false, false, false, 77), "request", [], "any", false, false, false, 77), "get", ["titre"], "method", false, false, false, 77), "html", null, true);
        yield "\" placeholder=\"";
        if ((($tmp = (isset($context["isDeliveryFeedback"]) || array_key_exists("isDeliveryFeedback", $context) ? $context["isDeliveryFeedback"] : (function () { throw new RuntimeError('Variable "isDeliveryFeedback" does not exist.', 77, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "Fast driver, careful delivery, very professional";
        } else {
            yield "Great quality, worth the price, excellent packaging";
        }
        yield "\">
                        ";
        // line 78
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "titre", [], "array", true, true, false, 78)) {
            // line 79
            yield "                        <div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 79, $this->source); })()), "titre", [], "array", false, false, false, 79), "html", null, true);
            yield "</div>
                        ";
        }
        // line 81
        yield "                    </div>

                    <div class=\"mb-4\">
                        <label class=\"form-label\">Mood</label>
                        ";
        // line 85
        $context["selectedMood"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 85, $this->source); })()), "request", [], "any", false, false, false, 85), "request", [], "any", false, false, false, 85), "get", ["ambiance"], "method", false, false, false, 85);
        // line 86
        yield "                        <div class=\"border rounded-3 p-3\">
                            ";
        // line 87
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable([["value" => "love", "emoji" => "😍", "label" => "Loved it"], ["value" => "happy", "emoji" => "😊", "label" => "Happy"], ["value" => "neutral", "emoji" => "😐", "label" => "Neutral"], ["value" => "sad", "emoji" => "😕", "label" => "Disappointed"], ["value" => "angry", "emoji" => "😡", "label" => "Frustrated"]]);
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["mood"]) {
            // line 94
            yield "                            <div class=\"form-check mb-2 ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 94)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "mb-0";
            }
            yield "\">
                                <input class=\"form-check-input\" type=\"radio\" name=\"ambiance\" id=\"ambiance_";
            // line 95
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["mood"], "value", [], "any", false, false, false, 95), "html", null, true);
            yield "\" value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["mood"], "value", [], "any", false, false, false, 95), "html", null, true);
            yield "\" ";
            if (((isset($context["selectedMood"]) || array_key_exists("selectedMood", $context) ? $context["selectedMood"] : (function () { throw new RuntimeError('Variable "selectedMood" does not exist.', 95, $this->source); })()) == CoreExtension::getAttribute($this->env, $this->source, $context["mood"], "value", [], "any", false, false, false, 95))) {
                yield "checked";
            }
            yield ">
                                <label class=\"form-check-label\" for=\"ambiance_";
            // line 96
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["mood"], "value", [], "any", false, false, false, 96), "html", null, true);
            yield "\">
                                    <span class=\"me-2\">";
            // line 97
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["mood"], "emoji", [], "any", false, false, false, 97), "html", null, true);
            yield "</span>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["mood"], "label", [], "any", false, false, false, 97), "html", null, true);
            yield "
                                </label>
                            </div>
                            ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['mood'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 101
        yield "                        </div>
                        ";
        // line 102
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "ambiance", [], "array", true, true, false, 102)) {
            // line 103
            yield "                        <div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 103, $this->source); })()), "ambiance", [], "array", false, false, false, 103), "html", null, true);
            yield "</div>
                        ";
        }
        // line 105
        yield "                    </div>

                    <div class=\"mb-4\">
                        <label for=\"note\" class=\"form-label\">Rating <span class=\"text-danger\">*</span></label>
                        <div class=\"rating-input\">
                            <div class=\"btn-group w-100\" role=\"group\">
                                <input type=\"radio\" class=\"btn-check\" name=\"note\" id=\"star1\" value=\"1\" ";
        // line 111
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 111, $this->source); })()), "request", [], "any", false, false, false, 111), "request", [], "any", false, false, false, 111), "get", ["note"], "method", false, false, false, 111) == "1")) {
            yield "checked";
        }
        yield ">
                                <label class=\"btn btn-outline-warning\" for=\"star1\">⭐ 1</label>
                                
                                <input type=\"radio\" class=\"btn-check\" name=\"note\" id=\"star2\" value=\"2\" ";
        // line 114
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 114, $this->source); })()), "request", [], "any", false, false, false, 114), "request", [], "any", false, false, false, 114), "get", ["note"], "method", false, false, false, 114) == "2")) {
            yield "checked";
        }
        yield ">
                                <label class=\"btn btn-outline-warning\" for=\"star2\">⭐⭐ 2</label>
                                
                                <input type=\"radio\" class=\"btn-check\" name=\"note\" id=\"star3\" value=\"3\" ";
        // line 117
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 117, $this->source); })()), "request", [], "any", false, false, false, 117), "request", [], "any", false, false, false, 117), "get", ["note"], "method", false, false, false, 117) == "3")) {
            yield "checked";
        }
        yield ">
                                <label class=\"btn btn-outline-warning\" for=\"star3\">⭐⭐⭐ 3</label>
                                
                                <input type=\"radio\" class=\"btn-check\" name=\"note\" id=\"star4\" value=\"4\" ";
        // line 120
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 120, $this->source); })()), "request", [], "any", false, false, false, 120), "request", [], "any", false, false, false, 120), "get", ["note"], "method", false, false, false, 120) == "4")) {
            yield "checked";
        }
        yield ">
                                <label class=\"btn btn-outline-warning\" for=\"star4\">⭐⭐⭐⭐ 4</label>
                                
                                <input type=\"radio\" class=\"btn-check\" name=\"note\" id=\"star5\" value=\"5\" ";
        // line 123
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 123, $this->source); })()), "request", [], "any", false, false, false, 123), "request", [], "any", false, false, false, 123), "get", ["note"], "method", false, false, false, 123) == "5")) {
            yield "checked";
        }
        yield ">
                                <label class=\"btn btn-outline-warning\" for=\"star5\">⭐⭐⭐⭐⭐ 5</label>
                            </div>
                        </div>
                        ";
        // line 127
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "note", [], "array", true, true, false, 127)) {
            // line 128
            yield "                        <div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 128, $this->source); })()), "note", [], "array", false, false, false, 128), "html", null, true);
            yield "</div>
                        ";
        }
        // line 130
        yield "                    </div>
                    
                    <div class=\"mb-4\">
                        <label class=\"form-label\">Would You Recommend ";
        // line 133
        if ((($tmp = (isset($context["isDeliveryFeedback"]) || array_key_exists("isDeliveryFeedback", $context) ? $context["isDeliveryFeedback"] : (function () { throw new RuntimeError('Variable "isDeliveryFeedback" does not exist.', 133, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "This Driver";
        } else {
            yield "This Product";
        }
        yield "?</label>
                        ";
        // line 134
        $context["selectedRecommendation"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 134, $this->source); })()), "request", [], "any", false, false, false, 134), "request", [], "any", false, false, false, 134), "get", ["recommande"], "method", false, false, false, 134);
        // line 135
        yield "                        <div class=\"border rounded-3 p-3\">
                            <div class=\"form-check mb-2\">
                                <input class=\"form-check-input\" type=\"radio\" name=\"recommande\" id=\"recommande_yes\" value=\"yes\" ";
        // line 137
        if (((isset($context["selectedRecommendation"]) || array_key_exists("selectedRecommendation", $context) ? $context["selectedRecommendation"] : (function () { throw new RuntimeError('Variable "selectedRecommendation" does not exist.', 137, $this->source); })()) == "yes")) {
            yield "checked";
        }
        yield ">
                                <label class=\"form-check-label\" for=\"recommande_yes\">Yes, I would recommend it</label>
                            </div>
                            <div class=\"form-check mb-0\">
                                <input class=\"form-check-input\" type=\"radio\" name=\"recommande\" id=\"recommande_no\" value=\"no\" ";
        // line 141
        if (((isset($context["selectedRecommendation"]) || array_key_exists("selectedRecommendation", $context) ? $context["selectedRecommendation"] : (function () { throw new RuntimeError('Variable "selectedRecommendation" does not exist.', 141, $this->source); })()) == "no")) {
            yield "checked";
        }
        yield ">
                                <label class=\"form-check-label\" for=\"recommande_no\">No, I would not recommend it</label>
                            </div>
                        </div>
                        ";
        // line 145
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "recommande", [], "array", true, true, false, 145)) {
            // line 146
            yield "                        <div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 146, $this->source); })()), "recommande", [], "array", false, false, false, 146), "html", null, true);
            yield "</div>
                        ";
        }
        // line 148
        yield "                    </div>

                    <div class=\"mb-4\">
                        <label for=\"commentaire\" class=\"form-label\">Your Comment <span class=\"text-danger\">*</span></label>
                        <textarea 
                            name=\"commentaire\" 
                            id=\"commentaire\" 
                            class=\"form-control ";
        // line 155
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "commentaire", [], "array", true, true, false, 155) || CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "profanity", [], "array", true, true, false, 155))) {
            yield "is-invalid";
        }
        yield "\" 
                            rows=\"5\" 
                            placeholder=\"";
        // line 157
        if ((($tmp = (isset($context["isDeliveryFeedback"]) || array_key_exists("isDeliveryFeedback", $context) ? $context["isDeliveryFeedback"] : (function () { throw new RuntimeError('Variable "isDeliveryFeedback" does not exist.', 157, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "Describe the driver's professionalism, punctuality, package handling, and overall delivery quality...";
        } else {
            yield "Tell us about the product quality, packaging, usability, and overall value...";
        }
        yield "\"
                        >";
        // line 158
        if (array_key_exists("errors", $context)) {
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 158, $this->source); })()), "request", [], "any", false, false, false, 158), "request", [], "any", false, false, false, 158), "get", ["commentaire"], "method", false, false, false, 158), "html", null, true);
        }
        yield "</textarea>
                        ";
        // line 159
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "commentaire", [], "array", true, true, false, 159)) {
            // line 160
            yield "                        <div class=\"invalid-feedback\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 160, $this->source); })()), "commentaire", [], "array", false, false, false, 160), "html", null, true);
            yield "</div>
                        ";
        }
        // line 162
        yield "                        ";
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "profanity", [], "array", true, true, false, 162)) {
            // line 163
            yield "                        <div class=\"invalid-feedback d-block\">
                            <i class=\"bi bi-shield-exclamation me-1\"></i>";
            // line 164
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 164, $this->source); })()), "profanity", [], "array", false, false, false, 164), "html", null, true);
            yield "
                        </div>
                        ";
        }
        // line 167
        yield "                        <div class=\"form-text\">Your comment will be checked for inappropriate language.</div>
                        <div class=\"mt-3 d-flex align-items-center gap-2 flex-wrap\">
                            <button type=\"button\" class=\"btn btn-outline-primary btn-sm\" data-spellcheck-target=\"#commentaire\" data-spellcheck-result=\"#feedback-spellcheck-result\">
                                <i class=\"bi bi-spellcheck me-1\"></i> Verifier l'orthographe
                            </button>
                        </div>
                        <div id=\"feedback-spellcheck-result\" hidden></div>
                    </div>

                    <div class=\"d-flex gap-2\">
                        <button type=\"submit\" class=\"btn btn-primary\">
                            <i class=\"bi bi-check-lg me-1\"></i> Submit Feedback
                        </button>
                        <a href=\"";
        // line 180
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_feedback_index");
        yield "\" class=\"btn btn-outline-secondary\">
                            <i class=\"bi bi-x-lg me-1\"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class=\"col-lg-4\">
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\"><i class=\"bi bi-info-circle me-2\"></i>Guidelines</h5>
            </div>
            <div class=\"card-body\">
                <ul class=\"list-unstyled mb-0\">
                    <li class=\"mb-3\">
                        <i class=\"bi bi-check-circle-fill text-success me-2\"></i>
                        Be honest and constructive
                    </li>
                    <li class=\"mb-3\">
                        <i class=\"bi bi-check-circle-fill text-success me-2\"></i>
                        Provide specific details
                    </li>
                    <li class=\"mb-3\">
                        <i class=\"bi bi-check-circle-fill text-success me-2\"></i>
                        Keep it respectful and professional
                    </li>
                    <li class=\"mb-3\">
                        <i class=\"bi bi-check-circle-fill text-success me-2\"></i>
                        Match your title, emoji mood, and rating to your real experience
                    </li>
                    <li class=\"mb-3\">
                        <i class=\"bi bi-x-circle-fill text-danger me-2\"></i>
                        No inappropriate language
                    </li>
                    <li>
                        <i class=\"bi bi-x-circle-fill text-danger me-2\"></i>
                        No personal attacks
                    </li>
                </ul>
            </div>
        </div>
        
    </div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 228
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 229
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
";
        // line 230
        yield from $this->load("feedback/_spellcheck_script.html.twig", 230)->unwrap()->yield($context);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "feedback/new.html.twig";
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
        return array (  636 => 230,  632 => 229,  619 => 228,  561 => 180,  546 => 167,  540 => 164,  537 => 163,  534 => 162,  528 => 160,  526 => 159,  520 => 158,  512 => 157,  505 => 155,  496 => 148,  490 => 146,  488 => 145,  479 => 141,  470 => 137,  466 => 135,  464 => 134,  456 => 133,  451 => 130,  445 => 128,  443 => 127,  434 => 123,  426 => 120,  418 => 117,  410 => 114,  402 => 111,  394 => 105,  388 => 103,  386 => 102,  383 => 101,  363 => 97,  359 => 96,  349 => 95,  342 => 94,  325 => 87,  322 => 86,  320 => 85,  314 => 81,  308 => 79,  306 => 78,  292 => 77,  287 => 74,  282 => 71,  279 => 70,  273 => 68,  271 => 67,  268 => 66,  255 => 63,  246 => 62,  242 => 61,  234 => 59,  229 => 57,  219 => 54,  214 => 52,  211 => 51,  209 => 50,  205 => 48,  194 => 42,  189 => 40,  184 => 37,  182 => 36,  178 => 34,  173 => 31,  164 => 29,  160 => 28,  155 => 25,  153 => 24,  136 => 14,  132 => 12,  130 => 11,  117 => 10,  102 => 6,  89 => 5,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}New Feedback{% endblock %}

{% block breadcrumb %}
<li><a href=\"{{ path('app_feedback_index') }}\">Feedbacks</a></li>
<li class=\"breadcrumb-item active\" aria-current=\"page\">New</li>
{% endblock %}

{% block body %}
{% set isDeliveryFeedback = feedbackType == 'delivery' %}
<div class=\"page-header\">
    <h1><i class=\"bi bi-chat-heart me-2\"></i>Create Feedback</h1>
    <p>{% if isDeliveryFeedback %}Share a professional review about the delivery driver and the delivery experience.{% else %}Share your experience about a product you really purchased and received.{% endif %}</p>
</div>

<div class=\"row\">
    <div class=\"col-lg-8\">
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\">Feedback Details</h5>
            </div>
            <div class=\"card-body\">
                {% if errors is defined and errors|length > 0 %}
                <div class=\"alert alert-danger\">
                    <h6><i class=\"bi bi-exclamation-triangle-fill me-2\"></i>Please fix the following errors:</h6>
                    <ul class=\"mb-0 mt-2\">
                        {% for error in errors %}
                        <li>{{ error }}</li>
                        {% endfor %}
                    </ul>
                </div>
                {% endif %}

                <form method=\"post\" id=\"feedbackForm\" novalidate>
                    {% if isDeliveryFeedback %}
                    <div class=\"mb-4\">
                        <label class=\"form-label\">Delivered Order</label>
                        <div class=\"border rounded-4 p-3 bg-light\">
                            <div class=\"fw-semibold\">Driver {{ delivery.livreur }}</div>
                            <div class=\"text-muted small mt-1\">
                                Order #{{ delivery.commande.numeroCommande }} | Delivered on {{ delivery.dateLivraison|date('Y-m-d') }}
                            </div>
                        </div>
                        <div class=\"form-text\">You can review the driver only after the delivery has been completed.</div>
                    </div>
                    {% else %}
                    <div class=\"mb-4\">
                        <label for=\"ligneCommandeId\" class=\"form-label\">Purchased Product</label>
                        {% if selectedLine %}
                        <div class=\"border rounded-4 p-3 bg-light\">
                            <div class=\"fw-semibold\">{{ selectedLine.produit.nomProduit }}</div>
                            <div class=\"text-muted small mt-1\">
                                Order #{{ selectedLine.commande.numeroCommande }} | Quantity {{ selectedLine.quantite }} | {{ selectedLine.prixUnitaire|number_format(2, '.', ',') }} TND
                            </div>
                        </div>
                        <input type=\"hidden\" name=\"ligneCommandeId\" value=\"{{ selectedLine.id }}\">
                        {% else %}
                        <select name=\"ligneCommandeId\" id=\"ligneCommandeId\" class=\"form-select {% if errors['ligneCommandeId'] is defined %}is-invalid{% endif %}\">
                            <option value=\"\">Choose a purchased product</option>
                            {% for ligne in availableFeedbackItems %}
                            <option value=\"{{ ligne.id }}\" {% if app.request.request.get('ligneCommandeId') == ligne.id %}selected{% endif %}>
                                {{ ligne.produit.nomProduit }} | Order #{{ ligne.commande.numeroCommande }} | Qty {{ ligne.quantite }}
                            </option>
                            {% endfor %}
                        </select>
                        {% if errors['ligneCommandeId'] is defined %}
                        <div class=\"invalid-feedback d-block\">{{ errors['ligneCommandeId'] }}</div>
                        {% endif %}
                        {% endif %}
                        <div class=\"form-text\">You can only leave feedback for products from orders that have already been delivered.</div>
                    </div>
                    {% endif %}

                    <div class=\"mb-4\">
                        <label for=\"titre\" class=\"form-label\">Review Title</label>
                        <input type=\"text\" name=\"titre\" id=\"titre\" class=\"form-control {% if errors['titre'] is defined %}is-invalid{% endif %}\" value=\"{{ app.request.request.get('titre') }}\" placeholder=\"{% if isDeliveryFeedback %}Fast driver, careful delivery, very professional{% else %}Great quality, worth the price, excellent packaging{% endif %}\">
                        {% if errors['titre'] is defined %}
                        <div class=\"invalid-feedback d-block\">{{ errors['titre'] }}</div>
                        {% endif %}
                    </div>

                    <div class=\"mb-4\">
                        <label class=\"form-label\">Mood</label>
                        {% set selectedMood = app.request.request.get('ambiance') %}
                        <div class=\"border rounded-3 p-3\">
                            {% for mood in [
                                {'value': 'love', 'emoji': '😍', 'label': 'Loved it'},
                                {'value': 'happy', 'emoji': '😊', 'label': 'Happy'},
                                {'value': 'neutral', 'emoji': '😐', 'label': 'Neutral'},
                                {'value': 'sad', 'emoji': '😕', 'label': 'Disappointed'},
                                {'value': 'angry', 'emoji': '😡', 'label': 'Frustrated'}
                            ] %}
                            <div class=\"form-check mb-2 {% if loop.last %}mb-0{% endif %}\">
                                <input class=\"form-check-input\" type=\"radio\" name=\"ambiance\" id=\"ambiance_{{ mood.value }}\" value=\"{{ mood.value }}\" {% if selectedMood == mood.value %}checked{% endif %}>
                                <label class=\"form-check-label\" for=\"ambiance_{{ mood.value }}\">
                                    <span class=\"me-2\">{{ mood.emoji }}</span>{{ mood.label }}
                                </label>
                            </div>
                            {% endfor %}
                        </div>
                        {% if errors['ambiance'] is defined %}
                        <div class=\"invalid-feedback d-block\">{{ errors['ambiance'] }}</div>
                        {% endif %}
                    </div>

                    <div class=\"mb-4\">
                        <label for=\"note\" class=\"form-label\">Rating <span class=\"text-danger\">*</span></label>
                        <div class=\"rating-input\">
                            <div class=\"btn-group w-100\" role=\"group\">
                                <input type=\"radio\" class=\"btn-check\" name=\"note\" id=\"star1\" value=\"1\" {% if app.request.request.get('note') == '1' %}checked{% endif %}>
                                <label class=\"btn btn-outline-warning\" for=\"star1\">⭐ 1</label>
                                
                                <input type=\"radio\" class=\"btn-check\" name=\"note\" id=\"star2\" value=\"2\" {% if app.request.request.get('note') == '2' %}checked{% endif %}>
                                <label class=\"btn btn-outline-warning\" for=\"star2\">⭐⭐ 2</label>
                                
                                <input type=\"radio\" class=\"btn-check\" name=\"note\" id=\"star3\" value=\"3\" {% if app.request.request.get('note') == '3' %}checked{% endif %}>
                                <label class=\"btn btn-outline-warning\" for=\"star3\">⭐⭐⭐ 3</label>
                                
                                <input type=\"radio\" class=\"btn-check\" name=\"note\" id=\"star4\" value=\"4\" {% if app.request.request.get('note') == '4' %}checked{% endif %}>
                                <label class=\"btn btn-outline-warning\" for=\"star4\">⭐⭐⭐⭐ 4</label>
                                
                                <input type=\"radio\" class=\"btn-check\" name=\"note\" id=\"star5\" value=\"5\" {% if app.request.request.get('note') == '5' %}checked{% endif %}>
                                <label class=\"btn btn-outline-warning\" for=\"star5\">⭐⭐⭐⭐⭐ 5</label>
                            </div>
                        </div>
                        {% if errors['note'] is defined %}
                        <div class=\"invalid-feedback d-block\">{{ errors['note'] }}</div>
                        {% endif %}
                    </div>
                    
                    <div class=\"mb-4\">
                        <label class=\"form-label\">Would You Recommend {% if isDeliveryFeedback %}This Driver{% else %}This Product{% endif %}?</label>
                        {% set selectedRecommendation = app.request.request.get('recommande') %}
                        <div class=\"border rounded-3 p-3\">
                            <div class=\"form-check mb-2\">
                                <input class=\"form-check-input\" type=\"radio\" name=\"recommande\" id=\"recommande_yes\" value=\"yes\" {% if selectedRecommendation == 'yes' %}checked{% endif %}>
                                <label class=\"form-check-label\" for=\"recommande_yes\">Yes, I would recommend it</label>
                            </div>
                            <div class=\"form-check mb-0\">
                                <input class=\"form-check-input\" type=\"radio\" name=\"recommande\" id=\"recommande_no\" value=\"no\" {% if selectedRecommendation == 'no' %}checked{% endif %}>
                                <label class=\"form-check-label\" for=\"recommande_no\">No, I would not recommend it</label>
                            </div>
                        </div>
                        {% if errors['recommande'] is defined %}
                        <div class=\"invalid-feedback d-block\">{{ errors['recommande'] }}</div>
                        {% endif %}
                    </div>

                    <div class=\"mb-4\">
                        <label for=\"commentaire\" class=\"form-label\">Your Comment <span class=\"text-danger\">*</span></label>
                        <textarea 
                            name=\"commentaire\" 
                            id=\"commentaire\" 
                            class=\"form-control {% if errors['commentaire'] is defined or errors['profanity'] is defined %}is-invalid{% endif %}\" 
                            rows=\"5\" 
                            placeholder=\"{% if isDeliveryFeedback %}Describe the driver's professionalism, punctuality, package handling, and overall delivery quality...{% else %}Tell us about the product quality, packaging, usability, and overall value...{% endif %}\"
                        >{% if errors is defined %}{{ app.request.request.get('commentaire') }}{% endif %}</textarea>
                        {% if errors['commentaire'] is defined %}
                        <div class=\"invalid-feedback\">{{ errors['commentaire'] }}</div>
                        {% endif %}
                        {% if errors['profanity'] is defined %}
                        <div class=\"invalid-feedback d-block\">
                            <i class=\"bi bi-shield-exclamation me-1\"></i>{{ errors['profanity'] }}
                        </div>
                        {% endif %}
                        <div class=\"form-text\">Your comment will be checked for inappropriate language.</div>
                        <div class=\"mt-3 d-flex align-items-center gap-2 flex-wrap\">
                            <button type=\"button\" class=\"btn btn-outline-primary btn-sm\" data-spellcheck-target=\"#commentaire\" data-spellcheck-result=\"#feedback-spellcheck-result\">
                                <i class=\"bi bi-spellcheck me-1\"></i> Verifier l'orthographe
                            </button>
                        </div>
                        <div id=\"feedback-spellcheck-result\" hidden></div>
                    </div>

                    <div class=\"d-flex gap-2\">
                        <button type=\"submit\" class=\"btn btn-primary\">
                            <i class=\"bi bi-check-lg me-1\"></i> Submit Feedback
                        </button>
                        <a href=\"{{ path('app_feedback_index') }}\" class=\"btn btn-outline-secondary\">
                            <i class=\"bi bi-x-lg me-1\"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class=\"col-lg-4\">
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\"><i class=\"bi bi-info-circle me-2\"></i>Guidelines</h5>
            </div>
            <div class=\"card-body\">
                <ul class=\"list-unstyled mb-0\">
                    <li class=\"mb-3\">
                        <i class=\"bi bi-check-circle-fill text-success me-2\"></i>
                        Be honest and constructive
                    </li>
                    <li class=\"mb-3\">
                        <i class=\"bi bi-check-circle-fill text-success me-2\"></i>
                        Provide specific details
                    </li>
                    <li class=\"mb-3\">
                        <i class=\"bi bi-check-circle-fill text-success me-2\"></i>
                        Keep it respectful and professional
                    </li>
                    <li class=\"mb-3\">
                        <i class=\"bi bi-check-circle-fill text-success me-2\"></i>
                        Match your title, emoji mood, and rating to your real experience
                    </li>
                    <li class=\"mb-3\">
                        <i class=\"bi bi-x-circle-fill text-danger me-2\"></i>
                        No inappropriate language
                    </li>
                    <li>
                        <i class=\"bi bi-x-circle-fill text-danger me-2\"></i>
                        No personal attacks
                    </li>
                </ul>
            </div>
        </div>
        
    </div>
</div>
{% endblock %}

{% block javascripts %}
{{ parent() }}
{% include 'feedback/_spellcheck_script.html.twig' %}
{% endblock %}
", "feedback/new.html.twig", "C:\\Users\\Skaina\\Desktop\\final version symfony\\Marketplace-Project\\web\\templates\\feedback\\new.html.twig");
    }
}
