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
    margin-bottom: 0;
}

.form-control {
    display: block;
    width: 100%;
    padding: 0.5rem 0.75rem;
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

.form-control:focus {
    border-color: #3b82f6;
    outline: 0;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.form-label {
    position: absolute;
    top: 0.5rem;
    left: 1rem;
    padding: 0 0.25rem;
    background-color: #fff;
    color: #64748b;
    font-size: 0.875rem;
    transition: all 0.2s ease-in-out;
}

.form-control:focus + .form-label,
.form-control:not(:placeholder-shown) + .form-label {
    top: -0.5rem;
    left: 0.75rem;
    font-size: 0.75rem;
    color: #3b82f6;
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
    border-color: #dc3545 !important;
}

.invalid-feedback {
    display: block;
    color: #dc3545;
    font-size: 0.875em;
    margin-top: 0.25rem;
}
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 215
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

        // line 216
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

    // line 257
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

        // line 258
        yield "<div class=\"content-card content-section active\">
    <div class=\"form-header\">
        <h2 class=\"form-title\">";
        // line 260
        yield ((array_key_exists("button_label", $context)) ? ("Modifier") : ("Ajouter"));
        yield " une Station</h2>
        <p class=\"form-subtitle\">Complétez les informations ci-dessous pour ";
        // line 261
        yield ((array_key_exists("button_label", $context)) ? ("modifier") : ("ajouter"));
        yield " une station.</p>
    </div>

    ";
        // line 264
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 264, $this->source); })()), 'form_start', ["method" => "POST", "action" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_station_new"), "attr" => ["class" => "contact-form", "novalidate" => "novalidate"]]);
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
        // line 275
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 275, $this->source); })()), "nom", [], "any", false, false, false, 275), 'widget', ["attr" => ["class" => "form-control", "placeholder" => " "]]);
        yield "
                    ";
        // line 276
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 276, $this->source); })()), "nom", [], "any", false, false, false, 276), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
                </div>
                
                <div class=\"form-floating\">
                    ";
        // line 280
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 280, $this->source); })()), "capacite", [], "any", false, false, false, 280), 'widget', ["attr" => ["class" => "form-control", "placeholder" => " "]]);
        yield "
                    ";
        // line 281
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 281, $this->source); })()), "capacite", [], "any", false, false, false, 281), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
                </div>
            </div>

            <div class=\"form-row\">
                <div class=\"form-floating\">
                    ";
        // line 287
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 287, $this->source); })()), "nombreVelo", [], "any", false, false, false, 287), 'widget', ["attr" => ["class" => "form-control", "placeholder" => " "]]);
        yield "
                    ";
        // line 288
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 288, $this->source); })()), "nombreVelo", [], "any", false, false, false, 288), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
                </div>
                
                <div class=\"form-floating\">
                    ";
        // line 292
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 292, $this->source); })()), "typeVelo", [], "any", false, false, false, 292), 'widget', ["attr" => ["class" => "form-control", "placeholder" => " "]]);
        yield "
                    ";
        // line 293
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 293, $this->source); })()), "typeVelo", [], "any", false, false, false, 293), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
                </div>
            </div>

            <div class=\"form-row\">
                <div class=\"form-floating\">
                    ";
        // line 299
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 299, $this->source); })()), "prixHeure", [], "any", false, false, false, 299), 'widget', ["attr" => ["class" => "form-control", "placeholder" => " "]]);
        yield "
                    ";
        // line 300
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 300, $this->source); })()), "prixHeure", [], "any", false, false, false, 300), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
                </div>
                
                <div class=\"form-floating\">
                    ";
        // line 304
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 304, $this->source); })()), "pays", [], "any", false, false, false, 304), 'widget', ["attr" => ["class" => "form-control", "placeholder" => " "]]);
        yield "
                    ";
        // line 305
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 305, $this->source); })()), "pays", [], "any", false, false, false, 305), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
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
        // line 320
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 320, $this->source); })()), "latitude", [], "any", false, false, false, 320), 'widget', ["attr" => ["style" => "display: none"]]);
        yield "
            ";
        // line 321
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 321, $this->source); })()), "longitude", [], "any", false, false, false, 321), 'widget', ["attr" => ["style" => "display: none"]]);
        yield "
        </div>
    </div>

    <div class=\"form-actions\">
        <button type=\"button\" class=\"form-btn form-btn-outline\" onclick=\"window.history.back()\">Annuler</button>
        <button type=\"submit\" class=\"form-btn form-btn-primary\">";
        // line 327
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("button_label", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["button_label"]) || array_key_exists("button_label", $context) ? $context["button_label"] : (function () { throw new RuntimeError('Variable "button_label" does not exist.', 327, $this->source); })()), "Ajouter")) : ("Ajouter")), "html", null, true);
        yield "</button>
    </div>
    
    ";
        // line 330
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 330, $this->source); })()), 'form_end');
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
        return array (  526 => 330,  520 => 327,  511 => 321,  507 => 320,  489 => 305,  485 => 304,  478 => 300,  474 => 299,  465 => 293,  461 => 292,  454 => 288,  450 => 287,  441 => 281,  437 => 280,  430 => 276,  426 => 275,  412 => 264,  406 => 261,  402 => 260,  398 => 258,  385 => 257,  334 => 216,  321 => 215,  102 => 6,  89 => 5,  66 => 3,  43 => 1,);
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
    margin-bottom: 0;
}

