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

/* social_media/_form.html.twig */
class __TwigTemplate_fe0996c2003cf9454708419c89ef4a62 extends Template
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
            'js' => [$this, 'block_js'],
            'stylesheets' => [$this, 'block_stylesheets'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "social_media/_form.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "social_media/_form.html.twig"));

        $this->parent = $this->loadTemplate("dashVoyageurs/dashboardVoyageurs.html.twig", "social_media/_form.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_js(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 5
        yield "<script src=\"https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js\"></script>
<script src=\"//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js\"></script>
<script src=\"//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
<script>
\$(document).ready(function() {
    // Get forbidden words from template if they exist
    const forbiddenWords = {
        title: ";
        // line 12
        yield ((CoreExtension::getAttribute($this->env, $this->source, ($context["forbidden_words"] ?? null), "title", [], "any", true, true, false, 12)) ? (json_encode(CoreExtension::getAttribute($this->env, $this->source, (isset($context["forbidden_words"]) || array_key_exists("forbidden_words", $context) ? $context["forbidden_words"] : (function () { throw new RuntimeError('Variable "forbidden_words" does not exist.', 12, $this->source); })()), "title", [], "any", false, false, false, 12))) : ("[]"));
        yield ",
        content: ";
        // line 13
        yield ((CoreExtension::getAttribute($this->env, $this->source, ($context["forbidden_words"] ?? null), "content", [], "any", true, true, false, 13)) ? (json_encode(CoreExtension::getAttribute($this->env, $this->source, (isset($context["forbidden_words"]) || array_key_exists("forbidden_words", $context) ? $context["forbidden_words"] : (function () { throw new RuntimeError('Variable "forbidden_words" does not exist.', 13, $this->source); })()), "content", [], "any", false, false, false, 13))) : ("[]"));
        yield "
    };

    // Highlight forbidden words in fields
    function highlightForbiddenWords(fieldId, words) {
        const field = \$(`#\${fieldId}`);
        const text = field.val();
        
        words.forEach(word => {
            const regex = new RegExp(word, 'gi');
            const highlighted = text.replace(regex, 
                `<span class=\"forbidden-word-highlight\">\${word}</span>`);
            field.next('.forbidden-words-preview').html(highlighted);
        });
    }

    // Add preview divs after fields
    \$('#social_media_titre').after('<div class=\"forbidden-words-preview\"></div>');
    \$('#social_media_contenu').after('<div class=\"forbidden-words-preview\"></div>');

    // Check on input
    \$('#social_media_titre').on('input', function() {
        highlightForbiddenWords('social_media_titre', forbiddenWords.title);
    });

    \$('#social_media_contenu').on('input', function() {
        highlightForbiddenWords('social_media_contenu', forbiddenWords.content);
    });

    // Initial check
    highlightForbiddenWords('social_media_titre', forbiddenWords.title);
    highlightForbiddenWords('social_media_contenu', forbiddenWords.content);
});
</script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 49
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

        // line 51
        yield "<link href=\"https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.css\" rel=\"stylesheet\" />
<link href=\"//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css\" rel=\"stylesheet\" id=\"bootstrap-css\">
<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css\">
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 56
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

        // line 57
        yield "<div class=\"container-fluid py-4\">
    <div class=\"row\">
        <div class=\"col-12\">
            <div class=\"content-card content-section active\" id=\"social-media-section\">
                <div class=\"form-header\">
                    <h2 class=\"form-title\">Nouvelle Publication</h2>
                    <p class=\"form-subtitle\">Complétez les informations ci-dessous pour créer une nouvelle publication sur les réseaux sociaux.</p>
                </div>

                ";
        // line 66
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 66, $this->source); })()), 'form_start', ["method" => "POST", "attr" => ["class" => "social-media-form", "novalidate" => "novalidate", "enctype" => "multipart/form-data"]]);
        yield "
                    
                    ";
        // line 68
        if ((array_key_exists("forbidden_words", $context) && ((CoreExtension::getAttribute($this->env, $this->source,         // line 69
($context["forbidden_words"] ?? null), "title", [], "any", true, true, false, 69) &&  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, (isset($context["forbidden_words"]) || array_key_exists("forbidden_words", $context) ? $context["forbidden_words"] : (function () { throw new RuntimeError('Variable "forbidden_words" does not exist.', 69, $this->source); })()), "title", [], "any", false, false, false, 69))) || (CoreExtension::getAttribute($this->env, $this->source,         // line 70
($context["forbidden_words"] ?? null), "content", [], "any", true, true, false, 70) &&  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, (isset($context["forbidden_words"]) || array_key_exists("forbidden_words", $context) ? $context["forbidden_words"] : (function () { throw new RuntimeError('Variable "forbidden_words" does not exist.', 70, $this->source); })()), "content", [], "any", false, false, false, 70)))))) {
            // line 71
            yield "                        <div class=\"alert alert-danger forbidden-words-alert\">
                            <h5>Mots interdits détectés:</h5>
                            ";
            // line 73
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["forbidden_words"] ?? null), "title", [], "any", true, true, false, 73) &&  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, (isset($context["forbidden_words"]) || array_key_exists("forbidden_words", $context) ? $context["forbidden_words"] : (function () { throw new RuntimeError('Variable "forbidden_words" does not exist.', 73, $this->source); })()), "title", [], "any", false, false, false, 73)))) {
                // line 74
                yield "                                <p><strong>Titre:</strong> ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::join(CoreExtension::getAttribute($this->env, $this->source, (isset($context["forbidden_words"]) || array_key_exists("forbidden_words", $context) ? $context["forbidden_words"] : (function () { throw new RuntimeError('Variable "forbidden_words" does not exist.', 74, $this->source); })()), "title", [], "any", false, false, false, 74), ", "), "html", null, true);
                yield "</p>
                            ";
            }
            // line 76
            yield "                            ";
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["forbidden_words"] ?? null), "content", [], "any", true, true, false, 76) &&  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, (isset($context["forbidden_words"]) || array_key_exists("forbidden_words", $context) ? $context["forbidden_words"] : (function () { throw new RuntimeError('Variable "forbidden_words" does not exist.', 76, $this->source); })()), "content", [], "any", false, false, false, 76)))) {
                // line 77
                yield "                                <p><strong>Contenu:</strong> ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::join(CoreExtension::getAttribute($this->env, $this->source, (isset($context["forbidden_words"]) || array_key_exists("forbidden_words", $context) ? $context["forbidden_words"] : (function () { throw new RuntimeError('Variable "forbidden_words" does not exist.', 77, $this->source); })()), "content", [], "any", false, false, false, 77), ", "), "html", null, true);
                yield "</p>
                            ";
            }
            // line 79
            yield "                        </div>
                    ";
        }
        // line 81
        yield "                    
                    <!-- Basic Info Card -->
                    <div class=\"form-card card-info\">
                        <div class=\"form-card-header\">
                            <i class=\"fas fa-info-circle form-card-icon\"></i>
                            <h3 class=\"form-card-title\">Informations de base</h3>
                        </div>
                        <div class=\"form-card-body\">
                            <div class=\"form-row\">
                                <div class=\"form-col form-col-md-6\">
                                    <div class=\"form-floating\">
                                        ";
        // line 92
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 92, $this->source); })()), "titre", [], "any", false, false, false, 92), 'widget', ["attr" => ["class" => "form-control", "placeholder" => " "]]);
        yield "
                                        ";
        // line 93
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 93, $this->source); })()), "titre", [], "any", false, false, false, 93), 'label');
        yield "
                                        ";
        // line 94
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 94, $this->source); })()), "titre", [], "any", false, false, false, 94), 'errors');
        yield "
                                    </div>
                                </div>
                                
                                <div class=\"form-col form-col-md-6\">
                                    <div class=\"form-floating\">
                                        ";
        // line 100
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 100, $this->source); })()), "lieu", [], "any", false, false, false, 100), 'widget', ["attr" => ["class" => "form-control", "placeholder" => " "]]);
        yield "
                                        ";
        // line 101
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 101, $this->source); })()), "lieu", [], "any", false, false, false, 101), 'label');
        yield "
                                        ";
        // line 102
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 102, $this->source); })()), "lieu", [], "any", false, false, false, 102), 'errors');
        yield "
                                    </div>
                                </div>
                            </div>

                            <div class=\"form-spacer\"></div>
                            
                            <div class=\"form-floating\">
                                ";
        // line 110
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 110, $this->source); })()), "contenu", [], "any", false, false, false, 110), 'widget', ["attr" => ["class" => "form-control", "style" => "height: 120px", "placeholder" => " "]]);
        yield "
                                ";
        // line 111
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 111, $this->source); })()), "contenu", [], "any", false, false, false, 111), 'label');
        yield "
                                ";
        // line 112
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 112, $this->source); })()), "contenu", [], "any", false, false, false, 112), 'errors');
        yield "
                            </div>
                        </div>
                    </div>
                    
                    <!-- Media Card -->
                    <div class=\"form-card card-media\">
                        <div class=\"form-card-header\">
                            <i class=\"fas fa-photo-video form-card-icon\"></i>
                            <h3 class=\"form-card-title\">Média</h3>
                        </div>
                        <div class=\"form-card-body\">
                            <div class=\"form-image-upload\">
                                <h4>Télécharger une image ou une vidéo</h4>
                                ";
        // line 126
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 126, $this->source); })()), "imagemedia", [], "any", false, false, false, 126), 'label');
        yield "
                                ";
        // line 127
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 127, $this->source); })()), "imagemedia", [], "any", false, false, false, 127), 'widget', ["attr" => ["class" => "form-control-file", "accept" => "image/jpeg, image/jpg, image/png, image/gif, image/avif, video/x-msvideo, video/avi, video/msvideo, video/mpeg, video/mp4"]]);
        // line 132
        yield "
                                <small class=\"form-image-hint\">";
        // line 133
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 133, $this->source); })()), "imagemedia", [], "any", false, false, false, 133), 'help');
        yield "</small>
                                <div class=\"invalid-feedback\">
                                    ";
        // line 135
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 135, $this->source); })()), "imagemedia", [], "any", false, false, false, 135), 'errors');
        yield "
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=\"form-actions\">
                        <a href=\"";
        // line 142
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("socialVoyageurs_page");
        yield "\" class=\"form-btn-outline\">Annuler</a>
                        <button type=\"submit\" class=\"form-btn\">";
        // line 143
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("button_label", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["button_label"]) || array_key_exists("button_label", $context) ? $context["button_label"] : (function () { throw new RuntimeError('Variable "button_label" does not exist.', 143, $this->source); })()), "Publier")) : ("Publier")), "html", null, true);
        yield "</button>
                    </div>
                ";
        // line 145
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 145, $this->source); })()), 'form_end');
        yield "
            </div>
        </div>
    </div>

    <footer class=\"footer pt-3\">
        <div class=\"container-fluid\">
            <div class=\"row align-items-center justify-content-lg-between\">
                <div class=\"col-lg-6 mb-lg-0 mb-4\">
                    <div class=\"copyright text-center text-sm text-muted text-lg-start\">
                        © <script>document.write(new Date().getFullYear())</script>,
                        made with <i class=\"fa fa-heart\"></i> by
                        <a href=\"https://www.creative-tim.com\" class=\"font-weight-bold\" target=\"_blank\">Creative Tim</a>
                        for a better web.
                    </div>
                </div>
                <div class=\"col-lg-6\">
                    <ul class=\"nav nav-footer justify-content-center justify-content-lg-end\">
                        <li class=\"nav-item\">
                            <a href=\"https://www.creative-tim.com\" class=\"nav-link text-muted\" target=\"_blank\">Creative Tim</a>
                        </li>
                        <li class=\"nav-item\">
                            <a href=\"https://www.creative-tim.com/presentation\" class=\"nav-link text-muted\" target=\"_blank\">About Us</a>
                        </li>
                        <li class=\"nav-item\">
                            <a href=\"https://www.creative-tim.com/blog\" class=\"nav-link text-muted\" target=\"_blank\">Blog</a>
                        </li>
                        <li class=\"nav-item\">
                            <a href=\"https://www.creative-tim.com/license\" class=\"nav-link pe-0 text-muted\" target=\"_blank\">License</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div>

