/**
 * Script de diagnostic direct pour le calendrier
 * À inclure séparément pour garantir son exécution
 */

console.log("=== DIAGNOSTIC DIRECT CALENDRIER ===");
console.log("Script de diagnostic chargé avec succès");

// Fonction pour vérifier le DOM et l'affichage
function diagnosticAffichage() {
    console.log("\n=== ANALYSE DU DOM ===");
    
    // Vérifier si les éléments principaux existent
    const calendarBody = document.getElementById('calendarBody');
    console.log("Élément #calendarBody existe:", !!calendarBody);
    
    if (calendarBody) {
        console.log("Contenu #calendarBody:", calendarBody.innerHTML.substring(0, 100) + "...");
        console.log("Nombre de lignes:", calendarBody.getElementsByTagName('tr').length);
        console.log("Nombre de cellules:", calendarBody.getElementsByTagName('td').length);
    }
    
    // Vérifier les conteneurs de dates
    const dateContainers = document.querySelectorAll('.calendar-events');
    console.log("Nombre de conteneurs de dates:", dateContainers.length);
    
    // Liste de quelques conteneurs
    if (dateContainers.length > 0) {
        console.log("Exemples de dates disponibles:");
        for (let i = 0; i < Math.min(5, dateContainers.length); i++) {
            console.log(`- ${dateContainers[i].dataset.date}`);
        }
    }
    
    // Vérifier les événements affichés
    const eventElements = document.querySelectorAll('.calendar-event');
    console.log("Nombre d'événements affichés dans le DOM:", eventElements.length);
    
    // Liste de quelques événements
    if (eventElements.length > 0) {
        console.log("Exemples d'événements affichés:");
        for (let i = 0; i < Math.min(5, eventElements.length); i++) {
            console.log(`- ${eventElements[i].textContent} (ID: ${eventElements[i].dataset.eventId})`);
        }
    }
    
    return {
        calendarExists: !!calendarBody,
        cellsCount: calendarBody ? calendarBody.getElementsByTagName('td').length : 0,
        dateContainersCount: dateContainers.length,
        eventsCount: eventElements.length
    };
}

// Fonction pour vérifier le stockage
function diagnosticStockage() {
    console.log("\n=== ANALYSE DU STOCKAGE ===");
    
    // Vérifier localStorage
    let localStorageOK = false;
    let eventsInLocalStorage = [];
    
    try {
        localStorage.setItem('diag-test', 'test');
        localStorageOK = localStorage.getItem('diag-test') === 'test';
        localStorage.removeItem('diag-test');
        console.log("localStorage fonctionne:", localStorageOK);
        
        const storedEvents = localStorage.getItem('bonplan_calendar_events');
        console.log("Données brutes dans localStorage:", storedEvents);
        
        if (storedEvents) {
            eventsInLocalStorage = JSON.parse(storedEvents);
            console.log("Nombre d'événements dans localStorage:", eventsInLocalStorage.length);
            
            if (eventsInLocalStorage.length > 0) {
                console.log("Exemples d'événements stockés:");
                for (let i = 0; i < Math.min(5, eventsInLocalStorage.length); i++) {
                    console.log(`- ${eventsInLocalStorage[i].title} (Date: ${eventsInLocalStorage[i].date})`);
                }
            }
        } else {
            console.log("Aucun événement trouvé dans localStorage");
        }
    } catch (e) {
        console.error("Erreur lors de l'accès à localStorage:", e);
        localStorageOK = false;
    }
    
    // Vérifier les cookies
    const cookiesEnabled = navigator.cookieEnabled;
    console.log("Cookies activés:", cookiesEnabled);
    
    return {
        localStorageOK,
        eventsCount: eventsInLocalStorage.length,
        events: eventsInLocalStorage,
        cookiesEnabled
    };
}

