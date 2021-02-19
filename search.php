<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coneybeare Sustainability Catalog</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>

<?php
include('includes/header.html')
?>

<div class="container py-4">
    <h1 class="text-center mb-3">Search Results</h1>

    <?php

    var_dump($_GET);

    $category = $_GET['category'];
    $search = $_GET['search'];

    $path = 'http://ctrl-alt-delete.greenriverdev.com/api/v1/search.php?';
    if (!empty($category)){
        $path .= 'category='.urlencode($category).'&';

    }
    if(!empty($search)){
        $path .= 'search='.urlencode($search);
    }

    $opts = array('http' =>
        array(
            'method'  => 'GET',
            'header'  => 'Content-type: application/x-www-form-urlencoded',
        )
    );
    $context  = stream_context_create($opts);
    $result = file_get_contents($path, false, $context);

    $data = json_decode($result);
    echo ('<pre>');
    var_dump($data);
    echo ('</pre>');

    ?>


</div>

<?php
include('includes/footer.html')
?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>

</body>
</html>