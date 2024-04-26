<?php

class licencataxiModel{

    public $Con;

    public $id_licenca;
    public $data_reg;
    public $num_licenca;
    public $tipo;
    public $municipio;
    public $situacao;
    public $emissao;
    public $validade;
    public $rota;
    //public $id_viatura;

    //PROPRIATARIO
    public $id_prop;
    public $nome;
    public $ident;
    public $validade_BI;
    public $genero;
    public $data_nasc;
    public $naturalidade;
    public $residencia;
    public $telefone;   
    public $foto;
    public $path;
    public $provincia;
    //Viatura
    public $id_viatura;
    public $tipo_viatura;
    public $matricula;
    public $marca;
    public $modelo;
    public $cor;
    public $cilindragem;
    public $lotacao;
    public $motor;   
    public $chassi;
    public $alimentacao;   
    public $caixa;
    public $situacao_viatura;

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
            $query = "SELECT lv.id_licenca, lv.data_reg,lv.num_licenca, lv.tipo, lv.municipio, lv.emissao, lv.validade, v.marca, v.modelo,v.matricula, v.chassi, p.nome as 'nome_prop', p.provincia, lv.situacao, p.ident, p.naturalidade from licenca_taxi lv inner join viaturas v on v.id_viatura=lv.id_viatura INNER JOIN proprietario p on p.id_prop=v.id_prop order by lv.id_licenca desc";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function buscar($texto){
        try {
            $query = "select lv.id_licenca, lv.data_reg,lv.num_licenca, lv.tipo, lv.municipio, lv.emissao, lv.validade, v.marca, v.modelo,v.matricula, v.chassi, p.nome as 'Prop.Veiculo', p.provincia, lv.situacao, p.ident, p.naturalidade from licenca_taxi lv inner join viaturas v on v.id_viatura=lv.id_viatura INNER JOIN proprietario p on p.id_prop=v.id_prop where v.marca like '% texto%' or v.matricula like '% texto %' or  lv.num_licenca like '% texto %' or lv.situacao like '% texto %' or  p.nome like '% texto %' or  v.motor like '% texto %' or p.nome like '% texto %'";
            $smt = $this->Con->prepare($query);
            $smt->execute();//array($texto)
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    

    public function carregarID($id){

        try {
            $query = "SELECT * FROM licenca_taxi WHERE id_licenca=?";

            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return $smt->fetch(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    public function novoRegisto(){

        try {
            $query = "SELECT MAX(id_licenca)+1 as novo from licenca_taxi";
            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
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

    public function ultimoID_proprieario(){

        try {
            $query = "SELECT MAX(id_prop) as novo from proprietario  ";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function ultimoID_viatura(){

        try {
            $query = "SELECT MAX(id_viatura) as novo from viaturas ";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    public function registar(licencataxiModel $dados){
       
        $query = "SELECT * FROM licenca_taxi WHERE num_licenca=?";
        $smt = $this->Con->prepare($query);
        $smt->execute(array($dados->num_licenca));
        //var_dump($this->id_prop);exit;
        if($smt->rowCount() == 0 and !empty($this->matricula) and !empty($this->tipo) and !empty($this->rota)){
            try {
                if(empty($this->id_prop)){
                    $this->adicionar_proprietario($this->nome, $this->ident, $this->validade_BI, $this->genero, $this->data_nasc, $this->naturalidade, $this->residencia, $this->telefone, $this->path, $this->provincia);
                    $Id_prop = $this->ultimoID_proprieario()[0]->novo;
                    $this->adicionar_viatura($this->tipo, $this->matricula, $this->marca, $this->modelo, $this->cor, $this->cilindragem, $this->lotacao, $this->motor, $this->chassi, $this->situacao, $Id_prop, $this->alimentacao, $this->caixa);
                }else {
                    $this->adicionar_viatura($this->tipo, $this->matricula, $this->marca, $this->modelo, $this->cor, $this->cilindragem, $this->lotacao, $this->motor, $this->chassi, $this->situacao, $this->id_prop, $this->alimentacao, $this->caixa);
                }
                $Id_viatura = $this->ultimoID_viatura()[0]->novo;
                $query = "INSERT INTO licenca_taxi (data_reg,num_licenca, tipo,municipio, situacao, emissao, validade, rota,  id_viatura) 
                VALUES(?,?,?,?,?,?,?,?,?)";

                $this->Con->prepare($query)->execute(array($dados->data_reg,$dados->num_licenca, $dados->tipo,$dados->municipio, $dados->situacao, $dados->emissao, $dados->validade, $dados->rota, $Id_viatura));
                return true;
            } catch (Exception $e){
                //die($e->getMessage());
                return false;
            }
        }else{
            return false;
        }
         
    }

    public function editar(licencataxiModel $dados){
/*
        try {
            $query = "UPDATE  cursos SET nome=?, abreviacao=?,nivel=?, data_criacao=?, situacao=? WHERE id_curso=? ";
            $this->Con->prepare($query)->execute(array($dados->nome, $dados->abreviacao, $dados->nivel, $dados->data_criacao, $dados->situacao, 
            $dados->id_curso)); 
            return true;
        } catch (Exception $e){
            return false;
        }
        */
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

    public function adicionar_proprietario($nome, $ident, $validade, $genero, $data_nasc, $naturalidade, $residencia, $telefone, $path, $provincia){
        try {
            //$resultado = $this->Con->query("SELECT * FROM propriatario WHERE ident= $this->$ident");  
            //if($resultado->rowCount() > 0){
                $query = "INSERT INTO proprietario (nome, ident, validade, genero, data_nasc, naturalidade, residencia, telefone, path, provincia) 
                VALUES(?,?,?,?,?,?,?,?,?,?)";
                $this->Con->prepare($query)->execute(array($nome, $ident, $validade, $genero, $data_nasc, $naturalidade, $residencia, $telefone, $path, $provincia));
                return true;
            //}
                
        } catch (Exception $e){
            return false;
        }

    }
    public function adicionar_viatura($tipo, $matricula, $marca, $modelo, $cor, $cilindragem, $lotacao, $motor, $chassi, $situacao, $id_prop, $alimentacao, $caixa){
        try {
            //$resultado = $this->Con->query("SELECT * FROM viaturas WHERE matricula= $this->$matricula");  
            //if($resultado->rowCount() > 0){
                $query = "INSERT INTO viaturas (tipo, matricula, marca, modelo, cor, cilindragem, lotacao, motor, chassi, situacao, id_prop, alimentacao, caixa) 
                VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $this->Con->prepare($query)->execute(array($tipo, $matricula, $marca, $modelo, $cor, $cilindragem, $lotacao, $motor, $chassi, $situacao, $id_prop, $alimentacao, $caixa));
                return true;
            //}
                
        } catch (Exception $e){
            return false;
        }
    }
}

?>