<?php
    class Login{
        private $user;
        private $password;
        private $dbconn;
        function __construct()
        {
            include "conexion.php";
            $this->dbconn = new Conectar();
        }
        function login($user,$password)
        {

            $sql = $this->dbconn->connect()->prepare("select * from usuario   ");
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            while($obj = $sql->fetch())//verifica si hay datos
            {
                if($obj["CedulaUsuario"] == $user && $obj["passwordUsuario"] == $password)
                {
                    session_start();
                    $_SESSION['user'] = $obj["NombreApellidoUsuario"];
                    $_SESSION['iduser'] = $obj["IdUsuario"]; 
                    return true;
                }  
            }
            return  false;
        }
    }
    
    
?>
