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

/* social_media/index.html.twig */
class __TwigTemplate_c65a2664fe0f21b370d4b87a53fb769d extends Template
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
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 2
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "social_media/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "social_media/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "social_media/index.html.twig", 2);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 4
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

        yield "Social Media Feed";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 6
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

        // line 7
        yield "    ";
        yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        yield "
    <style>
        :root {
            --main-accent: #4a6bda;
            --main-accent-hover: #3d58b3;
            --danger-color: #dc3545;
            --success-color: #28a745;
            --light-bg: #f8f9fa;
        }
        
        body {
            background-color: #f5f7fa;
        }
        
        .feed-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px 15px;
        }
        
        .search-form {
            margin-bottom: 2rem;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }
        
        .publication-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 1.5rem;
            background-color: white;
        }
        
        .publication-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }
        
        .card-img-top {
            height: 250px;
            object-fit: cover;
            width: 100%;
        }
        
        .card-title {
            font-weight: 600;
            font-size: 1.2rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            margin-bottom: 0.5rem;
        }
        
        .card-text {
            max-height: 4.5rem;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            color: #555;
        }
        
        .location-badge {
            background-color: #f8f9fa;
            color: #495057;
            padding: 0.25rem 0.5rem;
            border-radius: 50px;
            font-size: 0.8rem;
            display: inline-flex;
            align-items: center;
            margin-bottom: 0.5rem;
        }
        
        .location-badge i {
            margin-right: 0.25rem;
            font-size: 0.75rem;
        }
        
        .card-footer {
            background-color: white;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            padding: 0.75rem 1.25rem;
        }
        
        .date-info {
            font-size: 0.8rem;
            color: #6c757d;
        }
        
        .author-info {
            font-size: 0.85rem;
            color: #6c757d;
            margin-bottom: 0.5rem;
        }
        
        .interaction-icons {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }
        
        .interaction-icons .badge {
            margin-right: 15px;
            display: flex;
            align-items: center;
            padding: 5px 10px;
            border-radius: 50px;
            font-size: 0.8rem;
        }
        
        .badge-like {
            background-color: rgba(40, 167, 69, 0.15);
            color: var(--success-color);
        }
        
        .badge-dislike {
            background-color: rgba(220, 53, 69, 0.15);
            color: var(--danger-color);
        }
        
        .feed-header {
            margin-bottom: 2rem;
            text-align: center;
            padding: 1.5rem;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }
        
        .add-post-btn {
            margin-top: 1rem;
            border-radius: 50px;
            padding: 0.6rem 1.5rem;
            font-weight: 500;
            box-shadow: 0 4px 10px rgba(74, 107, 218, 0.2);
        }
        
        .pagination {
            justify-content: center;
            margin-top: 2rem;
        }
        
        .page-item.active .page-link {
            background-color: var(--main-accent);
            border-color: var(--main-accent);
        }
        
        .page-link {
            color: var(--main-accent);
        }
        
        .no-results {
            text-align: center;
            padding: 3rem;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }
    </style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 173
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

        // line 174
        yield "<div class=\"container feed-container mt-4 mb-4\">

    <div class=\"feed-header\">
        <h1 class=\"display-5 fw-bold\">📢 Social Feed</h1>
        <p class=\"text-muted\">Découvrez et partagez des expériences avec la communauté</p>
        <a href=\"";
        // line 179
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_social_media_new");
        yield "\" class=\"btn btn-primary add-post-btn\">
            <i class=\"fas fa-plus-circle me-2\"></i>Nouvelle publication
        </a>
    </div>
    
    ";
        // line 185
        yield "    <div class=\"row justify-content-center mb-4\">
        <div class=\"col-md-8\">
            <form method=\"get\" class=\"search-form\">
                <div class=\"input-group\">
                    <input type=\"text\" 
                           name=\"lieu\" 
                           class=\"form-control\" 
                           placeholder=\"Rechercher par lieu...\" 
                           value=\"";
        // line 193
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 193, $this->source); })()), "request", [], "any", false, false, false, 193), "query", [], "any", false, false, false, 193), "get", ["lieu"], "method", false, false, false, 193), "html", null, true);
        yield "\"
                           aria-label=\"Rechercher par lieu\">
                    <button class=\"btn btn-primary\" type=\"submit\">
                        <i class=\"fas fa-search\"></i> Rechercher
                    </button>
                    ";
        // line 198
        if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 198, $this->source); })()), "request", [], "any", false, false, false, 198), "query", [], "any", false, false, false, 198), "get", ["lieu"], "method", false, false, false, 198)) {
            // line 199
            yield "                        <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_social_media_index");
            yield "\" class=\"btn btn-outline-secondary\">
                            <i class=\"fas fa-times\"></i> Annuler
                        </a>
                    ";
        }
        // line 203
        yield "                </div>
            </form>
        </div>
    </div>

    <!-- Filtres de recherche -->
    ";
        // line 209
        if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 209, $this->source); })()), "request", [], "any", false, false, false, 209), "query", [], "any", false, false, false, 209), "get", ["lieu"], "method", false, false, false, 209)) {
            // line 210
            yield "        <div class=\"alert alert-info text-center mb-3\">
            Résultats pour le lieu : <strong>";
            // line 211
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 211, $this->source); })()), "request", [], "any", false, false, false, 211), "query", [], "any", false, false, false, 211), "get", ["lieu"], "method", false, false, false, 211), "html", null, true);
            yield "</strong>
        </div>
    ";
        }
        // line 214
        yield "
    <!-- Grille de publications -->
    <div class=\"row g-4\">
        ";
        // line 217
        if (Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 217, $this->source); })()), "items", [], "any", false, false, false, 217))) {
            // line 218
            yield "            <div class=\"col-12\">
                <div class=\"no-results\">
                    <i class=\"fas fa-newspaper fa-3x mb-3 text-muted\"></i>
                    <h4>Aucune publication trouvée</h4>
                    <p class=\"text-muted\">Essayez de modifier votre recherche ou créez une nouvelle publication.</p>
                    <a href=\"";
            // line 223
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_social_media_new");
            yield "\" class=\"btn btn-primary mt-2\">
                        <i class=\"fas fa-plus me-1\"></i> Créer une publication
                    </a>
                </div>
            </div>
        ";
        } else {
            // line 229
            yield "            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 229, $this->source); })()));
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
            foreach ($context['_seq'] as $context["_key"] => $context["social_media"]) {
                // line 230
                yield "                <div class=\"col-lg-4 col-md-6\">
                    <div class=\"publication-card card h-100\">
                        <div class=\"card-img-container\">
                            ";
                // line 233
                if (CoreExtension::getAttribute($this->env, $this->source, $context["social_media"], "imagemedia", [], "any", false, false, false, 233)) {
                    // line 234
                    yield "                                <img src=\"http://localhost/ImageSocialMedia/";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["social_media"], "imagemedia", [], "any", false, false, false, 234), "html", null, true);
                    yield "\" 
                                     class=\"card-img-top\" 
                                     alt=\"";
                    // line 236
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["social_media"], "titre", [], "any", false, false, false, 236), "html", null, true);
                    yield "\"
                                     onerror=\"this.onerror=null; this.src='";
                    // line 237
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((("img/carousel-" . ((CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 237) % 3) + 1)) . ".jpg")), "html", null, true);
                    yield "'; this.alt='Image non disponible';\">
                            ";
                } else {
                    // line 239
                    yield "                                <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((("img/carousel-" . ((CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 239) % 3) + 1)) . ".jpg")), "html", null, true);
                    yield "\" class=\"card-img-top\" alt=\"Publication image\">
                            ";
                }
                // line 241
                yield "                        </div>
                        <div class=\"card-body\">
                            <span class=\"author-info\">
                                <i class=\"fas fa-user me-1\"></i> ";
                // line 244
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["social_media"], "user", [], "any", false, false, false, 244), "name", [], "any", false, false, false, 244), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["social_media"], "user", [], "any", false, false, false, 244), "prenom", [], "any", false, false, false, 244), "html", null, true);
                yield "
                            </span>
                            <span class=\"location-badge\">
                                <i class=\"fas fa-map-marker-alt\"></i> ";
                // line 247
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["social_media"], "lieu", [], "any", false, false, false, 247), "html", null, true);
                yield "
                            </span>
                            <h5 class=\"card-title\">";
                // line 249
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["social_media"], "titre", [], "any", false, false, false, 249), "html", null, true);
                yield "</h5>
                            <p class=\"card-text\">";
                // line 250
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["social_media"], "contenu", [], "any", false, false, false, 250), "html", null, true);
                yield "</p>
                            
                            <div class=\"interaction-icons\">
                                <span class=\"badge badge-like\">
                                    <i class=\"fas fa-thumbs-up me-1\"></i> ";
                // line 254
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["social_media"], "likee", [], "any", false, false, false, 254), "html", null, true);
                yield "
                                </span>
                                <span class=\"badge badge-dislike\">
                                    <i class=\"fas fa-thumbs-down me-1\"></i> ";
                // line 257
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["social_media"], "dislike", [], "any", false, false, false, 257), "html", null, true);
                yield "
                                </span>
                            </div>
                        </div>
                        <div class=\"card-footer d-flex justify-content-between align-items-center\">
                            <span class=\"date-info\"><i class=\"far fa-calendar-alt me-1\"></i> ";
                // line 262
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["social_media"], "publicationDate", [], "any", false, false, false, 262), "d/m/Y"), "html", null, true);
                yield "</span>
                            <a href=\"";
                // line 263
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_social_media_show", ["idEB" => CoreExtension::getAttribute($this->env, $this->source, $context["social_media"], "idEB", [], "any", false, false, false, 263)]), "html", null, true);
                yield "\" class=\"btn btn-sm btn-outline-primary\">
                                <i class=\"fas fa-eye me-1\"></i> Voir
                            </a>
                        </div>
                    </div>
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
            unset($context['_seq'], $context['_key'], $context['social_media'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 270
            yield "        ";
        }
        // line 271
        yield "    </div>

    <!-- Pagination -->
    <div class=\"mt-4\">
        ";
        // line 275
        yield $this->env->getRuntime('Knp\Bundle\PaginatorBundle\Twig\Extension\PaginationRuntime')->render($this->env, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 275, $this->source); })()));
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
        return "social_media/index.html.twig";
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
        return array (  499 => 275,  493 => 271,  490 => 270,  469 => 263,  465 => 262,  457 => 257,  451 => 254,  444 => 250,  440 => 249,  435 => 247,  427 => 244,  422 => 241,  416 => 239,  411 => 237,  407 => 236,  401 => 234,  399 => 233,  394 => 230,  376 => 229,  367 => 223,  360 => 218,  358 => 217,  353 => 214,  347 => 211,  344 => 210,  342 => 209,  334 => 203,  326 => 199,  324 => 198,  316 => 193,  306 => 185,  298 => 179,  291 => 174,  278 => 173,  101 => 7,  88 => 6,  65 => 4,  42 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# templates/social_media/index.html.twig #}
{% extends 'base.html.twig' %}

{% block title %}Social Media Feed{% endblock %}

{% block stylesheets %}
    {{ parent() }}
    <style>
        :root {
            --main-accent: #4a6bda;
            --main-accent-hover: #3d58b3;
            --danger-color: #dc3545;
            --success-color: #28a745;
            --light-bg: #f8f9fa;
        }
        
        body {
            background-color: #f5f7fa;
        }
        
        .feed-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px 15px;
        }
        
        .search-form {
            margin-bottom: 2rem;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }
        
        .publication-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 1.5rem;
            background-color: white;
        }
        
        .publication-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }
        
        .card-img-top {
            height: 250px;
            object-fit: cover;
            width: 100%;
        }
        
        .card-title {
            font-weight: 600;
            font-size: 1.2rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            margin-bottom: 0.5rem;
        }
        
        .card-text {
            max-height: 4.5rem;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            color: #555;
        }
        
        .location-badge {
            background-color: #f8f9fa;
            color: #495057;
            padding: 0.25rem 0.5rem;
            border-radius: 50px;
            font-size: 0.8rem;
            display: inline-flex;
            align-items: center;
            margin-bottom: 0.5rem;
        }
        
        .location-badge i {
            margin-right: 0.25rem;
            font-size: 0.75rem;
        }
        
        .card-footer {
            background-color: white;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            padding: 0.75rem 1.25rem;
        }
        
        .date-info {
            font-size: 0.8rem;
            color: #6c757d;
        }
        
        .author-info {
            font-size: 0.85rem;
            color: #6c757d;
            margin-bottom: 0.5rem;
        }
        
        .interaction-icons {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }
        
        .interaction-icons .badge {
            margin-right: 15px;
            display: flex;
            align-items: center;
            padding: 5px 10px;
            border-radius: 50px;
            font-size: 0.8rem;
        }
        
        .badge-like {
            background-color: rgba(40, 167, 69, 0.15);
            color: var(--success-color);
        }
        
        .badge-dislike {
            background-color: rgba(220, 53, 69, 0.15);
            color: var(--danger-color);
        }
        
        .feed-header {
            margin-bottom: 2rem;
            text-align: center;
            padding: 1.5rem;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }
        
        .add-post-btn {
            margin-top: 1rem;
            border-radius: 50px;
            padding: 0.6rem 1.5rem;
            font-weight: 500;
            box-shadow: 0 4px 10px rgba(74, 107, 218, 0.2);
        }
        
        .pagination {
            justify-content: center;
            margin-top: 2rem;
        }
        
        .page-item.active .page-link {
            background-color: var(--main-accent);
            border-color: var(--main-accent);
        }
        
        .page-link {
            color: var(--main-accent);
        }
        
        .no-results {
            text-align: center;
            padding: 3rem;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }
    </style>
{% endblock %}

