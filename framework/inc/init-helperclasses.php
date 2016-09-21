<?php



//Helperclasses
/* Initialize Helper Classes */
$helperClassesPath = docroot.'/../framework/classes';
$helperClasses = array_slice(scandir($helperClassesPath), 2);
foreach($helperClasses as $helperClass) {
    $class = $helperClassesPath."/".$helperClass;
    require_once ($class);
}