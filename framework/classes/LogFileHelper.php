<?php
class LogFileHelper {
    public function log($text) {
        $path = "../framework/";
        $logFile = fopen($path."logs.txt", "a") or die("Unable to open file!");
        fwrite($logFile, date('l jS \of F Y h:i:s A').": ".$text."\n");
        fclose($logFile);
    }
}