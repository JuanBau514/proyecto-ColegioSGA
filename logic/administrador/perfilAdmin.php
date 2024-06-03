<?php
include '../../pages/Dashboard/adminDs.php';
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
                            <?php echo $admin["nombre"]; ?>
                        </p>
                    </div>
                    <div>
                        <p><span>Identificación: </span>
                            <?php echo $admin["id"]; ?>
                        </p>
                    </div>                                       
                    <div>
                        <p><span>Email: </span>
                            <?php echo $admin["email"]; ?></h3>
                        </p>
                    </div>
                    <div>
                        <p><span>Contraseña: </span>
                            <?php echo $admin["contrasena"]; ?></h3>
                        </p>
                    </div>
                    <div>
                        <p><span>Telefono: </span>
                            <?php echo $admin["telefono"]; ?>
                        </p>
                    </div>
                    <div class="centrado">
                        <br><br> <button class="boton" onclick="location.href='../../logic/administrador/editarAdmin.php?admin=<?php echo $email; ?>';">Editar</button>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="/logic/dashboard.js"></script>
</body>

</html>