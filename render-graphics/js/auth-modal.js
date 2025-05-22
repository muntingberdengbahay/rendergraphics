document.addEventListener("DOMContentLoaded", function () {
    // Prevent duplicate injection
    if (document.getElementById("authModal")) return;

    const modalHTML = `
    <div class="auth-modal-overlay" id="authModal">
        <div class="auth-modal">
            <span class="close-btn" id="closeAuthModal">&times;</span>
            <div id="authFormContainer">
                <!-- Sign In Form -->
                <form id="signInForm" class="auth-form active">
                    <h2>Sign In</h2>
                    <label>Email Address<input type="email" required></label>
                    <label>Password<input type="password" required></label>
                    <label><input type="checkbox"> Stay signed in</label>
                    <button type="submit">Sign In</button>
                    <p><a href="#" id="showForgotPassword">Forgot your password?</a></p>
                    <p>Don't have an account? <a href="#" id="showRegisterForm">Register</a></p>
                </form>

                <!-- Register Form -->
                <form id="registerForm" class="auth-form">
                    <h2>Create Account</h2>
                    <label>Email Address<input type="email" required></label>
                    <label>Password<input type="password" required></label>
                    <label>Confirm Password<input type="password" required></label>
                    <button type="submit">Register</button>
                    <p>Already have an account? <a href="#" id="showSignInForm">Sign In</a></p>
                </form>

                <!-- Forgot Password Form -->
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

    // Form submission handlers
document.querySelectorAll('#authFormContainer form').forEach(form => {
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(form);
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalBtnText = submitBtn.textContent;
        
        // Show loading state
        submitBtn.disabled = true;
        submitBtn.textContent = 'Processing...';
        
        try {
            const response = await fetch(form.id === 'signInForm' ? 'login_handler.php' : 
                                        form.id === 'registerForm' ? 'register_handler.php' : 
                                        'forgot_password_handler.php', {
                method: 'POST',
                body: formData
            });
            
            const result = await response.json();
            
            if (result.success) {
                if (result.redirect) {
                    window.location.href = result.redirect;
                } else {
                    // Show success message
                    const messageDiv = document.getElementById(`${form.id}Message`);
                    messageDiv.textContent = result.message || 'Success!';
                    messageDiv.style.color = 'green';
                    
                    // Reset form if needed
                    if (form.id === 'forgotPasswordForm') {
                        form.reset();
                    }
                }
            } else {
                // Show error message
                const messageDiv = document.getElementById(`${form.id}Message`);
                messageDiv.textContent = result.error || 'An error occurred';
                messageDiv.style.color = 'red';
            }
        } catch (error) {
            console.error('Error:', error);
            const messageDiv = document.getElementById(`${form.id}Message`);
            messageDiv.textContent = 'Network error, please try again';
            messageDiv.style.color = 'red';
        } finally {
            submitBtn.disabled = false;
            submitBtn.textContent = originalBtnText;
        }
    });
});

    // Inject modal HTML into body
    document.body.insertAdjacentHTML("beforeend", modalHTML);

    // Set up event listeners after injecting modal
    setupModalListeners();
});

function setupModalListeners() {
    const modal = document.getElementById('authModal');
    const closeBtn = document.getElementById('closeAuthModal');

    // Show modal when .sign-in is clicked
    document.querySelectorAll('.sign-in').forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            modal.style.display = 'flex';
            showForm('signIn');
        });
    });

    // Close modal only via close button or ESC key
    closeBtn.addEventListener('click', () => modal.style.display = 'none');

    window.addEventListener('keydown', (e) => {
        if (e.key === "Escape" && modal.style.display === 'flex') modal.style.display = 'none';
    });

    // ❌ Removed this: click on overlay no longer closes modal
    // window.addEventListener('click', (e) => {
    //     if (e.target === modal) modal.style.display = 'none';
    // });

    // Switch between forms
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
}

function showForm(formName) {
    const forms = ['signIn', 'register', 'forgotPassword'];
    forms.forEach(name => {
        const el = document.getElementById(name + 'Form');
        if (el) el.classList.toggle('active', name === formName);
    });
}