function validateForm() {
    var password1 = document.getElementById('password1').value;
    var password2 = document.getElementById('password2').value;
    var errorElement = document.getElementById('passwordError');

    if (password1 !== password2) {
        errorElement.textContent = 'Passwords do not match!';
        return false; // Prevent form submission
    } else {
        errorElement.textContent = '';
        return true; // Allow form submission
    }
}
