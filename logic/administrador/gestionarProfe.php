<?php
include '../../pages/Dashboard/adminDs.php';
include("../../logic/profesor/crud_profe.php");

$crud_p = new Crud_profe($db->connect());
$profes = $crud_p->obtenerTodos();
?>

<!DOCTYPE html>
<html lang="es">

    <div class="main-content">
        <main>
        <h1>Información de Profesores</h1>
        <br>
       <button class="boton" onclick="location.href='../../logic/administrador/agregarProfe.php?admin=<?php echo $admin['email']; ?>';">Agregar Nuevo</button>
        <div class="page-header inicio">                
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Área</th>
                            <th>Detalles</th>
                            <th>Editar</th>
                            <th>ELiminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($profes as $profesor): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($profesor['nombre']); ?></td>
                                
                                <td><?php echo htmlspecialchars($profesor['email']); ?></td>
                                
                                <td><?php echo htmlspecialchars($profesor['telefono']); ?></td>
                                
                                <td><?php echo htmlspecialchars($profesor['area']); ?></td>  
                                <td><button class="boton" onclick="location.href='../../logic/administrador/infoProfe.php?admin=<?php echo $admin['email']; ?>&profesor=<?php echo $profesor['email']; ?>';">Detalles</button></td>
                                <td><button class="boton" onclick="location.href='../../logic/administrador/editarProfe.php?admin=<?php echo $admin['email']; ?>&profesor=<?php echo $profesor['email']; ?>';">Editar</button></td>
                                <td><button class="boton" onclick="location.href='../../logic/administrador/eliminarProfe.php?admin=<?php echo $admin['email']; ?>&profesor=<?php echo $profesor['email']; ?>';">Eliminar</button></td>                              
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