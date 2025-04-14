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

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "reservation_transport/payment.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "reservation_transport/payment.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Paiement de réservation</title>
    <link href=\"//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css\" rel=\"stylesheet\">
    <script src=\"//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js\"></script>
    <script src=\"//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
    
    <style>
        /* Insérez ici les mêmes styles CSS que pour la page de récapitulation */
        /* ... */
        
        /* Styles spécifiques à la page de paiement */
        .payment-form {
            padding: 20px 40px;
        }
        
        .payment-card {
            border: 1px solid #e1e1e1;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }
        
        .card-header {
            border-bottom: 1px solid #e1e1e1;
            padding-bottom: 15px;
            margin-bottom: 20px;
            font-weight: 600;
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
    </style>
</head>
<body>
    <!-- Menu Horizontal -->
    <div class=\"navbar\">
        <a class=\"nav-link\" onclick=\"loadPage('";
        // line 49
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reservation_transport_station");
        yield "')\">Réserver</a>
        <a class=\"nav-link\" onclick=\"loadPage('";
        // line 50
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reservation_transport_index");
        yield "')\">Mes Réservations</a>
        <a class=\"nav-link\" onclick=\"loadPage('";
        // line 51
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reservation_transport_station");
        yield "')\">Stations</a>
        <a class=\"nav-link\" onclick=\"loadPage('";
        // line 52
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reservation_transport_station");
        yield "')\">Discussions</a>
    </div>

    <div class=\"container contact-form\">
        <div class=\"contact-image\">
            <img src=\"";
        // line 57
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
                <div class=\"step-text\">Succès</div>
            </div>
        </div>

        <div class=\"payment-form\">
            <!-- Placeholder pour le formulaire de paiement -->
            <div class=\"payment-details\">
                <div class=\"recap-item\">
                    <div class=\"recap-label\">Référence:</div>
                    <div class=\"recap-value\">";
        // line 85
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["reservation"]) || array_key_exists("reservation", $context) ? $context["reservation"] : (function () { throw new RuntimeError('Variable "reservation" does not exist.', 85, $this->source); })()), "reference", [], "any", false, false, false, 85), "html", null, true);
        yield "</div>
                </div>
                <div class=\"recap-item\">
                    <div class=\"recap-label\">Montant à payer:</div>
                    <div class=\"recap-value\">";
        // line 89
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["reservation"]) || array_key_exists("reservation", $context) ? $context["reservation"] : (function () { throw new RuntimeError('Variable "reservation" does not exist.', 89, $this->source); })()), "prix", [], "any", false, false, false, 89), "html", null, true);
        yield "€</div>
                </div>
            </div>
            
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
                    <input type=\"text\" class=\"form-control\" id=\"cardNumber\" placeholder=\"1234 5678 9012 3456\">
                </div>
                
                <div class=\"row\">
                    <div class=\"col-md-6\">
                        <div class=\"form-group\">
                            <label for=\"expiryDate\">Date d'expiration</label>
                            <input type=\"text\" class=\"form-control\" id=\"expiryDate\" placeholder=\"MM/AA\">
                        </div>
                    </div>
                    <div class=\"col-md-6\">
                        <div class=\"form-group\">
                            <label for=\"cvv\">CVV</label>
                            <input type=\"text\" class=\"form-control\" id=\"cvv\" placeholder=\"123\">
                        </div>
                    </div>
                </div>
                
                <div class=\"form-group\">
                    <label for=\"cardHolder\">Nom du titulaire</label>
                    <input type=\"text\" class=\"form-control\" id=\"cardHolder\" placeholder=\"NOM Prénom\">
                </div>
            </div>
            
            <div class=\"button-group\">
                <button type=\"button\" onclick=\"window.history.back()\" class=\"btnn btn-back\">Retour</button>
                <button type=\"button\" onclick=\"processPayment()\" class=\"btnn btn-confirm\">Payer maintenant</button>
            </div>
        </div>
    </div>

    <script>
        function loadPage(url) {
            window.location.href = url;
        }
        
        function processPayment() {
            // Simuler le traitement du paiement
            alert('Paiement traité avec succès!');
            // Dans une application réelle, vous enverriez les données de paiement au serveur
            window.location.href = '";
        // line 155
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reservation_transport_index");
        yield "';
        }
    </script>
