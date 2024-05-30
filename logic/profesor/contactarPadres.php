<?php
include("../../pages/Dashboard/profesorDs.php");
include("../../logic/padre/crud_padre.php");
include("../../logic/estudiante/crud_e.php");
$db = new DataBase();
$crud_p = new Crud_padre($db->connect());
$padres = $crud_p->obtenerTodos();
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
                    <h4><?php echo $profesor["nombre"]; ?></h4>
                    <small>Profesor</small>
                </div>
            </div>

        </header>

        <main>
        <h1>Información de Padres de Familia</h1>
        <br>
        <div class="page-header inicio">                
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Id Hijo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($padres as $padre): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($padre['nombre']); ?></td>
                                
                                <td><?php echo htmlspecialchars($padre['email']); ?></td>
                                
                                <td><?php echo htmlspecialchars($padre['telefono']); ?></td>
                                <td><?php echo htmlspecialchars($padre['idEs']); ?></td>
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