<!--
    This file is to catch the Confirmation PHP user data
        for the CbSC Confirmation HTML web page.
    Date: Monday March 22nd 2021
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
<link rel="stylesheet" href="/styles/confirmation.css">
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

        /* link to functions.php */
        include('confirm-includes/functions.php');

        // Associative array for validation

        $validationArray = array(
            'company_name' => validateCompanyName($_POST['company_name']),
            'url' => validateUrl($_POST['url']),
            'public_email' => validatePublicEmail($_POST['public_email']),
            'public_phone' => validatePublicPhone($_POST['public_phone']),
            'street_address' => validateStreetAddress($_POST['street_address'], $_POST['street_address2']),
            'country' => validateCountry($_POST['country']),
            'state' => validateState($_POST['state']),
            'city' => validateCity($_POST['city']),
            'zipcode' => validateZip($_POST['zipcode']),
            'service_area' => validateServiceArea($_POST['service_area']),
            'category_id' => validateCategory($_POST['category_id']),
            'about' => validateAbout($_POST['about']),
            'tag_cloud' => validateTagCloud($_POST['tagPostString']),
            'private_contact_name' => validatePrivateName($_POST['private_contact_name'], $_POST['private_contact_last']),
            'private_email' => validatePrivateEmail($_POST['private_email']),
            'private_phone' => validatePrivatePhone($_POST['private_phone'], $_POST['private_phone2'])
        );

        $myCompanyValue = $validationArray['company_name']['value'];

        /*
         * array(
         *  'company_name' => array(
         *     'isValid' => true,
         *     'message' => "My awesome message",
         *     'value' => "What I want to send to the server"
         *   )
         * )
         */

        $isValid = true;
        // Each item in $validationArray is named $formItem
        foreach ($validationArray as $formItem) {
            // Loop through each validation item, if we are not valid
            // set the variable and break the loop
            if ($formItem['mandatoryField'] && !$formItem['isValid']) {
                $isValid = false;
                break;
            }
        }

        /* Company information variables */
        $logo_path = "PLACEHOLDER";


        // don't forget the check box
        $application_body = readout($validationArray, $isValid);


        /* Printing Message and form content to Thank you page */
        if($isValid){
            thankYou();
            message($validationArray['company_name']['value']);
        }
        echo $application_body;
        if(!$isValid){
            echo"<p>Please click the back button and correct the above requests.</p>";
        }

        /*  E-mail variables*/
        $emailTo = "aholt5@mail.greenriver.edu";
        $fromEmail = "no-reply@ctrl-alt-delete.greenriverdev.com";
        $emailSubject = "New Catalog Submission";
        $emailBody = $application_body;
        $emailBody .= "<a href='https://ctrl-alt-delete.greenriverdev.com/admin/'>
            Click here to enter CBSC admin and confirm.</a>";
        $headers = "From: $fromEmail\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n";

        /* Sending email to administrator */
        if($isValid) {
            mail($emailTo, $emailSubject, $emailBody, $headers);
        }
        echo "<br><br><br>";


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
                //return;
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["iconFile"]["tmp_name"], $target_file)) {
                    echo "The file " . htmlspecialchars(basename($_FILES["iconFile"]["name"])) . " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }

        /* logo uploader END */

        $postVars = array();

        //Required fields for creating a company
        $postVars['company_name'] = $validationArray['company_name']['value'];
        $postVars['about'] = $validationArray['about']['value'];
        $postVars['city'] = $validationArray['city']['value'];
        $postVars['state'] = $validationArray['state']['value'];
        $postVars['zipcode'] = $validationArray['zipcode']['value'];
        $postVars['country'] = $validationArray['country']['value'];
        $postVars['service_area'] = $validationArray['service_area']['value'];
        $postVars['url'] = $validationArray['url']['value'];
        $postVars['private_email'] = $validationArray['private_email']['value'];
        $postVars['category_id'] = $validationArray['category_id']['value'];
        // the below items were not included in the required fields listed above
        //$postVars['private_contact_name'] = $validationArray['private_contact_name']['value'];



        //Optional fields
        if ($validationArray['tag_cloud']['mandatoryValid']) {
            $postVars['tag_cloud'] = $validationArray['tag_cloud']['value'];
        }
        if ($validationArray['street_address']['mandatoryValid']) {
            $postVars['street_address'] = $validationArray['street_address']['value'];
        }
        if ($validationArray['public_email']['mandatoryValid']) {
            $postVars['public_email'] = $validationArray['public_email']['value'];
        }
        if ($validationArray['public_phone']['mandatoryValid']) {
            $postVars['public_phone'] = $validationArray['public_phone']['value'];
        }
        // not touching this special one
        if(!empty($file_root_path)){
            $postVars['logo_path'] = $file_root_path;
        }
        if ($validationArray['private_phone']['mandatoryValid']) {
            $postVars['private_phone'] = $validationArray['private_phone']['value'];
        }

        // for testing purposes
        //echo var_dump($postVars);
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

<footer>
<?php
/* Link to the universal Footer */
include('../includes/footer.html');
?>
</footer>
<!-- Links to Bootstrap libraries -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>


</body>
</html>
