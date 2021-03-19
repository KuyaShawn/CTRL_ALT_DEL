<?php

//Implement standard response headers
header('Allow: GET'); //Required header for 405 error codes per RFC 7231 standards
header('Content-type: application/json; charset=UTF-8');

//Main database connection, upon fatal error PHP reports 500 error code anyways which is appropriate.
//Fatal errors should probably be logged for future admin usage.
require('/home/ctrlaltd/userconnect.php');

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['error-msg' => 'Please use a GET request to access this endpoint.']);
    die();
}

$cnxn = connect();
$cnxn->set_charset('utf8');

$sql = "SELECT id, name, category, about, url, email, city, state, country, logo_path FROM company WHERE (status_code = 2)";

if (!empty($_GET)) {
    $sql .= ' AND ';
    $filterSuccess = false;
    $category = $_GET['category'];
    $search = $_GET['search'];

    //category filtering
    if(!empty($category)){
        $sql .= "(category = '$category')";
        $filterSuccess = true;
    }

    if(!empty($search)){
        if(!empty($category)){ // for chaining filters will clean up later
            $sql .= " AND ";
        }
        $sql .= "(name LIKE '%$search%' OR about LIKE '%$search%' OR category LIKE '%$search%' OR tag_cloud LIKE '%$search%')";
        $filterSuccess = true;
    }

    //Choosing to error it out because if they send data but its bad they likely wanted to filter but messed up
    if(!$filterSuccess) {
        http_response_code(400);
        echo json_encode(['error-msg' => 'Please please provide either a "search" or "category" data field if you are going to provide data to this endpoint.']);
        die();
    }
}


$sql .= " LIMIT 0, 25";

$result = mysqli_query($cnxn, $sql);
$output = array();

while ($row = $result->fetch_assoc()) {
    $output[] = $row;
}

http_response_code(200);
echo json_encode($output);
