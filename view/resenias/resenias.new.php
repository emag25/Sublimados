<!--   AUTOR: APRAEZ GONZALEZ EMELY MISHELL  -->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CONTIENE UN FORMULARIO PARA ESCRIBIR LAS RESEÑAS DE LA EMPRESA">
    <meta name="keywords" content="Sublimados, Estampados, Camisetas, Tazas, Reseñas, Formulario">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>NUEVA RESEÑA</title>
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
            height: 540px;
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

        form input[type="submit"] {
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
                        <h2 id="encabezado">¡ESCRIBE TU RESEÑA!</h2>
                        <h3 style="margin-top: -10px;">SUPERIUM</h3>
                        <p id="parrafo">
                            Este espacio es dedicado para tí. Puedes expresar tu opinión acerca de nuestros
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
                    <form id="escribeturesenia" method="POST" action="index.php?c=Resenias&f=new">
                        <div id="datosNewReseña">
                            <label><b>Nombre: </b><span>*</span></label>
                            <div>
                                <input type="text" name="nombre" id="nombre" placeholder="Escribe tus nombres."
                                    class="caja box" style="width: 170px;" onmouseover="mostrarError('nombre')"
                                    onmouseout="ocultarError('nombre')">
                            </div>
                            <label><b>Email: </b><span>*</span></label>
                            <div>
                                <input type="text" name="email" id="email" placeholder="Escribe tu email."
                                    class="caja box" style="width: 170px;" onmouseover="mostrarError('email')"
                                    onmouseout="ocultarError('email')">
                            </div>
                            <label><b>Valoración: </b><span>*</span></label>
                            <div>
                                <select id="valoracion" name="valoracion" class="caja box"
                                    style="height: 30px; width: 200px;" onmouseover="mostrarError('valoracion')"
                                    onmouseout="ocultarError('valoracion')">
                                    <option value="0">Seleccione</option>
                                    <option value="5">5 estrellas</option>
                                    <option value="4">4 estrellas</option>
                                    <option value="3">3 estrellas</option>
                                    <option value="2">2 estrellas</option>
                                    <option value="1">1 estrella</option>
                                </select>
                            </div>
                            <label><b>Servicio: </b><span>*</span></label>
                            <div id="contenedorRadios" class="box" onmouseover="mostrarError('radio')"
                                onmouseout="ocultarError('radio')">
                                <div id="divRadio1">
                                    <input type="radio" id="radio1" name="radio" value="1" class="radio">
                                    <label>A domicilio</label>
                                </div>
                                <div id="divRadio2">
                                    <input type="radio" id="radio2" name="radio" value="2" class="radio">
                                    <label>Internacional</label>
                                </div>
                            </div>
                        </div>
                        <label><b>Reseña: </b><span>*</span></label>
                        <div id="areaNewReseña">
                            <div>
                                <textarea id="resenia" name="nuevaResenia" rows="10" cols="400" class="caja box"
                                    placeholder="Escribe tu reseña." style="width: 290px; height: auto; resize: none;"
                                    onmouseover="mostrarError('resenia')"
                                    onmouseout="ocultarError('resenia')"></textarea>
                            </div><br><br>
                            <div>
                                <input type="checkbox" id="recibiremail" name="recibiremail" />
                                <label style="font-size: 10pt;">Recibir alertas de promociones a este email.</label>
                            </div>
                            <input type="submit" id="enviarReseña" value="ENVIAR RESEÑA">
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

            elemento.focus();
            elemento.style.boxShadow = '0 0 5px red, 0 0 5px red';

            if (elemento.id === "contenedorRadios") {
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

