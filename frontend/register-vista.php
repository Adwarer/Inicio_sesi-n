<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login / Register Magtimus</title>

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">


    <link rel="stylesheet" href="icon/style.css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

<div class="container-form">
        <div class="header">
            <div class="logo-title">
                <img src="image/logo-microformas.png" alt="">
                <h2>Microformas</h2>
            </div>
            <div class="menu">
                <a href="login.php"><li class="module-login">Iniciar sesión</li></a>
                <a href="register.php"><li class="module-register active">Registrar nuevo usuario</li></a>
            </div>
        </div>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form">
            <div class="welcome-form"><h1>Bienvenido a</h1><h2>Microformas</h2></div>

            <div class="user line-input">
                <label class="lnr lnr-user"></label>
                <input type="text" placeholder="Nombre " name="usuario">
            </div>

            <div class="user line-input">
                <label class="lnr lnr-user"></label>
                <input type="text" placeholder="Primer apellido " name="usuario1">
            </div>
            <div class="user line-input">
                <label class="lnr lnr-user"></label>
                <input type="text" placeholder="Segundo apellido " name="usuario2">
            </div>

            <div class="user line-input">
                <label class="lnr lnr-envelope"></label>
                <input type="text" placeholder="Correo" name="correo">
            </div>

            <div class="password line-input">
                <label class="lnr lnr-lock"></label>
                <input type="password" placeholder="Contraseña" name="clave">
            </div>

            <div class="password line-input">
                <label class="lnr lnr-lock"></label>
                <input type="password" placeholder="Confirmar contraseña" name="clave2">
            </div>

            <?php if(!empty($error)): ?>
            <div class="mensaje">
                <?php echo $error; ?>
            </div>
            <?php endif; ?>

            <button type="submit">Registrarse<label class="lnr lnr-chevron-right"></label></button>

    </form>
    </div>


    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
