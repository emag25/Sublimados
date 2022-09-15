<!--AUTOR:SICHA VEGA BETSY ARLETTE-->
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
    <meta name="description" content="CONTIENE LA VARIEDAD DE DISEÑO DE PRODUCTOS DISPONIBLES DENTRO DE SUPERIUM.">
    <meta name="keywords" content="Sublimados, Estampados, Camisetas, Tazas,Productos">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        /* ESTILO INTERNO */
        /* SELECTOR UNIVERSAL */
        *{
            font-family: 'Inter', sans-serif;
        }
        /* SELECTOR POR ELEMENTO */
        p, h2{
            text-align: center;
            
        }
        h6{
            text-align: right;
        }
        /* SELECTOR DE CLASE */
        .dividir-seccion-uno{
            
            width: 80%;
            height: 90%;
            margin:auto;
            font-size: 14px;
            border-radius: 40px;
            display: flex; 
            flex-direction: row;
            justify-content:center;
            align-items: center;
            
        }
        .dividir-seccion-dos{
            width: 80%;
            height: 90%;
            background-color: #2B2729;
            border-radius: 40px;
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            flex-direction: column;
        }
        .dividir-seccion-tres{
            width: 80%;
            height: 90%;
            background-color: #2B2729;
            border-radius: 40px;
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            flex-direction: column;
        }
        .dividir-seccion-cuatro{
            width: 80%;
            height: 90%;
            background-color: #2B2729;
            border-radius: 40px;
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            flex-direction: column;
        }
        .dividir-seccion-cinco{
            width: 80%;
            height: 90%;
            background-color: #2B2729;
            border-radius: 40px;
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            flex-direction: column;
        }
        /* SELECTOR DE PSEUDOCLASE */
        .dividir-seccion-uno div:nth-child(1){
            border-radius: 20px;
            width: 80%;
            height: 90%;
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            align-items: center;
        }

        .dividir-seccion-dos div:nth-child(1){
            background-color: #D9D9D9;
            border-radius: 20px;
            width: 70%;
            height: 40%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;            
        }    
        .dividir-seccion-tres div:nth-child(1){
            background-color: #D9D9D9;
            border-radius: 20px;
            width: 70%;
            height: 40%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;            
        }    
        .dividir-seccion-cuatro div:nth-child(1){
            background-color: #D9D9D9;
            border-radius: 20px;
            width: 70%;
            height: 40%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;            
        }   
        .dividir-seccion-cinco div:nth-child(1){
            background-color: #D9D9D9;
            border-radius: 20px;
            width: 70%;
            height: 40%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;            
        }     
        
        .dividir-seccion-dos div:nth-child(2){
            
            border-radius: 20px;
            width: 70%;
            height: 45%;
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            align-items: center;
        }
        .dividir-seccion-tres div:nth-child(2){
            
            border-radius: 20px;
            width: 70%;
            height: 45%;
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            align-items: center;
        }
        .dividir-seccion-cuatro div:nth-child(2){
            
            border-radius: 20px;
            width: 70%;
            height: 45%;
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            align-items: center;
        }
        .dividir-seccion-cinco div:nth-child(2){
            
            border-radius: 20px;
            width: 70%;
            height: 45%;
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            align-items: center;
        }
       
        .imagenes-dos div:nth-child(1){
            background-color: #D9D9D9;
            width: 35%;
            height: 100%;
        }
        .imagenes-tres div:nth-child(1){
            background-color: #D9D9D9;
            width: 35%;
            height: 100%;
        }
        .imagenes-cuatro div:nth-child(1){
            background-color: #D9D9D9;
            width: 35%;
            height: 100%;
        }
        .imagenes-cinco div:nth-child(1){
            background-color: #D9D9D9;
            width: 35%;
            height: 100%;
        }
        .imagenes-dos div:nth-child(2){
            background-color: #D9D9D9;
            width: 35%;
            height: 100%;
        }
        .imagenes-tres div:nth-child(2){
            background-color: #D9D9D9;
            width: 35%;
            height: 100%;
        }
        .imagenes-cuatro div:nth-child(2){
            background-color: #D9D9D9;
            width: 35%;
            height: 100%;
        }
        .imagenes-cinco div:nth-child(2){
            background-color: #D9D9D9;
            width: 35%;
            height: 100%;
        }
        .imagenHvr img:hover{
            transform: scale(1.05);
            transition: 0.5s;
        }
        .dividir-seccion-dos div:hover{
            transform: scale(1.05);
            transition: 0.5s;
        }
        .dividir-seccion-tres div:hover{
            transform: scale(1.05);
            transition: 0.5s;
        }
        .dividir-seccion-cuatro div:hover{
            transform: scale(1.05);
            transition: 0.5s;
        }
        .dividir-seccion-cinco div:hover{
            transform: scale(1.05);
            transition: 0.5s;
        }
        /* SELECTOR DE ID */
        
        #introduccion{
           
            width: 90%;
            height: 95%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        
        #concepto-dos{   
            width: 95%;
            height: 95%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        #concepto-tres{   
            width: 95%;
            height: 95%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        #concepto-cuatro{   
            width: 95%;
            height: 95%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        #concepto-cinco{   
            width: 95%;
            height: 95%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        #CYA, #GRRS, #TZ, #BL{
            margin: 0;
        }

        #CYAC, #GRRSC, #TZC, #BLC{
            margin: 0;
            text-align: justify;
            width: 400px;
        }
        /*SELECTOR DE COMBINADOR: DESCENDIENTES*/
        div span{
            background-color:#D4F4DB;
            border-radius: 5px;
        }
        /*SELECTOR DE PSEUDOELEMENTOS: FIRST LETTER*/
        p::first-letter{
            font-size: 20px;
        }
        /* SELECTOR DE ATRIBUTO: IGUAL A */
        h2[class="Titulos"]
        {
            color: #000000;
        }
        @media (max-width:810px){
            #CYAC, #GRRSC, #TZC, #BLC{
                width: 300px;
            }
            #CYA, #GRRS, #TZ, #BL{
                width: 300px;
            }
        }
        @media (max-width:671px){
            #CYAC, #GRRSC, #TZC, #BLC{
                width: 200px;
                font-size: 12px;
            }
            #CYA, #GRRS, #TZ, #BL{
                width: 200px;
                font-size: 14px;
            }
        }
        @media (max-width:405px){
            #CYAC, #GRRSC, #TZC, #BLC{
                display: none;
            }
            #CYA, #GRRS, #TZ, #BL{
                
                font-size: 9px;
            }
            #tallas{
                display: none;
            }
        }
    </style>
    <title>DISEÑO DE PRODUCTOS</title>