// Fonction pour tester l'ajout et l'affichage d'un événement
function testerAjoutEvenement() {
    console.log("\n=== TEST D'AJOUT D'ÉVÉNEMENT ===");
    
    // Créer un événement pour aujourd'hui
    const today = new Date();
    const formattedDate = today.toISOString().split('T')[0];
    const eventTitle = "Test manuel " + today.toLocaleTimeString();
    
    console.log("Création d'un événement test:", eventTitle);
    console.log("Date:", formattedDate);
    
    // Vérifier si le conteneur pour cette date existe
    const dateContainer = document.querySelector(`.calendar-events[data-date="${formattedDate}"]`);
    console.log("Conteneur pour aujourd'hui existe:", !!dateContainer);
    
    if (!dateContainer) {
        console.log("Aucun conteneur trouvé pour aujourd'hui. Dates disponibles:");
        document.querySelectorAll('.calendar-events').forEach(container => {
            console.log(`- ${container.dataset.date}`);
        });
        
        return {
            success: false,
            error: "Conteneur de date non trouvé"
        };
    }
    
    // Créer l'événement
    const newEvent = {
        id: "manual-test-" + Date.now(),
        title: eventTitle,
        date: formattedDate,
        description: "Événement de test créé manuellement",
        color: "#ff5722"
    };
    
    // Stocker l'événement
    let events = [];
    try {
        const storedEvents = localStorage.getItem('bonplan_calendar_events');
        if (storedEvents) {
            events = JSON.parse(storedEvents);
        }
        
        events.push(newEvent);
        localStorage.setItem('bonplan_calendar_events', JSON.stringify(events));
        console.log("Événement ajouté avec succès dans localStorage");
    } catch (e) {
        console.error("Erreur lors de l'ajout dans localStorage:", e);
        return {
            success: false,
            error: e.message
        };
    }
    
    // Créer manuellement l'élément dans le DOM
    try {
        const eventEl = document.createElement('div');
        eventEl.classList.add('calendar-event');
        eventEl.textContent = newEvent.title;
        eventEl.dataset.eventId = newEvent.id;
        eventEl.style.backgroundColor = newEvent.color;
        
        console.log("Élément DOM créé, ajout à:", dateContainer);
        dateContainer.appendChild(eventEl);
        console.log("Élément ajouté au DOM avec succès");
        
        return {
            success: true,
            event: newEvent,
            element: eventEl
        };
    } catch (e) {
        console.error("Erreur lors de l'ajout au DOM:", e);
        return {
            success: false,
            error: e.message
        };
    }
}

// Fonction pour forcer le rafraîchissement de l'affichage
function forcerRafraichissement() {
    console.log("\n=== FORÇAGE DU RAFRAÎCHISSEMENT ===");
    
    try {
        // Récupérer les événements
        const storedEvents = localStorage.getItem('bonplan_calendar_events');
        let events = [];
        
        if (storedEvents) {
            events = JSON.parse(storedEvents);
            console.log(`Récupération de ${events.length} événements`);
        } else {
            console.log("Aucun événement trouvé");
            return false;
        }
        
        // Supprimer tous les événements du DOM
        const eventElements = document.querySelectorAll('.calendar-event');
        console.log(`Suppression de ${eventElements.length} éléments existants`);
        eventElements.forEach(el => el.remove());
        
        // Ajouter tous les événements au DOM
        let eventsAdded = 0;
        
        events.forEach(event => {
            const dateContainer = document.querySelector(`.calendar-events[data-date="${event.date}"]`);
            
            if (dateContainer) {
                const eventEl = document.createElement('div');
                eventEl.classList.add('calendar-event');
                eventEl.textContent = event.title;
                eventEl.dataset.eventId = event.id;
                eventEl.style.backgroundColor = event.color;
                dateContainer.appendChild(eventEl);
                eventsAdded++;
            } else {
                console.log(`Conteneur non trouvé pour la date: ${event.date}`);
            }
        });
        
        console.log(`${eventsAdded}/${events.length} événements ajoutés au DOM`);
        return true;
    } catch (e) {
        console.error("Erreur lors du rafraîchissement forcé:", e);
        return false;
    }
}

// Fonction pour corriger les problèmes de calendrier
function corrigerCalendrier() {
    console.log("\n=== TENTATIVE DE CORRECTION DU CALENDRIER ===");
    
    // 1. Régénérer le calendrier si nécessaire
    if (typeof generateCalendar === 'function' && typeof currentMonth !== 'undefined' && typeof currentYear !== 'undefined') {
        console.log("Régénération du calendrier pour", currentMonth, currentYear);
        generateCalendar(currentMonth, currentYear);
    } else {
        console.error("Fonction generateCalendar non disponible");
    }
    
    // 2. Forcer le rafraîchissement des événements
    const result = forcerRafraichissement();
    
    return {
        success: result,
        message: result ? "Correction appliquée" : "Échec de la correction"
    };
}

