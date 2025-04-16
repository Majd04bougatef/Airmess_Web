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

/* dashVoyageurs/socialPageVoyageurs.html.twig */
class __TwigTemplate_40c3e0e565bbea77d08958da63b0854c extends Template
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
            'javascripts' => [$this, 'block_javascripts'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashVoyageurs/socialPageVoyageurs.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashVoyageurs/socialPageVoyageurs.html.twig"));

        $this->parent = $this->loadTemplate("dashVoyageurs/dashboardVoyageurs.html.twig", "dashVoyageurs/socialPageVoyageurs.html.twig", 1);
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

        yield "Social Media - Airmess Dashboard";
        
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
        yield "    ";
        yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        yield "
    <style>
        .publication-card {
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            height: 100%;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.6s ease-out;
            animation-fill-mode: both;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .publication-card:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }
        
        .card-img-container {
            position: relative;
            overflow: hidden;
        }
        
        .card-img-top {
            height: 250px;
            object-fit: cover;
            width: 100%;
            transition: all 0.8s cubic-bezier(0.165, 0.84, 0.44, 1);
            opacity: 1;
        }
        
        .publication-card:hover .card-img-top {
            transform: scale(1.08);
        }
        
        /* Effet de superposition sur les images */
        .card-img-container::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0,0,0,0) 60%, rgba(0,0,0,0.6) 100%);
            opacity: 0;
            transition: opacity 0.4s ease;
        }
        
        .publication-card:hover .card-img-container::after {
            opacity: 1;
        }
        
        /* Effet de brillance au survol */
        .card-img-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 50%;
            height: 100%;
            background: linear-gradient(to right, rgba(255,255,255,0) 0%, rgba(255,255,255,0.3) 100%);
            transform: skewX(-25deg);
            z-index: 1;
            transition: left 0.8s ease-out;
        }
        
        .publication-card:hover .card-img-container::before {
            left: 150%;
        }
        
        /* Animation pulsation pour l'icône \"voir\" */
        .publication-card .btn-outline-primary i {
            transition: transform 0.3s ease;
        }
        
        .publication-card:hover .btn-outline-primary i {
            animation: pulse-icon 1s infinite;
        }
        
        @keyframes pulse-icon {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.2);
            }
            100% {
                transform: scale(1);
            }
        }
        
        .card-title {
            font-weight: 600;
            font-size: 1.2rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        
        .card-text {
            max-height: 3rem;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }
        
        .location-badge {
            background-color: #f8f9fa;
            color: #495057;
            padding: 0.25rem 0.5rem;
            border-radius: 50px;
            font-size: 0.8rem;
            display: inline-flex;
            align-items: center;
            margin-bottom: 0.5rem;
            transition: all 0.3s ease;
        }
        
        .publication-card:hover .location-badge {
            background-color: #e9ecef;
            transform: translateX(2px);
        }
        
        .location-badge i {
            margin-right: 0.25rem;
            font-size: 0.75rem;
        }
        
        .card-footer {
            background-color: white;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            padding: 0.75rem 1.25rem;
        }
        
        .date-info {
            font-size: 0.8rem;
            color: #6c757d;
        }
        
        .author-info {
            font-size: 0.85rem;
            color: #6c757d;
            margin-bottom: 0.5rem;
        }
        
        .no-publications {
            text-align: center;
            padding: 2rem;
            background-color: #f8f9fa;
            border-radius: 15px;
        }
        
        .btn-outline-primary {
            transition: all 0.3s ease;
        }
        
        .btn-outline-primary:hover {
            transform: translateX(2px);
        }
        
        .section-heading {
            position: relative;
            padding-bottom: 0.5rem;
            margin-bottom: 1.5rem;
            font-weight: 600;
        }
        
        .section-heading::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            height: 3px;
            width: 50px;
            background-color: #5e72e4;
            border-radius: 3px;
            transition: width 0.3s ease;
        }
        
        .section-heading:hover::after {
            width: 100px;
        }
        
        .animated-icon {
            animation: pulse 1.5s infinite;
        }
        
        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
            }
        }
        
        /* Animation séquentielle pour les cartes */
        .publication-item:nth-child(1) .publication-card { animation-delay: 0.05s; }
        .publication-item:nth-child(2) .publication-card { animation-delay: 0.1s; }
        .publication-item:nth-child(3) .publication-card { animation-delay: 0.15s; }
        .publication-item:nth-child(4) .publication-card { animation-delay: 0.2s; }
        .publication-item:nth-child(5) .publication-card { animation-delay: 0.25s; }
        .publication-item:nth-child(6) .publication-card { animation-delay: 0.3s; }
        
        /* Loading spinner */
        .loading-spinner {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
        }
        
        .spinner {
            width: 40px;
            height: 40px;
            border: 4px solid rgba(0, 0, 0, 0.1);
            border-radius: 50%;
            border-top-color: #5e72e4;
            animation: spin 1s ease-in-out infinite;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.7);
            z-index: 9998;
        }
        
        /* Back to top button */
        .back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #5e72e4;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 999;
        }
        
        .back-to-top.show {
            opacity: 1;
            visibility: visible;
        }
        
        .back-to-top:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        /* Afficher plus de publications */
        .publication-item {
            transition: all 0.4s ease;
            opacity: 1;
        }
        
        /* Style pour le menu de tri */
        .dropdown-menu {
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border: none;
            overflow: hidden;
        }
        
        .dropdown-item {
            padding: 0.6rem 1.5rem;
            transition: all 0.2s ease;
        }
        
        .dropdown-item:hover {
            background-color: #f1f4ff;
            transform: translateX(5px);
        }
        
        /* Style pour le compteur de publications */
        .publications-count {
            font-weight: 500;
            background-color: #f8f9fa;
            padding: 0.35rem 1rem;
            border-radius: 50px;
            font-size: 0.9rem;
        }
        
        /* Style pour la pagination */
        .pagination-container {
            margin-top: 2rem;
            display: flex;
            justify-content: center;
        }
        
        .pagination {
            display: flex;
            padding-left: 0;
            list-style: none;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(50, 50, 93, 0.11), 0 1px 3px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }
        
        .page-link {
            position: relative;
            display: block;
            padding: 0.75rem 1rem;
            margin-left: -1px;
            line-height: 1.25;
            color: #5e72e4;
            background-color: #fff;
            border: 1px solid #dee2e6;
            transition: all 0.2s ease;
        }
        
        .page-link:hover {
            z-index: 2;
            color: #233dd2;
            text-decoration: none;
            background-color: #e9ecef;
            transform: translateY(-2px);
        }
        
        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #5e72e4;
            border-color: #5e72e4;
            box-shadow: 0 7px 14px rgba(50, 50, 93, 0.1), 0 3px 6px rgba(0, 0, 0, 0.08);
        }
        
        .page-item.disabled .page-link {
            color: #8898aa;
            pointer-events: none;
            cursor: auto;
            background-color: #fff;
            border-color: #dee2e6;
        }
        
        .pagination-info {
            text-align: center;
            margin-top: 0.5rem;
            font-size: 0.85rem;
            color: #8898aa;
        }
        
        /* Animation pour la pagination */
        .pagination .page-item {
            transform: scale(1);
            transition: transform 0.2s ease;
        }
        
        .pagination .page-item:hover {
            transform: scale(1.05);
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .publication-item {
                margin-bottom: 20px;
            }
        }
    </style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 401
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 402
        yield "    ";
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const backToTopBtn = document.querySelector('.back-to-top');
            const loadingSpinner = document.querySelector('.loading-spinner');
            const overlay = document.querySelector('.overlay');
            const refreshBtn = document.getElementById('refreshBtn');
            
            // Animation d'apparition des images au chargement
            const cardImages = document.querySelectorAll('.card-img-top');
            cardImages.forEach(img => {
                // Appliquer un effet initial de zoom réduit
                img.style.transform = 'scale(0.95)';
                img.style.opacity = '0.9';
                
                // Attendre que l'image soit chargée
                img.onload = function() {
                    // Transition vers l'échelle normale
                    setTimeout(() => {
                        img.style.transform = 'scale(1)';
                        img.style.opacity = '1';
                    }, 100 + Math.random() * 300);
                };
                
                // Si l'image est déjà chargée
                if (img.complete) {
                    setTimeout(() => {
                        img.style.transform = 'scale(1)';
                        img.style.opacity = '1';
                    }, 100 + Math.random() * 300);
                }
            });
            
            // Refresh button event
            if (refreshBtn) {
                refreshBtn.addEventListener('click', function() {
                    const icon = this.querySelector('i');
                    icon.classList.add('fa-spin');
                    showLoading();
                    
                    setTimeout(() => {
                        location.reload();
                    }, 500);
                });
            }
            
            // Show/hide back to top button
            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 300) {
                    backToTopBtn.classList.add('show');
                } else {
                    backToTopBtn.classList.remove('show');
                }
            });
            
            // Scroll to top when button is clicked
            backToTopBtn.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
            
            // Show loading spinner
            function showLoading() {
                loadingSpinner.style.display = 'block';
                overlay.style.display = 'block';
                setTimeout(() => {
                    loadingSpinner.style.display = 'none';
                    overlay.style.display = 'none';
                }, 500); // Short timeout for smoother transitions
            }
            
            // Appliquer des délais d'animation à toutes les cartes
            const cards = document.querySelectorAll('.publication-item');
            cards.forEach((card, index) => {
                const cardElement = card.querySelector('.publication-card');
                if (cardElement) {
                    // Réinitialiser l'animation
                    cardElement.style.animation = 'none';
                    
                    // Appliquer une nouvelle animation avec délai progressif
                    setTimeout(() => {
                        cardElement.style.animation = 'fadeIn 0.6s ease-out';
                        cardElement.style.animationDelay = (index % 6) * 0.1 + 's';
                        cardElement.style.animationFillMode = 'both';
                    }, 50);
                }
            });
            
            // Ajouter des événements aux boutons de tri
            const sortButtons = document.querySelectorAll('.dropdown-item');
            if (sortButtons.length > 0) {
                sortButtons.forEach(button => {
                    button.addEventListener('click', function(e) {
                        e.preventDefault();
                        const sortType = this.textContent.trim();
                        const sortDropdown = document.getElementById('sortDropdown');
                        
                        if (sortDropdown) {
                            sortDropdown.textContent = sortType;
                        }
                        
                        // Animation pendant le tri
                        showLoading();
                        
                        // Simulation de tri (à remplacer par une vraie logique de tri)
                        setTimeout(() => {
                            // Ici, vous pourriez réorganiser les cartes
                            console.log(`Tri par: \${sortType}`);
                        }, 500);
                    });
                });
            }
            
            // Animation pour la pagination
            const paginationLinks = document.querySelectorAll('.pagination .page-link');
            if (paginationLinks.length > 0) {
                paginationLinks.forEach(link => {
                    if (!link.parentElement.classList.contains('disabled') && !link.parentElement.classList.contains('active')) {
                        link.addEventListener('click', function(e) {
                            e.preventDefault();
                            const href = this.getAttribute('href');
                            
                            // Montrer l'animation de chargement
                            showLoading();
                            
                            // Animation de sortie pour les publications
                            const publicationCards = document.querySelectorAll('.publication-card');
                            publicationCards.forEach((card, index) => {
                                setTimeout(() => {
                                    card.style.opacity = '0';
                                    card.style.transform = 'translateY(20px)';
                                }, index * 30);
                            });
                            
                            // Naviguer vers la nouvelle page après l'animation
                            setTimeout(() => {
                                window.location.href = href;
                            }, 400);
                        });
                    }
                });
            }
        });
    </script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 550
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

        // line 551
        yield "<div class=\"container-fluid py-4\">
    <!-- Loading overlay -->
    <div class=\"overlay\"></div>
    <div class=\"loading-spinner\">
        <div class=\"spinner\"></div>
    </div>
    
    <!-- Back to top button -->
    <div class=\"back-to-top\">
        <i class=\"fas fa-arrow-up\"></i>
    </div>
    
    <div class=\"row mb-4\">
        <div class=\"col-12\">
            <div class=\"card mb-4\">
                <div class=\"card-header pb-0 d-flex justify-content-between align-items-center\">
                    <h6 class=\"section-heading\">Réseaux Sociaux</h6>
                    <div class=\"d-flex\">
                        <button id=\"refreshBtn\" class=\"btn btn-outline-info btn-sm me-2\">
                            <i class=\"fas fa-sync-alt me-1\"></i> Actualiser
                        </button>
                        <a href=\"";
        // line 572
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_social_media_new");
        yield "\" class=\"btn btn-primary btn-sm me-2\">
                            <i class=\"fas fa-plus me-1 animated-icon\"></i> Ajouter une publication
                        </a>
                    </div>
                </div>
                <div class=\"card-body px-0 pt-0 pb-2\">
                    <div class=\"p-4\">
                        <!-- Section explicative -->
                        <div class=\"alert alert-info mb-4\">
                            <h5 class=\"alert-heading\"><i class=\"fas fa-info-circle me-2\"></i>Toutes les publications</h5>
                            <p class=\"mb-0\">Découvrez toutes les publications de notre communauté. Partagez vos expériences en créant une nouvelle publication.</p>
                        </div>
                        
                        <!-- Grille de publications -->
                        <div class=\"row g-4\">
                            ";
        // line 587
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["publications"]) || array_key_exists("publications", $context) ? $context["publications"] : (function () { throw new RuntimeError('Variable "publications" does not exist.', 587, $this->source); })()))) {
            // line 588
            yield "                                <div class=\"col-12\">
                                    <div class=\"no-publications\">
                                        <i class=\"fas fa-newspaper fa-3x mb-3 text-muted animated-icon\"></i>
                                        <h5>Aucune publication disponible</h5>
                                        <p class=\"text-muted\">Soyez le premier à partager une publication !</p>
                                        <a href=\"";
            // line 593
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_social_media_new");
            yield "\" class=\"btn btn-primary\">
                                            <i class=\"fas fa-plus me-1\"></i> Créer une publication
                                        </a>
                                    </div>
                                </div>
                            ";
        } else {
            // line 599
            yield "                                <div class=\"col-12 mb-3\">
                                    <div class=\"d-flex justify-content-between align-items-center\">
                                        <p class=\"m-0 publications-count\">
                                            <i class=\"fas fa-list-ul me-1\"></i> ";
            // line 602
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["publications"]) || array_key_exists("publications", $context) ? $context["publications"] : (function () { throw new RuntimeError('Variable "publications" does not exist.', 602, $this->source); })()), "totalItemCount", [], "any", false, false, false, 602), "html", null, true);
            yield " publication";
            if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["publications"]) || array_key_exists("publications", $context) ? $context["publications"] : (function () { throw new RuntimeError('Variable "publications" does not exist.', 602, $this->source); })()), "totalItemCount", [], "any", false, false, false, 602) > 1)) {
                yield "s";
            }
            yield " trouvée";
            if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["publications"]) || array_key_exists("publications", $context) ? $context["publications"] : (function () { throw new RuntimeError('Variable "publications" does not exist.', 602, $this->source); })()), "totalItemCount", [], "any", false, false, false, 602) > 1)) {
                yield "s";
            }
            // line 603
            yield "                                        </p>
                                        <div class=\"dropdown\">
                                            <button class=\"btn btn-sm btn-outline-secondary dropdown-toggle\" type=\"button\" id=\"sortDropdown\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                                                <i class=\"fas fa-sort me-1\"></i> Trier par
                                            </button>
                                            <ul class=\"dropdown-menu\" aria-labelledby=\"sortDropdown\">
                                                <li><a class=\"dropdown-item\" href=\"#\"><i class=\"fas fa-calendar-alt me-2\"></i>Plus récents</a></li>
                                                <li><a class=\"dropdown-item\" href=\"#\"><i class=\"fas fa-calendar me-2\"></i>Plus anciens</a></li>
                                                <li><a class=\"dropdown-item\" href=\"#\"><i class=\"fas fa-sort-alpha-down me-2\"></i>Alphabétique</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                                ";
            // line 617
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["publications"]) || array_key_exists("publications", $context) ? $context["publications"] : (function () { throw new RuntimeError('Variable "publications" does not exist.', 617, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["publication"]) {
                // line 618
                yield "                                    <div class=\"col-lg-4 col-md-6 mb-4 publication-item\">
                                        <div class=\"publication-card card h-100\">
                                            <div class=\"card-img-container\">
                                                ";
                // line 621
                if (CoreExtension::getAttribute($this->env, $this->source, $context["publication"], "imagemedia", [], "any", false, false, false, 621)) {
                    // line 622
                    yield "                                                    <img src=\"http://localhost/ImageSocialMedia/";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["publication"], "imagemedia", [], "any", false, false, false, 622), "html", null, true);
                    yield "\" 
                                                         class=\"card-img-top\" 
                                                         alt=\"";
                    // line 624
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["publication"], "titre", [], "any", false, false, false, 624), "html", null, true);
                    yield "\"
                                                         onerror=\"this.onerror=null; this.src='";
                    // line 625
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/image-placeholder.jpg"), "html", null, true);
                    yield "'; this.alt='Image non disponible';\">
                                                ";
                }
                // line 627
                yield "                                            </div>
                                            <div class=\"card-body\">
                                                <span class=\"author-info\">
                                                    <i class=\"fas fa-user me-1\"></i> ";
                // line 630
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["publication"], "user", [], "any", false, false, false, 630), "name", [], "any", false, false, false, 630), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["publication"], "user", [], "any", false, false, false, 630), "prenom", [], "any", false, false, false, 630), "html", null, true);
                yield "
                                                </span>
                                                <span class=\"location-badge\">
                                                    <i class=\"fas fa-map-marker-alt\"></i> ";
                // line 633
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["publication"], "lieu", [], "any", false, false, false, 633), "html", null, true);
                yield "
                                                </span>
                                                <h5 class=\"card-title\">";
                // line 635
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["publication"], "titre", [], "any", false, false, false, 635), "html", null, true);
                yield "</h5>
                                                <p class=\"card-text\">";
                // line 636
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::trim(Twig\Extension\CoreExtension::slice($this->env->getCharset(), Twig\Extension\CoreExtension::striptags(CoreExtension::getAttribute($this->env, $this->source, $context["publication"], "contenu", [], "any", false, false, false, 636)), 0, (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["publication"], "contenu", [], "any", false, false, false, 636)) / 2))) . "..."), "html", null, true);
                yield "</p>
                                            </div>
                                            <div class=\"card-footer d-flex justify-content-between align-items-center\">
                                                <span class=\"date-info\"><i class=\"far fa-calendar-alt me-1\"></i> ";
                // line 639
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["publication"], "publicationDate", [], "any", false, false, false, 639), "d/m/Y"), "html", null, true);
                yield "</span>
                                                <a href=\"";
                // line 640
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_social_media_show", ["idEB" => CoreExtension::getAttribute($this->env, $this->source, $context["publication"], "idEB", [], "any", false, false, false, 640)]), "html", null, true);
                yield "\" class=\"btn btn-sm btn-outline-primary\">
                                                    <i class=\"fas fa-eye me-1\"></i> Voir
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['publication'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 647
            yield "                                
                                <!-- Pagination -->
                                <div class=\"col-12\">
                                    <div class=\"pagination-container\">
                                        ";
            // line 651
            yield $this->env->getRuntime('Knp\Bundle\PaginatorBundle\Twig\Extension\PaginationRuntime')->render($this->env, (isset($context["publications"]) || array_key_exists("publications", $context) ? $context["publications"] : (function () { throw new RuntimeError('Variable "publications" does not exist.', 651, $this->source); })()), "pagination/custom_pagination.html.twig");
            yield "
                                    </div>
                                    <div class=\"pagination-info\">
                                        Affichage de ";
            // line 654
            yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["publications"]) || array_key_exists("publications", $context) ? $context["publications"] : (function () { throw new RuntimeError('Variable "publications" does not exist.', 654, $this->source); })()), "currentPageNumber", [], "any", false, false, false, 654) == 1)) ? ("1") : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((((CoreExtension::getAttribute($this->env, $this->source, (isset($context["publications"]) || array_key_exists("publications", $context) ? $context["publications"] : (function () { throw new RuntimeError('Variable "publications" does not exist.', 654, $this->source); })()), "currentPageNumber", [], "any", false, false, false, 654) - 1) * CoreExtension::getAttribute($this->env, $this->source, (isset($context["publications"]) || array_key_exists("publications", $context) ? $context["publications"] : (function () { throw new RuntimeError('Variable "publications" does not exist.', 654, $this->source); })()), "itemNumberPerPage", [], "any", false, false, false, 654)) + 1), "html", null, true)));
            yield " 
                                        à ";
            // line 655
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(min((CoreExtension::getAttribute($this->env, $this->source, (isset($context["publications"]) || array_key_exists("publications", $context) ? $context["publications"] : (function () { throw new RuntimeError('Variable "publications" does not exist.', 655, $this->source); })()), "currentPageNumber", [], "any", false, false, false, 655) * CoreExtension::getAttribute($this->env, $this->source, (isset($context["publications"]) || array_key_exists("publications", $context) ? $context["publications"] : (function () { throw new RuntimeError('Variable "publications" does not exist.', 655, $this->source); })()), "itemNumberPerPage", [], "any", false, false, false, 655)), CoreExtension::getAttribute($this->env, $this->source, (isset($context["publications"]) || array_key_exists("publications", $context) ? $context["publications"] : (function () { throw new RuntimeError('Variable "publications" does not exist.', 655, $this->source); })()), "totalItemCount", [], "any", false, false, false, 655)), "html", null, true);
            yield " 
                                        sur ";
            // line 656
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["publications"]) || array_key_exists("publications", $context) ? $context["publications"] : (function () { throw new RuntimeError('Variable "publications" does not exist.', 656, $this->source); })()), "totalItemCount", [], "any", false, false, false, 656), "html", null, true);
            yield " publication";
            if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["publications"]) || array_key_exists("publications", $context) ? $context["publications"] : (function () { throw new RuntimeError('Variable "publications" does not exist.', 656, $this->source); })()), "totalItemCount", [], "any", false, false, false, 656) > 1)) {
                yield "s";
            }
            // line 657
            yield "                                    </div>
                                </div>
                            ";
        }
        // line 660
        yield "                        </div>
                    </div>
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
        return "dashVoyageurs/socialPageVoyageurs.html.twig";
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
        return array (  885 => 660,  880 => 657,  874 => 656,  870 => 655,  866 => 654,  860 => 651,  854 => 647,  841 => 640,  837 => 639,  831 => 636,  827 => 635,  822 => 633,  814 => 630,  809 => 627,  804 => 625,  800 => 624,  794 => 622,  792 => 621,  787 => 618,  783 => 617,  767 => 603,  757 => 602,  752 => 599,  743 => 593,  736 => 588,  734 => 587,  716 => 572,  693 => 551,  680 => 550,  521 => 402,  508 => 401,  102 => 6,  89 => 5,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'dashVoyageurs/dashboardVoyageurs.html.twig' %}

