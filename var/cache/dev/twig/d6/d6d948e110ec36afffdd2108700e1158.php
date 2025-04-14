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

/* reservation_transport/index.html.twig */
class __TwigTemplate_bfb6351b7e9567b4a75604138fb1c1fc extends Template
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
            'js' => [$this, 'block_js'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "reservation_transport/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "reservation_transport/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "reservation_transport/index.html.twig", 1);
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

        yield "Airmess";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 4
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_js(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 5
        yield "

<script src=\"../assets/js/core/popper.min.js\"></script>
  <script src=\"../assets/js/core/bootstrap.min.js\"></script>
  <script src=\"../assets/js/plugins/perfect-scrollbar.min.js\"></script>
  <script src=\"../assets/js/plugins/smooth-scrollbar.min.js\"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src=\"https://buttons.github.io/buttons.js\"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src=\"../assets/js/argon-dashboard.min.js?v=2.1.0\"></script>
    <script src=\"https://kit.fontawesome.com/42d5adcbca.js\" crossorigin=\"anonymous\"></script>

";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 27
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

        // line 28
        yield "<link href=\"https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700\" rel=\"stylesheet\" />
  <!-- Nucleo Icons -->
  <link href=\"https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css\" rel=\"stylesheet\" />
  <link href=\"https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css\" rel=\"stylesheet\" />
  <!-- Font Awesome Icons -->
  <!-- CSS Files -->
  <link id=\"pagestyle\" href=\"../assets/css/argon-dashboard.css?v=2.1.0\" rel=\"stylesheet\" />
  <link href=\"//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css\" rel=\"stylesheet\" id=\"bootstrap-css\">

  ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 38
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

        // line 39
        yield "
<style>
      body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .navbar {
            display: flex;
            background: #ffffff;
            padding: 10px;
            justify-content: center;
            gap: 20px;
            margin: 20px auto; /* Centrer la navbar */
            width: 90%;
            max-width: 1200px; /* Facultatif : limite la largeur maximale */
            border-radius: 10px; /* Pour un effet arrondi si nécessaire */
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Ajoute une légère ombre pour un effet visuel */
        }

        .navbar a {
            color: black; /* Couleur de texte initiale */
            text-decoration: none;
            padding: 10px 15px;
            font-weight: bold;
            cursor: pointer;
        }

        .navbar .nav-link:hover {
            color: #6c99bc;
                border-bottom: 2px solid #6c99bc; /* Ajouter une ligne sous le lien */
        }

        /* Zone de contenu */
        .content {
            padding: 20px;
            text-align: center;
        }
    </style>
    <!-- Menu Horizontal -->
     <div class=\"navbar\">
        <a class=\"nav-link\" onclick=\"loadPage('";
        // line 80
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reservation_transport_station");
        yield "')\">Réserver</a>
        <a class=\"nav-link\" onclick=\"loadPage('";
        // line 81
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reservation_transport_index");
        yield "')\">Mes Réservations</a>
        <a class=\"nav-link\" onclick=\"loadPage('";
        // line 82
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reservation_transport_station");
        yield "')\">Stations</a>
        <a class=\"nav-link\" onclick=\"loadPage('";
        // line 83
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_message_voyageurs");
        yield "')\">Discussions</a>
    </div>

    <!-- Contenu Dynamique -->
    <div class=\"content\" id=\"pageContent\">
        <p>Bienvenue dans la gestion des vélos. Sélectionnez une option.</p>
    </div>

    <script>
    function loadPage(url) {
        fetch(url, { headers: { \"X-Requested-With\": \"XMLHttpRequest\" } })
            .then(response => response.text())
            .then(html => {
                document.getElementById('pageContent').innerHTML = html;
            })
            .catch(error => console.error('Erreur lors du chargement:', error));
    }

    function submitForm(form) {
        fetch(form.action, {
            method: form.method,
            body: new FormData(form),
            headers: { \"X-Requested-With\": \"XMLHttpRequest\" }
        })
        .then(response => response.text())
        .then(html => {
            document.getElementById('pageContent').innerHTML = html;
        })
        .catch(error => console.error('Erreur lors de l'envoi du formulaire:', error));
    }

        
    </script>

    <div class=\"container-fluid py-4\">
        <div class=\"row\">
            <div class=\"col-12\">
                <div class=\"card mb-4\">
                    <div class=\"card-header pb-0\">
                        <h6>Réservations</h6>
                    </div>
            <div class=\"card-body px-0 pt-0 pb-2\">
              <div class=\"table-responsive p-0\">
                <table class=\"table align-items-center justify-content-center mb-0\">
                  <thead>
                    <tr>
                        <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2\">Reference</th>
                        <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2\">dete Réservation</th>
                        <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2\">date fin </th>
                        <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2\">Prix</th>
                        <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2\">Nombre de vélo</th>
                        <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2\">Statut</th>
                        <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2\">actions</th>
                      <th></th>
                    </tr>
                  </thead>
                  
    
                  <tbody>
        ";
        // line 142
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["reservation_transports"]) || array_key_exists("reservation_transports", $context) ? $context["reservation_transports"] : (function () { throw new RuntimeError('Variable "reservation_transports" does not exist.', 142, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["reservation_transport"]) {
            // line 143
            yield "                    <tr>
                      
                      <td>
                        <p class=\"text-sm font-weight-bold mb-0\">";
            // line 146
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["reservation_transport"], "reference", [], "any", false, false, false, 146), "html", null, true);
            yield "</p>
                      </td>
                      <td>
                        <span class=\"text-xs font-weight-bold\">";
            // line 149
            yield ((CoreExtension::getAttribute($this->env, $this->source, $context["reservation_transport"], "dateRes", [], "any", false, false, false, 149)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["reservation_transport"], "dateRes", [], "any", false, false, false, 149), "Y-m-d H:i:s"), "html", null, true)) : (""));
            yield "</span>
                      </td>
                      <td>
                        <span class=\"text-xs font-weight-bold\">";
            // line 152
            yield ((CoreExtension::getAttribute($this->env, $this->source, $context["reservation_transport"], "dateFin", [], "any", false, false, false, 152)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["reservation_transport"], "dateFin", [], "any", false, false, false, 152), "Y-m-d H:i:s"), "html", null, true)) : (""));
            yield "</span>
                      </td>
                      <td>
                        <span class=\"text-xs font-weight-bold\">";
            // line 155
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["reservation_transport"], "prix", [], "any", false, false, false, 155), "html", null, true);
            yield "</span>
                      </td>

                      <td>
                        <span class=\"text-xs font-weight-bold\">";
            // line 159
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["reservation_transport"], "nombreVelo", [], "any", false, false, false, 159), "html", null, true);
            yield "</span>
                      </td>
                      <td>
                        <span class=\"text-xs font-weight-bold\">";
            // line 162
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["reservation_transport"], "statut", [], "any", false, false, false, 162), "html", null, true);
            yield "</span>
                      </td>

                

                      <td class=\"align-middle\">

                    <a href=\"";
            // line 169
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reservation_transport_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["reservation_transport"], "id", [], "any", false, false, false, 169)]), "html", null, true);
            yield "\">edit</a>
 
  <form method=\"post\" action=\"";
            // line 171
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reservation_transport_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["reservation_transport"], "id", [], "any", false, false, false, 171)]), "html", null, true);
            yield "\" style=\"display:inline;\">
    <input type=\"hidden\" name=\"_token\" value=\"";
            // line 172
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["reservation_transport"], "id", [], "any", false, false, false, 172))), "html", null, true);
            yield "\">
    <button type=\"submit\" class=\"btn btn-sm btn-danger\" onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer cette station ?');\">Supprimer</button>
  </form>
                    </tr>
                    
                   ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['reservation_transport'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 178
        yield "                  </tbody>
                </table>
              </div>
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
        return "reservation_transport/index.html.twig";
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
        return array (  368 => 178,  356 => 172,  352 => 171,  347 => 169,  337 => 162,  331 => 159,  324 => 155,  318 => 152,  312 => 149,  306 => 146,  301 => 143,  297 => 142,  235 => 83,  231 => 82,  227 => 81,  223 => 80,  180 => 39,  167 => 38,  147 => 28,  134 => 27,  102 => 5,  89 => 4,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Airmess{% endblock %}
{% block js %}


<script src=\"../assets/js/core/popper.min.js\"></script>
  <script src=\"../assets/js/core/bootstrap.min.js\"></script>
  <script src=\"../assets/js/plugins/perfect-scrollbar.min.js\"></script>
  <script src=\"../assets/js/plugins/smooth-scrollbar.min.js\"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src=\"https://buttons.github.io/buttons.js\"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src=\"../assets/js/argon-dashboard.min.js?v=2.1.0\"></script>
    <script src=\"https://kit.fontawesome.com/42d5adcbca.js\" crossorigin=\"anonymous\"></script>

{% endblock %}
{% block stylesheets %}
<link href=\"https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700\" rel=\"stylesheet\" />
  <!-- Nucleo Icons -->
  <link href=\"https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css\" rel=\"stylesheet\" />
  <link href=\"https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css\" rel=\"stylesheet\" />
  <!-- Font Awesome Icons -->
  <!-- CSS Files -->
  <link id=\"pagestyle\" href=\"../assets/css/argon-dashboard.css?v=2.1.0\" rel=\"stylesheet\" />
  <link href=\"//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css\" rel=\"stylesheet\" id=\"bootstrap-css\">

  {% endblock %}
{% block body %}

<style>
      body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .navbar {
            display: flex;
            background: #ffffff;
            padding: 10px;
            justify-content: center;
            gap: 20px;
            margin: 20px auto; /* Centrer la navbar */
            width: 90%;
            max-width: 1200px; /* Facultatif : limite la largeur maximale */
            border-radius: 10px; /* Pour un effet arrondi si nécessaire */
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Ajoute une légère ombre pour un effet visuel */
        }

        .navbar a {
            color: black; /* Couleur de texte initiale */
            text-decoration: none;
            padding: 10px 15px;
            font-weight: bold;
            cursor: pointer;
        }

        .navbar .nav-link:hover {
            color: #6c99bc;
                border-bottom: 2px solid #6c99bc; /* Ajouter une ligne sous le lien */
        }

        /* Zone de contenu */
        .content {
            padding: 20px;
            text-align: center;
        }
    </style>
    <!-- Menu Horizontal -->
     <div class=\"navbar\">
        <a class=\"nav-link\" onclick=\"loadPage('{{ path('app_reservation_transport_station') }}')\">Réserver</a>
        <a class=\"nav-link\" onclick=\"loadPage('{{ path('app_reservation_transport_index') }}')\">Mes Réservations</a>
        <a class=\"nav-link\" onclick=\"loadPage('{{ path('app_reservation_transport_station') }}')\">Stations</a>
        <a class=\"nav-link\" onclick=\"loadPage('{{ path('app_message_voyageurs') }}')\">Discussions</a>
    </div>

    <!-- Contenu Dynamique -->
    <div class=\"content\" id=\"pageContent\">
        <p>Bienvenue dans la gestion des vélos. Sélectionnez une option.</p>
    </div>

    <script>
    function loadPage(url) {
        fetch(url, { headers: { \"X-Requested-With\": \"XMLHttpRequest\" } })
            .then(response => response.text())
            .then(html => {
                document.getElementById('pageContent').innerHTML = html;
            })
            .catch(error => console.error('Erreur lors du chargement:', error));
    }

    function submitForm(form) {
        fetch(form.action, {
            method: form.method,
            body: new FormData(form),
            headers: { \"X-Requested-With\": \"XMLHttpRequest\" }
        })
        .then(response => response.text())
        .then(html => {
            document.getElementById('pageContent').innerHTML = html;
        })
        .catch(error => console.error('Erreur lors de l'envoi du formulaire:', error));
    }

        
    </script>

    <div class=\"container-fluid py-4\">
        <div class=\"row\">
            <div class=\"col-12\">
                <div class=\"card mb-4\">
                    <div class=\"card-header pb-0\">
                        <h6>Réservations</h6>
                    </div>
            <div class=\"card-body px-0 pt-0 pb-2\">
              <div class=\"table-responsive p-0\">
                <table class=\"table align-items-center justify-content-center mb-0\">
                  <thead>
                    <tr>
                        <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2\">Reference</th>
                        <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2\">dete Réservation</th>
                        <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2\">date fin </th>
                        <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2\">Prix</th>
                        <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2\">Nombre de vélo</th>
                        <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2\">Statut</th>
                        <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2\">actions</th>
                      <th></th>
                    </tr>
                  </thead>
                  
    
                  <tbody>
        {% for reservation_transport in reservation_transports %}
                    <tr>
                      
                      <td>
                        <p class=\"text-sm font-weight-bold mb-0\">{{ reservation_transport.reference }}</p>
                      </td>
                      <td>
                        <span class=\"text-xs font-weight-bold\">{{ reservation_transport.dateRes ? reservation_transport.dateRes|date('Y-m-d H:i:s') : '' }}</span>
                      </td>
                      <td>
                        <span class=\"text-xs font-weight-bold\">{{ reservation_transport.dateFin ? reservation_transport.dateFin|date('Y-m-d H:i:s') : '' }}</span>
                      </td>
                      <td>
                        <span class=\"text-xs font-weight-bold\">{{ reservation_transport.prix }}</span>
                      </td>

                      <td>
                        <span class=\"text-xs font-weight-bold\">{{ reservation_transport.nombreVelo }}</span>
                      </td>
                      <td>
                        <span class=\"text-xs font-weight-bold\">{{ reservation_transport.statut }}</span>
                      </td>

                

                      <td class=\"align-middle\">

                    <a href=\"{{ path('app_reservation_transport_edit', {'id': reservation_transport.id}) }}\">edit</a>
 
  <form method=\"post\" action=\"{{ path('app_reservation_transport_show', {'id': reservation_transport.id}) }}\" style=\"display:inline;\">
    <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ reservation_transport.id) }}\">
    <button type=\"submit\" class=\"btn btn-sm btn-danger\" onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer cette station ?');\">Supprimer</button>
  </form>
                    </tr>
                    
                   {% endfor %}
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

{% endblock %}
", "reservation_transport/index.html.twig", "C:\\Users\\MSI\\Desktop\\Airmess_Web\\templates\\reservation_transport\\index.html.twig");
    }
}
