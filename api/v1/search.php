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

$sql = "SELECT com.id, com.company_name, cat.category_name as category, cat.category_icon_path as icon_path, cat.category_icon_type as icon_type,  com.about, com.state, com.country, com.logo_path, com.url 
        FROM company com 
        INNER JOIN categories cat
        ON com.category_id = cat.category_id
        WHERE (status = 'APPROVED')";

if (!empty($_GET)) {
    $sql .= ' AND ';
    $category = $_GET['category'];
    $search = $_GET['search'];

    //category filtering
    if(!empty($category)){
        $sql .= "(LOWER(cat.category_name) = LOWER('$category'))";
    } else if(!empty($search)){
        $sql .= "MATCH (com.company_name, com.tag_cloud, com.about) AGAINST ('$search') OR MATCH (cat.category_name) AGAINST ('$search')";
    } else {
        //Choosing to error it out because if they send data but its bad they likely wanted to filter but messed up
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
