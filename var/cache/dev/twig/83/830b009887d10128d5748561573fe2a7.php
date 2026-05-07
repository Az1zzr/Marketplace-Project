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

/* feedback/edit.html.twig */
class __TwigTemplate_ada18e7c878e40f65d96ab5cde81a5d0 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "feedback/edit.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "feedback/edit.html.twig"));

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

        yield "Edit Feedback";
        
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
<li class=\"breadcrumb-item active\" aria-current=\"page\">Edit #";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 7, $this->source); })()), "id", [], "any", false, false, false, 7), "html", null, true);
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
        $context["isDeliveryFeedback"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 11, $this->source); })()), "isDeliveryFeedback", [], "any", false, false, false, 11);
        // line 12
        yield "<div class=\"page-header\">
    <h1><i class=\"bi bi-pencil me-2\"></i>Edit Feedback #";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 13, $this->source); })()), "id", [], "any", false, false, false, 13), "html", null, true);
        yield "</h1>
    <p>Update the feedback details below</p>
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
            foreach ($context['_seq'] as $context["field"] => $context["error"]) {
                // line 29
                yield "                        <li>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["error"], "html", null, true);
                yield "</li>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['field'], $context['error'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 31
            yield "                    </ul>
                </div>
                ";
        }
        // line 34
        yield "
                <form method=\"post\" novalidate>
                    <div class=\"mb-4\">
                        <label for=\"titre\" class=\"form-label\">Review Title</label>
                        <input type=\"text\" name=\"titre\" id=\"titre\" class=\"form-control ";
        // line 38
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "titre", [], "array", true, true, false, 38)) {
            yield "is-invalid";
        }
        yield "\" value=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 38, $this->source); })()), "request", [], "any", false, false, false, 38), "request", [], "any", false, false, false, 38), "get", ["titre", CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 38, $this->source); })()), "titre", [], "any", false, false, false, 38)], "method", false, false, false, 38), "html", null, true);
        yield "\">
                        ";
        // line 39
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "titre", [], "array", true, true, false, 39)) {
            // line 40
            yield "                        <div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 40, $this->source); })()), "titre", [], "array", false, false, false, 40), "html", null, true);
            yield "</div>
                        ";
        }
        // line 42
        yield "                    </div>

                    <div class=\"mb-4\">
                        <label class=\"form-label\">Mood</label>
                        ";
        // line 46
        $context["selectedMood"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 46, $this->source); })()), "request", [], "any", false, false, false, 46), "request", [], "any", false, false, false, 46), "get", ["ambiance", CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 46, $this->source); })()), "ambiance", [], "any", false, false, false, 46)], "method", false, false, false, 46);
        // line 47
        yield "                        <div class=\"border rounded-3 p-3\">
                            ";
        // line 48
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
            // line 55
            yield "                            <div class=\"form-check mb-2 ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 55)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "mb-0";
            }
            yield "\">
                                <input class=\"form-check-input\" type=\"radio\" name=\"ambiance\" id=\"edit_ambiance_";
            // line 56
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["mood"], "value", [], "any", false, false, false, 56), "html", null, true);
            yield "\" value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["mood"], "value", [], "any", false, false, false, 56), "html", null, true);
            yield "\" ";
            if (((isset($context["selectedMood"]) || array_key_exists("selectedMood", $context) ? $context["selectedMood"] : (function () { throw new RuntimeError('Variable "selectedMood" does not exist.', 56, $this->source); })()) == CoreExtension::getAttribute($this->env, $this->source, $context["mood"], "value", [], "any", false, false, false, 56))) {
                yield "checked";
            }
            yield ">
                                <label class=\"form-check-label\" for=\"edit_ambiance_";
            // line 57
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["mood"], "value", [], "any", false, false, false, 57), "html", null, true);
            yield "\">
                                    <span class=\"me-2\">";
            // line 58
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["mood"], "emoji", [], "any", false, false, false, 58), "html", null, true);
            yield "</span>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["mood"], "label", [], "any", false, false, false, 58), "html", null, true);
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
        // line 62
        yield "                        </div>
                        ";
        // line 63
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "ambiance", [], "array", true, true, false, 63)) {
            // line 64
            yield "                        <div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 64, $this->source); })()), "ambiance", [], "array", false, false, false, 64), "html", null, true);
            yield "</div>
                        ";
        }
        // line 66
        yield "                    </div>

                    <div class=\"mb-4\">
                        <label class=\"form-label\">Rating <span class=\"text-danger\">*</span></label>
                        ";
        // line 70
        $context["selectedNote"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 70, $this->source); })()), "request", [], "any", false, false, false, 70), "request", [], "any", false, false, false, 70), "get", ["note", CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 70, $this->source); })()), "note", [], "any", false, false, false, 70)], "method", false, false, false, 70);
        // line 71
        yield "                        <div class=\"rating-input\">
                            <div class=\"btn-group w-100\" role=\"group\">
                                <input type=\"radio\" class=\"btn-check\" name=\"note\" id=\"star1\" value=\"1\" ";
        // line 73
        if (((isset($context["selectedNote"]) || array_key_exists("selectedNote", $context) ? $context["selectedNote"] : (function () { throw new RuntimeError('Variable "selectedNote" does not exist.', 73, $this->source); })()) == "1")) {
            yield "checked";
        }
        yield ">
                                <label class=\"btn btn-outline-warning ";
        // line 74
        if (((isset($context["selectedNote"]) || array_key_exists("selectedNote", $context) ? $context["selectedNote"] : (function () { throw new RuntimeError('Variable "selectedNote" does not exist.', 74, $this->source); })()) == "1")) {
            yield "active";
        }
        yield "\" for=\"star1\">⭐ 1</label>
                                
                                <input type=\"radio\" class=\"btn-check\" name=\"note\" id=\"star2\" value=\"2\" ";
        // line 76
        if (((isset($context["selectedNote"]) || array_key_exists("selectedNote", $context) ? $context["selectedNote"] : (function () { throw new RuntimeError('Variable "selectedNote" does not exist.', 76, $this->source); })()) == "2")) {
            yield "checked";
        }
        yield ">
                                <label class=\"btn btn-outline-warning ";
        // line 77
        if (((isset($context["selectedNote"]) || array_key_exists("selectedNote", $context) ? $context["selectedNote"] : (function () { throw new RuntimeError('Variable "selectedNote" does not exist.', 77, $this->source); })()) == "2")) {
            yield "active";
        }
        yield "\" for=\"star2\">⭐⭐ 2</label>
                                
                                <input type=\"radio\" class=\"btn-check\" name=\"note\" id=\"star3\" value=\"3\" ";
        // line 79
        if (((isset($context["selectedNote"]) || array_key_exists("selectedNote", $context) ? $context["selectedNote"] : (function () { throw new RuntimeError('Variable "selectedNote" does not exist.', 79, $this->source); })()) == "3")) {
            yield "checked";
        }
        yield ">
                                <label class=\"btn btn-outline-warning ";
        // line 80
        if (((isset($context["selectedNote"]) || array_key_exists("selectedNote", $context) ? $context["selectedNote"] : (function () { throw new RuntimeError('Variable "selectedNote" does not exist.', 80, $this->source); })()) == "3")) {
            yield "active";
        }
        yield "\" for=\"star3\">⭐⭐⭐ 3</label>
                                
                                <input type=\"radio\" class=\"btn-check\" name=\"note\" id=\"star4\" value=\"4\" ";
        // line 82
        if (((isset($context["selectedNote"]) || array_key_exists("selectedNote", $context) ? $context["selectedNote"] : (function () { throw new RuntimeError('Variable "selectedNote" does not exist.', 82, $this->source); })()) == "4")) {
            yield "checked";
        }
        yield ">
                                <label class=\"btn btn-outline-warning ";
        // line 83
        if (((isset($context["selectedNote"]) || array_key_exists("selectedNote", $context) ? $context["selectedNote"] : (function () { throw new RuntimeError('Variable "selectedNote" does not exist.', 83, $this->source); })()) == "4")) {
            yield "active";
        }
        yield "\" for=\"star4\">⭐⭐⭐⭐ 4</label>
                                
                                <input type=\"radio\" class=\"btn-check\" name=\"note\" id=\"star5\" value=\"5\" ";
        // line 85
        if (((isset($context["selectedNote"]) || array_key_exists("selectedNote", $context) ? $context["selectedNote"] : (function () { throw new RuntimeError('Variable "selectedNote" does not exist.', 85, $this->source); })()) == "5")) {
            yield "checked";
        }
        yield ">
                                <label class=\"btn btn-outline-warning ";
        // line 86
        if (((isset($context["selectedNote"]) || array_key_exists("selectedNote", $context) ? $context["selectedNote"] : (function () { throw new RuntimeError('Variable "selectedNote" does not exist.', 86, $this->source); })()) == "5")) {
            yield "active";
        }
        yield "\" for=\"star5\">⭐⭐⭐⭐⭐ 5</label>
                            </div>
                        </div>
                        ";
        // line 89
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "note", [], "array", true, true, false, 89)) {
            // line 90
            yield "                        <div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 90, $this->source); })()), "note", [], "array", false, false, false, 90), "html", null, true);
            yield "</div>
                        ";
        }
        // line 92
        yield "                    </div>

                    <div class=\"mb-4\">
                        <label class=\"form-label\">Would You Recommend ";
        // line 95
        if ((($tmp = (isset($context["isDeliveryFeedback"]) || array_key_exists("isDeliveryFeedback", $context) ? $context["isDeliveryFeedback"] : (function () { throw new RuntimeError('Variable "isDeliveryFeedback" does not exist.', 95, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "This Driver";
        } else {
            yield "This Product";
        }
        yield "?</label>
                        ";
        // line 96
        $context["selectedRecommendation"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 96, $this->source); })()), "request", [], "any", false, false, false, 96), "request", [], "any", false, false, false, 96), "get", ["recommande", (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 96, $this->source); })()), "recommande", [], "any", false, false, false, 96) === true)) ? ("yes") : ((((CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 96, $this->source); })()), "recommande", [], "any", false, false, false, 96) === false)) ? ("no") : (""))))], "method", false, false, false, 96);
        // line 97
        yield "                        <div class=\"border rounded-3 p-3\">
                            <div class=\"form-check mb-2\">
                                <input class=\"form-check-input\" type=\"radio\" name=\"recommande\" id=\"edit_recommande_yes\" value=\"yes\" ";
        // line 99
        if (((isset($context["selectedRecommendation"]) || array_key_exists("selectedRecommendation", $context) ? $context["selectedRecommendation"] : (function () { throw new RuntimeError('Variable "selectedRecommendation" does not exist.', 99, $this->source); })()) == "yes")) {
            yield "checked";
        }
        yield ">
                                <label class=\"form-check-label\" for=\"edit_recommande_yes\">Yes, I would recommend it</label>
                            </div>
                            <div class=\"form-check mb-0\">
                                <input class=\"form-check-input\" type=\"radio\" name=\"recommande\" id=\"edit_recommande_no\" value=\"no\" ";
        // line 103
        if (((isset($context["selectedRecommendation"]) || array_key_exists("selectedRecommendation", $context) ? $context["selectedRecommendation"] : (function () { throw new RuntimeError('Variable "selectedRecommendation" does not exist.', 103, $this->source); })()) == "no")) {
            yield "checked";
        }
        yield ">
                                <label class=\"form-check-label\" for=\"edit_recommande_no\">No, I would not recommend it</label>
                            </div>
                        </div>
                        ";
        // line 107
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "recommande", [], "array", true, true, false, 107)) {
            // line 108
            yield "                        <div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 108, $this->source); })()), "recommande", [], "array", false, false, false, 108), "html", null, true);
            yield "</div>
                        ";
        }
        // line 110
        yield "                    </div>
                    
                    <div class=\"mb-4\">
                        <label for=\"commentaire\" class=\"form-label\">Comment <span class=\"text-danger\">*</span></label>
                        <textarea 
                            name=\"commentaire\" 
                            id=\"commentaire\" 
                            class=\"form-control ";
        // line 117
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "commentaire", [], "array", true, true, false, 117) || CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "profanity", [], "array", true, true, false, 117))) {
            yield "is-invalid";
        }
        yield "\" 
                            rows=\"5\"
                        >";
        // line 119
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 119, $this->source); })()), "request", [], "any", false, false, false, 119), "request", [], "any", false, false, false, 119), "get", ["commentaire", CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 119, $this->source); })()), "commentaire", [], "any", false, false, false, 119)], "method", false, false, false, 119), "html", null, true);
        yield "</textarea>
                        ";
        // line 120
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "commentaire", [], "array", true, true, false, 120)) {
            // line 121
            yield "                        <div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 121, $this->source); })()), "commentaire", [], "array", false, false, false, 121), "html", null, true);
            yield "</div>
                        ";
        }
        // line 123
        yield "                        ";
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "profanity", [], "array", true, true, false, 123)) {
            // line 124
            yield "                        <div class=\"invalid-feedback d-block\">
                            <i class=\"bi bi-shield-exclamation me-1\"></i>";
            // line 125
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 125, $this->source); })()), "profanity", [], "array", false, false, false, 125), "html", null, true);
            yield "
                        </div>
                        ";
        }
        // line 128
        yield "                        <div class=\"mt-3 d-flex align-items-center gap-2 flex-wrap\">
                            <button type=\"button\" class=\"btn btn-outline-primary btn-sm\" data-spellcheck-target=\"#commentaire\" data-spellcheck-result=\"#feedback-spellcheck-result\">
                                <i class=\"bi bi-spellcheck me-1\"></i> Verifier l'orthographe
                            </button>
                        </div>
                        <div id=\"feedback-spellcheck-result\" hidden></div>
                    </div>
                    
                    <div class=\"d-flex gap-2\">
                        <button type=\"submit\" class=\"btn btn-primary\">
                            <i class=\"bi bi-check-lg me-1\"></i> Update Feedback
                        </button>
                        <a href=\"";
        // line 140
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_feedback_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 140, $this->source); })()), "id", [], "any", false, false, false, 140)]), "html", null, true);
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

    // line 151
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

        // line 152
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
";
        // line 153
        yield from $this->load("feedback/_spellcheck_script.html.twig", 153)->unwrap()->yield($context);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "feedback/edit.html.twig";
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
        return array (  502 => 153,  498 => 152,  485 => 151,  464 => 140,  450 => 128,  444 => 125,  441 => 124,  438 => 123,  432 => 121,  430 => 120,  426 => 119,  419 => 117,  410 => 110,  404 => 108,  402 => 107,  393 => 103,  384 => 99,  380 => 97,  378 => 96,  370 => 95,  365 => 92,  359 => 90,  357 => 89,  349 => 86,  343 => 85,  336 => 83,  330 => 82,  323 => 80,  317 => 79,  310 => 77,  304 => 76,  297 => 74,  291 => 73,  287 => 71,  285 => 70,  279 => 66,  273 => 64,  271 => 63,  268 => 62,  248 => 58,  244 => 57,  234 => 56,  227 => 55,  210 => 48,  207 => 47,  205 => 46,  199 => 42,  193 => 40,  191 => 39,  183 => 38,  177 => 34,  172 => 31,  163 => 29,  159 => 28,  154 => 25,  152 => 24,  138 => 13,  135 => 12,  133 => 11,  120 => 10,  107 => 7,  102 => 6,  89 => 5,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Edit Feedback{% endblock %}

{% block breadcrumb %}
<li><a href=\"{{ path('app_feedback_index') }}\">Feedbacks</a></li>
<li class=\"breadcrumb-item active\" aria-current=\"page\">Edit #{{ feedback.id }}</li>
{% endblock %}

{% block body %}
{% set isDeliveryFeedback = feedback.isDeliveryFeedback %}
<div class=\"page-header\">
    <h1><i class=\"bi bi-pencil me-2\"></i>Edit Feedback #{{ feedback.id }}</h1>
    <p>Update the feedback details below</p>
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
                        {% for field, error in errors %}
                        <li>{{ error }}</li>
                        {% endfor %}
                    </ul>
                </div>
                {% endif %}

                <form method=\"post\" novalidate>
                    <div class=\"mb-4\">
                        <label for=\"titre\" class=\"form-label\">Review Title</label>
                        <input type=\"text\" name=\"titre\" id=\"titre\" class=\"form-control {% if errors['titre'] is defined %}is-invalid{% endif %}\" value=\"{{ app.request.request.get('titre', feedback.titre) }}\">
                        {% if errors['titre'] is defined %}
                        <div class=\"invalid-feedback d-block\">{{ errors['titre'] }}</div>
                        {% endif %}
                    </div>

                    <div class=\"mb-4\">
                        <label class=\"form-label\">Mood</label>
                        {% set selectedMood = app.request.request.get('ambiance', feedback.ambiance) %}
                        <div class=\"border rounded-3 p-3\">
                            {% for mood in [
                                {'value': 'love', 'emoji': '😍', 'label': 'Loved it'},
                                {'value': 'happy', 'emoji': '😊', 'label': 'Happy'},
                                {'value': 'neutral', 'emoji': '😐', 'label': 'Neutral'},
                                {'value': 'sad', 'emoji': '😕', 'label': 'Disappointed'},
                                {'value': 'angry', 'emoji': '😡', 'label': 'Frustrated'}
                            ] %}
                            <div class=\"form-check mb-2 {% if loop.last %}mb-0{% endif %}\">
                                <input class=\"form-check-input\" type=\"radio\" name=\"ambiance\" id=\"edit_ambiance_{{ mood.value }}\" value=\"{{ mood.value }}\" {% if selectedMood == mood.value %}checked{% endif %}>
                                <label class=\"form-check-label\" for=\"edit_ambiance_{{ mood.value }}\">
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
                        <label class=\"form-label\">Rating <span class=\"text-danger\">*</span></label>
                        {% set selectedNote = app.request.request.get('note', feedback.note) %}
                        <div class=\"rating-input\">
                            <div class=\"btn-group w-100\" role=\"group\">
                                <input type=\"radio\" class=\"btn-check\" name=\"note\" id=\"star1\" value=\"1\" {% if selectedNote == '1' %}checked{% endif %}>
                                <label class=\"btn btn-outline-warning {% if selectedNote == '1' %}active{% endif %}\" for=\"star1\">⭐ 1</label>
                                
                                <input type=\"radio\" class=\"btn-check\" name=\"note\" id=\"star2\" value=\"2\" {% if selectedNote == '2' %}checked{% endif %}>
                                <label class=\"btn btn-outline-warning {% if selectedNote == '2' %}active{% endif %}\" for=\"star2\">⭐⭐ 2</label>
                                
                                <input type=\"radio\" class=\"btn-check\" name=\"note\" id=\"star3\" value=\"3\" {% if selectedNote == '3' %}checked{% endif %}>
                                <label class=\"btn btn-outline-warning {% if selectedNote == '3' %}active{% endif %}\" for=\"star3\">⭐⭐⭐ 3</label>
                                
                                <input type=\"radio\" class=\"btn-check\" name=\"note\" id=\"star4\" value=\"4\" {% if selectedNote == '4' %}checked{% endif %}>
                                <label class=\"btn btn-outline-warning {% if selectedNote == '4' %}active{% endif %}\" for=\"star4\">⭐⭐⭐⭐ 4</label>
                                
                                <input type=\"radio\" class=\"btn-check\" name=\"note\" id=\"star5\" value=\"5\" {% if selectedNote == '5' %}checked{% endif %}>
                                <label class=\"btn btn-outline-warning {% if selectedNote == '5' %}active{% endif %}\" for=\"star5\">⭐⭐⭐⭐⭐ 5</label>
                            </div>
                        </div>
                        {% if errors['note'] is defined %}
                        <div class=\"invalid-feedback d-block\">{{ errors['note'] }}</div>
                        {% endif %}
                    </div>

                    <div class=\"mb-4\">
                        <label class=\"form-label\">Would You Recommend {% if isDeliveryFeedback %}This Driver{% else %}This Product{% endif %}?</label>
                        {% set selectedRecommendation = app.request.request.get('recommande', feedback.recommande is same as(true) ? 'yes' : (feedback.recommande is same as(false) ? 'no' : '')) %}
                        <div class=\"border rounded-3 p-3\">
                            <div class=\"form-check mb-2\">
                                <input class=\"form-check-input\" type=\"radio\" name=\"recommande\" id=\"edit_recommande_yes\" value=\"yes\" {% if selectedRecommendation == 'yes' %}checked{% endif %}>
                                <label class=\"form-check-label\" for=\"edit_recommande_yes\">Yes, I would recommend it</label>
                            </div>
                            <div class=\"form-check mb-0\">
                                <input class=\"form-check-input\" type=\"radio\" name=\"recommande\" id=\"edit_recommande_no\" value=\"no\" {% if selectedRecommendation == 'no' %}checked{% endif %}>
                                <label class=\"form-check-label\" for=\"edit_recommande_no\">No, I would not recommend it</label>
                            </div>
                        </div>
                        {% if errors['recommande'] is defined %}
                        <div class=\"invalid-feedback d-block\">{{ errors['recommande'] }}</div>
                        {% endif %}
                    </div>
                    
                    <div class=\"mb-4\">
                        <label for=\"commentaire\" class=\"form-label\">Comment <span class=\"text-danger\">*</span></label>
                        <textarea 
                            name=\"commentaire\" 
                            id=\"commentaire\" 
                            class=\"form-control {% if errors['commentaire'] is defined or errors['profanity'] is defined %}is-invalid{% endif %}\" 
                            rows=\"5\"
                        >{{ app.request.request.get('commentaire', feedback.commentaire) }}</textarea>
                        {% if errors['commentaire'] is defined %}
                        <div class=\"invalid-feedback d-block\">{{ errors['commentaire'] }}</div>
                        {% endif %}
                        {% if errors['profanity'] is defined %}
                        <div class=\"invalid-feedback d-block\">
                            <i class=\"bi bi-shield-exclamation me-1\"></i>{{ errors['profanity'] }}
                        </div>
                        {% endif %}
                        <div class=\"mt-3 d-flex align-items-center gap-2 flex-wrap\">
                            <button type=\"button\" class=\"btn btn-outline-primary btn-sm\" data-spellcheck-target=\"#commentaire\" data-spellcheck-result=\"#feedback-spellcheck-result\">
                                <i class=\"bi bi-spellcheck me-1\"></i> Verifier l'orthographe
                            </button>
                        </div>
                        <div id=\"feedback-spellcheck-result\" hidden></div>
                    </div>
                    
                    <div class=\"d-flex gap-2\">
                        <button type=\"submit\" class=\"btn btn-primary\">
                            <i class=\"bi bi-check-lg me-1\"></i> Update Feedback
                        </button>
                        <a href=\"{{ path('app_feedback_show', {'id': feedback.id}) }}\" class=\"btn btn-outline-secondary\">
                            <i class=\"bi bi-x-lg me-1\"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{% endblock %}

{% block javascripts %}
{{ parent() }}
{% include 'feedback/_spellcheck_script.html.twig' %}
{% endblock %}
", "feedback/edit.html.twig", "C:\\Users\\Skaina\\Desktop\\final version symfony\\Marketplace-Project\\web\\templates\\feedback\\edit.html.twig");
    }
}
