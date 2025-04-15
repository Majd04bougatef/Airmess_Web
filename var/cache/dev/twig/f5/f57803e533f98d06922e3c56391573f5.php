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

/* dashAdmin/offrePage.html.twig */
class __TwigTemplate_4304099dae1bb97e295d185ee619a7d9 extends Template
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
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "dashAdmin/dashboard.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashAdmin/offrePage.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashAdmin/offrePage.html.twig"));

        $this->parent = $this->loadTemplate("dashAdmin/dashboard.html.twig", "dashAdmin/offrePage.html.twig", 1);
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

        yield "Offers Management";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 6
        yield "<nav class=\"navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl \" id=\"navbarBlur\" data-scroll=\"false\">
  <div class=\"container-fluid py-1 px-3\">
    <nav aria-label=\"breadcrumb\">
      <ol class=\"breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5\">
        <li class=\"breadcrumb-item text-sm\"><a class=\"opacity-5 text-white\" href=\"javascript:;\">Pages</a></li>
        <li class=\"breadcrumb-item text-sm text-white active\" aria-current=\"page\">Offres</li>
      </ol>
      <h6 class=\"font-weight-bolder text-white mb-0\">Gestion des Offres</h6>
    </nav>
    <div class=\"collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4\" id=\"navbar\">
      <div class=\"ms-md-auto pe-md-3 d-flex align-items-center\">
        <div class=\"input-group\">
          <span class=\"input-group-text text-body\"><i class=\"fas fa-search\" aria-hidden=\"true\"></i></span>
          <input type=\"text\" class=\"form-control\" placeholder=\"Type here...\">
        </div>
      </div>
    </div>
  </div>
</nav>
<!-- End Navbar -->
<div class=\"container-fluid py-4\">
  <div class=\"row\">
    <div class=\"col-12\">
      <div class=\"card mb-4\">
        <div class=\"card-header pb-0\">
          <h6>Offres Table</h6>
        </div>
        <div class=\"card-body px-0 pt-0 pb-2\">
          <div class=\"table-responsive p-0\">
            <table class=\"table align-items-center mb-0\">
              <thead>
                <tr>
                  <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7\">Titre</th>
                  <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2\">Description</th>
                  <th class=\"text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7\">Prix</th>
                  <th class=\"text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7\">Date</th>
                  <th class=\"text-secondary opacity-7\"></th>
                </tr>
              </thead>
              <tbody>
                <!-- Example row, to be replaced with actual data -->
                <tr>
                  <td>
                    <div class=\"d-flex px-2 py-1\">
                      <div class=\"d-flex flex-column justify-content-center\">
                        <h6 class=\"mb-0 text-sm\">Special Offer</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class=\"text-xs font-weight-bold mb-0\">Description de l'offre</p>
                  </td>
                  <td class=\"align-middle text-center text-sm\">
                    <span class=\"text-secondary text-xs font-weight-bold\">€99.99</span>
                  </td>
                  <td class=\"align-middle text-center\">
                    <span class=\"text-secondary text-xs font-weight-bold\">23/04/2022</span>
                  </td>
                  <td class=\"align-middle\">
                    <a href=\"javascript:;\" class=\"text-secondary font-weight-bold text-xs\" data-toggle=\"tooltip\" data-original-title=\"Edit user\">
                      Edit
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
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
        return "dashAdmin/offrePage.html.twig";
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
        return array (  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'dashAdmin/dashboard.html.twig' %}

{% block title %}Offers Management{% endblock %}

{% block content %}
<nav class=\"navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl \" id=\"navbarBlur\" data-scroll=\"false\">
  <div class=\"container-fluid py-1 px-3\">
    <nav aria-label=\"breadcrumb\">
      <ol class=\"breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5\">
        <li class=\"breadcrumb-item text-sm\"><a class=\"opacity-5 text-white\" href=\"javascript:;\">Pages</a></li>
        <li class=\"breadcrumb-item text-sm text-white active\" aria-current=\"page\">Offres</li>
      </ol>
      <h6 class=\"font-weight-bolder text-white mb-0\">Gestion des Offres</h6>
    </nav>
    <div class=\"collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4\" id=\"navbar\">
      <div class=\"ms-md-auto pe-md-3 d-flex align-items-center\">
        <div class=\"input-group\">
          <span class=\"input-group-text text-body\"><i class=\"fas fa-search\" aria-hidden=\"true\"></i></span>
          <input type=\"text\" class=\"form-control\" placeholder=\"Type here...\">
        </div>
      </div>
    </div>
  </div>
</nav>
<!-- End Navbar -->
<div class=\"container-fluid py-4\">
  <div class=\"row\">
    <div class=\"col-12\">
      <div class=\"card mb-4\">
        <div class=\"card-header pb-0\">
          <h6>Offres Table</h6>
        </div>
        <div class=\"card-body px-0 pt-0 pb-2\">
          <div class=\"table-responsive p-0\">
            <table class=\"table align-items-center mb-0\">
              <thead>
                <tr>
                  <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7\">Titre</th>
                  <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2\">Description</th>
                  <th class=\"text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7\">Prix</th>
                  <th class=\"text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7\">Date</th>
                  <th class=\"text-secondary opacity-7\"></th>
                </tr>
              </thead>
              <tbody>
                <!-- Example row, to be replaced with actual data -->
                <tr>
                  <td>
                    <div class=\"d-flex px-2 py-1\">
                      <div class=\"d-flex flex-column justify-content-center\">
                        <h6 class=\"mb-0 text-sm\">Special Offer</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class=\"text-xs font-weight-bold mb-0\">Description de l'offre</p>
                  </td>
                  <td class=\"align-middle text-center text-sm\">
                    <span class=\"text-secondary text-xs font-weight-bold\">€99.99</span>
                  </td>
                  <td class=\"align-middle text-center\">
                    <span class=\"text-secondary text-xs font-weight-bold\">23/04/2022</span>
                  </td>
                  <td class=\"align-middle\">
                    <a href=\"javascript:;\" class=\"text-secondary font-weight-bold text-xs\" data-toggle=\"tooltip\" data-original-title=\"Edit user\">
                      Edit
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{% endblock %}
", "dashAdmin/offrePage.html.twig", "C:\\Users\\MSI\\Desktop\\Airmess_Web\\templates\\dashAdmin\\offrePage.html.twig");
    }
}
