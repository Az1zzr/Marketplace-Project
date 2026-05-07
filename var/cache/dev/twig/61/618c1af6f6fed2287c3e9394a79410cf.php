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

/* feedback/show.html.twig */
class __TwigTemplate_67f7dd0e756cb8578be15a309577e891 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "feedback/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "feedback/show.html.twig"));

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

        yield "Feedback Details";
        
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
<li class=\"breadcrumb-item active\" aria-current=\"page\">#";
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
        $context["feedbackAuthorName"] = (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 11, $this->source); })()), "auteur", [], "any", false, false, false, 11)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 11, $this->source); })()), "auteur", [], "any", false, false, false, 11), "nomComplet", [], "any", false, false, false, 11)) : ("Deleted user"));
        // line 12
        $context["canManageFeedback"] = ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN") || ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 12, $this->source); })()), "auteur", [], "any", false, false, false, 12) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 12, $this->source); })()), "user", [], "any", false, false, false, 12)) && (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 12, $this->source); })()), "user", [], "any", false, false, false, 12), "id", [], "any", false, false, false, 12) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 12, $this->source); })()), "auteur", [], "any", false, false, false, 12), "id", [], "any", false, false, false, 12))));
        // line 13
        $context["canReplyToFeedback"] = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_USER");
        // line 14
        $context["moodEmoji"] = (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 14, $this->source); })()), "ambiance", [], "any", false, false, false, 14) == "love")) ? ("😍") : ((((CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 14, $this->source); })()), "ambiance", [], "any", false, false, false, 14) == "happy")) ? ("😊") : ((((CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 14, $this->source); })()), "ambiance", [], "any", false, false, false, 14) == "neutral")) ? ("😐") : ((((CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 14, $this->source); })()), "ambiance", [], "any", false, false, false, 14) == "sad")) ? ("😕") : ((((CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 14, $this->source); })()), "ambiance", [], "any", false, false, false, 14) == "angry")) ? ("😡") : ("💬"))))))))));
        // line 15
        yield "<div class=\"page-header d-flex justify-content-between align-items-center\">
    <div>
        <h1>";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 17, $this->source); })()), "displayTitle", [], "any", false, false, false, 17), "html", null, true);
        yield "</h1>
        <p class=\"mb-0\">Started by ";
        // line 18
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["feedbackAuthorName"]) || array_key_exists("feedbackAuthorName", $context) ? $context["feedbackAuthorName"] : (function () { throw new RuntimeError('Variable "feedbackAuthorName" does not exist.', 18, $this->source); })()), "html", null, true);
        yield " on ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 18, $this->source); })()), "dateStatut", [], "any", false, false, false, 18), "F j, Y \\a\\t H:i"), "html", null, true);
        yield "</p>
    </div>
    <div>
        ";
        // line 21
        if ((($tmp = (isset($context["canManageFeedback"]) || array_key_exists("canManageFeedback", $context) ? $context["canManageFeedback"] : (function () { throw new RuntimeError('Variable "canManageFeedback" does not exist.', 21, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 22
            yield "        <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_feedback_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 22, $this->source); })()), "id", [], "any", false, false, false, 22)]), "html", null, true);
            yield "\" class=\"btn btn-primary\">
            <i class=\"bi bi-pencil me-1\"></i> Edit
        </a>
        ";
        }
        // line 26
        yield "        <a href=\"";
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_feedback_index");
        yield "\" class=\"btn btn-outline-secondary\">
            <i class=\"bi bi-arrow-left me-1\"></i> Back
        </a>
    </div>
</div>

<div class=\"row\">
    <div class=\"col-lg-8\">
        <div class=\"card mb-4\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\">Discussion</h5>
            </div>
            <div class=\"card-body\">
                <div class=\"border rounded p-3 mb-4 bg-light-subtle\">
                    <div class=\"d-flex justify-content-between align-items-start mb-3\">
                        <div class=\"d-flex align-items-center\">
                            ";
        // line 42
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 42, $this->source); })()), "auteur", [], "any", false, false, false, 42)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 43
            yield "                            <div class=\"user-avatar me-2\" style=\"width: 40px; height: 40px; font-size: 0.95rem;\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 43, $this->source); })()), "auteur", [], "any", false, false, false, 43), "prenom", [], "any", false, false, false, 43)), "html", null, true);
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 43, $this->source); })()), "auteur", [], "any", false, false, false, 43), "nom", [], "any", false, false, false, 43)), "html", null, true);
            yield "</div>
                            ";
        } else {
            // line 45
            yield "                            <div class=\"bg-white rounded-circle d-flex align-items-center justify-content-center me-2 border\" style=\"width: 40px; height: 40px;\">
                                <i class=\"bi bi-person text-secondary\"></i>
                            </div>
                            ";
        }
        // line 49
        yield "                            <div>
                                <div class=\"fw-medium\">";
        // line 50
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["feedbackAuthorName"]) || array_key_exists("feedbackAuthorName", $context) ? $context["feedbackAuthorName"] : (function () { throw new RuntimeError('Variable "feedbackAuthorName" does not exist.', 50, $this->source); })()), "html", null, true);
        yield "</div>
                                <small class=\"text-muted\">Original feedback</small>
                            </div>
                        </div>
                        <small class=\"text-muted\">
                            <i class=\"bi bi-calendar me-1\"></i>";
        // line 55
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 55, $this->source); })()), "dateStatut", [], "any", false, false, false, 55), "Y-m-d H:i"), "html", null, true);
        yield "
                        </small>
                    </div>

                    <div class=\"d-flex flex-wrap align-items-center gap-3 mb-3\">
                        <div>
                            <span class=\"fs-4 me-2\">";
        // line 61
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["moodEmoji"]) || array_key_exists("moodEmoji", $context) ? $context["moodEmoji"] : (function () { throw new RuntimeError('Variable "moodEmoji" does not exist.', 61, $this->source); })()), "html", null, true);
        yield "</span>
                            <span class=\"badge ";
        // line 62
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 62, $this->source); })()), "isDeliveryFeedback", [], "any", false, false, false, 62)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("bg-dark") : ("bg-info text-dark"));
        yield "\">";
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 62, $this->source); })()), "isDeliveryFeedback", [], "any", false, false, false, 62)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Delivery feedback") : ("Product feedback"));
        yield "</span>
                        </div>
                        <div>
                            <span class=\"star-rating\">
                                ";
        // line 66
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(range(1, 5));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 67
            yield "                                    ";
            if (($context["i"] <= $this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 67, $this->source); })()), "note", [], "any", false, false, false, 67)))) {
                yield "&#9733;";
            } else {
                yield "&#9734;";
            }
            // line 68
            yield "                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 69
        yield "                            </span>
                            <span class=\"ms-2 text-muted\">(";
        // line 70
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 70, $this->source); })()), "note", [], "any", false, false, false, 70), "html", null, true);
        yield "/5)</span>
                        </div>
                        ";
        // line 72
        if (array_key_exists("sentiment", $context)) {
            // line 73
            yield "                        <div>
                            <span class=\"badge ";
            // line 74
            yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["sentiment"]) || array_key_exists("sentiment", $context) ? $context["sentiment"] : (function () { throw new RuntimeError('Variable "sentiment" does not exist.', 74, $this->source); })()), "sentiment", [], "any", false, false, false, 74) == "POSITIF")) ? ("bg-success") : ((((CoreExtension::getAttribute($this->env, $this->source, (isset($context["sentiment"]) || array_key_exists("sentiment", $context) ? $context["sentiment"] : (function () { throw new RuntimeError('Variable "sentiment" does not exist.', 74, $this->source); })()), "sentiment", [], "any", false, false, false, 74) == "NEGATIF")) ? ("bg-danger") : ("bg-secondary"))));
            yield "\">
                                <i class=\"bi ";
            // line 75
            yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["sentiment"]) || array_key_exists("sentiment", $context) ? $context["sentiment"] : (function () { throw new RuntimeError('Variable "sentiment" does not exist.', 75, $this->source); })()), "sentiment", [], "any", false, false, false, 75) == "POSITIF")) ? ("bi-emoji-smile") : ((((CoreExtension::getAttribute($this->env, $this->source, (isset($context["sentiment"]) || array_key_exists("sentiment", $context) ? $context["sentiment"] : (function () { throw new RuntimeError('Variable "sentiment" does not exist.', 75, $this->source); })()), "sentiment", [], "any", false, false, false, 75) == "NEGATIF")) ? ("bi-emoji-frown") : ("bi-emoji-neutral"))));
            yield " me-1\"></i>
                                ";
            // line 76
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["sentiment"]) || array_key_exists("sentiment", $context) ? $context["sentiment"] : (function () { throw new RuntimeError('Variable "sentiment" does not exist.', 76, $this->source); })()), "sentiment", [], "any", false, false, false, 76), "html", null, true);
            yield "
                            </span>
                            <small class=\"text-muted ms-2\">Confidence: ";
            // line 78
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::round(CoreExtension::getAttribute($this->env, $this->source, (isset($context["sentiment"]) || array_key_exists("sentiment", $context) ? $context["sentiment"] : (function () { throw new RuntimeError('Variable "sentiment" does not exist.', 78, $this->source); })()), "confidence", [], "any", false, false, false, 78), 1), "html", null, true);
            yield "%</small>
                            <small class=\"text-muted ms-2\">Source: ";
            // line 79
            yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["sentiment"] ?? null), "sourceLabel", [], "any", true, true, false, 79) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["sentiment"]) || array_key_exists("sentiment", $context) ? $context["sentiment"] : (function () { throw new RuntimeError('Variable "sentiment" does not exist.', 79, $this->source); })()), "sourceLabel", [], "any", false, false, false, 79)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["sentiment"]) || array_key_exists("sentiment", $context) ? $context["sentiment"] : (function () { throw new RuntimeError('Variable "sentiment" does not exist.', 79, $this->source); })()), "sourceLabel", [], "any", false, false, false, 79), "html", null, true)) : ((((CoreExtension::getAttribute($this->env, $this->source, ($context["sentiment"] ?? null), "source", [], "any", true, true, false, 79) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["sentiment"]) || array_key_exists("sentiment", $context) ? $context["sentiment"] : (function () { throw new RuntimeError('Variable "sentiment" does not exist.', 79, $this->source); })()), "source", [], "any", false, false, false, 79)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["sentiment"]) || array_key_exists("sentiment", $context) ? $context["sentiment"] : (function () { throw new RuntimeError('Variable "sentiment" does not exist.', 79, $this->source); })()), "source", [], "any", false, false, false, 79), "html", null, true)) : ("Unknown"))));
            yield "</small>
                        </div>
                        ";
        }
        // line 82
        yield "                        ";
        if ((($tmp =  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 82, $this->source); })()), "recommande", [], "any", false, false, false, 82))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 83
            yield "                        <div>
                            <span class=\"badge ";
            // line 84
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 84, $this->source); })()), "recommande", [], "any", false, false, false, 84)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("bg-success") : ("bg-danger"));
            yield "\">";
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 84, $this->source); })()), "recommande", [], "any", false, false, false, 84)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Recommended") : ("Not recommended"));
            yield "</span>
                        </div>
                        ";
        }
        // line 87
        yield "                    </div>

                    ";
        // line 89
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 89, $this->source); })()), "produit", [], "any", false, false, false, 89)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 90
            yield "                    <div class=\"mb-3\">
                        <a href=\"";
            // line 91
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 91, $this->source); })()), "produit", [], "any", false, false, false, 91), "id", [], "any", false, false, false, 91)]), "html", null, true);
            yield "\" class=\"badge bg-light text-dark text-decoration-none\">
                            <i class=\"bi bi-box-seam me-1\"></i>";
            // line 92
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 92, $this->source); })()), "produit", [], "any", false, false, false, 92), "nomProduit", [], "any", false, false, false, 92), "html", null, true);
            yield "
                        </a>
                        ";
            // line 94
            if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 94, $this->source); })()), "ligneCommande", [], "any", false, false, false, 94) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 94, $this->source); })()), "ligneCommande", [], "any", false, false, false, 94), "commande", [], "any", false, false, false, 94))) {
                // line 95
                yield "                        <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_commande_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 95, $this->source); })()), "ligneCommande", [], "any", false, false, false, 95), "commande", [], "any", false, false, false, 95), "idCommande", [], "any", false, false, false, 95)]), "html", null, true);
                yield "\" class=\"badge bg-secondary text-decoration-none ms-2\">
                            <i class=\"bi bi-receipt me-1\"></i>Order #";
                // line 96
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 96, $this->source); })()), "ligneCommande", [], "any", false, false, false, 96), "commande", [], "any", false, false, false, 96), "numeroCommande", [], "any", false, false, false, 96), "html", null, true);
                yield "
                        </a>
                        ";
            }
            // line 99
            yield "                    </div>
                    ";
        }
        // line 101
        yield "
                    ";
        // line 102
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 102, $this->source); })()), "livraison", [], "any", false, false, false, 102)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 103
            yield "                    <div class=\"mb-3\">
                        <span class=\"badge bg-light text-dark\">
                            <i class=\"bi bi-truck me-1\"></i>Driver ";
            // line 105
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 105, $this->source); })()), "livraison", [], "any", false, false, false, 105), "livreur", [], "any", false, false, false, 105), "html", null, true);
            yield "
                        </span>
                        <a href=\"";
            // line 107
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_commande_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 107, $this->source); })()), "livraison", [], "any", false, false, false, 107), "commande", [], "any", false, false, false, 107), "idCommande", [], "any", false, false, false, 107)]), "html", null, true);
            yield "\" class=\"badge bg-secondary text-decoration-none ms-2\">
                            <i class=\"bi bi-receipt me-1\"></i>Order #";
            // line 108
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 108, $this->source); })()), "livraison", [], "any", false, false, false, 108), "commande", [], "any", false, false, false, 108), "numeroCommande", [], "any", false, false, false, 108), "html", null, true);
            yield "
                        </a>
                    </div>
                    ";
        }
        // line 112
        yield "
                    <p class=\"mb-0\">";
        // line 113
        yield Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 113, $this->source); })()), "commentaire", [], "any", false, false, false, 113), "html", null, true));
        yield "</p>
                </div>
            </div>
        </div>
        
        <div class=\"card\">
            <div class=\"card-header d-flex justify-content-between align-items-center\">
                <h5 class=\"mb-0\"><i class=\"bi bi-chat-dots me-2\"></i>Replies (";
        // line 120
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["reponses"]) || array_key_exists("reponses", $context) ? $context["reponses"] : (function () { throw new RuntimeError('Variable "reponses" does not exist.', 120, $this->source); })())), "html", null, true);
        yield ")</h5>
                ";
        // line 121
        if ((($tmp = (isset($context["canReplyToFeedback"]) || array_key_exists("canReplyToFeedback", $context) ? $context["canReplyToFeedback"] : (function () { throw new RuntimeError('Variable "canReplyToFeedback" does not exist.', 121, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 122
            yield "                <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reponse_new", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 122, $this->source); })()), "id", [], "any", false, false, false, 122)]), "html", null, true);
            yield "\" class=\"btn btn-sm btn-primary\">
                    <i class=\"bi bi-plus-lg me-1\"></i> Add Response
                </a>
                ";
        }
        // line 126
        yield "            </div>
            <div class=\"card-body\">
                ";
        // line 128
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["reponses"]) || array_key_exists("reponses", $context) ? $context["reponses"] : (function () { throw new RuntimeError('Variable "reponses" does not exist.', 128, $this->source); })()))) {
            // line 129
            yield "                <div class=\"text-center py-4\">
                    <i class=\"bi bi-chat-dots fs-1 text-muted mb-2\"></i>
                    <p class=\"text-muted mb-0\">No responses yet. Be the first to respond!</p>
                </div>
                ";
        } else {
            // line 134
            yield "                ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["reponses"]) || array_key_exists("reponses", $context) ? $context["reponses"] : (function () { throw new RuntimeError('Variable "reponses" does not exist.', 134, $this->source); })()));
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
            foreach ($context['_seq'] as $context["_key"] => $context["reponse"]) {
                // line 135
                yield "                ";
                $context["responseAuthorName"] = (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["reponse"], "auteur", [], "any", false, false, false, 135)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["reponse"], "auteur", [], "any", false, false, false, 135), "nomComplet", [], "any", false, false, false, 135)) : ("Deleted user"));
                // line 136
                yield "                ";
                $context["canManageResponse"] = ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN") || ((CoreExtension::getAttribute($this->env, $this->source, $context["reponse"], "auteur", [], "any", false, false, false, 136) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 136, $this->source); })()), "user", [], "any", false, false, false, 136)) && (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 136, $this->source); })()), "user", [], "any", false, false, false, 136), "id", [], "any", false, false, false, 136) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["reponse"], "auteur", [], "any", false, false, false, 136), "id", [], "any", false, false, false, 136))));
                // line 137
                yield "                <div class=\"border rounded p-3 mb-3 ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 137)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "mb-0";
                }
                yield "\">
                    <div class=\"d-flex justify-content-between align-items-start mb-3\">
                        <div class=\"d-flex align-items-center\">
                            ";
                // line 140
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["reponse"], "auteur", [], "any", false, false, false, 140)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 141
                    yield "                            <div class=\"user-avatar me-2\" style=\"width: 36px; height: 36px; font-size: 0.9rem;\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["reponse"], "auteur", [], "any", false, false, false, 141), "prenom", [], "any", false, false, false, 141)), "html", null, true);
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["reponse"], "auteur", [], "any", false, false, false, 141), "nom", [], "any", false, false, false, 141)), "html", null, true);
                    yield "</div>
                            ";
                } else {
                    // line 143
                    yield "                            <div class=\"bg-light rounded-circle d-flex align-items-center justify-content-center me-2 border\" style=\"width: 36px; height: 36px;\">
                                <i class=\"bi bi-person text-secondary\"></i>
                            </div>
                            ";
                }
                // line 147
                yield "                            <div>
                                <div class=\"fw-medium\">";
                // line 148
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["responseAuthorName"]) || array_key_exists("responseAuthorName", $context) ? $context["responseAuthorName"] : (function () { throw new RuntimeError('Variable "responseAuthorName" does not exist.', 148, $this->source); })()), "html", null, true);
                yield "</div>
                                <small class=\"text-muted\">Replied to this discussion</small>
                            </div>
                        </div>
                        <small class=\"text-muted\">
                            <i class=\"bi bi-calendar me-1\"></i>";
                // line 153
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["reponse"], "dateReponse", [], "any", false, false, false, 153), "Y-m-d H:i"), "html", null, true);
                yield "
                        </small>
                    </div>
                    ";
                // line 156
                if ((($tmp = (isset($context["canManageResponse"]) || array_key_exists("canManageResponse", $context) ? $context["canManageResponse"] : (function () { throw new RuntimeError('Variable "canManageResponse" does not exist.', 156, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 157
                    yield "                    <div class=\"d-flex justify-content-end mb-2\">
                        <form action=\"";
                    // line 158
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reponse_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["reponse"], "id", [], "any", false, false, false, 158)]), "html", null, true);
                    yield "\" method=\"post\" style=\"display:inline\" novalidate>
                            <button type=\"submit\" class=\"btn btn-sm btn-outline-danger\">
                                <i class=\"bi bi-trash\"></i>
                            </button>
                        </form>
                    </div>
                    ";
                }
                // line 165
                yield "                    <p class=\"mb-0\">";
                yield Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["reponse"], "contenu", [], "any", false, false, false, 165), "html", null, true));
                yield "</p>
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
            unset($context['_seq'], $context['_key'], $context['reponse'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 168
            yield "                ";
        }
        // line 169
        yield "            </div>
        </div>
    </div>
    
    <div class=\"col-lg-4\">
        ";
        // line 174
        if (((isset($context["canSeeInsights"]) || array_key_exists("canSeeInsights", $context) ? $context["canSeeInsights"] : (function () { throw new RuntimeError('Variable "canSeeInsights" does not exist.', 174, $this->source); })()) && (isset($context["insight"]) || array_key_exists("insight", $context) ? $context["insight"] : (function () { throw new RuntimeError('Variable "insight" does not exist.', 174, $this->source); })()))) {
            // line 175
            yield "        <div class=\"card mb-4\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\">Analyse</h5>
            </div>
            <div class=\"card-body\">
                <div class=\"mb-3\">
                    <span class=\"text-muted small\">Sujet</span>
                    <div class=\"mt-1\"><span class=\"badge ";
            // line 182
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["insight"]) || array_key_exists("insight", $context) ? $context["insight"] : (function () { throw new RuntimeError('Variable "insight" does not exist.', 182, $this->source); })()), "topicBadgeClass", [], "any", false, false, false, 182), "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["insight"]) || array_key_exists("insight", $context) ? $context["insight"] : (function () { throw new RuntimeError('Variable "insight" does not exist.', 182, $this->source); })()), "topicLabel", [], "any", false, false, false, 182), "html", null, true);
            yield "</span></div>
                </div>
                <div class=\"mb-3\">
                    <span class=\"text-muted small\">Priorite</span>
                    <div class=\"mt-1\"><span class=\"badge ";
            // line 186
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["insight"]) || array_key_exists("insight", $context) ? $context["insight"] : (function () { throw new RuntimeError('Variable "insight" does not exist.', 186, $this->source); })()), "priorityBadgeClass", [], "any", false, false, false, 186), "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["insight"]) || array_key_exists("insight", $context) ? $context["insight"] : (function () { throw new RuntimeError('Variable "insight" does not exist.', 186, $this->source); })()), "priorityLabel", [], "any", false, false, false, 186), "html", null, true);
            yield "</span></div>
                </div>
                <div class=\"mb-3\">
                    <span class=\"text-muted small\">Statut</span>
                    <div class=\"mt-1 d-flex flex-wrap gap-2\">
                        ";
            // line 191
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["insight"]) || array_key_exists("insight", $context) ? $context["insight"] : (function () { throw new RuntimeError('Variable "insight" does not exist.', 191, $this->source); })()), "needsAttention", [], "any", false, false, false, 191)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 192
                yield "                        <span class=\"badge bg-danger-subtle text-danger border border-danger-subtle\">A traiter</span>
                        ";
            }
            // line 194
            yield "                        ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["insight"]) || array_key_exists("insight", $context) ? $context["insight"] : (function () { throw new RuntimeError('Variable "insight" does not exist.', 194, $this->source); })()), "isUnanswered", [], "any", false, false, false, 194)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 195
                yield "                        <span class=\"badge bg-warning-subtle text-warning-emphasis border border-warning-subtle\">Sans reponse</span>
                        ";
            } else {
                // line 197
                yield "                        <span class=\"badge bg-success-subtle text-success border border-success-subtle\">Avec reponse</span>
                        ";
            }
            // line 199
            yield "                    </div>
                </div>
                <div>
                    <span class=\"text-muted small\">Reponses</span>
                    <div class=\"fw-medium\">";
            // line 203
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["insight"]) || array_key_exists("insight", $context) ? $context["insight"] : (function () { throw new RuntimeError('Variable "insight" does not exist.', 203, $this->source); })()), "responseCount", [], "any", false, false, false, 203), "html", null, true);
            yield "</div>
                </div>
            </div>
        </div>
        ";
        }
        // line 208
        yield "
        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\">Quick Actions</h5>
            </div>
            <div class=\"card-body\">
                <div class=\"d-grid gap-2\">
                    ";
        // line 215
        if ((($tmp = (isset($context["canManageFeedback"]) || array_key_exists("canManageFeedback", $context) ? $context["canManageFeedback"] : (function () { throw new RuntimeError('Variable "canManageFeedback" does not exist.', 215, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 216
            yield "                    <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_feedback_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 216, $this->source); })()), "id", [], "any", false, false, false, 216)]), "html", null, true);
            yield "\" class=\"btn btn-outline-primary\">
                        <i class=\"bi bi-pencil me-2\"></i> Edit Feedback
                    </a>
                    ";
        }
        // line 220
        yield "                    ";
        if ((($tmp = (isset($context["canReplyToFeedback"]) || array_key_exists("canReplyToFeedback", $context) ? $context["canReplyToFeedback"] : (function () { throw new RuntimeError('Variable "canReplyToFeedback" does not exist.', 220, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 221
            yield "                    <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reponse_new", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 221, $this->source); })()), "id", [], "any", false, false, false, 221)]), "html", null, true);
            yield "\" class=\"btn btn-outline-success\">
                        <i class=\"bi bi-reply me-2\"></i> Add Response
                    </a>
                    ";
        }
        // line 225
        yield "                    ";
        if ((($tmp = (isset($context["canManageFeedback"]) || array_key_exists("canManageFeedback", $context) ? $context["canManageFeedback"] : (function () { throw new RuntimeError('Variable "canManageFeedback" does not exist.', 225, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 226
            yield "                    <form action=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_feedback_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["feedback"]) || array_key_exists("feedback", $context) ? $context["feedback"] : (function () { throw new RuntimeError('Variable "feedback" does not exist.', 226, $this->source); })()), "id", [], "any", false, false, false, 226)]), "html", null, true);
            yield "\" method=\"post\" novalidate>
                        <button type=\"submit\" class=\"btn btn-outline-danger w-100\">
                            <i class=\"bi bi-trash me-2\"></i> Delete Feedback
                        </button>
                    </form>
                    ";
        }
        // line 232
        yield "                </div>
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
        return "feedback/show.html.twig";
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
        return array (  613 => 232,  603 => 226,  600 => 225,  592 => 221,  589 => 220,  581 => 216,  579 => 215,  570 => 208,  562 => 203,  556 => 199,  552 => 197,  548 => 195,  545 => 194,  541 => 192,  539 => 191,  529 => 186,  520 => 182,  511 => 175,  509 => 174,  502 => 169,  499 => 168,  481 => 165,  471 => 158,  468 => 157,  466 => 156,  460 => 153,  452 => 148,  449 => 147,  443 => 143,  436 => 141,  434 => 140,  425 => 137,  422 => 136,  419 => 135,  401 => 134,  394 => 129,  392 => 128,  388 => 126,  380 => 122,  378 => 121,  374 => 120,  364 => 113,  361 => 112,  354 => 108,  350 => 107,  345 => 105,  341 => 103,  339 => 102,  336 => 101,  332 => 99,  326 => 96,  321 => 95,  319 => 94,  314 => 92,  310 => 91,  307 => 90,  305 => 89,  301 => 87,  293 => 84,  290 => 83,  287 => 82,  281 => 79,  277 => 78,  272 => 76,  268 => 75,  264 => 74,  261 => 73,  259 => 72,  254 => 70,  251 => 69,  245 => 68,  238 => 67,  234 => 66,  225 => 62,  221 => 61,  212 => 55,  204 => 50,  201 => 49,  195 => 45,  188 => 43,  186 => 42,  166 => 26,  158 => 22,  156 => 21,  148 => 18,  144 => 17,  140 => 15,  138 => 14,  136 => 13,  134 => 12,  132 => 11,  119 => 10,  106 => 7,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Feedback Details{% endblock %}

{% block breadcrumb %}
<li><a href=\"{{ path('app_feedback_index') }}\">Feedbacks</a></li>
<li class=\"breadcrumb-item active\" aria-current=\"page\">#{{ feedback.id }}</li>
{% endblock %}

{% block body %}
{% set feedbackAuthorName = feedback.auteur ? feedback.auteur.nomComplet : 'Deleted user' %}
{% set canManageFeedback = is_granted('ROLE_ADMIN') or (feedback.auteur and app.user and app.user.id == feedback.auteur.id) %}
{% set canReplyToFeedback = is_granted('ROLE_USER') %}
{% set moodEmoji = feedback.ambiance == 'love' ? '😍' : (feedback.ambiance == 'happy' ? '😊' : (feedback.ambiance == 'neutral' ? '😐' : (feedback.ambiance == 'sad' ? '😕' : (feedback.ambiance == 'angry' ? '😡' : '💬')))) %}
<div class=\"page-header d-flex justify-content-between align-items-center\">
    <div>
        <h1>{{ feedback.displayTitle }}</h1>
        <p class=\"mb-0\">Started by {{ feedbackAuthorName }} on {{ feedback.dateStatut|date('F j, Y \\\\a\\\\t H:i') }}</p>
    </div>
    <div>
        {% if canManageFeedback %}
        <a href=\"{{ path('app_feedback_edit', {'id': feedback.id}) }}\" class=\"btn btn-primary\">
            <i class=\"bi bi-pencil me-1\"></i> Edit
        </a>
        {% endif %}
        <a href=\"{{ path('app_feedback_index') }}\" class=\"btn btn-outline-secondary\">
            <i class=\"bi bi-arrow-left me-1\"></i> Back
        </a>
    </div>
</div>

<div class=\"row\">
    <div class=\"col-lg-8\">
        <div class=\"card mb-4\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\">Discussion</h5>
            </div>
            <div class=\"card-body\">
                <div class=\"border rounded p-3 mb-4 bg-light-subtle\">
                    <div class=\"d-flex justify-content-between align-items-start mb-3\">
                        <div class=\"d-flex align-items-center\">
                            {% if feedback.auteur %}
                            <div class=\"user-avatar me-2\" style=\"width: 40px; height: 40px; font-size: 0.95rem;\">{{ feedback.auteur.prenom|first }}{{ feedback.auteur.nom|first }}</div>
                            {% else %}
                            <div class=\"bg-white rounded-circle d-flex align-items-center justify-content-center me-2 border\" style=\"width: 40px; height: 40px;\">
                                <i class=\"bi bi-person text-secondary\"></i>
                            </div>
                            {% endif %}
                            <div>
                                <div class=\"fw-medium\">{{ feedbackAuthorName }}</div>
                                <small class=\"text-muted\">Original feedback</small>
                            </div>
                        </div>
                        <small class=\"text-muted\">
                            <i class=\"bi bi-calendar me-1\"></i>{{ feedback.dateStatut|date('Y-m-d H:i') }}
                        </small>
                    </div>

                    <div class=\"d-flex flex-wrap align-items-center gap-3 mb-3\">
                        <div>
                            <span class=\"fs-4 me-2\">{{ moodEmoji }}</span>
                            <span class=\"badge {{ feedback.isDeliveryFeedback ? 'bg-dark' : 'bg-info text-dark' }}\">{{ feedback.isDeliveryFeedback ? 'Delivery feedback' : 'Product feedback' }}</span>
                        </div>
                        <div>
                            <span class=\"star-rating\">
                                {% for i in 1..5 %}
                                    {% if i <= feedback.note|number_format %}&#9733;{% else %}&#9734;{% endif %}
                                {% endfor %}
                            </span>
                            <span class=\"ms-2 text-muted\">({{ feedback.note }}/5)</span>
                        </div>
                        {% if sentiment is defined %}
                        <div>
                            <span class=\"badge {{ sentiment.sentiment == 'POSITIF' ? 'bg-success' : (sentiment.sentiment == 'NEGATIF' ? 'bg-danger' : 'bg-secondary') }}\">
                                <i class=\"bi {{ sentiment.sentiment == 'POSITIF' ? 'bi-emoji-smile' : (sentiment.sentiment == 'NEGATIF' ? 'bi-emoji-frown' : 'bi-emoji-neutral') }} me-1\"></i>
                                {{ sentiment.sentiment }}
                            </span>
                            <small class=\"text-muted ms-2\">Confidence: {{ sentiment.confidence|round(1) }}%</small>
                            <small class=\"text-muted ms-2\">Source: {{ sentiment.sourceLabel ?? sentiment.source ?? 'Unknown' }}</small>
                        </div>
                        {% endif %}
                        {% if feedback.recommande is not null %}
                        <div>
                            <span class=\"badge {{ feedback.recommande ? 'bg-success' : 'bg-danger' }}\">{{ feedback.recommande ? 'Recommended' : 'Not recommended' }}</span>
                        </div>
                        {% endif %}
                    </div>

                    {% if feedback.produit %}
                    <div class=\"mb-3\">
                        <a href=\"{{ path('app_produit_show', {'id': feedback.produit.id}) }}\" class=\"badge bg-light text-dark text-decoration-none\">
                            <i class=\"bi bi-box-seam me-1\"></i>{{ feedback.produit.nomProduit }}
                        </a>
                        {% if feedback.ligneCommande and feedback.ligneCommande.commande %}
                        <a href=\"{{ path('app_commande_show', {'id': feedback.ligneCommande.commande.idCommande}) }}\" class=\"badge bg-secondary text-decoration-none ms-2\">
                            <i class=\"bi bi-receipt me-1\"></i>Order #{{ feedback.ligneCommande.commande.numeroCommande }}
                        </a>
                        {% endif %}
                    </div>
                    {% endif %}

                    {% if feedback.livraison %}
                    <div class=\"mb-3\">
                        <span class=\"badge bg-light text-dark\">
                            <i class=\"bi bi-truck me-1\"></i>Driver {{ feedback.livraison.livreur }}
                        </span>
                        <a href=\"{{ path('app_commande_show', {'id': feedback.livraison.commande.idCommande}) }}\" class=\"badge bg-secondary text-decoration-none ms-2\">
                            <i class=\"bi bi-receipt me-1\"></i>Order #{{ feedback.livraison.commande.numeroCommande }}
                        </a>
                    </div>
                    {% endif %}

                    <p class=\"mb-0\">{{ feedback.commentaire|nl2br }}</p>
                </div>
            </div>
        </div>
        
        <div class=\"card\">
            <div class=\"card-header d-flex justify-content-between align-items-center\">
                <h5 class=\"mb-0\"><i class=\"bi bi-chat-dots me-2\"></i>Replies ({{ reponses|length }})</h5>
                {% if canReplyToFeedback %}
                <a href=\"{{ path('app_reponse_new', {'id': feedback.id}) }}\" class=\"btn btn-sm btn-primary\">
                    <i class=\"bi bi-plus-lg me-1\"></i> Add Response
                </a>
                {% endif %}
            </div>
            <div class=\"card-body\">
                {% if reponses is empty %}
                <div class=\"text-center py-4\">
                    <i class=\"bi bi-chat-dots fs-1 text-muted mb-2\"></i>
                    <p class=\"text-muted mb-0\">No responses yet. Be the first to respond!</p>
                </div>
                {% else %}
                {% for reponse in reponses %}
                {% set responseAuthorName = reponse.auteur ? reponse.auteur.nomComplet : 'Deleted user' %}
                {% set canManageResponse = is_granted('ROLE_ADMIN') or (reponse.auteur and app.user and app.user.id == reponse.auteur.id) %}
                <div class=\"border rounded p-3 mb-3 {% if loop.last %}mb-0{% endif %}\">
                    <div class=\"d-flex justify-content-between align-items-start mb-3\">
                        <div class=\"d-flex align-items-center\">
                            {% if reponse.auteur %}
                            <div class=\"user-avatar me-2\" style=\"width: 36px; height: 36px; font-size: 0.9rem;\">{{ reponse.auteur.prenom|first }}{{ reponse.auteur.nom|first }}</div>
                            {% else %}
                            <div class=\"bg-light rounded-circle d-flex align-items-center justify-content-center me-2 border\" style=\"width: 36px; height: 36px;\">
                                <i class=\"bi bi-person text-secondary\"></i>
                            </div>
                            {% endif %}
                            <div>
                                <div class=\"fw-medium\">{{ responseAuthorName }}</div>
                                <small class=\"text-muted\">Replied to this discussion</small>
                            </div>
                        </div>
                        <small class=\"text-muted\">
                            <i class=\"bi bi-calendar me-1\"></i>{{ reponse.dateReponse|date('Y-m-d H:i') }}
                        </small>
                    </div>
                    {% if canManageResponse %}
                    <div class=\"d-flex justify-content-end mb-2\">
                        <form action=\"{{ path('app_reponse_delete', {'id': reponse.id}) }}\" method=\"post\" style=\"display:inline\" novalidate>
                            <button type=\"submit\" class=\"btn btn-sm btn-outline-danger\">
                                <i class=\"bi bi-trash\"></i>
                            </button>
                        </form>
                    </div>
                    {% endif %}
                    <p class=\"mb-0\">{{ reponse.contenu|nl2br }}</p>
                </div>
                {% endfor %}
                {% endif %}
            </div>
        </div>
    </div>
    
    <div class=\"col-lg-4\">
        {% if canSeeInsights and insight %}
        <div class=\"card mb-4\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\">Analyse</h5>
            </div>
            <div class=\"card-body\">
                <div class=\"mb-3\">
                    <span class=\"text-muted small\">Sujet</span>
                    <div class=\"mt-1\"><span class=\"badge {{ insight.topicBadgeClass }}\">{{ insight.topicLabel }}</span></div>
                </div>
                <div class=\"mb-3\">
                    <span class=\"text-muted small\">Priorite</span>
                    <div class=\"mt-1\"><span class=\"badge {{ insight.priorityBadgeClass }}\">{{ insight.priorityLabel }}</span></div>
                </div>
                <div class=\"mb-3\">
                    <span class=\"text-muted small\">Statut</span>
                    <div class=\"mt-1 d-flex flex-wrap gap-2\">
                        {% if insight.needsAttention %}
                        <span class=\"badge bg-danger-subtle text-danger border border-danger-subtle\">A traiter</span>
                        {% endif %}
                        {% if insight.isUnanswered %}
                        <span class=\"badge bg-warning-subtle text-warning-emphasis border border-warning-subtle\">Sans reponse</span>
                        {% else %}
                        <span class=\"badge bg-success-subtle text-success border border-success-subtle\">Avec reponse</span>
                        {% endif %}
                    </div>
                </div>
                <div>
                    <span class=\"text-muted small\">Reponses</span>
                    <div class=\"fw-medium\">{{ insight.responseCount }}</div>
                </div>
            </div>
        </div>
        {% endif %}

        <div class=\"card\">
            <div class=\"card-header\">
                <h5 class=\"mb-0\">Quick Actions</h5>
            </div>
            <div class=\"card-body\">
                <div class=\"d-grid gap-2\">
                    {% if canManageFeedback %}
                    <a href=\"{{ path('app_feedback_edit', {'id': feedback.id}) }}\" class=\"btn btn-outline-primary\">
                        <i class=\"bi bi-pencil me-2\"></i> Edit Feedback
                    </a>
                    {% endif %}
                    {% if canReplyToFeedback %}
                    <a href=\"{{ path('app_reponse_new', {'id': feedback.id}) }}\" class=\"btn btn-outline-success\">
                        <i class=\"bi bi-reply me-2\"></i> Add Response
                    </a>
                    {% endif %}
                    {% if canManageFeedback %}
                    <form action=\"{{ path('app_feedback_delete', {'id': feedback.id}) }}\" method=\"post\" novalidate>
                        <button type=\"submit\" class=\"btn btn-outline-danger w-100\">
                            <i class=\"bi bi-trash me-2\"></i> Delete Feedback
                        </button>
                    </form>
                    {% endif %}
                </div>
            </div>
        </div>
    </div>
</div>
{% endblock %}
", "feedback/show.html.twig", "C:\\Users\\Skaina\\Desktop\\final version symfony\\Marketplace-Project\\web\\templates\\feedback\\show.html.twig");
    }
}
