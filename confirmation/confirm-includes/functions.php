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
    function thankYou($pcFirst)
    {
        echo "<h3>Thank you for the application $pcFirst!</h3><br>";
    }

    function message($cName)
    {
        echo "<p>The following information about $cName has been sent to 
                Coneybeare Sustainability Catalog for review.</p>";
    }
/*
    function summary($cName, $cSite, $cCountry, $cState, $cCity,
                     $cService, $cCategory, $cLogo, $cTagline, $cAbout, $empFirst,
                     $empLast, $empEMail, $pcFirst, $empLast, $pcEMail)
    {

    } */




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