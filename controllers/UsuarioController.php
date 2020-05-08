<?php
require_once 'models/usuario.php';

class usuarioController{
    public function index(){
        echo "Controlador usuario, Accion index";
    }

    public function registro(){
        require_once 'views/usuario/registro.php';
    }

    public function save(){
        if(isset($_POST)){
            $nombres = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellidos = isset($_POST['apellido']) ? $_POST['apellido'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;

            if($nombres && $apellidos && $email && $password){
                $usuario = new Usuario();
                $usuario->setNombres($nombres);
                $usuario->setApellidos($apellidos);
                $usuario->setEmail($email);
                $usuario->setPassword($password);
            

                $save = $usuario->save();
                if($save){
                    $_SESSION['register'] = "Usuario registrado con exito";;
                }else{
                    $_SESSION['register'] = "Algo fallo, intentalo nuevamente";
                }
            }else{
                $_SESSION['register'] = "Algo fallo, intentalo nuevamente";
            }
        }else{
            $_SESSION['register'] = "failed";
            header("Location:".base_url.'usuario/registro');
        }
        header("Location:".base_url.'usuario/registro');
    }

    public function login(){
        if(isset($_POST)){
            //PARA IDENTIFICAR AL USUARIO
            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);

            $identity = $usuario->login();

            if($identity && is_object($identity)){
                $_SESSION['identity'] = $identity;

                if($identity->rol == 'admin'){
                    $_SESSION['admin'] = true;
                }
            }else{
                $_SESSION['error_login'] = 'Usuario o contraseña incorrecta';
            }
        }
        header("Location:".base_url);
    }

    public  function logout(){
        if(isset($_SESSION['identity'])){
            unset($_SESSION['identity']);
        }

        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
        }
        header("Location:".base_url);
    }
}