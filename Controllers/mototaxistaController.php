<?php

include_once 'Model/admin/mototaxistaModel.php';

class mototaxistaController extends Controller{
    
    public $Model;
    public  $instModel;

    public function __construct(){

        $this->Model = new mototaxistaModel();      
        
    }

    public function index(){

        $dados = $this->Model->listar(); 
        $this->carregarTemplate('admin/mototaxista', array(), $dados);   
          
    }

    public function novo(){

        $dados = $this->Model->listar(); 

        if(isset($_REQUEST['id'])){
            $instModel = $this->Model->carregarID($_REQUEST['id']);      
            $this->carregarTemplate('admin/cad_mototaxista', $instModel, $dados); 

        }        
    }

    public function buscar(){
        
        if(isset($_POST['texto'])){
           
            $instModel = $this->Model->buscar($_POST['texto']);
        }
        $this->carregarTemplate('admin/mototaxista', $instModel);
           
    }

    public function adicionar(){
     
        $this->carregarTemplate('admin/cad_mototaxista', array(), array()); 
    
    }

    public function cadastrar(){

        $this->Model->id_mot = $_POST['id_mot'];
        $this->Model->nome = $_POST['nome'];
        $this->Model->ident = $_POST['ident'];
        $this->Model->validade = $_POST['validade'];
        $this->Model->genero = $_POST['genero'];
        $this->Model->naturalidade = $_POST['naturalidade'];
        $this->Model->data_nasc = $_POST['data_nasc'];
        $this->Model->residencia = $_POST['residencia'];
        $this->Model->telefone = $_POST['telefone'];
        if(isset($_FILES['arquivo'])){ 
            $this->Model->foto = $_FILES['arquivo']['name'];
            $this->Model->path = $_FILES['arquivo']['name'];
             $this->upload_arquivo();
         }
         else if(!empty($_POST['foto_visualizada'])){
            $this->Model->foto = $_POST['foto_visualizada']; 
         }else{
            $this->Model->foto = ''; 
         }

        $estado = $this->Model->id_mot > 0 ? $this->Model->editar($this->Model) :  $this->Model->registar($this->Model);
        
        $aviso=array();
        $dados = $this->Model->listar(); 
        //var_dump($estado);exit;
        if($estado == true){
        $dados = $this->Model->listar(); 

            if($this->Model->id_mot > 0 ){

                $aviso[1] = 'Alteração efectuada com sucesso !';
                $this->carregarTemplate('admin/mototaxista', $aviso, $dados);

            }else{
                $aviso[1] = 'Cadastro efectuado com sucesso !';
                $this->carregarTemplate('admin/mototaxista', $aviso, $dados);
            }    
        }
        else{

            $aviso[0] = 'Ocorreu uma falha ao tentar salvar este registo.';
            $this->carregarTemplate('admin/cad_mototaxista', array(), array());
        }

    }
    public function upload_arquivo(){
        //UPLOAD DE ARQUIVO
        if(isset($_FILES['arquivo'])){
            
            $extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //Pegar a extensão do arquivo
            $nome_arquivo = md5(time()) . $extensao; //define o nome do arquivo4
            $diretorio = "c:/fotos/"; //define o directorio para onde sera guardado o arquivo
            move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$nome_arquivo); //fectuar i upload
            $diretorio2 = "assets/totos/";
            move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio2.$nome_arquivo); //fectuar i upload
            return $nome_arquivo;
        }       
        
    } 

    public function eliminar(){
        $aviso=array();
        $estado = $this->Model->delete($_REQUEST['cod']);
        if($estado == true){
           
            $dados = $this->Model->listar(); 
            $aviso[1] = 'Registo eliminado com sucesso !';
            $this->carregarTemplate('admin/mototaxista', $aviso, $dados);

        }else{
            $dados = $this->Model->listar(); 
            $aviso[0] = 'Não é possivel eliminar este registo';
            $this->carregarTemplate('admin/mototaxista', $aviso, $dados);

        };
    }
   
}