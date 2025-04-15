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

/* login/sign-up.html.twig */
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "login/sign-up.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "login/sign-up.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>S'enregistrer - Airmess</title>
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css\">
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js\"></script>
<style>
        body {
            background: linear-gradient(135deg, #7589ff 0%, #ff9db4 100%);
            font-family: Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 20px;
        }
        
        .signup-container {
            background: white;
            border-radius: 50px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            overflow: hidden;
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
            padding: 30px;
            position: relative;
        }
        
        .logo {
            max-width: 60px;
            margin-bottom: 20px;
        }
        
        .form-title {
            font-size: 40px;
            color: #406dab;
            margin-bottom: 30px;
            font-weight: bold;
    text-align: center;
        }
        
        .form-control {
            border-radius: 10px;
            padding: 12px 15px;
            border: 1px solid #e0e0e0;
            margin-bottom: 20px;
            background-color: #f8f9fa;
        }
        
        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(123, 137, 255, 0.25);
            border-color: #7b89ff;
        }
        
        .btn-tab {
            border-radius: 10px;
            border: none;
            padding: 12px 20px;
            font-weight: 600;
            background-color: #f8f9fa;
            color: #555;
            margin-right: 10px;
            transition: all 0.3s;
        }
        
        .btn-tab.active {
            background-color: #7b89ff;
            color: white;
        }
        
        .btn-register {
            background: linear-gradient(135deg, #7589ff 0%, #ff9db4 100%);
    border: none;
            border-radius: 10px;
            color: white;
            font-weight: 600;
            padding: 12px 15px;
            width: 100%;
            margin-top: 10px;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .btn-register:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }
        
        .btn-photo {
            background-color: #f8f9fa;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            padding: 12px 20px;
            width: 100%;
            text-align: center;
    cursor: pointer;
            margin-bottom: 20px;
        }
        
        .back-btn {
            background-color: #db7093;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            text-decoration: none;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        
        .back-btn:hover {
            background-color: #c8637f;
            color: white;
            text-decoration: none;
        }
        
        .tab-content {
            margin-top: 20px;
        }
        
        /* Hide date placeholder text when focused or filled */
        input[type=\"date\"]:not(:placeholder-shown),
        input[type=\"date\"]:focus {
            color: #495057;
        }
        
        .custom-file {
            position: relative;
        }
        
        .custom-file-input {
            cursor: pointer;
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            opacity: 0;
            z-index: 5;
        }
        
        .photo-btn {
            display: block;
            width: 60%;
            max-width: 200px;
            background: linear-gradient(135deg, #7589ff 0%, #ff9db4 100%);
    border: none;
            border-radius: 50px;
            padding: 10px 12px;
    color: #fff;
            text-align: center;
            cursor: pointer;
    font-weight: 600;
            transition: all 0.3s;
            margin: 0 auto;
        }
        
        .photo-btn:hover {
            opacity: 0.9;
            transform: translateY(-2px);
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
        
        .photo-preview {
            width: 150px;
            height: 150px;
            border-radius: 10px;
            background-color: #f0f5f9;
            display: none;
            background-size: cover;
            background-position: center center;
            margin: 15px auto;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
            border: 2px solid #a1c4fd;
        }
        
        .photo-upload-container {
            margin-bottom: 20px;
        }
        
        .form-group {
            position: relative;
            margin-bottom: 25px;
        }
        
        .field-error {
            color: #dc3545;
            font-size: 0.85rem;
            margin-top: 5px;
            display: none;
        }
</style>
</head>
<body>
    <div class=\"signup-container\">
                <div class=\"row\">
            <div class=\"col-12\">
                <div class=\"d-flex align-items-center justify-content-between mb-3\">
                    <img src=\"";
        // line 224
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/logo-airmess.png"), "html", null, true);
        yield "\" alt=\"Airmess Logo\" class=\"logo\">
                    <a href=\"";
        // line 225
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("login");
        yield "\" class=\"back-btn\">
                        <span>&larr;</span>
                    </a>
                    </div>
                <h1 class=\"form-title\">S'enregistrer</h1>

                <ul class=\"nav nav-tabs mb-4\" id=\"myTab\" role=\"tablist\">
                            <li class=\"nav-item\">
                        <a class=\"nav-link active btn-tab\" id=\"voyageur-tab\" data-toggle=\"tab\" href=\"#voyageur\" role=\"tab\" aria-controls=\"voyageur\" aria-selected=\"true\">voyageur</a>
                            </li>
                            <li class=\"nav-item\">
                        <a class=\"nav-link btn-tab\" id=\"entreprise-tab\" data-toggle=\"tab\" href=\"#entreprise\" role=\"tab\" aria-controls=\"entreprise\" aria-selected=\"false\">entreprise</a>
                            </li>
                        </ul>
                
                        <div class=\"tab-content\" id=\"myTabContent\">
                    <!-- Flash Messages -->
                    ";
        // line 242
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 242, $this->source); })()), "flashes", ["success"], "method", false, false, false, 242));
        foreach ($context['_seq'] as $context["_key"] => $context["flash_message"]) {
            // line 243
            yield "                        <div class=\"alert alert-success\">
                            ";
            // line 244
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["flash_message"], "html", null, true);
            yield "
                        </div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['flash_message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 247
        yield "                    
                    ";
        // line 248
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 248, $this->source); })()), "flashes", ["error"], "method", false, false, false, 248));
        foreach ($context['_seq'] as $context["_key"] => $context["flash_message"]) {
            // line 249
            yield "                        <div class=\"alert alert-danger\">
                            ";
            // line 250
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["flash_message"], "html", null, true);
            yield "
                        </div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['flash_message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 253
        yield "                    
                    <!-- Voyageur Tab -->
                    <div class=\"tab-pane fade show active\" id=\"voyageur\" role=\"tabpanel\" aria-labelledby=\"voyageur-tab\">
                        <form action=\"";
        // line 256
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
        yield "\" method=\"post\" enctype=\"multipart/form-data\" novalidate>
                            <div class=\"row\">
                                    <div class=\"col-md-6\">
                                        <div class=\"form-group\">
                                        <input type=\"text\" class=\"form-control\" name=\"name\" placeholder=\"Nom\" value=\"\">
                                        </div>
                                        <div class=\"form-group\">
                                        <input type=\"text\" class=\"form-control\" name=\"prenom\" placeholder=\"Prénom\" value=\"\">
                                        </div>
                                        <div class=\"form-group\">
                                        <input type=\"email\" class=\"form-control\" name=\"email\" placeholder=\"Email\" value=\"\">
                                    </div>
                                        </div>
                                <div class=\"col-md-6\">
                                        <div class=\"form-group\">
                                        <input type=\"text\" class=\"form-control\" name=\"phoneNumber\" placeholder=\"Numéro de téléphone\" value=\"\" minlength=\"8\" maxlength=\"8\">
                                        </div>
                                        <div class=\"form-group\">
                                        <div class=\"password-field-container\">
                                            <input type=\"password\" class=\"form-control password-field\" name=\"password\" placeholder=\"Mot de passe\" value=\"\">
                                            <i class=\"password-toggle-icon fa fa-eye-slash\" data-target=\"password\"></i>
                                        </div>
                                    </div>
                                        <div class=\"form-group\">
                                        <div class=\"password-field-container\">
                                            <input type=\"password\" class=\"form-control password-field\" name=\"password_confirm\" placeholder=\"Confirmer le mot de passe\" value=\"\">
                                            <i class=\"password-toggle-icon fa fa-eye-slash\" data-target=\"password_confirm\"></i>
                                        </div>
                                        </div>
                                        <div class=\"form-group\">
                                        <input type=\"date\" class=\"form-control\" name=\"dateNaiss\" placeholder=\"Date de naissance\">
                                    </div>
                                        </div>
                                <div class=\"col-12\">
                                    <div class=\"photo-upload-container text-center\">
                                        <div id=\"voyageurPhotoPreview\" class=\"photo-preview\"></div>
                                        <div class=\"custom-file\">
                                            <input type=\"file\" class=\"custom-file-input\" name=\"photo\" accept=\"image/*\">
                                            <button type=\"button\" class=\"photo-btn\">Ajouter une photo</button>
                                        </div>
                                    </div>
                                </div>
                                <div class=\"col-12\">
                                    <input type=\"hidden\" name=\"roleUser\" value=\"Voyageurs\">
                                    <input type=\"hidden\" name=\"statut\" value=\"active\">
                                    <input type=\"hidden\" name=\"diamond\" value=\"0\">
                                    <input type=\"hidden\" name=\"deleteFlag\" value=\"0\">
                                    <button type=\"submit\" class=\"btn-register\">S'enregistrer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Entreprise Tab -->
                    <div class=\"tab-pane fade\" id=\"entreprise\" role=\"tabpanel\" aria-labelledby=\"entreprise-tab\">
                        <form action=\"";
        // line 311
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
        yield "\" method=\"post\" enctype=\"multipart/form-data\" novalidate>
                            <div class=\"row\">
                                    <div class=\"col-md-6\">
                                        <div class=\"form-group\">
                                        <input type=\"text\" class=\"form-control\" name=\"name\" placeholder=\"Nom de l'entreprise\" value=\"\">
                                        </div>
                                        <div class=\"form-group\">
                                        <input type=\"email\" class=\"form-control\" name=\"email\" placeholder=\"Email professionnel\" value=\"\">
                                    </div>
                                        </div>
                                <div class=\"col-md-6\">
                                        <div class=\"form-group\">
                                        <input type=\"text\" class=\"form-control\" name=\"phoneNumber\" placeholder=\"Numéro de téléphone\" value=\"\" minlength=\"8\" maxlength=\"8\">
                                        </div>
                                        <div class=\"form-group\">
                                        <div class=\"password-field-container\">
                                            <input type=\"password\" class=\"form-control password-field\" name=\"password\" placeholder=\"Mot de passe\" value=\"\">
                                            <i class=\"password-toggle-icon fa fa-eye-slash\" data-target=\"password\"></i>
                                        </div>
                                    </div>
                                        <div class=\"form-group\">
                                        <div class=\"password-field-container\">
                                            <input type=\"password\" class=\"form-control password-field\" name=\"password_confirm\" placeholder=\"Confirmer le mot de passe\" value=\"\">
                                            <i class=\"password-toggle-icon fa fa-eye-slash\" data-target=\"password_confirm\"></i>
                                        </div>
                                        </div>
                                        </div>
                                <div class=\"col-12\">
                                    <div class=\"photo-upload-container text-center\">
                                        <div id=\"entreprisePhotoPreview\" class=\"photo-preview\"></div>
                                        <div class=\"custom-file\">
                                            <input type=\"file\" class=\"custom-file-input\" name=\"photo\" accept=\"image/*\">
                                            <button type=\"button\" class=\"photo-btn\">Ajouter une photo</button>
                                        </div>
                                    </div>
                                </div>
                                <div class=\"col-12\">
                                    <input type=\"hidden\" name=\"roleUser\" value=\"Entreprise\">
                                    <input type=\"hidden\" name=\"statut\" value=\"active\">
                                    <input type=\"hidden\" name=\"diamond\" value=\"0\">
                                    <input type=\"hidden\" name=\"deleteFlag\" value=\"0\">
                                    <button type=\"submit\" class=\"btn-register\">S'enregistrer</button>
                                </div>
                            </div>
                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <script type=\"text/javascript\">
        // Handle file selection and preview
        \$('.custom-file-input').on('change', function() {
            // Only show image preview
            const fileInput = this;
            
            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    const form = \$(fileInput).closest('form');
                    const photoPreview = form.find('.photo-preview');
                    
                    photoPreview.css({
                        'display': 'block',
                        'background-image': 'url(' + e.target.result + ')'
                    });
                    
                    // Hide photo error if shown
                    form.find('.photo-upload-container .field-error').hide();
                }
                
                reader.readAsDataURL(fileInput.files[0]);
            }
        });
        
        // Tab switching functionality
        \$(document).ready(function() {
            // Add error containers after all form fields
            \$('.form-group').each(function() {
                // Skip if it already has an error container
                if (\$(this).find('.field-error').length === 0) {
                    let input = \$(this).find('input').first();
                    let errorId = input.attr('name') + '-error';
                    \$(this).append('<div id=\"' + errorId + '\" class=\"field-error\"></div>');
                }
            });
            
            // Add error container for photo
            \$('.photo-upload-container').each(function() {
                if (\$(this).find('.field-error').length === 0) {
                    \$(this).append('<div id=\"photo-error\" class=\"field-error\"></div>');
                }
            });
            
            // Handle tab clicks
            \$('#voyageur-tab').on('click', function(e) {
                e.preventDefault();
                \$(this).tab('show');
                \$('.btn-tab').removeClass('active');
                \$(this).addClass('active');
                \$('#voyageur').addClass('show active');
                \$('#entreprise').removeClass('show active');
            });
            
            \$('#entreprise-tab').on('click', function(e) {
                e.preventDefault();
                \$(this).tab('show');
                \$('.btn-tab').removeClass('active');
                \$(this).addClass('active');
                \$('#entreprise').addClass('show active');
                \$('#voyageur').removeClass('show active');
            });
            
            // Toggle password visibility
            \$('.password-toggle-icon').on('click', function() {
                const passwordField = \$(this).closest('.password-field-container').find('.password-field');
                const type = passwordField.attr('type') === 'password' ? 'text' : 'password';
                passwordField.attr('type', type);
                
                // Toggle eye icon
                \$(this).toggleClass('fa-eye-slash fa-eye');
            });
            
            // Helper function to calculate age from date
            function calculateAge(birthDate) {
                const today = new Date();
                let age = today.getFullYear() - birthDate.getFullYear();
                const monthDiff = today.getMonth() - birthDate.getMonth();
                
                if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                    age--;
                }
                
                return age;
            }
            
            // Helper function to show field error
            function showFieldError(form, fieldName, message) {
                const errorElement = form.find('#' + fieldName + '-error');
                errorElement.text(message).show();
            }
            
            // Clear all errors in a form
            function clearFormErrors(form) {
                form.find('.field-error').hide();
            }
            
            // Form validation for Voyageur form
            \$('#voyageur form').on('submit', function(e) {
                let isValid = true;
                const form = \$(this);
                
                // Clear previous errors
                clearFormErrors(form);
                
                const name = form.find('input[name=\"name\"]').val().trim();
                const prenom = form.find('input[name=\"prenom\"]').val().trim();
                const email = form.find('input[name=\"email\"]').val().trim();
                const phone = form.find('input[name=\"phoneNumber\"]').val().trim();
                const password = form.find('input[name=\"password\"]').val();
                const confirmPassword = form.find('input[name=\"password_confirm\"]').val();
                const dateNaiss = form.find('input[name=\"dateNaiss\"]').val();
                const photoInput = form.find('input[type=\"file\"]')[0];
                
                // Validate name
                if (name.length < 2 || name === '') {
                    showFieldError(form, 'name', 'Le nom doit contenir au moins 2 caractères');
                    isValid = false;
                }
                
                // Validate prenom
                if (prenom.length < 2 || prenom === '') {
                    showFieldError(form, 'prenom', 'Le prénom doit contenir au moins 2 caractères');
                    isValid = false;
                }
                
                // Validate email
                const emailRegex = /^[^\\s@]+@[^\\s@]+\\.[^\\s@]+\$/;
                if (!emailRegex.test(email) || email === '') {
                    showFieldError(form, 'email', 'Veuillez entrer une adresse email valide');
                    isValid = false;
                }
                
                // Validate phone number - now 8 digits
                const phoneRegex = /^[0-9]{8}\$/;
                if (!phoneRegex.test(phone) || phone === '') {
                    showFieldError(form, 'phoneNumber', 'Le numéro de téléphone doit contenir exactement 8 chiffres');
                    isValid = false;
                }
                
                // Validate password
                if (password.length < 6 || password === '') {
                    showFieldError(form, 'password', 'Le mot de passe doit contenir au moins 6 caractères');
                    isValid = false;
                }
                
                // Validate password confirmation
                if (password !== confirmPassword || confirmPassword === '') {
                    showFieldError(form, 'password_confirm', 'Les mots de passe ne correspondent pas');
                    isValid = false;
                }
                
                // Validate date of birth and check if user is at least 15 years old
                if (!dateNaiss) {
                    showFieldError(form, 'dateNaiss', 'Veuillez entrer votre date de naissance');
                    isValid = false;
                } else {
                    const birthDate = new Date(dateNaiss);
                    const age = calculateAge(birthDate);
                    
                    if (age < 15) {
                        showFieldError(form, 'dateNaiss', 'Vous devez avoir au moins 15 ans pour vous inscrire');
                        isValid = false;
                    }
                }
                
                // Validate photo
                if (!photoInput || !photoInput.files || photoInput.files.length === 0) {
                    form.find('#photo-error').text('Une photo est requise pour l\\'inscription').show();
                    isValid = false;
                }
                
                if (!isValid) {
                    e.preventDefault();
                }
            });
            
            // Form validation for Entreprise form
            \$('#entreprise form').on('submit', function(e) {
                let isValid = true;
                const form = \$(this);
                
                // Clear previous errors
                clearFormErrors(form);
                
                const name = form.find('input[name=\"name\"]').val().trim();
                const email = form.find('input[name=\"email\"]').val().trim();
                const phone = form.find('input[name=\"phoneNumber\"]').val().trim();
                const password = form.find('input[name=\"password\"]').val();
                const confirmPassword = form.find('input[name=\"password_confirm\"]').val();
                const photoInput = form.find('input[type=\"file\"]')[0];
                
                // Validate company name
                if (name.length < 2 || name === '') {
                    showFieldError(form, 'name', 'Le nom de l\\'entreprise doit contenir au moins 2 caractères');
                    isValid = false;
                }
                
                // Validate email
                const emailRegex = /^[^\\s@]+@[^\\s@]+\\.[^\\s@]+\$/;
                if (!emailRegex.test(email) || email === '') {
                    showFieldError(form, 'email', 'Veuillez entrer une adresse email professionnelle valide');
                    isValid = false;
                }
                
                // Validate phone number - now 8 digits
                const phoneRegex = /^[0-9]{8}\$/;
                if (!phoneRegex.test(phone) || phone === '') {
                    showFieldError(form, 'phoneNumber', 'Le numéro de téléphone doit contenir exactement 8 chiffres');
                    isValid = false;
                }
                
                // Validate password
                if (password.length < 6 || password === '') {
                    showFieldError(form, 'password', 'Le mot de passe doit contenir au moins 6 caractères');
                    isValid = false;
                }
                
                // Validate password confirmation
                if (password !== confirmPassword || confirmPassword === '') {
                    showFieldError(form, 'password_confirm', 'Les mots de passe ne correspondent pas');
                    isValid = false;
                }
                
                // Validate photo
                if (!photoInput || !photoInput.files || photoInput.files.length === 0) {
                    form.find('#photo-error').text('Une photo est requise pour l\\'inscription').show();
                    isValid = false;
                }
                
                if (!isValid) {
                    e.preventDefault();
                }
            });
        });
    </script>
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css\">
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
        return "login/sign-up.html.twig";
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
        return array (  395 => 311,  337 => 256,  332 => 253,  323 => 250,  320 => 249,  316 => 248,  313 => 247,  304 => 244,  301 => 243,  297 => 242,  277 => 225,  273 => 224,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>S'enregistrer - Airmess</title>
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css\">
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js\"></script>
<style>
        body {
            background: linear-gradient(135deg, #7589ff 0%, #ff9db4 100%);
            font-family: Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 20px;
        }
        
        .signup-container {
            background: white;
            border-radius: 50px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            overflow: hidden;
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
            padding: 30px;
            position: relative;
        }
        
        .logo {
            max-width: 60px;
            margin-bottom: 20px;
        }
        
        .form-title {
            font-size: 40px;
            color: #406dab;
            margin-bottom: 30px;
            font-weight: bold;
    text-align: center;
        }
        
        .form-control {
            border-radius: 10px;
            padding: 12px 15px;
            border: 1px solid #e0e0e0;
            margin-bottom: 20px;
            background-color: #f8f9fa;
        }
        
        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(123, 137, 255, 0.25);
            border-color: #7b89ff;
        }
        
        .btn-tab {
            border-radius: 10px;
            border: none;
            padding: 12px 20px;
            font-weight: 600;
            background-color: #f8f9fa;
            color: #555;
            margin-right: 10px;
            transition: all 0.3s;
        }
        
        .btn-tab.active {
            background-color: #7b89ff;
            color: white;
        }
        
        .btn-register {
            background: linear-gradient(135deg, #7589ff 0%, #ff9db4 100%);
    border: none;
            border-radius: 10px;
            color: white;
            font-weight: 600;
            padding: 12px 15px;
            width: 100%;
            margin-top: 10px;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .btn-register:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }
        
        .btn-photo {
            background-color: #f8f9fa;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            padding: 12px 20px;
            width: 100%;
            text-align: center;
    cursor: pointer;
            margin-bottom: 20px;
        }
        
        .back-btn {
            background-color: #db7093;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            text-decoration: none;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        
        .back-btn:hover {
            background-color: #c8637f;
            color: white;
            text-decoration: none;
        }
        
        .tab-content {
            margin-top: 20px;
        }
        
        /* Hide date placeholder text when focused or filled */
        input[type=\"date\"]:not(:placeholder-shown),
        input[type=\"date\"]:focus {
            color: #495057;
        }
        
        .custom-file {
            position: relative;
        }
        
        .custom-file-input {
            cursor: pointer;
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            opacity: 0;
            z-index: 5;
        }
        
        .photo-btn {
            display: block;
            width: 60%;
            max-width: 200px;
            background: linear-gradient(135deg, #7589ff 0%, #ff9db4 100%);
    border: none;
            border-radius: 50px;
            padding: 10px 12px;
    color: #fff;
            text-align: center;
            cursor: pointer;
    font-weight: 600;
            transition: all 0.3s;
            margin: 0 auto;
        }
        
        .photo-btn:hover {
            opacity: 0.9;
            transform: translateY(-2px);
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
        
        .photo-preview {
            width: 150px;
            height: 150px;
            border-radius: 10px;
            background-color: #f0f5f9;
            display: none;
            background-size: cover;
            background-position: center center;
            margin: 15px auto;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
            border: 2px solid #a1c4fd;
        }
        
        .photo-upload-container {
            margin-bottom: 20px;
        }
        
        .form-group {
            position: relative;
            margin-bottom: 25px;
        }
        
        .field-error {
            color: #dc3545;
            font-size: 0.85rem;
            margin-top: 5px;
            display: none;
        }
</style>
</head>
<body>
    <div class=\"signup-container\">
                <div class=\"row\">
            <div class=\"col-12\">
                <div class=\"d-flex align-items-center justify-content-between mb-3\">
                    <img src=\"{{ asset('assets/images/logo-airmess.png') }}\" alt=\"Airmess Logo\" class=\"logo\">
                    <a href=\"{{ path('login') }}\" class=\"back-btn\">
                        <span>&larr;</span>
                    </a>
                    </div>
                <h1 class=\"form-title\">S'enregistrer</h1>

                <ul class=\"nav nav-tabs mb-4\" id=\"myTab\" role=\"tablist\">
                            <li class=\"nav-item\">
                        <a class=\"nav-link active btn-tab\" id=\"voyageur-tab\" data-toggle=\"tab\" href=\"#voyageur\" role=\"tab\" aria-controls=\"voyageur\" aria-selected=\"true\">voyageur</a>
                            </li>
                            <li class=\"nav-item\">
                        <a class=\"nav-link btn-tab\" id=\"entreprise-tab\" data-toggle=\"tab\" href=\"#entreprise\" role=\"tab\" aria-controls=\"entreprise\" aria-selected=\"false\">entreprise</a>
                            </li>
                        </ul>
                
                        <div class=\"tab-content\" id=\"myTabContent\">
                    <!-- Flash Messages -->
                    {% for flash_message in app.flashes('success') %}
                        <div class=\"alert alert-success\">
                            {{ flash_message }}
                        </div>
                    {% endfor %}
                    
                    {% for flash_message in app.flashes('error') %}
                        <div class=\"alert alert-danger\">
                            {{ flash_message }}
                        </div>
                    {% endfor %}
                    
                    <!-- Voyageur Tab -->
                    <div class=\"tab-pane fade show active\" id=\"voyageur\" role=\"tabpanel\" aria-labelledby=\"voyageur-tab\">
                        <form action=\"{{ path('app_register') }}\" method=\"post\" enctype=\"multipart/form-data\" novalidate>
                            <div class=\"row\">
                                    <div class=\"col-md-6\">
                                        <div class=\"form-group\">
                                        <input type=\"text\" class=\"form-control\" name=\"name\" placeholder=\"Nom\" value=\"\">
                                        </div>
                                        <div class=\"form-group\">
                                        <input type=\"text\" class=\"form-control\" name=\"prenom\" placeholder=\"Prénom\" value=\"\">
                                        </div>
                                        <div class=\"form-group\">
                                        <input type=\"email\" class=\"form-control\" name=\"email\" placeholder=\"Email\" value=\"\">
                                    </div>
                                        </div>
                                <div class=\"col-md-6\">
                                        <div class=\"form-group\">
                                        <input type=\"text\" class=\"form-control\" name=\"phoneNumber\" placeholder=\"Numéro de téléphone\" value=\"\" minlength=\"8\" maxlength=\"8\">
                                        </div>
                                        <div class=\"form-group\">
                                        <div class=\"password-field-container\">
                                            <input type=\"password\" class=\"form-control password-field\" name=\"password\" placeholder=\"Mot de passe\" value=\"\">
                                            <i class=\"password-toggle-icon fa fa-eye-slash\" data-target=\"password\"></i>
                                        </div>
                                    </div>
                                        <div class=\"form-group\">
                                        <div class=\"password-field-container\">
                                            <input type=\"password\" class=\"form-control password-field\" name=\"password_confirm\" placeholder=\"Confirmer le mot de passe\" value=\"\">
                                            <i class=\"password-toggle-icon fa fa-eye-slash\" data-target=\"password_confirm\"></i>
                                        </div>
                                        </div>
                                        <div class=\"form-group\">
                                        <input type=\"date\" class=\"form-control\" name=\"dateNaiss\" placeholder=\"Date de naissance\">
                                    </div>
                                        </div>
                                <div class=\"col-12\">
                                    <div class=\"photo-upload-container text-center\">
                                        <div id=\"voyageurPhotoPreview\" class=\"photo-preview\"></div>
                                        <div class=\"custom-file\">
                                            <input type=\"file\" class=\"custom-file-input\" name=\"photo\" accept=\"image/*\">
                                            <button type=\"button\" class=\"photo-btn\">Ajouter une photo</button>
                                        </div>
                                    </div>
                                </div>
                                <div class=\"col-12\">
                                    <input type=\"hidden\" name=\"roleUser\" value=\"Voyageurs\">
                                    <input type=\"hidden\" name=\"statut\" value=\"active\">
                                    <input type=\"hidden\" name=\"diamond\" value=\"0\">
                                    <input type=\"hidden\" name=\"deleteFlag\" value=\"0\">
                                    <button type=\"submit\" class=\"btn-register\">S'enregistrer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Entreprise Tab -->
                    <div class=\"tab-pane fade\" id=\"entreprise\" role=\"tabpanel\" aria-labelledby=\"entreprise-tab\">
                        <form action=\"{{ path('app_register') }}\" method=\"post\" enctype=\"multipart/form-data\" novalidate>
                            <div class=\"row\">
                                    <div class=\"col-md-6\">
                                        <div class=\"form-group\">
                                        <input type=\"text\" class=\"form-control\" name=\"name\" placeholder=\"Nom de l'entreprise\" value=\"\">
                                        </div>
                                        <div class=\"form-group\">
                                        <input type=\"email\" class=\"form-control\" name=\"email\" placeholder=\"Email professionnel\" value=\"\">
                                    </div>
                                        </div>
                                <div class=\"col-md-6\">
                                        <div class=\"form-group\">
                                        <input type=\"text\" class=\"form-control\" name=\"phoneNumber\" placeholder=\"Numéro de téléphone\" value=\"\" minlength=\"8\" maxlength=\"8\">
                                        </div>
                                        <div class=\"form-group\">
                                        <div class=\"password-field-container\">
                                            <input type=\"password\" class=\"form-control password-field\" name=\"password\" placeholder=\"Mot de passe\" value=\"\">
                                            <i class=\"password-toggle-icon fa fa-eye-slash\" data-target=\"password\"></i>
                                        </div>
                                    </div>
                                        <div class=\"form-group\">
                                        <div class=\"password-field-container\">
                                            <input type=\"password\" class=\"form-control password-field\" name=\"password_confirm\" placeholder=\"Confirmer le mot de passe\" value=\"\">
                                            <i class=\"password-toggle-icon fa fa-eye-slash\" data-target=\"password_confirm\"></i>
                                        </div>
                                        </div>
                                        </div>
                                <div class=\"col-12\">
                                    <div class=\"photo-upload-container text-center\">
                                        <div id=\"entreprisePhotoPreview\" class=\"photo-preview\"></div>
                                        <div class=\"custom-file\">
                                            <input type=\"file\" class=\"custom-file-input\" name=\"photo\" accept=\"image/*\">
                                            <button type=\"button\" class=\"photo-btn\">Ajouter une photo</button>
                                        </div>
                                    </div>
                                </div>
                                <div class=\"col-12\">
                                    <input type=\"hidden\" name=\"roleUser\" value=\"Entreprise\">
                                    <input type=\"hidden\" name=\"statut\" value=\"active\">
                                    <input type=\"hidden\" name=\"diamond\" value=\"0\">
                                    <input type=\"hidden\" name=\"deleteFlag\" value=\"0\">
                                    <button type=\"submit\" class=\"btn-register\">S'enregistrer</button>
                                </div>
                            </div>
                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <script type=\"text/javascript\">
        // Handle file selection and preview
        \$('.custom-file-input').on('change', function() {
            // Only show image preview
            const fileInput = this;
            
            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    const form = \$(fileInput).closest('form');
                    const photoPreview = form.find('.photo-preview');
                    
                    photoPreview.css({
                        'display': 'block',
                        'background-image': 'url(' + e.target.result + ')'
                    });
                    
                    // Hide photo error if shown
                    form.find('.photo-upload-container .field-error').hide();
                }
                
                reader.readAsDataURL(fileInput.files[0]);
            }
        });
        
        // Tab switching functionality
        \$(document).ready(function() {
            // Add error containers after all form fields
            \$('.form-group').each(function() {
                // Skip if it already has an error container
                if (\$(this).find('.field-error').length === 0) {
                    let input = \$(this).find('input').first();
                    let errorId = input.attr('name') + '-error';
                    \$(this).append('<div id=\"' + errorId + '\" class=\"field-error\"></div>');
                }
            });
            
            // Add error container for photo
            \$('.photo-upload-container').each(function() {
                if (\$(this).find('.field-error').length === 0) {
                    \$(this).append('<div id=\"photo-error\" class=\"field-error\"></div>');
                }
            });
            
            // Handle tab clicks
            \$('#voyageur-tab').on('click', function(e) {
                e.preventDefault();
                \$(this).tab('show');
                \$('.btn-tab').removeClass('active');
                \$(this).addClass('active');
                \$('#voyageur').addClass('show active');
                \$('#entreprise').removeClass('show active');
            });
            
            \$('#entreprise-tab').on('click', function(e) {
                e.preventDefault();
                \$(this).tab('show');
                \$('.btn-tab').removeClass('active');
                \$(this).addClass('active');
                \$('#entreprise').addClass('show active');
                \$('#voyageur').removeClass('show active');
            });
            
            // Toggle password visibility
            \$('.password-toggle-icon').on('click', function() {
                const passwordField = \$(this).closest('.password-field-container').find('.password-field');
                const type = passwordField.attr('type') === 'password' ? 'text' : 'password';
                passwordField.attr('type', type);
                
                // Toggle eye icon
                \$(this).toggleClass('fa-eye-slash fa-eye');
            });
            
            // Helper function to calculate age from date
            function calculateAge(birthDate) {
                const today = new Date();
                let age = today.getFullYear() - birthDate.getFullYear();
                const monthDiff = today.getMonth() - birthDate.getMonth();
                
                if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                    age--;
                }
                
                return age;
            }
            
            // Helper function to show field error
            function showFieldError(form, fieldName, message) {
                const errorElement = form.find('#' + fieldName + '-error');
                errorElement.text(message).show();
            }
            
            // Clear all errors in a form
            function clearFormErrors(form) {
                form.find('.field-error').hide();
            }
            
            // Form validation for Voyageur form
            \$('#voyageur form').on('submit', function(e) {
                let isValid = true;
                const form = \$(this);
                
                // Clear previous errors
                clearFormErrors(form);
                
                const name = form.find('input[name=\"name\"]').val().trim();
                const prenom = form.find('input[name=\"prenom\"]').val().trim();
                const email = form.find('input[name=\"email\"]').val().trim();
                const phone = form.find('input[name=\"phoneNumber\"]').val().trim();
                const password = form.find('input[name=\"password\"]').val();
                const confirmPassword = form.find('input[name=\"password_confirm\"]').val();
                const dateNaiss = form.find('input[name=\"dateNaiss\"]').val();
                const photoInput = form.find('input[type=\"file\"]')[0];
                
                // Validate name
                if (name.length < 2 || name === '') {
                    showFieldError(form, 'name', 'Le nom doit contenir au moins 2 caractères');
                    isValid = false;
                }
                
                // Validate prenom
                if (prenom.length < 2 || prenom === '') {
                    showFieldError(form, 'prenom', 'Le prénom doit contenir au moins 2 caractères');
                    isValid = false;
                }
                
                // Validate email
                const emailRegex = /^[^\\s@]+@[^\\s@]+\\.[^\\s@]+\$/;
                if (!emailRegex.test(email) || email === '') {
                    showFieldError(form, 'email', 'Veuillez entrer une adresse email valide');
                    isValid = false;
                }
                
                // Validate phone number - now 8 digits
                const phoneRegex = /^[0-9]{8}\$/;
                if (!phoneRegex.test(phone) || phone === '') {
                    showFieldError(form, 'phoneNumber', 'Le numéro de téléphone doit contenir exactement 8 chiffres');
                    isValid = false;
                }
                
                // Validate password
                if (password.length < 6 || password === '') {
                    showFieldError(form, 'password', 'Le mot de passe doit contenir au moins 6 caractères');
                    isValid = false;
                }
                
                // Validate password confirmation
                if (password !== confirmPassword || confirmPassword === '') {
                    showFieldError(form, 'password_confirm', 'Les mots de passe ne correspondent pas');
                    isValid = false;
                }
                
                // Validate date of birth and check if user is at least 15 years old
                if (!dateNaiss) {
                    showFieldError(form, 'dateNaiss', 'Veuillez entrer votre date de naissance');
                    isValid = false;
                } else {
                    const birthDate = new Date(dateNaiss);
                    const age = calculateAge(birthDate);
                    
                    if (age < 15) {
                        showFieldError(form, 'dateNaiss', 'Vous devez avoir au moins 15 ans pour vous inscrire');
                        isValid = false;
                    }
                }
                
                // Validate photo
                if (!photoInput || !photoInput.files || photoInput.files.length === 0) {
                    form.find('#photo-error').text('Une photo est requise pour l\\'inscription').show();
                    isValid = false;
                }
                
                if (!isValid) {
                    e.preventDefault();
                }
            });
            
            // Form validation for Entreprise form
            \$('#entreprise form').on('submit', function(e) {
                let isValid = true;
                const form = \$(this);
                
                // Clear previous errors
                clearFormErrors(form);
                
                const name = form.find('input[name=\"name\"]').val().trim();
                const email = form.find('input[name=\"email\"]').val().trim();
                const phone = form.find('input[name=\"phoneNumber\"]').val().trim();
                const password = form.find('input[name=\"password\"]').val();
                const confirmPassword = form.find('input[name=\"password_confirm\"]').val();
                const photoInput = form.find('input[type=\"file\"]')[0];
                
                // Validate company name
                if (name.length < 2 || name === '') {
                    showFieldError(form, 'name', 'Le nom de l\\'entreprise doit contenir au moins 2 caractères');
                    isValid = false;
                }
                
                // Validate email
                const emailRegex = /^[^\\s@]+@[^\\s@]+\\.[^\\s@]+\$/;
                if (!emailRegex.test(email) || email === '') {
                    showFieldError(form, 'email', 'Veuillez entrer une adresse email professionnelle valide');
                    isValid = false;
                }
                
                // Validate phone number - now 8 digits
                const phoneRegex = /^[0-9]{8}\$/;
                if (!phoneRegex.test(phone) || phone === '') {
                    showFieldError(form, 'phoneNumber', 'Le numéro de téléphone doit contenir exactement 8 chiffres');
                    isValid = false;
                }
                
                // Validate password
                if (password.length < 6 || password === '') {
                    showFieldError(form, 'password', 'Le mot de passe doit contenir au moins 6 caractères');
                    isValid = false;
                }
                
                // Validate password confirmation
                if (password !== confirmPassword || confirmPassword === '') {
                    showFieldError(form, 'password_confirm', 'Les mots de passe ne correspondent pas');
                    isValid = false;
                }
                
                // Validate photo
                if (!photoInput || !photoInput.files || photoInput.files.length === 0) {
                    form.find('#photo-error').text('Une photo est requise pour l\\'inscription').show();
                    isValid = false;
                }
                
                if (!isValid) {
                    e.preventDefault();
                }
            });
        });
    </script>
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css\">
            </body>
            </html>", "login/sign-up.html.twig", "C:\\Users\\bouga\\Desktop\\Airmess_Web\\templates\\Login\\sign-up.html.twig");
    }
}
