<?php
namespace App\Models;
use App\DB;

class User {
   /** * Busca usuários * * Se o ID não for passado, busca todos. Caso contrário, filtra pelo ID especificado. */
   public static function select($email, $password) {
    session_start();  
    $password = md5($password);
    $sql = sprintf("SELECT * FROM users WHERE email = '$email' AND password = '$password'") or die("erro ao selecionar");
    $DB = new DB; $stmt = $DB->prepare($sql);
    
    $stmt->execute();

    $users = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    foreach ($users as $user) {
      $role = $user['role'];
      
    }
        if (count($users) == 1){
          $_SESSION['login'] = $email;
          $_SESSION['senha'] = $password;
          if($role == 'admin'){
            $_SESSION['admin'] = $role;
          }
          else{
            $_SESSION['medico'] = $role;
          }
        
        }
        else{
         
          unset ($_SESSION['login']);
          unset ($_SESSION['senha']);
          unset ($_SESSION['admin']);
          unset ($_SESSION['medico']);
          echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='/';</script>";
          die();
        }
    }
    public static function email($email) {
      $where = ''; if (!empty($email)) { $where = 'WHERE email = :email'; }
      $sql = sprintf("SELECT email FROM users %s", $where);
      $DB = new DB; $stmt = $DB->prepare($sql);
 
      if (!empty($where))
      {
          $stmt->bindParam(':email', $email, \PDO::PARAM_INT);
      }
 
         $stmt->execute();
 
         $email = $stmt->fetchAll(\PDO::FETCH_ASSOC);
         
        

         if(count($email) == 1){
             return true;
         }
         else{
          return false;
         }
         
         
     }
    public static function save($nome ,$email, $password, $role, $confirmar)
    {
        // validação (bem simples, só pra evitar dados vazios)
        if($password != $confirmar){
            return false;
        }
        $senha = md5($password);
        // a data vem no formato dd/mm/YYYY
        // então precisamos converter para YYYY-mm-dd


        // insere no banco
        $DB = new DB;
        $sql = "INSERT INTO users
        (nome,email, password, role)
         VALUES(:nome,:email, :password, :role)";
          $stmt = $DB->prepare($sql);
          $stmt->bindParam(':nome', $nome);
          $stmt->bindParam(':email', $email);
          $stmt->bindParam(':password', $senha);
          $stmt->bindParam(':role', $role);
          


        if ($stmt->execute())
        {
            return true;
        }
        else
        {
            echo "Erro ao cadastrar";
            print_r($stmt->errorInfo());
            return false;
        }
    }

}
