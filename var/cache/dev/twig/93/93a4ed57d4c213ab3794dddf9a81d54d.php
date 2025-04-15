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

/* message/_message.html.twig */
class __TwigTemplate_5a44d28b9b43330879d6b0287eb5b5de extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "message/_message.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "message/_message.html.twig"));

        // line 2
        if (array_key_exists("messages", $context)) {
            // line 3
            yield "    ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["messages"]) || array_key_exists("messages", $context) ? $context["messages"] : (function () { throw new RuntimeError('Variable "messages" does not exist.', 3, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 4
                yield "        ";
                if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["message"], "sender", [], "any", false, false, false, 4), "idU", [], "any", false, false, false, 4) == 40)) {
                    // line 5
                    yield "            <div class=\"message user-message\">
                ";
                    // line 6
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["message"], "content", [], "any", false, false, false, 6), "html", null, true);
                    yield "
                <div class=\"message-time\">";
                    // line 7
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["message"], "dateM", [], "any", false, false, false, 7), "H:i"), "html", null, true);
                    yield "</div>
            </div>
        ";
                } else {
                    // line 10
                    yield "            <div class=\"message admin-message\">
                ";
                    // line 11
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["message"], "content", [], "any", false, false, false, 11), "html", null, true);
                    yield "
                <div class=\"message-time\">";
                    // line 12
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["message"], "dateM", [], "any", false, false, false, 12), "H:i"), "html", null, true);
                    yield "</div>
            </div>
        ";
                }
                // line 15
                yield "    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        } else {
            // line 17
            yield "    ";
            // line 18
            yield "    <div class=\"message admin-message\">
        Bonjour ! Comment puis-je vous aider aujourd'hui concernant nos services de vélos ?
        <div class=\"message-time\">";
            // line 20
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "H:i"), "html", null, true);
            yield "</div>
    </div>
";
        }
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "message/_message.html.twig";
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
        return array (  97 => 20,  93 => 18,  91 => 17,  84 => 15,  78 => 12,  74 => 11,  71 => 10,  65 => 7,  61 => 6,  58 => 5,  55 => 4,  50 => 3,  48 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# templates/message/_messages.html.twig #}
{% if messages is defined %}
    {% for message in messages %}
        {% if message.sender.idU == 40 %}
            <div class=\"message user-message\">
                {{ message.content }}
                <div class=\"message-time\">{{ message.dateM|date('H:i') }}</div>
            </div>
        {% else %}
            <div class=\"message admin-message\">
                {{ message.content }}
                <div class=\"message-time\">{{ message.dateM|date('H:i') }}</div>
            </div>
        {% endif %}
    {% endfor %}
{% else %}
    {# Message de bienvenue par défaut #}
    <div class=\"message admin-message\">
        Bonjour ! Comment puis-je vous aider aujourd'hui concernant nos services de vélos ?
        <div class=\"message-time\">{{ \"now\"|date('H:i') }}</div>
    </div>
{% endif %}", "message/_message.html.twig", "C:\\Users\\MSI\\Desktop\\Airmess_Web\\templates\\message\\_message.html.twig");
    }
}
