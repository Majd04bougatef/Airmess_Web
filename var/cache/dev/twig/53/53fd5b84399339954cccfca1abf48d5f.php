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

/* dashAdmin/userPage.html.twig */
class __TwigTemplate_cd7e5b8382845211a452a5b5483c4d31 extends Template
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
            'javascripts' => [$this, 'block_javascripts'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashAdmin/userPage.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashAdmin/userPage.html.twig"));

        $this->parent = $this->loadTemplate("dashAdmin/dashboard.html.twig", "dashAdmin/userPage.html.twig", 1);
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

        yield "Gestion des Utilisateurs";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
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

        // line 6
        yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        yield "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 9
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

        // line 10
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
<script src=\"";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/user-avatar.js"), "html", null, true);
        yield "\"></script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 14
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

        // line 15
        yield "<nav class=\"navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl \" id=\"navbarBlur\" data-scroll=\"false\">
  <div class=\"container-fluid py-1 px-3\">
    <nav aria-label=\"breadcrumb\">
      <ol class=\"breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5\">
        <li class=\"breadcrumb-item text-sm\"><a class=\"opacity-5 text-white\" href=\"";
        // line 19
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("dashboard_page");
        yield "\">Dashboard</a></li>
        <li class=\"breadcrumb-item text-sm text-white active\" aria-current=\"page\">Gestion des Utilisateurs</li>
      </ol>
      <h6 class=\"font-weight-bolder text-white mb-0\">Gestion des Utilisateurs</h6>
    </nav>
    <div class=\"collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4\" id=\"navbar\">
      <div class=\"ms-md-auto pe-md-3 d-flex align-items-center\">
        <div class=\"input-group\">
          <span class=\"input-group-text text-body\"><i class=\"fas fa-search\" aria-hidden=\"true\"></i></span>
          <input type=\"text\" class=\"form-control\" id=\"searchInput\" placeholder=\"Rechercher un utilisateur...\">
        </div>
      </div>
    </div>
  </div>
</nav>
<!-- End Navbar -->
<div class=\"container-fluid py-4\">
  <div class=\"row\">
    <div class=\"col-12\">
      <div class=\"card mb-4\">
        <div class=\"card-header pb-0\">
          <div class=\"d-flex justify-content-between align-items-center\">
            <h6>Liste des utilisateurs (";
        // line 41
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["users"]) || array_key_exists("users", $context) ? $context["users"] : (function () { throw new RuntimeError('Variable "users" does not exist.', 41, $this->source); })())), "html", null, true);
        yield ")</h6>
            <div>
              <button type=\"button\" class=\"btn btn-sm bg-gradient-primary mb-0\" data-bs-toggle=\"modal\" data-bs-target=\"#addUserModal\">
                <i class=\"fas fa-plus me-2\"></i> Ajouter un utilisateur
              </button>
              <button type=\"button\" class=\"btn btn-sm bg-gradient-success mb-0\" id=\"activateAllButton\">
                <i class=\"fas fa-check-circle me-2\"></i> Activer tous
              </button>
              <button type=\"button\" class=\"btn btn-sm bg-gradient-info mb-0\" id=\"exportButton\">
                <i class=\"fas fa-file-export me-2\"></i> Exporter
              </button>
            </div>
          </div>
          
          <!-- Filtres -->
          <div class=\"mt-3\">
            <div class=\"row g-2\">
              <div class=\"col-md-3\">
                <select class=\"form-select form-select-sm\" id=\"roleFilter\">
                  <option value=\"\">Tous les rôles</option>
                  <option value=\"Admin\">Admin</option>
                  <option value=\"Voyageurs\">Voyageurs</option>
                  <option value=\"Entreprise\">Entreprise</option>
                </select>
              </div>
              <div class=\"col-md-3\">
                <select class=\"form-select form-select-sm\" id=\"statusFilter\">
                  <option value=\"\">Tous les statuts</option>
                  <option value=\"actif\">Actif</option>
                  <option value=\"active\">Actif</option>
                  <option value=\"inactif\">Inactif</option>
                  <option value=\"inactive\">Inactif</option>
                </select>
              </div>
              <div class=\"col-md-3\">
                <button class=\"btn btn-sm btn-outline-primary w-100\" id=\"applyFilters\">Appliquer les filtres</button>
              </div>
              <div class=\"col-md-3\">
                <button class=\"btn btn-sm btn-outline-secondary w-100\" id=\"resetFilters\">Réinitialiser</button>
              </div>
            </div>
          </div>
        </div>
        <div class=\"card-body px-0 pt-0 pb-2\">
          <div class=\"table-responsive p-0\">
            <table class=\"table align-items-center mb-0\" id=\"usersTable\" 
                  data-edit-path=\"";
        // line 87
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_user_edit", ["id" => 0]);
        yield "\"
                  data-delete-path=\"";
        // line 88
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_user_delete", ["id" => 0]);
        yield "\">
              <thead>
                <tr>
                  <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7\">Utilisateur</th>
                  <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2\">Rôle</th>
                  <th class=\"text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7\">Statut</th>
                  <th class=\"text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7\">Date d'inscription</th>
                  <th class=\"text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7\">Téléphone</th>
                  <th class=\"text-secondary opacity-7\">Actions</th>
                </tr>
              </thead>
              <tbody>
                ";
        // line 100
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["users"]) || array_key_exists("users", $context) ? $context["users"] : (function () { throw new RuntimeError('Variable "users" does not exist.', 100, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 101
            yield "                  <tr>
                    <td>
                      <div class=\"d-flex px-2 py-1\">
                        <div>
                          <img src=\"";
            // line 105
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("images/users/" . CoreExtension::getAttribute($this->env, $this->source, $context["user"], "imagesU", [], "any", false, false, false, 105))), "html", null, true);
            yield "\" class=\"avatar avatar-sm me-3\" 
                             alt=\"";
            // line 106
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "name", [], "any", false, false, false, 106), "html", null, true);
            yield "\" onerror=\"handleImageError(this)\">
                        </div>
                        <div class=\"d-flex flex-column justify-content-center\">
                          <h6 class=\"mb-0 text-sm\">";
            // line 109
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "name", [], "any", false, false, false, 109), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "prenom", [], "any", false, false, false, 109), "html", null, true);
            yield "</h6>
                          <p class=\"text-xs text-secondary mb-0\">";
            // line 110
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "email", [], "any", false, false, false, 110), "html", null, true);
            yield "</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class=\"text-xs font-weight-bold mb-0\">";
            // line 115
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "roleUser", [], "any", false, false, false, 115), "html", null, true);
            yield "</p>
                    </td>
                    <td class=\"align-middle text-center text-sm\">
                      <!-- Debug: ";
            // line 118
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "statut", [], "any", false, false, false, 118), "html", null, true);
            yield " -->
                      ";
            // line 119
            if (((CoreExtension::getAttribute($this->env, $this->source, $context["user"], "statut", [], "any", false, false, false, 119) == "actif") || (CoreExtension::getAttribute($this->env, $this->source, $context["user"], "statut", [], "any", false, false, false, 119) == "active"))) {
                // line 120
                yield "                        <span class=\"badge badge-sm bg-gradient-success\">Actif</span>
                      ";
            } elseif (((CoreExtension::getAttribute($this->env, $this->source,             // line 121
$context["user"], "statut", [], "any", false, false, false, 121) == "inactif") || (CoreExtension::getAttribute($this->env, $this->source, $context["user"], "statut", [], "any", false, false, false, 121) == "inactive"))) {
                // line 122
                yield "                        <span class=\"badge badge-sm bg-gradient-danger\">Inactif</span>
                      ";
            } else {
                // line 124
                yield "                        <span class=\"badge badge-sm bg-gradient-warning\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "statut", [], "any", false, false, false, 124), "html", null, true);
                yield "</span>
                      ";
            }
            // line 126
            yield "                    </td>
                    <td class=\"align-middle text-center\">
                      <span class=\"text-secondary text-xs font-weight-bold\">";
            // line 128
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "dateNaiss", [], "any", false, false, false, 128), "d/m/Y"), "html", null, true);
            yield "</span>
                    </td>
                    <td class=\"align-middle text-center\">
                      <span class=\"text-secondary text-xs font-weight-bold\">";
            // line 131
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "phoneNumber", [], "any", false, false, false, 131), "html", null, true);
            yield "</span>
                    </td>
                    <td class=\"align-middle\">
                      <div class=\"d-flex\">
                        <button class=\"btn btn-link text-warning px-2 mb-0\" data-bs-toggle=\"modal\" data-bs-target=\"#editUserModal";
            // line 135
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "idU", [], "any", false, false, false, 135), "html", null, true);
            yield "\">
                          <i class=\"fas fa-edit me-2\"></i>Modifier
                        </button>
                        <button class=\"btn btn-link text-danger px-2 mb-0\" onclick=\"confirmDelete(";
            // line 138
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "idU", [], "any", false, false, false, 138), "html", null, true);
            yield ")\">
                          <i class=\"fas fa-trash me-2\"></i>Supprimer
                        </button>
                      </div>
                    </td>
                  </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['user'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 145
        yield "              </tbody>
            </table>
          </div>
          <!-- Pagination -->
          <div class=\"d-flex justify-content-center mt-3\">
            <nav aria-label=\"Page navigation\">
              <ul class=\"pagination\">
                ";
        // line 152
        if (((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 152, $this->source); })()) > 1)) {
            // line 153
            yield "                  <li class=\"page-item\">
                    <a class=\"page-link\" href=\"";
            // line 154
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("user_page", ["page" => ((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 154, $this->source); })()) - 1)]), "html", null, true);
            yield "\" aria-label=\"Précédent\">
                      <span aria-hidden=\"true\">&laquo;</span> Précédent
                    </a>
                  </li>
                ";
        } else {
            // line 159
            yield "                  <li class=\"page-item disabled\">
                    <a class=\"page-link\" href=\"#\" tabindex=\"-1\" aria-disabled=\"true\">&laquo; Précédent</a>
                  </li>
                ";
        }
        // line 163
        yield "                
                ";
        // line 164
        $context["startPage"] = max(1, ((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 164, $this->source); })()) - 2));
        // line 165
        yield "                ";
        $context["endPage"] = min((isset($context["totalPages"]) || array_key_exists("totalPages", $context) ? $context["totalPages"] : (function () { throw new RuntimeError('Variable "totalPages" does not exist.', 165, $this->source); })()), ((isset($context["startPage"]) || array_key_exists("startPage", $context) ? $context["startPage"] : (function () { throw new RuntimeError('Variable "startPage" does not exist.', 165, $this->source); })()) + 4));
        // line 166
        yield "                ";
        if (((((isset($context["endPage"]) || array_key_exists("endPage", $context) ? $context["endPage"] : (function () { throw new RuntimeError('Variable "endPage" does not exist.', 166, $this->source); })()) - (isset($context["startPage"]) || array_key_exists("startPage", $context) ? $context["startPage"] : (function () { throw new RuntimeError('Variable "startPage" does not exist.', 166, $this->source); })())) < 4) && ((isset($context["totalPages"]) || array_key_exists("totalPages", $context) ? $context["totalPages"] : (function () { throw new RuntimeError('Variable "totalPages" does not exist.', 166, $this->source); })()) > 5))) {
            // line 167
            yield "                  ";
            $context["startPage"] = max(1, ((isset($context["endPage"]) || array_key_exists("endPage", $context) ? $context["endPage"] : (function () { throw new RuntimeError('Variable "endPage" does not exist.', 167, $this->source); })()) - 4));
            // line 168
            yield "                ";
        }
        // line 169
        yield "                
                ";
        // line 170
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(range((isset($context["startPage"]) || array_key_exists("startPage", $context) ? $context["startPage"] : (function () { throw new RuntimeError('Variable "startPage" does not exist.', 170, $this->source); })()), (isset($context["endPage"]) || array_key_exists("endPage", $context) ? $context["endPage"] : (function () { throw new RuntimeError('Variable "endPage" does not exist.', 170, $this->source); })())));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 171
            yield "                  <li class=\"page-item ";
            yield ((((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 171, $this->source); })()) == $context["i"])) ? ("active") : (""));
            yield "\">
                    <a class=\"page-link\" href=\"";
            // line 172
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("user_page", ["page" => $context["i"]]), "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["i"], "html", null, true);
            yield "</a>
                  </li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 175
        yield "                
                ";
        // line 176
        if (((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 176, $this->source); })()) < (isset($context["totalPages"]) || array_key_exists("totalPages", $context) ? $context["totalPages"] : (function () { throw new RuntimeError('Variable "totalPages" does not exist.', 176, $this->source); })()))) {
            // line 177
            yield "                  <li class=\"page-item\">
                    <a class=\"page-link\" href=\"";
            // line 178
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("user_page", ["page" => ((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 178, $this->source); })()) + 1)]), "html", null, true);
            yield "\" aria-label=\"Suivant\">
                      Suivant <span aria-hidden=\"true\">&raquo;</span>
                    </a>
                  </li>
                ";
        } else {
            // line 183
            yield "                  <li class=\"page-item disabled\">
                    <a class=\"page-link\" href=\"#\" tabindex=\"-1\" aria-disabled=\"true\">Suivant &raquo;</a>
                  </li>
                ";
        }
        // line 187
        yield "              </ul>
            </nav>
          </div>
          
          <!-- Pagination info -->
          <div class=\"text-center text-sm text-muted mt-2\">
            Affichage des utilisateurs ";
        // line 193
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 193, $this->source); })()) - 1) * (isset($context["pageSize"]) || array_key_exists("pageSize", $context) ? $context["pageSize"] : (function () { throw new RuntimeError('Variable "pageSize" does not exist.', 193, $this->source); })())) + 1), "html", null, true);
        yield " à ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(min(((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 193, $this->source); })()) * (isset($context["pageSize"]) || array_key_exists("pageSize", $context) ? $context["pageSize"] : (function () { throw new RuntimeError('Variable "pageSize" does not exist.', 193, $this->source); })())), (isset($context["totalUsers"]) || array_key_exists("totalUsers", $context) ? $context["totalUsers"] : (function () { throw new RuntimeError('Variable "totalUsers" does not exist.', 193, $this->source); })())), "html", null, true);
        yield " sur ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalUsers"]) || array_key_exists("totalUsers", $context) ? $context["totalUsers"] : (function () { throw new RuntimeError('Variable "totalUsers" does not exist.', 193, $this->source); })()), "html", null, true);
        yield " utilisateurs
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Statistiques Utilisateurs -->
  <div class=\"row\">
    <div class=\"col-lg-7 mb-lg-0 mb-4\">
      <div class=\"card mb-4\">
        <div class=\"card-header pb-0\">
          <h6>Répartition des utilisateurs</h6>
        </div>
        <div class=\"card-body p-3\">
          <div class=\"chart\">
            <canvas id=\"userRoleChart\" class=\"chart-canvas\" height=\"300\"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class=\"col-lg-5\">
      <div class=\"card mb-4\">
        <div class=\"card-header pb-0\">
          <h6>Activité des utilisateurs</h6>
        </div>
        <div class=\"card-body p-3\">
          <div class=\"timeline timeline-one-side\">
            ";
        // line 221
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["recentActivities"]) || array_key_exists("recentActivities", $context) ? $context["recentActivities"] : (function () { throw new RuntimeError('Variable "recentActivities" does not exist.', 221, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["activity"]) {
            // line 222
            yield "              <div class=\"timeline-block mb-3\">
                <span class=\"timeline-step\">
                  <i class=\"";
            // line 224
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["activity"], "icon", [], "any", false, false, false, 224), "html", null, true);
            yield "\"></i>
                </span>
                <div class=\"timeline-content\">
                  <h6 class=\"text-dark text-sm font-weight-bold mb-0\">";
            // line 227
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["activity"], "description", [], "any", false, false, false, 227), "html", null, true);
            yield "</h6>
                  <p class=\"text-secondary font-weight-bold text-xs mt-1 mb-0\">Il y a ";
            // line 228
            yield ((($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["activity"], "date", [], "any", false, false, false, 228), "d") == $this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "d"))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["activity"], "date", [], "any", false, false, false, 228), "G") . " heures"), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["activity"], "date", [], "any", false, false, false, 228), "d/m/Y"), "html", null, true)));
            yield "</p>
                </div>
              </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['activity'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 232
        yield "          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Footer -->
  <footer class=\"footer pt-3\">
    <div class=\"container-fluid\">
      <div class=\"row align-items-center justify-content-lg-between\">
        <div class=\"col-lg-6 mb-lg-0 mb-4\">
          <div class=\"copyright text-center text-sm text-muted text-lg-start\">
            © ";
        // line 244
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y"), "html", null, true);
        yield " Airmess
          </div>
        </div>
      </div>
    </div>
  </footer>
</div>

<!-- Modals -->
<!-- Modal Ajouter Utilisateur -->
<div class=\"modal fade\" id=\"addUserModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"addUserModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\" id=\"addUserModalLabel\">Ajouter un utilisateur</h5>
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
      </div>
      <div class=\"modal-body\">
        <form id=\"addUserForm\" action=\"";
        // line 262
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_user_add");
        yield "\">
          <div class=\"mb-3\">
            <label for=\"name\" class=\"form-label\">Nom</label>
            <input type=\"text\" class=\"form-control\" id=\"name\" required>
          </div>
          <div class=\"mb-3\">
            <label for=\"prenom\" class=\"form-label\">Prénom</label>
            <input type=\"text\" class=\"form-control\" id=\"prenom\" required>
          </div>
          <div class=\"mb-3\">
            <label for=\"email\" class=\"form-label\">Email</label>
            <input type=\"email\" class=\"form-control\" id=\"email\" required>
          </div>
          <div class=\"mb-3\">
            <label for=\"password\" class=\"form-label\">Mot de passe</label>
            <input type=\"password\" class=\"form-control\" id=\"password\" required>
          </div>
          <div class=\"mb-3\">
            <label for=\"phone\" class=\"form-label\">Téléphone</label>
            <input type=\"tel\" class=\"form-control\" id=\"phone\">
          </div>
          <div class=\"mb-3\">
            <label for=\"role\" class=\"form-label\">Rôle</label>
            <select class=\"form-select\" id=\"role\" required>
              <option value=\"Voyageurs\">Voyageurs</option>
              <option value=\"Entreprise\">Entreprise</option>
              <option value=\"Admin\">Admin</option>
            </select>
          </div>
          <div class=\"mb-3\">
            <label for=\"photo\" class=\"form-label\">Photo de profil</label>
            <input type=\"file\" class=\"form-control\" id=\"photo\" accept=\"image/*\">
          </div>
        </form>
      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn bg-gradient-secondary\" data-bs-dismiss=\"modal\">Annuler</button>
        <button type=\"button\" class=\"btn bg-gradient-primary\" id=\"saveNewUser\">Enregistrer</button>
      </div>
    </div>
  </div>
</div>

<!-- Modals d'édition pour chaque utilisateur -->
";
        // line 306
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["users"]) || array_key_exists("users", $context) ? $context["users"] : (function () { throw new RuntimeError('Variable "users" does not exist.', 306, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 307
            yield "<div class=\"modal fade\" id=\"editUserModal";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "idU", [], "any", false, false, false, 307), "html", null, true);
            yield "\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"editUserModalLabel";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "idU", [], "any", false, false, false, 307), "html", null, true);
            yield "\" aria-hidden=\"true\">
  <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\" id=\"editUserModalLabel";
            // line 311
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "idU", [], "any", false, false, false, 311), "html", null, true);
            yield "\">Modifier l'utilisateur</h5>
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
      </div>
      <div class=\"modal-body\">
        <form id=\"editUserForm";
            // line 315
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "idU", [], "any", false, false, false, 315), "html", null, true);
            yield "\" action=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_user_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["user"], "idU", [], "any", false, false, false, 315)]), "html", null, true);
            yield "\">
          <input type=\"hidden\" id=\"editUserId";
            // line 316
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "idU", [], "any", false, false, false, 316), "html", null, true);
            yield "\" value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "idU", [], "any", false, false, false, 316), "html", null, true);
            yield "\">
          <div class=\"mb-3\">
            <label for=\"editName";
            // line 318
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "idU", [], "any", false, false, false, 318), "html", null, true);
            yield "\" class=\"form-label\">Nom</label>
            <input type=\"text\" class=\"form-control\" id=\"editName";
            // line 319
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "idU", [], "any", false, false, false, 319), "html", null, true);
            yield "\" value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "name", [], "any", false, false, false, 319), "html", null, true);
            yield "\" required>
          </div>
          <div class=\"mb-3\">
            <label for=\"editPrenom";
            // line 322
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "idU", [], "any", false, false, false, 322), "html", null, true);
            yield "\" class=\"form-label\">Prénom</label>
            <input type=\"text\" class=\"form-control\" id=\"editPrenom";
            // line 323
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "idU", [], "any", false, false, false, 323), "html", null, true);
            yield "\" value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "prenom", [], "any", false, false, false, 323), "html", null, true);
            yield "\" required>
          </div>
          <div class=\"mb-3\">
            <label for=\"editEmail";
            // line 326
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "idU", [], "any", false, false, false, 326), "html", null, true);
            yield "\" class=\"form-label\">Email</label>
            <input type=\"email\" class=\"form-control\" id=\"editEmail";
            // line 327
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "idU", [], "any", false, false, false, 327), "html", null, true);
            yield "\" value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "email", [], "any", false, false, false, 327), "html", null, true);
            yield "\" required>
          </div>
          <div class=\"mb-3\">
            <label for=\"editPhone";
            // line 330
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "idU", [], "any", false, false, false, 330), "html", null, true);
            yield "\" class=\"form-label\">Téléphone</label>
            <input type=\"tel\" class=\"form-control\" id=\"editPhone";
            // line 331
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "idU", [], "any", false, false, false, 331), "html", null, true);
            yield "\" value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "phoneNumber", [], "any", false, false, false, 331), "html", null, true);
            yield "\">
          </div>
          <div class=\"mb-3\">
            <label for=\"editRole";
            // line 334
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "idU", [], "any", false, false, false, 334), "html", null, true);
            yield "\" class=\"form-label\">Rôle</label>
            <select class=\"form-select\" id=\"editRole";
            // line 335
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "idU", [], "any", false, false, false, 335), "html", null, true);
            yield "\">
              <option value=\"Voyageurs\" ";
            // line 336
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["user"], "roleUser", [], "any", false, false, false, 336) == "Voyageurs")) {
                yield "selected";
            }
            yield ">Voyageurs</option>
              <option value=\"Entreprise\" ";
            // line 337
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["user"], "roleUser", [], "any", false, false, false, 337) == "Entreprise")) {
                yield "selected";
            }
            yield ">Entreprise</option>
              <option value=\"Admin\" ";
            // line 338
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["user"], "roleUser", [], "any", false, false, false, 338) == "Admin")) {
                yield "selected";
            }
            yield ">Admin</option>
            </select>
          </div>
          <div class=\"mb-3\">
            <label for=\"editStatus";
            // line 342
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "idU", [], "any", false, false, false, 342), "html", null, true);
            yield "\" class=\"form-label\">Statut</label>
            <select class=\"form-select\" id=\"editStatus";
            // line 343
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "idU", [], "any", false, false, false, 343), "html", null, true);
            yield "\">
              <option value=\"actif\" ";
            // line 344
            if (((CoreExtension::getAttribute($this->env, $this->source, $context["user"], "statut", [], "any", false, false, false, 344) == "actif") || (CoreExtension::getAttribute($this->env, $this->source, $context["user"], "statut", [], "any", false, false, false, 344) == "active"))) {
                yield "selected";
            }
            yield ">Actif</option>
              <option value=\"inactif\" ";
            // line 345
            if (((CoreExtension::getAttribute($this->env, $this->source, $context["user"], "statut", [], "any", false, false, false, 345) == "inactif") || (CoreExtension::getAttribute($this->env, $this->source, $context["user"], "statut", [], "any", false, false, false, 345) == "inactive"))) {
                yield "selected";
            }
            yield ">Inactif</option>
            </select>
          </div>
          <div class=\"mb-3\">
            <label for=\"editPhoto";
            // line 349
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "idU", [], "any", false, false, false, 349), "html", null, true);
            yield "\" class=\"form-label\">Photo de profil</label>
            <div class=\"d-flex align-items-center\">
              <img src=\"";
            // line 351
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("images/users/" . CoreExtension::getAttribute($this->env, $this->source, $context["user"], "imagesU", [], "any", false, false, false, 351))), "html", null, true);
            yield "\" alt=\"Photo de profil actuelle\" 
                  class=\"avatar avatar-md me-3\" style=\"width: 60px; height: 60px;\" onerror=\"handleImageError(this)\">
              <input type=\"file\" class=\"form-control\" id=\"editPhoto";
            // line 353
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "idU", [], "any", false, false, false, 353), "html", null, true);
            yield "\" accept=\"image/*\">
            </div>
            <small class=\"text-muted\">Laissez vide pour conserver la photo actuelle</small>
          </div>
        </form>
      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn bg-gradient-secondary\" data-bs-dismiss=\"modal\">Annuler</button>
        <button type=\"button\" class=\"btn bg-gradient-primary\" id=\"saveEditUser-";
            // line 361
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "idU", [], "any", false, false, false, 361), "html", null, true);
            yield "\" onclick=\"saveUser(";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "idU", [], "any", false, false, false, 361), "html", null, true);
            yield ")\">Enregistrer</button>
      </div>
    </div>
  </div>
