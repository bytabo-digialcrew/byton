<?php


require_once ('../framework/templates/header.php');

$pagePath = "../views/page-";


if(file_exists($pagePath.$path.'.php')) {
    require_once ($pagePath.$path.'.php');
}
else {
    require_once ($pagePath.'404.php');
}
require_once ('../framework/templates/footer.php');