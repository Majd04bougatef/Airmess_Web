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

/* reservation_transport/payment.html.twig */
class __TwigTemplate_eb02dbf342a4c97feddbfba490c0420f extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "reservation_transport/payment.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "reservation_transport/payment.html.twig"));

        $this->parent = $this->loadTemplate("dashVoyageurs/dashboardVoyageurs.html.twig", "reservation_transport/payment.html.twig", 1);
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

        yield "Paiement de réservation";
        
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
    
    /* Payment specific styles */
    .payment-form {
        padding: 20px 40px;
    }
    
    .payment-card {
        border: 1px solid #e9ecef;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
    }
    
    .card-header {
        border-bottom: 1px solid #e9ecef;
        padding-bottom: 15px;
        margin-bottom: 20px;
        font-weight: 600;
        color: #344767;
    }
    
    .form-check {
        margin-bottom: 15px;
    }
    
    .payment-details {
        background-color: #f8f9fa;
        border-radius: 10px;
        padding: 15px;
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
        // line 223
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/signalisation (2).png"), "html", null, true);
        yield "\" alt=\"bike_icon\"/>
    </div>
    <h3>Paiement de votre réservation</h3>

    <div class=\"stepper\">
        <div class=\"step completed\">
            <div class=\"step-number\">1</div>
            <div class=\"step-text\">Réservation</div>
        </div>
        <div class=\"step completed\">
            <div class=\"step-number\">2</div>
            <div class=\"step-text\">Récap</div>
        </div>
        <div class=\"step active\">
            <div class=\"step-number\">3</div>
            <div class=\"step-text\">Paiement</div>
        </div>
        <div class=\"step\">
            <div class=\"step-number\">4</div>
            <div class=\"step-text\">Confirmation</div>
        </div>
    </div>

    <div class=\"payment-form\">
        <div class=\"payment-details\">
            <div class=\"recap-item\">
                <div class=\"recap-label\">Référence</div>
                <div class=\"recap-value\">";
        // line 250
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["reservation"]) || array_key_exists("reservation", $context) ? $context["reservation"] : (function () { throw new RuntimeError('Variable "reservation" does not exist.', 250, $this->source); })()), "reference", [], "any", false, false, false, 250), "html", null, true);
        yield "</div>
            </div>
            <div class=\"recap-item\">
                <div class=\"recap-label\">Montant à payer</div>
                <div class=\"recap-value\">";
        // line 254
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["reservation"]) || array_key_exists("reservation", $context) ? $context["reservation"] : (function () { throw new RuntimeError('Variable "reservation" does not exist.', 254, $this->source); })()), "prix", [], "any", false, false, false, 254), "html", null, true);
        yield "€</div>
            </div>
        </div>
        
        <form method=\"post\" action=\"";
        // line 258
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reservation_transport_process_payment");
        yield "\" id=\"payment-form\">
            <div class=\"payment-card\">
                <div class=\"card-header\">Choisissez votre méthode de paiement</div>
                
                <div class=\"form-check\">
                    <input class=\"form-check-input\" type=\"radio\" name=\"paymentMethod\" id=\"creditCard\" checked>
                    <label class=\"form-check-label\" for=\"creditCard\">
                        Carte bancaire
                    </label>
                </div>
                
                <div class=\"form-check\">
                    <input class=\"form-check-input\" type=\"radio\" name=\"paymentMethod\" id=\"paypal\">
                    <label class=\"form-check-label\" for=\"paypal\">
                        PayPal
                    </label>
                </div>
            </div>
            
            <!-- Formulaire de carte bancaire (exemple) -->
            <div id=\"creditCardForm\">
                <div class=\"form-group\">
                    <label for=\"cardNumber\">Numéro de carte</label>
                    <input type=\"text\" class=\"form-control\" id=\"cardNumber\" name=\"cardNumber\" placeholder=\"1234 5678 9012 3456\" required>
                </div>
                
                <div class=\"row\">
                    <div class=\"col-md-6\">
                        <div class=\"form-group\">
                            <label for=\"expiryDate\">Date d'expiration</label>
                            <input type=\"text\" class=\"form-control\" id=\"expiryDate\" name=\"expiryDate\" placeholder=\"MM/AA\" required>
                        </div>
                    </div>
                    <div class=\"col-md-6\">
                        <div class=\"form-group\">
                            <label for=\"cvv\">CVV</label>
                            <input type=\"text\" class=\"form-control\" id=\"cvv\" name=\"cvv\" placeholder=\"123\" required>
                        </div>
                    </div>
                </div>
                
                <div class=\"form-group\">
                    <label for=\"cardHolder\">Nom du titulaire</label>
                    <input type=\"text\" class=\"form-control\" id=\"cardHolder\" name=\"cardHolder\" placeholder=\"NOM Prénom\" required>
                </div>
            </div>
            
            <div class=\"button-group\">
                <a href=\"";
        // line 306
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reservation_transport_station");
        yield "\" class=\"btnn btn-back\">Retour</a>
                <button type=\"submit\" class=\"btnn btn-confirm\">Payer maintenant</button>
            </div>
            
            <!-- Hidden fields to pass reservation data -->
            <input type=\"hidden\" name=\"user_id\" value=\"";
        // line 311
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["reservation"]) || array_key_exists("reservation", $context) ? $context["reservation"] : (function () { throw new RuntimeError('Variable "reservation" does not exist.', 311, $this->source); })()), "user", [], "any", false, false, false, 311), "idU", [], "any", false, false, false, 311), "html", null, true);
        yield "\">
            <input type=\"hidden\" name=\"station_id\" value=\"";
        // line 312
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["reservation"]) || array_key_exists("reservation", $context) ? $context["reservation"] : (function () { throw new RuntimeError('Variable "reservation" does not exist.', 312, $this->source); })()), "station", [], "any", false, false, false, 312), "idS", [], "any", false, false, false, 312), "html", null, true);
        yield "\">
            <input type=\"hidden\" name=\"date_res\" value=\"";
        // line 313
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["reservation"]) || array_key_exists("reservation", $context) ? $context["reservation"] : (function () { throw new RuntimeError('Variable "reservation" does not exist.', 313, $this->source); })()), "dateRes", [], "any", false, false, false, 313), "Y-m-d H:i:s"), "html", null, true);
        yield "\">
            <input type=\"hidden\" name=\"date_fin\" value=\"";
        // line 314
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["reservation"]) || array_key_exists("reservation", $context) ? $context["reservation"] : (function () { throw new RuntimeError('Variable "reservation" does not exist.', 314, $this->source); })()), "dateFin", [], "any", false, false, false, 314), "Y-m-d H:i:s"), "html", null, true);
        yield "\">
            <input type=\"hidden\" name=\"nombre_velo\" value=\"";
        // line 315
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["reservation"]) || array_key_exists("reservation", $context) ? $context["reservation"] : (function () { throw new RuntimeError('Variable "reservation" does not exist.', 315, $this->source); })()), "nombreVelo", [], "any", false, false, false, 315), "html", null, true);
        yield "\">
            <input type=\"hidden\" name=\"prix\" value=\"";
        // line 316
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["reservation"]) || array_key_exists("reservation", $context) ? $context["reservation"] : (function () { throw new RuntimeError('Variable "reservation" does not exist.', 316, $this->source); })()), "prix", [], "any", false, false, false, 316), "html", null, true);
        yield "\">
        </form>
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
        return "reservation_transport/payment.html.twig";
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
        return array (  442 => 316,  438 => 315,  434 => 314,  430 => 313,  426 => 312,  422 => 311,  414 => 306,  363 => 258,  356 => 254,  349 => 250,  319 => 223,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'dashVoyageurs/dashboardVoyageurs.html.twig' %}

