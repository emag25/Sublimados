<?php 
    session_start();
    try{
        unset($_SESSION['rol']);      
    }catch(Exception $e){
        echo $e;
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INICIO DE SESION</title> 
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body{
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>

<?php require_once HEADER; ?>

    <div style="display: flex; flex-direction: row; justify-content:center; align-items:center; background-color: #D4F4DB; height: 100vh;">
        <div style="display: flex; flex-direction: column; justify-content:center; align-items:center; padding: 10px 5px; background-color: white; width:40%; height:50%;">
            <form method="POST" action="index.php?c=Usuarios&f=iniciar" style="display: flex; flex-direction: column; justify-content:center; align-items:center; padding: 10px 5px;">

                <h1>INICIO DE SESION</h1>
                
                <label><b>Nombre de usuario: </b></label>
                <input type="text" name="nombre" id="nombre" placeholder="Escribe tu nombre de usuario.">

                <label><b>Contraseña: </b></label>
                <input type="password" name="contrasenia" id="contrasenia" placeholder="Escribe tu contraseña.">

                <input type="submit" name="iniciar" id="iniciar" value="INICIAR SESION">           

            </form>
            <a href="index.php?c=Usuarios&f=view_new" name="registrar" id="registrar">REGISTRATE AQUI</a>
        </div>
    </div>

<?php require_once FOOTER; ?>

</body>
</html>