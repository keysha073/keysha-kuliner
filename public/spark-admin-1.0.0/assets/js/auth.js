/* 
========================================================================
   BOOTSTRAP 5 ADMIN TEMPLATE - SPARK ADMIN
   AUTHENTICATION MODULE JAVASCRIPT
   Developed with premium UI/UX standards

   Template Name: Keysha Kuliner Admin
   Version: 1.0 
   Author: Keysha Kuliner 
   Email: hello.sparkadmin@gmail.com
   Project: Keysha Kuliner
========================================================================
*/

document.addEventListener('DOMContentLoaded', function () {
    /**
     * Password Visibility Toggle Logic
     * Enables toggling password input between obscured dots and plain text.
     */
    const togglePassword = document.getElementById('toggle-password');
    const passwordInput = document.getElementById('password');

    if (togglePassword && passwordInput) {
        togglePassword.addEventListener('click', function () {
            // Toggle input type attribute
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            // Toggle eye icon class & aria-label
            const icon = this.querySelector('i');
            if (type === 'text') {
                if (icon) {
                    icon.classList.remove('bi-eye');
                    icon.classList.add('bi-eye-slash');
                }
                this.setAttribute('aria-label', 'Sembunyikan kata sandi');
            } else {
                if (icon) {
                    icon.classList.remove('bi-eye-slash');
                    icon.classList.add('bi-eye');
                }
                this.setAttribute('aria-label', 'Tampilkan kata sandi');
            }
        });
    }

    /**
     * Client-Side Form Validation Logic
     * Prevents submission if form inputs are invalid and applies Bootstrap validation styles.
     */
    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', function (event) {
            if (!loginForm.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            loginForm.classList.add('was-validated');
        });
    }
});
