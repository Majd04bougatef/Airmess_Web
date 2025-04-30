/**
 * Script indépendant pour corriger le calendrier
 * Ce script s'auto-injecte dans la page et opère indépendamment du code existant
 */

(function() {
    console.log("=== SCRIPT CORRECTEUR DE CALENDRIER DÉMARRÉ ===");
    
    // Attendre que le DOM soit chargé
    if (document.readyState === "loading") {
        document.addEventListener("DOMContentLoaded", initInjection);
    } else {
        initInjection();
    }
    
    function initInjection() {
        console.log("DOM chargé, démarrage de l'injection...");
        
        // Ajouter un bouton d'urgence en haut de la page
        const emergencyButton = document.createElement('button');
        emergencyButton.textContent = "🔧 Réparer Calendrier";
        emergencyButton.style.position = "fixed";
        emergencyButton.style.top = "10px";
        emergencyButton.style.right = "10px";
        emergencyButton.style.zIndex = "9999";
        emergencyButton.style.padding = "10px 15px";
        emergencyButton.style.backgroundColor = "#f5365c";
        emergencyButton.style.color = "white";
        emergencyButton.style.border = "none";
        emergencyButton.style.borderRadius = "5px";
        emergencyButton.style.fontWeight = "bold";
        emergencyButton.style.cursor = "pointer";
        emergencyButton.style.boxShadow = "0 4px 6px rgba(0,0,0,0.1)";
        
        emergencyButton.addEventListener('click', function() {
            repairCalendar();
        });
        
        document.body.appendChild(emergencyButton);
        
        // Vérification automatique après 2 secondes
        setTimeout(function() {
            const events = JSON.parse(localStorage.getItem('bonplan_calendar_events') || '[]');
            const displayedEvents = document.querySelectorAll('.calendar-event');
            
            console.log(`Vérification auto: ${events.length} événements stockés, ${displayedEvents.length} affichés`);
            
            if (events.length > 0 && displayedEvents.length === 0) {
                console.log("Problème détecté! Lancement de la réparation automatique...");
                repairCalendar();
            }
        }, 2000);
    }
    
    function repairCalendar() {
        console.log("=== RÉPARATION D'URGENCE DU CALENDRIER ===");
        
        // 1. Récupérer les événements
        const events = JSON.parse(localStorage.getItem('bonplan_calendar_events') || '[]');
        console.log(`${events.length} événements trouvés dans localStorage`);
        
        if (events.length === 0) {
            // Créer un événement de test
            const today = new Date();
            const y = today.getFullYear();
            const m = String(today.getMonth() + 1).padStart(2, '0');
            const d = String(today.getDate()).padStart(2, '0');
            const formattedDate = `${y}-${m}-${d}`;
            
            const newEvent = {
                id: "emergency-" + Date.now(),
                title: "Test d'urgence",
                date: formattedDate,
                description: "Événement créé par le script de réparation d'urgence",
                color: "#f5365c"
            };
            
            events.push(newEvent);
            localStorage.setItem('bonplan_calendar_events', JSON.stringify(events));
            console.log("Événement de test créé avec succès");
        }
        
        // 2. Trouver les conteneurs de dates dans le calendrier
        const dateContainers = document.querySelectorAll('.calendar-events');
        console.log(`${dateContainers.length} conteneurs de dates trouvés`);
        
        if (dateContainers.length === 0) {
            console.log("Aucun conteneur trouvé, reconstruction du calendrier nécessaire");
            alert("Erreur: Impossible de trouver les conteneurs de dates dans le calendrier.");
            return;
        }
        
        // 3. Nettoyer tous les événements existants
        document.querySelectorAll('.calendar-event').forEach(el => el.remove());
        
        // 4. Ajouter tous les événements aux bons conteneurs
        let addedEvents = 0;
        
        events.forEach(event => {
            const container = document.querySelector(`.calendar-events[data-date="${event.date}"]`);
            
            if (container) {
                const eventEl = document.createElement('div');
                eventEl.classList.add('calendar-event');
                eventEl.textContent = event.title;
                eventEl.dataset.eventId = event.id;
                eventEl.style.backgroundColor = event.color;
                container.appendChild(eventEl);
                addedEvents++;
            }
        });
        
        console.log(`${addedEvents}/${events.length} événements ajoutés avec succès`);
        
        // 5. Afficher un résumé
        if (addedEvents > 0) {
            alert(`Réparation réussie! ${addedEvents} notes ajoutées sur ${events.length}.`);
        } else if (events.length > 0) {
            alert("Échec de la réparation. Essayez de naviguer vers le mois où se trouvent vos notes.");
        } else {
            alert("Aucune note à afficher.");
        }
    }
})(); 