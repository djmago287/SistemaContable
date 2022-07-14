<?php
//insertar datos de tranasacion
    include('../Controller/Con_transaccion.php');
    $transaccion = new  Con_transaccion();
    $transaccion->settransaccion($_POST['descripcion'],'','','','','');
    
?>