<!--   AUTOR: YANEZ GUILLEN PAULA ADRIANA  -->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CONTIENE LOS SERVICIOS DISPONIBLES DE LA EMPRESA.">
    <meta name="keywords" content="Sublimados, Estampados, Camisetas, Tazas, Servicios">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>SERVICIOS</title>
    <style>
        img.imgs {
            display: block;
            margin: 0px auto;
        }

        .bloque {
            width: 90%;
            height: 350px;
            background-color: #2B2729;
        }

        .bloque {
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            align-items: center;
        }

        .bloque-uno {
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            align-items: center;
            background-color: #2B2729;
            border-radius: 40px;
        }

        .bloque-uno div:nth-child(1) {
            width: 60%;
            height: 70%;
            border-radius: 10px;
            background-color: #D9D9D9;
        }

        .bloque-uno div:nth-child(2) {
            width: 30%;
            height: 70%;
            border-radius: 10px;
            background-color: #D9D9D9;
        }

        .bloque-dos {
            background-color: #D4F4DB;
            border-radius: 40px;
        }

        .bloque-dos div:nth-child(1) {
            width: 30%;
            height: 70%;
            border-radius: 10px;
            background-color: #2B2729;
        }

        .bloque-dos div:nth-child(2) {
            width: 30%;
            height: 70%;
            border-radius: 10px;
            background-color: #2B2729;
        }

        .bloque-tres {
            background-color: #2B2729;
            border-radius: 40px;
        }

        .bloque-tres div:nth-child(1) {
            width: 30%;
            height: 70%;
            border-radius: 10px;
            background-color: #D9D9D9;
        }

        .bloque-tres div:nth-child(2) {
            width: 60%;
            height: 70%;
            border-radius: 10px;
            background-color: #D9D9D9;
        }

        .bloque-cuatro {
            background-color: #D4F4DB;
            border-radius: 40px;
        }

        .bloque-cuatro div:nth-child(1) {
            width: 30%;
            height: 70%;
            border-radius: 10px;
            background-color: #2B2729;
        }

        .bloque-cuatro div:nth-child(2) {
            width: 30%;
            height: 70%;
            border-radius: 10px;
            background-color: #2B2729;
        }

        .bloque-cuatro div:nth-child(3) {
            width: 30%;
            height: 70%;
            border-radius: 10px;
            background-color: #2B2729;
        }

        .bloque div:hover {
            transform: scale(1.05);
            transition: 0.5s;
        }

        .bloque-parrafo{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        p {

            text-align: justify;
            width: 600px;
        }

        #items {
            font-size: small;
        }

        div figure figcaption {
            background-color: #9EE9A1;
        }

        ul li::marker {
            color: red;
            font-size: 1.5em;
        }

        img[alt] {
            border-radius: 10px;
        }

        q,figcaption {
            font-style: oblique;
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
                        <h2 id="encabezado"><i>NUESTROS SERVICIOS</i></h2>
                        <h3 style="margin-top: -10px;">SUBLIMADOS SUPERIUM</h3>
                        <p id="parrafo" style="width: 400px; color: #4B4B4B; text-align: justify;">
                            Sublimados Superium te ofrece servicios de sublimados en tazas, camisas, almohadas. Tenemos
                            los obsequios ideales para los momentos ideales. ¡Personaliza ya con nosotros!
                            <br>
                            <q>Calidad y armonía en tus regalos</q>
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
                <div class="bloque bloque-uno">
                    <div class="bloque-parrafo">
                        <p><strong>Las tazas sublimadas</strong> con tu diseño personalizado son un detalle bonito,
                            especial e innolvidable. <br> <br>
                            Anímate a sorprender a tu ser querido con un detalle pensado para él/ella. ¡Nosotros te
                            ayudamos! Sólo debes darnos las <abbr title="imágenes">imgs</abbr> y el resto es historia.
                        </p>
                    </div>
                    <div>
                        <figure>
                            <img src="assets/img/taza.gif" class="imgs" width="225" height="215" alt="img7">
                            <figcaption>Tazas personalizadas</figcaption>
                        </figure>
                    </div>
                </div>
            </section>
            <section class="seccion-tercero">
                <div class="bloque bloque-dos">

                    <div> <br><img src="assets/img/1.png" class=" imagen-change imgs" id="img-uno" width="225" height="200" alt="img6"></div>
                    <div> <br><img src="assets/img/2.jpg" class=" imagen-change imgs" id="img-dos" width="225" height="200" alt="img5"></div>
                </div>
            </section>
            <section class="seccion-cuarto">
                <div class="bloque bloque-tres">
                    <div>
                        <figure>
                            <img src="assets/img/3.jpg" class="imgs" width="250" height="200" alt="img4">
                            <figcaption>Placas para mascotas</figcaption>
                        </figure>
                    </div>
                    <div class="bloque-parrafo">
                        <p> Para el mejor amigo del hombre y cualquier mascota contamos <strong>placas personalizadas.
                            </strong> El nombre de tu amiguito en una placa metálica para evitar pérdidas. ¡Solícitalo
                            ya en Sublimados
                            Superium! <br>
                            Medidas: </p>

                        <ul id="items">
                            <li>5 cm de largo- 3 cm de ancho</li>
                            <li>Colores:Plateado, Rose gold, dorado</li>
                        </ul>
                    </div>
                </div>
            </section>
            <section class="seccion-quinto">
                <div class="bloque bloque-cuatro">
                    <div><br><img class="imgs" src="assets/img/estam.gif" width="225" height="200" alt="img"></div>
                    <div><br><img class=" imgs" src="assets/img/termo.jpg" width="225" height="200" alt="img2"></div>
                    <div><br><img class="imgs"  src="assets/img/mochila.jpg"  width="225" height="200" alt="img3"></div>
                </div>
            </section>

        </main>

        <?php require_once FOOTER; ?>   
    </div>

    
    <script>
        var nodo=document.querySelectorAll(".imagen-change");
        var img_uno=document.getElementById("img-uno");
        var img_dos=document.getElementById("img-dos");
        img_uno.addEventListener("mouseover",() =>cambiarImagen(nodo[0]));
        img_dos.addEventListener("mouseover",() =>cambiarImagen(nodo[1]));

        img_uno.addEventListener("mouseout",normalizarImagen);
        img_dos.addEventListener("mouseout",normalizarImagen);

        function cambiarImagen(nodo){
            if(nodo.id=="img-uno"){
               
                img_dos.src="assets/img/paula-mameluco.jpg";
            }else if(nodo.id=="img-dos"){
                
                img_uno.src="assets/img/paula-almohada.jpg"; 
            }
        }

        function normalizarImagen(){
            img_uno.src="assets/img/1.png";
            img_dos.src="assets/img/2.jpg";
        }
    </script>

</body>

</html>