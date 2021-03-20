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

if($company->company_name != null){
    $dataArray = array(
        "id" => $company->id,
        "company_name" => $company->company_name,
        "about" => $company->about,
        "tag_cloud" => $company->tag_cloud,
        "address" => $company->street_address,
        "city" => $company->city,
        "state" => $company->state,
        "country" => $company->country,
        "public_email" => $company->public_email,
        "public_phone" => $company->public_phone,
        "url" => $company->url,
        "logo_path" => $company->logo_path,
        "category" => $company->category
    );

    http_response_code(200);
    echo json_encode($dataArray);
} else {
    http_response_code(404);
    echo json_encode(array("error-msg" => "Company does not exist."));
}