</div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['user'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 367
        yield "
<script>
document.addEventListener('DOMContentLoaded', function() {
  // Setup pour le graphique de répartition des utilisateurs
  var ctx = document.getElementById('userRoleChart').getContext('2d');
  var userRoleChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ['Voyageurs', 'Entreprise', 'Admin'],
      datasets: [{
        label: 'Utilisateurs par rôle',
        data: [
          ";
        // line 379
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["usersByRole"]) || array_key_exists("usersByRole", $context) ? $context["usersByRole"] : (function () { throw new RuntimeError('Variable "usersByRole" does not exist.', 379, $this->source); })()), "Voyageurs", [], "any", false, false, false, 379), "html", null, true);
        yield ", 
          ";
        // line 380
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["usersByRole"]) || array_key_exists("usersByRole", $context) ? $context["usersByRole"] : (function () { throw new RuntimeError('Variable "usersByRole" does not exist.', 380, $this->source); })()), "Entreprise", [], "any", false, false, false, 380), "html", null, true);
        yield ", 
          ";
        // line 381
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["usersByRole"]) || array_key_exists("usersByRole", $context) ? $context["usersByRole"] : (function () { throw new RuntimeError('Variable "usersByRole" does not exist.', 381, $this->source); })()), "Admin", [], "any", false, false, false, 381), "html", null, true);
        yield "
        ],
        backgroundColor: [
          'rgba(94, 114, 228, 0.8)',
          'rgba(233, 196, 106, 0.8)',
          'rgba(92, 184, 92, 0.8)'
        ],
        borderColor: [
          'rgba(94, 114, 228, 1)',
          'rgba(233, 196, 106, 1)',
          'rgba(92, 184, 92, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          position: 'bottom'
        }
      }
    }
  });
  
  // Fonction de recherche utilisateur
  document.getElementById('searchInput').addEventListener('keyup', function() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById('searchInput');
    filter = input.value.toUpperCase();
    table = document.getElementById('usersTable');
    tr = table.getElementsByTagName('tr');
    
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName('td')[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = '';
        } else {
          tr[i].style.display = 'none';
        }
      }
    }
  });
  
  // Filtrage des utilisateurs
  document.getElementById('applyFilters').addEventListener('click', function() {
    var roleFilter = document.getElementById('roleFilter').value.toUpperCase();
    var statusFilter = document.getElementById('statusFilter').value.toUpperCase();
    
    var table = document.getElementById('usersTable');
    var tr = table.getElementsByTagName('tr');
    
    for (var i = 1; i < tr.length; i++) {
      var roleCell = tr[i].getElementsByTagName('td')[1];
      var statusCell = tr[i].getElementsByTagName('td')[2];
      
      if (roleCell && statusCell) {
        var roleValue = roleCell.textContent || roleCell.innerText;
        var statusValue = statusCell.textContent || statusCell.innerText;
        
        var roleMatch = roleFilter === '' || roleValue.toUpperCase().indexOf(roleFilter) > -1;
        var statusMatch = statusFilter === '' || statusValue.toUpperCase().indexOf(statusFilter) > -1;
        
        if (roleMatch && statusMatch) {
          tr[i].style.display = '';
        } else {
          tr[i].style.display = 'none';
        }
      }
    }
  });
  
  // Réinitialiser les filtres
  document.getElementById('resetFilters').addEventListener('click', function() {
    document.getElementById('roleFilter').value = '';
    document.getElementById('statusFilter').value = '';
    
    var table = document.getElementById('usersTable');
    var tr = table.getElementsByTagName('tr');
    
    for (var i = 1; i < tr.length; i++) {
      tr[i].style.display = '';
    }
  });
  
  // Enregistrement d'un nouvel utilisateur
  document.getElementById('saveNewUser').addEventListener('click', function() {
    var name = document.getElementById('name').value;
    var prenom = document.getElementById('prenom').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var phone = document.getElementById('phone').value;
    var role = document.getElementById('role').value;
    var photoInput = document.getElementById('photo');
    
    if (!name || !prenom || !email || !password) {
      alert('Veuillez remplir tous les champs obligatoires');
      return;
    }
    
    // Use FormData for file uploads
    var formData = new FormData();
    formData.append('name', name);
    formData.append('prenom', prenom);
    formData.append('email', email);
    formData.append('password', password);
    formData.append('phone', phone);
    formData.append('role', role);
    
    // Add photo if selected
    if (photoInput && photoInput.files.length > 0) {
      formData.append('photo', photoInput.files[0]);
    }
    
    fetch('";
        // line 498
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_user_add");
        yield "', {
      method: 'POST',
      headers: {
        'X-Requested-With': 'XMLHttpRequest'
      },
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        alert('Utilisateur créé avec succès');
        // Reload page to see the new user, staying on current page
        window.location.href = '";
        // line 510
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("user_page", ["page" => (isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 510, $this->source); })())]), "html", null, true);
        yield "';
      } else {
        alert('Erreur: ' + data.message);
      }
    })
    .catch(error => {
      console.error('Error:', error);
      alert('Une erreur est survenue');
    });
  });

  // Fonction pour activer tous les utilisateurs
  document.getElementById('activateAllButton').addEventListener('click', function() {
    if (confirm(\"Êtes-vous sûr de vouloir activer tous les utilisateurs?\")) {
      fetch('";
        // line 524
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_activate_all_users");
        yield "', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-Requested-With': 'XMLHttpRequest'
        }
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          alert('Tous les utilisateurs ont été activés avec succès');
          // Reload page to update the user list
          window.location.href = '";
        // line 536
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("user_page", ["page" => (isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 536, $this->source); })())]), "html", null, true);
        yield "';
        } else {
          alert('Erreur lors de l\\'activation des utilisateurs: ' + data.message);
        }
      })
      .catch(error => {
        console.error('Error:', error);
        alert('Une erreur est survenue lors de l\\'activation des utilisateurs');
      });
    }
  });
});

