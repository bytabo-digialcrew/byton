<?php
class ImageHelper {

    protected $keys;
    private $count;

    public function __construct() {
        $this->keys = array(
            "lyvqwDX3ZIoNwIYDj-BRxFM9vAJzQazz",
            "qyh0dv6VoUDy7RqIGQ224WIuWQ_gLzZn",
            "Om1QBMykhG7klo-Ur10pQC0ZjbeqaRNW",
            "cyMXktmc5QpufItx1rft5AWJ4yXjltZ7",
            "a3mPz6InhXeAZzbcqK971uN5E_UlymCT",
            "aedV092zam_eHV2Am3lmqkbM0U5J-RiO",
            "5aH3ycq26-eF6Et1rNiuo02z4r6uT12D",
            "A5NOZlDSRkBmGcodVNmSuFHQckmClV09",
            "zdlBy5jsoFcRuYg22fYRcRbjewhlJyzM",
        );

        $keyToUse = $this->keys[rand (0, 8)];

        \Tinify\setKey($keyToUse);
        try {
            \Tinify\setKey($keyToUse);
            \Tinify\validate();
            $this->count = \Tinify\compressionCount();
        } catch(\Tinify\Exception $e) {
            // Validation of API key failed.
        }
    }
    public function compressImages($folder = "") {

        if(empty($folder)) {
            $folder = docroot."/img";
        }

        $files = scandir($folder);
        foreach($files as $key => $value){
            $path = realpath($folder.DIRECTORY_SEPARATOR.$value);
            if(!is_dir($path)) {
                if($this->endsWith($path, ".jpg") || $this->endsWith($path, ".png") || $this->endsWith($path, ".gif")) {
                    $results[] = $path;
                }
            } else if($value != "." && $value != "..") {
                $this->getDirContents($path, $results);
            }
        }

        $return = array();
        foreach ($results as $key => $res) {
            $source = \Tinify\fromFile($res);
            $source->toFile($res);
            $return[] = $key.": ".$res."<br>";
        }

        return $return;
    }
    private function getDirContents($dir, &$results = array()){
        $files = scandir($dir);
        foreach($files as $key => $value){
            $path = realpath($dir.DIRECTORY_SEPARATOR.$value);
            if(!is_dir($path)) {
                $results[] = $path;
            } else if($value != "." && $value != "..") {
                $this->getDirContents($path, $results);
                $results[] = $path;
            }
        }
        return $results;
    }
    private function endsWith($haystack, $needle) {
        return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== false);
    }
}