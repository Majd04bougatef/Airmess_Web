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
            'javascripts' => [$this, 'block_javascripts'],
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
        yield " ";
        // line 8
        yield "    ";
        // line 9
        yield "    
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 12
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

        // line 13
        yield "<div class=\"container feed-container mt-4 mb-4\">

    <h1 class=\"text-center mb-4\">📢 Social Feed</h1>
    
    ";
        // line 18
        yield "    <div class=\"row justify-content-center mb-4\">
        <div class=\"col-md-8\">
            <form method=\"get\" class=\"search-form\">
                <div class=\"input-group\">
                    <input type=\"text\" 
                           name=\"lieu\" 
                           class=\"form-control\" 
                           placeholder=\"Rechercher par lieu...\" 
                           value=\"";
        // line 26
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 26, $this->source); })()), "request", [], "any", false, false, false, 26), "query", [], "any", false, false, false, 26), "get", ["lieu"], "method", false, false, false, 26), "html", null, true);
        yield "\"
                           aria-label=\"Rechercher par lieu\">
                    <button class=\"btn btn-primary\" type=\"submit\">
                        <i class=\"fas fa-search\"></i> Rechercher
                    </button>
                    ";
        // line 31
        if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 31, $this->source); })()), "request", [], "any", false, false, false, 31), "query", [], "any", false, false, false, 31), "get", ["lieu"], "method", false, false, false, 31)) {
            // line 32
            yield "                        <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_social_media_index");
            yield "\" class=\"btn btn-outline-secondary\">
                            <i class=\"fas fa-times\"></i> Annuler
                        </a>
                    ";
        }
        // line 36
        yield "                </div>
            </form>
        </div>
    </div>

    <!-- Scrollable Pane for Posts - THIS is the container with the ID -->
    ";
        // line 42
        if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 42, $this->source); })()), "request", [], "any", false, false, false, 42), "query", [], "any", false, false, false, 42), "get", ["lieu"], "method", false, false, false, 42)) {
            // line 43
            yield "        <div class=\"alert alert-info text-center mb-3\">
            Résultats pour le lieu : <strong>";
            // line 44
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 44, $this->source); })()), "request", [], "any", false, false, false, 44), "query", [], "any", false, false, false, 44), "get", ["lieu"], "method", false, false, false, 44), "html", null, true);
            yield "</strong>
        </div>
    ";
        }
        // line 47
        yield "    <div class=\"posts-scroll-pane\" id=\"posts-list\">

        ";
        // line 50
        yield "        ";
        // line 51
        yield "        ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 51, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 52
            yield "            <div class=\"card post-card\">
                ";
            // line 54
            yield "                ";
            if (CoreExtension::getAttribute($this->env, $this->source, $context["post"], "imagemedia", [], "any", false, false, false, 54)) {
                // line 55
                yield "                    ";
                $context["imagePath"] = ("uploads/" . CoreExtension::getAttribute($this->env, $this->source, $context["post"], "imagemedia", [], "any", false, false, false, 55));
                // line 56
                yield "                    <img src=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((isset($context["imagePath"]) || array_key_exists("imagePath", $context) ? $context["imagePath"] : (function () { throw new RuntimeError('Variable "imagePath" does not exist.', 56, $this->source); })())), "html", null, true);
                yield "\" class=\"card-img-top post-thumbnail\" style=\"max-height: 300px; width: auto; margin: 20px auto; display: block; border-radius: 2px; border: 1px solid #e9ecef; max-width: 50%;\" alt=\"Miniature : ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["post"], "titre", [], "any", true, true, false, 56)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "titre", [], "any", false, false, false, 56), "")) : ("")), "html", null, true);
                yield "\">
                ";
            }
            // line 58
            yield "
                <div class=\"card-body\">
                    ";
            // line 61
            yield "                    <div class=\"post-author\">
                         <i class=\"fas fa-user-circle\"></i>
                         <span>
                             ";
            // line 64
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["post"], "user", [], "any", true, true, false, 64) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["post"], "user", [], "any", false, false, false, 64)))) {
                // line 65
                yield "                                 ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::default(Twig\Extension\CoreExtension::trim(((((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["post"], "user", [], "any", false, true, false, 65), "prenom", [], "any", true, true, false, 65)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["post"], "user", [], "any", false, false, false, 65), "prenom", [], "any", false, false, false, 65), "")) : ("")) . " ") . ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["post"], "user", [], "any", false, true, false, 65), "name", [], "any", true, true, false, 65)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["post"], "user", [], "any", false, false, false, 65), "name", [], "any", false, false, false, 65), "")) : ("")))), "Utilisateur inconnu"), "html", null, true);
                yield "
                             ";
            } else {
                // line 67
                yield "                                 Utilisateur inconnu
                             ";
            }
            // line 69
            yield "                         </span>
                    </div>

                    ";
            // line 73
            yield "                    <h5 class=\"card-title\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["post"], "titre", [], "any", true, true, false, 73)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "titre", [], "any", false, false, false, 73), "Sans titre")) : ("Sans titre")), "html", null, true);
            yield "</h5>

                    ";
            // line 76
            yield "                    <p class=\"card-text\">";
            yield Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["post"], "contenu", [], "any", true, true, false, 76)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "contenu", [], "any", false, false, false, 76), "")) : ("")), "html", null, true));
            yield "</p>

                    ";
            // line 79
            yield "                    <div class=\"post-meta\">
                        ";
            // line 80
            if (CoreExtension::getAttribute($this->env, $this->source, $context["post"], "lieu", [], "any", false, false, false, 80)) {
                // line 81
                yield "                            <div><strong><i class=\"fas fa-map-marker-alt\"></i> Lieu:</strong> ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "lieu", [], "any", false, false, false, 81), "html", null, true);
                yield "</div>
                        ";
            }
            // line 83
            yield "                        <div><strong><i class=\"fas fa-calendar-alt\"></i> Publié le:</strong> ";
            yield ((CoreExtension::getAttribute($this->env, $this->source, $context["post"], "publicationDate", [], "any", false, false, false, 83)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "publicationDate", [], "any", false, false, false, 83), "d M Y, H:i"), "html", null, true)) : ("Date inconnue"));
            yield "</div>
                    </div>

                    ";
            // line 87
            yield "                    <div class=\"post-actions\">
                        <a href=\"";
            // line 88
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_social_media_show", ["idEB" => CoreExtension::getAttribute($this->env, $this->source, $context["post"], "idEB", [], "any", false, false, false, 88)]), "html", null, true);
            yield "\" class=\"btn btn-outline-primary btn-sm\">
                            <i class=\"fas fa-eye\"></i> Voir
                        </a>
                        <button class=\"btn btn-outline-success btn-sm like-button\" data-post-id=\"";
            // line 91
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "idEB", [], "any", false, false, false, 91), "html", null, true);
            yield "\">
                             <i class=\"fas fa-thumbs-up\"></i> J'aime
                        </button>
                        <button class=\"btn btn-outline-info btn-sm comment-button\" data-post-id=\"";
            // line 94
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["post"], "idEB", [], "any", false, false, false, 94), "html", null, true);
            yield "\">
                             <i class=\"fas fa-comment\"></i> Commenter
                        </button>

                        ";
            // line 99
            yield "                        ";
            if (($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("POST_DELETE", $context["post"]) || (CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 99, $this->source); })()), "user", [], "any", false, false, false, 99) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 99, $this->source); })()), "user", [], "any", false, false, false, 99) == CoreExtension::getAttribute($this->env, $this->source, $context["post"], "user", [], "any", false, false, false, 99))))) {
                // line 100
                yield "                            <form method=\"post\" action=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_social_media_delete", ["idEB" => CoreExtension::getAttribute($this->env, $this->source, $context["post"], "idEB", [], "any", false, false, false, 100)]), "html", null, true);
                yield "\" onsubmit=\"return confirm('Voulez-vous vraiment supprimer cette publication ?');\" class=\"ms-auto d-inline\">
                                <input type=\"hidden\" name=\"_token\" value=\"";
                // line 101
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["post"], "idEB", [], "any", false, false, false, 101))), "html", null, true);
                yield "\">
                                <button type=\"submit\" class=\"btn btn-outline-danger btn-sm\">
                                     <i class=\"fas fa-trash-alt\"></i> Supprimer
                                </button>
                            </form>
                        ";
            }
            // line 107
            yield "                    </div> ";
            // line 108
            yield "                </div> ";
            // line 109
            yield "            </div> ";
            // line 110
            yield "        ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 111
            yield "            ";
            // line 112
            yield "            <p class=\"no-posts-message\">Aucune publication trouvée pour le moment.</p>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['post'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 114
        yield "        ";
        // line 115
        yield "
    </div> ";
        // line 117
        yield "
    <!-- Pagination - Only shown if needed - ADDED ID -->
    ";
        // line 119
        if (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 119, $this->source); })()), "getTotalItemCount", [], "any", false, false, false, 119) > 0) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 119, $this->source); })()), "pageCount", [], "any", false, false, false, 119) > 1))) {
            // line 120
            yield "    <div class=\"pagination-controls\" id=\"pagination-controls\">
        ";
            // line 121
            yield $this->env->getRuntime('Knp\Bundle\PaginatorBundle\Twig\Extension\PaginationRuntime')->render($this->env, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 121, $this->source); })()));
            yield "
    </div>
    ";
        }
        // line 124
        yield "
    <!-- Bouton Ajouter une publication -->
    <div class=\"add-post-section\">
        <a href=\"";
        // line 127
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_social_media_new");
        yield "\" class=\"btn btn-success btn-lg\">
             <i class=\"fas fa-plus-circle\"></i> Ajouter une publication
        </a>
    </div>