<style>
  /* Alert styles */
  .alert {
    font-size: 1.2em;
    margin-top: 20px;
  }

  .forbidden-words-alert {
    margin-top: 20px;
    margin-bottom: 25px;
    font-size: 1.2em;
    padding: 1rem 1.25rem;
    border: 1px solid transparent;
    border-radius: .25rem;
  }

  .forbidden-words-alert h5,
  .forbidden-words-alert p {
    color: #dc3545 !important;
  }

  .forbidden-words-alert h5 {
    font-weight: bold;
  }

  .forbidden-words-alert p:last-child {
    margin-bottom: 0;
  }

  /* Form card styles */
  .form-card {
    background-color: white;
    border-radius: 20px;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
    margin-bottom: 1.5rem;
    border: 1px solid #eaedf2;
    overflow: hidden;
    transition: all 0.3s ease;
    position: relative;
  }

  .form-card:hover {
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    transform: translateY(-2px);
  }
  
  .form-card::before {
    content: \"\";
    position: absolute;
    top: 0;
    left: 0;
    width: 5px;
    height: 100%;
    transition: all 0.3s ease;
  }
  
  .card-info::before {
    background-color: #FBBB89;
  }
  
  .card-media::before {
    background-color: #336D8B;
  }

  .form-card-header {
    display: flex;
    align-items: center;
    padding: 1.25rem 1.5rem;
    background-color: #f8fafc;
    border-bottom: 1px solid #eaedf2;
    position: relative;
    z-index: 1;
    overflow: hidden;
  }
  
  .form-card-header::after {
    content: \"\";
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    width: 30%;
    background: linear-gradient(to right, rgba(255, 255, 255, 0), rgba(251, 187, 137, 0.1));
    z-index: -1;
  }
  
  .card-info .form-card-header::after {
    background: linear-gradient(to right, rgba(255, 255, 255, 0), rgba(251, 187, 137, 0.1));
  }
  
  .card-media .form-card-header::after {
    background: linear-gradient(to right, rgba(255, 255, 255, 0), rgba(51, 109, 139, 0.1));
  }

  .form-card-icon {
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    border-radius: 10px;
    margin-right: 1rem;
    padding: 0.5rem;
  }
  
  .card-info .form-card-icon {
    background-color: #FBBB89;
  }
  
  .card-media .form-card-icon {
    background-color: #336D8B;
  }

  .form-card-title {
    margin: 0;
    font-size: 1.1rem;
    font-weight: 600;
    color: #344767;
  }

  .form-card-body {
    padding: 1.5rem;
    position: relative;
    z-index: 1;
  }
  
  .form-card-body::before {
    content: \"\";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(94, 114, 228, 0.02) 0%, rgba(255, 255, 255, 0) 50%);
    pointer-events: none;
    z-index: -1;
  }

  .form-spacer {
    height: 1rem;
  }

  /* Form controls */
  .form-row {
    display: flex;
    flex-wrap: wrap;
    margin-right: -0.75rem;
    margin-left: -0.75rem;
  }

  .form-col {
    position: relative;
    width: 100%;
    padding-right: 0.75rem;
    padding-left: 0.75rem;
  }

  @media (min-width: 768px) {
    .form-col-md-6 {
      flex: 0 0 50%;
      max-width: 50%;
    }
  }

  .form-floating {
    position: relative;
    margin-bottom: 0.5rem;
  }

  .form-floating > .form-control {
    height: 58px;
    padding: 1rem 0.75rem;
  }

  .form-floating > textarea.form-control {
    height: auto;
  }

  .form-floating > label {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    padding: 1rem 0.75rem;
    pointer-events: none;
    border: 1px solid transparent;
    transform-origin: 0 0;
    transition: opacity .1s ease-in-out, transform .1s ease-in-out;
    color: #6c757d;
  }

  .form-floating > .form-control:focus,
  .form-floating > .form-control:not(:placeholder-shown) {
    padding-top: 1.625rem;
    padding-bottom: 0.625rem;
  }

  .form-floating > .form-control:focus ~ label,
  .form-floating > .form-control:not(:placeholder-shown) ~ label {
    opacity: .65;
    transform: scale(.85) translateY(-0.5rem) translateX(0.15rem);
  }

  .form-control {
    display: block;
    width: 100%;
    padding: 0.75rem 1rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 12px;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  }

  .form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: #336D8B;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(51, 109, 139, 0.25);
  }
  
  .card-info .form-control:focus {
    border-color: #FBBB89;
    box-shadow: 0 0 0 0.2rem rgba(251, 187, 137, 0.25);
  }
  
  .card-media .form-control:focus {
    border-color: #336D8B;
    box-shadow: 0 0 0 0.2rem rgba(51, 109, 139, 0.25);
  }

  /* Image upload */
  .form-image-upload {
    padding: 1.5rem;
    border: 2px dashed #ced4da;
    border-radius: 12px;
    text-align: center;
    transition: all 0.3s ease;
    background-color: #f8f9fa;
  }

  .form-image-upload:hover {
    border-color: #336D8B;
    background-color: #f0f7ff;
  }

  .form-control-file {
    display: block;
    width: 100%;
    padding: 0.5rem;
    font-size: 0.875rem;
    line-height: 1.5;
    color: #495057;
    cursor: pointer;
  }

  .form-image-hint {
    margin-top: 0.75rem;
    font-size: 0.75rem;
    color: #6c757d;
  }

  /* Form actions */
  .form-actions {
    display: flex;
    justify-content: flex-end;
    margin-top: 2rem;
  }

  .form-btn-outline {
    background-color: transparent;
    color: #336D8B;
    border: 1px solid #336D8B;
    font-weight: 600;
    padding: 0.75rem 1.5rem;
    border-radius: 12px;
    cursor: pointer;
    transition: all 0.2s ease;
    margin-right: 1rem;
    display: inline-block;
    text-decoration: none;
  }

  .form-btn-outline:hover {
    background-color: #f0f7ff;
    color: #234A5D;
    border-color: #234A5D;
    text-decoration: none;
  }

  .form-btn {
    background-color: #336D8B;
    color: white;
    font-weight: 600;
    padding: 0.75rem 1.5rem;
    border: none;
    border-radius: 12px;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    z-index: 1;
  }
  
  .form-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: all 0.5s ease;
    z-index: -1;
  }

  .form-btn:hover {
    background-color: #234A5D;
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(51, 109, 139, 0.4);
  }
  
  .form-btn:hover::before {
    left: 100%;
  }
  
  /* Form header */
  .form-header {
    margin-bottom: 2rem;
    padding-bottom: 1.5rem;
    border-bottom: 1px solid #e9ecef;
    position: relative;
  }
  
  .form-header::after {
    content: \"\";
    position: absolute;
    bottom: -1px;
    left: 0;
    width: 80px;
    height: 3px;
    background: linear-gradient(90deg, #FBBB89, #336D8B);
    border-radius: 3px;
  }
  
  .form-title {
    font-size: 1.75rem;
    font-weight: 700;
    color: #344767;
    margin-bottom: 0.75rem;
    background: linear-gradient(90deg, #FBBB89, #336D8B);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    display: inline-block;
  }

  .form-subtitle {
    color: #6c757d;
    font-size: 0.95rem;
  }

  /* Content section */
  .content-card {
    background-color: white;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    padding: 2rem;
    margin-bottom: 2rem;
  }

  .content-section {
    display: none;
  }

  .content-section.active {
    display: block;
  }

  /* Forbidden words highlighting */
  .forbidden-word-highlight {
    background-color: #ffcccc;
    color: #d9534f;
    padding: 2px;
    border-radius: 3px;
  }

  .forbidden-words-preview {
    margin-top: 5px;
    font-size: 0.8rem;
    color: #d9534f;
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
        return "social_media/_form.html.twig";
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
        return array (  329 => 145,  324 => 143,  320 => 142,  310 => 135,  305 => 133,  302 => 132,  300 => 127,  296 => 126,  279 => 112,  275 => 111,  271 => 110,  260 => 102,  256 => 101,  252 => 100,  243 => 94,  239 => 93,  235 => 92,  222 => 81,  218 => 79,  212 => 77,  209 => 76,  203 => 74,  201 => 73,  197 => 71,  195 => 70,  194 => 69,  193 => 68,  188 => 66,  177 => 57,  164 => 56,  150 => 51,  137 => 49,  91 => 13,  87 => 12,  78 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'dashVoyageurs/dashboardVoyageurs.html.twig' %}

{% block js%}
{# Keep these includes as they were in the source template #}
<script src=\"https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js\"></script>
<script src=\"//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js\"></script>
<script src=\"//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
<script>
\$(document).ready(function() {
    // Get forbidden words from template if they exist
    const forbiddenWords = {
        title: {{ forbidden_words.title is defined ? forbidden_words.title|json_encode|raw : '[]' }},
        content: {{ forbidden_words.content is defined ? forbidden_words.content|json_encode|raw : '[]' }}
    };

    // Highlight forbidden words in fields
    function highlightForbiddenWords(fieldId, words) {
        const field = \$(`#\${fieldId}`);
        const text = field.val();
        
        words.forEach(word => {
            const regex = new RegExp(word, 'gi');
            const highlighted = text.replace(regex, 
                `<span class=\"forbidden-word-highlight\">\${word}</span>`);
            field.next('.forbidden-words-preview').html(highlighted);
        });
    }

    // Add preview divs after fields
    \$('#social_media_titre').after('<div class=\"forbidden-words-preview\"></div>');
    \$('#social_media_contenu').after('<div class=\"forbidden-words-preview\"></div>');

    // Check on input
    \$('#social_media_titre').on('input', function() {
        highlightForbiddenWords('social_media_titre', forbiddenWords.title);
    });

    \$('#social_media_contenu').on('input', function() {
        highlightForbiddenWords('social_media_contenu', forbiddenWords.content);
    });

    // Initial check
    highlightForbiddenWords('social_media_titre', forbiddenWords.title);
    highlightForbiddenWords('social_media_contenu', forbiddenWords.content);
});
</script>
{% endblock %}

{% block stylesheets %}
{# Keep these includes as they were in the source template #}
<link href=\"https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.css\" rel=\"stylesheet\" />
<link href=\"//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css\" rel=\"stylesheet\" id=\"bootstrap-css\">
<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css\">
{% endblock %}

{% block body %}
<div class=\"container-fluid py-4\">
    <div class=\"row\">
        <div class=\"col-12\">
            <div class=\"content-card content-section active\" id=\"social-media-section\">
                <div class=\"form-header\">
                    <h2 class=\"form-title\">Nouvelle Publication</h2>
                    <p class=\"form-subtitle\">Complétez les informations ci-dessous pour créer une nouvelle publication sur les réseaux sociaux.</p>
                </div>

                {{ form_start(form, {'method': 'POST', 'attr': {'class': 'social-media-form', 'novalidate': 'novalidate', 'enctype': 'multipart/form-data'}}) }}
                    
                    {% if forbidden_words is defined and 
                        ((forbidden_words.title is defined and forbidden_words.title is not empty) or 
                         (forbidden_words.content is defined and forbidden_words.content is not empty)) %}
                        <div class=\"alert alert-danger forbidden-words-alert\">
                            <h5>Mots interdits détectés:</h5>
                            {% if forbidden_words.title is defined and forbidden_words.title is not empty %}
                                <p><strong>Titre:</strong> {{ forbidden_words.title|join(', ') }}</p>
                            {% endif %}
                            {% if forbidden_words.content is defined and forbidden_words.content is not empty %}
                                <p><strong>Contenu:</strong> {{ forbidden_words.content|join(', ') }}</p>
                            {% endif %}
                        </div>
                    {% endif %}
                    
                    <!-- Basic Info Card -->
                    <div class=\"form-card card-info\">
                        <div class=\"form-card-header\">
                            <i class=\"fas fa-info-circle form-card-icon\"></i>
                            <h3 class=\"form-card-title\">Informations de base</h3>
                        </div>
                        <div class=\"form-card-body\">
                            <div class=\"form-row\">
                                <div class=\"form-col form-col-md-6\">
                                    <div class=\"form-floating\">
                                        {{ form_widget(form.titre, {'attr': {'class': 'form-control', 'placeholder': ' '}}) }}
                                        {{ form_label(form.titre) }}
                                        {{ form_errors(form.titre) }}
                                    </div>
                                </div>
                                
                                <div class=\"form-col form-col-md-6\">
                                    <div class=\"form-floating\">
                                        {{ form_widget(form.lieu, {'attr': {'class': 'form-control', 'placeholder': ' '}}) }}
                                        {{ form_label(form.lieu) }}
                                        {{ form_errors(form.lieu) }}
                                    </div>
                                </div>
                            </div>

                            <div class=\"form-spacer\"></div>
                            
                            <div class=\"form-floating\">
                                {{ form_widget(form.contenu, {'attr': {'class': 'form-control', 'style': 'height: 120px', 'placeholder': ' '}}) }}
                                {{ form_label(form.contenu) }}
                                {{ form_errors(form.contenu) }}
                            </div>
                        </div>
                    </div>
                    
                    <!-- Media Card -->
                    <div class=\"form-card card-media\">
                        <div class=\"form-card-header\">
                            <i class=\"fas fa-photo-video form-card-icon\"></i>
                            <h3 class=\"form-card-title\">Média</h3>
                        </div>
                        <div class=\"form-card-body\">
                            <div class=\"form-image-upload\">
                                <h4>Télécharger une image ou une vidéo</h4>
                                {{ form_label(form.imagemedia) }}
                                {{ form_widget(form.imagemedia, {
                                    'attr': {
                                        'class': 'form-control-file',
                                        'accept': 'image/jpeg, image/jpg, image/png, image/gif, image/avif, video/x-msvideo, video/avi, video/msvideo, video/mpeg, video/mp4'
                                    }
                                }) }}
                                <small class=\"form-image-hint\">{{ form_help(form.imagemedia) }}</small>
                                <div class=\"invalid-feedback\">
                                    {{ form_errors(form.imagemedia) }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=\"form-actions\">
                        <a href=\"{{ path('socialVoyageurs_page') }}\" class=\"form-btn-outline\">Annuler</a>
                        <button type=\"submit\" class=\"form-btn\">{{ button_label|default('Publier') }}</button>
                    </div>
                {{ form_end(form) }}
            </div>
        </div>
    </div>

    <footer class=\"footer pt-3\">
        <div class=\"container-fluid\">
            <div class=\"row align-items-center justify-content-lg-between\">
                <div class=\"col-lg-6 mb-lg-0 mb-4\">
                    <div class=\"copyright text-center text-sm text-muted text-lg-start\">
                        © <script>document.write(new Date().getFullYear())</script>,
                        made with <i class=\"fa fa-heart\"></i> by
                        <a href=\"https://www.creative-tim.com\" class=\"font-weight-bold\" target=\"_blank\">Creative Tim</a>
                        for a better web.
                    </div>
                </div>
                <div class=\"col-lg-6\">
                    <ul class=\"nav nav-footer justify-content-center justify-content-lg-end\">
                        <li class=\"nav-item\">
                            <a href=\"https://www.creative-tim.com\" class=\"nav-link text-muted\" target=\"_blank\">Creative Tim</a>
                        </li>
                        <li class=\"nav-item\">
                            <a href=\"https://www.creative-tim.com/presentation\" class=\"nav-link text-muted\" target=\"_blank\">About Us</a>
                        </li>
                        <li class=\"nav-item\">
                            <a href=\"https://www.creative-tim.com/blog\" class=\"nav-link text-muted\" target=\"_blank\">Blog</a>
                        </li>
                        <li class=\"nav-item\">
                            <a href=\"https://www.creative-tim.com/license\" class=\"nav-link pe-0 text-muted\" target=\"_blank\">License</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div>

<style>
  /* Alert styles */
  .alert {
    font-size: 1.2em;
    margin-top: 20px;
  }

  .forbidden-words-alert {
    margin-top: 20px;
    margin-bottom: 25px;
    font-size: 1.2em;
    padding: 1rem 1.25rem;
    border: 1px solid transparent;
    border-radius: .25rem;
  }

  .forbidden-words-alert h5,
  .forbidden-words-alert p {
    color: #dc3545 !important;
  }

  .forbidden-words-alert h5 {
    font-weight: bold;
  }

  .forbidden-words-alert p:last-child {
    margin-bottom: 0;
  }

  /* Form card styles */
  .form-card {
    background-color: white;
    border-radius: 20px;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
    margin-bottom: 1.5rem;
    border: 1px solid #eaedf2;
    overflow: hidden;
    transition: all 0.3s ease;
    position: relative;
  }

  .form-card:hover {
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    transform: translateY(-2px);
  }
  
  .form-card::before {
    content: \"\";
    position: absolute;
    top: 0;
    left: 0;
    width: 5px;
    height: 100%;
    transition: all 0.3s ease;
  }
  
  .card-info::before {
    background-color: #FBBB89;
  }
  
  .card-media::before {
    background-color: #336D8B;
  }

  .form-card-header {
    display: flex;
    align-items: center;
    padding: 1.25rem 1.5rem;
    background-color: #f8fafc;
    border-bottom: 1px solid #eaedf2;
    position: relative;
    z-index: 1;
    overflow: hidden;
  }
  
  .form-card-header::after {
    content: \"\";
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    width: 30%;
    background: linear-gradient(to right, rgba(255, 255, 255, 0), rgba(251, 187, 137, 0.1));
    z-index: -1;
  }
  
  .card-info .form-card-header::after {
    background: linear-gradient(to right, rgba(255, 255, 255, 0), rgba(251, 187, 137, 0.1));
  }
  
  .card-media .form-card-header::after {
    background: linear-gradient(to right, rgba(255, 255, 255, 0), rgba(51, 109, 139, 0.1));
  }

  .form-card-icon {
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    border-radius: 10px;
    margin-right: 1rem;
    padding: 0.5rem;
  }
  
  .card-info .form-card-icon {
    background-color: #FBBB89;
  }
  
  .card-media .form-card-icon {
    background-color: #336D8B;
  }

  .form-card-title {
    margin: 0;
    font-size: 1.1rem;
    font-weight: 600;
    color: #344767;
  }

  .form-card-body {
    padding: 1.5rem;
    position: relative;
    z-index: 1;
  }
  
  .form-card-body::before {
    content: \"\";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(94, 114, 228, 0.02) 0%, rgba(255, 255, 255, 0) 50%);
    pointer-events: none;
    z-index: -1;
  }

  .form-spacer {
    height: 1rem;
  }

  /* Form controls */
  .form-row {
    display: flex;
    flex-wrap: wrap;
    margin-right: -0.75rem;
    margin-left: -0.75rem;
  }

  .form-col {
    position: relative;
    width: 100%;
    padding-right: 0.75rem;
    padding-left: 0.75rem;
  }

  @media (min-width: 768px) {
    .form-col-md-6 {
      flex: 0 0 50%;
      max-width: 50%;
    }
  }

  .form-floating {
    position: relative;
    margin-bottom: 0.5rem;
  }

  .form-floating > .form-control {
    height: 58px;
    padding: 1rem 0.75rem;
  }

  .form-floating > textarea.form-control {
    height: auto;
  }

  .form-floating > label {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    padding: 1rem 0.75rem;
    pointer-events: none;
    border: 1px solid transparent;
    transform-origin: 0 0;
    transition: opacity .1s ease-in-out, transform .1s ease-in-out;
    color: #6c757d;
  }

  .form-floating > .form-control:focus,
  .form-floating > .form-control:not(:placeholder-shown) {
    padding-top: 1.625rem;
    padding-bottom: 0.625rem;
  }

  .form-floating > .form-control:focus ~ label,
  .form-floating > .form-control:not(:placeholder-shown) ~ label {
    opacity: .65;
    transform: scale(.85) translateY(-0.5rem) translateX(0.15rem);
  }

  .form-control {
    display: block;
    width: 100%;
    padding: 0.75rem 1rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 12px;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  }

  .form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: #336D8B;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(51, 109, 139, 0.25);
  }
  
  .card-info .form-control:focus {
    border-color: #FBBB89;
    box-shadow: 0 0 0 0.2rem rgba(251, 187, 137, 0.25);
  }
  
  .card-media .form-control:focus {
    border-color: #336D8B;
    box-shadow: 0 0 0 0.2rem rgba(51, 109, 139, 0.25);
  }

  /* Image upload */
  .form-image-upload {
    padding: 1.5rem;
    border: 2px dashed #ced4da;
    border-radius: 12px;
    text-align: center;
    transition: all 0.3s ease;
    background-color: #f8f9fa;
  }

  .form-image-upload:hover {
    border-color: #336D8B;
    background-color: #f0f7ff;
  }

  .form-control-file {
    display: block;
    width: 100%;
    padding: 0.5rem;
    font-size: 0.875rem;
    line-height: 1.5;
    color: #495057;
    cursor: pointer;
  }

  .form-image-hint {
    margin-top: 0.75rem;
    font-size: 0.75rem;
    color: #6c757d;
  }

  /* Form actions */
  .form-actions {
    display: flex;
    justify-content: flex-end;
    margin-top: 2rem;
  }

  .form-btn-outline {
    background-color: transparent;
    color: #336D8B;
    border: 1px solid #336D8B;
    font-weight: 600;
    padding: 0.75rem 1.5rem;
    border-radius: 12px;
    cursor: pointer;
    transition: all 0.2s ease;
    margin-right: 1rem;
    display: inline-block;
    text-decoration: none;
  }

  .form-btn-outline:hover {
    background-color: #f0f7ff;
    color: #234A5D;
    border-color: #234A5D;
    text-decoration: none;
  }

  .form-btn {
    background-color: #336D8B;
    color: white;
    font-weight: 600;
    padding: 0.75rem 1.5rem;
    border: none;
    border-radius: 12px;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    z-index: 1;
  }
  
  .form-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: all 0.5s ease;
    z-index: -1;
  }

  .form-btn:hover {
    background-color: #234A5D;
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(51, 109, 139, 0.4);
  }
  
  .form-btn:hover::before {
    left: 100%;
  }
  
  /* Form header */
  .form-header {
    margin-bottom: 2rem;
    padding-bottom: 1.5rem;
    border-bottom: 1px solid #e9ecef;
    position: relative;
  }
  
  .form-header::after {
    content: \"\";
    position: absolute;
    bottom: -1px;
    left: 0;
    width: 80px;
    height: 3px;
    background: linear-gradient(90deg, #FBBB89, #336D8B);
    border-radius: 3px;
  }
  
  .form-title {
    font-size: 1.75rem;
    font-weight: 700;
    color: #344767;
    margin-bottom: 0.75rem;
    background: linear-gradient(90deg, #FBBB89, #336D8B);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    display: inline-block;
  }

  .form-subtitle {
    color: #6c757d;
    font-size: 0.95rem;
  }

  /* Content section */
  .content-card {
    background-color: white;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    padding: 2rem;
    margin-bottom: 2rem;
  }

  .content-section {
    display: none;
  }

  .content-section.active {
    display: block;
  }

  /* Forbidden words highlighting */
  .forbidden-word-highlight {
    background-color: #ffcccc;
    color: #d9534f;
    padding: 2px;
    border-radius: 3px;
  }

  .forbidden-words-preview {
    margin-top: 5px;
    font-size: 0.8rem;
    color: #d9534f;
  }
</style>
{% endblock %}
", "social_media/_form.html.twig", "C:\\Users\\meria\\OneDrive - ESPRIT\\Bureau\\Airmess_Web\\templates\\social_media\\_form.html.twig");
    }
}
