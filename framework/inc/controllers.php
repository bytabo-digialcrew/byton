<?php

$ctrlName = get_controller_name();

require_once ("init-helperclasses.php");

/*Initialize PageController, if exists */
require_once ('FrameworkController.php');
if(file_exists('../ctrl/'.$ctrlName.'.php')) {
    require_once ('../ctrl/'.$ctrlName.'.php');
    $app = new $ctrlName();
}
else {
    $app = new FrameworkController();
}