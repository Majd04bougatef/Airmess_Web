/**
 * Calendrier personnel des bons plans
 * Fonctions JavaScript pour la gestion du calendrier personnel
 */

// Variables globales pour le calendrier
let calendarEvents = [];
let currentMonth = new Date().getMonth();
let currentYear = new Date().getFullYear();
const monthNames = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 
                     'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];

// Méthodes alternatives de stockage pour les navigateurs où localStorage ne fonctionne pas
const storageUtils = {
    // Sauvegarde et récupération via cookie
    cookie: {
        save: function(data) {
            try {
                const jsonData = JSON.stringify(data);
                const encodedData = encodeURIComponent(jsonData);
                // Expiration de 30 jours
                const date = new Date();
                date.setTime(date.getTime() + (30 * 24 * 60 * 60 * 1000));
                document.cookie = `bonplan_calendar_events=${encodedData}; expires=${date.toUTCString()}; path=/`;
                return true;
            } catch (e) {
                console.error("Erreur lors de la sauvegarde dans les cookies:", e);
                return false;
            }
        },
        load: function() {
            try {
                const cookieName = "bonplan_calendar_events=";
                const cookies = document.cookie.split(';');
                for (let i = 0; i < cookies.length; i++) {
                    let cookie = cookies[i].trim();
                    if (cookie.indexOf(cookieName) === 0) {
                        const encodedData = cookie.substring(cookieName.length);
                        const jsonData = decodeURIComponent(encodedData);
                        return JSON.parse(jsonData);
                    }
                }
                return null;
            } catch (e) {
                console.error("Erreur lors du chargement depuis les cookies:", e);
                return null;
            }
        }
    },
    
    // Détection du mode de stockage disponible
    getStorageMethod: function() {
        // Tester localStorage
        try {
            localStorage.setItem('test', 'test');
            localStorage.removeItem('test');
            return 'localStorage';
        } catch (e) {
            console.warn("localStorage indisponible, utilisation des cookies comme solution de repli");
            return 'cookie';
        }
    },
    
    // Méthode de sauvegarde qui utilise la meilleure option disponible
    saveData: function(key, data) {
        const method = this.getStorageMethod();
        console.log(`Sauvegarde des données avec la méthode: ${method}`);
        
        if (method === 'localStorage') {
            try {
                localStorage.setItem(key, JSON.stringify(data));
                return true;
            } catch (e) {
                console.error("Erreur localStorage, tentative via cookies", e);
                return this.cookie.save(data);
            }
        } else {
            return this.cookie.save(data);
        }
    },
    
    // Méthode de récupération qui utilise la meilleure option disponible
    loadData: function(key) {
        let data = null;
        
        // Essayer d'abord localStorage
        try {
            const stored = localStorage.getItem(key);
            if (stored) {
                data = JSON.parse(stored);
                console.log("Données chargées depuis localStorage");
            }
        } catch (e) {
            console.warn("Impossible de charger depuis localStorage", e);
        }
        
        // Si pas de données dans localStorage, essayer les cookies
        if (!data) {
            data = this.cookie.load();
            console.log("Données chargées depuis les cookies");
        }
        
        return data || [];
    }
};

// Initialisation du calendrier
function initCalendar() {
    console.log("Initialisation du calendrier des bons plans");
    
    // Charger les événements depuis localStorage
    loadEvents();
    
    // Générer le calendrier
    generateCalendar(currentMonth, currentYear);
    
    // Afficher les événements
    renderEvents();
    
    // Afficher les événements à venir
    showUpcomingEvents();
    
    // Configuration des boutons de navigation
    setupNavigation();
    
    // Configuration du formulaire d'ajout
    setupEventForm();
    
    // Configuration des handlers pour les événements existants
    setupEventHandlers();
    
    // Réparer automatiquement le calendrier si nécessaire
    setTimeout(autoRepairCalendar, 1000);
}

