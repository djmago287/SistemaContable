<?php


    if(isset($_GET['idtipo']))
    {
      
    }else{
        viewtransaccion();
    }

    //ver todas las transacciones 
    function viewtransaccion()
    {
        include('../Controller/Con_transaccion.php');
        $con_transaccion= new  Con_transaccion();
        $Array_transaccion = $con_transaccion->gettransaccion();
        ?>
        <table>
            <tr class="table_encabezado">
                <th >Fecha</th>
                <th>Subtipo</th>
                <th>Descripcion</th>
                <th>Valor</th>
            </tr>   
            <?php
                  while($obj = $Array_transaccion->fetch())
                  {
                    ?>
                    <tr class="table_contenido">
                        <td ><?php echo $obj['FechaTransaccion']?></td>
                        <td ><?php echo $obj['IdSubtipo']?></td>
                        <td>
                            <?php echo $obj['DescripcionTransaccion']?>
                            <section >
                                <p>Esto es el popovers</p>
                            </section>
                        </td>
                        <td ><?php echo $obj['ValorTransaccion']?></td>
                    </tr>
                    <?php
                     // echo $obj["DescripcionTransaccion"].$obj["FechaTransaccion"];
                  }
             
            ?>
        </table>
        <?php
    }    
      
?>
