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
    const exportExcelButton = document.getElementById('exportExcelButton');
    const exportPdfButton = document.getElementById('exportPdfButton');
    
    // Store current page for pagination
    let currentPage = 1;
    
    console.log('Filter elements found:', {
        roleFilters: roleFilterRadios.length,
        statusFilters: statusFilterRadios.length,
        searchInput: searchInput ? true : false,
        tableSearchInput: tableSearchInput ? true : false,
        resetButton: resetFiltersButton ? true : false,
        exportExcelButton: exportExcelButton ? true : false,
        exportPdfButton: exportPdfButton ? true : false
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
    
    // Add event listeners for export buttons
    if (exportExcelButton) {
        exportExcelButton.addEventListener('click', function() {
            console.log('Export Excel button clicked');
            exportToExcel();
        });
    }
    
    if (exportPdfButton) {
        exportPdfButton.addEventListener('click', function() {
            console.log('Export PDF button clicked');
            exportToPdf();
        });
    }
    
    // Apply filters function
    function applyFilters() {
        console.log('Applying filters');
        // Reset to page 1 when filters change
        currentPage = 1;
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
        
        // Update current page
        currentPage = page || 1;
        
        // Get filter values
        const roleFilter = document.querySelector('input[name="roleFilter"]:checked')?.value || '';
        const statusFilter = document.querySelector('input[name="statusFilter"]:checked')?.value || '';
        const searchText = (searchInput ? searchInput.value.trim() : '') || 
                         (tableSearchInput ? tableSearchInput.value.trim() : '');
        
        console.log('Filter values:', { role: roleFilter, status: statusFilter, search: searchText, page: currentPage });
        
        // Create JSON data for the request
        const filterData = {
            filters: {
                role: roleFilter,
                status: statusFilter,
                search: searchText
            },
            page: currentPage
        };
        
        fetchFilteredUsers(filterData);
    }
    
    // Fetch filtered users via AJAX
    function fetchFilteredUsers(filterData) {
        console.log('Fetching filtered users with data:', filterData);
        
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
        
        // Send as JSON instead of FormData
        fetch('/admin/users/filter', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify(filterData)
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log('Received data:', data);
            
            // Update the table body
            if (userTableBody && data.html) {
                userTableBody.innerHTML = data.html;
                
                // Re-attach event listeners to edit and delete buttons
                attachButtonEventListeners();
            }
            
            // Update pagination
            if (paginationContainer && data.pagination) {
                paginationContainer.innerHTML = data.pagination;
                
                // Add click event listeners to pagination links
                attachPaginationEventListeners();
            }
            
            // Update user count display
            if (userCountDisplay && data.totalItems !== undefined) {
                userCountDisplay.textContent = data.totalItems;
            }
            
            // Update pagination info if available
            const paginationInfoElement = document.querySelector('.pagination-info');
            if (paginationInfoElement && data.paginationInfo) {
                paginationInfoElement.innerHTML = data.paginationInfo;
            } else if (paginationInfoElement && data.totalItems) {
                const currentPage = data.currentPage || 1;
                const itemsPerPage = 10; // Default or get from response
                const start = (currentPage - 1) * itemsPerPage + 1;
                const end = Math.min(currentPage * itemsPerPage, data.totalItems);
                paginationInfoElement.innerHTML = `Affichage de <span class="fw-bold">${end - start + 1}</span> sur <span class="fw-bold">${data.totalItems}</span> utilisateur(s)`;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            if (userTableBody) {
                userTableBody.innerHTML = `
                    <tr>
                        <td colspan="6" class="text-center">
                            <div class="alert alert-danger">
                                Une erreur est survenue lors du chargement des données.
                                <br>
                                ${error.message}
                            </div>
                        </td>
                    </tr>
                `;
            }
        });
    }
    
    // Export to Excel function
    function exportToExcel() {
        // Get current filter values
        const roleFilter = document.querySelector('input[name="roleFilter"]:checked')?.value || '';
        const statusFilter = document.querySelector('input[name="statusFilter"]:checked')?.value || '';
        const searchText = (searchInput ? searchInput.value.trim() : '') || 
                         (tableSearchInput ? tableSearchInput.value.trim() : '');
        
        // Set form values
        if (document.getElementById('excelRoleFilterValue')) {
            document.getElementById('excelRoleFilterValue').value = roleFilter;
        }
        
        if (document.getElementById('excelStatusFilterValue')) {
            document.getElementById('excelStatusFilterValue').value = statusFilter;
        }
        
        if (document.getElementById('excelSearchFilterValue')) {
            document.getElementById('excelSearchFilterValue').value = searchText;
        }
        
        // Submit the form
        if (document.getElementById('exportExcelForm')) {
            document.getElementById('exportExcelForm').submit();
        }
    }
    
    // Export to PDF function
    function exportToPdf() {
        // Get filter values
        const roleFilter = document.querySelector('input[name="roleFilter"]:checked')?.value || '';
        const statusFilter = document.querySelector('input[name="statusFilter"]:checked')?.value || '';
        const searchText = (searchInput ? searchInput.value.trim() : '') || 
                          (tableSearchInput ? tableSearchInput.value.trim() : '');
        
        // Set form values
        if (document.getElementById('roleFilterValue')) {
            document.getElementById('roleFilterValue').value = roleFilter;
        }
        
        if (document.getElementById('statusFilterValue')) {
            document.getElementById('statusFilterValue').value = statusFilter;
        }
        
        if (document.getElementById('searchFilterValue')) {
            document.getElementById('searchFilterValue').value = searchText;
        }
        
        // Check if showing filters checkbox is checked
        if (document.getElementById('showFilters') && document.getElementById('pdfShowFiltersValue')) {
            document.getElementById('pdfShowFiltersValue').value = document.getElementById('showFilters').checked ? '1' : '0';
        }
        
        // Submit the form
        if (document.getElementById('exportPdfForm')) {
            document.getElementById('exportPdfForm').submit();
        }
    }
    
    // Attach event listeners to pagination links
    function attachPaginationEventListeners() {
        document.querySelectorAll('.page-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Don't do anything if this is the current page or disabled link
                if (this.parentElement.classList.contains('active') || 
                    this.parentElement.classList.contains('disabled')) {
                    return;
                }
                
                // Extract page number from href
                const href = this.getAttribute('href');
                let page = 1;
                
                if (href) {
                    const match = href.match(/page=(\d+)/);
                    if (match && match[1]) {
                        page = parseInt(match[1]);
                    }
                }
                
                loadPageWithFilters(page);
            });
        });
    }
    
    // Attach event listeners to action buttons (only edit button remains)
    function attachButtonEventListeners() {
        // Add event listeners to edit buttons
        document.querySelectorAll('.btn-edit-user').forEach(button => {
            button.addEventListener('click', function(e) {
                const userId = this.getAttribute('data-user-id');
                console.log('Edit user clicked, ID:', userId);
                // Any additional functionality for the edit button
            });
        });
    }
    
    // Debounce function to limit search input event firing
    function debounce(func, delay) {
        let timeout;
        return function() {
            const context = this;
            const args = arguments;
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(context, args), delay);
        };
    }
    
    // Initial load
    if (userTableBody) {
        loadPageWithFilters(1);
    }
}); 