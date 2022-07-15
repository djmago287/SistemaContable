<?php
//insertar datos de tranasacion
    include('../Controller/conexion.php');
    include('../Controller/Con_transaccion.php');
    session_start();
    $transaccion = new  Con_transaccion();
    $transaccion->settransaccion($_POST['descripcion'],$_POST['valor'],$_SESSION['iduser'],$_POST['subtipo'],$_POST['fechaactual']);
    
?>