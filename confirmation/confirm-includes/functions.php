<!--
    This file holds the PHP function code for the CbCSC
            Confirm.php page.
    Updated: Monday March 22nd 2021
    Project Name: Coneybeare Sustainability Catalog
    File name: index.php   Root: ../confirmation/index.php
    Author/'s: CTRL ALT DEL
                Amanda H.
-->
<?php
/* Turning on error reporting */
ini_set('display_errors', 1);
error_reporting(E_ALL);


/* greeting to potential client */
function thankYou()
{
    echo "<h3>Thank you for the application !</h3><br>";
}

function message($company_name)
{
    echo "<p>The following information about $company_name has been sent to 
                Coneybeare Sustainability Catalog for review.</p>";
}

function readOut($validationArray, $isFormValid)
{
    $htmlMessage = "<table class='table'>";

    foreach ($validationArray as $key => $value) {
        /*
         *  value = array(
         *     'isValid' => true,
         *     'message' => "",
         *     'value' => "",
         *      'mandatoryField' => true,
         *      'mandatoryValid' => "",
         *
         *   )
         */
        // We only want to display items that match our main form state.
        // If our form is false, only display our false messages
        // if the mandatoryField value is true print those values
        if (($value['isValid'] === $isFormValid) ) {

            if(($isFormValid && $value['mandatoryValid'] === true) ||
                (!$isFormValid && $value['mandatoryField'])) {
                $htmlMessage .= $value['message'];
            }

        }

        if ($key === "tag_cloud") {
            $htmlMessage .= "</table>

                <h3>Private Company Contact</h3>
        
                <table class='table'>
                ";
        }
    }
    // We are done with our messages
    $htmlMessage .= "</table>";

    return $htmlMessage;
}

function isValidEmailString($eMail){
        //$reg = '/^[\w!#$%&\'*+\/=?^`{|}~.-]+@[\w]+\.[\w]+$/';
        // reference : https://stackoverflow.com/questions/13719821/email-validation-using-regular-expression-in-php
        return filter_var($eMail, FILTER_VALIDATE_EMAIL);
}

function isValidPhoneString($phone){
    //$reg = '/^+((?:9[679]|8[035789]|6[789]|5[90]|42|3[578]|2[1-689])|9[0-58]|8[1246]|6[0-6]|5[1-8]|4[013-9]|3[0-469]|2[70]|7|1)(?:\W*\d){0,13}\d';
    return filter_var($phone, FILTER_VALIDATE_INT) && is_numeric($phone);
}


/*
 * The idea here is that every function that is validating a field should return the following
 * array(
 *   isValid => true or false
 *   isRequired => true or false
 *   message => Your html validation message
 *   value => value to submit
 * )
 */
function validateCompanyName($companyName) {
    $isValid = false;
    $value = $companyName;
    // Requirement Checking
    $mandatoryField = true;
    $mandatoryValid = !empty($value);

    if (!empty($value) && strlen($value) >= 2) {
        $isValid = true;
        $message = "<tr>
                <td>Company:</td><td>$value</td>
            </tr>";
    } else {
        // Company name does not match requirements
        $message = "<tr>
                <td>Company:</td><td>Please enter a Company name greater than two letters.</td>
            </tr>";
    }
    return array(
        'isValid' => $isValid,
        'message' => $message,
        'value' => $value,
        'mandatoryField' => $mandatoryField,
        'mandatoryValid' => $mandatoryValid
    );
}

function validateUrl($url) {
    $isValid = false;
    $value = $url;
    // Requirement Checking
    $mandatoryField = true;
    $mandatoryValid = !empty($value);
    $reg = '@^(https?\://)?(www\.)?([a-z0-9]([a-z0-9]|(\-[a-z0-9]))*\.)+[a-z]+$@i';

    if (!empty($value)
        //&& filter_var($value, FILTER_VALIDATE_URL)
        && preg_match($reg,$value)
        ){
            $isValid = true;
            $message = "<tr>
                    <td>Website:</td><td>$value</td>
                </tr>";
    }else {
        $message = "<tr>
                <td>Website:</td><td>Please enter a valid company URL." . $value . "</td>
            </tr>";
    }

    return array(
        'isValid' => $isValid,
        'message' => $message,
        'value' => $value,
        'mandatoryField' => $mandatoryField,
        'mandatoryValid' => $mandatoryValid,
    );
}

function validatePublicEmail($public_email) {
    $isValid = false;
    $value = $public_email;
    // Requirement Checking
    $mandatoryField = false;
    $mandatoryValid = !empty($value);

    if(isValidEmailString($value)) {
        $isValid = true;
        $message = "<tr>
                    <td>eMail:</td><td>$value</td>
                </tr>";
    }else {
        $message = "<tr>
                <td>eMail:</td><td>Please enter a valid Company email address.</td>
            </tr>";
    }

    return array(
        'isValid' => $isValid,
        'message' => $message,
        'value' => $value,
        'mandatoryField' => $mandatoryField,
        'mandatoryValid' => $mandatoryValid,
    );
}

