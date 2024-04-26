<?php

include_once 'Model/admin/funcionariosModel.php';

class funcionariosController extends Controller{
    
    public $Model;
    public  $instModel;

    public function __construct(){

        $this->Model = new funcionariosModel();      
        
    }

    public function index(){

        $dados = $this->Model->listar(); 
        $this->carregarTemplate('admin/funcionarios', array(), $dados);   
          
    }
    public function novo(){
        $this->carregarTemplate('admin/funcionarios', array(), array()); 
        /*
        $dados = $this->Model->listar(); 

        if(isset($_REQUEST['id'])){
            $instModel = $this->Model->carregarID($_REQUEST['id']);      
            $this->carregarTemplate('academica/cad_alunos', $instModel, $dados); 

        }  */           
    }

    public function buscar(){
        
        if(isset($_POST['texto'])){
           
            $instModel = $this->Model->buscar($_POST['texto']);
        }
        $this->carregarTemplate('admin/funcionarios',array(), $instModel);
           
    }
    public function cad_alunos(){
        //$dados = $this->Model->carregarCampos();
        $this->carregarTemplate('admin/funcionarios', array());
    }

    public function cadastrar(){

        $this->Model->id_func = $_POST['id_func'];
        $this->Model->nome = $_POST['nome'];
        $this->Model->genero = $_POST['genero'];
        $this->Model->ident = $_POST['ident'];
        $this->Model->data_val = $_POST['data_val'];
        $this->Model->data_nasc = $_POST['data_nasc'];
        //$this->Model->idade = $idade;
        $this->Model->naturalidade = $_POST['naturalidade'];
        $this->Model->provincia = $_POST['provincia'];
        $this->Model->email = $_POST['email'];
        $this->Model->telefone = $_POST['teçefone'];
        $this->Model->rua = $_POST['rua'];
        $this->Model->bairro = $_POST['bairro'];
        $this->Model->cidade = $_POST['cidade'];
        $this->Model->bairro = $_POST['nome_pai'];
        $this->Model->cidade = $_POST['nome_mae'];
        $this->Model->foto = $_POST['foto'];

        $estado = $this->Model->id_func > 0 ? $this->Model->editar($this->Model) :  $this->Model->registar($this->Model);
        
        $aviso=array();
        $dados = $this->Model->listar(); 
        if($estado == true){
        $dados = $this->Model->listar(); 

            if($this->Model->id_func > 0 ){

                $aviso[1] = 'Alteração efectuada com sucesso !';
                $this->carregarTemplate('admin/funcionarios', $aviso, $dados);

            }else{
                $aviso[1] = 'Cadastro efectuado com sucesso !';
                $this->carregarTemplate('admin/funcionarios', $aviso, $dados);
            }    
        }
        else{

            $aviso[0] = 'Não foi possivel salvar este registo';
            $this->carregarTemplate('admin/funcionarios', $aviso, $dados);
        }

    }

    public function eliminar(){
        $aviso=array();
        $estado = $this->Model->delete($_REQUEST['cod']);
        if($estado == true){
           
            $dados = $this->Model->listar(); 
            $aviso[1] = 'Registo eliminado com sucesso !';
            $this->carregarTemplate('admin/funcionarios', $aviso, $dados);

        }else{
            $dados = $this->Model->listar(); 
            $aviso[0] = 'Não é possivel eliminar este registo';
            $this->carregarTemplate('admin/funcionarios', $aviso, $dados);

        };
    }
   
}