{% block body %}
<div class=\"container feed-container mt-4 mb-4\">

    <div class=\"feed-header\">
        <h1 class=\"display-5 fw-bold\">📢 Social Feed</h1>
        <p class=\"text-muted\">Découvrez et partagez des expériences avec la communauté</p>
        <a href=\"{{ path('app_social_media_new') }}\" class=\"btn btn-primary add-post-btn\">
            <i class=\"fas fa-plus-circle me-2\"></i>Nouvelle publication
        </a>
    </div>
    
    {# Barre de recherche par lieu #}
    <div class=\"row justify-content-center mb-4\">
        <div class=\"col-md-8\">
            <form method=\"get\" class=\"search-form\">
                <div class=\"input-group\">
                    <input type=\"text\" 
                           name=\"lieu\" 
                           class=\"form-control\" 
                           placeholder=\"Rechercher par lieu...\" 
                           value=\"{{ app.request.query.get('lieu') }}\"
                           aria-label=\"Rechercher par lieu\">
                    <button class=\"btn btn-primary\" type=\"submit\">
                        <i class=\"fas fa-search\"></i> Rechercher
                    </button>
                    {% if app.request.query.get('lieu') %}
                        <a href=\"{{ path('app_social_media_index') }}\" class=\"btn btn-outline-secondary\">
                            <i class=\"fas fa-times\"></i> Annuler
                        </a>
                    {% endif %}
                </div>
            </form>
        </div>
    </div>

    <!-- Filtres de recherche -->
    {% if app.request.query.get('lieu') %}
        <div class=\"alert alert-info text-center mb-3\">
            Résultats pour le lieu : <strong>{{ app.request.query.get('lieu') }}</strong>
        </div>
    {% endif %}

    <!-- Grille de publications -->
    <div class=\"row g-4\">
        {% if pagination.items is empty %}
            <div class=\"col-12\">
                <div class=\"no-results\">
                    <i class=\"fas fa-newspaper fa-3x mb-3 text-muted\"></i>
                    <h4>Aucune publication trouvée</h4>
                    <p class=\"text-muted\">Essayez de modifier votre recherche ou créez une nouvelle publication.</p>
                    <a href=\"{{ path('app_social_media_new') }}\" class=\"btn btn-primary mt-2\">
                        <i class=\"fas fa-plus me-1\"></i> Créer une publication
                    </a>
                </div>
            </div>
        {% else %}
            {% for social_media in pagination %}
                <div class=\"col-lg-4 col-md-6\">
                    <div class=\"publication-card card h-100\">
                        <div class=\"card-img-container\">
                            {% if social_media.imagemedia %}
                                <img src=\"http://localhost/ImageSocialMedia/{{ social_media.imagemedia }}\" 
                                     class=\"card-img-top\" 
                                     alt=\"{{ social_media.titre }}\"
                                     onerror=\"this.onerror=null; this.src='{{ asset('img/carousel-' ~ ((loop.index % 3) + 1) ~ '.jpg') }}'; this.alt='Image non disponible';\">
                            {% else %}
                                <img src=\"{{ asset('img/carousel-' ~ ((loop.index % 3) + 1) ~ '.jpg') }}\" class=\"card-img-top\" alt=\"Publication image\">
                            {% endif %}
                        </div>
                        <div class=\"card-body\">
                            <span class=\"author-info\">
                                <i class=\"fas fa-user me-1\"></i> {{ social_media.user.name }} {{ social_media.user.prenom }}
                            </span>
                            <span class=\"location-badge\">
                                <i class=\"fas fa-map-marker-alt\"></i> {{ social_media.lieu }}
                            </span>
                            <h5 class=\"card-title\">{{ social_media.titre }}</h5>
                            <p class=\"card-text\">{{ social_media.contenu }}</p>
                            
                            <div class=\"interaction-icons\">
                                <span class=\"badge badge-like\">
                                    <i class=\"fas fa-thumbs-up me-1\"></i> {{ social_media.likee }}
                                </span>
                                <span class=\"badge badge-dislike\">
                                    <i class=\"fas fa-thumbs-down me-1\"></i> {{ social_media.dislike }}
                                </span>
                            </div>
                        </div>
                        <div class=\"card-footer d-flex justify-content-between align-items-center\">
                            <span class=\"date-info\"><i class=\"far fa-calendar-alt me-1\"></i> {{ social_media.publicationDate|date(\"d/m/Y\") }}</span>
                            <a href=\"{{ path('app_social_media_show', {'idEB': social_media.idEB}) }}\" class=\"btn btn-sm btn-outline-primary\">
                                <i class=\"fas fa-eye me-1\"></i> Voir
                            </a>
                        </div>
                    </div>
                </div>
            {% endfor %}
        {% endif %}
    </div>

    <!-- Pagination -->
    <div class=\"mt-4\">
        {{ knp_pagination_render(pagination) }}
    </div>
</div>
{% endblock %}
", "social_media/index.html.twig", "C:\\Users\\meria\\OneDrive - ESPRIT\\Bureau\\Airmess_Web\\templates\\social_media\\index.html.twig");
    }
}
