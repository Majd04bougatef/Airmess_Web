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

/* station/index.html.twig */
class __TwigTemplate_0618cfdfd658b6408541dcf6af6ee54f extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "station/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "station/index.html.twig"));

        $this->parent = $this->loadTemplate("dashEntreprise/dashboardEntreprise.html.twig", "station/index.html.twig", 1);
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

        yield "Stations";
        
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
<link rel=\"stylesheet\" href=\"https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css\" />
<link rel=\"stylesheet\" href=\"https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css\" />
<link rel=\"stylesheet\" href=\"https://unpkg.com/leaflet-search@3.0.2/dist/leaflet-search.src.css\" />

<style>
  /* Ensure map container is visible */
  #map {
    height: 500px !important;
    width: calc(100% - 30px) !important;
    margin: 15px;
    z-index: 1;
    border: 1px solid #ccc;
    border-radius: 8px;
    overflow: hidden;
    position: relative;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
  }
  
  /* Make sure Leaflet controls are above other elements */
  .leaflet-control, .leaflet-pane {
    z-index: 1000 !important;
  }
  
  /* Custom popup styles */
  .station-popup {
    min-width: 250px;
    padding: 5px;
  }
  
  /* Status colors */
  .text-success {
    color: #4caf50 !important;
  }
  
  .text-info {
    color: #2196f3 !important;
  }
  
  .text-danger {
    color: #f44336 !important;
  }
  
  /* Add a map stats section */
  .map-stats {
    display: flex;
    flex-wrap: wrap;
    margin-bottom: 20px;
    justify-content: space-around;
  }
  
  .stat-card {
    flex: 1;
    min-width: 200px;
    max-width: 300px;
    background: white;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    margin: 10px;
    padding: 15px;
    text-align: center;
  }
  
  .stat-card h3 {
    font-size: 2rem;
    margin-bottom: 5px;
    font-weight: 600;
  }
  
  .stat-card p {
    color: #6c757d;
    margin-bottom: 0;
  }
  
  .stat-icon {
    font-size: 2rem;
    margin-bottom: 10px;
  }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 88
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

        // line 89
        yield from $this->yieldParentBlock("js", $context, $blocks);
        yield "
<script src=\"https://unpkg.com/leaflet@1.9.4/dist/leaflet.js\" integrity=\"sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=\" crossorigin=\"\"></script>
<!-- Marker Clustering -->
<script src=\"https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js\"></script>
<!-- Leaflet Search -->
<script src=\"https://unpkg.com/leaflet-search@3.0.2/dist/leaflet-search.src.js\"></script>

<script>
// Initialize the map when the DOM is fully loaded
document.addEventListener('DOMContentLoaded', function() {
  setTimeout(initMap, 200);
});

