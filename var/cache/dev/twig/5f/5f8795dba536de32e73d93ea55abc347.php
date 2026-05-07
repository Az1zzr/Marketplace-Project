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

/* base.html.twig */
class __TwigTemplate_522471d642b2d8a19070284e24f5f80d extends Template
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

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'breadcrumb' => [$this, 'block_breadcrumb'],
            'body' => [$this, 'block_body'],
            'auth_content' => [$this, 'block_auth_content'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>";
        // line 6
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield "</title>
    <link rel=\"icon\" href=\"data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 128 128'><text y='1.2em' font-size='96'>M</text></svg>\">
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css\" rel=\"stylesheet\">
    <link href=\"https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap\" rel=\"stylesheet\">

    ";
        // line 12
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 492
        yield "</head>
<body>
    ";
        // line 494
        $context["renderedBreadcrumb"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield from $this->unwrap()->yieldBlock('breadcrumb', $context, $blocks);
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 495
        yield "    ";
        $context["renderedBody"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 496
        yield "    ";
        $context["renderedAuthContent"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            yield from $this->unwrap()->yieldBlock('auth_content', $context, $blocks);
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 497
        yield "
    ";
        // line 498
        $context["currentRoute"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 498, $this->source); })()), "request", [], "any", false, false, false, 498), "attributes", [], "any", false, false, false, 498), "get", ["_route"], "method", false, false, false, 498);
        // line 499
        yield "    ";
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 499, $this->source); })()), "user", [], "any", false, false, false, 499)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 500
            yield "        ";
            $context["dashboardRoute"] = (((($tmp = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("app_admin_dashboard") : ("app_front_dashboard"));
            // line 501
            yield "        ";
            $context["roleCode"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 501, $this->source); })()), "user", [], "any", false, false, false, 501), "roleCode", [], "any", false, false, false, 501);
            // line 502
            yield "
        ";
            // line 503
            if ((($tmp = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 504
                yield "        <div class=\"admin-shell\">
            <aside class=\"admin-sidebar\">
                <a href=\"";
                // line 506
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_dashboard");
                yield "\" class=\"admin-brand\">
                    <span class=\"admin-brand-title\">Marketplace</span>
                    <span class=\"admin-brand-note\">Admin backend</span>
                </a>

                <div class=\"admin-nav-section\">Overview</div>
                <a href=\"";
                // line 512
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_dashboard");
                yield "\" class=\"admin-nav-link ";
                if (((isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 512, $this->source); })()) == "app_admin_dashboard")) {
                    yield "active";
                }
                yield "\">
                    <i class=\"bi bi-speedometer2\"></i>
                    Dashboard
                </a>

                <div class=\"admin-nav-section\">Operations</div>
                <a href=\"";
                // line 518
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_index");
                yield "\" class=\"admin-nav-link ";
                if (CoreExtension::inFilter("produit", (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 518, $this->source); })()))) {
                    yield "active";
                }
                yield "\">
                    <i class=\"bi bi-box-seam\"></i>
                    Products
                </a>
                <a href=\"";
                // line 522
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_categorie_index");
                yield "\" class=\"admin-nav-link ";
                if (CoreExtension::inFilter("categorie", (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 522, $this->source); })()))) {
                    yield "active";
                }
                yield "\">
                    <i class=\"bi bi-tags\"></i>
                    Categories
                </a>
                <a href=\"";
                // line 526
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_commande_index");
                yield "\" class=\"admin-nav-link ";
                if (CoreExtension::inFilter("commande", (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 526, $this->source); })()))) {
                    yield "active";
                }
                yield "\">
                    <i class=\"bi bi-cart3\"></i>
                    Orders
                </a>
                <a href=\"";
                // line 530
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_livraison_index");
                yield "\" class=\"admin-nav-link ";
                if (CoreExtension::inFilter("livraison", (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 530, $this->source); })()))) {
                    yield "active";
                }
                yield "\">
                    <i class=\"bi bi-truck\"></i>
                    Deliveries
                </a>
                <a href=\"";
                // line 534
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_feedback_index");
                yield "\" class=\"admin-nav-link ";
                if ((CoreExtension::inFilter("feedback", (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 534, $this->source); })())) || CoreExtension::inFilter("reponse", (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 534, $this->source); })())))) {
                    yield "active";
                }
                yield "\">
                    <i class=\"bi bi-chat-left-text\"></i>
                    Feedback
                </a>

                <div class=\"admin-nav-section\">Administration</div>
                <a href=\"";
                // line 540
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_user_index");
                yield "\" class=\"admin-nav-link ";
                if (CoreExtension::inFilter("user", (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 540, $this->source); })()))) {
                    yield "active";
                }
                yield "\">
                    <i class=\"bi bi-people\"></i>
                    Users
                </a>
                <a href=\"";
                // line 544
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_role_index");
                yield "\" class=\"admin-nav-link ";
                if (CoreExtension::inFilter("role", (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 544, $this->source); })()))) {
                    yield "active";
                }
                yield "\">
                    <i class=\"bi bi-shield-lock\"></i>
                    Roles
                </a>
            </aside>

            <div class=\"admin-main\">
                <header class=\"admin-topbar\">
                    <div>
                        <div class=\"role-pill role-pill-admin\">
                            <i class=\"bi bi-shield-check\"></i>
                            Admin Space
                        </div>
                        <nav aria-label=\"breadcrumb\" class=\"mt-3\">
                            <ol class=\"breadcrumb\">
                                <li class=\"breadcrumb-item\"><a href=\"";
                // line 559
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_dashboard");
                yield "\">Dashboard</a></li>
                                ";
                // line 560
                yield (isset($context["renderedBreadcrumb"]) || array_key_exists("renderedBreadcrumb", $context) ? $context["renderedBreadcrumb"] : (function () { throw new RuntimeError('Variable "renderedBreadcrumb" does not exist.', 560, $this->source); })());
                yield "
                            </ol>
                        </nav>
                    </div>

                    <div class=\"admin-account\">
                        ";
                // line 566
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 566, $this->source); })()), "user", [], "any", false, false, false, 566), "photoPath", [], "any", false, false, false, 566)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 567
                    yield "                        <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 567, $this->source); })()), "user", [], "any", false, false, false, 567), "photoPath", [], "any", false, false, false, 567), "html", null, true);
                    yield "\" alt=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 567, $this->source); })()), "user", [], "any", false, false, false, 567), "nomComplet", [], "any", false, false, false, 567), "html", null, true);
                    yield "\" class=\"user-avatar-image\">
                        ";
                } else {
                    // line 569
                    yield "                        <div class=\"user-avatar\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 569, $this->source); })()), "user", [], "any", false, false, false, 569), "prenom", [], "any", false, false, false, 569)), "html", null, true);
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 569, $this->source); })()), "user", [], "any", false, false, false, 569), "nom", [], "any", false, false, false, 569)), "html", null, true);
                    yield "</div>
                        ";
                }
                // line 571
                yield "                        <div class=\"account-meta\">
                            <strong>";
                // line 572
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 572, $this->source); })()), "user", [], "any", false, false, false, 572), "nomComplet", [], "any", false, false, false, 572), "html", null, true);
                yield "</strong>
                            <span>";
                // line 573
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 573, $this->source); })()), "user", [], "any", false, false, false, 573), "roleDisplayName", [], "any", false, false, false, 573), "html", null, true);
                yield "</span>
                        </div>
                        <a href=\"";
                // line 575
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_account_profile");
                yield "\" class=\"btn btn-outline-secondary btn-sm\">Profile</a>
                        <a href=\"";
                // line 576
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
                yield "\" class=\"btn btn-outline-danger btn-sm\">Logout</a>
                    </div>
                </header>

                <main class=\"page-content\">
                    <div class=\"flash-stack\">
                        ";
                // line 582
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 582, $this->source); })()), "flashes", ["success"], "method", false, false, false, 582));
                foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                    // line 583
                    yield "                        <div class=\"flash-message flash-success\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
                    yield "</div>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 585
                yield "
                        ";
                // line 586
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 586, $this->source); })()), "flashes", ["error"], "method", false, false, false, 586));
                foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                    // line 587
                    yield "                        <div class=\"flash-message flash-error\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
                    yield "</div>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 589
                yield "                    </div>

                    ";
                // line 591
                yield (isset($context["renderedBody"]) || array_key_exists("renderedBody", $context) ? $context["renderedBody"] : (function () { throw new RuntimeError('Variable "renderedBody" does not exist.', 591, $this->source); })());
                yield "
                </main>
            </div>
        </div>
        ";
            } else {
                // line 596
                yield "        <div class=\"front-shell\">
            <header class=\"front-header\">
                <div class=\"front-header-inner\">
                    <a href=\"";
                // line 599
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_front_dashboard");
                yield "\" class=\"front-brand\">Marketplace</a>

                    <nav class=\"front-nav\">
                        <a href=\"";
                // line 602
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_front_dashboard");
                yield "\" class=\"front-nav-link ";
                if (((isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 602, $this->source); })()) == "app_front_dashboard")) {
                    yield "active";
                }
                yield "\">
                            <i class=\"bi bi-house-door\"></i>
                            Home
                        </a>
                        <a href=\"";
                // line 606
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_index");
                yield "\" class=\"front-nav-link ";
                if (CoreExtension::inFilter("produit", (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 606, $this->source); })()))) {
                    yield "active";
                }
                yield "\">
                            <i class=\"bi bi-grid\"></i>
                            Products
                        </a>
                        ";
                // line 610
                if (CoreExtension::inFilter((isset($context["roleCode"]) || array_key_exists("roleCode", $context) ? $context["roleCode"] : (function () { throw new RuntimeError('Variable "roleCode" does not exist.', 610, $this->source); })()), ["client", "fournisseur"])) {
                    // line 611
                    yield "                        <a href=\"";
                    yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_commande_index");
                    yield "\" class=\"front-nav-link ";
                    if (CoreExtension::inFilter("commande", (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 611, $this->source); })()))) {
                        yield "active";
                    }
                    yield "\">
                            <i class=\"bi bi-bag-check\"></i>
                            Orders
                        </a>
                        ";
                }
                // line 616
                yield "                        ";
                if (CoreExtension::inFilter((isset($context["roleCode"]) || array_key_exists("roleCode", $context) ? $context["roleCode"] : (function () { throw new RuntimeError('Variable "roleCode" does not exist.', 616, $this->source); })()), ["client", "fournisseur"])) {
                    // line 617
                    yield "                        <a href=\"";
                    yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_livraison_index");
                    yield "\" class=\"front-nav-link ";
                    if (CoreExtension::inFilter("livraison", (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 617, $this->source); })()))) {
                        yield "active";
                    }
                    yield "\">
                            <i class=\"bi bi-truck\"></i>
                            Deliveries
                        </a>
                        ";
                }
                // line 622
                yield "                        ";
                if (((isset($context["roleCode"]) || array_key_exists("roleCode", $context) ? $context["roleCode"] : (function () { throw new RuntimeError('Variable "roleCode" does not exist.', 622, $this->source); })()) == "fournisseur")) {
                    // line 623
                    yield "                        <a href=\"";
                    yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_categorie_index");
                    yield "\" class=\"front-nav-link ";
                    if (CoreExtension::inFilter("categorie", (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 623, $this->source); })()))) {
                        yield "active";
                    }
                    yield "\">
                            <i class=\"bi bi-tags\"></i>
                            Categories
                        </a>
                        ";
                }
                // line 628
                yield "                        <a href=\"";
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_feedback_index");
                yield "\" class=\"front-nav-link ";
                if ((CoreExtension::inFilter("feedback", (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 628, $this->source); })())) || CoreExtension::inFilter("reponse", (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 628, $this->source); })())))) {
                    yield "active";
                }
                yield "\">
                            <i class=\"bi bi-chat-left-quote\"></i>
                            Feedback
                        </a>
                    </nav>

                    <div class=\"front-account\">
                        ";
                // line 635
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 635, $this->source); })()), "user", [], "any", false, false, false, 635), "photoPath", [], "any", false, false, false, 635)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 636
                    yield "                        <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 636, $this->source); })()), "user", [], "any", false, false, false, 636), "photoPath", [], "any", false, false, false, 636), "html", null, true);
                    yield "\" alt=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 636, $this->source); })()), "user", [], "any", false, false, false, 636), "nomComplet", [], "any", false, false, false, 636), "html", null, true);
                    yield "\" class=\"user-avatar-image\">
                        ";
                } else {
                    // line 638
                    yield "                        <div class=\"user-avatar\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 638, $this->source); })()), "user", [], "any", false, false, false, 638), "prenom", [], "any", false, false, false, 638)), "html", null, true);
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 638, $this->source); })()), "user", [], "any", false, false, false, 638), "nom", [], "any", false, false, false, 638)), "html", null, true);
                    yield "</div>
                        ";
                }
                // line 640
                yield "                        <div class=\"account-meta\">
                            <strong>";
                // line 641
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 641, $this->source); })()), "user", [], "any", false, false, false, 641), "nomComplet", [], "any", false, false, false, 641), "html", null, true);
                yield "</strong>
                            <span>";
                // line 642
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 642, $this->source); })()), "user", [], "any", false, false, false, 642), "roleDisplayName", [], "any", false, false, false, 642), "html", null, true);
                yield " Space</span>
                        </div>
                        <a href=\"";
                // line 644
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_account_profile");
                yield "\" class=\"btn btn-outline-secondary btn-sm\">Profile</a>
                        <a href=\"";
                // line 645
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
                yield "\" class=\"btn btn-outline-danger btn-sm\">Logout</a>
                    </div>
                </div>
            </header>

            <main class=\"front-main\">
                <section class=\"front-banner\">
                    <div>
                        <div class=\"role-pill role-pill-front\">
                            <i class=\"bi bi-shop-window\"></i>
                            ";
                // line 655
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 655, $this->source); })()), "user", [], "any", false, false, false, 655), "roleDisplayName", [], "any", false, false, false, 655), "html", null, true);
                yield " Interface
                        </div>
                        <h2 class=\"mt-3\">
                            ";
                // line 658
                if (((isset($context["roleCode"]) || array_key_exists("roleCode", $context) ? $context["roleCode"] : (function () { throw new RuntimeError('Variable "roleCode" does not exist.', 658, $this->source); })()) == "fournisseur")) {
                    // line 659
                    yield "                            Manage your catalog, receive client orders, assign deliveries, and answer customer conversations.
                            ";
                } else {
                    // line 661
                    yield "                            Discover products, place orders, and share real feedback.
                            ";
                }
                // line 663
                yield "                        </h2>
                        <p>
                            ";
                // line 665
                if (((isset($context["roleCode"]) || array_key_exists("roleCode", $context) ? $context["roleCode"] : (function () { throw new RuntimeError('Variable "roleCode" does not exist.', 665, $this->source); })()) == "fournisseur")) {
                    // line 666
                    yield "                            Your tools focus on publishing products, tracking buyer orders, and assigning delivery drivers.
                            ";
                } else {
                    // line 668
                    yield "                            Your tools focus on browsing, buying, and reviewing products.
                            ";
                }
                // line 670
                yield "                        </p>
                    </div>

                    <nav aria-label=\"breadcrumb\">
                        <ol class=\"breadcrumb\">
                            <li class=\"breadcrumb-item\"><a href=\"";
                // line 675
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath((isset($context["dashboardRoute"]) || array_key_exists("dashboardRoute", $context) ? $context["dashboardRoute"] : (function () { throw new RuntimeError('Variable "dashboardRoute" does not exist.', 675, $this->source); })()));
                yield "\">Home</a></li>
                            ";
                // line 676
                yield (isset($context["renderedBreadcrumb"]) || array_key_exists("renderedBreadcrumb", $context) ? $context["renderedBreadcrumb"] : (function () { throw new RuntimeError('Variable "renderedBreadcrumb" does not exist.', 676, $this->source); })());
                yield "
                        </ol>
                    </nav>
                </section>

                <div class=\"flash-stack\">
                    ";
                // line 682
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 682, $this->source); })()), "flashes", ["success"], "method", false, false, false, 682));
                foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                    // line 683
                    yield "                    <div class=\"flash-message flash-success\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
                    yield "</div>
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 685
                yield "
                ";
                // line 686
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 686, $this->source); })()), "flashes", ["error"], "method", false, false, false, 686));
                foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                    // line 687
                    yield "                    <div class=\"flash-message flash-error\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
                    yield "</div>
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 689
                yield "                </div>

                ";
                // line 691
                yield (isset($context["renderedBody"]) || array_key_exists("renderedBody", $context) ? $context["renderedBody"] : (function () { throw new RuntimeError('Variable "renderedBody" does not exist.', 691, $this->source); })());
                yield "
            </main>
        </div>
        ";
            }
            // line 695
            yield "    ";
        } else {
            // line 696
            yield "        ";
            yield (isset($context["renderedAuthContent"]) || array_key_exists("renderedAuthContent", $context) ? $context["renderedAuthContent"] : (function () { throw new RuntimeError('Variable "renderedAuthContent" does not exist.', 696, $this->source); })());
            yield "
    ";
        }
        // line 698
        yield "
    ";
        // line 699
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 700
        yield "</body>
