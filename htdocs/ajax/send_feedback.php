<?php


function send_feedback($email) {

    $abs = "info@krone-escherndorf.de";


    $subj = "Ihre Reservierungsanfrage beim Gasthaus Zabelstein";

    $text = "Lieber Gast,

herzlichen Dank, wir haben Ihre Reservierungsanfrage bekommen. Wir werden diese zeitnah bearbeiten und Ihnen schnellstmöglich eine Rückmeldung zu Ihrer Terminanfrage geben.

Bitte beachten Sie, dass Ihre Reservierung erst gültig ist, wenn wir Ihnen diese in einer zweiten Mail bestätigen.

Herzliche Grüße aus Escherndorf,

Ihr Gasthaus zur Krone";




    $headers = 'From: Gasthaus zur Krone <'.$abs.'>' . "\r\n";
    mail( $email, $subj, $text, $headers );


}