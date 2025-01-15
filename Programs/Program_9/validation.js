function validateForm() {
    // Get form elements
    var fname = document.registrationForm.fname.value;
    var lname = document.registrationForm.lname.value;
    var username = document.registrationForm.username.value;
    var password = document.registrationForm.password.value;
    var confirmPassword = document.registrationForm.confirmPassword.value;
    var gender = document.registrationForm.gender.value;
    var mob = document.registrationForm.mob.value;
    var address = document.registrationForm.address.value;
    var emailid = document.registrationForm.emailid.value;

    // Validate first name
    if (fname == "") {
        alert("First name is required.");
        return false;
    }

    // Validate last name
    if (lname == "") {
        alert("Last name is required.");
        return false;
    }

    // Validate username
    if (username == "") {
        alert("Username is required.");
        return false;
    }

    // Validate password: at least one uppercase, one lowercase, one digit, one special char, and min 8 chars
    var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    if (password == "") {
        alert("Password is required.");
        return false;
    }
    if (!password.match(passwordPattern)) {
        alert("Password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, one number, and one special character.");
        return false;
    }

    // Validate confirm password
    if (confirmPassword == "") {
        alert("Please confirm your password.");
        return false;
    }
    if (password !== confirmPassword) {
        alert("Passwords do not match.");
        return false;
    }

    // Validate gender selection
    if (gender == "") {
        alert("Please select your gender.");
        return false;
    }

    // Validate mobile number: Ensure it is 10 digits and starts with a valid digit (7-9)
    var mobPattern = /^[7-9]{1}[0-9]{9}$/;
    if (!mob.match(mobPattern)) {
        alert("Please enter a valid mobile number (starting with 7, 8, or 9 and 10 digits long).");
        return false;
    }

    // Validate address: Should not be empty
    if (address == "") {
        alert("Address is required.");
        return false;
    }

    // Validate email ID: Ensure it's in proper format
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!emailid.match(emailPattern)) {
        alert("Please enter a valid email address.");
        return false;
    }

    // If all validations pass
    alert("Registration successful!");
    return true;
}
