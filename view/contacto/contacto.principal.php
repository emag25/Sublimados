<!--   AUTOR: QUITO YAMBAY RUTH MARIA  -->
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
    <meta name="description" content="CONTIENE LAS FORMAS DISPONIBLES DE CONTACTO EN REDES SOCIALES.">
    <meta name="keywords" content="Sublimados, Estampados, Camisetas, Tazas, Contacto">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>CONTACTOS</title>
    <style>
         #seccion-3{
            height: 500px;
        }

        h1{
            color:black;
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            text-align: center;
            height: 5%;                  
        }

        .parrafo-2{
            width: 85%; color: #4B4B4B; text-align: justify;
        }

        .parrafo::selection{            
            background-color: #D4F4DB;
        }

        [id="titulo3"]{
            font-style: italic;
        }

        .obligatorio{
            color: red;
        }   

        .bloque{
            width: 90%;            
            background-color: #2B2729;
        }

        .bloque{
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            align-items: center;
        }

        .bloque-uno{
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            align-items: center;
            background-color: #2B2729;
            border-radius: 40px;
            height: 350px;
        }

        .bloque-uno div:nth-child(1){
            width: 30%;
            height: 70%;
            border-radius: 10px;
            background-color: #D9D9D9;            
        }

        .bloque-uno div:nth-child(2){
            width: 30%;
            height: 70%;
            border-radius: 10px;
            background-color: #D9D9D9;
        }

        .bloque-uno div:nth-child(3){
            width: 30%;
            height: 70%;
            border-radius: 10px;
            background-color: #D9D9D9;
        }

        .bloque-dos{
            background-color: #D4F4DB;
            border-radius: 40px;
            height: 80%;           
        }

        .seccion-segundo{
            display: flex;
            flex-wrap: wrap;
            height: auto;
            justify-content: center;  
        }

        .bloque-dos div:nth-child(1){
            width: 60%;
            height: 80%;
            border-radius: 10px;
            background-color: #D9D9D9;
        }

        #docker{
            margin: auto;
        }

        #horario{
            background-color:black; 
            width: 200px; 
            height: 40px; 
            border-radius: 10px;  
            border:0; 
            color: white;
            border-width: 10px; 
            margin-top: 10px;  
            padding-left: 10px;
            margin-bottom: 20px; 
            padding-top: 15px; 
        }

        .bloque-dos div:nth-child(2){
            width: 28%;
            height: 47%;
            border-radius: 10px;
            background-color: #2B2729;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .bloque div:hover{
            transform: scale(1.05);
            transition: 0.5s;
        }
    
        @media (max-width: 857px) {/* Para modificar el tamaño de letra cuando diminuye el tamaño de pantalla */
            .parrafo-2{
           font-size: 10px;
        }                     
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
                        <h3 id="titulo3" style="margin-top: -10px;">Gracias por visitarnos!</h3>
                        <h1>SUPERIUM</h1>                                                                 
                        <p class="parrafo" style="width: 500px; color: #4B4B4B; text-align: justify;">
                            Si te han gustado nuestros productos no dudes en contactarnos.
                            ¿Còmo te contactas? a continuaciòn podràs ver las diferentes formas
                            de contactarnos y solicitar nuestro servicios.
                            Porque nuestro mayor objetivo es brindarte un servicio muy còmodo y de calidad.</p>
                    </div>
                    <div class="seccion-uno-derecho">
                        <div class="circulo" id="circulo-arriba"></div>
                        <div class="circulo" id="circulo-medio">
                            <!-- La imagen esta en  128px redondeada (fuente: flaticon.com) -->
                            <img src="assets/img/contactoR.gif" alt="contacto" width="300" height="300">
                        </div>
                        <div class="circulo" id="circulo-abajo"></div>
                       </div>
                </div>
            </section>
            <section class="seccion-segundo">
                <div class="bloque bloque-uno">
                    <div style="justify-content: center; align-items: center; display: flex; flex-direction: column;">
                        <h1>Facebook</h1>
                        <a id="link1" onmouseover="desplegarDiv(this)" onmouseout="ocultarDiv(this)" style="width: 50%; height: 40%; display: flex; justify-content: center; align-items: center;" href="https://www.facebook.com/"><img style="width: 60%; height: 100%;" src="assets/img/faceR.png" alt="contarse por facebook"></a>                        
                        <p class="parrafo parrafo-2">
                            Contáctanos por Facebook y conoce más de nuestros productos y servicos.</p>
                    </div>
                    <div style="justify-content: center; align-items: center; display: flex; flex-direction: column;">
                        <h1>Instagram</h1>
                        <a id="link2" onmouseover="desplegarDiv(this)" onmouseout="ocultarDiv(this)" style="width: 50%; height: 40%; display: flex; justify-content: center; align-items: center;" href="https://www.instagram.com/"><img style="width: 60%; height: 100%;" src="assets/img/instaR.png" alt="contáctanos por instagrama" width="100" height="100"></a>
                        <p class="parrafo parrafo-2">
                            Curiosea Instagram y averigua los precios por servicio y la forma de atención al cliente.</p>
                    </div>
                    <div style="justify-content: center; align-items: center; display: flex; flex-direction: column;">
                        <h1>WhatsApp</h1>
                        <a id="link3" onmouseover="desplegarDiv(this)" onmouseout="ocultarDiv(this)" style="width: 50%; height: 40%; display: flex; justify-content: center; align-items: center;" href="https://web.whatsapp.com/"><img style="width: 60%; height: 100%;" src="assets/img/whatsappR.png" alt="Escríbenos por whatsapp" width="100" height="100"></a>
                        <p class="parrafo parrafo-2">
                            Si necesita nuestro servicio para el momento solo escríbenos al WthasApp y le atenderemos al instantes.</p>
                    </div>
                </div> 
                <div class="bloque bloque-dos">
                    <div id="docker"></div>
                </div>
            </section>

            <section class="seccion-tercero" id="seccion-3">
                <div class="bloque bloque-dos">
                    <div class="HorarioAtencion">                               
                             <fieldset style = "width: auto;">
                                <legend  id="horario">HORARIOS DE ATENCIÓN </legend>
                                <p style="display: flex; flex-direction: column; justify-content: center; align-items: center; width: 95%; text-align: center;">
                                    <b>Disfruta de nuestro servico:</b>  
                                    <b>Lunes a viernes: </b>8:00 am hasta 8:30 pm
                                    <b>Sábados:</b> 10:00 hasta 5:00 pm
                                    <b>Domingos:</b>10:00 hasta 12:00 pm
                                    <b>Feriados:</b> No hay atención al público.
                                </p> 
                             </fieldset>   
                    </div>
                    <div>
                        <img style= "width: 83%; height: 85%;" src="assets/img/ruth-hora.gif" alt="correo">
                    </div>
                </div>
            </section>            
        </main>
        <script type="text/javascript">
            
            var docker = document.getElementById("docker");
            var foto = document.createElement("img");
            foto.style.width = '200 px';
            foto.style.height = '200px';
            foto.style.marginLeft = '80px';
            foto.style.justifyContent='center';
         
            function desplegarDiv(elemento){                
                var nodo = elemento.id;
                docker.style ="visibility: visible;";

                switch (nodo){
                    case "link1":
                        foto.src = 'assets/img/ruth-facebook.png';
                        break;
                    case "link2":
                        foto.src = 'assets/img/ruth-instagram.png';
                        break;
                    case "link3":
                        foto.src = 'assets/img/ruth-whatsapp.png';
                        break;
                    default:
                        break;
                }
                docker.appendChild(foto);
            }
            function ocultarDiv(elemento){                          
                docker.removeChild(foto);
                docker.removeChild(texto);
                docker.style ="visibility: hidden;";
                } 
        </script>
    
    <?php require_once FOOTER; ?>
    </div>
    
</body>
</html>