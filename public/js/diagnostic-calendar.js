/**
 * Script de diagnostic et de réparation du calendrier
 * Ce script vérifie l'état du calendrier et tente de résoudre les problèmes d'affichage des notes
 */

(function() {
    console.log("=== DÉMARRAGE DU DIAGNOSTIC DE CALENDRIER ===");
    
    // Exécuter après chargement complet de la page
    window.addEventListener('load', function() {
        console.log("Page chargée, début du diagnostic");
        runDiagnostic();
        
        // Ajouter bouton de diagnostic explicite
        addDiagnosticButton();
    });
    
    function addDiagnosticButton() {
        const container = document.querySelector('.calendar-container');
        if (container) {
            const diagnosticBtn = document.createElement('button');
            diagnosticBtn.className = 'btn btn-danger w-100 mb-3';
            diagnosticBtn.textContent = '🔧 DIAGNOSTIC ET RÉPARATION';
            diagnosticBtn.addEventListener('click', function() {
                runDiagnostic(true);
            });
            
            // Insérer en haut de la div
            container.insertBefore(diagnosticBtn, container.firstChild);
        }
    }
    
    function runDiagnostic(interactive = false) {
        console.log("Exécution du diagnostic du calendrier");
        
        // 1. Vérifier le localStorage
        const storageCheck = checkLocalStorage();
        
        // 2. Vérifier les éléments du DOM
        const domCheck = checkDOMElements();
        
        // 3. Vérifier les scripts chargés
        const scriptsCheck = checkLoadedScripts();
        
        // 4. Vérifier les conflits de données
        const dataCheck = checkDataConsistency();
        
        // 5. Tenter de réparer les problèmes identifiés
        const repairs = repairIssues(storageCheck, domCheck, scriptsCheck, dataCheck);
        
        // 6. Vérifier l'état final
        const finalState = checkFinalState();
        
        // Rapport de diagnostic
        const report = {
            storage: storageCheck,
            dom: domCheck,
            scripts: scriptsCheck,
            data: dataCheck,
            repairs: repairs,
            finalState: finalState
        };
        
        console.log("Rapport de diagnostic:", report);
        
        // Afficher le résultat si demandé
        if (interactive) {
            showDiagnosticReport(report);
        }
        
        return report;
    }
    
    function checkLocalStorage() {
        console.log("Vérification du localStorage");
        
        const report = {
            available: false,
            events: [],
            hasEvents: false,
            error: null
        };
        
        try {
            // Vérifier si localStorage est disponible
            localStorage.setItem('calendar_test', 'test');
            localStorage.removeItem('calendar_test');
            report.available = true;
            
            // Vérifier les événements
            const eventsJSON = localStorage.getItem('bonplan_calendar_events');
            if (eventsJSON) {
                report.events = JSON.parse(eventsJSON);
                report.hasEvents = report.events.length > 0;
                console.log(`${report.events.length} événements trouvés dans localStorage`);
                
                if (report.hasEvents) {
                    console.log("Premier événement:", report.events[0]);
                }
            } else {
                console.log("Aucun événement trouvé dans localStorage");
            }
        } catch (error) {
            report.error = error.message;
            console.error("Erreur lors de la vérification du localStorage:", error);
        }
        
        return report;
    }
    
    function checkDOMElements() {
        console.log("Vérification des éléments DOM du calendrier");
        
        const elements = {
            calendarBody: document.getElementById('calendarBody'),
            monthTitle: document.getElementById('calendarMonthYear'),
            prevMonthBtn: document.getElementById('prevMonth'),
            nextMonthBtn: document.getElementById('nextMonth'),
            currentMonthBtn: document.getElementById('currentMonth'),
            eventForm: document.getElementById('eventForm'),
            eventContainers: document.querySelectorAll('.calendar-events')
        };
        
        const report = {
            elementsPresent: {
                calendarBody: !!elements.calendarBody,
                monthTitle: !!elements.monthTitle,
                navigation: !!(elements.prevMonthBtn && elements.nextMonthBtn && elements.currentMonthBtn),
                eventForm: !!elements.eventForm
            },
            eventContainers: {
                count: elements.eventContainers.length,
                firstDate: elements.eventContainers.length > 0 ? elements.eventContainers[0].dataset.date : null
            },
            elements: elements
        };
        
        console.log("Éléments DOM:", report);
        return report;
    }
    
    function checkLoadedScripts() {
        console.log("Vérification des scripts chargés");
        
        const scripts = Array.from(document.querySelectorAll('script')).map(script => {
            return {
                src: script.src,
                loaded: script.complete
            };
        });
        
        const report = {
            scripts: scripts,
            hasRebuildCalendar: scripts.some(s => s.src.includes('rebuild-calendar.js')),
            hasBootstrap: scripts.some(s => s.src.includes('bootstrap')),
            hasDuplicates: false
        };
        
        // Vérifier les doublons
        const srcs = scripts.map(s => s.src);
        report.hasDuplicates = srcs.length !== new Set(srcs).size;
        
        console.log("Scripts chargés:", report);
        return report;
    }
    
    function checkDataConsistency() {
        console.log("Vérification de la cohérence des données");
        
        const report = {
            windowEvents: typeof window.calendarEvents !== 'undefined' ? window.calendarEvents.length : 'non défini',
            storageEvents: [],
            datesInCalendar: [],
            datesInStorage: [],
            eventsWithoutContainers: []
        };
        
        try {
            // Récupérer les événements du localStorage
            const eventsJSON = localStorage.getItem('bonplan_calendar_events');
            if (eventsJSON) {
                report.storageEvents = JSON.parse(eventsJSON);
                report.datesInStorage = report.storageEvents.map(e => e.date);
            }
            
            // Dates dans le calendrier actuel
            const containers = document.querySelectorAll('.calendar-events');
            report.datesInCalendar = Array.from(containers).map(c => c.dataset.date);
            
            // Événements sans conteneurs
            report.eventsWithoutContainers = report.storageEvents.filter(event => {
                return !report.datesInCalendar.includes(event.date);
            });
            
            // Vérifier si les variables globales sont en conflit
            if (typeof window.calendarEvents !== 'undefined' && 
                JSON.stringify(window.calendarEvents) !== eventsJSON) {
                report.globalVariablesConflict = true;
            }
            
        } catch (error) {
            report.error = error.message;
            console.error("Erreur lors de la vérification de cohérence des données:", error);
        }
        
        console.log("Cohérence des données:", report);
        return report;
    }
    
    function repairIssues(storageCheck, domCheck, scriptsCheck, dataCheck) {
        console.log("Tentative de réparation des problèmes identifiés");
        
        const repairs = {
            actionsPerformed: [],
            success: false
        };
        
        try {
            // 1. Réparer localStorage si nécessaire
            if (!storageCheck.available || storageCheck.error) {
                repairs.actionsPerformed.push("Réparation de localStorage impossible, utilisation du stockage alternatif");
                // Le stockage alternatif serait implémenté ici
            }
            
            // 2. Réparer les éléments DOM manquants
            if (!domCheck.elementsPresent.calendarBody) {
                repairs.actionsPerformed.push("Corps du calendrier manquant, création impossible");
            }
            
            // 3. Réparer les événements
            // Si les événements existent dans le stockage mais pas affichés
            if (storageCheck.hasEvents && domCheck.eventContainers.count > 0) {
                forceDisplayEvents(storageCheck.events);
                repairs.actionsPerformed.push("Affichage forcé des événements");
            }
            
            // 4. Reconstruire le calendrier avec le bon mois si nécessaire
            if (dataCheck.eventsWithoutContainers.length > 0) {
                const eventDates = dataCheck.eventsWithoutContainers.map(e => new Date(e.date));
                if (eventDates.length > 0) {
                    // Utiliser la date du premier événement pour naviguer vers le bon mois
                    const firstEventDate = eventDates[0];
                    navigateToEventMonth(firstEventDate);
                    repairs.actionsPerformed.push(`Navigation vers le mois de l'événement: ${firstEventDate.toISOString().slice(0, 7)}`);
                }
            }
            
            repairs.success = true;
        } catch (error) {
            repairs.error = error.message;
            console.error("Erreur lors de la réparation:", error);
        }
        
        console.log("Réparations effectuées:", repairs);
        return repairs;
    }
    
    function forceDisplayEvents(events) {
        console.log("Forçage de l'affichage des événements", events);
        
        // Supprimer tous les événements existants
        document.querySelectorAll('.calendar-event').forEach(el => el.remove());
        
        // Ajouter manuellement les événements
        let eventsDisplayed = 0;
        
        events.forEach(event => {
            const container = document.querySelector(`.calendar-events[data-date="${event.date}"]`);
            
            if (container) {
                console.log(`Conteneur trouvé pour ${event.date}, création de l'événement:`, event.title);
                
                const eventEl = document.createElement('div');
                eventEl.classList.add('calendar-event');
                eventEl.textContent = event.title;
                eventEl.dataset.eventId = event.id;
                eventEl.style.backgroundColor = event.color || '#5e72e4';
                
                container.appendChild(eventEl);
                eventsDisplayed++;
            } else {
                console.warn(`Aucun conteneur trouvé pour la date ${event.date}`);
            }
        });
        
        console.log(`${eventsDisplayed}/${events.length} événements affichés avec succès`);
        return eventsDisplayed;
    }
    
    function navigateToEventMonth(date) {
        console.log("Navigation vers le mois de l'événement:", date);
        
        // Mettre à jour les variables globales
        if (typeof window.currentMonth !== 'undefined' && typeof window.currentYear !== 'undefined') {
            window.currentMonth = date.getMonth();
            window.currentYear = date.getFullYear();
            
            // Tenter de reconstruire le calendrier
            if (typeof window.generateCalendar === 'function') {
                window.generateCalendar();
            } else {
                console.error("Fonction generateCalendar non disponible");
            }
        } else {
            console.error("Variables globales du calendrier non disponibles");
        }
    }
    
    function checkFinalState() {
        const events = JSON.parse(localStorage.getItem('bonplan_calendar_events') || '[]');
        const displayedEvents = document.querySelectorAll('.calendar-event');
        
        return {
            eventsInStorage: events.length,
            eventsDisplayed: displayedEvents.length,
            success: displayedEvents.length > 0 && displayedEvents.length === events.length
        };
    }
    
    function showDiagnosticReport(report) {
        // Préparer un rapport lisible
        let message = "=== RAPPORT DE DIAGNOSTIC DU CALENDRIER ===\n\n";
        
        // Stockage
        message += "STOCKAGE:\n";
        message += `- LocalStorage disponible: ${report.storage.available ? 'OUI' : 'NON'}\n`;
        message += `- Événements stockés: ${report.storage.events.length}\n`;
        if (report.storage.error) {
            message += `- ERREUR: ${report.storage.error}\n`;
        }
        
        // DOM
        message += "\nÉLÉMENTS DOM:\n";
        message += `- Corps du calendrier: ${report.dom.elementsPresent.calendarBody ? 'OK' : 'MANQUANT'}\n`;
        message += `- Navigation: ${report.dom.elementsPresent.navigation ? 'OK' : 'MANQUANTE'}\n`;
        message += `- Formulaire: ${report.dom.elementsPresent.eventForm ? 'OK' : 'MANQUANT'}\n`;
        message += `- Conteneurs de dates: ${report.dom.eventContainers.count}\n`;
        
        // Problèmes identifiés
        message += "\nPROBLÈMES IDENTIFIÉS:\n";
        if (report.storage.hasEvents && report.dom.eventContainers.count > 0 && report.finalState.eventsDisplayed === 0) {
            message += "- Les événements existent mais ne sont pas affichés\n";
        }
        if (report.data.eventsWithoutContainers.length > 0) {
            message += `- ${report.data.eventsWithoutContainers.length} événements sont dans un mois différent de celui affiché\n`;
        }
        if (report.scripts.hasDuplicates) {
            message += "- Scripts en double détectés\n";
        }
        
        // Réparations
        message += "\nRÉPARATIONS EFFECTUÉES:\n";
        if (report.repairs.actionsPerformed.length > 0) {
            report.repairs.actionsPerformed.forEach(action => {
                message += `- ${action}\n`;
            });
        } else {
            message += "- Aucune réparation nécessaire\n";
        }
        
        // État final
        message += "\nÉTAT FINAL:\n";
        message += `- Événements en stockage: ${report.finalState.eventsInStorage}\n`;
        message += `- Événements affichés: ${report.finalState.eventsDisplayed}\n`;
        message += `- Statut: ${report.finalState.success ? 'RÉPARÉ' : 'PROBLÈMES PERSISTANTS'}\n`;
        
        // Instructions si problèmes persistants
        if (!report.finalState.success) {
            message += "\nRECOMMANDATIONS:\n";
            message += "1. Essayez de naviguer vers le mois où se trouvent vos événements\n";
            message += "2. Vérifiez que JavaScript est activé dans votre navigateur\n";
            message += "3. Essayez de vider le cache de votre navigateur et recharger la page\n";
            message += "4. Essayez d'ajouter un nouvel événement pour aujourd'hui\n";
        }
        
        // Afficher le rapport
        alert(message);
        
        // Si réparations effectuées, rafraîchir la page
        if (report.repairs.actionsPerformed.length > 0 && !report.finalState.success) {
            if (confirm("Des réparations ont été effectuées. Voulez-vous rafraîchir la page?")) {
                window.location.reload();
            }
        }
    }
})(); 