// This function will be called to initialize the map
function initMap() {
  console.log(\"Initializing map\");
  // Check if map container exists
  var mapContainer = document.getElementById('map');
  if (!mapContainer) {
    console.log(\"Map container not found\");
    return;
  }
  
  // Check if map is already initialized
  if (window.stationMap) {
    window.stationMap.remove();
  }
  
  try {
    // Initialize the map
    var map = L.map('map').setView([36.8065, 10.1815], 6); // Centered on Tunisia
    window.stationMap = map;
    console.log(\"Map created\");
    
    // Add OpenStreetMap tiles
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '&copy; <a href=\"https://www.openstreetmap.org/copyright\">OpenStreetMap</a> contributors'
    }).addTo(map);
    
    // Create a marker cluster group
    var markers = L.markerClusterGroup();
    
    // Debug info
    console.log(\"Adding markers for stations\");
    
    var hasValidStations = false;
    
    // Custom station icons based on type
    var bikeIcons = {
      'velo électrique': L.icon({
        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
      }),
      'velo urbain': L.icon({
        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
      }),
      'velo de route': L.icon({
        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
      }),
      'default': L.icon({
        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-gold.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
      })
    };
    
    // Add markers for each station
    ";
        // line 174
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["stations"]) || array_key_exists("stations", $context) ? $context["stations"] : (function () { throw new RuntimeError('Variable "stations" does not exist.', 174, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["station"]) {
            // line 175
            yield "      console.log(\"Station: ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["station"], "nom", [], "any", false, false, false, 175), "html", null, true);
            yield ", Lat: ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["station"], "latitude", [], "any", true, true, false, 175)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["station"], "latitude", [], "any", false, false, false, 175), "undefined")) : ("undefined")), "html", null, true);
            yield ", Long: ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["station"], "longitude", [], "any", true, true, false, 175)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["station"], "longitude", [], "any", false, false, false, 175), "undefined")) : ("undefined")), "html", null, true);
            yield "\");
      
      ";
            // line 177
            if ((((CoreExtension::getAttribute($this->env, $this->source, $context["station"], "latitude", [], "any", true, true, false, 177) && CoreExtension::getAttribute($this->env, $this->source, $context["station"], "longitude", [], "any", true, true, false, 177)) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["station"], "latitude", [], "any", false, false, false, 177))) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["station"], "longitude", [], "any", false, false, false, 177)))) {
                // line 178
                yield "        try {
          var lat = ";
                // line 179
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["station"], "latitude", [], "any", false, false, false, 179), "html", null, true);
                yield ";
          var lng = ";
                // line 180
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["station"], "longitude", [], "any", false, false, false, 180), "html", null, true);
                yield ";
          
          if (!isNaN(lat) && !isNaN(lng)) {
            var icon = bikeIcons['";
                // line 183
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["station"], "typeVelo", [], "any", true, true, false, 183)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["station"], "typeVelo", [], "any", false, false, false, 183), "default")) : ("default")), "html", null, true);
                yield "'] || bikeIcons['default'];
            var marker = L.marker([lat, lng], {icon: icon});
            
            // Calculate availability status
            var percentage = (";
                // line 187
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["station"], "nombreVelo", [], "any", false, false, false, 187), "html", null, true);
                yield " / ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["station"], "capacite", [], "any", false, false, false, 187), "html", null, true);
                yield ") * 100;
            var statusClass = percentage >= 80 ? 'text-success' : 
                             percentage >= 30 ? 'text-info' : 'text-danger';
            
            // Create rich HTML content for popup
            var popupContent = `
              <div class=\"station-popup\">
                <h5 class=\"font-weight-bold mb-2\">";
                // line 194
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["station"], "nom", [], "any", false, false, false, 194), "html", null, true);
                yield "</h5>
                <div class=\"d-flex justify-content-between mb-1\">
                  <span>Disponibilité:</span>
                  <span class=\"\${statusClass}\">";
                // line 197
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["station"], "nombreVelo", [], "any", false, false, false, 197), "html", null, true);
                yield "/";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["station"], "capacite", [], "any", false, false, false, 197), "html", null, true);
                yield "</span>
                </div>
                <div class=\"d-flex justify-content-between mb-1\">
                  <span>Type:</span>
                  <span>";
                // line 201
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["station"], "typeVelo", [], "any", false, false, false, 201), "html", null, true);
                yield "</span>
                </div>
                <div class=\"d-flex justify-content-between mb-1\">
                  <span>Prix:</span>
                  <span>";
                // line 205
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["station"], "prixHeure", [], "any", false, false, false, 205), "html", null, true);
                yield " DT/heure</span>
                </div>
                <div class=\"d-flex justify-content-between mb-3\">
                  <span>Pays:</span>
                  <span>";
                // line 209
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["station"], "pays", [], "any", false, false, false, 209), "html", null, true);
                yield "</span>
                </div>
                <div class=\"text-center\">
                  <a href=\"";
                // line 212
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_station_edit", ["idS" => CoreExtension::getAttribute($this->env, $this->source, $context["station"], "idS", [], "any", false, false, false, 212)]), "html", null, true);
                yield "\" class=\"btn btn-sm btn-info mr-1\">Modifier</a>
                  <form method=\"post\" action=\"";
                // line 213
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_station_delete", ["idS" => CoreExtension::getAttribute($this->env, $this->source, $context["station"], "idS", [], "any", false, false, false, 213)]), "html", null, true);
                yield "\" style=\"display:inline;\">
                    <input type=\"hidden\" name=\"_token\" value=\"";
                // line 214
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["station"], "idS", [], "any", false, false, false, 214))), "html", null, true);
                yield "\">
                    <button type=\"submit\" class=\"btn btn-sm btn-danger\" onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer cette station ?');\">Supprimer</button>
                  </form>
                </div>
              </div>
            `;
            
            marker.bindPopup(popupContent);
            markers.addLayer(marker);
            hasValidStations = true;
            console.log(\"Added marker for ";
                // line 224
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["station"], "nom", [], "any", false, false, false, 224), "html", null, true);
                yield " at \" + lat + \", \" + lng);
          } else {
            console.log(\"Invalid coordinates for ";
                // line 226
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["station"], "nom", [], "any", false, false, false, 226), "html", null, true);
                yield "\");
          }
        } catch (e) {
          console.error(\"Error adding marker for ";
                // line 229
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["station"], "nom", [], "any", false, false, false, 229), "html", null, true);
                yield ": \" + e.message);
        }
      ";
            } else {
                // line 232
                yield "        console.log(\"Missing coordinates for ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["station"], "nom", [], "any", false, false, false, 232), "html", null, true);
                yield "\");
      ";
            }
            // line 234
            yield "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['station'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 235
        yield "    
    // Add markers to map
    map.addLayer(markers);
    
    if (!hasValidStations) {
      // Add a default marker for demonstration
      var marker = L.marker([36.8065, 10.1815], {icon: bikeIcons['default']}).addTo(map);
      marker.bindPopup(\"<b>Default Location</b><br>Please add coordinates to your stations\");
      console.log(\"No valid stations found, added default marker\");
    }
    
    // Add a legend
    var legend = L.control({position: 'bottomright'});
    legend.onAdd = function (map) {
      var div = L.DomUtil.create('div', 'info legend');
      div.innerHTML = `
        <div style=\"background: white; padding: 10px; border-radius: 5px; border: 1px solid #ccc;\">
          <h5>Types de Vélos</h5>
          <div style=\"display: flex; align-items: center; margin-bottom: 5px;\">
            <img src=\"https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png\" height=\"25\"> 
            <span style=\"margin-left: 5px;\">Vélo électrique</span>
          </div>
          <div style=\"display: flex; align-items: center; margin-bottom: 5px;\">
            <img src=\"https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png\" height=\"25\"> 
            <span style=\"margin-left: 5px;\">Vélo urbain</span>
          </div>
          <div style=\"display: flex; align-items: center; margin-bottom: 5px;\">
            <img src=\"https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png\" height=\"25\"> 
            <span style=\"margin-left: 5px;\">Vélo de route</span>
          </div>
          <div style=\"display: flex; align-items: center;\">
            <img src=\"https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-gold.png\" height=\"25\"> 
            <span style=\"margin-left: 5px;\">Autre/Défaut</span>
          </div>
        </div>
      `;
      return div;
    };
    legend.addTo(map);
    
    console.log(\"Map initialization complete\");
    
    // Force a resize event to make sure the map renders properly
    setTimeout(function() {
      window.dispatchEvent(new Event('resize'));
      if (map) map.invalidateSize();
    }, 500);
  } catch (e) {
    console.error(\"Error initializing map: \" + e.message);
  }
}
</script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 289
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

        // line 290
        yield "<div class=\"row\">
    <div class=\"col-12\">
        <!-- Statistics Cards -->
        <div class=\"map-stats\">
            <div class=\"stat-card\">
                <div class=\"stat-icon text-info\">
                    <i class=\"fas fa-bicycle\"></i>
                </div>
                <h3>";
        // line 298
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["stations"]) || array_key_exists("stations", $context) ? $context["stations"] : (function () { throw new RuntimeError('Variable "stations" does not exist.', 298, $this->source); })())), "html", null, true);
        yield "</h3>
                <p>Stations totales</p>
            </div>
            
            ";
        // line 302
        $context["totalCapacity"] = 0;
        // line 303
        yield "            ";
        $context["totalBikes"] = 0;
        // line 304
        yield "            ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["stations"]) || array_key_exists("stations", $context) ? $context["stations"] : (function () { throw new RuntimeError('Variable "stations" does not exist.', 304, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["station"]) {
            // line 305
            yield "                ";
            $context["totalCapacity"] = ((isset($context["totalCapacity"]) || array_key_exists("totalCapacity", $context) ? $context["totalCapacity"] : (function () { throw new RuntimeError('Variable "totalCapacity" does not exist.', 305, $this->source); })()) + CoreExtension::getAttribute($this->env, $this->source, $context["station"], "capacite", [], "any", false, false, false, 305));
            // line 306
            yield "                ";
            $context["totalBikes"] = ((isset($context["totalBikes"]) || array_key_exists("totalBikes", $context) ? $context["totalBikes"] : (function () { throw new RuntimeError('Variable "totalBikes" does not exist.', 306, $this->source); })()) + CoreExtension::getAttribute($this->env, $this->source, $context["station"], "nombreVelo", [], "any", false, false, false, 306));
            // line 307
            yield "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['station'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 308
        yield "            
            <div class=\"stat-card\">
                <div class=\"stat-icon text-success\">
                    <i class=\"fas fa-check-circle\"></i>
                </div>
                <h3>";
        // line 313
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalBikes"]) || array_key_exists("totalBikes", $context) ? $context["totalBikes"] : (function () { throw new RuntimeError('Variable "totalBikes" does not exist.', 313, $this->source); })()), "html", null, true);
        yield "</h3>
                <p>Vélos disponibles</p>
            </div>
            
            <div class=\"stat-card\">
                <div class=\"stat-icon text-warning\">
                    <i class=\"fas fa-battery-half\"></i>
                </div>
                <h3>";
        // line 321
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::round((((isset($context["totalBikes"]) || array_key_exists("totalBikes", $context) ? $context["totalBikes"] : (function () { throw new RuntimeError('Variable "totalBikes" does not exist.', 321, $this->source); })()) / (isset($context["totalCapacity"]) || array_key_exists("totalCapacity", $context) ? $context["totalCapacity"] : (function () { throw new RuntimeError('Variable "totalCapacity" does not exist.', 321, $this->source); })())) * 100)), "html", null, true);
        yield "%</h3>
                <p>Taux d'occupation</p>
            </div>
        </div>
        
        <div class=\"card mb-4\">
            <div class=\"card-header pb-0 d-flex justify-content-between align-items-center\">
                <h6>Stations</h6>
                <a href=\"";
        // line 329
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_station_new");
        yield "\" class=\"btn btn-sm btn-primary\">
                    <i class=\"fas fa-plus-circle mr-1\"></i> Ajouter une station
                </a>
            </div>
            <div class=\"card-body px-0 pt-0 pb-2\">
                <div id=\"map\"></div>
                
                <div class=\"table-responsive p-0\">
                    <table class=\"table align-items-center justify-content-center mb-0\">
                      <thead>
                        <tr>
                            <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2\">Nom</th>
                            <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2\">Capacite</th>
                            <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2\">NombreVelo</th>
                            <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2\">TypeVelo</th>
                            <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2\">PrixHeure</th>
                            <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2\">Pays</th>
                            <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2\">pourcentage</th>
                            <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2\">actions</th>
                          <th></th>
                        </tr>
                      </thead>
                      
                      <tbody>
                      ";
        // line 353
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["stations"]) || array_key_exists("stations", $context) ? $context["stations"] : (function () { throw new RuntimeError('Variable "stations" does not exist.', 353, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["station"]) {
            // line 354
            yield "                        <tr>
                          <td>
                            <p class=\"text-sm font-weight-bold mb-0\">";
            // line 356
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["station"], "nom", [], "any", false, false, false, 356), "html", null, true);
            yield "</p>
                          </td>
                          <td>
                            <span class=\"text-xs font-weight-bold\">";
            // line 359
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["station"], "capacite", [], "any", false, false, false, 359), "html", null, true);
            yield "</span>
                          </td>
                          <td>
                            <span class=\"text-xs font-weight-bold\">";
            // line 362
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["station"], "nombreVelo", [], "any", false, false, false, 362), "html", null, true);
            yield "</span>
                          </td>

                          <td>
                            <span class=\"text-xs font-weight-bold\">";
            // line 366
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["station"], "typeVelo", [], "any", false, false, false, 366), "html", null, true);
            yield "</span>
                          </td>

                          <td>
                            <span class=\"text-xs font-weight-bold\">";
            // line 370
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["station"], "prixHeure", [], "any", false, false, false, 370), "html", null, true);
            yield "</span>
                          </td>
                          <td>
                            <span class=\"text-xs font-weight-bold\">";
            // line 373
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["station"], "pays", [], "any", false, false, false, 373), "html", null, true);
            yield "</span>
                          </td>

                          <td class=\"align-middle text-center\">
                            <div class=\"d-flex align-items-center justify-content-center\">
                                ";
            // line 378
            $context["pourcentage"] = ((CoreExtension::getAttribute($this->env, $this->source, $context["station"], "nombreVelo", [], "any", false, false, false, 378) / CoreExtension::getAttribute($this->env, $this->source, $context["station"], "capacite", [], "any", false, false, false, 378)) * 100);
            // line 379
            yield "                                <span class=\"me-2 text-xs font-weight-bold\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::round((isset($context["pourcentage"]) || array_key_exists("pourcentage", $context) ? $context["pourcentage"] : (function () { throw new RuntimeError('Variable "pourcentage" does not exist.', 379, $this->source); })()), 2), "html", null, true);
            yield "%</span>
                                <div>
                                    <div class=\"progress\">
                                        <div class=\"progress-bar 
                                            ";
            // line 383
            if (((isset($context["pourcentage"]) || array_key_exists("pourcentage", $context) ? $context["pourcentage"] : (function () { throw new RuntimeError('Variable "pourcentage" does not exist.', 383, $this->source); })()) >= 80)) {
                yield " bg-gradient-success 
                                            ";
            } elseif ((            // line 384
(isset($context["pourcentage"]) || array_key_exists("pourcentage", $context) ? $context["pourcentage"] : (function () { throw new RuntimeError('Variable "pourcentage" does not exist.', 384, $this->source); })()) >= 30)) {
                yield " bg-gradient-info 
                                            ";
            } else {
                // line 385
                yield " bg-gradient-danger ";
            }
            yield "\" 
                                            role=\"progressbar\"  
                                            aria-valuenow=\"";
            // line 387
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::round((isset($context["pourcentage"]) || array_key_exists("pourcentage", $context) ? $context["pourcentage"] : (function () { throw new RuntimeError('Variable "pourcentage" does not exist.', 387, $this->source); })()), 2), "html", null, true);
            yield "\" 
                                            aria-valuemin=\"0\" 
                                            aria-valuemax=\"100\" 
                                            style=\"width: ";
            // line 390
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::round((isset($context["pourcentage"]) || array_key_exists("pourcentage", $context) ? $context["pourcentage"] : (function () { throw new RuntimeError('Variable "pourcentage" does not exist.', 390, $this->source); })()), 2), "html", null, true);
            yield "%;\">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>

                          <td class=\"align-middle\">
                            <a href=\"";
            // line 398
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_station_edit", ["idS" => CoreExtension::getAttribute($this->env, $this->source, $context["station"], "idS", [], "any", false, false, false, 398)]), "html", null, true);
            yield "\" class=\"btn btn-sm btn-info\">Modifier</a>
                            <!-- Formulaire de suppression -->
                            <form method=\"post\" action=\"";
            // line 400
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_station_delete", ["idS" => CoreExtension::getAttribute($this->env, $this->source, $context["station"], "idS", [], "any", false, false, false, 400)]), "html", null, true);
            yield "\" style=\"display:inline;\">
                                <input type=\"hidden\" name=\"_token\" value=\"";
            // line 401
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["station"], "idS", [], "any", false, false, false, 401))), "html", null, true);
            yield "\">
                                <button type=\"submit\" class=\"btn btn-sm btn-danger\" onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer cette station ?');\">Supprimer</button>
                            </form>
                          </td>
                        </tr>
                        
                       ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['station'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 408
        yield "                      </tbody>
                    </table>
                </div>
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
        return "station/index.html.twig";
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
        return array (  711 => 408,  698 => 401,  694 => 400,  689 => 398,  678 => 390,  672 => 387,  666 => 385,  661 => 384,  657 => 383,  649 => 379,  647 => 378,  639 => 373,  633 => 370,  626 => 366,  619 => 362,  613 => 359,  607 => 356,  603 => 354,  599 => 353,  572 => 329,  561 => 321,  550 => 313,  543 => 308,  537 => 307,  534 => 306,  531 => 305,  526 => 304,  523 => 303,  521 => 302,  514 => 298,  504 => 290,  491 => 289,  428 => 235,  422 => 234,  416 => 232,  410 => 229,  404 => 226,  399 => 224,  386 => 214,  382 => 213,  378 => 212,  372 => 209,  365 => 205,  358 => 201,  349 => 197,  343 => 194,  331 => 187,  324 => 183,  318 => 180,  314 => 179,  311 => 178,  309 => 177,  299 => 175,  295 => 174,  207 => 89,  194 => 88,  102 => 6,  89 => 5,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'dashEntreprise/dashboardEntreprise.html.twig' %}

{% block title %}Stations{% endblock %}

{% block stylesheets %}
{{ parent() }}
<link rel=\"stylesheet\" href=\"https://unpkg.com/leaflet@1.9.4/dist/leaflet.css\" integrity=\"sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=\" crossorigin=\"\"/>
<link rel=\"stylesheet\" href=\"https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css\" />
<link rel=\"stylesheet\" href=\"https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css\" />
<link rel=\"stylesheet\" href=\"https://unpkg.com/leaflet-search@3.0.2/dist/leaflet-search.src.css\" />

<style>
  /* Ensure map container is visible */
  #map {
    height: 500px !important;
    width: calc(100% - 30px) !important;
    margin: 15px;
    z-index: 1;
    border: 1px solid #ccc;
    border-radius: 8px;
    overflow: hidden;
    position: relative;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
  }
  
  /* Make sure Leaflet controls are above other elements */
  .leaflet-control, .leaflet-pane {
    z-index: 1000 !important;
  }
  
  /* Custom popup styles */
  .station-popup {
    min-width: 250px;
    padding: 5px;
  }
  
  /* Status colors */
  .text-success {
    color: #4caf50 !important;
  }
  
  .text-info {
    color: #2196f3 !important;
  }
  
  .text-danger {
    color: #f44336 !important;
  }
  
  /* Add a map stats section */
  .map-stats {
    display: flex;
    flex-wrap: wrap;
    margin-bottom: 20px;
    justify-content: space-around;
  }
  
  .stat-card {
    flex: 1;
    min-width: 200px;
    max-width: 300px;
    background: white;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    margin: 10px;
    padding: 15px;
    text-align: center;
  }
  
  .stat-card h3 {
    font-size: 2rem;
    margin-bottom: 5px;
    font-weight: 600;
  }
  
  .stat-card p {
    color: #6c757d;
    margin-bottom: 0;
  }
  
  .stat-icon {
    font-size: 2rem;
    margin-bottom: 10px;
  }
