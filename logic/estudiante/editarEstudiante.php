<?php
include '../../pages/Dashboard/estudianteDs.php';
?>


<!DOCTYPE html>
<html lang="es">

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
                <img src="../../sources/img/estudiante.jpg" width="30px" alt="foto de perfil">
                <div class="info-p">
                    <h4><?php echo $estudiante["nombre"]; ?></h4>
                    <small>estudiante</small>
                </div>
            </div>

        </header>

        <main>
            <form method="post" action="../procesos/actualizar_e.php">
                <div class="page-header inicio">
                    <div>
                        <h1>Datos Personales</h1>
                        <div>
                            <p><span>Nombre: </span>
                                <input type='text' id="nombre" name="nombre" value="<?php echo $estudiante["nombre"]; ?>">
                            </p>
                        </div>
                        <div>
                            <p><span>Identificación: </span>
                                <input type='text' id="id" name="id" value="<?php echo $estudiante["id"]; ?>">
                            </p>
                        </div>
                        <div>
                            <p><span>Edad: </span>
                                <input type='text' id="edad" name="edad" value="<?php echo $estudiante["edad"]; ?>">
                            </p>
                        </div>
                        <div>
                            <p><span>Grado: </span>
                                <input type='text' id="grado" name="grado" value="<?php echo $estudiante["grado"]; ?>">
                            </p>
                        </div>
                        <div>
                            <p><span>Email: </span>
                                <input type='text' id="email" name="email" value="<?php echo $estudiante["email"]; ?>">
                            </p>
                        </div>
                        <div>
                            <p><span>Contraseña: </span>
                                <input type='text' id="contrasena" name="contrasena" value="<?php echo $estudiante["contrasena"]; ?>">
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
    <script src="/logic/dashboard.js"></script>
</body>

</html>