// Chargement des événements depuis localStorage
function loadEvents() {
    console.log("--- DIAGNOSTIC - CHARGEMENT DES ÉVÉNEMENTS ---");
    
    try {
        console.log("Tentative de chargement depuis localStorage...");
        console.log("localStorage disponible:", typeof localStorage !== 'undefined');
        
        // Chargement avec méthode avancée qui utilise localStorage ou cookies
        calendarEvents = storageUtils.loadData('bonplan_calendar_events');
        
        console.log("Chargement réussi:", calendarEvents);
        console.log(`${calendarEvents.length} événements chargés:`, calendarEvents);
        
        // Vérifier la validité de chaque événement
        calendarEvents.forEach((event, index) => {
            console.log(`Événement #${index+1}:`, event);
            console.log(`- id: ${event.id}`);
            console.log(`- titre: ${event.title}`);
            console.log(`- date: ${event.date}`);
            
            // Vérifier le format de la date
            const dateRegex = /^\d{4}-\d{2}-\d{2}$/;
            if (!dateRegex.test(event.date)) {
                console.error(`Format de date invalide pour l'événement #${index+1}: ${event.date}`);
            }
            
            // Vérifier si la date existe dans le calendrier actuel
            const dateContainer = document.querySelector(`.calendar-events[data-date="${event.date}"]`);
            console.log(`- Conteneur pour la date ${event.date} trouvé:`, !!dateContainer);
        });
    } catch (error) {
        console.error("Erreur lors du chargement des événements:", error);
        console.error("Détails:", error.message);
        calendarEvents = [];
        
        try {
            // Réinitialiser localStorage en cas de corruption
            storageUtils.saveData('bonplan_calendar_events', []);
            console.log("Stockage réinitialisé avec un tableau vide");
        } catch (resetError) {
            console.error("Impossible de réinitialiser le stockage:", resetError);
        }
    }
    
    console.log("État final des événements:", calendarEvents);
    console.log("--- FIN DIAGNOSTIC - CHARGEMENT ---");
}

// Sauvegarde des événements dans localStorage
function saveEvents() {
    console.log("--- DIAGNOSTIC - SAUVEGARDE DES ÉVÉNEMENTS ---");
    console.log("Tentative de sauvegarde...");
    console.log("Événements à sauvegarder:", calendarEvents);
    
    try {
        // Sauvegarde avec méthode avancée qui utilise localStorage ou cookies
        const result = storageUtils.saveData('bonplan_calendar_events', calendarEvents);
        
        console.log(`${calendarEvents.length} événements sauvegardés, résultat:`, result);
        
        console.log("--- FIN DIAGNOSTIC - SAUVEGARDE ---");
        return result;
    } catch (error) {
        console.error("Erreur lors de la sauvegarde des événements:", error);
        console.error("Détails:", error.message);
        console.log("--- FIN DIAGNOSTIC - SAUVEGARDE (ÉCHEC) ---");
        alert("Une erreur est survenue lors de la sauvegarde de vos événements.");
        return false;
    }
}

