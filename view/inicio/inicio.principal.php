<!--   AUTOR: ELIZALDE GAIBOR MILTON ALEXANDER  -->
<?php 
    if(!isset($_SESSION)){ 
        session_start();
    }
    //echo $_SESSION['rol'];
?> 

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ESTA PAGINA ES LA PAGINA PRINCIPAL DE LA FAMOSA EMPRESA SUPEIRUM - ENCARGADA DE SERVICIOS DE SUBLIMADOS!!">
    <meta name="keywords" content="Sublimados, Estampados, Camisetas, Tazas, Servicio A Domicilio,Envios Internacionales">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <title>INICIO</title>
    <style>
         /*selector universal*/
        *{
            font-family: 'Inter', sans-serif;
        }
        /*selector elemento - tipo*/
        body{
            margin: 0;
        }
        div{
            margin: 0;
        }
         /*selector clase*/
        .bloque{
            width: 90%;
            height: 350px;
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
        }
        /*selector pseudiclases*/
        .bloque-uno div:nth-child(1){
            width: 60%;
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
        .bloque-dos{
            background-color: #D4F4DB;
            border-radius: 40px;
        }
        .bloque-dos div:nth-child(1){
            width: 30%;
            height: 70%;
            border-radius: 10px;
            background-color: #2B2729;
        }
        .bloque-dos div:nth-child(2){
            width: 30%;
            height: 70%;
            border-radius: 10px;
            background-color: #2B2729;
        }
        .bloque-tres{
            background-color: #2B2729;
            border-radius: 40px;
        }
        .bloque-tres div:nth-child(1){
            width: 30%;
            height: 70%;
            border-radius: 10px;
            background-color: #D9D9D9;
        }
        .bloque-tres div:nth-child(2){
            width: 60%;
            height: 70%;
            border-radius: 10px;
            background-color: #D9D9D9;
        }
        .bloque-cuatro{
            background-color: #D4F4DB;
            border-radius: 40px;
        }
        .bloque-cuatro div:nth-child(1){
            width: 30%;
            height: 70%;
            border-radius: 10px;
            background-color: #2B2729;
            display: flex; flex-direction: column; justify-content: center; align-items: center
        }
        .bloque-cuatro div:nth-child(2){
            width: 30%;
            height: 70%;
            border-radius: 10px;
            background-color: #2B2729;
        }
        .bloque-cuatro div:nth-child(3){
            width: 30%;
            height: 70%;
            border-radius: 10px;
            background-color: #2B2729;
        }
        /*selector combinatorio*/
        .bloque-cuatro div~div{
            display: flex; flex-direction: column; justify-content: center; align-items: center
        }
        /*selector pseudoclase*/
        .bloque div:hover{
            transform: scale(1.05);
            transition: 0.5s;
        }
         /*selector id*/
        #bloque-dos-primero{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        #bloque-dos-primero > figure{
            color: white;
        }
        #bloque-dos-segundo{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        #bloque-dos-segundo h2{
            text-align: justify; width: 80%; height: 15%;
            color: white; margin: 0; 
        }
        #bloque-dos-segundo h4{
            text-align: justify; width: 80%; height: 80%;
            color: white; margin: 0; 
        }
        /*selector atributo*/
        a[href^="YanezPaula.html"]{
            text-decoration: none;
        }
         /*selector pseudoelemento*/
        p::first-letter{
            font-size: 24px;
            font-weight: bold
        }
        /*selectores id*/
        #parrafo-seccion-cuatro{
            width: 80%; height: 50%; text-align: justify;
        }
        #div-seccion-cuatro{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        
        #parrafo-one{
            text-align: justify; width: 80%; height: 50%;margin: 0;
        }
        #imagen-shirt{
            border-radius: 10px; width: 65%; height:90% ;
        }

        /*extra: diseño responsivo*/
        @media (max-width:777px) {
            #parrafo-one{
                position: relative;
                font-size: 12px;
                margin-top: -70px;
            }
            #parrafo-seccion-cuatro{
                position: relative;
                font-size: 12px;
            
            }
            #bloque-dos-segundo h2{
                position: relative;
                font-size: 12px;
        }
        #bloque-dos-segundo h4{
            position: relative;
                font-size: 12px;
        }
            #titulo-seccion-cuatro{
                margin: 0; margin-top: -70px; font-size: 14px;
            }
            #imagen-shirt{
            border-radius: 10px; width: 65%; height:40% ;
            }
          
        }
        @media (max-width:400px) {
            #parrafo-one{
                position: relative;
                font-size: 9px;
                margin-top: -70px;
            }
            #parrafo-seccion-cuatro{
                position: relative;
                font-size: 9px;
            
            }
            #bloque-dos-segundo h2{
                position: relative;
                font-size: 9px;
        }
        #bloque-dos-segundo h4{
            position: relative;
                font-size: 9px;
        }
          
        }
    </style>