</html>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 6
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

        yield "Marketplace";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 12
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 13
        yield "    <style>
        :root {
            --primary-color: #2563eb;
            --primary-dark: #1d4ed8;
            --slate-950: #020617;
            --slate-900: #0f172a;
            --slate-800: #1e293b;
            --slate-700: #334155;
            --slate-600: #475569;
            --slate-500: #64748b;
            --slate-200: #e2e8f0;
            --slate-100: #f1f5f9;
            --surface: #ffffff;
            --front-accent: #0f766e;
            --front-accent-soft: #ccfbf1;
            --danger-soft: #fee2e2;
            --success-soft: #dcfce7;
            --warning-soft: #fef3c7;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            background: var(--slate-100);
            color: var(--slate-900);
        }

        a {
            color: inherit;
        }

        .page-content {
            padding: 2rem;
        }

        .page-header {
            margin-bottom: 2rem;
        }

        .page-header h1 {
            margin: 0;
            font-size: 2rem;
            font-weight: 800;
            letter-spacing: -0.03em;
        }

        .page-header p {
            margin: 0.5rem 0 0;
            color: var(--slate-500);
        }

        .card {
            border: 0;
            border-radius: 18px;
            box-shadow: 0 20px 40px -32px rgba(15, 23, 42, 0.45);
            overflow: hidden;
        }

        .card-header {
            background: var(--surface);
            border-bottom: 1px solid var(--slate-200);
            padding: 1.1rem 1.25rem;
        }

        .card-body {
            padding: 1.25rem;
        }

        .card-footer {
            background: var(--surface);
            border-top: 1px solid var(--slate-200);
        }

        .stat-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1rem;
        }

        .stat-card {
            padding: 1.25rem;
            border-radius: 18px;
            background: var(--surface);
            border: 1px solid rgba(148, 163, 184, 0.14);
        }

        .stat-label {
            font-size: 0.82rem;
            font-weight: 700;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: var(--slate-500);
        }

        .stat-value {
            margin-top: 0.5rem;
            font-size: 2rem;
            font-weight: 800;
            letter-spacing: -0.04em;
        }

        .stat-note {
            margin-top: 0.3rem;
            color: var(--slate-500);
            font-size: 0.9rem;
        }

        .flash-stack {
            display: grid;
            gap: 0.9rem;
            margin-bottom: 1.25rem;
        }

        .flash-message {
            border-radius: 14px;
            padding: 0.95rem 1.1rem;
            font-weight: 500;
        }

        .flash-success {
            background: var(--success-soft);
            color: #166534;
        }

        .flash-error {
            background: var(--danger-soft);
            color: #991b1b;
        }

        .spell-error {
            background: rgba(245, 158, 11, 0.28);
            padding: 0 0.12rem;
            border-radius: 0.2rem;
        }

        .spellcheck-highlighted-text {
            white-space: pre-wrap;
            background: rgba(248, 250, 252, 0.85);
            border: 1px dashed var(--slate-200);
            border-radius: 12px;
            padding: 0.85rem 0.95rem;
            color: var(--slate-800);
        }

        .role-pill {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            padding: 0.4rem 0.8rem;
            border-radius: 999px;
            font-size: 0.82rem;
            font-weight: 700;
            letter-spacing: 0.03em;
            text-transform: uppercase;
        }

        .role-pill-admin {
            background: rgba(37, 99, 235, 0.12);
            color: var(--primary-dark);
        }

        .role-pill-front {
            background: var(--front-accent-soft);
            color: var(--front-accent);
        }

        .user-avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary-color), #7c3aed);
            color: #fff;
            flex-shrink: 0;
        }

        .user-avatar-image {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            object-fit: cover;
            flex-shrink: 0;
            border: 2px solid rgba(255, 255, 255, 0.65);
            box-shadow: 0 8px 20px -14px rgba(15, 23, 42, 0.85);
        }

        .auth-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
            background:
                radial-gradient(circle at top left, rgba(37, 99, 235, 0.2), transparent 30%),
                radial-gradient(circle at bottom right, rgba(15, 118, 110, 0.22), transparent 30%),
                linear-gradient(135deg, #e2e8f0, #f8fafc 58%, #dbeafe);
        }

        .auth-card {
            width: 100%;
            max-width: 440px;
            padding: 3rem;
            border-radius: 24px;
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 40px 70px -40px rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.7);
        }

        .auth-logo {
            text-align: center;
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1rem;
        }

        .admin-shell {
            display: grid;
            grid-template-columns: 280px 1fr;
            min-height: 100vh;
        }

        .admin-sidebar {
            padding: 1.75rem 1.2rem;
            background: linear-gradient(180deg, var(--slate-950), var(--slate-900));
            color: #fff;
        }

        .admin-brand {
            display: block;
            text-decoration: none;
            color: #fff;
            margin-bottom: 1.5rem;
        }

        .admin-brand span {
            display: block;
        }

        .admin-brand-title {
            font-size: 1.45rem;
            font-weight: 800;
            letter-spacing: -0.03em;
        }

        .admin-brand-note {
            color: rgba(226, 232, 240, 0.7);
            margin-top: 0.35rem;
            font-size: 0.92rem;
        }

        .admin-nav-section {
            margin: 1.4rem 0 0.55rem;
            padding: 0 0.8rem;
            color: rgba(226, 232, 240, 0.56);
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .admin-nav-link {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            padding: 0.85rem 0.95rem;
            border-radius: 14px;
            color: rgba(226, 232, 240, 0.82);
            text-decoration: none;
            margin-bottom: 0.35rem;
            font-weight: 500;
            transition: background-color 0.2s ease, color 0.2s ease;
        }

        .admin-nav-link:hover,
        .admin-nav-link.active {
            background: rgba(59, 130, 246, 0.16);
            color: #fff;
        }

        .admin-main {
            min-width: 0;
        }

        .admin-topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding: 1.35rem 2rem;
            background: rgba(255, 255, 255, 0.94);
            backdrop-filter: blur(14px);
            border-bottom: 1px solid rgba(148, 163, 184, 0.16);
        }

        .admin-account,
        .front-account {
            display: flex;
            align-items: center;
            gap: 0.9rem;
        }

        .account-meta {
            display: flex;
            flex-direction: column;
            gap: 0.1rem;
        }

        .account-meta strong {
            font-size: 0.95rem;
        }

        .account-meta span {
            color: var(--slate-500);
            font-size: 0.85rem;
        }

        .front-shell {
            min-height: 100vh;
            background:
                radial-gradient(circle at top left, rgba(15, 118, 110, 0.1), transparent 28%),
                radial-gradient(circle at top right, rgba(37, 99, 235, 0.1), transparent 24%),
                #f8fafc;
        }

        .front-header {
            border-bottom: 1px solid rgba(148, 163, 184, 0.18);
            background: rgba(255, 255, 255, 0.92);
        }

        .front-header-inner {
            max-width: 1180px;
            margin: 0 auto;
            padding: 1.2rem 1.4rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }

        .front-brand {
            text-decoration: none;
            font-size: 1.45rem;
            font-weight: 800;
            letter-spacing: -0.03em;
            color: var(--slate-900);
        }

        .front-nav {
            display: flex;
            align-items: center;
            gap: 0.55rem;
            flex-wrap: wrap;
        }

        .front-nav-link {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            padding: 0.7rem 0.95rem;
            border-radius: 999px;
            text-decoration: none;
            color: var(--slate-700);
            font-weight: 600;
        }

        .front-nav-link:hover,
        .front-nav-link.active {
            background: rgba(15, 118, 110, 0.12);
            color: var(--front-accent);
        }

        .front-main {
            max-width: 1180px;
            margin: 0 auto;
            padding: 2rem 1.4rem 3rem;
        }

        .front-banner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding: 1.2rem 1.35rem;
            border-radius: 22px;
            background: linear-gradient(135deg, #ffffff, #ecfeff);
            border: 1px solid rgba(15, 118, 110, 0.12);
            margin-bottom: 1.5rem;
        }

        .front-banner h2 {
            margin: 0;
            font-size: 1.25rem;
            font-weight: 800;
        }

        .front-banner p {
            margin: 0.35rem 0 0;
            color: var(--slate-500);
        }

        .table thead th {
            background: #f8fafc;
            color: var(--slate-500);
            font-size: 0.82rem;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            font-weight: 700;
            border-bottom: 1px solid var(--slate-200);
        }

        .table tbody td {
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f9;
        }

        .breadcrumb {
            margin: 0;
        }

        .breadcrumb-item a {
            color: var(--slate-500);
            text-decoration: none;
        }

        .breadcrumb-item.active {
            color: var(--slate-900);
            font-weight: 600;
        }

        @media (max-width: 1100px) {
            .admin-shell {
                grid-template-columns: 1fr;
            }

            .admin-sidebar {
                padding-bottom: 0.75rem;
            }
        }

        @media (max-width: 900px) {
            .admin-topbar,
            .front-header-inner,
            .front-banner {
                flex-direction: column;
                align-items: flex-start;
            }

            .admin-account,
            .front-account {
                width: 100%;
                justify-content: space-between;
            }

            .page-content,
            .front-main {
                padding-left: 1rem;
                padding-right: 1rem;
            }
        }

        @media (max-width: 640px) {
            .auth-card {
                padding: 2rem 1.4rem;
            }

            .page-header h1 {
                font-size: 1.55rem;
            }
        }
    </style>
    ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 494
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

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 495
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

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 496
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

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 699
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

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "base.html.twig";
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
        return array (  1173 => 699,  1151 => 496,  1129 => 495,  1107 => 494,  618 => 13,  605 => 12,  582 => 6,  569 => 700,  567 => 699,  564 => 698,  558 => 696,  555 => 695,  548 => 691,  544 => 689,  535 => 687,  531 => 686,  528 => 685,  519 => 683,  515 => 682,  506 => 676,  502 => 675,  495 => 670,  491 => 668,  487 => 666,  485 => 665,  481 => 663,  477 => 661,  473 => 659,  471 => 658,  465 => 655,  452 => 645,  448 => 644,  443 => 642,  439 => 641,  436 => 640,  429 => 638,  421 => 636,  419 => 635,  404 => 628,  391 => 623,  388 => 622,  375 => 617,  372 => 616,  359 => 611,  357 => 610,  346 => 606,  335 => 602,  329 => 599,  324 => 596,  316 => 591,  312 => 589,  303 => 587,  299 => 586,  296 => 585,  287 => 583,  283 => 582,  274 => 576,  270 => 575,  265 => 573,  261 => 572,  258 => 571,  251 => 569,  243 => 567,  241 => 566,  232 => 560,  228 => 559,  206 => 544,  195 => 540,  182 => 534,  171 => 530,  160 => 526,  149 => 522,  138 => 518,  125 => 512,  116 => 506,  112 => 504,  110 => 503,  107 => 502,  104 => 501,  101 => 500,  98 => 499,  96 => 498,  93 => 497,  87 => 496,  81 => 495,  76 => 494,  72 => 492,  70 => 12,  61 => 6,  54 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>{% block title %}Marketplace{% endblock %}</title>
    <link rel=\"icon\" href=\"data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 128 128'><text y='1.2em' font-size='96'>M</text></svg>\">
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css\" rel=\"stylesheet\">
    <link href=\"https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap\" rel=\"stylesheet\">

    {% block stylesheets %}
    <style>
        :root {
            --primary-color: #2563eb;
            --primary-dark: #1d4ed8;
            --slate-950: #020617;
            --slate-900: #0f172a;
            --slate-800: #1e293b;
            --slate-700: #334155;
            --slate-600: #475569;
            --slate-500: #64748b;
            --slate-200: #e2e8f0;
            --slate-100: #f1f5f9;
            --surface: #ffffff;
            --front-accent: #0f766e;
            --front-accent-soft: #ccfbf1;
            --danger-soft: #fee2e2;
            --success-soft: #dcfce7;
            --warning-soft: #fef3c7;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            background: var(--slate-100);
            color: var(--slate-900);
        }

        a {
            color: inherit;
        }

        .page-content {
            padding: 2rem;
        }

        .page-header {
            margin-bottom: 2rem;
        }

        .page-header h1 {
            margin: 0;
            font-size: 2rem;
            font-weight: 800;
            letter-spacing: -0.03em;
        }

        .page-header p {
            margin: 0.5rem 0 0;
            color: var(--slate-500);
        }

        .card {
            border: 0;
            border-radius: 18px;
            box-shadow: 0 20px 40px -32px rgba(15, 23, 42, 0.45);
            overflow: hidden;
        }

        .card-header {
            background: var(--surface);
            border-bottom: 1px solid var(--slate-200);
            padding: 1.1rem 1.25rem;
        }

        .card-body {
            padding: 1.25rem;
        }

        .card-footer {
            background: var(--surface);
            border-top: 1px solid var(--slate-200);
        }

        .stat-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1rem;
        }

        .stat-card {
            padding: 1.25rem;
            border-radius: 18px;
            background: var(--surface);
            border: 1px solid rgba(148, 163, 184, 0.14);
        }

        .stat-label {
            font-size: 0.82rem;
            font-weight: 700;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: var(--slate-500);
        }

        .stat-value {
            margin-top: 0.5rem;
            font-size: 2rem;
            font-weight: 800;
            letter-spacing: -0.04em;
        }

        .stat-note {
            margin-top: 0.3rem;
            color: var(--slate-500);
            font-size: 0.9rem;
        }

        .flash-stack {
            display: grid;
            gap: 0.9rem;
            margin-bottom: 1.25rem;
        }

        .flash-message {
            border-radius: 14px;
            padding: 0.95rem 1.1rem;
            font-weight: 500;
        }

        .flash-success {
            background: var(--success-soft);
            color: #166534;
        }

        .flash-error {
            background: var(--danger-soft);
            color: #991b1b;
        }

        .spell-error {
            background: rgba(245, 158, 11, 0.28);
            padding: 0 0.12rem;
            border-radius: 0.2rem;
        }

        .spellcheck-highlighted-text {
            white-space: pre-wrap;
            background: rgba(248, 250, 252, 0.85);
            border: 1px dashed var(--slate-200);
            border-radius: 12px;
            padding: 0.85rem 0.95rem;
            color: var(--slate-800);
        }

        .role-pill {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            padding: 0.4rem 0.8rem;
            border-radius: 999px;
            font-size: 0.82rem;
            font-weight: 700;
            letter-spacing: 0.03em;
            text-transform: uppercase;
        }

        .role-pill-admin {
            background: rgba(37, 99, 235, 0.12);
            color: var(--primary-dark);
        }

        .role-pill-front {
            background: var(--front-accent-soft);
            color: var(--front-accent);
        }

        .user-avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary-color), #7c3aed);
            color: #fff;
            flex-shrink: 0;
        }

        .user-avatar-image {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            object-fit: cover;
            flex-shrink: 0;
            border: 2px solid rgba(255, 255, 255, 0.65);
            box-shadow: 0 8px 20px -14px rgba(15, 23, 42, 0.85);
        }

        .auth-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
            background:
                radial-gradient(circle at top left, rgba(37, 99, 235, 0.2), transparent 30%),
                radial-gradient(circle at bottom right, rgba(15, 118, 110, 0.22), transparent 30%),
                linear-gradient(135deg, #e2e8f0, #f8fafc 58%, #dbeafe);
        }

        .auth-card {
            width: 100%;
            max-width: 440px;
            padding: 3rem;
            border-radius: 24px;
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 40px 70px -40px rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.7);
        }

        .auth-logo {
            text-align: center;
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1rem;
        }

        .admin-shell {
            display: grid;
            grid-template-columns: 280px 1fr;
            min-height: 100vh;
        }

        .admin-sidebar {
            padding: 1.75rem 1.2rem;
            background: linear-gradient(180deg, var(--slate-950), var(--slate-900));
            color: #fff;
        }

        .admin-brand {
            display: block;
            text-decoration: none;
            color: #fff;
            margin-bottom: 1.5rem;
        }

        .admin-brand span {
            display: block;
        }

        .admin-brand-title {
            font-size: 1.45rem;
            font-weight: 800;
            letter-spacing: -0.03em;
        }

        .admin-brand-note {
            color: rgba(226, 232, 240, 0.7);
            margin-top: 0.35rem;
            font-size: 0.92rem;
        }

        .admin-nav-section {
            margin: 1.4rem 0 0.55rem;
            padding: 0 0.8rem;
            color: rgba(226, 232, 240, 0.56);
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .admin-nav-link {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            padding: 0.85rem 0.95rem;
            border-radius: 14px;
            color: rgba(226, 232, 240, 0.82);
            text-decoration: none;
            margin-bottom: 0.35rem;
            font-weight: 500;
            transition: background-color 0.2s ease, color 0.2s ease;
        }

        .admin-nav-link:hover,
        .admin-nav-link.active {
            background: rgba(59, 130, 246, 0.16);
            color: #fff;
        }

        .admin-main {
            min-width: 0;
        }

        .admin-topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding: 1.35rem 2rem;
            background: rgba(255, 255, 255, 0.94);
            backdrop-filter: blur(14px);
            border-bottom: 1px solid rgba(148, 163, 184, 0.16);
        }

        .admin-account,
        .front-account {
            display: flex;
            align-items: center;
            gap: 0.9rem;
        }

        .account-meta {
            display: flex;
            flex-direction: column;
            gap: 0.1rem;
        }

        .account-meta strong {
            font-size: 0.95rem;
        }

        .account-meta span {
            color: var(--slate-500);
            font-size: 0.85rem;
        }

        .front-shell {
            min-height: 100vh;
            background:
                radial-gradient(circle at top left, rgba(15, 118, 110, 0.1), transparent 28%),
                radial-gradient(circle at top right, rgba(37, 99, 235, 0.1), transparent 24%),
                #f8fafc;
        }

        .front-header {
            border-bottom: 1px solid rgba(148, 163, 184, 0.18);
            background: rgba(255, 255, 255, 0.92);
        }

        .front-header-inner {
            max-width: 1180px;
            margin: 0 auto;
            padding: 1.2rem 1.4rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }

        .front-brand {
            text-decoration: none;
            font-size: 1.45rem;
            font-weight: 800;
            letter-spacing: -0.03em;
            color: var(--slate-900);
        }

        .front-nav {
            display: flex;
            align-items: center;
            gap: 0.55rem;
            flex-wrap: wrap;
        }

        .front-nav-link {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            padding: 0.7rem 0.95rem;
            border-radius: 999px;
            text-decoration: none;
            color: var(--slate-700);
            font-weight: 600;
        }

        .front-nav-link:hover,
        .front-nav-link.active {
            background: rgba(15, 118, 110, 0.12);
            color: var(--front-accent);
        }

        .front-main {
            max-width: 1180px;
            margin: 0 auto;
            padding: 2rem 1.4rem 3rem;
        }

        .front-banner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding: 1.2rem 1.35rem;
            border-radius: 22px;
            background: linear-gradient(135deg, #ffffff, #ecfeff);
            border: 1px solid rgba(15, 118, 110, 0.12);
            margin-bottom: 1.5rem;
        }

        .front-banner h2 {
            margin: 0;
            font-size: 1.25rem;
            font-weight: 800;
        }

        .front-banner p {
            margin: 0.35rem 0 0;
            color: var(--slate-500);
        }

        .table thead th {
            background: #f8fafc;
            color: var(--slate-500);
            font-size: 0.82rem;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            font-weight: 700;
            border-bottom: 1px solid var(--slate-200);
        }

        .table tbody td {
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f9;
        }

        .breadcrumb {
            margin: 0;
        }

        .breadcrumb-item a {
            color: var(--slate-500);
            text-decoration: none;
        }

        .breadcrumb-item.active {
            color: var(--slate-900);
            font-weight: 600;
        }

        @media (max-width: 1100px) {
            .admin-shell {
                grid-template-columns: 1fr;
            }

            .admin-sidebar {
                padding-bottom: 0.75rem;
            }
        }

        @media (max-width: 900px) {
            .admin-topbar,
            .front-header-inner,
            .front-banner {
                flex-direction: column;
                align-items: flex-start;
            }

            .admin-account,
            .front-account {
                width: 100%;
                justify-content: space-between;
            }

            .page-content,
            .front-main {
                padding-left: 1rem;
                padding-right: 1rem;
            }
        }

        @media (max-width: 640px) {
            .auth-card {
                padding: 2rem 1.4rem;
            }

            .page-header h1 {
                font-size: 1.55rem;
            }
        }
    </style>
    {% endblock %}