// Fonction de confirmation de suppression
function confirmDelete(userId) {
  if (confirm(\"Êtes-vous sûr de vouloir désactiver cet utilisateur ?\")) {
    const deletePath = document.getElementById('usersTable').dataset.deletePath.replace('/0', '/' + userId);
    
    fetch(deletePath, {
      method: 'POST',
      headers: {
        'X-Requested-With': 'XMLHttpRequest'
      }
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        alert('Utilisateur désactivé avec succès');
        // Reload page to update the user list, keeping the current page
        window.location.href = '";
        // line 565
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("user_page", ["page" => (isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 565, $this->source); })())]), "html", null, true);
        yield "';
      } else {
        alert('Erreur lors de la désactivation');
      }
    })
    .catch(error => {
      console.error('Error:', error);
      alert('Une erreur est survenue');
    });
  }
}

// Fonction pour enregistrer les modifications d'un utilisateur
function saveUser(userId) {
  var name = document.getElementById('editName' + userId).value;
  var prenom = document.getElementById('editPrenom' + userId).value;
  var email = document.getElementById('editEmail' + userId).value;
  var phone = document.getElementById('editPhone' + userId).value;
  var role = document.getElementById('editRole' + userId).value;
  var status = document.getElementById('editStatus' + userId).value;
  var photoInput = document.getElementById('editPhoto' + userId);
  
  if (!name || !prenom || !email) {
    alert('Veuillez remplir tous les champs obligatoires');
    return;
  }
  
  // Prepare form data for multipart/form-data (file upload)
  var formData = new FormData();
  formData.append('name', name);
  formData.append('prenom', prenom);
  formData.append('email', email);
  formData.append('phone', phone);
  formData.append('role', role);
  formData.append('status', status);
  
  // Add the file if one was selected
  if (photoInput.files.length > 0) {
    formData.append('photo', photoInput.files[0]);
  }
  
  const editPath = document.getElementById('usersTable').dataset.editPath.replace('/0', '/' + userId);
  
  fetch(editPath, {
    method: 'POST',
    headers: {
      'X-Requested-With': 'XMLHttpRequest'
    },
    body: formData
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      alert('Utilisateur modifié avec succès');
      // Reload page to see the updated user, keeping the current page
      window.location.href = '";
        // line 620
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("user_page", ["page" => (isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 620, $this->source); })())]), "html", null, true);
        yield "';
    } else {
      alert('Erreur: ' + data.message);
    }
  })
  .catch(error => {
    console.error('Error:', error);
    alert('Une erreur est survenue');
  });
}
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
        return "dashAdmin/userPage.html.twig";
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
        return array (  1045 => 620,  987 => 565,  955 => 536,  940 => 524,  923 => 510,  908 => 498,  788 => 381,  784 => 380,  780 => 379,  766 => 367,  752 => 361,  741 => 353,  736 => 351,  731 => 349,  722 => 345,  716 => 344,  712 => 343,  708 => 342,  699 => 338,  693 => 337,  687 => 336,  683 => 335,  679 => 334,  671 => 331,  667 => 330,  659 => 327,  655 => 326,  647 => 323,  643 => 322,  635 => 319,  631 => 318,  624 => 316,  618 => 315,  611 => 311,  601 => 307,  597 => 306,  550 => 262,  529 => 244,  515 => 232,  505 => 228,  501 => 227,  495 => 224,  491 => 222,  487 => 221,  452 => 193,  444 => 187,  438 => 183,  430 => 178,  427 => 177,  425 => 176,  422 => 175,  411 => 172,  406 => 171,  402 => 170,  399 => 169,  396 => 168,  393 => 167,  390 => 166,  387 => 165,  385 => 164,  382 => 163,  376 => 159,  368 => 154,  365 => 153,  363 => 152,  354 => 145,  341 => 138,  335 => 135,  328 => 131,  322 => 128,  318 => 126,  312 => 124,  308 => 122,  306 => 121,  303 => 120,  301 => 119,  297 => 118,  291 => 115,  283 => 110,  277 => 109,  271 => 106,  267 => 105,  261 => 101,  257 => 100,  242 => 88,  238 => 87,  189 => 41,  164 => 19,  158 => 15,  145 => 14,  132 => 11,  128 => 10,  115 => 9,  102 => 6,  89 => 5,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'dashAdmin/dashboard.html.twig' %}

