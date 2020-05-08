<?php 

class Usuario{
    private $id;
    private $nombres;
    private $apellidos;
    private $email;
    private $password;
    private $rol;
    private $image;
    Private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    function getId(){
        return $this->id;
    }

    function getNombres(){
        return $this->nombres;
    }

    function getApellidos(){
        return $this->apellidos;
    }

    function getEmail(){
        return $this->email;
    }

    function getPassword(){
        return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
    }

    function getRol(){
        return $this->rol;
    }

    function getImage(){
        return $this->image;
    }

    function setId($id){
        $this->id = $id;
    }

    function setNombres($nombres){
        $this->nombres = $this->db->real_escape_string($nombres);
    }

    function setApellidos($apellidos){
        $this->apellidos = $this->db->real_escape_string($apellidos);
    }

    function setEmail($email){
        $this->email = $this->db->real_escape_string($email);
    }

    function setPassword($password){
        $this->password = $password;
    }

    function setRol($rol){
        $this->rol = $rol;
    }

    function setImage($image){
        $this->image = $image;
    }

    public function save(){
        $sql = "INSERT INTO usuarios VALUES(
            NULL, 
            '{$this->getNombres()}',
            '{$this->getApellidos()}',
            '{$this->getEmail()}',
            '{$this->getPassword()}',
            'user',
            null
        )";
        $save = $this->db->query($sql);
        
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

    public function login(){
        $result = false;
        $email = $this->email;
        $password = $this->password;
        
        //Se comprueba si el usario existe
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $login = $this->db->query($sql);

        if($login && $login->num_rows == 1){
            $usuario = $login->fetch_object();

            //Se valida la contraseña
            $verify = password_verify($password, $usuario->password);

            if($verify){
                $result = $usuario;
            }
        }
        return $result;
    }
}