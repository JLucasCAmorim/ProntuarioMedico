<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Prontuario-Medico</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="/public/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="/public/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <nav class="#c62828 red darken-3" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="/home" class="brand-logo">Prontuário Médico</a>
      <ul class="right hide-on-med-and-down">
        <?php if ($_COOKIE['login']): ?>

        <li><a href="/pacientes">Pacientes</a></li>
        <li>
            <a class="dropdown-button" href="#!" data-activates="dropdown2">
                Logout <span class="caret"></span>
            </a>

            <ul id="dropdown2" class="dropdown-content" role="menu">
                <li>
                    <a href="/logout"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Sair
                    </a>

                    <form id="logout-form" action="/logout" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
                <?php endif; ?>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>

  <div class="container">
    <div class="section">
