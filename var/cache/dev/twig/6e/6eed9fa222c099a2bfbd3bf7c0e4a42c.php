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

/* Login/login.html.twig */
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Login/login.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Login/login.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"en\">
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
            /*background: -webkit-linear-gradient(left,rgba(219,138,222,1) 0%, rgba(246,191,159,1) 100%);*/
            background-color:white;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-container {
            background: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            width: 80%;
            max-width: 1200px;
        }
        .login-left {
            background: -webkit-linear-gradient(left, rgba(219,138,222,1) 0%, rgba(246,191,159,1) 100%);
            color: #fff;
            text-align: center;
            border-top-left-radius: 10% 50%;
            border-bottom-left-radius: 10% 50%;
            padding: 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .login-left img {
            width: 25%;
            margin-bottom: 20px;
            animation: mover 1s infinite alternate;
        }
        @keyframes mover {
            0% { transform: translateY(0); }
            100% { transform: translateY(-20px); }
        }
        .login-form {
            padding: 40px;
        }
        .login-heading {
            text-align: center;
            color: #495057;
            margin-bottom: 30px;
        }
        .btnLogin, .btnForgotPassword {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 1.5rem;
            margin-top: 20px;
        }
        .btnLogin {
            background: #0062cc;
            color: #fff;
        }
        .btnLogin:hover {
            background: #0056b3;
        }
        .btnForgotPassword {
            background: #6c757d;
            color: #fff;
        }
        .btnForgotPassword:hover {
            background: #545b62;
        }
        .form-control {
            border-radius: 1.5rem;
            margin-bottom: 15px;
        }
        .password-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
        }
        .register-link {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class=\"container login-container\">
        <div class=\"row\">
            <div class=\"col-md-4 login-left\">
                <img src=\"https://image.ibb.co/n7oTvU/logo_white.png\" alt=\"Logo\">
                <h3>Welcome Back</h3>
                <p>Login to continue earning your own money!</p>
            </div>
            <div class=\"col-md-8\">
                <div class=\"login-form\">
                    <h3 class=\"login-heading\">Login to Your Account</h3>
                    <form>
                        <div class=\"form-group\">
                            <input type=\"email\" class=\"form-control\" placeholder=\"Your Email *\" >
                        </div>
                        <div class=\"form-group\">
                            <input type=\"password\" class=\"form-control\" placeholder=\"Your Password *\" >
                        </div>
                        <div class=\"password-actions\">
                            <div class=\"form-check\">
                                <input type=\"checkbox\" class=\"form-check-input\" id=\"rememberMe\">
                                <label class=\"form-check-label\" for=\"rememberMe\">Remember me</label>
                            </div>
                        </div>
                        

                        <a href=\"";
        // line 119
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_dashVoyageurs");
        yield "\"class=\"btnLogin\" >

                        <input type=\"button\" class=\"btnLogin\" value=\"Login\"></a>

                        <input type=\"button\" class=\"btnForgotPassword\" value=\"Forgot Password\">
                    </form>
                    <div class=\"register-link\">
                        <p>Don't have an account? <a href=\"";
        // line 126
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_signup");
        yield "\">Register Now</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js\"></script>
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
        return "Login/login.html.twig";
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
        return array (  209 => 6,  185 => 126,  175 => 119,  60 => 7,  56 => 6,  49 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
     <title>{% block title %}Airmess{% endblock %}</title>
    <link rel=\"icon\" href=\"{{ asset('images/logo-airmess.png') }}\" type=\"image/png\">

    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css\">
    <style>
        body {
            /*background: -webkit-linear-gradient(left,rgba(219,138,222,1) 0%, rgba(246,191,159,1) 100%);*/
            background-color:white;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-container {
            background: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            width: 80%;
            max-width: 1200px;
        }
        .login-left {
            background: -webkit-linear-gradient(left, rgba(219,138,222,1) 0%, rgba(246,191,159,1) 100%);
            color: #fff;
            text-align: center;
            border-top-left-radius: 10% 50%;
            border-bottom-left-radius: 10% 50%;
            padding: 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .login-left img {
            width: 25%;
            margin-bottom: 20px;
            animation: mover 1s infinite alternate;
        }
        @keyframes mover {
            0% { transform: translateY(0); }
            100% { transform: translateY(-20px); }
        }
        .login-form {
            padding: 40px;
        }
        .login-heading {
            text-align: center;
            color: #495057;
            margin-bottom: 30px;
        }
        .btnLogin, .btnForgotPassword {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 1.5rem;
            margin-top: 20px;
        }
        .btnLogin {
            background: #0062cc;
            color: #fff;
        }
        .btnLogin:hover {
            background: #0056b3;
        }
        .btnForgotPassword {
            background: #6c757d;
            color: #fff;
        }
        .btnForgotPassword:hover {
            background: #545b62;
        }
        .form-control {
            border-radius: 1.5rem;
            margin-bottom: 15px;
        }
        .password-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
        }
        .register-link {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class=\"container login-container\">
        <div class=\"row\">
            <div class=\"col-md-4 login-left\">
                <img src=\"https://image.ibb.co/n7oTvU/logo_white.png\" alt=\"Logo\">
                <h3>Welcome Back</h3>
                <p>Login to continue earning your own money!</p>
            </div>
            <div class=\"col-md-8\">
                <div class=\"login-form\">
                    <h3 class=\"login-heading\">Login to Your Account</h3>
                    <form>
                        <div class=\"form-group\">
                            <input type=\"email\" class=\"form-control\" placeholder=\"Your Email *\" >
                        </div>
                        <div class=\"form-group\">
                            <input type=\"password\" class=\"form-control\" placeholder=\"Your Password *\" >
                        </div>
                        <div class=\"password-actions\">
                            <div class=\"form-check\">
                                <input type=\"checkbox\" class=\"form-check-input\" id=\"rememberMe\">
                                <label class=\"form-check-label\" for=\"rememberMe\">Remember me</label>
                            </div>
                        </div>
                        

                        <a href=\"{{path('app_dashVoyageurs')}}\"class=\"btnLogin\" >

                        <input type=\"button\" class=\"btnLogin\" value=\"Login\"></a>

                        <input type=\"button\" class=\"btnForgotPassword\" value=\"Forgot Password\">
                    </form>
                    <div class=\"register-link\">
                        <p>Don't have an account? <a href=\"{{path('app_signup')}}\">Register Now</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js\"></script>
</body>
</html>
", "Login/login.html.twig", "C:\\Users\\MSI\\Desktop\\Airmess_Web\\templates\\Login\\login.html.twig");
    }
}
