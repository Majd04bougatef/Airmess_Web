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
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "social_media/_form.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "social_media/_form.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "social_media/_form.html.twig", 1);
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
        yield json_encode(((CoreExtension::getAttribute($this->env, $this->source, ($context["forbidden_words"] ?? null), "title", [], "any", true, true, false, 12)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["forbidden_words"]) || array_key_exists("forbidden_words", $context) ? $context["forbidden_words"] : (function () { throw new RuntimeError('Variable "forbidden_words" does not exist.', 12, $this->source); })()), "title", [], "any", false, false, false, 12), [])) : ([])));
        yield ",
        content: ";
        // line 13
        yield json_encode(((CoreExtension::getAttribute($this->env, $this->source, ($context["forbidden_words"] ?? null), "content", [], "any", true, true, false, 13)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["forbidden_words"]) || array_key_exists("forbidden_words", $context) ? $context["forbidden_words"] : (function () { throw new RuntimeError('Variable "forbidden_words" does not exist.', 13, $this->source); })()), "content", [], "any", false, false, false, 13), [])) : ([])));
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

";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 57
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

        // line 58
        yield "<div class=\"container-fluid py-4\">
    <div class=\"row\">
        <div class=\"col-12\">
            <div class=\"card mb-4\">
                <div class=\"card-header pb-0\">
                    ";
        // line 64
        yield "                    <h6>Nouvelle Publication</h6>
                </div>
                <div class=\"card-body px-lg-5 pt-0 pb-2\"> ";
        // line 67
        yield "                    ";
        // line 68
        yield "                    ";
        // line 69
        yield "
                    <section class=\"get-in-touch\">
                        ";
        // line 72
        yield "                        <h1 class=\"title\">Ajouter une publication</h1>

                        ";
        // line 75
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 75, $this->source); })()), 'form_start', ["method" => "POST", "attr" => ["class" => "contact-form", "novalidate" => "novalidate"]]);
        yield "
                            ";
        // line 77
        yield "                            ";
        if ((array_key_exists("forbidden_words", $context) && ( !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, (isset($context["forbidden_words"]) || array_key_exists("forbidden_words", $context) ? $context["forbidden_words"] : (function () { throw new RuntimeError('Variable "forbidden_words" does not exist.', 77, $this->source); })()), "title", [], "any", false, false, false, 77)) ||  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, (isset($context["forbidden_words"]) || array_key_exists("forbidden_words", $context) ? $context["forbidden_words"] : (function () { throw new RuntimeError('Variable "forbidden_words" does not exist.', 77, $this->source); })()), "content", [], "any", false, false, false, 77))))) {
            // line 78
            yield "                                <div class=\"alert alert-danger forbidden-words-alert\">
                                    <h5>Mots interdits détectés:</h5>
                                    ";
            // line 80
            if ( !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, (isset($context["forbidden_words"]) || array_key_exists("forbidden_words", $context) ? $context["forbidden_words"] : (function () { throw new RuntimeError('Variable "forbidden_words" does not exist.', 80, $this->source); })()), "title", [], "any", false, false, false, 80))) {
                // line 81
                yield "                                        <p><strong>Titre:</strong> ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::join(CoreExtension::getAttribute($this->env, $this->source, (isset($context["forbidden_words"]) || array_key_exists("forbidden_words", $context) ? $context["forbidden_words"] : (function () { throw new RuntimeError('Variable "forbidden_words" does not exist.', 81, $this->source); })()), "title", [], "any", false, false, false, 81), ", "), "html", null, true);
                yield "</p>
                                    ";
            }
            // line 83
            yield "                                    ";
            if ( !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, (isset($context["forbidden_words"]) || array_key_exists("forbidden_words", $context) ? $context["forbidden_words"] : (function () { throw new RuntimeError('Variable "forbidden_words" does not exist.', 83, $this->source); })()), "content", [], "any", false, false, false, 83))) {
                // line 84
                yield "                                        <p><strong>Contenu:</strong> ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::join(CoreExtension::getAttribute($this->env, $this->source, (isset($context["forbidden_words"]) || array_key_exists("forbidden_words", $context) ? $context["forbidden_words"] : (function () { throw new RuntimeError('Variable "forbidden_words" does not exist.', 84, $this->source); })()), "content", [], "any", false, false, false, 84), ", "), "html", null, true);
                yield "</p>
                                    ";
            }
            // line 86
            yield "                                </div>
                            ";
        }
        // line 88
        yield "                            
                            ";
        // line 90
        yield "                            <div class=\"row\">

                                ";
        // line 93
        yield "
                                <div class=\"form-field col-lg-6\">
                                    ";
        // line 96
        yield "                                    ";
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 96, $this->source); })()), "titre", [], "any", false, false, false, 96), 'row', ["attr" => ["class" => "input-text"]]);
        yield "
                                </div>
                                <div class=\"form-field col-lg-6\">
                                    ";
        // line 99
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 99, $this->source); })()), "lieu", [], "any", false, false, false, 99), 'row', ["attr" => ["class" => "input-text"]]);
        yield "
                                </div>
                                <div class=\"form-field col-lg-12\"> ";
        // line 102
        yield "                                     ";
        // line 103
        yield "                                    ";
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 103, $this->source); })()), "contenu", [], "any", false, false, false, 103), 'row', ["attr" => ["class" => "input-text"]]);
        yield "
                                </div>
                                <div class=\"form-field col-lg-12\"> ";
        // line 106
        yield "                                     ";
        // line 107
        yield "                                     ";
        // line 108
        yield "                                    ";
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 108, $this->source); })()), "imagemedia", [], "any", false, false, false, 108), 'row', ["attr" => ["class" => "input-text"]]);
        yield "
                                </div>

                                ";
        // line 112
        yield "                                <div class=\"form-field col-lg-12 text-center\">
                                    <button type=\"submit\" class=\"submit-btn\">";
        // line 113
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("button_label", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["button_label"]) || array_key_exists("button_label", $context) ? $context["button_label"] : (function () { throw new RuntimeError('Variable "button_label" does not exist.', 113, $this->source); })()), "Ajouter")) : ("Ajouter")), "html", null, true);
        yield "</button>
                                </div>
                            </div> ";
        // line 116
        yield "                        ";
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 116, $this->source); })()), 'form_end');
        yield "
                    </section>

                </div> ";
        // line 120
        yield "            </div> ";
        // line 121
        yield "        </div> ";
        // line 122
        yield "    </div> ";
        // line 123
        yield "
    ";
        // line 125
        yield "    <footer class=\"footer pt-3  \">
        <div class=\"container-fluid\">
          <div class=\"row align-items-center justify-content-lg-between\">
            <div class=\"col-lg-6 mb-lg-0 mb-4\">
              <div class=\"copyright text-center text-sm text-muted text-lg-start\">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
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
</div> ";
        // line 158
        yield "


    <style>

    /* General alert styling (as you had) */
    .alert {
        font-size: 1.2em;
        margin-top: 20px;
    }


    /* Styles for the specific forbidden words alert container */
    .forbidden-words-alert {
        /* alert-danger class in HTML will provide background/border colors */
        margin-top: 20px;
        margin-bottom: 25px;
        font-size: 1.2em; /* Your desired font size */
        padding: 1rem 1.25rem; /* Standard Bootstrap padding */
        border: 1px solid transparent; /* Let alert-danger define border */
        border-radius: .25rem; /* Standard Bootstrap radius */
    }

    /* --- Force text color to be RED inside this specific alert --- */
    .forbidden-words-alert h5,
    .forbidden-words-alert p {
        color: #dc3545 !important; /* Bootstrap's danger red. !important might be needed to override */
    }

    /* --- Make the heading bold inside this specific alert --- */
    .forbidden-words-alert h5 {
         font-weight: bold;
    }

    /* --- Remove margin bottom from the last paragraph inside this specific alert --- */
     .forbidden-words-alert p:last-child {
        margin-bottom: 0; /* Completed rule */
     }


    /* --- Your other existing styles --- */
    .get-in-touch {
      max-width: 800px;
      margin: 50px auto;
      position: relative;

    }
    .get-in-touch .title {
      text-align: center;
      text-transform: uppercase;
      letter-spacing: 3px;
      font-size: 3.2em;
      line-height: 48px;
      padding-bottom: 48px;
         color: #5543ca;
        background: #5543ca;
        background: -moz-linear-gradient(left,#f4524d  0%,#5543ca 100%) !important;
        background: -webkit-linear-gradient(left,#f4524d  0%,#5543ca 100%) !important;
        background: linear-gradient(to right,#f4524d  0%,#5543ca  100%) !important;
        -webkit-background-clip: text !important;
        -webkit-text-fill-color: transparent !important;
    }

    .contact-form .form-field {
      position: relative;
      margin: 32px 0;
    }
    .contact-form .input-text {
      display: block;
      width: 100%;
      height: 36px;
      border-width: 0 0 2px 0;
      border-color: #5543ca;
      font-size: 18px;
      line-height: 26px;
      font-weight: 400;
    }
    .contact-form .input-text:focus {
      outline: none;
    }
    .contact-form .input-text:focus + .label,
    .contact-form .input-text.not-empty + .label {
      -webkit-transform: translateY(-24px);
              transform: translateY(-24px);
    }
    .contact-form .label {
      position: absolute;
      left: 20px;
      bottom: 11px;
      font-size: 18px;
      line-height: 26px;
      font-weight: 400;
      color: #5543ca;
      cursor: text;
      transition: -webkit-transform .2s ease-in-out;
      transition: transform .2s ease-in-out;
      transition: transform .2s ease-in-out,
      -webkit-transform .2s ease-in-out;
    }
    .contact-form .submit-btn {
      display: inline-block;
      background-color: #000;
       background-image: linear-gradient(125deg,#a72879,#064497);
      color: #fff;
      text-transform: uppercase;
      letter-spacing: 2px;
      font-size: 16px;
      padding: 8px 16px;
      border: none;
      width:200px;
      cursor: pointer;
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
        return array (  332 => 158,  298 => 125,  295 => 123,  293 => 122,  291 => 121,  289 => 120,  282 => 116,  277 => 113,  274 => 112,  267 => 108,  265 => 107,  263 => 106,  257 => 103,  255 => 102,  250 => 99,  243 => 96,  239 => 93,  235 => 90,  232 => 88,  228 => 86,  222 => 84,  219 => 83,  213 => 81,  211 => 80,  207 => 78,  204 => 77,  200 => 75,  196 => 72,  192 => 69,  190 => 68,  188 => 67,  184 => 64,  177 => 58,  164 => 57,  150 => 51,  137 => 49,  91 => 13,  87 => 12,  78 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source(" {% extends 'base.html.twig' %}

{% block js%}
{# Keep these includes as they were in the source template #}
<script src=\"https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js\"></script>
<script src=\"//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js\"></script>
<script src=\"//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
<script>
\$(document).ready(function() {
    // Get forbidden words from template if they exist
    const forbiddenWords = {
        title: {{ forbidden_words.title|default([])|json_encode|raw }},
        content: {{ forbidden_words.content|default([])|json_encode|raw }}
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

{% endblock %}


{% block body %}
<div class=\"container-fluid py-4\">
    <div class=\"row\">
        <div class=\"col-12\">
            <div class=\"card mb-4\">
                <div class=\"card-header pb-0\">
                    {# === Changed Title === #}
                    <h6>Nouvelle Publication</h6>
                </div>
                <div class=\"card-body px-lg-5 pt-0 pb-2\"> {# Added more padding #}
                    {# Removed table-responsive div #}
                    {# === Removed Map Div and Script === #}

                    <section class=\"get-in-touch\">
                        {# === Changed Title === #}
                        <h1 class=\"title\">Ajouter une publication</h1>

                        {# === Changed form action path === #}
{{ form_start(form, {'method': 'POST', 'attr': {'class': 'contact-form', 'novalidate': 'novalidate'}}) }}
                            {# Alert for forbidden words #}
                            {% if forbidden_words is defined and (forbidden_words.title is not empty or forbidden_words.content is not empty) %}
                                <div class=\"alert alert-danger forbidden-words-alert\">
                                    <h5>Mots interdits détectés:</h5>
                                    {% if forbidden_words.title is not empty %}
                                        <p><strong>Titre:</strong> {{ forbidden_words.title|join(', ') }}</p>
                                    {% endif %}
                                    {% if forbidden_words.content is not empty %}
                                        <p><strong>Contenu:</strong> {{ forbidden_words.content|join(', ') }}</p>
                                    {% endif %}
                                </div>
                            {% endif %}
                            
                            {# Removed outer 'row' class from form_start, using it inside #}
                            <div class=\"row\">

                                {# === Replaced Station fields with SocialMedia fields === #}

                                <div class=\"form-field col-lg-6\">
                                    {# Using form_row to replicate original structure #}
                                    {{ form_row(form.titre, {'attr': {'class': 'input-text'}}) }}
                                </div>
                                <div class=\"form-field col-lg-6\">
                                    {{ form_row(form.lieu, {'attr': {'class': 'input-text'}}) }}
                                </div>
                                <div class=\"form-field col-lg-12\"> {# Content full width #}
                                     {# Ensure 'contenu' uses TextareaType in your Form Class #}
                                    {{ form_row(form.contenu, {'attr': {'class': 'input-text'}}) }}
                                </div>
                                <div class=\"form-field col-lg-12\"> {# Image full width #}
                                     {# Ensure 'imagemedia' uses FileType in your Form Class #}
                                     {# Applying 'input-text' class as per original template, may look odd #}
                                    {{ form_row(form.imagemedia, {'attr': {'class': 'input-text'}}) }}
                                </div>

                                {# === Submit Button === #}
                                <div class=\"form-field col-lg-12 text-center\">
                                    <button type=\"submit\" class=\"submit-btn\">{{ button_label|default('Ajouter') }}</button>
                                </div>
                            </div> {# End inner .row #}
                        {{ form_end(form) }}
                    </section>

                </div> {# End .card-body #}
            </div> {# End .card #}
        </div> {# End .col-12 #}
    </div> {# End .row #}

    {# === Footer from original template === #}
    <footer class=\"footer pt-3  \">
        <div class=\"container-fluid\">
          <div class=\"row align-items-center justify-content-lg-between\">
            <div class=\"col-lg-6 mb-lg-0 mb-4\">
              <div class=\"copyright text-center text-sm text-muted text-lg-start\">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
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
</div> {# End .container-fluid #}



    <style>

    /* General alert styling (as you had) */
    .alert {
        font-size: 1.2em;
        margin-top: 20px;
    }


    /* Styles for the specific forbidden words alert container */
    .forbidden-words-alert {
        /* alert-danger class in HTML will provide background/border colors */
        margin-top: 20px;
        margin-bottom: 25px;
        font-size: 1.2em; /* Your desired font size */
        padding: 1rem 1.25rem; /* Standard Bootstrap padding */
        border: 1px solid transparent; /* Let alert-danger define border */
        border-radius: .25rem; /* Standard Bootstrap radius */
    }

    /* --- Force text color to be RED inside this specific alert --- */
    .forbidden-words-alert h5,
    .forbidden-words-alert p {
        color: #dc3545 !important; /* Bootstrap's danger red. !important might be needed to override */
    }

    /* --- Make the heading bold inside this specific alert --- */
    .forbidden-words-alert h5 {
         font-weight: bold;
    }

    /* --- Remove margin bottom from the last paragraph inside this specific alert --- */
     .forbidden-words-alert p:last-child {
        margin-bottom: 0; /* Completed rule */
     }


    /* --- Your other existing styles --- */
    .get-in-touch {
      max-width: 800px;
      margin: 50px auto;
      position: relative;

    }
    .get-in-touch .title {
      text-align: center;
      text-transform: uppercase;
      letter-spacing: 3px;
      font-size: 3.2em;
      line-height: 48px;
      padding-bottom: 48px;
         color: #5543ca;
        background: #5543ca;
        background: -moz-linear-gradient(left,#f4524d  0%,#5543ca 100%) !important;
        background: -webkit-linear-gradient(left,#f4524d  0%,#5543ca 100%) !important;
        background: linear-gradient(to right,#f4524d  0%,#5543ca  100%) !important;
        -webkit-background-clip: text !important;
        -webkit-text-fill-color: transparent !important;
    }

    .contact-form .form-field {
      position: relative;
      margin: 32px 0;
    }
    .contact-form .input-text {
      display: block;
      width: 100%;
      height: 36px;
      border-width: 0 0 2px 0;
      border-color: #5543ca;
      font-size: 18px;
      line-height: 26px;
      font-weight: 400;
    }
    .contact-form .input-text:focus {
      outline: none;
    }
    .contact-form .input-text:focus + .label,
    .contact-form .input-text.not-empty + .label {
      -webkit-transform: translateY(-24px);
              transform: translateY(-24px);
    }
    .contact-form .label {
      position: absolute;
      left: 20px;
      bottom: 11px;
      font-size: 18px;
      line-height: 26px;
      font-weight: 400;
      color: #5543ca;
      cursor: text;
      transition: -webkit-transform .2s ease-in-out;
      transition: transform .2s ease-in-out;
      transition: transform .2s ease-in-out,
      -webkit-transform .2s ease-in-out;
    }
    .contact-form .submit-btn {
      display: inline-block;
      background-color: #000;
       background-image: linear-gradient(125deg,#a72879,#064497);
      color: #fff;
      text-transform: uppercase;
      letter-spacing: 2px;
      font-size: 16px;
      padding: 8px 16px;
      border: none;
      width:200px;
      cursor: pointer;
    }

</style>
    
{% endblock %}
", "social_media/_form.html.twig", "C:\\Users\\MSI\\Desktop\\Airmess_Web\\templates\\social_media\\_form.html.twig");
    }
}