</div> ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 135
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

        // line 136
        yield "    ";
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield " ";
        // line 137
        yield "    ";
        // line 138
        yield "    <script>
        function handlePaginationClick(event) {
            event.preventDefault(); // Prevent default link navigation
            const url = event.currentTarget.getAttribute('href');
            const postsContainer = document.getElementById('posts-list'); // Target the container
            const paginationContainer = document.getElementById('pagination-controls');

            if (!postsContainer || !paginationContainer) {
                console.error('Error: Could not find posts or pagination container elements.');
                return;
            }

            // Optional: Show loading state
            postsContainer.style.opacity = '0.5';

            fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' }}) // Identify as AJAX
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: \${response.status}`);
                    }
                    return response.text(); // Fetch the FULL HTML of the next page
                })
                .then(html => {
                    // Use DOMParser to safely parse the fetched FULL HTML
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');

                    // Find the NEW content container within the parsed HTML document
                    const newPostsContentElement = doc.getElementById('posts-list');
                    const newPaginationContentElement = doc.getElementById('pagination-controls');

                    // Update the current page's container's INNER HTML
                    if (newPostsContentElement) {
                        postsContainer.innerHTML = newPostsContentElement.innerHTML; // Replace content
                        postsContainer.scrollTop = 0; // Scroll to top
                    } else {
                        console.error('Could not find #posts-list content in fetched data.');
                         postsContainer.innerHTML = '<p class=\"no-posts-message text-danger\">Error loading posts content.</p>';
                    }

                    if (newPaginationContentElement) {
                        paginationContainer.innerHTML = newPaginationContentElement.innerHTML; // Replace pagination
                    } else {
                        paginationContainer.innerHTML = ''; // Clear pagination if not found
                         console.warn('Could not find #pagination-controls content in fetched data.');
                    }

                    // Re-attach event listeners to the *new* pagination links
                    attachPaginationListeners();

                })
                .catch(error => {
                    console.error('Error fetching posts:', error);
                    postsContainer.innerHTML = `<p class=\"no-posts-message text-danger\">Failed to load content: \${error.message}</p>`;
                })
                .finally(() => {
                    // Optional: Remove loading state
                    postsContainer.style.opacity = '1';
                });
        }

        function attachPaginationListeners() {
            const paginationLinks = document.querySelectorAll('#pagination-controls a');
            paginationLinks.forEach(link => {
                link.removeEventListener('click', handlePaginationClick);
                link.addEventListener('click', handlePaginationClick);
            });
        }

        // Initial attachment of listeners when the page fully loads
        document.addEventListener('DOMContentLoaded', function() {
            attachPaginationListeners();
        });
    </script>
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
        return array (  391 => 138,  389 => 137,  385 => 136,  372 => 135,  355 => 127,  350 => 124,  344 => 121,  341 => 120,  339 => 119,  335 => 117,  332 => 115,  330 => 114,  323 => 112,  321 => 111,  316 => 110,  314 => 109,  312 => 108,  310 => 107,  301 => 101,  296 => 100,  293 => 99,  286 => 94,  280 => 91,  274 => 88,  271 => 87,  264 => 83,  258 => 81,  256 => 80,  253 => 79,  247 => 76,  241 => 73,  236 => 69,  232 => 67,  226 => 65,  224 => 64,  219 => 61,  215 => 58,  207 => 56,  204 => 55,  201 => 54,  198 => 52,  192 => 51,  190 => 50,  186 => 47,  180 => 44,  177 => 43,  175 => 42,  167 => 36,  159 => 32,  157 => 31,  149 => 26,  139 => 18,  133 => 13,  120 => 12,  108 => 9,  106 => 8,  102 => 7,  89 => 6,  66 => 4,  43 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# templates/social_media/index.html.twig #}
{% extends 'base.html.twig' %}

{% block title %}Social Media Feed{% endblock %}

{% block stylesheets %}
    {{ parent() }} {# Include any base styles #}
    {# === Styles remain here === #}
    
{% endblock %}

{% block body %}
<div class=\"container feed-container mt-4 mb-4\">

    <h1 class=\"text-center mb-4\">📢 Social Feed</h1>
    
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

    <!-- Scrollable Pane for Posts - THIS is the container with the ID -->
    {% if app.request.query.get('lieu') %}
        <div class=\"alert alert-info text-center mb-3\">
            Résultats pour le lieu : <strong>{{ app.request.query.get('lieu') }}</strong>
        </div>
    {% endif %}
    <div class=\"posts-scroll-pane\" id=\"posts-list\">

        {# === THE INCLUDE TAG HAS BEEN REMOVED === #}
        {# === THE FOR LOOP IS NOW DIRECTLY HERE === #}
        {% for post in pagination %}
            <div class=\"card post-card\">
                {# Image miniature #}
                {% if post.imagemedia %}
                    {% set imagePath = 'uploads/' ~ post.imagemedia %}
                    <img src=\"{{ asset(imagePath) }}\" class=\"card-img-top post-thumbnail\" style=\"max-height: 300px; width: auto; margin: 20px auto; display: block; border-radius: 2px; border: 1px solid #e9ecef; max-width: 50%;\" alt=\"Miniature : {{ post.titre | default('') }}\">
                {% endif %}

                <div class=\"card-body\">
                    {# Post Author Display #}
                    <div class=\"post-author\">
                         <i class=\"fas fa-user-circle\"></i>
                         <span>
                             {% if post.user is defined and post.user is not null %}
                                 {{ (post.user.prenom | default('') ~ ' ' ~ post.user.name | default('')) | trim | default('Utilisateur inconnu') }}
                             {% else %}
                                 Utilisateur inconnu
                             {% endif %}
                         </span>
                    </div>

                    {# Post Title #}
                    <h5 class=\"card-title\">{{ post.titre | default('Sans titre') }}</h5>

                    {# Post Content #}
                    <p class=\"card-text\">{{ post.contenu | default('') | nl2br }}</p>

                    {# Post Metadata #}
                    <div class=\"post-meta\">
                        {% if post.lieu %}
                            <div><strong><i class=\"fas fa-map-marker-alt\"></i> Lieu:</strong> {{ post.lieu }}</div>
                        {% endif %}
                        <div><strong><i class=\"fas fa-calendar-alt\"></i> Publié le:</strong> {{ post.publicationDate ? post.publicationDate|date('d M Y, H:i') : 'Date inconnue' }}</div>
                    </div>

                    {# Action Buttons #}
                    <div class=\"post-actions\">
                        <a href=\"{{ path('app_social_media_show', {'idEB': post.idEB}) }}\" class=\"btn btn-outline-primary btn-sm\">
                            <i class=\"fas fa-eye\"></i> Voir
                        </a>
                        <button class=\"btn btn-outline-success btn-sm like-button\" data-post-id=\"{{ post.idEB }}\">
                             <i class=\"fas fa-thumbs-up\"></i> J'aime
                        </button>
                        <button class=\"btn btn-outline-info btn-sm comment-button\" data-post-id=\"{{ post.idEB }}\">
                             <i class=\"fas fa-comment\"></i> Commenter
                        </button>

                        {# Delete Form #}
                        {% if is_granted('POST_DELETE', post) or (app.user and app.user == post.user) %}
                            <form method=\"post\" action=\"{{ path('app_social_media_delete', {'idEB': post.idEB}) }}\" onsubmit=\"return confirm('Voulez-vous vraiment supprimer cette publication ?');\" class=\"ms-auto d-inline\">
                                <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ post.idEB) }}\">
                                <button type=\"submit\" class=\"btn btn-outline-danger btn-sm\">
                                     <i class=\"fas fa-trash-alt\"></i> Supprimer
                                </button>
                            </form>
                        {% endif %}
                    </div> {# End post-actions #}
                </div> {# End card-body #}
            </div> {# End post-card #}
        {% else %}
            {# Message shown if 'pagination' is empty #}
            <p class=\"no-posts-message\">Aucune publication trouvée pour le moment.</p>
        {% endfor %}
        {# === END OF POST LOOP === #}

    </div> {# End posts-scroll-pane #}

    <!-- Pagination - Only shown if needed - ADDED ID -->
    {% if pagination.getTotalItemCount > 0 and pagination.pageCount > 1 %}
    <div class=\"pagination-controls\" id=\"pagination-controls\">
        {{ knp_pagination_render(pagination) }}
    </div>
    {% endif %}

    <!-- Bouton Ajouter une publication -->
    <div class=\"add-post-section\">
        <a href=\"{{ path('app_social_media_new') }}\" class=\"btn btn-success btn-lg\">
             <i class=\"fas fa-plus-circle\"></i> Ajouter une publication
        </a>
    </div>

</div> {# End container #}
{% endblock %}

{% block javascripts %}
    {{ parent() }} {# Include JS from base.html.twig if any #}
    {# === ROBUST AJAX JAVASCRIPT (Same as before) === #}
    <script>
        function handlePaginationClick(event) {
            event.preventDefault(); // Prevent default link navigation
            const url = event.currentTarget.getAttribute('href');
            const postsContainer = document.getElementById('posts-list'); // Target the container
            const paginationContainer = document.getElementById('pagination-controls');

            if (!postsContainer || !paginationContainer) {
                console.error('Error: Could not find posts or pagination container elements.');
                return;
            }

            // Optional: Show loading state
            postsContainer.style.opacity = '0.5';

            fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' }}) // Identify as AJAX
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: \${response.status}`);
                    }
                    return response.text(); // Fetch the FULL HTML of the next page
                })
                .then(html => {
                    // Use DOMParser to safely parse the fetched FULL HTML
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');

                    // Find the NEW content container within the parsed HTML document
                    const newPostsContentElement = doc.getElementById('posts-list');
                    const newPaginationContentElement = doc.getElementById('pagination-controls');

                    // Update the current page's container's INNER HTML
                    if (newPostsContentElement) {
                        postsContainer.innerHTML = newPostsContentElement.innerHTML; // Replace content
                        postsContainer.scrollTop = 0; // Scroll to top
                    } else {
                        console.error('Could not find #posts-list content in fetched data.');
                         postsContainer.innerHTML = '<p class=\"no-posts-message text-danger\">Error loading posts content.</p>';
                    }

                    if (newPaginationContentElement) {
                        paginationContainer.innerHTML = newPaginationContentElement.innerHTML; // Replace pagination
                    } else {
                        paginationContainer.innerHTML = ''; // Clear pagination if not found
                         console.warn('Could not find #pagination-controls content in fetched data.');
                    }

                    // Re-attach event listeners to the *new* pagination links
                    attachPaginationListeners();

                })
                .catch(error => {
                    console.error('Error fetching posts:', error);
                    postsContainer.innerHTML = `<p class=\"no-posts-message text-danger\">Failed to load content: \${error.message}</p>`;
                })
                .finally(() => {
                    // Optional: Remove loading state
                    postsContainer.style.opacity = '1';
                });
        }

        function attachPaginationListeners() {
            const paginationLinks = document.querySelectorAll('#pagination-controls a');
            paginationLinks.forEach(link => {
                link.removeEventListener('click', handlePaginationClick);
                link.addEventListener('click', handlePaginationClick);
            });
        }

        // Initial attachment of listeners when the page fully loads
        document.addEventListener('DOMContentLoaded', function() {
            attachPaginationListeners();
        });
    </script>
{% endblock %}", "social_media/index.html.twig", "C:\\Users\\MSI\\Desktop\\Airmess_Web\\templates\\social_media\\index.html.twig");
    }
}
