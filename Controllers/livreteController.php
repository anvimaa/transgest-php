<?php
if(!isset($_SESSION)) session_start();
//session_destroy();
//session_unset();
/*
var_dump(!isset($_SESSION));exit;
if(!isset($_SESSION['usuario'])) {
    die //("Você não pode acessar esta página porque não está logado.<p><a href=\"index.php\">Entrar</a></p>");
    ("<script> alert('Você não pode acessar esta página porque não está logado'); location.href='home';</script>");
    //header("Location: home");
}
*/
include_once 'Model/admin/livreteModel.php';

class livreteController extends Controller{
    
    public $Model;
    public  $instModel;
    public $matricula;

    public function __construct(){

        $this->Model= new livreteModel();        
    }

    public function index(){

        $dados = $this->Model->listar(); 
        $this->carregarTemplate('admin/livrete', array(), $dados);   
          
    }
    public function novo(){

        $dados = $this->Model->listar(); 

        if(isset($_REQUEST['id'])){
            $instModel = $this->Model->carregarID($_REQUEST['id']);      
            $this->carregarTemplate('admin/cad_livrete', $instModel, $dados); 

        }             
    }

    public function buscar(){
        if(isset($_POST['texto'])){
           
            $instModel = $this->Model->buscar($_POST['texto']);
        }
        $this->carregarTemplate('admin/livrete', $instModel);
           
    }
    public function adicionar(){
     
        $this->carregarTemplate('admin/cad_livrete', array(), array()); 
    
    }
    public function confirmacao(){
     
        $this->carregarTemplate('admin/confirmacao', array(), array()); 
    
    }

