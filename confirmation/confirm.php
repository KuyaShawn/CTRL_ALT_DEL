<!--
    This file is to catch the Confirmation PHP user data
        for the CbSC Confirmation HTML web page.
    Date: Friday March 20th, 2021
    Updated:
    Project Name: Coneybeare Sustainability Catalog
    File name: confirm.php
    Author/'s: CTRL ALT DEL
                Amanda H.
                Dylan H.
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
    <div class="container p-3 my-3 border justify-content-center"
         id="formContainer">
    <?php
        // autoglobal array
        //echo var_dump($_POST);


        /* Company information variables */
        $company_name = $_POST['company_name'];
        $url = $_POST['url'];
        $public_email = $_POST['public_email'];
        $public_phone = $_POST['public_phone'];
        $street_address = $_POST['street_address'];
        $street_address .= $_POST['street_address2'];
        $country = $_POST['country'];
        $state = $_POST['state'];
        $city = $_POST['city'];
        $service_area = $_POST['service_area'];
        $category_id = $_POST['category_id'];
        $logo_path = $_POST['logo_path'];
        $about = $_POST['about'];
        $tag_cloud = $_POST['tag_cloud'];

        /* Point of Contact/Private Contact Info variables */
        $private_contact_name = $_POST['private_contact_name'];
        $private_contact_name .= $_POST['private_contact_last'];
        $private_email = $_POST['private_email'];
        $private_phone = $_POST['private_phone'];
        $private_phone .= "#" . $_POST['private_phone2'];



        /* link to functions.php and function calls variables */
        include('confirm-includes/functions.php');

        /* Printing Message and form content to Thank you page*/
        thankYou();
        message($company_name);
        readout($company_name, $url, $public_email, $public_phone,
            $street_address, $country, $state, $city, $service_area,
            $category_id, $logo_path, $about, $tag_cloud,
            $private_contact_name, $private_email, $private_phone);
/*
 *
 * readOut($company_name, $url, $public_email, $public_phone,
        $street_address, $country, $state, $city, $service_area,
        $category_id, $logo_path, $about, $tag_cloud,
        $private_contact_name, $private_email, $private_phone);

*/

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




        /* Sending to E-mail*/
        $emailTo = "aholt5@mail.greenriver.edu";
        $fromEmail = "no-reply@ctrl-alt-delete.greenriverdev.com";
        $emailSubject = "New Catalog Submission";

        /*
         *
         * $emailBody = "readOut($cName, $cSite, $cEmail, $cTele, $cStreet, $cSuite,
                                      $cCountry, $cState, $cCity, $cService, $cCategory, $cLogo, $cTagline,
                                      $cKey, $empFirst, $empLast, $empEMail, $empTell)";
        */
        $emailBody = "<table class='table'>

            <h3>New Company Information for Approval</h3>
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
            </table>\r\n";
        $emailBody .= "<a href='https://ctrl-alt-delete.greenriverdev.com/admin/'>
        Click here to enter CBSC admin and confirm.</a>";

        $headers = "From: $fromEmail\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n";


        mail($emailTo, $emailSubject, $emailBody, $headers);


        /* logo uploader */
        if(!empty($_FILES)) {
            $target_folder = "/logos/";
            $filename = date('ymdHis') . basename($_FILES["iconFile"]["name"]);
            $file_root_path = $target_folder . $filename;
            $target_file = $_SERVER['DOCUMENT_ROOT'] . $file_root_path;
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            if (isset($_POST["submitBTN"])) {
                $check = getimagesize($_FILES["iconFile"]["tmp_name"]);
                if ($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }

            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }

            // Check file size, limit 500KB
            if ($_FILES["iconFile"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allow certain file formats
            $validTypes = array("jpg", "png", "jpeg");
            if (!in_array($imageFileType, $validTypes)) {
                echo "Sorry, only JPG, JPEG & PNG files are allowed.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                return;
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["iconFile"]["tmp_name"], $target_file)) {
                    echo "The file " . htmlspecialchars(basename($_FILES["iconFile"]["name"])) . " has been uploaded.";

                    /*
                         Mess with ths later

                    // Connect to DB
                    require(getenv("HOME") . '/connect.php');
                    $cnxn = connect();

                    $sql = "INSERT INTO uploads (image_name) VALUES ('$target_file')";
                    //echo $sql;
                    $success = mysqli_query($cnxn, $sql);
                    if(!$success){
                        echo "Sorry, there was a database error";
                    }
                    */

                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }

        /* logo uploader END */

        $postVars = array();

        $postVars['name'] = $company_name;
        $postVars['url'] = $url;
        $postVars['city'] = $city;
        $postVars['state'] = $state;
        $postVars['country'] = $country;
        $postVars['about'] = $about;
        $postVars['category'] = $category_id;
        $postVars['email'] = $public_email;

        if(!empty($cKey)){$postVars['tag_cloud'] = $cKey;}
        if(!empty($file_root_path)){$postVars['logo_path'] = $file_root_path;}

        $curl = curl_init('http://api.ctrl-alt-delete.greenriverdev.com/v1/company/create.php');

        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($postVars));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($curl);
        curl_close($curl);

        echo '<br>' . json_decode($result)->message;

        ?>

    </div>
    </div>


    <?php
        /* Link to the universal Footer */
        include('../includes/footer.html');
    ?>


        <!-- Links to Bootstrap libraries -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
                crossorigin="anonymous"></script>

</body>
</html>