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
        yield "<link href=\"//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css\" rel=\"stylesheet\" id=\"bootstrap-css\">
<script src=\"//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js\"></script>
<script src=\"//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>

<style>
/* Global Styles */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    min-height: 100vh;
    padding: 20px 0;
}

/* Contact Form Card */
.contact-form {
    background: #fff;
    margin: 3% auto;
    width: 90%;
    max-width: 1200px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    padding-bottom: 30px;
}

/* Form Controls */
.contact-form .form-control {
    border-radius: 10px;
    border: 1px solid #e1e1e1;
    padding: 12px 15px;
    transition: all 0.3s ease;
    box-shadow: none;
}

.contact-form .form-control:focus {
    border-color: #0062cc;
    box-shadow: 0 0 0 0.2rem rgba(0, 98, 204, 0.25);
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

/* Form Layout */
.contact-form form {
    padding: 5% 10%;
}

.contact-form form .row {
    margin-bottom: 20px;
}

/* Labels */
.form-group label {
    font-weight: 500;
    color: #555;
    margin-bottom: 8px;
    display: inline-block;
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

/* Information Display Styling */
.info-group {
    background-color: #f8f9fa;
    border-radius: 10px;
    padding: 15px;
    margin-bottom: 20px;
    border-left: 4px solid #0062cc;
}

.info-group label {
    font-weight: 500;
    color: #444;
    margin-bottom: 5px;
    display: block;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .contact-form {
        width: 95%;
        margin: 5% auto;
    }
    
    .contact-form form {
        padding: 5%;
    }
    
    .step-text {
        font-size: 12px;
    }
}
</style>

<div class=\"container contact-form\">
    <div class=\"contact-image\">
        <img src=\"";
        // line 232
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
            <div class=\"step-text\">Succès</div>
        </div>
    </div>

";
        // line 255
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 255, $this->source); })()), 'form_start', ["action" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reservation_transport_new_reservation", ["id" =>         // line 256
(isset($context["idS"]) || array_key_exists("idS", $context) ? $context["idS"] : (function () { throw new RuntimeError('Variable "idS" does not exist.', 256, $this->source); })())]), "attr" => ["novalidate" => "novalidate"]]);
        // line 258
        yield "
        <input type=\"hidden\" name=\"station_id\" value=\"";
        // line 259
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["idS"]) || array_key_exists("idS", $context) ? $context["idS"] : (function () { throw new RuntimeError('Variable "idS" does not exist.', 259, $this->source); })()), "html", null, true);
        yield "\">    
        <div class=\"row\">
            <!-- Affichage du prix en texte -->
            <div class=\"col-12\">
                <div class=\"info-group\">
                    <label><strong>";
        // line 264
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["nom"]) || array_key_exists("nom", $context) ? $context["nom"] : (function () { throw new RuntimeError('Variable "nom" does not exist.', 264, $this->source); })()), "html", null, true);
        yield "</strong></label>
                    <label>Prix : <strong>";
        // line 265
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["prix"]) || array_key_exists("prix", $context) ? $context["prix"] : (function () { throw new RuntimeError('Variable "prix" does not exist.', 265, $this->source); })()), "html", null, true);
        yield "\$/h</strong></label>
                    <label>Nombre Vélo disponibles : <strong>";
        // line 266
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["nombreVelo"]) || array_key_exists("nombreVelo", $context) ? $context["nombreVelo"] : (function () { throw new RuntimeError('Variable "nombreVelo" does not exist.', 266, $this->source); })()), "html", null, true);
        yield "</strong></label>
                </div>
            </div>

            <div class=\"col-md-6\">
                <div class=\"form-group\">
                    ";
        // line 272
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 272, $this->source); })()), "dateRes", [], "any", false, false, false, 272), 'row', ["attr" => ["class" => "form-control"]]);
        yield "
                </div>
                <div class=\"form-group\">
                    ";
        // line 275
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 275, $this->source); })()), "nombreVelo", [], "any", false, false, false, 275), 'row', ["attr" => ["class" => "form-control"]]);
        yield "
                        ";
        // line 276
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 276, $this->source); })()), "nombreVelo", [], "any", false, false, false, 276), 'errors');
        yield "

                </div>
            </div>
            <div class=\"col-md-6\">
                <div class=\"form-group\">
                    ";
        // line 282
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 282, $this->source); })()), "dateFin", [], "any", false, false, false, 282), 'row', ["attr" => ["class" => "form-control"]]);
        yield "
                        ";
        // line 283
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 283, $this->source); })()), "dateFin", [], "any", false, false, false, 283), 'errors');
        yield "

                </div>
            </div>
            <div class=\"col-12\">
                <div class=\"form-group\">
                    <button type=\"submit\" class=\"btnn\">";
        // line 289
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("button_label", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["button_label"]) || array_key_exists("button_label", $context) ? $context["button_label"] : (function () { throw new RuntimeError('Variable "button_label" does not exist.', 289, $this->source); })()), "Réserver")) : ("Réserver")), "html", null, true);
        yield "</button>
                </div>
            </div>
        </div>
    ";
        // line 293
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 293, $this->source); })()), 'form_end');
        yield "
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
        return array (  377 => 293,  370 => 289,  361 => 283,  357 => 282,  348 => 276,  344 => 275,  338 => 272,  329 => 266,  325 => 265,  321 => 264,  313 => 259,  310 => 258,  308 => 256,  307 => 255,  281 => 232,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<link href=\"//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css\" rel=\"stylesheet\" id=\"bootstrap-css\">
<script src=\"//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js\"></script>
<script src=\"//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>

<style>
/* Global Styles */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    min-height: 100vh;
    padding: 20px 0;
}

