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

/* dashAdmin/socialPage.html.twig */
class __TwigTemplate_9f1264e5946fcc35f00b4a9795b5cee9 extends Template
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
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "dashAdmin/dashboard.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashAdmin/socialPage.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashAdmin/socialPage.html.twig"));

        $this->parent = $this->loadTemplate("dashAdmin/dashboard.html.twig", "dashAdmin/socialPage.html.twig", 1);
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

        yield "Gestion des Réseaux Sociaux";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 6
        yield "<nav class=\"navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl \" id=\"navbarBlur\" data-scroll=\"false\">
  <div class=\"container-fluid py-1 px-3\">
    <nav aria-label=\"breadcrumb\">
      <ol class=\"breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5\">
        <li class=\"breadcrumb-item text-sm\"><a class=\"opacity-5 text-white\" href=\"javascript:;\">Pages</a></li>
        <li class=\"breadcrumb-item text-sm text-white active\" aria-current=\"page\">Social Media</li>
      </ol>
      <h6 class=\"font-weight-bolder text-white mb-0\">Gestion des Réseaux Sociaux</h6>
    </nav>
    <div class=\"collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4\" id=\"navbar\">
      <div class=\"ms-md-auto pe-md-3 d-flex align-items-center\">
        <form method=\"get\" action=\"";
        // line 17
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_social_media_index");
        yield "\">
          <div class=\"input-group\">
            <span class=\"input-group-text text-body\"><i class=\"fas fa-search\" aria-hidden=\"true\"></i></span>
            <input type=\"text\" name=\"search\" class=\"form-control\" placeholder=\"Rechercher...\"
              value=\"";
        // line 21
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 21, $this->source); })()), "request", [], "any", false, false, false, 21), "query", [], "any", false, false, false, 21), "get", ["search"], "method", false, false, false, 21), "html", null, true);
        yield "\">
            <button type=\"submit\" class=\"btn btn-sm btn-primary mb-0\">Rechercher</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</nav>
