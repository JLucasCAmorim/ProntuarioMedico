<?php
namespace App\Models;
use App\DB;

class User {
   /** * Busca usuários * * Se o ID não for passado, busca todos. Caso contrário, filtra pelo ID especificado. */
   public static function select($email, $password) {

    $connect = mysqli_connect('localhost','root','!Lucas15345216','php_crud');



      $verifica = mysqli_query($connect,"SELECT * FROM users WHERE email = '$email' AND password = '$password'") or die("erro ao selecionar");
        if (mysqli_num_rows($verifica)<=0){
          echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='/';</script>";
          die();
        }
        else{
          $cook = base64_encode($email);
           setcookie("login",$cook);
        }
    }

}