</head>
<body>
    <div class="contenedor-principal">
    <?php 
    require_once HEADER; ?>       
    
        <main>
        
            <section class="seccion-primero">
                <div class="dividir-seccion-uno">
                    <div  style="display: flex; flex-direction: column; justify-content: center; align-items: center; margin-left: auto;
                    margin-right:auto ;">
                        <h2 id="encabezado">SUBLIMADOS</h2>
                        <h3  style="margin-top: -10px;">SUPERIUM</h3>
                        <p id="parrafo" >
                            Bienvenido Usuario a nuestra web donde podras conocer los servicios que ofrecemos y ademas los productos disponibles.
                            y a su vez algunas reseñas de compradores satisfechos.    
                        <br><br><span style="font-weight: bold;">Una nueva forma de vestir, con elegancia y sobretodo a tu gusto!</span> 
                        </p>
                    </div>
                   <div class="seccion-uno-derecho">
                    <div class="circulo" id="circulo-arriba"></div>
                    <div class="circulo" id="circulo-medio">
                        <!-- La imagen esta en  128px redondeada (fuente: flaticon.com) -->
                        <img src="assets/img/inicio.png" alt="incio">
                    </div>
                    <div class="circulo" id="circulo-abajo"></div>
                   </div>
                </div>

            </section>
            <?php                
                if (!empty($_SESSION['mensaje'])) {
                    ?>
                    <div style="margin: 60px;" class="alert-<?php echo $_SESSION['color']; ?>">
                    <i class='bx bx-<?php if ($_SESSION['color']=="rojo") { echo "x";} else{ echo "check";} ?>'></i>
                    <?php echo $_SESSION['mensaje']; ?>  
                    </div>
                    <?php
                    unset($_SESSION['mensaje']);
                    unset($_SESSION['color']);
                }
                ?>
            <section class="seccion-segundo">
                <div class="bloque bloque-uno">
                    <div style="display: flex; flex-direction: row; justify-content: center; align-items: center;">
                        <p id="parrafo-one">    
                            No lo pienses mas! Somos una empresa dedicada a generar el
                            mejor sublimado existente del Ecuador, brindando un servicio
                            personalizado y de muy buena calidad al igual que nuestros productos.
                           <strong> Somos innovacion </strong>, utilizando los mejores materiales para la confeccion
                            y detallado de la diversidad de productos que proveemos a nuestra comunidad.
                        </p>
                    </div>
                    <div style="display: flex; flex-direction: row; justify-content: center; align-items: center;">
                        <img id="imagen-shirt" src="assets/img/t-shirt.jpg" alt="shirt"/>
                    </div>
                </div>
            </section>
            <section class="seccion-tercero">
                <div class="bloque bloque-dos">
                    <div id="bloque-dos-primero">
                        <figure style=" width: 80%; height:70%  ; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <img style="width: 80%; height:95% ; border-radius: 10px;" src="assets/img/chinese_design.jpg" alt="shirt"/>
                            <figcaption>
                                Camisa mas vendida este año
                            </figcaption>
                        </figure>

                    </div>
                    <div  id="bloque-dos-segundo">
                        <h2 >DESTACADOS</h2>
                        <h4 >
                            Somos numero uno en Ventas a domicilio y con insignia de 
                            servicio y presentacion exlusiva.
                            Los primeros en realizar sublimados de alta gama con materiales de calidad y a un precio 
                            adecuado para tu bolsillo!
                        </h4>
                    </div>
                </div>
            </section>
            <section class="seccion-cuarto">
                <div class="bloque bloque-tres">
                    <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                        <figure style=" width: 80%; height:60%  ;display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <img style="width: 75%; height:95% ; border-radius: 10px;" src="assets/img/anime_design.jpg" alt="anime"/>
                            <figcaption>
                                Camisa mas vendida este año
                            </figcaption>
                        </figure>
                    </div>
                    <div id="div-seccion-cuatro">
                        <h3 id="titulo-seccion-cuatro">VARIEDAD</h3>
                        <p id="parrafo-seccion-cuatro">
                            Tenemos Gran variedad de productos, desde camisas hasta tazas personalizadas a tu gusto
                            o diseños predeterminados para eescoger.
                            Ademas contamos con servicios exclusivos tanto a domicilio como
                            atencion personalzada y sepracion de montos para eventos.
                            puedes ver mas de estos beneficios en el siguiente <em> <a href="YanezPaula.html">enlace</a></em>
                        </p>
                    </div>
                </div>
            </section>
            <section class="seccion-quinto">
                <div class="bloque bloque-cuatro">
                    <div>
                        <figure style=" width: 80%; height:70%  ; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <img class="imagen-change" id="img-uno" style="width: 80%; height:95% ; ; border-radius: 10px;" src="assets/img/logo_shirt.jpg" alt="make"/>
                        </figure>
                    </div>
                    <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                        <figure style=" width: 80%; height:70%  ; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <img class="imagen-change" id="img-dos" style="width: 80%; height:95% ; ; border-radius: 10px;" src="assets/img/make_designnjpg.jpg" alt="make"/>
                        </figure>
                    </div>
                    <div>
                        <figure style=" width: 80%; height:70%  ; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <img class="imagen-change" id="img-tres" style="width: 80%; height:95% ;  ; border-radius: 10px;" src="assets/img/bad_shirt.png" alt="make"/>
                        </figure>
                    </div>
                </div>
            </section>
        </main>
    
        <?php require_once FOOTER; ?>   
    </div>

    <script>
        var nodo=document.querySelectorAll(".imagen-change");
        var img_uno=document.getElementById("img-uno");
        var img_dos=document.getElementById("img-dos");
        var img_tres=document.getElementById("img-tres");
        img_uno.addEventListener("mouseover",() =>cambiarImagen(nodo[0]));
        img_dos.addEventListener("mouseover",() =>cambiarImagen(nodo[1]));
        img_tres.addEventListener("mouseover",() =>cambiarImagen(nodo[2]));

        img_uno.addEventListener("mouseout",normalizarImagen);
        img_dos.addEventListener("mouseout",normalizarImagen);
        img_tres.addEventListener("mouseout",normalizarImagen);

        function cambiarImagen(nodo){
            if(nodo.id=="img-uno"){
               
                img_dos.src="assets/img/logo_1.jpeg";
                img_tres.src="assets/img/logo_2.jpg";  
            }else if(nodo.id=="img-dos"){
                
                img_uno.src="assets/img/design-1.png"; 
                img_tres.src="assets/img/design-2.jpg";  
            }else if(nodo.id=="img-tres"){
                
                img_uno.src="assets/img/dark-1.jpg";  
                img_dos.src="assets/img/dark-2.jpeg";  
            }
              
        }

        function normalizarImagen(){
            img_uno.src="assets/img/logo_shirt.jpg";
            img_dos.src="assets/img/make_designnjpg.jpg";
            img_tres.src="assets/img/bad_shirt.png";  
        }
    </script>
    
</body>
</html>




<?php //require_once FOOTER; ?>