{% block title %}Gestion des Utilisateurs{% endblock %}

{% block stylesheets %}
{{ parent() }}
{% endblock %}

{% block javascripts %}
{{ parent() }}
<script src=\"{{ asset('js/user-avatar.js') }}\"></script>
{% endblock %}

{% block content %}
<nav class=\"navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl \" id=\"navbarBlur\" data-scroll=\"false\">
  <div class=\"container-fluid py-1 px-3\">
    <nav aria-label=\"breadcrumb\">
      <ol class=\"breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5\">
        <li class=\"breadcrumb-item text-sm\"><a class=\"opacity-5 text-white\" href=\"{{ path('dashboard_page') }}\">Dashboard</a></li>
        <li class=\"breadcrumb-item text-sm text-white active\" aria-current=\"page\">Gestion des Utilisateurs</li>
      </ol>
      <h6 class=\"font-weight-bolder text-white mb-0\">Gestion des Utilisateurs</h6>
    </nav>
    <div class=\"collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4\" id=\"navbar\">
      <div class=\"ms-md-auto pe-md-3 d-flex align-items-center\">
        <div class=\"input-group\">
          <span class=\"input-group-text text-body\"><i class=\"fas fa-search\" aria-hidden=\"true\"></i></span>
          <input type=\"text\" class=\"form-control\" id=\"searchInput\" placeholder=\"Rechercher un utilisateur...\">
        </div>
      </div>
    </div>
  </div>
