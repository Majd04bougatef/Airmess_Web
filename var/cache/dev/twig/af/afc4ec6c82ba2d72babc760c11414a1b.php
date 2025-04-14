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

/* reservation_transport/cardsStation.html.twig */
class __TwigTemplate_672f0d83fd8a36aab2f40c2d0f708ae9 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "reservation_transport/cardsStation.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "reservation_transport/cardsStation.html.twig"));

        $this->parent = $this->loadTemplate("dashVoyageurs/dashboardVoyageurs.html.twig", "reservation_transport/cardsStation.html.twig", 1);
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

        yield "Réserver un vélo";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
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

        // line 6
        yield "<style>
    .station-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 1.5rem;
        padding: 1rem 0;
    }

    .station-card {
        position: relative;
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 8px 24px rgba(149, 157, 165, 0.2);
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .station-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 30px rgba(94, 114, 228, 0.15);
    }

    .station-image {
        height: 160px;
        width: 100%;
        object-fit: cover;
        background-color: #f0f7ff;
    }

    .station-content {
        padding: 1.25rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .station-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: #344767;
        margin-bottom: 0.5rem;
    }

    .station-detail {
        display: flex;
        align-items: center;
        margin-bottom: 0.75rem;
        color: #67748e;
    }

    .station-detail i {
        margin-right: 10px;
        color: #5e72e4;
    }

    .station-rating {
        margin: 1rem 0;
    }

    .rating-stars {
        display: flex;
        justify-content: center;
        gap: 5px;
    }

    .rating-stars i {
        font-size: 1.2rem;
        color: #d3d3d3;
        cursor: pointer;
        transition: color 0.2s ease;
    }

    .rating-stars i.filled {
        color: #ffca28;
    }

    .station-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.75rem 1.25rem;
        background-color: #f8f9fa;
        border-top: 1px solid #eaecf0;
        margin-top: auto;
    }

    .station-velos {
        display: flex;
        align-items: center;
        font-weight: 600;
        color: #344767;
    }
    
    .station-velos i {
        margin-right: 8px;
        color: #5e72e4;
    }

    .btn-reserve {
        background-color: #5e72e4;
        color: white;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 7px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
    }

    .btn-reserve:hover {
        background-color: #324cdd;
        transform: translateY(-2px);
        box-shadow: 0 3px 10px rgba(94, 114, 228, 0.3);
    }

    .btn-reserve i {
        margin-right: 8px;
    }

    .page-header {
        margin-bottom: 2rem;
        border-bottom: 1px solid #e9ecef;
        padding-bottom: 1rem;
    }
    
    .page-title {
        font-size: 1.75rem;
        font-weight: 700;
        color: #344767;
        margin-bottom: 0.5rem;
    }
    
    .page-subtitle {
        font-size: 1rem;
        color: #67748e;
    }

    .filter-section {
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 3px 8px rgba(149, 157, 165, 0.12);
        padding: 0.75rem;
        margin-bottom: 1.25rem;
    }
    
    .filter-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 0.75rem;
        cursor: pointer;
    }
    
    .filter-title {
        font-size: 1rem;
        font-weight: 600;
        color: #344767;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .filter-title i {
        color: #5e72e4;
    }
    
    .filter-body {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 0.75rem;
    }
    
    @media (max-width: 768px) {
        .filter-section {
            padding: 0.5rem;
        }
        
        .filter-body {
            gap: 0.5rem;
        }
    }
    
    .filter-group {
        margin-bottom: 0.5rem;
    }
    
    .filter-label {
        display: block;
        margin-bottom: 0.25rem;
        font-weight: 500;
        font-size: 0.875rem;
        color: #344767;
    }
    
    .filter-input {
        width: 100%;
        padding: 0.375rem 0.5rem;
        border: 1px solid #d9e2ef;
        border-radius: 5px;
        background-color: #f8f9fa;
        transition: all 0.2s ease;
        font-size: 0.875rem;
    }
    
    .filter-input:focus {
        outline: none;
        border-color: #5e72e4;
        background-color: #fff;
        box-shadow: 0 0 0 3px rgba(94, 114, 228, 0.15);
    }
    
    .range-container {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    
    .range-slider {
        flex: 1;
        height: 4px;
        background-color: #d9e2ef;
        border-radius: 4px;
        position: relative;
    }
    
    .range-value {
        min-width: 40px;
        text-align: center;
        background-color: #5e72e4;
        color: white;
        padding: 0.15rem 0.35rem;
        border-radius: 4px;
        font-weight: 500;
        font-size: 0.75rem;
    }
    
    .filter-buttons {
        display: flex;
        justify-content: flex-end;
        gap: 0.75rem;
        margin-top: 0.75rem;
    }
    
    .btn-filter {
        padding: 0.375rem 0.75rem;
        border-radius: 5px;
        font-weight: 600;
        font-size: 0.875rem;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    
    .btn-reset {
        background-color: #fff;
        color: #67748e;
        border: 1px solid #d9e2ef;
    }
    
    .btn-reset:hover {
        background-color: #f8f9fa;
    }
    
    .btn-apply {
        background-color: #5e72e4;
        color: white;
        border: none;
    }
    
    .btn-apply:hover {
        background-color: #324cdd;
        box-shadow: 0 4px 10px rgba(94, 114, 228, 0.25);
    }
</style>

<div class=\"page-header\">
    <h2 class=\"page-title\">Stations disponibles</h2>
    <p class=\"page-subtitle\">Sélectionnez une station pour réserver des vélos</p>
</div>

<!-- Filter Section -->
<div class=\"filter-section\">
    <div class=\"filter-header\" onclick=\"toggleFilterSection()\">
        <div class=\"filter-title\">
            <i class=\"fas fa-filter\"></i>
            <span>Filtrer les stations</span>
        </div>
        <button class=\"btn-filter btn-reset\" id=\"toggle-filter\" style=\"border:none; padding: 0.25rem 0.5rem;\">
            <i class=\"fas fa-chevron-down\" id=\"toggle-icon\"></i>
        </button>
    </div>
    
    <div class=\"filter-body\" id=\"filter-body\" style=\"display: none;\">
        <div class=\"filter-group\">
            <label for=\"filter-name\" class=\"filter-label\">Nom de la station</label>
            <input type=\"text\" id=\"filter-name\" class=\"filter-input\" placeholder=\"Rechercher par nom...\">
        </div>
        
        <div class=\"filter-group\">
            <label for=\"filter-price\" class=\"filter-label\">Prix maximum (€/heure)</label>
            <div class=\"range-container\">
                <input type=\"range\" id=\"filter-price\" class=\"filter-input\" min=\"0\" max=\"20\" step=\"1\" value=\"20\" oninput=\"updatePriceValue(this.value)\">
                <div class=\"range-value\" id=\"price-value\">20€</div>
            </div>
        </div>
        
        <div class=\"filter-group\">
            <label for=\"filter-bikes\" class=\"filter-label\">Nombre minimum de vélos</label>
            <div class=\"range-container\">
                <input type=\"range\" id=\"filter-bikes\" class=\"filter-input\" min=\"0\" max=\"20\" step=\"1\" value=\"0\" oninput=\"updateBikesValue(this.value)\">
                <div class=\"range-value\" id=\"bikes-value\">0</div>
            </div>
        </div>
        
        <div class=\"filter-buttons\">
            <button class=\"btn-filter btn-reset\" onclick=\"resetFilters()\">Réinitialiser</button>
            <button class=\"btn-filter btn-apply\" onclick=\"applyFilters()\">Appliquer</button>
        </div>
    </div>
</div>

<div class=\"station-container\">
    ";
        // line 332
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["stations"]) || array_key_exists("stations", $context) ? $context["stations"] : (function () { throw new RuntimeError('Variable "stations" does not exist.', 332, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["station"]) {
            // line 333
            yield "        <div class=\"station-card\">
            <img src=\"";
            // line 334
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/logo-airmess.png"), "html", null, true);
            yield "\" alt=\"Image de la station\" class=\"station-image\">
            <div class=\"station-content\">
                <h3 class=\"station-title\">";
            // line 336
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["station"], "nom", [], "any", false, false, false, 336), "html", null, true);
            yield "</h3>
                <div class=\"station-detail\">
                    <i class=\"fas fa-map-marker-alt\"></i>
                    <span>Localisation</span>
                </div>
                <div class=\"station-detail\">
                    <i class=\"fas fa-money-bill-wave\"></i>
                    <span>";
            // line 343
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["station"], "prixHeure", [], "any", true, true, false, 343) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["station"], "prixHeure", [], "any", false, false, false, 343)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["station"], "prixHeure", [], "any", false, false, false, 343), "html", null, true)) : (5));
            yield "€/heure par vélo</span>
                </div>
                <div class=\"station-rating\">
                    <div class=\"rating-stars\" data-station-id=\"";
            // line 346
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["station"], "idS", [], "any", false, false, false, 346), "html", null, true);
            yield "\">
                        <i class=\"fas fa-star\" onclick=\"rateStation(this, 1)\"></i>
                        <i class=\"fas fa-star\" onclick=\"rateStation(this, 2)\"></i>
                        <i class=\"fas fa-star\" onclick=\"rateStation(this, 3)\"></i>
                        <i class=\"fas fa-star\" onclick=\"rateStation(this, 4)\"></i>
                        <i class=\"fas fa-star\" onclick=\"rateStation(this, 5)\"></i>
                    </div>
                </div>
            </div>
            <div class=\"station-footer\">
                <div class=\"station-velos\">
                    <i class=\"fas fa-bicycle\"></i>
                    <span>";
            // line 358
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["station"], "nombreVelo", [], "any", false, false, false, 358), "html", null, true);
            yield " vélos disponibles</span>
                </div>
                <a href=\"";
            // line 360
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reservation_transport_new_reservation", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["station"], "idS", [], "any", false, false, false, 360)]), "html", null, true);
            yield "\" class=\"btn-reserve\">
                    <i class=\"fas fa-calendar-check\"></i>
                    Réserver
                </a>
            </div>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['station'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 367
        yield "</div>

<script>
    function rateStation(star, rating) {
        // Get all stars in this rating container
        const stars = star.parentElement.querySelectorAll('i');
        
        // Remove filled class from all stars
        stars.forEach(s => s.classList.remove('filled'));
        
        // Fill stars up to the clicked one
        for (let i = 0; i < rating; i++) {
            stars[i].classList.add('filled');
        }
        
        // Get station ID from parent container
        const stationId = star.parentElement.dataset.stationId;
        
        // Here you would typically save the rating to the server
        console.log(`Station \${stationId} rated \${rating} stars`);
        
        // You can add AJAX call to save rating
        // fetch('/rate-station', {
        //     method: 'POST',
        //     headers: { 'Content-Type': 'application/json' },
        //     body: JSON.stringify({ stationId, rating })
        // });
    }
    
    // Filter functionality
    function updatePriceValue(value) {
        document.getElementById('price-value').textContent = value + '€';
    }
    
    function updateBikesValue(value) {
        document.getElementById('bikes-value').textContent = value;
    }
    
    function toggleFilterSection() {
        const filterBody = document.getElementById('filter-body');
        const toggleIcon = document.getElementById('toggle-icon');
        
        if (filterBody.style.display === 'none') {
            filterBody.style.display = 'grid';
            toggleIcon.classList.remove('fa-chevron-down');
            toggleIcon.classList.add('fa-chevron-up');
        } else {
            filterBody.style.display = 'none';
            toggleIcon.classList.remove('fa-chevron-up');
            toggleIcon.classList.add('fa-chevron-down');
        }
    }
    
    function resetFilters() {
        document.getElementById('filter-name').value = '';
        
        const priceInput = document.getElementById('filter-price');
        priceInput.value = priceInput.max;
        updatePriceValue(priceInput.max);
        
        const bikesInput = document.getElementById('filter-bikes');
        bikesInput.value = 0;
        updateBikesValue(0);
        
        // Show all stations
        applyFilters();
    }
    
    function applyFilters() {
        const nameFilter = document.getElementById('filter-name').value.toLowerCase();
        const maxPrice = parseFloat(document.getElementById('filter-price').value);
        const minBikes = parseInt(document.getElementById('filter-bikes').value);
        
        const stationCards = document.querySelectorAll('.station-card');
        
        stationCards.forEach(card => {
            // Get station data from card
            const stationName = card.querySelector('.station-title').textContent.toLowerCase();
            
            // Parse price (remove €/heure par vélo)
            const priceText = card.querySelector('.station-detail:nth-child(3) span').textContent;
            const stationPrice = parseFloat(priceText.split('€')[0]);
            
            // Parse bikes available
            const bikesText = card.querySelector('.station-velos span').textContent;
            const stationBikes = parseInt(bikesText.split(' ')[0]);
            
            // Apply filters
            const nameMatch = stationName.includes(nameFilter);
            const priceMatch = stationPrice <= maxPrice;
            const bikesMatch = stationBikes >= minBikes;
            
            // Show or hide based on filters
            if (nameMatch && priceMatch && bikesMatch) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
        
        // Check if any stations are visible
        const visibleStations = document.querySelectorAll('.station-card[style=\"display: flex\"]');
        const noResultsMessage = document.getElementById('no-results-message');
        
        if (visibleStations.length === 0) {
            // If no results message doesn't exist, create it
            if (!noResultsMessage) {
                const container = document.querySelector('.station-container');
                const message = document.createElement('div');
                message.id = 'no-results-message';
                message.style.width = '100%';
                message.style.textAlign = 'center';
                message.style.padding = '2rem';
                message.style.color = '#67748e';
                message.style.fontSize = '1.1rem';
                message.innerHTML = 'Aucune station ne correspond à vos critères de recherche. <br>Veuillez essayer avec des filtres différents.';
                container.appendChild(message);
            } else {
                noResultsMessage.style.display = 'block';
            }
        } else if (noResultsMessage) {
            // Hide no results message if it exists
            noResultsMessage.style.display = 'none';
        }
    }
    
    // Initialize filters
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize price range display
        updatePriceValue(document.getElementById('filter-price').value);
        updateBikesValue(document.getElementById('filter-bikes').value);
        
        // Add event listener for name filter input
        document.getElementById('filter-name').addEventListener('input', function() {
            applyFilters();
        });
        
        // Add event listeners for range inputs
        document.getElementById('filter-price').addEventListener('input', function() {
            applyFilters();
        });
        
        document.getElementById('filter-bikes').addEventListener('input', function() {
            applyFilters();
        });
    });
</script>
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
        return "reservation_transport/cardsStation.html.twig";
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
        return array (  489 => 367,  476 => 360,  471 => 358,  456 => 346,  450 => 343,  440 => 336,  435 => 334,  432 => 333,  428 => 332,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'dashVoyageurs/dashboardVoyageurs.html.twig' %}

{% block title %}Réserver un vélo{% endblock %}

{% block body %}
<style>
    .station-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 1.5rem;
        padding: 1rem 0;
    }

    .station-card {
        position: relative;
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 8px 24px rgba(149, 157, 165, 0.2);
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .station-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 30px rgba(94, 114, 228, 0.15);
    }

    .station-image {
        height: 160px;
        width: 100%;
        object-fit: cover;
        background-color: #f0f7ff;
    }

    .station-content {
        padding: 1.25rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .station-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: #344767;
        margin-bottom: 0.5rem;
    }

    .station-detail {
        display: flex;
        align-items: center;
        margin-bottom: 0.75rem;
        color: #67748e;
    }

    .station-detail i {
        margin-right: 10px;
        color: #5e72e4;
    }

    .station-rating {
        margin: 1rem 0;
    }

    .rating-stars {
        display: flex;
        justify-content: center;
        gap: 5px;
    }

    .rating-stars i {
        font-size: 1.2rem;
        color: #d3d3d3;
        cursor: pointer;
        transition: color 0.2s ease;
    }

    .rating-stars i.filled {
        color: #ffca28;
    }

    .station-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.75rem 1.25rem;
        background-color: #f8f9fa;
        border-top: 1px solid #eaecf0;
        margin-top: auto;
    }

    .station-velos {
        display: flex;
        align-items: center;
        font-weight: 600;
        color: #344767;
    }
    
    .station-velos i {
        margin-right: 8px;
        color: #5e72e4;
    }

    .btn-reserve {
        background-color: #5e72e4;
        color: white;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 7px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
    }

    .btn-reserve:hover {
        background-color: #324cdd;
        transform: translateY(-2px);
        box-shadow: 0 3px 10px rgba(94, 114, 228, 0.3);
    }

    .btn-reserve i {
        margin-right: 8px;
    }

    .page-header {
        margin-bottom: 2rem;
        border-bottom: 1px solid #e9ecef;
        padding-bottom: 1rem;
    }
    
    .page-title {
        font-size: 1.75rem;
        font-weight: 700;
        color: #344767;
        margin-bottom: 0.5rem;
    }
    
    .page-subtitle {
        font-size: 1rem;
        color: #67748e;
    }

    .filter-section {
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 3px 8px rgba(149, 157, 165, 0.12);
        padding: 0.75rem;
        margin-bottom: 1.25rem;
    }
    
    .filter-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 0.75rem;
        cursor: pointer;
    }
    
    .filter-title {
        font-size: 1rem;
        font-weight: 600;
        color: #344767;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .filter-title i {
        color: #5e72e4;
    }
    
    .filter-body {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 0.75rem;
    }
    
    @media (max-width: 768px) {
        .filter-section {
            padding: 0.5rem;
        }
        
        .filter-body {
            gap: 0.5rem;
        }
    }
    
    .filter-group {
        margin-bottom: 0.5rem;
    }
    
    .filter-label {
        display: block;
        margin-bottom: 0.25rem;
        font-weight: 500;
        font-size: 0.875rem;
        color: #344767;
    }
    
    .filter-input {
        width: 100%;
        padding: 0.375rem 0.5rem;
        border: 1px solid #d9e2ef;
        border-radius: 5px;
        background-color: #f8f9fa;
        transition: all 0.2s ease;
        font-size: 0.875rem;
    }
    
    .filter-input:focus {
        outline: none;
        border-color: #5e72e4;
        background-color: #fff;
        box-shadow: 0 0 0 3px rgba(94, 114, 228, 0.15);
    }
    
    .range-container {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    
    .range-slider {
        flex: 1;
        height: 4px;
        background-color: #d9e2ef;
        border-radius: 4px;
        position: relative;
    }
    
    .range-value {
        min-width: 40px;
        text-align: center;
        background-color: #5e72e4;
        color: white;
        padding: 0.15rem 0.35rem;
        border-radius: 4px;
        font-weight: 500;
        font-size: 0.75rem;
    }
    
    .filter-buttons {
        display: flex;
        justify-content: flex-end;
        gap: 0.75rem;
        margin-top: 0.75rem;
    }
    
    .btn-filter {
        padding: 0.375rem 0.75rem;
        border-radius: 5px;
        font-weight: 600;
        font-size: 0.875rem;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    
    .btn-reset {
        background-color: #fff;
        color: #67748e;
        border: 1px solid #d9e2ef;
    }
    
    .btn-reset:hover {
        background-color: #f8f9fa;
    }
    
    .btn-apply {
        background-color: #5e72e4;
        color: white;
        border: none;
    }
    
    .btn-apply:hover {
        background-color: #324cdd;
        box-shadow: 0 4px 10px rgba(94, 114, 228, 0.25);
    }
</style>

<div class=\"page-header\">
    <h2 class=\"page-title\">Stations disponibles</h2>
    <p class=\"page-subtitle\">Sélectionnez une station pour réserver des vélos</p>
</div>

<!-- Filter Section -->
<div class=\"filter-section\">
    <div class=\"filter-header\" onclick=\"toggleFilterSection()\">
        <div class=\"filter-title\">
            <i class=\"fas fa-filter\"></i>
            <span>Filtrer les stations</span>
        </div>
        <button class=\"btn-filter btn-reset\" id=\"toggle-filter\" style=\"border:none; padding: 0.25rem 0.5rem;\">
            <i class=\"fas fa-chevron-down\" id=\"toggle-icon\"></i>
        </button>
    </div>
    
    <div class=\"filter-body\" id=\"filter-body\" style=\"display: none;\">
        <div class=\"filter-group\">
            <label for=\"filter-name\" class=\"filter-label\">Nom de la station</label>
            <input type=\"text\" id=\"filter-name\" class=\"filter-input\" placeholder=\"Rechercher par nom...\">
        </div>
        
        <div class=\"filter-group\">
            <label for=\"filter-price\" class=\"filter-label\">Prix maximum (€/heure)</label>
            <div class=\"range-container\">
                <input type=\"range\" id=\"filter-price\" class=\"filter-input\" min=\"0\" max=\"20\" step=\"1\" value=\"20\" oninput=\"updatePriceValue(this.value)\">
                <div class=\"range-value\" id=\"price-value\">20€</div>
            </div>
        </div>
        
        <div class=\"filter-group\">
            <label for=\"filter-bikes\" class=\"filter-label\">Nombre minimum de vélos</label>
            <div class=\"range-container\">
                <input type=\"range\" id=\"filter-bikes\" class=\"filter-input\" min=\"0\" max=\"20\" step=\"1\" value=\"0\" oninput=\"updateBikesValue(this.value)\">
                <div class=\"range-value\" id=\"bikes-value\">0</div>
            </div>
        </div>
        
        <div class=\"filter-buttons\">
            <button class=\"btn-filter btn-reset\" onclick=\"resetFilters()\">Réinitialiser</button>
            <button class=\"btn-filter btn-apply\" onclick=\"applyFilters()\">Appliquer</button>
        </div>
    </div>
</div>

<div class=\"station-container\">
    {% for station in stations %}
        <div class=\"station-card\">
            <img src=\"{{ asset('images/logo-airmess.png') }}\" alt=\"Image de la station\" class=\"station-image\">
            <div class=\"station-content\">
                <h3 class=\"station-title\">{{ station.nom }}</h3>
                <div class=\"station-detail\">
                    <i class=\"fas fa-map-marker-alt\"></i>
                    <span>Localisation</span>
                </div>
                <div class=\"station-detail\">
                    <i class=\"fas fa-money-bill-wave\"></i>
                    <span>{{ station.prixHeure ?? 5 }}€/heure par vélo</span>
                </div>
                <div class=\"station-rating\">
                    <div class=\"rating-stars\" data-station-id=\"{{ station.idS }}\">
                        <i class=\"fas fa-star\" onclick=\"rateStation(this, 1)\"></i>
                        <i class=\"fas fa-star\" onclick=\"rateStation(this, 2)\"></i>
                        <i class=\"fas fa-star\" onclick=\"rateStation(this, 3)\"></i>
                        <i class=\"fas fa-star\" onclick=\"rateStation(this, 4)\"></i>
                        <i class=\"fas fa-star\" onclick=\"rateStation(this, 5)\"></i>
                    </div>
                </div>
            </div>
            <div class=\"station-footer\">
                <div class=\"station-velos\">
                    <i class=\"fas fa-bicycle\"></i>
                    <span>{{ station.nombreVelo }} vélos disponibles</span>
                </div>
                <a href=\"{{ path('app_reservation_transport_new_reservation', {'id': station.idS}) }}\" class=\"btn-reserve\">
                    <i class=\"fas fa-calendar-check\"></i>
                    Réserver
                </a>
            </div>
        </div>
    {% endfor %}
</div>

<script>
    function rateStation(star, rating) {
        // Get all stars in this rating container
        const stars = star.parentElement.querySelectorAll('i');
        
        // Remove filled class from all stars
        stars.forEach(s => s.classList.remove('filled'));
        
        // Fill stars up to the clicked one
        for (let i = 0; i < rating; i++) {
            stars[i].classList.add('filled');
        }
        
        // Get station ID from parent container
        const stationId = star.parentElement.dataset.stationId;
        
        // Here you would typically save the rating to the server
        console.log(`Station \${stationId} rated \${rating} stars`);
        
        // You can add AJAX call to save rating
        // fetch('/rate-station', {
        //     method: 'POST',
        //     headers: { 'Content-Type': 'application/json' },
        //     body: JSON.stringify({ stationId, rating })
        // });
    }
    
    // Filter functionality
    function updatePriceValue(value) {
        document.getElementById('price-value').textContent = value + '€';
    }
    
    function updateBikesValue(value) {
        document.getElementById('bikes-value').textContent = value;
    }
    
    function toggleFilterSection() {
        const filterBody = document.getElementById('filter-body');
        const toggleIcon = document.getElementById('toggle-icon');
        
        if (filterBody.style.display === 'none') {
            filterBody.style.display = 'grid';
            toggleIcon.classList.remove('fa-chevron-down');
            toggleIcon.classList.add('fa-chevron-up');
        } else {
            filterBody.style.display = 'none';
            toggleIcon.classList.remove('fa-chevron-up');
            toggleIcon.classList.add('fa-chevron-down');
        }
    }
    
    function resetFilters() {
        document.getElementById('filter-name').value = '';
        
        const priceInput = document.getElementById('filter-price');
        priceInput.value = priceInput.max;
        updatePriceValue(priceInput.max);
        
        const bikesInput = document.getElementById('filter-bikes');
        bikesInput.value = 0;
        updateBikesValue(0);
        
        // Show all stations
        applyFilters();
    }
    
    function applyFilters() {
        const nameFilter = document.getElementById('filter-name').value.toLowerCase();
        const maxPrice = parseFloat(document.getElementById('filter-price').value);
        const minBikes = parseInt(document.getElementById('filter-bikes').value);
        
        const stationCards = document.querySelectorAll('.station-card');
        
        stationCards.forEach(card => {
            // Get station data from card
            const stationName = card.querySelector('.station-title').textContent.toLowerCase();
            
            // Parse price (remove €/heure par vélo)
            const priceText = card.querySelector('.station-detail:nth-child(3) span').textContent;
            const stationPrice = parseFloat(priceText.split('€')[0]);
            
            // Parse bikes available
            const bikesText = card.querySelector('.station-velos span').textContent;
            const stationBikes = parseInt(bikesText.split(' ')[0]);
            
            // Apply filters
            const nameMatch = stationName.includes(nameFilter);
            const priceMatch = stationPrice <= maxPrice;
            const bikesMatch = stationBikes >= minBikes;
            
            // Show or hide based on filters
            if (nameMatch && priceMatch && bikesMatch) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
        
        // Check if any stations are visible
        const visibleStations = document.querySelectorAll('.station-card[style=\"display: flex\"]');
        const noResultsMessage = document.getElementById('no-results-message');
        
        if (visibleStations.length === 0) {
            // If no results message doesn't exist, create it
            if (!noResultsMessage) {
                const container = document.querySelector('.station-container');
                const message = document.createElement('div');
                message.id = 'no-results-message';
                message.style.width = '100%';
                message.style.textAlign = 'center';
                message.style.padding = '2rem';
                message.style.color = '#67748e';
                message.style.fontSize = '1.1rem';
                message.innerHTML = 'Aucune station ne correspond à vos critères de recherche. <br>Veuillez essayer avec des filtres différents.';
                container.appendChild(message);
            } else {
                noResultsMessage.style.display = 'block';
            }
        } else if (noResultsMessage) {
            // Hide no results message if it exists
            noResultsMessage.style.display = 'none';
        }
    }
    
    // Initialize filters
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize price range display
        updatePriceValue(document.getElementById('filter-price').value);
        updateBikesValue(document.getElementById('filter-bikes').value);
        
        // Add event listener for name filter input
        document.getElementById('filter-name').addEventListener('input', function() {
            applyFilters();
        });
        
        // Add event listeners for range inputs
        document.getElementById('filter-price').addEventListener('input', function() {
            applyFilters();
        });
        
        document.getElementById('filter-bikes').addEventListener('input', function() {
            applyFilters();
        });
    });
</script>
{% endblock %}", "reservation_transport/cardsStation.html.twig", "C:\\Users\\bouga\\Desktop\\Airmess_Web\\templates\\reservation_transport\\cardsStation.html.twig");
    }
}