<!-- End Navbar -->
<div class=\"container-fluid py-4\">
  ";
        // line 31
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 31, $this->source); })()), "flashes", [], "any", false, false, false, 31));
        foreach ($context['_seq'] as $context["label"] => $context["messages"]) {
            // line 32
            yield "    ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable($context["messages"]);
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 33
                yield "      <div class=\"alert alert-";
                yield ((($context["label"] == "error")) ? ("danger") : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["label"], "html", null, true)));
                yield " alert-dismissible fade show\" role=\"alert\">
        ";
                // line 34
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
                yield "
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
      </div>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 38
            yield "  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['label'], $context['messages'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        yield "
  ";
        // line 40
        if ((array_key_exists("search", $context) && (isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 40, $this->source); })()))) {
            // line 41
            yield "    <div class=\"alert alert-info alert-dismissible fade show mb-4\" role=\"alert\">
      <span class=\"alert-text\">Résultats de recherche pour \"<strong>";
            // line 42
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 42, $this->source); })()), "html", null, true);
            yield "</strong>\"</span>
      <a href=\"";
            // line 43
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_social_media_index");
            yield "\" class=\"btn btn-sm btn-outline-secondary ms-3\">
        <i class=\"fas fa-times\"></i> Effacer la recherche
      </a>
      <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
    </div>
  ";
        }
        // line 49
        yield "
  <div class=\"row\">
    <div class=\"col-12\">
      <div class=\"card mb-4\">
        <div class=\"card-header pb-0 d-flex justify-content-between align-items-center\">
          <h6>Publications sur les Réseaux Sociaux</h6>
          <a href=\"";
        // line 55
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_social_media_new");
        yield "\" class=\"btn btn-sm btn-primary\">
            <i class=\"fas fa-plus-circle me-2\"></i>Nouvelle Publication
          </a>
        </div>
        <div class=\"card-body px-0 pt-0 pb-2\">
          <div class=\"table-responsive p-0\">
            <table class=\"table align-items-center mb-0\">
              <thead>
                <tr>
                  <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7\">Titre</th>
                  <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2\">Contenu</th>
                  <th class=\"text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7\">Lieu</th>
                  <th class=\"text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7\">Date</th>
                  <th class=\"text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7\">Likes/Dislikes</th>
                  <th class=\"text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7\">Commentaires</th>
                  <th class=\"text-secondary opacity-7\">Actions</th>
                </tr>
              </thead>
              <tbody>
                ";
        // line 74
        if ((array_key_exists("pagination", $context) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 74, $this->source); })()), "items", [], "any", false, false, false, 74)) > 0))) {
            // line 75
            yield "                  ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 75, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["social_media"]) {
                // line 76
                yield "                    <tr>
                      <td>
                        <div class=\"d-flex px-2 py-1\">
                          ";
                // line 79
                if (CoreExtension::getAttribute($this->env, $this->source, $context["social_media"], "imagemedia", [], "any", false, false, false, 79)) {
                    // line 80
                    yield "                            <div>
                              
                        <img src=\"";
                    // line 82
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("http://localhost/ImageSocialMedia/" . CoreExtension::getAttribute($this->env, $this->source, $context["social_media"], "getImagemedia", [], "method", false, false, false, 82))), "html", null, true);
                    yield "\" class=\"avatar avatar-sm me-3\" alt=\"Image\">
                            </div>
                          ";
                } else {
                    // line 85
                    yield "                            <div>
                              <div class=\"avatar avatar-sm me-3 bg-gradient-primary\">
                                <i class=\"fas fa-image text-white\"></i>
                              </div>
                            </div>
                          ";
                }
                // line 91
                yield "                          <div class=\"d-flex flex-column justify-content-center\">
                            <h6 class=\"mb-0 text-sm\">";
                // line 92
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["social_media"], "titre", [], "any", false, false, false, 92), "html", null, true);
                yield "</h6>
                            <p class=\"text-xs text-secondary mb-0\">
                              ";
                // line 94
                if (CoreExtension::getAttribute($this->env, $this->source, $context["social_media"], "user", [], "any", false, false, false, 94)) {
                    // line 95
                    yield "                                ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["social_media"], "user", [], "any", false, true, false, 95), "name", [], "any", true, true, false, 95)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["social_media"], "user", [], "any", false, false, false, 95), "name", [], "any", false, false, false, 95), "")) : ("")), "html", null, true);
                    yield " ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["social_media"], "user", [], "any", false, true, false, 95), "prenom", [], "any", true, true, false, 95)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["social_media"], "user", [], "any", false, false, false, 95), "prenom", [], "any", false, false, false, 95), "")) : ("")), "html", null, true);
                    yield "
                              ";
                } else {
                    // line 97
                    yield "                                Utilisateur inconnu
                              ";
                }
                // line 99
                yield "                            </p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class=\"text-xs font-weight-bold mb-0\">";
                // line 104
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["social_media"], "contenu", [], "any", false, false, false, 104), 0, 100), "html", null, true);
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["social_media"], "contenu", [], "any", false, false, false, 104)) > 100)) {
                    yield "...";
                }
                yield "</p>
                      </td>
                      <td class=\"align-middle text-center text-sm\">
                        <span class=\"badge badge-sm bg-gradient-info\">";
                // line 107
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["social_media"], "lieu", [], "any", false, false, false, 107), "html", null, true);
                yield "</span>
                      </td>
                      <td class=\"align-middle text-center\">
                        <span class=\"text-secondary text-xs font-weight-bold\">";
                // line 110
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["social_media"], "publicationDate", [], "any", false, false, false, 110), "d/m/Y"), "html", null, true);
                yield "</span>
                      </td>
                      <td class=\"align-middle text-center\">
                        <div class=\"d-flex justify-content-center\">
                          <span class=\"me-2 badge bg-gradient-success\"><i class=\"fas fa-thumbs-up me-1\"></i>";
                // line 114
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["social_media"], "likee", [], "any", false, false, false, 114), "html", null, true);
                yield "</span>
                          <span class=\"badge bg-gradient-danger\"><i class=\"fas fa-thumbs-down me-1\"></i>";
                // line 115
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["social_media"], "dislike", [], "any", false, false, false, 115), "html", null, true);
                yield "</span>
                        </div>
                      </td>
                      <td class=\"align-middle text-center\">
                        <span class=\"badge badge-sm bg-gradient-warning\">";
                // line 119
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["social_media"], "commentaires", [], "any", false, false, false, 119)), "html", null, true);
                yield "</span>
                      </td>
                      <td class=\"align-middle\">
                        <div class=\"d-flex\">
                          <a href=\"";
                // line 123
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_social_media_show", ["idEB" => CoreExtension::getAttribute($this->env, $this->source, $context["social_media"], "idEB", [], "any", false, false, false, 123)]), "html", null, true);
                yield "\" class=\"btn btn-link text-info text-gradient px-3 mb-0\" data-toggle=\"tooltip\" data-original-title=\"Voir\">
                            <i class=\"fas fa-eye me-2\"></i>Voir
                          </a>
                          <a href=\"";
                // line 126
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_social_media_edit", ["idEB" => CoreExtension::getAttribute($this->env, $this->source, $context["social_media"], "idEB", [], "any", false, false, false, 126)]), "html", null, true);
                yield "\" class=\"btn btn-link text-dark px-3 mb-0\" data-toggle=\"tooltip\" data-original-title=\"Éditer\">
                            <i class=\"fas fa-pencil-alt me-2\"></i>Éditer
                          </a>
                          <form method=\"post\" action=\"";
                // line 129
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_social_media_delete", ["idEB" => CoreExtension::getAttribute($this->env, $this->source, $context["social_media"], "idEB", [], "any", false, false, false, 129)]), "html", null, true);
                yield "\" onsubmit=\"return confirm('Êtes-vous sûr de vouloir supprimer cette publication?');\" style=\"display: inline-block;\">
                            <input type=\"hidden\" name=\"_token\" value=\"";
                // line 130
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["social_media"], "idEB", [], "any", false, false, false, 130))), "html", null, true);
                yield "\">
                            <button type=\"submit\" class=\"btn btn-link text-danger text-gradient px-3 mb-0\">
                              <i class=\"fas fa-trash me-2\"></i>Supprimer
                            </button>
                          </form>
                        </div>
                      </td>
                    </tr>
                  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['social_media'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 139
            yield "                ";
        } else {
            // line 140
            yield "                  <tr>
                    <td colspan=\"7\" class=\"text-center py-4\">
                      <p class=\"text-muted\">Aucune publication trouvée</p>
                    </td>
                  </tr>
                ";
        }
        // line 146
        yield "              </tbody>
            </table>
          </div>

          ";
        // line 150
        if ((array_key_exists("pagination", $context) && (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 150, $this->source); })()), "paginationData", [], "any", false, false, false, 150), "pageCount", [], "any", false, false, false, 150) > 1))) {
            // line 151
            yield "            <div class=\"navigation d-flex justify-content-center mt-4\">
              <nav aria-label=\"Page navigation\">
                <ul class=\"pagination\">
                  ";
            // line 154
            if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 154, $this->source); })()), "paginationData", [], "any", false, false, false, 154), "current", [], "any", false, false, false, 154) > 1)) {
                // line 155
                yield "                    <li class=\"page-item\">
                      <a class=\"page-link\" href=\"";
                // line 156
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_social_media_index", ["page" => 1]);
                yield "\" aria-label=\"First\">
                        <span aria-hidden=\"true\">&laquo;&laquo;</span>
                      </a>
                    </li>
                    <li class=\"page-item\">
                      <a class=\"page-link\" href=\"";
                // line 161
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_social_media_index", ["page" => (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 161, $this->source); })()), "paginationData", [], "any", false, false, false, 161), "current", [], "any", false, false, false, 161) - 1)]), "html", null, true);
                yield "\" aria-label=\"Previous\">
                        <span aria-hidden=\"true\">&laquo;</span>
                      </a>
                    </li>
                  ";
            }
            // line 166
            yield "
                  ";
            // line 167
            $context["startPage"] = max(1, (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 167, $this->source); })()), "paginationData", [], "any", false, false, false, 167), "current", [], "any", false, false, false, 167) - 2));
            // line 168
            yield "                  ";
            $context["endPage"] = min(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 168, $this->source); })()), "paginationData", [], "any", false, false, false, 168), "pageCount", [], "any", false, false, false, 168), ((isset($context["startPage"]) || array_key_exists("startPage", $context) ? $context["startPage"] : (function () { throw new RuntimeError('Variable "startPage" does not exist.', 168, $this->source); })()) + 4));
            // line 169
            yield "                  
                  ";
            // line 170
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(range((isset($context["startPage"]) || array_key_exists("startPage", $context) ? $context["startPage"] : (function () { throw new RuntimeError('Variable "startPage" does not exist.', 170, $this->source); })()), (isset($context["endPage"]) || array_key_exists("endPage", $context) ? $context["endPage"] : (function () { throw new RuntimeError('Variable "endPage" does not exist.', 170, $this->source); })())));
            foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
                // line 171
                yield "                    <li class=\"page-item ";
                if (($context["page"] == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 171, $this->source); })()), "paginationData", [], "any", false, false, false, 171), "current", [], "any", false, false, false, 171))) {
                    yield "active";
                }
                yield "\">
                      <a class=\"page-link\" href=\"";
                // line 172
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_social_media_index", ["page" => $context["page"]]), "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["page"], "html", null, true);
                yield "</a>
                    </li>
                  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['page'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 175
            yield "
                  ";
            // line 176
            if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 176, $this->source); })()), "paginationData", [], "any", false, false, false, 176), "current", [], "any", false, false, false, 176) < CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 176, $this->source); })()), "paginationData", [], "any", false, false, false, 176), "pageCount", [], "any", false, false, false, 176))) {
                // line 177
                yield "                    <li class=\"page-item\">
                      <a class=\"page-link\" href=\"";
                // line 178
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_social_media_index", ["page" => (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 178, $this->source); })()), "paginationData", [], "any", false, false, false, 178), "current", [], "any", false, false, false, 178) + 1)]), "html", null, true);
                yield "\" aria-label=\"Next\">
                        <span aria-hidden=\"true\">&raquo;</span>
                      </a>
                    </li>
                    <li class=\"page-item\">
                      <a class=\"page-link\" href=\"";
                // line 183
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_social_media_index", ["page" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["pagination"]) || array_key_exists("pagination", $context) ? $context["pagination"] : (function () { throw new RuntimeError('Variable "pagination" does not exist.', 183, $this->source); })()), "paginationData", [], "any", false, false, false, 183), "pageCount", [], "any", false, false, false, 183)]), "html", null, true);
                yield "\" aria-label=\"Last\">
                        <span aria-hidden=\"true\">&raquo;&raquo;</span>
                      </a>
                    </li>
                  ";
            }
            // line 188
            yield "                </ul>
              </nav>
            </div>
          ";
        }
        // line 192
        yield "        </div>
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
        return "dashAdmin/socialPage.html.twig";
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
        return array (  454 => 192,  448 => 188,  440 => 183,  432 => 178,  429 => 177,  427 => 176,  424 => 175,  413 => 172,  406 => 171,  402 => 170,  399 => 169,  396 => 168,  394 => 167,  391 => 166,  383 => 161,  375 => 156,  372 => 155,  370 => 154,  365 => 151,  363 => 150,  357 => 146,  349 => 140,  346 => 139,  331 => 130,  327 => 129,  321 => 126,  315 => 123,  308 => 119,  301 => 115,  297 => 114,  290 => 110,  284 => 107,  275 => 104,  268 => 99,  264 => 97,  256 => 95,  254 => 94,  249 => 92,  246 => 91,  238 => 85,  232 => 82,  228 => 80,  226 => 79,  221 => 76,  216 => 75,  214 => 74,  192 => 55,  184 => 49,  175 => 43,  171 => 42,  168 => 41,  166 => 40,  163 => 39,  157 => 38,  147 => 34,  142 => 33,  137 => 32,  133 => 31,  120 => 21,  113 => 17,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'dashAdmin/dashboard.html.twig' %}

