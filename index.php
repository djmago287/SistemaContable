<?php
//VERIFICAR SI ESTA INICIADO LA SECCION
    session_start();
    if(!isset($_SESSION['user'])  )
    {
        header("Location: View/View_login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Contable</title>
    <link rel="stylesheet" type="text/css" href="style/index.css"/>
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
</head>
<body>
    <header class="header">
        <h1>SISTEMA CONTABLE CENEPSI</h1>
        <?php
            //obtener los tipos como lo que es ingresos y gastos
            include('Controller/Con_tipo.php');
            $con_tipo = new Con_tipo();
            $Array_tipo = $con_tipo->getTipo();
            while($obj = $Array_tipo->fetch())
            {
                ?>
                <button 
                    class="btntipo" 
                    onclick=escojer_tipo(<?php echo $obj["IdTipo"]?>) 
                >
                    <?php echo $obj["NameTipo"]?>
                </button>
                <?php
            }
        ?>
        <div id="date_present">
       
        </div>
        <?php
            echo $_SESSION['user'];
        ?>
    </header>
    <nav class="nav">
        <div class="formingresos">
            <select class="col subtipo" id="txtsubtipo" >
            </select>
            <input class="col" type="number" id="txtvalor" placeholder="Valor $ 0.00"/>
            <textarea class="col" id="txtdescripcion"></textarea>
            <button 
                class="col"
                onclick=setTransaccion()
            >
                Ingresar
            </button>
        </div>
        
    </nav>
    <!--la tabla de las transacciones-->
    <section class="boxtable">
    </section>
</body>
</html>
<script src="Js/index.js"></script>