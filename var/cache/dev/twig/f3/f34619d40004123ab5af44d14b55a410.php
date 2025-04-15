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

/* message/chat_content.html.twig */
class __TwigTemplate_53c71e36f336a987df38ba5594296229 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "message/chat_content.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "message/chat_content.html.twig"));

        // line 1
        if (array_key_exists("messages", $context)) {
            // line 2
            yield "    ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["messages"]) || array_key_exists("messages", $context) ? $context["messages"] : (function () { throw new RuntimeError('Variable "messages" does not exist.', 2, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 3
                yield "        ";
                if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["message"], "sender", [], "any", false, false, false, 3), "id", [], "any", false, false, false, 3) == 40)) {
                    // line 4
                    yield "            <div class=\"message user-message\">
                ";
                    // line 5
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["message"], "content", [], "any", false, false, false, 5), "html", null, true);
                    yield "
                <div class=\"message-time\">";
                    // line 6
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["message"], "createdAt", [], "any", false, false, false, 6), "H:i"), "html", null, true);
                    yield "</div>
            </div>
        ";
                } else {
                    // line 9
                    yield "            <div class=\"message admin-message\">
                ";
                    // line 10
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["message"], "content", [], "any", false, false, false, 10), "html", null, true);
                    yield "
                <div class=\"message-time\">";
                    // line 11
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["message"], "createdAt", [], "any", false, false, false, 11), "H:i"), "html", null, true);
                    yield "</div>
            </div>
        ";
                }
                // line 14
                yield "    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        } else {
            // line 16
            yield "    <!-- Message de bienvenue par défaut -->
    <div class=\"message admin-message\">
        Bonjour ! Comment puis-je vous aider aujourd'hui concernant nos services de vélos ?
        <div class=\"message-time\">";
            // line 19
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
        return "message/chat_content.html.twig";
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
        return array (  96 => 19,  91 => 16,  84 => 14,  78 => 11,  74 => 10,  71 => 9,  65 => 6,  61 => 5,  58 => 4,  55 => 3,  50 => 2,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% if messages is defined %}
    {% for message in messages %}
        {% if message.sender.id == 40 %}
            <div class=\"message user-message\">
                {{ message.content }}
                <div class=\"message-time\">{{ message.createdAt|date('H:i') }}</div>
            </div>
        {% else %}
            <div class=\"message admin-message\">
                {{ message.content }}
                <div class=\"message-time\">{{ message.createdAt|date('H:i') }}</div>
            </div>
        {% endif %}
    {% endfor %}
{% else %}
    <!-- Message de bienvenue par défaut -->
    <div class=\"message admin-message\">
        Bonjour ! Comment puis-je vous aider aujourd'hui concernant nos services de vélos ?
        <div class=\"message-time\">{{ \"now\"|date('H:i') }}</div>
    </div>
{% endif %}", "message/chat_content.html.twig", "C:\\Users\\meria\\OneDrive - ESPRIT\\Bureau\\Airmess_Web\\templates\\message\\chat_content.html.twig");
    }
}
