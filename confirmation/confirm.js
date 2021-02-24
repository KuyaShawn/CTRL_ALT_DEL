/*
    This file holds the Confirmation Validation JavaScript
            functions for the CbSC Application/Form HTML web page.
    Updated: Monday 22nd February, 2021
    Project Name: Coneybeare Sustainability Catalog
    File name: confirm.js       Root: ../confirmation/confirm.js
    Author/'s: CTRL ALT DEL
                Amanda H.
 */

// retrieving the Company application form
document.getElementById("form").onsubmit = validation;

// System to VALIDATE Fields of User Input
function validation() {
    // creating a flag variable to represent filled pc information
    let filledIn = true;

    // clearing all invalid messages
    let inValid = document.getElementsByClassName("incomplete");
    for (let i = 0; i < inValid.length; i++) {
        inValid[i].style.display = "hidden"; // ? is this a valid JS/CSS term/relationship
    }


    // Validating COMPANY INFORMATION
    // Company NAME
    let cName = document.getElementById("company-name").value;
    if (cName === "") {
        let errorCName = document.getElementById("invalid-cName");
        errorCName.classList.remove("d-none");
        filledIn = false;
    }

    // Company WEBSITE
    let site = document.getElementById("company-website").value;
    if (site === "") {
        let errorCName = document.getElementById("invalid-cSite");
        errorCName.classList.remove("d-none");
        filledIn = false;
    }

    // Company COUNTRY FIELD
    let cCountry = document.getElementById("country").value;
    if (cCountry === "blank") {
        let errorCountry = document.getElementById("invalid-country");
        errorCountry.classList.remove("d-none");
        filledIn = false;
    }

    // Company State
    let cstate = document.getElementById("state").value;
    if (cstate === "blank") {
        let errorState = document.getElementById("invalid-state");
        errorState.classList.remove("d-none");
        filledIn = false;
    }

    // Company CITY FIELD
    let cCity = document.getElementById("inputCity").value;
    if (cCity === "") {
        let errorCity = document.getElementById("invalid-city");
          errorCity.classList.remove("d-none");
          filledIn = false;
      }

    // Geographic Area
    let cArea = document.getElementById("inputArea").value;
    if (cArea === "select") {
        let errorArea = document.getElementById("invalid-area");
        errorArea.classList.remove("d-none");
        filledIn = false;
      }

    // company contact check box
    let cAuth = document.getElementById("ccAuth");
    if (!cAuth.checked) {
        let errorPocAuth = document.getElementById("invalid-ccAuth");
        errorPocAuth.classList.remove("d-none");
        filledIn = false;
    }

    // Tagline
    let tag = document.getElementById("tagline").value;
    if (tag === "") {
        let errorTag = document.getElementById("invalid-tagline");
        errorTag.classList.remove("d-none");
        filledIn = false;
    }

    // company contact
    // EMAIL, point of contact
    let eEmail = document.getElementById("pEmail").value;
    if (eEmail === "") {
        let errorEmail = document.getElementById("invalid-pEmail");
        errorEmail.classList.remove("d-none");
        filledIn = false;
    }

    // Point of contact check box
    let pocAuth = document.getElementById("pocAuth");
    if (!pocAuth.checked) {
        let errorPocAuth = document.getElementById("invalid-pocAuth");
        errorPocAuth.classList.remove("d-none");
        filledIn = false;
    }

    // returning if field checks require an error message or not
    return filledIn;


}