<?php

class livreteModel{

    public $Con;

    public $id_livrete;
    public $data_reg;
    public $num_livrete;
    public $emissao;
    public $validade;
    public $local_emissao;
    public $situacao;
    //public $id_veiculo;
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
    //veiculo
    public $id_veiculo;
    public $tipoV;
    public $matricula;
    public $marca;
    public $modelo;
    public $cor;
    public $cilindragem;
    public $lotacao;
    public $motor;   
    public $chassi;
    public $situacao_veiculo;
    //Mototaxista
    public $status;
    public $id_mot;
    public $nome_mot;
    public $ident_mot;
    public $validade_BI_mot;
    public $genero_mot;
    public $data_nasc_mot;
    public $naturalidade_mot;
    public $residencia_mot;
    public $telefone_mot;   
    public $foto_mot;
    public $path_mot;

    //Licenca de mototaxi
    public $num_liccenca;
    public $municipio;
    public $tipoLic;   
    public $emissaoLic;
    public $validadeLic;


    
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
            $query = "SELECT * 
            from livretes l 
            inner join veiculos v on v.id_veiculo=l.id_veiculo 
            inner join proprietario p on p.id_prop=v.id_prop 
            order by l.id_livrete DESC";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function buscar($texto){
        try {
            $query = "SELECT * 
            from livretes l 
            inner join veiculos v on v.id_veiculo=l.id_veiculo 
            inner join proprietario p on p.id_prop=v.id_prop
            where l.num_livrete like '%texto%' 
            or l.situacao like 'texto' 
            or  v.matricula like '%texto%' 
            or  v.marca like '%texto%' or  v.motor like '%texto%' 
            or p.nome like '%texto%'
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
            $query = "SELECT * FROM livretes WHERE id_livrete=?";

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

    public function ultimoID_proprieario($ident){

        try {
            $query = "SELECT max(id_prop) as novo from proprietario";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    
    public function ultimoID_veiculo($matricula){

        try {
            $query = "SELECT max(id_veiculo) as novo from veiculos ";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    public function novoRegisto(){

        try {
            $query = "SELECT MAX(id_livrete)+1 as novo from livretes";
            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    
    public function novoRegistoLic(){

        try {
            $query = "SELECT MAX(id_licenca)+1 as novo from licenca_veiculo ";
            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function pesquisar_Licenca($num_licenca){
       try {
            $query = "SELECT num_licenca as novo from licenca_veiculo where num_licenca='$num_licenca' ";
            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function gerarNum_licenca(){
    
        $numGerado="";
        $res_pesquisa="";
        $ord="";
        $tamanho = $this->novoRegistoLic()[0]->novo; 
        switch(strlen($tamanho)){
            case 1:
                $ord = str_pad($tamanho, 3, "0", STR_PAD_LEFT);break;               
            case 2:
                $ord = str_pad($tamanho, 2, "0", STR_PAD_LEFT);break;            
            default:
                $ord = str_pad($tamanho,1, "0", STR_PAD_LEFT);break;
        }

        $numGerado='UG15/'.$ord.'/LVM/'.date('Y');
        $res_pesquisa = $this->pesquisar_Licenca($numGerado)[0]->novo;        
        while($res_pesquisa == $numGerado){
            
            $ord = $ord+1;

            switch(strlen($ord)){
                case 1:
                    $ord = str_pad($ord, 3, "0", STR_PAD_LEFT);break;               
                case 2:
                    $ord = str_pad($ord, 2, "0", STR_PAD_LEFT);break;            
                default:
                    $ord = str_pad($ord,1, "0", STR_PAD_LEFT);break;
            }

            $numGerado='UG15/'.$ord.'/LVM/'.date('Y');
            $res_pesquisa = $this->pesquisar_Licenca($numGerado);
        }
        
        $this->num_liccenca=$numGerado;
        return $numGerado;
    }


    public function registar(livreteModel $dados){
        //$this->gerarNum_licenca(); exit;
        
        $query = "SELECT * FROM livretes WHERE num_livrete=?";
        $smt = $this->Con->prepare($query);
        $smt->execute(array($dados->num_livrete));
        

        //print_r($this->tipoLic);exit;
        if($smt->rowCount() == 0  and !empty($this->matricula) and !empty($this->tipoV) and !empty($this->local_emissao)){                
                try{
                   
                    if(empty($this->id_prop)){
                        if($this->status=="true"){
                            $this->adicionar_mototaxista($this->nome, $this->ident, $this->validade_BI, $this->genero, $this->data_nasc, $this->naturalidade, $this->residencia, $this->telefone, $this->path);
                        }
                        $this->adicionar_proprietario($this->nome, $this->ident, $this->validade_BI, $this->genero, $this->data_nasc, $this->naturalidade, $this->residencia, $this->telefone, $this->path, $this->provincia);               
                        $Id_prop = $this->ultimoID_proprieario($this->ident)[0]->novo;
                        $this->adicionar_veiculo($this->tipoV, $this->matricula, $this->marca, $this->modelo, $this->cor, $this->cilindragem, $this->lotacao, $this->motor, $this->chassi, $this->situacao, $Id_prop);
                    }else{
                        $this->adicionar_veiculo($this->tipoV, $this->matricula, $this->marca, $this->modelo, $this->cor, $this->cilindragem, $this->lotacao, $this->motor, $this->chassi, $this->situacao, $this->id_prop);
                    }     
                       
                    $Id_veiculo = $this->ultimoID_veiculo($this->matricula)[0]->novo;
                    $query = "INSERT INTO livretes (data_reg, num_livrete, emissao, validade, local_emissao, situacao, id_veiculo) 
                    VALUES(?,?,?,?,?,?,?)";
                    
                    $this->Con->prepare($query)->execute(array($dados->data_reg, $dados->num_livrete, $dados->emissao, $dados->validade, $dados->local_emissao, $dados->situacao, $Id_veiculo));
                     
                    $this->gerarNum_licenca();
                    $this->regista_licencamototaxi(date('Y-m-d H:i:s'), $this->num_liccenca, $this->tipoLic, $this->municipio, "Em espera", $this->emissaoLic, $this->validadeLic, $Id_veiculo);                           
                    return true;
                }catch (Exception $e){
                die($e->getMessage());
                //return false;
            }
            }else{
                return false;
            }
    }

    public function editar(livreteModel $dados){
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
            $query = "DELETE FROM livretes WHERE id_livrete =?";
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
            //$resultado = $this->Con->query("SELECT * FROM propriatario WHERE ident = $this->$ident");  
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
    public function adicionar_veiculo($tipo, $matricula, $marca, $modelo, $cor, $cilindragem, $lotacao, $motor, $chassi, $situacao, $id_prop){
        try {
            //$resultado = $this->Con->query("SELECT * FROM viaturas WHERE matricula= $this->$matricula");  
            //if($resultado->rowCount() > 0){
                $query = "INSERT INTO veiculos (tipo, matricula, marca, modelo, cor, cilindragem, lotacao, motor, chassi, situacao, id_prop) 
                VALUES(?,?,?,?,?,?,?,?,?,?,?)";
                $this->Con->prepare($query)->execute(array($tipo, $matricula, $marca, $modelo, $cor, $cilindragem, $lotacao, $motor, $chassi, $situacao, $id_prop));
                
                return true;
            //}
                
        } catch (Exception $e){
            return false;
        }
    }

    public function regista_licencamototaxi($data_reg, $num_liccenca, $tipo, $municipio, $situacao, $emissao, $validade, $id_veiculo){
        try {
            
                $query = "INSERT INTO licenca_veiculo (data_reg, num_licenca, tipo, municipio, situacao, emissao, validade, id_veiculo) 
                VALUES(?,?,?,?,?,?,?,?)";
                $this->Con->prepare($query)->execute(array($data_reg, $num_liccenca, $tipo, $municipio, $situacao, $emissao, $validade, $id_veiculo));               
                return true;                
        } catch (Exception $e){
            //return false;
            die($e->getMessage());
        }
    }

    public function adicionar_mototaxista($nome, $ident, $validade, $genero, $data_nasc, $naturalidade, $residencia, $telefone, $path){
        try {
            
                $query = "INSERT INTO motociclista (nome, ident, validade, genero, data_nasc, naturalidade, residencia, telefone, path) 
                VALUES(?,?,?,?,?,?,?,?,?)";
                $this->Con->prepare($query)->execute(array($nome, $ident, $validade, $genero, $data_nasc, $naturalidade, $residencia, $telefone, $path));               
                return true;

                
        } catch (Exception $e){
            return false;
        }
    }
   
}

?>