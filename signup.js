// Toggle between Sign-Up and Login forms
document.getElementById('loginLink').addEventListener('click', function() {
    document.getElementById('signUpForm').style.display = 'none';
    document.getElementById('loginForm').style.display = 'block';
});

document.getElementById('signUpLink').addEventListener('click', function() {
    document.getElementById('loginForm').style.display = 'none';
    document.getElementById('signUpForm').style.display = 'block';
});

// On page load, show the correct form based on URL parameter or default to Sign Up
window.onload = function() {
    const urlParams = new URLSearchParams(window.location.search);
    const formToShow = urlParams.get('form');  // Check for "form" query parameter

    // If "form" parameter is "login", show the login form; otherwise, show sign-up
    if (formToShow === 'login') {
        document.getElementById('loginForm').style.display = 'block';
        document.getElementById('signUpForm').style.display = 'none';
    } else {
        document.getElementById('signUpForm').style.display = 'block';
        document.getElementById('loginForm').style.display = 'none';
    }
}
