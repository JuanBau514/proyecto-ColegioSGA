<?php
include '../../pages/Dashboard/profesorDs.php';
?>

<!DOCTYPE html>
<html lang="es">

<body>

<!-- Contenido principal -->

    <div class="main-content">
        <header>
            <div class="menu-toggle">
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>
            </div>
            <div class="header-icons foto-perfil">
                <span class="las la-search"></span>
                <span class="las la-bookmark"></span>
                <span class="las la-sms"></span>
                <img src="../../sources/img/admin.png" width="30px" alt="foto de perfil">
                <div class="info-p">
                    <h4><?php echo $profesor["nombre"]; ?></h4>
                    <small>Profesor</small>
                </div>
            </div>

        </header>

        <main>
            <div class="page-header inicio">
                <div>
                    <h1>Datos Personales</h1>
                    <div>
                        <p><span>Nombre: </span>
                            <?php echo $profesor["nombre"]; ?></h3>
                        </p>
                    </div>
                    <div>
                        <p><span>Identificación: </span>
                            <?php echo $profesor["id"]; ?></h3>
                        </p>
                    </div>
                    <div>
                        <p><span>Edad: </span>
                            <?php echo $profesor["edad"]; ?></h3>
                        </p>
                    </div>                    
                    <div>
                        <p><span>Email: </span>
                            <?php echo $profesor["email"]; ?></h3>
                        </p>
                    </div>
                    <div>
                        <p><span>Contraseña: </span>
                            <?php echo $profesor["contrasena"]; ?></h3>
                        </p>
                    </div>
                    <div>
                        <p><span>Telefono: </span>
                            <?php echo $profesor["telefono"]; ?></h3>
                        </p>
                    </div>
                    <div>
                        <p><span>Area: </span>
                            <?php echo $profesor["area"]; ?></h3>
                        </p>
                    </div>
                    <div class="centrado">
                        <br><br> <button class="boton" onclick="location.href='../../logic/profesor/editarProfe.php?profesor=<?php echo $email; ?>';">Editar</button>
                    </div>
                </div>
            </div>

        </main>
    </div>
    <script src="../../logic/dashboard.js"></script>
</body>

</html>