<?php
class Con_subtipo{
    private $dbconn;
    function __construct()
    {
        include "conexion.php";
        $this->dbconn = new Conectar();
    }
   
    function getsubtipo($IdTipo)
    {
        $sql = $this->dbconn->connect()->prepare("select * from subtipo where IdTipo=$IdTipo");
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        return $sql;
        exit();
    }
}
?>