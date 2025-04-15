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

/* social_media/show.html.twig */
class __TwigTemplate_33909d2e27521a8a42eddc87b9dd8944 extends Template
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
            'css' => [$this, 'block_css'],
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 2
        return "dashVoyageurs/dashboardVoyageurs.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "social_media/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "social_media/show.html.twig"));

        $this->parent = $this->loadTemplate("dashVoyageurs/dashboardVoyageurs.html.twig", "social_media/show.html.twig", 2);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 6
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

        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["social_media"]) || array_key_exists("social_media", $context) ? $context["social_media"] : (function () { throw new RuntimeError('Variable "social_media" does not exist.', 6, $this->source); })()), "getTitre", [], "method", false, false, false, 6), "html", null, true);
        yield " - Détails";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 8
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_css(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "css"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "css"));

        // line 9
        yield "    ";
        yield from $this->yieldParentBlock("css", $context, $blocks);
        yield "
    <link rel=\"stylesheet\" href=\"";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/feed.css"), "html", null, true);
        yield "\">
    <style>
        :root {
            --main-accent: #4a6bda;
            --main-accent-hover: #3d58b3;
            --danger-color: #dc3545;
            --danger-color-darker: #bb2d3b;
            --light-bg: #f8f9fa;
            --card-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
            --card-radius: 12px;
            --transition-speed: 0.25s;
        }
        
        body {
            background-color: #f5f7fa;
            color: #444;
        }
        
        /* Custom animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(74, 107, 218, 0.4); }
            70% { box-shadow: 0 0 0 6px rgba(74, 107, 218, 0); }
            100% { box-shadow: 0 0 0 0 rgba(74, 107, 218, 0); }
        }
        
        .pulsate {
            animation: pulse 1.5s infinite;
        }
        
        .post-card {
            box-shadow: var(--card-shadow);
            border-radius: var(--card-radius);
            transition: all var(--transition-speed) ease;
            animation: fadeIn 0.5s ease forwards;
            max-width: 650px;
            margin: 0 auto;
        }
        
        .post-card:hover {
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            transform: translateY(-3px);
        }
        
        .post-image-container {
            max-height: 250px;
            overflow: hidden;
            position: relative;
            border-radius: 10px;
            margin: 0.5rem auto 1.25rem;
            max-width: 75%;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            padding: 0.25rem;
            background-color: #f9f9f9;
        }
        
        .post-image-container img {
            transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
            object-fit: cover;
            width: 100%;
            max-height: 250px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }
        
        .post-image-container:hover img {
            transform: scale(1.05);
        }
        
        /* Effet de brillance au survol */
        .post-image-container::before {
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
        
        .post-image-container:hover::before {
            left: 150%;
        }
        
        .post-actions {
            padding: 0.75rem 1rem;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            background-color: #fbfbfd;
        }
        
        .btn-action {
            border-radius: 30px;
            transition: all var(--transition-speed) ease;
            padding: 0.5rem 0.5rem;
            font-weight: 500;
            font-size: 0.9rem;
            border: none;
            text-align: center;
            white-space: nowrap;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 2px;
        }
        
        .btn-action:hover {
            background-color: rgba(0, 0, 0, 0.05);
            transform: translateY(-1px);
        }
        
        .like-button:hover, .like-button.active {
            color: var(--main-accent) !important;
            background-color: rgba(74, 107, 218, 0.1);
        }
        
        /* Style pour l'icône Flaticon du bouton like */
        .like-button img, .like-count-badge img, 
        .dislike-button img, .dislike-count-badge img {
            transition: all 0.3s ease;
            filter: brightness(1);
        }
        
        .like-button:hover img, .like-button.active img {
            transform: scale(1.15);
            filter: drop-shadow(0px 0px 3px rgba(74, 107, 218, 0.5));
        }
        
        .dislike-button:hover, .dislike-button.active {
            color: var(--danger-color) !important;
            background-color: rgba(220, 53, 69, 0.1);
        }
        
        .like-count-badge img {
            filter: brightness(10); /* Rend l'icône blanche pour le badge */
        }
        
        .dislike-count-badge img {
            filter: brightness(10); /* Rend l'icône blanche pour le badge */
        }
        
        .post-author-img, .comment-author-img {
            border: 2px solid #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08);
            object-fit: cover;
        }
        
        .comment-bubble {
            background-color: var(--light-bg);
            border-radius: 16px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.03);
            padding: 0.6rem 0.9rem;
        }
        
        .comment-entry {
            animation: fadeIn 0.4s ease forwards;
            animation-delay: calc(0.08s * var(--animation-order, 0));
            margin-bottom: 1rem;
        }
        
        .comments-section {
            border-radius: 0 0 var(--card-radius) var(--card-radius);
            max-width: 650px;
            margin: 0 auto;
            position: relative;
            border-top: 1px solid rgba(0, 0, 0, 0.08);
            background-color: #f9f9fb;
        }
        
        .post-stats {
            color: #6c757d;
            font-weight: 500;
            font-size: 0.85rem;
            padding: 0.6rem 1.25rem;
            background-color: #fbfbfd;
            border-top: 1px solid rgba(0, 0, 0, 0.03);
            border-bottom: 1px solid rgba(0, 0, 0, 0.03);
            transition: background-color 0.5s ease;
        }
        
        .post-stats.highlight {
            background-color: rgba(74, 107, 218, 0.08);
        }
        
        .post-stats i {
            margin-right: 3px;
            color: var(--main-accent);
        }
        
        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 1.5rem;
            font-weight: 600;
            color: #333;
            font-size: 1.5rem;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 40px;
            height: 3px;
            background: linear-gradient(90deg, var(--main-accent), #71a6ff);
            border-radius: 3px;
        }
        
        .btn-send-comment {
            border-radius: 50%;
            position: absolute;
            right: 10px;
            bottom: 10px;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            background: linear-gradient(45deg, #5e72e4, #3f51b5);
            border: none;
            box-shadow: 0 3px 8px rgba(94, 114, 228, 0.4);
            transition: all 0.3s ease;
        }
        
        .btn-send-comment:hover, 
        .btn-send-comment:focus {
            background: linear-gradient(45deg, #4a6bda, #3949ab);
            transform: translateY(-2px) rotate(15deg);
            box-shadow: 0 5px 12px rgba(94, 114, 228, 0.5);
        }
        
        .btn-send-comment i {
            font-size: 1rem;
            color: white;
            transition: all 0.3s ease;
        }
        
        .btn-send-comment:hover i {
            transform: scale(1.1);
        }
        
        .comment-action-link {
            color: #6c757d;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.8rem;
            transition: all var(--transition-speed) ease;
        }
        
        .comment-action-link:hover {
            color: var(--main-accent);
        }
        
        .post-header {
            padding: 0.75rem 1.25rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.03);
        }
        
        .post-title {
            font-weight: 700;
            color: #333;
            font-size: 1.3rem;
            line-height: 1.3;
            margin-bottom: 0.75rem;
        }
        
        .post-content {
            padding: 1rem 1.25rem;
            line-height: 1.5;
            color: #444;
            font-size: 0.95rem;
        }
        
        .post-text {
            overflow-wrap: break-word;
            word-wrap: break-word;
        }
        
        .add-comment-form-container {
            margin-bottom: 2rem;
        }
        
        .comment-input {
            border-radius: 20px;
            padding-right: 40px;
            resize: none;
            border: 1px solid #e0e4e8;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
            transition: all var(--transition-speed) ease;
        }
        
        .comment-input:focus {
            border-color: #bdc9e7;
            box-shadow: 0 0 0 3px rgba(74, 107, 218, 0.1);
        }
        
        .comment-author-name {
            color: #444;
            font-size: 0.95rem;
        }
        
        .comment-text {
            font-size: 0.9rem;
            line-height: 1.4;
            color: #555;
        }
        
        .post-actions {
            padding: 0.4rem;
        }
        
        .action-text {
            font-size: 0.9rem;
        }
        
        /* Responsive adjustments */
        @media (max-width: 767px) {
            .post-card, .comments-section {
                border-radius: var(--card-radius);
                margin-left: -0.5rem;
                margin-right: -0.5rem;
                width: calc(100% + 1rem);
            }
            
            .post-header, .post-content {
                padding: 1rem;
            }
            
            .post-stats {
                padding: 0.7rem 1rem;
            }
            
            .post-title {
                font-size: 1.3rem;
            }
        }
        
        .comments-container {
            max-height: 350px;
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: rgba(74, 107, 218, 0.2) #f5f7fa;
            padding: 0.5rem 0;
        }
        
        .comments-container::-webkit-scrollbar {
            width: 6px;
        }
        
        .comments-container::-webkit-scrollbar-track {
            background: #f5f7fa;
        }
        
        .comments-container::-webkit-scrollbar-thumb {
            background-color: rgba(74, 107, 218, 0.2);
            border-radius: 10px;
        }
        
        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 1rem;
            font-weight: 600;
            color: #333;
            font-size: 1.2rem;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            bottom: -6px;
            left: 0;
            width: 30px;
            height: 3px;
            background: linear-gradient(90deg, var(--main-accent), #71a6ff);
            border-radius: 3px;
        }
        
        .add-comment-form-container {
            margin-bottom: 1rem;
        }
        
        .comment-input {
            border-radius: 18px;
            padding-right: 40px;
            resize: none;
            border: 1px solid #e0e4e8;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
            transition: all var(--transition-speed) ease;
            font-size: 0.9rem;
        }
        
        .comments-section {
            border-radius: var(--card-radius);
            max-width: 650px;
            margin: 0 auto;
            box-shadow: var(--card-shadow);
            position: relative;
        }
        
        /* Style pour mettre en évidence la section des commentaires */
        .comments-indicator {
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            background-color: var(--main-accent);
            color: white;
            border-radius: 16px;
            padding: 3px 10px;
            font-size: 0.8rem;
            font-weight: 500;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            z-index: 3;
        }
        
        .dislike-count-badge img {
            filter: brightness(10); /* Rend l'icône blanche pour le badge */
        }
        
        .dislike-button:hover, .dislike-button.active {
            color: var(--danger-color) !important;
        }
        
        /* Badge styles for like/dislike counts */
        .like-count-badge {
            background-color: var(--main-accent);
            color: white;
            padding: 0.25rem 0.6rem;
            font-size: 0.85rem;
            transition: all var(--transition-speed) ease;
            box-shadow: 0 2px 4px rgba(74, 107, 218, 0.2);
        }
        
        .like-count-badge:hover {
            background-color: var(--main-accent-hover);
            transform: translateY(-1px);
            box-shadow: 0 3px 6px rgba(74, 107, 218, 0.3);
        }
        
        .dislike-count-badge {
            background-color: var(--danger-color);
            color: white;
            padding: 0.25rem 0.6rem;
            font-size: 0.85rem;
            transition: all var(--transition-speed) ease;
            box-shadow: 0 2px 4px rgba(220, 53, 69, 0.2);
        }
        
        .dislike-count-badge:hover {
            background-color: var(--danger-color-darker);
            transform: translateY(-1px);
            box-shadow: 0 3px 6px rgba(220, 53, 69, 0.3);
        }
        
        /* Style pour le séparateur entre like et dislike */
        .stats-separator {
            width: 1px;
            height: 20px;
            background-color: rgba(0, 0, 0, 0.1);
            display: inline-block;
        }
        
        .comment-action-link.active {
            color: var(--main-accent) !important;
        }
        
        .comment-like-btn:hover .bi-heart,
        .comment-like-btn.active .bi-heart-fill {
            transform: scale(1.2);
            transition: transform 0.2s ease;
        }
        
        .comment-like-count {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-left: 4px;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--main-accent);
            background-color: rgba(74, 107, 218, 0.1);
            border-radius: 10px;
            padding: 0 6px;
            min-width: 18px;
            height: 18px;
        }
        
        /* Style du bouton retour */
        .btn-back {
            transition: all 0.3s ease;
            border-radius: 50px;
            padding: 0.5rem 1.2rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08);
        }
        
        .btn-back:hover {
            transform: translateX(-5px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.12);
        }
        
        .btn-back i {
            transition: transform 0.3s ease;
        }
        
        .btn-back:hover i {
            transform: translateX(-3px);
        }
        
        /* Style badge lieu */
        .location-badge {
            display: inline-flex;
            align-items: center;
            background-color: #f8f9fa;
            color: #495057;
            padding: 0.35rem 0.8rem;
            border-radius: 50px;
            font-size: 0.85rem;
            margin-bottom: 1rem;
            font-weight: 500;
        }
        
        .location-badge i {
            margin-right: 0.4rem;
            color: var(--main-accent);
        }
        
        /* Style pour le bouton j'aime/je n'aime pas */
        .like-button, .dislike-button {
            transition: all 0.3s ease;
        }
        
        .like-button:hover, .like-button.active {
            color: var(--main-accent) !important;
        }
        
        .dislike-button:hover, .dislike-button.active {
            color: var(--danger-color) !important;
        }
        
        .like-button:hover i, .like-button.active i,
        .dislike-button:hover i, .dislike-button.active i {
            transform: scale(1.15);
        }
        
        .like-button:hover i, .like-button.active i {
            filter: drop-shadow(0px 0px 3px rgba(74, 107, 218, 0.5));
        }
        
        .dislike-button:hover i, .dislike-button.active i {
            filter: drop-shadow(0px 0px 3px rgba(220, 53, 69, 0.5));
        }
        
        /* Style pour les boutons de like des commentaires */
        .comment-action-link.comment-like-btn {
            transition: all 0.3s ease;
            padding: 2px 8px;
            border-radius: 20px;
        }
        
        .comment-action-link.comment-like-btn:hover,
        .comment-action-link.comment-like-btn.active {
            background-color: rgba(74, 107, 218, 0.1);
            color: var(--main-accent) !important;
        }
        
        .comment-action-link.comment-like-btn i {
            transition: all 0.3s ease;
        }
        
        .comment-action-link.comment-like-btn:hover i,
        .comment-action-link.comment-like-btn.active i {
            transform: scale(1.15);
            color: var(--main-accent);
        }
        
        .comment-like-count {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-left: 4px;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--main-accent);
            background-color: rgba(74, 107, 218, 0.1);
            border-radius: 10px;
            padding: 0 6px;
            min-width: 18px;
            height: 18px;
        }
        
        .like-button.active {
            color: var(--main-accent) !important;
            background-color: rgba(74, 107, 218, 0.15) !important;
            font-weight: 500;
        }
        
        .like-button.active i {
            transform: scale(1.15);
        }
        
        .dislike-button.active {
            color: var(--danger-color) !important;
            background-color: rgba(220, 53, 69, 0.15) !important;
            font-weight: 500;
        }
        
        .dislike-button.active i {
            transform: scale(1.15);
        }
        
        /* Styles inline pour forcer la coloration des boutons actifs */
        button.like-button.active {
            color: #4a6bda !important;
            background-color: rgba(74, 107, 218, 0.15) !important;
        }
        
        button.dislike-button.active {
            color: #dc3545 !important;
            background-color: rgba(220, 53, 69, 0.15) !important;
        }
    </style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 642
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

        // line 643
        yield "<div class=\"container my-4 my-lg-5\">
    <div class=\"row justify-content-center\">
        <div class=\"col-md-10 col-lg-8 col-xl-7\">
            <!-- Bouton de retour -->
            <a href=\"";
        // line 647
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("socialVoyageurs_page");
        yield "\" class=\"btn btn-outline-primary btn-back mb-3\">
                <i class=\"fas fa-arrow-left me-2\"></i> Retour aux publications
            </a>

            ";
        // line 652
        yield "            <div class=\"post-card bg-white overflow-hidden\">
                ";
        // line 654
        yield "                <header class=\"post-header d-flex align-items-center\">
                    ";
        // line 655
        $context["post_author"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["social_media"]) || array_key_exists("social_media", $context) ? $context["social_media"] : (function () { throw new RuntimeError('Variable "social_media" does not exist.', 655, $this->source); })()), "getUser", [], "method", false, false, false, 655);
        // line 656
        yield "                    <div class=\"flex-shrink-0 me-3\">
                        <img src=\"";
        // line 657
        yield ((((isset($context["post_author"]) || array_key_exists("post_author", $context) ? $context["post_author"] : (function () { throw new RuntimeError('Variable "post_author" does not exist.', 657, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["post_author"]) || array_key_exists("post_author", $context) ? $context["post_author"] : (function () { throw new RuntimeError('Variable "post_author" does not exist.', 657, $this->source); })()), "getImagesU", [], "method", false, false, false, 657))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/profile_pictures/" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["post_author"]) || array_key_exists("post_author", $context) ? $context["post_author"] : (function () { throw new RuntimeError('Variable "post_author" does not exist.', 657, $this->source); })()), "getImagesU", [], "method", false, false, false, 657))), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/placeholder-avatar.png"), "html", null, true)));
        yield "\"
                             alt=\"";
        // line 658
        yield (((isset($context["post_author"]) || array_key_exists("post_author", $context) ? $context["post_author"] : (function () { throw new RuntimeError('Variable "post_author" does not exist.', 658, $this->source); })())) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post_author"]) || array_key_exists("post_author", $context) ? $context["post_author"] : (function () { throw new RuntimeError('Variable "post_author" does not exist.', 658, $this->source); })()), "getPrenom", [], "method", false, false, false, 658), "html", null, true)) : ("Utilisateur"));
        yield "\"
                             class=\"post-author-img rounded-circle\" width=\"38\" height=\"38\">
                    </div>
                    <div class=\"post-author-info flex-grow-1\">
                        <h5 class=\"post-author-name mb-0\">
                            ";
        // line 663
        if ((isset($context["post_author"]) || array_key_exists("post_author", $context) ? $context["post_author"] : (function () { throw new RuntimeError('Variable "post_author" does not exist.', 663, $this->source); })())) {
            // line 664
            yield "                                <strong>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post_author"]) || array_key_exists("post_author", $context) ? $context["post_author"] : (function () { throw new RuntimeError('Variable "post_author" does not exist.', 664, $this->source); })()), "getPrenom", [], "method", false, false, false, 664), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["post_author"]) || array_key_exists("post_author", $context) ? $context["post_author"] : (function () { throw new RuntimeError('Variable "post_author" does not exist.', 664, $this->source); })()), "getName", [], "method", false, false, false, 664), "html", null, true);
            yield "</strong>
                            ";
        } else {
            // line 666
            yield "                                <em class=\"text-muted\">Utilisateur inconnu</em>
                            ";
        }
        // line 668
        yield "                        </h5>
                        <small class=\"post-timestamp text-muted\">
                            <i class=\"bi bi-clock me-1\"></i>";
        // line 670
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["social_media"]) || array_key_exists("social_media", $context) ? $context["social_media"] : (function () { throw new RuntimeError('Variable "social_media" does not exist.', 670, $this->source); })()), "getPublicationDate", [], "method", false, false, false, 670), "d/m/Y à H:i"), "html", null, true);
        yield "
                        </small>
                    </div>
                </header>

                ";
        // line 676
        yield "                <div class=\"post-content pb-0\">
                    <h3 class=\"post-title\">";
        // line 677
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["social_media"]) || array_key_exists("social_media", $context) ? $context["social_media"] : (function () { throw new RuntimeError('Variable "social_media" does not exist.', 677, $this->source); })()), "getTitre", [], "method", false, false, false, 677), "html", null, true);
        yield "</h3>
                    
                    <!-- Badge lieu -->
                    <div class=\"location-badge\">
                        <i class=\"fas fa-map-marker-alt\"></i> ";
        // line 681
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["social_media"]) || array_key_exists("social_media", $context) ? $context["social_media"] : (function () { throw new RuntimeError('Variable "social_media" does not exist.', 681, $this->source); })()), "getLieu", [], "method", false, false, false, 681), "html", null, true);
        yield "
                    </div>
                </div>

                ";
        // line 686
        yield "                ";
        if (CoreExtension::getAttribute($this->env, $this->source, (isset($context["social_media"]) || array_key_exists("social_media", $context) ? $context["social_media"] : (function () { throw new RuntimeError('Variable "social_media" does not exist.', 686, $this->source); })()), "getImagemedia", [], "method", false, false, false, 686)) {
            // line 687
            yield "                    <div class=\"post-image-container d-flex justify-content-center align-items-center bg-light\">
                        <img src=\"";
            // line 688
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("http://localhost/ImageSocialMedia/" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["social_media"]) || array_key_exists("social_media", $context) ? $context["social_media"] : (function () { throw new RuntimeError('Variable "social_media" does not exist.', 688, $this->source); })()), "getImagemedia", [], "method", false, false, false, 688))), "html", null, true);
            yield "\"
                             alt=\"Image pour ";
            // line 689
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["social_media"]) || array_key_exists("social_media", $context) ? $context["social_media"] : (function () { throw new RuntimeError('Variable "social_media" does not exist.', 689, $this->source); })()), "getTitre", [], "method", false, false, false, 689), "html", null, true);
            yield "\" class=\"img-fluid\"
                             onerror=\"this.onerror=null; this.src='";
            // line 690
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/image-not-found.png"), "html", null, true);
            yield "'; this.alt='Image non disponible';\">
                    </div>
                ";
        }
        // line 693
        yield "
                ";
        // line 695
        yield "                <div class=\"post-content pt-2\">
                    <div class=\"post-text\">";
        // line 696
        yield Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["social_media"]) || array_key_exists("social_media", $context) ? $context["social_media"] : (function () { throw new RuntimeError('Variable "social_media" does not exist.', 696, $this->source); })()), "getContenu", [], "method", false, false, false, 696), "html", null, true));
        yield "</div>
                </div>

                ";
        // line 700
        yield "                <div class=\"post-stats d-flex justify-content-between align-items-center\">
                    <div class=\"d-flex align-items-center gap-3\">
                            <div class=\"d-flex align-items-center\">
                            <span class=\"badge rounded-pill bg-primary me-2\">
                                <i class=\"fas fa-thumbs-up me-1\"></i> ";
        // line 704
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["social_media"]) || array_key_exists("social_media", $context) ? $context["social_media"] : (function () { throw new RuntimeError('Variable "social_media" does not exist.', 704, $this->source); })()), "getLikee", [], "method", false, false, false, 704), "html", null, true);
        yield "
                                </span>
                            
                            <span class=\"badge rounded-pill bg-danger\">
                                <i class=\"fas fa-thumbs-down me-1\"></i> ";
        // line 708
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["social_media"]) || array_key_exists("social_media", $context) ? $context["social_media"] : (function () { throw new RuntimeError('Variable "social_media" does not exist.', 708, $this->source); })()), "getDislike", [], "method", false, false, false, 708), "html", null, true);
        yield "
                                </span>
                            </div>
                    </div>
                    
                    <div>
                        <small class=\"text-muted d-flex align-items-center\">
                            <i class=\"bi bi-chat-dots me-1\"></i>
                            <span class=\"comments-count\">";
        // line 716
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["comments"]) || array_key_exists("comments", $context) ? $context["comments"] : (function () { throw new RuntimeError('Variable "comments" does not exist.', 716, $this->source); })())), "html", null, true);
        yield "</span> commentaire";
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["comments"]) || array_key_exists("comments", $context) ? $context["comments"] : (function () { throw new RuntimeError('Variable "comments" does not exist.', 716, $this->source); })())) != 1)) {
            yield "s";
        }
        // line 717
        yield "                     </small>
                    </div>
                 </div>

               ";
        // line 722
        yield "                <div class=\"post-actions d-flex justify-content-between align-items-center\">
                    <div class=\"d-flex flex-grow-1 mx-n1\">
                    ";
        // line 725
        yield "                        <form action=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_social_media_like", ["idEB" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["social_media"]) || array_key_exists("social_media", $context) ? $context["social_media"] : (function () { throw new RuntimeError('Variable "social_media" does not exist.', 725, $this->source); })()), "idEB", [], "any", false, false, false, 725)]), "html", null, true);
        yield "\" method=\"POST\" class=\"d-inline m-0 flex-grow-1 px-1 like-form\">
                        <input type=\"hidden\" name=\"_token\" value=\"";
        // line 726
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("like-post"), "html", null, true);
        yield "\">
                        <button type=\"submit\" 
                               class=\"btn btn-action w-100 text-muted like-button ";
        // line 728
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "session", [], "any", false, true, false, 728), "get", ["user_post_actions"], "method", false, true, false, 728), CoreExtension::getAttribute($this->env, $this->source, (isset($context["social_media"]) || array_key_exists("social_media", $context) ? $context["social_media"] : (function () { throw new RuntimeError('Variable "social_media" does not exist.', 728, $this->source); })()), "idEB", [], "any", false, false, false, 728), [], "array", true, true, false, 728) && (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 728, $this->source); })()), "session", [], "any", false, false, false, 728), "get", ["user_post_actions"], "method", false, false, false, 728), CoreExtension::getAttribute($this->env, $this->source, (isset($context["social_media"]) || array_key_exists("social_media", $context) ? $context["social_media"] : (function () { throw new RuntimeError('Variable "social_media" does not exist.', 728, $this->source); })()), "idEB", [], "any", false, false, false, 728), [], "array", false, false, false, 728) == "like"))) {
            yield "active";
        }
        yield "\"
                               ";
        // line 729
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "session", [], "any", false, true, false, 729), "get", ["user_post_actions"], "method", false, true, false, 729), CoreExtension::getAttribute($this->env, $this->source, (isset($context["social_media"]) || array_key_exists("social_media", $context) ? $context["social_media"] : (function () { throw new RuntimeError('Variable "social_media" does not exist.', 729, $this->source); })()), "idEB", [], "any", false, false, false, 729), [], "array", true, true, false, 729) && (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 729, $this->source); })()), "session", [], "any", false, false, false, 729), "get", ["user_post_actions"], "method", false, false, false, 729), CoreExtension::getAttribute($this->env, $this->source, (isset($context["social_media"]) || array_key_exists("social_media", $context) ? $context["social_media"] : (function () { throw new RuntimeError('Variable "social_media" does not exist.', 729, $this->source); })()), "idEB", [], "any", false, false, false, 729), [], "array", false, false, false, 729) == "like"))) {
            // line 730
            yield "                                  style=\"color: #4a6bda !important; background-color: rgba(74, 107, 218, 0.15) !important; font-weight: 500;\"
                               ";
        }
        // line 732
        yield "                        >
                                <i class=\"fas fa-thumbs-up me-1\" 
                                   ";
        // line 734
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "session", [], "any", false, true, false, 734), "get", ["user_post_actions"], "method", false, true, false, 734), CoreExtension::getAttribute($this->env, $this->source, (isset($context["social_media"]) || array_key_exists("social_media", $context) ? $context["social_media"] : (function () { throw new RuntimeError('Variable "social_media" does not exist.', 734, $this->source); })()), "idEB", [], "any", false, false, false, 734), [], "array", true, true, false, 734) && (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 734, $this->source); })()), "session", [], "any", false, false, false, 734), "get", ["user_post_actions"], "method", false, false, false, 734), CoreExtension::getAttribute($this->env, $this->source, (isset($context["social_media"]) || array_key_exists("social_media", $context) ? $context["social_media"] : (function () { throw new RuntimeError('Variable "social_media" does not exist.', 734, $this->source); })()), "idEB", [], "any", false, false, false, 734), [], "array", false, false, false, 734) == "like"))) {
            // line 735
            yield "                                       style=\"transform: scale(1.15);\"
                                   ";
        }
        // line 737
        yield "                                ></i> <span class=\"action-text\">J'aime</span>
                        </button>
                    </form>

                    ";
        // line 742
        yield "                        <form action=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_social_media_dislike", ["idEB" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["social_media"]) || array_key_exists("social_media", $context) ? $context["social_media"] : (function () { throw new RuntimeError('Variable "social_media" does not exist.', 742, $this->source); })()), "idEB", [], "any", false, false, false, 742)]), "html", null, true);
        yield "\" method=\"POST\" class=\"d-inline m-0 flex-grow-1 px-1 dislike-form\">
                        <input type=\"hidden\" name=\"_token\" value=\"";
        // line 743
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("dislike-post"), "html", null, true);
        yield "\">
                        <button type=\"submit\" 
                                class=\"btn btn-action w-100 text-muted dislike-button ";
        // line 745
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "session", [], "any", false, true, false, 745), "get", ["user_post_actions"], "method", false, true, false, 745), CoreExtension::getAttribute($this->env, $this->source, (isset($context["social_media"]) || array_key_exists("social_media", $context) ? $context["social_media"] : (function () { throw new RuntimeError('Variable "social_media" does not exist.', 745, $this->source); })()), "idEB", [], "any", false, false, false, 745), [], "array", true, true, false, 745) && (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 745, $this->source); })()), "session", [], "any", false, false, false, 745), "get", ["user_post_actions"], "method", false, false, false, 745), CoreExtension::getAttribute($this->env, $this->source, (isset($context["social_media"]) || array_key_exists("social_media", $context) ? $context["social_media"] : (function () { throw new RuntimeError('Variable "social_media" does not exist.', 745, $this->source); })()), "idEB", [], "any", false, false, false, 745), [], "array", false, false, false, 745) == "dislike"))) {
            yield "active";
        }
        yield "\"
                                ";
        // line 746
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "session", [], "any", false, true, false, 746), "get", ["user_post_actions"], "method", false, true, false, 746), CoreExtension::getAttribute($this->env, $this->source, (isset($context["social_media"]) || array_key_exists("social_media", $context) ? $context["social_media"] : (function () { throw new RuntimeError('Variable "social_media" does not exist.', 746, $this->source); })()), "idEB", [], "any", false, false, false, 746), [], "array", true, true, false, 746) && (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 746, $this->source); })()), "session", [], "any", false, false, false, 746), "get", ["user_post_actions"], "method", false, false, false, 746), CoreExtension::getAttribute($this->env, $this->source, (isset($context["social_media"]) || array_key_exists("social_media", $context) ? $context["social_media"] : (function () { throw new RuntimeError('Variable "social_media" does not exist.', 746, $this->source); })()), "idEB", [], "any", false, false, false, 746), [], "array", false, false, false, 746) == "dislike"))) {
            // line 747
            yield "                                   style=\"color: #dc3545 !important; background-color: rgba(220, 53, 69, 0.15) !important; font-weight: 500;\"
                                ";
        }
        // line 749
        yield "                        >
                                <i class=\"fas fa-thumbs-down me-1\"
                                   ";
        // line 751
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "session", [], "any", false, true, false, 751), "get", ["user_post_actions"], "method", false, true, false, 751), CoreExtension::getAttribute($this->env, $this->source, (isset($context["social_media"]) || array_key_exists("social_media", $context) ? $context["social_media"] : (function () { throw new RuntimeError('Variable "social_media" does not exist.', 751, $this->source); })()), "idEB", [], "any", false, false, false, 751), [], "array", true, true, false, 751) && (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 751, $this->source); })()), "session", [], "any", false, false, false, 751), "get", ["user_post_actions"], "method", false, false, false, 751), CoreExtension::getAttribute($this->env, $this->source, (isset($context["social_media"]) || array_key_exists("social_media", $context) ? $context["social_media"] : (function () { throw new RuntimeError('Variable "social_media" does not exist.', 751, $this->source); })()), "idEB", [], "any", false, false, false, 751), [], "array", false, false, false, 751) == "dislike"))) {
            // line 752
            yield "                                       style=\"transform: scale(1.15);\"
                                   ";
        }
        // line 754
        yield "                                ></i> <span class=\"action-text\">Je n'aime pas</span>
                        </button>
                    </form>

    ";
        // line 759
        yield "                        <a href=\"#comments-area\" class=\"btn btn-action flex-grow-1 text-muted mx-1\">
                        <i class=\"bi bi-chat-dots me-1\"></i> <span class=\"action-text\">Commenter</span>
    </a>

                    ";
        // line 764
        yield "    ";
        if (((isset($context["post_author"]) || array_key_exists("post_author", $context) ? $context["post_author"] : (function () { throw new RuntimeError('Variable "post_author" does not exist.', 764, $this->source); })()) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["post_author"]) || array_key_exists("post_author", $context) ? $context["post_author"] : (function () { throw new RuntimeError('Variable "post_author" does not exist.', 764, $this->source); })()), "getIdU", [], "method", false, false, false, 764) == (isset($context["default_user_id"]) || array_key_exists("default_user_id", $context) ? $context["default_user_id"] : (function () { throw new RuntimeError('Variable "default_user_id" does not exist.', 764, $this->source); })())))) {
            // line 765
            yield "                            <div class=\"d-flex flex-grow-1\">
                        ";
            // line 767
            yield "                                <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_social_media_edit", ["idEB" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["social_media"]) || array_key_exists("social_media", $context) ? $context["social_media"] : (function () { throw new RuntimeError('Variable "social_media" does not exist.', 767, $this->source); })()), "idEB", [], "any", false, false, false, 767)]), "html", null, true);
            yield "\" class=\"btn btn-action flex-grow-1 text-muted mx-1\">
                            <i class=\"bi bi-pencil-square me-1\"></i> <span class=\"action-text\">Éditer</span>
                        </a>

                        ";
            // line 772
            yield "                                <form action=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_social_media_delete", ["idEB" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["social_media"]) || array_key_exists("social_media", $context) ? $context["social_media"] : (function () { throw new RuntimeError('Variable "social_media" does not exist.', 772, $this->source); })()), "idEB", [], "any", false, false, false, 772)]), "html", null, true);
            yield "\" method=\"POST\" class=\"d-inline m-0 flex-grow-1 px-1\" onsubmit=\"return confirm('Êtes-vous sûr de vouloir supprimer cette publication ?');\">
            <input type=\"hidden\" name=\"_token\" value=\"";
            // line 773
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["social_media"]) || array_key_exists("social_media", $context) ? $context["social_media"] : (function () { throw new RuntimeError('Variable "social_media" does not exist.', 773, $this->source); })()), "idEB", [], "any", false, false, false, 773))), "html", null, true);
            yield "\">
            <button type=\"submit\" class=\"btn btn-action w-100 text-danger\">
                                <i class=\"bi bi-trash me-1\"></i> <span class=\"action-text\">Supprimer</span>
            </button>
        </form>
                            </div>
    ";
        }
        // line 780
        yield "                    </div>
