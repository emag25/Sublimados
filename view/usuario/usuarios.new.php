<?php 
    if(!isset($_SESSION)){ 
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRO DE USUARIO</title>
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
        <div style="display: flex; flex-direction: column; justify-content:center; align-items:center; padding: 10px 5px; background-color:  white; width:40%; height:50%;">
            <form method="POST" action="index.php?c=Usuarios&f=new" style="display: flex; flex-direction: column; justify-content:center; align-items:center; padding: 10px 5px;">

                <h1>REGISTRO DE USUARIO</h1>
                
                <label><b>Nombre de usuario: </b></label>
                <input type="text" name="nombre" id="nombre" placeholder="Escribe tu nombre de usuario.">

                <label><b>Contraseña: </b></label>
                <input type="password" name="contrasenia" id="contrasenia" placeholder="Escribe tu contraseña.">

                <label><b>Confirma tu contraseña: </b></label>
                <input type="password" name="contrasenia2" id="contrasenia2" placeholder="Escribe tu contraseña.">

                <label><b>Rol: </b><span>*</span></label>
                <div id="contenedorRadios">
                    <div id="divRadio1">
                        <input type="radio" id="radio1" name="radio" value="Cliente" class="radio">
                        <label>Cliente</label>
                    </div>
                    <div id="divRadio2">
                        <input type="radio" id="radio2" name="radio" value="Administrador" class="radio">
                        <label>Administrador</label>
                    </div>
                    <div id="divRadio2">
                        <input type="radio" id="radio3" name="radio" value="Marketing" class="radio">
                        <label>Marketing</label>
                    </div>
                </div>
                
                <input type="submit" name="registrar" id="registrar"  value="REGISTRARSE">

            </form>
            <a href="index.php?c=Usuarios&f=view_login" name="registrar" id="registrar">INICIA SESION AQUI</a>
        </div>
    </div>

<?php require_once FOOTER; ?>

</body>
</html>