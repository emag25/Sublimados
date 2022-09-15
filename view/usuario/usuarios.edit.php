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
    <meta name="description" content="CONTIENE UN FORMULARIO PARA ESCRIBIR LAS RESEÑAS DE LA EMPRESA">
    <meta name="keywords" content="Sublimados, Estampados, Camisetas, Tazas, Reseñas, Formulario">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <title>CONSULTAR USUARIOS</title>
    <style>
        .seccion-segundo {
            height: auto;
            flex-direction: column;
                      
        }

        .contendor-form{
            border-radius: 40px; 
            display: flex; 
            flex-direction: column; 
            justify-content:center; 
            align-items:center; 
            background-color: #2B2729;  
            width:auto; 
            height:auto;
            padding: 60px;
            margin:60px;
        }

        #formulario{
            display: flex; 
            flex-direction: column; 
            justify-content:center; 
            align-items:center; 
            color:white;
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

        .btn {
            align-items: center;
            display: flex;
            justify-content: center;
            border-radius: 30px;
            width: 150px;
            height: 32px;
            color: #2B2729;
            cursor: pointer;
            margin-top: 50px;
            font-weight: bold;
            background-color: #ACACAC;
            text-align: center;
            text-decoration: none;
            font-size: 10pt;
        }

        .botones {
            display: flex;
            justify-content: center;
            gap: 10px;
            align-items: baseline;
        }

        input[type="submit"] {
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
        
        <?php 
        require_once HEADER;
        ?>
        <main>
            <section class="seccion-primero">
                <div class="dividir-seccion-uno">
                    <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; margin-left: auto;
                    margin-right:auto ;">
                        <h2 id="encabezado">¡ADMINISTRA USUARIOS!</h2>
                        <h3 style="margin-top: -10px;">SUPERIUM</h3>
                        <p id="parrafo">
                            Aquí podrás consultar los usuarios registrados, su rol etc.</p>
                    </div>
                    <div class="seccion-uno-derecho">
                        <div class="circulo" id="circulo-arriba"></div>
                        <div class="circulo" id="circulo-medio">
                            <img src="assets/img/ema-escribir.png" alt="escribe reseña">
                        </div>
                        <div class="circulo" id="circulo-abajo"></div>
                    </div>
                </div>
            </section>

            <section class="seccion-segundo">            
                <div class="contendor-form">
                    <form method="POST" action="index.php?c=Usuarios&f=edit" id="formulario" style="display: flex; flex-direction: column; justify-content:center; align-items:center; padding: 10px 5px;">
                        <input type="hidden" name="id" id="id" value="<?php echo $usu->id_usuario; ?>"/>
                        
                        <label><b>Nombre de usuario: </b></label>
                        <input class="caja" type="text" name="nombre" id="nombre" value="<?php echo $usu->usuario; ?>" readonly="readonly">                   

                        <?php 
                        $cliente = ""; $administrador = ""; $marketing = "";

                        if($usu->rol == "cliente") {
                            $cliente="checked";
                        }else if($usu->rol == "administrador") {
                            $administrador="checked";
                        }else if($usu->rol == "marketing") {
                            $marketing="checked";
                        }
                        ?>
                        <label><b>Rol:</b></label>
                        <div id="contenedorRadios">
                            <div id="divRadio1">
                                <input type="radio" id="radio1" name="radio" value="Cliente" class="radio" <?php echo $cliente; ?>>
                                <label>Cliente</label>
                            </div>
                            <div id="divRadio2">
                                <input type="radio" id="radio2" name="radio" value="Administrador" class="radio" <?php echo $administrador; ?>>
                                <label>Administrador</label>
                            </div>
                            <div id="divRadio3">
                                <input type="radio" id="radio3" name="radio" value="Marketing" class="radio" <?php echo $marketing; ?>>
                                <label>Marketing</label>
                            </div>
                        </div>
                        
                        <div class="botones">
                            <input type="submit" id="guardar" value="GUARDAR" onclick="if (!confirm('¿Está seguro de modificar el usuario?')) return false;">
                            <a class="btn" href="index.php?c=Usuarios&f=view_list">CANCELAR</a>
                        </div>
                    </form>                
                </div>
            
            </section>
        </main>
        <?php require_once FOOTER; ?>        
    </div>
    <script type="text/javascript">

        var formulario = document.getElementById("formulario").addEventListener('submit', validar);

        function validar(event) {

            var valido = true;            
            var radio = document.getElementsByName("radio");


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

