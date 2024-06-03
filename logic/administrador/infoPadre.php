<?php
include '../../pages/Dashboard/adminDs.php';
include("../../logic/padre/crud_padre.php");
include("../../logic/estudiante/crud_e.php");
$crud_hijo = new Crud_e($db->connect());
$crud_p = new Crud_padre($db->connect());
$adminEmail = urldecode($_GET['admin']);
if (isset($_GET['padre'])) {
    // Obtener el valor del parámetro 'email' y decodificarlo si es necesario
    $email = urldecode($_GET['padre']);
    $padre = $crud_p->obtenerPadre($email);
    if($padre){
        $hijo = $crud_hijo->obtenerEstudiantePorId($padre["idEs"]);
    }
}
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
                            <?php echo $padre["nombre"]; ?>
                        </p>
                    </div>
                    <div>
                        <p><span>Identificación: </span>
                            <?php echo $padre["id"]; ?>
                        </p>
                    </div>
                    <div>
                        <p><span>Email: </span>
                            <?php echo $padre["email"]; ?></h3>
                        </p>
                    </div>
                    <div>
                        <p><span>Contraseña: </span>
                            <?php echo $padre["contrasena"]; ?></h3>
                        </p>
                    </div>
                    <div>
                        <p><span>Telefono: </span>
                            <?php echo $padre["telefono"]; ?>
                        </p>
                    </div>
                    <div>
                        <p><span>IdHijo: </span>
                            <?php echo $padre["idEs"]; ?>
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