
<!-- include 'config.php';
if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['nombre']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $rpass = mysqli_real_escape_string($conn, md5($_POST['rpassword']));
    $image = $_FILES['imagen']['nombre'];
    $image_size = $_FILES['imagen']['size'];
    $image_tmp_name = $_FILES['imagen']['tmp_name'];
    $image_folder = 'uploaded_img/'.$image;

    $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

    if(mysqli_num_rows($select) > 0){
        $message[] = 'este usuario ya existe';
    }else{
        if($pass != $rpass);
    }
} -->


<?php
include 'config.php';

if(isset($_POST['submit'])){
    // Capturar datos del formulario
    $name = mysqli_real_escape_string($conn, $_POST['nombre']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);
    $rpass = mysqli_real_escape_string($conn, $_POST['rpassword']);

    // Verificar si el usuario ya existe
    $select = mysqli_query($conn, "SELECT * FROM user_form WHERE email = '$email'") or die('query failed');

    if(mysqli_num_rows($select) > 0){
        $message[] = 'Este usuario ya existe';
    } else {
        if($pass != $rpass){
            $message[] = 'Las contraseñas no coinciden';
        } else {
            // Hashear la contraseña
            $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

            // Verificar si se subió una imagen
            if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                $image = $_FILES['imagen']['name'];
                $image_tmp_name = $_FILES['imagen']['tmp_name'];
                $image_folder = 'uploaded_img/'.$image;

                // Mover la imagen al directorio de destino
                if(move_uploaded_file($image_tmp_name, $image_folder)) {
                    // Insertar datos con la imagen
                    $insert = mysqli_query($conn, "INSERT INTO user_form(nombre, email, password, imagen) VALUES('$name', '$email', '$hashed_pass', '$image')") or die('query failed');
                } else {
                    $message[] = 'Error al mover la imagen al directorio de destino';
                }
            } else {
                // Insertar datos sin imagen
                $insert = mysqli_query($conn, "INSERT INTO user_form(nombre, email, password) VALUES('$name', '$email', '$hashed_pass')") or die('query failed');
            }

            if($insert){
                $message[] = 'Usuario registrado con éxito';
            } else {
                $message[] = 'Error al registrar el usuario';
            }
        }
    }
}



/* Manejo de errores al subir la imagen */

/* if(isset($_FILES['imagen'])) {
    $errorCode = $_FILES['imagen']['error'];
    
    switch ($errorCode) {
        case UPLOAD_ERR_OK:
            echo "Archivo subido con éxito";
            break;
        case UPLOAD_ERR_INI_SIZE:
            echo "El archivo excede el tamaño máximo permitido por el servidor.";
            break;
        case UPLOAD_ERR_FORM_SIZE:
            echo "El archivo excede el tamaño máximo permitido por el formulario.";
            break;
        case UPLOAD_ERR_PARTIAL:
            echo "El archivo fue solo parcialmente subido.";
            break;
        case UPLOAD_ERR_NO_FILE:
            echo "No se subió ningún archivo.";
            break;
        case UPLOAD_ERR_NO_TMP_DIR:
            echo "Falta la carpeta temporal.";
            break;
        case UPLOAD_ERR_CANT_WRITE:
            echo "No se pudo escribir el archivo en el disco.";
            break;
        case UPLOAD_ERR_EXTENSION:
            echo "Una extensión de PHP detuvo la carga del archivo.";
            break;
        default:
            echo "Error desconocido.";
            break;
    }
} */

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <?php
    if(isset($message)){
        foreach($message as $message){
            echo '<div class"mesage">'.$message.'</div>';
        }
    }
    ?>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <!-- <form action="" method="post" enctype="multpart/form-data"> -->
        <form action="" method="post" enctype="multipart/form-data">

            <h3>Registro de Usuario</h3>
            <input type="text" name="nombre" placeholder="ingrese su nombre" class="box" required>
            <input type="email" name="email" placeholder="ingrese su email" class="box" required>
            <input type="password" name="password" placeholder="ingrese su contraseña" class="box" required>
            <input type="password" name="rpassword" placeholder="reingrese su contraseña" class="box" required>
            <input type="file" name="imagen" class="box" accept="image/jpg, image/jpeg, image/png">
            <input type="submit" name="submit" value="Registrarse ahora" class="btn">
            <a href="login.php">Iniciar Sesion</a>
        </form>
    </div>
</body>
</html>