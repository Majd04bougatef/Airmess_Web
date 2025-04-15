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

/* dashAdmin/dashboardPage.html.twig */
class __TwigTemplate_915e102468b94af01b81de11c327ed4d extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashAdmin/dashboardPage.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashAdmin/dashboardPage.html.twig"));

        $this->parent = $this->loadTemplate("dashAdmin/dashboard.html.twig", "dashAdmin/dashboardPage.html.twig", 1);
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

        yield "Dashboard Admin";
        
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
        <li class=\"breadcrumb-item text-sm text-white active\" aria-current=\"page\">Dashboard</li>
      </ol>
      <h6 class=\"font-weight-bolder text-white mb-0\">Dashboard Admin</h6>
    </nav>
    <div class=\"collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4\" id=\"navbar\">
      <div class=\"ms-md-auto pe-md-3 d-flex align-items-center\">
        <div class=\"input-group\">
          <span class=\"input-group-text text-body\"><i class=\"fas fa-search\" aria-hidden=\"true\"></i></span>
          <input type=\"text\" class=\"form-control\" placeholder=\"Type here...\">
        </div>
      </div>
      <ul class=\"navbar-nav justify-content-end\">
        <li class=\"nav-item dropdown pe-2 d-flex align-items-center\">
          <a href=\"javascript:;\" class=\"nav-link text-white p-0\" id=\"dropdownMenuButton\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
            <i class=\"fa fa-bell cursor-pointer\"></i>
            <span class=\"position-absolute top-5 start-100 translate-middle badge rounded-pill bg-danger\">
              3
            </span>
          </a>
          <ul class=\"dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4\" aria-labelledby=\"dropdownMenuButton\">
            <li class=\"mb-2\">
              <a class=\"dropdown-item border-radius-md\" href=\"javascript:;\">
                <div class=\"d-flex py-1\">
                  <div class=\"my-auto\">
                    <img src=\"";
        // line 35
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/user-avatar.svg"), "html", null, true);
        yield "\" class=\"avatar avatar-sm me-3\">
                  </div>
                  <div class=\"d-flex flex-column justify-content-center\">
                    <h6 class=\"text-sm font-weight-normal mb-1\">
                      <span class=\"font-weight-bold\">Nouvel utilisateur</span> inscrit
                    </h6>
                    <p class=\"text-xs text-secondary mb-0\">
                      <i class=\"fa fa-clock me-1\"></i>
                      Il y a 13 minutes
                    </p>
                  </div>
                </div>
              </a>
            </li>
            <li class=\"mb-2\">
              <a class=\"dropdown-item border-radius-md\" href=\"javascript:;\">
                <div class=\"d-flex py-1\">
                  <div class=\"my-auto\">
                    <img src=\"";
        // line 53
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/station-icon.png"), "html", null, true);
        yield "\" class=\"avatar avatar-sm me-3\">
                  </div>
                  <div class=\"d-flex flex-column justify-content-center\">
                    <h6 class=\"text-sm font-weight-normal mb-1\">
                      <span class=\"font-weight-bold\">Nouvelle station</span> ajoutée
                    </h6>
                    <p class=\"text-xs text-secondary mb-0\">
                      <i class=\"fa fa-clock me-1\"></i>
                      Il y a 1 jour
                    </p>
                  </div>
                </div>
              </a>
            </li>
            <li>
              <a class=\"dropdown-item border-radius-md\" href=\"javascript:;\">
                <div class=\"d-flex py-1\">
                  <div class=\"avatar avatar-sm bg-gradient-secondary me-3 my-auto\">
                    <i class=\"fa fa-exclamation-triangle text-white\"></i>
                  </div>
                  <div class=\"d-flex flex-column justify-content-center\">
                    <h6 class=\"text-sm font-weight-normal mb-1\">
                      Alerte système
                    </h6>
                    <p class=\"text-xs text-secondary mb-0\">
                      <i class=\"fa fa-clock me-1\"></i>
                      Il y a 2 jours
                    </p>
                  </div>
                </div>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class=\"container-fluid py-4\">
  <!-- System Overview Cards -->
  <div class=\"row\">
    <div class=\"col-xl-3 col-sm-6 mb-xl-0 mb-4\">
      <div class=\"card\">
        <div class=\"card-body p-3\">
          <div class=\"row\">
            <div class=\"col-8\">
              <div class=\"numbers\">
                <p class=\"text-sm mb-0 text-uppercase font-weight-bold\">Utilisateurs</p>
                <h5 class=\"font-weight-bolder\">
                  ";
        // line 103
        yield (((array_key_exists("userCount", $context) &&  !(null === $context["userCount"]))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["userCount"], "html", null, true)) : (245));
        yield "
                </h5>
                <p class=\"mb-0\">
                  <span class=\"text-success text-sm font-weight-bolder\">+5%</span>
                  cette semaine
                </p>
              </div>
            </div>
            <div class=\"col-4 text-end\">
              <div class=\"icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle\">
                <i class=\"ni ni-single-02 text-lg opacity-10\" aria-hidden=\"true\"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class=\"col-xl-3 col-sm-6 mb-xl-0 mb-4\">
      <div class=\"card\">
        <div class=\"card-body p-3\">
          <div class=\"row\">
            <div class=\"col-8\">
              <div class=\"numbers\">
                <p class=\"text-sm mb-0 text-uppercase font-weight-bold\">Stations</p>
                <h5 class=\"font-weight-bolder\">
                  ";
        // line 128
        yield (((array_key_exists("stationCount", $context) &&  !(null === $context["stationCount"]))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["stationCount"], "html", null, true)) : (32));
        yield "
                </h5>
                <p class=\"mb-0\">
                  <span class=\"text-success text-sm font-weight-bolder\">+12%</span>
                  ce mois
                </p>
              </div>
            </div>
            <div class=\"col-4 text-end\">
              <div class=\"icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle\">
                <i class=\"ni ni-world text-lg opacity-10\" aria-hidden=\"true\"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class=\"col-xl-3 col-sm-6 mb-xl-0 mb-4\">
      <div class=\"card\">
        <div class=\"card-body p-3\">
          <div class=\"row\">
            <div class=\"col-8\">
              <div class=\"numbers\">
                <p class=\"text-sm mb-0 text-uppercase font-weight-bold\">Réservations</p>
                <h5 class=\"font-weight-bolder\">
                  ";
        // line 153
        yield (((array_key_exists("reservationCount", $context) &&  !(null === $context["reservationCount"]))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["reservationCount"], "html", null, true)) : (143));
        yield "
                </h5>
                <p class=\"mb-0\">
                  <span class=\"text-success text-sm font-weight-bolder\">+8%</span>
                  cette semaine
                </p>
              </div>
            </div>
            <div class=\"col-4 text-end\">
              <div class=\"icon icon-shape bg-gradient-success shadow-success text-center rounded-circle\">
                <i class=\"ni ni-calendar-grid-58 text-lg opacity-10\" aria-hidden=\"true\"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class=\"col-xl-3 col-sm-6\">
      <div class=\"card\">
        <div class=\"card-body p-3\">
          <div class=\"row\">
            <div class=\"col-8\">
              <div class=\"numbers\">
                <p class=\"text-sm mb-0 text-uppercase font-weight-bold\">Offres</p>
                <h5 class=\"font-weight-bolder\">
                  ";
        // line 178
        yield (((array_key_exists("offerCount", $context) &&  !(null === $context["offerCount"]))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["offerCount"], "html", null, true)) : (28));
        yield "
                </h5>
                <p class=\"mb-0\">
                  <span class=\"text-success text-sm font-weight-bolder\">+15%</span> 
                  ce mois
                </p>
              </div>
            </div>
            <div class=\"col-4 text-end\">
              <div class=\"icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle\">
                <i class=\"ni ni-tag text-lg opacity-10\" aria-hidden=\"true\"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Admin Actions -->
  <div class=\"row mt-4\">
    <div class=\"col-lg-8 mb-lg-0 mb-4\">
      <div class=\"card\">
        <div class=\"card-header pb-0\">
          <h6>Actions rapides</h6>
        </div>
        <div class=\"card-body p-3\">
          <div class=\"row\">
            <div class=\"col-md-4 mb-3\">
              <a href=\"";
        // line 207
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("user_page");
        yield "\" class=\"btn btn-primary btn-lg w-100\">
                <i class=\"fas fa-user-plus me-2\"></i> Gérer utilisateurs
              </a>
            </div>
            <div class=\"col-md-4 mb-3\">
              <a href=\"";
        // line 212
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("station_page");
        yield "\" class=\"btn btn-success btn-lg w-100\">
                <i class=\"fas fa-bicycle me-2\"></i> Gérer stations
              </a>
            </div>
            <div class=\"col-md-4 mb-3\">
              <a href=\"";
        // line 217
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("bonplan_page");
        yield "\" class=\"btn btn-info btn-lg w-100\">
                <i class=\"fas fa-map-marker-alt me-2\"></i> Gérer bons plans
              </a>
            </div>
            <div class=\"col-md-6 mb-3\">
              <a href=\"";
        // line 222
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("offre_page");
        yield "\" class=\"btn btn-warning btn-lg w-100\">
                <i class=\"fas fa-gift me-2\"></i> Gérer offres
              </a>
            </div>
            <div class=\"col-md-6 mb-3\">
              <a href=\"";
        // line 227
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("social_page");
        yield "\" class=\"btn btn-danger btn-lg w-100\">
                <i class=\"fas fa-share-alt me-2\"></i> Gérer réseaux sociaux
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class=\"col-lg-4\">
      <div class=\"card h-100\">
        <div class=\"card-header pb-0\">
          <h6>Statistiques système</h6>
        </div>
        <div class=\"card-body p-3\">
          <div class=\"timeline timeline-one-side\">
            <div class=\"timeline-block mb-3\">
              <span class=\"timeline-step\">
                <i class=\"ni ni-bell-55 text-success\"></i>
              </span>
              <div class=\"timeline-content\">
                <h6 class=\"text-dark text-sm font-weight-bold mb-0\">Système en ligne</h6>
                <p class=\"text-secondary font-weight-bold text-xs mt-1 mb-0\">Uptime: 99.8%</p>
              </div>
            </div>
            <div class=\"timeline-block mb-3\">
              <span class=\"timeline-step\">
                <i class=\"ni ni-html5 text-danger\"></i>
              </span>
              <div class=\"timeline-content\">
                <h6 class=\"text-dark text-sm font-weight-bold mb-0\">Capacité serveur</h6>
                <p class=\"text-secondary font-weight-bold text-xs mt-1 mb-0\">CPU: 24%, RAM: 38%</p>
              </div>
            </div>
            <div class=\"timeline-block mb-3\">
              <span class=\"timeline-step\">
                <i class=\"ni ni-cart text-info\"></i>
              </span>
              <div class=\"timeline-content\">
                <h6 class=\"text-dark text-sm font-weight-bold mb-0\">Dernière sauvegarde</h6>
                <p class=\"text-secondary font-weight-bold text-xs mt-1 mb-0\">Il y a 2 heures</p>
              </div>
            </div>
            <div class=\"timeline-block\">
              <span class=\"timeline-step\">
                <i class=\"ni ni-check-bold text-primary\"></i>
              </span>
              <div class=\"timeline-content\">
                <h6 class=\"text-dark text-sm font-weight-bold mb-0\">Version du système</h6>
                <p class=\"text-secondary font-weight-bold text-xs mt-1 mb-0\">v1.2.4 (dernière MAJ: 03/05/2023)</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Recent Activity and User Demographics -->
  <div class=\"row mt-4\">
    <div class=\"col-lg-7 mb-lg-0 mb-4\">
      <div class=\"card z-index-2 h-100\">
        <div class=\"card-header pb-0 pt-3 bg-transparent\">
          <h6 class=\"text-capitalize\">Activité utilisateurs</h6>
          <p class=\"text-sm mb-0\">
            <i class=\"fa fa-arrow-up text-success\"></i>
            <span class=\"font-weight-bold\">12% plus</span> que le mois dernier
          </p>
        </div>
        <div class=\"card-body p-3\">
          <div class=\"chart\">
            <canvas id=\"chart-line\" class=\"chart-canvas\" height=\"300\"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class=\"col-lg-5\">
      <div class=\"card\">
        <div class=\"card-header pb-0 p-3\">
          <h6 class=\"mb-0\">Activité récente</h6>
        </div>
        <div class=\"card-body p-3\">
          <ul class=\"list-group\">
            <li class=\"list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg\">
              <div class=\"d-flex align-items-center\">
                <div class=\"icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center\">
                  <i class=\"ni ni-mobile-button text-white opacity-10\"></i>
                </div>
                <div class=\"d-flex flex-column\">
                  <h6 class=\"mb-1 text-dark text-sm\">Nouvelle réservation #2458</h6>
                  <span class=\"text-xs\">Il y a 28 minutes</span>
                </div>
              </div>
              <div class=\"d-flex\">
                <button class=\"btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto\"><i class=\"ni ni-bold-right\" aria-hidden=\"true\"></i></button>
              </div>
            </li>
            <li class=\"list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg\">
              <div class=\"d-flex align-items-center\">
                <div class=\"icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center\">
                  <i class=\"ni ni-tag text-white opacity-10\"></i>
                </div>
                <div class=\"d-flex flex-column\">
                  <h6 class=\"mb-1 text-dark text-sm\">Nouvelle offre créée</h6>
                  <span class=\"text-xs\">Il y a 2 heures</span>
                </div>
              </div>
              <div class=\"d-flex\">
                <button class=\"btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto\"><i class=\"ni ni-bold-right\" aria-hidden=\"true\"></i></button>
              </div>
            </li>
            <li class=\"list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg\">
              <div class=\"d-flex align-items-center\">
                <div class=\"icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center\">
                  <i class=\"ni ni-box-2 text-white opacity-10\"></i>
                </div>
                <div class=\"d-flex flex-column\">
                  <h6 class=\"mb-1 text-dark text-sm\">Nouvel utilisateur inscrit</h6>
                  <span class=\"text-xs\">Il y a 5 heures</span>
                </div>
              </div>
              <div class=\"d-flex\">
                <button class=\"btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto\"><i class=\"ni ni-bold-right\" aria-hidden=\"true\"></i></button>
              </div>
            </li>
            <li class=\"list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg\">
              <div class=\"d-flex align-items-center\">
                <div class=\"icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center\">
                  <i class=\"ni ni-satisfied text-white opacity-10\"></i>
                </div>
                <div class=\"d-flex flex-column\">
                  <h6 class=\"mb-1 text-dark text-sm\">Nouveau commentaire ajouté</h6>
                  <span class=\"text-xs\">Il y a 1 jour</span>
                </div>
              </div>
              <div class=\"d-flex\">
                <button class=\"btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto\"><i class=\"ni ni-bold-right\" aria-hidden=\"true\"></i></button>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  
  <!-- User Distribution and Usage Maps -->
  <div class=\"row mt-4\">
    <div class=\"col-lg-6 mb-lg-0 mb-4\">
      <div class=\"card\">
        <div class=\"card-header pb-0 p-3\">
          <div class=\"d-flex justify-content-between\">
            <h6 class=\"mb-2\">Distribution des utilisateurs</h6>
          </div>
        </div>
        <div class=\"table-responsive\">
          <table class=\"table align-items-center mb-0\">
            <thead>
              <tr>
                <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7\">Type d'utilisateur</th>
                <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2\">Nombre</th>
                <th class=\"text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7\">Pourcentage</th>
                <th class=\"text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7\">Évolution</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class=\"d-flex px-2 py-1\">
                    <div class=\"d-flex flex-column justify-content-center\">
                      <h6 class=\"mb-0 text-sm\">Voyageurs</h6>
                    </div>
                  </div>
                </td>
                <td>
                  <p class=\"text-xs font-weight-bold mb-0\">182</p>
                </td>
                <td class=\"align-middle text-center text-sm\">
                  <span class=\"text-secondary text-xs font-weight-bold\">74%</span>
                </td>
                <td class=\"align-middle text-center\">
                  <span class=\"text-success text-xs font-weight-bold\">+12%</span>
                </td>
              </tr>
              <tr>
                <td>
                  <div class=\"d-flex px-2 py-1\">
                    <div class=\"d-flex flex-column justify-content-center\">
                      <h6 class=\"mb-0 text-sm\">Entreprises</h6>
                    </div>
                  </div>
                </td>
                <td>
                  <p class=\"text-xs font-weight-bold mb-0\">56</p>
                </td>
                <td class=\"align-middle text-center text-sm\">
                  <span class=\"text-secondary text-xs font-weight-bold\">23%</span>
                </td>
                <td class=\"align-middle text-center\">
                  <span class=\"text-success text-xs font-weight-bold\">+7%</span>
                </td>
              </tr>
              <tr>
                <td>
                  <div class=\"d-flex px-2 py-1\">
                    <div class=\"d-flex flex-column justify-content-center\">
                      <h6 class=\"mb-0 text-sm\">Administrateurs</h6>
                    </div>
                  </div>
                </td>
                <td>
                  <p class=\"text-xs font-weight-bold mb-0\">7</p>
                </td>
                <td class=\"align-middle text-center text-sm\">
                  <span class=\"text-secondary text-xs font-weight-bold\">3%</span>
                </td>
                <td class=\"align-middle text-center\">
                  <span class=\"text-success text-xs font-weight-bold\">+1%</span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class=\"col-lg-6\">
      <div class=\"card h-100\">
        <div class=\"card-header pb-0 p-3\">
          <div class=\"d-flex justify-content-between\">
            <h6 class=\"mb-2\">État des stations</h6>
          </div>
        </div>
        <div class=\"card-body pt-2\">
          <div class=\"d-flex mb-3\">
            <div class=\"progress-wrapper w-100\">
              <div class=\"progress-info\">
                <div class=\"progress-percentage\">
                  <span class=\"text-xs font-weight-bold\">Disponibilité: 92%</span>
                </div>
              </div>
              <div class=\"progress\">
                <div class=\"progress-bar bg-gradient-success\" role=\"progressbar\" aria-valuenow=\"92\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 92%;\"></div>
              </div>
            </div>
          </div>
          <div class=\"d-flex mb-3\">
            <div class=\"progress-wrapper w-100\">
              <div class=\"progress-info\">
                <div class=\"progress-percentage\">
                  <span class=\"text-xs font-weight-bold\">Utilisation moyenne: 68%</span>
                </div>
              </div>
              <div class=\"progress\">
                <div class=\"progress-bar bg-gradient-info\" role=\"progressbar\" aria-valuenow=\"68\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 68%;\"></div>
              </div>
            </div>
          </div>
          <div class=\"d-flex mb-3\">
            <div class=\"progress-wrapper w-100\">
              <div class=\"progress-info\">
                <div class=\"progress-percentage\">
                  <span class=\"text-xs font-weight-bold\">Satisfaction client: 87%</span>
                </div>
              </div>
              <div class=\"progress\">
                <div class=\"progress-bar bg-gradient-primary\" role=\"progressbar\" aria-valuenow=\"87\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 87%;\"></div>
              </div>
            </div>
          </div>
          <div class=\"d-flex\">
            <div class=\"progress-wrapper w-100\">
              <div class=\"progress-info\">
                <div class=\"progress-percentage\">
                  <span class=\"text-xs font-weight-bold\">Maintenance à jour: 78%</span>
                </div>
              </div>
              <div class=\"progress\">
                <div class=\"progress-bar bg-gradient-warning\" role=\"progressbar\" aria-valuenow=\"78\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 78%;\"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <footer class=\"footer pt-3 mt-4\">
    <div class=\"container-fluid\">
      <div class=\"row align-items-center justify-content-lg-between\">
        <div class=\"col-lg-6 mb-lg-0 mb-4\">
          <div class=\"copyright text-center text-sm text-muted text-lg-start\">
            © ";
        // line 517
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y"), "html", null, true);
        yield " Airmess
          </div>
        </div>
      </div>
    </div>
  </footer>
