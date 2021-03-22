<!--
    This file is to catch the Confirmation PHP user data
        for the CbSC Confirmation HTML web page.
    Date: Sunday March 21st 2021
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

        /* link to functions.php and function calls variables */
        include('confirm-includes/functions.php');

        /* Company information variables */
        $company_name = $_POST['company_name'];
        $url = $_POST['url'];
        $public_email = $_POST['public_email'];
        $public_phone = $_POST['public_phone'];
        $street_address = $_POST['street_address'];
        $street_address .= " " . $_POST['street_address2'];
        $country = $_POST['country'];
        $state = $_POST['state'];
        $zipcode = $_POST['zipcode'];
        $city = $_POST['city'];
        $service_area = $_POST['service_area'];
        $category_id = $_POST['category_id'];
        $logo_path = "PLACEHOLDER";
        $about = $_POST['about'];
        $tag_cloud = $_POST['tagPostString'];

        /* Point of Contact/Private Contact Info variables */
        $private_contact_name = $_POST['private_contact_name'];
        $private_contact_name .= " " . $_POST['private_contact_last'];
        $private_email = $_POST['private_email'];
        $private_phone = $_POST['private_phone'];
        $private_phone .= " " . $_POST['private_phone2'];

        /* Mixed Data Fields */
        //$street_address = $street_address1 . " " . $street_address2;
        //$private_contact_name = $private_contact_first_name . " " . $private_contact_last_name;


        $application_body = readout($company_name, $url, $public_email, $public_phone,
            $street_address, $country, $state, $city, $service_area,
            $category_id, $logo_path, $about, $tag_cloud,
            $private_contact_name, $private_email, $private_phone);


        /* Printing Message and form content to Thank you page*/
        thankYou();
        message($company_name);
        echo $application_body;


        /* Sending to E-mail*/
        $emailTo = "aholt5@mail.greenriver.edu";
        $fromEmail = "no-reply@ctrl-alt-delete.greenriverdev.com";
        $emailSubject = "New Catalog Submission";


        $emailBody = $application_body . "<a href='https://ctrl-alt-delete.greenriverdev.com/admin/'>
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
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }

        /* logo uploader END */

        $postVars = array();

        //Required fields for creating a company
        $postVars['company_name'] = $company_name;
        $postVars['about'] = $about;
        $postVars['city'] = $city;
        $postVars['state'] = $state;
        $postVars['zipcode'] = $zipcode;
        $postVars['country'] = $country;
        $postVars['service_area'] = $service_area;
        $postVars['url'] = $url;
        $postVars['private_email'] = $private_email;
        $postVars['category_id'] = 2; //temporary until code is added

        //Optional fields
        if(!empty($tag_cloud)){$postVars['tag_cloud'] = $tag_cloud;}

        if(!empty($street_address1) || !empty($street_address2)){$postVars['street_address'] = $street_address;}
        if(!empty($public_email)){$postVars['public_email'] = $public_email;}
        if(!empty($public_phone)){$postVars['public_phone'] = $public_phone;}
        if(!empty($file_root_path)){$postVars['logo_path'] = $file_root_path;}
        if(!empty($private_contact_first_name) || !empty($private_contact_last_name)){$postVars['private_contact_name'] = $private_contact_name;}
        if(!empty($private_phone)){$postVars['private_phone'] = $private_phone;}


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
/*


not mandatory
       - email
        -phone number
        - zip
        - Geographical scope
        - Logo or image of product - highly recommended
        - Private contact Check box
        -private contact last name
        -private contact telephone2

required / mandatory
        Company Contact Publish check box
        -Company Name
        -Company url
        -street address 1
        -country
        -state
        -city
        -category / industry
        - key words
        - Tagline / about
        -private contact first name
        -private contact email
        -private contact telephone



array(19) {
    ["company-name"]=> string(9) "Pool Land"
    ["url"]=> string(10) "www.pl.com"
    ["public_email"]=> string(9) "pl@pl.com"
    ["public_phone"]=> string(10) "8882024567"
    ["street_address"]=> string(15) "123 main street"
    ["street_address2"]=> string(6) "Unit 3"
    ["country"]=> string(24) "United States of America"
    ["state"]=> string(2) "AL"
    ["city"]=> string(8) "citycity"
    ["zip"]=> string(6) "198562"
    ["service_area"]=> string(5) "state"
    ["category_id"]=> string(12) "Architecture"
    ["about"]=> string(20) "swimming is the best"
    ["tagPostString"]=> string(0) ""
    ["pocAuth"]=> string(0) ""
    ["private_contact_name"]=> string(4) "jane"
    ["private_contact_last"]=> string(5) "smith"
    ["private_email"]=> string(9) "js@pl.com"
    ["private_phone"]=> string(10) "8882026547"
    ["private_phone2"]=> string(3) "001"
}

*/