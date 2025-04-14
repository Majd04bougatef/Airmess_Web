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
.alert {
  font-size: 1.2em;
  margin-top: 20px;
}

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

/* Map container */
#map {
  height: 500px !important;
  width: 100% !important;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 8px;
}
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 98
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

        // line 99
        yield from $this->yieldParentBlock("js", $context, $blocks);
        yield "
<script src=\"https://unpkg.com/leaflet@1.9.4/dist/leaflet.js\" integrity=\"sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=\" crossorigin=\"\"></script>
<script>
// Initialize the map when the DOM is fully loaded
document.addEventListener('DOMContentLoaded', initFormMap);

// Run this immediately as well (for AJAX loading)
setTimeout(initFormMap, 100);

function initFormMap() {
    // Check if map container exists
    if (!document.getElementById('map')) return;
    
    // Check if map is already initialized
    if (window.formMap) {
        window.formMap.remove();
    }
    
    // Initialize the map
    var map = L.map('map').setView([36.8065, 10.1815], 13);
    window.formMap = map;
    
    // Add OpenStreetMap tiles
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href=\"https://www.openstreetmap.org/copyright\">OpenStreetMap</a> contributors'
    }).addTo(map);
    
    // Add a marker that can be dragged
    var marker = L.marker([36.8065, 10.1815], {
        draggable: true
    }).addTo(map);
    
    // Update form fields when marker is dragged
    marker.on('dragend', function(e) {
        var position = marker.getLatLng();
        document.getElementById('latitude').value = position.lat.toFixed(6);
        document.getElementById('longitude').value = position.lng.toFixed(6);
    });
    
    // Update marker position when clicking on map
    map.on('click', function(e) {
        marker.setLatLng(e.latlng);
        document.getElementById('latitude').value = e.latlng.lat.toFixed(6);
        document.getElementById('longitude').value = e.latlng.lng.toFixed(6);
    });
}
</script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 149
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

        // line 150
        yield "<div class=\"row\">
    <div class=\"col-12\">
        <div class=\"card mb-4\">
            <div class=\"card-header pb-0\">
                <h6>Ajouter/Modifier une Station</h6>
            </div>
            <div class=\"card-body px-4 pt-0 pb-2\">
                <div id=\"map\"></div>
                
                <section class=\"get-in-touch\">
                    <h1 class=\"title\">";
        // line 160
        yield ((array_key_exists("button_label", $context)) ? ("Modifier") : ("Ajouter"));
        yield " une Station</h1>
                    ";
        // line 161
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 161, $this->source); })()), 'form_start', ["method" => "POST", "action" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_station_new"), "attr" => ["class" => "contact-form row", "novalidate" => "novalidate"]]);
        yield "
                    <div class=\"row\">
                        <div class=\"form-field col-lg-6\">
                            ";
        // line 164
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 164, $this->source); })()), "nom", [], "any", false, false, false, 164), 'row', ["attr" => ["class" => "input-text"]]);
        yield "
                        </div>
                        <div class=\"form-field col-lg-6\">
                            ";
        // line 167
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 167, $this->source); })()), "capacite", [], "any", false, false, false, 167), 'row', ["attr" => ["class" => "input-text"]]);
        yield "
                        </div>
                        <div class=\"form-field col-lg-6\">
                            ";
        // line 170
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 170, $this->source); })()), "nombreVelo", [], "any", false, false, false, 170), 'row', ["attr" => ["class" => "input-text"]]);
        yield "
                        </div>
                        <div class=\"form-field col-lg-6\">
                            ";
        // line 173
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 173, $this->source); })()), "typeVelo", [], "any", false, false, false, 173), 'row', ["attr" => ["class" => "input-text"]]);
        yield "
                        </div>
                        <div class=\"form-field col-lg-6\">
                            ";
        // line 176
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 176, $this->source); })()), "prixHeure", [], "any", false, false, false, 176), 'row', ["attr" => ["class" => "input-text"]]);
        yield "
                        </div>
                        <div class=\"form-field col-lg-6\">
                            ";
        // line 179
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 179, $this->source); })()), "pays", [], "any", false, false, false, 179), 'row', ["attr" => ["class" => "input-text"]]);
        yield "
                        </div>
                        <div class=\"form-field col-lg-6\">
                            ";
        // line 182
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 182, $this->source); })()), "longitude", [], "any", false, false, false, 182), 'row', ["attr" => ["class" => "input-text", "id" => "longitude"]]);
        yield "
                        </div>
                        <div class=\"form-field col-lg-6\">
                            ";
        // line 185
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 185, $this->source); })()), "latitude", [], "any", false, false, false, 185), 'row', ["attr" => ["class" => "input-text", "id" => "latitude"]]);
        yield "
                        </div>
                        
                        <div class=\"form-field col-lg-12 text-center\">
                            <button class=\"submit-btn\">";
        // line 189
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("button_label", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["button_label"]) || array_key_exists("button_label", $context) ? $context["button_label"] : (function () { throw new RuntimeError('Variable "button_label" does not exist.', 189, $this->source); })()), "Ajouter")) : ("Ajouter")), "html", null, true);
        yield "</button>
                        </div>
                    </div>
                    ";
        // line 192
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 192, $this->source); })()), 'form_end');
        yield "
                </section>
            </div>
        </div>
    </div>
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
        return array (  367 => 192,  361 => 189,  354 => 185,  348 => 182,  342 => 179,  336 => 176,  330 => 173,  324 => 170,  318 => 167,  312 => 164,  306 => 161,  302 => 160,  290 => 150,  277 => 149,  217 => 99,  204 => 98,  102 => 6,  89 => 5,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'dashEntreprise/dashboardEntreprise.html.twig' %}

