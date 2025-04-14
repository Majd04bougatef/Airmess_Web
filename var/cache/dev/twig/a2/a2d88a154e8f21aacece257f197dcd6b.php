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

/* station/_form.html.twig */
class __TwigTemplate_a181d00de8a1ccee628a8359eeed35ac extends Template
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
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'js' => [$this, 'block_js'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "dashEntreprise/dashboardEntreprise.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "station/_form.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "station/_form.html.twig"));

        $this->parent = $this->loadTemplate("dashEntreprise/dashboardEntreprise.html.twig", "station/_form.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
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

        yield "Ajouter Station";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
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

        // line 6
        yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        yield "
<link rel=\"stylesheet\" href=\"https://unpkg.com/leaflet@1.9.4/dist/leaflet.css\" integrity=\"sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=\" crossorigin=\"\"/>

<style>
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

.card-location::before {
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

.card-location .form-card-icon {
    background-color: #336D8B;
}

.form-card-title {
    margin: 0;
    font-size: 1.25rem;
    font-weight: 600;
    color: #1e293b;
}

.form-card-body {
    padding: 1.5rem;
}

.form-row {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
    margin-bottom: 1rem;
}

.form-floating {
    position: relative;
    margin-bottom: 1rem;
}

.form-control {
    display: block;
    width: 100%;
    padding: 1rem 0.75rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1.5;
    color: #1e293b;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #e2e8f0;
    border-radius: 0.375rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.form-label {
    position: absolute;
    top: 1rem;
    left: 0.75rem;
    padding: 0 0.25rem;
    background-color: transparent;
    color: #64748b;
    font-size: 0.875rem;
    transition: all 0.2s ease-in-out;
    pointer-events: none;
    transform-origin: 0 0;
    line-height: 1;
    height: auto;
}

.form-control:focus ~ .form-label,
.form-control:not(:placeholder-shown) ~ .form-label {
    transform: translateY(-1.5rem) scale(0.85);
    color: #3b82f6;
    background-color: #fff;
    padding: 0 0.25rem;
    height: auto;
    line-height: 1;
    margin-top: 0;
}

.form-control:focus {
    border-color: #3b82f6;
    outline: 0;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

#map {
    height: 400px;
    width: 100%;
    margin-top: 1.5rem;
    border-radius: 0.5rem;
    border: 1px solid #e2e8f0;
}

.map-instructions {
    margin-top: 0.5rem;
    font-size: 0.875rem;
    color: #64748b;
    text-align: center;
}

.form-actions {
    display: flex;
    justify-content: flex-end;
    gap: 1rem;
    margin-top: 2rem;
}

.form-btn {
    padding: 0.75rem 1.5rem;
    font-size: 1rem;
    font-weight: 500;
    border-radius: 0.5rem;
    cursor: pointer;
    transition: all 0.2s ease-in-out;
}

.form-btn-primary {
    background-color: #3b82f6;
    color: white;
    border: none;
}

.form-btn-primary:hover {
    background-color: #2563eb;
}

.form-btn-outline {
    background-color: transparent;
    color: #64748b;
    border: 1px solid #e2e8f0;
}

.form-btn-outline:hover {
    background-color: #f8fafc;
    color: #1e293b;
}

/* Add styles for validation */
.is-invalid {
    border-color: #e2e8f0 !important;
    background-image: none;
    padding-right: 0.75rem;
}

.invalid-feedback {
    display: block !important;
    color: #dc3545;
    font-size: 0.875rem;
    margin-top: 0.25rem;
    font-weight: 500;
    padding-left: 0.25rem;
}

/* Error message styling */
.form-error {
    color: #dc3545;
    font-size: 0.875rem;
    margin-top: 0.25rem;
    font-weight: 500;
    display: block;
}

.is-invalid {
    border-color: #e2e8f0 !important;
    background-image: none;
    padding-right: 0.75rem;
}
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 241
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

        // line 242
        yield from $this->yieldParentBlock("js", $context, $blocks);
        yield "
<script src=\"https://unpkg.com/leaflet@1.9.4/dist/leaflet.js\" integrity=\"sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=\" crossorigin=\"\"></script>
<script>
document.addEventListener('DOMContentLoaded', initFormMap);

function initFormMap() {
    if (!document.getElementById('map')) return;
    
    if (window.formMap) {
        window.formMap.remove();
    }
    
    var map = L.map('map').setView([36.8065, 10.1815], 13);
    window.formMap = map;
    
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href=\"https://www.openstreetmap.org/copyright\">OpenStreetMap</a> contributors'
    }).addTo(map);
    
    var marker = L.marker([36.8065, 10.1815], {
        draggable: true
    }).addTo(map);
    
    marker.on('dragend', function(e) {
        updateCoordinates(marker.getLatLng());
    });
    
    map.on('click', function(e) {
        marker.setLatLng(e.latlng);
        updateCoordinates(e.latlng);
    });
    
    function updateCoordinates(position) {
        document.getElementById('station_latitude').value = position.lat.toFixed(6);
        document.getElementById('station_longitude').value = position.lng.toFixed(6);
    }
}
</script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 283
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

        // line 284
        yield "<div class=\"content-card content-section active\">
    <div class=\"form-header\">
        <h2 class=\"form-title\">";
        // line 286
        yield ((array_key_exists("button_label", $context)) ? ("Modifier") : ("Ajouter"));
        yield " une Station</h2>
        <p class=\"form-subtitle\">Complétez les informations ci-dessous pour ";
        // line 287
        yield ((array_key_exists("button_label", $context)) ? ("modifier") : ("ajouter"));
        yield " une station.</p>
    </div>

    ";
        // line 290
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 290, $this->source); })()), 'form_start', ["method" => "POST", "action" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_station_new"), "attr" => ["class" => "contact-form", "novalidate" => "novalidate"]]);
        yield "
    
    <!-- Basic Info Card -->
    <div class=\"form-card card-info\">
        <div class=\"form-card-header\">
            <i class=\"fas fa-info-circle form-card-icon\"></i>
            <h3 class=\"form-card-title\">Informations de base</h3>
        </div>
        <div class=\"form-card-body\">
            <div class=\"form-row\">
                <div class=\"form-floating\">
                    ";
        // line 301
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 301, $this->source); })()), "nom", [], "any", false, false, false, 301), 'widget', ["attr" => ["class" => ("form-control" . ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 301, $this->source); })()), "nom", [], "any", false, false, false, 301), "vars", [], "any", false, false, false, 301), "errors", [], "any", false, false, false, 301))) ? (" is-invalid") : (""))), "placeholder" => " "]]);
        yield "
                    ";
        // line 302
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 302, $this->source); })()), "nom", [], "any", false, false, false, 302), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
                    <div class=\"invalid-feedback\">
                        ";
        // line 304
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 304, $this->source); })()), "nom", [], "any", false, false, false, 304), 'errors');
        yield "
                    </div>
                </div>
                
                <div class=\"form-floating\">
                    ";
        // line 309
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 309, $this->source); })()), "capacite", [], "any", false, false, false, 309), 'widget', ["attr" => ["class" => ("form-control" . ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 309, $this->source); })()), "capacite", [], "any", false, false, false, 309), "vars", [], "any", false, false, false, 309), "errors", [], "any", false, false, false, 309))) ? (" is-invalid") : (""))), "placeholder" => " "]]);
        yield "
                    ";
        // line 310
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 310, $this->source); })()), "capacite", [], "any", false, false, false, 310), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
                    <div class=\"invalid-feedback\">
                        ";
        // line 312
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 312, $this->source); })()), "capacite", [], "any", false, false, false, 312), 'errors');
        yield "
                    </div>
                </div>
            </div>

            <div class=\"form-row\">
                <div class=\"form-floating\">
                    ";
        // line 319
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 319, $this->source); })()), "nombreVelo", [], "any", false, false, false, 319), 'widget', ["attr" => ["class" => ("form-control" . ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 319, $this->source); })()), "nombreVelo", [], "any", false, false, false, 319), "vars", [], "any", false, false, false, 319), "errors", [], "any", false, false, false, 319))) ? (" is-invalid") : (""))), "placeholder" => " "]]);
        yield "
                    ";
        // line 320
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 320, $this->source); })()), "nombreVelo", [], "any", false, false, false, 320), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
                    <div class=\"invalid-feedback\">
                        ";
        // line 322
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 322, $this->source); })()), "nombreVelo", [], "any", false, false, false, 322), 'errors');
        yield "
                    </div>
                </div>
                
                <div class=\"form-floating\">
                    ";
        // line 327
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 327, $this->source); })()), "typeVelo", [], "any", false, false, false, 327), 'widget', ["attr" => ["class" => ("form-control" . ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 327, $this->source); })()), "typeVelo", [], "any", false, false, false, 327), "vars", [], "any", false, false, false, 327), "errors", [], "any", false, false, false, 327))) ? (" is-invalid") : (""))), "placeholder" => " "]]);
        yield "
                    ";
        // line 328
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 328, $this->source); })()), "typeVelo", [], "any", false, false, false, 328), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
                    <div class=\"invalid-feedback\">
                        ";
        // line 330
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 330, $this->source); })()), "typeVelo", [], "any", false, false, false, 330), 'errors');
        yield "
                    </div>
                </div>
            </div>

            <div class=\"form-row\">
                <div class=\"form-floating\">
                    ";
        // line 337
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 337, $this->source); })()), "prixHeure", [], "any", false, false, false, 337), 'widget', ["attr" => ["class" => ("form-control" . ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 337, $this->source); })()), "prixHeure", [], "any", false, false, false, 337), "vars", [], "any", false, false, false, 337), "errors", [], "any", false, false, false, 337))) ? (" is-invalid") : (""))), "placeholder" => " "]]);
        yield "
                    ";
        // line 338
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 338, $this->source); })()), "prixHeure", [], "any", false, false, false, 338), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
                    <div class=\"invalid-feedback\">
                        ";
        // line 340
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 340, $this->source); })()), "prixHeure", [], "any", false, false, false, 340), 'errors');
        yield "
                    </div>
                </div>
                
                <div class=\"form-floating\">
                    ";
        // line 345
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 345, $this->source); })()), "pays", [], "any", false, false, false, 345), 'widget', ["attr" => ["class" => ("form-control" . ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 345, $this->source); })()), "pays", [], "any", false, false, false, 345), "vars", [], "any", false, false, false, 345), "errors", [], "any", false, false, false, 345))) ? (" is-invalid") : (""))), "placeholder" => " "]]);
        yield "
                    ";
        // line 346
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 346, $this->source); })()), "pays", [], "any", false, false, false, 346), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
                    <div class=\"invalid-feedback\">
                        ";
        // line 348
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 348, $this->source); })()), "pays", [], "any", false, false, false, 348), 'errors');
        yield "
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Location Card -->
    <div class=\"form-card card-location\">
        <div class=\"form-card-header\">
            <i class=\"fas fa-map-marker-alt form-card-icon\"></i>
            <h3 class=\"form-card-title\">Localisation</h3>
        </div>
        <div class=\"form-card-body\">
            <div id=\"map\"></div>
            <p class=\"map-instructions\">Cliquez sur la carte ou faites glisser le marqueur pour sélectionner l'emplacement de la station</p>
            ";
        // line 364
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 364, $this->source); })()), "latitude", [], "any", false, false, false, 364), 'widget', ["attr" => ["style" => "display: none"]]);
        yield "
            ";
        // line 365
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 365, $this->source); })()), "latitude", [], "any", false, false, false, 365), 'errors');
        yield "
            ";
        // line 366
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 366, $this->source); })()), "longitude", [], "any", false, false, false, 366), 'widget', ["attr" => ["style" => "display: none"]]);
        yield "
            ";
        // line 367
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 367, $this->source); })()), "longitude", [], "any", false, false, false, 367), 'errors');
        yield "
        </div>
    </div>

    <div class=\"form-actions\">
        <button type=\"button\" class=\"form-btn form-btn-outline\" onclick=\"window.history.back()\">Annuler</button>
        <button type=\"submit\" class=\"form-btn form-btn-primary\">";
        // line 373
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("button_label", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["button_label"]) || array_key_exists("button_label", $context) ? $context["button_label"] : (function () { throw new RuntimeError('Variable "button_label" does not exist.', 373, $this->source); })()), "Ajouter")) : ("Ajouter")), "html", null, true);
        yield "</button>
    </div>
    
    ";
        // line 376
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 376, $this->source); })()), 'form_end');
        yield "
