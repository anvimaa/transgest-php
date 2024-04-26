<?php

include_once 'Model/academica/matriculasModel.php';

class matriculasController extends Controller{
    
    public $Model;
    public  $instModel;

    public function __construct(){

        $this->Model= new matriculasModel();        
    }

    public function index(){

        $dados = $this->Model->listar(); 
        $this->carregarTemplate('academica/matriculas', array(), $dados);   
          
    }
    public function novo(){
        
        $this->carregarTemplate('academica/cad_matriculas', array(), array()); 
        /*$dados = $this->Model->listar(); 
        
        if(isset($_REQUEST['id'])){
            $instModel = $this->Model->carregarID($_REQUEST['id']);      
            //$this->carregarTemplate('academica/cad_matriculas', $instModel, $dados); 

        }  */           
    }

    public function buscar(){
        if(isset($_POST['texto'])){
           
            $instModel = $this->Model->buscar($_POST['texto']);
        }
        $this->carregarTemplate('academica/matriculas', $instModel);
           
    }
    public function nova_matricula(){
        //$dados = $this->Model->carregarCampos();
        $this->carregarTemplate('academica/cad_matriculas', array());
    }

    public function cadastrar(){
              
        $this->Model->id_mat = $_POST['id_mat'];
        $this->Model->data_reg = $_POST['data_reg'];
        $this->Model->id_ano = $_POST['id_ano'];
        $this->Model->id_aluno = $_POST['id_aluno'];
        $this->Model->id_curso = $_POST['id_curso'];
        $this->Model->id_turma = $_POST['id_turma'];
        $this->Model->id_classe = $_POST['id_classe'];
        $this->Model->periodo = $_POST['periodo'];
        $this->Model->situacao = $_POST['situacao'];
        
        $estado = $this->Model->id_mat > 0 ? $this->Model->editar($this->Model) :  $this->Model->registar( $this->Model);
        
        $aviso=array();
        $dados = $this->Model->listar(); 
        if($estado == true){
        $dados = $this->Model->listar(); 

            if($this->Model->id_mat > 0 ){

                $aviso[1] = 'Alteração efectuada com sucesso !';
                $this->carregarTemplate('academica/matriculas', $aviso, $dados);

            }else{
                $aviso[1] = 'Cadastro efectuado com sucesso !';
                $this->carregarTemplate('academica/matriculas', $aviso, $dados);
            }    
        }
        else{
            $aviso[0] = 'Não foi possivel salvar este registo';
            $this->carregarTemplate('academica/matriculas', $aviso, $dados);
        }

    }

    public function eliminar(){
        $estado = $this->Model->delete($_REQUEST['cod']);
        $aviso=array();
        if($estado == true){
           
            $dados = $this->Model->listar(); 
            $aviso[1] = 'Registo eliminado com sucesso !';
            $this->carregarTemplate('academica/matriculas', $aviso, $dados);

        }else{
            $dados = $this->Model->listar(); 
            $aviso[0] = 'Não é possivel eliminar este registo';
            $this->carregarTemplate('academica/matriculas', $aviso, $dados);

        };
    }
   
}