<?php
namespace App\Controllers;

class HomeController {

  /** * Listagem de usuários */
  public function index()
  {

    if(!empty($_COOKIE['login'])){
      \App\View::make('home/index');
    }
    else{
    \App\View::make('Auth/login');
    }
  }

}
