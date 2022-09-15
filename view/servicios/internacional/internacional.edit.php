<!--   AUTOR: YANEZ GUILLEN PAULA ADRIANA  -->
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

        
        
		
        

        #contenido {
            visibility: hidden;
        }


        .bloque {
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            align-items: center;
        }
		.botones {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

		
         .enviarenvioi{
            align-items: center;
            display: flex;
            justify-content: center;
            border-radius: 30px;
            width: 150px;
            height: 32px;
            color: #2B2729;
            cursor: pointer;
            margin-top: 50px;
            font-weight: bold;
            background-color: #ACACAC;
            text-align: center;
            text-decoration: none;
            font-size: 10pt;
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
			<div id="contenedorPrincipal">
                    <div id="contenedorContenido">

			<div class="formularios">
					<form id="formContacto" action="index.php?c=internacional&f=int_edit&id=<?php echo $inter->internacional_id; ?>" method="POST" id="Neviointernacional">
							<div>
							    <label><b>Nombres:&nbsp; </b><span>*</span></label>

								<input type="text" name="nombre" id="nombre" placeholder="Escribe tus nombres."
									class="caja box" style="width: 170px;" value="<?php echo $inter->nombres; ?>">
							</div>
							<div><label><b>Apellidos: </b><span>*</span></label>
								<input type="text" name="apellido" id="apellido" placeholder="Escribe tus apellidos."
									class="caja box" style="width: 170px;" value="<?php echo $inter->apellidos; ?>">
							</div>
							<div>
							<label><b>Telefono:&nbsp;&nbsp; </b><span>*</span></label>
								<input type="text" name="telefono" id="telefono" placeholder="Escribe tu telefono."
									class="caja box" style="width: 170px;" onmouseover="mostrarError('telefono')"
									onmouseout="ocultarError('telefono')" value="<?php echo $inter->telefono; ?>">
							</div>
							<div>
							<label><b>Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span>*</span></label>
								<input type="text" name="email" id="email" placeholder="Escribe tu email."
									class="caja box" style="width: 170px;" onmouseover="mostrarError('email')"
									onmouseout="ocultarError('email')" value="<?php echo $inter->email; ?>">
							</div>
							<div><label><b>Direccion: </b><span>*</span></label>
								<input type="text" name="direccion" id="direccion" placeholder="Escribe tu direccion."
									class="caja box" style="width: 170px;" onmouseover="mostrarError('direccion')"
									onmouseout="ocultarError('direccion')" value="<?php echo $inter->direccion; ?>">
							</div>
							<div id="divRadio1">
							<label><b>Vía: </b><span>*</span></label>
									<?php      
									$servientrega = ""; $tramaco = ""; $mundoexpress = "";                            
									if($inter->recibir_via == "Servientrega"){
										$servientrega = 'checked';                                        
									}else if ($inter->recibir_via == "Tramaco"){
										$tramaco = 'checked';                                        
									}else if ($inter->recibir_via == "MundoExpress"){
										$mundoexpress = 'checked';                                        
									}
									?>
									<input type="radio" id="radio1" name="radio" value="S" class="radio" <?php echo $servientrega; ?>>
									<label>Servientrega</label>
									<input type="radio" id="radio2" name="radio" value="T" class="radio" <?php echo $tramaco; ?>>
									<label>Tramaco</label>
									<input type="radio" id="radio3" name="radio" value="M" class="radio" <?php echo $mundoexpress; ?>>
									<label>Mundoexpress</label>
								</div>

						    <div>
								<label><b>Pais: <span>*</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b></label>
								<select id="destino" name="destino" class="caja box"
								style="height: 30px; width: 200px;" onmouseover="mostrarError('destino')"
								onmouseout="ocultarError('destino')">
									<?php  
								   $panama="";
								   $chile="";
								   $colombia="";
								   $peru="";

										if($inter->pais =="Panamá" ){
											$panama = 'selected="selected"';
										}else if ($inter->pais =="Chile" ){
											$chile = 'selected="selected"';

										}else if ($inter->pais =="Colombia" ){
											$colombia = 'selected="selected"';
										}else if ($inter->pais =="Perú" ){
											$peru = 'selected="selected"';
										}    

									
									?>
									<option value="0">Seleccione</option>
									<option value="1" <?php echo $panama; ?>>Panamá</option>
									<option value="2" <?php echo $chile; ?>>Chile</option>
									<option value="3" <?php echo $colombia; ?>>Colombia</option>
									<option value="4" <?php echo $peru; ?>>Perú</option>
								</select>
							</div>

							<div>
								<input type="checkbox" id="recibirinfo" name="recibirinfo" <?php echo ($inter->recibir_info == 1)?'checked="checked"':''; ?>/>
								<label style="font-size: 10pt;">Recibir información adicional.</label>
							</div>
							<div>
							<label><b>Especificaciones: </b><span>*</span></label><br>
								<textarea id="especificaciones" name="especificaciones" rows="4" cols="100" class="caja box"
									placeholder="Escribe tus especificaciones de envío." style="width: 700px; height: auto; resize: none;"
									><?php echo $inter->especificaciones; ?></textarea>
								</div><br><br>

							<div class="botones">
								<input style="height: 35px;" type="submit" class="enviarenvioi" value="GUARDAR"onclick="if (!confirm('¿Está seguro de modificar el envío?')) return false;">
								<a style="border:2px solid black;"  class="enviarenvioi" href="index.php?c=internacional&f=view_internacional_list">CANCELAR</a>
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
			var txtNombres = document.getElementById("nombre");//document.querySelector("input[name='nombres']"); // reotrna el primer input que tenga name ='nombres'
			var txtApellidos = document.getElementById("apellido");
			var txtDireccion = document.getElementById("direccion");
			var txtTelefono = document.getElementById("telefono");
			var destino = document.getElementById("destino");
			var radio = document.getElementById("radio");
			var txtemail = document.getElementById("correo");


			var letra = /^[a-z ,.'-]+$/i;// letrasyespacio   ///^[A-Z]+$/i;// solo letras
			var correo = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
			var telefonoreg = /^[0-9]{10}$/g; // para validar datos que deban tener 10 numeros

			limpiarMensajes();

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
			if (destino.value === null || destino.value === '0') {
				valido = false;
				mensaje("Debe seleccionar país de destino", destino);
			}

			//validacion radio button
			var sel = false;
			for (let i = 0; i < radio.length; i++) {
				if (radio[i].checked) {
					sel = true;
					break;
				}
			}
			if (!sel) {
				valido = false;
				mensaje("Debe seleccionar una opcion", radio[0]);
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
		}
		if (elemento.id === "contenedorRadios") {
				var nodoPadre = elemento;
			} else {
				var nodoPadre = elemento.parentNode;
			}

			var nodoMensaje = document.createElement("div");
			nodoMensaje.textContent = cadenaMensaje;
			nodoMensaje.setAttribute("class", "mensajeError");

			switch (elemento.id) {
				case "nombre":
					nodoMensaje.setAttribute("id", "error-nombre");
					break;
				case "email":
					nodoMensaje.setAttribute("id", "error-email");
					break;
				case "valoracion":
					nodoMensaje.setAttribute("id", "error-valoracion");
					break;
				case "contenedorRadios":
					nodoMensaje.style.marginTop = '-35px';
					nodoMensaje.setAttribute("id", "error-radio");
					break;
				case "resenia":
					nodoMensaje.style.marginTop = '-180px';
					nodoMensaje.style.marginLeft = '330px';
					nodoMensaje.setAttribute("id", "error-resenia");
					break;
				default:
					break;
			}

			nodoPadre.appendChild(nodoMensaje);
			nodoMensaje.style.visibility = 'hidden';
		

		function limpiarMensajes() {            
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


	
		);


	</script>
</body>

</html>
