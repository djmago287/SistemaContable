<?php
    class Conectar{
        private $host;
        private $name;
        private $password;
        private $db;
        public function __construct()
        {
            //verificar si estoy trabajando localmenteo o por el servidor de cenepsi
            if ($_SERVER["SERVER_NAME"] == "cenepsi.com") {
                $this->host='';
                $this->name = '';
                $this->password = '';
                $this->db = '';
            }else{
                $this->host = 'localhost';
                $this->name = 'root';
                $this->password = '';
                $this->db = 'SistemaContable';
            }
        }

        function connect()
        {
            try {
                $conexion = new PDO("mysql:host=".$this->host.";dbname=".$this->db."",$this->name,$this->password);
                $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                return $conexion;
            } catch (PDOException $ex) {
                exit($ex->getMessage());
            }
        }
    }
    $conexion =  new Conectar();
?>