</style>
{% endblock %}

{% block js %}
{{ parent() }}
<script src=\"https://unpkg.com/leaflet@1.9.4/dist/leaflet.js\" integrity=\"sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=\" crossorigin=\"\"></script>
<!-- Marker Clustering -->
<script src=\"https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js\"></script>
<!-- Leaflet Search -->
<script src=\"https://unpkg.com/leaflet-search@3.0.2/dist/leaflet-search.src.js\"></script>

<script>
// Initialize the map when the DOM is fully loaded
document.addEventListener('DOMContentLoaded', function() {
  setTimeout(initMap, 200);
});

// This function will be called to initialize the map
function initMap() {
  console.log(\"Initializing map\");
  // Check if map container exists
  var mapContainer = document.getElementById('map');
  if (!mapContainer) {
    console.log(\"Map container not found\");
    return;
  }
  
  // Check if map is already initialized
  if (window.stationMap) {
    window.stationMap.remove();
  }
  
  try {
    // Initialize the map
    var map = L.map('map').setView([36.8065, 10.1815], 6); // Centered on Tunisia
    window.stationMap = map;
    console.log(\"Map created\");
    
    // Add OpenStreetMap tiles
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '&copy; <a href=\"https://www.openstreetmap.org/copyright\">OpenStreetMap</a> contributors'
    }).addTo(map);
    
    // Create a marker cluster group
    var markers = L.markerClusterGroup();
    
    // Debug info
    console.log(\"Adding markers for stations\");
    
    var hasValidStations = false;
    
    // Custom station icons based on type
    var bikeIcons = {
      'velo électrique': L.icon({
        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
      }),
      'velo urbain': L.icon({
        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
      }),
      'velo de route': L.icon({
        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
      }),
      'default': L.icon({
        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-gold.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
      })
    };
    
    // Add markers for each station
    {% for station in stations %}
      console.log(\"Station: {{ station.nom }}, Lat: {{ station.latitude|default('undefined') }}, Long: {{ station.longitude|default('undefined') }}\");
      
      {% if station.latitude is defined and station.longitude is defined and station.latitude is not null and station.longitude is not null %}
        try {
          var lat = {{ station.latitude }};
          var lng = {{ station.longitude }};
          
          if (!isNaN(lat) && !isNaN(lng)) {
            var icon = bikeIcons['{{ station.typeVelo|default('default') }}'] || bikeIcons['default'];
            var marker = L.marker([lat, lng], {icon: icon});
            
            // Calculate availability status
            var percentage = ({{ station.nombreVelo }} / {{ station.capacite }}) * 100;
            var statusClass = percentage >= 80 ? 'text-success' : 
                             percentage >= 30 ? 'text-info' : 'text-danger';
            
            // Create rich HTML content for popup
            var popupContent = `
              <div class=\"station-popup\">
                <h5 class=\"font-weight-bold mb-2\">{{ station.nom }}</h5>
                <div class=\"d-flex justify-content-between mb-1\">
                  <span>Disponibilité:</span>
                  <span class=\"\${statusClass}\">{{ station.nombreVelo }}/{{ station.capacite }}</span>
                </div>
                <div class=\"d-flex justify-content-between mb-1\">
                  <span>Type:</span>
                  <span>{{ station.typeVelo }}</span>
                </div>
                <div class=\"d-flex justify-content-between mb-1\">
                  <span>Prix:</span>
                  <span>{{ station.prixHeure }} DT/heure</span>
                </div>
                <div class=\"d-flex justify-content-between mb-3\">
                  <span>Pays:</span>
                  <span>{{ station.pays }}</span>
                </div>
                <div class=\"text-center\">
                  <a href=\"{{ path('app_station_edit', {'idS': station.idS}) }}\" class=\"btn btn-sm btn-info mr-1\">Modifier</a>
                  <form method=\"post\" action=\"{{ path('app_station_delete', {'idS': station.idS}) }}\" style=\"display:inline;\">
                    <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ station.idS) }}\">
                    <button type=\"submit\" class=\"btn btn-sm btn-danger\" onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer cette station ?');\">Supprimer</button>
                  </form>
                </div>
              </div>
            `;
            
            marker.bindPopup(popupContent);
            markers.addLayer(marker);
            hasValidStations = true;
            console.log(\"Added marker for {{ station.nom }} at \" + lat + \", \" + lng);
          } else {
            console.log(\"Invalid coordinates for {{ station.nom }}\");
          }
        } catch (e) {
          console.error(\"Error adding marker for {{ station.nom }}: \" + e.message);
        }
      {% else %}
        console.log(\"Missing coordinates for {{ station.nom }}\");
      {% endif %}
    {% endfor %}
    
    // Add markers to map
    map.addLayer(markers);
    
    if (!hasValidStations) {
      // Add a default marker for demonstration
      var marker = L.marker([36.8065, 10.1815], {icon: bikeIcons['default']}).addTo(map);
      marker.bindPopup(\"<b>Default Location</b><br>Please add coordinates to your stations\");
      console.log(\"No valid stations found, added default marker\");
    }
    
    // Add a legend
    var legend = L.control({position: 'bottomright'});
    legend.onAdd = function (map) {
      var div = L.DomUtil.create('div', 'info legend');
      div.innerHTML = `
        <div style=\"background: white; padding: 10px; border-radius: 5px; border: 1px solid #ccc;\">
          <h5>Types de Vélos</h5>
          <div style=\"display: flex; align-items: center; margin-bottom: 5px;\">
            <img src=\"https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png\" height=\"25\"> 
            <span style=\"margin-left: 5px;\">Vélo électrique</span>
          </div>
          <div style=\"display: flex; align-items: center; margin-bottom: 5px;\">
            <img src=\"https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png\" height=\"25\"> 
            <span style=\"margin-left: 5px;\">Vélo urbain</span>
          </div>
          <div style=\"display: flex; align-items: center; margin-bottom: 5px;\">
            <img src=\"https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png\" height=\"25\"> 
            <span style=\"margin-left: 5px;\">Vélo de route</span>
          </div>
          <div style=\"display: flex; align-items: center;\">
            <img src=\"https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-gold.png\" height=\"25\"> 
            <span style=\"margin-left: 5px;\">Autre/Défaut</span>
          </div>
        </div>
      `;
      return div;
    };
    legend.addTo(map);
    
    console.log(\"Map initialization complete\");
    
    // Force a resize event to make sure the map renders properly
    setTimeout(function() {
      window.dispatchEvent(new Event('resize'));
      if (map) map.invalidateSize();
    }, 500);
  } catch (e) {
    console.error(\"Error initializing map: \" + e.message);
  }
}
</script>
{% endblock %}

{% block body %}
<div class=\"row\">
    <div class=\"col-12\">
        <!-- Statistics Cards -->
        <div class=\"map-stats\">
            <div class=\"stat-card\">
                <div class=\"stat-icon text-info\">
                    <i class=\"fas fa-bicycle\"></i>
                </div>
                <h3>{{ stations|length }}</h3>
                <p>Stations totales</p>
            </div>
            
            {% set totalCapacity = 0 %}
            {% set totalBikes = 0 %}
            {% for station in stations %}
                {% set totalCapacity = totalCapacity + station.capacite %}
                {% set totalBikes = totalBikes + station.nombreVelo %}
            {% endfor %}
            
            <div class=\"stat-card\">
                <div class=\"stat-icon text-success\">
                    <i class=\"fas fa-check-circle\"></i>
                </div>
                <h3>{{ totalBikes }}</h3>
                <p>Vélos disponibles</p>
            </div>
            
            <div class=\"stat-card\">
                <div class=\"stat-icon text-warning\">
                    <i class=\"fas fa-battery-half\"></i>
                </div>
                <h3>{{ ((totalBikes / totalCapacity) * 100)|round }}%</h3>
                <p>Taux d'occupation</p>
            </div>
        </div>
        
        <div class=\"card mb-4\">
            <div class=\"card-header pb-0 d-flex justify-content-between align-items-center\">
                <h6>Stations</h6>
                <a href=\"{{ path('app_station_new') }}\" class=\"btn btn-sm btn-primary\">
                    <i class=\"fas fa-plus-circle mr-1\"></i> Ajouter une station
                </a>
            </div>
            <div class=\"card-body px-0 pt-0 pb-2\">
                <div id=\"map\"></div>
                
                <div class=\"table-responsive p-0\">
                    <table class=\"table align-items-center justify-content-center mb-0\">
                      <thead>
                        <tr>
                            <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2\">Nom</th>
                            <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2\">Capacite</th>
                            <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2\">NombreVelo</th>
                            <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2\">TypeVelo</th>
                            <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2\">PrixHeure</th>
                            <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2\">Pays</th>
                            <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2\">pourcentage</th>
                            <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2\">actions</th>
                          <th></th>
                        </tr>
                      </thead>
                      
                      <tbody>
                      {% for station in stations %}
                        <tr>
                          <td>
                            <p class=\"text-sm font-weight-bold mb-0\">{{ station.nom }}</p>
                          </td>
                          <td>
                            <span class=\"text-xs font-weight-bold\">{{ station.capacite }}</span>
                          </td>
                          <td>
                            <span class=\"text-xs font-weight-bold\">{{ station.nombreVelo }}</span>
                          </td>

                          <td>
                            <span class=\"text-xs font-weight-bold\">{{ station.typeVelo }}</span>
                          </td>

                          <td>
                            <span class=\"text-xs font-weight-bold\">{{ station.prixHeure }}</span>
                          </td>
                          <td>
                            <span class=\"text-xs font-weight-bold\">{{ station.pays }}</span>
                          </td>

                          <td class=\"align-middle text-center\">
                            <div class=\"d-flex align-items-center justify-content-center\">
                                {% set pourcentage = (station.nombreVelo / station.capacite) * 100 %}
                                <span class=\"me-2 text-xs font-weight-bold\">{{ pourcentage|round(2) }}%</span>
                                <div>
                                    <div class=\"progress\">
                                        <div class=\"progress-bar 
                                            {% if pourcentage >= 80 %} bg-gradient-success 
                                            {% elseif pourcentage >= 30 %} bg-gradient-info 
                                            {% else %} bg-gradient-danger {% endif %}\" 
                                            role=\"progressbar\"  
                                            aria-valuenow=\"{{ pourcentage|round(2) }}\" 
                                            aria-valuemin=\"0\" 
                                            aria-valuemax=\"100\" 
                                            style=\"width: {{ pourcentage|round(2) }}%;\">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>

                          <td class=\"align-middle\">
                            <a href=\"{{ path('app_station_edit', {'idS': station.idS}) }}\" class=\"btn btn-sm btn-info\">Modifier</a>
                            <!-- Formulaire de suppression -->
                            <form method=\"post\" action=\"{{ path('app_station_delete', {'idS': station.idS}) }}\" style=\"display:inline;\">
                                <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ station.idS) }}\">
                                <button type=\"submit\" class=\"btn btn-sm btn-danger\" onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer cette station ?');\">Supprimer</button>
                            </form>
                          </td>
                        </tr>
                        
                       {% endfor %}
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{% endblock %}


", "station/index.html.twig", "C:\\Users\\MSI\\Desktop\\Airmess_Web\\templates\\station\\index.html.twig");
    }
}
