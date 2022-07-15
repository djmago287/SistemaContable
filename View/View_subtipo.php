<?php
     include('../Controller/conexion.php');
     include('../Controller/Con_subtipo.php');
     include('../Controller/Con_tipo.php');

        
        //por defecto mostrar todos los ingresos
        //el 1 por defecto es el de ingresos
        $con_subtipo = new Con_subtipo();
        $con_tipo = new Con_tipo();
        $Array_subtipo = $con_subtipo->getsubtipo();
        $Array_tipo = $con_tipo->getTipo();


        viewsubtipos($Array_subtipo,$Array_tipo);
    

    function viewsubtipos($Array_subtipo,$Array_tipo)
    {
        $array_alltipo=[];
        while ($obj_subtipo = $Array_subtipo->fetch()) {
            $array_alltipo[]=$obj_subtipo;
        }
        $counttipo = 0;
        while ($counttipo < count($Array_tipo) ) {
            ?>
                <optgroup
                    label="<?php echo $Array_tipo[$counttipo]['NameTipo']?>"
                >   
                <?php
                    for ($i=0; $i <count($array_alltipo) ; $i++) { 
                        if ($Array_tipo[$counttipo]['IdTipo'] == $array_alltipo[$i]['IdTipo']) {
                            ?>
                                <option value="<?php echo $array_alltipo[$i]["IdSubtipo"] ?>">
                                    <?php echo $array_alltipo[$i]["NameSubtipo"];?>
                                </option>
                            <?php
                        }
                    }
                ?>
                
                <?php
                    $counttipo++;
                ?>
                </optgroup>
            <?php
        }
        
        
    }
?>