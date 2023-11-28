// Wait for the DOM to be fully loaded before executing the code
document.addEventListener('DOMContentLoaded', function () {
    // Get references to important elements in the HTML
    const contactForm = document.getElementById('contact-form'); // The contact form element
    const emailField = document.getElementById('email'); // The email input field
    const emailError = document.getElementById('email-error'); // The element to display email validation errors

    // Custom validation function to check if the email address is valid
    function isEmailValid(email) {
        // Regular expression pattern for a valid email address
        const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        return emailPattern.test(email);
    }

    // Event listener for form submission
    contactForm.addEventListener('submit', function (event) {
        // Check if the entered email is not valid
        if (!isEmailValid(emailField.value)) {
            // Display an error message
            emailError.textContent = 'Please enter a valid email address';
            emailError.style.display = 'block';
            event.preventDefault(); // Prevent form submission
        } else {
            // If the email is valid, hide the error message
            emailError.style.display = 'none';
        }
    });

    // Event listener for email field blur
    emailField.addEventListener('blur', function () {
        // Check if the entered email is not valid
        if (!isEmailValid(emailField.value)) {
            // Display an error message
            emailError.textContent = 'Please enter a valid email address';
            emailError.style.display = 'block';
        } else {
            // If the email is valid, hide the error message
            emailError.style.display = 'none';
        }
    });
});
