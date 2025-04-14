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

/* dashVoyageurs/offreForm.html.twig */
class __TwigTemplate_fdbd976e4326aec7ff52ff7f5716c2b2 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashVoyageurs/offreForm.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashVoyageurs/offreForm.html.twig"));

        // line 1
        yield "<div class=\"content-card content-section active\" id=\"offre-section\">
  <div class=\"form-header\">
    <h2 class=\"form-title\">Créer une nouvelle offre</h2>
    <p class=\"form-subtitle\">Complétez les informations ci-dessous pour créer une nouvelle offre pour vos clients.</p>
  </div>

  <form action=\"#\" method=\"post\" id=\"offre-form\">
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
              <input type=\"text\" class=\"form-control\" id=\"offre-title\" placeholder=\" \">
              <label for=\"offre-title\">Titre de l'offre</label>
            </div>
          </div>
          
          <div class=\"form-col form-col-md-6\">
            <div class=\"form-floating\">
              <select class=\"form-select\" id=\"offre-type\">
                <option selected disabled value=\"\">Sélectionnez un type</option>
                <option value=\"discount\">Réduction</option>
                <option value=\"free\">Gratuité</option>
                <option value=\"premium\">Premium</option>
                <option value=\"seasonal\">Saisonnier</option>
              </select>
              <label for=\"offre-type\">Type d'offre</label>
            </div>
          </div>
        </div>

        <div class=\"form-spacer\"></div>
        
        <div class=\"form-floating\">
          <textarea class=\"form-control\" id=\"offre-description\" style=\"height: 100px\" placeholder=\" \"></textarea>
          <label for=\"offre-description\">Description de l'offre</label>
        </div>
      </div>
    </div>
    
    <!-- Timing Card -->
    <div class=\"form-card card-time\">
      <div class=\"form-card-header\">
        <i class=\"fas fa-calendar-alt form-card-icon\"></i>
        <h3 class=\"form-card-title\">Période de validité</h3>
      </div>
      <div class=\"form-card-body\">
        <div class=\"form-row\">
          <div class=\"form-col form-col-md-6\">
            <div class=\"form-floating\">
              <input type=\"date\" class=\"form-control\" id=\"offre-start-date\">
              <label for=\"offre-start-date\">Date de début</label>
            </div>
          </div>
          
          <div class=\"form-col form-col-md-6\">
            <div class=\"form-floating\">
              <input type=\"date\" class=\"form-control\" id=\"offre-end-date\">
              <label for=\"offre-end-date\">Date de fin</label>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Discount Card -->
    <div class=\"form-card card-discount\">
      <div class=\"form-card-header\">
        <i class=\"fas fa-tags form-card-icon\"></i>
        <h3 class=\"form-card-title\">Détails de la remise</h3>
      </div>
      <div class=\"form-card-body\">
        <div class=\"form-row\">
          <div class=\"form-col form-col-md-6\">
            <div class=\"form-floating\">
              <input type=\"number\" class=\"form-control\" id=\"offre-discount\" min=\"0\" max=\"100\">
              <label for=\"offre-discount\">Remise (%)</label>
            </div>
          </div>
          
          <div class=\"form-col form-col-md-6\">
            <div class=\"form-floating\">
              <input type=\"text\" class=\"form-control\" id=\"offre-code\" placeholder=\" \">
              <label for=\"offre-code\">Code promo (optionnel)</label>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Options Card -->
    <div class=\"form-card card-options\">
      <div class=\"form-card-header\">
        <i class=\"fas fa-cog form-card-icon\"></i>
        <h3 class=\"form-card-title\">Options supplémentaires</h3>
      </div>
      <div class=\"form-card-body\">
        <div class=\"form-options\">
          <div class=\"form-option-item\">
            <div class=\"form-switch\">
              <input class=\"form-switch-input\" type=\"checkbox\" id=\"offre-featured\">
              <label class=\"form-switch-label\" for=\"offre-featured\"></label>
            </div>
            <div class=\"form-option-content\">
              <label class=\"form-option-label\" for=\"offre-featured\">Mettre en avant sur la page d'accueil</label>
              <span class=\"form-option-desc\">Cette offre sera affichée dans la section principale de la page d'accueil</span>
            </div>
          </div>
          
          <div class=\"form-option-item\">
            <div class=\"form-switch\">
              <input class=\"form-switch-input\" type=\"checkbox\" id=\"offre-notify\">
              <label class=\"form-switch-label\" for=\"offre-notify\"></label>
            </div>
            <div class=\"form-option-content\">
              <label class=\"form-option-label\" for=\"offre-notify\">Notifier les utilisateurs</label>
              <span class=\"form-option-desc\">Envoyer un email à tous les utilisateurs concernés par cette offre</span>
            </div>
          </div>
          
          <div class=\"form-option-item\">
            <div class=\"form-switch\">
              <input class=\"form-switch-input\" type=\"checkbox\" id=\"offre-limit\">
              <label class=\"form-switch-label\" for=\"offre-limit\"></label>
            </div>
            <div class=\"form-option-content\">
              <label class=\"form-option-label\" for=\"offre-limit\">Limiter le nombre d'utilisations</label>
              <span class=\"form-option-desc\">Définir un nombre maximal d'utilisations pour cette offre</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class=\"form-actions\">
      <button type=\"button\" class=\"form-btn-outline\" id=\"cancel-offre\">Annuler</button>
      <button type=\"submit\" class=\"form-btn\">Créer l'offre</button>
    </div>
  </form>