// Génération du calendrier pour un mois donné
function generateCalendar(month, year) {
    console.log(`Génération du calendrier pour ${monthNames[month]} ${year}`);
    
    const calendarBody = document.getElementById('calendarBody');
    const calendarMonthYear = document.getElementById('calendarMonthYear');
    
    // Mise à jour du titre du mois
    calendarMonthYear.textContent = `${monthNames[month]} ${year}`;
    
    // Vider le calendrier
    calendarBody.innerHTML = '';
    
    // Trouver le premier jour du mois
    const firstDay = new Date(year, month, 1).getDay();
    // Convertir de dimanche (0) à lundi (0)
    const firstDayIndex = firstDay === 0 ? 6 : firstDay - 1;
    
    // Trouver le nombre de jours dans le mois
    const daysInMonth = new Date(year, month + 1, 0).getDate();
    
    // Trouver le nombre de jours dans le mois précédent
    const daysInPrevMonth = new Date(year, month, 0).getDate();
    
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
                const prevMonth = month === 0 ? 12 : month;
                const prevYear = month === 0 ? year - 1 : year;
                const formattedPrevDate = `${prevYear}-${prevMonth.toString().padStart(2, '0')}-${prevMonthDay.toString().padStart(2, '0')}`;
                
                cell.innerHTML = `<div class="calendar-day calendar-inactive">${prevMonthDay}</div>
                                  <div class="calendar-events" data-date="${formattedPrevDate}"></div>`;
                cell.classList.add('calendar-inactive');
            } else if (date > daysInMonth) {
                // Jours du mois suivant
                const nextMonth = month === 11 ? 1 : month + 2;
                const nextYear = month === 11 ? year + 1 : year;
                const formattedNextDate = `${nextYear}-${nextMonth.toString().padStart(2, '0')}-${nextMonthDate.toString().padStart(2, '0')}`;
                
                cell.innerHTML = `<div class="calendar-day calendar-inactive">${nextMonthDate}</div>
                                  <div class="calendar-events" data-date="${formattedNextDate}"></div>`;
                cell.classList.add('calendar-inactive');
                nextMonthDate++;
            } else {
                // Jours du mois actuel
                const formattedDate = `${year}-${(month + 1).toString().padStart(2, '0')}-${date.toString().padStart(2, '0')}`;
                const today = new Date();
                const isToday = date === today.getDate() && month === today.getMonth() && year === today.getFullYear();
                
                cell.innerHTML = `<div class="calendar-day${isToday ? ' today' : ''}">${date}</div>
                                  <div class="calendar-events" data-date="${formattedDate}"></div>`;
                
                // Ajouter un attribut data pour faciliter l'ajout d'événements
                cell.dataset.date = formattedDate;
                
                // Rendre la cellule cliquable pour ajouter un événement
                cell.addEventListener('click', function(e) {
                    if (!e.target.classList.contains('calendar-event')) {
                        document.getElementById('eventDate').value = formattedDate;
                    }
                });
                
                date++;
            }
            
            row.appendChild(cell);
        }
        
        calendarBody.appendChild(row);
    }
}

// Affichage des événements sur le calendrier
function renderEvents() {
    console.log("--- DIAGNOSTIC - AFFICHAGE DES ÉVÉNEMENTS ---");
    console.log(`Tentative d'affichage de ${calendarEvents.length} événements sur le calendrier`);
    
    // Récupérer tous les conteneurs date
    const allDateContainers = document.querySelectorAll('.calendar-events');
    console.log(`${allDateContainers.length} conteneurs de dates disponibles dans le DOM`);
    
    // Supprimer tous les événements du calendrier
    const eventsToRemove = document.querySelectorAll('.calendar-event');
    console.log(`Suppression de ${eventsToRemove.length} événements existants`);
    eventsToRemove.forEach(el => el.remove());
    
    // Liste des dates disponibles dans le calendrier actuel
    const availableDates = [];
    allDateContainers.forEach(container => {
        availableDates.push(container.dataset.date);
    });
    console.log("Dates disponibles dans le calendrier actuel:", availableDates);
    
    // Ajouter les événements au calendrier
    let eventsRendered = 0;
    let eventsMissing = 0;
    
    calendarEvents.forEach((event, index) => {
        const eventDate = event.date;
        console.log(`\nÉvénement ${index+1}: "${event.title}" le ${eventDate}`);
        
        const eventContainer = document.querySelector(`.calendar-events[data-date="${eventDate}"]`);
        
        if (eventContainer) {
            console.log(`✅ Conteneur trouvé pour la date: ${eventDate}`);
            const eventEl = document.createElement('div');
            eventEl.classList.add('calendar-event');
            eventEl.textContent = event.title;
            eventEl.dataset.eventId = event.id;
            eventEl.style.backgroundColor = event.color;
            eventContainer.appendChild(eventEl);
            eventsRendered++;
            console.log(`Événement "${event.title}" ajouté au DOM`);
        } else {
            console.warn(`❌ Aucun conteneur trouvé pour la date: ${eventDate}`);
            console.log(`La date ${eventDate} est-elle dans le mois actuel?`, availableDates.includes(eventDate));
            eventsMissing++;
        }
    });
    
    console.log(`\nRésumé: ${eventsRendered} événements affichés, ${eventsMissing} non affichés`);
    console.log("--- FIN DIAGNOSTIC - AFFICHAGE ---");
}

