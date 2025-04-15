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

/* dashVoyageurs/bonplanPageVoyageurs.html.twig */
class __TwigTemplate_d1ccf58cb8996beebb0b18868aa02325 extends Template
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
            'stylesheets' => [$this, 'block_stylesheets'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashVoyageurs/bonplanPageVoyageurs.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashVoyageurs/bonplanPageVoyageurs.html.twig"));

        $this->parent = $this->loadTemplate("dashVoyageurs/dashboardVoyageurs.html.twig", "dashVoyageurs/bonplanPageVoyageurs.html.twig", 1);
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

        yield "Bons Plans - Airmess Dashboard";
        
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
        yield "<div class=\"container-fluid py-4\">
  <div class=\"row\">
    <div class=\"col-12\">
      <div class=\"card mb-4\">
        <div class=\"card-header pb-0 d-flex justify-content-between align-items-center\">
          <h6>";
        // line 11
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 11, $this->source); })()), "request", [], "any", false, false, false, 11), "query", [], "any", false, false, false, 11), "get", ["action"], "method", false, false, false, 11) == "add")) {
            yield "Ajouter un bon plan";
        } else {
            yield "Bons Plans";
        }
        yield "</h6>
          ";
        // line 12
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 12, $this->source); })()), "request", [], "any", false, false, false, 12), "query", [], "any", false, false, false, 12), "get", ["action"], "method", false, false, false, 12) != "add")) {
            // line 13
            yield "          <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("bonplanVoyageurs_page");
            yield "?action=add\" class=\"btn btn-primary btn-sm\">Ajouter un bon plan</a>
          ";
        }
        // line 15
        yield "        </div>
        <div class=\"card-body px-0 pt-0 pb-2\">
          ";
        // line 17
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 17, $this->source); })()), "request", [], "any", false, false, false, 17), "query", [], "any", false, false, false, 17), "get", ["action"], "method", false, false, false, 17) == "add")) {
            // line 18
            yield "          <div id=\"bonplan-form-container\">
            <!-- Le formulaire sera chargé ici -->
            ";
            // line 20
            yield from $this->loadTemplate("dashVoyageurs/bonplanForm.html.twig", "dashVoyageurs/bonplanPageVoyageurs.html.twig", 20)->unwrap()->yield($context);
            // line 21
            yield "          </div>
          ";
        } else {
            // line 23
            yield "          <div class=\"p-4\">
            <p>Liste des bons plans disponibles:</p>
            <!-- Liste des bons plans sous forme de cards -->
            <div class=\"row g-3\">
              ";
            // line 27
            if ((array_key_exists("bonplans", $context) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["bonplans"]) || array_key_exists("bonplans", $context) ? $context["bonplans"] : (function () { throw new RuntimeError('Variable "bonplans" does not exist.', 27, $this->source); })())) > 0))) {
                // line 28
                yield "                ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable((isset($context["bonplans"]) || array_key_exists("bonplans", $context) ? $context["bonplans"] : (function () { throw new RuntimeError('Variable "bonplans" does not exist.', 28, $this->source); })()));
                foreach ($context['_seq'] as $context["_key"] => $context["bonplan"]) {
                    // line 29
                    yield "                  <div class=\"col-12 col-md-6 col-lg-4\">
                    <div class=\"card h-100 card-bonplan\">
                      <div class=\"card-img-top-container\">
                        <img src=\"";
                    // line 32
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/" . CoreExtension::getAttribute($this->env, $this->source, $context["bonplan"], "imageBP", [], "any", false, false, false, 32))), "html", null, true);
                    yield "\" class=\"card-img-top\" alt=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["bonplan"], "nomplace", [], "any", false, false, false, 32), "html", null, true);
                    yield "\" onerror=\"this.src='";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("uploads/espagne-67f714bee028d.jpg"), "html", null, true);
                    yield "';\">
                        <div class=\"card-img-overlay card-actions\">
                          <div class=\"d-flex justify-content-between\">
                            <span class=\"badge bg-";
                    // line 35
                    yield (((CoreExtension::getAttribute($this->env, $this->source, $context["bonplan"], "typePlace", [], "any", false, false, false, 35) == "resto")) ? ("danger") : ((((CoreExtension::getAttribute($this->env, $this->source, $context["bonplan"], "typePlace", [], "any", false, false, false, 35) == "cafe")) ? ("success") : ((((CoreExtension::getAttribute($this->env, $this->source, $context["bonplan"], "typePlace", [], "any", false, false, false, 35) == "coworkingspace")) ? ("primary") : ("warning"))))));
                    yield "\">
                              ";
                    // line 36
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["bonplan"], "typePlace", [], "any", false, false, false, 36), "html", null, true);
                    yield "
                            </span>
                            <div class=\"action-buttons\">
                              <a href=\"";
                    // line 39
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("bonplan_edit_form", ["idP" => CoreExtension::getAttribute($this->env, $this->source, $context["bonplan"], "idP", [], "any", false, false, false, 39)]), "html", null, true);
                    yield "\" class=\"btn btn-sm btn-light\">
                                <i class=\"fas fa-edit\"></i>
                              </a>
                              <button class=\"btn btn-sm btn-light delete-bonplan ms-1\" data-id=\"";
                    // line 42
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["bonplan"], "idP", [], "any", false, false, false, 42), "html", null, true);
                    yield "\">
                                <i class=\"fas fa-trash\"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class=\"card-body\" data-bs-toggle=\"modal\" data-bs-target=\"#viewModal";
                    // line 49
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["bonplan"], "idP", [], "any", false, false, false, 49), "html", null, true);
                    yield "\" style=\"cursor: pointer;\">
                        <h5 class=\"card-title\">";
                    // line 50
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["bonplan"], "nomplace", [], "any", false, false, false, 50), "html", null, true);
                    yield "</h5>
                        <p class=\"card-text small text-muted\">
                          <i class=\"fas fa-map-marker-alt me-1\"></i> ";
                    // line 52
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["bonplan"], "localisation", [], "any", false, false, false, 52), "html", null, true);
                    yield "
                        </p>
                        <p class=\"card-text description-text\">
                          ";
                    // line 55
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["bonplan"], "description", [], "any", false, false, false, 55), 0, 100), "html", null, true);
                    if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["bonplan"], "description", [], "any", false, false, false, 55)) > 100)) {
                        yield "...";
                    }
                    // line 56
                    yield "                        </p>
                        <div class=\"rating-container mt-2\">
                          <div class=\"stars-outer\">
                            <div class=\"stars-inner\" style=\"width: ";
                    // line 59
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((CoreExtension::getAttribute($this->env, $this->source, (isset($context["ratings"]) || array_key_exists("ratings", $context) ? $context["ratings"] : (function () { throw new RuntimeError('Variable "ratings" does not exist.', 59, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["bonplan"], "idP", [], "any", false, false, false, 59), [], "array", false, false, false, 59) * 20), "html", null, true);
                    yield "%\"></div>
                          </div>
                          <span class=\"rating-text\">";
                    // line 61
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["ratings"]) || array_key_exists("ratings", $context) ? $context["ratings"] : (function () { throw new RuntimeError('Variable "ratings" does not exist.', 61, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["bonplan"], "idP", [], "any", false, false, false, 61), [], "array", false, false, false, 61), "html", null, true);
                    yield " <small>(";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["reviewsCount"]) || array_key_exists("reviewsCount", $context) ? $context["reviewsCount"] : (function () { throw new RuntimeError('Variable "reviewsCount" does not exist.', 61, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["bonplan"], "idP", [], "any", false, false, false, 61), [], "array", false, false, false, 61), "html", null, true);
                    yield " avis)</small></span>
                        </div>
                      </div>
                    </div>
                  </div>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['bonplan'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 67
                yield "              ";
            } else {
                // line 68
                yield "                <div class=\"col-12 text-center py-5\">
                  <div class=\"alert alert-info\">
                    <i class=\"fas fa-info-circle me-2\"></i> Aucun bon plan n'a été ajouté.
                  </div>
                </div>
              ";
            }
            // line 74
            yield "            </div>
          </div>
          ";
        }
        // line 77
        yield "
        </div>
      </div>
    </div>
  </div>
