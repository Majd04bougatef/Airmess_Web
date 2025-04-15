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

        $this->blocks = [
            'title' => [$this, 'block_title'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "reservation_transport/recap.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "reservation_transport/recap.html.twig"));

        $this->parent = $this->loadTemplate("dashVoyageurs/dashboardVoyageurs.html.twig", "reservation_transport/recap.html.twig", 1);
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

        yield "Récapitulatif de réservation";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
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

        // line 6
        yield "<style>
    /* Contact Form Card */
    .contact-form {
        background: #fff;
        margin: 0 auto;
        width: 100%;
        border-radius: 15px;
        box-shadow: none;
        overflow: hidden;
        padding-bottom: 30px;
    }
    
    /* Form Header */
    .contact-form h3 {
        margin: 25px 0;
        padding-bottom: 15px;
        text-align: center;
        color: #344767;
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
        background: #5e72e4;
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
        border-radius: 7px;
        padding: 12px;
        color: #fff;
        background-color: #5e72e4;
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
        background-color: #324cdd;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(94, 114, 228, 0.4);
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
        background-color: #e9ecef;
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
        background-color: #e9ecef;
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
        background-color: #5e72e4;
        transform: scale(1.1);
        box-shadow: 0 3px 10px rgba(94, 114, 228, 0.3);
    }
    
    .step.completed .step-number {
        background-color: #5e72e4;
    }
    
    .step-text {
        margin-top: 10px;
        font-size: 14px;
        font-weight: 600;
        color: #67748e;
        text-align: center;
        transition: all 0.3s ease;
    }
    
    .step.active .step-text {
        color: #344767;
    }
    
    .step.completed .step-text {
        color: #344767;
    }
    
    /* Recap Styles */
    .recap-container {
        padding: 20px 40px;
    }
    
    .recap-heading {
        font-size: 18px;
        color: #344767;
        border-bottom: 1px solid #e9ecef;
        padding-bottom: 10px;
        margin-bottom: 20px;
    }
    
    .recap-item {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
        padding-bottom: 10px;
        border-bottom: 1px dashed #e9ecef;
    }
    
    .recap-label {
        font-weight: 600;
        color: #344767;
    }
    
    .recap-value {
        font-weight: 500;
        color: #67748e;
    }
    
    .total-price {
        background-color: #f8f9fa;
        border-radius: 10px;
        padding: 15px;
        margin: 20px 0;
        border-left: 4px solid #5e72e4;
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
        background-color: #67748e;
        flex: 1;
    }
    
    .btn-confirm {
        background-color: #5e72e4;
        flex: 2;
    }
</style>

<div class=\"container contact-form\">
    <div class=\"contact-image\">
        <img src=\"";
        // line 216
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
            <div class=\"step-text\">Confirmation</div>
        </div>
    </div>
    
    <div class=\"recap-container\">
        <h4 class=\"recap-heading\">Détails de votre réservation</h4>
        
        <div class=\"recap-item\">
            <div class=\"recap-label\">Station</div>
            <div class=\"recap-value\">";
        // line 244
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["station"]) || array_key_exists("station", $context) ? $context["station"] : (function () { throw new RuntimeError('Variable "station" does not exist.', 244, $this->source); })()), "nom", [], "any", false, false, false, 244), "html", null, true);
        yield "</div>
        </div>
        
        <div class=\"recap-item\">
            <div class=\"recap-label\">Date de début</div>
            <div class=\"recap-value\">";
        // line 249
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["reservation"]) || array_key_exists("reservation", $context) ? $context["reservation"] : (function () { throw new RuntimeError('Variable "reservation" does not exist.', 249, $this->source); })()), "dateRes", [], "any", false, false, false, 249), "d/m/Y à H:i"), "html", null, true);
        yield "</div>
        </div>
        
        <div class=\"recap-item\">
            <div class=\"recap-label\">Date de fin</div>
            <div class=\"recap-value\">";
        // line 254
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["reservation"]) || array_key_exists("reservation", $context) ? $context["reservation"] : (function () { throw new RuntimeError('Variable "reservation" does not exist.', 254, $this->source); })()), "dateFin", [], "any", false, false, false, 254), "d/m/Y à H:i"), "html", null, true);
        yield "</div>
        </div>
        
        <div class=\"recap-item\">
            <div class=\"recap-label\">Durée</div>
            <div class=\"recap-value\">
                ";
        // line 260
        $context["interval"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["reservation"]) || array_key_exists("reservation", $context) ? $context["reservation"] : (function () { throw new RuntimeError('Variable "reservation" does not exist.', 260, $this->source); })()), "dateRes", [], "any", false, false, false, 260), "diff", [CoreExtension::getAttribute($this->env, $this->source, (isset($context["reservation"]) || array_key_exists("reservation", $context) ? $context["reservation"] : (function () { throw new RuntimeError('Variable "reservation" does not exist.', 260, $this->source); })()), "dateFin", [], "any", false, false, false, 260)], "method", false, false, false, 260);
        // line 261
        yield "                ";
        $context["hours"] = (CoreExtension::getAttribute($this->env, $this->source, (isset($context["interval"]) || array_key_exists("interval", $context) ? $context["interval"] : (function () { throw new RuntimeError('Variable "interval" does not exist.', 261, $this->source); })()), "h", [], "any", false, false, false, 261) + (CoreExtension::getAttribute($this->env, $this->source, (isset($context["interval"]) || array_key_exists("interval", $context) ? $context["interval"] : (function () { throw new RuntimeError('Variable "interval" does not exist.', 261, $this->source); })()), "days", [], "any", false, false, false, 261) * 24));
        // line 262
        yield "                ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["hours"]) || array_key_exists("hours", $context) ? $context["hours"] : (function () { throw new RuntimeError('Variable "hours" does not exist.', 262, $this->source); })()), "html", null, true);
        yield " heure";
        if (((isset($context["hours"]) || array_key_exists("hours", $context) ? $context["hours"] : (function () { throw new RuntimeError('Variable "hours" does not exist.', 262, $this->source); })()) > 1)) {
            yield "s";
        }
        // line 263
        yield "            </div>
        </div>
        
        <div class=\"recap-item\">
            <div class=\"recap-label\">Nombre de vélos</div>
            <div class=\"recap-value\">";
        // line 268
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["reservation"]) || array_key_exists("reservation", $context) ? $context["reservation"] : (function () { throw new RuntimeError('Variable "reservation" does not exist.', 268, $this->source); })()), "nombreVelo", [], "any", false, false, false, 268), "html", null, true);
        yield "</div>
        </div>
        
        <div class=\"recap-item\">
            <div class=\"recap-label\">Prix par heure</div>
            <div class=\"recap-value\">";
        // line 273
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["station"]) || array_key_exists("station", $context) ? $context["station"] : (function () { throw new RuntimeError('Variable "station" does not exist.', 273, $this->source); })()), "prixHeure", [], "any", false, false, false, 273), "html", null, true);
        yield "€/heure</div>
        </div>
        
        <div class=\"total-price\">
            <div class=\"recap-label\">Total</div>
            <div class=\"recap-value\">";
        // line 278
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["reservation"]) || array_key_exists("reservation", $context) ? $context["reservation"] : (function () { throw new RuntimeError('Variable "reservation" does not exist.', 278, $this->source); })()), "prix", [], "any", false, false, false, 278), "html", null, true);
        yield "€</div>
        </div>
        
        <div class=\"button-group\">
            <a href=\"";
        // line 282
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reservation_transport_station");
        yield "\" class=\"btnn btn-back\">Retour</a>
            
            <form method=\"POST\" action=\"";
        // line 284
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reservation_transport_confirm");
        yield "\">
                <input type=\"hidden\" name=\"user_id\" value=\"";
        // line 285
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["reservation"]) || array_key_exists("reservation", $context) ? $context["reservation"] : (function () { throw new RuntimeError('Variable "reservation" does not exist.', 285, $this->source); })()), "user", [], "any", false, false, false, 285), "idU", [], "any", false, false, false, 285), "html", null, true);
        yield "\">
                <input type=\"hidden\" name=\"station_id\" value=\"";
        // line 286
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["station"]) || array_key_exists("station", $context) ? $context["station"] : (function () { throw new RuntimeError('Variable "station" does not exist.', 286, $this->source); })()), "idS", [], "any", false, false, false, 286), "html", null, true);
        yield "\">
                <input type=\"hidden\" name=\"date_res\" value=\"";
        // line 287
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["reservation"]) || array_key_exists("reservation", $context) ? $context["reservation"] : (function () { throw new RuntimeError('Variable "reservation" does not exist.', 287, $this->source); })()), "dateRes", [], "any", false, false, false, 287), "Y-m-d H:i:s"), "html", null, true);
        yield "\">
                <input type=\"hidden\" name=\"date_fin\" value=\"";
        // line 288
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["reservation"]) || array_key_exists("reservation", $context) ? $context["reservation"] : (function () { throw new RuntimeError('Variable "reservation" does not exist.', 288, $this->source); })()), "dateFin", [], "any", false, false, false, 288), "Y-m-d H:i:s"), "html", null, true);
        yield "\">
                <input type=\"hidden\" name=\"nombre_velo\" value=\"";
        // line 289
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["reservation"]) || array_key_exists("reservation", $context) ? $context["reservation"] : (function () { throw new RuntimeError('Variable "reservation" does not exist.', 289, $this->source); })()), "nombreVelo", [], "any", false, false, false, 289), "html", null, true);
        yield "\">
                <input type=\"hidden\" name=\"prix\" value=\"";
        // line 290
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["reservation"]) || array_key_exists("reservation", $context) ? $context["reservation"] : (function () { throw new RuntimeError('Variable "reservation" does not exist.', 290, $this->source); })()), "prix", [], "any", false, false, false, 290), "html", null, true);
        yield "\">
                <button type=\"submit\" class=\"btnn btn-confirm\">Continuer et payer</button>
            </form>
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
        return array (  439 => 290,  435 => 289,  431 => 288,  427 => 287,  423 => 286,  419 => 285,  415 => 284,  410 => 282,  403 => 278,  395 => 273,  387 => 268,  380 => 263,  373 => 262,  370 => 261,  368 => 260,  359 => 254,  351 => 249,  343 => 244,  312 => 216,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'dashVoyageurs/dashboardVoyageurs.html.twig' %}

