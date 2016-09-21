<?php

if(debugMode) {

    ini_set("display_errors", "1");
    error_reporting(E_ALL);

    //Create built folder
    if(!is_dir("built")) {
        mkdir("built", 0755, true);
    }


    //Parse Less
    $options = array( 'compress'=>true );
    $parser = new Less_Parser( $options );
    $output = "";
    foreach ($cssLibs as $lib) {
        $parser->parseFile( '../assets/'.$lib );
        $output .= $parser->getCss();
    }
    file_put_contents("built/main.min.css", $output);


    //Minify JS
    $output = "";
    foreach ($jsLibs as $lib) {
        $output .= \JShrink\Minifier::minify(file_get_contents('../assets/'.$lib));
    }
    file_put_contents('built/main.min.js', $output);
}