</div>
<<<<<<< HEAD

";
        // line 85
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 85, $this->source); })()), "request", [], "any", false, false, false, 85), "query", [], "any", false, false, false, 85), "get", ["action"], "method", false, false, false, 85) == "add")) {
            // line 86
            yield "<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Setup form submission
    const bonplanForm = document.getElementById('bonplan-form');
    if (bonplanForm) {
      bonplanForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Create FormData object to handle file uploads
        const formData = new FormData(bonplanForm);
        
        // Submit form using fetch API
        fetch('";
            // line 98
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("bonplan_add");
            yield "', {
          method: 'POST',
          body: formData
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            alert('Bon plan ajouté avec succès!');
            // Redirect to the bons plans list page
            window.location.href = '";
            // line 107
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("bonplanVoyageurs_page");
            yield "';
          } else {
            alert('Erreur: ' + data.message);
          }
        })
        .catch(error => {
          console.error('Erreur:', error);
          alert('Une erreur est survenue lors de l\\'ajout du bon plan.');
        });
      });
    }
  });
</script>
";
        }
        // line 121
        yield "
<!-- Modals de vue détaillée -->
";
        // line 123
        if ((array_key_exists("bonplans", $context) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["bonplans"]) || array_key_exists("bonplans", $context) ? $context["bonplans"] : (function () { throw new RuntimeError('Variable "bonplans" does not exist.', 123, $this->source); })())) > 0))) {
            // line 124
            yield "  ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["bonplans"]) || array_key_exists("bonplans", $context) ? $context["bonplans"] : (function () { throw new RuntimeError('Variable "bonplans" does not exist.', 124, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["bonplan"]) {
                // line 125
                yield "    <div class=\"modal fade\" id=\"viewModal";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["bonplan"], "idP", [], "any", false, false, false, 125), "html", null, true);
                yield "\" tabindex=\"-1\" aria-labelledby=\"viewModalLabel";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["bonplan"], "idP", [], "any", false, false, false, 125), "html", null, true);
                yield "\" aria-hidden=\"true\">
      <div class=\"modal-dialog modal-dialog-centered\">
        <div class=\"modal-content\">
          <div class=\"modal-header\">
            <h5 class=\"modal-title\" id=\"viewModalLabel";
                // line 129
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["bonplan"], "idP", [], "any", false, false, false, 129), "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["bonplan"], "nomplace", [], "any", false, false, false, 129), "html", null, true);
                yield "</h5>
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
          </div>
          <div class=\"modal-body\">
            <div class=\"text-center mb-4\">
              <img src=\"";
                // line 134
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/" . CoreExtension::getAttribute($this->env, $this->source, $context["bonplan"], "imageBP", [], "any", false, false, false, 134))), "html", null, true);
                yield "\" class=\"img-fluid rounded\" style=\"max-height: 200px;\" alt=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["bonplan"], "nomplace", [], "any", false, false, false, 134), "html", null, true);
                yield "\" onerror=\"this.src='";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("uploads/espagne-67f714bee028d.jpg"), "html", null, true);
                yield "';\">
            </div>
            
            <div class=\"mb-3\">
              <h6 class=\"text-uppercase text-secondary text-xs font-weight-bolder\">Type</h6>
              <p>";
                // line 139
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["bonplan"], "typePlace", [], "any", false, false, false, 139), "html", null, true);
                yield "</p>
            </div>
            
            <div class=\"mb-3\">
              <h6 class=\"text-uppercase text-secondary text-xs font-weight-bolder\">Localisation</h6>
              <p>";
                // line 144
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["bonplan"], "localisation", [], "any", false, false, false, 144), "html", null, true);
                yield "</p>
            </div>
            
            <div class=\"mb-3\">
              <h6 class=\"text-uppercase text-secondary text-xs font-weight-bolder\">Description</h6>
              <p>";
                // line 149
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["bonplan"], "description", [], "any", false, false, false, 149), "html", null, true);
                yield "</p>
            </div>
          </div>
          <div class=\"modal-footer\">
            <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Fermer</button>
            <a href=\"";
                // line 154
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("bonplan_edit_form", ["idP" => CoreExtension::getAttribute($this->env, $this->source, $context["bonplan"], "idP", [], "any", false, false, false, 154)]), "html", null, true);
                yield "\" class=\"btn btn-primary\">Modifier</a>
          </div>
        </div>
      </div>
    </div>
  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['bonplan'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 161
        yield "
<!-- Script pour la gestion des suppressions -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  // Gestion de la suppression
  const deleteButtons = document.querySelectorAll('.delete-bonplan');
  
  deleteButtons.forEach(button => {
    button.addEventListener('click', function(e) {
      e.preventDefault();
      
      const idP = this.getAttribute('data-id');
      
      if (confirm('Êtes-vous sûr de vouloir supprimer ce bon plan ?')) {
        // Envoyer la requête de suppression
        fetch('";
        // line 176
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("bonplan_delete", ["idP" => "PLACEHOLDER"]);
        yield "'.replace('PLACEHOLDER', idP), {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          }
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            alert('Bon plan supprimé avec succès !');
            // Recharger la page pour mettre à jour la liste
            window.location.reload();
          } else {
            alert('Erreur: ' + data.message);
          }
        })
        .catch(error => {
          console.error('Erreur:', error);
          alert('Une erreur est survenue lors de la suppression du bon plan.');
        });
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

    // line 203
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

        // line 204
        yield "<style>
  .card-bonplan {
    transition: all 0.3s ease;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    border: none;
  }
  
  .card-bonplan:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
  }
  
  .card-img-top-container {
    position: relative;
    height: 180px;
    overflow: hidden;
  }
  
  .card-img-top {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
  }
  
  .card-bonplan:hover .card-img-top {
    transform: scale(1.05);
  }
  
  .card-img-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    padding: 10px;
    background: linear-gradient(to bottom, rgba(0,0,0,0.4) 0%, rgba(0,0,0,0) 100%);
  }
  
  .badge {
    font-size: 0.7rem;
    padding: 0.4rem 0.6rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-weight: 600;
  }
  
  .card-title {
    font-weight: 600;
    margin-bottom: 0.5rem;
    font-size: 1.1rem;
    color: #344767;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }
  
  .description-text {
    font-size: 0.875rem;
    color: #67748e;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    height: 4.5rem;
  }
  
  .card-footer {
    padding: 0.75rem 1.25rem;
  }
  
  .btn-outline-primary {
    color: #5e72e4;
    border-color: #5e72e4;
  }
  
  .btn-outline-primary:hover {
    background-color: #5e72e4;
    color: white;
  }
  
  .btn-outline-secondary {
    color: #8392ab;
    border-color: #8392ab;
  }
  
  .btn-outline-secondary:hover {
    background-color: #8392ab;
    color: white;
  }
  
  .btn-outline-danger {
    color: #f5365c;
    border-color: #f5365c;
  }
  
  .btn-outline-danger:hover {
    background-color: #f5365c;
    color: white;
  }
  
  /* Pour mobile */
  @media (max-width: 767.98px) {
    .card-img-top-container {
      height: 160px;
    }
    
    .description-text {
      height: auto;
      -webkit-line-clamp: 2;
    }
  }
  
  .action-buttons {
    display: flex;
    align-items: flex-start;
  }
  
  .btn-light {
    background-color: rgba(255, 255, 255, 0.8);
    border: none;
    color: #495057;
    width: 30px;
    height: 30px;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: all 0.2s ease;
  }
  
  .btn-light:hover {
    background-color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }
  
  .btn-light i.fa-edit {
    color: #5e72e4;
  }
  
  .btn-light i.fa-trash {
    color: #f5365c;
  }
  
  /* Styles pour le système d'étoiles */
  .rating-container {
    display: flex;
    align-items: center;
    margin-top: 0.5rem;
  }
  
  .stars-outer {
    position: relative;
    display: inline-block;
    font-size: 16px;
  }
  
  .stars-outer::before {
    content: \"\\f005 \\f005 \\f005 \\f005 \\f005\";
    font-family: \"Font Awesome 5 Free\";
    font-weight: 400;
    color: #ccc;
  }
  
  .stars-inner {
    position: absolute;
    top: 0;
    left: 0;
    white-space: nowrap;
    overflow: hidden;
    width: 0;
  }
  
  .stars-inner::before {
    content: \"\\f005 \\f005 \\f005 \\f005 \\f005\";
    font-family: \"Font Awesome 5 Free\";
    font-weight: 900;
    color: #f8ce0b;
  }
  
  .rating-text {
    margin-left: 10px;
    font-size: 0.85rem;
    color: #67748e;
  }
  
  .rating-text small {
    font-size: 0.75rem;
    color: #8392ab;
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
        return "dashVoyageurs/bonplanPageVoyageurs.html.twig";
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
        return array (  456 => 204,  443 => 203,  406 => 176,  389 => 161,  376 => 154,  368 => 149,  360 => 144,  352 => 139,  340 => 134,  330 => 129,  320 => 125,  315 => 124,  313 => 123,  309 => 121,  292 => 107,  280 => 98,  266 => 86,  264 => 85,  254 => 77,  249 => 74,  241 => 68,  238 => 67,  224 => 61,  219 => 59,  214 => 56,  209 => 55,  203 => 52,  198 => 50,  194 => 49,  184 => 42,  178 => 39,  172 => 36,  168 => 35,  158 => 32,  153 => 29,  148 => 28,  146 => 27,  140 => 23,  136 => 21,  134 => 20,  130 => 18,  128 => 17,  124 => 15,  118 => 13,  116 => 12,  108 => 11,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'dashVoyageurs/dashboardVoyageurs.html.twig' %}

{% block title %}Bons Plans - Airmess Dashboard{% endblock %}

{% block body %}
<div class=\"container-fluid py-4\">
  <div class=\"row\">
    <div class=\"col-12\">
      <div class=\"card mb-4\">
        <div class=\"card-header pb-0 d-flex justify-content-between align-items-center\">
          <h6>{% if app.request.query.get('action') == 'add' %}Ajouter un bon plan{% else %}Bons Plans{% endif %}</h6>
          {% if app.request.query.get('action') != 'add' %}
          <a href=\"{{ path('bonplanVoyageurs_page') }}?action=add\" class=\"btn btn-primary btn-sm\">Ajouter un bon plan</a>
          {% endif %}
        </div>
        <div class=\"card-body px-0 pt-0 pb-2\">
          {% if app.request.query.get('action') == 'add' %}
          <div id=\"bonplan-form-container\">
            <!-- Le formulaire sera chargé ici -->
            {% include 'dashVoyageurs/bonplanForm.html.twig' %}
          </div>
          {% else %}
          <div class=\"p-4\">
            <p>Liste des bons plans disponibles:</p>
            <!-- Liste des bons plans sous forme de cards -->
            <div class=\"row g-3\">
              {% if bonplans is defined and bonplans|length > 0 %}
                {% for bonplan in bonplans %}
                  <div class=\"col-12 col-md-6 col-lg-4\">
                    <div class=\"card h-100 card-bonplan\">
                      <div class=\"card-img-top-container\">
                        <img src=\"{{ asset('uploads/' ~ bonplan.imageBP) }}\" class=\"card-img-top\" alt=\"{{ bonplan.nomplace }}\" onerror=\"this.src='{{ asset('uploads/espagne-67f714bee028d.jpg') }}';\">
                        <div class=\"card-img-overlay card-actions\">
                          <div class=\"d-flex justify-content-between\">
                            <span class=\"badge bg-{{ bonplan.typePlace == 'resto' ? 'danger' : (bonplan.typePlace == 'cafe' ? 'success' : (bonplan.typePlace == 'coworkingspace' ? 'primary' : 'warning')) }}\">
                              {{ bonplan.typePlace }}
                            </span>
                            <div class=\"action-buttons\">
                              <a href=\"{{ path('bonplan_edit_form', {'idP': bonplan.idP}) }}\" class=\"btn btn-sm btn-light\">
                                <i class=\"fas fa-edit\"></i>
                              </a>
                              <button class=\"btn btn-sm btn-light delete-bonplan ms-1\" data-id=\"{{ bonplan.idP }}\">
                                <i class=\"fas fa-trash\"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class=\"card-body\" data-bs-toggle=\"modal\" data-bs-target=\"#viewModal{{ bonplan.idP }}\" style=\"cursor: pointer;\">
                        <h5 class=\"card-title\">{{ bonplan.nomplace }}</h5>
                        <p class=\"card-text small text-muted\">
                          <i class=\"fas fa-map-marker-alt me-1\"></i> {{ bonplan.localisation }}
                        </p>
                        <p class=\"card-text description-text\">
                          {{ bonplan.description|slice(0, 100) }}{% if bonplan.description|length > 100 %}...{% endif %}
                        </p>
                        <div class=\"rating-container mt-2\">
                          <div class=\"stars-outer\">
                            <div class=\"stars-inner\" style=\"width: {{ (ratings[bonplan.idP] * 20) }}%\"></div>
                          </div>
                          <span class=\"rating-text\">{{ ratings[bonplan.idP] }} <small>({{ reviewsCount[bonplan.idP] }} avis)</small></span>
                        </div>
                      </div>
                    </div>
                  </div>
                {% endfor %}
              {% else %}
                <div class=\"col-12 text-center py-5\">
                  <div class=\"alert alert-info\">
                    <i class=\"fas fa-info-circle me-2\"></i> Aucun bon plan n'a été ajouté.
                  </div>
                </div>
              {% endif %}
            </div>
          </div>
          {% endif %}

        </div>
      </div>
    </div>
  </div>
</div>
<<<<<<< HEAD

{% if app.request.query.get('action') == 'add' %}
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Setup form submission
    const bonplanForm = document.getElementById('bonplan-form');
    if (bonplanForm) {
      bonplanForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Create FormData object to handle file uploads
        const formData = new FormData(bonplanForm);
        
        // Submit form using fetch API
        fetch('{{ path('bonplan_add') }}', {
          method: 'POST',
          body: formData
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            alert('Bon plan ajouté avec succès!');
            // Redirect to the bons plans list page
            window.location.href = '{{ path('bonplanVoyageurs_page') }}';
          } else {
            alert('Erreur: ' + data.message);
          }
        })
        .catch(error => {
          console.error('Erreur:', error);
          alert('Une erreur est survenue lors de l\\'ajout du bon plan.');
        });
      });
    }
  });