// Configuration des boutons de navigation
function setupNavigation() {
    // Mois précédent
    document.getElementById('prevMonth').addEventListener('click', function() {
        currentMonth--;
        if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--;
        }
        generateCalendar(currentMonth, currentYear);
        renderEvents();
    });
    
    // Mois suivant
    document.getElementById('nextMonth').addEventListener('click', function() {
        currentMonth++;
        if (currentMonth > 11) {
            currentMonth = 0;
            currentYear++;
        }
        generateCalendar(currentMonth, currentYear);
        renderEvents();
    });
    
    // Mois actuel
    document.getElementById('currentMonth').addEventListener('click', function() {
        const today = new Date();
        currentMonth = today.getMonth();
        currentYear = today.getFullYear();
        generateCalendar(currentMonth, currentYear);
        renderEvents();
    });
}

// Configuration du formulaire d'ajout d'événement
function setupEventForm() {
    document.getElementById('eventForm').addEventListener('submit', function(e) {
        console.log("--- DIAGNOSTIC - SOUMISSION DU FORMULAIRE ---");
        e.preventDefault();
        
        const title = document.getElementById('eventTitle').value;
        const date = document.getElementById('eventDate').value;
        const description = document.getElementById('eventDescription').value;
        const color = document.getElementById('eventColor').value;
        
        console.log("Données du formulaire:");
        console.log("- Titre:", title);
        console.log("- Date:", date);
        console.log("- Description:", description);
        console.log("- Couleur:", color);
        
        if (!title || !date) {
            console.warn("Formulaire incomplet - Titre ou date manquant");
            alert("Veuillez remplir au moins le titre et la date.");
            console.log("--- FIN DIAGNOSTIC - SOUMISSION (INCOMPLET) ---");
            return;
        }
        
        // Vérifier la validité de la date
        const dateRegex = /^\d{4}-\d{2}-\d{2}$/;
        if (!dateRegex.test(date)) {
            console.error(`Format de date invalide: ${date}`);
            alert("Le format de la date est invalide. Utilisez le format AAAA-MM-JJ.");
            console.log("--- FIN DIAGNOSTIC - SOUMISSION (DATE INVALIDE) ---");
            return;
        }
        
        // Vérifier si la cellule correspondant à cette date existe
        const dateCell = document.querySelector(`.calendar-events[data-date="${date}"]`);
        console.log(`La cellule pour la date ${date} existe:`, !!dateCell);
        
        console.log(`Ajout d'un nouvel événement: ${title} le ${date}`);
        
        const newEvent = {
            id: Date.now().toString(), // ID unique basé sur le timestamp
            title: title,
            date: date,
            description: description,
            color: color
        };
        
        console.log("Nouvel événement créé:", newEvent);
        console.log("État actuel des événements:", calendarEvents);
        
        // Ajouter l'événement à la liste
        calendarEvents.push(newEvent);
        console.log("Événements après ajout:", calendarEvents);
        
        // Sauvegarder dans localStorage
        if (saveEvents()) {
            // Réinitialiser le formulaire
            document.getElementById('eventForm').reset();
            
            // Mettre à jour l'affichage
            console.log("Mise à jour de l'affichage...");
            renderEvents();
            
            // Mettre à jour les événements à venir
            showUpcomingEvents();
            
            // Afficher un message de confirmation
            alert(`Note "${title}" ajoutée avec succès pour le ${date}`);
            console.log("--- FIN DIAGNOSTIC - SOUMISSION (SUCCÈS) ---");
        } else {
            console.log("--- FIN DIAGNOSTIC - SOUMISSION (ÉCHEC SAUVEGARDE) ---");
        }
    });
}