</div>

                ";
        // line 784
        yield "                <div id=\"comments-area\" class=\"comments-section p-3\">
                    <h3 class=\"section-title fs-5\">Commentaires</h3>

                    ";
        // line 788
        yield "                    ";
        if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 788, $this->source); })()), "request", [], "any", false, false, false, 788), "query", [], "any", false, false, false, 788), "get", ["error"], "method", false, false, false, 788)) {
            // line 789
            yield "                        ";
            $context["error_type"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 789, $this->source); })()), "request", [], "any", false, false, false, 789), "query", [], "any", false, false, false, 789), "get", ["error"], "method", false, false, false, 789);
            // line 790
            yield "                        <div class=\"alert alert-danger mb-3\">
                            ";
            // line 791
            if (((isset($context["error_type"]) || array_key_exists("error_type", $context) ? $context["error_type"] : (function () { throw new RuntimeError('Variable "error_type" does not exist.', 791, $this->source); })()) == "empty_comment")) {
                // line 792
                yield "                                <strong>Erreur :</strong> Le commentaire ne peut pas être vide.
                            ";
            } elseif ((            // line 793
(isset($context["error_type"]) || array_key_exists("error_type", $context) ? $context["error_type"] : (function () { throw new RuntimeError('Variable "error_type" does not exist.', 793, $this->source); })()) == "validation_failed")) {
                // line 794
                yield "                                <strong>Erreur :</strong> ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 794, $this->source); })()), "request", [], "any", false, false, false, 794), "query", [], "any", false, false, false, 794), "get", ["message", "Erreur de validation du formulaire."], "method", false, false, false, 794), "html", null, true);
                yield "
                            ";
            } elseif ((            // line 795
(isset($context["error_type"]) || array_key_exists("error_type", $context) ? $context["error_type"] : (function () { throw new RuntimeError('Variable "error_type" does not exist.', 795, $this->source); })()) == "forbidden_words")) {
                // line 796
                yield "                                <strong>Erreur :</strong> Votre commentaire contient des mots interdits: ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 796, $this->source); })()), "request", [], "any", false, false, false, 796), "query", [], "any", false, false, false, 796), "get", ["words"], "method", false, false, false, 796), "html", null, true);
                yield "
                            ";
            } elseif ((            // line 797
(isset($context["error_type"]) || array_key_exists("error_type", $context) ? $context["error_type"] : (function () { throw new RuntimeError('Variable "error_type" does not exist.', 797, $this->source); })()) == "database_error")) {
                // line 798
                yield "                                <strong>Erreur :</strong> Une erreur s'est produite lors de l'enregistrement du commentaire.
                            ";
            } elseif ((            // line 799
(isset($context["error_type"]) || array_key_exists("error_type", $context) ? $context["error_type"] : (function () { throw new RuntimeError('Variable "error_type" does not exist.', 799, $this->source); })()) == "form_not_submitted")) {
                // line 800
                yield "                                <strong>Erreur :</strong> Le formulaire n'a pas été soumis correctement.
                            ";
            } else {
                // line 802
                yield "                                <strong>Erreur :</strong> Une erreur est survenue.
                            ";
            }
            // line 804
            yield "                        </div>
                    ";
        }
        // line 806
        yield "
                ";
        // line 808
        yield "                    <div class=\"add-comment-form-container d-flex align-items-start\">
                        ";
        // line 809
        $context["current_user"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 809, $this->source); })()), "user", [], "any", false, false, false, 809);
        // line 810
        yield "                        <div class=\"flex-shrink-0 me-2\">
                         <img src=\"";
        // line 811
        yield ((((isset($context["current_user"]) || array_key_exists("current_user", $context) ? $context["current_user"] : (function () { throw new RuntimeError('Variable "current_user" does not exist.', 811, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["current_user"]) || array_key_exists("current_user", $context) ? $context["current_user"] : (function () { throw new RuntimeError('Variable "current_user" does not exist.', 811, $this->source); })()), "getImagesU", [], "method", false, false, false, 811))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/profile_pictures/" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["current_user"]) || array_key_exists("current_user", $context) ? $context["current_user"] : (function () { throw new RuntimeError('Variable "current_user" does not exist.', 811, $this->source); })()), "getImagesU", [], "method", false, false, false, 811))), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/placeholder-avatar.png"), "html", null, true)));
        yield "\"
                              alt=\"Votre avatar\"
                                class=\"comment-author-img rounded-circle\" width=\"32\" height=\"32\">
                     </div>
                     <div class=\"flex-grow-1\">
                        ";
        // line 817
        yield "                        <form name=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["comment_form"]) || array_key_exists("comment_form", $context) ? $context["comment_form"] : (function () { throw new RuntimeError('Variable "comment_form" does not exist.', 817, $this->source); })()), "vars", [], "any", false, false, false, 817), "name", [], "any", false, false, false, 817), "html", null, true);
        yield "\" method=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["comment_form"]) || array_key_exists("comment_form", $context) ? $context["comment_form"] : (function () { throw new RuntimeError('Variable "comment_form" does not exist.', 817, $this->source); })()), "vars", [], "any", false, false, false, 817), "method", [], "any", false, false, false, 817), "html", null, true);
        yield "\" action=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["comment_form"]) || array_key_exists("comment_form", $context) ? $context["comment_form"] : (function () { throw new RuntimeError('Variable "comment_form" does not exist.', 817, $this->source); })()), "vars", [], "any", false, false, false, 817), "action", [], "any", false, false, false, 817), "html", null, true);
        yield "\" class=\"add-comment-form\" id=\"comment-form\" novalidate>
                            <div class=\"position-relative\">
                                ";
        // line 819
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["comment_form"]) || array_key_exists("comment_form", $context) ? $context["comment_form"] : (function () { throw new RuntimeError('Variable "comment_form" does not exist.', 819, $this->source); })()), "description", [], "any", false, false, false, 819), 'widget', ["attr" => ["rows" => 2, "placeholder" => "Écrivez un commentaire...", "class" => "form-control comment-input py-2 px-3", "id" => "comment-input", "required" => "required", "minlength" => "5"]]);
        yield "
                                ";
        // line 820
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["comment_form"]) || array_key_exists("comment_form", $context) ? $context["comment_form"] : (function () { throw new RuntimeError('Variable "comment_form" does not exist.', 820, $this->source); })()), "description", [], "any", false, false, false, 820), 'errors');
        yield "
                                <div id=\"empty-comment-error\" class=\"alert alert-danger mt-2\" style=\"display: none;\">Le commentaire ne peut pas être vide.</div>
                                <button type=\"submit\" class=\"btn btn-primary btn-send-comment\" id=\"submit-comment\" aria-label=\"Publier le commentaire\">
                                    <i class=\"fas fa-paper-plane\"></i>
                                </button>
                            </div>
                            ";
        // line 826
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["comment_form"]) || array_key_exists("comment_form", $context) ? $context["comment_form"] : (function () { throw new RuntimeError('Variable "comment_form" does not exist.', 826, $this->source); })()), 'rest');
        yield "
                            <input type=\"hidden\" name=\"_token\" value=\"";
        // line 827
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("comment_token"), "html", null, true);
        yield "\">
                            <div class=\"d-none\">
                                <p>DEBUG - Nom du formulaire: ";
        // line 829
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["comment_form"]) || array_key_exists("comment_form", $context) ? $context["comment_form"] : (function () { throw new RuntimeError('Variable "comment_form" does not exist.', 829, $this->source); })()), "vars", [], "any", false, false, false, 829), "name", [], "any", false, false, false, 829), "html", null, true);
        yield "</p>
                                <p>DEBUG - Nom du champ description: ";
        // line 830
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["comment_form"]) || array_key_exists("comment_form", $context) ? $context["comment_form"] : (function () { throw new RuntimeError('Variable "comment_form" does not exist.', 830, $this->source); })()), "description", [], "any", false, false, false, 830), "vars", [], "any", false, false, false, 830), "full_name", [], "any", false, false, false, 830), "html", null, true);
        yield "</p>
                            </div>
                        </form>
                     </div>
                </div>

                    ";
        // line 837
        yield "                    <hr class=\"my-2 text-muted\">

                ";
        // line 840
        yield "                    <div id=\"comments-list\" class=\"comments-container\">
    ";
        // line 841
        if ((array_key_exists("comments", $context) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["comments"]) || array_key_exists("comments", $context) ? $context["comments"] : (function () { throw new RuntimeError('Variable "comments" does not exist.', 841, $this->source); })())) > 0))) {
            // line 842
            yield "        ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["comments"]) || array_key_exists("comments", $context) ? $context["comments"] : (function () { throw new RuntimeError('Variable "comments" does not exist.', 842, $this->source); })()));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["commentaire"]) {
                // line 843
                yield "            ";
                $context["comment_author"] = CoreExtension::getAttribute($this->env, $this->source, $context["commentaire"], "getUser", [], "method", false, false, false, 843);
                // line 844
                yield "                                ";
                $context["animation_order"] = CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 844);
                // line 845
                yield "                                <div class=\"comment-entry d-flex align-items-start\" id=\"comment-";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["commentaire"], "idC", [], "any", false, false, false, 845), "html", null, true);
                yield "\" style=\"--animation-order: ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["animation_order"]) || array_key_exists("animation_order", $context) ? $context["animation_order"] : (function () { throw new RuntimeError('Variable "animation_order" does not exist.', 845, $this->source); })()), "html", null, true);
                yield "\">
                 ";
                // line 847
                yield "                                    <div class=\"flex-shrink-0 me-2\">
                    <img src=\"";
                // line 848
                yield ((((isset($context["comment_author"]) || array_key_exists("comment_author", $context) ? $context["comment_author"] : (function () { throw new RuntimeError('Variable "comment_author" does not exist.', 848, $this->source); })()) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["comment_author"]) || array_key_exists("comment_author", $context) ? $context["comment_author"] : (function () { throw new RuntimeError('Variable "comment_author" does not exist.', 848, $this->source); })()), "getImagesU", [], "method", false, false, false, 848))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/profile_pictures/" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["comment_author"]) || array_key_exists("comment_author", $context) ? $context["comment_author"] : (function () { throw new RuntimeError('Variable "comment_author" does not exist.', 848, $this->source); })()), "getImagesU", [], "method", false, false, false, 848))), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/placeholder-avatar.png"), "html", null, true)));
                yield "\"
                         alt=\"";
                // line 849
                yield (((isset($context["comment_author"]) || array_key_exists("comment_author", $context) ? $context["comment_author"] : (function () { throw new RuntimeError('Variable "comment_author" does not exist.', 849, $this->source); })())) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["comment_author"]) || array_key_exists("comment_author", $context) ? $context["comment_author"] : (function () { throw new RuntimeError('Variable "comment_author" does not exist.', 849, $this->source); })()), "getPrenom", [], "method", false, false, false, 849), "html", null, true)) : ("Avatar"));
                yield "\"
                                            class=\"comment-author-img rounded-circle\" width=\"28\" height=\"28\">
                </div>
                 ";
                // line 853
                yield "                <div class=\"flex-grow-1\">
                                        <div class=\"comment-bubble\">
                        <strong class=\"comment-author-name d-block mb-1\">
                            ";
                // line 856
                if ((isset($context["comment_author"]) || array_key_exists("comment_author", $context) ? $context["comment_author"] : (function () { throw new RuntimeError('Variable "comment_author" does not exist.', 856, $this->source); })())) {
                    // line 857
                    yield "                                ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["comment_author"]) || array_key_exists("comment_author", $context) ? $context["comment_author"] : (function () { throw new RuntimeError('Variable "comment_author" does not exist.', 857, $this->source); })()), "getPrenom", [], "method", false, false, false, 857), "html", null, true);
                    yield " ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["comment_author"]) || array_key_exists("comment_author", $context) ? $context["comment_author"] : (function () { throw new RuntimeError('Variable "comment_author" does not exist.', 857, $this->source); })()), "getName", [], "method", false, false, false, 857), "html", null, true);
                    yield "
                            ";
                } else {
                    // line 859
                    yield "                                Utilisateur inconnu
                            ";
                }
                // line 861
                yield "                        </strong>
                        <p class=\"comment-text mb-0\">";
                // line 862
                yield Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["commentaire"], "getDescription", [], "method", false, false, false, 862), "html", null, true));
                yield "</p>
                    </div>
                                        ";
                // line 865
                yield "                                        <div class=\"comment-meta mt-1 ps-2 d-flex align-items-center flex-wrap\">
                        ";
                // line 867
                yield "                                            <small class=\"text-muted me-3\">
                                                <i class=\"fas fa-clock me-1\"></i>
                                                Il y a quelques instants
                        </small>

                                            ";
                // line 873
                yield "                                            <a href=\"#\" 
                                               class=\"comment-action-link small me-3 comment-like-btn ";
                // line 874
                if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "session", [], "any", false, true, false, 874), "get", ["user_comment_actions"], "method", false, true, false, 874), CoreExtension::getAttribute($this->env, $this->source, $context["commentaire"], "idC", [], "any", false, false, false, 874), [], "array", true, true, false, 874) && (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 874, $this->source); })()), "session", [], "any", false, false, false, 874), "get", ["user_comment_actions"], "method", false, false, false, 874), CoreExtension::getAttribute($this->env, $this->source, $context["commentaire"], "idC", [], "any", false, false, false, 874), [], "array", false, false, false, 874) == "like"))) {
                    yield "active text-primary";
                }
                yield "\"
                                               onclick=\"event.preventDefault(); document.getElementById('like-comment-form-";
                // line 875
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["commentaire"], "idC", [], "any", false, false, false, 875), "html", null, true);
                yield "').submit();\"
                                               data-comment-id=\"";
                // line 876
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["commentaire"], "idC", [], "any", false, false, false, 876), "html", null, true);
                yield "\">
                                                <i class=\"";
                // line 877
                if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "session", [], "any", false, true, false, 877), "get", ["user_comment_actions"], "method", false, true, false, 877), CoreExtension::getAttribute($this->env, $this->source, $context["commentaire"], "idC", [], "any", false, false, false, 877), [], "array", true, true, false, 877) && (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 877, $this->source); })()), "session", [], "any", false, false, false, 877), "get", ["user_comment_actions"], "method", false, false, false, 877), CoreExtension::getAttribute($this->env, $this->source, $context["commentaire"], "idC", [], "any", false, false, false, 877), [], "array", false, false, false, 877) == "like"))) {
                    yield "fas fa-heart";
                } else {
                    yield "far fa-heart";
                }
                yield "\"></i> 
                                                <span class=\"like-label\">J'aime</span>
                                                ";
                // line 879
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["commentaire"], "numberlike", [], "any", false, false, false, 879) > 0)) {
                    // line 880
                    yield "                                                    <span class=\"comment-like-count\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["commentaire"], "numberlike", [], "any", false, false, false, 880), "html", null, true);
                    yield "</span>
                                                ";
                }
                // line 882
                yield "                                            </a>
                                            <form id=\"like-comment-form-";
                // line 883
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["commentaire"], "idC", [], "any", false, false, false, 883), "html", null, true);
                yield "\" action=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_commentaire_like", ["idC" => CoreExtension::getAttribute($this->env, $this->source, $context["commentaire"], "idC", [], "any", false, false, false, 883)]), "html", null, true);
                yield "\" method=\"POST\" class=\"d-none\">
                                                <input type=\"hidden\" name=\"_token\" value=\"";
                // line 884
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("like_commentaire" . CoreExtension::getAttribute($this->env, $this->source, $context["commentaire"], "idC", [], "any", false, false, false, 884))), "html", null, true);
                yield "\">
                                            </form>
                                            
                                            ";
                // line 887
                if (((isset($context["comment_author"]) || array_key_exists("comment_author", $context) ? $context["comment_author"] : (function () { throw new RuntimeError('Variable "comment_author" does not exist.', 887, $this->source); })()) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["comment_author"]) || array_key_exists("comment_author", $context) ? $context["comment_author"] : (function () { throw new RuntimeError('Variable "comment_author" does not exist.', 887, $this->source); })()), "getIdU", [], "method", false, false, false, 887) == (isset($context["default_user_id"]) || array_key_exists("default_user_id", $context) ? $context["default_user_id"] : (function () { throw new RuntimeError('Variable "default_user_id" does not exist.', 887, $this->source); })())))) {
                    // line 888
                    yield "                                                <a href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_commentaire_edit", ["idC" => CoreExtension::getAttribute($this->env, $this->source, $context["commentaire"], "idC", [], "any", false, false, false, 888)]), "html", null, true);
                    yield "\" class=\"comment-action-link small me-3\">
                                                    <i class=\"fas fa-pencil-alt\"></i> Modifier
                                                </a>

                                                <a href=\"#\" 
                                                   class=\"comment-action-link small text-danger\"
                                                   onclick=\"event.preventDefault(); if(confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?')) { document.getElementById('delete-form-";
                    // line 894
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["commentaire"], "idC", [], "any", false, false, false, 894), "html", null, true);
                    yield "').submit(); }\">
                                                    <i class=\"fas fa-trash-alt\"></i> Supprimer
                                                </a>
                                                <form id=\"delete-form-";
                    // line 897
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["commentaire"], "idC", [], "any", false, false, false, 897), "html", null, true);
                    yield "\" action=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_commentaire_delete", ["idC" => CoreExtension::getAttribute($this->env, $this->source, $context["commentaire"], "idC", [], "any", false, false, false, 897)]), "html", null, true);
                    yield "\" method=\"POST\" class=\"d-none\">
                                                    <input type=\"hidden\" name=\"_token\" value=\"";
                    // line 898
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["commentaire"], "idC", [], "any", false, false, false, 898))), "html", null, true);
                    yield "\">
                                                </form>
                                            ";
                }
                // line 901
                yield "                                        </div>
                                    </div>
                                </div>
        ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['commentaire'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 905
            yield "    ";
        } else {
            // line 906
            yield "                            <div class=\"text-center text-muted py-2\">
                                <i class=\"bi bi-chat-left-dots fs-4 mb-2 d-block opacity-50\"></i>
                                <p class=\"mb-0\">Soyez le premier à commenter cette publication.</p>
                            </div>
                        ";
        }
        // line 911
        yield "                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

