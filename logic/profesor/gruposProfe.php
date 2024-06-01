<?php
include("../../pages/Dashboard/profesorDs.php");
include("../procesos/crudGrupos.php");

// Crear una instancia del CRUD
$crud_g = new Crud_grupos($db->connect());
$grupos = $crud_g->obtenerTodos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Información de Grupos</title>
</head>
<body>
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
            <h1>Información de Grupos</h1>
            <br>
            <div class="page-header inicio">
                <table>
                    <thead>
                        <tr>
                            <th>ID Grupo</th>
                            <th>Materia</th>
                            <th>Curso</th>
                            <th>ID Profesor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($grupos): ?>
                            <?php foreach ($grupos as $grupo): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($grupo['idGrupo']); ?></td>
                                    <td><?php echo htmlspecialchars($grupo['materia']); ?></td>
                                    <td><?php echo htmlspecialchars($grupo['curso']); ?></td>
                                    <td><?php echo htmlspecialchars($grupo['idProf']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4">No hay grupos registrados.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>    
        </main>
    </div>
    <script src="/logic/dashboard.js"></script>
</body>
</html>
