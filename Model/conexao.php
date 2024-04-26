<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$bd = "systrans";
$mysqli = new mysqli($host,$usuario, $senha, $bd);

class Conexao{

    private static $pdo;
    
    public static function conectar() {
        
        if (self::$pdo == null) {
            
            try {
                self::$pdo = new PDO('mysql:host=localhost; dbname=systrans','root','',[PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"]);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //echo 'Conectado';

             
            } catch (Exception $e) {
                echo 'Falha na conexão com o banco de dados';
            }

        }else{
            return self::$pdo;
        }
       
        return self::$pdo;
    }
}

?>