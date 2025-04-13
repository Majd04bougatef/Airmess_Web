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

/* reservation_transport/recap.html.twig */
class __TwigTemplate_e4506a7a4af15a4b04df9f582aaeac82 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "reservation_transport/recap.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "reservation_transport/recap.html.twig"));

        // line 1
        yield "    <link href=\"//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css\" rel=\"stylesheet\">
    <script src=\"//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js\"></script>
    <script src=\"//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
    
    <style>
        /* Global Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            padding: 20px 0;
            margin: 0;
        }
        
        /* Navbar Styles */
        .navbar {
            display: flex;
            background: #ffffff;
            padding: 10px;
            justify-content: center;
            margin: 20px auto 0;
            gap: 20px;
            width: 90%;
            max-width: 1200px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .navbar a {
            color: black;
            text-decoration: none;
            padding: 10px 15px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .navbar .nav-link:hover {
            color: #6c99bc;
            border-bottom: 2px solid #6c99bc;
        }
        
        /* Contact Form Card */
        .contact-form {
            background: #fff;
            margin: 3% auto;
            width: 85%;
            max-width: 800px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding-bottom: 30px;
        }
        
        /* Form Header */
        .contact-form h3 {
            margin: 25px 0;
            padding-bottom: 15px;
            text-align: center;
            color: #0062cc;
            font-weight: 600;
            position: relative;
            font-size: 28px;
        }
        
        .contact-form h3:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: #0062cc;
        }
        
        /* Logo Image */
        .contact-image {
            text-align: center;
            padding-top: 20px;
        }
        
        .contact-image img {
            width: 80px;
            margin-top: -40px;
            border-radius: 50%;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            background-color: white;
            padding: 8px;
        }
        
        /* Button Styles */
        .btnn {
            width: 100%;
            border-radius: 30px;
            padding: 12px;
            color: #fff;
            background-color: #0062cc;
            border: none;
            cursor: pointer;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            margin-top: 15px;
            font-size: 16px;
            text-transform: uppercase;
        }
        
        .btnn:hover {
            background-color: #004e9e;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 98, 204, 0.4);
        }
        
        .btnn:active {
            transform: translateY(0);
        }
        
        /* Stepper Component */
        .stepper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            max-width: 600px;
            margin: 30px auto;
            padding: 0;
            position: relative;
        }
        
        /* Line that connects steps */
        .stepper::before {
            content: '';
            position: absolute;
            width: 80%;
            height: 4px;
            background-color: #e1e1e1;
            top: 18px;
            left: 10%;
            z-index: 0;
        }
        
        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            flex: 1;
            z-index: 1;
        }
        
        .step-number {
            width: 36px;
            height: 36px;
            background-color: #e1e1e1;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            color: white;
            position: relative;
            z-index: 1;
            border: 3px solid white;
            transition: all 0.3s ease;
        }
        
        /* Active and completed step styling */
        .step.active .step-number {
            background-color: #28a745;
            transform: scale(1.1);
            box-shadow: 0 3px 10px rgba(40, 167, 69, 0.3);
        }
        
        .step.completed .step-number {
            background-color: #28a745;
        }
        
        .step-text {
            margin-top: 10px;
            font-size: 14px;
            font-weight: 600;
            color: #777;
            text-align: center;
            transition: all 0.3s ease;
        }
        
        .step.active .step-text {
            color: #28a745;
        }
        
        .step.completed .step-text {
            color: #28a745;
        }
        
        /* Recap Styles */
        .recap-container {
            padding: 20px 40px;
        }
        
        .recap-heading {
            font-size: 18px;
            color: #0062cc;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        
        .recap-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px dashed #e1e1e1;
        }
        
        .recap-label {
            font-weight: 600;
            color: #555;
        }
        
        .recap-value {
            font-weight: 500;
            color: #333;
        }
        
        .total-price {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 15px;
            margin: 20px 0;
            border-left: 4px solid #28a745;
            font-size: 18px;
            display: flex;
            justify-content: space-between;
        }
        
        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }
        
        .btn-back {
            background-color: #6c757d;
            flex: 1;
        }
        
        .btn-confirm {
            background-color: #28a745;
            flex: 2;
        }
        
        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .contact-form {
                width: 95%;
                margin: 5% auto;
            }
            
            .recap-container {
                padding: 15px;
            }
            
            .button-group {
                flex-direction: column;
            }
        }
    </style>
    <div class=\"navbar\">
        <a class=\"nav-link\" onclick=\"loadPage('";
        // line 270
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reservation_transport_station");
        yield "')\">Réserver</a>
        <a class=\"nav-link\" onclick=\"loadPage('";
        // line 271
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reservation_transport_index");
        yield "')\">Mes Réservations</a>
        <a class=\"nav-link\" onclick=\"loadPage('";
        // line 272
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reservation_transport_station");
        yield "')\">Stations</a>
        <a class=\"nav-link\" onclick=\"loadPage('";
        // line 273
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_message_voyageurs");
        yield "')\">Discussions</a>
    </div>

    <div class=\"container contact-form\">
        <div class=\"contact-image\">
            <img src=\"";
        // line 278
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/signalisation (2).png"), "html", null, true);
        yield "\" alt=\"bike_icon\"/>
        </div>
        <h3>Récapitulatif de Réservation</h3>

        <div class=\"stepper\">
            <div class=\"step completed\">
                <div class=\"step-number\">1</div>
                <div class=\"step-text\">Réservation</div>
            </div>
            <div class=\"step active\">
                <div class=\"step-number\">2</div>
                <div class=\"step-text\">Récap</div>
            </div>
            <div class=\"step\">
                <div class=\"step-number\">3</div>
                <div class=\"step-text\">Paiement</div>
            </div>
            <div class=\"step\">
                <div class=\"step-number\">4</div>
                <div class=\"step-text\">Succès</div>
            </div>
        </div>

        <div class=\"recap-container\">
            <div class=\"recap-heading\">Détails de la réservation</div>
            
            <div class=\"recap-item\">
                <div class=\"recap-label\">Station:</div>
                <div class=\"recap-value\">";
        // line 306
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["station"]) || array_key_exists("station", $context) ? $context["station"] : (function () { throw new RuntimeError('Variable "station" does not exist.', 306, $this->source); })()), "nom", [], "any", false, false, false, 306), "html", null, true);
        yield "</div>
            </div>
            
            <div class=\"recap-item\">
                <div class=\"recap-label\">Date de début:</div>
                <div class=\"recap-value\">";
        // line 311
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["reservation"]) || array_key_exists("reservation", $context) ? $context["reservation"] : (function () { throw new RuntimeError('Variable "reservation" does not exist.', 311, $this->source); })()), "dateRes", [], "any", false, false, false, 311), "d/m/Y H:i"), "html", null, true);
        yield "</div>
            </div>
            
            <div class=\"recap-item\">
                <div class=\"recap-label\">Date de fin:</div>
                <div class=\"recap-value\">";
        // line 316
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["reservation"]) || array_key_exists("reservation", $context) ? $context["reservation"] : (function () { throw new RuntimeError('Variable "reservation" does not exist.', 316, $this->source); })()), "dateFin", [], "any", false, false, false, 316), "d/m/Y H:i"), "html", null, true);
        yield "</div>
            </div>
            
            <div class=\"recap-item\">
                <div class=\"recap-label\">Durée:</div>
                <div class=\"recap-value\">
                    ";
        // line 322
        $context["diff"] = CoreExtension::getAttribute($this->env, $this->source, $this->extensions['Twig\Extension\CoreExtension']->convertDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["reservation"]) || array_key_exists("reservation", $context) ? $context["reservation"] : (function () { throw new RuntimeError('Variable "reservation" does not exist.', 322, $this->source); })()), "dateFin", [], "any", false, false, false, 322)), "diff", [$this->extensions['Twig\Extension\CoreExtension']->convertDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["reservation"]) || array_key_exists("reservation", $context) ? $context["reservation"] : (function () { throw new RuntimeError('Variable "reservation" does not exist.', 322, $this->source); })()), "dateRes", [], "any", false, false, false, 322))], "method", false, false, false, 322);
        // line 323
        yield "                    ";
        $context["hours"] = (CoreExtension::getAttribute($this->env, $this->source, (isset($context["diff"]) || array_key_exists("diff", $context) ? $context["diff"] : (function () { throw new RuntimeError('Variable "diff" does not exist.', 323, $this->source); })()), "h", [], "any", false, false, false, 323) + (CoreExtension::getAttribute($this->env, $this->source, (isset($context["diff"]) || array_key_exists("diff", $context) ? $context["diff"] : (function () { throw new RuntimeError('Variable "diff" does not exist.', 323, $this->source); })()), "days", [], "any", false, false, false, 323) * 24));
        // line 324
        yield "                    ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["hours"]) || array_key_exists("hours", $context) ? $context["hours"] : (function () { throw new RuntimeError('Variable "hours" does not exist.', 324, $this->source); })()), "html", null, true);
        yield " heure(s)
                </div>
            </div>
            
            <div class=\"recap-item\">
                <div class=\"recap-label\">Nombre de vélos:</div>
                <div class=\"recap-value\">";
        // line 330
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["reservation"]) || array_key_exists("reservation", $context) ? $context["reservation"] : (function () { throw new RuntimeError('Variable "reservation" does not exist.', 330, $this->source); })()), "nombreVelo", [], "any", false, false, false, 330), "html", null, true);
        yield "</div>
            </div>
            
            <div class=\"recap-item\">
                <div class=\"recap-label\">Prix unitaire:</div>
                <div class=\"recap-value\">";
        // line 335
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["reservation"]) || array_key_exists("reservation", $context) ? $context["reservation"] : (function () { throw new RuntimeError('Variable "reservation" does not exist.', 335, $this->source); })()), "station", [], "any", false, false, false, 335), "prixHeure", [], "any", false, false, false, 335), "html", null, true);
        yield "€/heure</div>
            </div>
            
            <div class=\"total-price\">
                <div class=\"recap-label\">TOTAL:</div>
                <div class=\"recap-value\">";
        // line 340
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["reservation"]) || array_key_exists("reservation", $context) ? $context["reservation"] : (function () { throw new RuntimeError('Variable "reservation" does not exist.', 340, $this->source); })()), "prix", [], "any", false, false, false, 340), "html", null, true);
        yield "€</div>
            </div>
            
            <form action=\"";
        // line 343
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reservation_transport_confirm");
        yield "\" method=\"POST\">
                <div class=\"button-group\">
                    <button type=\"button\" onclick=\"window.history.back()\" class=\"btnn btn-back\">Retour</button>
                    <button type=\"submit\" class=\"btnn btn-confirm\">Confirmer et payer</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function loadPage(url) {
            window.location.href = url;
        }
    </script>
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
        return "reservation_transport/recap.html.twig";
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
        return array (  432 => 343,  426 => 340,  418 => 335,  410 => 330,  400 => 324,  397 => 323,  395 => 322,  386 => 316,  378 => 311,  370 => 306,  339 => 278,  331 => 273,  327 => 272,  323 => 271,  319 => 270,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("    <link href=\"//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css\" rel=\"stylesheet\">
    <script src=\"//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js\"></script>
    <script src=\"//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
    
    <style>
        /* Global Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            padding: 20px 0;
            margin: 0;
        }
        
        /* Navbar Styles */
        .navbar {
            display: flex;
            background: #ffffff;
            padding: 10px;
            justify-content: center;
            margin: 20px auto 0;
            gap: 20px;
            width: 90%;
            max-width: 1200px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .navbar a {
            color: black;
            text-decoration: none;
            padding: 10px 15px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .navbar .nav-link:hover {
            color: #6c99bc;
            border-bottom: 2px solid #6c99bc;
        }
        
        /* Contact Form Card */
        .contact-form {
            background: #fff;
            margin: 3% auto;
            width: 85%;
            max-width: 800px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding-bottom: 30px;
        }
        
        /* Form Header */
        .contact-form h3 {
            margin: 25px 0;
            padding-bottom: 15px;
            text-align: center;
            color: #0062cc;
            font-weight: 600;
            position: relative;
            font-size: 28px;
        }
        
        .contact-form h3:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: #0062cc;
        }
        
        /* Logo Image */
        .contact-image {
            text-align: center;
            padding-top: 20px;
        }
        
        .contact-image img {
            width: 80px;
            margin-top: -40px;
            border-radius: 50%;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            background-color: white;
            padding: 8px;
        }
        
        /* Button Styles */
        .btnn {
            width: 100%;
            border-radius: 30px;
            padding: 12px;
            color: #fff;
            background-color: #0062cc;
            border: none;
            cursor: pointer;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            margin-top: 15px;
            font-size: 16px;
            text-transform: uppercase;
        }
        
        .btnn:hover {
            background-color: #004e9e;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 98, 204, 0.4);
        }
        
        .btnn:active {
            transform: translateY(0);
        }
        
        /* Stepper Component */
        .stepper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            max-width: 600px;
            margin: 30px auto;
            padding: 0;
            position: relative;
        }
        
        /* Line that connects steps */
        .stepper::before {
            content: '';
            position: absolute;
            width: 80%;
            height: 4px;
            background-color: #e1e1e1;
            top: 18px;
            left: 10%;
            z-index: 0;
        }
        
        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            flex: 1;
            z-index: 1;
        }
        
        .step-number {
            width: 36px;
            height: 36px;
            background-color: #e1e1e1;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            color: white;
            position: relative;
            z-index: 1;
            border: 3px solid white;
            transition: all 0.3s ease;
        }
        
        /* Active and completed step styling */
        .step.active .step-number {
            background-color: #28a745;
            transform: scale(1.1);
            box-shadow: 0 3px 10px rgba(40, 167, 69, 0.3);
        }
        
        .step.completed .step-number {
            background-color: #28a745;
        }
        
        .step-text {
            margin-top: 10px;
            font-size: 14px;
            font-weight: 600;
            color: #777;
            text-align: center;
            transition: all 0.3s ease;
        }
        
        .step.active .step-text {
            color: #28a745;
        }
        
        .step.completed .step-text {
            color: #28a745;
        }
        
        /* Recap Styles */
        .recap-container {
            padding: 20px 40px;
        }
        
        .recap-heading {
            font-size: 18px;
            color: #0062cc;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        
        .recap-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px dashed #e1e1e1;
        }
        
        .recap-label {
            font-weight: 600;
            color: #555;
        }
        
        .recap-value {
            font-weight: 500;
            color: #333;
        }
        
        .total-price {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 15px;
            margin: 20px 0;
            border-left: 4px solid #28a745;
            font-size: 18px;
            display: flex;
            justify-content: space-between;
        }
        
        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }
        
        .btn-back {
            background-color: #6c757d;
            flex: 1;
        }
        
        .btn-confirm {
            background-color: #28a745;
            flex: 2;
        }
        
        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .contact-form {
                width: 95%;
                margin: 5% auto;
            }
            
            .recap-container {
                padding: 15px;
            }
            
            .button-group {
                flex-direction: column;
            }
        }
    </style>
    <div class=\"navbar\">
        <a class=\"nav-link\" onclick=\"loadPage('{{ path('app_reservation_transport_station') }}')\">Réserver</a>
        <a class=\"nav-link\" onclick=\"loadPage('{{ path('app_reservation_transport_index') }}')\">Mes Réservations</a>
        <a class=\"nav-link\" onclick=\"loadPage('{{ path('app_reservation_transport_station') }}')\">Stations</a>
        <a class=\"nav-link\" onclick=\"loadPage('{{ path('app_message_voyageurs') }}')\">Discussions</a>
    </div>

    <div class=\"container contact-form\">
        <div class=\"contact-image\">
            <img src=\"{{asset('images/signalisation (2).png')}}\" alt=\"bike_icon\"/>
        </div>
        <h3>Récapitulatif de Réservation</h3>

        <div class=\"stepper\">
            <div class=\"step completed\">
                <div class=\"step-number\">1</div>
                <div class=\"step-text\">Réservation</div>
            </div>
            <div class=\"step active\">
                <div class=\"step-number\">2</div>
                <div class=\"step-text\">Récap</div>
            </div>
            <div class=\"step\">
                <div class=\"step-number\">3</div>
                <div class=\"step-text\">Paiement</div>
            </div>
            <div class=\"step\">
                <div class=\"step-number\">4</div>
                <div class=\"step-text\">Succès</div>
            </div>
        </div>

        <div class=\"recap-container\">
            <div class=\"recap-heading\">Détails de la réservation</div>
            
            <div class=\"recap-item\">
                <div class=\"recap-label\">Station:</div>
                <div class=\"recap-value\">{{ station.nom }}</div>
            </div>
            
            <div class=\"recap-item\">
                <div class=\"recap-label\">Date de début:</div>
                <div class=\"recap-value\">{{ reservation.dateRes|date('d/m/Y H:i') }}</div>
            </div>
            
            <div class=\"recap-item\">
                <div class=\"recap-label\">Date de fin:</div>
                <div class=\"recap-value\">{{ reservation.dateFin|date('d/m/Y H:i') }}</div>
            </div>
            
            <div class=\"recap-item\">
                <div class=\"recap-label\">Durée:</div>
                <div class=\"recap-value\">
                    {% set diff = date(reservation.dateFin).diff(date(reservation.dateRes)) %}
                    {% set hours = diff.h + (diff.days * 24) %}
                    {{ hours }} heure(s)
                </div>
            </div>
            
            <div class=\"recap-item\">
                <div class=\"recap-label\">Nombre de vélos:</div>
                <div class=\"recap-value\">{{ reservation.nombreVelo }}</div>
            </div>
            
            <div class=\"recap-item\">
                <div class=\"recap-label\">Prix unitaire:</div>
                <div class=\"recap-value\">{{ reservation.station.prixHeure }}€/heure</div>
            </div>
            
            <div class=\"total-price\">
                <div class=\"recap-label\">TOTAL:</div>
                <div class=\"recap-value\">{{ reservation.prix }}€</div>
            </div>
            
            <form action=\"{{ path('app_reservation_transport_confirm') }}\" method=\"POST\">
                <div class=\"button-group\">
                    <button type=\"button\" onclick=\"window.history.back()\" class=\"btnn btn-back\">Retour</button>
                    <button type=\"submit\" class=\"btnn btn-confirm\">Confirmer et payer</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function loadPage(url) {
            window.location.href = url;
        }
    </script>
", "reservation_transport/recap.html.twig", "C:\\Users\\MSI\\Desktop\\Airmess_Web\\templates\\reservation_transport\\recap.html.twig");
    }
}
