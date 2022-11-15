<?php
require_once "./View/APIView.php";
require_once "./Model/ProductModel.php";
require_once './helpers/AuthApiHelper.php';

abstract class APIController {
    protected $model; 

    private $data; 
    private $AuthHelper;
    public function __construct() {
        $this->view = new APIView();
        $this->data = file_get_contents("php://input"); 
        $this->AuthHelper= new AuthApiHelper();
    }

    function getData(){ 
        return json_decode($this->data); 
    }  
}
