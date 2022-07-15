<?php
class Con_transaccion{
    private $dbconn;
    function __construct()
    {

        $this->dbconn= new Conectar();
    }
    function gettransaccion()
    {
        $arrayTransacciones=[];
        $sql = $this->dbconn->connect()->prepare("select * from transaccion");
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        while ($obj = $sql->fetch()) {
            $arrayTransacciones[]=$obj;
        }
        return $arrayTransacciones;
        exit();
    }
    function settransaccion($descripciontransacion, $ValorTransaccion, $IdUsuario,$IdSubtipo,$FechaTransaccion)
    {
        $sql = $this->dbconn->connect()->prepare("INSERT INTO transaccion(DescripcionTransaccion,ValorTransaccion,IdUsuario,IdSubtipo,FechaTransaccion) values('$descripciontransacion','$ValorTransaccion','$IdUsuario','$IdSubtipo','$FechaTransaccion')");
        $sql->execute();
        exit();
    }
    
}

?>