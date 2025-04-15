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
        yield "        </div>
      </div>
    </div>
  </div>
</div>

";
        // line 83
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 83, $this->source); })()), "request", [], "any", false, false, false, 83), "query", [], "any", false, false, false, 83), "get", ["action"], "method", false, false, false, 83) == "add")) {
            // line 84
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
            // line 96
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
            // line 105
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
        // line 119
        yield "
<!-- Modals de vue détaillée -->
";
        // line 121
        if ((array_key_exists("bonplans", $context) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["bonplans"]) || array_key_exists("bonplans", $context) ? $context["bonplans"] : (function () { throw new RuntimeError('Variable "bonplans" does not exist.', 121, $this->source); })())) > 0))) {
            // line 122
            yield "  ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["bonplans"]) || array_key_exists("bonplans", $context) ? $context["bonplans"] : (function () { throw new RuntimeError('Variable "bonplans" does not exist.', 122, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["bonplan"]) {
                // line 123
                yield "    <div class=\"modal fade\" id=\"viewModal";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["bonplan"], "idP", [], "any", false, false, false, 123), "html", null, true);
                yield "\" tabindex=\"-1\" aria-labelledby=\"viewModalLabel";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["bonplan"], "idP", [], "any", false, false, false, 123), "html", null, true);
                yield "\" aria-hidden=\"true\">
      <div class=\"modal-dialog modal-dialog-centered\">
        <div class=\"modal-content\">
          <div class=\"modal-header\">
            <h5 class=\"modal-title\" id=\"viewModalLabel";
                // line 127
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["bonplan"], "idP", [], "any", false, false, false, 127), "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["bonplan"], "nomplace", [], "any", false, false, false, 127), "html", null, true);
                yield "</h5>
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
          </div>
          <div class=\"modal-body\">
            <div class=\"text-center mb-4\">
              <img src=\"";
                // line 132
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/" . CoreExtension::getAttribute($this->env, $this->source, $context["bonplan"], "imageBP", [], "any", false, false, false, 132))), "html", null, true);
                yield "\" class=\"img-fluid rounded\" style=\"max-height: 200px;\" alt=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["bonplan"], "nomplace", [], "any", false, false, false, 132), "html", null, true);
                yield "\" onerror=\"this.src='";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("uploads/espagne-67f714bee028d.jpg"), "html", null, true);
                yield "';\">
            </div>
            
            <div class=\"mb-3\">
              <h6 class=\"text-uppercase text-secondary text-xs font-weight-bolder\">Type</h6>
              <p>";
                // line 137
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["bonplan"], "typePlace", [], "any", false, false, false, 137), "html", null, true);
                yield "</p>
            </div>
            
            <div class=\"mb-3\">
              <h6 class=\"text-uppercase text-secondary text-xs font-weight-bolder\">Localisation</h6>
              <p>";
                // line 142
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["bonplan"], "localisation", [], "any", false, false, false, 142), "html", null, true);
                yield "</p>
            </div>
            
            <div class=\"mb-3\">
              <h6 class=\"text-uppercase text-secondary text-xs font-weight-bolder\">Description</h6>
              <p>";
                // line 147
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["bonplan"], "description", [], "any", false, false, false, 147), "html", null, true);
                yield "</p>
            </div>
          </div>
          <div class=\"modal-footer\">
            <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Fermer</button>
            <a href=\"";
                // line 152
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("bonplan_edit_form", ["idP" => CoreExtension::getAttribute($this->env, $this->source, $context["bonplan"], "idP", [], "any", false, false, false, 152)]), "html", null, true);
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
        // line 159
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
        // line 174
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
        return array (  403 => 174,  386 => 159,  373 => 152,  365 => 147,  357 => 142,  349 => 137,  337 => 132,  327 => 127,  317 => 123,  312 => 122,  310 => 121,  306 => 119,  289 => 105,  277 => 96,  263 => 84,  261 => 83,  253 => 77,  248 => 74,  240 => 68,  237 => 67,  223 => 61,  218 => 59,  213 => 56,  208 => 55,  202 => 52,  197 => 50,  193 => 49,  183 => 42,  177 => 39,  171 => 36,  167 => 35,  157 => 32,  152 => 29,  147 => 28,  145 => 27,  139 => 23,  135 => 21,  133 => 20,  129 => 18,  127 => 17,  123 => 15,  117 => 13,  115 => 12,  107 => 11,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
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
", "dashVoyageurs/bonplanPageVoyageurs.html.twig", "C:\\Users\\bouga\\Desktop\\Airmess_Web\\templates\\dashVoyageurs\\bonplanPageVoyageurs.html.twig");
    }
}
