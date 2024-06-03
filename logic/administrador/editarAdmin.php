<?php
include '../../pages/Dashboard/adminDs.php';
?>


<!DOCTYPE html>
<html lang="es">

    <div class="main-content">
        <main>
            <form method="post" action="../procesos/actualizar_adm.php">
                <div class="page-header inicio">
                    <div>
                        <h1>Datos Personales</h1>
                        <div>
                            <p><span>Nombre: </span>
                                <input type='text' id="nombre" name="nombre" value="<?php echo $admin["nombre"]; ?>">
                            </p>
                        </div>
                        <div>
                            <p><span>Identificación: </span>
                                <input type='text' id="id" name="id" value="<?php echo $admin["id"]; ?>">
                            </p>
                        </div>
                        <div>
                            <p><span>Email: </span>
                                <input type='text' id="email" name="email" value="<?php echo $admin["email"]; ?>">
                            </p>
                        </div>
                        <div>
                            <p><span>Contraseña: </span>
                                <input type='text' id="contrasena" name="contrasena" value="<?php echo $admin["contrasena"]; ?>">
                            </p>                            
                        </div>                        
                        <div>
                            <p><span>Telefono: </span>
                                <input type='text' id="telefono" name="telefono" value="<?php echo $admin["telefono"]; ?>">
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