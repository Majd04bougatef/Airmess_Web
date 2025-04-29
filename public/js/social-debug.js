// Script de débogage
console.log('=== DÉBUT DU DÉBOGAGE ===');

// Fonction pour logger avec timestamp
function logDebug(message) {
    console.log(new Date().toISOString() + ': ' + message);
}

// Test de base
logDebug('Script de débogage chargé');

// Test DOM
document.addEventListener('DOMContentLoaded', function() {
    logDebug('DOM chargé');
    
    // Test jQuery
    if (typeof jQuery !== 'undefined') {
        logDebug('jQuery est chargé');
    } else {
        console.error('jQuery n\'est pas chargé');
    }
    
    // Test Bootstrap
    if (typeof bootstrap !== 'undefined') {
        logDebug('Bootstrap est chargé');
        try {
            // Test dropdown
            var dropdownElement = document.querySelector('.dropdown-toggle');
            if (dropdownElement) {
                new bootstrap.Dropdown(dropdownElement);
                logDebug('Dropdown initialisé');
            } else {
                console.error('Élément dropdown non trouvé');
            }
        } catch (error) {
            console.error('Erreur lors de l\'initialisation du dropdown:', error);
        }
    } else {
        console.error('Bootstrap n\'est pas chargé');
    }
});

// Test window load
window.addEventListener('load', function() {
    logDebug('Window chargé');
}); 