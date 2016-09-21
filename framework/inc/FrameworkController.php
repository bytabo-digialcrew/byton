<?php
class FrameworkController {


    private $title;
    private $description;


    public function __construct() {
        $json = file_get_contents("../page-metatags.json");
        $json = json_decode($json);
        $slug = get_the_slug();


        //check password protection
        if(passwordProtected) {
            $ph = new ProtectedHelper();
            $ph->protect();
        }



        if(property_exists($json, $slug)) {
            $this->title = $json->$slug->title;
            $this->description = $json->$slug->description;
        }
        else {
            $this->title = defaultTitleTag;
            $this->description = defaultDescriptionTag;
        }
    }


    public function getTitle() {
        return $this->title;
    }
    public function getDescription() {
        return $this->description;
    }
}