</div>

<script>
  document.addEventListener(\"DOMContentLoaded\", function() {
    var ctx1 = document.getElementById(\"chart-line\").getContext(\"2d\");
    
    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);
    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    
    new Chart(ctx1, {
      type: \"line\",
      data: {
        labels: [\"Jan\", \"Feb\", \"Mar\", \"Apr\", \"Mai\", \"Jun\", \"Jul\", \"Aug\", \"Sep\", \"Oct\", \"Nov\", \"Dec\"],
        datasets: [{
          label: \"Utilisateurs actifs\",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: \"#5e72e4\",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: [50, 65, 75, 70, 90, 105, 120, 130, 145, 160, 175, 185],
          maxBarThickness: 6
        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#fbfbfb',
              font: {
                size: 11,
                family: \"Open Sans\",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#ccc',
              padding: 20,
              font: {
                size: 11,
                family: \"Open Sans\",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
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
        return "dashAdmin/dashboardPage.html.twig";
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
        return array (  646 => 517,  353 => 227,  345 => 222,  337 => 217,  329 => 212,  321 => 207,  289 => 178,  261 => 153,  233 => 128,  205 => 103,  152 => 53,  131 => 35,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'dashAdmin/dashboard.html.twig' %}

{% block title %}Dashboard Admin{% endblock %}

{% block content %}
<nav class=\"navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl \" id=\"navbarBlur\" data-scroll=\"false\">
  <div class=\"container-fluid py-1 px-3\">
    <nav aria-label=\"breadcrumb\">
      <ol class=\"breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5\">
        <li class=\"breadcrumb-item text-sm\"><a class=\"opacity-5 text-white\" href=\"javascript:;\">Pages</a></li>
        <li class=\"breadcrumb-item text-sm text-white active\" aria-current=\"page\">Dashboard</li>
      </ol>
      <h6 class=\"font-weight-bolder text-white mb-0\">Dashboard Admin</h6>
    </nav>
    <div class=\"collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4\" id=\"navbar\">
      <div class=\"ms-md-auto pe-md-3 d-flex align-items-center\">
        <div class=\"input-group\">
          <span class=\"input-group-text text-body\"><i class=\"fas fa-search\" aria-hidden=\"true\"></i></span>
          <input type=\"text\" class=\"form-control\" placeholder=\"Type here...\">
        </div>
      </div>
      <ul class=\"navbar-nav justify-content-end\">
        <li class=\"nav-item dropdown pe-2 d-flex align-items-center\">
          <a href=\"javascript:;\" class=\"nav-link text-white p-0\" id=\"dropdownMenuButton\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
            <i class=\"fa fa-bell cursor-pointer\"></i>
            <span class=\"position-absolute top-5 start-100 translate-middle badge rounded-pill bg-danger\">
              3
            </span>
          </a>
          <ul class=\"dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4\" aria-labelledby=\"dropdownMenuButton\">
            <li class=\"mb-2\">
              <a class=\"dropdown-item border-radius-md\" href=\"javascript:;\">
                <div class=\"d-flex py-1\">
                  <div class=\"my-auto\">
                    <img src=\"{{asset('images/user-avatar.svg')}}\" class=\"avatar avatar-sm me-3\">
                  </div>
                  <div class=\"d-flex flex-column justify-content-center\">
                    <h6 class=\"text-sm font-weight-normal mb-1\">
                      <span class=\"font-weight-bold\">Nouvel utilisateur</span> inscrit
                    </h6>
                    <p class=\"text-xs text-secondary mb-0\">
                      <i class=\"fa fa-clock me-1\"></i>
                      Il y a 13 minutes
                    </p>
                  </div>
                </div>
              </a>
            </li>
            <li class=\"mb-2\">
              <a class=\"dropdown-item border-radius-md\" href=\"javascript:;\">
                <div class=\"d-flex py-1\">
                  <div class=\"my-auto\">
                    <img src=\"{{asset('images/station-icon.png')}}\" class=\"avatar avatar-sm me-3\">
                  </div>
                  <div class=\"d-flex flex-column justify-content-center\">
                    <h6 class=\"text-sm font-weight-normal mb-1\">
                      <span class=\"font-weight-bold\">Nouvelle station</span> ajoutée
                    </h6>
                    <p class=\"text-xs text-secondary mb-0\">
                      <i class=\"fa fa-clock me-1\"></i>
                      Il y a 1 jour
                    </p>
                  </div>
                </div>
              </a>
            </li>
            <li>
              <a class=\"dropdown-item border-radius-md\" href=\"javascript:;\">
                <div class=\"d-flex py-1\">
                  <div class=\"avatar avatar-sm bg-gradient-secondary me-3 my-auto\">
                    <i class=\"fa fa-exclamation-triangle text-white\"></i>
                  </div>
                  <div class=\"d-flex flex-column justify-content-center\">
                    <h6 class=\"text-sm font-weight-normal mb-1\">
                      Alerte système
                    </h6>
                    <p class=\"text-xs text-secondary mb-0\">
                      <i class=\"fa fa-clock me-1\"></i>
                      Il y a 2 jours
                    </p>
                  </div>
                </div>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class=\"container-fluid py-4\">
  <!-- System Overview Cards -->
  <div class=\"row\">
    <div class=\"col-xl-3 col-sm-6 mb-xl-0 mb-4\">
      <div class=\"card\">
        <div class=\"card-body p-3\">
          <div class=\"row\">
            <div class=\"col-8\">
              <div class=\"numbers\">
                <p class=\"text-sm mb-0 text-uppercase font-weight-bold\">Utilisateurs</p>
                <h5 class=\"font-weight-bolder\">
                  {{ userCount ?? 245 }}
                </h5>
                <p class=\"mb-0\">
                  <span class=\"text-success text-sm font-weight-bolder\">+5%</span>
                  cette semaine
                </p>
              </div>
            </div>
            <div class=\"col-4 text-end\">
              <div class=\"icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle\">
                <i class=\"ni ni-single-02 text-lg opacity-10\" aria-hidden=\"true\"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class=\"col-xl-3 col-sm-6 mb-xl-0 mb-4\">
      <div class=\"card\">
        <div class=\"card-body p-3\">
          <div class=\"row\">
            <div class=\"col-8\">
              <div class=\"numbers\">
                <p class=\"text-sm mb-0 text-uppercase font-weight-bold\">Stations</p>
                <h5 class=\"font-weight-bolder\">
                  {{ stationCount ?? 32 }}
                </h5>
                <p class=\"mb-0\">
                  <span class=\"text-success text-sm font-weight-bolder\">+12%</span>
                  ce mois
                </p>
              </div>
            </div>
            <div class=\"col-4 text-end\">
              <div class=\"icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle\">
                <i class=\"ni ni-world text-lg opacity-10\" aria-hidden=\"true\"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class=\"col-xl-3 col-sm-6 mb-xl-0 mb-4\">
      <div class=\"card\">
        <div class=\"card-body p-3\">
          <div class=\"row\">
            <div class=\"col-8\">
              <div class=\"numbers\">
                <p class=\"text-sm mb-0 text-uppercase font-weight-bold\">Réservations</p>
                <h5 class=\"font-weight-bolder\">
                  {{ reservationCount ?? 143 }}
                </h5>
                <p class=\"mb-0\">
                  <span class=\"text-success text-sm font-weight-bolder\">+8%</span>
                  cette semaine
                </p>
              </div>
            </div>
            <div class=\"col-4 text-end\">
              <div class=\"icon icon-shape bg-gradient-success shadow-success text-center rounded-circle\">
                <i class=\"ni ni-calendar-grid-58 text-lg opacity-10\" aria-hidden=\"true\"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class=\"col-xl-3 col-sm-6\">
      <div class=\"card\">
        <div class=\"card-body p-3\">
          <div class=\"row\">
            <div class=\"col-8\">
              <div class=\"numbers\">
                <p class=\"text-sm mb-0 text-uppercase font-weight-bold\">Offres</p>
                <h5 class=\"font-weight-bolder\">
                  {{ offerCount ?? 28 }}
                </h5>
                <p class=\"mb-0\">
                  <span class=\"text-success text-sm font-weight-bolder\">+15%</span> 
                  ce mois
                </p>
              </div>
            </div>
            <div class=\"col-4 text-end\">
              <div class=\"icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle\">
                <i class=\"ni ni-tag text-lg opacity-10\" aria-hidden=\"true\"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Admin Actions -->
  <div class=\"row mt-4\">
    <div class=\"col-lg-8 mb-lg-0 mb-4\">
      <div class=\"card\">
        <div class=\"card-header pb-0\">
          <h6>Actions rapides</h6>
        </div>
        <div class=\"card-body p-3\">
          <div class=\"row\">
            <div class=\"col-md-4 mb-3\">
              <a href=\"{{ path('user_page') }}\" class=\"btn btn-primary btn-lg w-100\">
                <i class=\"fas fa-user-plus me-2\"></i> Gérer utilisateurs
              </a>
            </div>
            <div class=\"col-md-4 mb-3\">
              <a href=\"{{ path('station_page') }}\" class=\"btn btn-success btn-lg w-100\">
                <i class=\"fas fa-bicycle me-2\"></i> Gérer stations
              </a>
            </div>
            <div class=\"col-md-4 mb-3\">
              <a href=\"{{ path('bonplan_page') }}\" class=\"btn btn-info btn-lg w-100\">
                <i class=\"fas fa-map-marker-alt me-2\"></i> Gérer bons plans
              </a>
            </div>
            <div class=\"col-md-6 mb-3\">
              <a href=\"{{ path('offre_page') }}\" class=\"btn btn-warning btn-lg w-100\">
                <i class=\"fas fa-gift me-2\"></i> Gérer offres
              </a>
            </div>
            <div class=\"col-md-6 mb-3\">
              <a href=\"{{ path('social_page') }}\" class=\"btn btn-danger btn-lg w-100\">
                <i class=\"fas fa-share-alt me-2\"></i> Gérer réseaux sociaux
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class=\"col-lg-4\">
      <div class=\"card h-100\">
        <div class=\"card-header pb-0\">
          <h6>Statistiques système</h6>
        </div>
        <div class=\"card-body p-3\">
          <div class=\"timeline timeline-one-side\">
            <div class=\"timeline-block mb-3\">
              <span class=\"timeline-step\">
                <i class=\"ni ni-bell-55 text-success\"></i>
              </span>
              <div class=\"timeline-content\">
                <h6 class=\"text-dark text-sm font-weight-bold mb-0\">Système en ligne</h6>
                <p class=\"text-secondary font-weight-bold text-xs mt-1 mb-0\">Uptime: 99.8%</p>
              </div>
            </div>
            <div class=\"timeline-block mb-3\">
              <span class=\"timeline-step\">
                <i class=\"ni ni-html5 text-danger\"></i>
              </span>
              <div class=\"timeline-content\">
                <h6 class=\"text-dark text-sm font-weight-bold mb-0\">Capacité serveur</h6>
                <p class=\"text-secondary font-weight-bold text-xs mt-1 mb-0\">CPU: 24%, RAM: 38%</p>
              </div>
            </div>
            <div class=\"timeline-block mb-3\">
              <span class=\"timeline-step\">
                <i class=\"ni ni-cart text-info\"></i>
              </span>
              <div class=\"timeline-content\">
                <h6 class=\"text-dark text-sm font-weight-bold mb-0\">Dernière sauvegarde</h6>
                <p class=\"text-secondary font-weight-bold text-xs mt-1 mb-0\">Il y a 2 heures</p>
              </div>
            </div>
            <div class=\"timeline-block\">
              <span class=\"timeline-step\">
                <i class=\"ni ni-check-bold text-primary\"></i>
              </span>
              <div class=\"timeline-content\">
                <h6 class=\"text-dark text-sm font-weight-bold mb-0\">Version du système</h6>
                <p class=\"text-secondary font-weight-bold text-xs mt-1 mb-0\">v1.2.4 (dernière MAJ: 03/05/2023)</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Recent Activity and User Demographics -->
  <div class=\"row mt-4\">
    <div class=\"col-lg-7 mb-lg-0 mb-4\">
      <div class=\"card z-index-2 h-100\">
        <div class=\"card-header pb-0 pt-3 bg-transparent\">
          <h6 class=\"text-capitalize\">Activité utilisateurs</h6>
          <p class=\"text-sm mb-0\">
            <i class=\"fa fa-arrow-up text-success\"></i>
            <span class=\"font-weight-bold\">12% plus</span> que le mois dernier
          </p>
        </div>
        <div class=\"card-body p-3\">
          <div class=\"chart\">
            <canvas id=\"chart-line\" class=\"chart-canvas\" height=\"300\"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class=\"col-lg-5\">
      <div class=\"card\">
        <div class=\"card-header pb-0 p-3\">
          <h6 class=\"mb-0\">Activité récente</h6>
        </div>
        <div class=\"card-body p-3\">
          <ul class=\"list-group\">
            <li class=\"list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg\">
              <div class=\"d-flex align-items-center\">
                <div class=\"icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center\">
                  <i class=\"ni ni-mobile-button text-white opacity-10\"></i>
                </div>
                <div class=\"d-flex flex-column\">
                  <h6 class=\"mb-1 text-dark text-sm\">Nouvelle réservation #2458</h6>
                  <span class=\"text-xs\">Il y a 28 minutes</span>
                </div>
              </div>
              <div class=\"d-flex\">
                <button class=\"btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto\"><i class=\"ni ni-bold-right\" aria-hidden=\"true\"></i></button>
              </div>
            </li>
            <li class=\"list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg\">
              <div class=\"d-flex align-items-center\">
                <div class=\"icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center\">
                  <i class=\"ni ni-tag text-white opacity-10\"></i>
                </div>
                <div class=\"d-flex flex-column\">
                  <h6 class=\"mb-1 text-dark text-sm\">Nouvelle offre créée</h6>
                  <span class=\"text-xs\">Il y a 2 heures</span>
                </div>
              </div>
              <div class=\"d-flex\">
                <button class=\"btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto\"><i class=\"ni ni-bold-right\" aria-hidden=\"true\"></i></button>
              </div>
            </li>
            <li class=\"list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg\">
              <div class=\"d-flex align-items-center\">
                <div class=\"icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center\">
                  <i class=\"ni ni-box-2 text-white opacity-10\"></i>
                </div>
                <div class=\"d-flex flex-column\">
                  <h6 class=\"mb-1 text-dark text-sm\">Nouvel utilisateur inscrit</h6>
                  <span class=\"text-xs\">Il y a 5 heures</span>
                </div>
              </div>
              <div class=\"d-flex\">
                <button class=\"btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto\"><i class=\"ni ni-bold-right\" aria-hidden=\"true\"></i></button>
              </div>
            </li>
            <li class=\"list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg\">
              <div class=\"d-flex align-items-center\">
                <div class=\"icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center\">
                  <i class=\"ni ni-satisfied text-white opacity-10\"></i>
                </div>
                <div class=\"d-flex flex-column\">
                  <h6 class=\"mb-1 text-dark text-sm\">Nouveau commentaire ajouté</h6>
                  <span class=\"text-xs\">Il y a 1 jour</span>
                </div>
              </div>
              <div class=\"d-flex\">
                <button class=\"btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto\"><i class=\"ni ni-bold-right\" aria-hidden=\"true\"></i></button>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  
  <!-- User Distribution and Usage Maps -->
  <div class=\"row mt-4\">
    <div class=\"col-lg-6 mb-lg-0 mb-4\">
      <div class=\"card\">
        <div class=\"card-header pb-0 p-3\">
          <div class=\"d-flex justify-content-between\">
            <h6 class=\"mb-2\">Distribution des utilisateurs</h6>
          </div>
        </div>
        <div class=\"table-responsive\">
          <table class=\"table align-items-center mb-0\">
            <thead>
              <tr>
                <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7\">Type d'utilisateur</th>
                <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2\">Nombre</th>
                <th class=\"text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7\">Pourcentage</th>
                <th class=\"text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7\">Évolution</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class=\"d-flex px-2 py-1\">
                    <div class=\"d-flex flex-column justify-content-center\">
                      <h6 class=\"mb-0 text-sm\">Voyageurs</h6>
                    </div>
                  </div>
                </td>
                <td>
                  <p class=\"text-xs font-weight-bold mb-0\">182</p>
                </td>
                <td class=\"align-middle text-center text-sm\">
                  <span class=\"text-secondary text-xs font-weight-bold\">74%</span>
                </td>
                <td class=\"align-middle text-center\">
                  <span class=\"text-success text-xs font-weight-bold\">+12%</span>
                </td>
              </tr>
              <tr>
                <td>
                  <div class=\"d-flex px-2 py-1\">
                    <div class=\"d-flex flex-column justify-content-center\">
                      <h6 class=\"mb-0 text-sm\">Entreprises</h6>
                    </div>
                  </div>
                </td>
                <td>
                  <p class=\"text-xs font-weight-bold mb-0\">56</p>
                </td>
                <td class=\"align-middle text-center text-sm\">
                  <span class=\"text-secondary text-xs font-weight-bold\">23%</span>
                </td>
                <td class=\"align-middle text-center\">
                  <span class=\"text-success text-xs font-weight-bold\">+7%</span>
                </td>
              </tr>
              <tr>
                <td>
                  <div class=\"d-flex px-2 py-1\">
                    <div class=\"d-flex flex-column justify-content-center\">
                      <h6 class=\"mb-0 text-sm\">Administrateurs</h6>
                    </div>
                  </div>
                </td>
                <td>
                  <p class=\"text-xs font-weight-bold mb-0\">7</p>
                </td>
                <td class=\"align-middle text-center text-sm\">
                  <span class=\"text-secondary text-xs font-weight-bold\">3%</span>
                </td>
                <td class=\"align-middle text-center\">
                  <span class=\"text-success text-xs font-weight-bold\">+1%</span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class=\"col-lg-6\">
      <div class=\"card h-100\">
        <div class=\"card-header pb-0 p-3\">
          <div class=\"d-flex justify-content-between\">
            <h6 class=\"mb-2\">État des stations</h6>
          </div>
        </div>
        <div class=\"card-body pt-2\">
          <div class=\"d-flex mb-3\">
            <div class=\"progress-wrapper w-100\">
              <div class=\"progress-info\">
                <div class=\"progress-percentage\">
                  <span class=\"text-xs font-weight-bold\">Disponibilité: 92%</span>
                </div>
              </div>
              <div class=\"progress\">
                <div class=\"progress-bar bg-gradient-success\" role=\"progressbar\" aria-valuenow=\"92\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 92%;\"></div>
              </div>
            </div>
          </div>
          <div class=\"d-flex mb-3\">
            <div class=\"progress-wrapper w-100\">
              <div class=\"progress-info\">
                <div class=\"progress-percentage\">
                  <span class=\"text-xs font-weight-bold\">Utilisation moyenne: 68%</span>
                </div>
              </div>
              <div class=\"progress\">
                <div class=\"progress-bar bg-gradient-info\" role=\"progressbar\" aria-valuenow=\"68\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 68%;\"></div>
              </div>
            </div>
          </div>
          <div class=\"d-flex mb-3\">
            <div class=\"progress-wrapper w-100\">
              <div class=\"progress-info\">
                <div class=\"progress-percentage\">
                  <span class=\"text-xs font-weight-bold\">Satisfaction client: 87%</span>
                </div>
              </div>
              <div class=\"progress\">
                <div class=\"progress-bar bg-gradient-primary\" role=\"progressbar\" aria-valuenow=\"87\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 87%;\"></div>
              </div>
            </div>
          </div>
          <div class=\"d-flex\">
            <div class=\"progress-wrapper w-100\">
              <div class=\"progress-info\">
                <div class=\"progress-percentage\">
                  <span class=\"text-xs font-weight-bold\">Maintenance à jour: 78%</span>
                </div>
              </div>
              <div class=\"progress\">
                <div class=\"progress-bar bg-gradient-warning\" role=\"progressbar\" aria-valuenow=\"78\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 78%;\"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <footer class=\"footer pt-3 mt-4\">
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

<script>
  document.addEventListener(\"DOMContentLoaded\", function() {
    var ctx1 = document.getElementById(\"chart-line\").getContext(\"2d\");
    
    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);
    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    
    new Chart(ctx1, {
      type: \"line\",
      data: {
        labels: [\"Jan\", \"Feb\", \"Mar\", \"Apr\", \"Mai\", \"Jun\", \"Jul\", \"Aug\", \"Sep\", \"Oct\", \"Nov\", \"Dec\"],
        datasets: [{
          label: \"Utilisateurs actifs\",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: \"#5e72e4\",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: [50, 65, 75, 70, 90, 105, 120, 130, 145, 160, 175, 185],
          maxBarThickness: 6
        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#fbfbfb',
              font: {
                size: 11,
                family: \"Open Sans\",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#ccc',
              padding: 20,
              font: {
                size: 11,
                family: \"Open Sans\",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  });
</script>
{% endblock %}", "dashAdmin/dashboardPage.html.twig", "C:\\Users\\MSI\\Desktop\\Airmess_Web\\templates\\dashAdmin\\dashboardPage.html.twig");
    }
}
