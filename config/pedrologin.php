<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Aquí deberías agregar la lógica de validación de datos, como verificar si se proporcionaron los campos requeridos, etc.

    // Conexión a la base de datos (reemplaza con tus propios datos de conexión)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "n.g.d";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("La conexión a la base de datos falló: " . $conn->connect_error);
    }

    // Escapar datos para prevenir inyección SQL (reemplaza con el nombre correcto de los campos en tu formulario)
    $usuario = $conn->real_escape_string($_POST['Nickname_o_Email']);
    $contrasena = $conn->real_escape_string($_POST['Contrasena']);


    // Consultar la base de datos para verificar las credenciales
    $sql = "SELECT * FROM nuevo WHERE (Nickname = '$usuario' OR Email = '$usuario') AND Contrasena = '$contrasena'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Inicio de sesión exitoso
        $_SESSION['loggedin'] = true;
        $_SESSION['usuario'] = $usuario;
        header("Location: mainpage.html"); // Redirigir a la página de inicio después del inicio de sesión exitoso
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos";
    }
}
?>

