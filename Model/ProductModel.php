<?php
class ProductModel
{

    private $db;
    function __construct()
    {

        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_jugueteria;charset=utf8', 'root', '');
    }

    function getProducts()

    {

        $query = $this->db->prepare("SELECT * FROM productos");

        try {
            $query->execute();
        } catch (PDOException $Exception) {

            return null;
        }
        $products = $query->fetchAll(PDO::FETCH_OBJ);

        return $products;
    }
    function getProductsOrder($sort = '*')
    {

        $query = $this->db->prepare("SELECT * FROM productos $sort");
        $query->execute();

        $products = $query->fetchAll(PDO::FETCH_OBJ);

        return $products;
    }

    function getProductsFilter($column)
    {

        $query = $this->db->prepare("SELECT $column FROM productos");


        $query->execute();


        $products = $query->fetchAll(PDO::FETCH_OBJ);

        return $products;
    }

    function getProductsOffer($offer)
    {

        $query = $this->db->prepare("SELECT $offer FROM productos WHERE ofertas= 'Especial navidad'");
        $query->execute();

        $products = $query->fetchAll(PDO::FETCH_OBJ);

        return $products;
    }

    function getProductsLimit($startAt, $endAt)
    {

        $query = $this->db->prepare("SELECT * FROM productos LIMIT $startAt, $endAt");
        $query->execute();

        $products = $query->fetchAll(PDO::FETCH_OBJ);

        return $products;
    }


    function productsById($id, $cols = '')
    {
        $query = $this->db->prepare("SELECT $cols FROM productos WHERE id= :id");
        try {
            $query->execute(['id' => $id]);
        } catch (PDOException $Exception) {
            return null;
        }
        $products = $query->fetch(PDO::FETCH_OBJ);
        return $products;
    }

    function insertProduct($nombreProducto, $descripcionProducto, $precioProducto, $categoriaProducto)
    {
        $query = $this->db->prepare('INSERT INTO productos (nombre, descripcion, precio, id_categoria) 
        VALUES (?, ?, ?,?)');
        $query->execute([$nombreProducto, $descripcionProducto, $precioProducto, $categoriaProducto]);

        return $this->db->lastInsertId();
    }

    function deleteProductsFromDB($id)
    {
        $query = $this->db->prepare("DELETE FROM productos WHERE id=?");
        $query->execute([$id]);
    }

    function updateProductsFromDB($id, $nombre, $descripcion, $precio, $id_categoria)
    {
        $query = $this->db->prepare("UPDATE productos SET nombre=?, descripcion=?, precio=?, id_categoria=?  WHERE id=?");
        $query->execute(array($nombre, $descripcion, $precio, $id_categoria, $id));
    }

    function getProduct($id)
    {

        $query = $this->db->prepare("SELECT a.*, b.* FROM productos a INNER JOIN categorias b ON a.id_categoria= b.id_categoria WHERE a.id= ?");
        $query->execute([$id]);
        $product = $query->fetchAll(PDO::FETCH_OBJ);
        return $product;
    }
}
