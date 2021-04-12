<?php session_start();

    if(isset($_SESSION['usuario'])) {
        header('location: index.php');
    }



    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $correo = $_POST['usuario'];
        $usuario1 = $_POST['usuario1'];
        $usuario2 = $_POST['usuario2'];
        $usuario = $_POST['correo'];
        $clave = $_POST['clave'];
        $clave2 = $_POST['clave2'];


        $error = '';

        if (empty($correo) or empty($usuario1) or empty($usuario2) or empty($usuario) or empty($clave) or empty($clave2)){

            $error .= '<i>Favor de rellenar todos los campos</i>';
        }else{
            try{
                $conexion = new PDO('mysql:host=localhost;dbname=bdd1', 'root', '');
            }catch(PDOException $prueba_error){
                echo "Error: " . $prueba_error->getMessage();
            }

            $statement = $conexion->prepare('SELECT * FROM usuario WHERE usuario = :usuario LIMIT 1');
            $statement->execute(array(':usuario' => $usuario));
            $resultado = $statement->fetch();


            if ($resultado != false){
                $error .= '<i>Este usuario ya existe</i>';
            }

            if ($clave == "" || strlen ($clave) < 8){
                $error .= '<i>La contraseña tiene menos de 8 caracteres </i>';
            }

            

            if ($clave != $clave2){
                $error .= '<i> Las contraseñas no coinciden</i>';
            }


        }


            if ($error == ''){
              $statement = $conexion->prepare('INSERT INTO usuario (id, nombre, app_usu, apm_usu, usuario, clave) VALUES (null,:nombre, :app_usu, :apm_usu,:usuario, :clave)');
              $statement->execute(array(

                    ':usuario' => $usuario,
                    ':app_usu' => $usuario1,
                    ':apm_usu' => $usuario2,
                    ':nombre' => $correo,
                    ':clave' => $clave

                ));

            $error .= '<i style="color: green;">Usuario registrado exitosamente</i>';
        }
    }


    require 'frontend/register-vista.php';

?>
