/**
 * Airmess Admin Dashboard JavaScript
 * 
 * This file contains the core functionality for the admin dashboard,
 * including data visualization, user management, and other admin features.
 */

// Charts configuration
function initCharts() {
    if (document.getElementById('userRoleChart')) {
        // Chart initialization is handled in the individual template files
        console.log('Charts initialized');
    }
}

// User management functions
const userManagement = {
    // Initialize user management features
    init: function() {
        // Search functionality
        const searchInput = document.getElementById('searchInput');
        if (searchInput) {
            searchInput.addEventListener('keyup', this.filterUsers);
        }

        // Filter functionality
        const applyFiltersBtn = document.getElementById('applyFilters');
        if (applyFiltersBtn) {
            applyFiltersBtn.addEventListener('click', this.applyFilters);
        }

        // Reset filters
        const resetFiltersBtn = document.getElementById('resetFilters');
        if (resetFiltersBtn) {
            resetFiltersBtn.addEventListener('click', this.resetFilters);
        }

        // Export functionality
        const exportBtn = document.getElementById('exportButton');
        if (exportBtn) {
            exportBtn.addEventListener('click', this.exportUserData);
        }

        // Add user
        const saveNewUserBtn = document.getElementById('saveNewUser');
        if (saveNewUserBtn) {
            saveNewUserBtn.addEventListener('click', this.addUser);
        }

        // Initialize edit and delete buttons
        this.initActionButtons();
    },

    // Initialize edit and delete buttons for dynamic content
    initActionButtons: function() {
        // Add event listeners for edit buttons
        document.querySelectorAll('[id^="saveEditUser-"]').forEach(button => {
            const userId = button.id.split('-')[1];
            button.addEventListener('click', function() {
                saveUser(userId);
            });
        });
    },

    // Filter users based on search input
    filterUsers: function() {
        const filter = this.value.toUpperCase();
        const table = document.getElementById('usersTable');
        const tr = table.getElementsByTagName('tr');
        
        for (let i = 0; i < tr.length; i++) {
            const td = tr[i].getElementsByTagName('td')[0];
            if (td) {
                const txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = '';
                } else {
                    tr[i].style.display = 'none';
                }
            }
        }
    },

    // Apply filters (role, status)
    applyFilters: function() {
        const roleFilter = document.getElementById('roleFilter').value.toUpperCase();
        const statusFilter = document.getElementById('statusFilter').value.toUpperCase();
        
        const table = document.getElementById('usersTable');
        const tr = table.getElementsByTagName('tr');
        
        for (let i = 1; i < tr.length; i++) {
            const roleCell = tr[i].getElementsByTagName('td')[1];
            const statusCell = tr[i].getElementsByTagName('td')[2];
            
            if (roleCell && statusCell) {
                const roleValue = roleCell.textContent || roleCell.innerText;
                let statusValue = statusCell.textContent || statusCell.innerText;
                
                // Normalize status values
                if (statusValue.includes('Actif')) statusValue = 'ACTIF';
                if (statusValue.includes('Inactif')) statusValue = 'INACTIF';
                
                const roleMatch = roleFilter === '' || roleValue.toUpperCase().indexOf(roleFilter) > -1;
                const statusMatch = statusFilter === '' || 
                    (statusFilter === 'ACTIF' && (statusValue.includes('ACTIF') || statusValue.includes('ACTIVE'))) ||
                    (statusFilter === 'INACTIF' && (statusValue.includes('INACTIF') || statusValue.includes('INACTIVE'))) ||
                    (statusFilter !== 'ACTIF' && statusFilter !== 'INACTIF' && statusValue.toUpperCase().indexOf(statusFilter) > -1);
                
                if (roleMatch && statusMatch) {
                    tr[i].style.display = '';
                } else {
                    tr[i].style.display = 'none';
                }
            }
        }
    },

    // Reset all filters
    resetFilters: function() {
        document.getElementById('roleFilter').value = '';
        document.getElementById('statusFilter').value = '';
        document.getElementById('searchInput').value = '';
        
        const table = document.getElementById('usersTable');
        const tr = table.getElementsByTagName('tr');
        
        for (let i = 1; i < tr.length; i++) {
            tr[i].style.display = '';
        }
    },

    // Export user data to CSV
    exportUserData: function() {
        const table = document.getElementById('usersTable');
        const rows = table.getElementsByTagName('tr');
        let csv = [];
        
        // Header row
        const headerRow = [];
        const headers = rows[0].getElementsByTagName('th');
        for (let i = 0; i < headers.length - 1; i++) { // Skip the Actions column
            headerRow.push(headers[i].textContent.trim());
        }
        csv.push(headerRow.join(','));
        
        // Data rows
        for (let i = 1; i < rows.length; i++) {
            const cells = rows[i].getElementsByTagName('td');
            if (rows[i].style.display !== 'none') { // Only export visible rows
                const row = [];
                // Name and Email
                row.push('"' + cells[0].querySelector('h6').textContent.trim() + '"');
                row.push('"' + cells[0].querySelector('p').textContent.trim() + '"');
                // Role
                row.push('"' + cells[1].textContent.trim() + '"');
                // Status
                row.push('"' + cells[2].textContent.trim() + '"');
                // Registration date
                row.push('"' + cells[3].textContent.trim() + '"');
                // Phone
                row.push('"' + cells[4].textContent.trim() + '"');
                
                csv.push(row.join(','));
            }
        }
        
        // Download CSV
        const csvContent = 'data:text/csv;charset=utf-8,' + csv.join('\n');
        const encodedUri = encodeURI(csvContent);
        const link = document.createElement('a');
        link.setAttribute('href', encodedUri);
        link.setAttribute('download', 'utilisateurs_airmess.csv');
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    },

    // Add new user
    addUser: function() {
        const name = document.getElementById('name').value;
        const prenom = document.getElementById('prenom').value;
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const phone = document.getElementById('phone').value;
        const role = document.getElementById('role').value;
        
        if (!name || !prenom || !email || !password) {
            alert('Veuillez remplir tous les champs obligatoires');
            return;
        }
        
        const data = {
            name: name,
            prenom: prenom,
            email: email,
            password: password,
            phone: phone,
            role: role
        };
        
        // Get the correct path
        const addUserPath = document.querySelector('form[id="addUserForm"]').getAttribute('action') || '/UserPage/add';
        
        fetch(addUserPath, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Utilisateur créé avec succès');
                window.location.reload();
            } else {
                alert('Erreur: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Une erreur est survenue');
        });
    }
};

