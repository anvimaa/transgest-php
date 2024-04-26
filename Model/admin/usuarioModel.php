<?php

class usuarioModel{

    public $Con;
    public $id_usuario;
    public $nome;
    public $usuario;
    public $genero;
    public $email;
    public $senha;
    public $cargo;
    public $assunto;
    public $mensagem;

    public function __construct(){

        try {
            $this->Con = conexao::conectar();
            $this->listar();
            
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listar(){

        try {
            $query = "SELECT * FROM usuarios";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function buscar($texto){
        try {
            $query = "SELECT * FROM usuarios e 

            WHERE usuario Like '%$texto%' 
            OR email Like '%$texto%'
            OR cargo Like '%$texto%'        
            ";
            $smt = $this->Con->prepare($query);
            $smt->execute();//array($texto)
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    public function carregarID($id){

        try {
            $query = "SELECT * FROM usuarios WHERE usuario=?";

            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return $smt->fetch(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    public function registar(usuarioModel $dados){

        try {
            $query = "INSERT INTO usuarios (nome,usuario, genero, email, senha, cargo) 
            VALUES(?,?,?,?,?,?)";

            $this->Con->prepare($query)->execute(array($dados->nome, $dados->usuario,  $dados->genero,$dados->email, $dados->senha, $dados->cargo)); 
            return true;

        } catch (Exception $e){
            return false;
            //die($e->getMessage());
        }
    }

    public function registar_notificacao(usuarioModel $dados){

        try {
            $query = "INSERT INTO notificacao (nome,email, assunto, mensagem) 
            VALUES(?,?,?,?)";

            $this->Con->prepare($query)->execute(array($dados->nome, $dados->email,  $dados->assunto, $dados->mensagem)); 
            return true;

        } catch (Exception $e){
            return false;
            //die($e->getMessage());
        }
    }
    public function editar(usuarioModel $dados){
/*
        try {
            $query = "UPDATE  usuarios SET usuario=?, email=?, senha=?, nivel=? where id_user=?";

            $this->Con->prepare($query)->execute(array($dados->nome, $dados->descricao, 
            $dados->lider, $dados->id_min)); 

        } catch (Exception $e){
            die($e->getMessage());
        }
        */
    }

    public function delete($id){

        try {
            $query = "DELETE FROM usuarios WHERE id_user =?";
            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
}

?>