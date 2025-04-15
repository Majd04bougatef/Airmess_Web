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

/* social_media/_index_content.html.twig */
class __TwigTemplate_b3d19a8743366ac4066f9c640440cea5 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "social_media/_index_content.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "social_media/_index_content.html.twig"));

        // line 1
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 1, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["social_media"]) {
            // line 2
            yield "    <div class=\"post-item mb-4\">
        <div class=\"card\">
            ";
            // line 4
            if (CoreExtension::getAttribute($this->env, $this->source, $context["social_media"], "imagemedia", [], "any", false, false, false, 4)) {
                // line 5
                yield "                <img src=\"http://localhost/ImageSocialMedia/";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["social_media"], "imagemedia", [], "any", false, false, false, 5), "html", null, true);
                yield "\" class=\"card-img-top\" alt=\"Post image\"
                     onerror=\"this.onerror=null; this.src='";
                // line 6
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/image-placeholder.jpg"), "html", null, true);
                yield "'; this.alt='Image non disponible';\">
            ";
            }
            // line 8
            yield "            <div class=\"card-body\">
                <h5 class=\"card-title\">";
            // line 9
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["social_media"], "titre", [], "any", false, false, false, 9), "html", null, true);
            yield "</h5>
                <p class=\"card-text\">";
            // line 10
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["social_media"], "contenu", [], "any", false, false, false, 10), "html", null, true);
            yield "</p>
                <p class=\"text-muted small\">
                    Posté par ";
            // line 12
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["social_media"], "user", [], "any", false, false, false, 12), "name", [], "any", false, false, false, 12), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["social_media"], "user", [], "any", false, false, false, 12), "prenom", [], "any", false, false, false, 12), "html", null, true);
            yield " le ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["social_media"], "publicationDate", [], "any", false, false, false, 12), "d/m/Y H:i"), "html", null, true);
            yield "
                    à ";
            // line 13
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["social_media"], "lieu", [], "any", false, false, false, 13), "html", null, true);
            yield "
                </p>
                <div class=\"d-flex justify-content-between\">
                    <span class=\"badge bg-success\">";
            // line 16
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["social_media"], "likee", [], "any", false, false, false, 16), "html", null, true);
            yield " Likes</span>
                    <span class=\"badge bg-danger\">";
            // line 17
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["social_media"], "dislike", [], "any", false, false, false, 17), "html", null, true);
            yield " Dislikes</span>
                </div>
            </div>
        </div>
    </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['social_media'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        yield "
";
        // line 24
        yield $this->env->getRuntime('Knp\Bundle\PaginatorBundle\Twig\Extension\PaginationRuntime')->render($this->env, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 24, $this->source); })()));
        yield "
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
        return "social_media/_index_content.html.twig";
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
        return array (  113 => 24,  110 => 23,  98 => 17,  94 => 16,  88 => 13,  80 => 12,  75 => 10,  71 => 9,  68 => 8,  63 => 6,  58 => 5,  56 => 4,  52 => 2,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% for social_media in pagination %}
    <div class=\"post-item mb-4\">
        <div class=\"card\">
            {% if social_media.imagemedia %}
                <img src=\"http://localhost/ImageSocialMedia/{{ social_media.imagemedia }}\" class=\"card-img-top\" alt=\"Post image\"
                     onerror=\"this.onerror=null; this.src='{{ asset('img/image-placeholder.jpg') }}'; this.alt='Image non disponible';\">
            {% endif %}
            <div class=\"card-body\">
                <h5 class=\"card-title\">{{ social_media.titre }}</h5>
                <p class=\"card-text\">{{ social_media.contenu }}</p>
                <p class=\"text-muted small\">
                    Posté par {{ social_media.user.name }} {{ social_media.user.prenom }} le {{ social_media.publicationDate|date('d/m/Y H:i') }}
                    à {{ social_media.lieu }}
                </p>
                <div class=\"d-flex justify-content-between\">
                    <span class=\"badge bg-success\">{{ social_media.likee }} Likes</span>
                    <span class=\"badge bg-danger\">{{ social_media.dislike }} Dislikes</span>
                </div>
            </div>
        </div>
    </div>
{% endfor %}

{{ knp_pagination_render(pagination) }}
", "social_media/_index_content.html.twig", "C:\\Users\\meria\\OneDrive - ESPRIT\\Bureau\\Airmess_Web\\templates\\social_media\\_index_content.html.twig");
    }
}
