<?php
include("../../pages/Dashboard/padresDs.php");
include("../../logic/estudiante/crud_e.php");

$crud_hijo = new Crud_e($db->connect());

if (isset($_GET['padre'])) {
    // Obtener el valor del parámetro 'email' y decodificarlo si es necesario
    $email = urldecode($_GET['padre']);
    if($padre){
        $hijo = $crud_hijo->obtenerEstudiantePorId($padre["idEs"]);
    }
}
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
                <img src="/sources/img/admin.png" width="30px" alt="foto de perfil">
                <div class="info-p">

                    <h4><?php echo $padre["nombre"]; ?></h4>
                    <small>padre</small>
                </div>
            </div>

        </header>

        <main>
            <div class="page-header inicio">
                <div>
                    <h1>Datos Personales</h1>
                    <div>
                        <p><span>Nombre: </span>
                            <?php echo $padre["nombre"]; ?></h3>
                        </p>
                    </div>
                    <div>
                        <p><span>Identificación: </span>
                            <?php echo $padre["id"]; ?>
                        </p>
                    </div>                  
                    <div>
                        <p><span>Email: </span>
                            <?php echo $padre["email"]; ?>
                        </p>
                    </div>
                    <div>
                        <p><span>Contraseña: </span>
                            <?php echo $padre["contrasena"]; ?>
                        </p>
                    </div>
                    <div>
                        <p><span>Telefono: </span>
                            <?php echo $padre["telefono"]; ?>
                        </p>
                    </div>
                    <div>
                        <p><span>Identificación hijo matriculado: </span>
                            <?php echo $padre["idEs"]; ?>
                        </p>
                    </div>
                    <div class="centrado">
                        <br><br> <button class="boton" onclick="location.href='../../logic/padre/editarPadre.php?padre=<?php echo $email; ?>';">Editar</button>
                    </div>
                </div>
            </div>

        </main>
    </div>
    <script src="/logic/dashboard.js"></script>
</body>

</html>