</nav>
<!-- End Navbar -->
<div class=\"container-fluid py-4\">
  <div class=\"row\">
    <div class=\"col-12\">
      <div class=\"card mb-4\">
        <div class=\"card-header pb-0\">
          <div class=\"d-flex justify-content-between align-items-center\">
            <h6>Liste des utilisateurs ({{ users|length }})</h6>
            <div>
              <button type=\"button\" class=\"btn btn-sm bg-gradient-primary mb-0\" data-bs-toggle=\"modal\" data-bs-target=\"#addUserModal\">
                <i class=\"fas fa-plus me-2\"></i> Ajouter un utilisateur
              </button>
              <button type=\"button\" class=\"btn btn-sm bg-gradient-success mb-0\" id=\"activateAllButton\">
                <i class=\"fas fa-check-circle me-2\"></i> Activer tous
              </button>
              <button type=\"button\" class=\"btn btn-sm bg-gradient-info mb-0\" id=\"exportButton\">
                <i class=\"fas fa-file-export me-2\"></i> Exporter
              </button>
            </div>
          </div>
          
          <!-- Filtres -->
          <div class=\"mt-3\">
            <div class=\"row g-2\">
              <div class=\"col-md-3\">
                <select class=\"form-select form-select-sm\" id=\"roleFilter\">
                  <option value=\"\">Tous les rôles</option>
                  <option value=\"Admin\">Admin</option>
                  <option value=\"Voyageurs\">Voyageurs</option>
                  <option value=\"Entreprise\">Entreprise</option>
                </select>
              </div>
              <div class=\"col-md-3\">
                <select class=\"form-select form-select-sm\" id=\"statusFilter\">
                  <option value=\"\">Tous les statuts</option>
                  <option value=\"actif\">Actif</option>
                  <option value=\"active\">Actif</option>
                  <option value=\"inactif\">Inactif</option>
                  <option value=\"inactive\">Inactif</option>
                </select>
              </div>
              <div class=\"col-md-3\">
                <button class=\"btn btn-sm btn-outline-primary w-100\" id=\"applyFilters\">Appliquer les filtres</button>
              </div>
              <div class=\"col-md-3\">
                <button class=\"btn btn-sm btn-outline-secondary w-100\" id=\"resetFilters\">Réinitialiser</button>
              </div>
            </div>
          </div>
        </div>
        <div class=\"card-body px-0 pt-0 pb-2\">
          <div class=\"table-responsive p-0\">
            <table class=\"table align-items-center mb-0\" id=\"usersTable\" 
                  data-edit-path=\"{{ path('admin_user_edit', {'id': 0}) }}\"
                  data-delete-path=\"{{ path('admin_user_delete', {'id': 0}) }}\">
              <thead>
                <tr>
                  <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7\">Utilisateur</th>
                  <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2\">Rôle</th>
                  <th class=\"text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7\">Statut</th>
                  <th class=\"text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7\">Date d'inscription</th>
                  <th class=\"text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7\">Téléphone</th>
                  <th class=\"text-secondary opacity-7\">Actions</th>
                </tr>
              </thead>
              <tbody>
                {% for user in users %}
                  <tr>
                    <td>
                      <div class=\"d-flex px-2 py-1\">
                        <div>
                          <img src=\"{{ asset('images/users/' ~ user.imagesU) }}\" class=\"avatar avatar-sm me-3\" 
                             alt=\"{{ user.name }}\" onerror=\"handleImageError(this)\">
                        </div>
                        <div class=\"d-flex flex-column justify-content-center\">
                          <h6 class=\"mb-0 text-sm\">{{ user.name }} {{ user.prenom }}</h6>
                          <p class=\"text-xs text-secondary mb-0\">{{ user.email }}</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class=\"text-xs font-weight-bold mb-0\">{{ user.roleUser }}</p>
                    </td>
                    <td class=\"align-middle text-center text-sm\">
                      <!-- Debug: {{ user.statut }} -->
                      {% if user.statut == 'actif' or user.statut == 'active' %}
                        <span class=\"badge badge-sm bg-gradient-success\">Actif</span>
                      {% elseif user.statut == 'inactif' or user.statut == 'inactive' %}
                        <span class=\"badge badge-sm bg-gradient-danger\">Inactif</span>
                      {% else %}
                        <span class=\"badge badge-sm bg-gradient-warning\">{{ user.statut }}</span>
                      {% endif %}
                    </td>
                    <td class=\"align-middle text-center\">
                      <span class=\"text-secondary text-xs font-weight-bold\">{{ user.dateNaiss|date(\"d/m/Y\") }}</span>
                    </td>
                    <td class=\"align-middle text-center\">
                      <span class=\"text-secondary text-xs font-weight-bold\">{{ user.phoneNumber }}</span>
                    </td>
                    <td class=\"align-middle\">
                      <div class=\"d-flex\">
                        <button class=\"btn btn-link text-warning px-2 mb-0\" data-bs-toggle=\"modal\" data-bs-target=\"#editUserModal{{ user.idU }}\">
                          <i class=\"fas fa-edit me-2\"></i>Modifier
                        </button>
                        <button class=\"btn btn-link text-danger px-2 mb-0\" onclick=\"confirmDelete({{ user.idU }})\">
                          <i class=\"fas fa-trash me-2\"></i>Supprimer
                        </button>
                      </div>
                    </td>
                  </tr>
                {% endfor %}
              </tbody>
            </table>
          </div>
          <!-- Pagination -->
          <div class=\"d-flex justify-content-center mt-3\">
            <nav aria-label=\"Page navigation\">
              <ul class=\"pagination\">
                {% if currentPage > 1 %}
                  <li class=\"page-item\">
                    <a class=\"page-link\" href=\"{{ path('user_page', {'page': currentPage - 1}) }}\" aria-label=\"Précédent\">
                      <span aria-hidden=\"true\">&laquo;</span> Précédent
                    </a>
                  </li>
                {% else %}
                  <li class=\"page-item disabled\">
                    <a class=\"page-link\" href=\"#\" tabindex=\"-1\" aria-disabled=\"true\">&laquo; Précédent</a>
                  </li>
                {% endif %}
                
                {% set startPage = max(1, currentPage - 2) %}
                {% set endPage = min(totalPages, startPage + 4) %}
                {% if endPage - startPage < 4 and totalPages > 5 %}
                  {% set startPage = max(1, endPage - 4) %}
                {% endif %}
                
                {% for i in startPage..endPage %}
                  <li class=\"page-item {{ currentPage == i ? 'active' : '' }}\">
                    <a class=\"page-link\" href=\"{{ path('user_page', {'page': i}) }}\">{{ i }}</a>
                  </li>
                {% endfor %}
                
                {% if currentPage < totalPages %}
                  <li class=\"page-item\">
                    <a class=\"page-link\" href=\"{{ path('user_page', {'page': currentPage + 1}) }}\" aria-label=\"Suivant\">
                      Suivant <span aria-hidden=\"true\">&raquo;</span>
                    </a>
                  </li>
                {% else %}
                  <li class=\"page-item disabled\">
                    <a class=\"page-link\" href=\"#\" tabindex=\"-1\" aria-disabled=\"true\">Suivant &raquo;</a>
                  </li>
                {% endif %}
              </ul>
            </nav>
          </div>
          
          <!-- Pagination info -->
          <div class=\"text-center text-sm text-muted mt-2\">
            Affichage des utilisateurs {{ (currentPage - 1) * pageSize + 1 }} à {{ min(currentPage * pageSize, totalUsers) }} sur {{ totalUsers }} utilisateurs
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Statistiques Utilisateurs -->
  <div class=\"row\">
    <div class=\"col-lg-7 mb-lg-0 mb-4\">
      <div class=\"card mb-4\">
        <div class=\"card-header pb-0\">
          <h6>Répartition des utilisateurs</h6>
        </div>
        <div class=\"card-body p-3\">
          <div class=\"chart\">
            <canvas id=\"userRoleChart\" class=\"chart-canvas\" height=\"300\"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class=\"col-lg-5\">
      <div class=\"card mb-4\">
        <div class=\"card-header pb-0\">
          <h6>Activité des utilisateurs</h6>
        </div>
        <div class=\"card-body p-3\">
          <div class=\"timeline timeline-one-side\">
            {% for activity in recentActivities %}
              <div class=\"timeline-block mb-3\">
                <span class=\"timeline-step\">
                  <i class=\"{{ activity.icon }}\"></i>
                </span>
                <div class=\"timeline-content\">
                  <h6 class=\"text-dark text-sm font-weight-bold mb-0\">{{ activity.description }}</h6>
                  <p class=\"text-secondary font-weight-bold text-xs mt-1 mb-0\">Il y a {{ activity.date|date(\"d\") == \"now\"|date(\"d\") ? activity.date|date(\"G\") ~ ' heures' : activity.date|date(\"d/m/Y\") }}</p>
                </div>
              </div>
            {% endfor %}
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Footer -->
  <footer class=\"footer pt-3\">
    <div class=\"container-fluid\">
      <div class=\"row align-items-center justify-content-lg-between\">
        <div class=\"col-lg-6 mb-lg-0 mb-4\">
          <div class=\"copyright text-center text-sm text-muted text-lg-start\">
            © {{ \"now\"|date(\"Y\") }} Airmess
          </div>
        </div>
      </div>
    </div>
  </footer>
</div>

<!-- Modals -->
<!-- Modal Ajouter Utilisateur -->
<div class=\"modal fade\" id=\"addUserModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"addUserModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\" id=\"addUserModalLabel\">Ajouter un utilisateur</h5>
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
      </div>
      <div class=\"modal-body\">
        <form id=\"addUserForm\" action=\"{{ path('admin_user_add') }}\">
          <div class=\"mb-3\">
            <label for=\"name\" class=\"form-label\">Nom</label>
            <input type=\"text\" class=\"form-control\" id=\"name\" required>
          </div>
          <div class=\"mb-3\">
            <label for=\"prenom\" class=\"form-label\">Prénom</label>
            <input type=\"text\" class=\"form-control\" id=\"prenom\" required>
          </div>
          <div class=\"mb-3\">
            <label for=\"email\" class=\"form-label\">Email</label>
            <input type=\"email\" class=\"form-control\" id=\"email\" required>
          </div>
          <div class=\"mb-3\">
            <label for=\"password\" class=\"form-label\">Mot de passe</label>
            <input type=\"password\" class=\"form-control\" id=\"password\" required>
          </div>
          <div class=\"mb-3\">
            <label for=\"phone\" class=\"form-label\">Téléphone</label>
            <input type=\"tel\" class=\"form-control\" id=\"phone\">
          </div>
          <div class=\"mb-3\">
            <label for=\"role\" class=\"form-label\">Rôle</label>
            <select class=\"form-select\" id=\"role\" required>
              <option value=\"Voyageurs\">Voyageurs</option>
              <option value=\"Entreprise\">Entreprise</option>
              <option value=\"Admin\">Admin</option>
            </select>
          </div>
          <div class=\"mb-3\">
            <label for=\"photo\" class=\"form-label\">Photo de profil</label>
            <input type=\"file\" class=\"form-control\" id=\"photo\" accept=\"image/*\">
          </div>
        </form>
      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn bg-gradient-secondary\" data-bs-dismiss=\"modal\">Annuler</button>
        <button type=\"button\" class=\"btn bg-gradient-primary\" id=\"saveNewUser\">Enregistrer</button>
      </div>
    </div>
  </div>
</div>

<!-- Modals d'édition pour chaque utilisateur -->
{% for user in users %}
<div class=\"modal fade\" id=\"editUserModal{{ user.idU }}\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"editUserModalLabel{{ user.idU }}\" aria-hidden=\"true\">
  <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\" id=\"editUserModalLabel{{ user.idU }}\">Modifier l'utilisateur</h5>
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
      </div>
      <div class=\"modal-body\">
        <form id=\"editUserForm{{ user.idU }}\" action=\"{{ path('admin_user_edit', {'id': user.idU}) }}\">
          <input type=\"hidden\" id=\"editUserId{{ user.idU }}\" value=\"{{ user.idU }}\">
          <div class=\"mb-3\">
            <label for=\"editName{{ user.idU }}\" class=\"form-label\">Nom</label>
            <input type=\"text\" class=\"form-control\" id=\"editName{{ user.idU }}\" value=\"{{ user.name }}\" required>
          </div>
          <div class=\"mb-3\">
            <label for=\"editPrenom{{ user.idU }}\" class=\"form-label\">Prénom</label>
            <input type=\"text\" class=\"form-control\" id=\"editPrenom{{ user.idU }}\" value=\"{{ user.prenom }}\" required>
          </div>
          <div class=\"mb-3\">
            <label for=\"editEmail{{ user.idU }}\" class=\"form-label\">Email</label>
            <input type=\"email\" class=\"form-control\" id=\"editEmail{{ user.idU }}\" value=\"{{ user.email }}\" required>
          </div>
          <div class=\"mb-3\">
            <label for=\"editPhone{{ user.idU }}\" class=\"form-label\">Téléphone</label>
            <input type=\"tel\" class=\"form-control\" id=\"editPhone{{ user.idU }}\" value=\"{{ user.phoneNumber }}\">
          </div>
          <div class=\"mb-3\">
            <label for=\"editRole{{ user.idU }}\" class=\"form-label\">Rôle</label>
            <select class=\"form-select\" id=\"editRole{{ user.idU }}\">
              <option value=\"Voyageurs\" {% if user.roleUser == 'Voyageurs' %}selected{% endif %}>Voyageurs</option>
              <option value=\"Entreprise\" {% if user.roleUser == 'Entreprise' %}selected{% endif %}>Entreprise</option>
              <option value=\"Admin\" {% if user.roleUser == 'Admin' %}selected{% endif %}>Admin</option>
            </select>
          </div>
          <div class=\"mb-3\">
            <label for=\"editStatus{{ user.idU }}\" class=\"form-label\">Statut</label>
            <select class=\"form-select\" id=\"editStatus{{ user.idU }}\">
              <option value=\"actif\" {% if user.statut == 'actif' or user.statut == 'active' %}selected{% endif %}>Actif</option>
              <option value=\"inactif\" {% if user.statut == 'inactif' or user.statut == 'inactive' %}selected{% endif %}>Inactif</option>
            </select>
          </div>
          <div class=\"mb-3\">
            <label for=\"editPhoto{{ user.idU }}\" class=\"form-label\">Photo de profil</label>
            <div class=\"d-flex align-items-center\">
              <img src=\"{{ asset('images/users/' ~ user.imagesU) }}\" alt=\"Photo de profil actuelle\" 
                  class=\"avatar avatar-md me-3\" style=\"width: 60px; height: 60px;\" onerror=\"handleImageError(this)\">
              <input type=\"file\" class=\"form-control\" id=\"editPhoto{{ user.idU }}\" accept=\"image/*\">
            </div>
            <small class=\"text-muted\">Laissez vide pour conserver la photo actuelle</small>
          </div>
        </form>
      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn bg-gradient-secondary\" data-bs-dismiss=\"modal\">Annuler</button>
        <button type=\"button\" class=\"btn bg-gradient-primary\" id=\"saveEditUser-{{ user.idU }}\" onclick=\"saveUser({{ user.idU }})\">Enregistrer</button>
      </div>
    </div>
  </div>
</div>
{% endfor %}

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Setup pour le graphique de répartition des utilisateurs
  var ctx = document.getElementById('userRoleChart').getContext('2d');
  var userRoleChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ['Voyageurs', 'Entreprise', 'Admin'],
      datasets: [{
        label: 'Utilisateurs par rôle',
        data: [
          {{ usersByRole.Voyageurs }}, 
          {{ usersByRole.Entreprise }}, 
          {{ usersByRole.Admin }}
        ],
        backgroundColor: [
          'rgba(94, 114, 228, 0.8)',
          'rgba(233, 196, 106, 0.8)',
          'rgba(92, 184, 92, 0.8)'
        ],
        borderColor: [
          'rgba(94, 114, 228, 1)',
          'rgba(233, 196, 106, 1)',
          'rgba(92, 184, 92, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          position: 'bottom'
        }
      }
    }
  });
  
  // Fonction de recherche utilisateur
  document.getElementById('searchInput').addEventListener('keyup', function() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById('searchInput');
    filter = input.value.toUpperCase();
    table = document.getElementById('usersTable');
    tr = table.getElementsByTagName('tr');
    
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName('td')[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = '';
        } else {
          tr[i].style.display = 'none';
        }
      }
    }
  });
  
  // Filtrage des utilisateurs
  document.getElementById('applyFilters').addEventListener('click', function() {
    var roleFilter = document.getElementById('roleFilter').value.toUpperCase();
    var statusFilter = document.getElementById('statusFilter').value.toUpperCase();
    
    var table = document.getElementById('usersTable');
    var tr = table.getElementsByTagName('tr');
    
    for (var i = 1; i < tr.length; i++) {
      var roleCell = tr[i].getElementsByTagName('td')[1];
      var statusCell = tr[i].getElementsByTagName('td')[2];
      
      if (roleCell && statusCell) {
        var roleValue = roleCell.textContent || roleCell.innerText;
        var statusValue = statusCell.textContent || statusCell.innerText;
        
        var roleMatch = roleFilter === '' || roleValue.toUpperCase().indexOf(roleFilter) > -1;
        var statusMatch = statusFilter === '' || statusValue.toUpperCase().indexOf(statusFilter) > -1;
        
        if (roleMatch && statusMatch) {
          tr[i].style.display = '';
        } else {
          tr[i].style.display = 'none';
        }
      }
    }
  });
  
  // Réinitialiser les filtres
  document.getElementById('resetFilters').addEventListener('click', function() {
    document.getElementById('roleFilter').value = '';
    document.getElementById('statusFilter').value = '';
    
    var table = document.getElementById('usersTable');
    var tr = table.getElementsByTagName('tr');
    
    for (var i = 1; i < tr.length; i++) {
      tr[i].style.display = '';
    }
  });
  
  // Enregistrement d'un nouvel utilisateur
  document.getElementById('saveNewUser').addEventListener('click', function() {
    var name = document.getElementById('name').value;
    var prenom = document.getElementById('prenom').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var phone = document.getElementById('phone').value;
    var role = document.getElementById('role').value;
    var photoInput = document.getElementById('photo');
    
    if (!name || !prenom || !email || !password) {
      alert('Veuillez remplir tous les champs obligatoires');
      return;
    }
    
    // Use FormData for file uploads
    var formData = new FormData();
    formData.append('name', name);
    formData.append('prenom', prenom);
    formData.append('email', email);
    formData.append('password', password);
    formData.append('phone', phone);
    formData.append('role', role);
    
    // Add photo if selected
    if (photoInput && photoInput.files.length > 0) {
      formData.append('photo', photoInput.files[0]);
    }
    
    fetch('{{ path('admin_user_add') }}', {
      method: 'POST',
      headers: {
        'X-Requested-With': 'XMLHttpRequest'
      },
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        alert('Utilisateur créé avec succès');
        // Reload page to see the new user, staying on current page
        window.location.href = '{{ path('user_page', {'page': currentPage}) }}';
      } else {
        alert('Erreur: ' + data.message);
      }
    })
    .catch(error => {
      console.error('Error:', error);
      alert('Une erreur est survenue');
    });
  });

  // Fonction pour activer tous les utilisateurs
  document.getElementById('activateAllButton').addEventListener('click', function() {
    if (confirm(\"Êtes-vous sûr de vouloir activer tous les utilisateurs?\")) {
      fetch('{{ path('admin_activate_all_users') }}', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-Requested-With': 'XMLHttpRequest'
        }
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          alert('Tous les utilisateurs ont été activés avec succès');
          // Reload page to update the user list
          window.location.href = '{{ path('user_page', {'page': currentPage}) }}';
        } else {
          alert('Erreur lors de l\\'activation des utilisateurs: ' + data.message);
        }
      })
      .catch(error => {
        console.error('Error:', error);
        alert('Une erreur est survenue lors de l\\'activation des utilisateurs');
      });
    }
  });
});

