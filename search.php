<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coneybeare Sustainability Catalog - Search</title>

    <link rel="stylesheet" href="styles/popupBox.css">
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


    $data = json_decode($result);

    foreach($data as $obj){
        $row = get_object_vars($obj);

        $id = $row['id'];
        $name = $row['name'];
        $category = $row['category'];
        $state = $row['state'];
        $country = $row['country'];
        $about = $row['about'];
        $url = $row['url'];
        $iconCategory = strtolower(str_replace(' ', '-', $category));

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

        //Parsing the url since its not standardized in the database (regex is my own creation (Dylan))
        preg_match('/(?:(?:http(?:s)?:\/\/)?(?:www\.)?)?(?<domain>[\w\.-]+){1}(?<path>.*)/', $url, $matches);
        $urlParsed = $matches['domain'].$matches['path'];

        if(!empty($url)){
            echo "<a class='media my-4' id='$id' href='https://$urlParsed' target='_blank' rel='noopener noreferrer'>";
        } else {
            echo "<div class='media my-4' id='$id' onclick='openModal($id)'>";
        }

        echo "<img src='/images/dirt_plants.png' class='mr-3 search-image'>";
        echo "<div class='media-body row'>";
        echo "<span class='col-6' span style='font-size:20px'>$name</span>";
        echo "<span class='col-6'><svg class='nav-icon'><use href='/images/symbol-defs.svg#$iconCategory'></use></svg>$category</span>";
        echo "<span class='col-6'>Service</span>";
        echo "<span class='col-6'>$location</span>";
        echo "<span class='col-12 mt-3'>$about</span>";
        echo "</div>";

        if(!empty($url)){
            echo "</a>";
        } else {
            echo "</div>";
        }

    }

    ?>


</div>
<!-- popupBox start -->
<div>
    <div class="popup_container" id="popup">
        <div class="popup-header">
            <div class="title" id="modal-title">Ecology Artisans</div>
            <button data-close-button class="close-button" onclick="closeModal()">&times;</button>
        </div>
        <div class="popup-body">
            <img src="/images/dirt_plants.png" class="search-image">
            <div class=" info_section">
                <h4>About</h4>
                <p id="modal-tagline">possibly too small, has hiring needs and is struggling to find good people, but might not pay Coney fee.
                    Worth a pain diagnosis</p>
                <h4>Website</h4>
                <p id="modal-url">Insert here</p>
            </div>

        </div>
        <div class="popup-sidebar">
            <div>
                <h5>Service:</h5>
                <span id="modal-category"><svg class="nav-icon"><use id="modal-icon" href="/images/symbol-defs.svg#ecology"></use></svg>Agriculture</span>
            </div>
            <div>
                <h5>Location:</h5>
                <span id="modal-location">California, USA</span>
            </div>
            <div>
                <h5>Contact:</h5>
                <span id="modal-phone">123-456-7890</span>
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