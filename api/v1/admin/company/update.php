<?php

header('Allow: PATCH');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PATCH");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    echo "";
    die();
}

if ($_SERVER['REQUEST_METHOD'] !== 'PATCH') {
    http_response_code(405);
    echo json_encode(array('message' => 'Please use a PATCH request to access this endpoint.'));
    die();
}

require_once "../../core/PDOadminconnect.php";
require_once "../../objects/company.php";

$data = json_decode(file_get_contents("php://input"));

$database = new Database();

$company = new Company($database->connect(), $data);

if(!empty($data->id)){
    if($company->adminUpdate()){
        http_response_code(201);

        echo json_encode(array('message' => 'Company updated successfully'));
    } else {
        http_response_code(503);

        //echo json_encode(array('message' => $company->errorString));
        echo json_encode(array('message' => 'Failed to update company'));
    }
} else {
    http_response_code(400);
    echo json_encode(['message' => 'Please please provide an "id" field when accessing this endpoint.']);
}
