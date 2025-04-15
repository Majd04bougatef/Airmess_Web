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

/* reservation_transport/index.html.twig */
class __TwigTemplate_bfb6351b7e9567b4a75604138fb1c1fc extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "reservation_transport/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "reservation_transport/index.html.twig"));

        $this->parent = $this->loadTemplate("dashVoyageurs/dashboardVoyageurs.html.twig", "reservation_transport/index.html.twig", 1);
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

        yield "Mes Réservations";
        
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
    
    .card {
        border-radius: 15px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        border: none;
        margin-bottom: 2rem;
        overflow: hidden;
    }
    
    .card-header {
        padding: 1.25rem 1.5rem;
        background-color: #fff;
        border-bottom: 1px solid #f0f2f5;
    }
    
    .card-header h6 {
        font-size: 1.1rem;
        font-weight: 600;
        color: #344767;
        margin: 0;
    }
    
    .table {
        margin-bottom: 0;
    }
    
    .table th {
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        color: #8392ab;
        padding: 1rem 1.5rem;
        border-bottom: 1px solid #f0f2f5;
    }
    
    .table td {
        padding: 1rem 1.5rem;
        vertical-align: middle;
        border-color: #f0f2f5;
    }
    
    .font-weight-bold {
        font-weight: 600 !important;
        color: #344767;
    }
    
    .badge {
        font-size: 0.75rem;
        font-weight: 600;
        padding: 0.35em 0.65em;
        border-radius: 6px;
    }
    
    .badge-success {
        background-color: #2dce89;
        color: white;
    }
    
    .badge-warning {
        background-color: #fb6340;
        color: white;
    }
    
    .badge-info {
        background-color: #11cdef;
        color: white;
    }
    
    .action-btn {
        padding: 0.5rem 0.75rem;
        border-radius: 7px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        transition: all 0.2s ease;
    }
    
    .btn-view {
        background-color: #5e72e4;
        color: white;
        border: none;
    }
    
    .btn-view:hover {
        background-color: #324cdd;
        transform: translateY(-1px);
        box-shadow: 0 4px 10px rgba(50, 76, 221, 0.25);
    }
    
    .btn-edit {
        background-color: #11cdef;
        color: white;
        border: none;
    }
    
    .btn-edit:hover {
        background-color: #0da5c0;
        transform: translateY(-1px);
        box-shadow: 0 4px 10px rgba(17, 205, 239, 0.25);
    }
    
    .btn-delete {
        background-color: #f5365c;
        color: white;
        border: none;
    }
    
    .btn-delete:hover {
        background-color: #ea0034;
        transform: translateY(-1px);
        box-shadow: 0 4px 10px rgba(245, 54, 92, 0.25);
    }
    
    .actions-cell {
        display: flex;
        gap: 0.5rem;
    }

    .empty-state {
        text-align: center;
        padding: 3rem 1rem;
        color: #8392ab;
    }
    
    .empty-state i {
        font-size: 3rem;
        margin-bottom: 1rem;
        color: #e9ecef;
    }
    
    .empty-state h4 {
        font-size: 1.25rem;
        color: #344767;
        margin-bottom: 0.5rem;
    }
    
    .empty-state p {
        font-size: 0.875rem;
        margin-bottom: 1.5rem;
    }
    
    .btn-new-reservation {
        background-color: #5e72e4;
        color: white;
        padding: 0.5rem 1.25rem;
        border-radius: 7px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.2s ease;
    }
    
    .btn-new-reservation:hover {
        background-color: #324cdd;
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(94, 114, 228, 0.25);
        color: white;
        text-decoration: none;
    }
</style>

<div class=\"page-header\">
    <h2 class=\"page-title\">Mes Réservations</h2>
    <p class=\"page-subtitle\">Consultez et gérez vos réservations de vélos</p>
</div>

