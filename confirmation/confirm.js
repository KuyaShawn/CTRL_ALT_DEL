/*
    This file is to hold the Confirmation Validation JavaScript
            functions for the CbSC Application/Form HTML web page.
    Date: Saturday 23rd of January, 2021
    Updated: Tuesday the 26th of January, 2021
    Project Name: Coneybeare Sustainability Catalog
    File name: confirm.js       Root: ../confirmation/confirm.js
    Author/'s: CTRL ALT DEL
                Amanda H.
 */

// retrieving the Company application form
document.getElementById("pcform").onsubmit = validation;

// System to VALIDATE Fields of User Input
function validation() {
    // creating a flag variable to represent filled pc information
    let filledIn = true;

    // clearing all invalid messages
    let inValid = document.getElementsByClassName("incomplete");
    for(let i=0; i<inValid.length; i++) {
        inValid[i].style.display = "hidden"; // ? is this a valid JS/CSS term/relationship
    }

    // Validating COMPANY INFORMATION

    // Company NAME
    let cName = document.getElementById("cName").value;
    if(cName==="") {
        let errorCName = document.getElementById("invalid-cName");
        errorCName.classList.remove("d-none");
        filledIn = false;
    }

    // Company WEBSITE
    let site = document.getElementById("cWebsite").value;
    if(site==="") {
        let errorCName = document.getElementById("invalid-cSite");
        errorCName.classList.remove("d-none");
        filledIn = false;
    }

    // Company CITY FIELD
    let cCity = document.getElementById("inputCity").value;
    if(cCity==="") {
        let errorCity = document.getElementById("invalid-city");
        errorCity.classList.remove("d-none");
        filledIn = false;
    }

    // Company State
    let state = document.getElementById("inputState").value;
    if(state === "state" ){
        let errorState = document.getElementById("invalid-state");
        errorState.classList.remove("d-none");
        filledIn = false;
    }

    // Company COUNTRY FIELD
    let cCountry = document.getElementById("inputCountry").value;
    if(cCountry==="") {
        let errorCountry = document.getElementById("invalid-Country");
        errorCountry.classList.remove("d-none");
        filledIn = false;
    }

    // Company BACKGROUND CATEGORY
    let category = document.getElementById("cCategory").value;
    if(category === "none" ){
        let errorCategory = document.getElementById("invalid-category");
        errorCategory.classList.remove("d-none");
        filledIn = false;
    }
//********************
// Attempting to Display text field when "OTHER" is selected
        /* Thinking "could this be a bootstrap element entered into
        // HTML Fields rather than JS..???
    else if(cCategory === "other" ) {
        let otherChoice = document.getElementById("otherText");
        otherChoice.classList.remove("d-none");
        filledIn = false;
    }*/

    // Company ABOUT TEXT FIELD
    let cAbout = document.getElementById("about").value;
    if(cAbout==="") {
        let errorCAbout = document.getElementById("invalid-about");
        errorCAbout.classList.remove("d-none");
        filledIn = false;
    }

    // Company TAGLINE TEXT FIELD
    let cTagline = document.getElementById("tagline").value;
    if(cTagline==="") {
        let errorTagline = document.getElementById("invalid-tagline");
        errorTagline.classList.remove("d-none");
        filledIn = false;
    }

    // EMPLOYEE INFORMATION

    // FIRST NAME
    let first = document.getElementById("fname").value;
    if(first==="") {
        let errorFirst = document.getElementById("invalid-fname");
        errorFirst.classList.remove("d-none");
        filledIn = false;
    }

    // LAST NAME
    let last = document.getElementById("lname").value;
    if(last==="") {
        let errorLast = document.getElementById("invalid-lname");
        errorLast.classList.remove("d-none");
        filledIn = false;
    }

    // EMAIL
    let eEmail = document.getElementById("eEmail").value;
    if(eEmail==="") {
        let errorEmail = document.getElementById("invalid-eEmail");
        errorEmail.classList.remove("d-none");
        filledIn = false;
    }

    // returning if field checks require an error message or not
    return filledIn;


}
/*
Dylan Suggestion for how to code validation:
errorFirst.classlist.add("incomplete");
isValid[i].classlist.remove("incomplete");



 */