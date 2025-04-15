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

/* message/chat.html.twig */
class __TwigTemplate_e39965077ed866a3ff00e0d1ffa23aae extends Template
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
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "message/chat.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "message/chat.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "message/chat.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
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

        // line 4
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Gestion des vélos - Chat</title>
    <style>
        /* Reset all margins and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        
        .navbar {
            display: flex;
            background: #ffffff;
            padding: 10px;
            justify-content: center;
            margin: 20px auto 0;
            gap: 20px;
            width: 90%;
            max-width: 1200px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .navbar a {
            color: black;
            text-decoration: none;
            padding: 10px 15px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .navbar .nav-link:hover {
            color: #6c99bc;
            border-bottom: 2px solid #6c99bc;
        }
        
        /* Active link */
        .navbar .nav-link.active {
            color: #6c99bc;
            border-bottom: 2px solid #6c99bc;
        }
        
        /* Zone de contenu */
        .content {
            padding: 20px;
            margin: 20px auto;
            width: 90%;
            max-width: 1200px;
        }
        
        /* Chat Container */
        .chat-container {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            height: 500px;
        }
        
        /* Chat Header */
        .chat-header {
            background-color: #6c99bc;
            color: white;
            padding: 15px;
            text-align: center;
            font-weight: bold;
        }
        
        /* Messages Area */
        .messages-area {
            flex: 1;
            overflow-y: auto;
            padding: 15px;
            display: flex;
            flex-direction: column;
        }
        
        /* Message Bubbles */
        .message {
            max-width: 70%;
            padding: 10px 15px;
            margin-bottom: 15px;
            border-radius: 18px;
            font-size: 14px;
            position: relative;
        }
        
        .user-message {
            background-color: #e1f5fe;
            color: #000;
            align-self: flex-end;
            border-bottom-right-radius: 5px;
        }
        
        .admin-message {
            background-color: #6c99bc;
            color: white;
            align-self: flex-start;
            border-bottom-left-radius: 5px;
        }
        
        .message-time {
            font-size: 11px;
            opacity: 0.7;
            margin-top: 5px;
            text-align: right;
        }
        
        /* Message Form */
        .message-form {
            display: flex;
            padding: 15px;
            background-color: #f9f9f9;
            border-top: 1px solid #e0e0e0;
        }
        
        .message-input {
            flex: 1;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 20px;
            outline: none;
            font-size: 14px;
        }
        
        .send-button {
            background-color: #6c99bc;
            color: white;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            margin-left: 10px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        
        .send-button:hover {
            background-color: #5a7f9c;
        }
        
        /* Statut de connexion */
        .connection-status {
            padding: 5px 10px;
            text-align: center;
            font-size: 12px;
            color: #777;
            background-color: #f0f0f0;
        }

        /* Style spécifique pour le formulaire Symfony */
        .form-group {
            width: 100%;
            display: flex;
        }

        /* Cache les labels de formulaire mais reste accessible */
        .form-group label {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border: 0;
        }

        /* Style pour le bouton du formulaire */
        .form-group button {
            background-color: #6c99bc;
            color: white;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            margin-left: 10px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .form-group button:hover {
            background-color: #5a7f9c;
        }
    </style>
</head>
<body>
    <!-- Menu Horizontal -->
     <div class=\"navbar\">
        <a class=\"nav-link\" onclick=\"loadPage('";
        // line 205
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reservation_transport_station");
        yield "')\">Réserver</a>
        <a class=\"nav-link\" onclick=\"loadPage('";
        // line 206
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reservation_transport_index");
        yield "')\">Mes Réservations</a>
        <a class=\"nav-link\" onclick=\"loadPage('";
        // line 207
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_reservation_transport_station");
        yield "')\">Stations</a>
        <a class=\"nav-link\" onclick=\"loadPage('";
        // line 208
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_message_voyageurs");
        yield "')\">Discussions</a>
    </div>
    
    <!-- Contenu Dynamique -->
    <div class=\"content\" id=\"pageContent\">
        <div class=\"chat-container\">
            <div class=\"chat-header\">
                Discuter avec notre service client
            </div>
            <div class=\"connection-status\">
                <span id=\"status-indicator\">En ligne</span> - Agent disponible
            </div>
            <div class=\"messages-area\" id=\"messages\">
                <!-- Chargement des messages depuis la base de données -->
                ";
        // line 222
        if (array_key_exists("messages", $context)) {
            // line 223
            yield "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["messages"]) || array_key_exists("messages", $context) ? $context["messages"] : (function () { throw new RuntimeError('Variable "messages" does not exist.', 223, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 224
                yield "                        ";
                if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["message"], "sender", [], "any", false, false, false, 224), "idU", [], "any", false, false, false, 224) == 40)) {
                    // line 225
                    yield "                            <div class=\"message user-message\">
                                ";
                    // line 226
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["message"], "content", [], "any", false, false, false, 226), "html", null, true);
                    yield "
                                <div class=\"message-time\">";
                    // line 227
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["message"], "dateM", [], "any", false, false, false, 227), "H:i"), "html", null, true);
                    yield "</div>
                            </div>
                        ";
                } else {
                    // line 230
                    yield "                            <div class=\"message admin-message\">
                                ";
                    // line 231
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["message"], "content", [], "any", false, false, false, 231), "html", null, true);
                    yield "
                                <div class=\"message-time\">";
                    // line 232
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["message"], "dateM", [], "any", false, false, false, 232), "H:i"), "html", null, true);
                    yield "</div>
                            </div>
                        ";
                }
                // line 235
                yield "                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 236
            yield "                ";
        } else {
            // line 237
            yield "                    <!-- Message de bienvenue par défaut -->
                    <div class=\"message admin-message\">
                        Bonjour ! Comment puis-je vous aider aujourd'hui concernant nos services de vélos ?
                        <div class=\"message-time\">";
            // line 240
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "H:i"), "html", null, true);
            yield "</div>
                    </div>
                ";
        }
        // line 243
        yield "            </div>
          
            <div class=\"message-form\">
                ";
        // line 246
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 246, $this->source); })()), 'form_start', ["method" => "POST", "action" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_message_new"), "attr" => ["id" => "message-form", "class" => "form-group"]]);
        yield "
                    ";
        // line 247
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 247, $this->source); })()), "content", [], "any", false, false, false, 247), 'widget', ["attr" => ["class" => "message-input", "placeholder" => "Écrivez votre message...", "id" => "message-input"]]);
        yield "
                                       
                    <button type=\"submit\" class=\"send-button\">Envoyer</button>
                ";
        // line 250
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 250, $this->source); })()), 'form_end');
        yield "
            </div>
        </div>
    </div>
    
    <script>
       document.addEventListener(\"DOMContentLoaded\", function () {
    // Faire défiler vers le bas pour montrer les derniers messages
    const messagesArea = document.getElementById('messages');
    messagesArea.scrollTop = messagesArea.scrollHeight;
    
    // Traitement du formulaire pour utiliser AJAX
    const form = document.getElementById('message-form');
    
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        
        // Récupérer le contenu du message
        const messageInput = document.getElementById('message-input');
        const messageContent = messageInput.value.trim();
        
        if (messageContent === '') return;
        
        // Afficher immédiatement le message dans l'interface
        const currentTime = new Date();
        const timeString = currentTime.getHours() + ':' + (currentTime.getMinutes() < 10 ? '0' : '') + currentTime.getMinutes();
        
        const messageElement = document.createElement('div');
        messageElement.className = 'message user-message';
        messageElement.innerHTML = `
            \${messageContent}
            <div class=\"message-time\">\${timeString}</div>
        `;
        
        messagesArea.appendChild(messageElement);
        
        // Faire défiler vers le bas
        messagesArea.scrollTop = messagesArea.scrollHeight;
        
        // Envoyer le formulaire via AJAX
        fetch(form.action, {
            method: 'POST',
            body: new FormData(form),
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.text())
        .then(html => {
            // Met à jour seulement la partie messages
            messagesArea.innerHTML = html;
            
            // Vide le champ
            messageInput.value = '';
            
            // Scroll vers le bas
            messagesArea.scrollTop = messagesArea.scrollHeight;
        })
        .catch(error => {
            console.error('Erreur lors de l\\'envoi du message:', error);
        });
    });
    
    // Fonction pour charger les messages
    function loadMessages() {
        fetch('/message/chatVoyageurs', {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.text())
        .then(html => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            const newMessages = doc.querySelector('.messages-area');
            
            if (newMessages) {
                messagesArea.innerHTML = newMessages.innerHTML;
                messagesArea.scrollTop = messagesArea.scrollHeight;
            }
        })
        .catch(error => {
            console.error('Erreur lors du chargement des messages:', error);
        });
    }
    
    // Rafraîchir les messages périodiquement
    setInterval(loadMessages, 10000);
});
    </script>