</div>
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
        return "station/_form.html.twig";
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
        return array (  596 => 376,  590 => 373,  581 => 367,  577 => 366,  573 => 365,  569 => 364,  550 => 348,  545 => 346,  541 => 345,  533 => 340,  528 => 338,  524 => 337,  514 => 330,  509 => 328,  505 => 327,  497 => 322,  492 => 320,  488 => 319,  478 => 312,  473 => 310,  469 => 309,  461 => 304,  456 => 302,  452 => 301,  438 => 290,  432 => 287,  428 => 286,  424 => 284,  411 => 283,  360 => 242,  347 => 241,  102 => 6,  89 => 5,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'dashEntreprise/dashboardEntreprise.html.twig' %}

{% block title %}Ajouter Station{% endblock %}

{% block stylesheets %}
{{ parent() }}
<link rel=\"stylesheet\" href=\"https://unpkg.com/leaflet@1.9.4/dist/leaflet.css\" integrity=\"sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=\" crossorigin=\"\"/>

<style>
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

.card-location::before {
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

.card-location .form-card-icon {
    background-color: #336D8B;
}

.form-card-title {
    margin: 0;
    font-size: 1.25rem;
    font-weight: 600;
    color: #1e293b;
}

.form-card-body {
    padding: 1.5rem;
}

.form-row {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
    margin-bottom: 1rem;
}

.form-floating {
    position: relative;
    margin-bottom: 1rem;
}

.form-control {
    display: block;
    width: 100%;
    padding: 1rem 0.75rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1.5;
    color: #1e293b;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #e2e8f0;
    border-radius: 0.375rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.form-label {
    position: absolute;
    top: 1rem;
    left: 0.75rem;
    padding: 0 0.25rem;
    background-color: transparent;
    color: #64748b;
    font-size: 0.875rem;
    transition: all 0.2s ease-in-out;
    pointer-events: none;
    transform-origin: 0 0;
    line-height: 1;
    height: auto;
}

.form-control:focus ~ .form-label,
.form-control:not(:placeholder-shown) ~ .form-label {
    transform: translateY(-1.5rem) scale(0.85);
    color: #3b82f6;
    background-color: #fff;
    padding: 0 0.25rem;
    height: auto;
    line-height: 1;
    margin-top: 0;
}

.form-control:focus {
    border-color: #3b82f6;
    outline: 0;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

#map {
    height: 400px;
    width: 100%;
    margin-top: 1.5rem;
    border-radius: 0.5rem;
    border: 1px solid #e2e8f0;
}

.map-instructions {
    margin-top: 0.5rem;
    font-size: 0.875rem;
    color: #64748b;
    text-align: center;
}

.form-actions {
    display: flex;
    justify-content: flex-end;
    gap: 1rem;
    margin-top: 2rem;
}

.form-btn {
    padding: 0.75rem 1.5rem;
    font-size: 1rem;
    font-weight: 500;
    border-radius: 0.5rem;
    cursor: pointer;
    transition: all 0.2s ease-in-out;
}

.form-btn-primary {
    background-color: #3b82f6;
    color: white;
    border: none;
}

.form-btn-primary:hover {
    background-color: #2563eb;
}

.form-btn-outline {
    background-color: transparent;
    color: #64748b;
    border: 1px solid #e2e8f0;
}

.form-btn-outline:hover {
    background-color: #f8fafc;
    color: #1e293b;
}

/* Add styles for validation */
.is-invalid {
    border-color: #e2e8f0 !important;
    background-image: none;
    padding-right: 0.75rem;
}

.invalid-feedback {
    display: block !important;
    color: #dc3545;
    font-size: 0.875rem;
    margin-top: 0.25rem;
    font-weight: 500;
    padding-left: 0.25rem;
}

/* Error message styling */
.form-error {
    color: #dc3545;
    font-size: 0.875rem;
    margin-top: 0.25rem;
    font-weight: 500;
    display: block;
}

.is-invalid {
    border-color: #e2e8f0 !important;
    background-image: none;
    padding-right: 0.75rem;
}
</style>
{% endblock %}

{% block js %}
{{ parent() }}
<script src=\"https://unpkg.com/leaflet@1.9.4/dist/leaflet.js\" integrity=\"sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=\" crossorigin=\"\"></script>
<script>
document.addEventListener('DOMContentLoaded', initFormMap);

function initFormMap() {
    if (!document.getElementById('map')) return;
    
    if (window.formMap) {
        window.formMap.remove();
    }
    
    var map = L.map('map').setView([36.8065, 10.1815], 13);
    window.formMap = map;
    
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href=\"https://www.openstreetmap.org/copyright\">OpenStreetMap</a> contributors'
    }).addTo(map);
    
    var marker = L.marker([36.8065, 10.1815], {
        draggable: true
    }).addTo(map);
    
    marker.on('dragend', function(e) {
        updateCoordinates(marker.getLatLng());
    });
    
    map.on('click', function(e) {
        marker.setLatLng(e.latlng);
        updateCoordinates(e.latlng);
    });
    
    function updateCoordinates(position) {
        document.getElementById('station_latitude').value = position.lat.toFixed(6);
        document.getElementById('station_longitude').value = position.lng.toFixed(6);
    }
}
</script>
{% endblock %}

