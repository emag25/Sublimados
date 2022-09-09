<!--   AUTOR: YANEZ GUILLEN PAULA ADRIANA  -->

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
    if(!isset($_SESSION)){ 
        session_start();
    } 
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
                    <form action="index.php?c=Servicios&f=int_search" method="POST" id="formBuscar">
                        <div class="contenedor-buscar">
                            <input type="text" name="b" id="busqueda"  placeholder="Buscar por nombre..."/>
                            <button class="btn-buscar" type="submit"><i class='bx bx-search' ></i>Buscar</button>
                        </div>
                    </form>       
                    <div>
                        <a href="index.php?c=Servicios&f=view_internacional_new"><button class="btn-nuevo" type="button"><i class='bx bx-plus' ></i>Nuevo</button></a>
                    </div>
                </div>
                <?php                
                if (!empty($_SESSION['mensaje'])) {
                    ?>
                    <div style="margin-top: 60px;" class="alert-<?php echo $_SESSION['color']; ?>">
                    <i class='bx bx-<?php if ($_SESSION['color']=="rojo") { echo "x";} else{ echo "check";} ?>'></i>
                    <?php echo $_SESSION['mensaje']; ?>  
                    </div>
                    <?php
                    unset($_SESSION['mensaje']);
                    unset($_SESSION['color']);
                }
                ?>
                <table> 
                    <thead>
                        <th>ID</th>
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
                    <tbody>
                        <?php                 
                        foreach ($resultados as $fila) {
                        ?>
                        <tr>
                            <td><?php echo $fila->internacional_id;?></td>
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
                                <a class="accion-boton editar" href="index.php?c=Servicios&f=view_internacional_edit&id=<?php echo $fila->internacional_id;?>"><i class='bx bxs-pencil' ></i></a>
                                <a class="accion-boton borrar" href="index.php?c=Servicios&f=int_delete&id=<?php echo $fila->internacional_id;?>" 
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
        <?php require_once FOOTER; ?>
    </div>
  </body>

</html>