{% block title %}Gestion des Réseaux Sociaux{% endblock %}

{% block content %}
<nav class=\"navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl \" id=\"navbarBlur\" data-scroll=\"false\">
  <div class=\"container-fluid py-1 px-3\">
    <nav aria-label=\"breadcrumb\">
      <ol class=\"breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5\">
        <li class=\"breadcrumb-item text-sm\"><a class=\"opacity-5 text-white\" href=\"javascript:;\">Pages</a></li>
        <li class=\"breadcrumb-item text-sm text-white active\" aria-current=\"page\">Social Media</li>
      </ol>
      <h6 class=\"font-weight-bolder text-white mb-0\">Gestion des Réseaux Sociaux</h6>
    </nav>
    <div class=\"collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4\" id=\"navbar\">
      <div class=\"ms-md-auto pe-md-3 d-flex align-items-center\">
        <form method=\"get\" action=\"{{ path('admin_social_media_index') }}\">
          <div class=\"input-group\">
            <span class=\"input-group-text text-body\"><i class=\"fas fa-search\" aria-hidden=\"true\"></i></span>
            <input type=\"text\" name=\"search\" class=\"form-control\" placeholder=\"Rechercher...\"
              value=\"{{ app.request.query.get('search') }}\">
            <button type=\"submit\" class=\"btn btn-sm btn-primary mb-0\">Rechercher</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</nav>
