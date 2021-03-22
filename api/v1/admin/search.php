<?php

header('Allow: GET'); //Required header for 405 error codes per RFC 7231 standards
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json; charset=UTF-8");


if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(array('error-msg' => 'Please use a GET request to access this endpoint.'));
    die();
}

require_once "../core/PDOadminconnect.php";
require_once "../objects/company.php";

$database = new Database();

$company = new Company($database->connect(), NULL);

$company->status = !empty($_GET['status']) ? $_GET['status'] : "PENDING";

$results = $company->adminSearch();
$num = $results->rowCount();

if($num > 0){

    $output = array();

    while($row = $results->fetch(PDO::FETCH_ASSOC)){
        array_push($output, $row);
    }

    http_response_code(200);

    echo json_encode($output);

} else {

    http_response_code(404);

    echo json_encode(array("message" => "No companies found."));
}