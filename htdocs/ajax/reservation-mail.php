<?php

require_once('send_feedback.php');

$data = json_decode(file_get_contents("php://input"));




$admin_email = "info@krone-escherndorf.de";
//$admin_email = "niklas@graphic-concepts.de";




send_feedback($data->mail);



$subj = "Reservierungsanfrage";

$text = "";
$text .= $data->name;
$text .= " mit der E-Mail Adresse ".$data->mail."\n";
$text .= " Telefonnummer: ".$data->tel."\n";
$text .= " will für ".$data->persons." Personen\n";
$text .= " am ".$data->date." um ".$data->time." reservieren. \n";
$text .= " Event: ".$data->event."\n";
$text .= " Wünsche / Anregungen: ".$data->text."\n";




$headers = 'From: Gasthaus Krone Internetseite <'.$admin_email.'>' . "\r\n";
if(mail( $admin_email, $subj, $text, $headers )) {
    echo 1;
}
else {
    echo 0;
}