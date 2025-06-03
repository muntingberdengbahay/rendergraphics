document.addEventListener("DOMContentLoaded", function () {
    if (document.getElementById("authModal")) return; // Prevent duplicate injection

    const modalHTML = `
    <div class="auth-modal-overlay" id="authModal">
        <div class="auth-modal">
            <span class="close-btn" id="closeAuthModal">&times;</span>
            <div id="authFormContainer">
                <form id="signInForm" class="auth-form active">
                    <h2>Sign In</h2>
                    <label>Email Address<input type="email" id="signInEmail" required></label>
                    <label>Password<input type="password" id="signInPassword" required></label>
                    <label><input type="checkbox"> Stay signed in</label>
                    <button type="submit">Sign In</button>
                    <p><a href="#" id="showForgotPassword">Forgot your password?</a></p>
                    <p>Don't have an account? <a href="#" id="showRegisterForm">Register</a></p>
                </form>

                <form id="registerForm" class="auth-form">
                    <h2>Create Account</h2>
                    <label>Email Address<input type="email" id="registerEmail" required></label>
                    <label>Password<input type="password" id="registerPassword" required>
                       
                    </label>
                    <label>Confirm Password<input type="password" id="confirmPassword" required>
					 <div class="password-requirements">
                            <p>Password must contain:</p>
                            <ul>
                                <li id="req-length">✓ At least 8 characters</li>
                                <li id="req-uppercase">✓ 1 uppercase letter</li>
                                <li id="req-lowercase">✓ 1 lowercase letter</li>
                                <li id="req-number">✓ 1 number</li>
                                <li id="req-special">✓ 1 special character</li>
                            </ul>
                        </div>
					</label>
                    <button type="submit">Register</button>
                    <p>Already have an account? <a href="#" id="showSignInForm">Sign In</a></p>
                </form>

                <form id="forgotPasswordForm" class="auth-form">
                    <h2>Reset Password</h2>
                    <p>Enter your email address and we'll send you instructions to reset your password.</p>
                    <label>Email Address<input type="email" required></label>
                    <button type="submit">Send Instructions</button>
                    <p><a href="#" id="backToSignIn">Back to Sign In</a></p>
                </form>
            </div>
        </div>
    </div>
    `;

    document.body.insertAdjacentHTML("beforeend", modalHTML);
    setupModalListeners();
    checkLoginState();
});

function setupModalListeners() {
    const modal = document.getElementById('authModal');
    const closeBtn = document.getElementById('closeAuthModal');
    

    // Improved event delegation for sign-in links
    document.body.addEventListener('click', function(e) {
        if (e.target.closest('.sign-in')) {
            e.preventDefault();
            if (localStorage.getItem('isLoggedIn')) {
                // User is already logged in
                return;
            }
            modal.style.display = 'flex';
            showForm('signIn');
        }
    });

    closeBtn.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    window.addEventListener('keydown', (e) => {
        if (e.key === "Escape" && modal.style.display === 'flex') {
            modal.style.display = 'none';
        }
    });

    // Form toggling
    document.getElementById('showRegisterForm')?.addEventListener('click', (e) => {
        e.preventDefault();
        showForm('register');
    });

    document.getElementById('showSignInForm')?.addEventListener('click', (e) => {
        e.preventDefault();
        showForm('signIn');
    });

    document.getElementById('showForgotPassword')?.addEventListener('click', (e) => {
        e.preventDefault();
        showForm('forgotPassword');
    });

    document.getElementById('backToSignIn')?.addEventListener('click', (e) => {
        e.preventDefault();
        showForm('signIn');
    });

    // Password strength validation
    document.getElementById('registerPassword')?.addEventListener('input', function() {
        validatePasswordStrength(this.value);
    });

    // Registration form handler
    document.getElementById('registerForm')?.addEventListener('submit', function (e) {
        e.preventDefault();

        const email = document.getElementById('registerEmail').value.trim();
        const password = document.getElementById('registerPassword').value;
        const confirmPassword = document.getElementById('confirmPassword').value;

        if (password !== confirmPassword) {
            showErrorNotification("Passwords do not match!");
            return;
        }

        if (!isPasswordStrong(password)) {
            showErrorNotification("Password does not meet the strength requirements!");
            return;
        }

        fetch('auth/handle_auth.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ action: 'register', email: email, password: password })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showSuccessNotification("Registration successful! You can now sign in.");
                showForm('signIn');
            } else {
                showErrorNotification("Error: " + data.message);
            }
        })
        .catch(error => {
            console.error('Fetch error:', error);
            showErrorNotification("Network error. Please try again.");
        });
    });
    document.getElementById('forgotPasswordForm')?.addEventListener('submit', function (e) {
    e.preventDefault();

    const emailInput = this.querySelector('input[type="email"]');
    const email = emailInput.value.trim();
    const submitButton = this.querySelector('button[type="submit"]');

    if (!email) {
        showErrorNotification("Please enter your email address!");
        return;
    }

    // Disable button for 30 seconds
    submitButton.disabled = true;
    setTimeout(() => {
        submitButton.disabled = false;
    }, 30000);

    fetch('auth/handle_auth.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ action: 'forgot_password', email: email })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showSuccessNotification("Reset instructions sent! Check your email.");
            emailInput.value = ""; // Clear input field after success
        } else {
            showErrorNotification("Error: " + data.message);
        }
    })
    .catch(error => {
        console.error('Fetch error:', error);
        showErrorNotification("Network error. Please try again.");
    });
});

    // Sign-in form handler
    document.getElementById('signInForm')?.addEventListener('submit', function (e) {
        e.preventDefault();

        const email = document.getElementById('signInEmail').value.trim();
        const password = document.getElementById('signInPassword').value;

        fetch('auth/handle_auth.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ action: 'signin', email: email, password: password })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                localStorage.setItem('isLoggedIn', 'true');
                document.getElementById("authModal").style.display = "none";
                showSuccessNotification("Login successful!");
                updateAllAuthUI();
                
                // Optional: Refresh after a short delay to ensure all components update
                setTimeout(() => {
                    window.location.href = window.location.pathname;
                }, 1000);
            } else {
                showErrorNotification("Error: " + data.message);
            }
        })
        .catch(error => {
            console.error('Fetch error:', error);
            showErrorNotification("Network error. Please try again.");
        });
    });
}

