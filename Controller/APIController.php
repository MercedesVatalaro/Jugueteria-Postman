<?php
require_once "./View/APIView.php";
require_once "./Model/ProductModel.php";

abstract class APIController {
    protected $model; 

    private $data; 

    public function __construct() {
        $this->view = new APIView();
        $this->data = file_get_contents("php://input"); 
    }

    function getData(){ 
        return json_decode($this->data); 
    }  
}
