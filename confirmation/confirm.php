<!--
    This file is to catch the Confirmation PHP user data
        for the CbCSC Confirmation HTML web page.
    Date: Monday 25th of January, 2021
    Updated:
    Project Name: Coneybeare Sustainability Catalog
    File name: confirm.php
    Author/'s: CTRL ALT DEL
                Amanda H.
-->
    <!-- Link to the universal Meta & Head  -->
    <?php
        include('confirm-includes/headMeta.html');
    ?>

    <title>Thank you for your application.</title>
</head>

    <!--Turning on error reporting -->
    <?php
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
    ?>

<body>

    <!-- Link to the universal Header/Navigation -->
    <?php
        include('../includes/header.html');

        // autoglobal array
        echo"<pre>";
        var_dump($_POST);
        echo"</pre>";

        // creating variables for retrieved form data
        $cName =$_POST['company-name'];
        $cSite =$_POST['company-website'];
        $cLogo =$_POST['iconFile'];
        $cCountry =$_POST['country'];
        $cState =$_POST['state'];
        $cCity =$_POST['inputCity'];
        $cCategory =$_POST[''];
        $cService =$_POST[''];
        $cTagline =$_POST[''];
        $empFirst =$_POST[''];
        $empLast =$_POST[''];
        $eMail = $_POST[' '];

    ?>
    <div class="container my-3">
        <!-- greeting to potential client -->
        <h1>Thank you for your application.</h1>
        <p>Thank you for providing your information.
            It has been sent to the Coneybeare Sustainability team for review.</p>

    </div>

    <!-- Link to the universal Footer -->
    <?php
        include('../includes/footer.html');
    ?>

    <!-- Links to Bootstrap libraries -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
            crossorigin="anonymous"></script>

    <!-- Link to style sheet -->
    <script src="confirm.js"></script>


</body>
</html>