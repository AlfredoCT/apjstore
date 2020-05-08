<?php
require_once 'models/categoria.php';

class categoriaController{
    public function gestion(){
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        require_once 'views/categoria/gestion.php';
    }

    public function crear(){
        Utils::isAdmin();

        require_once 'views/categoria/crear.php';
    }

    public function save(){
        Utils::isAdmin();
        if(isset($_POST) && isset($_POST['nombre'])){
            #GUARDA LA CATEGORIA#
            $categoria = new Categoria();
            $categoria->setNombre($_POST['nombre']);
            $categoria->save();
        }
        header("Location:".base_url."categoria/gestion");
    }

    public function edit(){
        Utils::isAdmin();
        
        $edit = true;
        require_once 'views/categoria/crear.php';
    }


    public function delete(){
        Utils::isAdmin();
        
        if(isset($_GET['id'])){
            $categoria = new Categoria();
            $categoria->setId($_GET['id']);
            $delete = $categoria->delete();
            if($delete){
                $_SESSION['delete'] = 'complete';
            }else{
                $_SESSION['delete'] = 'failed';
            }
        }else{
            $_SESSION['delete'] = 'failed';
        }
        header("Location:".base_url."categoria/gestion");
    }

}