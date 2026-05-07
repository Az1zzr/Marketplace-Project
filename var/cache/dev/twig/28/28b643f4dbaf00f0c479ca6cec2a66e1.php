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

/* security/register.html.twig */
class __TwigTemplate_f2ceafb044b9ebbf44a3417d0fc17c95 extends Template
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
            'auth_content' => [$this, 'block_auth_content'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/register.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/register.html.twig"));

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

        yield "Register";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_auth_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "auth_content"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "auth_content"));

        // line 6
        yield "<div class=\"auth-container\">
    <div class=\"auth-card\" style=\"max-width: 520px;\">
        <div class=\"auth-logo\">🛒</div>
        <h2 class=\"text-center mb-4\" style=\"font-weight: 700; color: #1e293b;\">Create Account</h2>
        <p class=\"text-center text-muted mb-4\">Join our marketplace community</p>

        ";
        // line 12
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 12, $this->source); })()), "vars", [], "any", false, false, false, 12), "errors", [], "any", false, false, false, 12)) > 0)) {
            // line 13
            yield "        <div class=\"alert alert-danger d-flex align-items-center\" role=\"alert\">
            <i class=\"bi bi-exclamation-triangle-fill me-2\"></i>
            <div>
                ";
            // line 16
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 16, $this->source); })()), "vars", [], "any", false, false, false, 16), "errors", [], "any", false, false, false, 16));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 17
                yield "                <div>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 17), "html", null, true);
                yield "</div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 19
            yield "            </div>
        </div>
        ";
        }
        // line 22
        yield "
        ";
        // line 23
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 23, $this->source); })()), 'form_start', ["attr" => ["novalidate" => "novalidate"]]);
        yield "
            <div class=\"row\">
                <div class=\"col-md-6 mb-3\">
                    ";
        // line 26
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 26, $this->source); })()), "prenom", [], "any", false, false, false, 26), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
                    ";
        // line 27
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 27, $this->source); })()), "prenom", [], "any", false, false, false, 27), 'widget', ["attr" => ["class" => ("form-control" . (((($tmp = Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 27, $this->source); })()), "prenom", [], "any", false, false, false, 27), "vars", [], "any", false, false, false, 27), "errors", [], "any", false, false, false, 27))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (" is-invalid") : ("")))]]);
        yield "
                    ";
        // line 28
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 28, $this->source); })()), "prenom", [], "any", false, false, false, 28), "vars", [], "any", false, false, false, 28), "errors", [], "any", false, false, false, 28));
        foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
            // line 29
            yield "                    <div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 29), "html", null, true);
            yield "</div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 31
        yield "                </div>
                <div class=\"col-md-6 mb-3\">
                    ";
        // line 33
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 33, $this->source); })()), "nom", [], "any", false, false, false, 33), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
                    ";
        // line 34
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 34, $this->source); })()), "nom", [], "any", false, false, false, 34), 'widget', ["attr" => ["class" => ("form-control" . (((($tmp = Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 34, $this->source); })()), "nom", [], "any", false, false, false, 34), "vars", [], "any", false, false, false, 34), "errors", [], "any", false, false, false, 34))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (" is-invalid") : ("")))]]);
        yield "
                    ";
        // line 35
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 35, $this->source); })()), "nom", [], "any", false, false, false, 35), "vars", [], "any", false, false, false, 35), "errors", [], "any", false, false, false, 35));
        foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
            // line 36
            yield "                    <div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 36), "html", null, true);
            yield "</div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 38
        yield "                </div>
            </div>

            <div class=\"mb-3\">
                ";
        // line 42
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 42, $this->source); })()), "email", [], "any", false, false, false, 42), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
                ";
        // line 43
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 43, $this->source); })()), "email", [], "any", false, false, false, 43), 'widget', ["attr" => ["class" => ("form-control" . (((($tmp = Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 43, $this->source); })()), "email", [], "any", false, false, false, 43), "vars", [], "any", false, false, false, 43), "errors", [], "any", false, false, false, 43))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (" is-invalid") : ("")))]]);
        yield "
                ";
        // line 44
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 44, $this->source); })()), "email", [], "any", false, false, false, 44), "vars", [], "any", false, false, false, 44), "errors", [], "any", false, false, false, 44));
        foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
            // line 45
            yield "                <div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 45), "html", null, true);
            yield "</div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 47
        yield "            </div>

            <div class=\"row\">
                <div class=\"col-md-6 mb-3\">
                    ";
        // line 51
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 51, $this->source); })()), "telephone", [], "any", false, false, false, 51), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
                    ";
        // line 52
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 52, $this->source); })()), "telephone", [], "any", false, false, false, 52), 'widget', ["attr" => ["class" => ("form-control" . (((($tmp = Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 52, $this->source); })()), "telephone", [], "any", false, false, false, 52), "vars", [], "any", false, false, false, 52), "errors", [], "any", false, false, false, 52))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (" is-invalid") : ("")))]]);
        yield "
                    ";
        // line 53
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 53, $this->source); })()), "telephone", [], "any", false, false, false, 53), "vars", [], "any", false, false, false, 53), "errors", [], "any", false, false, false, 53));
        foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
            // line 54
            yield "                    <div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 54), "html", null, true);
            yield "</div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 56
        yield "                </div>
                <div class=\"col-md-6 mb-3\">
                    ";
        // line 58
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 58, $this->source); })()), "dateNaissance", [], "any", false, false, false, 58), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
                    ";
        // line 59
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 59, $this->source); })()), "dateNaissance", [], "any", false, false, false, 59), 'widget', ["attr" => ["class" => ("form-control" . (((($tmp = Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 59, $this->source); })()), "dateNaissance", [], "any", false, false, false, 59), "vars", [], "any", false, false, false, 59), "errors", [], "any", false, false, false, 59))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (" is-invalid") : ("")))]]);
        yield "
                    ";
        // line 60
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 60, $this->source); })()), "dateNaissance", [], "any", false, false, false, 60), "vars", [], "any", false, false, false, 60), "errors", [], "any", false, false, false, 60));
        foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
            // line 61
            yield "                    <div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 61), "html", null, true);
            yield "</div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 63
        yield "                </div>
            </div>

            <div class=\"mb-3\">
                ";
        // line 67
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 67, $this->source); })()), "plainPassword", [], "any", false, false, false, 67), "first", [], "any", false, false, false, 67), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
                ";
        // line 68
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 68, $this->source); })()), "plainPassword", [], "any", false, false, false, 68), "first", [], "any", false, false, false, 68), 'widget', ["attr" => ["class" => ("form-control" . (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 68, $this->source); })()), "plainPassword", [], "any", false, false, false, 68), "first", [], "any", false, false, false, 68), "vars", [], "any", false, false, false, 68), "errors", [], "any", false, false, false, 68)) || Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 68, $this->source); })()), "plainPassword", [], "any", false, false, false, 68), "vars", [], "any", false, false, false, 68), "errors", [], "any", false, false, false, 68)))) ? (" is-invalid") : ("")))]]);
        yield "
                ";
        // line 69
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 69, $this->source); })()), "plainPassword", [], "any", false, false, false, 69), "first", [], "any", false, false, false, 69), "vars", [], "any", false, false, false, 69), "errors", [], "any", false, false, false, 69));
        foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
            // line 70
            yield "                <div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 70), "html", null, true);
            yield "</div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 72
        yield "            </div>

            <div class=\"mb-3\">
                ";
        // line 75
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 75, $this->source); })()), "plainPassword", [], "any", false, false, false, 75), "second", [], "any", false, false, false, 75), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
                ";
        // line 76
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 76, $this->source); })()), "plainPassword", [], "any", false, false, false, 76), "second", [], "any", false, false, false, 76), 'widget', ["attr" => ["class" => ("form-control" . (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 76, $this->source); })()), "plainPassword", [], "any", false, false, false, 76), "second", [], "any", false, false, false, 76), "vars", [], "any", false, false, false, 76), "errors", [], "any", false, false, false, 76)) || Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 76, $this->source); })()), "plainPassword", [], "any", false, false, false, 76), "vars", [], "any", false, false, false, 76), "errors", [], "any", false, false, false, 76)))) ? (" is-invalid") : ("")))]]);
        yield "
                ";
        // line 77
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 77, $this->source); })()), "plainPassword", [], "any", false, false, false, 77), "second", [], "any", false, false, false, 77), "vars", [], "any", false, false, false, 77), "errors", [], "any", false, false, false, 77));
        foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
            // line 78
            yield "                <div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 78), "html", null, true);
            yield "</div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 80
        yield "                ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 80, $this->source); })()), "plainPassword", [], "any", false, false, false, 80), "vars", [], "any", false, false, false, 80), "errors", [], "any", false, false, false, 80));
        foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
            // line 81
            yield "                <div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 81), "html", null, true);
            yield "</div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 83
        yield "            </div>

            <div class=\"mb-4\">
                ";
        // line 86
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 86, $this->source); })()), "role", [], "any", false, false, false, 86), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
                ";
        // line 87
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 87, $this->source); })()), "role", [], "any", false, false, false, 87), 'widget', ["attr" => ["class" => ("form-select" . (((($tmp = Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 87, $this->source); })()), "role", [], "any", false, false, false, 87), "vars", [], "any", false, false, false, 87), "errors", [], "any", false, false, false, 87))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (" is-invalid") : ("")))]]);
        yield "
                ";
        // line 88
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 88, $this->source); })()), "role", [], "any", false, false, false, 88), "vars", [], "any", false, false, false, 88), "errors", [], "any", false, false, false, 88));
        foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
            // line 89
            yield "                <div class=\"invalid-feedback d-block\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 89), "html", null, true);
            yield "</div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 91
        yield "            </div>

            ";
        // line 93
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 93, $this->source); })()), 'rest');
        yield "

            <button type=\"submit\" class=\"btn btn-primary w-100 py-3 mb-3\" style=\"font-weight: 600;\">
                <i class=\"bi bi-person-plus me-2\"></i> Create Account
            </button>

            <p class=\"text-center text-muted mb-0\">
                Already have an account? <a href=\"";
        // line 100
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
        yield "\" class=\"text-decoration-none\" style=\"color: var(--primary-color); font-weight: 500;\">Sign In</a>
            </p>
        ";
        // line 102
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["registrationForm"]) || array_key_exists("registrationForm", $context) ? $context["registrationForm"] : (function () { throw new RuntimeError('Variable "registrationForm" does not exist.', 102, $this->source); })()), 'form_end', ["render_rest" => false]);
        yield "
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
        return "security/register.html.twig";
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
        return array (  379 => 102,  374 => 100,  364 => 93,  360 => 91,  351 => 89,  347 => 88,  343 => 87,  339 => 86,  334 => 83,  325 => 81,  320 => 80,  311 => 78,  307 => 77,  303 => 76,  299 => 75,  294 => 72,  285 => 70,  281 => 69,  277 => 68,  273 => 67,  267 => 63,  258 => 61,  254 => 60,  250 => 59,  246 => 58,  242 => 56,  233 => 54,  229 => 53,  225 => 52,  221 => 51,  215 => 47,  206 => 45,  202 => 44,  198 => 43,  194 => 42,  188 => 38,  179 => 36,  175 => 35,  171 => 34,  167 => 33,  163 => 31,  154 => 29,  150 => 28,  146 => 27,  142 => 26,  136 => 23,  133 => 22,  128 => 19,  119 => 17,  115 => 16,  110 => 13,  108 => 12,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Register{% endblock %}

{% block auth_content %}
<div class=\"auth-container\">
    <div class=\"auth-card\" style=\"max-width: 520px;\">
        <div class=\"auth-logo\">🛒</div>
        <h2 class=\"text-center mb-4\" style=\"font-weight: 700; color: #1e293b;\">Create Account</h2>
        <p class=\"text-center text-muted mb-4\">Join our marketplace community</p>

        {% if registrationForm.vars.errors|length > 0 %}
        <div class=\"alert alert-danger d-flex align-items-center\" role=\"alert\">
            <i class=\"bi bi-exclamation-triangle-fill me-2\"></i>
            <div>
                {% for error in registrationForm.vars.errors %}
                <div>{{ error.message }}</div>
                {% endfor %}
            </div>
        </div>
        {% endif %}

        {{ form_start(registrationForm, {'attr': {'novalidate': 'novalidate'}}) }}
            <div class=\"row\">
                <div class=\"col-md-6 mb-3\">
                    {{ form_label(registrationForm.prenom, null, {'label_attr': {'class': 'form-label'}}) }}
                    {{ form_widget(registrationForm.prenom, {'attr': {'class': 'form-control' ~ (registrationForm.prenom.vars.errors|length ? ' is-invalid' : '')}}) }}
                    {% for error in registrationForm.prenom.vars.errors %}
                    <div class=\"invalid-feedback d-block\">{{ error.message }}</div>
                    {% endfor %}
                </div>
                <div class=\"col-md-6 mb-3\">
                    {{ form_label(registrationForm.nom, null, {'label_attr': {'class': 'form-label'}}) }}
                    {{ form_widget(registrationForm.nom, {'attr': {'class': 'form-control' ~ (registrationForm.nom.vars.errors|length ? ' is-invalid' : '')}}) }}
                    {% for error in registrationForm.nom.vars.errors %}
                    <div class=\"invalid-feedback d-block\">{{ error.message }}</div>
                    {% endfor %}
                </div>
            </div>

            <div class=\"mb-3\">
                {{ form_label(registrationForm.email, null, {'label_attr': {'class': 'form-label'}}) }}
                {{ form_widget(registrationForm.email, {'attr': {'class': 'form-control' ~ (registrationForm.email.vars.errors|length ? ' is-invalid' : '')}}) }}
                {% for error in registrationForm.email.vars.errors %}
                <div class=\"invalid-feedback d-block\">{{ error.message }}</div>
                {% endfor %}
            </div>

            <div class=\"row\">
                <div class=\"col-md-6 mb-3\">
                    {{ form_label(registrationForm.telephone, null, {'label_attr': {'class': 'form-label'}}) }}
                    {{ form_widget(registrationForm.telephone, {'attr': {'class': 'form-control' ~ (registrationForm.telephone.vars.errors|length ? ' is-invalid' : '')}}) }}
                    {% for error in registrationForm.telephone.vars.errors %}
                    <div class=\"invalid-feedback d-block\">{{ error.message }}</div>
                    {% endfor %}
                </div>
                <div class=\"col-md-6 mb-3\">
                    {{ form_label(registrationForm.dateNaissance, null, {'label_attr': {'class': 'form-label'}}) }}
                    {{ form_widget(registrationForm.dateNaissance, {'attr': {'class': 'form-control' ~ (registrationForm.dateNaissance.vars.errors|length ? ' is-invalid' : '')}}) }}
                    {% for error in registrationForm.dateNaissance.vars.errors %}
                    <div class=\"invalid-feedback d-block\">{{ error.message }}</div>
                    {% endfor %}
                </div>
            </div>

            <div class=\"mb-3\">
                {{ form_label(registrationForm.plainPassword.first, null, {'label_attr': {'class': 'form-label'}}) }}
                {{ form_widget(registrationForm.plainPassword.first, {'attr': {'class': 'form-control' ~ ((registrationForm.plainPassword.first.vars.errors|length or registrationForm.plainPassword.vars.errors|length) ? ' is-invalid' : '')}}) }}
                {% for error in registrationForm.plainPassword.first.vars.errors %}
                <div class=\"invalid-feedback d-block\">{{ error.message }}</div>
                {% endfor %}
            </div>

            <div class=\"mb-3\">
                {{ form_label(registrationForm.plainPassword.second, null, {'label_attr': {'class': 'form-label'}}) }}
                {{ form_widget(registrationForm.plainPassword.second, {'attr': {'class': 'form-control' ~ ((registrationForm.plainPassword.second.vars.errors|length or registrationForm.plainPassword.vars.errors|length) ? ' is-invalid' : '')}}) }}
                {% for error in registrationForm.plainPassword.second.vars.errors %}
                <div class=\"invalid-feedback d-block\">{{ error.message }}</div>
                {% endfor %}
                {% for error in registrationForm.plainPassword.vars.errors %}
                <div class=\"invalid-feedback d-block\">{{ error.message }}</div>
                {% endfor %}
            </div>

            <div class=\"mb-4\">
                {{ form_label(registrationForm.role, null, {'label_attr': {'class': 'form-label'}}) }}
                {{ form_widget(registrationForm.role, {'attr': {'class': 'form-select' ~ (registrationForm.role.vars.errors|length ? ' is-invalid' : '')}}) }}
                {% for error in registrationForm.role.vars.errors %}
                <div class=\"invalid-feedback d-block\">{{ error.message }}</div>
                {% endfor %}
            </div>

            {{ form_rest(registrationForm) }}

            <button type=\"submit\" class=\"btn btn-primary w-100 py-3 mb-3\" style=\"font-weight: 600;\">
                <i class=\"bi bi-person-plus me-2\"></i> Create Account
            </button>

            <p class=\"text-center text-muted mb-0\">
                Already have an account? <a href=\"{{ path('app_login') }}\" class=\"text-decoration-none\" style=\"color: var(--primary-color); font-weight: 500;\">Sign In</a>
            </p>
        {{ form_end(registrationForm, {render_rest: false}) }}
    </div>
</div>
{% endblock %}
", "security/register.html.twig", "C:\\Users\\Skaina\\Desktop\\final version symfony\\Marketplace-Project\\web\\templates\\security\\register.html.twig");
    }
}