<div class=\"card\">
    <div class=\"card-header d-flex justify-content-between align-items-center\">
        <h6>Liste des réservations</h6>
        <a href=\"";
        // line 195
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reservation_transport_station");
        yield "\" class=\"btn-new-reservation\">
            <i class=\"fas fa-plus\"></i> Nouvelle réservation
        </a>
    </div>
    
    <div class=\"card-body p-0\">
        ";
        // line 201
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["reservation_transports"]) || array_key_exists("reservation_transports", $context) ? $context["reservation_transports"] : (function () { throw new RuntimeError('Variable "reservation_transports" does not exist.', 201, $this->source); })())) > 0)) {
            // line 202
            yield "            <div class=\"table-responsive\">
                <table class=\"table align-items-center\">
                    <thead>
                        <tr>
                            <th>Référence</th>
                            <th>Date de début</th>
                            <th>Date de fin</th>
                            <th>Durée</th>
                            <th>Vélos</th>
                            <th>Prix</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
            // line 217
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["reservation_transports"]) || array_key_exists("reservation_transports", $context) ? $context["reservation_transports"] : (function () { throw new RuntimeError('Variable "reservation_transports" does not exist.', 217, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["reservation_transport"]) {
                // line 218
                yield "                            <tr>
                                <td>
                                    <p class=\"text-sm font-weight-bold mb-0\">";
                // line 220
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["reservation_transport"], "reference", [], "any", false, false, false, 220), "html", null, true);
                yield "</p>
                                </td>
                                <td>
                                    <span class=\"text-xs font-weight-bold\">";
                // line 223
                yield ((CoreExtension::getAttribute($this->env, $this->source, $context["reservation_transport"], "dateRes", [], "any", false, false, false, 223)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["reservation_transport"], "dateRes", [], "any", false, false, false, 223), "d/m/Y à H:i"), "html", null, true)) : (""));
                yield "</span>
                                </td>
                                <td>
                                    <span class=\"text-xs font-weight-bold\">";
                // line 226
                yield ((CoreExtension::getAttribute($this->env, $this->source, $context["reservation_transport"], "dateFin", [], "any", false, false, false, 226)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["reservation_transport"], "dateFin", [], "any", false, false, false, 226), "d/m/Y à H:i"), "html", null, true)) : (""));
                yield "</span>
                                </td>
                                <td>
                                    <span class=\"text-xs font-weight-bold\">
                                        ";
                // line 230
                $context["interval"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["reservation_transport"], "dateRes", [], "any", false, false, false, 230), "diff", [CoreExtension::getAttribute($this->env, $this->source, $context["reservation_transport"], "dateFin", [], "any", false, false, false, 230)], "method", false, false, false, 230);
                // line 231
                yield "                                        ";
                $context["hours"] = (CoreExtension::getAttribute($this->env, $this->source, (isset($context["interval"]) || array_key_exists("interval", $context) ? $context["interval"] : (function () { throw new RuntimeError('Variable "interval" does not exist.', 231, $this->source); })()), "h", [], "any", false, false, false, 231) + (CoreExtension::getAttribute($this->env, $this->source, (isset($context["interval"]) || array_key_exists("interval", $context) ? $context["interval"] : (function () { throw new RuntimeError('Variable "interval" does not exist.', 231, $this->source); })()), "days", [], "any", false, false, false, 231) * 24));
                // line 232
                yield "                                        ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["hours"]) || array_key_exists("hours", $context) ? $context["hours"] : (function () { throw new RuntimeError('Variable "hours" does not exist.', 232, $this->source); })()), "html", null, true);
                yield " heure";
                if (((isset($context["hours"]) || array_key_exists("hours", $context) ? $context["hours"] : (function () { throw new RuntimeError('Variable "hours" does not exist.', 232, $this->source); })()) > 1)) {
                    yield "s";
                }
                // line 233
                yield "                                    </span>
                                </td>
                                <td>
                                    <span class=\"text-xs font-weight-bold\">";
                // line 236
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["reservation_transport"], "nombreVelo", [], "any", false, false, false, 236), "html", null, true);
                yield "</span>
                                </td>
                                <td>
                                    <span class=\"text-xs font-weight-bold\">";
                // line 239
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["reservation_transport"], "prix", [], "any", false, false, false, 239), "html", null, true);
                yield "€</span>
                                </td>
                                <td>
                                    <span class=\"badge ";
                // line 242
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["reservation_transport"], "statut", [], "any", false, false, false, 242) == "confirmé")) {
                    yield "badge-success";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, $context["reservation_transport"], "statut", [], "any", false, false, false, 242) == "en cours")) {
                    yield "badge-warning";
                } else {
                    yield "badge-info";
                }
                yield "\">
                                        ";
                // line 243
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["reservation_transport"], "statut", [], "any", false, false, false, 243), "html", null, true);
                yield "
                                    </span>
                                </td>
                                <td class=\"actions-cell\">
                                    <a href=\"";
                // line 247
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reservation_transport_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["reservation_transport"], "id", [], "any", false, false, false, 247)]), "html", null, true);
                yield "\" class=\"action-btn btn-view\" title=\"Voir les détails\">
                                        <i class=\"fas fa-eye\"></i>
                                    </a>
                                    
                                    <a href=\"";
                // line 251
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reservation_transport_chat", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["reservation_transport"], "id", [], "any", false, false, false, 251)]), "html", null, true);
                yield "\" class=\"action-btn btn-primary\" style=\"background-color: #11cdef;\" title=\"Discuter avec le service client\">
                                        <i class=\"fas fa-comments\"></i>
                                    </a>
                                    
                                    <a href=\"";
                // line 255
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reservation_transport_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["reservation_transport"], "id", [], "any", false, false, false, 255)]), "html", null, true);
                yield "\" class=\"action-btn btn-edit\" title=\"Modifier\">
                                        <i class=\"fas fa-pencil-alt\"></i>
                                    </a>
                                    
                                    <form method=\"post\" action=\"";
                // line 259
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reservation_transport_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["reservation_transport"], "id", [], "any", false, false, false, 259)]), "html", null, true);
                yield "\" style=\"display:inline;\">
                                        <input type=\"hidden\" name=\"_token\" value=\"";
                // line 260
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["reservation_transport"], "id", [], "any", false, false, false, 260))), "html", null, true);
                yield "\">
                                        <button type=\"submit\" class=\"action-btn btn-delete\" onclick=\"return confirm('Êtes-vous sûr de vouloir annuler cette réservation ?');\" title=\"Supprimer\">
                                            <i class=\"fas fa-trash\"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['reservation_transport'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 268
            yield "                    </tbody>
                </table>
            </div>
        ";
        } else {
            // line 272
            yield "            <div class=\"empty-state\">
                <i class=\"fas fa-bicycle\"></i>
                <h4>Aucune réservation trouvée</h4>
                <p>Vous n'avez pas encore effectué de réservation de vélo.</p>
                <a href=\"";
            // line 276
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reservation_transport_station");
            yield "\" class=\"btn-new-reservation\">
                    <i class=\"fas fa-plus\"></i> Réserver maintenant
                </a>
            </div>
        ";
        }
        // line 281
        yield "    </div>
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
        return "reservation_transport/index.html.twig";
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
        return array (  451 => 281,  443 => 276,  437 => 272,  431 => 268,  417 => 260,  413 => 259,  406 => 255,  399 => 251,  392 => 247,  385 => 243,  375 => 242,  369 => 239,  363 => 236,  358 => 233,  351 => 232,  348 => 231,  346 => 230,  339 => 226,  333 => 223,  327 => 220,  323 => 218,  319 => 217,  302 => 202,  300 => 201,  291 => 195,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'dashVoyageurs/dashboardVoyageurs.html.twig' %}

