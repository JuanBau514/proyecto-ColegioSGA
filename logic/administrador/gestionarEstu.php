<?php
include '../../pages/Dashboard/adminDs.php';
include("../../logic/estudiante/crud_e.php");

$crud_e = new Crud_e($db->connect());
$estudiantes = $crud_e->obtenerTodos();
?>

<!DOCTYPE html>
<html lang="es">

    <div class="main-content">
 
        <main>
        <h1>Información de Estudiantes</h1>
        <br>
        <button class="boton" onclick="location.href='../../logic/administrador/agregarEstudiante.php?admin=<?php echo $admin['email']; ?>';">Agregar Nuevo</button>
        <div class="page-header inicio">                
                <table>
                    <thead>
                        <tr>
                            <th>Identificación</th>
                            <th>Nombre</th>
                            <th>Edad</th>
                            <th>Email</th>
                            <th>Grado</th>
                            <th>Detalles</th>
                            <th>Editar</th>
                            <th>ELiminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($estudiantes as $estudiante): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($estudiante['id']); ?></td>
                                <td><?php echo htmlspecialchars($estudiante['nombre']); ?></td>
                                <td><?php echo htmlspecialchars($estudiante['edad']); ?></td> 
                                <td><?php echo htmlspecialchars($estudiante['email']); ?></td>                                
                                <td><?php echo htmlspecialchars($estudiante['grado']); ?></td>
                                <td><button class="boton" onclick="location.href='../../logic/administrador/infoEstudiante.php?admin=<?php echo $admin['email']; ?>&estudiante=<?php echo $estudiante['email']; ?>';">Detalles</button></td>
                                <td><button class="boton" onclick="location.href='../../logic/administrador/editarEstudiante.php?admin=<?php echo $admin['email']; ?>&estudiante=<?php echo $estudiante['email']; ?>';">Editar</button></td>
                                <td><button class="boton" onclick="location.href='../../logic/administrador/eliminarEstudiante.php?admin=<?php echo $admin['email']; ?>&estudiante=<?php echo $estudiante['email']; ?>';">Eliminar</button></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>    
        </main>
    </div>
    <script src="/logic/dashboard.js"></script>
</body>
¿|
</html>