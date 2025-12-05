// ===== AUTHENTICATION UTILITIES =====

/**
 * Show alert message
 * @param {string} message - Alert message
 * @param {string} type - Type: 'success', 'danger', 'warning', 'info'
 */
function showAlert(message, type = 'info') {
    const alertEl = document.getElementById('alert');
    if (alertEl) {
        alertEl.textContent = message;
        alertEl.className = `alert alert-${type} show`;
    }
}

/**
 * Hide alert message
 */
function hideAlert() {
    const alertEl = document.getElementById('alert');
    if (alertEl) {
        alertEl.classList.remove('show');
    }
}

/**
 * Show error for a specific field
 * @param {string} fieldId - Field ID
 * @param {string} message - Error message
 */
function showFieldError(fieldId, message) {
    const field = document.getElementById(fieldId);
    const errorEl = document.getElementById(fieldId + 'Error');
    
    if (field) {
        field.classList.add('is-invalid');
    }
    
    if (errorEl) {
        errorEl.textContent = message;
        errorEl.classList.add('show');
    }
}

/**
 * Clear field error
 * @param {string} fieldId - Field ID
 */
function clearFieldError(fieldId) {
    const field = document.getElementById(fieldId);
    const errorEl = document.getElementById(fieldId + 'Error');
    
    if (field) {
        field.classList.remove('is-invalid');
    }
    
    if (errorEl) {
        errorEl.textContent = '';
        errorEl.classList.remove('show');
    }
}

/**
 * Clear all field errors
 */
function clearAllErrors() {
    document.querySelectorAll('[id$="Error"]').forEach(el => {
        el.textContent = '';
        el.classList.remove('show');
    });
    
    document.querySelectorAll('.form-control').forEach(el => {
        el.classList.remove('is-invalid', 'is-valid');
    });
}

/**
 * Validate email format
 * @param {string} email - Email address
 * @returns {boolean}
 */
function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

/**
 * Validate phone number
 * @param {string} phone - Phone number
 * @returns {boolean}
 */
function validatePhone(phone) {
    const re = /^(\+?62|0)[0-9]{9,12}$/;
    return re.test(phone.replace(/\s/g, ''));
}

/**
 * Validate password
 * @param {string} password - Password
 * @returns {boolean}
 */
function validatePassword(password) {
    return password.length >= 6;
}

// ===== LOGIN FORM HANDLING =====
const loginForm = document.getElementById('loginForm');
if (loginForm) {
    loginForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        clearAllErrors();
        hideAlert();

        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value;
        const remember = document.getElementById('remember').checked;

        // Validation
        let hasErrors = false;

        if (!email) {
            showFieldError('email', 'Email harus diisi');
            hasErrors = true;
        } else if (!validateEmail(email)) {
            showFieldError('email', 'Format email tidak valid');
            hasErrors = true;
        }

        if (!password) {
            showFieldError('password', 'Password harus diisi');
            hasErrors = true;
        } else if (!validatePassword(password)) {
            showFieldError('password', 'Password minimal 6 karakter');
            hasErrors = true;
        }

        if (hasErrors) return;

        try {
            // Simulated login - in production, this would be a real API call
            const response = await fetch('/api/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ email, password, remember })
            }).catch(() => {
                // Fallback for demo - show success
                return { ok: true };
            });

            if (response.ok) {
                showAlert('Login berhasil! Mengalihkan...', 'success');
                // In production, redirect to dashboard
                setTimeout(() => {
                    window.location.href = 'dashboard.html';
                }, 1500);
            } else {
                showAlert('Email atau password salah', 'danger');
            }
        } catch (error) {
            showAlert('Terjadi kesalahan. Silakan coba lagi.', 'danger');
        }
    });

    // Clear errors on input
    ['email', 'password'].forEach(id => {
        const field = document.getElementById(id);
        if (field) {
            field.addEventListener('input', () => {
                clearFieldError(id);
            });
        }
    });
}

// ===== REGISTER FORM HANDLING =====
const registerForm = document.getElementById('registerForm');
if (registerForm) {
    registerForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        clearAllErrors();
        hideAlert();

        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const phone = document.getElementById('phone').value.trim();
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('password_confirmation').value;

        // Validation
        let hasErrors = false;

        if (!name) {
            showFieldError('name', 'Nama lengkap harus diisi');
            hasErrors = true;
        } else if (name.length < 3) {
            showFieldError('name', 'Nama minimal 3 karakter');
            hasErrors = true;
        }

        if (!email) {
            showFieldError('email', 'Email harus diisi');
            hasErrors = true;
        } else if (!validateEmail(email)) {
            showFieldError('email', 'Format email tidak valid');
            hasErrors = true;
        }

        if (!phone) {
            showFieldError('phone', 'Nomor telepon harus diisi');
            hasErrors = true;
        } else if (!validatePhone(phone)) {
            showFieldError('phone', 'Format nomor telepon tidak valid');
            hasErrors = true;
        }

        if (!password) {
            showFieldError('password', 'Password harus diisi');
            hasErrors = true;
        } else if (!validatePassword(password)) {
            showFieldError('password', 'Password minimal 6 karakter');
            hasErrors = true;
        }

        if (!confirmPassword) {
            showFieldError('password_confirmation', 'Konfirmasi password harus diisi');
            hasErrors = true;
        } else if (password !== confirmPassword) {
            showFieldError('password_confirmation', 'Password tidak cocok');
            hasErrors = true;
        }

        if (hasErrors) return;

        try {
            // Simulated registration - in production, this would be a real API call
            const response = await fetch('/api/register', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ name, email, phone, password })
            }).catch(() => {
                // Fallback for demo - show success
                return { ok: true };
            });

            if (response.ok) {
                showAlert('Pendaftaran berhasil! Silakan login.', 'success');
                setTimeout(() => {
                    window.location.href = 'login.html';
                }, 1500);
            } else {
                showAlert('Pendaftaran gagal. Email mungkin sudah terdaftar.', 'danger');
            }
        } catch (error) {
            showAlert('Terjadi kesalahan. Silakan coba lagi.', 'danger');
        }
    });

    // Clear errors on input
    ['name', 'email', 'phone', 'password', 'password_confirmation'].forEach(id => {
        const field = document.getElementById(id);
        if (field) {
            field.addEventListener('input', () => {
                clearFieldError(id);
            });
        }
    });
}
