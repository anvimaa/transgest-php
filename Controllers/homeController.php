<?php
class homeController extends Controller{

    public $Model;
    public $logModel;


    public function __construct(){

        $this->Model= new estatisticasModel();   
        $this->logModel = new loginModel();
    }

    public function index(){     
        $this->carregarTemplate('include/login', array());   
    }

    public function painel(){ 
        session_start();
        $dados = $this->Model->estatisticas(); 
        
        if($_SESSION['cargo']!='Visitante'){
            $this->carregarTemplate('include/dashboard', $dados, array());
        }else{
            $this->carregarTemplate('include/dashboard3', $dados, array());
       }   
    }
    

    public function login(){
        //if(!empty($_POST['email']) && !empty($_POST['senha']))
        //{
            $_SESSION['erro'] = "";

            $usuario = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);

            if(empty($usuario) && empty($senha)){

                $erro = "Campos email e senha vazios !";
                $this->carregarTemplate('include/login', $erro);  
            }
            else{

                if(empty($usuario)){

                    $erro = "Preencha o usuário !";
                    $this->carregarTemplate('include/login', $erro);  
                }
                else{

                    if($senha == ""){

                        $erro = "Preencha a senha !";
                        $this->carregarTemplate('include/login', $erro);  
                    }
                    else{
                        
                        $dadosLog = $this->logModel->login($usuario, $senha);                        
                        //if(!isset($_SESSION))
                        session_start();

                        if(!empty($dadosLog)){                                              
                            //$_SESSION['id_usuario'] = $dadosLog->id_usuario;
                            $_SESSION['usuario'] = $dadosLog->usuario;
                            $_SESSION['email'] = $dadosLog->email;
                            $_SESSION['cargo'] = $dadosLog->cargo;
                            $_SESSION['senha'] = $dadosLog->senha;
                           //$_SESSION['foto'] = $dadosLog->foto;
                            
                            $dados = $this->Model->estatisticas_geral();
                            
                            if($_SESSION['cargo']=='Visitante'){
                                $this->carregarTemplate('include/dashboard3', $dados, $dadosLog);  
                            }else{
                                $this->carregarTemplate('include/dashboard', $dados, $dadosLog);
                           }
                                
                        }
                        else{
                            $erro = "Usuário ou senha incorrecto";
                            $this->carregarTemplate('include/login', $erro); 
                        }                        
                    }
                } 
            }
        /*}
        else{
            $erro = "Preencha o email e a senha !";
            $this->carregarTemplate('include/login', $erro); 
        }*/

    }
}

?>