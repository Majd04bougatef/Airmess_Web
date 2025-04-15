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

/* reservation_transport/steps.html.twig */
class __TwigTemplate_4b99364ec164c8d09f729b4f958cfbb1 extends Template
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
            'javascripts' => [$this, 'block_javascripts'],
            'stylesheets' => [$this, 'block_stylesheets'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "reservation_transport/steps.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "reservation_transport/steps.html.twig"));

        // line 2
        yield "

<div class=\"container\">
    <h1>Réservation de Transport</h1>
    
    <div class=\"steps-container\">
        <div class=\"step active\" id=\"step1\">
            <div class=\"step-number\">1</div>
            <div class=\"step-title\">Réservation</div>
        </div>
        <div class=\"step\" id=\"step2\">
            <div class=\"step-number\">2</div>
            <div class=\"step-title\">Récapitulatif</div>
        </div>
        <div class=\"step\" id=\"step3\">
            <div class=\"step-number\">3</div>
            <div class=\"step-title\">Paiement</div>
        </div>
        <div class=\"step\" id=\"step4\">
            <div class=\"step-number\">4</div>
            <div class=\"step-title\">Confirmation</div>
        </div>
    </div>
    
    <div class=\"step-content active\" id=\"step1-content\">
        <h2>Détails de la Réservation</h2>
        
        ";
        // line 30
        yield "        ";
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 30, $this->source); })()), 'form_start', ["attr" => ["id" => "reservation-form"]]);
        yield "
            <div class=\"form-group\">
                <label for=\"name\">Nom Complet</label>
                <input type=\"text\" id=\"name\" value=\"";
        // line 33
        yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["reservation_transport"] ?? null), "user", [], "any", false, true, false, 33), "name", [], "any", true, true, false, 33) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["reservation_transport"]) || array_key_exists("reservation_transport", $context) ? $context["reservation_transport"] : (function () { throw new RuntimeError('Variable "reservation_transport" does not exist.', 33, $this->source); })()), "user", [], "any", false, false, false, 33), "name", [], "any", false, false, false, 33)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["reservation_transport"]) || array_key_exists("reservation_transport", $context) ? $context["reservation_transport"] : (function () { throw new RuntimeError('Variable "reservation_transport" does not exist.', 33, $this->source); })()), "user", [], "any", false, false, false, 33), "name", [], "any", false, false, false, 33), "html", null, true)) : (""));
        yield "\" readonly>
            </div>
            <div class=\"form-group\">
                <label for=\"email\">Email</label>
                <input type=\"email\" id=\"email\" value=\"";
        // line 37
        yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["reservation_transport"] ?? null), "user", [], "any", false, true, false, 37), "email", [], "any", true, true, false, 37) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["reservation_transport"]) || array_key_exists("reservation_transport", $context) ? $context["reservation_transport"] : (function () { throw new RuntimeError('Variable "reservation_transport" does not exist.', 37, $this->source); })()), "user", [], "any", false, false, false, 37), "email", [], "any", false, false, false, 37)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["reservation_transport"]) || array_key_exists("reservation_transport", $context) ? $context["reservation_transport"] : (function () { throw new RuntimeError('Variable "reservation_transport" does not exist.', 37, $this->source); })()), "user", [], "any", false, false, false, 37), "email", [], "any", false, false, false, 37), "html", null, true)) : (""));
        yield "\" readonly>
            </div>
            <div class=\"form-group\">
                ";
        // line 40
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 40, $this->source); })()), "dateRes", [], "any", false, false, false, 40), 'label', ["label" => "Date de Début"]);
        yield "
                ";
        // line 41
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 41, $this->source); })()), "dateRes", [], "any", false, false, false, 41), 'widget', ["attr" => ["class" => "form-control", "id" => "date"]]);
        yield "
            </div>
            <div class=\"form-group\">
                ";
        // line 44
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 44, $this->source); })()), "dateFin", [], "any", false, false, false, 44), 'label', ["label" => "Date de Fin"]);
        yield "
                ";
        // line 45
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 45, $this->source); })()), "dateFin", [], "any", false, false, false, 45), 'widget', ["attr" => ["class" => "form-control", "id" => "dateFin"]]);
        yield "
            </div>
            <div class=\"form-group\">
                ";
        // line 48
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 48, $this->source); })()), "nombreVelo", [], "any", false, false, false, 48), 'label', ["label" => "Nombre de Vélos"]);
        yield "
                ";
        // line 49
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 49, $this->source); })()), "nombreVelo", [], "any", false, false, false, 49), 'widget', ["attr" => ["class" => "form-control", "id" => "nombreVelo"]]);
        yield "
            </div>
            
            ";
        // line 53
        yield "            ";
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 53, $this->source); })()), "_token", [], "any", false, false, false, 53), 'row');
        yield "
            
            <div class=\"navigation-buttons\">
                <div></div>
                <button type=\"button\" id=\"next-to-recap\">Continuer au Récapitulatif</button>
            </div>
        ";
        // line 59
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 59, $this->source); })()), 'form_end', ["render_rest" => false]);
        yield "
    </div>
    
    <div class=\"step-content\" id=\"step2-content\">
        <h2>Récapitulatif de la Réservation</h2>
        <div id=\"recap-content\">
            <div class=\"recap-item\">
                <strong>Nom:</strong>
                <span id=\"recap-name\"></span>
            </div>
            <div class=\"recap-item\">
                <strong>Email:</strong>
                <span id=\"recap-email\"></span>
            </div>
            <div class=\"recap-item\">
                <strong>Date de Début:</strong>
                <span id=\"recap-date\"></span>
            </div>
            <div class=\"recap-item\">
                <strong>Date de Fin:</strong>
                <span id=\"recap-dateFin\"></span>
            </div>
            <div class=\"recap-item\">
                <strong>Nombre de Vélos:</strong>
                <span id=\"recap-nombreVelo\"></span>
            </div>
            <div class=\"recap-item\">
                <strong>Station:</strong>
                <span id=\"recap-station\">";
        // line 87
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["reservation_transport"]) || array_key_exists("reservation_transport", $context) ? $context["reservation_transport"] : (function () { throw new RuntimeError('Variable "reservation_transport" does not exist.', 87, $this->source); })()), "station", [], "any", false, false, false, 87), "nom", [], "any", false, false, false, 87), "html", null, true);
        yield "</span>
            </div>
            <div class=\"recap-item\">
                <strong>Référence:</strong>
                <span id=\"recap-reference\">";
        // line 91
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["reservation_transport"]) || array_key_exists("reservation_transport", $context) ? $context["reservation_transport"] : (function () { throw new RuntimeError('Variable "reservation_transport" does not exist.', 91, $this->source); })()), "reference", [], "any", false, false, false, 91), "html", null, true);
        yield "</span>
            </div>
        </div>
        <div class=\"navigation-buttons\">
            <button type=\"button\" class=\"back-button\" id=\"back-to-reservation\">Retour</button>
            <button type=\"button\" id=\"next-to-payment\">Procéder au Paiement</button>
        </div>
    </div>
    
    <div class=\"step-content\" id=\"step3-content\">
        <h2>Détails de Paiement</h2>
        <form id=\"payment-form\">
            <div class=\"form-group\">
                <label>Méthode de Paiement</label>
                <div class=\"payment-method\">
                    <input type=\"radio\" id=\"credit-card\" name=\"payment\" value=\"credit-card\" checked>
                    <label for=\"credit-card\">Carte de Crédit</label>
                </div>
                <div class=\"payment-method\">
                    <input type=\"radio\" id=\"paypal\" name=\"payment\" value=\"paypal\">
                    <label for=\"paypal\">PayPal</label>
                </div>
            </div>
            <div id=\"credit-card-fields\">
                <div class=\"form-group\">
                    <label for=\"card-number\">Numéro de Carte</label>
                    <input type=\"text\" id=\"card-number\" placeholder=\"1234 5678 9012 3456\">
                </div>
                <div class=\"form-group\">
                    <label for=\"card-name\">Nom sur la Carte</label>
                    <input type=\"text\" id=\"card-name\">
                </div>
                <div class=\"form-group\">
                    <label for=\"expiry-date\">Date d'Expiration</label>
                    <input type=\"text\" id=\"expiry-date\" placeholder=\"MM/YY\">
                </div>
                <div class=\"form-group\">
                    <label for=\"cvv\">CVV</label>
                    <input type=\"text\" id=\"cvv\" placeholder=\"123\">
                </div>
            </div>
            <div class=\"navigation-buttons\">
                <button type=\"button\" class=\"back-button\" id=\"back-to-recap\">Retour</button>
                <button type=\"button\" id=\"complete-payment\">Finaliser le Paiement</button>
            </div>
        </form>
    </div>
    
    <div class=\"step-content\" id=\"step4-content\">
        <div class=\"success-message\">
            <div class=\"success-icon\">✓</div>
            <h2>Réservation Confirmée!</h2>
            <p>Merci pour votre réservation. Un email de confirmation a été envoyé à <span id=\"confirmation-email\"></span>.</p>
            <p>Détails de votre réservation:</p>
            <p>Date de début: <span id=\"confirmation-date\"></span></p>
            <p>Date de fin: <span id=\"confirmation-dateFin\"></span></p>
            <p>Nombre de vélos: <span id=\"confirmation-nombreVelo\"></span></p>
            <p>Référence: <span id=\"confirmation-reference\"></span></p>
            <button type=\"button\" id=\"start-over\" style=\"margin-top: 20px;\">Faire une Autre Réservation</button>
        </div>
    </div>