<!-- End Navbar -->
<div class=\"container-fluid py-4\">
  {% for label, messages in app.flashes %}
    {% for message in messages %}
      <div class=\"alert alert-{{ label == 'error' ? 'danger' : label }} alert-dismissible fade show\" role=\"alert\">
        {{ message }}
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
      </div>
    {% endfor %}
  {% endfor %}

  {% if search is defined and search %}
    <div class=\"alert alert-info alert-dismissible fade show mb-4\" role=\"alert\">
      <span class=\"alert-text\">Résultats de recherche pour \"<strong>{{ search }}</strong>\"</span>
      <a href=\"{{ path('admin_social_media_index') }}\" class=\"btn btn-sm btn-outline-secondary ms-3\">
        <i class=\"fas fa-times\"></i> Effacer la recherche
      </a>
      <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
    </div>
  {% endif %}

  <div class=\"row\">
    <div class=\"col-12\">
      <div class=\"card mb-4\">
        <div class=\"card-header pb-0 d-flex justify-content-between align-items-center\">
          <h6>Publications sur les Réseaux Sociaux</h6>
          <a href=\"{{ path('admin_social_media_new') }}\" class=\"btn btn-sm btn-primary\">
            <i class=\"fas fa-plus-circle me-2\"></i>Nouvelle Publication
          </a>
        </div>
        <div class=\"card-body px-0 pt-0 pb-2\">
          <div class=\"table-responsive p-0\">
            <table class=\"table align-items-center mb-0\">
              <thead>
                <tr>
                  <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7\">Titre</th>
                  <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2\">Contenu</th>
                  <th class=\"text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7\">Lieu</th>
                  <th class=\"text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7\">Date</th>
                  <th class=\"text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7\">Likes/Dislikes</th>
                  <th class=\"text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7\">Commentaires</th>
                  <th class=\"text-secondary opacity-7\">Actions</th>
                </tr>
              </thead>
              <tbody>
                {% if pagination is defined and pagination.items|length > 0 %}
                  {% for social_media in pagination %}
                    <tr>
                      <td>
                        <div class=\"d-flex px-2 py-1\">
                          {% if social_media.imagemedia %}
                            <div>
                              
                        <img src=\"{{ asset('http://localhost/ImageSocialMedia/' ~ social_media.getImagemedia()) }}\" class=\"avatar avatar-sm me-3\" alt=\"Image\">
                            </div>
                          {% else %}
                            <div>
                              <div class=\"avatar avatar-sm me-3 bg-gradient-primary\">
                                <i class=\"fas fa-image text-white\"></i>
                              </div>
                            </div>
                          {% endif %}
                          <div class=\"d-flex flex-column justify-content-center\">
                            <h6 class=\"mb-0 text-sm\">{{ social_media.titre }}</h6>
                            <p class=\"text-xs text-secondary mb-0\">
                              {% if social_media.user %}
                                {{ social_media.user.name|default('') }} {{ social_media.user.prenom|default('') }}
                              {% else %}
                                Utilisateur inconnu
                              {% endif %}
                            </p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class=\"text-xs font-weight-bold mb-0\">{{ social_media.contenu|slice(0, 100) }}{% if social_media.contenu|length > 100 %}...{% endif %}</p>
                      </td>
                      <td class=\"align-middle text-center text-sm\">
                        <span class=\"badge badge-sm bg-gradient-info\">{{ social_media.lieu }}</span>
                      </td>
                      <td class=\"align-middle text-center\">
                        <span class=\"text-secondary text-xs font-weight-bold\">{{ social_media.publicationDate|date('d/m/Y') }}</span>
                      </td>
                      <td class=\"align-middle text-center\">
                        <div class=\"d-flex justify-content-center\">
                          <span class=\"me-2 badge bg-gradient-success\"><i class=\"fas fa-thumbs-up me-1\"></i>{{ social_media.likee }}</span>
                          <span class=\"badge bg-gradient-danger\"><i class=\"fas fa-thumbs-down me-1\"></i>{{ social_media.dislike }}</span>
                        </div>
                      </td>
                      <td class=\"align-middle text-center\">
                        <span class=\"badge badge-sm bg-gradient-warning\">{{ social_media.commentaires|length }}</span>
                      </td>
                      <td class=\"align-middle\">
                        <div class=\"d-flex\">
                          <a href=\"{{ path('admin_social_media_show', {'idEB': social_media.idEB}) }}\" class=\"btn btn-link text-info text-gradient px-3 mb-0\" data-toggle=\"tooltip\" data-original-title=\"Voir\">
                            <i class=\"fas fa-eye me-2\"></i>Voir
                          </a>
                          <a href=\"{{ path('admin_social_media_edit', {'idEB': social_media.idEB}) }}\" class=\"btn btn-link text-dark px-3 mb-0\" data-toggle=\"tooltip\" data-original-title=\"Éditer\">
                            <i class=\"fas fa-pencil-alt me-2\"></i>Éditer
                          </a>
                          <form method=\"post\" action=\"{{ path('admin_social_media_delete', {'idEB': social_media.idEB}) }}\" onsubmit=\"return confirm('Êtes-vous sûr de vouloir supprimer cette publication?');\" style=\"display: inline-block;\">
                            <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ social_media.idEB) }}\">
                            <button type=\"submit\" class=\"btn btn-link text-danger text-gradient px-3 mb-0\">
                              <i class=\"fas fa-trash me-2\"></i>Supprimer
                            </button>
                          </form>
                        </div>
                      </td>
                    </tr>
                  {% endfor %}
                {% else %}
                  <tr>
                    <td colspan=\"7\" class=\"text-center py-4\">
                      <p class=\"text-muted\">Aucune publication trouvée</p>
                    </td>
                  </tr>
                {% endif %}
              </tbody>
            </table>
          </div>

          {% if pagination is defined and pagination.paginationData.pageCount > 1 %}
            <div class=\"navigation d-flex justify-content-center mt-4\">
              <nav aria-label=\"Page navigation\">
                <ul class=\"pagination\">
                  {% if pagination.paginationData.current > 1 %}
                    <li class=\"page-item\">
                      <a class=\"page-link\" href=\"{{ path('admin_social_media_index', {'page': 1}) }}\" aria-label=\"First\">
                        <span aria-hidden=\"true\">&laquo;&laquo;</span>
                      </a>
                    </li>
                    <li class=\"page-item\">
                      <a class=\"page-link\" href=\"{{ path('admin_social_media_index', {'page': pagination.paginationData.current - 1}) }}\" aria-label=\"Previous\">
                        <span aria-hidden=\"true\">&laquo;</span>
                      </a>
                    </li>
                  {% endif %}

                  {% set startPage = max(1, pagination.paginationData.current - 2) %}
                  {% set endPage = min(pagination.paginationData.pageCount, startPage + 4) %}
                  
                  {% for page in startPage..endPage %}
                    <li class=\"page-item {% if page == pagination.paginationData.current %}active{% endif %}\">
                      <a class=\"page-link\" href=\"{{ path('admin_social_media_index', {'page': page}) }}\">{{ page }}</a>
                    </li>
                  {% endfor %}

                  {% if pagination.paginationData.current < pagination.paginationData.pageCount %}
                    <li class=\"page-item\">
                      <a class=\"page-link\" href=\"{{ path('admin_social_media_index', {'page': pagination.paginationData.current + 1}) }}\" aria-label=\"Next\">
                        <span aria-hidden=\"true\">&raquo;</span>
                      </a>
                    </li>
                    <li class=\"page-item\">
                      <a class=\"page-link\" href=\"{{ path('admin_social_media_index', {'page': pagination.paginationData.pageCount}) }}\" aria-label=\"Last\">
                        <span aria-hidden=\"true\">&raquo;&raquo;</span>
                      </a>
                    </li>
                  {% endif %}
                </ul>
              </nav>
            </div>
          {% endif %}
        </div>
      </div>
    </div>
  </div>
</div>
{% endblock %}", "dashAdmin/socialPage.html.twig", "C:\\Users\\meria\\OneDrive - ESPRIT\\Bureau\\Airmess_Web\\templates\\dashAdmin\\socialPage.html.twig");
    }
}
