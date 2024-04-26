<?php

class veiculoModel{

    public $Con;

    public $id_viatura;
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
    public $alimentacao;
    public $caixa;


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
            $query = "SELECT id_viatura, tipo, matricula, marca,modelo,cor,cilindragem,lotacao,motor,chassi,situacao,  nome, p.id_prop, p.ident, p.telefone,alimentacao, caixa from viaturas v inner join proprietario p on p.id_prop=v.id_prop order by id_viatura DESC";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function buscar($texto){
        
        try {
            $query = "SELECT id_viatura, tipo, matricula, marca,modelo,cor,cilindragem,lotacao,motor,chassi,situacao, nome, p.id_prop, p.ident, p.telefone,alimentacao, caixa from viaturas v inner join proprietario p on p.id_prop=v.id_prop where matricula like '% texto %' or marca like '% texto %' or chassi like '% texto %' or motor like '% texto%' or  tipo like '% texto%'  or situacao like '% texto%' or alimentacao like '%texto%'    
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
            $query = "SELECT * FROM viaturas WHERE id_viatura=?";

            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return $smt->fetch(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    
    public function registar(veiculoModel $dados){

        try {
            $query = "INSERT INTO viaturas (tipo, matricula, marca, modelo, cor, cilindragem, lotacao, motor, chassi, situacao, id_prop, alimentacao, caixa) 
            VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";

            $this->Con->prepare($query)->execute(array($dados->tipo, $dados->matricula, $dados->marca, $dados->modelo, $dados->cor, $dados->cilindragem, $dados->lotacao, $dados->motor, $dados->chassi, $dados->situacao, $dados->id_prop));
            return true;
        } catch (Exception $e){
            return false;
        }
    }

    public function editar(veiculoModel $dados){

        try {
            $query = "UPDATE  veiculos SET tipo=?, matricula=?, marca=?, modelo=?, cor=?, cilindragem=?, lotacao=?, motor=?, chassi=?, situacao=?, id_prop=?, alimentacao=?, caixa=? WHERE id_veiculo=? ";

            $this->Con->prepare($query)->execute(array($dados->tipo, $dados->matricula, $dados->marca, $dados->modelo, $dados->cor, $dados->cilindragem, $dados->lotacao, $dados->motor, $dados->chassi, $dados->situacao, $dados->id_prop,$dados->alimentacao, $dados->caixa, $dados->id_viatura)); 
            return true;

        } catch (Exception $e){
           return false;
           
        }
        
    }


    public function delete($id){ 

        try {
            $query = "DELETE FROM viaturas WHERE id_viatura=?";
            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return true;
        } catch (EXCEPTION $e) {
            return false;
        }
    }
}

?>