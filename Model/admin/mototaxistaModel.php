<?php

class mototaxistaModel{

    public $Con;

    public $id_mot;
    public $nome;
    public $ident;
    public $validade;
    public $genero;
    public $data_nasc;
    public $naturalidade;
    public $residencia;
    public $telefone;
    public $id_parada;
    public $foto;
    public $path;


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
            $query = "SELECT id_mot,nome,ident,validade,genero,data_nasc,naturalidade,residencia,telefone,codigo,id_parada,foto, path from motociclista m left join paradas p on p.id_par=m.id_parada order by id_mot DESC";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function buscar($texto){
        
        try {
            $query = "SELECT * from motociclista 
            WHERE nome Like '%$texto%'   
            OR ident Like '%$texto%'    
            OR genero Like '%$texto%'  
            OR local_venda Like '%$texto%'  
            OR telefone Like '%$texto%'   
            OR situacao Like '%$texto%'       
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
            $query = "SELECT * FROM motociclista WHERE id_mot=?";

            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return $smt->fetch(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    public function carregarParadas(){

        try {
            $query = "SELECT * FROM paradas";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    
    public function registar(mototaxistaModel $dados){

        $query = "SELECT * FROM motociclista WHERE ident=?";
        $smt = $this->Con->prepare($query);
        $smt->execute(array($dados->ident));
        if($smt->rowCount() == 0){
            try {
                $query = "INSERT INTO motociclista (nome, ident, validade, genero, data_nasc, naturalidade, residencia, telefone, id_parada, path) 
                VALUES(?,?,?,?,?,?,?,?,?,?)";

                $this->Con->prepare($query)->execute(array($dados->nome, $dados->ident, $dados->validade, $dados->genero, $dados->data_nasc, $dados->naturalidade, $dados->residencia, $dados->telefone, $dados->id_parada, $dados->path));
                return true;
            } catch (Exception $e){
                return false;
                //die($e->getMessage());
            }
        }
        else{
            return false;
        }
    }

    public function editar(mototaxistaModel $dados){

        try {
            $query = "UPDATE  motociclista SET nome=?, ident=?, validade=?, genero=?, data_nasc=?, naturalidade=?, residencia=?, telefone=?, id_parada=? WHERE id_mot=? ";

            $this->Con->prepare($query)->execute(array($dados->nome, $dados->ident, $dados->validade, $dados->genero, $dados->data_nasc, $dados->naturalidade, $dados->residencia, $dados->telefone, $dados->id_parada,)); 
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