{% block title %}Social Media - Airmess Dashboard{% endblock %}

{% block stylesheets %}
    {{ parent() }}
    <style>
        .publication-card {
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            height: 100%;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.6s ease-out;
            animation-fill-mode: both;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .publication-card:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }
        
        .card-img-container {
            position: relative;
            overflow: hidden;
        }
        
        .card-img-top {
            height: 250px;
            object-fit: cover;
            width: 100%;
            transition: all 0.8s cubic-bezier(0.165, 0.84, 0.44, 1);
            opacity: 1;
        }
        
        .publication-card:hover .card-img-top {
            transform: scale(1.08);
        }
        
        /* Effet de superposition sur les images */
        .card-img-container::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0,0,0,0) 60%, rgba(0,0,0,0.6) 100%);
            opacity: 0;
            transition: opacity 0.4s ease;
        }
        
        .publication-card:hover .card-img-container::after {
            opacity: 1;
        }
        
        /* Effet de brillance au survol */
        .card-img-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 50%;
            height: 100%;
            background: linear-gradient(to right, rgba(255,255,255,0) 0%, rgba(255,255,255,0.3) 100%);
            transform: skewX(-25deg);
            z-index: 1;
            transition: left 0.8s ease-out;
        }
        
        .publication-card:hover .card-img-container::before {
            left: 150%;
        }
        
        /* Animation pulsation pour l'icône \"voir\" */
        .publication-card .btn-outline-primary i {
            transition: transform 0.3s ease;
        }
        
        .publication-card:hover .btn-outline-primary i {
            animation: pulse-icon 1s infinite;
        }
        
        @keyframes pulse-icon {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.2);
            }
            100% {
                transform: scale(1);
            }
        }
        
        .card-title {
            font-weight: 600;
            font-size: 1.2rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        
        .card-text {
            max-height: 3rem;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }
        
        .location-badge {
            background-color: #f8f9fa;
            color: #495057;
            padding: 0.25rem 0.5rem;
            border-radius: 50px;
            font-size: 0.8rem;
            display: inline-flex;
            align-items: center;
            margin-bottom: 0.5rem;
            transition: all 0.3s ease;
        }
        
        .publication-card:hover .location-badge {
            background-color: #e9ecef;
            transform: translateX(2px);
        }
        
        .location-badge i {
            margin-right: 0.25rem;
            font-size: 0.75rem;
        }
        
        .card-footer {
            background-color: white;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            padding: 0.75rem 1.25rem;
        }
        
        .date-info {
            font-size: 0.8rem;
            color: #6c757d;
        }
        
        .author-info {
            font-size: 0.85rem;
            color: #6c757d;
            margin-bottom: 0.5rem;
        }
        
        .no-publications {
            text-align: center;
            padding: 2rem;
            background-color: #f8f9fa;
            border-radius: 15px;
        }
        
        .btn-outline-primary {
            transition: all 0.3s ease;
        }
        
        .btn-outline-primary:hover {
            transform: translateX(2px);
        }
        
        .section-heading {
            position: relative;
            padding-bottom: 0.5rem;
            margin-bottom: 1.5rem;
            font-weight: 600;
        }
        
        .section-heading::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            height: 3px;
            width: 50px;
            background-color: #5e72e4;
            border-radius: 3px;
            transition: width 0.3s ease;
        }
        
        .section-heading:hover::after {
            width: 100px;
        }
        
        .animated-icon {
            animation: pulse 1.5s infinite;
        }
        
        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
            }
        }
        
        /* Animation séquentielle pour les cartes */
        .publication-item:nth-child(1) .publication-card { animation-delay: 0.05s; }
        .publication-item:nth-child(2) .publication-card { animation-delay: 0.1s; }
        .publication-item:nth-child(3) .publication-card { animation-delay: 0.15s; }
        .publication-item:nth-child(4) .publication-card { animation-delay: 0.2s; }
        .publication-item:nth-child(5) .publication-card { animation-delay: 0.25s; }
        .publication-item:nth-child(6) .publication-card { animation-delay: 0.3s; }
        
        /* Loading spinner */
        .loading-spinner {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
        }
        
        .spinner {
            width: 40px;
            height: 40px;
            border: 4px solid rgba(0, 0, 0, 0.1);
            border-radius: 50%;
            border-top-color: #5e72e4;
            animation: spin 1s ease-in-out infinite;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.7);
            z-index: 9998;
        }
        
        /* Back to top button */
        .back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #5e72e4;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 999;
        }
        
        .back-to-top.show {
            opacity: 1;
            visibility: visible;
        }
        
        .back-to-top:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        /* Afficher plus de publications */
        .publication-item {
            transition: all 0.4s ease;
            opacity: 1;
        }
        
        /* Style pour le menu de tri */
        .dropdown-menu {
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border: none;
            overflow: hidden;
        }
        
        .dropdown-item {
            padding: 0.6rem 1.5rem;
            transition: all 0.2s ease;
        }
        
        .dropdown-item:hover {
            background-color: #f1f4ff;
            transform: translateX(5px);
        }
        
        /* Style pour le compteur de publications */
        .publications-count {
            font-weight: 500;
            background-color: #f8f9fa;
            padding: 0.35rem 1rem;
            border-radius: 50px;
            font-size: 0.9rem;
        }
        
        /* Style pour la pagination */
        .pagination-container {
            margin-top: 2rem;
            display: flex;
            justify-content: center;
        }
        
        .pagination {
            display: flex;
            padding-left: 0;
            list-style: none;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(50, 50, 93, 0.11), 0 1px 3px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }
        
        .page-link {
            position: relative;
            display: block;
            padding: 0.75rem 1rem;
            margin-left: -1px;
            line-height: 1.25;
            color: #5e72e4;
            background-color: #fff;
            border: 1px solid #dee2e6;
            transition: all 0.2s ease;
        }
        
        .page-link:hover {
            z-index: 2;
            color: #233dd2;
            text-decoration: none;
            background-color: #e9ecef;
            transform: translateY(-2px);
        }
        
        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #5e72e4;
            border-color: #5e72e4;
            box-shadow: 0 7px 14px rgba(50, 50, 93, 0.1), 0 3px 6px rgba(0, 0, 0, 0.08);
        }
        
        .page-item.disabled .page-link {
            color: #8898aa;
            pointer-events: none;
            cursor: auto;
            background-color: #fff;
            border-color: #dee2e6;
        }
        
        .pagination-info {
            text-align: center;
            margin-top: 0.5rem;
            font-size: 0.85rem;
            color: #8898aa;
        }
        
        /* Animation pour la pagination */
        .pagination .page-item {
            transform: scale(1);
            transition: transform 0.2s ease;
        }
        
        .pagination .page-item:hover {
            transform: scale(1.05);
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .publication-item {
                margin-bottom: 20px;
            }
        }
    </style>
{% endblock %}

