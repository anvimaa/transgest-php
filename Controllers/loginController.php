<?php

class loginController extends Controller{

    public $Model;
    public  $viatModel;
    public $logModel;
    public function __construct(){

        $this->Model= new estatisticasModel();   
        $this->logModel = new loginModel();
              
    }

    public function index(){
      
        $this->carregarTemplate('include/login', array());   
    }
    public function dashboard(){

        $this->carregarTemplate('include/dashboard', array());   
    }

    public function login(){
    
        $dadosLogin = $this->logModel->login($_POST['email'], $_POST['senha']);
        
            if(!empty($dadosLogin)){              

                if(!isset($_SESSION)) {
                    session_start();
                
                //$_SESSION['id_usuario'] = $dadosLogin->id_user;
                $_SESSION['usuario'] = $dadosLogin->usuario;
                $_SESSION['email'] = $dadosLogin->email;
                $_SESSION['cargo'] = $dadosLogin->cargo;
                $_SESSION['senha'] = $dadosLogin->senha;
            }
                $dados = $this->Model->estatisticas(); 
                //$this->carregarTemplate('include/dashboard', $dados, $dadosLogin);
                
            }
            else{
                $this->index();
            }
               
    }
}