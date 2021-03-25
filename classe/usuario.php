<?php

class Usuario {

    private $idusuario;
    private $deslogin;
    private $dessenha;
    private $dtcadastro;

    public function getIdusuario(){
        return $this -> idusuario;
    }

    public function setUsuario($value){
        $this -> idusuario = $value;
    }

    public function getDessenha(){
        return $this -> dessenha;
    }

    public function setDessenha($value){
        $this -> dessenha = $value;
    }

    public function getDeslogin(){
        return $this -> deslogin;
    }

    public function setDeslogin($value){
        $this -> deslogin = $value;
    }

    public function getDtcadastro(){
        return $this -> dtcadastro;
    }

    public function setDtcadastro($value){
        $this -> dtcadastro = $value;
    }

    public function loadbyId($id){

        $sql = new Sql;
        $result = $sql -> select("SELECT * FROM tb_usuario WHERE idusuario =:ID", array(
            ":ID" => $id
        ));
        if (isset ($result[0])) {
            $row = $result[0];

            $this -> setUsuario($row["idusuario"]);
            $this -> setDeslogin($row["deslogin"]);
            $this -> setDessenha($row["dessenha"]);
            $this -> setDtcadastro($row["dtcadastro"]);
        }
    }

    public function __toString()
    {
       return json_encode(array(
            "Usuario" => $this -> getIdusuario(),
            "Login  " => $this -> getDeslogin(),
            "Senha  " => $this -> getDessenha(),
            "DT cads" => $this -> getDtcadastro()
        ));
    }
    
    public static function getlist(){
        $sql = new Sql;
        return $sql -> select("SELECT * FROM tb_usuario ORDER BY deslogin");

    }

    public static function search($login){

        $sql = new Sql;
        return $sql -> select("SELECT * FROM tb_usuario WHERE deslogin LIKE :ID ORDER BY deslogin", array(
            ':ID' => "%".$login."%"
        )); 

    }

    public function login($login, $password){

        $sql = new Sql;
        $result = $sql -> select("SELECT * FROM tb_usuario WHERE deslogin = :ID AND dessenha = :PASS", array(
            ":ID" => $login,
            ":PASS" => $password
        ));
        if (isset ($result[0])) {
            $row = $result[0];

            $this -> setUsuario($row["idusuario"]);
            $this -> setDeslogin($row["deslogin"]);
            $this -> setDessenha($row["dessenha"]);
            $this -> setDtcadastro($row["dtcadastro"]);
        } else{
            throw new Exception("login ou senha invalido");
        }

    }

}


?>