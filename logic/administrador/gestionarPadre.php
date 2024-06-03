<?php
include '../../pages/Dashboard/adminDs.php';
include("../../logic/padre/crud_padre.php");

$crud_p = new Crud_padre($db->connect());
$adminEmail = urldecode($_GET['admin']);
$padres = $crud_p->obtenerTodos();
?>

<!DOCTYPE html>
<html lang="es">

    <div class="main-content">
 
        <main>
        <h1>Información de Padres de Familia</h1>
        <br>
        <button class="boton" onclick="location.href='../../logic/administrador/agregarPadre.php?admin=<?php echo $admin['email']; ?>';">Agregar Nuevo</button>
        <div class="page-header inicio">                
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Id Hijo</th>
                            <th>Detalles</th>
                            <th>Editar</th>
                            <th>ELiminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($padres as $padre): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($padre['nombre']); ?></td>
                                
                                <td><?php echo htmlspecialchars($padre['email']); ?></td>
                                
                                <td><?php echo htmlspecialchars($padre['telefono']); ?></td>
                                <td><?php echo htmlspecialchars($padre['idEs']); ?></td>
                                <td><button class="boton" onclick="location.href='../../logic/administrador/infoPadre.php?admin=<?php echo $admin['email']; ?>&padre=<?php echo $padre['email']; ?>';">Detalles</button></td>
                                <td><button class="boton" onclick="location.href='../../logic/administrador/editarPadre.php?admin=<?php echo $admin['email']; ?>&padre=<?php echo $padre['email']; ?>';">Editar</button></td>
                                <td><button class="boton" onclick="location.href='../../logic/administrador/eliminarPadre.php?admin=<?php echo $admin['email']; ?>&padre=<?php echo $padre['email']; ?>';">Eliminar</button></td>                              
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>    
        </main>
    </div>
    <script src="/logic/dashboard.js"></script>
</body>

</html>