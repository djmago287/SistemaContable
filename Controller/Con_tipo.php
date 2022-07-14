<?php
class Con_tipo{
    private $dbconn;
    function __construct()
    {
        include "conexion.php";
        $this->dbconn = new Conectar();
    }
    function getTipo()
    {
        $sql = $this->dbconn->connect()->prepare('select * from tipo');
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        return $sql;
        exit();
    }
}
?>