{% block javascripts %}
    {{ parent() }}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const backToTopBtn = document.querySelector('.back-to-top');
            const loadingSpinner = document.querySelector('.loading-spinner');
            const overlay = document.querySelector('.overlay');
            const refreshBtn = document.getElementById('refreshBtn');
            
            // Animation d'apparition des images au chargement
            const cardImages = document.querySelectorAll('.card-img-top');
            cardImages.forEach(img => {
                // Appliquer un effet initial de zoom réduit
                img.style.transform = 'scale(0.95)';
                img.style.opacity = '0.9';
                
                // Attendre que l'image soit chargée
                img.onload = function() {
                    // Transition vers l'échelle normale
                    setTimeout(() => {
                        img.style.transform = 'scale(1)';
                        img.style.opacity = '1';
                    }, 100 + Math.random() * 300);
                };
                
                // Si l'image est déjà chargée
                if (img.complete) {
                    setTimeout(() => {
                        img.style.transform = 'scale(1)';
                        img.style.opacity = '1';
                    }, 100 + Math.random() * 300);
                }
            });
            
            // Refresh button event
            if (refreshBtn) {
                refreshBtn.addEventListener('click', function() {
                    const icon = this.querySelector('i');
                    icon.classList.add('fa-spin');
                    showLoading();
                    
                    setTimeout(() => {
                        location.reload();
                    }, 500);
                });
            }
            
            // Show/hide back to top button
            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 300) {
                    backToTopBtn.classList.add('show');
                } else {
                    backToTopBtn.classList.remove('show');
                }
            });
            
            // Scroll to top when button is clicked
            backToTopBtn.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
            
            // Show loading spinner
            function showLoading() {
                loadingSpinner.style.display = 'block';
                overlay.style.display = 'block';
                setTimeout(() => {
                    loadingSpinner.style.display = 'none';
                    overlay.style.display = 'none';
                }, 500); // Short timeout for smoother transitions
            }
            
            // Appliquer des délais d'animation à toutes les cartes
            const cards = document.querySelectorAll('.publication-item');
            cards.forEach((card, index) => {
                const cardElement = card.querySelector('.publication-card');
                if (cardElement) {
                    // Réinitialiser l'animation
                    cardElement.style.animation = 'none';
                    
                    // Appliquer une nouvelle animation avec délai progressif
                    setTimeout(() => {
                        cardElement.style.animation = 'fadeIn 0.6s ease-out';
                        cardElement.style.animationDelay = (index % 6) * 0.1 + 's';
                        cardElement.style.animationFillMode = 'both';
                    }, 50);
                }
            });
            
            // Ajouter des événements aux boutons de tri
            const sortButtons = document.querySelectorAll('.dropdown-item');
            if (sortButtons.length > 0) {
                sortButtons.forEach(button => {
                    button.addEventListener('click', function(e) {
                        e.preventDefault();
                        const sortType = this.textContent.trim();
                        const sortDropdown = document.getElementById('sortDropdown');
                        
                        if (sortDropdown) {
                            sortDropdown.textContent = sortType;
                        }
                        
                        // Animation pendant le tri
                        showLoading();
                        
                        // Simulation de tri (à remplacer par une vraie logique de tri)
                        setTimeout(() => {
                            // Ici, vous pourriez réorganiser les cartes
                            console.log(`Tri par: \${sortType}`);
                        }, 500);
                    });
                });
            }
            
            // Animation pour la pagination
            const paginationLinks = document.querySelectorAll('.pagination .page-link');
            if (paginationLinks.length > 0) {
                paginationLinks.forEach(link => {
                    if (!link.parentElement.classList.contains('disabled') && !link.parentElement.classList.contains('active')) {
                        link.addEventListener('click', function(e) {
                            e.preventDefault();
                            const href = this.getAttribute('href');
                            
                            // Montrer l'animation de chargement
                            showLoading();
                            
                            // Animation de sortie pour les publications
                            const publicationCards = document.querySelectorAll('.publication-card');
                            publicationCards.forEach((card, index) => {
                                setTimeout(() => {
                                    card.style.opacity = '0';
                                    card.style.transform = 'translateY(20px)';
                                }, index * 30);
                            });
                            
                            // Naviguer vers la nouvelle page après l'animation
                            setTimeout(() => {
                                window.location.href = href;
                            }, 400);
                        });
                    }
                });
            }
        });
    </script>
{% endblock %}

