<?php


class UserModel
{

    private $db;

    function __construct()
    {

        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_jugueteria;charset=utf8', 'root', '');
    }

    function getUser($user)
    {

        //obtengo el usuario de la base de datos

        $query = $this->db->prepare('SELECT * FROM usuarios WHERE email= ?');
        $query->execute([$user]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
}
