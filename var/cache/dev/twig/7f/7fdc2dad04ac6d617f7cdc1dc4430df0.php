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

/* station/menuStation.html.twig */
class __TwigTemplate_a6881ab155f2b7a651e4b7095453130b extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "station/menuStation.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "station/menuStation.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
  <meta charset=\"UTF-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
  <title>Gestion des Stations</title>
  <link rel=\"stylesheet\" href=\"style.css\">
  <!-- Ajoutez ici vos liens CSS pour styliser la page -->
</head>
<style>
/* Style pour le menu horizontal */
.horizontal-menu {
  list-style-type: none;
  display: flex;
  gap: 20px;
  padding: 0;
  margin: 0;
}

.horizontal-menu li {
  display: inline;
}

.horizontal-menu a {
  text-decoration: none;
  color: #333;
  font-weight: bold;
  padding: 10px 15px;
  border-radius: 5px;
  transition: background-color 0.3s ease;
}

.horizontal-menu a:hover {
  background-color: #007BFF;
  color: white;
}

.navbar {
  background-color: #f8f9fa;
  padding: 10px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.hidden {
  display: none;
}

/* Ajoutez d'autres styles selon vos besoins */
</style>
<body>

  <!-- Navbar -->

<nav class=\"navbar\">
  <ul class=\"horizontal-menu\">
    <li><a href=\"#\" id=\"addStation\" data-url=\"";
        // line 56
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_station_new");
        yield "\">Ajouter Station</a></li>
    <li><a href=\"#\" id=\"viewStations\">Afficher Stations</a></li>
  </ul>
</nav>


  <!-- Contenu principal -->
  <main id=\"content\">
    <!-- Le contenu sera chargé ici dynamiquement -->
  </main>

  <script src=\"app.js\"></script>

  <script>
document.getElementById(\"addStation\").addEventListener(\"click\", function() {
    var url = this.getAttribute('data-url');
    loadPage(url);
});

function loadPage(page) {
    fetch(page)
        .then(response => response.text())
        .then(html => {
            document.getElementById('content').innerHTML = html;
        })
        .catch(error => console.error('Erreur lors du chargement de la page:', error));
}

  </script>
</body>
</html>
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
        return "station/menuStation.html.twig";
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
        return array (  105 => 56,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
  <meta charset=\"UTF-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
  <title>Gestion des Stations</title>
  <link rel=\"stylesheet\" href=\"style.css\">
  <!-- Ajoutez ici vos liens CSS pour styliser la page -->
</head>
<style>
/* Style pour le menu horizontal */
.horizontal-menu {
  list-style-type: none;
  display: flex;
  gap: 20px;
  padding: 0;
  margin: 0;
}

.horizontal-menu li {
  display: inline;
}

.horizontal-menu a {
  text-decoration: none;
  color: #333;
  font-weight: bold;
  padding: 10px 15px;
  border-radius: 5px;
  transition: background-color 0.3s ease;
}

.horizontal-menu a:hover {
  background-color: #007BFF;
  color: white;
}

.navbar {
  background-color: #f8f9fa;
  padding: 10px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.hidden {
  display: none;
}

/* Ajoutez d'autres styles selon vos besoins */
</style>
<body>

  <!-- Navbar -->

<nav class=\"navbar\">
  <ul class=\"horizontal-menu\">
    <li><a href=\"#\" id=\"addStation\" data-url=\"{{ path('app_station_new') }}\">Ajouter Station</a></li>
    <li><a href=\"#\" id=\"viewStations\">Afficher Stations</a></li>
  </ul>
</nav>


  <!-- Contenu principal -->
  <main id=\"content\">
    <!-- Le contenu sera chargé ici dynamiquement -->
  </main>

  <script src=\"app.js\"></script>

  <script>
document.getElementById(\"addStation\").addEventListener(\"click\", function() {
    var url = this.getAttribute('data-url');
    loadPage(url);
});

function loadPage(page) {
    fetch(page)
        .then(response => response.text())
        .then(html => {
            document.getElementById('content').innerHTML = html;
        })
        .catch(error => console.error('Erreur lors du chargement de la page:', error));
}

  </script>
</body>
</html>
", "station/menuStation.html.twig", "C:\\Users\\MSI\\Desktop\\Airmess_Web\\templates\\station\\menuStation.html.twig");
    }
}
