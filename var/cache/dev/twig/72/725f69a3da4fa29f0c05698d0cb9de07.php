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

/* dashAdmin/dashboard.html.twig */
class __TwigTemplate_7a4283cd8bf16bbca34f23684acff1eb extends Template
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
            'title' => [$this, 'block_title'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashAdmin/dashboard.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashAdmin/dashboard.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"en\">

<head>
  <meta charset=\"utf-8\" />
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
  
    <title>";
        // line 8
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield "</title>
    <link rel=\"icon\" href=\"";
        // line 9
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/logo-airmess.png"), "html", null, true);
        yield "\" type=\"image/png\">

  <!--     Fonts and icons     -->
  <link href=\"https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700\" rel=\"stylesheet\" />
  <!-- Nucleo Icons -->
  <link href=\"https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css\" rel=\"stylesheet\" />
  <link href=\"https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css\" rel=\"stylesheet\" />
  <!-- Font Awesome Icons -->
  <script src=\"https://kit.fontawesome.com/42d5adcbca.js\" crossorigin=\"anonymous\"></script>
  <!-- CSS Files -->
  <link id=\"pagestyle\" href=\"";
        // line 19
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/argon-dashboard.css"), "html", null, true);
        yield "\" rel=\"stylesheet\" />
</head>

<body class=\"g-sidenav-show   bg-gray-100\">
  <div class=\"min-height-300 bg-dark position-absolute w-100\"></div>
  <aside class=\"sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 \" id=\"sidenav-main\">
    <div class=\"sidenav-header\">
      <i class=\"fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none\" aria-hidden=\"true\" id=\"iconSidenav\"></i>
      <a class=\"navbar-brand m-0\" href=\" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html \" target=\"_blank\">
        <img src=\"";
        // line 28
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/logo-airmess.png"), "html", null, true);
        yield "\" width=\"40px\" height=\"45px\" class=\"navbar-brand-img h-100\" alt=\"main_logo\">
        <span class=\"ms-1 font-weight-bold\">Airmess</span>
      </a>
      <div class=\"user-info mt-3 d-flex align-items-center ps-3\">
        <img src=\"";
        // line 32
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/users/" . CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 32, $this->source); })()), "session", [], "any", false, false, false, 32), "get", ["user_image"], "method", false, false, false, 32))), "html", null, true);
        yield "\" alt=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 32, $this->source); })()), "session", [], "any", false, false, false, 32), "get", ["user_name"], "method", false, false, false, 32), "html", null, true);
        yield "\" class=\"rounded-circle\" width=\"40\" height=\"40\" onerror=\"this.src='";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/user-avatar.svg"), "html", null, true);
        yield "';\">
        <div class=\"ms-2\">
          <span class=\"font-weight-bold text-sm\">";
        // line 34
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 34, $this->source); })()), "session", [], "any", false, false, false, 34), "get", ["user_name"], "method", false, false, false, 34), "html", null, true);
        yield "</span>
          <small class=\"d-block text-secondary\">";
        // line 35
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 35, $this->source); })()), "session", [], "any", false, false, false, 35), "get", ["user_role"], "method", false, false, false, 35), "html", null, true);
        yield "</small>
        </div>
      </div>
    </div>
    <hr class=\"horizontal dark mt-0\">
    <div class=\"collapse navbar-collapse  w-auto \" id=\"sidenav-collapse-main\">
      <ul class=\"navbar-nav\">
        <li class=\"nav-item\">
          <a class=\"nav-link active\" href=\"#\"  id=\"dashboard-button\">
            <div class=\"icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center\">
              <i class=\"ni ni-tv-2 text-dark text-sm opacity-10\"></i>
            </div>
            <span class=\"nav-link-text ms-1\">Dashboard</span>
          </a>
        </li>
        <li class=\"nav-item\">
          <a class=\"nav-link\" href=\"#\" id=\"user-button\">
            <div class=\"icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center\">
              <img src=\"";
        // line 53
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/user-icon.png"), "html", null, true);
        yield "\" alt=\"Icon\" class=\"img\" style=\"width: 25px; height: 25px;\" />
            </div>
            <span class=\"nav-link-text ms-1\">Utilisateurs</span>
          </a>
        </li>


        <li class=\"nav-item\">
          <a class=\"nav-link \"  href=\"#\" id=\"station-button\">
            <div class=\"icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center\">
              <img src=\"";
        // line 63
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/station-icon.png"), "html", null, true);
        yield "\" alt=\"Icon\" class=\"img\" style=\"width: 25px; height: 25px;\" />
            </div>
            <span class=\"nav-link-text ms-1\">Stations</span>
          </a>
        </li>
        <li class=\"nav-item\">
          <a class=\"nav-link \"  href=\"#\" id=\"bonplan-button\">
            <div class=\"icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center\">
              <img src=\"";
        // line 71
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/bonplan-icon.png"), "html", null, true);
        yield "\" alt=\"Icon\" class=\"img\" style=\"width: 25px; height: 25px;\" />            </div>
            <span class=\"nav-link-text ms-1\">Bon Plan</span>
          </a>
        </li>
        <li class=\"nav-item\">
          <a class=\"nav-link \"  href=\"#\" id=\"offre-button\">
            <div class=\"icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center\">
              <img src=\"";
        // line 78
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/offre-icon.png"), "html", null, true);
        yield "\" alt=\"Icon\" class=\"img\" style=\"width: 25px; height: 25px;\" />
            </div>
            <span class=\"nav-link-text ms-1\">Offres</span>
          </a>
        </li>

        <li class=\"nav-item\">
          <a class=\"nav-link \"  href=\"#\" id=\"social-button\">
            <div class=\"icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center\">
              <img src=\"";
        // line 87
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/social-icon.png"), "html", null, true);
        yield "\" alt=\"Icon\" class=\"img\" style=\"width: 25px; height: 25px;\" />
            </div>
            <span class=\"nav-link-text ms-1\">Social Media</span>
          </a>
        </li>
        <li class=\"nav-item mt-3\">
          <h6 class=\"ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6\">Account pages</h6>
        </li>
        <li class=\"nav-item\">
          <a class=\"nav-link \"  href=\"#\" id=\"profile-button\">
            <div class=\"icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center\">
              <i class=\"ni ni-single-02 text-dark text-sm opacity-10\"></i>
            </div>
            <span class=\"nav-link-text ms-1\">Profile</span>
          </a>
        </li>
      
      </ul>
    </div>
    <div class=\"sidenav-footer mx-3 \">
      <div class=\"card card-plain shadow-none\" id=\"sidenavCard\">
        <img class=\"w-50 mx-auto\" src=\"";
        // line 108
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/illustrations/icon-documentation.svg"), "html", null, true);
        yield "\" alt=\"sidebar_illustration\">
        <div class=\"card-body text-center p-3 w-100 pt-0\">
          <div class=\"docs-info\">
            <h6 class=\"mb-0\">Need help?</h6>
            <p class=\"text-xs font-weight-bold mb-0\">Please check our docs</p>
          </div>
        </div>
      </div>
      <a href=\"https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard\" target=\"_blank\" class=\"btn btn-dark btn-sm w-100 mb-3\">Airmess Pro</a>
      <a class=\"btn btn-primary btn-sm mb-0 w-100\" href=\"";
        // line 117
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
        yield "\" type=\"button\">Se déconnecter</a>
    </div>
  </aside>
  <main class=\"main-content position-relative border-radius-lg \" id=\"content\">
    <!-- Navbar -->
    ";
        // line 122
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 123
        yield "  </main>
  <div class=\"fixed-plugin\">
    <a class=\"fixed-plugin-button text-dark position-fixed px-3 py-2\">
      <i class=\"fa fa-cog py-2\"> </i>
    </a>
    <div class=\"card shadow-lg\">
      <div class=\"card-header pb-0 pt-3 \">
        <div class=\"float-start\">
          <h5 class=\"mt-3 mb-0\">Argon Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class=\"float-end mt-4\">
          <button class=\"btn btn-link text-dark p-0 fixed-plugin-close-button\">
            <i class=\"fa fa-close\"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class=\"horizontal dark my-1\">
      <div class=\"card-body pt-sm-3 pt-0 overflow-auto\">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class=\"mb-0\">Sidebar Colors</h6>
        </div>
        <a href=\"javascript:void(0)\" class=\"switch-trigger background-color\">
          <div class=\"badge-colors my-2 text-start\">
            <span class=\"badge filter bg-gradient-primary active\" data-color=\"primary\" onclick=\"sidebarColor(this)\"></span>
            <span class=\"badge filter bg-gradient-dark\" data-color=\"dark\" onclick=\"sidebarColor(this)\"></span>
            <span class=\"badge filter bg-gradient-info\" data-color=\"info\" onclick=\"sidebarColor(this)\"></span>
            <span class=\"badge filter bg-gradient-success\" data-color=\"success\" onclick=\"sidebarColor(this)\"></span>
            <span class=\"badge filter bg-gradient-warning\" data-color=\"warning\" onclick=\"sidebarColor(this)\"></span>
            <span class=\"badge filter bg-gradient-danger\" data-color=\"danger\" onclick=\"sidebarColor(this)\"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class=\"mt-3\">
          <h6 class=\"mb-0\">Sidenav Type</h6>
          <p class=\"text-sm\">Choose between 2 different sidenav types.</p>
        </div>
        <div class=\"d-flex\">
          <button class=\"btn bg-gradient-primary w-100 px-3 mb-2 active me-2\" data-class=\"bg-white\" onclick=\"sidebarType(this)\">White</button>
          <button class=\"btn bg-gradient-primary w-100 px-3 mb-2\" data-class=\"bg-default\" onclick=\"sidebarType(this)\">Dark</button>
        </div>
        <p class=\"text-sm d-xl-none d-block mt-2\">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class=\"d-flex my-3\">
          <h6 class=\"mb-0\">Navbar Fixed</h6>
          <div class=\"form-check form-switch ps-0 ms-auto my-auto\">
            <input class=\"form-check-input mt-1 ms-auto\" type=\"checkbox\" id=\"navbarFixed\" onclick=\"navbarFixed(this)\">
          </div>
        </div>
        <hr class=\"horizontal dark my-sm-4\">
        <div class=\"mt-2 mb-5 d-flex\">
          <h6 class=\"mb-0\">Light / Dark</h6>
          <div class=\"form-check form-switch ps-0 ms-auto my-auto\">
            <input class=\"form-check-input mt-1 ms-auto\" type=\"checkbox\" id=\"dark-version\" onclick=\"darkMode(this)\">
          </div>
        </div>
        <a class=\"btn bg-gradient-dark w-100\" href=\"https://www.creative-tim.com/product/argon-dashboard\">Free Download</a>
        <a class=\"btn btn-outline-dark w-100\" href=\"https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard\">View documentation</a>
        <div class=\"w-100 text-center\">
          <a class=\"github-button\" href=\"https://github.com/creativetimofficial/argon-dashboard\" data-icon=\"octicon-star\" data-size=\"large\" data-show-count=\"true\" aria-label=\"Star creativetimofficial/argon-dashboard on GitHub\">Star</a>
          <h6 class=\"mt-3\">Thank you for sharing!</h6>
          <a href=\"https://twitter.com/intent/tweet?text=Check%20Argon%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fargon-dashboard\" class=\"btn btn-dark mb-0 me-2\" target=\"_blank\">
            <i class=\"fab fa-twitter me-1\" aria-hidden=\"true\"></i> Tweet
          </a>
          <a href=\"https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/argon-dashboard\" class=\"btn btn-dark mb-0 me-2\" target=\"_blank\">
            <i class=\"fab fa-facebook-square me-1\" aria-hidden=\"true\"></i> Share
          </a>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src=\"";
        // line 197
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/core/popper.min.js"), "html", null, true);
        yield "\"></script>
  <script src=\"";
        // line 198
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/core/bootstrap.min.js"), "html", null, true);
        yield "\"></script>
  <script src=\"";
        // line 199
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/plugins/perfect-scrollbar.min.js"), "html", null, true);
        yield "\"></script>
  <script src=\"";
        // line 200
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/plugins/smooth-scrollbar.min.js"), "html", null, true);
        yield "\"></script>
  <script src=\"";
        // line 201
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/plugins/chartjs.min.js"), "html", null, true);
        yield "\"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  
  <script>
    document.addEventListener(\"DOMContentLoaded\", function() {
      // Add event listeners to the menu buttons
      document.getElementById(\"dashboard-button\").addEventListener(\"click\", function(e) {
        e.preventDefault();
        window.location.href = \"";
        // line 217
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("dashboard_page");
        yield "\";
      });
      
      document.getElementById(\"user-button\").addEventListener(\"click\", function(e) {
        e.preventDefault();
        window.location.href = \"";
        // line 222
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("user_page");
        yield "\";
      });
      
      document.getElementById(\"station-button\").addEventListener(\"click\", function(e) {
        e.preventDefault();
        window.location.href = \"";
        // line 227
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("station_page");
        yield "\";
      });
      
      document.getElementById(\"bonplan-button\").addEventListener(\"click\", function(e) {
        e.preventDefault();
        window.location.href = \"";
        // line 232
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("bonplan_page");
        yield "\";
      });
      
      document.getElementById(\"offre-button\").addEventListener(\"click\", function(e) {
        e.preventDefault();
        window.location.href = \"";
        // line 237
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("offre_page");
        yield "\";
      });
      
      document.getElementById(\"social-button\").addEventListener(\"click\", function(e) {
        e.preventDefault();
        window.location.href = \"";
        // line 242
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("social_page");
        yield "\";
      });

      // Initialize user management features if on the user page
      if (document.getElementById('usersTable')) {
        userManagement.init();
      }

      // Initialize charts if needed
      if (document.getElementById('userRoleChart')) {
        initCharts();
      }
    });
  </script>
  
  <!-- Github buttons -->
  <script async defer src=\"https://buttons.github.io/buttons.js\"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src=\"";
        // line 260
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/argon-dashboard.min.js"), "html", null, true);
        yield "\"></script>
  <!-- Custom JS for Dashboard -->
  <script src=\"";
        // line 262
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/dashAdmin.js"), "html", null, true);
        yield "\"></script>
