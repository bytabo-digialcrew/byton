<?php

//enqueue script/style

//echo form -> helper classes



/* Page Operations */
function get_the_slug() {
    global $path;
    return $path;
}

function the_slug() {
    echo get_the_slug();
}

function the_body_class() {
    global $path;
    if($path == "index") {
        echo "start index";
    }
    else {
        echo str_replace("-", " ", $path);
    }
}


/* Backend Operations */
function get_controller_name() {
    global $path;
    $path = dashesToCamelCase($path);
    return ucfirst($path)."Controller";
}
function dashesToCamelCase($string) {
    return preg_replace_callback("/-[a-zA-Z]/", 'removeDashAndCapitalize', $string);
}
function removeDashAndCapitalize($matches) {
    return strtoupper($matches[0][1]);
}





function p($obj) {
    echo "<pre>";
    print_r($obj);
    echo "</pre>";
}

function curlUrl($url) {
	$ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $output = curl_exec($ch); 
    curl_close($ch);
    return $output;
}


/* String Operations */
function startsWith($haystack, $needle) {
    // search backwards starting from haystack length characters from the end
    return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== false;
}
function endsWith($haystack, $needle) {
    // search forward starting from end minus needle length characters
    return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== false);
}


/* Frontend Operations */
function put_into_responsive_grid($array, $cols = 3, $breakpoint = 'md') {
    $return_string = '';
    if (!empty($array)) {
        $add_row = true;
        $first = true;
        $counter = 0;
        $cols_width = 12 / $cols;
        foreach ($array as $a) :

            if ($add_row) {
                if ($first) {
                    $first = false;
                } else {
                    $return_string .= "</div>";
                }
                $return_string .= "<div class=\"row\">";
            }
            $return_string .= "<div class=\"col-" . $breakpoint . "-" . $cols_width . "\">";
            $return_string .= $a;
            $return_string .= "</div>";
            if (++$counter % $cols == 0)
                $add_row = true;
            else
                $add_row = false;
        endforeach;
        $return_string .= "</div>";
    }
    return $return_string;
}

function is_front_page() {
    if(get_the_slug() == "index") {
        return true;
    }
    else {
        return false;
    }
}

//call must be e.g. get_template_part("start/welcome");
function get_template_part($part) {
    return file_get_contents("../views/parts/".$part.".php");
}
function the_template_part($part) {
    echo get_template_part($part);
}