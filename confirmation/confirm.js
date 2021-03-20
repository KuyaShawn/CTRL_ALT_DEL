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
        inValid[i].style.display = "hidden";
    }


    // Validating COMPANY INFORMATION
    // Company NAME
    let company_name = document.getElementById("company-name").value;
    if (company_name === "") {
        let errorCompany_name = document.getElementById("invalid-cName");
        errorcompany_name.classList.remove("d-none");
        filledIn = false;
    }

    // Company WEBSITE
    let url = document.getElementById("url").value;
    if (url === "") {
        let errorUrl = document.getElementById("invalid-cSite");
        errorUrl.classList.remove("d-none");
        filledIn = false;
    }

    // Company Email
    let public_email = document.getElementById("public_email").value;
    if (public_email === "") {
        let errorPublic_email = document.getElementById("invalid-public_email");
        errorPublic_email.classList.remove("d-none");
        filledIn = false;
    }

    // Company Telephone
    let public_phone = document.getElementById("public_phone");
    if(public_phone === ""){

    } else if(public_phone )

    // Company Address Line 1
        street_address
        invalid-street_address


    // Company COUNTRY FIELD
    let country = document.getElementById("country").value;
    if (country === "blank") {
        let errorCountry = document.getElementById("invalid-country");
        errorCountry.classList.remove("d-none");
        filledIn = false;
    }

    // Company State
    let state = document.getElementById("state").value;
    if (state === "blank") {
        let errorState = document.getElementById("invalid-state");
        errorState.classList.remove("d-none");
        filledIn = false;
    }

    // Company CITY FIELD
    let city = document.getElementById("city").value;
    if (city === "") {
        let errorCity = document.getElementById("invalid-city");
          errorCity.classList.remove("d-none");
          filledIn = false;
      }

    // Service Area / Geographic Service Area
    let service_area = document.getElementById("service_area").value;
    if (service_area === "select") {
        let errorArea = document.getElementById("invalid-service_area");
        errorArea.classList.remove("d-none");
        filledIn = false;
      }

    // category_id
    category_id

    // logo, logo_path


    // Tagline / ABOUT
    let about = document.getElementById("about").value;
    if (about === "") {
        let errorAbout = document.getElementById("invalid-about");
        errorAbout.classList.remove("d-none");
        filledIn = false;
    }

    // Key words
    document.getElementById('tagInput');
    if(tagString > TAG_MAX_LENGTH){
        filledIn = false;
    } else {
        tagInput.value = tagString;
    }



    // Private contact check box
    let pcAuth = document.getElementById("pocAuth");
    if (!pcAuth.checked) {
        let errorPcAuth = document.getElementById("invalid-pocAuth");
        errorPcAuth.classList.remove("d-none");
        filledIn = false;
    }

    // Private contact Name
    private_contact_name
    invalid-private_contact_name

    // Private contact Last Name
    private_contact_last
    invalid-private_contact_last

    // Private contact Email
    let private_email = document.getElementById("private_email").value;
    if (private_email === "") {
        let errorEmail = document.getElementById("invalid-private_email");
        errorEmail.classList.remove("d-none");
        filledIn = false;
    }

    // private phone
    private_phone
    invalid-private_phone


    // returning if field checks require an error message or not
    return filledIn;


}