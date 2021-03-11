<?php
// required headers
header('Allow: POST'); //Required header for 405 error codes per RFC 7231 standards
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(array('error-msg' => 'Please use a POST request to access this endpoint.'));
    die();
}

//include_once '/home/ctrlaltd/PDOuserconnect.php';
include_once "../core/PDOuserconnect.php";
include_once "../objects/company.php";

$database = new Database();
$company = new Company($database->connect());

//Data being sent a stringified json for now so we are streaming input to an array rather then superglobal
//Might be changed depending on cURL configuarion.
$data = json_decode(file_get_contents("php://input"));

if( //Checking to make sure all
    !empty($data->name) &&
    !empty($data->url) &&
    !empty($data->city) &&
    !empty($data->state) &&
    !empty($data->country) &&
    !empty($data->about) &&
    !empty($data->category) &&
    !empty($data->email)
){
    $company->name = $data ->name;
    $company->url = $data ->url;
    $company->city = $data ->city;
    $company->state = $data ->state;
    $company->country = $data ->country;
    $company->about = $data ->about;
    $company->category = $data ->category;
    $company->email = $data ->email;

    if(!empty($data->tag_cloud)){
        $company->tag_cloud = $data->tag_cloud;
    }
    if(!empty($data->logo_path)){
        $company->logo_path = $data->logo_path;
    }

    if($company->create()){
        http_response_code(201);
        
        echo json_encode(array('message' => 'Company created successfully'));
    } else {
        http_response_code(503);

        //echo json_encode(array('message' => $company->errorString));
        echo json_encode(array('message' => 'Failed to create company'));
    }


} else {
    http_response_code(400);
    echo json_encode(array('message' => 'Not all required data fields were provided'));
}

/* Required Fields:
Name *
Url *
Country *
State *
City *
Service Area
About *
Category *

private email *