{% block body %}
<div class=\"container-fluid py-4\">
    <!-- Loading overlay -->
    <div class=\"overlay\"></div>
    <div class=\"loading-spinner\">
        <div class=\"spinner\"></div>
    </div>
    
    <!-- Back to top button -->
    <div class=\"back-to-top\">
        <i class=\"fas fa-arrow-up\"></i>
    </div>
    
    <div class=\"row mb-4\">
        <div class=\"col-12\">
            <div class=\"card mb-4\">
                <div class=\"card-header pb-0 d-flex justify-content-between align-items-center\">
                    <h6 class=\"section-heading\">Réseaux Sociaux</h6>
                    <div class=\"d-flex\">
                        <button id=\"refreshBtn\" class=\"btn btn-outline-info btn-sm me-2\">
                            <i class=\"fas fa-sync-alt me-1\"></i> Actualiser
                        </button>
                        <a href=\"{{ path('app_social_media_new') }}\" class=\"btn btn-primary btn-sm me-2\">
                            <i class=\"fas fa-plus me-1 animated-icon\"></i> Ajouter une publication
                        </a>
                    </div>
                </div>
                <div class=\"card-body px-0 pt-0 pb-2\">
                    <div class=\"p-4\">
                        <!-- Section explicative -->
                        <div class=\"alert alert-info mb-4\">
                            <h5 class=\"alert-heading\"><i class=\"fas fa-info-circle me-2\"></i>Toutes les publications</h5>
                            <p class=\"mb-0\">Découvrez toutes les publications de notre communauté. Partagez vos expériences en créant une nouvelle publication.</p>
                        </div>
                        
                        <!-- Grille de publications -->
                        <div class=\"row g-4\">
                            {% if publications is empty %}
                                <div class=\"col-12\">
                                    <div class=\"no-publications\">
                                        <i class=\"fas fa-newspaper fa-3x mb-3 text-muted animated-icon\"></i>
                                        <h5>Aucune publication disponible</h5>
                                        <p class=\"text-muted\">Soyez le premier à partager une publication !</p>
                                        <a href=\"{{ path('app_social_media_new') }}\" class=\"btn btn-primary\">
                                            <i class=\"fas fa-plus me-1\"></i> Créer une publication
                                        </a>
                                    </div>
                                </div>
                            {% else %}
                                <div class=\"col-12 mb-3\">
                                    <div class=\"d-flex justify-content-between align-items-center\">
                                        <p class=\"m-0 publications-count\">
                                            <i class=\"fas fa-list-ul me-1\"></i> {{ publications.totalItemCount }} publication{% if publications.totalItemCount > 1 %}s{% endif %} trouvée{% if publications.totalItemCount > 1 %}s{% endif %}
                                        </p>
                                        <div class=\"dropdown\">
                                            <button class=\"btn btn-sm btn-outline-secondary dropdown-toggle\" type=\"button\" id=\"sortDropdown\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                                                <i class=\"fas fa-sort me-1\"></i> Trier par
                                            </button>
                                            <ul class=\"dropdown-menu\" aria-labelledby=\"sortDropdown\">
                                                <li><a class=\"dropdown-item\" href=\"#\"><i class=\"fas fa-calendar-alt me-2\"></i>Plus récents</a></li>
                                                <li><a class=\"dropdown-item\" href=\"#\"><i class=\"fas fa-calendar me-2\"></i>Plus anciens</a></li>
                                                <li><a class=\"dropdown-item\" href=\"#\"><i class=\"fas fa-sort-alpha-down me-2\"></i>Alphabétique</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                                {% for publication in publications %}
                                    <div class=\"col-lg-4 col-md-6 mb-4 publication-item\">
                                        <div class=\"publication-card card h-100\">
                                            <div class=\"card-img-container\">
                                                {% if publication.imagemedia %}
                                                    <img src=\"http://localhost/ImageSocialMedia/{{ publication.imagemedia }}\" 
                                                         class=\"card-img-top\" 
                                                         alt=\"{{ publication.titre }}\"
                                                         onerror=\"this.onerror=null; this.src='{{ asset('img/image-placeholder.jpg') }}'; this.alt='Image non disponible';\">
                                                {% endif %}
                                            </div>
                                            <div class=\"card-body\">
                                                <span class=\"author-info\">
                                                    <i class=\"fas fa-user me-1\"></i> {{ publication.user.name }} {{ publication.user.prenom }}
                                                </span>
                                                <span class=\"location-badge\">
                                                    <i class=\"fas fa-map-marker-alt\"></i> {{ publication.lieu }}
                                                </span>
                                                <h5 class=\"card-title\">{{ publication.titre }}</h5>
                                                <p class=\"card-text\">{{ publication.contenu|striptags|slice(0, publication.contenu|length / 2)|trim ~ '...' }}</p>
                                            </div>
                                            <div class=\"card-footer d-flex justify-content-between align-items-center\">
                                                <span class=\"date-info\"><i class=\"far fa-calendar-alt me-1\"></i> {{ publication.publicationDate|date(\"d/m/Y\") }}</span>
                                                <a href=\"{{ path('app_social_media_show', {'idEB': publication.idEB}) }}\" class=\"btn btn-sm btn-outline-primary\">
                                                    <i class=\"fas fa-eye me-1\"></i> Voir
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                {% endfor %}
                                
                                <!-- Pagination -->
                                <div class=\"col-12\">
                                    <div class=\"pagination-container\">
                                        {{ knp_pagination_render(publications, 'pagination/custom_pagination.html.twig') }}
                                    </div>
                                    <div class=\"pagination-info\">
                                        Affichage de {{ publications.currentPageNumber == 1 ? '1' : ((publications.currentPageNumber - 1) * publications.itemNumberPerPage) + 1 }} 
                                        à {{ min(publications.currentPageNumber * publications.itemNumberPerPage, publications.totalItemCount) }} 
                                        sur {{ publications.totalItemCount }} publication{% if publications.totalItemCount > 1 %}s{% endif %}
                                    </div>
                                </div>
                            {% endif %}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{% endblock %}
", "dashVoyageurs/socialPageVoyageurs.html.twig", "C:\\Users\\arijt\\Desktop\\Airmess_Web\\templates\\dashVoyageurs\\socialPageVoyageurs.html.twig");
    }
}
