<?php
namespace App\Controllers;

class HomeController {

  /** * Listagem de usuários */
  public function index()
  {

    if(!empty($_COOKIE['login'])){
      \App\View::make('Home','home/index');
    }
    else{
    \App\View::make('Login','Auth/login');
    }
  }

}
