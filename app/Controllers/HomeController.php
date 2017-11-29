<?php
namespace App\Controllers;
use \App\Models\Timeline;
use \App\Models\Agendamento;
use \App\Models\User;

class HomeController {

  /** * Listagem de usuários */
  public function index()
  {
    session_start();
  
    if((!empty ($_SESSION['login'])) && (!empty ($_SESSION['senha']) && (!empty ($_SESSION['medico']))))
    {

       
        $agendamentos = Agendamento::select();
        \App\View::make('Home','home/index', [ 'agendamentos' => $agendamentos ]);
      
     
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
  public function timeline($id){
      
    session_start();
    
      if((!empty ($_SESSION['login'])) && (!empty ($_SESSION['senha']) && (!empty ($_SESSION['medico']))))
      {
        
        $agendamento = Timeline::selectAll($id)[0];
      
        \App\View::make('Timeline','home/timeline',['agendamento' => $agendamento]);
       }
       else{
        \App\View::make('Login','Auth/login');
      }
  }

}
