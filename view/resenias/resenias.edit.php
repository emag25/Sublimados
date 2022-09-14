<!--   AUTOR: APRAEZ GONZALEZ EMELY MISHELL  -->
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
    <title>EDITAR RESEÑAS</title>
    <style>
        .seccion-segundo {
            height: auto;
        }

        span {
            color: #9EE9A1;
        }

        #bloqueNewReseña {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            background-color: #2B2729;
            width: 450px;
            height: au  to;
            color: rgb(255, 255, 255);
            border-radius: 40px;
            padding: 40px;
            margin: 60px;
            box-shadow: 5px 5px #acacac;
        }

        #datosNewReseña {
            display: grid;
            grid-template-columns: 120px 200px;
            grid-template-rows: 40px 40px 40px 80px;
            justify-content: space-around;
            justify-items: stretch;
            align-items: center;
            margin-bottom: 20px;
        }

        #DivRadio1 {
            margin-bottom: 5px;
        }

        #areaNewReseña {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            width: 320px;
        }

        .caja {
            border: 0;
            border-radius: 5px;
            height: 20px;
            padding: 5px;
            padding-inline-start: 15px;
            padding-inline-end: 15px;
        }

        #resenia {
            margin: 10px 0 10px 0;
        }

        #enviarReseña:active {
            background-color: #9EE9A1;
            color: black;
        }

        form input[type="submit"]{
            background-color: #D4F4DB;
            border-radius: 30px;
            width: 150px;
            height: 32px;
            font-weight: bold;
            border: 0;
            color: #2B2729;
            cursor: pointer;
            margin-top: 50px;
        }

        .btnResenia {
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
        }

        .mensajeError {
            background-color: rgb(201, 74, 74);
            border-radius: 15px;
            padding: 10px;
            margin-top: -31px;
            margin-left: 210px;
            position: absolute;
            color: white;
            font-size: 11px;
            z-index: 1;
            box-shadow: 0 0 5px #716f70,
                0 0 5px #716f70;
        }
    </style>
</head>

