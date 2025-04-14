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

/* commentaire/_commentaire.html.twig */
class __TwigTemplate_4b48be124c5fe93bea37e54f1721ac53 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "commentaire/_commentaire.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "commentaire/_commentaire.html.twig"));

        // line 1
        yield "<div class=\"comment-item mb-3\">
    <div class=\"card\">
        <div class=\"card-body\">
            <div class=\"d-flex justify-content-between align-items-center mb-2\">
                <div class=\"d-flex align-items-center\">
                    ";
        // line 6
        if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 6, $this->source); })()), "user", [], "any", false, false, false, 6), "imagesU", [], "any", false, false, false, 6)) {
            // line 7
            yield "                        <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/" . CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 7, $this->source); })()), "user", [], "any", false, false, false, 7), "imagesU", [], "any", false, false, false, 7))), "html", null, true);
            yield "\" 
                             class=\"rounded-circle me-2\" width=\"40\" height=\"40\" alt=\"User image\">
                    ";
        }
        // line 10
        yield "                    <strong>";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 10, $this->source); })()), "user", [], "any", false, false, false, 10), "name", [], "any", false, false, false, 10), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 10, $this->source); })()), "user", [], "any", false, false, false, 10), "prenom", [], "any", false, false, false, 10), "html", null, true);
        yield "</strong>
                </div>
                ";
        // line 12
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 12, $this->source); })()), "user", [], "any", false, false, false, 12) && (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 12, $this->source); })()), "user", [], "any", false, false, false, 12), "id", [], "any", false, false, false, 12) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 12, $this->source); })()), "user", [], "any", false, false, false, 12), "id", [], "any", false, false, false, 12)))) {
            // line 13
            yield "                <div class=\"comment-actions\">
                    <a href=\"";
            // line 14
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_commentaire_edit", ["idC" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 14, $this->source); })()), "idC", [], "any", false, false, false, 14)]), "html", null, true);
            yield "\" 
                       class=\"btn btn-sm btn-outline-primary me-1\">
                        <i class=\"fas fa-edit\"></i>
                    </a>
                    <form method=\"post\" action=\"";
            // line 18
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_commentaire_delete", ["idC" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 18, $this->source); })()), "idC", [], "any", false, false, false, 18)]), "html", null, true);
            yield "\" 
                          class=\"d-inline\" onsubmit=\"return confirm('Are you sure you want to delete this comment?');\">
                        <input type=\"hidden\" name=\"_token\" value=\"";
            // line 20
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 20, $this->source); })()), "idC", [], "any", false, false, false, 20))), "html", null, true);
            yield "\">
                        <button class=\"btn btn-sm btn-outline-danger\">
                            <i class=\"fas fa-trash\"></i>
                        </button>
                    </form>
                </div>
                ";
        }
        // line 27
        yield "            </div>
            <p>";
        // line 28
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 28, $this->source); })()), "description", [], "any", false, false, false, 28), "html", null, true);
        yield "</p>
            <small class=\"text-muted\">
                ";
        // line 30
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["commentaire"]) || array_key_exists("commentaire", $context) ? $context["commentaire"] : (function () { throw new RuntimeError('Variable "commentaire" does not exist.', 30, $this->source); })()), "dateCommentaire", [], "any", false, false, false, 30), "d/m/Y H:i"), "html", null, true);
        yield "
            </small>
        </div>
    </div>
</div>
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
        return "commentaire/_commentaire.html.twig";
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
        return array (  107 => 30,  102 => 28,  99 => 27,  89 => 20,  84 => 18,  77 => 14,  74 => 13,  72 => 12,  64 => 10,  57 => 7,  55 => 6,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<div class=\"comment-item mb-3\">
    <div class=\"card\">
        <div class=\"card-body\">
            <div class=\"d-flex justify-content-between align-items-center mb-2\">
                <div class=\"d-flex align-items-center\">
                    {% if commentaire.user.imagesU %}
                        <img src=\"{{ asset('uploads/' ~ commentaire.user.imagesU) }}\" 
                             class=\"rounded-circle me-2\" width=\"40\" height=\"40\" alt=\"User image\">
                    {% endif %}
                    <strong>{{ commentaire.user.name }} {{ commentaire.user.prenom }}</strong>
                </div>
                {% if app.user and app.user.id == commentaire.user.id %}
                <div class=\"comment-actions\">
                    <a href=\"{{ path('app_commentaire_edit', {'idC': commentaire.idC}) }}\" 
                       class=\"btn btn-sm btn-outline-primary me-1\">
                        <i class=\"fas fa-edit\"></i>
                    </a>
                    <form method=\"post\" action=\"{{ path('app_commentaire_delete', {'idC': commentaire.idC}) }}\" 
                          class=\"d-inline\" onsubmit=\"return confirm('Are you sure you want to delete this comment?');\">
                        <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ commentaire.idC) }}\">
                        <button class=\"btn btn-sm btn-outline-danger\">
                            <i class=\"fas fa-trash\"></i>
                        </button>
                    </form>
                </div>
                {% endif %}
            </div>
            <p>{{ commentaire.description }}</p>
            <small class=\"text-muted\">
                {{ commentaire.dateCommentaire|date('d/m/Y H:i') }}
            </small>
        </div>
    </div>
</div>
", "commentaire/_commentaire.html.twig", "C:\\Users\\MSI\\Desktop\\Airmess_Web\\templates\\commentaire\\_commentaire.html.twig");
    }
}