</body>

</html>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 8
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

        yield "Airmess";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 122
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

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "dashAdmin/dashboard.html.twig";
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
        return array (  436 => 122,  413 => 8,  398 => 262,  393 => 260,  372 => 242,  364 => 237,  356 => 232,  348 => 227,  340 => 222,  332 => 217,  313 => 201,  309 => 200,  305 => 199,  301 => 198,  297 => 197,  221 => 123,  219 => 122,  211 => 117,  199 => 108,  175 => 87,  163 => 78,  153 => 71,  142 => 63,  129 => 53,  108 => 35,  104 => 34,  95 => 32,  88 => 28,  76 => 19,  63 => 9,  59 => 8,  50 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">

<head>
  <meta charset=\"utf-8\" />
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
  
    <title>{% block title %}Airmess{% endblock %}</title>
    <link rel=\"icon\" href=\"{{ asset('images/logo-airmess.png') }}\" type=\"image/png\">

  <!--     Fonts and icons     -->
  <link href=\"https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700\" rel=\"stylesheet\" />
  <!-- Nucleo Icons -->
  <link href=\"https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css\" rel=\"stylesheet\" />
  <link href=\"https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css\" rel=\"stylesheet\" />
  <!-- Font Awesome Icons -->
  <script src=\"https://kit.fontawesome.com/42d5adcbca.js\" crossorigin=\"anonymous\"></script>
  <!-- CSS Files -->
  <link id=\"pagestyle\" href=\"{{asset('css/argon-dashboard.css')}}\" rel=\"stylesheet\" />
</head>

<body class=\"g-sidenav-show   bg-gray-100\">
  <div class=\"min-height-300 bg-dark position-absolute w-100\"></div>
  <aside class=\"sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 \" id=\"sidenav-main\">
    <div class=\"sidenav-header\">
      <i class=\"fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none\" aria-hidden=\"true\" id=\"iconSidenav\"></i>
      <a class=\"navbar-brand m-0\" href=\" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html \" target=\"_blank\">
        <img src=\"{{asset('images/logo-airmess.png')}}\" width=\"40px\" height=\"45px\" class=\"navbar-brand-img h-100\" alt=\"main_logo\">
        <span class=\"ms-1 font-weight-bold\">Airmess</span>
      </a>
      <div class=\"user-info mt-3 d-flex align-items-center ps-3\">
        <img src=\"{{ asset('uploads/users/' ~ app.session.get('user_image')) }}\" alt=\"{{ app.session.get('user_name') }}\" class=\"rounded-circle\" width=\"40\" height=\"40\" onerror=\"this.src='{{ asset('images/user-avatar.svg') }}';\">
        <div class=\"ms-2\">
          <span class=\"font-weight-bold text-sm\">{{ app.session.get('user_name') }}</span>
          <small class=\"d-block text-secondary\">{{ app.session.get('user_role') }}</small>
        </div>
      </div>
    </div>
    <hr class=\"horizontal dark mt-0\">
    <div class=\"collapse navbar-collapse  w-auto \" id=\"sidenav-collapse-main\">
      <ul class=\"navbar-nav\">
        <li class=\"nav-item\">
          <a class=\"nav-link active\" href=\"#\"  id=\"dashboard-button\">
            <div class=\"icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center\">
              <i class=\"ni ni-tv-2 text-dark text-sm opacity-10\"></i>
            </div>
            <span class=\"nav-link-text ms-1\">Dashboard</span>
          </a>
        </li>
        <li class=\"nav-item\">
          <a class=\"nav-link\" href=\"#\" id=\"user-button\">
            <div class=\"icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center\">
              <img src=\"{{ asset('images/user-icon.png') }}\" alt=\"Icon\" class=\"img\" style=\"width: 25px; height: 25px;\" />
            </div>
            <span class=\"nav-link-text ms-1\">Utilisateurs</span>
          </a>
        </li>


        <li class=\"nav-item\">
          <a class=\"nav-link \"  href=\"#\" id=\"station-button\">
            <div class=\"icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center\">
              <img src=\"{{ asset('images/station-icon.png') }}\" alt=\"Icon\" class=\"img\" style=\"width: 25px; height: 25px;\" />
            </div>
            <span class=\"nav-link-text ms-1\">Stations</span>
          </a>
        </li>
        <li class=\"nav-item\">
          <a class=\"nav-link \"  href=\"#\" id=\"bonplan-button\">
            <div class=\"icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center\">
              <img src=\"{{ asset('images/bonplan-icon.png') }}\" alt=\"Icon\" class=\"img\" style=\"width: 25px; height: 25px;\" />            </div>
            <span class=\"nav-link-text ms-1\">Bon Plan</span>
          </a>
        </li>
        <li class=\"nav-item\">
          <a class=\"nav-link \"  href=\"#\" id=\"offre-button\">
            <div class=\"icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center\">
              <img src=\"{{ asset('images/offre-icon.png') }}\" alt=\"Icon\" class=\"img\" style=\"width: 25px; height: 25px;\" />
            </div>
            <span class=\"nav-link-text ms-1\">Offres</span>
          </a>
        </li>

        <li class=\"nav-item\">
          <a class=\"nav-link \"  href=\"#\" id=\"social-button\">
            <div class=\"icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center\">
              <img src=\"{{ asset('images/social-icon.png') }}\" alt=\"Icon\" class=\"img\" style=\"width: 25px; height: 25px;\" />
            </div>
            <span class=\"nav-link-text ms-1\">Social Media</span>
          </a>
        </li>
        <li class=\"nav-item mt-3\">
          <h6 class=\"ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6\">Account pages</h6>
        </li>
        <li class=\"nav-item\">
          <a class=\"nav-link \"  href=\"#\" id=\"profile-button\">
            <div class=\"icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center\">
              <i class=\"ni ni-single-02 text-dark text-sm opacity-10\"></i>
            </div>
            <span class=\"nav-link-text ms-1\">Profile</span>
          </a>
        </li>
      
      </ul>
    </div>
    <div class=\"sidenav-footer mx-3 \">
      <div class=\"card card-plain shadow-none\" id=\"sidenavCard\">
        <img class=\"w-50 mx-auto\" src=\"{{asset('img/illustrations/icon-documentation.svg')}}\" alt=\"sidebar_illustration\">
        <div class=\"card-body text-center p-3 w-100 pt-0\">
          <div class=\"docs-info\">
            <h6 class=\"mb-0\">Need help?</h6>
            <p class=\"text-xs font-weight-bold mb-0\">Please check our docs</p>
          </div>
        </div>
      </div>
      <a href=\"https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard\" target=\"_blank\" class=\"btn btn-dark btn-sm w-100 mb-3\">Airmess Pro</a>
      <a class=\"btn btn-primary btn-sm mb-0 w-100\" href=\"{{path('app_logout')}}\" type=\"button\">Se déconnecter</a>
    </div>
  </aside>
  <main class=\"main-content position-relative border-radius-lg \" id=\"content\">
    <!-- Navbar -->
    {% block content %}{% endblock %}
  </main>
  <div class=\"fixed-plugin\">
    <a class=\"fixed-plugin-button text-dark position-fixed px-3 py-2\">
      <i class=\"fa fa-cog py-2\"> </i>
    </a>
    <div class=\"card shadow-lg\">
      <div class=\"card-header pb-0 pt-3 \">
        <div class=\"float-start\">
          <h5 class=\"mt-3 mb-0\">Argon Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class=\"float-end mt-4\">
          <button class=\"btn btn-link text-dark p-0 fixed-plugin-close-button\">
            <i class=\"fa fa-close\"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class=\"horizontal dark my-1\">
      <div class=\"card-body pt-sm-3 pt-0 overflow-auto\">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class=\"mb-0\">Sidebar Colors</h6>
        </div>
        <a href=\"javascript:void(0)\" class=\"switch-trigger background-color\">
          <div class=\"badge-colors my-2 text-start\">
            <span class=\"badge filter bg-gradient-primary active\" data-color=\"primary\" onclick=\"sidebarColor(this)\"></span>
            <span class=\"badge filter bg-gradient-dark\" data-color=\"dark\" onclick=\"sidebarColor(this)\"></span>
            <span class=\"badge filter bg-gradient-info\" data-color=\"info\" onclick=\"sidebarColor(this)\"></span>
            <span class=\"badge filter bg-gradient-success\" data-color=\"success\" onclick=\"sidebarColor(this)\"></span>
            <span class=\"badge filter bg-gradient-warning\" data-color=\"warning\" onclick=\"sidebarColor(this)\"></span>
            <span class=\"badge filter bg-gradient-danger\" data-color=\"danger\" onclick=\"sidebarColor(this)\"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class=\"mt-3\">
          <h6 class=\"mb-0\">Sidenav Type</h6>
          <p class=\"text-sm\">Choose between 2 different sidenav types.</p>
        </div>
        <div class=\"d-flex\">
          <button class=\"btn bg-gradient-primary w-100 px-3 mb-2 active me-2\" data-class=\"bg-white\" onclick=\"sidebarType(this)\">White</button>
          <button class=\"btn bg-gradient-primary w-100 px-3 mb-2\" data-class=\"bg-default\" onclick=\"sidebarType(this)\">Dark</button>
        </div>
        <p class=\"text-sm d-xl-none d-block mt-2\">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class=\"d-flex my-3\">
          <h6 class=\"mb-0\">Navbar Fixed</h6>
          <div class=\"form-check form-switch ps-0 ms-auto my-auto\">
            <input class=\"form-check-input mt-1 ms-auto\" type=\"checkbox\" id=\"navbarFixed\" onclick=\"navbarFixed(this)\">
          </div>
        </div>
        <hr class=\"horizontal dark my-sm-4\">
        <div class=\"mt-2 mb-5 d-flex\">
          <h6 class=\"mb-0\">Light / Dark</h6>
          <div class=\"form-check form-switch ps-0 ms-auto my-auto\">
            <input class=\"form-check-input mt-1 ms-auto\" type=\"checkbox\" id=\"dark-version\" onclick=\"darkMode(this)\">
          </div>
        </div>
        <a class=\"btn bg-gradient-dark w-100\" href=\"https://www.creative-tim.com/product/argon-dashboard\">Free Download</a>
        <a class=\"btn btn-outline-dark w-100\" href=\"https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard\">View documentation</a>
        <div class=\"w-100 text-center\">
          <a class=\"github-button\" href=\"https://github.com/creativetimofficial/argon-dashboard\" data-icon=\"octicon-star\" data-size=\"large\" data-show-count=\"true\" aria-label=\"Star creativetimofficial/argon-dashboard on GitHub\">Star</a>
          <h6 class=\"mt-3\">Thank you for sharing!</h6>
          <a href=\"https://twitter.com/intent/tweet?text=Check%20Argon%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fargon-dashboard\" class=\"btn btn-dark mb-0 me-2\" target=\"_blank\">
            <i class=\"fab fa-twitter me-1\" aria-hidden=\"true\"></i> Tweet
          </a>
          <a href=\"https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/argon-dashboard\" class=\"btn btn-dark mb-0 me-2\" target=\"_blank\">
            <i class=\"fab fa-facebook-square me-1\" aria-hidden=\"true\"></i> Share
          </a>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src=\"{{asset('js/core/popper.min.js')}}\"></script>
  <script src=\"{{asset('js/core/bootstrap.min.js')}}\"></script>
  <script src=\"{{asset('js/plugins/perfect-scrollbar.min.js')}}\"></script>
  <script src=\"{{asset('js/plugins/smooth-scrollbar.min.js')}}\"></script>
  <script src=\"{{asset('js/plugins/chartjs.min.js')}}\"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  
  <script>
    document.addEventListener(\"DOMContentLoaded\", function() {
      // Add event listeners to the menu buttons
      document.getElementById(\"dashboard-button\").addEventListener(\"click\", function(e) {
        e.preventDefault();
        window.location.href = \"{{ path('dashboard_page') }}\";
      });
      
      document.getElementById(\"user-button\").addEventListener(\"click\", function(e) {
        e.preventDefault();
        window.location.href = \"{{ path('user_page') }}\";
      });
      
      document.getElementById(\"station-button\").addEventListener(\"click\", function(e) {
        e.preventDefault();
        window.location.href = \"{{ path('station_page') }}\";
      });
      
      document.getElementById(\"bonplan-button\").addEventListener(\"click\", function(e) {
        e.preventDefault();
        window.location.href = \"{{ path('bonplan_page') }}\";
      });
      
      document.getElementById(\"offre-button\").addEventListener(\"click\", function(e) {
        e.preventDefault();
        window.location.href = \"{{ path('offre_page') }}\";
      });
      
      document.getElementById(\"social-button\").addEventListener(\"click\", function(e) {
        e.preventDefault();
        window.location.href = \"{{ path('social_page') }}\";
      });

      // Initialize user management features if on the user page
      if (document.getElementById('usersTable')) {
        userManagement.init();
      }

      // Initialize charts if needed
      if (document.getElementById('userRoleChart')) {
        initCharts();
      }
    });
  </script>
  
  <!-- Github buttons -->
  <script async defer src=\"https://buttons.github.io/buttons.js\"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src=\"{{asset('js/argon-dashboard.min.js')}}\"></script>
  <!-- Custom JS for Dashboard -->
  <script src=\"{{asset('js/dashAdmin.js')}}\"></script>
</body>

</html>", "dashAdmin/dashboard.html.twig", "C:\\Users\\MSI\\Desktop\\Airmess_Web\\templates\\dashAdmin\\dashboard.html.twig");
    }
}
