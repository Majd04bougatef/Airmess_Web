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

/* dashVoyageurs/stationPageVoyageurs.html.twig */
class __TwigTemplate_4c85ff84108cb706c27feef42d83cb35 extends Template
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
        // line 1
        return "dashVoyageurs/dashboardVoyageurs.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashVoyageurs/stationPageVoyageurs.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashVoyageurs/stationPageVoyageurs.html.twig"));

        $this->parent = $this->loadTemplate("dashVoyageurs/dashboardVoyageurs.html.twig", "dashVoyageurs/stationPageVoyageurs.html.twig", 1);
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

        yield "Réserver Vélo - Airmess Dashboard";
        
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
<style>
    /* Reset all margins and padding */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
    }
    
    .navbar.station-nav {
        display: flex;
        background: #ffffff;
        padding: 15px;
        justify-content: space-around;
        margin: 20px auto 0;
        width: 90%;
        max-width: 1200px;
        border-radius: 15px;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.08);
    }
    
    .navbar.station-nav a {
        color: #3a4a5d;
        text-decoration: none;
        padding: 12px 25px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        border-radius: 8px;
        font-size: 15px;
    }
    
    .navbar.station-nav .nav-link:hover {
        color: #6c99bc;
        background-color: #f0f6ff;
    }
    
    .navbar.station-nav .nav-link.active {
        color: #ffffff;
        background-color: #6c99bc;
    }
    
    /* Zone de contenu */
    .content {
        padding: 30px;
        text-align: center;
        margin: 20px auto 0;
        width: 90%;
        max-width: 1200px;
        background-color: #ffffff;
        border-radius: 15px;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.05);
    }

    .content p {
        color: #555;
        font-size: 16px;
        line-height: 1.5;
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 73
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

        // line 74
        yield "<!-- Menu Horizontal with regular links -->
<div class=\"navbar station-nav\">
    <a class=\"nav-link ";
        // line 76
        if (((is_string($_v0 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 76, $this->source); })()), "request", [], "any", false, false, false, 76), "get", ["_route"], "method", false, false, false, 76)) && is_string($_v1 = "app_reservation_transport_station") && str_starts_with($_v0, $_v1)) && (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 76, $this->source); })()), "request", [], "any", false, false, false, 76), "get", ["_route"], "method", false, false, false, 76) != "app_reservation_transport_index"))) {
            yield "active";
        }
        yield "\" href=\"";
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reservation_transport_station");
        yield "\">Réserver</a>
    <a class=\"nav-link ";
        // line 77
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 77, $this->source); })()), "request", [], "any", false, false, false, 77), "get", ["_route"], "method", false, false, false, 77) == "app_reservation_transport_index")) {
            yield "active";
        }
        yield "\" href=\"";
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reservation_transport_index");
        yield "\">Mes Réservations</a>
    <a class=\"nav-link ";
        // line 78
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 78, $this->source); })()), "request", [], "any", false, false, false, 78), "get", ["_route"], "method", false, false, false, 78) == "app_reservation_transport_station")) {
            yield "active";
        }
        yield "\" href=\"";
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reservation_transport_station");
        yield "\">Stations</a>
    <a class=\"nav-link ";
        // line 79
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 79, $this->source); })()), "request", [], "any", false, false, false, 79), "get", ["_route"], "method", false, false, false, 79) == "app_message_voyageurs")) {
            yield "active";
        }
        yield "\" href=\"";
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_message_voyageurs");
        yield "\">Discussions</a>
</div>

<!-- Contenu -->
<div class=\"content\">
    <p>Bienvenue dans la gestion des vélos. Sélectionnez une option dans le menu à gauche.</p>
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
        return "dashVoyageurs/stationPageVoyageurs.html.twig";
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
        return array (  219 => 79,  211 => 78,  203 => 77,  195 => 76,  191 => 74,  178 => 73,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'dashVoyageurs/dashboardVoyageurs.html.twig' %}

{% block title %}Réserver Vélo - Airmess Dashboard{% endblock %}

{% block stylesheets %}
{{ parent() }}
<style>
    /* Reset all margins and padding */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
    }
    
    .navbar.station-nav {
        display: flex;
        background: #ffffff;
        padding: 15px;
        justify-content: space-around;
        margin: 20px auto 0;
        width: 90%;
        max-width: 1200px;
        border-radius: 15px;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.08);
    }
    
    .navbar.station-nav a {
        color: #3a4a5d;
        text-decoration: none;
        padding: 12px 25px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        border-radius: 8px;
        font-size: 15px;
    }
    
    .navbar.station-nav .nav-link:hover {
        color: #6c99bc;
        background-color: #f0f6ff;
    }
    
    .navbar.station-nav .nav-link.active {
        color: #ffffff;
        background-color: #6c99bc;
    }
    
    /* Zone de contenu */
    .content {
        padding: 30px;
        text-align: center;
        margin: 20px auto 0;
        width: 90%;
        max-width: 1200px;
        background-color: #ffffff;
        border-radius: 15px;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.05);
    }

    .content p {
        color: #555;
        font-size: 16px;
        line-height: 1.5;
    }
</style>
{% endblock %}

{% block body %}
<!-- Menu Horizontal with regular links -->
<div class=\"navbar station-nav\">
    <a class=\"nav-link {% if app.request.get('_route') starts with 'app_reservation_transport_station' and app.request.get('_route') != 'app_reservation_transport_index' %}active{% endif %}\" href=\"{{ path('app_reservation_transport_station') }}\">Réserver</a>
    <a class=\"nav-link {% if app.request.get('_route') == 'app_reservation_transport_index' %}active{% endif %}\" href=\"{{ path('app_reservation_transport_index') }}\">Mes Réservations</a>
    <a class=\"nav-link {% if app.request.get('_route') == 'app_reservation_transport_station' %}active{% endif %}\" href=\"{{ path('app_reservation_transport_station') }}\">Stations</a>
    <a class=\"nav-link {% if app.request.get('_route') == 'app_message_voyageurs' %}active{% endif %}\" href=\"{{ path('app_message_voyageurs') }}\">Discussions</a>
</div>

<!-- Contenu -->
<div class=\"content\">
    <p>Bienvenue dans la gestion des vélos. Sélectionnez une option dans le menu à gauche.</p>
</div>
{% endblock %}", "dashVoyageurs/stationPageVoyageurs.html.twig", "C:\\Users\\MSI\\Desktop\\Airmess_Web\\templates\\dashVoyageurs\\stationPageVoyageurs.html.twig");
    }
}
