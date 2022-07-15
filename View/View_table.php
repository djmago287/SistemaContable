<?php


    if(isset($_GET['idtipo']))
    {
      
    }else{
        viewtransaccion();
    }

    //ver todas las transacciones 
    function viewtransaccion()
    {
        include('../Controller/conexion.php');
        include('../Controller/Con_transaccion.php');
        include('../Controller/Con_subtipo.php');
 
        $con_transaccion= new  Con_transaccion();
        $Array_transaccion = $con_transaccion->gettransaccion();
        $con_subtipo =  new Con_subtipo();
       
        //variables para el total ingredo y egreso
        $totalingreso=0;
        $totalgastos=0;
        ?>
        <table>
            <tr class="table_encabezado">
                <th >Fecha</th>
                <th>Subtipo</th>
                <th>Descripcion</th>
                <th>Ingresos</th>
                <th>Gastos</th>
            </tr>   
            <?php
                //mostrar tabla
                  for ($i=0; $i <count($Array_transaccion) ; $i++) 
                  {
                    //verificar si el valor es ingresos o gastos
                    $subtipo = $con_subtipo->getonesubtipo($Array_transaccion[$i]['IdSubtipo']);
                    ?>
                    <tr class="table_contenido">
                        <td ><?php echo $Array_transaccion[$i]['FechaTransaccion']?></td>
                        <td ><?php echo $subtipo['NameSubtipo']?></td>
                        <td>
                            <?php echo $Array_transaccion[$i]['DescripcionTransaccion']?>
                            <section >
                                <p>Esto es el popovers adsasdsada como todas las cosas</p>
                            </section>
                        </td>
                        <?php
                            //Verificar si es 1 es ingreso o egreso
                            if ($subtipo['IdTipo']==1) {
                                $totalingreso+=$Array_transaccion[$i]['ValorTransaccion'];
                                ?>
                                    <td><?php echo $Array_transaccion[$i]['ValorTransaccion']?></td>
                                    <td></td>
                                <?PHP
                            }else{
                                $totalgastos+=$Array_transaccion[$i]['ValorTransaccion'];
                                ?>
                                    <td></td>
                                    <td ><?php echo $Array_transaccion[$i]['ValorTransaccion']?></td>
                                <?PHP
                            }
                        ?>
                    </tr>
                    <?php
                     // echo $obj["DescripcionTransaccion"].$obj["FechaTransaccion"];
                  }
            ?>
        </table>
        <?php
            //obteniendo los todos subtipos          
            $Array_subtipo=$con_subtipo->getsubtipo();
            $Arraytotales_subtipos = calcular_totalSubtipos($Array_subtipo,$Array_transaccion);
            
            //muestra por botones los totales de subtipo   
            vista_totaleSubtipos($Arraytotales_subtipos);   
        ?>
        <h1><?php echo number_format($totalingreso,2) ."$".$totalgastos ?></h1>
    
        <?php

    }    
    function calcular_totalSubtipos($Array_subtipo,$Array_transaccion,)
    {
        include('../Controller/Con_tipo.php');
        $Arraytotales_subtipos = [];
        $con_tipo = new Con_tipo();
        while($obj = $Array_subtipo->fetch())
        {
            $nametipo_tmp =$con_tipo->getOneTipo($obj['IdTipo']);
            $total_tmp = 0; //total temporal
             for ($i=0; $i < count($Array_transaccion) ; $i++)
             {
                if ($obj['IdSubtipo']== $Array_transaccion[$i]['IdSubtipo']) {
                    
                    //sumado los valores por cada tipo
                    $total_tmp += $Array_transaccion[$i]['ValorTransaccion'];
                }
            
             }
             //guardar los datos en un array
            $Arraytotales_subtipos[]= array (
                'IdSubtipo'=> $obj['IdSubtipo'],
                'NameSubtipo'=>$obj['NameSubtipo'],
                'Valortotal'=>$total_tmp,
                'Tipo'=>$nametipo_tmp,
            );
        }
      //  print_r(($Arraytotales_subtipos[1]['Tipo']['NameTipo']));
        return $Arraytotales_subtipos;
    }
    function vista_totaleSubtipos($Arraytotales_subtipos)
    {
         //mostrar todos los totales de los subtipos

         for ($i=0; $i < count($Arraytotales_subtipos) ; $i++) { 
            ?>
            <button 
                class="box_Subtipo" 
                id="<?php echo $Arraytotales_subtipos[$i]['Tipo']['NameTipo']?>"
                >
                <p class="txt_nameSubtipo">
                    <?php echo $Arraytotales_subtipos[$i]["NameSubtipo"];?>
                </p>
                <p class="txt_totalSubtipo">
                <?php echo sprintf('%.2f',$Arraytotales_subtipos[$i]["Valortotal"])?>
   
                </p>
            </button>
            <?php
        }
        //print_r($arraytotales_subtipos[0]["NameSubtipo"])
    }
      
?>
