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

        .contendor{
            display: flex; 
            flex-direction: row; 
            justify-content:center; 
            align-items:center; 
            background-color: #D4F4DB; 
            height: 100vh;
        }

        .contendor-form{
            border-radius: 40px; 
            display: flex; 
            flex-direction: column; 
            justify-content:center; 
            align-items:center; 
            padding: 10px 5px; 
            background-color:#2B2729; 
            width:40%; 
            height:auto;
            padding: 20px 20px 50px 20px;
        }

        #formulario{
            display: flex; 
            flex-direction: column; 
            justify-content:center; 
            align-items:center; 
            color:white;
        }

        .contendor-form a{
            color:#D4F4DB;
        }

        .pregunta{
            margin-top:70px;
            margin-bottom:10px;
            color:white;
        }

        h1{
            margin-bottom:70px;
        }

        #nombre, #contrasenia, #contrasenia2{
            margin-bottom:15px;
        }

        .caja {
            border: 1px solid;
            border-radius: 5px;
            height: 20px;
            padding: 5px;
            padding-inline-start: 15px;
            padding-inline-end: 15px;
            width:70%
        }

        form input[type="submit"] {
            margin-top:30px;
            background-color: #D4F4DB;
            border-radius: 30px;
            width: 150px;
            height: 32px;
            font-weight: bold;
            border: 0;
            color: #2B2729;
            cursor: pointer;
        }

    </style>
</head>
<body>
    <div class="contenedor-principal">
    <?php require_once HEADER; ?>

        <div class="contendor">
            <div class="contendor-form">
                <form method="POST" action="index.php?c=Usuarios&f=new" id="formulario">

                    <h1>REGISTRO DE USUARIO</h1>
                    
                    <label><b>Nombre de usuario: </b></label>
                    <input class="caja" type="text" name="nombre" id="nombre" placeholder="Escribe tu nombre de usuario.">

                    <label><b>Contraseña: </b></label>
                    <input class="caja" type="password" name="contrasenia" id="contrasenia" placeholder="Escribe tu contraseña.">

                    <label><b>Confirma tu contraseña: </b></label>
                    <input class="caja" type="password" name="contrasenia2" id="contrasenia2" placeholder="Confirma tu contraseña.">

                    <label><b>Rol: </b></label>
                    <div id="contenedorRadios">
                        <div id="divRadio1">
                            <input type="radio" id="radio1" name="radio" value="Cliente" class="radio">
                            <label>Cliente</label>
                        </div>
                        <div id="divRadio2">
                            <input type="radio" id="radio2" name="radio" value="Administrador" class="radio">
                            <label>Administrador</label>
                        </div>
                        <div id="divRadio3">
                            <input type="radio" id="radio3" name="radio" value="Marketing" class="radio">
                            <label>Marketing</label>
                        </div>
                    </div>
                    
                    <input type="submit" name="registrar" id="registrar"  value="REGISTRARSE">

                </form>
                <div class="pregunta">¿Ya tienes una cuenta?</div>
                <a href="index.php?c=Usuarios&f=view_login" name="loguearse" id="loguearse">INICIA SESION AQUI</a>
            </div>
        </div>

    <?php require_once FOOTER; ?>
    </div>
    <script type="text/javascript">

        var formulario = document.getElementById("formulario").addEventListener('submit', validar);

        function validar(event) {

            var valido = true;
            
            var nombre = document.getElementById("nombre");
            var contrasenia = document.getElementById("contrasenia"); 
            var contrasenia2 = document.getElementById("contrasenia2"); 
            var radio = document.getElementsByName("radio");

            // validación campo nombre
            if (nombre.value === '') {
                valido = false;
                alert("El campo 'nombre de usuario' es requerido.");
            } else if (nombre.value.length > 50) {
                valido = false;
                alert("Ingrese máximo 50 caracteres en el campo 'nombre'.");
            }

            // validación campo contrasenia
            if (contrasenia.value === '') {
                valido = false;
                alert("El campo 'contraseña' es requerido.");
            } else if (contrasenia.value.length > 16) {
                valido = false;
                alert("Ingrese máximo 16 caracteres en el campo 'contraseña'.");
            }

            // validación campo confirmar contrasenia
            if (contrasenia2.value === '') {
                valido = false;
                alert("El campo 'confirmar contraseña' es requerido.");
            } else if (contrasenia2.value.length > 16) {
                valido = false;
                alert("Ingrese máximo 16 caracteres en el campo 'confirmar contraseña'.");
            } else if (contrasenia.value != contrasenia2.value) {
                valido = false;
                alert("Las contraseñas deben coincidir.");
            }

            // validación campo rol
            if (!radio[0].checked && !radio[1].checked && !radio[2].checked) {
                valido = false;
                alert("Especifique el rol de usuario.");
            }            

            if (!valido) {
                event.preventDefault();
            }
        }

    </script>

</body>
</html>