<?php
namespace App\Controllers;
use \App\Models\Agendamento;
<<<<<<< HEAD
use \App\Models\User;
=======
>>>>>>> d6e730b15053ac0e10bfb44c9d73c91981ec1eed
class HomeController {

  /** * Listagem de usuários */
  public function index()
  {
    session_start();
  
    if((!empty ($_SESSION['login'])) && (!empty ($_SESSION['senha']) && (!empty ($_SESSION['medico']))))
    {
<<<<<<< HEAD
  
      $agendamentos = Agendamento::select(); 
      \App\View::make('Home','home/index', [ 'agendamentos' => $agendamentos
=======
      $agendamentos = Agendamento::select(); 
      \App\View::make('Home','home/index', [ 'agendamentos' => $agendamentos,
>>>>>>> d6e730b15053ac0e10bfb44c9d73c91981ec1eed
      ]);
     }
     elseif((!empty ($_SESSION['login'])) && (!empty ($_SESSION['senha']) && (!empty ($_SESSION['admin']))))
     {
   
       $users = User::selectAll(); 
       \App\View::make('Usuários','home/users', [ 'users' => $users
       ]);
      }
    else{
    \App\View::make('Login','Auth/login');
    }
  }
  public function history(){
    session_start();
    
      if((!empty ($_SESSION['login'])) && (!empty ($_SESSION['senha']) && (!empty ($_SESSION['medico']))))
      {
    
        $agendamentos = Agendamento::selectUser(); 
        \App\View::make('Histórico','home/history', [ 'agendamentos' => $agendamentos
        ]);
       }
       else{
        \App\View::make('Login','Auth/login');
        }
  }

}
