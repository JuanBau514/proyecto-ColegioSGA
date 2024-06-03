<?php
include '../../pages/Dashboard/adminDs.php';
include("../../logic/profesor/crud_profe.php");

$crud_p = new Crud_profe($db->connect());
$email = urldecode($_GET['profesor']);
$profesor = $crud_p->obtenerProfesor($email);
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
                            <?php echo $profesor["nombre"]; ?>
                        </p>
                    </div>
                    <div>
                        <p><span>Identificación: </span>
                            <?php echo $profesor["id"]; ?>
                        </p>
                    </div>
                    <div>
                        <p><span>Edad: </span>
                            <?php echo $profesor["edad"]; ?>
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
                            <?php echo $profesor["telefono"]; ?>
                        </p>
                    </div>
                    <div>
                        <p><span>Area: </span>
                            <?php echo $profesor["area"]; ?>
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