{% block title %}Mes Réservations{% endblock %}

{% block body %}
<style>
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
    
    .card {
        border-radius: 15px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        border: none;
        margin-bottom: 2rem;
        overflow: hidden;
    }
    
    .card-header {
        padding: 1.25rem 1.5rem;
        background-color: #fff;
        border-bottom: 1px solid #f0f2f5;
    }
    
    .card-header h6 {
        font-size: 1.1rem;
        font-weight: 600;
        color: #344767;
        margin: 0;
    }
    
    .table {
        margin-bottom: 0;
    }
    
    .table th {
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        color: #8392ab;
        padding: 1rem 1.5rem;
        border-bottom: 1px solid #f0f2f5;
    }
    
    .table td {
        padding: 1rem 1.5rem;
        vertical-align: middle;
        border-color: #f0f2f5;
    }
    
    .font-weight-bold {
        font-weight: 600 !important;
        color: #344767;
    }
    
    .badge {
        font-size: 0.75rem;
        font-weight: 600;
        padding: 0.35em 0.65em;
        border-radius: 6px;
    }
    
    .badge-success {
        background-color: #2dce89;
        color: white;
    }
    
    .badge-warning {
        background-color: #fb6340;
        color: white;
    }
    
    .badge-info {
        background-color: #11cdef;
        color: white;
    }
    
    .action-btn {
        padding: 0.5rem 0.75rem;
        border-radius: 7px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        transition: all 0.2s ease;
    }
    
    .btn-view {
        background-color: #5e72e4;
        color: white;
        border: none;
    }
    
    .btn-view:hover {
        background-color: #324cdd;
        transform: translateY(-1px);
        box-shadow: 0 4px 10px rgba(50, 76, 221, 0.25);
    }
    
    .btn-edit {
        background-color: #11cdef;
        color: white;
        border: none;
    }
    
    .btn-edit:hover {
        background-color: #0da5c0;
        transform: translateY(-1px);
        box-shadow: 0 4px 10px rgba(17, 205, 239, 0.25);
    }
    
    .btn-delete {
        background-color: #f5365c;
        color: white;
        border: none;
    }
    
    .btn-delete:hover {
        background-color: #ea0034;
        transform: translateY(-1px);
        box-shadow: 0 4px 10px rgba(245, 54, 92, 0.25);
    }
    
    .actions-cell {
        display: flex;
        gap: 0.5rem;
    }

    .empty-state {
        text-align: center;
        padding: 3rem 1rem;
        color: #8392ab;
    }
    
    .empty-state i {
        font-size: 3rem;
        margin-bottom: 1rem;
        color: #e9ecef;
    }
    
    .empty-state h4 {
        font-size: 1.25rem;
        color: #344767;
        margin-bottom: 0.5rem;
    }
    
    .empty-state p {
        font-size: 0.875rem;
        margin-bottom: 1.5rem;
    }
    
    .btn-new-reservation {
        background-color: #5e72e4;
        color: white;
        padding: 0.5rem 1.25rem;
        border-radius: 7px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.2s ease;
    }
    
    .btn-new-reservation:hover {
        background-color: #324cdd;
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(94, 114, 228, 0.25);
        color: white;
        text-decoration: none;
    }