// Exécuter le diagnostic complet et afficher les résultats
function diagnosticComplet() {
    console.log("\n=== DIAGNOSTIC COMPLET ===");
    
    // Informations sur le navigateur
    console.log("Navigateur:", navigator.userAgent);
    console.log("URL actuelle:", window.location.href);
    
    // Analyser le DOM
    const domResults = diagnosticAffichage();
    
    // Analyser le stockage
    const storageResults = diagnosticStockage();
    
    // Résumé
    console.log("\n=== RÉSUMÉ DU DIAGNOSTIC ===");
    console.log("1. DOM:");
    console.log(`   - Calendrier présent: ${domResults.calendarExists}`);
    console.log(`   - Nombre de cellules: ${domResults.cellsCount}`);
    console.log(`   - Nombre de conteneurs de dates: ${domResults.dateContainersCount}`);
    console.log(`   - Nombre d'événements affichés: ${domResults.eventsCount}`);
    
    console.log("2. Stockage:");
    console.log(`   - localStorage fonctionne: ${storageResults.localStorageOK}`);
    console.log(`   - Nombre d'événements stockés: ${storageResults.eventsCount}`);
    console.log(`   - Cookies activés: ${storageResults.cookiesEnabled}`);
    
    // Détection des problèmes
    console.log("\n=== PROBLÈMES DÉTECTÉS ===");
    
    const problems = [];
    
    if (!domResults.calendarExists) {
        problems.push("Le calendrier n'est pas présent dans le DOM");
    }
    
    if (domResults.dateContainersCount === 0) {
        problems.push("Aucun conteneur de date n'est présent");
    }
    
    if (!storageResults.localStorageOK) {
        problems.push("localStorage ne fonctionne pas correctement");
    }
    
    if (storageResults.eventsCount > 0 && domResults.eventsCount === 0) {
        problems.push("Des événements sont stockés mais ne sont pas affichés");
    }
    
    if (problems.length === 0) {
        console.log("Aucun problème majeur détecté");
    } else {
        problems.forEach(problem => console.log("❌ " + problem));
    }
    
    return {
        dom: domResults,
        storage: storageResults,
        problems: problems
    };
}

// Variables et fonctions globales pour les tests dans la console
window.calendarDiagnostic = {
    analyserDOM: diagnosticAffichage,
    analyserStockage: diagnosticStockage,
    testerAjout: testerAjoutEvenement,
    forceRefresh: forcerRafraichissement,
    corriger: corrigerCalendrier,
    complet: diagnosticComplet
};

// Exécuter le diagnostic au chargement
document.addEventListener('DOMContentLoaded', function() {
    console.log("DOM chargé, lancement du diagnostic immédiat");
    
    // Exécution immédiate du diagnostic et de la correction
    const diagResults = diagnosticComplet();
    
    // Si des problèmes sont détectés, on essaie de les corriger automatiquement
    if (diagResults.problems.length > 0 || diagResults.dom.eventsCount === 0) {
        console.log("Problèmes détectés ou aucun événement affiché. Tentative de correction automatique...");
        corrigerCalendrier();
        
        // Deuxième tentative si nécessaire
        setTimeout(function() {
            const afterFixDiag = diagnosticAffichage();
            if (afterFixDiag.eventsCount === 0) {
                console.log("La première correction n'a pas fonctionné. Tentative directe...");
                forcerRafraichissement();
            }
        }, 1000);
    }
    
    // Afficher les instructions
    console.log("\n=== INSTRUCTIONS ===");
    console.log("Pour diagnostiquer manuellement, utilisez les commandes suivantes dans la console:");
    console.log("1. calendarDiagnostic.analyserDOM() - Analyser le DOM");
    console.log("2. calendarDiagnostic.analyserStockage() - Analyser le stockage");
    console.log("3. calendarDiagnostic.testerAjout() - Tester l'ajout d'un événement");
    console.log("4. calendarDiagnostic.forceRefresh() - Forcer le rafraîchissement");
    console.log("5. calendarDiagnostic.corriger() - Tenter une correction");
    console.log("6. calendarDiagnostic.complet() - Diagnostic complet");
}); 