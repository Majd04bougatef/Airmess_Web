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

/* reservation_transport/_form.html.twig */
class __TwigTemplate_43e29fdcf448bcee9c0d79cc6e2e71bd extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "reservation_transport/_form.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "reservation_transport/_form.html.twig"));

        // line 1
        yield "<style>
/* Form Controls */
.contact-form {
    background: #fff;
    margin: 0 auto;
    width: 100%;
    border-radius: 15px;
    box-shadow: none;
    overflow: hidden;
    padding-bottom: 30px;
}

.contact-form .form-control {
    border-radius: 10px;
    border: 1px solid #e9ecef;
    padding: 12px 15px;
    transition: all 0.3s ease;
    box-shadow: none;
}

.contact-form .form-control:focus {
    border-color: #5e72e4;
    box-shadow: 0 0 0 0.2rem rgba(94, 114, 228, 0.25);
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

/* Form Layout */
.contact-form form {
    padding: 3% 5%;
}

.contact-form form .row {
    margin-bottom: 20px;
}

/* Labels */
.form-group label {
    font-weight: 500;
    color: #344767;
    margin-bottom: 8px;
    display: inline-block;
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

/* Information Display Styling */
.info-group {
    background-color: #f8f9fa;
    border-radius: 10px;
    padding: 15px;
    margin-bottom: 20px;
    border-left: 4px solid #5e72e4;
}

.info-group label {
    font-weight: 500;
    color: #344767;
    margin-bottom: 5px;
    display: block;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .contact-form {
        width: 100%;
        margin: 0 auto;
    }
    
    .contact-form form {
        padding: 5%;
    }
    
    .step-text {
        font-size: 12px;
    }
}

/* Add error message styling */
.form-error {
    color: #ff0000;
    font-size: 0.9em;
    margin-top: 0.5rem;
    font-weight: 500;
    display: block;
}

/* Form error list styling */
.form-errors ul {
    list-style: none;
    padding: 0;
    margin: 0;
    color: #ff0000;
}

.form-errors li {
    font-size: 0.9em;
    margin-top: 0.5rem;
    font-weight: 500;
}

/* Style for the error messages from form_errors */
.invalid-feedback {
    display: block !important;
    color: #ff0000;
    font-size: 0.9em;
    margin-top: 0.5rem;
    font-weight: 500;
}

/* Remove all invalid input styling */
.form-control.is-invalid {
    border-color: #e9ecef;
    background-color: #fff;
}

.form-control:invalid {
    border-color: #e9ecef;
}

.form-control:invalid:focus {
    box-shadow: 0 0 0 0.2rem rgba(94, 114, 228, 0.25);
    border-color: #5e72e4;
}

/* Remove default browser validation styling */
input:invalid {
    box-shadow: none !important;
}

input:-moz-ui-invalid {
    box-shadow: none !important;
}
</style>

<div class=\"container contact-form\">
    <div class=\"contact-image\">
        <img src=\"";
        // line 275
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/signalisation (2).png"), "html", null, true);
        yield "\" alt=\"bike_icon\"/>
    </div>
    <h3>Réserver Votre vélo</h3>

    <div class=\"stepper\">
        <div class=\"step active\">
            <div class=\"step-number\">1</div>
            <div class=\"step-text\">Réservation</div>
        </div>
        <div class=\"step\">
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

    <div class=\"container mt-4\">
        <div class=\"info-group\">
            <div class=\"row\">
                <div class=\"col-md-6\">
                    <label>Station: </label>
                    <strong>";
        // line 303
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["nom"]) || array_key_exists("nom", $context) ? $context["nom"] : (function () { throw new RuntimeError('Variable "nom" does not exist.', 303, $this->source); })()), "html", null, true);
        yield "</strong>
                </div>
                <div class=\"col-md-6\">
                    <label>Prix par heure: </label>
                    <strong>";
        // line 307
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["prix"]) || array_key_exists("prix", $context) ? $context["prix"] : (function () { throw new RuntimeError('Variable "prix" does not exist.', 307, $this->source); })()), "html", null, true);
        yield "€</strong>
                </div>
            </div>
            <div class=\"row mt-2\">
                <div class=\"col-md-12\">
                    <label>Vélos disponibles: </label>
                    <strong>";
        // line 313
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["nombreVelo"]) || array_key_exists("nombreVelo", $context) ? $context["nombreVelo"] : (function () { throw new RuntimeError('Variable "nombreVelo" does not exist.', 313, $this->source); })()), "html", null, true);
        yield "</strong>
                </div>
            </div>
        </div>

        ";
        // line 318
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 318, $this->source); })()), 'form_start', ["attr" => ["class" => "contact-form", "id" => "reservation-form", "novalidate" => "novalidate"]]);
        yield "
            <div class=\"row\">
                <div class=\"col-md-6\">
                    <div class=\"form-group\">
                        ";
        // line 322
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 322, $this->source); })()), "dateRes", [], "any", false, false, false, 322), 'label', ["label" => "Date de début"]);
        yield "
                        ";
        // line 323
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 323, $this->source); })()), "dateRes", [], "any", false, false, false, 323), 'widget', ["attr" => ["class" => "form-control"]]);
        yield "
                        ";
        // line 324
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 324, $this->source); })()), "dateRes", [], "any", false, false, false, 324), 'errors');
        yield "
                    </div>
                </div>
                <div class=\"col-md-6\">
                    <div class=\"form-group\">
                        ";
        // line 329
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 329, $this->source); })()), "dateFin", [], "any", false, false, false, 329), 'label', ["label" => "Date de fin"]);
        yield "
                        ";
        // line 330
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 330, $this->source); })()), "dateFin", [], "any", false, false, false, 330), 'widget', ["attr" => ["class" => "form-control"]]);
        yield "
                        ";
        // line 331
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 331, $this->source); })()), "dateFin", [], "any", false, false, false, 331), 'errors');
        yield "
                    </div>
                </div>
            </div>
            <div class=\"row\">
                <div class=\"col-md-12\">
                    <div class=\"form-group\">
                        ";
        // line 338
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 338, $this->source); })()), "nombreVelo", [], "any", false, false, false, 338), 'label', ["label" => "Nombre de vélos"]);
        yield "
                        ";
        // line 339
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 339, $this->source); })()), "nombreVelo", [], "any", false, false, false, 339), 'widget', ["attr" => ["class" => "form-control"]]);
        yield "
                        ";
        // line 340
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 340, $this->source); })()), "nombreVelo", [], "any", false, false, false, 340), 'errors');
        yield "
                    </div>
                </div>
            </div>
            ";
        // line 344
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 344, $this->source); })()), "_token", [], "any", false, false, false, 344), 'row');
        yield "
            <div class=\"row\">
                <div class=\"col-md-12 text-center\">
                    <button type=\"submit\" class=\"btnn\">Continuer</button>
                </div>
            </div>
        ";
        // line 350
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 350, $this->source); })()), 'form_end', ["render_rest" => false]);
        yield "
    </div>
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
</script>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "reservation_transport/_form.html.twig";
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
        return array (  444 => 350,  435 => 344,  428 => 340,  424 => 339,  420 => 338,  410 => 331,  406 => 330,  402 => 329,  394 => 324,  390 => 323,  386 => 322,  379 => 318,  371 => 313,  362 => 307,  355 => 303,  324 => 275,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<style>
/* Form Controls */
.contact-form {
    background: #fff;
    margin: 0 auto;
    width: 100%;
    border-radius: 15px;
    box-shadow: none;
    overflow: hidden;
    padding-bottom: 30px;
}

.contact-form .form-control {
    border-radius: 10px;
    border: 1px solid #e9ecef;
    padding: 12px 15px;
    transition: all 0.3s ease;
    box-shadow: none;
}

.contact-form .form-control:focus {
    border-color: #5e72e4;
    box-shadow: 0 0 0 0.2rem rgba(94, 114, 228, 0.25);
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

/* Form Layout */
.contact-form form {
    padding: 3% 5%;
}

.contact-form form .row {
    margin-bottom: 20px;
}

/* Labels */
.form-group label {
    font-weight: 500;
    color: #344767;
    margin-bottom: 8px;
    display: inline-block;
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

/* Information Display Styling */
.info-group {
    background-color: #f8f9fa;
    border-radius: 10px;
    padding: 15px;
    margin-bottom: 20px;
    border-left: 4px solid #5e72e4;
}

.info-group label {
    font-weight: 500;
    color: #344767;
    margin-bottom: 5px;
    display: block;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .contact-form {
        width: 100%;
        margin: 0 auto;
    }
    
    .contact-form form {
        padding: 5%;
    }
    
    .step-text {
        font-size: 12px;
    }
}

/* Add error message styling */
.form-error {
    color: #ff0000;
    font-size: 0.9em;
    margin-top: 0.5rem;
    font-weight: 500;
    display: block;
}

/* Form error list styling */
.form-errors ul {
    list-style: none;
    padding: 0;
    margin: 0;
    color: #ff0000;
}

.form-errors li {
    font-size: 0.9em;
    margin-top: 0.5rem;
    font-weight: 500;
}

/* Style for the error messages from form_errors */
.invalid-feedback {
    display: block !important;
    color: #ff0000;
    font-size: 0.9em;
    margin-top: 0.5rem;
    font-weight: 500;
}

/* Remove all invalid input styling */
.form-control.is-invalid {
    border-color: #e9ecef;
    background-color: #fff;
}

.form-control:invalid {
    border-color: #e9ecef;
}

.form-control:invalid:focus {
    box-shadow: 0 0 0 0.2rem rgba(94, 114, 228, 0.25);
    border-color: #5e72e4;
}

/* Remove default browser validation styling */
input:invalid {
    box-shadow: none !important;
}

input:-moz-ui-invalid {
    box-shadow: none !important;
}
</style>

<div class=\"container contact-form\">
    <div class=\"contact-image\">
        <img src=\"{{asset('images/signalisation (2).png')}}\" alt=\"bike_icon\"/>
    </div>
    <h3>Réserver Votre vélo</h3>

    <div class=\"stepper\">
        <div class=\"step active\">
            <div class=\"step-number\">1</div>
            <div class=\"step-text\">Réservation</div>
        </div>
        <div class=\"step\">
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

    <div class=\"container mt-4\">
        <div class=\"info-group\">
            <div class=\"row\">
                <div class=\"col-md-6\">
                    <label>Station: </label>
                    <strong>{{ nom }}</strong>
                </div>
                <div class=\"col-md-6\">
                    <label>Prix par heure: </label>
                    <strong>{{ prix }}€</strong>
                </div>
            </div>
            <div class=\"row mt-2\">
                <div class=\"col-md-12\">
                    <label>Vélos disponibles: </label>
                    <strong>{{ nombreVelo }}</strong>
                </div>
            </div>
        </div>

        {{ form_start(form, {'attr': {'class': 'contact-form', 'id': 'reservation-form', 'novalidate': 'novalidate'}}) }}
            <div class=\"row\">
                <div class=\"col-md-6\">
                    <div class=\"form-group\">
                        {{ form_label(form.dateRes, 'Date de début') }}
                        {{ form_widget(form.dateRes, {'attr': {'class': 'form-control'}}) }}
                        {{ form_errors(form.dateRes) }}
                    </div>
                </div>
                <div class=\"col-md-6\">
                    <div class=\"form-group\">
                        {{ form_label(form.dateFin, 'Date de fin') }}
                        {{ form_widget(form.dateFin, {'attr': {'class': 'form-control'}}) }}
                        {{ form_errors(form.dateFin) }}
                    </div>
                </div>
            </div>
            <div class=\"row\">
                <div class=\"col-md-12\">
                    <div class=\"form-group\">
                        {{ form_label(form.nombreVelo, 'Nombre de vélos') }}
                        {{ form_widget(form.nombreVelo, {'attr': {'class': 'form-control'}}) }}
                        {{ form_errors(form.nombreVelo) }}
                    </div>
                </div>
            </div>
            {{ form_row(form._token) }}
            <div class=\"row\">
                <div class=\"col-md-12 text-center\">
                    <button type=\"submit\" class=\"btnn\">Continuer</button>
                </div>
            </div>
        {{ form_end(form, {'render_rest': false}) }}
    </div>
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
</script>", "reservation_transport/_form.html.twig", "C:\\Users\\bouga\\Desktop\\Airmess_Web\\templates\\reservation_transport\\_form.html.twig");
    }
}
