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

/* login/login.html.twig */
class __TwigTemplate_8f6abf0e2e861db14576cdf20ae61060 extends Template
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
            'title' => [$this, 'block_title'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "login/login.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "login/login.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>";
        // line 6
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield "</title>
    <link rel=\"icon\" href=\"";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/logo-airmess.png"), "html", null, true);
        yield "\" type=\"image/png\">
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css\">
    <style>
        body {
            background: linear-gradient(to right, #a1c4fd, #fbc2eb);
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .main-container {
            background-color: white;
            border-radius: 50px;
            width: 1000px;
            height: 600px;
            position: relative;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .right-panel {
            background-color: #f0f5f9;
            border-radius: 50px;
            height: 100%;
            position: absolute;
            right: 0;
            width: 414px;
        }
        .login-form {
            padding: 40px 60px;
            max-width: 500px;
            position: relative;
        }
        .login-heading {
            font-size: 40px;
            color: #406dab;
            margin-bottom: 30px;
            font-weight: bold;
            margin-top: 50px;
            text-align: right;
            padding-right: 70px;
        }
        .form-label {
            color: #1b56a4;
            font-weight: 500;
            margin-bottom: 5px;
        }
        .form-control {
            background-color: #f0f5f9;
            border-radius: 50px;
            margin-bottom: 20px;
            padding: 12px 15px;
            border: none;
            height: 45px;
        }
        .password-field-container {
            position: relative;
        }
        .password-toggle-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #9c9898;
        }
        .btnLogin {
            width: 240px;
            height: 45px;
            border: none;
            border-radius: 50px;
            margin-top: 20px;
            background: linear-gradient(135deg, #7589ff 0%, #ff9db4 100%);
            color: #fff;
            font-weight: 600;
            font-size: 18px;
            transition: all 0.3s;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        .btnLogin:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }
        .social-login {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .social-login a {
            margin: 0 15px;
            display: inline-block;
        }
        .social-login img {
            width: 40px;
            height: 40px;
        }
        .register-link {
            text-align: center;
            margin-top: 15px;
            color: #9c9898;
        }
        .form-group {
            position: relative;
            margin-bottom: 25px;
        }
        .forgot-password {
            position: absolute;
            top: 0;
            right: 0;
        }
        .forgot-password a {
            color: #9c9898;
            text-decoration: none;
            background: none;
            border: none;
            padding: 0;
            cursor: pointer;
        }
        .register-link a {
            color: palevioletred;
            text-decoration: none;
            background: none;
            border: none;
            padding: 0;
            cursor: pointer;
        }
        .or-continue {
            text-align: center;
            color: #9c9898;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .logo-container {
            position: absolute;
            top: 14px;
            left: 38px;
        }
        .logo-text {
            position: absolute;
            top: 41px;
            left: 134px;
        }
        .character-image {
            position: absolute;
            right: 180px;
            top: 53px;
            height: 441px;
            width: 310px;
            object-fit: contain;
        }
        .right-character {
            position: absolute;
            left: 130px;
            top: 49px;
            height: 454px;
            width: 185px;
            object-fit: contain;
        }
        .field-error {
            color: #dc3545;
            font-size: 0.85rem;
            margin-top: 5px;
            display: none;
        }
        .field-error.d-block {
            display: block;
        }
        .is-invalid {
            border: 1px solid #dc3545 !important;
        }
    </style>
</head>
<body>
    <div class=\"main-container\">
        <div class=\"right-panel\">
            <img src=\"";
        // line 184
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/475494119_1136555244298328_1961476089771408060_n\$\$.png"), "html", null, true);
        yield "\" alt=\"3D character\" class=\"right-character\" 
                 onerror=\"this.src='https://img.freepik.com/free-vector/3d-female-character-carrying-shopping-bags_23-2148938912.jpg?size=626&ext=jpg'\">
        </div>
        
        <div class=\"logo-container\">
            <img src=\"";
        // line 189
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/logo-airmess.png"), "html", null, true);
        yield "\" alt=\"Logo\" width=\"50\" height=\"50\"
                 onerror=\"this.src='https://cdn-icons-png.flaticon.com/512/1830/1830844.png'\">
        </div>
        
        <div class=\"logo-text\">
            <img src=\"";
        // line 194
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/AirMess-text.png"), "html", null, true);
        yield "\" alt=\"Logo text\" width=\"110\" height=\"80\"
                 onerror=\"this.src='https://via.placeholder.com/200x150?text=AirMess'\">
        </div>
        
        <img src=\"";
        // line 198
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/3d-casual-life-young-man-holding-paper-map.png"), "html", null, true);
        yield "\" alt=\"Character\" class=\"character-image\"
             onerror=\"this.src='https://img.freepik.com/free-vector/3d-cartoon-young-man-holding-map_438355-777.jpg'\">
        
        <div class=\"login-form\">
            <h2 class=\"login-heading\">S'identifier</h2>
            
            ";
        // line 204
        if ((array_key_exists("error", $context) && (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 204, $this->source); })()))) {
            // line 205
            yield "                <div class=\"alert alert-danger\">
                    ";
            // line 206
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 206, $this->source); })()), "html", null, true);
            yield "
                </div>
            ";
        }
        // line 209
        yield "            
            ";
        // line 210
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 210, $this->source); })()), "flashes", ["error"], "method", false, false, false, 210));
        foreach ($context['_seq'] as $context["_key"] => $context["flash_error"]) {
            // line 211
            yield "                <div class=\"alert alert-danger\">
                    ";
            // line 212
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["flash_error"], "html", null, true);
            yield "
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['flash_error'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 215
        yield "            
            <form action=\"";
        // line 216
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("login");
        yield "\" method=\"post\" id=\"login-form\" novalidate>
                <div class=\"form-group\">
                    <label class=\"form-label\">Email</label>
                    <input type=\"email\" name=\"email\" class=\"form-control\" value=\"";
        // line 219
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("last_username", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["last_username"]) || array_key_exists("last_username", $context) ? $context["last_username"] : (function () { throw new RuntimeError('Variable "last_username" does not exist.', 219, $this->source); })()), "")) : ("")), "html", null, true);
        yield "\">
                    <div id=\"email-error\" class=\"field-error\">
                        <!-- Client-side validation error will appear here -->
                    </div>
                </div>
                <div class=\"form-group\">
                    <label class=\"form-label\">Mot de passe</label>
                    <div class=\"forgot-password\">
                        <a href=\"";
        // line 227
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("login");
        yield "\">Mot de passe oublié ?</a>
                    </div>
                    <div class=\"password-field-container\">
                        <input type=\"password\" name=\"password\" id=\"password-field\" class=\"form-control\">
                        <i class=\"password-toggle-icon fa fa-eye-slash\" id=\"togglePassword\"></i>
                    </div>
                    <div id=\"password-error\" class=\"field-error\">
                        <!-- Client-side validation error will appear here -->
                    </div>
                </div>
                
                <button type=\"submit\" class=\"btnLogin\">S'identifier</button>
                
                <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 240
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::default($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("authenticate"), ""), "html", null, true);
        yield "\">
            </form>

            <div class=\"or-continue\">ou continuer avec</div>
            
            <div class=\"social-login\">
                <a href=\"#\"><img src=\"";
        // line 246
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/google-logo.svg"), "html", null, true);
        yield "\" alt=\"Google\" 
                   onerror=\"this.src='https://upload.wikimedia.org/wikipedia/commons/c/c1/Google_%22G%22_logo.svg'\"></a>
                <a href=\"#\"><img src=\"https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg\" alt=\"Facebook\"></a>
            </div>
            
            <div class=\"register-link\">
                <span>Vous n'avez pas encore de compte ?</span>
                <a href=\"";
        // line 253
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_signup");
        yield "\">Inscrivez-vous gratuitement</a>
            </div>
        </div>
    </div>

    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js\"></script>
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css\">
    <script>
        \$(document).ready(function(){
            // Toggle password visibility
            \$('#togglePassword').click(function(){
                const passwordField = \$('#password-field');
                const type = passwordField.attr('type') === 'password' ? 'text' : 'password';
                passwordField.attr('type', type);
                
                // Toggle eye icon
                \$(this).toggleClass('fa-eye-slash fa-eye');
            });
            
            // Helper function to show field error
            function showFieldError(fieldName, message) {
                const errorElement = \$('#' + fieldName + '-error');
                errorElement.text(message).addClass('d-block');
                \$('input[name=\"' + fieldName + '\"]').addClass('is-invalid');
            }
            
            // Clear all errors in the form
            function clearFormErrors() {
                \$('.field-error').removeClass('d-block').text('');
                \$('.form-control').removeClass('is-invalid');
            }
            
            // Form validation
            \$('#login-form').on('submit', function(e) {
                let isValid = true;
                
                // Clear previous errors
                clearFormErrors();
                
                const email = \$('input[name=\"email\"]').val().trim();
                const password = \$('#password-field').val();
                
                // Validate email
                if (!email) {
                    showFieldError('email', 'Veuillez entrer votre adresse email.');
                    isValid = false;
                } else {
                    const emailRegex = /^[^\\s@]+@[^\\s@]+\\.[^\\s@]+\$/;
                    if (!emailRegex.test(email)) {
                        showFieldError('email', 'Veuillez entrer une adresse email valide.');
                        isValid = false;
                    }
                }
                
                // Validate password
                if (!password) {
                    showFieldError('password', 'Veuillez entrer votre mot de passe.');
                    isValid = false;
                }
                
                if (!isValid) {
                    e.preventDefault();
                }
            });
        });
    </script>
