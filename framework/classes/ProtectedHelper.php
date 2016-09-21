<?php
class ProtectedHelper {
    public function __construct() {

    }

    public function protect() {

        $loggedInStatus = true;
        $_SESSION['logged_in'] = false;

        if(passwordProtected) {

            /*
             * Password Handling
             */
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['logged_in'] = false;

            if(isset($_POST['password'])) {
                global $passwordsProtection;
                if(in_array($_POST['password'], $passwordsProtection)) {
                    $_SESSION['logged_in'] = true;
                }
                else {
                    $loggedInStatus = false;
                }
            }

            /*
             * Set Session
             */
            if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
                $templatePath = "../framework/templates/";
                require_once($templatePath."header.php");
                require_once($templatePath."login.php");
                require_once($templatePath."footer.php");
                exit();
            }
        }
    }
}