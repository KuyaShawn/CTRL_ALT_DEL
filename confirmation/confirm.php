<!--
    This file is to catch the Confirmation PHP user data
        for the CbSC Confirmation HTML web page.
    Date: Monday 25th of January, 2021
    Updated:
    Project Name: Coneybeare Sustainability Catalog
    File name: confirm.php
    Author/'s: CTRL ALT DEL
                Amanda H.
-->

<?php
    /* Turning on error reporting */
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    /* Link to the universal Meta & Head  */
    include('confirm-includes/headMeta.html');
?>
    <title>Thank you for your application.</title>
</head>

<body>
    <!-- Link to the universal Header/Navigation -->
    <?php
        include('../includes/header.html');
    ?>
    <div class="vh-100">
    <div class="container p-3 my-3 border h-75 justify-content-center" id="formContainer">
    <?php
        // autoglobal array
        // echo var_dump($_POST);


        /* Company information variables */
        $cName = $_POST['company-name'];
        $cWebsite = $_POST['company-website'];
        $cEmail = $_POST['contact-email'];
        $cPhone = $_POST['cPhone'];
        $cStreet = $_POST['address1'];
        $cSuite = $_POST['address2'];
        $cCountry = $_POST['country'];
        $cState = $_POST['state'];
        $cCity = $_POST['inputCity'];
        $cService = $_POST['inputArea'];
        $cCategory = $_POST['industry'];
        $cLogo = $_POST['logo'];
        $cTagline = $_POST['tagline'];
        $cKey = $_POST['tagPostString'];

        /* Point of Contact/Private Contact Info variables */
        $pcFirst = $_POST['pfname'];
        $pcLast = $_POST['plname'];
        $pcEmail = $_POST['pEmail'];
        $pcPhone = $_POST['phone'];
        $pcPhone .= " #" . $_POST['phone2'];



        /* link to functions.php and function calls variables */
        include('confirm-includes/functions.php');

        /* Printing Message and content from applicant*/
        thankYou();
        message($cName);
        echo"<table class='table'>
            <tr>
               <td>Company:</td><td>$cName</td>
            </tr><tr>
               <td>Website:</td><td>$cWebsite</td>
            </tr><tr>
               <td>Location:</td><td>$cCity, $cState, $cCountry</td>
            </tr><tr>
               <td>Service Area:</td><td>$cService</td>
            </tr><tr>
               <td>Industry:</td><td>$cCategory</td>
            </tr><tr>
               <td>Tagline:</td><td>$cTagline</td>
            </tr><tr>
               <td>Search Tags:</td><td>$cKey</td>
            </tr><tr>
               <td>Contact Email:</td><td>$cEmail</td>
            </tr><tr>
               <td>Point of Contact:</td><td>$pcFirst $pcLast</td>
            </tr><tr>
               <td>Point of Contact Email:</td><td>$pcEmail</td>
            </tr>
            </table>";




        /* Sending to E-mail*/
        $emailTo = "dhardy8@mail.greenriver.edu";
        $fromEmail = "no-reply@ctrl-alt-delete.greenriverdev.com";
        $emailSubject = "New Catalog Submission";
        $emailBody = "<table class='table'>
            <tr>
               <td>Company:</td><td>$cName</td>
            </tr><tr>
               <td>Website:</td><td>$cWebsite</td>
            </tr><tr>
               <td>Location:</td><td>$cCity, $cState, $cCountry</td>
            </tr><tr>
               <td>Service Area:</td><td>$cService</td>
            </tr><tr>
               <td>Industry:</td><td>$cCategory</td>
            </tr><tr>
               <td>Tagline:</td><td>$cTagline</td>
            </tr><tr>
               <td>Search Tags:</td><td>$cKey</td>
            </tr><tr>
               <td>Contact Email:</td><td>$cEmail</td>
            </tr><tr>
               <td>Point of Contact:</td><td>$pcFirst $pcLast</td>
            </tr><tr>
               <td>Point of Contact Email:</td><td>$pcEmail</td>
            </tr>
            </table>\r\n";
        $emailBody .= "<a href='https://ctrl-alt-delete.greenriverdev.com/admin/'>
        Click here to enter CBSC admin and confirm.</a>";

        $headers = "From: $fromEmail\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n";


        mail($emailTo, $emailSubject, $emailBody, $headers);

        ?>
    </div>


    <?php
        /* Link to the universal Footer */
        include('../includes/footer.html');
    ?>
    </div>


        <!-- Links to Bootstrap libraries -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
                crossorigin="anonymous"></script>

</body>
</html>