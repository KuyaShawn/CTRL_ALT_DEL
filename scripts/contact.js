document.getElementById("contactform").onsubmit = validate;

// Function below validates first, last, email, & msg.
function validate() {
    // create a flag variable (is the form a valid submission?)\
    let isvalid = true;

    // Clear all error message's
    let errors = document.getElementsByClassName("error_msg");
    for (let i = 0; i < errors.length; i++) {
        errors[i].style.display = "none";
    }

    // Checks first name validation
    let firstName = document.getElementById("fname").value;
    // checks if text field (value) is empty
    if (firstName === "") {
        let error_fname = document.getElementById("error_fname");
        error_fname.style.display = "inline";
        isvalid = false;
    }

    // Checks last name validation
    let lastName = document.getElementById("lname").value;
    // checks if text field (value) is empty
    if (lastName === "") {
        let error_lname = document.getElementById('error_lname');
        error_lname.style.display = "inline";
        isvalid = false;
    }

    // Checks email validation
    let email = document.getElementById("email").value;
    // checks if text field (value) is empty
    if (email === "") {
        let error_email = document.getElementById("error_email");
        error_email.style.display = "inline";
        isvalid = false;
    }

    // Checks msg validation
    let msg = document.getElementById('msg').value;
    // Checks if textarea (value) is empty
    if (msg === "") {
        let error_msgTextarea = document.getElementById("error_msgTextarea");
        error_msgTextarea.style.display = "inline";
        isvalid = false;
    }

    return isvalid;
}