</body>
</html>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

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
        return array (  225 => 155,  156 => 89,  149 => 85,  118 => 57,  110 => 52,  106 => 51,  102 => 50,  98 => 49,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Paiement de réservation</title>
    <link href=\"//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css\" rel=\"stylesheet\">
    <script src=\"//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js\"></script>
    <script src=\"//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
    
    <style>
        /* Insérez ici les mêmes styles CSS que pour la page de récapitulation */
        /* ... */
        
        /* Styles spécifiques à la page de paiement */
        .payment-form {
            padding: 20px 40px;
        }
        
        .payment-card {
            border: 1px solid #e1e1e1;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }
        
        .card-header {
            border-bottom: 1px solid #e1e1e1;
            padding-bottom: 15px;
            margin-bottom: 20px;
            font-weight: 600;
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
    </style>
</head>
<body>
    <!-- Menu Horizontal -->
    <div class=\"navbar\">
        <a class=\"nav-link\" onclick=\"loadPage('{{ path('app_reservation_transport_station') }}')\">Réserver</a>
        <a class=\"nav-link\" onclick=\"loadPage('{{ path('app_reservation_transport_index') }}')\">Mes Réservations</a>
        <a class=\"nav-link\" onclick=\"loadPage('{{ path('app_reservation_transport_station') }}')\">Stations</a>
        <a class=\"nav-link\" onclick=\"loadPage('{{ path('app_reservation_transport_station') }}')\">Discussions</a>
    </div>

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
                <div class=\"step-text\">Succès</div>
            </div>
        </div>

        <div class=\"payment-form\">
            <!-- Placeholder pour le formulaire de paiement -->
            <div class=\"payment-details\">
                <div class=\"recap-item\">
                    <div class=\"recap-label\">Référence:</div>
                    <div class=\"recap-value\">{{ reservation.reference }}</div>
                </div>
                <div class=\"recap-item\">
                    <div class=\"recap-label\">Montant à payer:</div>
                    <div class=\"recap-value\">{{ reservation.prix }}€</div>
                </div>
            </div>
            
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
                    <input type=\"text\" class=\"form-control\" id=\"cardNumber\" placeholder=\"1234 5678 9012 3456\">
                </div>
                
                <div class=\"row\">
                    <div class=\"col-md-6\">
                        <div class=\"form-group\">
                            <label for=\"expiryDate\">Date d'expiration</label>
                            <input type=\"text\" class=\"form-control\" id=\"expiryDate\" placeholder=\"MM/AA\">
                        </div>
                    </div>
                    <div class=\"col-md-6\">
                        <div class=\"form-group\">
                            <label for=\"cvv\">CVV</label>
                            <input type=\"text\" class=\"form-control\" id=\"cvv\" placeholder=\"123\">
                        </div>
                    </div>
                </div>
                
                <div class=\"form-group\">
                    <label for=\"cardHolder\">Nom du titulaire</label>
                    <input type=\"text\" class=\"form-control\" id=\"cardHolder\" placeholder=\"NOM Prénom\">
                </div>
            </div>
            
            <div class=\"button-group\">
                <button type=\"button\" onclick=\"window.history.back()\" class=\"btnn btn-back\">Retour</button>
                <button type=\"button\" onclick=\"processPayment()\" class=\"btnn btn-confirm\">Payer maintenant</button>
            </div>
        </div>
    </div>

    <script>
        function loadPage(url) {
            window.location.href = url;
        }
        
        function processPayment() {
            // Simuler le traitement du paiement
            alert('Paiement traité avec succès!');
            // Dans une application réelle, vous enverriez les données de paiement au serveur
            window.location.href = '{{ path(\"app_reservation_transport_index\") }}';
        }
    </script>
</body>
</html>", "reservation_transport/payment.html.twig", "C:\\Users\\MSI\\Desktop\\Airmess_Web\\templates\\reservation_transport\\payment.html.twig");
    }
}
