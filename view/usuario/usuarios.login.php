<?php 
    session_start();
    try{
        unset($_SESSION['rol']);  
        unset($_SESSION['id']);   
        unset($_SESSION['nombre']);
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
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body{
            margin: 0;
            padding: 0;
        }

        .contendor{
            display: flex; 
            flex-direction: column; 
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

        #nombre{
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

        <div class="contendor" >   
            <?php                
            if (!empty($_SESSION['mensaje'])) {
                ?>
                <div style="margin-bottom:20px;" class="alert-<?php echo $_SESSION['color']; ?>">
                <i class='bx bx-<?php if ($_SESSION['color']=="rojo") { echo "x";} else{ echo "check";} ?>'></i>
                <?php echo $_SESSION['mensaje']; ?>  
                </div>
                <?php
                unset($_SESSION['mensaje']);
                unset($_SESSION['color']);
            }
            ?>     
            <div class="contendor-form" >                
                <form method="POST" action="index.php?c=Usuarios&f=iniciar" id="formulario" style="display: flex; flex-direction: column; justify-content:center; align-items:center; padding: 10px 5px;">

                    <h1>INICIO DE SESION</h1>                    
                    
                    <label><b>Nombre de usuario: </b></label>
                    <input class="caja" type="text" name="nombre" id="nombre" placeholder="Escribe tu nombre de usuario.">

                    <label><b>Contraseña: </b></label>
                    <input class="caja" type="password" name="contrasenia" id="contrasenia" placeholder="Escribe tu contraseña.">

                    <input type="submit" name="iniciar" id="iniciar" value="INICIAR SESION">           

                </form>
                <div class="pregunta">¿Aún no tienes una cuenta?</div>
                <a href="index.php?c=Usuarios&f=view_new" name="registrar" id="registrar">REGISTRATE AQUI</a>
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

            // validación campo nombre de usuario
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
            

            if (!valido) {
                event.preventDefault();
            }
        }

    </script>

</body>
</html>