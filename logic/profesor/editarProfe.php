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
            <form method="post" action="../procesos/actualizar_pro.php">
                <div class="page-header inicio">
                    <div>
                        <h1>Datos Personales</h1>
                        <div>
                            <p><span>Nombre: </span>
                                <input type='text' id="nombre" name="nombre" value="<?php echo $profesor["nombre"]; ?>">
                            </p>
                        </div>
                        <div>
                            <p><span>Identificación: </span>
                                <input type='text' id="id" name="id" value="<?php echo $profesor["id"]; ?>">
                            </p>
                        </div>
                        <div>
                            <p><span>Edad: </span>
                                <input type='text' id="edad" name="edad" value="<?php echo $profesor["edad"]; ?>">
                            </p>
                        </div>
                        <div>
                            <p><span>Email: </span>
                                <input type='text' id="email" name="email" value="<?php echo $profesor["email"]; ?>">
                            </p>
                        </div>
                        <div>
                            <p><span>Contraseña: </span>
                                <input type='text' id="contrasena" name="contrasena" value="<?php echo $profesor["contrasena"]; ?>">
                            </p>
                        </div>
                        <div>
                            <p><span>Telefono: </span>
                                <input type='text' id="telefono" name="telefono" value="<?php echo $profesor["telefono"]; ?>">
                            </p>
                        </div>
                        <div>
                            <p><span>Area: </span>
                                <input type='text' id="area" name="area" value="<?php echo $profesor["area"]; ?>">
                            </p>
                        </div>
                        <div class="centrado">
                            <br><br> <button class="boton">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
        </main>
    </div>
    <script src="../../logic/dashboard.js"></script>
</body>

</html>