// Configuration des handlers pour les événements existants
function setupEventHandlers() {
    // Délégation d'événements pour gérer les clics sur les événements
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('calendar-event')) {
            const eventId = e.target.dataset.eventId;
            const event = calendarEvents.find(evt => evt.id === eventId);
            
            if (event) {
                document.getElementById('editEventId').value = event.id;
                document.getElementById('editEventTitle').value = event.title;
                document.getElementById('editEventDate').value = event.date;
                document.getElementById('editEventDescription').value = event.description || '';
                document.getElementById('editEventColor').value = event.color;
                
                // Afficher la modal
                const eventModal = new bootstrap.Modal(document.getElementById('eventModal'));
                eventModal.show();
            }
        }
    });
    
    // Gestion de la mise à jour d'un événement
    document.getElementById('updateEventBtn').addEventListener('click', function() {
        const eventId = document.getElementById('editEventId').value;
        const event = calendarEvents.find(evt => evt.id === eventId);
        
        if (event) {
            event.title = document.getElementById('editEventTitle').value;
            event.date = document.getElementById('editEventDate').value;
            event.description = document.getElementById('editEventDescription').value;
            event.color = document.getElementById('editEventColor').value;
            
            if (saveEvents()) {
                renderEvents();
                
                // Mettre à jour les événements à venir
                showUpcomingEvents();
                
                // Fermer la modal
                const eventModalEl = document.getElementById('eventModal');
                const eventModal = bootstrap.Modal.getInstance(eventModalEl);
                eventModal.hide();
            }
        }
    });
    
    // Gestion de la suppression d'un événement
    document.getElementById('deleteEventBtn').addEventListener('click', function() {
        const eventId = document.getElementById('editEventId').value;
        calendarEvents = calendarEvents.filter(evt => evt.id !== eventId);
        
        if (saveEvents()) {
            renderEvents();
            
            // Mettre à jour les événements à venir
            showUpcomingEvents();
            
            // Fermer la modal
            const eventModalEl = document.getElementById('eventModal');
            const eventModal = bootstrap.Modal.getInstance(eventModalEl);
            eventModal.hide();
        }
    });
}

// Affichage des événements à venir
function showUpcomingEvents() {
    const upcomingEventsContainer = document.getElementById('upcoming-events');
    const noEventsMessage = document.getElementById('no-events-message');
    
    // Vider le conteneur
    upcomingEventsContainer.innerHTML = '';
    upcomingEventsContainer.appendChild(noEventsMessage);
    
    if (calendarEvents.length === 0) {
        return;
    }
    
    // Trier les événements par date
    const sortedEvents = [...calendarEvents].sort((a, b) => new Date(a.date) - new Date(b.date));
    
    // Filtrer pour n'avoir que les événements à venir
    const today = new Date();
    today.setHours(0, 0, 0, 0);
    
    const upcomingEvents = sortedEvents.filter(event => {
        const eventDate = new Date(event.date);
        return eventDate >= today;
    });
    
    if (upcomingEvents.length === 0) {
        return;
    }
    
    // Cacher le message "aucun événement"
    noEventsMessage.style.display = 'none';
    
    // Afficher les événements à venir (limités à 5)
    const eventsToShow = upcomingEvents.slice(0, 5);
    
    eventsToShow.forEach(event => {
        const eventEl = document.createElement('div');
        eventEl.classList.add('p-2', 'mb-2', 'rounded');
        eventEl.style.backgroundColor = event.color + '20'; // Ajouter une transparence
        eventEl.style.borderLeft = `4px solid ${event.color}`;
        
        const eventDate = new Date(event.date);
        const formattedDate = eventDate.toLocaleDateString('fr-FR', {
            day: 'numeric',
            month: 'short'
        });
        
        eventEl.innerHTML = `
            <div class="d-flex justify-content-between align-items-center">
                <strong>${event.title}</strong>
                <span class="badge bg-light text-dark">${formattedDate}</span>
            </div>
            ${event.description ? `<small class="text-muted">${event.description.substring(0, 50)}${event.description.length > 50 ? '...' : ''}</small>` : ''}
        `;
        
        // Rendre l'élément cliquable pour éditer
        eventEl.style.cursor = 'pointer';
        eventEl.dataset.eventId = event.id;
        eventEl.addEventListener('click', function() {
            const event = calendarEvents.find(evt => evt.id === this.dataset.eventId);
            
            if (event) {
                document.getElementById('editEventId').value = event.id;
                document.getElementById('editEventTitle').value = event.title;
                document.getElementById('editEventDate').value = event.date;
                document.getElementById('editEventDescription').value = event.description || '';
                document.getElementById('editEventColor').value = event.color;
                
                // Afficher la modal
                const eventModal = new bootstrap.Modal(document.getElementById('eventModal'));
                eventModal.show();
            }
        });
        
        upcomingEventsContainer.appendChild(eventEl);
    });
    
    // Ajouter un indicateur s'il y a plus d'événements
    if (upcomingEvents.length > 5) {
        const moreEventsEl = document.createElement('div');
        moreEventsEl.classList.add('text-center', 'mt-2');
        moreEventsEl.innerHTML = `<small class="text-muted">+ ${upcomingEvents.length - 5} autres notes à venir</small>`;
        upcomingEventsContainer.appendChild(moreEventsEl);
    }
}