";
        // line 919
        yield "<div class=\"container mt-4\">
    <div class=\"row\">
        <div class=\"col-12 text-center text-muted small\">
            <a href=\"https://www.flaticon.com/fr/icones-gratuites/pouces-vers-le-haut\" title=\"pouces vers le haut icônes\" class=\"text-decoration-none text-muted\">Pouces vers le haut icônes créées par Freepik - Flaticon</a> • 
            <a href=\"https://www.flaticon.com/fr/icones-gratuites/ne-pas-aimer\" title=\"ne pas aimer icônes\" class=\"text-decoration-none text-muted\">Ne pas aimer icônes créées par Md Tanvirul Haque - Flaticon</a>
        </div>
    </div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 929
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

        // line 930
        yield "    ";
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Force style des boutons actifs (like/dislike)
            function applyActiveStyles() {
                // Gestion du bouton like
                const likeButton = document.querySelector('.like-button');
                if (likeButton && likeButton.classList.contains('active')) {
                    likeButton.style.color = '#4a6bda';
                    likeButton.style.backgroundColor = 'rgba(74, 107, 218, 0.15)';
                    likeButton.style.fontWeight = '500';
                    const icon = likeButton.querySelector('i');
                    if (icon) icon.style.transform = 'scale(1.15)';
                }
                
                // Gestion du bouton dislike
                const dislikeButton = document.querySelector('.dislike-button');
                if (dislikeButton && dislikeButton.classList.contains('active')) {
                    dislikeButton.style.color = '#dc3545';
                    dislikeButton.style.backgroundColor = 'rgba(220, 53, 69, 0.15)';
                    dislikeButton.style.fontWeight = '500';
                    const icon = dislikeButton.querySelector('i');
                    if (icon) icon.style.transform = 'scale(1.15)';
                }
            }
            
            // Appliquer les styles immédiatement
            applyActiveStyles();
            
            // Appliquer les styles à nouveau après un court délai (pour être sûr que le DOM est entièrement chargé)
            setTimeout(applyActiveStyles, 100);
            
            // -------------------- GESTION DES LIKES/DISLIKES --------------------
            const likeButton = document.querySelector('.like-button');
            const dislikeButton = document.querySelector('.dislike-button');
            
            // Mettre en évidence les boutons actifs
            if (likeButton && likeButton.classList.contains('active')) {
                likeButton.style.backgroundColor = 'rgba(74, 107, 218, 0.15)';
                likeButton.style.color = '#4a6bda';
                const icon = likeButton.querySelector('i');
                if (icon) icon.style.transform = 'scale(1.15)';
            }
            
            if (dislikeButton && dislikeButton.classList.contains('active')) {
                dislikeButton.style.backgroundColor = 'rgba(220, 53, 69, 0.15)';
                dislikeButton.style.color = '#dc3545';
                const icon = dislikeButton.querySelector('i');
                if (icon) icon.style.transform = 'scale(1.15)';
            }
            
            // Effets au survol
            if (likeButton) {
                likeButton.addEventListener('mouseenter', function() {
                    if (!this.classList.contains('active')) {
                        this.style.color = '#4a6bda';
                        this.style.backgroundColor = 'rgba(74, 107, 218, 0.05)';
                    }
                });
                
                likeButton.addEventListener('mouseleave', function() {
                    if (!this.classList.contains('active')) {
                        this.style.color = '';
                        this.style.backgroundColor = '';
                    }
                });
            }
            
            if (dislikeButton) {
                dislikeButton.addEventListener('mouseenter', function() {
                    if (!this.classList.contains('active')) {
                        this.style.color = '#dc3545';
                        this.style.backgroundColor = 'rgba(220, 53, 69, 0.05)';
                    }
                });
                
                dislikeButton.addEventListener('mouseleave', function() {
                    if (!this.classList.contains('active')) {
                        this.style.color = '';
                        this.style.backgroundColor = '';
                    }
                });
            }
            
            // -------------------- VALIDATION DES COMMENTAIRES --------------------
            const commentForm = document.getElementById('comment-form');
            const commentInput = document.getElementById('comment-input');
            const errorMessage = document.getElementById('empty-comment-error');
            
            if (commentForm && commentInput && errorMessage) {
                // Fonction de validation
                function validateComment() {
                    const content = commentInput.value.trim();
                    
                    if (!content) {
                        commentInput.classList.add('is-invalid');
                        errorMessage.textContent = 'Le commentaire ne peut pas être vide.';
                        errorMessage.style.display = 'block';
                        return false;
                    } else if (content.length < 5) {
                        commentInput.classList.add('is-invalid');
                        errorMessage.textContent = 'Le commentaire doit contenir au moins 5 caractères.';
                        errorMessage.style.display = 'block';
                        return false;
                    } else {
                        commentInput.classList.remove('is-invalid');
                        errorMessage.style.display = 'none';
                        return true;
                    }
                }
                
                // Validation en temps réel
                commentInput.addEventListener('input', validateComment);
                
                // Validation à la soumission
                commentForm.addEventListener('submit', function(e) {
                    if (!validateComment()) {
                        e.preventDefault();
                        return false;
                    }
                    return true;
                });
            }
            
            // -------------------- ANIMATIONS --------------------
            // Animation image de publication
            const postImage = document.querySelector('.post-image-container img');
            if (postImage) {
                postImage.style.opacity = '0';
                setTimeout(() => {
                    postImage.style.opacity = '1';
                }, 300);
            }
            
            // Animation bouton retour
            const backButton = document.querySelector('.btn-back');
            if (backButton) {
                backButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    const href = this.getAttribute('href');
                    
                    document.querySelector('.post-card').style.opacity = '0';
                    
                    setTimeout(() => {
                        window.location.href = href;
                    }, 300);
                });
            }
            
            // Animation des boutons like des commentaires
            const commentLikeButtons = document.querySelectorAll('.comment-like-btn');
            commentLikeButtons.forEach(button => {
                if (button.classList.contains('active')) {
                    button.style.backgroundColor = 'rgba(74, 107, 218, 0.1)';
                }
                
                button.addEventListener('mouseenter', function() {
                    this.style.backgroundColor = 'rgba(74, 107, 218, 0.1)';
                });
                
                button.addEventListener('mouseleave', function() {
                    if (!this.classList.contains('active')) {
                        this.style.backgroundColor = '';
                    }
                });
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
        return "social_media/show.html.twig";
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
        return array (  1382 => 930,  1369 => 929,  1350 => 919,  1341 => 911,  1334 => 906,  1331 => 905,  1314 => 901,  1308 => 898,  1302 => 897,  1296 => 894,  1286 => 888,  1284 => 887,  1278 => 884,  1272 => 883,  1269 => 882,  1263 => 880,  1261 => 879,  1252 => 877,  1248 => 876,  1244 => 875,  1238 => 874,  1235 => 873,  1228 => 867,  1225 => 865,  1220 => 862,  1217 => 861,  1213 => 859,  1205 => 857,  1203 => 856,  1198 => 853,  1192 => 849,  1188 => 848,  1185 => 847,  1178 => 845,  1175 => 844,  1172 => 843,  1154 => 842,  1152 => 841,  1149 => 840,  1145 => 837,  1136 => 830,  1132 => 829,  1127 => 827,  1123 => 826,  1114 => 820,  1110 => 819,  1100 => 817,  1092 => 811,  1089 => 810,  1087 => 809,  1084 => 808,  1081 => 806,  1077 => 804,  1073 => 802,  1069 => 800,  1067 => 799,  1064 => 798,  1062 => 797,  1057 => 796,  1055 => 795,  1050 => 794,  1048 => 793,  1045 => 792,  1043 => 791,  1040 => 790,  1037 => 789,  1034 => 788,  1029 => 784,  1024 => 780,  1014 => 773,  1009 => 772,  1001 => 767,  998 => 765,  995 => 764,  989 => 759,  983 => 754,  979 => 752,  977 => 751,  973 => 749,  969 => 747,  967 => 746,  961 => 745,  956 => 743,  951 => 742,  945 => 737,  941 => 735,  939 => 734,  935 => 732,  931 => 730,  929 => 729,  923 => 728,  918 => 726,  913 => 725,  909 => 722,  903 => 717,  897 => 716,  886 => 708,  879 => 704,  873 => 700,  867 => 696,  864 => 695,  861 => 693,  855 => 690,  851 => 689,  847 => 688,  844 => 687,  841 => 686,  834 => 681,  827 => 677,  824 => 676,  816 => 670,  812 => 668,  808 => 666,  800 => 664,  798 => 663,  790 => 658,  786 => 657,  783 => 656,  781 => 655,  778 => 654,  775 => 652,  768 => 647,  762 => 643,  749 => 642,  108 => 10,  103 => 9,  90 => 8,  66 => 6,  43 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# Fichier : templates/social_media/show.html.twig #}
{% extends 'dashVoyageurs/dashboardVoyageurs.html.twig' %}


{# Définit le titre de la page #}
{% block title %}{{ social_media.getTitre() }} - Détails{% endblock %}

{% block css %}
    {{ parent() }}
    <link rel=\"stylesheet\" href=\"{{ asset('css/feed.css') }}\">
    <style>
        :root {
            --main-accent: #4a6bda;
            --main-accent-hover: #3d58b3;
            --danger-color: #dc3545;
            --danger-color-darker: #bb2d3b;
            --light-bg: #f8f9fa;
            --card-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
            --card-radius: 12px;
            --transition-speed: 0.25s;
        }
        
        body {
            background-color: #f5f7fa;
            color: #444;
        }
        
        /* Custom animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(74, 107, 218, 0.4); }
            70% { box-shadow: 0 0 0 6px rgba(74, 107, 218, 0); }
            100% { box-shadow: 0 0 0 0 rgba(74, 107, 218, 0); }
        }
        
        .pulsate {
            animation: pulse 1.5s infinite;
        }
        
        .post-card {
            box-shadow: var(--card-shadow);
            border-radius: var(--card-radius);
            transition: all var(--transition-speed) ease;
            animation: fadeIn 0.5s ease forwards;
            max-width: 650px;
            margin: 0 auto;
        }
        
        .post-card:hover {
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            transform: translateY(-3px);
        }
        
        .post-image-container {
            max-height: 250px;
            overflow: hidden;
            position: relative;
            border-radius: 10px;
            margin: 0.5rem auto 1.25rem;
            max-width: 75%;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            padding: 0.25rem;
            background-color: #f9f9f9;
        }
        
        .post-image-container img {
            transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
            object-fit: cover;
            width: 100%;
            max-height: 250px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }
        
        .post-image-container:hover img {
            transform: scale(1.05);
        }
        
        /* Effet de brillance au survol */
        .post-image-container::before {
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
        
        .post-image-container:hover::before {
            left: 150%;
        }
        
        .post-actions {
            padding: 0.75rem 1rem;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            background-color: #fbfbfd;
        }
        
        .btn-action {
            border-radius: 30px;
            transition: all var(--transition-speed) ease;
            padding: 0.5rem 0.5rem;
            font-weight: 500;
            font-size: 0.9rem;
            border: none;
            text-align: center;
            white-space: nowrap;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 2px;
        }
        
        .btn-action:hover {
            background-color: rgba(0, 0, 0, 0.05);
            transform: translateY(-1px);
        }
        
        .like-button:hover, .like-button.active {
            color: var(--main-accent) !important;
            background-color: rgba(74, 107, 218, 0.1);
        }
        
        /* Style pour l'icône Flaticon du bouton like */
        .like-button img, .like-count-badge img, 
        .dislike-button img, .dislike-count-badge img {
            transition: all 0.3s ease;
            filter: brightness(1);
        }
        
        .like-button:hover img, .like-button.active img {
            transform: scale(1.15);
            filter: drop-shadow(0px 0px 3px rgba(74, 107, 218, 0.5));
        }
        
        .dislike-button:hover, .dislike-button.active {
            color: var(--danger-color) !important;
            background-color: rgba(220, 53, 69, 0.1);
        }
        
        .like-count-badge img {
            filter: brightness(10); /* Rend l'icône blanche pour le badge */
        }
        
        .dislike-count-badge img {
            filter: brightness(10); /* Rend l'icône blanche pour le badge */
        }
        
        .post-author-img, .comment-author-img {
            border: 2px solid #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08);
            object-fit: cover;
        }
        
        .comment-bubble {
            background-color: var(--light-bg);
            border-radius: 16px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.03);
            padding: 0.6rem 0.9rem;
        }
        
        .comment-entry {
            animation: fadeIn 0.4s ease forwards;
            animation-delay: calc(0.08s * var(--animation-order, 0));
            margin-bottom: 1rem;
        }
        
        .comments-section {
            border-radius: 0 0 var(--card-radius) var(--card-radius);
            max-width: 650px;
            margin: 0 auto;
            position: relative;
            border-top: 1px solid rgba(0, 0, 0, 0.08);
            background-color: #f9f9fb;
        }
        
        .post-stats {
            color: #6c757d;
            font-weight: 500;
            font-size: 0.85rem;
            padding: 0.6rem 1.25rem;
            background-color: #fbfbfd;
            border-top: 1px solid rgba(0, 0, 0, 0.03);
            border-bottom: 1px solid rgba(0, 0, 0, 0.03);
            transition: background-color 0.5s ease;
        }
        
        .post-stats.highlight {
            background-color: rgba(74, 107, 218, 0.08);
        }
        
        .post-stats i {
            margin-right: 3px;
            color: var(--main-accent);
        }
        
        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 1.5rem;
            font-weight: 600;
            color: #333;
            font-size: 1.5rem;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 40px;
            height: 3px;
            background: linear-gradient(90deg, var(--main-accent), #71a6ff);
            border-radius: 3px;
        }
        
        .btn-send-comment {
            border-radius: 50%;
            position: absolute;
            right: 10px;
            bottom: 10px;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            background: linear-gradient(45deg, #5e72e4, #3f51b5);
            border: none;
            box-shadow: 0 3px 8px rgba(94, 114, 228, 0.4);
            transition: all 0.3s ease;
        }
        
        .btn-send-comment:hover, 
        .btn-send-comment:focus {
            background: linear-gradient(45deg, #4a6bda, #3949ab);
            transform: translateY(-2px) rotate(15deg);
            box-shadow: 0 5px 12px rgba(94, 114, 228, 0.5);
        }
        
        .btn-send-comment i {
            font-size: 1rem;
            color: white;
            transition: all 0.3s ease;
        }
        
        .btn-send-comment:hover i {
            transform: scale(1.1);
        }
        
        .comment-action-link {
            color: #6c757d;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.8rem;
            transition: all var(--transition-speed) ease;
        }
        
        .comment-action-link:hover {
            color: var(--main-accent);
        }
        
        .post-header {
            padding: 0.75rem 1.25rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.03);
        }
        
        .post-title {
            font-weight: 700;
            color: #333;
            font-size: 1.3rem;
            line-height: 1.3;
            margin-bottom: 0.75rem;
        }
        
        .post-content {
            padding: 1rem 1.25rem;
            line-height: 1.5;
            color: #444;
            font-size: 0.95rem;
        }
        
        .post-text {
            overflow-wrap: break-word;
            word-wrap: break-word;
        }
        
        .add-comment-form-container {
            margin-bottom: 2rem;
        }
        
        .comment-input {
            border-radius: 20px;
            padding-right: 40px;
            resize: none;
            border: 1px solid #e0e4e8;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
            transition: all var(--transition-speed) ease;
        }
        
        .comment-input:focus {
            border-color: #bdc9e7;
            box-shadow: 0 0 0 3px rgba(74, 107, 218, 0.1);
        }
        
        .comment-author-name {
            color: #444;
            font-size: 0.95rem;
        }
        
        .comment-text {
            font-size: 0.9rem;
            line-height: 1.4;
            color: #555;
        }
        
        .post-actions {
            padding: 0.4rem;
        }
        
        .action-text {
            font-size: 0.9rem;
        }
        
        /* Responsive adjustments */
        @media (max-width: 767px) {
            .post-card, .comments-section {
                border-radius: var(--card-radius);
                margin-left: -0.5rem;
                margin-right: -0.5rem;
                width: calc(100% + 1rem);
            }
            
            .post-header, .post-content {
                padding: 1rem;
            }
            
            .post-stats {
                padding: 0.7rem 1rem;
            }
            
            .post-title {
                font-size: 1.3rem;
            }
        }
        
        .comments-container {
            max-height: 350px;
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: rgba(74, 107, 218, 0.2) #f5f7fa;
            padding: 0.5rem 0;
        }
        
        .comments-container::-webkit-scrollbar {
            width: 6px;
        }
        
        .comments-container::-webkit-scrollbar-track {
            background: #f5f7fa;
        }
        
        .comments-container::-webkit-scrollbar-thumb {
            background-color: rgba(74, 107, 218, 0.2);
            border-radius: 10px;
        }
        
        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 1rem;
            font-weight: 600;
            color: #333;
            font-size: 1.2rem;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            bottom: -6px;
            left: 0;
            width: 30px;
            height: 3px;
            background: linear-gradient(90deg, var(--main-accent), #71a6ff);
            border-radius: 3px;
        }
        
        .add-comment-form-container {
            margin-bottom: 1rem;
        }
        
        .comment-input {
            border-radius: 18px;
            padding-right: 40px;
            resize: none;
            border: 1px solid #e0e4e8;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
            transition: all var(--transition-speed) ease;
            font-size: 0.9rem;
        }
        
        .comments-section {
            border-radius: var(--card-radius);
            max-width: 650px;
            margin: 0 auto;
            box-shadow: var(--card-shadow);
            position: relative;
        }
        
        /* Style pour mettre en évidence la section des commentaires */
        .comments-indicator {
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            background-color: var(--main-accent);
            color: white;
            border-radius: 16px;
            padding: 3px 10px;
            font-size: 0.8rem;
            font-weight: 500;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            z-index: 3;
        }
        
        .dislike-count-badge img {
            filter: brightness(10); /* Rend l'icône blanche pour le badge */
        }
        
        .dislike-button:hover, .dislike-button.active {
            color: var(--danger-color) !important;
        }
        
        /* Badge styles for like/dislike counts */
        .like-count-badge {
            background-color: var(--main-accent);
            color: white;
            padding: 0.25rem 0.6rem;
            font-size: 0.85rem;
            transition: all var(--transition-speed) ease;
            box-shadow: 0 2px 4px rgba(74, 107, 218, 0.2);
        }
        
        .like-count-badge:hover {
            background-color: var(--main-accent-hover);
            transform: translateY(-1px);
            box-shadow: 0 3px 6px rgba(74, 107, 218, 0.3);
        }
        
        .dislike-count-badge {
            background-color: var(--danger-color);
            color: white;
            padding: 0.25rem 0.6rem;
            font-size: 0.85rem;
            transition: all var(--transition-speed) ease;
            box-shadow: 0 2px 4px rgba(220, 53, 69, 0.2);
        }
        
        .dislike-count-badge:hover {
            background-color: var(--danger-color-darker);
            transform: translateY(-1px);
            box-shadow: 0 3px 6px rgba(220, 53, 69, 0.3);
        }
        
        /* Style pour le séparateur entre like et dislike */
        .stats-separator {
            width: 1px;
            height: 20px;
            background-color: rgba(0, 0, 0, 0.1);
            display: inline-block;
        }
        
        .comment-action-link.active {
            color: var(--main-accent) !important;
        }
        
        .comment-like-btn:hover .bi-heart,
        .comment-like-btn.active .bi-heart-fill {
            transform: scale(1.2);
            transition: transform 0.2s ease;
        }
        
        .comment-like-count {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-left: 4px;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--main-accent);
            background-color: rgba(74, 107, 218, 0.1);
            border-radius: 10px;
            padding: 0 6px;
            min-width: 18px;
            height: 18px;
        }
        
        /* Style du bouton retour */
        .btn-back {
            transition: all 0.3s ease;
            border-radius: 50px;
            padding: 0.5rem 1.2rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08);
        }
        
        .btn-back:hover {
            transform: translateX(-5px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.12);
        }
        
        .btn-back i {
            transition: transform 0.3s ease;
        }
        
        .btn-back:hover i {
            transform: translateX(-3px);
        }
        
        /* Style badge lieu */
        .location-badge {
            display: inline-flex;
            align-items: center;
            background-color: #f8f9fa;
            color: #495057;
            padding: 0.35rem 0.8rem;
            border-radius: 50px;
            font-size: 0.85rem;
            margin-bottom: 1rem;
            font-weight: 500;
        }
        
        .location-badge i {
            margin-right: 0.4rem;
            color: var(--main-accent);
        }
        
        /* Style pour le bouton j'aime/je n'aime pas */
        .like-button, .dislike-button {
            transition: all 0.3s ease;
        }
        
        .like-button:hover, .like-button.active {
            color: var(--main-accent) !important;
        }
        
        .dislike-button:hover, .dislike-button.active {
            color: var(--danger-color) !important;
        }
        
        .like-button:hover i, .like-button.active i,
        .dislike-button:hover i, .dislike-button.active i {
            transform: scale(1.15);
        }
        
        .like-button:hover i, .like-button.active i {
            filter: drop-shadow(0px 0px 3px rgba(74, 107, 218, 0.5));
        }
        
        .dislike-button:hover i, .dislike-button.active i {
            filter: drop-shadow(0px 0px 3px rgba(220, 53, 69, 0.5));
        }
        
        /* Style pour les boutons de like des commentaires */
        .comment-action-link.comment-like-btn {
            transition: all 0.3s ease;
            padding: 2px 8px;
            border-radius: 20px;
        }
        
        .comment-action-link.comment-like-btn:hover,
        .comment-action-link.comment-like-btn.active {
            background-color: rgba(74, 107, 218, 0.1);
            color: var(--main-accent) !important;
        }
        
        .comment-action-link.comment-like-btn i {
            transition: all 0.3s ease;
        }
        
        .comment-action-link.comment-like-btn:hover i,
        .comment-action-link.comment-like-btn.active i {
            transform: scale(1.15);
            color: var(--main-accent);
        }
        
        .comment-like-count {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-left: 4px;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--main-accent);
            background-color: rgba(74, 107, 218, 0.1);
            border-radius: 10px;
            padding: 0 6px;
            min-width: 18px;
            height: 18px;
        }
        
        .like-button.active {
            color: var(--main-accent) !important;
            background-color: rgba(74, 107, 218, 0.15) !important;
            font-weight: 500;
        }
        
        .like-button.active i {
            transform: scale(1.15);
        }
        
        .dislike-button.active {
            color: var(--danger-color) !important;
            background-color: rgba(220, 53, 69, 0.15) !important;
            font-weight: 500;
        }
        
        .dislike-button.active i {
            transform: scale(1.15);
        }
        
        /* Styles inline pour forcer la coloration des boutons actifs */
        button.like-button.active {
            color: #4a6bda !important;
            background-color: rgba(74, 107, 218, 0.15) !important;
        }
        
        button.dislike-button.active {
            color: #dc3545 !important;
            background-color: rgba(220, 53, 69, 0.15) !important;
        }
    </style>
{% endblock %}

{# Ce bloc REMPLACE le contenu du block body de base.html.twig #}
{% block body %}
<div class=\"container my-4 my-lg-5\">
    <div class=\"row justify-content-center\">
        <div class=\"col-md-10 col-lg-8 col-xl-7\">
            <!-- Bouton de retour -->
            <a href=\"{{ path('socialVoyageurs_page') }}\" class=\"btn btn-outline-primary btn-back mb-3\">
                <i class=\"fas fa-arrow-left me-2\"></i> Retour aux publications
            </a>

            {# --- Card unique contenant le post et les commentaires --- #}
            <div class=\"post-card bg-white overflow-hidden\">
                {# En-tête du Post #}
                <header class=\"post-header d-flex align-items-center\">
                    {% set post_author = social_media.getUser() %}
                    <div class=\"flex-shrink-0 me-3\">
                        <img src=\"{{ post_author and post_author.getImagesU() ? asset('uploads/profile_pictures/' ~ post_author.getImagesU()) : asset('images/placeholder-avatar.png') }}\"
                             alt=\"{{ post_author ? post_author.getPrenom() : 'Utilisateur' }}\"
                             class=\"post-author-img rounded-circle\" width=\"38\" height=\"38\">
                    </div>
                    <div class=\"post-author-info flex-grow-1\">
                        <h5 class=\"post-author-name mb-0\">
                            {% if post_author %}
                                <strong>{{ post_author.getPrenom() }} {{ post_author.getName() }}</strong>
                            {% else %}
                                <em class=\"text-muted\">Utilisateur inconnu</em>
                            {% endif %}
                        </h5>
                        <small class=\"post-timestamp text-muted\">
                            <i class=\"bi bi-clock me-1\"></i>{{ social_media.getPublicationDate()|date('d/m/Y à H:i') }}
                        </small>
                    </div>
                </header>

                {# Contenu du Post (Titre) #}
                <div class=\"post-content pb-0\">
                    <h3 class=\"post-title\">{{ social_media.getTitre() }}</h3>
                    
                    <!-- Badge lieu -->
                    <div class=\"location-badge\">
                        <i class=\"fas fa-map-marker-alt\"></i> {{ social_media.getLieu() }}
                    </div>
                </div>

                {# Image du Post (si présente) #}
                {% if social_media.getImagemedia() %}
                    <div class=\"post-image-container d-flex justify-content-center align-items-center bg-light\">
                        <img src=\"{{ asset('http://localhost/ImageSocialMedia/' ~ social_media.getImagemedia()) }}\"
                             alt=\"Image pour {{ social_media.getTitre() }}\" class=\"img-fluid\"
                             onerror=\"this.onerror=null; this.src='{{ asset('images/image-not-found.png') }}'; this.alt='Image non disponible';\">
                    </div>
                {% endif %}

                {# Contenu du Post (Texte) - séparé pour optimiser l'affichage #}
                <div class=\"post-content pt-2\">
                    <div class=\"post-text\">{{ social_media.getContenu()|nl2br }}</div>
                </div>

                {# Statistiques (Likes/Dislikes) - version simplifiée #}
                <div class=\"post-stats d-flex justify-content-between align-items-center\">
                    <div class=\"d-flex align-items-center gap-3\">
                            <div class=\"d-flex align-items-center\">
                            <span class=\"badge rounded-pill bg-primary me-2\">
                                <i class=\"fas fa-thumbs-up me-1\"></i> {{ social_media.getLikee() }}
                                </span>
                            
                            <span class=\"badge rounded-pill bg-danger\">
                                <i class=\"fas fa-thumbs-down me-1\"></i> {{ social_media.getDislike() }}
                                </span>
                            </div>
                    </div>
                    
                    <div>
                        <small class=\"text-muted d-flex align-items-center\">
                            <i class=\"bi bi-chat-dots me-1\"></i>
                            <span class=\"comments-count\">{{ comments|length }}</span> commentaire{% if comments|length != 1 %}s{% endif %}
                     </small>
                    </div>
                 </div>

               {# Barre d'actions J'aime/Commenter/Modifier/Supprimer #}
                <div class=\"post-actions d-flex justify-content-between align-items-center\">
                    <div class=\"d-flex flex-grow-1 mx-n1\">
                    {# Like Button (Form) #}
                        <form action=\"{{ path('app_social_media_like', {idEB: social_media.idEB}) }}\" method=\"POST\" class=\"d-inline m-0 flex-grow-1 px-1 like-form\">
                        <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('like-post') }}\">
                        <button type=\"submit\" 
                               class=\"btn btn-action w-100 text-muted like-button {% if app.session.get('user_post_actions')[social_media.idEB] is defined and app.session.get('user_post_actions')[social_media.idEB] == 'like' %}active{% endif %}\"
                               {% if app.session.get('user_post_actions')[social_media.idEB] is defined and app.session.get('user_post_actions')[social_media.idEB] == 'like' %}
                                  style=\"color: #4a6bda !important; background-color: rgba(74, 107, 218, 0.15) !important; font-weight: 500;\"
                               {% endif %}
                        >
                                <i class=\"fas fa-thumbs-up me-1\" 
                                   {% if app.session.get('user_post_actions')[social_media.idEB] is defined and app.session.get('user_post_actions')[social_media.idEB] == 'like' %}
                                       style=\"transform: scale(1.15);\"
                                   {% endif %}
                                ></i> <span class=\"action-text\">J'aime</span>
                        </button>
                    </form>

                    {# Dislike Button (Form) #}
                        <form action=\"{{ path('app_social_media_dislike', {idEB: social_media.idEB}) }}\" method=\"POST\" class=\"d-inline m-0 flex-grow-1 px-1 dislike-form\">
                        <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('dislike-post') }}\">
                        <button type=\"submit\" 
                                class=\"btn btn-action w-100 text-muted dislike-button {% if app.session.get('user_post_actions')[social_media.idEB] is defined and app.session.get('user_post_actions')[social_media.idEB] == 'dislike' %}active{% endif %}\"
                                {% if app.session.get('user_post_actions')[social_media.idEB] is defined and app.session.get('user_post_actions')[social_media.idEB] == 'dislike' %}
                                   style=\"color: #dc3545 !important; background-color: rgba(220, 53, 69, 0.15) !important; font-weight: 500;\"
                                {% endif %}
                        >
                                <i class=\"fas fa-thumbs-down me-1\"
                                   {% if app.session.get('user_post_actions')[social_media.idEB] is defined and app.session.get('user_post_actions')[social_media.idEB] == 'dislike' %}
                                       style=\"transform: scale(1.15);\"
                                   {% endif %}
                                ></i> <span class=\"action-text\">Je n'aime pas</span>
                        </button>
                    </form>

    {# Comment Link/Button #}
                        <a href=\"#comments-area\" class=\"btn btn-action flex-grow-1 text-muted mx-1\">
                        <i class=\"bi bi-chat-dots me-1\"></i> <span class=\"action-text\">Commenter</span>
    </a>

                    {# Admin Actions #}
    {% if post_author and post_author.getIdU() == default_user_id %}
                            <div class=\"d-flex flex-grow-1\">
                        {# Edit Button #}
                                <a href=\"{{ path('app_social_media_edit', {idEB: social_media.idEB}) }}\" class=\"btn btn-action flex-grow-1 text-muted mx-1\">
                            <i class=\"bi bi-pencil-square me-1\"></i> <span class=\"action-text\">Éditer</span>
                        </a>

                        {# Delete Button #}
                                <form action=\"{{ path('app_social_media_delete', {idEB: social_media.idEB}) }}\" method=\"POST\" class=\"d-inline m-0 flex-grow-1 px-1\" onsubmit=\"return confirm('Êtes-vous sûr de vouloir supprimer cette publication ?');\">
            <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ social_media.idEB) }}\">
            <button type=\"submit\" class=\"btn btn-action w-100 text-danger\">
                                <i class=\"bi bi-trash me-1\"></i> <span class=\"action-text\">Supprimer</span>
            </button>
        </form>
                            </div>
    {% endif %}
                    </div>
</div>

                {# --- Section Commentaires intégrée --- #}
                <div id=\"comments-area\" class=\"comments-section p-3\">
                    <h3 class=\"section-title fs-5\">Commentaires</h3>

                    {# Affichage des erreurs basé sur les paramètres d'URL #}
                    {% if app.request.query.get('error') %}
                        {% set error_type = app.request.query.get('error') %}
                        <div class=\"alert alert-danger mb-3\">
                            {% if error_type == 'empty_comment' %}
                                <strong>Erreur :</strong> Le commentaire ne peut pas être vide.
                            {% elseif error_type == 'validation_failed' %}
                                <strong>Erreur :</strong> {{ app.request.query.get('message', 'Erreur de validation du formulaire.') }}
                            {% elseif error_type == 'forbidden_words' %}
                                <strong>Erreur :</strong> Votre commentaire contient des mots interdits: {{ app.request.query.get('words') }}
                            {% elseif error_type == 'database_error' %}
                                <strong>Erreur :</strong> Une erreur s'est produite lors de l'enregistrement du commentaire.
                            {% elseif error_type == 'form_not_submitted' %}
                                <strong>Erreur :</strong> Le formulaire n'a pas été soumis correctement.
                            {% else %}
                                <strong>Erreur :</strong> Une erreur est survenue.
                            {% endif %}
                        </div>
                    {% endif %}

                {# Formulaire Ajout Commentaire #}
                    <div class=\"add-comment-form-container d-flex align-items-start\">
                        {% set current_user = app.user %}
                        <div class=\"flex-shrink-0 me-2\">
                         <img src=\"{{ current_user and current_user.getImagesU() ? asset('uploads/profile_pictures/' ~ current_user.getImagesU()) : asset('images/placeholder-avatar.png') }}\"
                              alt=\"Votre avatar\"
                                class=\"comment-author-img rounded-circle\" width=\"32\" height=\"32\">
                     </div>
                     <div class=\"flex-grow-1\">
                        {# Noter que la route 'ajouter_commentaire' est dépréciée. Utiliser 'app_social_media_ajouter_commentaire' à la place #}
                        <form name=\"{{ comment_form.vars.name }}\" method=\"{{ comment_form.vars.method }}\" action=\"{{ comment_form.vars.action }}\" class=\"add-comment-form\" id=\"comment-form\" novalidate>
                            <div class=\"position-relative\">
                                {{ form_widget(comment_form.description, {'attr': {'rows': 2, 'placeholder': 'Écrivez un commentaire...', 'class': 'form-control comment-input py-2 px-3', 'id': 'comment-input', 'required': 'required', 'minlength': '5'}}) }}
                                {{ form_errors(comment_form.description) }}
                                <div id=\"empty-comment-error\" class=\"alert alert-danger mt-2\" style=\"display: none;\">Le commentaire ne peut pas être vide.</div>
                                <button type=\"submit\" class=\"btn btn-primary btn-send-comment\" id=\"submit-comment\" aria-label=\"Publier le commentaire\">
                                    <i class=\"fas fa-paper-plane\"></i>
                                </button>
                            </div>
                            {{ form_rest(comment_form) }}
                            <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('comment_token') }}\">
                            <div class=\"d-none\">
                                <p>DEBUG - Nom du formulaire: {{ comment_form.vars.name }}</p>
                                <p>DEBUG - Nom du champ description: {{ comment_form.description.vars.full_name }}</p>
                            </div>
                        </form>
                     </div>
                </div>

                    {# Séparateur visuel #}
                    <hr class=\"my-2 text-muted\">

                {# Liste des Commentaires Existants #}
                    <div id=\"comments-list\" class=\"comments-container\">
    {% if comments is defined and comments|length > 0 %}
        {% for commentaire in comments %}
            {% set comment_author = commentaire.getUser() %}
                                {% set animation_order = loop.index %}
                                <div class=\"comment-entry d-flex align-items-start\" id=\"comment-{{ commentaire.idC }}\" style=\"--animation-order: {{ animation_order }}\">
                 {# Image Auteur Commentaire #}
                                    <div class=\"flex-shrink-0 me-2\">
                    <img src=\"{{ comment_author and comment_author.getImagesU() ? asset('uploads/profile_pictures/' ~ comment_author.getImagesU()) : asset('images/placeholder-avatar.png') }}\"
                         alt=\"{{ comment_author ? comment_author.getPrenom() : 'Avatar' }}\"
                                            class=\"comment-author-img rounded-circle\" width=\"28\" height=\"28\">
                </div>
                 {# Bulle Commentaire + Meta #}
                <div class=\"flex-grow-1\">
                                        <div class=\"comment-bubble\">
                        <strong class=\"comment-author-name d-block mb-1\">
                            {% if comment_author %}
                                {{ comment_author.getPrenom() }} {{ comment_author.getName() }}
                            {% else %}
                                Utilisateur inconnu
                            {% endif %}
                        </strong>
                        <p class=\"comment-text mb-0\">{{ commentaire.getDescription()|nl2br }}</p>
                    </div>
                                        {# Meta Données Commentaire #}
                                        <div class=\"comment-meta mt-1 ps-2 d-flex align-items-center flex-wrap\">
                        {# Date #}
                                            <small class=\"text-muted me-3\">
                                                <i class=\"fas fa-clock me-1\"></i>
                                                Il y a quelques instants
                        </small>

                                            {# Actions simplifiées #}
                                            <a href=\"#\" 
                                               class=\"comment-action-link small me-3 comment-like-btn {% if app.session.get('user_comment_actions')[commentaire.idC] is defined and app.session.get('user_comment_actions')[commentaire.idC] == 'like' %}active text-primary{% endif %}\"
                                               onclick=\"event.preventDefault(); document.getElementById('like-comment-form-{{ commentaire.idC }}').submit();\"
                                               data-comment-id=\"{{ commentaire.idC }}\">
                                                <i class=\"{% if app.session.get('user_comment_actions')[commentaire.idC] is defined and app.session.get('user_comment_actions')[commentaire.idC] == 'like' %}fas fa-heart{% else %}far fa-heart{% endif %}\"></i> 
                                                <span class=\"like-label\">J'aime</span>
                                                {% if commentaire.numberlike > 0 %}
                                                    <span class=\"comment-like-count\">{{ commentaire.numberlike }}</span>
                                                {% endif %}
                                            </a>
                                            <form id=\"like-comment-form-{{ commentaire.idC }}\" action=\"{{ path('app_commentaire_like', {'idC': commentaire.idC}) }}\" method=\"POST\" class=\"d-none\">
                                                <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('like_commentaire' ~ commentaire.idC) }}\">
                                            </form>
                                            
                                            {% if comment_author and comment_author.getIdU() == default_user_id %}
                                                <a href=\"{{ path('app_commentaire_edit', {'idC': commentaire.idC}) }}\" class=\"comment-action-link small me-3\">
                                                    <i class=\"fas fa-pencil-alt\"></i> Modifier
                                                </a>

                                                <a href=\"#\" 
                                                   class=\"comment-action-link small text-danger\"
                                                   onclick=\"event.preventDefault(); if(confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?')) { document.getElementById('delete-form-{{ commentaire.idC }}').submit(); }\">
                                                    <i class=\"fas fa-trash-alt\"></i> Supprimer
                                                </a>
                                                <form id=\"delete-form-{{ commentaire.idC }}\" action=\"{{ path('app_commentaire_delete', {'idC': commentaire.idC}) }}\" method=\"POST\" class=\"d-none\">
                                                    <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ commentaire.idC) }}\">
                                                </form>
                                            {% endif %}
                                        </div>
                                    </div>
                                </div>
        {% endfor %}
    {% else %}
                            <div class=\"text-center text-muted py-2\">
                                <i class=\"bi bi-chat-left-dots fs-4 mb-2 d-block opacity-50\"></i>
                                <p class=\"mb-0\">Soyez le premier à commenter cette publication.</p>
                            </div>
                        {% endif %}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{# Ajout du footer avec attributions Flaticon #}
<div class=\"container mt-4\">
    <div class=\"row\">
        <div class=\"col-12 text-center text-muted small\">
            <a href=\"https://www.flaticon.com/fr/icones-gratuites/pouces-vers-le-haut\" title=\"pouces vers le haut icônes\" class=\"text-decoration-none text-muted\">Pouces vers le haut icônes créées par Freepik - Flaticon</a> • 
            <a href=\"https://www.flaticon.com/fr/icones-gratuites/ne-pas-aimer\" title=\"ne pas aimer icônes\" class=\"text-decoration-none text-muted\">Ne pas aimer icônes créées par Md Tanvirul Haque - Flaticon</a>
        </div>
    </div>
</div>
{% endblock %} {# Fin block body #}

{% block javascripts %}
    {{ parent() }}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Force style des boutons actifs (like/dislike)
            function applyActiveStyles() {
                // Gestion du bouton like
                const likeButton = document.querySelector('.like-button');
                if (likeButton && likeButton.classList.contains('active')) {
                    likeButton.style.color = '#4a6bda';
                    likeButton.style.backgroundColor = 'rgba(74, 107, 218, 0.15)';
                    likeButton.style.fontWeight = '500';
                    const icon = likeButton.querySelector('i');
                    if (icon) icon.style.transform = 'scale(1.15)';
                }
                
                // Gestion du bouton dislike
                const dislikeButton = document.querySelector('.dislike-button');
                if (dislikeButton && dislikeButton.classList.contains('active')) {
                    dislikeButton.style.color = '#dc3545';
                    dislikeButton.style.backgroundColor = 'rgba(220, 53, 69, 0.15)';
                    dislikeButton.style.fontWeight = '500';
                    const icon = dislikeButton.querySelector('i');
                    if (icon) icon.style.transform = 'scale(1.15)';
                }
            }
            
            // Appliquer les styles immédiatement
            applyActiveStyles();
            
            // Appliquer les styles à nouveau après un court délai (pour être sûr que le DOM est entièrement chargé)
            setTimeout(applyActiveStyles, 100);
            
            // -------------------- GESTION DES LIKES/DISLIKES --------------------
            const likeButton = document.querySelector('.like-button');
            const dislikeButton = document.querySelector('.dislike-button');
            
            // Mettre en évidence les boutons actifs
            if (likeButton && likeButton.classList.contains('active')) {
                likeButton.style.backgroundColor = 'rgba(74, 107, 218, 0.15)';
                likeButton.style.color = '#4a6bda';
                const icon = likeButton.querySelector('i');
                if (icon) icon.style.transform = 'scale(1.15)';
            }
            
            if (dislikeButton && dislikeButton.classList.contains('active')) {
                dislikeButton.style.backgroundColor = 'rgba(220, 53, 69, 0.15)';
                dislikeButton.style.color = '#dc3545';
                const icon = dislikeButton.querySelector('i');
                if (icon) icon.style.transform = 'scale(1.15)';
            }
            
            // Effets au survol
            if (likeButton) {
                likeButton.addEventListener('mouseenter', function() {
                    if (!this.classList.contains('active')) {
                        this.style.color = '#4a6bda';
                        this.style.backgroundColor = 'rgba(74, 107, 218, 0.05)';
                    }
                });
                
                likeButton.addEventListener('mouseleave', function() {
                    if (!this.classList.contains('active')) {
                        this.style.color = '';
                        this.style.backgroundColor = '';
                    }
                });
            }
            
            if (dislikeButton) {
                dislikeButton.addEventListener('mouseenter', function() {
                    if (!this.classList.contains('active')) {
                        this.style.color = '#dc3545';
                        this.style.backgroundColor = 'rgba(220, 53, 69, 0.05)';
                    }
                });
                
                dislikeButton.addEventListener('mouseleave', function() {
                    if (!this.classList.contains('active')) {
                        this.style.color = '';
                        this.style.backgroundColor = '';
                    }
                });
            }
            
            // -------------------- VALIDATION DES COMMENTAIRES --------------------
            const commentForm = document.getElementById('comment-form');
            const commentInput = document.getElementById('comment-input');
            const errorMessage = document.getElementById('empty-comment-error');
            
            if (commentForm && commentInput && errorMessage) {
                // Fonction de validation
                function validateComment() {
                    const content = commentInput.value.trim();
                    
                    if (!content) {
                        commentInput.classList.add('is-invalid');
                        errorMessage.textContent = 'Le commentaire ne peut pas être vide.';
                        errorMessage.style.display = 'block';
                        return false;
                    } else if (content.length < 5) {
                        commentInput.classList.add('is-invalid');
                        errorMessage.textContent = 'Le commentaire doit contenir au moins 5 caractères.';
                        errorMessage.style.display = 'block';
                        return false;
                    } else {
                        commentInput.classList.remove('is-invalid');
                        errorMessage.style.display = 'none';
                        return true;
                    }
                }
                
                // Validation en temps réel
                commentInput.addEventListener('input', validateComment);
                
                // Validation à la soumission
                commentForm.addEventListener('submit', function(e) {
                    if (!validateComment()) {
                        e.preventDefault();
                        return false;
                    }
                    return true;
                });
            }
            
            // -------------------- ANIMATIONS --------------------
            // Animation image de publication
            const postImage = document.querySelector('.post-image-container img');
            if (postImage) {
                postImage.style.opacity = '0';
                setTimeout(() => {
                    postImage.style.opacity = '1';
                }, 300);
            }
            
            // Animation bouton retour
            const backButton = document.querySelector('.btn-back');
            if (backButton) {
                backButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    const href = this.getAttribute('href');
                    
                    document.querySelector('.post-card').style.opacity = '0';
                    
                    setTimeout(() => {
                        window.location.href = href;
                    }, 300);
                });
            }
            
            // Animation des boutons like des commentaires
            const commentLikeButtons = document.querySelectorAll('.comment-like-btn');
            commentLikeButtons.forEach(button => {
                if (button.classList.contains('active')) {
                    button.style.backgroundColor = 'rgba(74, 107, 218, 0.1)';
                }
                
                button.addEventListener('mouseenter', function() {
                    this.style.backgroundColor = 'rgba(74, 107, 218, 0.1)';
                });
                
                button.addEventListener('mouseleave', function() {
                    if (!this.classList.contains('active')) {
                        this.style.backgroundColor = '';
                    }
                });
            });
        });
    </script>
{% endblock %}
", "social_media/show.html.twig", "C:\\Users\\meria\\OneDrive - ESPRIT\\Bureau\\Airmess_Web\\templates\\social_media\\show.html.twig");
    }
}
