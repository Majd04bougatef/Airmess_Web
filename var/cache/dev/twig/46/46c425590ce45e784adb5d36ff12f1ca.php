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

/* Login/sign-up.html.twig */
class __TwigTemplate_05e2e632abf5fac648db28c444183874 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Login/sign-up.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Login/sign-up.html.twig"));

        // line 1
        yield "<html>
<head>
<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css\"><script src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script><script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js\"></script><script src=\"https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js\"></script>
<style>

.register{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
    margin-top: 3%;
    padding: 3%;
}
.register-left{
    text-align: center;
    color: #fff;
    margin-top: 4%;
}
.register-left input{
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    width: 60%;
    background: #f8f9fa;
    font-weight: bold;
    color: #383d41;
    margin-top: 30%;
    margin-bottom: 3%;
    cursor: pointer;
}
.register-right{
    background: #f8f9fa;
    border-top-left-radius: 10% 50%;
    border-bottom-left-radius: 10% 50%;
}
.register-left img{
    margin-top: 15%;
    margin-bottom: 5%;
    width: 25%;
    -webkit-animation: mover 2s infinite  alternate;
    animation: mover 1s infinite  alternate;
}
@-webkit-keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
@keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
.register-left p{
    font-weight: lighter;
    padding: 12%;
    margin-top: -9%;
}
.register .register-form{
    padding: 10%;
    margin-top: 10%;
}
.btnRegister{
    float: right;
    margin-top: 10%;
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    background: #0062cc;
    color: #fff;
    font-weight: 600;
    width: 50%;
    cursor: pointer;
}
.register .nav-tabs{
    margin-top: 3%;
    border: none;
    background: #0062cc;
    border-radius: 1.5rem;
    width: 28%;
    float: right;
}
.register .nav-tabs .nav-link{
    padding: 2%;
    height: 34px;
    font-weight: 600;
    color: #fff;
    border-top-right-radius: 1.5rem;
    border-bottom-right-radius: 1.5rem;
}
.register .nav-tabs .nav-link:hover{
    border: none;
}
.register .nav-tabs .nav-link.active{
    width: 100px;
    color: #0062cc;
    border: 2px solid #0062cc;
    border-top-left-radius: 1.5rem;
    border-bottom-left-radius: 1.5rem;
}
.register-heading{
    text-align: center;
    margin-top: 8%;
    margin-bottom: -15%;
    color: #495057;
}</style>
</head>
<body>
<div class=\"container register\">
                <div class=\"row\">
                    <div class=\"col-md-3 register-left\">
                        <img src=\"https://image.ibb.co/n7oTvU/logo_white.png\" alt=\"\">
                        <h3>Welcome</h3>
                        <p>You are 30 seconds away from earning your own money!</p>
                        <a href=\"";
        // line 109
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
        yield "\" class=\"btn btn-light\">Login</a> <!-- Remplacement de l'input -->
                    </div>

                    <div class=\"col-md-9 register-right\">
                        <ul class=\"nav nav-tabs nav-justified\" id=\"myTab\" role=\"tablist\">
                            <li class=\"nav-item\">
                                <a class=\"nav-link active\" id=\"home-tab\" data-toggle=\"tab\" href=\"#home\" role=\"tab\" aria-controls=\"home\" aria-selected=\"true\">Employee</a>
                            </li>
                            <li class=\"nav-item\">
                                <a class=\"nav-link\" id=\"profile-tab\" data-toggle=\"tab\" href=\"#profile\" role=\"tab\" aria-controls=\"profile\" aria-selected=\"false\">Hirer</a>
                            </li>
                        </ul>
                        <div class=\"tab-content\" id=\"myTabContent\">
                            <div class=\"tab-pane fade show active\" id=\"home\" role=\"tabpanel\" aria-labelledby=\"home-tab\">
                                <h3 class=\"register-heading\">Apply as a Employee</h3>
                                <div class=\"row register-form\">
                                    <div class=\"col-md-6\">
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"First Name *\" value=\"\">
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"Last Name *\" value=\"\">
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"password\" class=\"form-control\" placeholder=\"Password *\" value=\"\">
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"password\" class=\"form-control\" placeholder=\"Confirm Password *\" value=\"\">
                                        </div>
                                        <div class=\"form-group\">
                                            <div class=\"maxl\">
                                                <label class=\"radio inline\"> 
                                                    <input type=\"radio\" name=\"gender\" value=\"male\" checked=\"\">
                                                    <span> Male </span> 
                                                </label>
                                                <label class=\"radio inline\"> 
                                                    <input type=\"radio\" name=\"gender\" value=\"female\">
                                                    <span>Female </span> 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=\"col-md-6\">
                                        <div class=\"form-group\">
                                            <input type=\"email\" class=\"form-control\" placeholder=\"Your Email *\" value=\"\">
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" minlength=\"10\" maxlength=\"10\" name=\"txtEmpPhone\" class=\"form-control\" placeholder=\"Your Phone *\" value=\"\">
                                        </div>
                                        <div class=\"form-group\">
                                            <select class=\"form-control\">
                                                <option class=\"hidden\" selected=\"\" disabled=\"\">Please select your Sequrity Question</option>
                                                <option>What is your Birthdate?</option>
                                                <option>What is Your old Phone Number</option>
                                                <option>What is your Pet Name?</option>
                                            </select>
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"Enter Your Answer *\" value=\"\">
                                        </div>
                                        <input type=\"submit\" class=\"btnRegister\" value=\"Register\">
                                    </div>
                                </div>
                            </div>
                            <div class=\"tab-pane fade show\" id=\"profile\" role=\"tabpanel\" aria-labelledby=\"profile-tab\">
                                <h3 class=\"register-heading\">Apply as a Hirer</h3>
                                <div class=\"row register-form\">
                                    <div class=\"col-md-6\">
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"First Name *\" value=\"\">
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"Last Name *\" value=\"\">
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"email\" class=\"form-control\" placeholder=\"Email *\" value=\"\">
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" maxlength=\"10\" minlength=\"10\" class=\"form-control\" placeholder=\"Phone *\" value=\"\">
                                        </div>


                                    </div>
                                    <div class=\"col-md-6\">
                                        <div class=\"form-group\">
                                            <input type=\"password\" class=\"form-control\" placeholder=\"Password *\" value=\"\">
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"password\" class=\"form-control\" placeholder=\"Confirm Password *\" value=\"\">
                                        </div>
                                        <div class=\"form-group\">
                                            <select class=\"form-control\">
                                                <option class=\"hidden\" selected=\"\" disabled=\"\">Please select your Sequrity Question</option>
                                                <option>What is your Birthdate?</option>
                                                <option>What is Your old Phone Number</option>
                                                <option>What is your Pet Name?</option>
                                            </select>
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"`Answer *\" value=\"\">
                                        </div>
                                        <input type=\"submit\" class=\"btnRegister\" value=\"Register\">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>                            
            <script type=\"text/javascript\">
            
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
        return "Login/sign-up.html.twig";
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
        return array (  158 => 109,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<html>
<head>
<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css\"><script src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script><script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js\"></script><script src=\"https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js\"></script>
<style>

.register{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
    margin-top: 3%;
    padding: 3%;
}
.register-left{
    text-align: center;
    color: #fff;
    margin-top: 4%;
}
.register-left input{
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    width: 60%;
    background: #f8f9fa;
    font-weight: bold;
    color: #383d41;
    margin-top: 30%;
    margin-bottom: 3%;
    cursor: pointer;
}
.register-right{
    background: #f8f9fa;
    border-top-left-radius: 10% 50%;
    border-bottom-left-radius: 10% 50%;
}
.register-left img{
    margin-top: 15%;
    margin-bottom: 5%;
    width: 25%;
    -webkit-animation: mover 2s infinite  alternate;
    animation: mover 1s infinite  alternate;
}
@-webkit-keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
@keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
.register-left p{
    font-weight: lighter;
    padding: 12%;
    margin-top: -9%;
}
.register .register-form{
    padding: 10%;
    margin-top: 10%;
}
.btnRegister{
    float: right;
    margin-top: 10%;
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    background: #0062cc;
    color: #fff;
    font-weight: 600;
    width: 50%;
    cursor: pointer;
}
.register .nav-tabs{
    margin-top: 3%;
    border: none;
    background: #0062cc;
    border-radius: 1.5rem;
    width: 28%;
    float: right;
}
.register .nav-tabs .nav-link{
    padding: 2%;
    height: 34px;
    font-weight: 600;
    color: #fff;
    border-top-right-radius: 1.5rem;
    border-bottom-right-radius: 1.5rem;
}
.register .nav-tabs .nav-link:hover{
    border: none;
}
.register .nav-tabs .nav-link.active{
    width: 100px;
    color: #0062cc;
    border: 2px solid #0062cc;
    border-top-left-radius: 1.5rem;
    border-bottom-left-radius: 1.5rem;
}
.register-heading{
    text-align: center;
    margin-top: 8%;
    margin-bottom: -15%;
    color: #495057;
}</style>
</head>
<body>
<div class=\"container register\">
                <div class=\"row\">
                    <div class=\"col-md-3 register-left\">
                        <img src=\"https://image.ibb.co/n7oTvU/logo_white.png\" alt=\"\">
                        <h3>Welcome</h3>
                        <p>You are 30 seconds away from earning your own money!</p>
                        <a href=\"{{path('app_login')}}\" class=\"btn btn-light\">Login</a> <!-- Remplacement de l'input -->
                    </div>

                    <div class=\"col-md-9 register-right\">
                        <ul class=\"nav nav-tabs nav-justified\" id=\"myTab\" role=\"tablist\">
                            <li class=\"nav-item\">
                                <a class=\"nav-link active\" id=\"home-tab\" data-toggle=\"tab\" href=\"#home\" role=\"tab\" aria-controls=\"home\" aria-selected=\"true\">Employee</a>
                            </li>
                            <li class=\"nav-item\">
                                <a class=\"nav-link\" id=\"profile-tab\" data-toggle=\"tab\" href=\"#profile\" role=\"tab\" aria-controls=\"profile\" aria-selected=\"false\">Hirer</a>
                            </li>
                        </ul>
                        <div class=\"tab-content\" id=\"myTabContent\">
                            <div class=\"tab-pane fade show active\" id=\"home\" role=\"tabpanel\" aria-labelledby=\"home-tab\">
                                <h3 class=\"register-heading\">Apply as a Employee</h3>
                                <div class=\"row register-form\">
                                    <div class=\"col-md-6\">
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"First Name *\" value=\"\">
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"Last Name *\" value=\"\">
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"password\" class=\"form-control\" placeholder=\"Password *\" value=\"\">
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"password\" class=\"form-control\" placeholder=\"Confirm Password *\" value=\"\">
                                        </div>
                                        <div class=\"form-group\">
                                            <div class=\"maxl\">
                                                <label class=\"radio inline\"> 
                                                    <input type=\"radio\" name=\"gender\" value=\"male\" checked=\"\">
                                                    <span> Male </span> 
                                                </label>
                                                <label class=\"radio inline\"> 
                                                    <input type=\"radio\" name=\"gender\" value=\"female\">
                                                    <span>Female </span> 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=\"col-md-6\">
                                        <div class=\"form-group\">
                                            <input type=\"email\" class=\"form-control\" placeholder=\"Your Email *\" value=\"\">
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" minlength=\"10\" maxlength=\"10\" name=\"txtEmpPhone\" class=\"form-control\" placeholder=\"Your Phone *\" value=\"\">
                                        </div>
                                        <div class=\"form-group\">
                                            <select class=\"form-control\">
                                                <option class=\"hidden\" selected=\"\" disabled=\"\">Please select your Sequrity Question</option>
                                                <option>What is your Birthdate?</option>
                                                <option>What is Your old Phone Number</option>
                                                <option>What is your Pet Name?</option>
                                            </select>
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"Enter Your Answer *\" value=\"\">
                                        </div>
                                        <input type=\"submit\" class=\"btnRegister\" value=\"Register\">
                                    </div>
                                </div>
                            </div>
                            <div class=\"tab-pane fade show\" id=\"profile\" role=\"tabpanel\" aria-labelledby=\"profile-tab\">
                                <h3 class=\"register-heading\">Apply as a Hirer</h3>
                                <div class=\"row register-form\">
                                    <div class=\"col-md-6\">
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"First Name *\" value=\"\">
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"Last Name *\" value=\"\">
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"email\" class=\"form-control\" placeholder=\"Email *\" value=\"\">
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" maxlength=\"10\" minlength=\"10\" class=\"form-control\" placeholder=\"Phone *\" value=\"\">
                                        </div>


                                    </div>
                                    <div class=\"col-md-6\">
                                        <div class=\"form-group\">
                                            <input type=\"password\" class=\"form-control\" placeholder=\"Password *\" value=\"\">
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"password\" class=\"form-control\" placeholder=\"Confirm Password *\" value=\"\">
                                        </div>
                                        <div class=\"form-group\">
                                            <select class=\"form-control\">
                                                <option class=\"hidden\" selected=\"\" disabled=\"\">Please select your Sequrity Question</option>
                                                <option>What is your Birthdate?</option>
                                                <option>What is Your old Phone Number</option>
                                                <option>What is your Pet Name?</option>
                                            </select>
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"`Answer *\" value=\"\">
                                        </div>
                                        <input type=\"submit\" class=\"btnRegister\" value=\"Register\">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>                            
            <script type=\"text/javascript\">
            
            </script>
            
            </body>
            </html>", "Login/sign-up.html.twig", "C:\\Users\\MSI\\Desktop\\Airmess_Web\\templates\\Login\\sign-up.html.twig");
    }
}
