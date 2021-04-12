<?php session_start();

    if(isset($_SESSION['usuario'])) {
        header('location: index.php');
    }

    $error = '';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        

        try{
            $conexion = new PDO('mysql:host=localhost;dbname=bdd1', 'root', '');
            }catch(PDOException $prueba_error){
                echo "Error: " . $prueba_error->getMessage();
            }

        $statement = $conexion->prepare('
        SELECT * FROM usuario WHERE usuario = :usuario AND clave = :clave'
        );

        $statement->execute(array(
            ':usuario' => $usuario,
            ':clave' => $clave
        ));

        $resultado = $statement->fetch();

        if ($resultado !== false){
            $_SESSION['usuario'] = $usuario;
            header('location: principal.php');
        }else{
            $error .= '<i>Este usuario no existe</i>';
        }
    }

require 'frontend/login-vista.php';


?>