function validatePublicPhone($public_phone) {
    $isValid = false;
    $value = $public_phone;
    // Requirement Checking
    $mandatoryField = false;
    $mandatoryValid = !empty($value);

    if(isValidPhoneString($value)) {
        $isValid = true;
        $message = "<tr>
                    <td>Public Phone Number:</td><td>$value</td>
                </tr>";
    }else {
        $message = "<tr>
                <td>Public Phone Number:</td><td>Please enter a valid phone number.</td>
            </tr>";
    }

    return array(
        'isValid' => $isValid,
        'message' => $message,
        'value' => $value,
        'mandatoryField' => $mandatoryField,
        'mandatoryValid' => $mandatoryValid,
    );
}

function validateCountry($country) {
    $isValid = false;
    $value = $country;
    // Requirement Checking
    $mandatoryField = true;
    $mandatoryValid = ($value !== "blank");
    if ($mandatoryValid) {
        $isValid = true;
        $message = "<tr>
                <td>Country:</td><td>$value</td>
            </tr>";
    } else {
        // Country name does not match requirements
        $message = "<tr>
                <td>Company:</td><td>Please select a Company.</td>
            </tr>";
    }

    return array(
        'isValid' => $isValid,
        'message' => $message,
        'value' => $value,
        'mandatoryField' => $mandatoryField,
        'mandatoryValid' => $mandatoryValid,
    );
}

function validateState($state){
    $isValid = false;
    $value = $state;
    // Requirement Checking
    $mandatoryField = true;
    $mandatoryValid = ($value !== "blank");
    if ($mandatoryValid) {
        $isValid = true;
        $message = "<tr>
                <td>State:</td><td>$value</td>
            </tr>";
    } else {
        // Country name does not match requirements
        $message = "<tr>
                <td>State:</td><td>Please select a State.</td>
            </tr>";
    }

    return array(
        'isValid' => $isValid,
        'message' => $message,
        'value' => $value,
        'mandatoryField' => $mandatoryField,
        'mandatoryValid' => $mandatoryValid,
    );
}


function validateCity($city) {
    $isValid = false;
    $value = $city;
    // Requirement Checking
    $mandatoryField = true;
    $mandatoryValid = !empty($value);

    if (!empty($value) && strlen($value) >= 3) {
        $isValid = true;
        $message = "<tr>
                <td>City:</td><td>$value</td>
            </tr>";
    } else {
        // Company name does not match requirements
        $message = "<tr>
                <td>City:</td><td>Please enter the home city for the company.</td>
            </tr>";
    }

    return array(
        'isValid' => $isValid,
        'message' => $message,
        'value' => $value,
        'mandatoryField' => $mandatoryField,
        'mandatoryValid' => $mandatoryValid
    );
}

function validateStreetAddress($streetOne, $streetTwo) {
    $isValid = false;
    $value = $streetOne . " " . $streetTwo;
    $mandatoryField = false;
    $mandatoryValid = !empty($value) && strlen($value) > 1;

    if (!empty($streetOne) && strlen($value) >= 10) {
        $isValid = true;
        $message = "<tr>
                <td>Street Address:</td><td>$value</td>
            </tr>";
    } else {
        $message = "<tr>
                <td>Street Address:</td><td>Please enter a valid street address.</td>
            </tr>";
    }

    return array(
        'isValid' => $isValid,
        'message' => $message,
        'value' => $value,
        'mandatoryField' => $mandatoryField,
        'mandatoryValid' => $mandatoryValid
    );
}

function validateZip($zip) {
    $isValid = false;
    $value = $zip;
    // Requirement Checking
    $mandatoryField = false;
    $mandatoryValid = !empty($value);

    if (!empty($value) && is_numeric($value) && strlen($value) >= 5) {
        $isValid = true;
        $message = "<tr>
                <td>Zip Code:</td><td>$value</td>
            </tr>";
    } else {
        // Zipcode does not match requirements
        $message = "<tr>
                <td>Zip Code:</td><td>Please enter the company Zipcode.</td>
            </tr>";
    }

    return array(
        'isValid' => $isValid,
        'message' => $message,
        'value' => $value,
        'mandatoryField' => $mandatoryField,
        'mandatoryValid' => $mandatoryValid
    );
}

