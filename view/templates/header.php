<header>
    <nav>
        <img src="assets/img/logotipo.png" alt="logo" class="nav-logo">
            
        <ul class="nav-botones">
            
            <li class="boton1"><a href="index.php?c=inicio&f=index">INICIO</a></li>
            
            <li class="boton2"><a href="index.php?c=servicios&f=index">SERVICIOS</a>

                <ul>
                    <li><a <?php 
                    if(isset($_SESSION['rol'])) {
                        echo "href='index.php?c=domicilios&f=view_domicilio_new'";                        
                    } 
                    else{
                        echo "href='index.php?c=Usuarios&f=index'";
                    } 
                    ?> class="submenu submenu1">A domicilio</a></li>
                    
                    <li><a <?php 
                    if(isset($_SESSION['rol'])) {
                        echo "href='index.php?c=internacional&f=view_internacional_new'";                        
                    } 
                    else{
                        echo "href='index.php?c=Usuarios&f=index'";
                    } 
                    ?> href="index.php?c=internacional&f=view_internacional_list" class="submenu submenu2">Internacional</a> </li>                  
                </ul>
            </li>
            
            <li class="boton3">
                <a href="index.php?c=productos&f=index">PRODUCTOS</a>
                <ul>
                    <li><a <?php 
                    if(isset($_SESSION['rol'])) {
                        echo "href='index.php?c=productos&f=view_new'";                        
                    } 
                    else{
                        echo "href='index.php?c=Usuarios&f=index'";
                    } 
                    ?> href="index.php?c=productos&f=view_list" class="submenu submenu3">Crear Diseño</a></li>
                </ul>
            </li>
            
            <li class="boton4">
                <a href="index.php?c=resenias&f=index">RESEÑAS</a>
                <ul>
                    <li><a <?php 
                    if(isset($_SESSION['rol'])) {
                        echo "href='index.php?c=resenias&f=view_new'";                        
                    } 
                    else{
                        echo "href='index.php?c=Usuarios&f=index'";
                    } 
                    ?> href="index.php?c=resenias&f=view_list" class="submenu submenu4">Dejar Reseña</a></li>
                </ul>
            </li>
            
            <li class="boton5">
                <a href="index.php?c=contacto&f=index">CONTACTO</a>
                <ul>
                    <li><a <?php 
                    if(isset($_SESSION['rol'])) {
                        echo "href='index.php?c=contacto&f=view_new'";                        
                    } 
                    else{
                        echo "href='index.php?c=Usuarios&f=index'";
                    } 
                    ?> href="index.php?c=contacto&f=view_list" class="submenu submenu5">Escribenos!</a></li>
                </ul>
            </li>  
            <?php
            if((isset($_SESSION['rol'])) and ($_SESSION['rol'] == "cliente")) {
            ?>
            <li class="boton6"><a>ADMIN</a>
                <ul>
                    <li><a href="index.php?c=domicilios&f=view_domicilio_list" class="submenu submenu6">A domicilio</a></li>
                    <li><a href="index.php?c=internacional&f=view_internacional_list" class="submenu submenu7">Internacional</a></li>
                    <li><a href="index.php?c=productos&f=view_list" class="submenu submenu8">Productos</a></li> 
                    <li><a href="index.php?c=resenias&f=view_list" class="submenu submenu9">Reseñas</a></li> 
                    <li><a href="index.php?c=contacto&f=view_list" class="submenu submenu10">Contacto</a></li>   
                    <li><a href="index.php?c=usuarios&f=view_list" class="submenu submenu11">Usuarios</a></li>                    
                </ul> 
            </li>                    
            <?php 
            }
            ?>
        </ul>
                
    </nav>
</header>        