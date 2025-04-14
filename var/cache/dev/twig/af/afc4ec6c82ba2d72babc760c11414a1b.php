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

/* reservation_transport/cardsStation.html.twig */
class __TwigTemplate_672f0d83fd8a36aab2f40c2d0f708ae9 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "reservation_transport/cardsStation.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "reservation_transport/cardsStation.html.twig"));

        // line 1
        yield "
    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css\">
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css\">
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

        .cards-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
        }
        .card-footer {
            display: flex;
            justify-content: flex-end;
            align-items: right;
            padding: 10px;
        }

        .custom-card {
            width: 30%;
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .custom-card:hover {
            transform: translateY(-5px);
        }

        .card-header {
            height: 150px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-body {
            padding: 15px;
        }

        .card-title {
            font-size: 1.5rem;
            color: #333;
        }

        .card-text {
            color: #666;
            font-size: 1rem;
        }

        /* Style du bouton de notation (étoiles) */
        .stars {
            display: flex;
            justify-content: center;
            gap: 5px;
        }

        .stars i {
            font-size: 1.5rem;
            color: #d3d3d3;
            cursor: pointer;
        }

        .stars i.filled {
            color: gold;
        }

        /* Style du bouton de réservation */
        .button {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: rgb(25, 135, 238);
            border: none;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.164);
            cursor: pointer;
            transition-duration: .3s;
            overflow: hidden;
            position: relative;
            margin-left: 20px;
            margin-bottom: 20px;
        }

        .button i {
            color: white;
        }

        .button:hover {
            width: 140px;
            border-radius: 50px;
            transition-duration: .3s;
            background-color: rgb(25, 135, 238);
            align-items: center;
        }

        .button::before {
            position: absolute;
            top: -20px;
            content: \"Réserver\";
            color: white;
            transition-duration: .3s;
            font-size: 2px;
        }

        .button:hover::before {
            font-size: 13px;
            opacity: 1;
            transform: translateY(30px);
            transition-duration: .3s;
        }

    </style>


   <div class=\"navbar\">
        <a class=\"nav-link\" onclick=\"loadPage('";
        // line 159
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reservation_transport_station");
        yield "')\">Réserver</a>
        <a class=\"nav-link\" onclick=\"loadPage('";
        // line 160
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reservation_transport_index");
        yield "')\">Mes Réservations</a>
        <a class=\"nav-link\" onclick=\"loadPage('";
        // line 161
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reservation_transport_station");
        yield "')\">Stations</a>
        <a class=\"nav-link\" onclick=\"loadPage('";
        // line 162
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_message_voyageurs");
        yield "')\">Discussions</a>
    </div>

    <!-- Contenu Dynamique -->
    <div class=\"content\" id=\"pageContent\">
        <div class=\"cards-container\">
            ";
        // line 168
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["stations"]) || array_key_exists("stations", $context) ? $context["stations"] : (function () { throw new RuntimeError('Variable "stations" does not exist.', 168, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["station"]) {
            // line 169
            yield "                <div class=\"custom-card\">
                    <div class=\"card-header\">
                        <img src=\"";
            // line 171
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/logo-airmess.png"), "html", null, true);
            yield "\" alt=\"Image de la station\" style=\"width: 100%; height: 100%; object-fit: cover;border-radius:20px;\">
                    </div>
                    <div class=\"card-body\">
                        <h5 class=\"card-title\">";
            // line 174
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["station"], "nom", [], "any", false, false, false, 174), "html", null, true);
            yield "</h5>
                        <p class=\"card-text\">";
            // line 175
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["station"], "nombreVelo", [], "any", false, false, false, 175), "html", null, true);
            yield " vélos disponibles</p>
                        <!-- Section de notation -->
                        <div class=\"stars\" data-station-id=\"";
            // line 177
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["station"], "idS", [], "any", false, false, false, 177), "html", null, true);
            yield "\">
                            <i class=\"fas fa-star\" onclick=\"rateStation(this, 1)\"></i>
                            <i class=\"fas fa-star\" onclick=\"rateStation(this, 2)\"></i>
                            <i class=\"fas fa-star\" onclick=\"rateStation(this, 3)\"></i>
                            <i class=\"fas fa-star\" onclick=\"rateStation(this, 4)\"></i>
                            <i class=\"fas fa-star\" onclick=\"rateStation(this, 5)\"></i>
                        </div>
                    </div>
                    <button class=\"button\" onclick=\"loadPage('";
            // line 185
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reservation_transport_new_reservation", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["station"], "idS", [], "any", false, false, false, 185)]), "html", null, true);
            yield "')\">
                        <i class=\"fas fa-calendar-check\"></i>
                    </button>


                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['station'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 192
        yield "        </div>
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
        return "reservation_transport/cardsStation.html.twig";
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
        return array (  276 => 192,  263 => 185,  252 => 177,  247 => 175,  243 => 174,  237 => 171,  233 => 169,  229 => 168,  220 => 162,  216 => 161,  212 => 160,  208 => 159,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("
    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css\">
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css\">
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

        .cards-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
        }
        .card-footer {
            display: flex;
            justify-content: flex-end;
            align-items: right;
            padding: 10px;
        }

        .custom-card {
            width: 30%;
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .custom-card:hover {
            transform: translateY(-5px);
        }

        .card-header {
            height: 150px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-body {
            padding: 15px;
        }

        .card-title {
            font-size: 1.5rem;
            color: #333;
        }

        .card-text {
            color: #666;
            font-size: 1rem;
        }

        /* Style du bouton de notation (étoiles) */
        .stars {
            display: flex;
            justify-content: center;
            gap: 5px;
        }

        .stars i {
            font-size: 1.5rem;
            color: #d3d3d3;
            cursor: pointer;
        }

        .stars i.filled {
            color: gold;
        }

        /* Style du bouton de réservation */
        .button {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: rgb(25, 135, 238);
            border: none;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.164);
            cursor: pointer;
            transition-duration: .3s;
            overflow: hidden;
            position: relative;
            margin-left: 20px;
            margin-bottom: 20px;
        }

        .button i {
            color: white;
        }

        .button:hover {
            width: 140px;
            border-radius: 50px;
            transition-duration: .3s;
            background-color: rgb(25, 135, 238);
            align-items: center;
        }

        .button::before {
            position: absolute;
            top: -20px;
            content: \"Réserver\";
            color: white;
            transition-duration: .3s;
            font-size: 2px;
        }

        .button:hover::before {
            font-size: 13px;
            opacity: 1;
            transform: translateY(30px);
            transition-duration: .3s;
        }

    </style>


   <div class=\"navbar\">
        <a class=\"nav-link\" onclick=\"loadPage('{{ path('app_reservation_transport_station') }}')\">Réserver</a>
        <a class=\"nav-link\" onclick=\"loadPage('{{ path('app_reservation_transport_index') }}')\">Mes Réservations</a>
        <a class=\"nav-link\" onclick=\"loadPage('{{ path('app_reservation_transport_station') }}')\">Stations</a>
        <a class=\"nav-link\" onclick=\"loadPage('{{ path('app_message_voyageurs') }}')\">Discussions</a>
    </div>

    <!-- Contenu Dynamique -->
    <div class=\"content\" id=\"pageContent\">
        <div class=\"cards-container\">
            {% for station in stations %}
                <div class=\"custom-card\">
                    <div class=\"card-header\">
                        <img src=\"{{ asset('images/logo-airmess.png')}}\" alt=\"Image de la station\" style=\"width: 100%; height: 100%; object-fit: cover;border-radius:20px;\">
                    </div>
                    <div class=\"card-body\">
                        <h5 class=\"card-title\">{{ station.nom }}</h5>
                        <p class=\"card-text\">{{ station.nombreVelo }} vélos disponibles</p>
                        <!-- Section de notation -->
                        <div class=\"stars\" data-station-id=\"{{ station.idS }}\">
                            <i class=\"fas fa-star\" onclick=\"rateStation(this, 1)\"></i>
                            <i class=\"fas fa-star\" onclick=\"rateStation(this, 2)\"></i>
                            <i class=\"fas fa-star\" onclick=\"rateStation(this, 3)\"></i>
                            <i class=\"fas fa-star\" onclick=\"rateStation(this, 4)\"></i>
                            <i class=\"fas fa-star\" onclick=\"rateStation(this, 5)\"></i>
                        </div>
                    </div>
                    <button class=\"button\" onclick=\"loadPage('{{ path('app_reservation_transport_new_reservation', {'id': station.idS}) }}')\">
                        <i class=\"fas fa-calendar-check\"></i>
                    </button>


                </div>
            {% endfor %}
        </div>
    </div>


", "reservation_transport/cardsStation.html.twig", "C:\\Users\\MSI\\Desktop\\Airmess_Web\\templates\\reservation_transport\\cardsStation.html.twig");
    }
}
