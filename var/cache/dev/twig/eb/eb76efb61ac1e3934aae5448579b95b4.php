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

/* reservation_transport/show.html.twig */
class __TwigTemplate_51379d4bb8e5b7d7e44d142c5904537d extends Template
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
        return "dashboardVoyageurs/dashboardVoyageurs.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "reservation_transport/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "reservation_transport/show.html.twig"));

        $this->parent = $this->loadTemplate("dashboardVoyageurs/dashboardVoyageurs.html.twig", "reservation_transport/show.html.twig", 1);
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

        yield "ReservationTransport";
        
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
        yield "    <h1>ReservationTransport</h1>

    <table class=\"table\">
        <tbody>
            <tr>
                <th>Id</th>
                <td>";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["reservation_transport"]) || array_key_exists("reservation_transport", $context) ? $context["reservation_transport"] : (function () { throw new RuntimeError('Variable "reservation_transport" does not exist.', 12, $this->source); })()), "id", [], "any", false, false, false, 12), "html", null, true);
        yield "</td>
            </tr>
            <tr>
                <th>DateRes</th>
                <td>";
        // line 16
        yield ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["reservation_transport"]) || array_key_exists("reservation_transport", $context) ? $context["reservation_transport"] : (function () { throw new RuntimeError('Variable "reservation_transport" does not exist.', 16, $this->source); })()), "dateRes", [], "any", false, false, false, 16)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["reservation_transport"]) || array_key_exists("reservation_transport", $context) ? $context["reservation_transport"] : (function () { throw new RuntimeError('Variable "reservation_transport" does not exist.', 16, $this->source); })()), "dateRes", [], "any", false, false, false, 16), "Y-m-d H:i:s"), "html", null, true)) : (""));
        yield "</td>
            </tr>
            <tr>
                <th>DateFin</th>
                <td>";
        // line 20
        yield ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["reservation_transport"]) || array_key_exists("reservation_transport", $context) ? $context["reservation_transport"] : (function () { throw new RuntimeError('Variable "reservation_transport" does not exist.', 20, $this->source); })()), "dateFin", [], "any", false, false, false, 20)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["reservation_transport"]) || array_key_exists("reservation_transport", $context) ? $context["reservation_transport"] : (function () { throw new RuntimeError('Variable "reservation_transport" does not exist.', 20, $this->source); })()), "dateFin", [], "any", false, false, false, 20), "Y-m-d H:i:s"), "html", null, true)) : (""));
        yield "</td>
            </tr>
            <tr>
                <th>Prix</th>
                <td>";
        // line 24
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["reservation_transport"]) || array_key_exists("reservation_transport", $context) ? $context["reservation_transport"] : (function () { throw new RuntimeError('Variable "reservation_transport" does not exist.', 24, $this->source); })()), "prix", [], "any", false, false, false, 24), "html", null, true);
        yield "</td>
            </tr>
            <tr>
                <th>Statut</th>
                <td>";
        // line 28
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["reservation_transport"]) || array_key_exists("reservation_transport", $context) ? $context["reservation_transport"] : (function () { throw new RuntimeError('Variable "reservation_transport" does not exist.', 28, $this->source); })()), "statut", [], "any", false, false, false, 28), "html", null, true);
        yield "</td>
            </tr>
            <tr>
                <th>Reference</th>
                <td>";
        // line 32
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["reservation_transport"]) || array_key_exists("reservation_transport", $context) ? $context["reservation_transport"] : (function () { throw new RuntimeError('Variable "reservation_transport" does not exist.', 32, $this->source); })()), "reference", [], "any", false, false, false, 32), "html", null, true);
        yield "</td>
            </tr>
            <tr>
                <th>NombreVelo</th>
                <td>";
        // line 36
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["reservation_transport"]) || array_key_exists("reservation_transport", $context) ? $context["reservation_transport"] : (function () { throw new RuntimeError('Variable "reservation_transport" does not exist.', 36, $this->source); })()), "nombreVelo", [], "any", false, false, false, 36), "html", null, true);
        yield "</td>
            </tr>
        </tbody>
    </table>

    <a href=\"";
        // line 41
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reservation_transport_index");
        yield "\">back to list</a>

    <a href=\"";
        // line 43
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reservation_transport_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["reservation_transport"]) || array_key_exists("reservation_transport", $context) ? $context["reservation_transport"] : (function () { throw new RuntimeError('Variable "reservation_transport" does not exist.', 43, $this->source); })()), "id", [], "any", false, false, false, 43)]), "html", null, true);
        yield "\">edit</a>

    ";
        // line 45
        yield Twig\Extension\CoreExtension::include($this->env, $context, "reservation_transport/_delete_form.html.twig");
        yield "
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
        return "reservation_transport/show.html.twig";
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
        return array (  168 => 45,  163 => 43,  158 => 41,  150 => 36,  143 => 32,  136 => 28,  129 => 24,  122 => 20,  115 => 16,  108 => 12,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'dashboardVoyageurs/dashboardVoyageurs.html.twig' %}

{% block title %}ReservationTransport{% endblock %}

{% block body %}
    <h1>ReservationTransport</h1>

    <table class=\"table\">
        <tbody>
            <tr>
                <th>Id</th>
                <td>{{ reservation_transport.id }}</td>
            </tr>
            <tr>
                <th>DateRes</th>
                <td>{{ reservation_transport.dateRes ? reservation_transport.dateRes|date('Y-m-d H:i:s') : '' }}</td>
            </tr>
            <tr>
                <th>DateFin</th>
                <td>{{ reservation_transport.dateFin ? reservation_transport.dateFin|date('Y-m-d H:i:s') : '' }}</td>
            </tr>
            <tr>
                <th>Prix</th>
                <td>{{ reservation_transport.prix }}</td>
            </tr>
            <tr>
                <th>Statut</th>
                <td>{{ reservation_transport.statut }}</td>
            </tr>
            <tr>
                <th>Reference</th>
                <td>{{ reservation_transport.reference }}</td>
            </tr>
            <tr>
                <th>NombreVelo</th>
                <td>{{ reservation_transport.nombreVelo }}</td>
            </tr>
        </tbody>
    </table>

    <a href=\"{{ path('app_reservation_transport_index') }}\">back to list</a>

    <a href=\"{{ path('app_reservation_transport_edit', {'id': reservation_transport.id}) }}\">edit</a>

    {{ include('reservation_transport/_delete_form.html.twig') }}
{% endblock %}", "reservation_transport/show.html.twig", "C:\\Users\\meria\\OneDrive - ESPRIT\\Bureau\\Airmess_Web\\templates\\reservation_transport\\show.html.twig");
    }
}