</body>
</html>

";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 6
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

        yield "Airmess";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "login/login.html.twig";
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
        return array (  440 => 6,  357 => 253,  347 => 246,  338 => 240,  322 => 227,  311 => 219,  305 => 216,  302 => 215,  293 => 212,  290 => 211,  286 => 210,  283 => 209,  277 => 206,  274 => 205,  272 => 204,  263 => 198,  256 => 194,  248 => 189,  240 => 184,  60 => 7,  56 => 6,  49 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>{% block title %}Airmess{% endblock %}</title>
    <link rel=\"icon\" href=\"{{ asset('images/logo-airmess.png') }}\" type=\"image/png\">
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css\">
    <style>
        body {
            background: linear-gradient(to right, #a1c4fd, #fbc2eb);
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .main-container {
            background-color: white;
            border-radius: 50px;
            width: 1000px;
            height: 600px;
            position: relative;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .right-panel {
            background-color: #f0f5f9;
            border-radius: 50px;
            height: 100%;
            position: absolute;
            right: 0;
            width: 414px;
        }
        .login-form {
            padding: 40px 60px;
            max-width: 500px;
            position: relative;
        }
        .login-heading {
            font-size: 40px;
            color: #406dab;
            margin-bottom: 30px;
            font-weight: bold;
            margin-top: 50px;
            text-align: right;
            padding-right: 70px;
        }
        .form-label {
            color: #1b56a4;
            font-weight: 500;
            margin-bottom: 5px;
        }
        .form-control {
            background-color: #f0f5f9;
            border-radius: 50px;
            margin-bottom: 20px;
            padding: 12px 15px;
            border: none;
            height: 45px;
        }
        .password-field-container {
            position: relative;
        }
        .password-toggle-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #9c9898;
        }
        .btnLogin {
            width: 240px;
            height: 45px;
            border: none;
            border-radius: 50px;
            margin-top: 20px;
            background: linear-gradient(135deg, #7589ff 0%, #ff9db4 100%);
            color: #fff;
            font-weight: 600;
            font-size: 18px;
            transition: all 0.3s;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        .btnLogin:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }
        .social-login {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .social-login a {
            margin: 0 15px;
            display: inline-block;
        }
        .social-login img {
            width: 40px;
            height: 40px;
        }
        .register-link {
            text-align: center;
            margin-top: 15px;
            color: #9c9898;
        }
        .form-group {
            position: relative;
            margin-bottom: 25px;
        }
        .forgot-password {
            position: absolute;
            top: 0;
            right: 0;
        }
        .forgot-password a {
            color: #9c9898;
            text-decoration: none;
            background: none;
            border: none;
            padding: 0;
            cursor: pointer;
        }
        .register-link a {
            color: palevioletred;
            text-decoration: none;
            background: none;
            border: none;
            padding: 0;
            cursor: pointer;
        }
        .or-continue {
            text-align: center;
            color: #9c9898;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .logo-container {
            position: absolute;
            top: 14px;
            left: 38px;
        }
        .logo-text {
            position: absolute;
            top: 41px;
            left: 134px;
        }
        .character-image {
            position: absolute;
            right: 180px;
            top: 53px;
            height: 441px;
            width: 310px;
            object-fit: contain;
        }
        .right-character {
            position: absolute;
            left: 130px;
            top: 49px;
            height: 454px;
            width: 185px;
            object-fit: contain;
        }
        .field-error {
            color: #dc3545;
            font-size: 0.85rem;
            margin-top: 5px;
            display: none;
        }
        .field-error.d-block {
            display: block;
        }
        .is-invalid {
            border: 1px solid #dc3545 !important;
        }
    </style>
</head>
<body>
    <div class=\"main-container\">
        <div class=\"right-panel\">
            <img src=\"{{ asset('images/475494119_1136555244298328_1961476089771408060_n\$\$.png') }}\" alt=\"3D character\" class=\"right-character\" 
                 onerror=\"this.src='https://img.freepik.com/free-vector/3d-female-character-carrying-shopping-bags_23-2148938912.jpg?size=626&ext=jpg'\">
        </div>
        
        <div class=\"logo-container\">
            <img src=\"{{ asset('images/logo-airmess.png') }}\" alt=\"Logo\" width=\"50\" height=\"50\"
                 onerror=\"this.src='https://cdn-icons-png.flaticon.com/512/1830/1830844.png'\">
        </div>
        
        <div class=\"logo-text\">
            <img src=\"{{ asset('images/AirMess-text.png') }}\" alt=\"Logo text\" width=\"110\" height=\"80\"
                 onerror=\"this.src='https://via.placeholder.com/200x150?text=AirMess'\">
        </div>
        
        <img src=\"{{ asset('images/3d-casual-life-young-man-holding-paper-map.png') }}\" alt=\"Character\" class=\"character-image\"
             onerror=\"this.src='https://img.freepik.com/free-vector/3d-cartoon-young-man-holding-map_438355-777.jpg'\">
        
        <div class=\"login-form\">
            <h2 class=\"login-heading\">S'identifier</h2>
            
            {% if error is defined and error %}
                <div class=\"alert alert-danger\">
                    {{ error }}
                </div>
            {% endif %}
            
            {% for flash_error in app.flashes('error') %}
                <div class=\"alert alert-danger\">
                    {{ flash_error }}
                </div>
            {% endfor %}
            
            <form action=\"{{ path('login') }}\" method=\"post\" id=\"login-form\" novalidate>
                <div class=\"form-group\">
                    <label class=\"form-label\">Email</label>
                    <input type=\"email\" name=\"email\" class=\"form-control\" value=\"{{ last_username|default('') }}\">
                    <div id=\"email-error\" class=\"field-error\">
                        <!-- Client-side validation error will appear here -->
                    </div>
                </div>
                <div class=\"form-group\">
                    <label class=\"form-label\">Mot de passe</label>
                    <div class=\"forgot-password\">
                        <a href=\"{{ path('login') }}\">Mot de passe oublié ?</a>
                    </div>
                    <div class=\"password-field-container\">
                        <input type=\"password\" name=\"password\" id=\"password-field\" class=\"form-control\">
                        <i class=\"password-toggle-icon fa fa-eye-slash\" id=\"togglePassword\"></i>
                    </div>
                    <div id=\"password-error\" class=\"field-error\">
                        <!-- Client-side validation error will appear here -->
                    </div>
                </div>
                
                <button type=\"submit\" class=\"btnLogin\">S'identifier</button>
                
                <input type=\"hidden\" name=\"_csrf_token\" value=\"{{ csrf_token('authenticate')|default('') }}\">
            </form>

            <div class=\"or-continue\">ou continuer avec</div>
            
            <div class=\"social-login\">
                <a href=\"#\"><img src=\"{{ asset('images/google-logo.svg') }}\" alt=\"Google\" 
                   onerror=\"this.src='https://upload.wikimedia.org/wikipedia/commons/c/c1/Google_%22G%22_logo.svg'\"></a>
                <a href=\"#\"><img src=\"https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg\" alt=\"Facebook\"></a>
            </div>
            
            <div class=\"register-link\">
                <span>Vous n'avez pas encore de compte ?</span>
                <a href=\"{{path('app_signup')}}\">Inscrivez-vous gratuitement</a>
            </div>
        </div>
    </div>

    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js\"></script>
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css\">
    <script>
        \$(document).ready(function(){
            // Toggle password visibility
            \$('#togglePassword').click(function(){
                const passwordField = \$('#password-field');
                const type = passwordField.attr('type') === 'password' ? 'text' : 'password';
                passwordField.attr('type', type);
                
                // Toggle eye icon
                \$(this).toggleClass('fa-eye-slash fa-eye');
            });
            
            // Helper function to show field error
            function showFieldError(fieldName, message) {
                const errorElement = \$('#' + fieldName + '-error');
                errorElement.text(message).addClass('d-block');
                \$('input[name=\"' + fieldName + '\"]').addClass('is-invalid');
            }
            
            // Clear all errors in the form
            function clearFormErrors() {
                \$('.field-error').removeClass('d-block').text('');
                \$('.form-control').removeClass('is-invalid');
            }
            
            // Form validation
            \$('#login-form').on('submit', function(e) {
                let isValid = true;
                
                // Clear previous errors
                clearFormErrors();
                
                const email = \$('input[name=\"email\"]').val().trim();
                const password = \$('#password-field').val();
                
                // Validate email
                if (!email) {
                    showFieldError('email', 'Veuillez entrer votre adresse email.');
                    isValid = false;
                } else {
                    const emailRegex = /^[^\\s@]+@[^\\s@]+\\.[^\\s@]+\$/;
                    if (!emailRegex.test(email)) {
                        showFieldError('email', 'Veuillez entrer une adresse email valide.');
                        isValid = false;
                    }
                }
                
                // Validate password
                if (!password) {
                    showFieldError('password', 'Veuillez entrer votre mot de passe.');
                    isValid = false;
                }
                
                if (!isValid) {
                    e.preventDefault();
                }
            });
        });
    </script>
</body>
</html>

", "login/login.html.twig", "C:\\Users\\MSI\\Desktop\\Airmess_Web\\templates\\Login\\login.html.twig");
    }
}
