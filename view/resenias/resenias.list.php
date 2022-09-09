<!--   AUTOR: APRAEZ GONZALEZ EMELY MISHELL  -->

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
                    <form action="index.php?c=Resenias&f=search" method="POST" id="formBuscar">
                        <div class="contenedor-buscar">
                            <input type="text" name="b" id="busqueda"  placeholder="Buscar por nombre..."/>
                            <button class="btn-buscar" type="submit"><i class='bx bx-search' ></i>Buscar</button>
                        </div>
                    </form>       
                    <div>
                        <a href="index.php?c=Resenias&f=view_new"><button class="btn-nuevo" type="button"><i class='bx bx-plus' ></i>Nuevo</button></a>
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
                        <th>NOMBRE</th>
                        <th>EMAIL</th>
                        <th>VALORACIÓN</th>
                        <th>SERVICIO</th>
                        <th>RESEÑA</th>
                        <th>RECIBIR PROM.</th>
                        <th>ESTADO</th>
                        <th>ACCIONES</th>
                    </thead>
                    <tbody>
                        <?php                 
                        foreach ($resultados as $fila) {
                        ?>
                        <tr>
                            <td><?php echo $fila->resenia_id;?></td>
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

