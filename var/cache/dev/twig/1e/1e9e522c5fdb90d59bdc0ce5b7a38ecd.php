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

/* reservation_transport/step-navigation.html.twig */
class __TwigTemplate_bd9e506502e25576c6dc0dfdfe81063f extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "reservation_transport/step-navigation.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "reservation_transport/step-navigation.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>4-Step Navigation</title>
    <script src=\"";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/station.js"), "html", null, true);
        yield "\"></script>
     
    <style>
        
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
        
        .steps-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 40px;
            position: relative;
        }
        
        .steps-container::before {
            content: '';
            position: absolute;
            top: 20px;
            left: 0;
            width: 100%;
            height: 4px;
            background-color: #e0e0e0;
            z-index: 1;
        }
        
        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            z-index: 2;
            width: 25%;
        }
        
        .step-number {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #e0e0e0;
            color: #666;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 10px;
            transition: all 0.3s ease;
        }
        
        .step-title {
            font-size: 14px;
            color: #666;
            text-align: center;
            transition: all 0.3s ease;
        }
        
        .step.active .step-number {
            background-color: #4CAF50;
            color: white;
        }
        
        .step.active .step-title {
            color: #4CAF50;
            font-weight: bold;
        }
        
        .step.completed .step-number {
            background-color: #4CAF50;
            color: white;
        }
        
        .step-content {
            display: none;
            padding: 20px;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            margin-bottom: 30px;
        }
        
        .step-content.active {
            display: block;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }
        
        input, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        
        button:hover {
            background-color: #45a049;
        }
        
        .navigation-buttons {
            display: flex;
            justify-content: space-between;
        }
        
        .back-button {
            background-color: #f5f5f5;
            color: #333;
        }
        
        .back-button:hover {
            background-color: #e0e0e0;
        }
        
        .recap-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }
        
        .payment-method {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .payment-method input[type=\"radio\"] {
            width: auto;
            margin-right: 10px;
        }
        
        .success-message {
            text-align: center;
            padding: 20px;
        }
        
        .success-icon {
            color: #4CAF50;
            font-size: 60px;
            margin-bottom: 20px;
        }
        
        @media (max-width: 600px) {
            .step-title {
                font-size: 12px;
            }
            
            .steps-container::before {
                top: 15px;
            }
        }
    </style>
</head>
<body>
    <div class=\"container\">
        <h1>Booking Process</h1>
        
        <div class=\"steps-container\">
            <div class=\"step active\" id=\"step1\">
                <div class=\"step-number\">1</div>
                <div class=\"step-title\">Reservation</div>
            </div>
            <div class=\"step\" id=\"step2\">
                <div class=\"step-number\">2</div>
                <div class=\"step-title\">Recap</div>
            </div>
            <div class=\"step\" id=\"step3\">
                <div class=\"step-number\">3</div>
                <div class=\"step-title\">Payment</div>
            </div>
            <div class=\"step\" id=\"step4\">
                <div class=\"step-number\">4</div>
                <div class=\"step-title\">Success</div>
            </div>
        </div>
        
        <div class=\"step-content active\" id=\"step1-content\">
            <h2>Make Yourn</h2>
            <form id=\"reservation-form\">
                <div class=\"form-group\">
                    <label for=\"name\">Full Name</label>
<input type=\"text\" id=\"name\" name=\"name\" autocomplete=\"name\" required>
                </div>
                <div class=\"form-group\">
                    <label for=\"email\">Email Address</label>
<input type=\"email\" id=\"email\" name=\"email\" autocomplete=\"email\" required>
                </div>
                <div class=\"form-group\">
                    <label for=\"date\">Date</label>
<input type=\"date\" id=\"date\" name=\"date\" autocomplete=\"bday\" required>
                </div>
                <div class=\"form-group\">
                    <label for=\"guests\">Number of Guests</label>
<select id=\"guests\" name=\"guests\" autocomplete=\"off\" required>
                        <option value=\"\">Select</option>
                        <option value=\"1\">1</option>
                        <option value=\"2\">2</option>
                        <option value=\"3\">3</option>
                        <option value=\"4\">4</option>
                        <option value=\"5\">5+</option>
                    </select>
                </div>
                <div class=\"form-group\">
                    <label for=\"special-requests\">Special Requests</label>
                    <input type=\"text\" id=\"special-requests\">
                </div>
                <div class=\"navigation-buttons\">
                    <div></div>
                    <button type=\"button\" id=\"next-to-recap\">Continue to Recap</button>
                </div>
            </form>
        </div>
        
        <div class=\"step-content\" id=\"step2-content\">
            <h2>Reservation Recap</h2>
            <div id=\"recap-content\">
                <div class=\"recap-item\">
                    <strong>Name:</strong>
                    <span id=\"recap-name\"></span>
                </div>
                <div class=\"recap-item\">
                    <strong>Email:</strong>
                    <span id=\"recap-email\"></span>
                </div>
                <div class=\"recap-item\">
                    <strong>Date:</strong>
                    <span id=\"recap-date\"></span>
                </div>
                <div class=\"recap-item\">
                    <strong>Guests:</strong>
                    <span id=\"recap-guests\"></span>
                </div>
                <div class=\"recap-item\">
                    <strong>Special Requests:</strong>
                    <span id=\"recap-requests\"></span>
                </div>
            </div>
            <div class=\"navigation-buttons\">
                <button type=\"button\" class=\"back-button\" id=\"back-to-reservation\">Back</button>
                <button type=\"button\" id=\"next-to-payment\">Proceed to Payment</button>
            </div>
        </div>
        
        <div class=\"step-content\" id=\"step3-content\">
            <h2>Payment Details</h2>
            <form id=\"payment-form\">
                <div class=\"form-group\">
                    <label>Payment Method</label>
                    <div class=\"payment-method\">
                        <input type=\"radio\" id=\"credit-card\" name=\"payment\" value=\"credit-card\" checked>
                        <label for=\"credit-card\">Credit Card</label>
                    </div>
                    <div class=\"payment-method\">
                        <input type=\"radio\" id=\"paypal\" name=\"payment\" value=\"paypal\">
                        <label for=\"paypal\">PayPal</label>
                    </div>
                </div>
                <div id=\"credit-card-fields\">
                    <div class=\"form-group\">
                        <label for=\"card-number\">Card Number</label>
                        <input type=\"text\" id=\"card-number\" placeholder=\"1234 5678 9012 3456\">
                    </div>
                    <div class=\"form-group\">
                        <label for=\"card-name\">Name on Card</label>
                        <input type=\"text\" id=\"card-name\">
                    </div>
                    <div class=\"form-group\">
                        <label for=\"expiry-date\">Expiry Date</label>
                        <input type=\"text\" id=\"expiry-date\" placeholder=\"MM/YY\">
                    </div>
                    <div class=\"form-group\">
                        <label for=\"cvv\">CVV</label>
                        <input type=\"text\" id=\"cvv\" placeholder=\"123\">
                    </div>
                </div>
                <div class=\"navigation-buttons\">
                    <button type=\"button\" class=\"back-button\" id=\"back-to-recap\">Back</button>
                    <button type=\"button\" id=\"complete-payment\">Complete Payment</button>
                </div>
            </form>
        </div>
        
        <div class=\"step-content\" id=\"step4-content\">
            <div class=\"success-message\">
                <div class=\"success-icon\">✓</div>
                <h2>Booking Confirmed!</h2>
                <p>Thank you for your reservation. We have sent a confirmation email to <span id=\"confirmation-email\"></span>.</p>
                <p>Your reservation details:</p>
                <p>Date: <span id=\"confirmation-date\"></span></p>
                <p>Guests: <span id=\"confirmation-guests\"></span></p>
                <p>Reference: <span id=\"confirmation-reference\"></span></p>
                <button type=\"button\" id=\"start-over\" style=\"margin-top: 20px;\">Make Another Reservation</button>
            </div>
        </div>
    </div>
<script>

alert('Hello, this is a test alert!'); // Test alert to check if the script is running
             console.log('Button found');

        document.addEventListener('DOMContentLoaded', function() {
            
            // Elements
            const steps = document.querySelectorAll('.step');
            const stepContents = document.querySelectorAll('.step-content');
            
            // Buttons
            const nextToRecapBtn = document.getElementById('next-to-recap');
            const backToReservationBtn = document.getElementById('back-to-reservation');
            const nextToPaymentBtn = document.getElementById('next-to-payment');
            const backToRecapBtn = document.getElementById('back-to-recap');
            const completePaymentBtn = document.getElementById('complete-payment');
            const startOverBtn = document.getElementById('start-over');

              if (nextToRecapBtn) {
        console.log('Button found');
    } else {
        console.log('Button not found');
    }
            
            // Function to move to a specific step
            function goToStep(stepNumber) {
                // Update step indicators
                steps.forEach((step, index) => {
                    if (index + 1 < stepNumber) {
                        step.classList.add('completed');
                        step.classList.remove('active');
                    } else if (index + 1 === stepNumber) {
                        step.classList.add('active');
                        step.classList.remove('completed');
                    } else {
                        step.classList.remove('active', 'completed');
                    }
                });
                
                // Show the correct content
                stepContents.forEach((content, index) => {
                    if (index + 1 === stepNumber) {
                        content.classList.add('active');
                    } else {
                        content.classList.remove('active');
                    }
                });
            }
            
            // Handle form validation for reservation step
            function validateReservationForm() {
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const date = document.getElementById('date').value;
    const guests = document.getElementById('guests').value;

    console.log('Form Validation:', { name, email, date, guests }); // Log de validation des champs

    if (!name || !email || !date || !guests) {
        alert('Please fill in all required fields');
        return false;
    }

    const emailRegex = /^[^\\s@]+@[^\\s@]+\\.[^\\s@]+\$/;
    if (!emailRegex.test(email)) {
        alert('Please enter a valid email address');
        return false;
    }

    return true;
}

            
            // Update recap content
            function updateRecap() {
                document.getElementById('recap-name').textContent = document.getElementById('name').value;
                document.getElementById('recap-email').textContent = document.getElementById('email').value;
                document.getElementById('recap-date').textContent = document.getElementById('date').value;
                document.getElementById('recap-guests').textContent = document.getElementById('guests').value;
                document.getElementById('recap-requests').textContent = document.getElementById('special-requests').value || 'None';
            }
            
            // Handle form validation for payment step
            function validatePaymentForm() {
                const paymentMethod = document.querySelector('input[name=\"payment\"]:checked').value;
                
                if (paymentMethod === 'credit-card') {
                    const cardNumber = document.getElementById('card-number').value;
                    const cardName = document.getElementById('card-name').value;
                    const expiryDate = document.getElementById('expiry-date').value;
                    const cvv = document.getElementById('cvv').value;
                    
                    if (!cardNumber || !cardName || !expiryDate || !cvv) {
                        alert('Please fill in all payment details');
                        return false;
                    }
                }
                
                return true;
            }
            
            // Update confirmation details
            function updateConfirmation() {
                document.getElementById('confirmation-email').textContent = document.getElementById('email').value;
                document.getElementById('confirmation-date').textContent = document.getElementById('date').value;
                document.getElementById('confirmation-guests').textContent = document.getElementById('guests').value;
                
                // Generate a random reference number
                const refNumber = 'REF-' + Math.floor(Math.random() * 1000000).toString().padStart(6, '0');
                document.getElementById('confirmation-reference').textContent = refNumber;
            }
            
            // Event listeners for buttons
           nextToRecapBtn.addEventListener('click', function() {
    console.log('Next to Recap button clicked'); // Log du clic sur le bouton

    if (validateReservationForm()) {
        console.log('Form validated successfully, moving to step 2'); // Log si la validation réussit
        updateRecap();
        goToStep(2);
    }
});

            
            backToReservationBtn.addEventListener('click', function() {
                goToStep(1);
            });
            
            nextToPaymentBtn.addEventListener('click', function() {
                goToStep(3);
            });
            
            backToRecapBtn.addEventListener('click', function() {
                goToStep(2);
            });
            
            completePaymentBtn.addEventListener('click', function() {
                if (validatePaymentForm()) {
                    updateConfirmation();
                    goToStep(4);
                }
            });
            
            startOverBtn.addEventListener('click', function() {
                // Reset form fields
                document.getElementById('reservation-form').reset();
                document.getElementById('payment-form').reset();
                
                // Go back to step 1
                goToStep(1);
            });
            
            // Toggle payment method fields
            const paymentMethods = document.querySelectorAll('input[name=\"payment\"]');
            const creditCardFields = document.getElementById('credit-card-fields');
            
            paymentMethods.forEach(method => {
                method.addEventListener('change', function() {
                    if (this.value === 'credit-card') {
                        creditCardFields.style.display = 'block';
                    } else {
                        creditCardFields.style.display = 'none';
                    }
                });
            });
        });

        
    </script>
   
</body>
</html>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "reservation_transport/step-navigation.html.twig";
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
        return array (  56 => 7,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>4-Step Navigation</title>
    <script src=\"{{asset('js/station.js')}}\"></script>
     
    <style>
        
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
        
        .steps-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 40px;
            position: relative;
        }
        
        .steps-container::before {
            content: '';
            position: absolute;
            top: 20px;
            left: 0;
            width: 100%;
            height: 4px;
            background-color: #e0e0e0;
            z-index: 1;
        }
        
        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            z-index: 2;
            width: 25%;
        }
        
        .step-number {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #e0e0e0;
            color: #666;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 10px;
            transition: all 0.3s ease;
        }
        
        .step-title {
            font-size: 14px;
            color: #666;
            text-align: center;
            transition: all 0.3s ease;
        }
        
        .step.active .step-number {
            background-color: #4CAF50;
            color: white;
        }
        
        .step.active .step-title {
            color: #4CAF50;
            font-weight: bold;
        }
        
        .step.completed .step-number {
            background-color: #4CAF50;
            color: white;
        }
        
        .step-content {
            display: none;
            padding: 20px;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            margin-bottom: 30px;
        }
        
        .step-content.active {
            display: block;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }
        
        input, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        
        button:hover {
            background-color: #45a049;
        }
        
        .navigation-buttons {
            display: flex;
            justify-content: space-between;
        }
        
        .back-button {
            background-color: #f5f5f5;
            color: #333;
        }
        
        .back-button:hover {
            background-color: #e0e0e0;
        }
        
        .recap-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }
        
        .payment-method {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .payment-method input[type=\"radio\"] {
            width: auto;
            margin-right: 10px;
        }
        
        .success-message {
            text-align: center;
            padding: 20px;
        }
        
        .success-icon {
            color: #4CAF50;
            font-size: 60px;
            margin-bottom: 20px;
        }
        
        @media (max-width: 600px) {
            .step-title {
                font-size: 12px;
            }
            
            .steps-container::before {
                top: 15px;
            }
        }
    </style>
</head>
<body>
    <div class=\"container\">
        <h1>Booking Process</h1>
        
        <div class=\"steps-container\">
            <div class=\"step active\" id=\"step1\">
                <div class=\"step-number\">1</div>
                <div class=\"step-title\">Reservation</div>
            </div>
            <div class=\"step\" id=\"step2\">
                <div class=\"step-number\">2</div>
                <div class=\"step-title\">Recap</div>
            </div>
            <div class=\"step\" id=\"step3\">
                <div class=\"step-number\">3</div>
                <div class=\"step-title\">Payment</div>
            </div>
            <div class=\"step\" id=\"step4\">
                <div class=\"step-number\">4</div>
                <div class=\"step-title\">Success</div>
            </div>
        </div>
        
        <div class=\"step-content active\" id=\"step1-content\">
            <h2>Make Yourn</h2>
            <form id=\"reservation-form\">
                <div class=\"form-group\">
                    <label for=\"name\">Full Name</label>
<input type=\"text\" id=\"name\" name=\"name\" autocomplete=\"name\" required>
                </div>
                <div class=\"form-group\">
                    <label for=\"email\">Email Address</label>
<input type=\"email\" id=\"email\" name=\"email\" autocomplete=\"email\" required>
                </div>
                <div class=\"form-group\">
                    <label for=\"date\">Date</label>
<input type=\"date\" id=\"date\" name=\"date\" autocomplete=\"bday\" required>
                </div>
                <div class=\"form-group\">
                    <label for=\"guests\">Number of Guests</label>
<select id=\"guests\" name=\"guests\" autocomplete=\"off\" required>
                        <option value=\"\">Select</option>
                        <option value=\"1\">1</option>
                        <option value=\"2\">2</option>
                        <option value=\"3\">3</option>
                        <option value=\"4\">4</option>
                        <option value=\"5\">5+</option>
                    </select>
                </div>
                <div class=\"form-group\">
                    <label for=\"special-requests\">Special Requests</label>
                    <input type=\"text\" id=\"special-requests\">
                </div>
                <div class=\"navigation-buttons\">
                    <div></div>
                    <button type=\"button\" id=\"next-to-recap\">Continue to Recap</button>
                </div>
            </form>
        </div>
        
        <div class=\"step-content\" id=\"step2-content\">
            <h2>Reservation Recap</h2>
            <div id=\"recap-content\">
                <div class=\"recap-item\">
                    <strong>Name:</strong>
                    <span id=\"recap-name\"></span>
                </div>
                <div class=\"recap-item\">
                    <strong>Email:</strong>
                    <span id=\"recap-email\"></span>
                </div>
                <div class=\"recap-item\">
                    <strong>Date:</strong>
                    <span id=\"recap-date\"></span>
                </div>
                <div class=\"recap-item\">
                    <strong>Guests:</strong>
                    <span id=\"recap-guests\"></span>
                </div>
                <div class=\"recap-item\">
                    <strong>Special Requests:</strong>
                    <span id=\"recap-requests\"></span>
                </div>
            </div>
            <div class=\"navigation-buttons\">
                <button type=\"button\" class=\"back-button\" id=\"back-to-reservation\">Back</button>
                <button type=\"button\" id=\"next-to-payment\">Proceed to Payment</button>
            </div>
        </div>
        
        <div class=\"step-content\" id=\"step3-content\">
            <h2>Payment Details</h2>
            <form id=\"payment-form\">
                <div class=\"form-group\">
                    <label>Payment Method</label>
                    <div class=\"payment-method\">
                        <input type=\"radio\" id=\"credit-card\" name=\"payment\" value=\"credit-card\" checked>
                        <label for=\"credit-card\">Credit Card</label>
                    </div>
                    <div class=\"payment-method\">
                        <input type=\"radio\" id=\"paypal\" name=\"payment\" value=\"paypal\">
                        <label for=\"paypal\">PayPal</label>
                    </div>
                </div>
                <div id=\"credit-card-fields\">
                    <div class=\"form-group\">
                        <label for=\"card-number\">Card Number</label>
                        <input type=\"text\" id=\"card-number\" placeholder=\"1234 5678 9012 3456\">
                    </div>
                    <div class=\"form-group\">
                        <label for=\"card-name\">Name on Card</label>
                        <input type=\"text\" id=\"card-name\">
                    </div>
                    <div class=\"form-group\">
                        <label for=\"expiry-date\">Expiry Date</label>
                        <input type=\"text\" id=\"expiry-date\" placeholder=\"MM/YY\">
                    </div>
                    <div class=\"form-group\">
                        <label for=\"cvv\">CVV</label>
                        <input type=\"text\" id=\"cvv\" placeholder=\"123\">
                    </div>
                </div>
                <div class=\"navigation-buttons\">
                    <button type=\"button\" class=\"back-button\" id=\"back-to-recap\">Back</button>
                    <button type=\"button\" id=\"complete-payment\">Complete Payment</button>
                </div>
            </form>
        </div>
        
        <div class=\"step-content\" id=\"step4-content\">
            <div class=\"success-message\">
                <div class=\"success-icon\">✓</div>
                <h2>Booking Confirmed!</h2>
                <p>Thank you for your reservation. We have sent a confirmation email to <span id=\"confirmation-email\"></span>.</p>
                <p>Your reservation details:</p>
                <p>Date: <span id=\"confirmation-date\"></span></p>
                <p>Guests: <span id=\"confirmation-guests\"></span></p>
                <p>Reference: <span id=\"confirmation-reference\"></span></p>
                <button type=\"button\" id=\"start-over\" style=\"margin-top: 20px;\">Make Another Reservation</button>
            </div>
        </div>
    </div>
<script>

alert('Hello, this is a test alert!'); // Test alert to check if the script is running
             console.log('Button found');

        document.addEventListener('DOMContentLoaded', function() {
            
            // Elements
            const steps = document.querySelectorAll('.step');
            const stepContents = document.querySelectorAll('.step-content');
            
            // Buttons
            const nextToRecapBtn = document.getElementById('next-to-recap');
            const backToReservationBtn = document.getElementById('back-to-reservation');
            const nextToPaymentBtn = document.getElementById('next-to-payment');
            const backToRecapBtn = document.getElementById('back-to-recap');
            const completePaymentBtn = document.getElementById('complete-payment');
            const startOverBtn = document.getElementById('start-over');

              if (nextToRecapBtn) {
        console.log('Button found');
    } else {
        console.log('Button not found');
    }
            
            // Function to move to a specific step
            function goToStep(stepNumber) {
                // Update step indicators
                steps.forEach((step, index) => {
                    if (index + 1 < stepNumber) {
                        step.classList.add('completed');
                        step.classList.remove('active');
                    } else if (index + 1 === stepNumber) {
                        step.classList.add('active');
                        step.classList.remove('completed');
                    } else {
                        step.classList.remove('active', 'completed');
                    }
                });
                
                // Show the correct content
                stepContents.forEach((content, index) => {
                    if (index + 1 === stepNumber) {
                        content.classList.add('active');
                    } else {
                        content.classList.remove('active');
                    }
                });
            }
            
            // Handle form validation for reservation step
            function validateReservationForm() {
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const date = document.getElementById('date').value;
    const guests = document.getElementById('guests').value;

    console.log('Form Validation:', { name, email, date, guests }); // Log de validation des champs

    if (!name || !email || !date || !guests) {
        alert('Please fill in all required fields');
        return false;
    }

    const emailRegex = /^[^\\s@]+@[^\\s@]+\\.[^\\s@]+\$/;
    if (!emailRegex.test(email)) {
        alert('Please enter a valid email address');
        return false;
    }

    return true;
}

            
            // Update recap content
            function updateRecap() {
                document.getElementById('recap-name').textContent = document.getElementById('name').value;
                document.getElementById('recap-email').textContent = document.getElementById('email').value;
                document.getElementById('recap-date').textContent = document.getElementById('date').value;
                document.getElementById('recap-guests').textContent = document.getElementById('guests').value;
                document.getElementById('recap-requests').textContent = document.getElementById('special-requests').value || 'None';
            }
            
            // Handle form validation for payment step
            function validatePaymentForm() {
                const paymentMethod = document.querySelector('input[name=\"payment\"]:checked').value;
                
                if (paymentMethod === 'credit-card') {
                    const cardNumber = document.getElementById('card-number').value;
                    const cardName = document.getElementById('card-name').value;
                    const expiryDate = document.getElementById('expiry-date').value;
                    const cvv = document.getElementById('cvv').value;
                    
                    if (!cardNumber || !cardName || !expiryDate || !cvv) {
                        alert('Please fill in all payment details');
                        return false;
                    }
                }
                
                return true;
            }
            
            // Update confirmation details
            function updateConfirmation() {
                document.getElementById('confirmation-email').textContent = document.getElementById('email').value;
                document.getElementById('confirmation-date').textContent = document.getElementById('date').value;
                document.getElementById('confirmation-guests').textContent = document.getElementById('guests').value;
                
                // Generate a random reference number
                const refNumber = 'REF-' + Math.floor(Math.random() * 1000000).toString().padStart(6, '0');
                document.getElementById('confirmation-reference').textContent = refNumber;
            }
            
            // Event listeners for buttons
           nextToRecapBtn.addEventListener('click', function() {
    console.log('Next to Recap button clicked'); // Log du clic sur le bouton

    if (validateReservationForm()) {
        console.log('Form validated successfully, moving to step 2'); // Log si la validation réussit
        updateRecap();
        goToStep(2);
    }
});

            
            backToReservationBtn.addEventListener('click', function() {
                goToStep(1);
            });
            
            nextToPaymentBtn.addEventListener('click', function() {
                goToStep(3);
            });
            
            backToRecapBtn.addEventListener('click', function() {
                goToStep(2);
            });
            
            completePaymentBtn.addEventListener('click', function() {
                if (validatePaymentForm()) {
                    updateConfirmation();
                    goToStep(4);
                }
            });
            
            startOverBtn.addEventListener('click', function() {
                // Reset form fields
                document.getElementById('reservation-form').reset();
                document.getElementById('payment-form').reset();
                
                // Go back to step 1
                goToStep(1);
            });
            
            // Toggle payment method fields
            const paymentMethods = document.querySelectorAll('input[name=\"payment\"]');
            const creditCardFields = document.getElementById('credit-card-fields');
            
            paymentMethods.forEach(method => {
                method.addEventListener('change', function() {
                    if (this.value === 'credit-card') {
                        creditCardFields.style.display = 'block';
                    } else {
                        creditCardFields.style.display = 'none';
                    }
                });
            });
        });

        
    </script>
   
</body>
</html>
", "reservation_transport/step-navigation.html.twig", "C:\\Users\\meria\\OneDrive - ESPRIT\\Bureau\\Airmess_Web\\templates\\reservation_transport\\step-navigation.html.twig");
    }
}
