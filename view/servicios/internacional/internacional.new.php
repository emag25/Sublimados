<!--   AUTOR: YANEZ GUILLEN PAULA ADRIANA  -->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CONTIENE UN FORMULARIO PARA REALIZAR ENVIOS INTERNACIONALES.">
    <meta name="keywords" content="Sublimados, Estampados, Camisetas, Tazas, Servicios,Envios Internacionales">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>INTERNACIONAL</title>
    <style>

        #contenedorPrincipal {
            width: 80%;
            margin: 60px;
            box-shadow: 0 0 15px rgb(2, 2, 2);
            /*para centrar un contenedor*/

        }


        .text-center {
            text-align: center;
        }

        #contenedorContenido {
            color: #333333;
        }

        .formularios {
            border: 2px solid #ccc;
            border-radius: 15px;
            padding: 10px;
            background: #D4F4DB;
            width: 80%;
            margin: 0 auto;
            /*para centrar*/

        }

        .formularios div {
            padding: 5px;
        }

        .formularios div:nth-child(2n) {
            background: #9EE9A1;
        }


        .seccion-primero {
            height: auto;
        }

        .seccion-segundo {
            height: auto;
        }

        .seccion-tercero {
            height: auto;
        }


        .seccion-quinto {
            height: auto;
        }

        .seccion-cuarto {
            
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 450px;
            background-color: #D4F4DB;
        }


        #slider {
            border-radius: 20px;
            box-shadow: 0 0 15px rgb(169, 247, 143);


        }




        #pie {
            font-family: 'Courier New', Courier, monospace;
        }

        #enlaces,
        #contenido {
            display: flex;
            justify-content: center;
            background-color: rgb(13, 13, 13);
            padding: 20px;
            border-radius: 30px;
            margin-top: 20px;

        }

        #contenido {
            visibility: hidden;
        }

        .evento {
            display: inline-block;
            background-color: #9EE9A1;
            color: rgb(11, 10, 10);
            font-weight: bold;
            padding: 10px;
            margin: 5px;
            text-decoration: none;
            border-radius: 10px;
        }

        li {
            list-style: none;
        }

        #titulo-empresas {
            text-align: center;
            font-style: oblique;
            font-weight: bolder;
        }

        .bloque {
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            align-items: center;
        }

        .imgcambiante {
            background-color: #D4F4DB;
            border-radius: 20px;
            text-align: center;
            left:0; right:0; top:0;


        }

        .imgcambiante div:nth-child(1) {
            width: 50%;
            height: 50%;
            border-radius: 40px;
            background-color: #2B2729;
            margin-right:0;
            padding: 20px;

        }

        .imgcambiante div:nth-child(2) {
            padding: 40px;
            width: 50%;
            height: 50%;
            border-radius: 40px;
            background-color: #2B2729;
            color: #f0ebeb;
            font-size:16px;
            margin-left: 15px;
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
                        <h2 id="encabezado">ENVIOS INTERNACIONALES</h2>
                        <h3 style="margin-top: -10px;">SUPERIUM</h3>
                        <p id="parrafo">
                            Bienvenid@ a la sección de envíos internacionales. Aquí podrás realizar envíos a tu país y
                            llegarán a la puerta de tu casa.
                            ¡Anímate ya!
                            <br><br><span style="font-weight: bold;">Una nueva forma de vestir, con elegancia y
                                sobretodo a tu gusto!</span>
                        </p>
                    </div>
                    <div class="seccion-uno-derecho">
                        <div class="circulo" id="circulo-arriba"></div>
                        <div class="circulo" id="circulo-medio">
                            <!-- La imagen esta en  128px redondeada (fuente: flaticon.com) -->
                            <img style="margin-top:145px ;" src="assets/img/logo_ser.png" alt="inicio">
                        </div>
                        <div class="circulo" id="circulo-abajo"></div>
                    </div>
                </div>

            </section>
            <section class="seccion-segundo">

                <ul id="enlaces">
                    <li><a id="enlace1" class="evento" href="#" onmouseover="mostrar(this)">ServiEntrega</a></li>
                    <li><a id="enlace2" class="evento" href="#" onmouseover="mostrar(this)">Tramaco</a></li>
                    <li><a id="enlace3" class="evento" href="#" onmouseover="mostrar(this)">MundoExpress</a></li>
                </ul>

            </section>
            <section class="seccion-tercero">

                <div id="contenido"></div>



            </section>

            <section class="seccion-cuarto">
                <div class="bloque imgcambiante">

                    <div>
                        <img src="#" class="slider" id="slider" width="200" height="200" alt="evento de imgs">
                            <br>
                    </div>
                    <div>
                        <p><br><br>¿Qué esperas para obtener ya tu obsequio ideal? Ordena ya, desde la comodidad de
                        tu casa.
                        Nosotros te lo llevamos</p><br><br><br></div>

                </div>

            </section>
            <section class="seccion-quinto">
                <div id="contenedorPrincipal">
                    <div id="contenedorContenido">
                        <h4 class="text-center">¡SOLICITA YA TU PEDIDO!</h4>

                        <div class="formularios">
                            <!-- onsubmit=return validar() PERMITE LLAMAR A LA FUNCION DE JAVASCRIPT QUE VALIDA EL FORMULARIO-->
                            <form id="formContacto" method="POST" action="index.php?c=Servicios&f=int_new" onsubmit="return validar()">
                                <div>
                                    <label>Nombres:&nbsp;&nbsp;</label>
                                    <input type="text" name="nombres" id="nombres" class="formItem"
                                        placeholder="Ingresa aqui tu nombre" />
                                </div>
                                <div>
                                    <label>Apellidos:&nbsp;&nbsp;</label>
                                    <input type="text" name="apellidos" id="apellidos" class="formItem"
                                        placeholder="Ingresa aqui tu Apellido" />
                                </div>
                                <div>
                                    <label>Telefono: &nbsp;</label>
                                    <input type="text" name="telefono" id="telefono" class="formItem"
                                        placeholder="Ingresa aqui tu teléfono" />
                                </div>
                                <div>
                                    <label>Email:&nbsp; &nbsp; &nbsp;&nbsp;</label>
                                    <input type="email" name="email" id="correo" class="formItem"
                                        placeholder="Ingresa aqui tu correo" />
                                </div>
                                <div>
                                    <label>Dirección:&nbsp;</label>
                                    <input type="text" name="direccion" id="direccion" class="formItem"
                                        placeholder="Ingresa aqui tu dirección" />
                                </div>

                                <div>
                                    <label>Recibir vía:</label>
                                    <input class="via" type="radio" name="radio" id="v1" value="S" />ServiEntrega
                                    <input class="via" type="radio" name="radio" id="v2" value="T" />Tramaco
                                    <input class="via" type="radio" name="radio" id="v3" value="M" />MundoExpress
                                </div>
                                <div>
                                    <label>Seleccione país de envío:</label>
                                    <select name="destino" id="destino" class="formItem">
                                        <option value="0">Seleccione..</option>
                                        <option value="1">Panamá</option>
                                        <option value="2">Chile</option>
                                        <option value="3">Colombia</option>
                                        <option value="4">Perú</option>
                                    </select>

                                </div>

                                <div>
                                    <label>Recibir información por correo:</label>
                                    <input type="checkbox" name="recibir_info" value="1" id="acc1"
                                        class="formItem acc principal" />
                                    


                                </div>


                                <div>
                                    <label>Especificaciones:</label>
                                    <textarea class="form-control formItem" id="texto" rows="4" cols="100"name="especificaciones"></textarea>
                                </div>
                                <div class="text-center">
                                    <input type="submit" class="btn btn-primary" value="Enviar">
                                    <input type="reset" class="btn btn-primary" value="Cancelar">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>


    </section>



</main>


    


<?php require_once FOOTER; ?>

    </div>
    <script>

        let cont = 0;
        function validar() {
            // variable para retornar
            var valido = true;
            // obtencion de los elementos a validar
            var txtNombres = document.getElementById("nombres");//document.querySelector("input[name='nombres']"); // reotrna el primer input que tenga name ='nombres'
            var txtApellidos = document.getElementById("apellidos");
            var txtDireccion = document.getElementById("direccion");
            var txtTelefono = document.getElementById("telefono");
            var selectDestino = document.getElementById("destino");
            var radiosVia = document.getElementsByName("via");//retorna un arreglo;
            var radio1 = document.getElementById("v1");
            var chkAcc = document.getElementById("acc1");
            var txtemail = document.getElementById("correo");
            var checkboxsAccionista = document.getElementsByClassName("acc");// retorna un arreglo


            var letra = /^[a-z ,.'-]+$/i;// letrasyespacio   ///^[A-Z]+$/i;// solo letras
            var correo = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
            var telefonoreg = /^[0-9]{10}$/g; // para validar datos que deban tener 10 numeros

            //limpiarMensajes();

            //validacion para nombres
            if (txtNombres.value === "") {
                valido = false;
                mensaje("Nombre es requerido", txtNombres);
            } else if (!letra.test(txtNombres.value)) {
                valido = false;
                mensaje("Nombre solo debe contener letras", txtNombres);
            } else if (txtNombres.value.length > 40) {
                valido = false;
                mensaje("Nombre deber tener maximo 40 caracteres", txtNombres);
            }

            //Validacion para apellidos
            if (txtApellidos.value === "") {
                valido = false;
                mensaje("Apellido es requerido", txtApellidos);
            } else if (!letra.test(txtApellidos.value)) {
                valido = false;
                mensaje("Apellido solo debe contener letras", txtApellidos);
            } else if (txtNombres.value.length > 70) {
                valido = false;
                mensaje("Apellido debe tener maximo 70 caracteres", txtApellidos);
            }


            //Validacion para direccion
            if (txtDireccion.value === "") {
                valido = false;
                mensaje("direccion es requerida", txtDireccion);
            } else if (txtDireccion.value.length > 90) {
                valido = false;
                mensaje("Direccion debe tener maximo 90 caracteres", txtDireccion);
            }
            //validacion telefono
            if (txtTelefono.value === "") {
                valido = false;
                mensaje("Telefono es requerido", txtTelefono);
            } else if (!telefonoreg.test(txtTelefono.value)) {
                valido = false;
                mensaje("Telefono debe ser de 10 digitos", txtTelefono);
            }

            //validacion email
            if (txtemail.value === "") {
                valido = false;
                mensaje("Email es requerido", txtemail);
            } else if (!correo.test(txtemail.value)) {
                valido = false;
                mensaje("Email no es correcto", txtemail);
            }

            //validacion select
            if (selectDestino.value === null || selectDestino.value === '0') {
                valido = false;
                mensaje("Debe seleccionar país de destino", selectDestino);
            }

            //validacion radio button
            var sel = false;
            for (let i = 0; i < radiosVia.length; i++) {
                if (radiosVia[i].checked) {
                    sel = true;
                    break;
                }
            }
            if (!sel) {
                valido = false;
                mensaje("Debe seleccionar una opcion", radiosVia[0]);
            }




            return valido;
        }

        function mensaje(cadenaMensaje, elemento) {
            elemento.focus();
            window.alert(cadenaMensaje);

        }
        var contenido = document.getElementById("contenido");
        function mostrar(nodo) {
            contenido.style = "visibility: visible;";
            let imagen = document.createElement("img");
            imagen.style.height = '100px';
            imagen.style.width = '100px';
            imagen.style.borderRadius = '10px';
            var parrafo = document.createElement("p");
            parrafo.style.color = 'white';
            parrafo.style.textAlign = 'justify';
            parrafo.style.width = '35%';
            parrafo.style.marginLeft = '20px';
            switch (nodo.id) {
                case "enlace1":
                    imagen.src = 'assets/img/paula-servi.jpg';
                    parrafo.textContent = 'En Servientrega Ecuador S.A. ofrecemos soluciones logísticas y nos comprometemos a satisfacer las necesidades y expectativas de nuestros clientes y de las partes interesadas.';
                    break;
                case "enlace2":
                    imagen.src = 'assets/img/paula-trama.jpg';
                    parrafo.textContent = 'Ser el grupo líder en soluciones logísticas integrales innovadoras que promuevan el desarrollo del país con proyección internacional.';
                    break;
                case "enlace3":
                    imagen.src = 'assets/img/paula-mundo.jpg';
                    parrafo.textContent = 'La empresa Grupo Empresarial Colombia Mundo Express S A S se encuentra situada en el departamento de BOGOTA, en la localidad BOGOTA y su dirección postal es CARRERA 81 B 6 B 40 CA 11 CONJ TERRAZAS DE CASTILLA, BOGOTA, BOGOTA.​';
                    break;
                default:
                    break;
            }
            contenido.appendChild(imagen);
            contenido.appendChild(parrafo);
        }
        function eliminar() {
            while (contenido.hasChildNodes()) {
                contenido.removeChild(contenido.lastChild);
            }
            contenido.style.visibility = 'hidden';
        }
        document.getElementById("enlace1").addEventListener('mouseout', eliminar);
        document.getElementById("enlace2").addEventListener('mouseout', eliminar);
        document.getElementById("enlace3").addEventListener('mouseout', eliminar);


        window.addEventListener('load', function () {
            var imagenes = [];
            imagenes[0] = 'assets/img/paula-enviosinternacionales.jpg';
            imagenes[1] = 'assets/img/paula-enviosinternacionales2.jpg';
            imagenes[2] = 'assets/img/paula-enviosinternacionales3.jpg';

            var indiceImagenes = 0;
            function CambiarImagenes() {
              //  document.slider.src = imagenes[indiceImagenes];
              var img =document.getElementById("slider");
              img.src= imagenes[indiceImagenes];

                
                if (indiceImagenes < 2) {
                    indiceImagenes++;
                } else {
                    indiceImagenes = 0;
                }
            }
            setInterval(CambiarImagenes, 1000);
        });


    </script>
</body>

</html>
