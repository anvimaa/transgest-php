<?php

include_once 'Model/admin/licencaVeiculoModel.php';

class licencamototaxiController extends Controller{
    
    public $Model;
    public  $instModel;

    public function __construct(){

        $this->Model= new licencaVeiculoModel();        
    }

    public function index(){

        $dados = $this->Model->listar(); 
        $this->carregarTemplate('admin/licencamototaxi', array(), $dados);   
          
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

    public function gerarCodigo(){
    
        $codigo="";
        $tamanho = $this->Model->novoRegisto(); 
        
        switch(count($tamanho) ){
            case 1:
                $codigo = str_pad($tamanho, 4, '0', STR_PAD_LEFT);break;
            case 2:
                $codigo = str_pad($tamanho, 3, '0', STR_PAD_LEFT);break;
            case 3:
                $codigo = str_pad($tamanho, 2, '0', STR_PAD_LEFT);break;
            default:
            $codigo = str_pad($tamanho,1, '0', STR_PAD_LEFT);break;
        }
        $codigo='AMU-'.$codigo.'/'.date('d/m/Y');
        return $codigo;
    }

    public function cadastrar(){

        $this->Model->id_licenca = $_POST['id_licenca'];
        $this->Model->data_reg = $_POST['data_reg'];
        $this->Model->num_livrete = $_POST['ref'];
        $this->Model->emissao = $_POST['emissao'];
        $this->Model->validade = $_POST['validade'];
        $this->Model->local_emissao = $_POST['local_emissao'];
        $this->Model->situacao = $_POST['situacao'];

        $this->Model->id_prop = $_POST['id_prop'];
        $this->Model->nome = $_POST['nome'];
        $this->Model->ident = $_POST['ident'];
        $this->Model->validade_BI = $_POST['validade_BI'];
        $this->Model->genero = $_POST['genero'];
        $this->Model->naturalidade = $_POST['naturalidade'];
        $this->Model->residencia = $_POST['residencia'];
        $this->Model->telefone = $_POST['telefone'];
        $this->Model->foto = $_POST['foto'];
        $this->Model->path = $_POST['path'];
        $this->Model->provincia = $_POST['provincia'];

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
        $this->Model->alimentacao = $_POST['alimentacao'];
        $this->Model->caixa = $_POST['caixa'];
        $this->Model->situacao_veiculo = $_POST['situacao_viatura'];
        


        $estado = $this->Model->id_licenca > 0 ? $this->Model->editar($this->Model) :  $this->Model->registar($this->Model);
        
        $aviso=array();
        $dados = $this->Model->listar(); 
        if($estado == true){
        $dados = $this->Model->listar(); 

            if($this->Model->id_licenca > 0 ){

                $aviso[1] = 'Alteração efectuada com sucesso !';
                $this->carregarTemplate('admin/licencataxi', $aviso, $dados);

            }else{
                $aviso[1] = 'Cadastro efectuado com sucesso !';
                $this->carregarTemplate('admin/licencataxi', $aviso, $dados);
            }
                
        }
        else{
           
            $aviso[0] = 'Este registo já existe';
            $this->carregarTemplate('admin/cad_licencataxi', $aviso, $dados);
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
            $this->carregarTemplate('admin/licencataxi', $aviso, $dados);

        }
    }
   
}