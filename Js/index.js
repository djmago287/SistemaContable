function escojer_tipo(tipo)
{
    console.log(tipo);
   setajax('./View/View_table.php?idtipo='+tipo,'.boxtable')
}

function setTransaccion()
{
    var txtdate_present = document.getElementById('date_present').innerHTML;
    var txtsubtipo = $("#txtsubtipo").val();
    var txtvalor = $("#txtvalor").val();
    var txtdescripcion = $("#txtdescripcion").val();
    var formdata = new FormData();
    formdata.append('fechaactual',txtdate_present);
    formdata.append('subtipo',txtsubtipo);
    formdata.append('valor',txtvalor);
    formdata.append('descripcion',txtdescripcion);
    //enviar datos
    ajax(formdata ,'View/View_Transaccion.php');
    //actualizar la table
    setTimeout(() => {
        setajax('./View/View_table.php','.boxtable');fg
    }, 1000);
   
    console.log(txtdate_present + txtsubtipo + txtvalor+txtdescripcion);
}
function getdatepresent()
{
    //optener la fecha actual
    var date = new Date();
    document.getElementById('date_present').innerHTML = date.toLocaleDateString();
 
}


getdatepresent();
setajax('./View/View_table.php','.boxtable');//la tabla
setajax('./View/View_subtipo.php','.subtipo');//el subtipo las opciones de tipo
//funcion de ajax
function setajax(direccion,container)
{
    $.post(direccion,function(datos)
    {
        $(container).html(datos);
    })
}

function ajax(formdata,direccion)
{
    $.ajax({
        type:"POST",
        url:direccion,
        contentType:false,
        processData:false,
        data:formdata,
        success:function(r)
        {
            alert("INGRESO CORRECTO");
        }
    })
}