</head>
<body>
    {% set renderedBreadcrumb %}{% block breadcrumb %}{% endblock %}{% endset %}
    {% set renderedBody %}{% block body %}{% endblock %}{% endset %}
    {% set renderedAuthContent %}{% block auth_content %}{% endblock %}{% endset %}

    {% set currentRoute = app.request.attributes.get('_route') %}
    {% if app.user %}
        {% set dashboardRoute = is_granted('ROLE_ADMIN') ? 'app_admin_dashboard' : 'app_front_dashboard' %}
        {% set roleCode = app.user.roleCode %}

        {% if is_granted('ROLE_ADMIN') %}
        <div class=\"admin-shell\">
            <aside class=\"admin-sidebar\">
                <a href=\"{{ path('app_admin_dashboard') }}\" class=\"admin-brand\">
                    <span class=\"admin-brand-title\">Marketplace</span>
                    <span class=\"admin-brand-note\">Admin backend</span>
                </a>

                <div class=\"admin-nav-section\">Overview</div>
                <a href=\"{{ path('app_admin_dashboard') }}\" class=\"admin-nav-link {% if currentRoute == 'app_admin_dashboard' %}active{% endif %}\">
                    <i class=\"bi bi-speedometer2\"></i>
                    Dashboard
                </a>

                <div class=\"admin-nav-section\">Operations</div>
                <a href=\"{{ path('app_produit_index') }}\" class=\"admin-nav-link {% if 'produit' in currentRoute %}active{% endif %}\">
                    <i class=\"bi bi-box-seam\"></i>
                    Products
                </a>
                <a href=\"{{ path('app_categorie_index') }}\" class=\"admin-nav-link {% if 'categorie' in currentRoute %}active{% endif %}\">
                    <i class=\"bi bi-tags\"></i>
                    Categories
                </a>
                <a href=\"{{ path('app_commande_index') }}\" class=\"admin-nav-link {% if 'commande' in currentRoute %}active{% endif %}\">
                    <i class=\"bi bi-cart3\"></i>
                    Orders
                </a>
                <a href=\"{{ path('app_livraison_index') }}\" class=\"admin-nav-link {% if 'livraison' in currentRoute %}active{% endif %}\">
                    <i class=\"bi bi-truck\"></i>
                    Deliveries
                </a>
                <a href=\"{{ path('app_feedback_index') }}\" class=\"admin-nav-link {% if 'feedback' in currentRoute or 'reponse' in currentRoute %}active{% endif %}\">
                    <i class=\"bi bi-chat-left-text\"></i>
                    Feedback
                </a>

                <div class=\"admin-nav-section\">Administration</div>
                <a href=\"{{ path('app_user_index') }}\" class=\"admin-nav-link {% if 'user' in currentRoute %}active{% endif %}\">
                    <i class=\"bi bi-people\"></i>
                    Users
                </a>
                <a href=\"{{ path('app_role_index') }}\" class=\"admin-nav-link {% if 'role' in currentRoute %}active{% endif %}\">
                    <i class=\"bi bi-shield-lock\"></i>
                    Roles
                </a>
            </aside>

            <div class=\"admin-main\">
                <header class=\"admin-topbar\">
                    <div>
                        <div class=\"role-pill role-pill-admin\">
                            <i class=\"bi bi-shield-check\"></i>
                            Admin Space
                        </div>
                        <nav aria-label=\"breadcrumb\" class=\"mt-3\">
                            <ol class=\"breadcrumb\">
                                <li class=\"breadcrumb-item\"><a href=\"{{ path('app_admin_dashboard') }}\">Dashboard</a></li>
                                {{ renderedBreadcrumb|raw }}
                            </ol>
                        </nav>
                    </div>

                    <div class=\"admin-account\">
                        {% if app.user.photoPath %}
                        <img src=\"{{ app.user.photoPath }}\" alt=\"{{ app.user.nomComplet }}\" class=\"user-avatar-image\">
                        {% else %}
                        <div class=\"user-avatar\">{{ app.user.prenom|first }}{{ app.user.nom|first }}</div>
                        {% endif %}
                        <div class=\"account-meta\">
                            <strong>{{ app.user.nomComplet }}</strong>
                            <span>{{ app.user.roleDisplayName }}</span>
                        </div>
                        <a href=\"{{ path('app_account_profile') }}\" class=\"btn btn-outline-secondary btn-sm\">Profile</a>
                        <a href=\"{{ path('app_logout') }}\" class=\"btn btn-outline-danger btn-sm\">Logout</a>
                    </div>
                </header>

                <main class=\"page-content\">
                    <div class=\"flash-stack\">
                        {% for message in app.flashes('success') %}
                        <div class=\"flash-message flash-success\">{{ message }}</div>
                        {% endfor %}

                        {% for message in app.flashes('error') %}
                        <div class=\"flash-message flash-error\">{{ message }}</div>
                        {% endfor %}
                    </div>

                    {{ renderedBody|raw }}
                </main>
            </div>
        </div>
        {% else %}
        <div class=\"front-shell\">
            <header class=\"front-header\">
                <div class=\"front-header-inner\">
                    <a href=\"{{ path('app_front_dashboard') }}\" class=\"front-brand\">Marketplace</a>

                    <nav class=\"front-nav\">
                        <a href=\"{{ path('app_front_dashboard') }}\" class=\"front-nav-link {% if currentRoute == 'app_front_dashboard' %}active{% endif %}\">
                            <i class=\"bi bi-house-door\"></i>
                            Home
                        </a>
                        <a href=\"{{ path('app_produit_index') }}\" class=\"front-nav-link {% if 'produit' in currentRoute %}active{% endif %}\">
                            <i class=\"bi bi-grid\"></i>
                            Products
                        </a>
                        {% if roleCode in ['client', 'fournisseur'] %}
                        <a href=\"{{ path('app_commande_index') }}\" class=\"front-nav-link {% if 'commande' in currentRoute %}active{% endif %}\">
                            <i class=\"bi bi-bag-check\"></i>
                            Orders
                        </a>
                        {% endif %}
                        {% if roleCode in ['client', 'fournisseur'] %}
                        <a href=\"{{ path('app_livraison_index') }}\" class=\"front-nav-link {% if 'livraison' in currentRoute %}active{% endif %}\">
                            <i class=\"bi bi-truck\"></i>
                            Deliveries
                        </a>
                        {% endif %}
                        {% if roleCode == 'fournisseur' %}
                        <a href=\"{{ path('app_categorie_index') }}\" class=\"front-nav-link {% if 'categorie' in currentRoute %}active{% endif %}\">
                            <i class=\"bi bi-tags\"></i>
                            Categories
                        </a>
                        {% endif %}
                        <a href=\"{{ path('app_feedback_index') }}\" class=\"front-nav-link {% if 'feedback' in currentRoute or 'reponse' in currentRoute %}active{% endif %}\">
                            <i class=\"bi bi-chat-left-quote\"></i>
                            Feedback
                        </a>
                    </nav>

                    <div class=\"front-account\">
                        {% if app.user.photoPath %}
                        <img src=\"{{ app.user.photoPath }}\" alt=\"{{ app.user.nomComplet }}\" class=\"user-avatar-image\">
                        {% else %}
                        <div class=\"user-avatar\">{{ app.user.prenom|first }}{{ app.user.nom|first }}</div>
                        {% endif %}
                        <div class=\"account-meta\">
                            <strong>{{ app.user.nomComplet }}</strong>
                            <span>{{ app.user.roleDisplayName }} Space</span>
                        </div>
                        <a href=\"{{ path('app_account_profile') }}\" class=\"btn btn-outline-secondary btn-sm\">Profile</a>
                        <a href=\"{{ path('app_logout') }}\" class=\"btn btn-outline-danger btn-sm\">Logout</a>
                    </div>
                </div>
            </header>

            <main class=\"front-main\">
                <section class=\"front-banner\">
                    <div>
                        <div class=\"role-pill role-pill-front\">
                            <i class=\"bi bi-shop-window\"></i>
                            {{ app.user.roleDisplayName }} Interface
                        </div>
                        <h2 class=\"mt-3\">
                            {% if roleCode == 'fournisseur' %}
                            Manage your catalog, receive client orders, assign deliveries, and answer customer conversations.
                            {% else %}
                            Discover products, place orders, and share real feedback.
                            {% endif %}
                        </h2>
                        <p>
                            {% if roleCode == 'fournisseur' %}
                            Your tools focus on publishing products, tracking buyer orders, and assigning delivery drivers.
                            {% else %}
                            Your tools focus on browsing, buying, and reviewing products.
                            {% endif %}
                        </p>
                    </div>

                    <nav aria-label=\"breadcrumb\">
                        <ol class=\"breadcrumb\">
                            <li class=\"breadcrumb-item\"><a href=\"{{ path(dashboardRoute) }}\">Home</a></li>
                            {{ renderedBreadcrumb|raw }}
                        </ol>
                    </nav>
                </section>

                <div class=\"flash-stack\">
                    {% for message in app.flashes('success') %}
                    <div class=\"flash-message flash-success\">{{ message }}</div>
                    {% endfor %}

                {% for message in app.flashes('error') %}
                    <div class=\"flash-message flash-error\">{{ message }}</div>
                    {% endfor %}
                </div>

                {{ renderedBody|raw }}
            </main>
        </div>
        {% endif %}
    {% else %}
        {{ renderedAuthContent|raw }}
    {% endif %}

    {% block javascripts %}{% endblock %}
</body>
</html>
", "base.html.twig", "C:\\Users\\Skaina\\Desktop\\final version symfony\\Marketplace-Project\\web\\templates\\base.html.twig");
    }
}