// Fonction d'auto-réparation du calendrier
function autoRepairCalendar() {
    console.log("=== AUTO-RÉPARATION DU CALENDRIER ===");
    
    // Vérifier s'il y a des événements mais qu'ils ne sont pas affichés
    const events = calendarEvents;
    const displayedEvents = document.querySelectorAll('.calendar-event');
    
    console.log(`Événements stockés: ${events.length}, Événements affichés: ${displayedEvents.length}`);
    
    if (events.length > 0 && displayedEvents.length === 0) {
        console.log("Problème détecté: événements stockés mais non affichés");
        
        // Forcer le rafraîchissement des événements
        renderEvents();
        
        // Vérifier si la réparation a fonctionné
        setTimeout(function() {
            const newDisplayedEvents = document.querySelectorAll('.calendar-event');
            console.log(`Après réparation: ${newDisplayedEvents.length} événements affichés`);
            
            if (newDisplayedEvents.length === 0 && events.length > 0) {
                console.log("La réparation automatique a échoué, affichage d'un message d'assistance");
                alert("Problème détecté: vos notes ne s'affichent pas correctement. Cliquez sur 'Diagnostic' pour résoudre le problème.");
            } else if (newDisplayedEvents.length > 0) {
                console.log("Réparation réussie!");
            }
        }, 500);
    }
}

// Exécuter l'initialisation quand le DOM est prêt
document.addEventListener('DOMContentLoaded', function() {
    console.log("--- DIAGNOSTIC - INITIALISATION DU CALENDRIER ---");
    
    // Vérifier si localStorage est disponible
    try {
        localStorage.setItem('test', 'test');
        localStorage.removeItem('test');
        console.log("✅ localStorage est disponible et fonctionne");
    } catch (e) {
        console.error("❌ localStorage n'est pas disponible:", e);
    }
    
    // Vérifier si le DOM contient les éléments nécessaires
    const requiredElements = [
        'calendarBody', 'calendarMonthYear', 'prevMonth', 'nextMonth', 
        'currentMonth', 'eventForm', 'eventTitle', 'eventDate', 'eventDescription', 
        'eventColor', 'upcoming-events', 'eventModal'
    ];
    
    let missingElements = [];
    
    requiredElements.forEach(id => {
        const element = document.getElementById(id);
        if (!element) {
            missingElements.push(id);
            console.error(`❌ Élément manquant: #${id}`);
        } else {
            console.log(`✅ Élément trouvé: #${id}`);
        }
    });
    
    if (missingElements.length > 0) {
        console.error(`${missingElements.length} éléments requis sont manquants dans le DOM!`);
    }
    
    console.log("Lancement de l'initialisation du calendrier...");
    initCalendar();
    console.log("--- FIN DIAGNOSTIC - INITIALISATION ---");
}); 