</div>

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
  
  .card-time::before {
    background-color: #336D8B;
  }
  
  .card-discount::before {
    background-color: #FFDFDD;
  }
  
  .card-options::before {
    background-color: #FCDFFF;
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
  
  .card-time .form-card-header::after {
    background: linear-gradient(to right, rgba(255, 255, 255, 0), rgba(51, 109, 139, 0.1));
  }
  
  .card-discount .form-card-header::after {
    background: linear-gradient(to right, rgba(255, 255, 255, 0), rgba(255, 223, 221, 0.2));
  }
  
  .card-options .form-card-header::after {
    background: linear-gradient(to right, rgba(255, 255, 255, 0), rgba(252, 223, 255, 0.2));
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
  
  .card-time .form-card-icon {
    background-color: #336D8B;
  }
  
  .card-discount .form-card-icon {
    background-color: #FFDFDD;
    color: #E8ADAA;
  }
  
  .card-options .form-card-icon {
    background-color: #FCDFFF;
    color: #E8ADDA;
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

  .form-floating {
    position: relative;
    margin-bottom: 0.5rem;
  }

  .form-floating > .form-control,
  .form-floating > .form-select {
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
  .form-floating > .form-control:not(:placeholder-shown),
  .form-floating > .form-select:focus,
  .form-floating > .form-select:not(:placeholder-shown) {
    padding-top: 1.625rem;
    padding-bottom: 0.625rem;
  }

  .form-floating > .form-control:focus ~ label,
  .form-floating > .form-control:not(:placeholder-shown) ~ label,
  .form-floating > .form-select:focus ~ label,
  .form-floating > .form-select:not(:placeholder-shown) ~ label {
    opacity: .65;
    transform: scale(.85) translateY(-0.5rem) translateX(0.15rem);
  }

  .form-control, .form-select {
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

  .form-control:focus, .form-select:focus {
    color: #495057;
    background-color: #fff;
    border-color: #336D8B;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(51, 109, 139, 0.25);
  }
  
  .card-info .form-control:focus, 
  .card-info .form-select:focus {
    border-color: #FBBB89;
    box-shadow: 0 0 0 0.2rem rgba(251, 187, 137, 0.25);
  }
  
  .card-time .form-control:focus, 
  .card-time .form-select:focus {
    border-color: #336D8B;
    box-shadow: 0 0 0 0.2rem rgba(51, 109, 139, 0.25);
  }
  
  .card-discount .form-control:focus, 
  .card-discount .form-select:focus {
    border-color: #FFDFDD;
    box-shadow: 0 0 0 0.2rem rgba(255, 223, 221, 0.25);
  }
  
  .card-options .form-control:focus, 
  .card-options .form-select:focus {
    border-color: #FCDFFF;
    box-shadow: 0 0 0 0.2rem rgba(252, 223, 255, 0.25);
  }

  .form-options {
    display: flex;
    flex-direction: column;
    gap: 1rem;
  }

  .form-option-item {
    display: flex;
    align-items: flex-start;
    padding: 0.5rem;
    border-radius: 10px;
    transition: background-color 0.2s ease;
  }
  
  .form-option-item:hover {
    background-color: rgba(251, 187, 137, 0.05);
  }

  .form-option-content {
    margin-left: 0.75rem;
  }

  .form-option-label {
    display: block;
    margin-bottom: 0.25rem;
    font-weight: 600;
    color: #344767;
  }

  .form-option-desc {
    font-size: 0.75rem;
    color: #6c757d;
  }

  .form-switch {
    position: relative;
    display: inline-block;
    width: 48px;
    height: 24px;
  }

  .form-switch-input {
    opacity: 0;
    width: 0;
    height: 0;
  }

  .form-switch-label {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #e9ecef;
    transition: .4s;
    border-radius: 30px;
  }

  .form-switch-label:before {
    position: absolute;
    content: \"\";
    height: 18px;
    width: 18px;
    left: 3px;
    bottom: 3px;
    background-color: white;
    transition: .4s;
    border-radius: 50%;
  }

  .form-switch-input:checked + .form-switch-label {
    background-color: #336D8B;
  }

  .form-switch-input:checked + .form-switch-label:before {
    transform: translateX(24px);
  }

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
  }

  .form-btn-outline:hover {
    background-color: #f0f7ff;
    color: #234A5D;
    border-color: #234A5D;
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
</style> ";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "dashVoyageurs/offreForm.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<div class=\"content-card content-section active\" id=\"offre-section\">
  <div class=\"form-header\">
    <h2 class=\"form-title\">Créer une nouvelle offre</h2>
    <p class=\"form-subtitle\">Complétez les informations ci-dessous pour créer une nouvelle offre pour vos clients.</p>
  </div>

  <form action=\"#\" method=\"post\" id=\"offre-form\">
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
              <input type=\"text\" class=\"form-control\" id=\"offre-title\" placeholder=\" \">
              <label for=\"offre-title\">Titre de l'offre</label>
            </div>
          </div>
          
          <div class=\"form-col form-col-md-6\">
            <div class=\"form-floating\">
              <select class=\"form-select\" id=\"offre-type\">
                <option selected disabled value=\"\">Sélectionnez un type</option>
                <option value=\"discount\">Réduction</option>
                <option value=\"free\">Gratuité</option>
                <option value=\"premium\">Premium</option>
                <option value=\"seasonal\">Saisonnier</option>
              </select>
              <label for=\"offre-type\">Type d'offre</label>
            </div>
          </div>
        </div>

        <div class=\"form-spacer\"></div>
        
        <div class=\"form-floating\">
          <textarea class=\"form-control\" id=\"offre-description\" style=\"height: 100px\" placeholder=\" \"></textarea>
          <label for=\"offre-description\">Description de l'offre</label>
        </div>
      </div>
    </div>
    
    <!-- Timing Card -->
    <div class=\"form-card card-time\">
      <div class=\"form-card-header\">
        <i class=\"fas fa-calendar-alt form-card-icon\"></i>
        <h3 class=\"form-card-title\">Période de validité</h3>
      </div>
      <div class=\"form-card-body\">
        <div class=\"form-row\">
          <div class=\"form-col form-col-md-6\">
            <div class=\"form-floating\">
              <input type=\"date\" class=\"form-control\" id=\"offre-start-date\">
              <label for=\"offre-start-date\">Date de début</label>
            </div>
          </div>
          
          <div class=\"form-col form-col-md-6\">
            <div class=\"form-floating\">
              <input type=\"date\" class=\"form-control\" id=\"offre-end-date\">
              <label for=\"offre-end-date\">Date de fin</label>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Discount Card -->
    <div class=\"form-card card-discount\">
      <div class=\"form-card-header\">
        <i class=\"fas fa-tags form-card-icon\"></i>
        <h3 class=\"form-card-title\">Détails de la remise</h3>
      </div>
      <div class=\"form-card-body\">
        <div class=\"form-row\">
          <div class=\"form-col form-col-md-6\">
            <div class=\"form-floating\">
              <input type=\"number\" class=\"form-control\" id=\"offre-discount\" min=\"0\" max=\"100\">
              <label for=\"offre-discount\">Remise (%)</label>
            </div>
          </div>
          
          <div class=\"form-col form-col-md-6\">
            <div class=\"form-floating\">
              <input type=\"text\" class=\"form-control\" id=\"offre-code\" placeholder=\" \">
              <label for=\"offre-code\">Code promo (optionnel)</label>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Options Card -->
    <div class=\"form-card card-options\">
      <div class=\"form-card-header\">
        <i class=\"fas fa-cog form-card-icon\"></i>
        <h3 class=\"form-card-title\">Options supplémentaires</h3>
      </div>
      <div class=\"form-card-body\">
        <div class=\"form-options\">
          <div class=\"form-option-item\">
            <div class=\"form-switch\">
              <input class=\"form-switch-input\" type=\"checkbox\" id=\"offre-featured\">
              <label class=\"form-switch-label\" for=\"offre-featured\"></label>
            </div>
            <div class=\"form-option-content\">
              <label class=\"form-option-label\" for=\"offre-featured\">Mettre en avant sur la page d'accueil</label>
              <span class=\"form-option-desc\">Cette offre sera affichée dans la section principale de la page d'accueil</span>
            </div>
          </div>
          
          <div class=\"form-option-item\">
            <div class=\"form-switch\">
              <input class=\"form-switch-input\" type=\"checkbox\" id=\"offre-notify\">
              <label class=\"form-switch-label\" for=\"offre-notify\"></label>
            </div>
            <div class=\"form-option-content\">
              <label class=\"form-option-label\" for=\"offre-notify\">Notifier les utilisateurs</label>
              <span class=\"form-option-desc\">Envoyer un email à tous les utilisateurs concernés par cette offre</span>
            </div>
          </div>
          
          <div class=\"form-option-item\">
            <div class=\"form-switch\">
              <input class=\"form-switch-input\" type=\"checkbox\" id=\"offre-limit\">
              <label class=\"form-switch-label\" for=\"offre-limit\"></label>
            </div>
            <div class=\"form-option-content\">
              <label class=\"form-option-label\" for=\"offre-limit\">Limiter le nombre d'utilisations</label>
              <span class=\"form-option-desc\">Définir un nombre maximal d'utilisations pour cette offre</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class=\"form-actions\">
      <button type=\"button\" class=\"form-btn-outline\" id=\"cancel-offre\">Annuler</button>
      <button type=\"submit\" class=\"form-btn\">Créer l'offre</button>
    </div>
  </form>
</div>

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
  
  .card-time::before {
    background-color: #336D8B;
  }
  
  .card-discount::before {
    background-color: #FFDFDD;
  }
  
  .card-options::before {
    background-color: #FCDFFF;
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
  
  .card-time .form-card-header::after {
    background: linear-gradient(to right, rgba(255, 255, 255, 0), rgba(51, 109, 139, 0.1));
  }
  
  .card-discount .form-card-header::after {
    background: linear-gradient(to right, rgba(255, 255, 255, 0), rgba(255, 223, 221, 0.2));
  }
  
  .card-options .form-card-header::after {
    background: linear-gradient(to right, rgba(255, 255, 255, 0), rgba(252, 223, 255, 0.2));
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
  
  .card-time .form-card-icon {
    background-color: #336D8B;
  }
  
  .card-discount .form-card-icon {
    background-color: #FFDFDD;
    color: #E8ADAA;
  }
  
  .card-options .form-card-icon {
    background-color: #FCDFFF;
    color: #E8ADDA;
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

  .form-floating {
    position: relative;
    margin-bottom: 0.5rem;
  }

  .form-floating > .form-control,
  .form-floating > .form-select {
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
  .form-floating > .form-control:not(:placeholder-shown),
  .form-floating > .form-select:focus,
  .form-floating > .form-select:not(:placeholder-shown) {
    padding-top: 1.625rem;
    padding-bottom: 0.625rem;
  }

  .form-floating > .form-control:focus ~ label,
  .form-floating > .form-control:not(:placeholder-shown) ~ label,
  .form-floating > .form-select:focus ~ label,
  .form-floating > .form-select:not(:placeholder-shown) ~ label {
    opacity: .65;
    transform: scale(.85) translateY(-0.5rem) translateX(0.15rem);
  }

  .form-control, .form-select {
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

  .form-control:focus, .form-select:focus {
    color: #495057;
    background-color: #fff;
    border-color: #336D8B;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(51, 109, 139, 0.25);
  }
  
  .card-info .form-control:focus, 
  .card-info .form-select:focus {
    border-color: #FBBB89;
    box-shadow: 0 0 0 0.2rem rgba(251, 187, 137, 0.25);
  }
  
  .card-time .form-control:focus, 
  .card-time .form-select:focus {
    border-color: #336D8B;
    box-shadow: 0 0 0 0.2rem rgba(51, 109, 139, 0.25);
  }
  
  .card-discount .form-control:focus, 
  .card-discount .form-select:focus {
    border-color: #FFDFDD;
    box-shadow: 0 0 0 0.2rem rgba(255, 223, 221, 0.25);
  }
  
  .card-options .form-control:focus, 
  .card-options .form-select:focus {
    border-color: #FCDFFF;
    box-shadow: 0 0 0 0.2rem rgba(252, 223, 255, 0.25);
  }

  .form-options {
    display: flex;
    flex-direction: column;
    gap: 1rem;
  }

  .form-option-item {
    display: flex;
    align-items: flex-start;
    padding: 0.5rem;
    border-radius: 10px;
    transition: background-color 0.2s ease;
  }
  
  .form-option-item:hover {
    background-color: rgba(251, 187, 137, 0.05);
  }

  .form-option-content {
    margin-left: 0.75rem;
  }

  .form-option-label {
    display: block;
    margin-bottom: 0.25rem;
    font-weight: 600;
    color: #344767;
  }

  .form-option-desc {
    font-size: 0.75rem;
    color: #6c757d;
  }

  .form-switch {
    position: relative;
    display: inline-block;
    width: 48px;
    height: 24px;
  }

  .form-switch-input {
    opacity: 0;
    width: 0;
    height: 0;
  }

  .form-switch-label {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #e9ecef;
    transition: .4s;
    border-radius: 30px;
  }

  .form-switch-label:before {
    position: absolute;
    content: \"\";
    height: 18px;
    width: 18px;
    left: 3px;
    bottom: 3px;
    background-color: white;
    transition: .4s;
    border-radius: 50%;
  }

  .form-switch-input:checked + .form-switch-label {
    background-color: #336D8B;
  }

  .form-switch-input:checked + .form-switch-label:before {
    transform: translateX(24px);
  }

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
  }

  .form-btn-outline:hover {
    background-color: #f0f7ff;
    color: #234A5D;
    border-color: #234A5D;
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
</style> ", "dashVoyageurs/offreForm.html.twig", "C:\\Users\\MSI\\Desktop\\Airmess_Web\\templates\\dashVoyageurs\\offreForm.html.twig");
    }
}
