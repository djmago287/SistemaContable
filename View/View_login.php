<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN SISTEMA CONTABLE</title>
</head>
<body>
    <form method="POST" >
        <h1>LOGIN</h1>
        <input type="text" name="txtuser">
        <input type="password" name="txtpassword">
        <input type="submit" value="Ingresar" name="btnIngresar">
    </form>
</body>
</html>
<?php
    include('../Controller/Con_login.php');
    $login = new Login();
    if (isset($_POST['btnIngresar'])) {
        echo '<script>alert("holamundo")</script>';
        if( $login->login($_POST['txtuser'],$_POST['txtpassword']) == true )
        {
            header('Location:../index.php');
        }else{
           echo "incorrecto";
        }
    }
    
?>