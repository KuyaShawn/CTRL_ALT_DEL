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
$company = new Company($database->connect(), NULL);

//Data being sent a stringified json for now so we are streaming input to an array rather then superglobal
//Might be changed depending on cURL configuarion.
$data = json_decode(file_get_contents("php://input"));

if( //Checking to make sure all required fields are present
    !empty($data->company_name) &&
    !empty($data->about) &&
    !empty($data->city) &&
    !empty($data->state) &&
    !empty($data->country) &&
    !empty($data->service_area) &&
    !empty($data->url) &&
    !empty($data->private_email) &&
    !empty($data->category_id)
){
    $company->company_name = $data->company_name;
    $company->about = $data->about;
    $company->city = $data->city;
    $company->state = $data->state;
    $company->country = $data->country;
    $company->service_area = $data->service_area;
    $company->url = $data->url;
    $company->private_email = $data->private_email;
    $company->category_id = $data->category_id;


    if(!empty($data->tag_cloud)){
        $company->tag_cloud = $data->tag_cloud;
    }
    if(!empty($data->street_address)){
        $company->street_address = $data->street_address;
    }
    if(!empty($data->public_email)){
        $company->public_email = $data->public_email;
    }
    if(!empty($data->public_phone)){
        $company->public_phone = $data->public_phone;
    }
    if(!empty($data->logo_path)){
        $company->logo_path = $data->logo_path;
    }
    if(!empty($data->private_contact_name)){
        $company->private_contact_name = $data->private_contact_name;
    }
    if(!empty($data->private_phone)){
        $company->private_phone = $data->private_phone;
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

