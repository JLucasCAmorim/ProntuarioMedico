<?php
namespace App\Controllers;
use \App\Models\Agendamento;
class HomeController {

  /** * Listagem de usuários */
  public function index()
  {
    session_start();
  
    if((!empty ($_SESSION['login'])) && (!empty ($_SESSION['senha'])))
    {
      $agendamentos = Agendamento::select(); 
      \App\View::make('Home','home/index', [ 'agendamentos' => $agendamentos,
      ]);
     }
    else{
    \App\View::make('Login','Auth/login');
    }
  }

}
