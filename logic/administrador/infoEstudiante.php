<?php
include '../../pages/Dashboard/adminDs.php';
include("../../logic/estudiante/crud_e.php");

$crud_e = new Crud_e($db->connect());
$email = urldecode($_GET['estudiante']);
$estudiante = $crud_e->obtenerEstudiante($email);
?>

<!DOCTYPE html>
<html lang="es">

    <div class="main-content">
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
                        <!--<br><br> <button class="boton" onclick="location.href='../../logic/administrador/editarEstudiante.php?administrador=<?php echo $admin['email']; ?>';">Editar</button>-->
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="/logic/dashboard.js"></script>
</body>

</html>