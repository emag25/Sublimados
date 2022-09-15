<!--   AUTOR: APRAEZ GONZALEZ EMELY MISHELL  -->
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
    <meta name="description" content="CONTIENE UN FORMULARIO PARA ESCRIBIR LAS RESEÑAS DE LA EMPRESA">
    <meta name="keywords" content="Sublimados, Estampados, Camisetas, Tazas, Reseñas, Formulario">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <title>CONSULTAR RESEÑAS</title>
    <style>
        .seccion-segundo {
            height: auto;
            flex-direction: column;            
        }

        .divMensaje{
            display:none;
            margin-top: 60px;
        }
    </style>
</head>

<body>
    <div class="contenedor-principal">
        
        <?php 
        require_once HEADER;
        ?>
        <main>
            <section class="seccion-primero">
                <div class="dividir-seccion-uno">
                    <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; margin-left: auto;
                    margin-right:auto ;">
                        <h2 id="encabezado">¡REVISA LAS RESEÑAS!</h2>
                        <h3 style="margin-top: -10px;">SUPERIUM</h3>
                        <p id="parrafo">
                            Este espacio es dedicado para tí. Puedes revisar las opiniones acerca de nuestros
                            productos y servicios.</p>
                    </div>
                    <div class="seccion-uno-derecho">
                        <div class="circulo" id="circulo-arriba"></div>
                        <div class="circulo" id="circulo-medio">
                            <img src="assets/img/ema-escribir.png" alt="escribe reseña">
                        </div>
                        <div class="circulo" id="circulo-abajo"></div>
                    </div>
                </div>
            </section>

            <section class="seccion-segundo">            
                <div class="row">                    
                    
                        <div class="contenedor-buscar">
                            <input type="text" name="b" id="busqueda"  placeholder="Buscar por nombre..."/>
                            <button class="btn-buscar" type="submit"><i class='bx bx-search' ></i>Buscar</button>
                        </div>
                        
                    <div>
                        <a href="index.php?c=Resenias&f=view_new"><button class="btn-nuevo" type="button"><i class='bx bx-plus' ></i>Nuevo</button></a>
                    </div>
                </div>

                <div class="divMensaje<?php                
                if (!empty($_SESSION['mensaje'])) {
                    echo ' alert-'.$_SESSION['color']; 
                    ?>" style="display:block;"><i class='bx bx-<?php                    
                    if ($_SESSION["color"] == "rojo") { echo "x";} 
                    else{ echo "check";} ?>'></i><?php echo $_SESSION['mensaje']; ?></div>
                <?php
                unset($_SESSION['mensaje']);
                unset($_SESSION['color']);
                }else{?>"></div><?php } ?>
                
                <table>
                    <thead>
                        <th>ID</th>
                        <th>USUARIO</th>
                        <th>NOMBRE</th>
                        <th>EMAIL</th>
                        <th>VALORACIÓN</th>
                        <th>SERVICIO</th>
                        <th>RESEÑA</th>
                        <th>RECIBIR PROM.</th>
                        <th>ESTADO</th>
                        <th>ACCIONES</th>
                    </thead>
                    <tbody class="tabladatos">
                        <?php                 
                        foreach ($resultados as $fila) {
                        ?>
                        <tr>
                            <td><?php echo $fila->resenia_id;?></td>
                            <td><?php 
                            if($fila->activo == 1){
                                echo $fila->usuario;
                            }else{
                                echo $fila->usuario." (inactivo)";
                            } ?></td>
                            <td><?php echo $fila->nombre;?></td>
                            <td><?php echo $fila->email;?></td>
                            <td><?php if ($fila->valoracion == 1) echo "1 estrella"; else echo $fila->valoracion; ?> estrellas</td>
                            <td><?php echo $fila->servicio;?></td>
                            <td><?php echo $fila->resenia;?></td>
                            <td><?php if ($fila->recibir_promo == 1) echo "SI"; else echo "NO";?></td>
                            <td><?php if ($fila->estado == 1) echo "Publicada"; else echo "En revisión";?></td>
                            <td>
                                <a class="accion-boton editar" href="index.php?c=Resenias&f=view_edit&id=<?php echo $fila->resenia_id;?>"><i class='bx bxs-pencil' ></i></a>
                                <a class="accion-boton borrar" href="index.php?c=Resenias&f=delete&id=<?php echo $fila->resenia_id;?>" 
                                onclick="if(!confirm('Está seguro que desea eliminar la reseña?'))return false;"><i class='bx bxs-trash-alt' ></i></a>
                            </td>
                        </tr>
                        <?php 
                        }
                        ?>
                    </tbody>
                </table>
            </section>
        </main>
        <script type="text/javascript">
            
            var txtBuscar = document.querySelector("#busqueda");
            var btn = document.querySelector(".btn-buscar");
            btn.addEventListener('click', cargarResenias);
            
            function cargarResenias() {
              
                var bus = txtBuscar.value;                
                var url = "index.php?c=Resenias&f=search&b=" + bus;
                var xmlh = new XMLHttpRequest();
                xmlh.open("GET", url, true);
                xmlh.send();
                
                xmlh.onreadystatechange = function () {
                    if (xmlh.readyState === 4 && xmlh.status === 200) {
                        var respuesta = xmlh.responseText;                     
                        actualizar(respuesta);
                    }
                }
            }

            function actualizar(respuesta) {
                
                var tbody = document.querySelector('.tabladatos');
                var divMensaje = document.querySelector('.divMensaje');
                var resenias = JSON.parse(respuesta); 
                
                var user = ""; var valoracion = ""; var promo = ""; var estado = ""; 
                var resultados = ''; var tamanio = 0;                               

                if (resenias[resenias.length - 1].mensaje_error == undefined) {                    
                    tamanio = resenias.length;
                    divMensaje.style.display = "none";
                }else{
                    tamanio = resenias.length - 1; 
                    divMensaje.className = "divMensaje alert-rojo";
                    divMensaje.style.display = "block";
                    divMensaje.innerHTML = '<i class="bx bx-x"></i>'+resenias[tamanio].mensaje_error;
                }
                console.log(resenias);

                for (var i = 0; i < tamanio; i++) {
                    resultados += '<tr>';
                    
                    resultados += '<td>' + resenias[i].resenia_id + '</td>';                
                                                            
                    if(resenias[i].activo == 1){
                        user = resenias[i].usuario;
                    }else{
                        user = resenias[i].usuario + " (inactivo)";
                    }
                    resultados += '<td>' + user + '</td>';
                    
                    resultados += '<td>' + resenias[i].nombre + '</td>';
                    
                    resultados += '<td>' + resenias[i].email + '</td>';

                    if (resenias[i].valoracion == 1) {
                        valoracion = "1 estrella"; 
                    }else{
                        valoracion = resenias[i].valoracion +" estrellas"; 
                    }
                    resultados += '<td>' + valoracion + '</td>';

                    resultados += '<td>' + resenias[i].servicio + '</td>';

                    resultados += '<td>' + resenias[i].resenia + '</td>';

                    if (resenias[i].recibir_promo == 0) {
                        promo = "NO"; 
                    }else{
                        promo = "SI";
                    }
                    resultados += '<td>' + promo + '</td>';

                    if (resenias[i].estado == 0) {
                        estado = "En revisión"; 
                    }else{
                        estado = "Publicada";
                    }
                    resultados += '<td>' + estado + '</td>';

                    resultados += '<td>' +
                        "<a class='accion-boton editar' href='index.php?c=Resenias&f=view_edit&id=" + resenias[i].resenia_id
                        + "'><i class='bx bxs-pencil' ></i></a>" 
                        + "<a style='margin-left:3px;' class='accion-boton borrar' href='index.php?c=Resenias&f=delete&id=" + resenias[i].resenia_id 
                        + "' onclick =" + '"if(!confirm(' + "'¿Está seguro que desea eliminar la reseña?'" + '))return false;"' + " ><i class='bx bxs-trash-alt' ></i></a>" 
                        + '</td>';
                    
                    resultados += '</tr>';
                }
                tbody.innerHTML = resultados;
                txtBuscar.value = "";
                txtBuscar.focus();
            }
        </script>
        <?php require_once FOOTER; ?>
    </div>
</body>
</html>