{% block title %}Ajouter Station{% endblock %}

{% block stylesheets %}
{{ parent() }}
<link rel=\"stylesheet\" href=\"https://unpkg.com/leaflet@1.9.4/dist/leaflet.css\" integrity=\"sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=\" crossorigin=\"\"/>

<style>
.alert {
  font-size: 1.2em;
  margin-top: 20px;
}

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

/* Map container */
#map {
  height: 500px !important;
  width: 100% !important;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 8px;
}
</style>
{% endblock %}

{% block js %}
{{ parent() }}
<script src=\"https://unpkg.com/leaflet@1.9.4/dist/leaflet.js\" integrity=\"sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=\" crossorigin=\"\"></script>
<script>
// Initialize the map when the DOM is fully loaded
document.addEventListener('DOMContentLoaded', initFormMap);

// Run this immediately as well (for AJAX loading)
setTimeout(initFormMap, 100);

function initFormMap() {
    // Check if map container exists
    if (!document.getElementById('map')) return;
    
    // Check if map is already initialized
    if (window.formMap) {
        window.formMap.remove();
    }
    
    // Initialize the map
    var map = L.map('map').setView([36.8065, 10.1815], 13);
    window.formMap = map;
    
    // Add OpenStreetMap tiles
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href=\"https://www.openstreetmap.org/copyright\">OpenStreetMap</a> contributors'
    }).addTo(map);
    
    // Add a marker that can be dragged
    var marker = L.marker([36.8065, 10.1815], {
        draggable: true
    }).addTo(map);
    
    // Update form fields when marker is dragged
    marker.on('dragend', function(e) {
        var position = marker.getLatLng();
        document.getElementById('latitude').value = position.lat.toFixed(6);
        document.getElementById('longitude').value = position.lng.toFixed(6);
    });
    
    // Update marker position when clicking on map
    map.on('click', function(e) {
        marker.setLatLng(e.latlng);
        document.getElementById('latitude').value = e.latlng.lat.toFixed(6);
        document.getElementById('longitude').value = e.latlng.lng.toFixed(6);
    });
}
</script>
{% endblock %}

{% block body %}
<div class=\"row\">
    <div class=\"col-12\">
        <div class=\"card mb-4\">
            <div class=\"card-header pb-0\">
                <h6>Ajouter/Modifier une Station</h6>
            </div>
            <div class=\"card-body px-4 pt-0 pb-2\">
                <div id=\"map\"></div>
                
                <section class=\"get-in-touch\">
                    <h1 class=\"title\">{{ button_label is defined ? 'Modifier' : 'Ajouter' }} une Station</h1>
                    {{ form_start(form, {'method': 'POST', 'action': path('app_station_new'), 'attr': {'class': 'contact-form row','novalidate': 'novalidate'}}) }}
                    <div class=\"row\">
                        <div class=\"form-field col-lg-6\">
                            {{ form_row(form.nom, {'attr': {'class': 'input-text'}}) }}
                        </div>
                        <div class=\"form-field col-lg-6\">
                            {{ form_row(form.capacite, {'attr': {'class': 'input-text'}}) }}
                        </div>
                        <div class=\"form-field col-lg-6\">
                            {{ form_row(form.nombreVelo, {'attr': {'class': 'input-text'}}) }}
                        </div>
                        <div class=\"form-field col-lg-6\">
                            {{ form_row(form.typeVelo, {'attr': {'class': 'input-text'}}) }}
                        </div>
                        <div class=\"form-field col-lg-6\">
                            {{ form_row(form.prixHeure, {'attr': {'class': 'input-text'}}) }}
                        </div>
                        <div class=\"form-field col-lg-6\">
                            {{ form_row(form.pays, {'attr': {'class': 'input-text'}}) }}
                        </div>
                        <div class=\"form-field col-lg-6\">
                            {{ form_row(form.longitude, {'attr': {'class': 'input-text', 'id': 'longitude'}}) }}
                        </div>
                        <div class=\"form-field col-lg-6\">
                            {{ form_row(form.latitude, {'attr': {'class': 'input-text', 'id': 'latitude'}}) }}
                        </div>
                        
                        <div class=\"form-field col-lg-12 text-center\">
                            <button class=\"submit-btn\">{{ button_label|default('Ajouter') }}</button>
                        </div>
                    </div>
                    {{ form_end(form) }}
                </section>
            </div>
        </div>
    </div>
</div>
{% endblock %}
", "station/_form.html.twig", "C:\\Users\\MSI\\Desktop\\Airmess_Web\\templates\\station\\_form.html.twig");
    }
}