<body>
    <div class="contenedor-principal">
    <?php require_once HEADER; ?>
        <main>
            <section class="seccion-primero">
                <div class="dividir-seccion-uno">
                    <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; margin-left: auto;
                    margin-right:auto ;">
                        <h2 id="encabezado">¡EDITA TU RESEÑA!</h2>
                        <h3 style="margin-top: -10px;">SUPERIUM</h3>
                        <p id="parrafo">
                            Este espacio es dedicado para tí. Puedes editar tu opinión acerca de nuestros
                            productos y servicios.</p>
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
            <div id="bloqueNewReseña">
                    <form action="index.php?c=Resenias&f=edit" method="POST" id="escribeturesenia">
                        <div id="datosNewReseña">
                            <input type="hidden" name="id" id="id" value="<?php echo $res->resenia_id; ?>"/>
                            <label><b>Nombre: </b><span>*</span></label>
                            <div>
                                <input type="text" name="nombre" id="nombre" placeholder="Escribe tus nombres."
                                    class="caja box" style="width: 170px;" onmouseover="mostrarError('nombre')"
                                    onmouseout="ocultarError('nombre')" value="<?php echo $res->nombre; ?>">
                            </div>
                            <label><b>Email: </b><span>*</span></label>
                            <div>
                                <input type="text" name="email" id="email" placeholder="Escribe tu email."
                                    class="caja box" style="width: 170px;" onmouseover="mostrarError('email')"
                                    onmouseout="ocultarError('email')" value="<?php echo $res->email; ?>">
                            </div>
                            <label><b>Valoración: </b><span>*</span></label>
                            <div>
                                <select id="valoracion" name="valoracion" class="caja box"
                                style="height: 30px; width: 200px;" onmouseover="mostrarError('valoracion')"
                                onmouseout="ocultarError('valoracion')">
                                    <?php  
                                    $selected[]="";
                                    for ($i = 1; $i < 6; $i++){
                                        $selected[$i] = "";
                                        if($res->valoracion == $i){
                                            $selected[$i] = 'selected="selected"';
                                        }
                                    }
                                    ?>
                                    <option value="0">Seleccione</option>
                                    <option value="5" <?php echo $selected[5]; ?>>5 estrellas</option>
                                    <option value="4" <?php echo $selected[4]; ?>>4 estrellas</option>
                                    <option value="3" <?php echo $selected[3]; ?>>3 estrellas</option>
                                    <option value="2" <?php echo $selected[2]; ?>>2 estrellas</option>
                                    <option value="1" <?php echo $selected[1]; ?>>1 estrella</option>
                                </select>
                            </div>
                            <label><b>Servicio: </b><span>*</span></label>
                            <div id="contenedorRadios" class="box" onmouseover="mostrarError('radio')"
                                onmouseout="ocultarError('radio')">
                                <div id="divRadio1">
                                    <?php      
                                    $domicilio = ""; $internacional = "";                              
                                    if($res->servicio == "A domicilio"){
                                        $domicilio = 'checked';                                        
                                    }else if ($res->servicio == "Internacional"){
                                        $internacional = 'checked';                                        
                                    }
                                    ?>
                                    <input type="radio" id="radio1" name="radio" value="1" class="radio" <?php echo $domicilio; ?>>
                                    <label>A domicilio</label>
                                </div>
                                <div id="divRadio2">
                                    <input type="radio" id="radio2" name="radio" value="2" class="radio" <?php echo $internacional; ?>>
                                    <label>Internacional</label>
                                </div>
                            </div>
                            <label><b>Estado: </b><span>*</span></label>
                            <div id="contenedorRadius" class="box" onmouseover="mostrarError('radius')"
                                onmouseout="ocultarError('radius')">
                                <div id="divRadio1">
                                    <?php      
                                    $revision = ""; $publicado = "";                              
                                    if($res->estado == "0"){
                                        $revision = 'checked';                                        
                                    }else if ($res->estado == "1"){
                                        $publicado = 'checked';                                        
                                    }
                                    ?>
                                    <input type="radio" id="radio3" name="radius" value="0" class="radius" <?php echo $revision; ?>>
                                    <label>En revisión</label>
                                </div>
                                <div id="divRadio2">
                                    <input type="radio" id="radio4" name="radius" value="1" class="radius" <?php echo $publicado; ?>>
                                    <label>Publicado</label>
                                </div>
                            </div>
                        </div>
                        <label><b>Reseña: </b><span>*</span></label>
                        <div id="areaNewReseña">
                            <div>
                                <textarea id="resenia" name="nuevaResenia" rows="10" cols="400" class="caja box"
                                    placeholder="Escribe tu reseña." style="width: 290px; height: auto; resize: none;"
                                    onmouseover="mostrarError('resenia')"
                                    onmouseout="ocultarError('resenia')"><?php echo $res->resenia; ?></textarea>
                            </div><br><br>
                            <div>
                                <input type="checkbox" id="recibiremail" name="recibiremail" <?php echo ($res->recibir_promo == 1)?'checked="checked"':''; ?>/>
                                <label style="font-size: 10pt;">Recibir alertas de promociones a este email.</label>
                            </div>
                            <div class="botones">
                                <input type="submit" id="enviarReseña" value="GUARDAR" onclick="if (!confirm('¿Está seguro de modificar la reseña?')) return false;">
                                <a class="btnResenia" href="index.php?c=Resenias&f=view_list">CANCELAR</a>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </section>
        </main>

        <?php require_once FOOTER; ?>
    </div>
    <script type="text/javascript">

        var formulario = document.getElementById("escribeturesenia").addEventListener('submit', validar);

        function validar(event) {

            var valido = true;

            var letra = /^[a-z ,.'-]+$/i;
            var correo = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

            var nombre = document.getElementById("nombre");
            var email = document.getElementById("email");
            var valoracion = document.getElementById("valoracion");
            var radio = document.getElementsByName("radio");
            var radius = document.getElementsByName("radius");
            var resenia = document.getElementById("resenia");

            limpiarMensajes();

            // validación campo nombre
            if (nombre.value === '') {
                valido = false;
                mensaje("El campo 'nombre' es requerido.", nombre);
            } else if (!letra.test(nombre.value)) {
                valido = false;
                mensaje("El campo 'nombre' solo debe contener letras.", nombre);
            } else if (nombre.value.length > 50) {
                valido = false;
                mensaje("Ingrese máximo 50 caracteres.", nombre);
            }

            // validación campo email
            if (email.value === '') {
                valido = false;
                mensaje("El campo 'email' es requerido.", email);
            } else if (!correo.test(email.value)) {
                valido = false;
                mensaje("Ingrese un email válido.", email);
            } else if (email.value.length > 50) {
                valido = false;
                mensaje("Ingrese máximo 50 caracteres.", email);
            }

            // validación campo valoracion
            if (valoracion.value === null || valoracion.value === '0') {
                valido = false;
                mensaje("Especifique la valoración.", valoracion);
            }

            // validación campo servicio
            if (!radio[0].checked && !radio[1].checked) {
                valido = false;
                mensaje("Especifique el tipo de servicio.", radio[0].parentNode.parentNode);
            }

            // validación campo estado
            if (!radius[0].checked && !radius[1].checked) {
                valido = false;
                mensaje("Especifique el estado.", radius[0].parentNode.parentNode);
            }

            // validación campo reseña
            if (resenia.value === '') {
                valido = false;
                mensaje("El campo 'reseña' es requerido.", resenia);
            } else if (resenia.value.length > 200) {
                valido = false;
                mensaje("Ingrese máximo 200 caracteres.", resenia);
            }

            if (!valido) {
                event.preventDefault();
            }
        }

        function mensaje(cadenaMensaje, elemento) {

            
            elemento.style.boxShadow = '0 0 5px red, 0 0 5px red';

            if ((elemento.id === "contenedorRadios") || (elemento.id === "contenedorRadius")) {
                var nodoPadre = elemento;
            } else {
                var nodoPadre = elemento.parentNode;
            }

            var nodoMensaje = document.createElement("div");
            nodoMensaje.textContent = cadenaMensaje;
            nodoMensaje.setAttribute("class", "mensajeError");

            switch (elemento.id) {
                case "nombre":
                    nodoMensaje.setAttribute("id", "error-nombre");
                    break;
                case "email":
                    nodoMensaje.setAttribute("id", "error-email");
                    break;
                case "valoracion":
                    nodoMensaje.setAttribute("id", "error-valoracion");
                    break;
                case "contenedorRadios":
                    nodoMensaje.style.marginTop = '-35px';
                    nodoMensaje.setAttribute("id", "error-radio");
                    break;
                case "contenedorRadius":
                    nodoMensaje.style.marginTop = '-35px';
                    nodoMensaje.setAttribute("id", "error-radius");
                    break;
                case "resenia":
                    nodoMensaje.style.marginTop = '-180px';
                    nodoMensaje.style.marginLeft = '330px';
                    nodoMensaje.setAttribute("id", "error-resenia");
                    break;
                default:
                    break;
            }

            nodoPadre.appendChild(nodoMensaje);
            nodoMensaje.style.visibility = 'hidden';
        }

        function limpiarMensajes() {            
            var mensajes = document.querySelectorAll(".mensajeError");
            let a = mensajes.length - 1;
            for (let i = a; i > -1; i--) {
                mensajes[i].remove();
            }

            var boxes = document.querySelectorAll(".box");
            let b = boxes.length - 1;
            for (let i = b; i > -1; i--) {
                boxes[i].style.boxShadow = '0 0 0';
            }
        }

        function mostrarError(nombre) {
            if (document.querySelector("#error-" + nombre) !== null) {
                document.querySelector("#error-" + nombre).style.visibility = 'visible';
            }
        }

        function ocultarError(nombre) {
            if (document.querySelector("#error-" + nombre) !== null) {
                document.querySelector("#error-" + nombre).style.visibility = 'hidden';
            }
        }

    </script>
</body>

</html>