</script>
{% endif %}

<!-- Modals de vue détaillée -->
{% if bonplans is defined and bonplans|length > 0 %}
  {% for bonplan in bonplans %}
    <div class=\"modal fade\" id=\"viewModal{{ bonplan.idP }}\" tabindex=\"-1\" aria-labelledby=\"viewModalLabel{{ bonplan.idP }}\" aria-hidden=\"true\">
      <div class=\"modal-dialog modal-dialog-centered\">
        <div class=\"modal-content\">
          <div class=\"modal-header\">
            <h5 class=\"modal-title\" id=\"viewModalLabel{{ bonplan.idP }}\">{{ bonplan.nomplace }}</h5>
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
          </div>
          <div class=\"modal-body\">
            <div class=\"text-center mb-4\">
              <img src=\"{{ asset('uploads/' ~ bonplan.imageBP) }}\" class=\"img-fluid rounded\" style=\"max-height: 200px;\" alt=\"{{ bonplan.nomplace }}\" onerror=\"this.src='{{ asset('uploads/espagne-67f714bee028d.jpg') }}';\">
            </div>
            
            <div class=\"mb-3\">
              <h6 class=\"text-uppercase text-secondary text-xs font-weight-bolder\">Type</h6>
              <p>{{ bonplan.typePlace }}</p>
            </div>
            
            <div class=\"mb-3\">
              <h6 class=\"text-uppercase text-secondary text-xs font-weight-bolder\">Localisation</h6>
              <p>{{ bonplan.localisation }}</p>
            </div>
            
            <div class=\"mb-3\">
              <h6 class=\"text-uppercase text-secondary text-xs font-weight-bolder\">Description</h6>
              <p>{{ bonplan.description }}</p>
            </div>
          </div>
          <div class=\"modal-footer\">
            <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Fermer</button>
            <a href=\"{{ path('bonplan_edit_form', {'idP': bonplan.idP}) }}\" class=\"btn btn-primary\">Modifier</a>
          </div>
        </div>
      </div>
    </div>
  {% endfor %}
{% endif %}

