/**
 * Script de réparation pour le calendrier de bons plans
 */

(function() {
    // Attendre que la page soit complètement chargée
    window.addEventListener('DOMContentLoaded', function() {
        console.log("Script de réparation du calendrier chargé");
        
        // Ajouter un bouton visible en haut du calendrier
        const calendarContainer = document.querySelector('.calendar-container');
        if (calendarContainer) {
            const fixButton = document.createElement('button');
            fixButton.textContent = "🔄 Afficher mes notes";
            fixButton.className = "btn btn-danger";
            fixButton.style.marginBottom = "15px";
            fixButton.style.width = "100%";
            
            fixButton.addEventListener('click', completeRepair);
            
            // Insérer au début du conteneur
            calendarContainer.insertBefore(fixButton, calendarContainer.firstChild);
            
            console.log("Bouton de réparation ajouté au calendrier");
        } else {
            console.error("Conteneur de calendrier non trouvé");
        }
        
        // Vérifier s'il y a des événements non affichés après 2 secondes
        setTimeout(checkEvents, 2000);
    });
    
    function checkEvents() {
        const events = JSON.parse(localStorage.getItem('bonplan_calendar_events') || '[]');
        const displayed = document.querySelectorAll('.calendar-event');
        
        console.log(`Vérification: ${events.length} événements stockés, ${displayed.length} affichés`);
        
        if (events.length > 0 && displayed.length === 0) {
            console.log("Événements non affichés détectés. Tentative de réparation automatique...");
            completeRepair();
        }
    }
    
    function completeRepair() {
        console.log("=== RÉPARATION COMPLÈTE DU CALENDRIER ===");
        
        // 1. Naviguer vers le mois actuel en cliquant sur le bouton mois actuel
        const currentMonthButton = document.getElementById('currentMonth');
        if (currentMonthButton) {
            console.log("Navigation vers le mois actuel...");
            currentMonthButton.click();
        }
        
        // 2. Récupérer les événements
        setTimeout(function() {
            const events = JSON.parse(localStorage.getItem('bonplan_calendar_events') || '[]');
            console.log(`${events.length} événements trouvés dans localStorage`);
            
            if (events.length === 0) {
                // Créer un événement de test pour aujourd'hui
                createTestEvent();
                return;
            }
            
            // 3. Afficher manuellement les événements
            displayEvents(events);
        }, 500);
    }
    
    function createTestEvent() {
        console.log("Création d'un événement de test pour aujourd'hui");
        
        const today = new Date();
        const formattedDate = `${today.getFullYear()}-${String(today.getMonth() + 1).padStart(2, '0')}-${String(today.getDate()).padStart(2, '0')}`;
        
        const newEvent = {
            id: "test-" + Date.now(),
            title: "Note de test",
            date: formattedDate,
            description: "Note créée par le script de réparation",
            color: "#f5365c"
        };
        
        // Sauvegarder l'événement
        const events = [newEvent];
        localStorage.setItem('bonplan_calendar_events', JSON.stringify(events));
        
        // Afficher l'événement
        displayEvents(events);
    }
    
    function displayEvents(events) {
        // Supprimer les événements existants
        document.querySelectorAll('.calendar-event').forEach(el => el.remove());
        
        // Ajouter manuellement les événements
        let added = 0;
        
        events.forEach(event => {
            const container = document.querySelector(`.calendar-events[data-date="${event.date}"]`);
            
            if (container) {
                console.log(`Conteneur trouvé pour la date ${event.date}`);
                
                const el = document.createElement('div');
                el.classList.add('calendar-event');
                el.textContent = event.title;
                el.dataset.eventId = event.id;
                el.style.backgroundColor = event.color || '#5e72e4';
                container.appendChild(el);
                added++;
            } else {
                console.warn(`Aucun conteneur trouvé pour la date ${event.date}`);
            }
        });
        
        console.log(`${added}/${events.length} événements affichés`);
        
        if (added > 0) {
            alert(`${added} notes affichées avec succès!`);
        } else if (events.length > 0) {
            alert("Impossible d'afficher vos notes. Assurez-vous que vous êtes dans le bon mois ou ajoutez une nouvelle note pour aujourd'hui.");
        }
    }
})(); 