function validatePasswordStrength(password) {
    // Define requirements
    const requirements = {
        length: password.length >= 8,
        uppercase: /[A-Z]/.test(password),
        lowercase: /[a-z]/.test(password),
        number: /[0-9]/.test(password),
        special: /[^A-Za-z0-9]/.test(password)
    };

    // Update UI for each requirement
    Object.keys(requirements).forEach(key => {
        const element = document.getElementById(`req-${key}`);
        if (element) {
            const checkmark = requirements[key] ? '✓' : '✗';
            element.innerHTML = `${checkmark} ${element.textContent.replace(/^[✓✗]\s/, '')}`;
            element.style.color = requirements[key] ? 'green' : 'red';
        }
    });

    return Object.values(requirements).every(Boolean);
}

function isPasswordStrong(password) {
    // Check all password requirements
    return (
        password.length >= 8 &&
        /[A-Z]/.test(password) &&
        /[a-z]/.test(password) &&
        /[0-9]/.test(password) &&
        /[^A-Za-z0-9]/.test(password)
    );
}

function showForm(formName) {
    const forms = ['signIn', 'register', 'forgotPassword'];
    forms.forEach(name => {
        const el = document.getElementById(name + 'Form');
        if (el) el.classList.toggle('active', name === formName);
    });
}

function updateAllAuthUI() {
    // Update all auth-related UI elements on the page
    const authElements = document.querySelectorAll('.user-actions, .auth-status');
    
    authElements.forEach(element => {
        if (localStorage.getItem('isLoggedIn')) {
            element.innerHTML = `
                <div class="profile-container">
                    <i class="fa fa-user-circle profile-icon" onclick="toggleDropdown()"></i>
                    <div id="profileDropdown" class="dropdown">
                        <a href="auth/logout.php" onclick="handleLogout()">Log Out</a>
                    </div>
                </div>
            `;
        } else {
            element.innerHTML = '<a href="#" class="sign-in">Sign In</a>';
        }
    });
}

function checkLoginState() {
    if (localStorage.getItem('isLoggedIn')) {
        updateAllAuthUI();
    }
}

function showSuccessNotification(message) {
    // Remove any existing notifications
    const existing = document.querySelector('.auth-notification');
    if (existing) existing.remove();

    // Create and show new notification
    const notification = document.createElement('div');
    notification.className = 'auth-notification success';
    notification.innerHTML = message;
    document.body.appendChild(notification);
    
    // Trigger animation
    setTimeout(() => {
        notification.classList.add('show');
    }, 10);
    
    // Auto-remove after delay
    setTimeout(() => {
        notification.classList.remove('show');
        setTimeout(() => notification.remove(), 500);
    }, 3000);
}

function showErrorNotification(message) {
    // Remove any existing notifications
    const existing = document.querySelector('.auth-notification');
    if (existing) existing.remove();

    // Create and show new notification
    const notification = document.createElement('div');
    notification.className = 'auth-notification error';
    notification.innerHTML = message;
    document.body.appendChild(notification);
    
    // Trigger animation
    setTimeout(() => {
        notification.classList.add('show');
    }, 10);
    
    // Auto-remove after delay
    setTimeout(() => {
        notification.classList.remove('show');
        setTimeout(() => notification.remove(), 500);
    }, 3000);
}

// Global functions (called from HTML)
window.handleLogout = function() {
    localStorage.removeItem('isLoggedIn');
    location.reload();
};

window.toggleDropdown = function() {
    document.getElementById("profileDropdown").classList.toggle("show");
};

// Close dropdown when clicking outside
window.addEventListener('click', function(e) {
    if (!e.target.matches('.profile-icon')) {
        const dropdowns = document.querySelectorAll('.dropdown');
        dropdowns.forEach(dropdown => {
            if (dropdown.classList.contains('show')) {
                dropdown.classList.remove('show');
            }
        });
    }
});