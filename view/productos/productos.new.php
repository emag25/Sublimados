<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CONTIENE UN FORMULARIO PARA DISEÑA EL PRODUCTO SUBLIMADO.">
    <meta name="keywords" content="Sublimados, Estampados, Camisetas, Tazas,Creacion,Diseño.">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>TU DISEÑO</title>
    <style>
        *{
            font-family: 'Inter', sans-serif;
        }
        .dividir-seccion-uno{
            padding-top: 35px;
        }
        .enl{
            font-family: 'Inter', sans-serif;
            border: 2px solid  #2B2729;
            padding: 0 10px;
            margin: 15px;
            text-align: center;
            font-size: 20px;
            background-color: #9EE9A1;
            color: black;
            position: relative;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }
        #newDisenio{
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

        #infoDisenio{
            display: grid;
            grid-template-columns: 120px 200px;
            grid-template-rows: 40px 40px 40px 80px;
            justify-content: space-around;
            justify-items: stretch;
            align-items: center;
            margin-bottom: 20px;
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
        .formulario{
            margin: 5px;
            padding-left: 10px;
        }
        #btnsCentro{
            text-align: center;
        }
        input, select, textarea{
            border-radius: 8px;
        }
        label{
            color: black;
            font-weight: bold;
        }
        #enlaces{
            display: grid;
            grid-template-columns: 0.5fr 0.5fr 0.5fr 0.5fr 0.5fr;
            justify-content: stretch;
            align-items: center;
            
        }
        .fotos{
            width: 50%;
            height: 50%;
            justify-self: center;
        }
        .seccion-primero{
            height: auto;
        }
    </style>