</body>
</html>
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
        return "message/chat.html.twig";
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
        return array (  379 => 250,  373 => 247,  369 => 246,  364 => 243,  358 => 240,  353 => 237,  350 => 236,  344 => 235,  338 => 232,  334 => 231,  331 => 230,  325 => 227,  321 => 226,  318 => 225,  315 => 224,  310 => 223,  308 => 222,  291 => 208,  287 => 207,  283 => 206,  279 => 205,  76 => 4,  63 => 3,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block body %}
<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Gestion des vélos - Chat</title>
    <style>
        /* Reset all margins and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        
        .navbar {
            display: flex;
            background: #ffffff;
            padding: 10px;
            justify-content: center;
            margin: 20px auto 0;
            gap: 20px;
            width: 90%;
            max-width: 1200px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .navbar a {
            color: black;
            text-decoration: none;
            padding: 10px 15px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .navbar .nav-link:hover {
            color: #6c99bc;
            border-bottom: 2px solid #6c99bc;
        }
        
        /* Active link */
        .navbar .nav-link.active {
            color: #6c99bc;
            border-bottom: 2px solid #6c99bc;
        }
        
        /* Zone de contenu */
        .content {
            padding: 20px;
            margin: 20px auto;
            width: 90%;
            max-width: 1200px;
        }
        
        /* Chat Container */
        .chat-container {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            height: 500px;
        }
        
        /* Chat Header */
        .chat-header {
            background-color: #6c99bc;
            color: white;
            padding: 15px;
            text-align: center;
            font-weight: bold;
        }
        
        /* Messages Area */
        .messages-area {
            flex: 1;
            overflow-y: auto;
            padding: 15px;
            display: flex;
            flex-direction: column;
        }
        
        /* Message Bubbles */
        .message {
            max-width: 70%;
            padding: 10px 15px;
            margin-bottom: 15px;
            border-radius: 18px;
            font-size: 14px;
            position: relative;
        }
        
        .user-message {
            background-color: #e1f5fe;
            color: #000;
            align-self: flex-end;
            border-bottom-right-radius: 5px;
        }
        
        .admin-message {
            background-color: #6c99bc;
            color: white;
            align-self: flex-start;
            border-bottom-left-radius: 5px;
        }
        
        .message-time {
            font-size: 11px;
            opacity: 0.7;
            margin-top: 5px;
            text-align: right;
        }
        
        /* Message Form */
        .message-form {
            display: flex;
            padding: 15px;
            background-color: #f9f9f9;
            border-top: 1px solid #e0e0e0;
        }
        
        .message-input {
            flex: 1;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 20px;
            outline: none;
            font-size: 14px;
        }
        
        .send-button {
            background-color: #6c99bc;
            color: white;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            margin-left: 10px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        
        .send-button:hover {
            background-color: #5a7f9c;
        }
        
        /* Statut de connexion */
        .connection-status {
            padding: 5px 10px;
            text-align: center;
            font-size: 12px;
            color: #777;
            background-color: #f0f0f0;
        }

        /* Style spécifique pour le formulaire Symfony */
        .form-group {
            width: 100%;
            display: flex;
        }

        /* Cache les labels de formulaire mais reste accessible */
        .form-group label {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border: 0;
        }

        /* Style pour le bouton du formulaire */
        .form-group button {
            background-color: #6c99bc;
            color: white;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            margin-left: 10px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .form-group button:hover {
            background-color: #5a7f9c;
        }
    </style>
</head>
<body>
    <!-- Menu Horizontal -->
     <div class=\"navbar\">
        <a class=\"nav-link\" onclick=\"loadPage('{{ path('app_reservation_transport_station') }}')\">Réserver</a>
        <a class=\"nav-link\" onclick=\"loadPage('{{ path('app_reservation_transport_index') }}')\">Mes Réservations</a>
        <a class=\"nav-link\" onclick=\"loadPage('{{ path('app_reservation_transport_station') }}')\">Stations</a>
        <a class=\"nav-link\" onclick=\"loadPage('{{ path('app_message_voyageurs') }}')\">Discussions</a>
    </div>
    
    <!-- Contenu Dynamique -->
    <div class=\"content\" id=\"pageContent\">
        <div class=\"chat-container\">
            <div class=\"chat-header\">
                Discuter avec notre service client
            </div>
            <div class=\"connection-status\">
                <span id=\"status-indicator\">En ligne</span> - Agent disponible
            </div>
            <div class=\"messages-area\" id=\"messages\">
                <!-- Chargement des messages depuis la base de données -->
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
                    <!-- Message de bienvenue par défaut -->
                    <div class=\"message admin-message\">
                        Bonjour ! Comment puis-je vous aider aujourd'hui concernant nos services de vélos ?
                        <div class=\"message-time\">{{ \"now\"|date('H:i') }}</div>
                    </div>
                {% endif %}
            </div>
          
            <div class=\"message-form\">
                {{ form_start(form, {'method': 'POST', 'action': path('app_message_new'),'attr': {'id': 'message-form', 'class': 'form-group'}}) }}
                    {{ form_widget(form.content, {'attr': {'class': 'message-input', 'placeholder': 'Écrivez votre message...', 'id': 'message-input'}}) }}
                                       
                    <button type=\"submit\" class=\"send-button\">Envoyer</button>
                {{ form_end(form) }}
            </div>
        </div>
    </div>
    
    <script>
       document.addEventListener(\"DOMContentLoaded\", function () {
    // Faire défiler vers le bas pour montrer les derniers messages
    const messagesArea = document.getElementById('messages');
    messagesArea.scrollTop = messagesArea.scrollHeight;
    
    // Traitement du formulaire pour utiliser AJAX
    const form = document.getElementById('message-form');
    
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        
        // Récupérer le contenu du message
        const messageInput = document.getElementById('message-input');
        const messageContent = messageInput.value.trim();
        
        if (messageContent === '') return;
        
        // Afficher immédiatement le message dans l'interface
        const currentTime = new Date();
        const timeString = currentTime.getHours() + ':' + (currentTime.getMinutes() < 10 ? '0' : '') + currentTime.getMinutes();
        
        const messageElement = document.createElement('div');
        messageElement.className = 'message user-message';
        messageElement.innerHTML = `
            \${messageContent}
            <div class=\"message-time\">\${timeString}</div>
        `;
        
        messagesArea.appendChild(messageElement);
        
        // Faire défiler vers le bas
        messagesArea.scrollTop = messagesArea.scrollHeight;
        
        // Envoyer le formulaire via AJAX
        fetch(form.action, {
            method: 'POST',
            body: new FormData(form),
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.text())
        .then(html => {
            // Met à jour seulement la partie messages
            messagesArea.innerHTML = html;
            
            // Vide le champ
            messageInput.value = '';
            
            // Scroll vers le bas
            messagesArea.scrollTop = messagesArea.scrollHeight;
        })
        .catch(error => {
            console.error('Erreur lors de l\\'envoi du message:', error);
        });
    });
    
    // Fonction pour charger les messages
    function loadMessages() {
        fetch('/message/chatVoyageurs', {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.text())
        .then(html => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            const newMessages = doc.querySelector('.messages-area');
            
            if (newMessages) {
                messagesArea.innerHTML = newMessages.innerHTML;
                messagesArea.scrollTop = messagesArea.scrollHeight;
            }
        })
        .catch(error => {
            console.error('Erreur lors du chargement des messages:', error);
        });
    }
    
    // Rafraîchir les messages périodiquement
    setInterval(loadMessages, 10000);
});
    </script>
</body>
</html>
{% endblock %}", "message/chat.html.twig", "C:\\Users\\meria\\OneDrive - ESPRIT\\Bureau\\Airmess_Web\\templates\\message\\chat.html.twig");
    }
}
