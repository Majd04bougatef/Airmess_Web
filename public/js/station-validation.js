document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('station-form');
    const errorMessages = {
        nom: {
            required: 'Le nom de la station est obligatoire',
            maxLength: 'Le nom de la station ne peut pas dépasser 255 caractères'
        },
        latitude: {
            required: 'La latitude est obligatoire',
            type: 'La latitude doit être un nombre'
        },
        longitude: {
            required: 'La longitude est obligatoire',
            type: 'La longitude doit être un nombre'
        },
        capacite: {
            required: 'La capacité est obligatoire',
            min: 'La capacité doit être supérieure à 10'
        },
        nombreVelo: {
            required: 'Le nombre de vélos est obligatoire',
            max: 'Le nombre de vélos ne peut pas être supérieur à la capacité'
        },
        typeVelo: {
            required: 'Le type de vélo est obligatoire'
        },
        prixHeure: {
            required: 'Le prix par heure est obligatoire',
            min: 'Le prix par heure doit être supérieur à 0'
        },
        pays: {
            required: 'Le pays est obligatoire'
        }
    };

    function showError(input, message) {
        // Remove existing error message if any
        removeError(input);

        // Create error element
        const errorDiv = document.createElement('div');
        errorDiv.className = 'invalid-feedback';
        errorDiv.textContent = message;
        errorDiv.style.color = '#dc3545';
        errorDiv.style.fontSize = '0.875em';
        errorDiv.style.marginTop = '0.25rem';

        // Add error class to input
        input.classList.add('is-invalid');
        input.style.borderColor = '#dc3545';

        // Insert error message after input
        input.parentNode.appendChild(errorDiv);
    }

    function removeError(input) {
        input.classList.remove('is-invalid');
        input.style.borderColor = '';
        const errorDiv = input.parentNode.querySelector('.invalid-feedback');
        if (errorDiv) {
            errorDiv.remove();
        }
    }

    function validateForm(e) {
        e.preventDefault();
        let isValid = true;

        // Validate nom
        const nom = form.querySelector('#station_nom');
        if (!nom.value.trim()) {
            showError(nom, errorMessages.nom.required);
            isValid = false;
        } else if (nom.value.length > 255) {
            showError(nom, errorMessages.nom.maxLength);
            isValid = false;
        } else {
            removeError(nom);
        }

        // Validate latitude
        const latitude = form.querySelector('#station_latitude');
        if (!latitude.value.trim()) {
            showError(latitude, errorMessages.latitude.required);
            isValid = false;
        } else if (isNaN(parseFloat(latitude.value))) {
            showError(latitude, errorMessages.latitude.type);
            isValid = false;
        } else {
            removeError(latitude);
        }

        // Validate longitude
        const longitude = form.querySelector('#station_longitude');
        if (!longitude.value.trim()) {
            showError(longitude, errorMessages.longitude.required);
            isValid = false;
        } else if (isNaN(parseFloat(longitude.value))) {
            showError(longitude, errorMessages.longitude.type);
            isValid = false;
        } else {
            removeError(longitude);
        }

        // Validate capacite
        const capacite = form.querySelector('#station_capacite');
        if (!capacite.value.trim()) {
            showError(capacite, errorMessages.capacite.required);
            isValid = false;
        } else if (parseInt(capacite.value) <= 10) {
            showError(capacite, errorMessages.capacite.min);
            isValid = false;
        } else {
            removeError(capacite);
        }

        // Validate nombreVelo
        const nombreVelo = form.querySelector('#station_nombreVelo');
        const capaciteValue = parseInt(capacite.value);
        if (!nombreVelo.value.trim()) {
            showError(nombreVelo, errorMessages.nombreVelo.required);
            isValid = false;
        } else if (parseInt(nombreVelo.value) > capaciteValue) {
            showError(nombreVelo, errorMessages.nombreVelo.max);
            isValid = false;
        } else {
            removeError(nombreVelo);
        }

        // Validate typeVelo
        const typeVelo = form.querySelector('#station_typeVelo');
        if (!typeVelo.value) {
            showError(typeVelo, errorMessages.typeVelo.required);
            isValid = false;
        } else {
            removeError(typeVelo);
        }

        // Validate prixHeure
        const prixHeure = form.querySelector('#station_prixHeure');
        if (!prixHeure.value.trim()) {
            showError(prixHeure, errorMessages.prixHeure.required);
            isValid = false;
        } else if (parseFloat(prixHeure.value) <= 0) {
            showError(prixHeure, errorMessages.prixHeure.min);
            isValid = false;
        } else {
            removeError(prixHeure);
        }

        // Validate pays
        const pays = form.querySelector('#station_pays');
        if (!pays.value) {
            showError(pays, errorMessages.pays.required);
            isValid = false;
        } else {
            removeError(pays);
        }

        if (isValid) {
            form.submit();
        }
    }

    if (form) {
        form.addEventListener('submit', validateForm);
    }
}); 