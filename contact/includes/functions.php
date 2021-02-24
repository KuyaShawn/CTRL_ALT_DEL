<?php

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

function emailSend($first_name = "", $last_name = "", $email = "")
{
    $emailTo = "$email";
    $emailFrom = 'Coneybeare Sustainability Catalog no-reply@coneybearesc.com';
    $emailBody = "Hi $first_name $last_name, \r\n";
    $emailBody .= "we have received your message our team will get back to you as soon as possible!\r\n";
    $emailSubject = 'Coneybeare Sustainability Catalog Support';
    $headers = "From: $emailFrom\r\n";
    $success = mail($emailTo, $emailSubject, $emailBody, $headers);
    if ($success) {
        echo "<h3>Hi";
        if (!empty($first_name)) {
            echo " $first_name";
        }
        echo "  we've received your message, and someone from our team will be in touch soon!<h3>";
    } else {
        echo "<h3>Oops.. Something went wrong";
    }
}