</div>


";
        // line 155
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 162
        yield "



";
        // line 166
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 155
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 156
        yield "
<script>
alert(\"test\");
</script>

";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 166
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

        // line 167
        yield "<style>
   
    .container {
   
        max-width: 800px;
        margin: 0 auto;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 30px;
    }
    
    h1 {
        text-align: center;
        margin-bottom: 30px;
        color: #333;
    }
    
    .steps-container {
        display: flex;
        justify-content: space-between;
        margin-bottom: 40px;
        position: relative;
    }
    
    .steps-container::before {
        content: '';
        position: absolute;
        top: 20px;
        left: 0;
        width: 100%;
        height: 4px;
        background-color: #e0e0e0;
        z-index: 1;
    }
    
    .step {
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
        z-index: 2;
        width: 25%;
    }
    
    .step-number {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: #e0e0e0;
        color: #666;
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight: bold;
        font-size: 18px;
        margin-bottom: 10px;
        transition: all 0.3s ease;
    }
    
    .step-title {
        font-size: 14px;
        color: #666;
        text-align: center;
        transition: all 0.3s ease;
    }
    
    .step.active .step-number {
        background-color: #4CAF50;
        color: white;
    }
    
    .step.active .step-title {
        color: #4CAF50;
        font-weight: bold;
    }
    
    .step.completed .step-number {
        background-color: #4CAF50;
        color: white;
    }
    
    .step-content {
        display: none;
        padding: 20px;
        border: 1px solid #e0e0e0;
        border-radius: 5px;
        margin-bottom: 30px;
    }
    
    .step-content.active {
        display: block;
    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #333;
    }
    
    input, select {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 16px;
    }
    
    button {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 12px 24px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }
    
    button:hover {
        background-color: #45a049;
    }
    
    .navigation-buttons {
        display: flex;
        justify-content: space-between;
    }
    
    .back-button {
        background-color: #f5f5f5;
        color: #333;
    }
    
    .back-button:hover {
        background-color: #e0e0e0;
    }
    
    .recap-item {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
        padding-bottom: 10px;
        border-bottom: 1px solid #eee;
    }
    
    .payment-method {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }
    
    .payment-method input[type=\"radio\"] {
        width: auto;
        margin-right: 10px;
    }
    
    .success-message {
        text-align: center;
        padding: 20px;
    }
    
    .success-icon {
        color: #4CAF50;
        font-size: 60px;
        margin-bottom: 20px;
    }
    
    @media (max-width: 600px) {
        .step-title {
            font-size: 12px;
        }
        
        .steps-container::before {
            top: 15px;
        }
    }
</style>
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
        return "reservation_transport/steps.html.twig";
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
        return array (  305 => 167,  292 => 166,  276 => 156,  263 => 155,  252 => 166,  246 => 162,  244 => 155,  177 => 91,  170 => 87,  139 => 59,  129 => 53,  123 => 49,  119 => 48,  113 => 45,  109 => 44,  103 => 41,  99 => 40,  93 => 37,  86 => 33,  79 => 30,  50 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# templates/reservation_transport/steps.html.twig #}


<div class=\"container\">
    <h1>Réservation de Transport</h1>
    
    <div class=\"steps-container\">
        <div class=\"step active\" id=\"step1\">
            <div class=\"step-number\">1</div>
            <div class=\"step-title\">Réservation</div>
        </div>
        <div class=\"step\" id=\"step2\">
            <div class=\"step-number\">2</div>
            <div class=\"step-title\">Récapitulatif</div>
        </div>
        <div class=\"step\" id=\"step3\">
            <div class=\"step-number\">3</div>
            <div class=\"step-title\">Paiement</div>
        </div>
        <div class=\"step\" id=\"step4\">
            <div class=\"step-number\">4</div>
            <div class=\"step-title\">Confirmation</div>
        </div>
    </div>
    
    <div class=\"step-content active\" id=\"step1-content\">
        <h2>Détails de la Réservation</h2>
        
        {# Utiliser le formulaire Symfony #}
        {{ form_start(form, {'attr': {'id': 'reservation-form'}}) }}
            <div class=\"form-group\">
                <label for=\"name\">Nom Complet</label>
                <input type=\"text\" id=\"name\" value=\"{{ reservation_transport.user.name ?? '' }}\" readonly>
            </div>
            <div class=\"form-group\">
                <label for=\"email\">Email</label>
                <input type=\"email\" id=\"email\" value=\"{{ reservation_transport.user.email ?? '' }}\" readonly>
            </div>
            <div class=\"form-group\">
                {{ form_label(form.dateRes, 'Date de Début') }}
                {{ form_widget(form.dateRes, {'attr': {'class': 'form-control', 'id': 'date'}}) }}
            </div>
            <div class=\"form-group\">
                {{ form_label(form.dateFin, 'Date de Fin') }}
                {{ form_widget(form.dateFin, {'attr': {'class': 'form-control', 'id': 'dateFin'}}) }}
            </div>
            <div class=\"form-group\">
                {{ form_label(form.nombreVelo, 'Nombre de Vélos') }}
                {{ form_widget(form.nombreVelo, {'attr': {'class': 'form-control', 'id': 'nombreVelo'}}) }}
            </div>
            
            {# Champs cachés nécessaires pour le formulaire #}
            {{ form_row(form._token) }}
            
            <div class=\"navigation-buttons\">
                <div></div>
                <button type=\"button\" id=\"next-to-recap\">Continuer au Récapitulatif</button>
            </div>
        {{ form_end(form, {'render_rest': false}) }}
    </div>
    
    <div class=\"step-content\" id=\"step2-content\">
        <h2>Récapitulatif de la Réservation</h2>
        <div id=\"recap-content\">
            <div class=\"recap-item\">
                <strong>Nom:</strong>
                <span id=\"recap-name\"></span>
            </div>
            <div class=\"recap-item\">
                <strong>Email:</strong>
                <span id=\"recap-email\"></span>
            </div>
            <div class=\"recap-item\">
                <strong>Date de Début:</strong>
                <span id=\"recap-date\"></span>
            </div>
            <div class=\"recap-item\">
                <strong>Date de Fin:</strong>
                <span id=\"recap-dateFin\"></span>
            </div>
            <div class=\"recap-item\">
                <strong>Nombre de Vélos:</strong>
                <span id=\"recap-nombreVelo\"></span>
            </div>
            <div class=\"recap-item\">
                <strong>Station:</strong>
                <span id=\"recap-station\">{{ reservation_transport.station.nom }}</span>
            </div>
            <div class=\"recap-item\">
                <strong>Référence:</strong>
                <span id=\"recap-reference\">{{ reservation_transport.reference }}</span>
            </div>
        </div>
        <div class=\"navigation-buttons\">
            <button type=\"button\" class=\"back-button\" id=\"back-to-reservation\">Retour</button>
            <button type=\"button\" id=\"next-to-payment\">Procéder au Paiement</button>
        </div>
    </div>
    
    <div class=\"step-content\" id=\"step3-content\">
        <h2>Détails de Paiement</h2>
        <form id=\"payment-form\">
            <div class=\"form-group\">
                <label>Méthode de Paiement</label>
                <div class=\"payment-method\">
                    <input type=\"radio\" id=\"credit-card\" name=\"payment\" value=\"credit-card\" checked>
                    <label for=\"credit-card\">Carte de Crédit</label>
                </div>
                <div class=\"payment-method\">
                    <input type=\"radio\" id=\"paypal\" name=\"payment\" value=\"paypal\">
                    <label for=\"paypal\">PayPal</label>
                </div>
            </div>
            <div id=\"credit-card-fields\">
                <div class=\"form-group\">
                    <label for=\"card-number\">Numéro de Carte</label>
                    <input type=\"text\" id=\"card-number\" placeholder=\"1234 5678 9012 3456\">
                </div>
                <div class=\"form-group\">
                    <label for=\"card-name\">Nom sur la Carte</label>
                    <input type=\"text\" id=\"card-name\">
                </div>
                <div class=\"form-group\">
                    <label for=\"expiry-date\">Date d'Expiration</label>
                    <input type=\"text\" id=\"expiry-date\" placeholder=\"MM/YY\">
                </div>
                <div class=\"form-group\">
                    <label for=\"cvv\">CVV</label>
                    <input type=\"text\" id=\"cvv\" placeholder=\"123\">
                </div>
            </div>
            <div class=\"navigation-buttons\">
                <button type=\"button\" class=\"back-button\" id=\"back-to-recap\">Retour</button>
                <button type=\"button\" id=\"complete-payment\">Finaliser le Paiement</button>
            </div>
        </form>
    </div>
    
    <div class=\"step-content\" id=\"step4-content\">
        <div class=\"success-message\">
            <div class=\"success-icon\">✓</div>
            <h2>Réservation Confirmée!</h2>
            <p>Merci pour votre réservation. Un email de confirmation a été envoyé à <span id=\"confirmation-email\"></span>.</p>
            <p>Détails de votre réservation:</p>
            <p>Date de début: <span id=\"confirmation-date\"></span></p>
            <p>Date de fin: <span id=\"confirmation-dateFin\"></span></p>
            <p>Nombre de vélos: <span id=\"confirmation-nombreVelo\"></span></p>
            <p>Référence: <span id=\"confirmation-reference\"></span></p>
            <button type=\"button\" id=\"start-over\" style=\"margin-top: 20px;\">Faire une Autre Réservation</button>
        </div>
    </div>
</div>


{% block javascripts %}

<script>
alert(\"test\");
</script>

{% endblock %}




{% block stylesheets %}
<style>
   
    .container {
   
        max-width: 800px;
        margin: 0 auto;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 30px;
    }
    
    h1 {
        text-align: center;
        margin-bottom: 30px;
        color: #333;
    }
    
    .steps-container {
        display: flex;
        justify-content: space-between;
        margin-bottom: 40px;
        position: relative;
    }
    
    .steps-container::before {
        content: '';
        position: absolute;
        top: 20px;
        left: 0;
        width: 100%;
        height: 4px;
        background-color: #e0e0e0;
        z-index: 1;
    }
    
    .step {
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
        z-index: 2;
        width: 25%;
    }
    
    .step-number {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: #e0e0e0;
        color: #666;
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight: bold;
        font-size: 18px;
        margin-bottom: 10px;
        transition: all 0.3s ease;
    }
    
    .step-title {
        font-size: 14px;
        color: #666;
        text-align: center;
        transition: all 0.3s ease;
    }
    
    .step.active .step-number {
        background-color: #4CAF50;
        color: white;
    }
    
    .step.active .step-title {
        color: #4CAF50;
        font-weight: bold;
    }
    
    .step.completed .step-number {
        background-color: #4CAF50;
        color: white;
    }
    
    .step-content {
        display: none;
        padding: 20px;
        border: 1px solid #e0e0e0;
        border-radius: 5px;
        margin-bottom: 30px;
    }
    
    .step-content.active {
        display: block;
    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #333;
    }
    
    input, select {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 16px;
    }
    
    button {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 12px 24px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }
    
    button:hover {
        background-color: #45a049;
    }
    
    .navigation-buttons {
        display: flex;
        justify-content: space-between;
    }
    
    .back-button {
        background-color: #f5f5f5;
        color: #333;
    }
    
    .back-button:hover {
        background-color: #e0e0e0;
    }
    
    .recap-item {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
        padding-bottom: 10px;
        border-bottom: 1px solid #eee;
    }
    
    .payment-method {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }
    
    .payment-method input[type=\"radio\"] {
        width: auto;
        margin-right: 10px;
    }
    
    .success-message {
        text-align: center;
        padding: 20px;
    }
    
    .success-icon {
        color: #4CAF50;
        font-size: 60px;
        margin-bottom: 20px;
    }
    
    @media (max-width: 600px) {
        .step-title {
            font-size: 12px;
        }
        
        .steps-container::before {
            top: 15px;
        }
    }
</style>
{% endblock %}", "reservation_transport/steps.html.twig", "C:\\Users\\MSI\\Desktop\\Airmess_Web\\templates\\reservation_transport\\steps.html.twig");
    }
}