</head>
<body>
    <div class="contenedor-principal">
    <?php require_once HEADER; ?>
    
        <main>
            <section class="seccion-primero">
                <div id="arriba" class="dividir-seccion-uno">                   
                    <div id="contenido"> 
                        <div id="introduccion" onclick="cambiarContenido(this)" >                            
                            <h2 style="margin: 45px 0 0 0; font-size: 24px;" id="INT" class="Titulos"> <b> PRODUCTOS DISPONIBLES </b> </h2> <br>                         
                            <p style="margin: 5px 0 0 0;"> A Continuación presentamos todos los productos disponibles en  <br>
                                Sublimados Superium brindandoles comodidad, variedad y opciones innovadoras  <br>
                                para su elección, ofreciendoles una experiencia única y satisfactoria con nuestros productos.   <br>
                                Entre nuestros productos tenemos:
                            </p>                          
                            <ul>
                                <li> Camisetas y Abrigos </li>
                                <li> Gorras </li>
                                <li> Tazas </li>
                                <li> Bolsos</li>
                            </ul>
                            <p style="margin: 5px 0 0 0;"> Materiales disponibles: </p>

                                <dl>
                                    <dt> Tipo de tela </dt>
                                    <dd> Algodón </dd>
                                    <dd> lonas </dd>
                                    <dd> Lienzo</dd>
                                    <dt> Tipo de Vidrio</dt>
                                    <dd> Porcelana </dd>
                                    <dd> Cerámica</dd>
                                </dl>
                                <img style="width: 5%; height: 20%; border-radius: 10px; " src="assets/img/Click.png" alt="clickAqui">
                        </div>
                    </div>
                    <div class="imagenHvr">
                        <figure style="float: right;">
                            <img id="lg" onmouseover="cambiarImagen(this)" onmouseout="inicio()" style="border-radius: 20px;" src="assets/img/LogoProducto.PNG">
                            <figcaption style="text-align: right; font-size: 9px; padding-top: 10px;"> Sublimados Superium </figcaption>
                        </figure>
                    </div>
                </div>
            </section>
            
            <section class="seccion-segundo">
                <div class="dividir-seccion-dos">
                    <div>
                        <div id="concepto-dos" >
                            <h2 id="CYA" class="Titulos"> <b> CAMISETAS Y ABRIGOS </b> </h2>                          
                            <!--ESTILO EN LÍNEA-->
                            <span id="tallas" style="color: #7dc580"> <i> <b> Tallas: XS, S, M, L, XL, XXL </b></i> </span>
                            <p id="CYAC"> Hacemos estampados a camisetas y abrigos con la imagen de su preferencia, 
                                Tenemos todas las tallas disponibles y una variedad de colores para su elección 
                            </p>
                            <h6 style="margin: 5px 0 0 0; font-weight: bold;"> Precio: $20</h6>
                        </div>
                    </div>
                    <div class="imagenes-dos">                        
                        <div>
                            <img style="width: 65%; height: 80%; border-radius: 10px; " src="assets/img/Abrigo.jpg" alt="abrigo">
                        </div>
                        <div>
                            <img style="width: 65%; height: 80%; border-radius: 10px; " src="assets/img/Camiseta.jpg" alt="camiseta">
                        </div>
                    </div>
                </div>
            </section>
            <section class="seccion-tercero">
                <div class="dividir-seccion-tres">
                    <div>
                        <div id="concepto-tres" >
                            <h2 id="GRRS" class="Titulos"> <b> GORRAS </b> </h2>
                            <p id="GRRSC"> Hacemos estampados a gorras con la imagen de su preferencia,
                                Tenemos variedad de colores y modelos para su elección
                            </p>
                            <h6 style="margin: 5px 0 0 0; font-weight: bold;"> Precio: $10</h6>
                        </div>
                    </div>
                    <div class="imagenes-tres">                        
                        <div>
                            <img style="width: 65%; height: 80%; border-radius: 10px; " src="assets/img/Gorra1.jpg" alt="abrigo">
                        </div>
                        <div>
                            <img style="width: 65%; height: 80%; border-radius: 10px; " src="assets/img/Gorra2.jpg" alt="camiseta">
                        </div>
                    </div>
                </div>
            </section>

            <section class="seccion-cuarto">
                <div class="dividir-seccion-cuatro">
                    <div>
                        <div id="concepto-cuatro" >
                            <h2 id="TZ" class="Titulos"> <b> TAZAS </b> </h2>                        
                            <p id="TZC"> Hacemos estampados a tazas con la imagen de su preferencia,
                                Tenemos  variedad de modelos, juegos y colores para su elección
                            </p>
                            <h6 style="margin: 5px 0 0 0; font-weight: bold;"> Precio: $5</h6>
                        </div>
                    </div>
                    <div class="imagenes-cuatro">                        
                        <div>
                            <img style="width: 65%; height: 80%; border-radius: 10px; " src="assets/img/Taza1.jpg" alt="abrigo">
                        </div>
                        <div>
                            <img style="width: 65%; height: 80%; border-radius: 10px; " src="assets/img/Taza2.jpg" alt="camiseta">
                        </div>
                    </div>
                </div>
            </section>
            <section class="seccion-quinto">
                <div class="dividir-seccion-cinco">
                    <div>
                        <div id="concepto-cinco" >
                            <h2 id="BL" class="Titulos"> <b> BOLSOS </b> </h2>                        
                            <p id="BLC"> Hacemos estampados a bolsos con la imagen de su preferencia,
                                Tenemos variedad de colores para su elección y diferentes modelos de bolsos
                            </p>
                            <h6 style="margin: 5px 0 0 0; font-weight: bold;"> Precio: $8</h6>
                        </div>
                    </div>
                    <div class="imagenes-cinco">                        
                        <div>
                            <img style="width: 65%; height: 80%; border-radius: 10px; " src="assets/img/Bolso1.jpg" alt="abrigo">
                        </div>
                        <div>
                            <img style="width: 65%; height: 80%; border-radius: 10px; " src="assets/img/Bolso2.jpg" alt="camiseta">
                        </div>
                    </div>
                </div>
            </section>
        </main>
    
        <?php require_once FOOTER; ?>
    </div>
    
    <script type="text/javascript">
        
        var div = document.querySelector("#contenido");
        
        
        function cambiarImagen(){
            let img = document.getElementById("lg");
            img.setAttribute("src","assets/img/Sublimados.PNG");
        }
        function inicio(){
            let img = document.getElementById("lg");
            img.setAttribute("src","assets/img/LogoProducto.PNG")
        }
        function cambiarContenido(){
            let contenido = '';
            let cont = document.querySelector("#introduccion")

            contenido ="Recuerda revisar la variedad de nuestros productos para mejor elección al momento de comprar, Tenemos diferentes tipos de pago, tipos de entregas y muchas cosas más.";
            cont.innerText=contenido;
            cont.style.backgroundColor="#FFFFFF";
            cont.style.textAlign="justify";
            cont.style.padding="20px";
            cont.style.margin="20px";
            cont.style.fontSize="20pt";
            cont.style.fontWeight="bold";
            cont.style.fontFamily="'Inter', sans-serif";
        
            div.appendChild(cont);   
        }
    </script>
</body>
</html>