    public function gerarCodigo(){
    
        $codigo="";
        $tamanho = $this->Model->novoRegisto()[0]->novo; 
        switch(strlen($tamanho)){
            case 1:
                $codigo = str_pad($tamanho, 5, "0", STR_PAD_LEFT);break;               
            case 2:
                $codigo = str_pad($tamanho, 4, "0", STR_PAD_LEFT);break;
            case 3:
                $codigo = str_pad($tamanho, 3, "0", STR_PAD_LEFT);break;
            case 4:
                    $codigo = str_pad($tamanho, 2, "0", STR_PAD_LEFT);break;
            default:
            $codigo = str_pad($tamanho,1, "0", STR_PAD_LEFT);break;
        }
        $codigo='AMU-'.$codigo.'/'.date('Y');
        $this->matricula =$codigo;
        return $codigo;
    }
/*
    public function gerarNum_licenca(){
    
        $num_licenca="";
        $tamanho = $this->Model->novoRegisto()[0]->novo; 
        switch(strlen($tamanho)){
            case 1:
                $num_licenca = str_pad($tamanho, 5, "0", STR_PAD_LEFT);break;               
            case 2:
                $num_licenca = str_pad($tamanho, 4, "0", STR_PAD_LEFT);break;
            case 3:
                $num_licenca = str_pad($tamanho, 3, "0", STR_PAD_LEFT);break;
            case 4:
                    $num_licenca = str_pad($tamanho, 2, "0", STR_PAD_LEFT);break;
            default:
            $num_licenca = str_pad($tamanho,1, "0", STR_PAD_LEFT);break;
        }
        $num_licenca='UG15/'.$num_licenca.'/LVM/'.date('Y');
        return $num_licenca;
    }
*/
    public function cadastrar(){
        $tamanho = $this->Model->novoRegisto(); 
        $this->Model->id_livrete = $_POST['id_livrete'];
        $this->Model->data_reg = date('Y-m-d H:i:s');
        
        if(isset($_POST['rbMatricula'])){           
            $matricula = $_POST['rbMatricula'];
            if($matricula=='antigo'){
                $this->Model->num_livrete = $_POST['matricula'];
                $this->matricula = $_POST['matricula'];
            }else{
                $this->Model->num_livrete = $this->gerarCodigo();
                $this->matricula = $this->gerarCodigo();
            }
        }
        
        $this->Model->emissao = null;
        $this->Model->validade = null;
        $this->Model->local_emissao = 'DMTTM';
        $this->Model->situacao = 'Em espera';
        if(empty($_POST['id_prop'])){
            $this->Model->nome = $_POST['nome'];
            $this->Model->ident = $_POST['ident'];
            $this->Model->validade_BI = $_POST['validade_BI'];
            $this->Model->genero = $_POST['genero'];
            $this->Model->data_nasc = $_POST['data_nasc'];
            $this->Model->naturalidade = $_POST['naturalidade'];
            $this->Model->residencia = $_POST['residencia'];
            $this->Model->telefone = $_POST['telefone'];
        }
        $this->Model->id_prop = $_POST['id_prop'];
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
        //$this->Model->path = $nome_arquivo;
        $this->Model->provincia = $_POST['provincia'];

        $this->Model->tipoV = $_POST['tipoV'];

        $this->Model->matricula = $this->matricula;
        $this->Model->marca = $_POST['marca'];
        $this->Model->modelo = $_POST['modelo'];
        $this->Model->cor = $_POST['cor'];
        $this->Model->cilindragem = $_POST['cilindragem'];
        $this->Model->lotacao = $_POST['lotacao'];
        $this->Model->motor = $_POST['motor'];
        $this->Model->chassi = $_POST['chassi'];
        $this->Model->situacao_veiculo = $_POST['situacao_veiculo'];
        //LIcenca de Mototaxi
        //$this->Model->num_liccenca = $this->gerarNum_licenca();
        $this->Model->municipio =  $_POST['municipio'];
        $this->Model->tipoLic = $_POST['tipoLic'];
        $this->Model->emissaoLic = date('Y-m-d');
        
        $data_emissao= date('d-m-Y');
        $anos=1;

        $this->Model->validadeLic = date('Y-m-d', strtotime('+'."$anos Year",strtotime($data_emissao)));

        if(isset($_POST['mototaxista']))
        {
            $this->Model->status = "true";           
        }
        $estado = $this->Model->id_livrete > 0 ? $this->Model->editar($this->Model) :  $this->Model->registar($this->Model);
        
        $aviso=array();
        $dados = $this->Model->listar(); 
        if($estado == true){
        
            $dados = $this->Model->listar(); 

            if($this->Model->id_livrete > 0 ){

                $aviso[1] = 'Alteração efectuada com sucesso !';
                $this->carregarTemplate('admin/livrete', $aviso, $dados);

            }else{
                if($_SESSION['cargo']!='Visitante'){
                    $aviso[1] = 'Cadastro efectuado com sucesso !';
                    $this->carregarTemplate('admin/livrete', $aviso, $dados);
                }else{
                    $aviso[1] = 'Cadastro efectuado com sucesso !';
                    $this->carregarTemplate('admin/confirmacao', $aviso, $dados);
               }
            }                
        }
        else{
           
            $aviso[0] = 'Ocorreu uma falha ao salvar este registo';
            $this->carregarTemplate('admin/cad_livrete', $aviso, $dados);
        }

    }
    public function upload_arquivo(){
        //UPLOAD DE ARQUIVO
        if(isset($_FILES['arquivo'])){
            
            $extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //Pegar a extensão do arquivo
            $nome_arquivo = $_FILES['arquivo']['name']; //md5(time()) . $extensao; //define o nome do arquivo4
            $diretorio = "c:/fotos/"; //define o directorio para onde sera guardado o arquivo
            move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$nome_arquivo); //fectuar i upload
            $diretorio2 = "c:/xampp/htdocs/transgest/assets/totos/";
            move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio2.$nome_arquivo); //fectuar i upload
            return $nome_arquivo;
        }       
        
    }    

    public function eliminar(){
        $estado = $this->Model->delete($_REQUEST['cod']);
        $aviso=array();
        if($estado == true){
           
            $dados = $this->Model->listar(); 
            $aviso[1] = 'Registo eliminado com sucesso !';
            $this->carregarTemplate('admin/livrete', $aviso, $dados);

        }else{
            $dados = $this->Model->listar(); 
            $aviso[0] = 'Ocorreu uma falha ao tentar salvar este registo.';
            $this->carregarTemplate('admin/cad_livrete', array(), array());

        }
    }
   
}