</head>
<body>
    <div class="contenedor-principal">
    <?php require_once HEADER; ?>
        
    
        <main>
            <section class="seccion-primero">
                <div class="dividir-seccion-uno">
                    <div  style="display: flex; flex-direction: column; justify-content: center; align-items: center; margin-left: auto;
                    margin-right:auto ;">
                        <h2 id="encabezado">CREA TU DISEÑO</h2>
                        <h3  style="margin-top: -10px;">SUPERIUM</h3>
                        <p id="parrafo" >
                            Bienvenido Usuario en este apartado podrás dejar volar tu imaginación e idear tu producto deseado
                            siguiendo algunos parámetros que te guiarán en la creación de tu diseño.
                        <br><br><span style="font-weight: bold;">Una nueva forma de vestir, con elegancia y sobretodo a tu gusto!</span>
                        </p> <br>
                        <div id="enlaces">
                            <a class="enl" id="uno"  href="#"> CAMISETA</a>
                            <a class="enl" id="dos"  href="#"> ABRIGO </a>
                            <a class="enl" id="tres"  href="#"> GORRA </a>
                            <a class="enl" id="cuatro" href="#"> TAZA </a>
                            <a class="enl" id="cinco"  href="#"> BOLSO </a>

                            <img src="assets/img/Camiseta.jpg" alt="Camiseta" class="fotos">
                            <img src="assets/img/Abrigo.jpg" alt="Abrigo" class="fotos">
                            <img src="assets/img/Gorra1.jpg" alt="Gorra" class="fotos">
                            <img src="assets/img/Taza2.jpg" alt="Taza" class="fotos">
                            <img src="assets/img/Bolso1.jpg" alt="Bolso" class="fotos">
                        </div>
                    </div>
                </div>
            </section>

            
            <section class="seccion-segundo">
                <div class="newDisenio"> 
                    <form id="creaDisenio" method="POST" action="index.php?c=Productos&f=new">
                        <div class="infoDisenio">


                            <div>
                                <label class="form"> <b> PRODUCTO: </b>  </label>
                            </div>
                            <div>
                                <select name="productos" id="cbxProductos" class="form fi"
                                    style="height: 30px; width: 200px;" onmouseover="mostrarError('producto')"
                                    onmouseout="ocultarError('producto')">    
                                    <option value="0">Seleccione...</option>
                                    <option value="1">Camiseta</option>
                                    <option value="2">Abrigo</option>
                                    <option value="3">Gorra</option>
                                    <option value="4">Taza</option>
                                    <option value="4">Bolso</option>
                                </select> 
                            </div>


                            
                            <div>
                                <label class="form"> <b> CLIENTE: </b>  </label>
                            </div>
                            <div>
                                <input type="text" name="cliente" id="txtCliente" class="form fi" placeholder="Ingresar Nombre Cliente"
                                style="width: 170px;" onmouseover="mostrarError('cliente')"
                                    onmouseout="ocultarError('cliente')">
                            </div>


                            <div>
                                <label class="form"> <b> DISEÑO: </b> </label>
                            </div>
                            <div>
                                <select name="diseño" id="cbxDisenio" class="form"
                                style="height: 30px; width: 200px;" onmouseover="mostrarError('disenio')"
                                    onmouseout="ocultarError('disenio')">
                                    <option value="0">Seleccione...</option>
                                    <option value="1">Personalizado</option>
                                    <option value="2">Estándar</option>
                                    <option value="3">Sorpresa</option>                        
                                </select> 
                            </div> 


                            <div>
                                <label class="form"> <b> MODELO DE SUBLIMADO: </b>  </label>
                            </div> 
                            <div id="rb" onmouseover="mostrarError('modelo')"
                                onmouseout="ocultarError('modelo')">
                                <input type="radio" class="ms" id="realista" name="modelo" value="real"/> Realista 
                                <input type="radio" class="ms" id="caricatura" name="modelo" value="cari"/> Caricatura 
                                <input type="radio" class="ms" id="anime" name="modelo" value="an"/> Anime
                            </div>


                            <div>
                                <label class="form"> <b> ESTADO: </b>  </label>
                            </div> 
                            <div>
                                <input type="radio" class="ms" id="creado" name="estado" value="1"/> Creado 
                                <input type="radio" class="ms" id="proceso" name="estado" value="2"/> En Proceso 
                            </div>

                            <div>
                                <input type="submit" class="form botones" value="Guardar" >   
                            </div>


                        </div> 
                    </form>
                </div>
            </section>
            
        </main>
            

        <?php require_once FOOTER; ?>
    </div>
    <script type="text/javascript">

        var formulario = document.getElementById("creaDisenio").addEventListener('submit', validar);

        function validar(event){

            var valido = true;
    
            //OBTENER ELEMENTOS 
            var cbxProducto = document.getElementById("cbxProductos");
            var txtCliente = document.getElementById("txtCliente");
            var cbxDisenio = document.getElementById("cbxDisenio");
            var rbModelo = document.getElementsByName("modelo");
            var rbEstado = document.getElementsByName("estado");

    
            var letra = /^[a-z ,.'-]+$/i;
            var telefono = /^[09]+[0-9]{8}$/g;

    
            depurar();

            //VALIDACIONES
            //PRODUCTO
            if (cbxProducto.value === null || cbxProducto.value === '0') {
                valido = false;
                mensaje("DEBE SELECCIONAR UN PRODUCTO", cbxProducto);
            }
            //CLIENTE
            if (txtCliente.value === ''){
                valido = false;
                mensaje("DEBE INGRESAR NOMBRE DE CLIENTE" txtCliente);
            }else if (!letra.test (txtCliente.value)){
                valido = false;
                mensaje("EL NOMBRE DEBE CONTENER SOLO LETRAS", txtCliente);
            }else if (txtCliente.value.length >20){
                valido = false;
                mensaje("EL NOMBRE DEBE CONTENER MÁXIMO 20 CARACTERES", txtCliente); 
            }
            
            //DISEÑO
            if (cbxDisenio.value === null || cbxDisenio.value === '0') {
                valido = false;
                mensaje("DEBE SELECCIONAR UNA OPCIÓN DE DISEÑO PARA SU PRODUCTO", cbxDisenio);
            }
            //MODELO
            var sel = false;
            for (let i = 0; i < rbModelo.length; i++) {
                if (rbModelo[i].checked) {
                    sel = true;
                //  let res=rbModelo[i].value;
                break;
                }
            }
            if (!sel) {
                valido = false;
                mensaje("DEBE SELECCIONAR UN TIPO DE MODELO PARA PLASMAR EN SU PRODUCTO", rbModelo[0]);
            }
            //ESTADO
            var sel = false;
            for (let i = 0; i < rbEstado.length; i++) {
                if (rbEstado[i].checked) {
                    sel = true;
                //  let res=rbEstado[i].value;
                break;
                }
            }
            if (!sel) {
                valido = false;
                mensaje("DEBE SELECCIONAR EL ESTADO", rbEstado[0]);
            }
            return valido;
        }
        function mensaje(cadenaMensaje, elemento) {
            elemento.focus();
            elemento.style.boxShadow = '0 0 5px red, 0 0 5px red';

            if (elemento.id === "rb") {
                var nodoPadre = elemento;
            } else {
                var nodoPadre = elemento.parentNode;
            }


            var nodoMensaje = document.createElement("div");
            nodoMensaje.textContent = cadenaMensaje;
            nodoMensaje.setAttribute("class", "mensajeError");

            switch (elemento.id) {
                case "cbxProducto":
                    nodoMensaje.setAttribute("id", "error-producto");
                    break;
                case "txtCliente":
                    nodoMensaje.setAttribute("id", "error-cliente");
                    break;
                case "cbxDisenio":
                    nodoMensaje.setAttribute("id", "error-disenio");
                    break;
                case "rb":
                    nodoMensaje.style.marginTop = '-35px';
                    nodoMensaje.setAttribute("id", "error-modelo");
                    break;
                default:
                    break;
            }

            nodoPadre.appendChild(nodoMensaje);
            nodoMensaje.style.visibility = 'hidden';
        }

        function depurar() {            
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

