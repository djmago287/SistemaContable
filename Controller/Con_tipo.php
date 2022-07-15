<?php
class Con_tipo{
    private $dbconn;
    function __construct()
    {
        
        $this->dbconn = new Conectar();
    }
    function getTipo()
    {
        $array_tipo=[];
        $sql = $this->dbconn->connect()->prepare('select * from tipo');
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        while ($obj = $sql->fetch()) {
            $array_tipo[] = $obj;
        }
        return $array_tipo;
        exit();
    }
    function getOneTipo($IdTipo){
        
        $sql = $this->dbconn->connect()->prepare("select * from tipo where IdTipo = $IdTipo ");
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        if($obj = $sql->fetch())
        {
            return $obj;
        }
        exit();
    }
}
?>