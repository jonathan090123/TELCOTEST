// ===== GENERAL UTILITIES =====

/**
 * Format currency to IDR
 * @param {number} amount - Amount in number
 * @returns {string} Formatted currency
 */
function formatCurrency(amount) {
    return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0,
        maximumFractionDigits: 0
    }).format(amount);
}

/**
 * Format date to Indonesian format
 * @param {Date|string} date - Date object or date string
 * @returns {string} Formatted date
 */
function formatDate(date) {
    const options = { 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    };
    return new Date(date).toLocaleDateString('id-ID', options);
}

/**
 * Format time
 * @param {Date|string} date - Date object or date string
 * @returns {string} Formatted time
 */
function formatTime(date) {
    const options = { 
        hour: '2-digit', 
        minute: '2-digit',
        second: '2-digit'
    };
    return new Date(date).toLocaleTimeString('id-ID', options);
}

/**
 * Get greeting based on time of day
 * @returns {string} Greeting text
 */
function getGreeting() {
    const hour = new Date().getHours();
    if (hour < 12) return 'Selamat Pagi';
    if (hour < 15) return 'Selamat Siang';
    if (hour < 18) return 'Selamat Sore';
    return 'Selamat Malam';
}

/**
 * Update current time
 * @param {string} elementId - Element ID to update
 */
function updateCurrentTime(elementId) {
    const el = document.getElementById(elementId);
    if (el) {
        const now = new Date();
        el.textContent = formatTime(now);
        setInterval(() => {
            el.textContent = formatTime(new Date());
        }, 1000);
    }
}

/**
 * Mobile menu toggle
 * @param {string} btnSelector - Button selector
 * @param {string} menuSelector - Menu selector
 */
function setupMobileMenu(btnSelector = '.mobile-menu-btn', menuSelector = '.nav-menu') {
    const btn = document.querySelector(btnSelector);
    const menu = document.querySelector(menuSelector);
    
    if (btn && menu) {
        btn.addEventListener('click', () => {
            menu.style.display = menu.style.display === 'flex' ? 'none' : 'flex';
        });

        // Close menu on link click
        menu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                menu.style.display = 'none';
            });
        });
    }
}

/**
 * Setup SPA navigation with smooth transitions
 * @param {string} contentSelector - Main content selector
 * @param {string} navLinkSelector - Navigation link selector
 */
function setupSPANavigation(contentSelector = '#app-content', navLinkSelector = '.nav-link') {
    const appContent = document.querySelector(contentSelector);
    const navLinks = document.querySelectorAll(navLinkSelector);
    const FADE_DURATION = 360;

    if (!appContent || navLinks.length === 0) return;

    navLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const targetId = link.getAttribute('href').substring(1);
            const targetSection = document.getElementById(targetId);

            if (!targetSection) return;

            // Add fading class
            appContent.classList.add('is-fading');

            // Wait for fade-out, then scroll and fade-in
            setTimeout(() => {
                targetSection.scrollIntoView({ behavior: 'smooth' });
                setTimeout(() => {
                    appContent.classList.remove('is-fading');
                    updateActiveNavLink();
                }, 120);
            }, FADE_DURATION - 120);
        });
    });

    // Update active link based on scroll position
    window.addEventListener('scroll', updateActiveNavLink);

    function updateActiveNavLink() {
        let current = 'home';
        const sections = document.querySelectorAll('section[id]');

        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            if (window.pageYOffset >= sectionTop - 120) {
                current = section.getAttribute('id');
            }
        });

        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === `#${current}`) {
                link.classList.add('active');
            }
        });
    }

    // Set initial active link
    updateActiveNavLink();
}

/**
 * Setup data table with sorting
 * @param {string} tableSelector - Table selector
 */
function setupDataTable(tableSelector) {
    const table = document.querySelector(tableSelector);
    if (!table) return;

    const headers = table.querySelectorAll('thead th');
    headers.forEach((header, index) => {
        header.style.cursor = 'pointer';
        header.addEventListener('click', () => {
            sortTableByColumn(table, index);
        });
    });
}

/**
 * Sort table by column
 * @param {Element} table - Table element
 * @param {number} column - Column index
 */
