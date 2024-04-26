<?php

class veiculoModel{

    public $Con;

    public $id_veiculo;
    public $tipo;
    public $matricula;
    public $marca;
    public $modelo;
    public $cor;
    public $cilindragem;
    public $lotacao;
    public $motor;   
    public $chassi;
    public $situacao;
    public $id_prop;


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
            $query = "SELECT id_veiculo, tipo, matricula, 
            marca,modelo,cor,cilindragem,lotacao,motor,
            chassi,situacao,nome, p.id_prop, p.ident, p.telefone 
            from veiculos v 
            inner join proprietario p on p.id_prop=v.id_prop order by id_veiculo DESC";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function buscar($texto){
        
        try {
            $query = "SELECT id_veiculo, tipo, matricula, 
            marca,modelo,cor,cilindragem,lotacao,motor,
            chassi,situacao,nome, p.id_prop, p.ident, p.telefone 
            from veiculos v 
            inner join proprietario p on p.id_prop=v.id_prop
            WHERE p.nome Like '%$texto%'   
            OR p.ident Like '%$texto%'    
            OR v.matricula Like '%$texto%' 
            OR v.chassi Like '%$texto%'  
            OR v.tipo Like '%$texto%'  
            OR v.motor Like '%$texto%'  
            OR v.situacao Like '%$texto%'    
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
            $query = "SELECT * FROM veiculos WHERE id_veiculo=?";

            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return $smt->fetch(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    
    public function registar(veiculoModel $dados){

        try {
            $query = "INSERT INTO veiculos (tipo, matricula, marca, modelo, cor, cilindragem, lotacao, motor, chassi, situacao, id_prop) 
            VALUES(?,?,?,?,?,?,?,?,?,?,?)";

            $this->Con->prepare($query)->execute(array($dados->tipo, $dados->matricula, $dados->marca, $dados->modelo, $dados->cor, $dados->cilindragem, $dados->lotacao, $dados->motor, $dados->chassi, $dados->situacao, $dados->id_prop));
            return true;
        } catch (Exception $e){
            return false;
        }
    }

    public function editar(veiculoModel $dados){

        try {
            $query = "UPDATE  veiculos SET tipo=?, matricula=?, marca=?, modelo=?, cor=?, cilindragem=?, lotacao=?, motor=?, chassi=?, situacao=?, id_prop=? WHERE id_veiculo=? ";

            $this->Con->prepare($query)->execute(array($dados->tipo, $dados->matricula, $dados->marca, $dados->modelo, $dados->cor, $dados->cilindragem, $dados->lotacao, $dados->motor, $dados->chassi, $dados->situacao, $dados->id_prop, $dados->id_veiculo)); 
            return true;

        } catch (Exception $e){
           return false;
           
        }
        
    }


    public function delete($id){ 

        try {
            $query = "DELETE FROM veiculos WHERE idveiculo=?";
            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return true;
        } catch (EXCEPTION $e) {
            return false;
        }
    }
}

?>