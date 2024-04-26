<?php
include_once 'Model/admin/proprietarioModel.php';

class proprietarioController extends Controller{
    
    public $Model;
    public  $instModel;

    public function __construct(){

        $this->Model= new proprietarioModel();        
    }

    public function index(){

        $dados = $this->Model->listar(); 
        $this->carregarTemplate('admin/proprietario', array(), $dados);   
          
    }
    public function adicionar(){
     
        $this->carregarTemplate('admin/cad_proprietario', array(), array()); 
    
    }

    public function buscar(){
        
        if(isset($_POST['texto'])){          
            $instModel = $this->Model->buscar($_POST['texto']);
            
        }
        $this->carregarTemplate('admin/proprietario', $instModel);
           
    }

    public function cadastrar(){ 

        $this->Model->id_prop = $_POST['id_prop'];
        $this->Model->nome = $_POST['nome'];
        $this->Model->ident = $_POST['ident'];
        $this->Model->validade = $_POST['validade'];
        $this->Model->genero = $_POST['genero'];
        $this->Model->naturalidade = $_POST['naturalidade'];
        $this->Model->residencia = $_POST['residencia'];
        $this->Model->telefone = $_POST['telefone'];
        $this->Model->foto = $_POST['foto'];
        $this->Model->path = $_POST['path'];
        $this->Model->provincia = $_POST['provincia'];
    
        $estado = $this->Model->id_prop > 0 ? $this->Model->editar($this->Model) :  $this->Model->registar( $this->Model);
        
        $aviso=array();
        $dados = $this->Model->listar(); 
        if($estado == true){
        $dados = $this->Model->listar(); 

            if($this->Model->id_prop > 0 ){

                $aviso[1] = 'Alteração efectuada com sucesso !';
                $this->carregarTemplate('admin/proprietario', $aviso, $dados);

            }else{
                $aviso[1] = 'Cadastro efectuado com sucesso !';
                $this->carregarTemplate('admin/proprietario', $aviso, $dados);
            }
                
        }
        else{
           
            $aviso[0] = 'Não foi possivel salvar este registo';
            $this->carregarTemplate('admin/proprietario', $aviso, $dados);
        }

    }

    public function eliminar(){
        $aviso=array();
        $estado = $this->Model->delete($_REQUEST['cod']);
        if($estado == true){
           
            $dados = $this->Model->listar(); 
            $aviso[1] = 'Registo eliminado com sucesso !';
            $this->carregarTemplate('admin/proprietario', $aviso, $dados);

        }else{
            $dados = $this->Model->listar(); 
            $aviso[0] = 'Ocorreu uma falha ao tentar salvar este registo.';
            $this->carregarTemplate('admin/cad_proprietario',  array(), array());

        };
    }
   
}