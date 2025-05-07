/**
 * Script de reconstruction et gestion du calendrier de bons plans
 * Adapté pour fonctionner avec une structure HTML existante
 */

(function() {
    console.log("=== INITIALISATION DU CALENDRIER LANCÉE ===");

    // Attendre que le DOM soit complètement chargé
    document.addEventListener('DOMContentLoaded', function() {
        console.log("DOM chargé, initialisation du calendrier...");
        initCalendarLogic();
    });
    
    function initCalendarLogic() {
        console.log("Initialisation de la logique du calendrier");
        
        try {
            // Variables globales pour le calendrier
            window.calendarEvents = JSON.parse(localStorage.getItem('bonplan_calendar_events') || '[]');
            window.currentMonth = new Date().getMonth();
            window.currentYear = new Date().getFullYear();
            
            console.log(`Événements chargés: ${window.calendarEvents.length}`);
            if (window.calendarEvents.length > 0) {
                console.log("Premier événement:", window.calendarEvents[0]);
                
                // Essayer de naviguer vers le mois avec le plus d'événements
                navigateToMonthWithMostEvents();
            }
            
            // Vérifier si les éléments du calendrier existent
            const calendarBody = document.getElementById('calendarBody');
            const calendarMonthYear = document.getElementById('calendarMonthYear');
            
            if (!calendarBody || !calendarMonthYear) {
                console.error("Éléments essentiels du calendrier non trouvés");
                return;
            }
            
            // Générer le calendrier initial
            generateCalendar();
            
            // Configuration des boutons de navigation
            const prevMonthBtn = document.getElementById('prevMonth');
            if (prevMonthBtn) {
                prevMonthBtn.addEventListener('click', function() {
                    window.currentMonth--;
                    if (window.currentMonth < 0) {
                        window.currentMonth = 11;
                        window.currentYear--;
                    }
                    generateCalendar();
                });
            }
            
            const nextMonthBtn = document.getElementById('nextMonth');
            if (nextMonthBtn) {
                nextMonthBtn.addEventListener('click', function() {
                    window.currentMonth++;
                    if (window.currentMonth > 11) {
                        window.currentMonth = 0;
                        window.currentYear++;
                    }
                    generateCalendar();
                });
            }
            
            const currentMonthBtn = document.getElementById('currentMonth');
            if (currentMonthBtn) {
                currentMonthBtn.addEventListener('click', function() {
                    const today = new Date();
                    window.currentMonth = today.getMonth();
                    window.currentYear = today.getFullYear();
                    generateCalendar();
                });
            }
            
            // Configuration du formulaire d'ajout
            const eventForm = document.getElementById('eventForm');
            if (eventForm) {
                eventForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    const title = document.getElementById('eventTitle').value;
                    const date = document.getElementById('eventDate').value;
                    const description = document.getElementById('eventDescription').value;
                    const color = document.getElementById('eventColor').value;
                    
                    console.log("Ajout d'une note:", title, "pour la date", date);
                    
                    const newEvent = {
                        id: Date.now().toString(),
                        title: title,
                        date: date,
                        description: description,
                        color: color
                    };
                    
                    window.calendarEvents.push(newEvent);
                    saveEvents();
                    
                    // Naviguer vers le mois de l'événement ajouté
                    const eventDate = new Date(date);
                    if (eventDate.getMonth() !== window.currentMonth || 
                        eventDate.getFullYear() !== window.currentYear) {
                        // Si l'événement est dans un autre mois, naviguer vers ce mois
                        window.currentMonth = eventDate.getMonth();
                        window.currentYear = eventDate.getFullYear();
                        console.log(`Navigation vers le mois de l'événement: ${window.currentMonth + 1}/${window.currentYear}`);
                    }
                    
                    // Générer le calendrier pour afficher l'événement
                    generateCalendar();
                    
                    // Réinitialiser le formulaire
                    eventForm.reset();
                    
                    // Message de confirmation
                    alert("Note ajoutée avec succès!");
                });
            }
            
            // Configuration du bouton de debug
            const debugBtn = document.getElementById('debugBtn');
            if (debugBtn) {
                debugBtn.addEventListener('click', function() {
                    const storedEvents = JSON.parse(localStorage.getItem('bonplan_calendar_events') || '[]');
                    const containers = document.querySelectorAll('.calendar-events').length;
                    const displayed = document.querySelectorAll('.calendar-event').length;
                    
                    let debugInfo = `=== DIAGNOSTIC DU CALENDRIER ===\n`;
                    debugInfo += `${storedEvents.length} événements stockés\n`;
                    debugInfo += `${containers} conteneurs de dates\n`;
                    debugInfo += `${displayed} événements affichés\n\n`;
                    
                    if (storedEvents.length > 0) {
                        debugInfo += `Premier événement:\n`;
                        const evt = storedEvents[0];
                        debugInfo += `- ID: ${evt.id}\n`;
                        debugInfo += `- Titre: ${evt.title}\n`;
                        debugInfo += `- Date: ${evt.date}\n`;
                        
                        // Vérifier si le conteneur existe pour cet événement
                        const container = document.querySelector(`.calendar-events[data-date="${evt.date}"]`);
                        debugInfo += `- Conteneur trouvé: ${container ? "OUI" : "NON"}\n`;
                        
                        if (!container) {
                            const moisEvt = parseInt(evt.date.split('-')[1]) - 1;
                            const anneeEvt = parseInt(evt.date.split('-')[0]);
                            debugInfo += `- Mois de l'événement: ${moisEvt} (actuel: ${window.currentMonth})\n`;
                            debugInfo += `- Année de l'événement: ${anneeEvt} (actuelle: ${window.currentYear})\n`;
                            
                            if (moisEvt !== window.currentMonth || anneeEvt !== window.currentYear) {
                                debugInfo += "\nCet événement n'est pas dans le mois affiché actuellement.";
                            }
                        }
                    }
                    
                    alert(debugInfo);
                });
            }
            
            // Configuration modale d'événement
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('calendar-event')) {
                    const eventId = e.target.dataset.eventId;
                    const event = window.calendarEvents.find(evt => evt.id === eventId);
                    
                    if (event) {
                        // Remplir la modal
                        const editIdField = document.getElementById('editEventId');
                        const editTitleField = document.getElementById('editEventTitle');
                        const editDateField = document.getElementById('editEventDate');
                        const editDescField = document.getElementById('editEventDescription');
                        const editColorField = document.getElementById('editEventColor');
                        
                        if (editIdField && editTitleField && editDateField && editDescField && editColorField) {
                            editIdField.value = event.id;
                            editTitleField.value = event.title;
                            editDateField.value = event.date;
                            editDescField.value = event.description || '';
                            editColorField.value = event.color;
                            
                            // Afficher la modal
                            try {
                                const eventModal = new bootstrap.Modal(document.getElementById('eventModal'));
                                eventModal.show();
                            } catch (error) {
                                console.error("Erreur d'affichage de la modal:", error);
                                alert(`Note: ${event.title}\nDate: ${event.date}\nDescription: ${event.description || 'Aucune description'}`);
                            }
                        } else {
                            alert(`Note: ${event.title}\nDate: ${event.date}\nDescription: ${event.description || 'Aucune description'}`);
                        }
                    }
                }
            });
            
            // Mise à jour d'un événement
            const updateBtn = document.getElementById('updateEventBtn');
            if (updateBtn) {
                updateBtn.addEventListener('click', function() {
                    const eventId = document.getElementById('editEventId').value;
                    const event = window.calendarEvents.find(evt => evt.id === eventId);
                    
                    if (event) {
                        event.title = document.getElementById('editEventTitle').value;
                        event.date = document.getElementById('editEventDate').value;
                        event.description = document.getElementById('editEventDescription').value;
                        event.color = document.getElementById('editEventColor').value;
                        
                        saveEvents();
                        generateCalendar(); // Régénérer tout le calendrier
                        
                        // Fermer la modal
                        try {
                            const modalEl = document.getElementById('eventModal');
                            const modal = bootstrap.Modal.getInstance(modalEl);
                            modal.hide();
                        } catch (error) {
                            console.error("Erreur lors de la fermeture de la modal:", error);
                        }
                        
                        alert("Note mise à jour avec succès!");
                    }
                });
            }
            
            // Suppression d'un événement
            const deleteBtn = document.getElementById('deleteEventBtn');
            if (deleteBtn) {
                deleteBtn.addEventListener('click', function() {
                    const eventId = document.getElementById('editEventId').value;
                    
                    // Confirmer la suppression
                    if (!confirm("Êtes-vous sûr de vouloir supprimer cette note?")) {
                        return;
                    }
                    
                    window.calendarEvents = window.calendarEvents.filter(evt => evt.id !== eventId);
                    
                    saveEvents();
                    generateCalendar(); // Régénérer tout le calendrier
                    
                    // Fermer la modal
                    try {
                        const modalEl = document.getElementById('eventModal');
                        const modal = bootstrap.Modal.getInstance(modalEl);
                        modal.hide();
                    } catch (error) {
                        console.error("Erreur lors de la fermeture de la modal:", error);
                    }
                    
                    alert("Note supprimée avec succès!");
                });
            }
            
            console.log("Initialisation du calendrier terminée avec succès");
        } catch (error) {
            console.error("Erreur d'initialisation du calendrier:", error);
        }
    }
    
    function generateCalendar() {
        console.log("Génération du calendrier");
        
        try {
            const calendarBody = document.getElementById('calendarBody');
            const calendarMonthYear = document.getElementById('calendarMonthYear');
            
            if (!calendarBody || !calendarMonthYear) {
                console.error("Éléments du calendrier non trouvés");
                return;
            }
            
            // Mise à jour du titre du mois
            const monthNames = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 
                               'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
            calendarMonthYear.textContent = `${monthNames[window.currentMonth]} ${window.currentYear}`;
            
            // Vider le calendrier
            calendarBody.innerHTML = '';
            
            // Trouver le premier jour du mois
            const firstDay = new Date(window.currentYear, window.currentMonth, 1).getDay();
            const firstDayIndex = firstDay === 0 ? 6 : firstDay - 1; // Convertir de dimanche (0) à lundi (0)
            
            // Trouver le nombre de jours dans le mois
            const daysInMonth = new Date(window.currentYear, window.currentMonth + 1, 0).getDate();
            
            // Trouver le nombre de jours dans le mois précédent
            const daysInPrevMonth = new Date(window.currentYear, window.currentMonth, 0).getDate();
            
            let date = 1;
            let nextMonthDate = 1;
            
            // Créer les lignes du calendrier
            for (let i = 0; i < 6; i++) {
                // Si tous les jours du mois sont affichés, sortir de la boucle
                if (date > daysInMonth) break;
                
                const row = document.createElement('tr');
                
                // Créer les cellules de chaque ligne
                for (let j = 0; j < 7; j++) {
                    const cell = document.createElement('td');
                    
                    if (i === 0 && j < firstDayIndex) {
                        // Jours du mois précédent
                        const prevMonthDay = daysInPrevMonth - (firstDayIndex - j - 1);
                        
                        // CORRECTION: formatage correct de la date pour le mois précédent
                        let prevMonth = window.currentMonth === 0 ? 11 : window.currentMonth - 1;
                        let prevYear = window.currentMonth === 0 ? window.currentYear - 1 : window.currentYear;
                        const formattedPrevDate = `${prevYear}-${String(prevMonth + 1).padStart(2, '0')}-${String(prevMonthDay).padStart(2, '0')}`;
                        
                        cell.innerHTML = `<div class="calendar-day calendar-inactive">${prevMonthDay}</div>
                                         <div class="calendar-events" data-date="${formattedPrevDate}"></div>`;
                        cell.classList.add('calendar-inactive');
                    } else if (date > daysInMonth) {
                        // Jours du mois suivant
                        // CORRECTION: formatage correct de la date pour le mois suivant
                        let nextMonth = window.currentMonth === 11 ? 0 : window.currentMonth + 1;
                        let nextYear = window.currentMonth === 11 ? window.currentYear + 1 : window.currentYear;
                        const formattedNextDate = `${nextYear}-${String(nextMonth + 1).padStart(2, '0')}-${String(nextMonthDate).padStart(2, '0')}`;
                        
                        cell.innerHTML = `<div class="calendar-day calendar-inactive">${nextMonthDate}</div>
                                         <div class="calendar-events" data-date="${formattedNextDate}"></div>`;
                        cell.classList.add('calendar-inactive');
                        nextMonthDate++;
                    } else {
                        // Jours du mois actuel - FORMATAGE CORRECT DE LA DATE
                        const formattedDate = `${window.currentYear}-${String(window.currentMonth + 1).padStart(2, '0')}-${String(date).padStart(2, '0')}`;
                        const today = new Date();
                        const isToday = date === today.getDate() && window.currentMonth === today.getMonth() && window.currentYear === today.getFullYear();
                        
                        cell.innerHTML = `<div class="calendar-day${isToday ? ' today' : ''}">${date}</div>
                                         <div class="calendar-events" data-date="${formattedDate}"></div>`;
                        
                        cell.dataset.date = formattedDate;
                        
                        // Rendre la cellule cliquable pour ajouter un événement
                        cell.addEventListener('click', function(e) {
                            if (!e.target.classList.contains('calendar-event')) {
                                const dateField = document.getElementById('eventDate');
                                if (dateField) {
                                    dateField.value = formattedDate;
                                }
                            }
                        });
                        
                        date++;
                    }
                    
                    row.appendChild(cell);
                }
                
                calendarBody.appendChild(row);
            }
            
            // Afficher les événements sur le calendrier
            displayEvents();
            console.log("Calendrier généré avec succès");
        } catch (error) {
            console.error("Erreur lors de la génération du calendrier:", error);
        }
    }
    
    function displayEvents() {
        console.log("Affichage des événements sur le calendrier");
        
        try {
            // Supprimer tous les événements existants
            document.querySelectorAll('.calendar-event').forEach(el => el.remove());
            
            // Récupérer les événements stockés (mise à jour de la liste)
            window.calendarEvents = JSON.parse(localStorage.getItem('bonplan_calendar_events') || '[]');
            
            if (window.calendarEvents.length === 0) {
                console.log("Aucun événement à afficher");
                return;
            }
            
            // Ajouter les événements au calendrier
            let eventsDisplayed = 0;
            let eventsForCurrentMonth = 0;
            let eventsMissingContainers = 0;
            
            // Mois et année actuels au format YYYY-MM
            const currentMonthStr = `${window.currentYear}-${String(window.currentMonth + 1).padStart(2, '0')}`;
            
            window.calendarEvents.forEach(event => {
                // Vérifier si l'événement appartient au mois affiché
                if (event.date.startsWith(currentMonthStr)) {
                    eventsForCurrentMonth++;
                }
                
                // Trouver le conteneur pour cet événement
                const container = document.querySelector(`.calendar-events[data-date="${event.date}"]`);
                
                if (container) {
                    console.log(`Conteneur trouvé pour l'événement du ${event.date}: "${event.title}"`);
                    
                    const eventEl = document.createElement('div');
                    eventEl.classList.add('calendar-event');
                    eventEl.textContent = event.title;
                    eventEl.dataset.eventId = event.id;
                    eventEl.style.backgroundColor = event.color || '#5e72e4';
                    
                    // Ajouter un gestionnaire d'événements pour l'édition
                    eventEl.addEventListener('click', function(e) {
                        e.stopPropagation();
                    });
                    
                    container.appendChild(eventEl);
                    eventsDisplayed++;
                } else {
                    eventsMissingContainers++;
                    console.warn(`Aucun conteneur trouvé pour l'événement du ${event.date}: "${event.title}"`);
                    
                    // Si on a des événements non affichés pour ce mois, c'est un problème à signaler
                    if (event.date.startsWith(currentMonthStr)) {
                        console.error(`ERREUR: Événement du mois actuel sans conteneur: ${event.date}`);
                    }
                }
            });
            
            console.log(`${eventsDisplayed}/${window.calendarEvents.length} événements affichés (${eventsForCurrentMonth} pour le mois en cours)`);
            
            // Avertir si des événements pour le mois actuel n'ont pas été affichés
            if (eventsForCurrentMonth > eventsDisplayed) {
                console.error(`ATTENTION: ${eventsForCurrentMonth - eventsDisplayed} événements du mois actuel n'ont pas été affichés`);
            }
            
            // Si aucun événement affiché mais qu'il y en a dans localStorage, essayer de réparer
            if (eventsDisplayed === 0 && window.calendarEvents.length > 0) {
                console.warn("Aucun événement affiché alors qu'il y en a dans localStorage");
                
                // Si le navigateur prend en charge les notifications
                if ("Notification" in window && Notification.permission === "granted") {
                    new Notification("Problème de calendrier", {
                        body: `${window.calendarEvents.length} notes existent mais ne sont pas affichées. Cliquez sur 'RÉPARER LE CALENDRIER'`
                    });
                }
            }
        } catch (error) {
            console.error("Erreur lors de l'affichage des événements:", error);
        }
    }
    
    function saveEvents() {
        try {
            localStorage.setItem('bonplan_calendar_events', JSON.stringify(window.calendarEvents));
            console.log(`${window.calendarEvents.length} événements sauvegardés dans localStorage`);
            
            // Vérifier que la sauvegarde a fonctionné
            const saved = localStorage.getItem('bonplan_calendar_events');
            if (saved) {
                const parsed = JSON.parse(saved);
                console.log(`Vérification: ${parsed.length} événements récupérés de localStorage`);
            } else {
                console.error("Échec de la sauvegarde: localStorage ne contient pas 'bonplan_calendar_events'");
            }
        } catch (error) {
            console.error("Erreur lors de la sauvegarde des événements:", error);
        }
    }

    // Nouvelle fonction pour naviguer vers le mois avec le plus d'événements
    function navigateToMonthWithMostEvents() {
        if (!window.calendarEvents || window.calendarEvents.length === 0) {
            return; // Pas d'événements à traiter
        }
        
        // Compteur d'événements par mois
        const monthCounts = {};
        
        // Compter les événements par mois (format YYYY-MM)
        window.calendarEvents.forEach(event => {
            // Extraire l'année et le mois de la date (format YYYY-MM-DD)
            const yearMonth = event.date.substring(0, 7); // YYYY-MM
            monthCounts[yearMonth] = (monthCounts[yearMonth] || 0) + 1;
        });
        
        // Trouver le mois avec le plus d'événements
        let maxMonth = '';
        let maxCount = 0;
        
        for (const yearMonth in monthCounts) {
            if (monthCounts[yearMonth] > maxCount) {
                maxCount = monthCounts[yearMonth];
                maxMonth = yearMonth;
            }
        }
        
        if (maxMonth) {
            // Extraire l'année et le mois du format YYYY-MM
            const year = parseInt(maxMonth.substring(0, 4));
            const month = parseInt(maxMonth.substring(5, 7)) - 1; // Mois JavaScript: 0-11
            
            // Si c'est un mois différent du mois actuel, y naviguer
            if (year !== window.currentYear || month !== window.currentMonth) {
                console.log(`Navigation vers le mois avec le plus d'événements: ${month + 1}/${year} (${maxCount} événements)`);
                window.currentMonth = month;
                window.currentYear = year;
                
                // Remarque: generateCalendar sera appelé juste après, pas besoin de l'appeler ici
            }
        }
    }
})(); 