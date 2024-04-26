<?php

class proprietarioModel{

    public $Con;

    public $id_prop;
    public $nome;
    public $ident;
    public $validade;
    public $genero;
    public $data_nasc;
    public $naturalidade;
    public $residencia;
    public $telefone;   
    public $foto;
    public $path;
    public $provincia;


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
            $query = "SELECT p.id_prop,
            p.foto, 
            p.nome,
            p.ident,
            p.validade,p.genero,p.data_nasc,p.naturalidade,p.residencia,p.telefone,v.marca, v.chassi 
            from proprietario p left JOIN veiculos v on v.id_prop=p.id_prop order by p.id_prop desc";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function buscar($texto){
        
        try {
            $query = "SELECT p.id_prop,
            p.foto, 
            p.nome,
            p.ident,
            p.validade,p.genero,p.data_nasc,p.naturalidade,p.residencia,p.telefone,v.marca, v.chassi 
            from proprietario p left JOIN veiculos v on v.id_prop=p.id_prop
            WHERE p.nome Like '%$texto%'   
            OR p.ident Like '%$texto%'    
            OR p.genero Like '%$texto%'       
            ";
            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    
    public function carregarID($id){

        try {
            $query = "SELECT * FROM propriatario WHERE id_prop=?";

            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return $smt->fetch(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    
    public function registar(proprietarioModel $dados){
        $query = "SELECT * FROM proprietario WHERE ident=?";
        $smt = $this->Con->prepare($query);
        $smt->execute(array($dados->ident));

        if($smt->rowCount() == 0){

        try {
            $query = "INSERT INTO proprietario (foto, nome, ident, validade, genero, data_nasc, naturalidade, residencia, telefone, path, provincia) 
            VALUES(?,?,?,?,?,?,?,?,?,?)";

            $this->Con->prepare($query)->execute(array($dados->foto, $dados->nome, $dados->ident, $dados->validade, $dados->genero, $dados->data_nasc, $dados->naturalidade, $dados->residencia, $dados->telefone, $dados->path, $dados->provincia));
            return true;
        } catch (Exception $e){
            return false;
        }
    }
    else{
        return false;
    }
    }

    public function editar(proprietarioModel $dados){

        try {
            $query = "UPDATE  motociclista SET nome=?, ident=?, validade=?, genero=?, data_nasc=?, naturalidade=?, residencia=?, telefone=?, provincia=? WHERE id_prorp=? ";

            $this->Con->prepare($query)->execute(array($dados->nome, $dados->ident, $dados->validade, $dados->genero, $dados->data_nasc, $dados->naturalidade, $dados->residencia, $dados->telefone, $dados->provincia)); 
            return true;

        } catch (Exception $e){
           return false;
           
        }
        
    }


    public function delete($id){ 

        try {
            $query = "DELETE FROM motociclista WHERE id_mot=?";
            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return true;
        } catch (EXCEPTION $e) {
            return false;
        }
    }
}

?>