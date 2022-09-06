<!DOCTYPE html>
<html lang="en">

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
            height: 600px;
            flex-direction: row;
        }

        .acciones{
            display: flex;
            flex-direction: row;
            justify-content: space-between;        
            background-color: #2B2729;
            height: auto;
            border-radius: 40px;
            margin-top: 40px;
            padding: 30px;
            width: 50%;
            gap: 15px;
        }
        
        .buscar,.nuevo{
            background-color: #D4F4DB;
            border-radius: 30px;
            width: 150px;
            height: 42px;
            font-weight: bold;
            border: 0;
            color: #2B2729;
            cursor: pointer;
        }

        .dockerBuscar{
            display: flex;
            flex-direction: row;
            gap: 20px;
            justify-content: space-between;
        }

        input[type="text"] {
            border-radius: 30px;
            width: 100%;
            height: 42px;
            border: 0;
            cursor: pointer;
            padding-left: 20px;
        }

        table{
            border: #b2b2b2 1px solid;
            margin: 40px 0 60px 0;
            border: #9EE9A1 2px solid;
            border-collapse: collapse;
        }
        
        td,th{
            border: #b2b2b2 1px solid;
            padding: 5px;
            background: white;
            text-align: center;
        }

        th{
            background: #007F80;
        }
        
    </style>
</head>

<body>
    <div class="contenedor-principal">
    <?php if(!isset($_SESSION)){ 
        session_start();
      };require_once HEADER; ?>


        <main>
            <section class="seccion-primero">
                <div class="dividir-seccion-uno">
                    <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; margin-left: auto;
                    margin-right:auto ;">
                        <h2 id="encabezado">ESTAMOS PARA ATENDERTE</h2>
                        <h3 style="margin-top: -10px;">SUPERIUM</h3>
                        <p id="parrafo">
                            Queremos saber de tí y conocer sobre tus intereses para brindarte un mejor servicio. Te
                            invito a que te
                            comuniques con nosotros, será fácil y rápido solo tienes que completar el siguiente
                            formulario.
                            <br><br><span style="font-weight: bold;">Siempre estaremos para tí!</span>
                        </p>
                    </div>
                    <div class="seccion-uno-derecho">
                        <div class="circulo" id="circulo-arriba"></div>
                        <div class="circulo" id="circulo-medio">
                            <!-- La imagen esta en  128px redondeada (fuente: flaticon.com) -->
                            <img style="width: 100%; height: 100%;" src="assets/img/emailR.gif" alt="correo">
                        </div>
                        <div class="circulo" id="circulo-abajo"></div>
                    </div>
                </div>
            </section>

            <section class="seccion-segundo" id="seccion-2">
                <div id="DockerPrincipal">
                    <div class="acciones">                    
                        <form action="index.php?c=Contacto&f=search" method="POST" id="formBuscar">
                            <div class="dockerBuscar">
                                <input type="text" name="b" id="busqueda"  placeholder="Buscar por nombre..."/>
                                <button class="buscar" type="submit"><i class='fas fa-search' ></i>Buscar</button>
                            </div>
                        </form>       
                        <div>
                            <a href="index.php?c=Contacto&f=view_new"><button class="nuevo" type="button"><i class='fas fa-plus' ></i>Nuevo</button></a>
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
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE</th>
                            <th>APELLIDO</th>
                            <th>CELULAR</th>
                            <th>EMAIL</th>
                            <th>GENERO</th>
                            <th>ESTADO CIVIL</th>
                            <th>INTERESES</th>
                            <th>FECHA DE NACIMIENTO</th>
                            <th>COMENTARIO</th>                       
                            <th>ACCION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($result as $fila) {
                        ?>
                            <tr>
                                <td><?php echo $fila->contacto_id ?></td>
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
                                    <a class="boton-editar" href="index.php?c=Contacto&f=view_edit&id=<?php echo $fila->contacto_id;?>"><i class='bx bxs-pencil'></i></a>
                                    <a class="boton-borrar" href="index.php?c=Contacto&f=delete&id=<?php echo $fila->contacto_id;?>" 
                                    onclick="if(!confirm('Esta seguro de eliminar el contacto?'))return false;"><i class='bx bxs-trash-alt'></i></a>
                                </td>
                            </tr>
                        <?php 
                        } 
                        ?>
                    </tbody>
                    </table>
                
                </div>
            </section>

        </main>

        <?php  require_once FOOTER ?>
    </div>
</body>
</html>