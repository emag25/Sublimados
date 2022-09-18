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
    <meta name="description" content="CONTIENE UN FORMULARIO PARA CONTACTARSE CON LA EMPRESA.">
    <meta name="keywords" content="Sublimados, Estampados, Camisetas, Tazas,Formulario,Contacto">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <title>ESCRIBENOS !</title>
    <style>
        /* Segunda sección */
        #seccion-2 {
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
    <?php require_once HEADER; ?>


        <main>
            <section class="seccion-primero">
                <div class="dividir-seccion-uno">
                    <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; margin-left: auto;
                    margin-right:auto ;">
                        <h2 id="encabezado">¡ADMINISTRA LOS MENSAJES DE CONTACTO!</h2>
                        <h3 style="margin-top: -10px;">SUPERIUM</h3>
                        <p id="parrafo">
                            En esta sección podrás ver los mensajes de contacto enviados por los clientes, además puedes editarlos y eliminarlos.
                        </p>
                    </div>
                    <div class="seccion-uno-derecho">
                        <div class="circulo" id="circulo-arriba"></div>
                        <div class="circulo" id="circulo-medio">
                            <img style="width: 100%; height: 100%;" src="assets/img/emailR.gif" alt="correo">
                        </div>
                        <div class="circulo" id="circulo-abajo"></div>
                    </div>
                </div>
            </section>

            <section class="seccion-segundo" id="seccion-2">

                    <div class="row">                    
                            <div class="contenedor-buscar">
                                <input type="text" name="b" id="busqueda"  placeholder="Buscar por nombre..."/>
                                <button class="btn-buscar" type="submit"><i class='bx bx-search' ></i>Buscar</button>
                            </div>     
                        <div>
                            <a href="index.php?c=Contacto&f=view_new"><button class="btn-nuevo" type="button"><i class='bx bx-plus' ></i>Nuevo</button></a>
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
                        <tr>
                            <th>ID</th>
                            <th>USUARIO</th>
                            <th>NOMBRE</th>
                            <th>APELLIDO</th>
                            <th>CELULAR</th>
                            <th>EMAIL</th>
                            <th>GENERO</th>
                            <th>ESTADO CIVIL</th>
                            <th>INTERESES</th>
                            <th>FECHA DE NACIMIENTO</th>
                            <th>COMENTARIO</th>                       
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody class="tabladatos">
                        <?php
                        foreach ($result as $fila) {
                        ?>
                            <tr>
                                <td><?php echo $fila->contacto_id ?></td>
                                <td><?php 
                                if($fila->activo == 1){
                                    echo $fila->usuario;
                                }else{
                                    echo $fila->usuario." (inactivo)";
                                } ?></td>
                                <td><?php echo $fila->nombre ?></td>
                                <td><?php echo $fila->apellido ?></td>
                                <td><?php echo $fila->celular ?></td>
                                <td><?php echo $fila->email ?></td>
                                <td><?php echo $fila->genero ?></td>
                                <td><?php echo $fila->estado_civil ?></td>
                                <td><?php if ($fila->intereses== 1) echo "SI"; else echo "NO"; ?></td>
                                <td><?php echo $fila->fecha_nacimiento ?></td>
                                <td><?php echo $fila->comentario ?></td>
                                <td>
                                    <a class="accion-boton editar" href="index.php?c=Contacto&f=view_edit&id=<?php echo $fila->contacto_id;?>"><i class='bx bxs-pencil'></i></a>
                                    <a class="accion-boton borrar" href="index.php?c=Contacto&f=delete&id=<?php echo $fila->contacto_id;?>" 
                                    onclick="if(!confirm('Esta seguro de eliminar el contacto?'))return false;"><i class='bx bxs-trash-alt'></i></a>
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
            btn.addEventListener('click', cargarContacto);
            
            function cargarContacto() {
              
                var bus = txtBuscar.value;                
                var url = "index.php?c=Contacto&f=search&b=" + bus;
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
                var contacto = JSON.parse(respuesta); 
                
                var user = ""; var intereses = ""; //var estado = ""; var estado_civil = "";
                var $result = ''; var tamanio = 0;                               

                if (contacto[contacto.length - 1].mensaje_error == undefined) {                    
                    tamanio = contacto.length;
                    divMensaje.style.display = "none";
                }else{
                    tamanio = contacto.length - 1; 
                    divMensaje.className = "divMensaje alert-rojo";
                    divMensaje.style.display = "block";
                    divMensaje.innerHTML = '<i class="bx bx-x"></i>'+contacto[tamanio].mensaje_error;
                }
                console.log(contacto);

                for (var i = 0; i < tamanio; i++) {
                    $result += '<tr>';
                    
                    $result += '<td>' + contacto[i].contacto_id + '</td>';                
                                                            
                    if(contacto[i].activo == 1){
                        user = contacto[i].usuario;
                    }else{
                        user = contacto[i].usuario + " (inactivo)";
                    }
                    $result += '<td>' + user + '</td>';
                    $result += '<td>' + contacto[i].nombre + '</td>';
                    $result += '<td>' + contacto[i].apellido + '</td>';
                    $result += '<td>' + contacto[i].celular + '</td>';
                    $result += '<td>' + contacto[i].email + '</td>';
                    $result += '<td>' + contacto[i].genero + '</td>';
                    $result += '<td>' + contacto[i].estado_civil + '</td>';

                    if (contacto[i].intereses == 0) {
                        intereses = "NO"; 
                    }else{
                        intereses = "SI";
                    }
                    $result += '<td>' + intereses + '</td>';
                    $result += '<td>' + contacto[i].fecha_nacimiento + '</td>';
                    $result += '<td>' + contacto[i].comentario + '</td>';

                    $result += '<td>' +
                        "<a class='accion-boton editar' href='index.php?c=Contacto&f=view_edit&id=" + contacto[i].contacto_id
                        + "'><i class='bx bxs-pencil' ></i></a>" 
                        + "<a style='margin-left:3px;' class='accion-boton borrar' href='index.php?c=Contacto&f=delete&id=" + contacto[i].contacto_id 
                        + "' onclick =" + '"if(!confirm(' + "'¿Está seguro que desea eliminar el contacto?'" + '))return false;"' + " ><i class='bx bxs-trash-alt' ></i></a>" 
                        + '</td>';
                    
                        $result += '</tr>';
                }
                tbody.innerHTML = $result;
                txtBuscar.value = "";
                txtBuscar.focus();
            }
        </script>

        <?php  require_once FOOTER ?>
    </div>
</body>
</html>