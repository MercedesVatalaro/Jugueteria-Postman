<?php
require_once "./helpers/AuthApiHelper.php";
require_once "./Controller/APIController.php";



class ProductApiController extends APIController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new ProductModel();
    }


    public function getProducts()
    {
        /***************************************************************************************************
        Ordenamiento y filtro
         ******************************************************************************************************/
        $sort = '';
        $column = '';
        $offer = '';

        if (
            key_exists('sort', $_GET) 
        ) {
            $sort = $_GET['sort'];

            if (
                key_exists('order', $_GET) && !empty($_GET['order']) == 'desc' || !empty($_GET['order']) == 'asc' || !empty($_GET['order']) == 'DESC'
                || !empty($_GET['order']) == 'ASC'
            ) {
                $sort = $sort . ' ' . $_GET['order'];

                $sort = 'ORDER BY ' . $sort;
            } else {
                $sort = 'ORDER BY  id';
            }
        } 


        if (key_exists('column', $_GET)) {

            $column = $_GET['column'] ?? '*';
        }

        if (key_exists('offer', $_GET)) {

            $offer = $_GET['offer'] ?? '*';
        }
        
        try{
        if ($sort ) {

            $products = $this->model->getProductsOrder($sort);
            $this->view->response($products, 200);

        } else if ($column)  {

            $products = $this->model->getProductsFilter($column);
            $this->view->response($products, 200);

        } else if ($offer) {

            $products = $this->model->getProductsOffer($offer);
            $this->view->response($products, 200);
        }
    } catch (PDOException $Exception) {

        return $this->view->response("Verifique las opciones ingresadas", 404);
    }
  
    

        /*******************************************************************************************************
        Paginación y limite
         ******************************************************************************************************
         */
        $startAt = '';
        $endAt = '';
        if (key_exists('startAt', $_GET) && key_exists('endAt', $_GET)) {
            $startAt = $_GET['startAt'];
            $endAt = $_GET['endAt'];
            $cant= 4;
            $endAt = ($startAt - 1) * $cant;
        }
      
        if (($startAt) && ($endAt)) {
            $products = $this->model->getProductsLimit($startAt, $endAt);
            $this->view->response($products, 200);
        }
   

        if (!isset($_GET['sort']) && !isset($_GET['order']) && !isset($_GET['column']) && !isset($_GET['offer']) && !isset($_GET['startAt']) && !isset($_GET['endAt'])) {

            $products = $this->model->getProducts();
            $this->view->response($products, 200);
        }
    }



    function getProduct($params = [])
    {
        $id = $params[':ID'];
        if (key_exists(":COLS", $params)) {
            $cols = $params[":COLS"];
        } else {
            $cols = "*";
        }

        $product = $this->model->productsById($id, $cols);
        if ($product) {
            $this->view->response($product, 200);
        } else {
            $this->view->response("El producto con el id={$id} no existe", 404);
        }
    }

    function createProduct($params = null)
    {
        $data = $this->getData();

        if (empty($data->nombre) || empty($data->descripcion) || empty($data->precio) || empty($data->id_categoria)) {
            $this->view->response("Complete los datos", 400);
        } else {
            $id = $this->model->insertProduct($data->nombre, $data->descripcion, $data->precio, $data->id_categoria);
        }
        if ($id != 0) {
            $this->view->response("El producto se creo con el Id= $id", 201);
        } else {
            $this->view->response("El producto no pudo ser insertado", 500);
        }
    }


    function updateProduct($params = null)
    {
        $id = $params[':ID'];
        $data = $this->getData();
        if (empty($data->nombre) || empty($data->descripcion) || empty($data->precio) || empty($data->id_categoria)) {
            $this->view->response("Complete los datos", 400);
        } else {
            $this->model->updateProductsFromDB($id, $data->nombre, $data->descripcion, $data->precio, $data->id_categoria);
            $data = $this->model->productsById($id);
            $this->view->response("El producto se actualizo correctamente", 200);
        }
    }
    function deleteProduct($params = null)
    {
        $id = $params[":ID"];
        $product = $this->model->getProduct($id);

        if ($product) {
            $this->model->deleteProductsFromDB($id);
            return $this->view->response("El producto con el id=$id fue borrado", 200);
        } else {
            return $this->view->response("El producto con el id=$id no existe", 404);
        }
    }
}
