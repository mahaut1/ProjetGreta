<?php
class Photos{
protected $id_photo;
protected $url_photo;
protected $is_main_photo = [
    "oui"=>1,
    "non"=>0
];
protected $id_annonce;
protected $legende;

public function __construct($legende, $url_photo){
    $this->legende=$legende;
    $this->url_photo=$url_photo;
}

public function setLegende($legende){
    $this->legende=$legende;
}

public function getLegende(){
    return $this->legende;
}

public function setUrlPhoto($url_photo){
    
}

}