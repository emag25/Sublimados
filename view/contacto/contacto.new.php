<!--   AUTOR: QUITO YAMBAY RUTH MARIA  -->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CONTIENE UN FORMULARIO PARA CONTACTARSE CON LA EMPRESA.">
    <meta name="keywords" content="Sublimados, Estampados, Camisetas, Tazas,Formulario,Contacto">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>ESCRIBENOS !</title>
    <style>
        /* Segunda sección */
        #seccion-2 {
            height: 800px;
        }

        #DockerPrincipal {
            width: 90%;
            background-color: #2B2729;
            margin: auto;
            border-radius: 15px;
            height: 98%;
        }

        .formulario {
            border: 2px solid #D4F4DB;
            border-radius: 15px;
            padding: 15px;
            background: whitesmoke;
            width: 80%;
            margin: auto;
            height: auto;
        }

        .formulario div {
            padding-bottom: 1%;
            padding-top: 0.8%;
            padding-left: 2%;
        }

        .formulario div:nth-child(2n) {
            background: #D4F4DB;
            border-radius: 15px;
        }

        .datos,
        .genero,
        .intereses,
        .contenido {
            border: 0;
            border-radius: 5px;
            padding: 5px;
            padding-inline-start: 15px;
            padding-inline-end: 15px;
            margin-top: 1.5%;
        }

        #boton {
            border: 0;
            width: 15%;
            padding-right: 5px;
            width: 10%;
        }

        .mensaje:active {
            background-color: #D9D9D9;
            color: black;
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
                        <h2 id="encabezado">ESTAMOS PARA ATENDERTE</h2>
                        <h3 style="margin-top: -10px;">SUPERIUM</h3>
                        <p id="parrafo">
                            Queremos saber de tí y conocer sobre tus intereses para brindarte un mejor servicio. Te
                            invito a que te
                            comuniques con nosotros, será fácil y rápido solo tienes que completar el siguiente
                            formulario.
                            <br><br><span style="font-weight: bold;">Siempre estaremos para tí!</span>
                        </p>
                    </div>
                    <div class="seccion-uno-derecho">
                        <div class="circulo" id="circulo-arriba"></div>
                        <div class="circulo" id="circulo-medio">
                            <!-- La imagen esta en  128px redondeada (fuente: flaticon.com) -->
                            <img style="width: 100%; height: 100%;" src="assets/img/emailR.gif" alt="correo">
                        </div>
                        <div class="circulo" id="circulo-abajo"></div>
                    </div>
                </div>
            </section>

            <section class="seccion-segundo" id="seccion-2">
                <div id="DockerPrincipal">
                    <h1 style=" color:white; font-family:Arial, Helvetica, sans-serif; text-align: center; ">
                        ¡Escríbenos!</h1>
                    <div class="formulario">
                        <form id="formContacto" method="POST" action="index.php?c=Contacto&f=new">
                            <!-- tipo texto -->
                            <div>
                                <label><b>Nombre: </b></label>
                                <input type="text" name="nombre" id="nombreid" class="datos"
                                    placeholder="Escriba su nombre" />
                            </div>
                            <div>
                                <label><b>Apellido: </b></label>
                                <input type="text" name="apellido" id="apellido" class="datos"
                                    placeholder="Escriba su apellido" />
                            </div>
                            <div>
                                <label><b>Celular: </b></label>
                                <input type="text" name="celular" id="celularid" class="datos"
                                    placeholder="Ingrese su numero celular" />
                            </div>
                            <div>
                                <label><b>Email: </b></label>
                                <input type="text" name="email" id="emailid" class="datos"
                                    placeholder="Ingrese su email" />
                            </div>
                            <!-- tipo radio -->
                            <div>
                                <label><b>Genero:</b></label>
                                <input type="radio" name="radio" id="g1" class="genero" value="1" /> Femenino
                                <input type="radio" name="radio" id="g2" class="genero" value="2" /> Masculino
                                <input type="radio" name="radio" id="g3" class="genero" value="3" /> Otro
                            </div>
                            <!-- tipo selec -->
                            <div>
                                <label><b>Estado Civil:</b></label>
                                <select name="estado" id="estado" class="datos">
                                    <option value="0">Seleccione..</option>
                                    <option value="1">Soltero</option>
                                    <option value="2">casado</option>
                                    <option value="3">Viudo</option>
                                </select>
                            </div>
                            <!-- tipo checkbox -->
                            <div>
                                <label><b>Recibir más información sobre la empresa</b></label>
                                <input type="checkbox" name="intereses" value="1" id="intereses1" class="intereses" />
                            </div>
                            <!-- tipo dato -->
                            <div>
                                <label><b>Fecha de nacimiento:</b></label>
                                <input type="date" name="fecha" id="fechaid" class="datos" />
                            </div>
                            <!-- tipo area de texto -->
                            <div>
                                <label><b>Dejándonos un comentario</b></label> <br>
                                <textarea style="width: 60%;" id="texto" rows="4" cols="100" name="comentario" class="contenido"
                                    placeholder="Escribe tu comentario"></textarea>
                            </div>
                            <div style="display: flex; justify-content: flex-end; background-color: whitesmoke;">
                                <div class="text-center" id="boton">
                                    <input
                                        style="color: white; background-color: black; width: 90%; height: 90%; border-radius: 15px;  "
                                        type="submit" class="mensaje" value="ENVIAR">
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </section>

        </main>

        <?php  require_once FOOTER ?>
    </div>

    <script type="text/javascript">

        /*  window.alert("Holaaa"); */
        var valido = true;
        var form = document.getElementById("formContacto");
        form.addEventListener("submit", verificar);
        var txtNombre = document.getElementById("nombreid");
        var txtApellido = document.getElementById("apellido");
        var txtCelular = document.getElementById("celularid");
        var txtCorreo = document.getElementById("emailid");
        var radiosGenero = document.getElementsByName("radio");
        /*                     var radioB = document.getElementById("g1"); */
        var selectEstado = document.getElementById("estado");
        var checkboxSuscripcion = document.querySelectorAll(".intereses");
        var txtFecha = document.getElementById("fechaid");
        var palabra = /^[a-z ,.'-]+$/i;
        var correo = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        var telefonoR = /^[0-9]{10}$/i;
        function verificar(e) {
            let cont = 0;
            /* validación para el nombre */
            if (txtNombre.value.length == 0) {
                valido = false;
                alert("Escriba su nombre");
            }
            else if (!palabra.test(txtNombre.value)) {
                valido = false;
                alert("Solo debe contener letras");
            }
            else if (txtNombre.value.length > 20) {
                valido = false;
                alert("No debe contener más de 20 caracteres");
            }

            /* validación de apellido */
            if (txtApellido.value.length == 0) {
                valido = false;
                alert("Escriba su apellido");
            } else if (!palabra.test(txtApellido.value)) {
                valido = false;
                alert("Solo debe contener letras");
            } else if (txtApellido.value.length > 20) {
                valido = false;
                alert("No debe contener más de 20 caracteres");
            }

            /* validación de teléfono */
            if (txtCelular.value.length == 0) {
                valido = false;
                alert("Debe ingresar su número de celular");
            } else if (!telefonoR.test(txtCelular.value)) {
                valido = false;
                alert("El teléfono debe contener 10 dígitos");
            }

            /* validación de email */
            if (txtCorreo.value.length == 0) {
                valido = false;
                alert("Debe ingresar su correo electrónico");
            } else if (!correo.test(txtCorreo.value)) {
                valido = false;
                alert("Correo electrónico incorecto");
            }

            let auxOption = false;
            for (option of radiosGenero) {
                if (option.checked) {
                    auxOption = true;
                }
            }
            if (auxOption == false) { valido = false; alert("Elija un genero"); }

            let auxCheck = false;
            for (check of checkboxSuscripcion) {
                if (check.checked) {
                    auxCheck = true;
                }
            }


            /* if (auxCheck == false) { valido = false; alert("Elija un estampado"); } */

            if (selectEstado.selectedIndex == 0) {
                valido = false;
                alert("Elija un estado");
            }

            /* validación fecha de nacimiento-date*/
            var fecha = txtFecha.value;
            var feNacimiento = new Date(fecha);
            var feActual = new Date();

            if (feNacimiento > feActual) {
                valido = false;
                alert("La fecha de nacimiento no puede ser mayor que el año actual");
            }

            if (valido == true) {
                alert("Has enviado exitosamente tu formulario")
            } else {
                valido = true;
                e.preventDefault();
            }

        }

    </script>

</body>

</html>


