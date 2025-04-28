/**
 * User Filters - AJAX functionality for the user management page
 * 
 * This script provides client-side filtering for the user management table:
 * - Role filtering (Admin, Voyageurs, Entreprise)  
 * - Status filtering (Online, Active, Inactive)
 * - Search functionality
 * - Counter update
 * 
 * Works by showing/hiding table rows based on filter criteria.
 */
document.addEventListener('DOMContentLoaded', function() {
    console.log('User filters script loaded');
    
    // Get all filter elements
    const roleFilterRadios = document.querySelectorAll('input[name="roleFilter"]');
    const statusFilterRadios = document.querySelectorAll('input[name="statusFilter"]');
    const searchInput = document.getElementById('searchInput');
    const tableSearchInput = document.getElementById('tableSearchInput');
    const resetFiltersButton = document.getElementById('resetFilters');
    const userTableBody = document.getElementById('userTableBody');
    const userCountDisplay = document.querySelector('.user-counter');
    const paginationContainer = document.querySelector('nav[aria-label="Navigation des pages"]');
    
    console.log('Filter elements found:', {
        roleFilters: roleFilterRadios.length,
        statusFilters: statusFilterRadios.length,
        searchInput: searchInput ? true : false,
        tableSearchInput: tableSearchInput ? true : false,
        resetButton: resetFiltersButton ? true : false
    });
    
    // Get CSRF token from meta tag
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
    
    // Add event listeners to filter elements
    if (roleFilterRadios) {
        roleFilterRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                console.log('Role filter changed:', this.value);
                applyFilters();
            });
        });
    }
    
    if (statusFilterRadios) {
        statusFilterRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                console.log('Status filter changed:', this.value);
                applyFilters();
            });
        });
    }
    
    if (searchInput) {
        searchInput.addEventListener('keyup', debounce(function() {
            console.log('Search input changed:', this.value);
            applyFilters();
        }, 500));
    }
    
    if (tableSearchInput) {
        tableSearchInput.addEventListener('keyup', debounce(function() {
            console.log('Table search input changed:', this.value);
            applyFilters();
        }, 500));
    }
    
    if (resetFiltersButton) {
        resetFiltersButton.addEventListener('click', function() {
            console.log('Reset filters clicked');
            resetFilters();
        });
    }
    
    // Apply filters function
    function applyFilters() {
        console.log('Applying filters');
        loadPageWithFilters(1);
    }
    
    // Reset filters function
    function resetFilters() {
        console.log('Resetting filters');
        if (document.getElementById('roleAll')) {
            document.getElementById('roleAll').checked = true;
        }
        
        if (document.getElementById('statusAll')) {
            document.getElementById('statusAll').checked = true;
        }
        
        if (searchInput) {
            searchInput.value = '';
        }
        
        if (tableSearchInput) {
            tableSearchInput.value = '';
        }
        
        applyFilters();
    }
    
    // Load users with filters
    function loadPageWithFilters(page) {
        console.log('Loading page with filters, page:', page);
        
        // Get filter values
        const roleFilter = document.querySelector('input[name="roleFilter"]:checked')?.value || '';
        const statusFilter = document.querySelector('input[name="statusFilter"]:checked')?.value || '';
        const searchText = (searchInput ? searchInput.value.trim() : '') || 
                         (tableSearchInput ? tableSearchInput.value.trim() : '');
        
        console.log('Filter values:', { role: roleFilter, status: statusFilter, search: searchText });
        
        // Prepare filter data for AJAX
        const filterData = {
            page: page,
            filters: {}
        };
        if (roleFilter) filterData.filters.role = roleFilter;
        if (statusFilter) filterData.filters.status = statusFilter;
        if (searchText) filterData.filters.search = searchText;
        
        fetchFilteredUsers(filterData);
    }
    
    // Fetch filtered users via AJAX
    function fetchFilteredUsers(filterData) {
        console.log('Fetching filtered users with data:', filterData);
        
        // Create form data
        const formData = new FormData();
        formData.append('page', filterData.page);
        if (filterData.filters) {
            Object.keys(filterData.filters).forEach(key => {
                formData.append(`filters[${key}]`, filterData.filters[key]);
            });
        }
        if (csrfToken) {
            formData.append('_token', csrfToken);
        }
        
        // Show loading spinner
        if (userTableBody) {
            userTableBody.innerHTML = `
                <tr>
                    <td colspan="6" class="text-center">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </td>
                </tr>
            `;
        }
        
        fetch('/admin/users/filter', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // Update the table body
            if (userTableBody && data.html) {
                userTableBody.innerHTML = data.html;
            }
            // Update pagination
            if (paginationContainer && data.pagination) {
                paginationContainer.innerHTML = data.pagination;
                // Add click event listeners to pagination links
                document.querySelectorAll('.page-link').forEach(link => {
                    link.addEventListener('click', function(e) {
                        e.preventDefault();
                        const pageNum = this.getAttribute('data-page');
                        if (pageNum) {
                            loadPageWithFilters(parseInt(pageNum));
                        }
                    });
                });
            }
            // Update user count display
            if (userCountDisplay && data.totalItems !== undefined) {
                userCountDisplay.textContent = data.totalItems;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            if (userTableBody) {
                userTableBody.innerHTML = `
                    <tr>
                        <td colspan="6" class="text-center">
                            <div class="alert alert-danger">
                                <i class="fas fa-exclamation-circle me-2"></i> Une erreur s'est produite lors de la récupération des données.
                            </div>
                        </td>
                    </tr>
                `;
            }
        });
    }
    
    // Debounce function to prevent too many requests
    function debounce(func, delay) {
        let timeout;
        return function() {
            const context = this;
            const args = arguments;
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(context, args), delay);
        };
    }
    
    // Initial load - apply default filters
    console.log('Initial loading of filters');
    applyFilters();
}); 