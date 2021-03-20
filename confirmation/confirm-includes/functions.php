<!--
    This file holds the PHP function code for the CbCSC
            Confirma.php page.
    Updated: Friday March 20th, 2021
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

    function readOut($company_name, $url, $public_email, $public_phone,
                     $street_address, $country, $state, $city, $service_area,
                     $category_id, $logo_path, $about, $tag_cloud,
                     $private_contact_name, $private_email, $private_phone)
    {
        echo"<table class='table'>
            <tr>
               <td>Company:</td><td>$company_name</td>
            </tr><tr>
               <td>Website:</td><td>$url</td>
            </tr><tr>
                <td>Company Email:</td><td>$public_email</td>
            </tr><tr>
                <td>Company Telephone:</td><td>$public_phone</td>
            </tr><tr>
               <td>Location:</td><td>$street_address, 
                        $city, $state, $country</td>
            </tr><tr>
               <td>Service Area:</td><td>$service_area</td>
            </tr><tr>
               <td>Industry:</td><td>$category_id</td>
            </tr><tr>
                <td>Logo:</td><td>$logo_path</td>
            </tr><tr>
               <td>Tagline:</td><td>$about</td>
            </tr><tr>
                <td>Key Words:</td><td>$tag_cloud</td>
            </tr><tr></table>

        <h3>Private Company Contact</h3>

        <table class='table'>
            <tr>
               <td>Contact Person:</td><td>$private_contact_name</td>
            </tr><tr>
               <td>Email:</td><td>$private_email</td>
            </tr><tr>
               <td>Telephone:</td><td>$private_phone</td>
            </tr>
            </table>";
    }





    /*  TO DO:
     *
     * VALIDATION FUNCTIONS FOR USER INPUT
        Name
        Web address
        address
        country
        state
        city
        geographic scope
        logo
        email
        phone
     * */


    function userValidation()
    {
        /* boolean to flag and track validation errors     */
        $isValid = true;

        function validCompany()
        {

        }

        function validName($empFirst)
        {
            if (!empty($empFirst) and ctype_alpha($empFirst)) {
                $isValid = true;
            } else {
                return false;
            }
        }






    }




/*

    }*/