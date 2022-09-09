<!--   AUTOR: APRAEZ GONZALEZ EMELY MISHELL  -->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ESTA PAGINA CONTIENE LAS RESEÑAS DE LOS CLIENTES DE LA EMPRESA.">
    <meta name="keywords" content="Sublimados, Estampados, Camisetas, Tazas, Reseñas">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>RESEÑAS</title>
    <style>
        #escribe {
            color: #9EE9A1;
            font-weight: bold;
        }

        /* SECCION 2 */
        .seccion-segundo {
            height: auto;
        }

        #contenedorValoracion {
            display: flex;
            align-items: center;
            align-self: center;
            justify-content: center;
            flex-wrap: wrap;
            background-color: #2B2729;
            width: 90%;
            height: 70%;
            border-radius: 40px;
            margin: 60px;
        }

        #valoracion {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            justify-content: space-evenly;
            align-self: center;
            background-color: #D9D9D9;
            width: 90%;
            height: 70%;
            border-radius: 10px;
            margin: 40px;
        }

        #valoracionTotal {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-self: center;
            align-items: center;
            width: 300px;
            margin: 20px;
        }

        .bloqueEstrellas {
            display: grid;
            grid-template-columns: 50px 50px 50px 50px 50px;
            grid-template-rows: auto;
            margin: 10px;
        }

        .bloqueEstrellas img {
            width: 50px;
        }

        #valoracionPorEstrella {
            display: flex;
            justify-content: center;
            align-items: center;
            align-self: center;
            width: 500px;
            margin: 20px;
        }

        #valoracionPorEstrella p {
            margin: 15px;
        }

        #bloqueNumeroEstrellas {
            margin-left: -230px;
        }

        #bloqueNumeroEstrellas p {
            text-align: center;
            font-weight: bold;
        }

        #bloqueBarras {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-self: center;
            align-items: center;
        }

        meter::-webkit-meter-bar {
            background: white;
            width: 300px;
            height: 20px;
        }

        /* SECCION 3 */
        .seccion-tercero {
            flex-direction: column;
            height: auto;
        }

        h2.reseña {
            margin: 60px 0 60px 0;
            padding: 20px 0 20px 0;
            border-top: #2B2729 solid 1px;
            border-bottom: #2B2729 solid 1px;
            text-align: center;
        }

        #bloqueReseñas1 {
            display: flex;
            flex-direction: column;
            align-self: center;
            align-items: center;
            align-content: center;
            justify-content: center;
            flex-wrap: wrap;
            background-color: #D4F4DB;
            width: 90%;
            height: 70%;
            border-radius: 40px;
            padding-top: 10px;
            padding-bottom: 30px;
            margin-bottom: 60px;
        }

        .bloque {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            gap: 70px;
            height: auto;
            margin: 0px 40px 0px 40px;
        }

        .reseñas1 {
            display: flex;
            flex-direction: column;
            align-self: center;
            align-items: center;
            justify-content: center;
            background-color: #2B2729;
            width: 450px;
            height: 200px;
            border-radius: 20px;
            margin: 60px 0px 20px 0px;
            padding: 20px;
        }

        .reseñas1 .reseñasEstrellas {
            display: grid;
            grid-template-columns: 40px 40px 40px 40px 40px;
            grid-template-rows: auto;
            margin-top: -50px;
            margin-bottom: 20px;
            background-color: #2B2729;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 3px 2px #4B4B4B;
            justify-items: center;
        }

        .reseñasEstrellas img {
            width: 30px;
        }

        .reseñas1 p {
            color: #D9D9D9;
            text-align: center;
        }

        .desplazadores {
            display: flex;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        input[type="radio"] {
            appearance: none;
            margin: 10px;
            width: 25px;
            height: 25px;
            background-clip: content-box;
            border: 2px solid #4B4B4B;
            background-color: #4B4B4B;
            border-radius: 50%;
            cursor: pointer;
        }

        input[type="radio"]:checked {
            padding: 3px;
            background-color: #4B4B4B;
        }

        /* SECCION 4 */
        .seccion-cuarto {
            flex-direction: column;
            height: auto;
        }

        #bloqueReseñas2 {
            display: flex;
            align-self: center;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            background-color: #2B2729;
            width: 90%;
            height: 70%;
            border-radius: 40px;
            padding: 30px 10px 30px 10px;
            margin-bottom: 60px;
        }

        .reseñas2 {
            display: flex;
            flex-direction: column;
            align-self: center;
            align-items: center;
            justify-content: center;
            background-color: #D9D9D9;
            width: 270px;
            height: auto;
            border-radius: 10px;
            margin: 60px 40px 30px 40px;
            padding: 20px;
        }

        .reseñas2 p {
            text-align: center;
        }

        .reseñas2 .reseñasEstrellas {
            display: grid;
            grid-template-columns: 40px 40px 40px 40px 40px;
            grid-template-rows: auto;
            justify-items: center;
        }

        .redSocialReseña {
            border-radius: 180px;
            background-color: #2B2729;
            margin-bottom: 20px;
            margin-top: -60px;
        }

        .redSocialReseña img {
            width: 100px;
        }

        blockquote p::before {
            content: "«";
        }

        blockquote p::after {
            content: "»";
        }

        p.nombreCliente {
            font-style: italic;
            font-weight: bold;
        }

        p.nombreCliente::before {
            content: "- ";
        }

        #leyendaNewReseña:hover,
        #valoracion .bloqueEstrellas:hover,
        .contenedores:hover,
        .reseñas1:hover,
        .reseñas2:hover {
            transform: scale(1.05);
            transition: 0.5s;
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
                    margin-right:auto;">
                        <h2 id="encabezado">NUESTROS CLIENTES</h2>
                        <h3 style="margin-top: -10px;">SUBLIMADOS SUPERIUM</h3>
                        <p id="parrafo" style="width: 400px; color: #4B4B4B; text-align: justify;">
                            Verte satisfecho es nuestro objetivo principal. Por eso nos caracterizamos por brindar
                            productos de calidad y un excelente servicio al cliente.
                            <br><br>Lee las reseñas de algunos de nuestros clientes, y si ya probaste alguno de nuestros
                            productos
                            escribe tu reseña dando <a href="ApraezEmely2.html" id="escribe">click aquí</a>.
                        </p>
                    </div>

                    <div class="seccion-uno-derecho">
                        <div class="circulo" id="circulo-arriba"></div>
                        <div class="circulo" id="circulo-medio">
                            <img src="assets/img/resenia.png" alt="reseña">
                        </div>
                        <div class="circulo" id="circulo-abajo"></div>
                    </div>
                </div>
            </section>

            <section class="seccion-segundo">

                <div id="contenedorValoracion">
                    <div id="valoracion">
                        <div id="valoracionTotal">
                            <h2 style="font-size: 40pt; margin: 10px 0px 0px 0px;">4.5</h2>
                            <div class="bloqueEstrellas">
                                <img src="assets/img/estrella.png" alt="estrella1">
                                <img src="assets/img/estrella.png" alt="estrella2">
                                <img src="assets/img/estrella.png" alt="estrella3">
                                <img src="assets/img/estrella.png" alt="estrella4">
                                <img src="assets/img/mediaEstrella.png" alt="estrellamedia">
                            </div>
                            <p>583 reseñas en total</p>
                        </div>

                        <div id="valoracionPorEstrella">
                            <div id="bloqueNumeroEstrellas">
                                <p>5 estrellas</p>
                                <p>4 estrellas</p>
                                <p>3 estrellas</p>
                                <p>2 estrellas</p>
                                <p>1 estrella</p>
                            </div>

                            <div id="bloqueBarras">
                                <meter class="barraValoracion" max="583" value="400" title="400/583 estrellas"></meter>
                                <br>
                                <meter class="barraValoracion" max="583" value="170" title="170/583 estrellas"></meter>
                                <br>
                                <meter class="barraValoracion" max="583" value="10" title="10/583 estrellas"></meter>
                                <br>
                                <meter class="barraValoracion" max="583" value="3" title="3/583 estrellas"></meter> <br>
                                <meter class="barraValoracion" max="583" value="0" title="0/583 estrellas"></meter>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="seccion-tercero">
                <h2 class="reseña">RESEÑAS DE NUESTRO SITIO WEB</h2>
                <div id="bloqueReseñas1">

                    <div class="bloque"></div>

                    <div class="desplazadores">
                        <input type="radio" name="radio" value="1" class="radio" checked>
                        <input type="radio" name="radio" value="2" class="radio">
                        <input type="radio" name="radio" value="3" class="radio">
                        <input type="radio" name="radio" value="4" class="radio">
                    </div>

                </div>
            </section>

            <section class="seccion-cuarto">
                <h2 class="reseña">RESEÑAS DE NUESTRAS REDES SOCIALES</h2>
                <div id="bloqueReseñas2">
                    <div class="reseñas2">
                        <div class="redSocialReseña">
                            <img src="assets/img/fb.png" alt="facebook">
                        </div>

                        <div class="reseñasEstrellas">
                            <img src="assets/img/estrella.png" alt="estrella1">
                            <img src="assets/img/estrella.png" alt="estrella2">
                            <img src="assets/img/estrella.png" alt="estrella3">
                            <img src="assets/img/estrella.png" alt="estrella4">
                            <img src="assets/img/estrella.png" alt="estrella5">
                        </div>

                        <div class="textoReseñas">
                            <blockquote>
                                <p>Los conocí en la red social Facebook y contacté con ellos por Messenger. Aunque me
                                    contestó un bot, me guió
                                    bastante bien en todo lo que solicitaba. Finalmente realicé mi pedido y quedé
                                    encantada con el producto.</p>
                            </blockquote>
                            <p class="nombreCliente">Beatriz Pinzón</p>
                        </div>
                    </div>

                    <div class="reseñas2">
                        <div class="redSocialReseña">
                            <img src="assets/img/ig.png" alt="instagram">
                        </div>

                        <div class="reseñasEstrellas">
                            <img src="assets/img/estrella.png" alt="estrella1">
                            <img src="assets/img/estrella.png" alt="estrella2">
                            <img src="assets/img/estrella.png" alt="estrella3">
                            <img src="assets/img/estrella.png" alt="estrella4">
                            <img src="assets/img/estrella.png" alt="estrella5">
                        </div>

                        <div class="textoReseñas">
                            <blockquote>
                                <p>Una amiga me recomendó su página de Instagram y me encantó lo que vi! Hicieron un
                                    trabajo increíble en mi
                                    pedido y me quedé muy impresionada con la calidad del producto. Sin duda, volveré a
                                    comprar aquí la próxima vez que necesite sublimados.</p>
                            </blockquote>
                            <p class="nombreCliente">Armando Mendoza</p>
                        </div>
                    </div>

                    <div class="reseñas2">
                        <div class="redSocialReseña">
                            <img src="assets/img/tw.png" alt="twitter">
                        </div>

                        <div class="reseñasEstrellas">
                            <img src="assets/img/estrella.png" alt="estrella1">
                            <img src="assets/img/estrella.png" alt="estrella2">
                            <img src="assets/img/estrella.png" alt="estrella3">
                            <img src="assets/img/estrella.png" alt="estrella4">
                            <img src="assets/img/estrella.png" alt="estrella5">
                        </div>

                        <div class="textoReseñas">
                            <blockquote>
                                <p>Me encanta este lugar porque los diseños son muy detallados y se ven increíbles en
                                    las piezas de ropa.
                                    También me gusta el hecho de que puedes personalizar los diseños para que se ajusten
                                    a tus necesidades.</p>
                            </blockquote>
                            <p class="nombreCliente">Marcela Valencia</p>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <?php require_once FOOTER; ?>
        <script type="text/javascript">

            var bloque = document.getElementsByClassName("bloque")[0];
            var radios = document.getElementsByName("radio");
            var resenia = [];
            var cliente = [];
            var resultadosResenias = [];
            var resultadosClientes = [];
            var c = 0;

            <?php   
            foreach($resultados as $fila) {  ?>
                resultadosResenias[c] = "<?php echo $fila->resenia; ?>";
                resultadosClientes[c] = "<?php echo $fila->nombre; ?>";
                c++;
            <?php       
            } 
            ?>         

            radios[0].addEventListener('click', ponerResenia);      
            radios[1].addEventListener('click', ponerResenia);
            radios[2].addEventListener('click', ponerResenia);
            radios[3].addEventListener('click', ponerResenia);

            ponerResenia();     

            function eliminarResenia() {
                
                var res = document.getElementsByClassName("reseñas1");
                if(res.length !== 0){
                    res[1].remove();
                    res[0].remove();
                }                
            }            

            function crearResenia(resenia, nombre) {

                for (let i = 0; i < 2; i++) {

                    // Crea estrellas
                    let imagen1 = document.createElement("img");
                    imagen1.src = "assets/img/estrella.png";
                    imagen1.alt = "estrella1";

                    let imagen2 = document.createElement("img");
                    imagen2.src = "assets/img/estrella.png";
                    imagen2.alt = "estrella2";

                    let imagen3 = document.createElement("img");
                    imagen3.src = "assets/img/estrella.png";
                    imagen3.alt = "estrella3";

                    let imagen4 = document.createElement("img");
                    imagen4.src = "assets/img/estrella.png";
                    imagen4.alt = "estrella4";

                    let imagen5 = document.createElement("img");
                    imagen5.src = "assets/img/estrella.png";
                    imagen5.alt = "estrella5";

                    // Crea contenedor de estrellas
                    let divResEstrellas = document.createElement("div");
                    divResEstrellas.className = "reseñasEstrellas";
                    divResEstrellas.appendChild(imagen1);
                    divResEstrellas.appendChild(imagen2);
                    divResEstrellas.appendChild(imagen3);
                    divResEstrellas.appendChild(imagen4);
                    divResEstrellas.appendChild(imagen5);

                    // Crea resenia
                    let texto = document.createElement("p");
                    texto.textContent = resenia[i];

                    let quote = document.createElement("blockquote");
                    quote.appendChild(texto);

                    let cliente = document.createElement("p");
                    cliente.className = "nombreCliente";
                    cliente.textContent = nombre[i];

                    // Crea contenedor de resenia
                    let divTexto = document.createElement("div");
                    divTexto.className = "textoReseñas";
                    divTexto.appendChild(quote);
                    divTexto.appendChild(cliente);

                    // Crea contenedor de contenedores estrellas y resenia
                    var divRes1 = document.createElement("div");
                    divRes1.className = "reseñas1";
                    divRes1.appendChild(divResEstrellas);
                    divRes1.appendChild(divTexto);

                    bloque.appendChild(divRes1);
                }
            }

            function ponerResenia() {

                eliminarResenia();

                let valor;
                for (let i = 0; i < radios.length; i++) {
                    if (radios[i].checked) {
                        valor = radios[i].value;
                    }
                }

                switch (valor) {
                    case "1":
                        resenia[0] = resultadosResenias[0];
                        cliente[0] = resultadosClientes[0];
                        resenia[1] = resultadosResenias[1];
                        cliente[1] = resultadosClientes[1];
                        break;
                    case "2":
                        resenia[0] = resultadosResenias[2];
                        cliente[0] = resultadosClientes[2];
                        resenia[1] = resultadosResenias[3];
                        cliente[1] = resultadosClientes[3];
                        break;
                    case "3":
                        resenia[0] = resultadosResenias[4];
                        cliente[0] = resultadosClientes[4];
                        resenia[1] = resultadosResenias[5];
                        cliente[1] = resultadosClientes[5];
                        break;
                    case "4":
                        resenia[0] = resultadosResenias[6];
                        cliente[0] = resultadosClientes[6];
                        resenia[1] = resultadosResenias[7];
                        cliente[1] = resultadosClientes[7];
                        break;
                    default:
                        break;
                }

                crearResenia(resenia, cliente);
            }

        </script>
    </div>
</body>

</html>