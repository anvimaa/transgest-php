<?php

include_once 'Model/admin/licencataxiModel.php';

class licencataxiController extends Controller{
    
    public $Model;
    public  $instModel;

    public function __construct(){

        $this->Model= new licencataxiModel();        
    }

    public function index(){

        $dados = $this->Model->listar(); 
        $this->carregarTemplate('admin/licencataxi', array(), $dados);   
          
    }
    public function novo(){

        $dados = $this->Model->listar(); 

        if(isset($_REQUEST['id'])){
            $instModel = $this->Model->carregarID($_REQUEST['id']);      
            $this->carregarTemplate('admin/cad_licencataxi', $instModel, $dados); 

        }             
    }

    public function buscar(){
        if(isset($_POST['texto'])){
           
            $instModel = $this->Model->buscar($_POST['texto']);
        }
        $this->carregarTemplate('admin/licencataxi', $instModel);
           
    }
    public function adicionar(){
     
        $this->carregarTemplate('admin/cad_licencataxi', array(), array()); 
    
    }

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
        $num_licenca='UG15/AMU/'.$num_licenca.'/LVET/'.date('Y');
        return $num_licenca;
    }

    public function cadastrar(){
        $this->Model->id_licenca = $_POST['id_licenca'];
        $this->Model->data_reg = date('Y-m-d H:i:s');
        $this->Model->num_licenca = $this->gerarNum_licenca();
        $this->Model->tipo = $_POST['tipo'];
        $this->Model->municipio = $_POST['municipio'];
        $data_emissao= date('d-m-Y');
        $this->Model->emissao = $data_emissao;
        $this->Model->validade = date('Y-m-d', strtotime('1 Year'));
        $this->Model->rota = $_POST['rota'];
        $this->Model->situacao = "Em espera";
        if(empty($_POST['id_prop'])){
            $this->Model->nome = $_POST['nome'];
            $this->Model->ident = $_POST['ident'];
            $this->Model->validade_BI = $_POST['validade_BI'];
            $this->Model->genero = $_POST['genero'];
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

        //$this->Model->id_viatura = $_POST['id_viatura'];
        $this->Model->tipo_viatura = $_POST['tipoV'];
        $this->Model->matricula = $_POST['matricula'];
        $this->Model->marca = $_POST['marca'];
        $this->Model->modelo = $_POST['modelo'];
        $this->Model->cor = $_POST['cor'];
        $this->Model->cilindragem = $_POST['cilindragem'];
        $this->Model->lotacao = $_POST['lotacao'];
        $this->Model->motor = $_POST['motor'];
        $this->Model->chassi = $_POST['chassi'];
        $this->Model->alimentacao = $_POST['alimentacao'];
        $this->Model->caixa = $_POST['caixa'];
        $this->Model->situacao_viatura = $_POST['situacao_veiculo'];
        


        $estado = $this->Model->id_licenca > 0 ? $this->Model->editar($this->Model) :  $this->Model->registar($this->Model);
        
        $aviso=array();
        $dados = $this->Model->listar(); 
        session_start();
        if($estado == true){
        $dados = $this->Model->listar(); 

            if($this->Model->id_licenca > 0 ){
                $aviso[1] = 'Alteração efectuada com sucesso !';
                $this->carregarTemplate('admin/licencataxi', $aviso, $dados);

            }else{
                if($_SESSION['cargo']!='Visitante'){
                    $aviso[1] = 'Cadastro efectuado com sucesso !';
                    $this->carregarTemplate('admin/licencataxi', $aviso, $dados);
                }else{
                    $aviso[1] = 'Cadastro efectuado com sucesso !';
                    $this->carregarTemplate('admin/confirmacao', $aviso, $dados);
               }
                
            }      
        }
        else{
           
            $aviso[0] = 'Ocorreu um erro ao tentar salvar este registo.';
            $this->carregarTemplate('admin/licencataxi', $aviso, $dados);
        }
    }

    public function upload_arquivo(){
        //UPLOAD DE ARQUIVO
        if(isset($_FILES['arquivo'])){
            
            $extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //Pegar a extensão do arquivo
            $nome_arquivo = $_FILES['arquivo']['name'];//$_FILES['arquivo']['name']; //md5(time()) . $extensao; //define o nome do arquivo4
            $diretorio = "c:/fotos/"; //define o directorio para onde sera guardado o arquivo
            move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$nome_arquivo); //fectuar i upload
            $diretorio2 = "assets/totos/";
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
            $this->carregarTemplate('admin/licencataxi', $aviso, $dados);

        }else{
            $dados = $this->Model->listar(); 
            $aviso[0] = 'Não é possivel eliminar este registo';
            $this->carregarTemplate('admin/cad_licencataxi', array(), array());

        }
    }
   
}