</style>

<div class=\"page-header\">
    <h2 class=\"page-title\">Mes Réservations</h2>
    <p class=\"page-subtitle\">Consultez et gérez vos réservations de vélos</p>
</div>

<div class=\"card\">
    <div class=\"card-header d-flex justify-content-between align-items-center\">
        <h6>Liste des réservations</h6>
        <a href=\"{{ path('app_reservation_transport_station') }}\" class=\"btn-new-reservation\">
            <i class=\"fas fa-plus\"></i> Nouvelle réservation
        </a>
    </div>
    
    <div class=\"card-body p-0\">
        {% if reservation_transports|length > 0 %}
            <div class=\"table-responsive\">
                <table class=\"table align-items-center\">
                    <thead>
                        <tr>
                            <th>Référence</th>
                            <th>Date de début</th>
                            <th>Date de fin</th>
                            <th>Durée</th>
                            <th>Vélos</th>
                            <th>Prix</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {% for reservation_transport in reservation_transports %}
                            <tr>
                                <td>
                                    <p class=\"text-sm font-weight-bold mb-0\">{{ reservation_transport.reference }}</p>
                                </td>
                                <td>
                                    <span class=\"text-xs font-weight-bold\">{{ reservation_transport.dateRes ? reservation_transport.dateRes|date('d/m/Y à H:i') : '' }}</span>
                                </td>
                                <td>
                                    <span class=\"text-xs font-weight-bold\">{{ reservation_transport.dateFin ? reservation_transport.dateFin|date('d/m/Y à H:i') : '' }}</span>
                                </td>
                                <td>
                                    <span class=\"text-xs font-weight-bold\">
                                        {% set interval = reservation_transport.dateRes.diff(reservation_transport.dateFin) %}
                                        {% set hours = interval.h + (interval.days * 24) %}
                                        {{ hours }} heure{% if hours > 1 %}s{% endif %}
                                    </span>
                                </td>
                                <td>
                                    <span class=\"text-xs font-weight-bold\">{{ reservation_transport.nombreVelo }}</span>
                                </td>
                                <td>
                                    <span class=\"text-xs font-weight-bold\">{{ reservation_transport.prix }}€</span>
                                </td>
                                <td>
                                    <span class=\"badge {% if reservation_transport.statut == 'confirmé' %}badge-success{% elseif reservation_transport.statut == 'en cours' %}badge-warning{% else %}badge-info{% endif %}\">
                                        {{ reservation_transport.statut }}
                                    </span>
                                </td>
                                <td class=\"actions-cell\">
                                    <a href=\"{{ path('app_reservation_transport_show', {'id': reservation_transport.id}) }}\" class=\"action-btn btn-view\" title=\"Voir les détails\">
                                        <i class=\"fas fa-eye\"></i>
                                    </a>
                                    
                                    <a href=\"{{ path('app_reservation_transport_chat', {'id': reservation_transport.id}) }}\" class=\"action-btn btn-primary\" style=\"background-color: #11cdef;\" title=\"Discuter avec le service client\">
                                        <i class=\"fas fa-comments\"></i>
                                    </a>
                                    
                                    <a href=\"{{ path('app_reservation_transport_edit', {'id': reservation_transport.id}) }}\" class=\"action-btn btn-edit\" title=\"Modifier\">
                                        <i class=\"fas fa-pencil-alt\"></i>
                                    </a>
                                    
                                    <form method=\"post\" action=\"{{ path('app_reservation_transport_delete', {'id': reservation_transport.id}) }}\" style=\"display:inline;\">
                                        <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ reservation_transport.id) }}\">
                                        <button type=\"submit\" class=\"action-btn btn-delete\" onclick=\"return confirm('Êtes-vous sûr de vouloir annuler cette réservation ?');\" title=\"Supprimer\">
                                            <i class=\"fas fa-trash\"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        {% endfor %}
                    </tbody>
                </table>
            </div>
        {% else %}
            <div class=\"empty-state\">
                <i class=\"fas fa-bicycle\"></i>
                <h4>Aucune réservation trouvée</h4>
                <p>Vous n'avez pas encore effectué de réservation de vélo.</p>
                <a href=\"{{ path('app_reservation_transport_station') }}\" class=\"btn-new-reservation\">
                    <i class=\"fas fa-plus\"></i> Réserver maintenant
                </a>
            </div>
        {% endif %}
    </div>
</div>
{% endblock %}", "reservation_transport/index.html.twig", "C:\\Users\\MSI\\Desktop\\Airmess_Web\\templates\\reservation_transport\\index.html.twig");
    }
}
