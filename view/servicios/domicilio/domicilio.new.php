<!--   AUTOR: ELIZALDE GAIBOR MILTON ALEXANDER  -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ESTA PAGINA ES LA PAGINA DE ENVIOS A DOMICILIO Y CONTIENE UN FORMULARIO PARA REALIZAR SU ORDEN">
    <meta name="keywords" content="Sublimados, Estampados, Camisetas, Tazas, Servicio A Domicilio">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>A DOMICILIO</title>
    
    <style>
        label{
            font-weight: bold;
        }
        input{
            border-radius: 40px;
        }
        textarea{
            border-radius: 5px;
        }
        input[type="submit"],input[type="reset"]
        {
            background-color: #2e2e2e;
            color: white;
            border-radius: 100px;
            margin-top: 13px;
            width: fit-content;
            margin-left: 10px;
           
        }

        input[type="submit"]:hover{
            background-color: white;
            font-weight: bold;
            color: black;
        }

        input[type="reset"]:hover{
            background-color: red;
            font-weight: bold;
            color: white;
        }

        input[type="text"]{
            width: 26%;
        }

        #correo{
            width: 30%;
        }

        div{
            padding: 10px 0 10px 0;
        }
        .formulario{
            margin-top: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #2B2729;
            width: 40%;
            color: white;
            border-radius: 40px;
        }

        .formulario:hover{
            box-shadow: 0 0 18px black,
            0 0 48px black,
            0 0 78px black,
            0 0 98px black;
            transition: 1s;
        }

        

        .seccion-segundo{
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: auto;
            padding: 20px 0;
        }
        img[src="assets/img/milton-domicilio.png"]{
            width: 50%; height: 60%;
            animation-name: coche;
            
            animation-timing-function: ease;
            animation-duration: 5s;
            animation-iteration-count: 1;
        }



        @keyframes coche{
            0%{
                
            }
            50%{
                transform: translateX(35%);
            }
            100%{
                transform: translateX(100%);
            }
        }

        @media (max-width:600px) {
            .formulario{
                width: 90%;
                margin: 0;
                padding: 0;
            }

        }

        @media (max-width:900px) {
            .formulario{
                width: 70%;
                margin: 0;
                padding: 0;
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
                    <div  style="display: flex; flex-direction: column; justify-content: center; align-items: center; margin-left: auto;
                    margin-right:auto ;">
                        <h2 id="encabezado">A DOMICILIO EN ECUADOR !</h2>
                        <h3  style="margin-top: -10px;">SUPERIUM</h3>
                        <p id="parrafo" >
                            Aprovecha nuestro servicio "HASTA LA PUERTA DE TU CASA" , con nosotros vas a recibir tus productos directamente en tu domicilio
                            <strong><em>"No tienes que venir por ellos!"</em></strong>
                        <br><br><span style="font-weight: bold;">Disfruta de la comodidad de este servicio para la compra de esos productos que tanto deseas!</span> 
                        <br><img src="assets/img/milton-domicilio.png" alt="envios" >
                        </p>
                    </div>
                </div>

            </section>
            <section class="seccion-segundo">
            <div class="formulario">
                <form id="myForm" style="display: flex; flex-direction: column;  width: 90% ; " method="POST" action="index.php?c=servicios&f=view_domicilio_new_producto">
                    <div style="display:flex; flex-direction: row; align-items: center; justify-content: space-between;">
                            <div style="display: flex; flex-direction: column; width: 35%; ">
                                <label  >Cedula:</label>
                                <input style="width: 90%;" name="cedula" id="cedula" type="text"/>
                            
                            </div>
                            <div style="display: flex; flex-direction: column; width: 35%; ">
                                <label for="celular">Numero Celular:</label>
                                <input style="width: 95%;" name="celular" id="celular" type="text" />
                            
                            </div>
                    </div>
                    <div style="display:flex; flex-direction: column; align-items:center;">
                            <label >Correo Electronico:</label>
                            <input id="correo" name="correo" type="text"/>
                    </div>
                    <div style="display: flex; justify-content: space-between;">
                            <div > <!-- RADIOS BUTTON -->
                            
                                <label >Tipo Envio :</label>
                                <div style="display: grid; grid-template-columns: 0.1fr 1fr; width: 100%;  justify-content: start;">
                                <input type="radio" value="Express" name="gen"/>Express (1-2 dias)
                                <input type="radio" value="Rapido" name="gen"/>Rapido (2-3 dias)
                                <input type="radio" value="Normal" name="gen"/>Normal (3-5 dias)
                                <input type="radio" value="Economico" name="gen"/>Economico (5-10 dias)
                                </div>
                            </div>
                            <div > <!-- CHECK BOX -->
                            <label >Productos:</label>
                            <div style="display: grid; grid-template-columns: 0.2fr 1fr; width: 100%; justify-content: start;">
                                <input type="checkbox" value="Camisas" name="env[]"/>Camisas
                                <input type="checkbox" value="Tazas" name="env[]"/>Tazas
                                <input type="checkbox" value="Abrigos" name="env[]"/>Abrigos
                                <input type="checkbox" value="Gorros" name="env[]"/>Gorros
                                <input type="checkbox" value="Bolsos" name="env[]"/>Bolsos
                            </div>
                            
                                
                                
                
                            </div>
                    </div>
                        
                    
                        <div style="display: flex; justify-content: space-between;" >
                            <div style="display: flex; flex-direction: column; width: 45%;">
                                <label >Elija su ciudad:</label>
                                <select name="cities" id="ciudad" style="width: 100%;">
                                    <option value="Guayaquil">Seleccione</option>
                                    <option value="Guayaquil">Guayaquil</option>
                                    <option value="Cuenca">Cuenca</option>
                                    <option value="Quito">Quito</option>
                                    <option value="Machala">Machala</option>
                                    <option value="Riobamba">Riobamba</option>
                                    <option value="Quevedo">Quevedo</option>
                                    <option value="Ibarra">Ibarra</option>
                                    <option value="Duran">Duran</option>
                                    <option value="Santo Domingo">Santo Domingo</option>
                                    <option value="Ambato">Ambato</option>
                                </select>
                            </div>
                            <div style="display: flex; flex-direction: column;  width: 45%;">
                                    <label>Codigo postal:</label>
                                    <input style="width: 80%;" id="postal" name="postal" type="text"/>   
                            </div>
                        </div>
                        <label>Ingrese Referencias del destino del producto:</label>
                        <textarea name="referencias" id="area_referencias"></textarea>
                        <div style="display: flex; align-items: flex-end; justify-content: center;">
                        <input type="submit">
                        <input type="reset">
                        </div>
                        
                </form>
            </div>
            </section>


        </main>
    
        

<?php require_once FOOTER; ?>
    </div>
        <script>
        var valido=true;
        var patron_celular=/^[0]+[9]+[0-9]{8}$/i; //el celular debe empezar con 09
        var patron_cedula=/^[0-2]+[0-9]+[0-9]{8}$/i;//las cedulas deben ser euatorianas
        var patron_correo= /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        var patron_postal=/^[0-9]{6}$/i;
        
        var myForm=document.getElementById("myForm");
        myForm.addEventListener("submit",enviar_data);
        var cedula=document.getElementById("cedula");
        var celular=document.getElementById("celular");
        var correo=document.getElementById("correo");
        var postal=document.getElementById("postal");
        var envio=document.getElementsByName("gen");
        var ciudades=document.getElementById("ciudad");
        var referencia=document.getElementById("area_referencias");
        let arreglo_errores=[];
        
        cedula.setAttribute("placeholder","0912318942");
        celular.setAttribute("placeholder","0933312143");
        correo.setAttribute("placeholder","test@gmail.com");
        postal.setAttribute("placeholder","030103");

        cedula.addEventListener("keypress",comprobarNumeros);
        celular.addEventListener("keypress",comprobarNumeros);
        correo.addEventListener("keypress",comprobarCorreo);
        postal.addEventListener("keypress",comprobarPostal);

        cedula.addEventListener("keyup",comprobarNumeros);
        celular.addEventListener("keyup",comprobarNumeros);
        correo.addEventListener("keyup",comprobarCorreo);
        postal.addEventListener("keyup",comprobarPostal);
        
        
        function enviar_data(e){
            
            if(!patron_cedula.test(cedula.value)){ colorear(cedula);valido=false; arreglo_errores.push("cedula");}
            
            if(!patron_celular.test(celular.value)){colorear(celular);valido=false; console.log(celular.value); arreglo_errores.push("celular");}
           
            if(!patron_postal.test(postal.value)){colorear(postal); valido=false; arreglo_errores.push("postal");}
           
            if(!patron_correo.test(correo.value)){colorear(correo); valido=false; arreglo_errores.push("correo");}
            
            let auxOption=false;
            for(option of envio){
                if(option.checked){
                    auxOption=true;
                }
            }

          
            if(auxOption==false){valido=false; arreglo_errores.push("tipo_envio");}
            if(referencia.value.length==0){colorear(referencia);valido=false; arreglo_errores.push("referencias");}

            if(ciudades.selectedIndex==0){
                valido=false;
                arreglo_errores.push("ciudad");
            }

            
            if(valido==true){
                alert("SU FORMULARIO SE ENVIO EXITOSAMENTE");
            }else{
                
                alert("ERROR: RELLENE CORRECTAMENTE LOS SIGUIENTES CAMPOS.");
                let errores;
                for(dato of arreglo_errores){
                    errores+=dato+" ";
                }
                errores=errores.replace("undefined","");
                alert(errores);
                arreglo_errores=[];
                e.preventDefault();
            }
            valido=true;
        }

        function colorear(elemento){
            elemento.style.backgroundColor="red";
            elemento.style.color="white"; 
            elemento.style.border="2px solid red";
        }

        //Este metodo evita que se ingresen valores no numericos
        function comprobarNumeros(e){
            
            let letra=e.charCode;
            if(!(letra >=48 && letra <=57))
            {
                e.preventDefault();
            }
            if(this.value.length!=10 ){
                this.style.backgroundColor="red";
                this.style.color="white"; 
                this.style.border="2px solid red";
            }else{
                this.style.backgroundColor="lightgreen";
                this.style.color="black";
                this.style.border="2px solid green;";

            }
            
        }

        //Este metodo comprueba postal
        function comprobarPostal(e){
            let letra=e.charCode;
            if(!(letra >=48 && letra <=57))
            {
                e.preventDefault();
            }
            if(this.value.length!=6){
                this.style.backgroundColor="red";
                this.style.color="white";
                this.style.border="2px solid red";
            }else{
                this.style.backgroundColor="lightgreen";
                this.style.color="black";
                this.style.border="2px solid green;";
            }
            
        }

       //Este metodo permite dar a conocer al cliente que el correo esta mal escrito antes de enviarlo
       function comprobarCorreo(){
            if(!patron_correo.test(this.value))
            {
                this.style.backgroundColor="red";
                this.style.color="white";
                this.style.border="2px solid red";
            }else{
                this.style.backgroundColor="lightgreen";
                this.style.color="black";
                this.style.border="2px solid green;";
            }
        }
    </script>
</body>
</html>