{% block title %}Paiement de réservation{% endblock %}

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
    
    /* Payment specific styles */
    .payment-form {
        padding: 20px 40px;
    }
    
    .payment-card {
        border: 1px solid #e9ecef;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
    }
    
    .card-header {
        border-bottom: 1px solid #e9ecef;
        padding-bottom: 15px;
        margin-bottom: 20px;
        font-weight: 600;
        color: #344767;
    }
    
    .form-check {
        margin-bottom: 15px;
    }
    
    .payment-details {
        background-color: #f8f9fa;
        border-radius: 10px;
        padding: 15px;
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
    <h3>Paiement de votre réservation</h3>

    <div class=\"stepper\">
        <div class=\"step completed\">
            <div class=\"step-number\">1</div>
            <div class=\"step-text\">Réservation</div>
        </div>
        <div class=\"step completed\">
            <div class=\"step-number\">2</div>
            <div class=\"step-text\">Récap</div>
        </div>
        <div class=\"step active\">
            <div class=\"step-number\">3</div>
            <div class=\"step-text\">Paiement</div>
        </div>
        <div class=\"step\">
            <div class=\"step-number\">4</div>
            <div class=\"step-text\">Confirmation</div>
        </div>
    </div>

    <div class=\"payment-form\">
        <div class=\"payment-details\">
            <div class=\"recap-item\">
                <div class=\"recap-label\">Référence</div>
                <div class=\"recap-value\">{{ reservation.reference }}</div>
            </div>
            <div class=\"recap-item\">
                <div class=\"recap-label\">Montant à payer</div>
                <div class=\"recap-value\">{{ reservation.prix }}€</div>
            </div>
        </div>
        
        <form method=\"post\" action=\"{{ path('app_reservation_transport_process_payment') }}\" id=\"payment-form\">
            <div class=\"payment-card\">
                <div class=\"card-header\">Choisissez votre méthode de paiement</div>
                
                <div class=\"form-check\">
                    <input class=\"form-check-input\" type=\"radio\" name=\"paymentMethod\" id=\"creditCard\" checked>
                    <label class=\"form-check-label\" for=\"creditCard\">
                        Carte bancaire
                    </label>
                </div>
                
                <div class=\"form-check\">
                    <input class=\"form-check-input\" type=\"radio\" name=\"paymentMethod\" id=\"paypal\">
                    <label class=\"form-check-label\" for=\"paypal\">
                        PayPal
                    </label>
                </div>
            </div>
            
            <!-- Formulaire de carte bancaire (exemple) -->
            <div id=\"creditCardForm\">
                <div class=\"form-group\">
                    <label for=\"cardNumber\">Numéro de carte</label>
                    <input type=\"text\" class=\"form-control\" id=\"cardNumber\" name=\"cardNumber\" placeholder=\"1234 5678 9012 3456\" required>
                </div>
                
                <div class=\"row\">
                    <div class=\"col-md-6\">
                        <div class=\"form-group\">
                            <label for=\"expiryDate\">Date d'expiration</label>
                            <input type=\"text\" class=\"form-control\" id=\"expiryDate\" name=\"expiryDate\" placeholder=\"MM/AA\" required>
                        </div>
                    </div>
                    <div class=\"col-md-6\">
                        <div class=\"form-group\">
                            <label for=\"cvv\">CVV</label>
                            <input type=\"text\" class=\"form-control\" id=\"cvv\" name=\"cvv\" placeholder=\"123\" required>
                        </div>
                    </div>
                </div>
                
                <div class=\"form-group\">
                    <label for=\"cardHolder\">Nom du titulaire</label>
                    <input type=\"text\" class=\"form-control\" id=\"cardHolder\" name=\"cardHolder\" placeholder=\"NOM Prénom\" required>
                </div>
            </div>
            
            <div class=\"button-group\">
                <a href=\"{{ path('app_reservation_transport_station') }}\" class=\"btnn btn-back\">Retour</a>
                <button type=\"submit\" class=\"btnn btn-confirm\">Payer maintenant</button>
            </div>
            
            <!-- Hidden fields to pass reservation data -->
            <input type=\"hidden\" name=\"user_id\" value=\"{{ reservation.user.idU }}\">
            <input type=\"hidden\" name=\"station_id\" value=\"{{ reservation.station.idS }}\">
            <input type=\"hidden\" name=\"date_res\" value=\"{{ reservation.dateRes|date('Y-m-d H:i:s') }}\">
            <input type=\"hidden\" name=\"date_fin\" value=\"{{ reservation.dateFin|date('Y-m-d H:i:s') }}\">
            <input type=\"hidden\" name=\"nombre_velo\" value=\"{{ reservation.nombreVelo }}\">
            <input type=\"hidden\" name=\"prix\" value=\"{{ reservation.prix }}\">
        </form>
    </div>
</div>
{% endblock %}", "reservation_transport/payment.html.twig", "C:\\Users\\bouga\\Desktop\\Airmess_Web\\templates\\reservation_transport\\payment.html.twig");
    }
}
