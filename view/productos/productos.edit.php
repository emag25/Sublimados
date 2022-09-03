

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CONTIENE UN FORMULARIO PARA DISEÑA EÑ PRODUCTO SUBLIMADO.">
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
        .dividir-seccion-dos{
            width: 65%;
            height: 75%;
            background-color: #2B2729;
            border-radius: 40px;
            padding: 40px;
            color: #FFFFFF;
            text-align: justify;
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
            color: #9EE9A1;
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
                <div class="dividir-seccion-dos"> 
                    
                





                













                
                </div>
            </section>
            
        </main>
            

        <?php require_once FOOTER; ?>
    </div>
    <script type="text/javascript">
        function validar(){
            var valido = true;
    
            //OBTENER ELEMENTOS 
            var cbxProducto = document.getElementById("cbxProductos");
            var txtNombre = document.getElementById("nom");
            var txtTelefono = document.getElementById("telf");
            var chbxColor = document.getElementsByClassName("color");
            var rbModelo = document.getElementsByName("modelo");
            var txtaObservacion = document.getElementById("obs");
    
            var letra = /^[a-z ,.'-]+$/i;
            var telefono = /^[09]+[0-9]{8}$/g;
    
            //VALIDACIONES
            //PRODUCTO
            if (cbxProducto.value === null || cbxProducto.value === '0') {
                valido = false;
                mensaje("DEBE SELECCIONAR UN PRODUCTO", cbxProducto);
            }
            //NOMBRE
            if(txtNombre.value === ''){
                valido = false;
                mensaje("DEBE INGRESAR SU NOMBRE",txtNombre);
            }else if (!letra.test(txtNombre.value)){
                valido = false;
                mensaje("EL NOMBRE DEBE CONTENER SOLO LETRAS", txtNombre);
            }else if(txtNombre.value.length >20){
                valido = false;
                mensaje("EL NOMBRE DEBE CONTENER MÁXIMO 20 CARACTERES", txtNombre); 
            }
            //TELEFONO
            if (txtTelefono.value === "") {
                valido = false;
                mensaje("DEBE INGRESAR TELEFONO", txtTelefono);
            } else if (!telefono.test(txtTelefono.value)) {
                valido = false;
                mensaje("NUMERO DE TELEFONO INCORRECTO", txtTelefono);
            }
            //COLORES
            sel = false; 
            cont=0; 
            for (let i = 0; i < chbxColor.length; i++) {
                if (chbxColor[i].checked) {
                    cont++;
                    sel = true;
                    if (chbxColor[i].value === '1') {
                        alert("MAXIMO DE SELECCION PERMITIDO : 3 ITEMS");
                    }
                }
            }
            if (!sel) {
                valido = false;
                mensaje("DEBE SELECCIONAR OPCIONES DE COLOR", chbxColor[0]);
            }
            if (cont<3) {
                valido = false;
                mensaje("DEBE SELECCIONAR AL MENOS 3 COLORES", chbxColor[0]);
            }
            //DISEÑO
            if (cbxDiseño.value === null || cbxDiseño.value === '0') {
                valido = false;
                mensaje("DEBE SELECCIONAR UNA OPCIÓN DE DISEÑO PARA SU PRODUCTO", cbxDiseño);
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
            //OBSERVACIONES
            if(txtaObservacion.value === ''){
                valido = false;
                mensaje("DEBE INGRESAR SUS OBSERVACIONES",txtaObservacion);
            }else if(txtaObservacion.value.length >100){
                valido = false;
                mensaje("LAS OBSERVACIONES DEBEN CONTENER MÁXIMO 100 CARACTERES", txtaObservacion); 
            }
            return valido;
        }
        function mensaje(cadenaMensaje, elemento) {
            elemento.focus();
            window.alert(cadenaMensaje);
        }

    
    </script>
</body>
</html>