// Delete user
function confirmDelete(userId) {
    if (confirm("Êtes-vous sûr de vouloir supprimer cet utilisateur ?")) {
        const deletePath = document.getElementById('usersTable').dataset.deletePath.replace('0', userId);
        
        fetch(deletePath, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Utilisateur supprimé avec succès');
                window.location.reload();
            } else {
                alert('Erreur lors de la suppression: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Une erreur est survenue');
        });
    }
}

// Edit user
function saveUser(userId) {
    const name = document.getElementById('editName' + userId).value;
    const prenom = document.getElementById('editPrenom' + userId).value;
    const email = document.getElementById('editEmail' + userId).value;
    const phone = document.getElementById('editPhone' + userId).value;
    const role = document.getElementById('editRole' + userId).value;
    const status = document.getElementById('editStatus' + userId).value;
    
    if (!name || !prenom || !email) {
        alert('Veuillez remplir tous les champs obligatoires');
        return;
    }
    
    const data = {
        name: name,
        prenom: prenom,
        email: email,
        phone: phone,
        role: role,
        status: status
    };
    
    const editPath = document.getElementById('usersTable').dataset.editPath.replace('0', userId);
    
    fetch(editPath, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Utilisateur modifié avec succès');
            window.location.reload();
        } else {
            alert('Erreur: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Une erreur est survenue');
    });
}

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    initCharts();
    userManagement.init();
}); 