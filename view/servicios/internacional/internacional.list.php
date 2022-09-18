<!--   AUTOR  YANEZ GUILLEN PAULA ADRIANA  -->

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
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <title>INTERNACIONAL</title>
    <style>
  .seccion-segundo {
            height: auto;
            flex-direction: column;            
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
            <div class="row">                    
                        <div class="contenedor-buscar">
                            <input type="text" name="b" id="busqueda"  placeholder="Buscar por nombre..."/>
                            <button class="btn-buscar" type="submit"><i class='bx bx-search' ></i>Buscar</button>
                        </div>
                    <div>
                        <a href="index.php?c=internacional&f=view_internacional_new"><button class="btn-nuevo" type="button"><i class='bx bx-plus' ></i>Nuevo</button></a>
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
                        <th>NOMBRES</th>
                        <th>APELLIDOS</th>
                        <th>TELEFONO</th>
                        <th>EMAIL</th>
                        <th>DIRECCION</th>
                        <th>VIA</th>
                        <th>PAIS</th>
                        <th>INFORMACION</th>
                        <th>ESPECIFICACIONES</th>
                        <th>ACCIONES</th>
                    </thead>
                    <tbody class="tabladatos">
                        <?php                 
                        foreach ($resultados as $fila) {
                        ?>
                        <tr>
                        <td><?php echo $fila->internacional_id;?></td>
                            <td><?php 
                            if($fila->activo == 1){
                                echo $fila->usuario;
                            }else{
                                echo $fila->usuario." (inactivo)";
                            } ?></td>
                            <td><?php echo $fila->nombres;?></td>
                            <td><?php echo $fila->apellidos;?></td>
                            <td><?php echo $fila->telefono;?></td>
                            <td><?php echo $fila->email;?></td>
                            <td><?php echo $fila->direccion;?></td>
                            <td><?php echo $fila->recibir_via;?></td>
                            <td><?php echo $fila->pais; ?> </td>
                            <td><?php if ($fila->recibir_info == 1) echo "SI"; else echo "NO";?></td>
                            <td><?php echo $fila->especificaciones;?></td>
                            <td>
                                <a class="accion-boton editar" href="index.php?c=internacional&f=view_internacional_edit&id=<?php echo $fila->internacional_id;?>"><i class='bx bxs-pencil' ></i></a>
                                <a class="accion-boton borrar" href="index.php?c=internacional&f=int_delete&id=<?php echo $fila->internacional_id;?>" 
                                onclick="if(!confirm('Esta seguro de eliminar el producto?'))return false;"><i class='bx bxs-trash-alt' ></i></a>
                            </td>
                        </tr>
                        <?php 
                        }
                        ?>
                    </tbody>
                    </table>
                 </div>

                </div>

            </section>
        </main>
        <script type="text/javascript">
            
            var txtBuscar = document.querySelector("#busqueda");
            var btn = document.querySelector(".btn-buscar");
            btn.addEventListener('click', cargarInternacional);
            
            function cargarInternacional() {
              
                var bus = txtBuscar.value;                
                var url = "index.php?c=internacional&f=int_search&b=" + bus;
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
                var envio_internacional = JSON.parse(respuesta); 
                
                var user = ""; var info = "";  
                var resultados = ''; var tamanio = 0;                               

                if (envio_internacional[envio_internacional.length - 1].mensaje_error == undefined) {                    
                    tamanio = envio_internacional.length;
                    divMensaje.style.display = "none";
                }else{
                    tamanio = envio_internacional.length - 1; 
                    divMensaje.className = "divMensaje alert-rojo";
                    divMensaje.style.display = "block";
                    divMensaje.innerHTML = '<i class="bx bx-x"></i>'+envio_internacional[tamanio].mensaje_error;
                }
                console.log(envio_internacional);

                for (var i = 0; i < tamanio; i++) {
                    resultados += '<tr>';
                    
                    resultados += '<td>' + envio_internacional[i].internacional_id + '</td>';                
                                                            
                    if(envio_internacional[i].activo == 1){
                        user = envio_internacional[i].usuario;
                    }else{
                        user = envio_internacional[i].usuario + " (inactivo)";
                    }
                    resultados += '<td>' + user + '</td>';
                    
                    resultados += '<td>' + envio_internacional[i].nombres + '</td>';
                    
                    resultados += '<td>' + envio_internacional[i].apellidos + '</td>';
                  
                    resultados += '<td>' + envio_internacional[i].telefono + '</td>';

                    resultados += '<td>' + envio_internacional[i].email + '</td>';

                    resultados += '<td>' + envio_internacional[i].direccion + '</td>';

                    resultados += '<td>' + envio_internacional[i].recibir_via + '</td>';

                    resultados += '<td>' + envio_internacional[i].pais + '</td>';

                    if (envio_internacional[i].recibir_info == 0) {
                        info = "NO"; 
                    }else{
                        info = "SI";
                    }
                    resultados += '<td>' + info+ '</td>';



                    resultados += '<td>' + envio_internacional[i].especificaciones+ '</td>';


                    

                    resultados += '<td>' +
                        "<a class='accion-boton editar' href='index.php?c=internacional&f=view_internacional_edit&id=" + envio_internacional[i].internacional_id
                        + "'><i class='bx bxs-pencil' ></i></a>" 
                        + "<a style='margin-left:3px;' class='accion-boton borrar' href='index.php?c=internacional&f=int_delete&id=" + envio_internacional[i].internacional_id 
                        + "' onclick =" + '"if(!confirm(' + "'¿Está seguro que desea eliminar envío?'" + '))return false;"' + " ><i class='bx bxs-trash-alt' ></i></a>" 
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