{% block title %}Récapitulatif de réservation{% endblock %}

{% block body %}
<style>
    /* Contact Form Card */
    .contact-form {
        background: #fff;
        margin: 0 auto;
        width: 100%;
        border-radius: 15px;
        box-shadow: none;
        overflow: hidden;
        padding-bottom: 30px;
    }
    
    /* Form Header */
    .contact-form h3 {
        margin: 25px 0;
        padding-bottom: 15px;
        text-align: center;
        color: #344767;
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
        background: #5e72e4;
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
        border-radius: 7px;
        padding: 12px;
        color: #fff;
        background-color: #5e72e4;
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
        background-color: #324cdd;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(94, 114, 228, 0.4);
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
        background-color: #e9ecef;
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
        background-color: #e9ecef;
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
        background-color: #5e72e4;
        transform: scale(1.1);
        box-shadow: 0 3px 10px rgba(94, 114, 228, 0.3);
    }
    
    .step.completed .step-number {
        background-color: #5e72e4;
    }
    
    .step-text {
        margin-top: 10px;
        font-size: 14px;
        font-weight: 600;
        color: #67748e;
        text-align: center;
        transition: all 0.3s ease;
    }
    
    .step.active .step-text {
        color: #344767;
    }
    
    .step.completed .step-text {
        color: #344767;
    }
    
    /* Recap Styles */
    .recap-container {
        padding: 20px 40px;
    }
    
    .recap-heading {
        font-size: 18px;
        color: #344767;
        border-bottom: 1px solid #e9ecef;
        padding-bottom: 10px;
        margin-bottom: 20px;
    }
    
    .recap-item {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
        padding-bottom: 10px;
        border-bottom: 1px dashed #e9ecef;
    }
    
    .recap-label {
        font-weight: 600;
        color: #344767;
    }
    
    .recap-value {
        font-weight: 500;
        color: #67748e;
    }
    
    .total-price {
        background-color: #f8f9fa;
        border-radius: 10px;
        padding: 15px;
        margin: 20px 0;
        border-left: 4px solid #5e72e4;
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
        background-color: #67748e;
        flex: 1;
    }
    
    .btn-confirm {
        background-color: #5e72e4;
        flex: 2;
    }
