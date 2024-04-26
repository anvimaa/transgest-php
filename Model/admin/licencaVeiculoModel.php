<?php

class licencaVeiculoModel{

    public $Con;

    public $id_licenca;
    public $data_reg;
    public $num_licenca;
    public $tipo;
    public $municipio;
    public $situacao;
    public $emissao;
    public $validade;
    public $id_carteira;
    public $id_veiculo;

    public function __construct(){

        try {
            $this->Con = conexao::conectar();
            $this->listar();
            
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listar(){
         $this->Con = conexao::conectar();

        try {
            $query = "SELECT lv.id_licenca, lv.data_reg,lv.num_licenca, lv.tipo, lv.municipio, lv.emissao, lv.validade, v.marca, v.modelo,v.matricula, v.chassi, p.nome as 'nome_prop', p.provincia, lv.situacao, p.ident, p.naturalidade from licenca_veiculo lv inner join veiculos v on v.id_veiculo=lv.id_veiculo INNER JOIN proprietario p on p.id_prop=v.id_prop order by lv.id_licenca desc";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function buscar($texto){
        try {
            $query = "SELECT lv.id_licenca, lv.data_reg,lv.num_licenca, lv.tipo, lv.municipio, lv.emissao, 
            lv.validade, v.marca, v.modelo,v.matricula, v.chassi, p.nome as 'Prop.Veiculo', p.provincia, lv.situacao, p.ident, 
            p.naturalidade 
            from licenca_veiculo lv 
            inner join veiculos v on v.id_veiculo=lv.id_veiculo 
            INNER JOIN proprietario p on p.id_prop=v.id_prop 
            where v.marca like '%texto%' or v.matricula like '%texto%' or  lv.num_licenca like '%texto%' or lv.situacao like '%texto%' or  p.genero like '% texto %' or  v.motor like '% texto%' or p.nome like '%texto%' 
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
            $query = "SELECT * FROM licenca_veiculo WHERE id_licenca=?";

            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return $smt->fetch(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function carregarProprietario(){

        try {
            $query = "SELECT * from proprietario order by nome asc";
            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }


    public function registar(licencaVeiculoModel $dados){

        $query = "SELECT * FROM licenca_veiculo WHERE num_licenca=?";
        $smt = $this->Con->prepare($query);
        $smt->execute(array($dados->num_licenca));

        if($smt->rowCount() == 0){

            try {
                $query = "INSERT INTO licenca_veiculo (data_reg,num_licenca, tipo,municipio, situacao, emissao, validade, id_veiculo) 
                VALUES(?,?,?,?,?,?,?,?)";

                $this->Con->prepare($query)->execute(array($dados->data_reg,$dados->num_licenca, $dados->tipo,$dados->municipio, $dados->situacao, $dados->emissao, $dados->validade, $dados->id_veiculo));
                

            } catch (Exception $e){
                die($e->getMessage());
            }
            return true;
        }else{
            return false;
        }
    }
/*
    public function editar(licMotoaxiModel $dados){

        try {
            $query = "UPDATE  cursos SET nome=?, abreviacao=?,nivel=?, data_criacao=?, situacao=? WHERE id_curso=? ";
            $this->Con->prepare($query)->execute(array($dados->nome, $dados->abreviacao, $dados->nivel, $dados->data_criacao, $dados->situacao, 
            $dados->id_curso)); 
            return true;
        } catch (Exception $e){
            return false;
        }
    }

    public function delete($id){

        try {
            $query = "DELETE FROM cursos WHERE id_curso =?";
            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return true;
        } catch (EXCEPTION $e) {
            //die($e->getMessage());
            return false;
        }
    }
    */
}

?>