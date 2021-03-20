<!--
    This file holds the PHP function code for the CbCSC
            Confirma.php page.
    Updated: Tuesday 23rd February, 2021
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

    function message($cName)
    {
        echo "<p>The following information about $cName has been sent to 
                Coneybeare Sustainability Catalog for review.</p>";
    }

    function readOut($cName, $cSite, $cEmail, $cTele, $cStreet, $cSuite,
        $cCountry, $cState, $cCity, $cService, $cCategory, $cLogo, $cTagline,
        $cKey, $empFirst, $empLast, $empEMail, $empTell)
    {
        echo"<table class='table'>
            <tr>
               <td>Company:</td><td>$cName</td>
            </tr><tr>
               <td>Website:</td><td>$cSite</td>
            </tr><tr>
                <td>Company Email:</td><td>$cEmail</td>
            </tr><tr>
                <td>Company Telephone:</td><td>$cTele</td>
            </tr><tr>
               <td>Location:</td><td>$cStreet, $cSuite, 
                        $cCity, $cState, $cCountry</td>
            </tr><tr>
               <td>Service Area:</td><td>$cService</td>
            </tr><tr>
               <td>Industry:</td><td>$cCategory</td>
            </tr><tr>
                <td>Logo:</td><td>$cLogo</td>
            </tr><tr>
               <td>Tagline:</td><td>$cTagline</td>
            </tr><tr>
                <td>Key Words:</td><td>$cKey</td>
            </tr><tr></table>

        <h3>Private Company Contact</h3>

        <table class='table'>
            <tr>
               <td>Contact Person:</td><td>$empFirst $empLast</td>
            </tr><tr>
               <td>Email:</td><td>$empEMail</td>
            </tr><tr>
               <td>Telephone:</td><td>$empTell</td>
            </tr>
            </table>";
    }





    /*  TO DO:
     *
     * VALIDATION FUNCTIONS FOR USER INPUT
        Name
        Web address
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