</style>

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
            <div class=\"step-text\">Confirmation</div>
        </div>
    </div>
    
    <div class=\"recap-container\">
        <h4 class=\"recap-heading\">Détails de votre réservation</h4>
        
        <div class=\"recap-item\">
            <div class=\"recap-label\">Station</div>
            <div class=\"recap-value\">{{ station.nom }}</div>
        </div>
        
        <div class=\"recap-item\">
            <div class=\"recap-label\">Date de début</div>
            <div class=\"recap-value\">{{ reservation.dateRes|date('d/m/Y à H:i') }}</div>
        </div>
        
        <div class=\"recap-item\">
            <div class=\"recap-label\">Date de fin</div>
            <div class=\"recap-value\">{{ reservation.dateFin|date('d/m/Y à H:i') }}</div>
        </div>
        
        <div class=\"recap-item\">
            <div class=\"recap-label\">Durée</div>
            <div class=\"recap-value\">
                {% set interval = reservation.dateRes.diff(reservation.dateFin) %}
                {% set hours = interval.h + (interval.days * 24) %}
                {{ hours }} heure{% if hours > 1 %}s{% endif %}
            </div>
        </div>
        
        <div class=\"recap-item\">
            <div class=\"recap-label\">Nombre de vélos</div>
            <div class=\"recap-value\">{{ reservation.nombreVelo }}</div>
        </div>
        
        <div class=\"recap-item\">
            <div class=\"recap-label\">Prix par heure</div>
            <div class=\"recap-value\">{{ station.prixHeure }}€/heure</div>
        </div>
        
        <div class=\"total-price\">
            <div class=\"recap-label\">Total</div>
            <div class=\"recap-value\">{{ reservation.prix }}€</div>
        </div>
        
        <div class=\"button-group\">
            <a href=\"{{ path('app_reservation_transport_station') }}\" class=\"btnn btn-back\">Retour</a>
            
            <form method=\"POST\" action=\"{{ path('app_reservation_transport_confirm') }}\">
                <input type=\"hidden\" name=\"user_id\" value=\"{{ reservation.user.idU }}\">
                <input type=\"hidden\" name=\"station_id\" value=\"{{ station.idS }}\">
                <input type=\"hidden\" name=\"date_res\" value=\"{{ reservation.dateRes|date('Y-m-d H:i:s') }}\">
                <input type=\"hidden\" name=\"date_fin\" value=\"{{ reservation.dateFin|date('Y-m-d H:i:s') }}\">
                <input type=\"hidden\" name=\"nombre_velo\" value=\"{{ reservation.nombreVelo }}\">
                <input type=\"hidden\" name=\"prix\" value=\"{{ reservation.prix }}\">
                <button type=\"submit\" class=\"btnn btn-confirm\">Continuer et payer</button>
            </form>
        </div>
    </div>
</div>
{% endblock %}", "reservation_transport/recap.html.twig", "C:\\Users\\meria\\OneDrive - ESPRIT\\Bureau\\Airmess_Web\\templates\\reservation_transport\\recap.html.twig");
    }
}
