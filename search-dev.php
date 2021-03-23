<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coneybeare Sustainability Catalog - Search</title>

    <link rel="stylesheet" href="styles/popupBox.css">
    <link rel="stylesheet" href="styles/Media_Query.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>

<?php
include('includes/header.html')
?>

<div class="container py-4">
        <?php

    ini_set('display_errors', 0);
    error_reporting(E_ALL & ~E_NOTICE);

    $path = 'http://api.ctrl-alt-delete.greenriverdev.com/v1/search.php?';

    $data = array();
    $searchHeader = "";
    if (isset($_GET['category'])){
        $data['category'] = $_GET['category'];
        $searchHeader .= ucwords($_GET['category'].' ');
    }
    if(isset($_GET['search'])){
        $data['search'] = $_GET['search'];
        $searchHeader .= ucwords($_GET['search']);
    }

    $headers = array(
            'Content-type: application/x-www-form-urlencoded'
    );

    $curl = curl_init($path . http_build_query($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);


    $result = curl_exec($curl);
    curl_close($curl);

    echo "<h1 class='text-center mb-3'>Search Results - $searchHeader</h1>";
    echo "<hr class='solid'>";

    echo "<div class='row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5'>";


    $data = json_decode($result);

    /*
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    */


    $placeholderImagePath = '/images/placeholder.png';

    foreach($data as $obj){


        $row = get_object_vars($obj);


        $id = $row['id'];
        $name = $row['company_name'];
        $category = $row['category'];
        $state = $row['state'];
        $country = $row['country'];
        $about = $row['about'];
        $url = $row['url'];
        $logo_path = $row['logo_path'];
        $icon_path = $row['icon_path'];


        $location = "";
        if(!empty($state)){
            $location .= $state;
        }
        if(!empty($country)){
            if(!empty($state)){
                $location .= ", ";
            }
            $location .= $country;
        }

        $imgPath = (!empty($logo_path)) ? $logo_path : $placeholderImagePath;

        //Parsing the url since its not standardized in the database (regex is my own creation (Dylan))
        preg_match('/(?:(?:http(?:s)?:\/\/)?(?:www\.)?)?(?<domain>[\w\.-]+){1}(?<path>.*)/', $url, $matches);
        $urlParsed = $matches['domain'].$matches['path'];

        echo "<div class='col mb-4' id='$id' onclick='openModal($id)'>";
            echo "<div class='card h-100 company-hoverable'>";
                echo "<img src='$imgPath' class='card-img-top'>";
                echo "<div class='card-body h-100'>";
                    echo "<h5 class='card-title text-truncate'>$name</h5>";
                    echo "<p class='card-text max-lines-5'>$about</p>";
                echo "</div>";
                echo "<ul class='list-group list-group-flush'>";
                    echo "<li class='list-group-item bg-transparent'>Service</li>";
                    echo "<li class='list-group-item bg-transparent'><svg class='nav-icon'><use href='$icon_path'></use></svg>$category</li>";
                    if(!empty($location)){echo "<li class='list-group-item bg-transparent'>$location</li>";}
                echo "</ul>";
                    if(!empty($url)){
                        echo "<div class='card-body h-25'>";
                        echo "<a href='https://$urlParsed' class='card-link'>Website</a>";
                        echo "</div>";
                    }
            echo "</div>";
        echo "</div>";
    }
    ?>
        </div>
</div>
<!-- popupBox start -->
<div>
    <div class="popup_container" id="popup">
        <div class="popup-header">
            <div class="title" id="modal-title">Ecology Artisans</div>
            <button data-close-button class="close-button" onclick="closeModal()">&times;</button>
        </div>
        <div class="popup-body">
            <img id="modal-image" src="/images/dirt_plants.png" class="search_image">
            <div class=" info_section">
                <h4>About</h4>
                <p id="modal-tagline">possibly too small, has hiring needs and is struggling to find good people, but might not pay Coney fee.
                    Worth a pain diagnosis</p>
                <div id="modal-url-section">
                    <h4>Website</h4>
                    <a id="modal-url" href="#" target='_blank' rel='noopener noreferrer'>Insert here</a>
                </div>

            </div>

        </div>
        <div class="popup-sidebar">
            <div class="d-flex flex-column">
                <h5>Service:</h5>
                <span id="modal-category">Agriculture</span>
            </div>
            <div class="d-flex flex-column">
                <h5>Location:</h5>
                <span id="modal-city">Random City</span>
                <span id="modal-location">California, USA</span>
            </div>
            <div class="d-flex flex-column">
                <h5>Contact:</h5>
                <span id="modal-contact-error">No contact info provided</span>
                <span id="modal-phone">123-456-7890</span>
                <span id="modal-email">someone@about.com</span>
            </div>
        </div>
    </div>

    <div id="overlay" onclick="closeModal()"></div>
</div>
<!-- popupBox end -->

<?php
include('includes/footer.html')
?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>
<script src="/scripts/search-functions.js"></script>
</body>
</html>