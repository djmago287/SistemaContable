<?php
class Con_subtipo{
    private $dbconn;
    function __construct()
    {
        $this->dbconn = new Conectar();
    }
   
    function getsubtipo()
    {
        $sql = $this->dbconn->connect()->prepare("select * from subtipo ");
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        return $sql;
        exit();
    }
    //buscar por ahi del tipo
    function  getonesubtipo($IdSubtipo)
    {
        $sql = $this->dbconn->connect()->prepare("select * from subtipo where IdSubtipo=$IdSubtipo");
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        //me retorna lo que devuelve
        if($obj = $sql->fetch())
        {
            return $obj;
        }
        exit();
    }

}
?>