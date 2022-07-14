<?php
     include('../Controller/Con_subtipo.php');
     $con_tipo = new Con_subtipo();
    if(isset($_GET['idtipo']))
    {
        $Array_subtipo = $con_tipo->getsubtipo($_GET['idtipo']);
        viewsubtipos($Array_subtipo);

    }else{
        //por defecto mostrar todos los ingresos
        //el 1 por defecto es el de ingresos
        $Array_subtipo = $con_tipo->getsubtipo(1);
        viewsubtipos($Array_subtipo);
    }

    function viewsubtipos($Array_subtipo)
    {
        while($obj = $Array_subtipo->fetch())
        {
            ?>
                <option value="<?php  echo $obj["IdSubtipo"] ?>"><?php echo $obj["NameSubtipo"];?></option>
            <?php
        }
    }
?>