function sortTableByColumn(table, column) {
    const tbody = table.querySelector('tbody');
    const rows = Array.from(tbody.querySelectorAll('tr'));
    let isAscending = true;

    // Check current sort direction
    const header = table.querySelector(`thead th:nth-child(${column + 1})`);
    if (header.classList.contains('sorted-asc')) {
        isAscending = false;
        header.classList.remove('sorted-asc');
        header.classList.add('sorted-desc');
    } else {
        header.classList.remove('sorted-desc');
        header.classList.add('sorted-asc');
    }

    rows.sort((a, b) => {
        const aText = a.cells[column].textContent.trim();
        const bText = b.cells[column].textContent.trim();

        // Try numeric sort
        const aNum = parseFloat(aText);
        const bNum = parseFloat(bText);

        if (!isNaN(aNum) && !isNaN(bNum)) {
            return isAscending ? aNum - bNum : bNum - aNum;
        }

        // Text sort
        return isAscending ? 
            aText.localeCompare(bText) : 
            bText.localeCompare(aText);
    });

    rows.forEach(row => tbody.appendChild(row));
}

/**
 * Setup search functionality
 * @param {string} inputSelector - Search input selector
 * @param {string} tableSelector - Table selector
 */
function setupTableSearch(inputSelector, tableSelector) {
    const input = document.querySelector(inputSelector);
    const table = document.querySelector(tableSelector);

    if (!input || !table) return;

    input.addEventListener('keyup', (e) => {
        const searchTerm = e.target.value.toLowerCase();
        const rows = table.querySelectorAll('tbody tr');

        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(searchTerm) ? '' : 'none';
        });
    });
}

/**
 * Setup pagination
 * @param {number} totalItems - Total items
 * @param {number} itemsPerPage - Items per page
 * @param {Function} callback - Callback function when page changes
 */
function setupPagination(totalItems, itemsPerPage, callback) {
    const totalPages = Math.ceil(totalItems / itemsPerPage);
    let currentPage = 1;

    return {
        next() {
            if (currentPage < totalPages) {
                currentPage++;
                callback(currentPage);
            }
        },
        prev() {
            if (currentPage > 1) {
                currentPage--;
                callback(currentPage);
            }
        },
        goToPage(page) {
            if (page >= 1 && page <= totalPages) {
                currentPage = page;
                callback(currentPage);
            }
        },
        getCurrentPage() {
            return currentPage;
        },
        getTotalPages() {
            return totalPages;
        }
    };
}

/**
 * Local storage utilities
 */
const Storage = {
    set(key, value) {
        try {
            localStorage.setItem(key, JSON.stringify(value));
        } catch (e) {
            console.error('Storage error:', e);
        }
    },
    get(key) {
        try {
            const item = localStorage.getItem(key);
            return item ? JSON.parse(item) : null;
        } catch (e) {
            console.error('Storage error:', e);
            return null;
        }
    },
    remove(key) {
        try {
            localStorage.removeItem(key);
        } catch (e) {
            console.error('Storage error:', e);
        }
    },
    clear() {
        try {
            localStorage.clear();
        } catch (e) {
            console.error('Storage error:', e);
        }
    }
};

/**
 * API utilities
 */
const API = {
    async get(url) {
        try {
            const response = await fetch(url);
            return await response.json();
        } catch (error) {
            console.error('API error:', error);
            throw error;
        }
    },
    async post(url, data) {
        try {
            const response = await fetch(url, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(data)
            });
            return await response.json();
        } catch (error) {
            console.error('API error:', error);
            throw error;
        }
    },
    async put(url, data) {
        try {
            const response = await fetch(url, {
                method: 'PUT',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(data)
            });
            return await response.json();
        } catch (error) {
            console.error('API error:', error);
            throw error;
        }
    },
    async delete(url) {
        try {
            const response = await fetch(url, { method: 'DELETE' });
            return await response.json();
        } catch (error) {
            console.error('API error:', error);
            throw error;
        }
    }
};

// Initialize mobile menu on document ready
document.addEventListener('DOMContentLoaded', () => {
    setupMobileMenu();
});
