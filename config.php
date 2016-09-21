<?php

define("siteUrl", "http://example.com");
define("docroot", $_SERVER['DOCUMENT_ROOT']);
define("defaultTitleTag", "default");
define("defaultDescriptionTag", "default");
define("passwordProtected", false);

if($_SERVER['HTTP_HOST'] == "localhost") {
    define("debugMode", true);
}
else {
    define("debugMode", false);
}


global $enqueuedScripts, $enqueuedStyles, $passwordsProtection;

//users for password protection
$passwordsProtection = array(
    "password",
);

//Compress Libs
$jsLibs = array(
    "components/jquery/dist/jquery.min.js",
    "components/bootstrap/dist/js/bootstrap.min.js",
    "components/angular/angular.min.js",
    //"components/moment/moment.min.js",
    //"components/lodash/dist/lodash.min.js",
    "js/angular/kontaktCtrl.js",
    "js/script.js",
);
$cssLibs = array(
    "less/base.less"
);



//Assets to load in html
$enqueuedScripts = array(
    "/built/main.min.js"
);
$enqueuedStyles = array(
    "/built/main.min.css"
);