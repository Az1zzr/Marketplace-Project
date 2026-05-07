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

/* feedback/_spellcheck_script.html.twig */
class __TwigTemplate_70ea3cff998b4a7d6b7ac0773dc0fd58 extends Template
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
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "feedback/_spellcheck_script.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "feedback/_spellcheck_script.html.twig"));

        // line 1
        yield "<script>
document.addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('[data-spellcheck-target]');

    const escapeHtml = (value) => value
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/\"/g, '&quot;')
        .replace(/'/g, '&#039;');

    const buildHighlightedHtml = (text, errors) => {
        if (!errors.length) {
            return `<div class=\"small text-success\"><i class=\"bi bi-check-circle me-1\"></i>Aucune faute detectee.</div>`;
        }

        const sorted = [...errors].sort((a, b) => (a.offset ?? 0) - (b.offset ?? 0));
        let cursor = 0;
        let highlighted = '';

        for (const error of sorted) {
            const start = Math.max(0, Number(error.offset ?? 0));
            const length = Math.max(0, Number(error.length ?? 0));
            const title = escapeHtml(error.message ?? 'Possible error');

            highlighted += escapeHtml(text.slice(cursor, start));
            highlighted += `<mark class=\"spell-error\" title=\"\${title}\">\${escapeHtml(text.slice(start, start + length))}</mark>`;
            cursor = start + length;
        }

        highlighted += escapeHtml(text.slice(cursor));

        return `<div class=\"spellcheck-highlighted-text\">\${highlighted.replace(/\\n/g, '<br>')}</div>`;
    };

    const buildSuggestionList = (errors) => {
        if (!errors.length) {
            return '';
        }

        const items = errors.map((error) => {
            const suggestions = Array.isArray(error.suggestions) && error.suggestions.length
                ? ` Suggestions: \${error.suggestions.slice(0, 5).map(escapeHtml).join(', ')}`
                : '';

            return `<li><strong>\${escapeHtml(error.message ?? 'Possible error')}</strong>\${suggestions}</li>`;
        }).join('');

        return `<ul class=\"mb-0 mt-2 small\">\${items}</ul>`;
    };

    buttons.forEach((button) => {
        const textarea = document.querySelector(button.dataset.spellcheckTarget);
        const resultBox = document.querySelector(button.dataset.spellcheckResult);

        if (!textarea || !resultBox) {
            return;
        }

        button.addEventListener('click', async () => {
            const text = textarea.value.trim();

            if (!text) {
                resultBox.className = 'alert alert-warning mt-3 mb-0';
                resultBox.innerHTML = '<i class=\"bi bi-exclamation-circle me-1\"></i>Ajoutez du texte avant de verifier l\\'orthographe.';
                resultBox.hidden = false;
                return;
            }

            const originalHtml = button.innerHTML;
            button.disabled = true;
            button.innerHTML = '<span class=\"spinner-border spinner-border-sm me-2\" aria-hidden=\"true\"></span>Verification...';

            try {
                const formData = new FormData();
                formData.append('text', text);

                const response = await fetch('";
        // line 78
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("api_spellcheck");
        yield "', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });

                if (!response.ok) {
                    throw new Error(`HTTP \${response.status}`);
                }

                const data = await response.json();
                if (!data.success) {
                    throw new Error(data.error || 'Spellcheck failed');
                }

                const errors = Array.isArray(data.errors) ? data.errors : [];
                resultBox.className = errors.length ? 'alert alert-warning mt-3 mb-0' : 'alert alert-success mt-3 mb-0';
                resultBox.innerHTML = `
                    <div class=\"d-flex justify-content-between align-items-start gap-3 flex-wrap\">
                        <div>
                            <strong>\${errors.length ? `\${errors.length} probleme(s) detecte(s)` : 'Orthographe correcte'}</strong>
                            \${buildSuggestionList(errors)}
                        </div>
                    </div>
                    <div class=\"mt-3\">\${buildHighlightedHtml(text, errors)}</div>
                `;
                resultBox.hidden = false;
            } catch (error) {
                resultBox.className = 'alert alert-danger mt-3 mb-0';
                resultBox.innerHTML = `<i class=\"bi bi-x-octagon me-1\"></i>Impossible de verifier l'orthographe pour le moment.\${error?.message ? ` (\${escapeHtml(error.message)})` : ''}`;
                resultBox.hidden = false;
            } finally {
                button.disabled = false;
                button.innerHTML = originalHtml;
            }
        });
    });
});
</script>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "feedback/_spellcheck_script.html.twig";
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
        return array (  127 => 78,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<script>
document.addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('[data-spellcheck-target]');

    const escapeHtml = (value) => value
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/\"/g, '&quot;')
        .replace(/'/g, '&#039;');

    const buildHighlightedHtml = (text, errors) => {
        if (!errors.length) {
            return `<div class=\"small text-success\"><i class=\"bi bi-check-circle me-1\"></i>Aucune faute detectee.</div>`;
        }

        const sorted = [...errors].sort((a, b) => (a.offset ?? 0) - (b.offset ?? 0));
        let cursor = 0;
        let highlighted = '';

        for (const error of sorted) {
            const start = Math.max(0, Number(error.offset ?? 0));
            const length = Math.max(0, Number(error.length ?? 0));
            const title = escapeHtml(error.message ?? 'Possible error');

            highlighted += escapeHtml(text.slice(cursor, start));
            highlighted += `<mark class=\"spell-error\" title=\"\${title}\">\${escapeHtml(text.slice(start, start + length))}</mark>`;
            cursor = start + length;
        }

        highlighted += escapeHtml(text.slice(cursor));

        return `<div class=\"spellcheck-highlighted-text\">\${highlighted.replace(/\\n/g, '<br>')}</div>`;
    };

    const buildSuggestionList = (errors) => {
        if (!errors.length) {
            return '';
        }

        const items = errors.map((error) => {
            const suggestions = Array.isArray(error.suggestions) && error.suggestions.length
                ? ` Suggestions: \${error.suggestions.slice(0, 5).map(escapeHtml).join(', ')}`
                : '';

            return `<li><strong>\${escapeHtml(error.message ?? 'Possible error')}</strong>\${suggestions}</li>`;
        }).join('');

        return `<ul class=\"mb-0 mt-2 small\">\${items}</ul>`;
    };

    buttons.forEach((button) => {
        const textarea = document.querySelector(button.dataset.spellcheckTarget);
        const resultBox = document.querySelector(button.dataset.spellcheckResult);

        if (!textarea || !resultBox) {
            return;
        }

        button.addEventListener('click', async () => {
            const text = textarea.value.trim();

            if (!text) {
                resultBox.className = 'alert alert-warning mt-3 mb-0';
                resultBox.innerHTML = '<i class=\"bi bi-exclamation-circle me-1\"></i>Ajoutez du texte avant de verifier l\\'orthographe.';
                resultBox.hidden = false;
                return;
            }

            const originalHtml = button.innerHTML;
            button.disabled = true;
            button.innerHTML = '<span class=\"spinner-border spinner-border-sm me-2\" aria-hidden=\"true\"></span>Verification...';

            try {
                const formData = new FormData();
                formData.append('text', text);

                const response = await fetch('{{ path('api_spellcheck') }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });

                if (!response.ok) {
                    throw new Error(`HTTP \${response.status}`);
                }

                const data = await response.json();
                if (!data.success) {
                    throw new Error(data.error || 'Spellcheck failed');
                }

                const errors = Array.isArray(data.errors) ? data.errors : [];
                resultBox.className = errors.length ? 'alert alert-warning mt-3 mb-0' : 'alert alert-success mt-3 mb-0';
                resultBox.innerHTML = `
                    <div class=\"d-flex justify-content-between align-items-start gap-3 flex-wrap\">
                        <div>
                            <strong>\${errors.length ? `\${errors.length} probleme(s) detecte(s)` : 'Orthographe correcte'}</strong>
                            \${buildSuggestionList(errors)}
                        </div>
                    </div>
                    <div class=\"mt-3\">\${buildHighlightedHtml(text, errors)}</div>
                `;
                resultBox.hidden = false;
            } catch (error) {
                resultBox.className = 'alert alert-danger mt-3 mb-0';
                resultBox.innerHTML = `<i class=\"bi bi-x-octagon me-1\"></i>Impossible de verifier l'orthographe pour le moment.\${error?.message ? ` (\${escapeHtml(error.message)})` : ''}`;
                resultBox.hidden = false;
            } finally {
                button.disabled = false;
                button.innerHTML = originalHtml;
            }
        });
    });
});
</script>
", "feedback/_spellcheck_script.html.twig", "C:\\Users\\Skaina\\Desktop\\final version symfony\\Marketplace-Project\\web\\templates\\feedback\\_spellcheck_script.html.twig");
    }
}
