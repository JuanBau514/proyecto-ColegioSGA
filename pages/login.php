<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login SGA</title>
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <div class='contenedor'>
        <div class='caja-formulario'>
            <div class='contenedor-login' id='login'>
                <div class='encabezado'>
                    <span>
                        No tienes una cuenta <a href='register.php'> Regístrate </a>
                    </span>
                    <h1 class='titulo'>Inicio de Sesión</h1>
                </div>
                <form method="post" action="../logic/procesos/prologin.php">
                    <div class='caja-entrada'>
                        <input type='text' class='entrada' name='Nickname_o_Email' placeholder='Nickname o Email' required />
                        <i class='bx bx-user'></i>
                    </div>
                    <div class='caja-entrada'>
                        <input type='password' class='entrada' name='Contrasena' placeholder='Contraseña' required />
                        <i class='bx bx-lock-alt'></i>
                    </div>
                    <div class='caja-entrada'>
                        <input type='submit' class='boton-enviar' value='Iniciar Sesión' />
                    </div>
                </form>
                <?php if (isset($error)) { ?>
                    <div class="error"><?php echo $error; ?></div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>
