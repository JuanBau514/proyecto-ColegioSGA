<?php
include("../../pages/Dashboard/estudianteDs.php");
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
            <div class="page-header inicio">
                <div>
                    <h1>Datos Personales</h1>
                    <div>
                        <p><span>Nombre: </span>
                            <?php echo $estudiante["nombre"]; ?>
                        </p>
                    </div>
                    <div>
                        <p><span>Identificación: </span>
                            <?php echo $estudiante["id"]; ?>
                        </p>
                    </div>
                    <div>
                        <p><span>Edad: </span>
                            <?php echo $estudiante["edad"]; ?>
                        </p>
                    </div>
                    <div>
                        <p><span>Grado: </span>
                            <?php echo $estudiante["grado"]; ?>
                        </p>
                    </div>
                    <div>
                        <p><span>Email: </span>
                            <?php echo $estudiante["email"]; ?></h3>
                        </p>
                    </div>
                    <div>
                        <p><span>Contraseña: </span>
                            <?php echo $estudiante["contrasena"]; ?></h3>
                        </p>
                    </div>
                    <div class="centrado">
                        <br><br> <button class="boton" onclick="location.href='../../logic/estudiante/editarEstudiante.php?estudiante=<?php echo $email; ?>';">Editar</button>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="/logic/dashboard.js"></script>
</body>

</html>