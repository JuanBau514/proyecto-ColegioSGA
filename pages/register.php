<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='../css/registro.css'>
    <title>Registro</title>
</head>

<body>
    <div class='contenedor'>
        <form class='caja-formulario' method="post" action="register.php">
            <div class='contenedor-login' id='login'>
                <div class='encabezado'>
                    <h1 class='titulo'>Registro de Usuario</h1>
                </div>

                <div class='caja-entrada'>
                    <label for="nombre">Nombre:</label>
                    <input type='text' id="nombre" name="nombre" placeholder='Ingrese su nombre'>
                </div>

                <div class='caja-entrada'>
                    <label for="profesion">Profesión:</label>
                    <select id="profesion" name="profesion">
                        <option value="estudiante">Estudiante</option>
                        <option value="padre">Padre de Familia</option>
                        <option value="profesor">Profesor</option>
                    </select>
                </div>

                <div class='caja-entrada'>
                    <label for="edad">Edad:</label>
                    <input type='number' id="edad" name="edad" placeholder='Ingrese su edad'>
                </div>

                <div class='caja-entrada'>
                    <label for="email">Correo Electrónico:</label>
                    <input type='email' id="email" name="email" placeholder='Ingrese su correo electrónico'>
                </div>

                <div class='caja-entrada'>
                    <label for="password">Contraseña:</label>
                    <input type='password' id="pass" name="password" placeholder='Ingrese su contraseña'>
                </div>

                <div class='caja-entrada' id=grado>
                    <label for="grado">Grado donde está matriculado:</label>
                    <input type='text' id="grado-input" name="grado" placeholder='Ingrese su grado'>
                </div>

                <div class='caja-entrada'>
                    <input type='submit' class='boton-enviar' value='Registrarse'>
                </div>
            </div>
        </form>
    </div>
    <script>
        document.getElementById('profesion').addEventListener('change', function () {
            var profesionSeleccionada = this.value;
            var cajaGrado = document.getElementById('grado');
            if (profesionSeleccionada === 'padre' || profesionSeleccionada === 'profesor') {
                cajaGrado.style.display = 'none';
            } else {
                cajaGrado.style.display = 'block';
            }
        });
    </script>
</body>

</html>