// Fonction de confirmation de suppression
function confirmDelete(userId) {
  if (confirm(\"Êtes-vous sûr de vouloir désactiver cet utilisateur ?\")) {
    const deletePath = document.getElementById('usersTable').dataset.deletePath.replace('/0', '/' + userId);
    
    fetch(deletePath, {
      method: 'POST',
      headers: {
        'X-Requested-With': 'XMLHttpRequest'
      }
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        alert('Utilisateur désactivé avec succès');
        // Reload page to update the user list, keeping the current page
        window.location.href = '{{ path('user_page', {'page': currentPage}) }}';
      } else {
        alert('Erreur lors de la désactivation');
      }
    })
    .catch(error => {
      console.error('Error:', error);
      alert('Une erreur est survenue');
    });
  }
}

// Fonction pour enregistrer les modifications d'un utilisateur
function saveUser(userId) {
  var name = document.getElementById('editName' + userId).value;
  var prenom = document.getElementById('editPrenom' + userId).value;
  var email = document.getElementById('editEmail' + userId).value;
  var phone = document.getElementById('editPhone' + userId).value;
  var role = document.getElementById('editRole' + userId).value;
  var status = document.getElementById('editStatus' + userId).value;
  var photoInput = document.getElementById('editPhoto' + userId);
  
  if (!name || !prenom || !email) {
    alert('Veuillez remplir tous les champs obligatoires');
    return;
  }
  
  // Prepare form data for multipart/form-data (file upload)
  var formData = new FormData();
  formData.append('name', name);
  formData.append('prenom', prenom);
  formData.append('email', email);
  formData.append('phone', phone);
  formData.append('role', role);
  formData.append('status', status);
  
  // Add the file if one was selected
  if (photoInput.files.length > 0) {
    formData.append('photo', photoInput.files[0]);
  }
  
  const editPath = document.getElementById('usersTable').dataset.editPath.replace('/0', '/' + userId);
  
  fetch(editPath, {
    method: 'POST',
    headers: {
      'X-Requested-With': 'XMLHttpRequest'
    },
    body: formData
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      alert('Utilisateur modifié avec succès');
      // Reload page to see the updated user, keeping the current page
      window.location.href = '{{ path('user_page', {'page': currentPage}) }}';
    } else {
      alert('Erreur: ' + data.message);
    }
  })
  .catch(error => {
    console.error('Error:', error);
    alert('Une erreur est survenue');
  });
}
</script>
{% endblock %}", "dashAdmin/userPage.html.twig", "C:\\Users\\MSI\\Desktop\\Airmess_Web\\templates\\dashAdmin\\userPage.html.twig");
    }
}
