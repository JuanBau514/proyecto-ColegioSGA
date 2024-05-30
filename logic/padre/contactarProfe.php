<?php
include("../../pages/Dashboard/padresDs.php");
include("../../logic/profesor/crud_profe.php");
$db = new DataBase();
$crud_p = new Crud_profe($db->connect());
$profes = $crud_p->obtenerTodos();
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
        <h1>Información de Profesores</h1>
        <br>
        <div class="page-header inicio">                
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Área</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($profes as $profesor): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($profesor['nombre']); ?></td>
                                
                                <td><?php echo htmlspecialchars($profesor['email']); ?></td>
                                
                                <td><?php echo htmlspecialchars($profesor['telefono']); ?></td>
                                
                                <td><?php echo htmlspecialchars($profesor['area']); ?></td>                                
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