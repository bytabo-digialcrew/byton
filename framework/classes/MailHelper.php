<?php
class MailHelper {


    protected $transport;
    protected $mailer;


    public function __construct() {


        // Create the Transport
        $this->transport = Swift_MailTransport::newInstance();

// Create the Mailer using your created Transport
        $this->mailer = Swift_Mailer::newInstance($this->transport);
    }
    /*
     * Expects:
     * to: array('receiver@domain.org', 'other@domain.org' => 'A name')
     * from: array('john@doe.com' => 'John Doe')
     */
    public function send_mail($to, $subject, $headline="", $text, $from, $template = "") {
        
        
        //get text in template
        if(empty($template)) {
            $template = "email";
        }
        $body = file_get_contents("../framework/templates/".$template.".php");
        $body = str_replace("###PATH###", siteUrl, $body);
        $body = str_replace("###HEADLINE###", $headline, $body);
        $body = str_replace("###TEXT###", $text, $body);



        
        // Create a message
        $message = Swift_Message::newInstance($subject)
            ->setFrom($from)
            ->setTo($to);

        $message->setBody($body,'text/html');
        
        
        
        

        if ($this->mailer->send($message)) {
            return true;
        }
        else {
            return false;
        }
    }

    public function send_test_mail($to) {
        return $this->send_mail($to, "Testmail", "Das ist eine Testmail. ");
    }



}