
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CONTIENE UN FORMULARIO PARA ESCRIBIR LAS RESEÑAS DE LA EMPRESA">
    <meta name="keywords" content="Sublimados, Estampados, Camisetas, Tazas, Reseñas, Formulario">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <title>TU RESEÑA</title>
    <style>
        .seccion-segundo {
            height: auto;
            flex-direction: column;            
        }

        .row {
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
            margin: 40px 0 60px 0;
            border: #9EE9A1 2px solid;
            border-collapse: collapse;
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
                    <form action="index.php?c=Resenias&f=search" method="POST">
                        <div class="contenedor-buscar">
                            <input type="text" name="b" id="busqueda"  placeholder="Buscar por nombre..."/>
                            <button class="btn-buscar" type="submit">Buscar</button>
                        </div>
                    </form>       
                    <div>
                        <a href="index.php?c=Resenias&f=view_new"><button class="btn-nuevo" type="button">Nuevo</button></a>
                    </div>
                </div>
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

