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

require_once "../../objects/rejectionNotes.php";
require_once "../../objects/company.php";
require_once "../../core/PDOadminconnect.php";

$data = json_decode(file_get_contents("php://input"));

$database = new Database();
$cnxn = $database->connect();

$rejectionNotes = new RejectionNotes($cnxn);
$company = new Company($cnxn, NULL);

// TODO: make sure Id provided is valid by checking in company first.
if(!empty($data->id)){
    $company->id = $data->id;

    $company->readUsingId();

    //attempt to send an email if a contact email was provided
    if(!empty($company->private_email)){
        $emailTo = $company->private_email;
        $fromEmail = "no-reply@ctrl-alt-delete.greenriverdev.com";
        $emailSubject = "Sustainability Catalog Rejection Notice";


        $emailBody = "We regret to inform you that your company has not been accepted for the Coneybeare Sustainability Catalog.\n\n";
        if(!empty($data->reason)){
            $emailBody .= "Reason:\n" . $data->reason . "\n\n";
        }
        $emailBody .= "If you feel as though this is a mistake or have questions, please contact us at our support email.";

        $emailBody = wordwrap($emailBody, 70);

        $headers = array(
            'From' => $fromEmail,
            'MIME-Version' => '1.0',
            'Content-type' => 'text/plain; charset=utf-8'
        );

        $rejectionNotes->notified = mail($emailTo, $emailSubject, $emailBody, $headers);
    } else {
        $rejectionNotes->notified = false;
    }
    $rejectionNotes->company_id = $company->id;
    $rejectionNotes->reason = $data->reason;

    if($rejectionNotes->adminCreate()){
        $company->status = $data->status;
        if($company->adminUpdate()){
            http_response_code(201);
            echo json_encode(array('message' => 'Company updated successfully'));
        } else {
            http_response_code(503);

            //echo json_encode(array('message' => $company->errorString));
            echo json_encode(array('message' => 'Failed to update company'));
        }
    } else {
        http_response_code(503);
        echo json_encode(array('message' => 'Failed to update notes'));
    }

} else {
    http_response_code(400);
    echo json_encode(['message' => 'Please please provide an "id" field when accessing this endpoint.']);
}