.form-control {
    display: block;
    width: 100%;
    padding: 0.5rem 0.75rem;
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

.form-control:focus {
    border-color: #3b82f6;
    outline: 0;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.form-label {
    position: absolute;
    top: 0.5rem;
    left: 1rem;
    padding: 0 0.25rem;
    background-color: #fff;
    color: #64748b;
    font-size: 0.875rem;
    transition: all 0.2s ease-in-out;
}

.form-control:focus + .form-label,
.form-control:not(:placeholder-shown) + .form-label {
    top: -0.5rem;
    left: 0.75rem;
    font-size: 0.75rem;
    color: #3b82f6;
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
    border-color: #dc3545 !important;
}

.invalid-feedback {
    display: block;
    color: #dc3545;
    font-size: 0.875em;
    margin-top: 0.25rem;
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
                    {{ form_widget(form.nom, {'attr': {'class': 'form-control', 'placeholder': ' '}}) }}
                    {{ form_label(form.nom, null, {'label_attr': {'class': 'form-label'}}) }}
                </div>
                
                <div class=\"form-floating\">
                    {{ form_widget(form.capacite, {'attr': {'class': 'form-control', 'placeholder': ' '}}) }}
                    {{ form_label(form.capacite, null, {'label_attr': {'class': 'form-label'}}) }}
                </div>
            </div>

            <div class=\"form-row\">
                <div class=\"form-floating\">
                    {{ form_widget(form.nombreVelo, {'attr': {'class': 'form-control', 'placeholder': ' '}}) }}
                    {{ form_label(form.nombreVelo, null, {'label_attr': {'class': 'form-label'}}) }}
                </div>
                
                <div class=\"form-floating\">
                    {{ form_widget(form.typeVelo, {'attr': {'class': 'form-control', 'placeholder': ' '}}) }}
                    {{ form_label(form.typeVelo, null, {'label_attr': {'class': 'form-label'}}) }}
                </div>
            </div>

            <div class=\"form-row\">
                <div class=\"form-floating\">
                    {{ form_widget(form.prixHeure, {'attr': {'class': 'form-control', 'placeholder': ' '}}) }}
                    {{ form_label(form.prixHeure, null, {'label_attr': {'class': 'form-label'}}) }}
                </div>
                
                <div class=\"form-floating\">
                    {{ form_widget(form.pays, {'attr': {'class': 'form-control', 'placeholder': ' '}}) }}
                    {{ form_label(form.pays, null, {'label_attr': {'class': 'form-label'}}) }}
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
            {{ form_widget(form.longitude, {'attr': {'style': 'display: none'}}) }}
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