<!-- Script pour la gestion des suppressions -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  // Gestion de la suppression
  const deleteButtons = document.querySelectorAll('.delete-bonplan');
  
  deleteButtons.forEach(button => {
    button.addEventListener('click', function(e) {
      e.preventDefault();
      
      const idP = this.getAttribute('data-id');
      
      if (confirm('Êtes-vous sûr de vouloir supprimer ce bon plan ?')) {
        // Envoyer la requête de suppression
        fetch('{{ path('bonplan_delete', {'idP': 'PLACEHOLDER'}) }}'.replace('PLACEHOLDER', idP), {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          }
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            alert('Bon plan supprimé avec succès !');
            // Recharger la page pour mettre à jour la liste
            window.location.reload();
          } else {
            alert('Erreur: ' + data.message);
          }
        })
        .catch(error => {
          console.error('Erreur:', error);
          alert('Une erreur est survenue lors de la suppression du bon plan.');
        });
      }
    });
  });
});
</script>
{% endblock %}

{% block stylesheets %}
<style>
  .card-bonplan {
    transition: all 0.3s ease;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    border: none;
  }
  
  .card-bonplan:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
  }
  
  .card-img-top-container {
    position: relative;
    height: 180px;
    overflow: hidden;
  }
  
  .card-img-top {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
  }
  
  .card-bonplan:hover .card-img-top {
    transform: scale(1.05);
  }
  
  .card-img-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    padding: 10px;
    background: linear-gradient(to bottom, rgba(0,0,0,0.4) 0%, rgba(0,0,0,0) 100%);
  }
  
  .badge {
    font-size: 0.7rem;
    padding: 0.4rem 0.6rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-weight: 600;
  }
  
  .card-title {
    font-weight: 600;
    margin-bottom: 0.5rem;
    font-size: 1.1rem;
    color: #344767;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }
  
  .description-text {
    font-size: 0.875rem;
    color: #67748e;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    height: 4.5rem;
  }
  
  .card-footer {
    padding: 0.75rem 1.25rem;
  }
  
  .btn-outline-primary {
    color: #5e72e4;
    border-color: #5e72e4;
  }
  
  .btn-outline-primary:hover {
    background-color: #5e72e4;
    color: white;
  }
  
  .btn-outline-secondary {
    color: #8392ab;
    border-color: #8392ab;
  }
  
  .btn-outline-secondary:hover {
    background-color: #8392ab;
    color: white;
  }
  
  .btn-outline-danger {
    color: #f5365c;
    border-color: #f5365c;
  }
  
  .btn-outline-danger:hover {
    background-color: #f5365c;
    color: white;
  }
  
  /* Pour mobile */
  @media (max-width: 767.98px) {
    .card-img-top-container {
      height: 160px;
    }
    
    .description-text {
      height: auto;
      -webkit-line-clamp: 2;
    }
  }
  
  .action-buttons {
    display: flex;
    align-items: flex-start;
  }
  
  .btn-light {
    background-color: rgba(255, 255, 255, 0.8);
    border: none;
    color: #495057;
    width: 30px;
    height: 30px;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: all 0.2s ease;
  }
  
  .btn-light:hover {
    background-color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }
  
  .btn-light i.fa-edit {
    color: #5e72e4;
  }
  
  .btn-light i.fa-trash {
    color: #f5365c;
  }
  
  /* Styles pour le système d'étoiles */
  .rating-container {
    display: flex;
    align-items: center;
    margin-top: 0.5rem;
  }
  
  .stars-outer {
    position: relative;
    display: inline-block;
    font-size: 16px;
  }
  
  .stars-outer::before {
    content: \"\\f005 \\f005 \\f005 \\f005 \\f005\";
    font-family: \"Font Awesome 5 Free\";
    font-weight: 400;
    color: #ccc;
  }
  
  .stars-inner {
    position: absolute;
    top: 0;
    left: 0;
    white-space: nowrap;
    overflow: hidden;
    width: 0;
  }
  
  .stars-inner::before {
    content: \"\\f005 \\f005 \\f005 \\f005 \\f005\";
    font-family: \"Font Awesome 5 Free\";
    font-weight: 900;
    color: #f8ce0b;
  }
  
  .rating-text {
    margin-left: 10px;
    font-size: 0.85rem;
    color: #67748e;
  }
  
  .rating-text small {
    font-size: 0.75rem;
    color: #8392ab;
  }
</style>

{% endblock %}", "dashVoyageurs/bonplanPageVoyageurs.html.twig", "C:\\Users\\arijt\\Desktop\\Airmess_Web\\templates\\dashVoyageurs\\bonplanPageVoyageurs.html.twig");
    }
}
