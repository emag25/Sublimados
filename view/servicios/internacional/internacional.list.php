<!DOCTYPE html>
<html lang="en">

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

        .seccion-tercero {
            height: auto;
        }


        .seccion-quinto {
            height: auto;
        }

        .seccion-cuarto {
            
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 450px;
            background-color: #D4F4DB;
        }


        #slider {
            border-radius: 20px;
            box-shadow: 0 0 15px rgb(169, 247, 143);


        }




        #pie {
            font-family: 'Courier New', Courier, monospace;
        }

        #enlaces,
        #contenido {
            display: flex;
            justify-content: center;
            background-color: rgb(13, 13, 13);
            padding: 20px;
            border-radius: 30px;
            margin-top: 20px;

        }

        #contenido {
            visibility: hidden;
        }

        .evento {
            display: inline-block;
            background-color: #9EE9A1;
            color: rgb(11, 10, 10);
            font-weight: bold;
            padding: 10px;
            margin: 5px;
            text-decoration: none;
            border-radius: 10px;
        }

        li {
            list-style: none;
        }

        #titulo-empresas {
            text-align: center;
            font-style: oblique;
            font-weight: bolder;
        }

        .bloque {
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            align-items: center;
        }

        .imgcambiante {
            background-color: #D4F4DB;
            border-radius: 20px;
            text-align: center;
            left:0; right:0; top:0;


        }

        .imgcambiante div:nth-child(1) {
            width: 50%;
            height: 50%;
            border-radius: 40px;
            background-color: #2B2729;
            margin-right:0;
            padding: 20px;

        }

        .imgcambiante div:nth-child(2) {
            padding: 40px;
            width: 50%;
            height: 50%;
            border-radius: 40px;
            background-color: #2B2729;
            color: #f0ebeb;
            font-size:16px;
            margin-left: 15px;
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
            </section>
        </main>
        <?php require_once FOOTER; ?>
    </div>
  </body>

</html>
