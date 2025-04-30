/**
 * SOLUTION DIRECTE ET FINALE POUR L'AFFICHAGE DES NOTES
 * Ce script est une solution autonome qui fonctionne indépendamment des autres
 */

(function() {
    console.log("=== SOLUTION DIRECTE POUR L'AFFICHAGE DES NOTES ===");

    // Exécuter immédiatement après chargement de la page
    window.addEventListener('DOMContentLoaded', function() {
        init();
    });
    
    // Réessayer après le chargement complet en cas d'échec
    window.addEventListener('load', function() {
        setTimeout(function() {
            checkAndRepair();
        }, 500);
    });
    
    function init() {
        console.log("Initialisation de la solution directe");
        
        // 1. Ajouter un bouton pour activer la solution manuellement
        addRepairButton();
        
        // 2. Enregistrer un gestionnaire pour le formulaire d'ajout
        setupFormHandler();
        
        // 3. Vérifier s'il y a des événements à afficher
        checkAndRepair();
    }
    
    function addRepairButton() {
        // Chercher le conteneur du calendrier
        let container = document.querySelector('.calendar-container');
        if (!container) {
            // Fallback: chercher dans le document
            container = document.getElementById('calendarMainContainer');
            if (!container) {
                console.error("Impossible de trouver le conteneur du calendrier");
                return;
            }
        }
        
        // Créer le bouton d'urgence
        const fixButton = document.createElement('button');
        fixButton.id = 'directFixBtn';
        fixButton.className = 'btn btn-danger w-100 mb-3';
        fixButton.innerHTML = '🔧 SOLUTION ULTIME - AFFICHER MES NOTES';
        fixButton.onclick = function() {
            forceFixCalendar(true);
        };
        
        // Ajouter en haut
        const existingButton = document.getElementById('directFixBtn');
        if (!existingButton) {
            container.insertBefore(fixButton, container.firstChild);
        }
    }
    
    function setupFormHandler() {
        // Intercepter le formulaire d'ajout de notes
        const eventForm = document.getElementById('eventForm');
        if (!eventForm) {
            console.warn("Formulaire d'ajout de notes non trouvé");
            return;
        }
        
        // Sauvegarder le gestionnaire d'événements d'origine
        const originalHandler = eventForm.onsubmit;
        
        // Ajouter notre gestionnaire
        eventForm.addEventListener('submit', function(e) {
            console.log("Formulaire soumis, capture de l'événement");
            
            // Ne pas empêcher le traitement normal si notre code échoue
            try {
                // Récupérer les valeurs du formulaire
                const title = document.getElementById('eventTitle').value;
                const date = document.getElementById('eventDate').value;
                const description = document.getElementById('eventDescription').value || '';
                const color = document.getElementById('eventColor').value || '#5e72e4';
                
                // Valider les données
                if (!title || !date) {
                    return; // Laisser la validation normale du formulaire s'exécuter
                }
                
                // Créer un nouvel événement
                const newEvent = {
                    id: Date.now().toString(),
                    title: title,
                    date: date,
                    description: description,
                    color: color
                };
                
                // Récupérer les événements existants
                let events = [];
                try {
                    events = JSON.parse(localStorage.getItem('bonplan_calendar_events') || '[]');
                } catch (err) {
                    console.error("Erreur de lecture des événements:", err);
                    events = [];
                }
                
                // Ajouter le nouvel événement
                events.push(newEvent);
                
                // Sauvegarder les événements
                localStorage.setItem('bonplan_calendar_events', JSON.stringify(events));
                console.log("Événement ajouté au stockage:", newEvent);
                
                // Planifier un rafraîchissement automatique
                setTimeout(function() {
                    forceFixCalendar(false);
                }, 300);
            } catch (err) {
                console.error("Erreur lors de la capture du formulaire:", err);
            }
        });
    }
    
    function checkAndRepair() {
        try {
            // Vérifier s'il y a des événements dans le stockage
            const events = JSON.parse(localStorage.getItem('bonplan_calendar_events') || '[]');
            
            // Vérifier s'il y a des événements affichés
            const displayed = document.querySelectorAll('.calendar-event');
            
            console.log(`Vérification: ${events.length} événements dans le stockage, ${displayed.length} affichés`);
            
            // Si nous avons des événements non affichés, exécuter la réparation
            if (events.length > 0 && displayed.length === 0) {
                console.log("Événements non affichés détectés, exécution de la réparation automatique");
                forceFixCalendar(false);
            }
        } catch (err) {
            console.error("Erreur lors de la vérification:", err);
        }
    }
    
    function forceFixCalendar(interactive) {
        console.log("Exécution de la réparation forcée");
        
        try {
            // 1. Récupérer tous les événements
            const events = JSON.parse(localStorage.getItem('bonplan_calendar_events') || '[]');
            
            if (events.length === 0) {
                if (interactive) {
                    alert("Aucune note à afficher. Ajoutez d'abord une note dans le formulaire.");
                }
                return;
            }
            
            // 2. Vérifier si nous devons naviguer vers un autre mois
            checkAndNavigateToEventMonth(events, interactive);
            
            // 3. Forcer l'affichage des événements
            displayEvents(events);
            
            // 4. Afficher un message de confirmation
            if (interactive) {
                alert(`Solution appliquée avec succès. ${events.length} notes sont maintenant disponibles.`);
            }
        } catch (err) {
            console.error("Erreur lors de la réparation forcée:", err);
            if (interactive) {
                alert("Une erreur s'est produite lors de la réparation. Voir la console pour plus de détails.");
            }
        }
    }
    
    function checkAndNavigateToEventMonth(events, interactive) {
        if (!events.length) return;
        
        try {
            // Déterminer le mois courant affiché
            const currentMonthYear = {
                month: typeof window.currentMonth !== 'undefined' ? window.currentMonth : new Date().getMonth(),
                year: typeof window.currentYear !== 'undefined' ? window.currentYear : new Date().getFullYear()
            };
            
            // Compter les événements par mois
            const monthCounts = {};
            events.forEach(event => {
                if (!event.date) return;
                
                const parts = event.date.split('-');
                if (parts.length !== 3) return;
                
                const year = parseInt(parts[0]);
                const month = parseInt(parts[1]) - 1; // Convertir en index de mois (0-11)
                
                const key = `${year}-${month}`;
                if (!monthCounts[key]) {
                    monthCounts[key] = 0;
                }
                monthCounts[key]++;
            });
            
            // Trouver le mois avec le plus d'événements
            let maxCount = 0;
            let targetMonthYear = null;
            
            Object.keys(monthCounts).forEach(key => {
                if (monthCounts[key] > maxCount) {
                    maxCount = monthCounts[key];
                    targetMonthYear = key;
                }
            });
            
            if (targetMonthYear) {
                const [targetYear, targetMonth] = targetMonthYear.split('-').map(Number);
                
                // Vérifier si nous devons naviguer
                if (targetMonth !== currentMonthYear.month || targetYear !== currentMonthYear.year) {
                    if (interactive) {
                        const monthNames = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 
                                           'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
                        
                        if (confirm(`La plupart de vos notes (${maxCount}) sont en ${monthNames[targetMonth]} ${targetYear}. Voulez-vous naviguer vers ce mois?`)) {
                            navigateToMonth(targetMonth, targetYear);
                        }
                    } else {
                        // En mode automatique, naviguer si plus de 80% des événements sont dans ce mois
                        const totalEvents = events.length;
                        if (maxCount > totalEvents * 0.8) {
                            navigateToMonth(targetMonth, targetYear);
                        }
                    }
                }
            }
        } catch (err) {
            console.error("Erreur lors de la navigation:", err);
        }
    }
    
    function navigateToMonth(month, year) {
        console.log(`Navigation vers ${month+1}/${year}`);
        
        try {
            // Mettre à jour les variables globales
            if (typeof window.currentMonth !== 'undefined') {
                window.currentMonth = month;
            }
            if (typeof window.currentYear !== 'undefined') {
                window.currentYear = year;
            }
            
            // Essayer d'appeler la fonction de génération du calendrier
            if (typeof window.generateCalendar === 'function') {
                window.generateCalendar();
                console.log("Calendrier régénéré avec succès");
            } else {
                // Fallback: essayer de cliquer sur les boutons de navigation
                const diff = (year * 12 + month) - (new Date().getFullYear() * 12 + new Date().getMonth());
                
                if (diff === 0) {
                    // Mois actuel
                    const currentBtn = document.getElementById('currentMonth');
                    if (currentBtn) currentBtn.click();
                } else if (diff < 0) {
                    // Mois précédent(s)
                    const prevBtn = document.getElementById('prevMonth');
                    if (prevBtn) {
                        for (let i = 0; i > diff; i--) {
                            prevBtn.click();
                        }
                    }
                } else {
                    // Mois suivant(s)
                    const nextBtn = document.getElementById('nextMonth');
                    if (nextBtn) {
                        for (let i = 0; i < diff; i++) {
                            nextBtn.click();
                        }
                    }
                }
            }
        } catch (err) {
            console.error("Erreur lors de la navigation:", err);
        }
    }
    
    function displayEvents(events) {
        if (!events.length) return;
        
        console.log("Affichage forcé des événements");
        
        try {
            // 1. Supprimer tous les événements existants
            document.querySelectorAll('.calendar-event').forEach(el => el.remove());
            
            // 2. Pour chaque événement, trouver le conteneur correspondant et afficher
            let displayed = 0;
            let missing = 0;
            
            events.forEach(event => {
                if (!event.date) return;
                
                // Trouver le conteneur pour cette date
                const container = document.querySelector(`.calendar-events[data-date="${event.date}"]`);
                
                if (container) {
                    // Créer l'élément d'événement
                    const eventEl = document.createElement('div');
                    eventEl.className = 'calendar-event';
                    eventEl.textContent = event.title;
                    eventEl.dataset.eventId = event.id;
                    eventEl.style.backgroundColor = event.color || '#5e72e4';
                    
                    // Ajouter l'événement au conteneur
                    container.appendChild(eventEl);
                    displayed++;
                    
                    // Ajouter un gestionnaire de clic
                    eventEl.addEventListener('click', function(e) {
                        e.stopPropagation();
                        alert(`Note: ${event.title}\nDate: ${event.date}\nDescription: ${event.description || '(Aucune description)'}`);
                    });
                } else {
                    missing++;
                }
            });
            
            console.log(`Événements affichés: ${displayed}/${events.length} (${missing} non affichables dans le mois actuel)`);
        } catch (err) {
            console.error("Erreur lors de l'affichage des événements:", err);
        }
    }
})(); 