{% block body %}
<div class=\"content-card content-section active\">
    <div class=\"form-header\">
        <h2 class=\"form-title\">{{ button_label is defined ? 'Modifier' : 'Ajouter' }} une Station</h2>
        <p class=\"form-subtitle\">Complétez les informations ci-dessous pour {{ button_label is defined ? 'modifier' : 'ajouter' }} une station.</p>
    </div>

    {{ form_start(form, {'method': 'POST', 'action': path('app_station_new'), 'attr': {'class': 'contact-form', 'novalidate': 'novalidate'}}) }}
    
    <!-- Basic Info Card -->
    <div class=\"form-card card-info\">
        <div class=\"form-card-header\">
            <i class=\"fas fa-info-circle form-card-icon\"></i>
            <h3 class=\"form-card-title\">Informations de base</h3>
        </div>
        <div class=\"form-card-body\">
            <div class=\"form-row\">
                <div class=\"form-floating\">
                    {{ form_widget(form.nom, {'attr': {'class': 'form-control' ~ (form.nom.vars.errors|length ? ' is-invalid' : ''), 'placeholder': ' '}}) }}
                    {{ form_label(form.nom, null, {'label_attr': {'class': 'form-label'}}) }}
                    <div class=\"invalid-feedback\">
                        {{ form_errors(form.nom) }}
                    </div>
                </div>
                
                <div class=\"form-floating\">
                    {{ form_widget(form.capacite, {'attr': {'class': 'form-control' ~ (form.capacite.vars.errors|length ? ' is-invalid' : ''), 'placeholder': ' '}}) }}
                    {{ form_label(form.capacite, null, {'label_attr': {'class': 'form-label'}}) }}
                    <div class=\"invalid-feedback\">
                        {{ form_errors(form.capacite) }}
                    </div>
                </div>
            </div>

            <div class=\"form-row\">
                <div class=\"form-floating\">
                    {{ form_widget(form.nombreVelo, {'attr': {'class': 'form-control' ~ (form.nombreVelo.vars.errors|length ? ' is-invalid' : ''), 'placeholder': ' '}}) }}
                    {{ form_label(form.nombreVelo, null, {'label_attr': {'class': 'form-label'}}) }}
                    <div class=\"invalid-feedback\">
                        {{ form_errors(form.nombreVelo) }}
                    </div>
                </div>
                
                <div class=\"form-floating\">
                    {{ form_widget(form.typeVelo, {'attr': {'class': 'form-control' ~ (form.typeVelo.vars.errors|length ? ' is-invalid' : ''), 'placeholder': ' '}}) }}
                    {{ form_label(form.typeVelo, null, {'label_attr': {'class': 'form-label'}}) }}
                    <div class=\"invalid-feedback\">
                        {{ form_errors(form.typeVelo) }}
                    </div>
                </div>
            </div>

            <div class=\"form-row\">
                <div class=\"form-floating\">
                    {{ form_widget(form.prixHeure, {'attr': {'class': 'form-control' ~ (form.prixHeure.vars.errors|length ? ' is-invalid' : ''), 'placeholder': ' '}}) }}
                    {{ form_label(form.prixHeure, null, {'label_attr': {'class': 'form-label'}}) }}
                    <div class=\"invalid-feedback\">
                        {{ form_errors(form.prixHeure) }}
                    </div>
                </div>
                
                <div class=\"form-floating\">
                    {{ form_widget(form.pays, {'attr': {'class': 'form-control' ~ (form.pays.vars.errors|length ? ' is-invalid' : ''), 'placeholder': ' '}}) }}
                    {{ form_label(form.pays, null, {'label_attr': {'class': 'form-label'}}) }}
                    <div class=\"invalid-feedback\">
                        {{ form_errors(form.pays) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Location Card -->
    <div class=\"form-card card-location\">
        <div class=\"form-card-header\">
            <i class=\"fas fa-map-marker-alt form-card-icon\"></i>
            <h3 class=\"form-card-title\">Localisation</h3>
        </div>
        <div class=\"form-card-body\">
            <div id=\"map\"></div>
            <p class=\"map-instructions\">Cliquez sur la carte ou faites glisser le marqueur pour sélectionner l'emplacement de la station</p>
            {{ form_widget(form.latitude, {'attr': {'style': 'display: none'}}) }}
            {{ form_errors(form.latitude) }}
            {{ form_widget(form.longitude, {'attr': {'style': 'display: none'}}) }}
            {{ form_errors(form.longitude) }}
        </div>
    </div>

    <div class=\"form-actions\">
        <button type=\"button\" class=\"form-btn form-btn-outline\" onclick=\"window.history.back()\">Annuler</button>
        <button type=\"submit\" class=\"form-btn form-btn-primary\">{{ button_label|default('Ajouter') }}</button>
    </div>
    
    {{ form_end(form) }}
</div>
{% endblock %}
", "station/_form.html.twig", "C:\\Users\\bouga\\Desktop\\Airmess_Web\\templates\\station\\_form.html.twig");
    }
}
