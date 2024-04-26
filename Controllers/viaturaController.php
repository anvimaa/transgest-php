<?php

include_once 'Model/admin/viaturaModel.php';

class viaturaController extends Controller{
    
    public $Model;
    public  $instModel;

    public function __construct(){

        $this->Model = new viaturaModel();       
    }

    public function index(){

        $dados = $this->Model->listar(); 
        $this->carregarTemplate('admin/viatura', array(), $dados);   
          
    }
    
    public function novo(){

        $dados = $this->Model->listar(); 

        if(isset($_REQUEST['id'])){
            $instModel = $this->Model->carregarID($_REQUEST['id']);      
            $this->carregarTemplate('admin/cad_viatura', $instModel, $dados); 

        }             
    }

    public function buscar(){
        if(isset($_POST['texto'])){
           
            $instModel = $this->Model->buscar($_POST['texto']);
        }
        $this->carregarTemplate('admin/viatura', $instModel);
           
    }
    

    public function cadastrar(){
              
        $this->Model->id_viatura = $_POST['id_viatura'];
        $this->Model->tipo = $_POST['tipo'];
        $this->Model->matricula = $_POST['matricula'];
        $this->Model->marca = $_POST['marca'];
        $this->Model->modelo = $_POST['modelo'];
        $this->Model->cor = $_POST['cor'];
        $this->Model->cilindragem = $_POST['cilindragem'];
        $this->Model->lotacao = $_POST['lotacao'];
        $this->Model->motor = $_POST['motor'];
        $this->Model->chassi = $_POST['chassi'];
        $this->Model->caixa = $_POST['caixa'];
        $this->Model->alimentacao = $_POST['alimentacao'];
        $this->Model->situacao_veiculo = $_POST['situacao'];
        $estado = $this->Model->id_viatura > 0 ? $this->Model->editar($this->Model) :  $this->Model->registar( $this->Model);
        
        $aviso=array();
        $dados = $this->Model->listar(); 
        if($estado == true){
        $dados = $this->Model->listar(); 

            if($this->Model->id_viatura > 0 ){

                $aviso[1] = 'Alteração efectuada com sucesso !';
                $this->carregarTemplate('admin/viatura', $aviso, $dados);

            }else{
                $aviso[1] = 'Cadastro efectuado com sucesso !';
                $this->carregarTemplate('admin/viatura', $aviso, $dados);
            }    
        }
        else{
           
            $aviso[0] = 'Este registo já existe';
            $this->carregarTemplate('admin/viatura', $aviso, $dados);
        }

    }

    public function eliminar(){
        $estado = $this->Model->delete($_REQUEST['cod']);
        $aviso=array();
        if($estado == true){
           
            $dados = $this->Model->listar(); 
            $aviso[1] = 'Registo eliminado com sucesso !';
            $this->carregarTemplate('admin/viatura', $aviso, $dados);

        }else{
            $dados = $this->Model->listar(); 
            $aviso[0] = 'Ocorreu uma falha ao tentar salvar este registo.';
            $this->carregarTemplate('admin/cad_viatura',  array(), array());

        }
    }
   
}