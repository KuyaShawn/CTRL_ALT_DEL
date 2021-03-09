<?php
// required headers
header('Allow: GET'); //Required header for 405 error codes per RFC 7231 standards
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json; charset=UTF-8");

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(array('error-msg' => 'Please use a GET request to access this endpoint.'));
    die();
}

//include_once '/home/ctrlaltd/PDOuserconnect.php';
include_once "../core/PDOuserconnect.php";
include_once "../objects/company.php";

$database = new Database();

$company = new Company($database->connect());

if(isset($_GET['id'])){
    $company->id = $_GET['id'];
}  else {
    http_response_code(400);
    echo json_encode(['error-msg' => 'Please please provide an "id" field when accessing this endpoint.']);
    die();
}

$company->readUsingId();

if($company->name != null){
    $dataArray = array(
        "id" => $company->id,
        "name" => $company->name,
        "about" => $company->about,
        "category" => $company->category,
        "city" => $company->city,
        "country" => $company->country,
        "email" => $company->email,
        "phone" => $company->phone,
        "state" => $company->state,
        "tag_cloud" => $company->tag_cloud,
        "url" => $company->url
    );

    http_response_code(200);
    echo json_encode($dataArray);
} else {
    http_response_code(404);
    echo json_encode(array("error-msg" => "Company does not exist."));
}


