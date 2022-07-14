<?php
class Con_transaccion{
    private $dbconn;
    function __construct()
    {
        include "conexion.php";
        $this->dbconn= new Conectar();
    }
    function gettransaccion()
    {
        $sql = $this->dbconn->connect()->prepare("select * from transaccion");
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        return $sql;
        exit();
    }
    function settransaccion($descripciontransacion, $ValorTransaccion, $IdUsuario,$IdUbicacion,$IdSubtipo,$FechaTransaccion)
    {
        $sql = $this->dbconn->connect()->prepare("INSERT INTO transaccion(DescripcionTransaccion,ValorTransaccion,IdUsuario,IdUbicacion,IdSubtipo,FechaTransaccion) values('$descripciontransacion','50.20',1,1,6,'10/02/2022')");
        $sql->execute();
        exit();

    }
}

?>