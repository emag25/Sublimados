<!--AUTOR:SICHA VEGA BETSY ARLETTE-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CONTIENE UN FORMULARIO PARA DISEÑA EL PRODUCTO SUBLIMADO.">
    <meta name="keywords" content="Sublimados, Estampados, Camisetas, Tazas,Creacion,Diseño.">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <title>TU DISEÑO</title>
    <style>
        *{
            font-family: 'Inter', sans-serif;
        }
        .dividir-seccion-uno{
            padding-top: 35px;
        }
        .enl{
            font-family: 'Inter', sans-serif;
            border: 2px solid  #2B2729;
            padding: 0 10px;
            margin: 15px;
            text-align: center;
            font-size: 20px;
            background-color: #9EE9A1;
            color: black;
            position: relative;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }
        .dividir-seccion-dos{
            display: flex;
            flex-direction: row;
            justify-content: space-between;        
            background-color: #2B2729;
            height: 70%;
            border-radius: 40px;
            margin-top: 60px;
            padding: 40px;
            width: 70%;
            gap: 20px;
        }

        .btn-buscar, .btn-nuevo {
            background-color: #D4F4DB;
            border-radius: 30px;
            width: 150px;
            height: 42px;
            font-weight: bold;
            border: 0;
            color: #2B2729;
            cursor: pointer;
        }

        input[type="text"] {
            border-radius: 30px;
            width: 100%;
            height: 42px;
            border: 0;
            cursor: pointer;
            padding-left: 20px;
        }

        .contenedor-buscar {
            display: flex;
            flex-direction: row;
            gap: 20px;
            justify-content: space-between;
        }

        table {
            margin: 60px 0 60px 0;
            border: #9EE9A1 2px solid;
            border-collapse: collapse;
            width: 90%;
        }

        td, th {
            border: #9EE9A1 2px solid;
            padding: 5px;
            text-align: center;
            background: white;
        }

        th{
            background: #9EE9A1;
        }

        .accion-boton {
            display: inline-block;
            padding: 7px;            
            border-radius: 7px;
            font-size: 12pt;
            color: white;
        }

        .editar{
            background: #1C32B1;
        }

        .borrar{
            background: #BA1C1C;
        }
        
        .formulario{
            margin: 5px;
            padding-left: 10px;
        }
        #btnsCentro{
            text-align: center;
        }
        input, select, textarea{
            border-radius: 8px;
        }
        label{
            color: #9EE9A1;
            font-weight: bold;
        }
        #enlaces{
            display: grid;
            grid-template-columns: 0.5fr 0.5fr 0.5fr 0.5fr 0.5fr;
            justify-content: stretch;
            align-items: center;
            
        }
        .fotos{
            width: 50%;
            height: 50%;
            justify-self: center;
        }
        .seccion-primero{
            height: auto;
        }
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
      };
    require_once HEADER; ?>
        
    
        <main>
            <section class="seccion-primero">
                <div class="dividir-seccion-uno">
                    <div  style="display: flex; flex-direction: column; justify-content: center; align-items: center; margin-left: auto;
                    margin-right:auto ;">
                        <h2 id="encabezado">CREA TU DISEÑO</h2>
                        <h3  style="margin-top: -10px;">SUPERIUM</h3>
                        <p id="parrafo" >
                            Bienvenido Usuario en este apartado podrás dejar volar tu imaginación e idear tu producto deseado
                            siguiendo algunos parámetros que te guiarán en la creación de tu diseño.
                        <br><br><span style="font-weight: bold;">Una nueva forma de vestir, con elegancia y sobretodo a tu gusto!</span>
                        </p> <br>
                        <div id="enlaces">
                            <a class="enl" id="uno"  href="#"> CAMISETA</a>
                            <a class="enl" id="dos"  href="#"> ABRIGO </a>
                            <a class="enl" id="tres"  href="#"> GORRA </a>
                            <a class="enl" id="cuatro" href="#"> TAZA </a>
                            <a class="enl" id="cinco"  href="#"> BOLSO </a>

                            <img src="assets/img/Camiseta.jpg" alt="Camiseta" class="fotos">
                            <img src="assets/img/Abrigo.jpg" alt="Abrigo" class="fotos">
                            <img src="assets/img/Gorra1.jpg" alt="Gorra" class="fotos">
                            <img src="assets/img/Taza2.jpg" alt="Taza" class="fotos">
                            <img src="assets/img/Bolso1.jpg" alt="Bolso" class="fotos">
                        </div>
                    </div>
                </div>
            </section>

            
            <section class="seccion-segundo">
                <div class="dividir-seccion-dos"> 
                <form action="index.php?c=Productos&f=search" method="POST" id="formBuscar">
                        <div class="contenedor-buscar">
                            <input type="text" name="b" id="busqueda"  placeholder="Buscar por cliente..."/>
                            <button class="btn-buscar" type="submit"><i class='bx bx-search' ></i>Buscar</button>
                        </div>
                    </form> 
                    <div>
                        <a href="index.php?c=Productos&f=view_new"><button class="btn-nuevo" type="button"><i class='bx bx-plus' ></i>Nuevo</button></a>
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
                        <th>PRODUCTO</th>
                        <th>CLIENTE</th>
                        <th>TELEFONO</th>
                        <th>COLORES</th>
                        <th>DISEÑO</th>
                        <th>MODELO</th>
                        <th>OBSERVACIONES</th>
                        <th>ACCIONES</th>
                    </thead>
                <tbody>

                <?php                 
                    foreach ($resultados as $fila) {
                ?>

                <tr>
                    <td><?php echo $fila->disenio_id;?></td>
                    <td><?php echo $fila->producto; ?></td>
                    <td><?php echo $fila->cliente;?></td>
                    <td><?php echo $fila->telefono;?></td>
                    <td><?php echo $fila->colores;?></td>
                    <td><?php echo $fila->disenio;?></td>
                    <td><?php echo $fila->modelo;?></td>
                    <td><?php echo $fila->observaciones;?></td>

                    <td>
                        <a class="accion-boton editar" href="index.php?c=Productos&f=view_edit&id=<?php echo $fila->disenio_id;?>"><i class='bx bxs-pencil' ></i></a>
                        <a class="accion-boton borrar" href="index.php?c=Productos&f=delete&id=<?php echo $fila->disenio_id;?>" 
                        onclick="if(!confirm('Esta seguro de eliminar el Diseño de Producto?'))return false;"><i class='bx bxs-trash-alt' ></i></a>
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

