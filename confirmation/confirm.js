/*
    This file holds the Confirmation Validation JavaScript
            functions for the CbSC Application/Form HTML web page.
    Updated: Sunday March 21st 2021
    Project Name: Coneybeare Sustainability Catalog
    File name: confirm.js       Root: ../confirmation/confirm.js
    Author/'s: CTRL ALT DEL
                Amanda H.
 */


// retrieving the Company application form
/*******************************************/
document.getElementById("form").onsubmit = validation;

// System to VALIDATE Fields of User Input
/*******************************************/
function validation() {
    // creating a flag variable to represent filled pc information
    let filledIn = true;

    // clearing all invalid messages
    let inValid = document.getElementsByClassName("incomplete");
    for (let i = 0; i < inValid.length; i++) {
        inValid[i].style.display = "hidden";
    }


    /* Validating REQUIRED COMPANY INFORMATION */
    /*******************************************/
    //Authorization to Publish
    let public_authorization = document.getElementById("public_authorization");
    if (!public_authorization.checked) {
        let errorPublicAuthorization = document.getElementById("invalid-public_authorization");
        errorPublicAuthorization.classList.remove("d-none");
        filledIn = false;
    }

    // Company NAME
    let company_name = document.getElementById("company_name").value;
    if (company_name === "") {
        let errorCompany_name = document.getElementById("invalid-company_name");
        errorCompany_name.classList.remove("d-none");
        filledIn = false;
    }

    // Company WEBSITE
    let url = document.getElementById("url").value;
    if (url === "") {
        let errorUrl = document.getElementById("invalid-url");
        errorUrl.classList.remove("d-none");
        filledIn = false;
    }

    // Company Address Line 1
    /* let street_address = document.getElementById("street_address").value;
    if (street_address === "") {
        let errorStreet_address = document.getElementById("invalid-street_address");
        errorStreet_address.classList.remove("d-none");
        filledIn = false;
    } */


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

    // Category / Industry / Economic Background
    let category_id = document.getElementById("category_id").value;
    if (category_id === "none") {
        let errorCategory_id = document.getElementById("invalid-category_id");
        errorCategory_id.classList.remove("d-none");
        filledIn = false;
    }


    // Tagline / ABOUT
    let about = document.getElementById("about").value;
    if (about === "") {
        let errorAbout = document.getElementById("invalid-about");
        errorAbout.classList.remove("d-none");
        filledIn = false;
    }

   /* // Key words
    document.getElementById('tagInput');
    if(tagInput > TAG_MAX_LENGTH){
        filledIn = false;
    } else {
        tagInput.value = tagString;
    } */

    // Private contact Name
    let private_contact_name = document.getElementById("private_contact_name").value;
    if (private_contact_name === "") {
        let errorPrivate_contact_name = document.getElementById("invalid-private_contact_name");
        errorPrivate_contact_name.classList.remove("d-none");
        filledIn = false;
    }

    // Private contact Email
    let private_email = document.getElementById("private_email").value;
    if (private_email === "") {
        let errorEmail = document.getElementById("invalid-private_email");
        errorEmail.classList.remove("d-none");
        filledIn = false;
    }

    /*
    // Private  phone
    let private_phone = document.getElementById("private_phone").value;
    if(private_phone === ""){
        let errorPrivate_phone = document.getElementById("invalid-private_phone");
        errorPrivate_phone.classList.remove("d-none");
        filledIn = false;
    }
    */

    // returning if field checks require an error message or not
    return filledIn;


}

/*
    /* OPTIONAL COMPANY INFORMATION */
    /*******************************************/
    /*
    // Private contact check box
    let private_authorization = document.getElementById("private_authorization");
    if (!private_authorization.checked) {
        let errorPrivateAuthorization = document.getElementById("invalid-private_authorization");
        errorPrivateAuthorization.classList.remove("d-none");
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

    } else if(public_phone ){}

    // zipcode

    // Geographic scope / Service Area
    let service_area = document.getElementById("service_area").value;
    if (service_area === "select") {
        let errorArea = document.getElementById("invalid-service_area");
        errorArea.classList.remove("d-none");
        filledIn = false;
      }

  /* Logo Highly Reccomended

    // Private contact Last Name
    //private_contact_last
    //invalid-private_contact_last

    // Telephone2 Extension
*/