/* Contact Form Card */
.contact-form {
    background: #fff;
    margin: 3% auto;
    width: 90%;
    max-width: 1200px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    padding-bottom: 30px;
}

/* Form Controls */
.contact-form .form-control {
    border-radius: 10px;
    border: 1px solid #e1e1e1;
    padding: 12px 15px;
    transition: all 0.3s ease;
    box-shadow: none;
}

.contact-form .form-control:focus {
    border-color: #0062cc;
    box-shadow: 0 0 0 0.2rem rgba(0, 98, 204, 0.25);
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

/* Form Layout */
.contact-form form {
    padding: 5% 10%;
}

.contact-form form .row {
    margin-bottom: 20px;
}

/* Labels */
.form-group label {
    font-weight: 500;
    color: #555;
    margin-bottom: 8px;
    display: inline-block;
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

/* Information Display Styling */
.info-group {
    background-color: #f8f9fa;
    border-radius: 10px;
    padding: 15px;
    margin-bottom: 20px;
    border-left: 4px solid #0062cc;
}

.info-group label {
    font-weight: 500;
    color: #444;
    margin-bottom: 5px;
    display: block;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .contact-form {
        width: 95%;
        margin: 5% auto;
    }
    
    .contact-form form {
        padding: 5%;
    }
    
    .step-text {
        font-size: 12px;
    }
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
            <div class=\"step-text\">Succès</div>
        </div>
    </div>

{{ form_start(form, {
    'action': path('app_reservation_transport_new_reservation', {'id': idS}),
    'attr': {'novalidate': 'novalidate'}
}) }}
        <input type=\"hidden\" name=\"station_id\" value=\"{{ idS }}\">    
        <div class=\"row\">
            <!-- Affichage du prix en texte -->
            <div class=\"col-12\">
                <div class=\"info-group\">
                    <label><strong>{{nom}}</strong></label>
                    <label>Prix : <strong>{{prix}}\$/h</strong></label>
                    <label>Nombre Vélo disponibles : <strong>{{nombreVelo}}</strong></label>
                </div>
            </div>

            <div class=\"col-md-6\">
                <div class=\"form-group\">
                    {{ form_row(form.dateRes, {'attr': {'class': 'form-control'}}) }}
                </div>
                <div class=\"form-group\">
                    {{ form_row(form.nombreVelo, {'attr': {'class': 'form-control'}}) }}
                        {{ form_errors(form.nombreVelo) }}

                </div>
            </div>
            <div class=\"col-md-6\">
                <div class=\"form-group\">
                    {{ form_row(form.dateFin, {'attr': {'class': 'form-control'}}) }}
                        {{ form_errors(form.dateFin) }}

                </div>
            </div>
            <div class=\"col-12\">
                <div class=\"form-group\">
                    <button type=\"submit\" class=\"btnn\">{{ button_label|default('Réserver') }}</button>
                </div>
            </div>
        </div>
    {{ form_end(form) }}
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
</script>
", "reservation_transport/_form.html.twig", "C:\\Users\\MSI\\Desktop\\Airmess_Web\\templates\\reservation_transport\\_form.html.twig");
    }
}