function validateServiceArea($area){
    $isValid = false;
    $value = $area;
    // Requirement Checking
    $mandatoryField = false;
    $mandatoryValid = ($value !== "select");
    if ($mandatoryValid) {
        $isValid = true;
        $message = "<tr>
                <td>Service Area:</td><td>$value</td>
            </tr>";
    } else {
        //Service area does not match requirements
        $message = "<tr>
                <td>Service Area:</td><td>Please select a Service Area.</td>
            </tr>";
    }
    return array(
        'isValid' => $isValid,
        'message' => $message,
        'value' => $value,
        'mandatoryField' => $mandatoryField,
        'mandatoryValid' => $mandatoryValid,
    );
}

function validateCategory($category){
    $isValid = false;
    $value = $category;
    // Requirement Checking
    $mandatoryField = true;
    $mandatoryValid = ($value !== "none");
    if ($mandatoryValid) {
        $isValid = true;
        $message = "<tr>
                <td>Industry Category:</td><td>$value</td>
            </tr>";
    } else {
        // category does not match requirements
        $message = "<tr>
                <td>Industry Category:</td><td>Please select a Industry Category.</td>
            </tr>";
    }
    return array(
        'isValid' => $isValid,
        'message' => $message,
        'value' => $value,
        'mandatoryField' => $mandatoryField,
        'mandatoryValid' => $mandatoryValid,
    );
}

function validateAbout($about){
    $isValid = false;
    $value = $about;
    // Requirement Checking
    $mandatoryField = true;
    $mandatoryValid = !empty($value);

    if (!empty($value) && strlen($value) <= 250) {
        $isValid = true;
        $message = "<tr>
                <td>Tagline:</td><td>$value</td>
            </tr>";
    } else {
        // Tagline does not match requirements
        $message = "<tr>
                <td>Tagline:</td><td>Please enter a Tagline.</td>
            </tr>";
    }
    return array(
        'isValid' => $isValid,
        'message' => $message,
        'value' => $value,
        'mandatoryField' => $mandatoryField,
        'mandatoryValid' => $mandatoryValid
    );
}

function validateTagCloud($tagCloud) {
    $isValid = false;
    $value = $tagCloud;
    // Requirement Checking
    $mandatoryField = false;
    $mandatoryValid = !empty($value);

    if (!empty($value) && strlen($value) >= 250) {
        $isValid = true;
        $message = "<tr>
                <td>Search Tags:</td><td>$value</td>
            </tr>";
    } else {
        // Search tags does not match requirements
        $message = "<tr>
                <td>Search Tags:</td><td>Please enter valid search tags ending in a comma.</td>
            </tr>";
    }
    return array(
        'isValid' => $isValid,
        'message' => $message,
        'value' => $value,
        'mandatoryField' => $mandatoryField,
        'mandatoryValid' => $mandatoryValid
    );
}

function validatePrivateName($firstName, $lastName){
    $isValid = false;
    $value = $firstName . " " . $lastName;
    $mandatoryField = true;
    $mandatoryValid = !empty($value);

    if (!empty($firstName) && strlen($value) >= 2) {
        $isValid = true;
        $message = "<tr>
                <td>Private Contact Name:</td><td>$value</td>
            </tr>";
    } else {
        $message = "<tr>
                <td>Private Contact Name:</td><td>Please enter a name with 2 or more characters</td>
            </tr>";
    }

    return array(
        'isValid' => $isValid,
        'message' => $message,
        'value' => $value,
        'mandatoryField' => $mandatoryField,
        'mandatoryValid' => $mandatoryValid,
    );
}

function validatePrivateEmail($privateEmail){
    $isValid = false;
    $value = $privateEmail;
    // Requirement Checking
    $mandatoryField = true;
    $mandatoryValid = !empty($value);

    if(isValidEmailString($value)) {
        $isValid = true;
        $message = "<tr>
                    <td>Private Contact eMail:</td><td>$value</td>
                </tr>";
    }else {
        $message = "<tr>
                <td>Private Contact eMail:</td><td>Please enter a valid private email address. $value </td>
            </tr>";
    }

    return array(
        'isValid' => $isValid,
        'message' => $message,
        'value' => $value,
        'mandatoryField' => $mandatoryField,
        'mandatoryValid' => $mandatoryValid,
    );
}

function validatePrivatePhone($privatePhone, $extension){
    $isValid = false;
    $value = $privatePhone . " ext: " . $extension;
    // Requirement Checking
    $mandatoryField = true;
    $mandatoryValid = !empty($value);

    if(isValidPhoneString($privatePhone)) {
        $isValid = true;
        $message = "<tr>
                    <td>Private Contact Phone Number:</td><td>$value</td>
                </tr>";
    }else {
        $message = "<tr>
                <td>Private Contact Phone Number:</td><td>Please enter a valid phone number.</td>
            </tr>";
    }

    return array(
        'isValid' => $isValid,
        'message' => $message,
        'value' => $value,
        'mandatoryField' => $mandatoryField,
        'mandatoryValid' => $mandatoryValid,
    );
}