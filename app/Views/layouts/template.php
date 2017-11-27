<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Prontuario-Medico</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="/public/css/meucss.min.css" type="text/css" rel="stylesheet" media="screen,projection" />
  <link href="/public/css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
</head>

<body>

  <div class="row">
    <div class="col s12 m4 l3">
      <ul id="slide-out" class="#fafafa grey lighten-5 side-nav fixed">
        <?php if ((!empty ($_SESSION['login'])) && (!empty ($_SESSION['senha']))): ?>
        <center>
          <div class="medicoimg">
            <img src="/public/images/medico2.png" alt="default" class="circle responsive-img valign profile-image-login" style="height:150px; weight: 150px;">
            <li>
              <h5 style="font-weight: bold !important;" class="white-text">DoctorPront</h5>
            </li>
          </div>

        </center>
        <?php if ((!empty ($_SESSION['login'])) && (!empty ($_SESSION['senha']))&& (!empty ($_SESSION['medico']))): ?>
        <li>
          <a href="/home"><i class="material-icons icon-red">home</i>Home</a>
        </li>
        <li>
          <a href="/history"><i class="material-icons icon-red">restore</i>Histórico</a>
        </li>
        <?php endif; ?>
        
        <?php if ((!empty ($_SESSION['login'])) && (!empty ($_SESSION['senha']))&& (!empty ($_SESSION['admin']))): ?>
        <li>
          <a href="/home"><i class="material-icons icon-red">home</i>Home</a>
        </li>
        <li>
          <a href="/pacientes"><i class="material-icons icon-red">face</i>Pacientes</a>
        </li>
        <li>
          <a href="/medicos"><i class="material-icons icon-red">favorite</i>Médicos</a>
        </li>
        <li>
          <a href="/agendamentos"><i class="material-icons icon-red">watch_later</i> Agendamentos</a>
        </li>
        <li>
          <a href="/registrar"><i class="material-icons icon-red">assignment_ind</i> Registrar</a>
        </li>
       
       
        <?php endif; ?>
        <li>
          <a class="dropdown-button" href="#!" data-activates="dropdown2">
           Logout<i class="material-icons icon-red">keyboard_arrow_down</i>
            <span class="caret"></span>
          </a>

          <ul id="dropdown2" class="dropdown-content" role="menu">
            <li>
              <a style="color: #000000;" href="/logout" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                Sair
              </a>

              <form id="logout-form" action="/logout" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
            </li>
            <?php endif; ?>
          </ul>
    </div>

    <div class="col s12 m8 l9" id="main">
    <div class="navbar-fixed">
      <nav class="#c62828 red darken-3" role="navigation">

        <a href="#" data-activates="slide-out" class="button-collapse ">
          <i class="icon-white material-icons">menu</i>
        </a>
        <div class="nav-wrapper container">
          <a id="logo-container" href="/home" class="brand-logo">
            <?php echo $pagetitle; ?>
          </a>
          <ul class="right hide-on-med-and-down">

          </ul>
        </div>
      </nav>
      </div>
      <!-- Teal page content  -->

      <div class="container">
        <div class="section">
          <?php if (isset($viewName)) { $path = viewsPath() . $viewName . '.php'; if (file_exists($path)) { require_once $path; } } ?>
        </div>
      </div>

    </div>


    <!--  Scripts-->
    <script src="/public/js/jquery.min.js"></script>
    <script src="/public/js/jquery-ui.min.js"></script>
    <script src="/public/js/materialize.min.js"></script>
    <script src="/public/js/jquery-mask.js"></script>
    <script>
      $(document).ready(function () {
        $('.parciente-form')
        $('#cep').mask('00000-000', {
          reverse: false
        });
        $('#cpf').mask('000.000.000-00', {
          reverse: false
        });
        $(".dropdown-button").dropdown();
        $('.parallax').parallax();
        // Initialize collapse button
        $(".button-collapse").sideNav();
        // Initialize collapsible (uncomment the line below if you use the dropdown variation)
        //$('.collapsible').collapsible()
        $('.carousel').carousel();
        $('select').material_select();
        $('.timepicker').pickatime({
          default: 'now',
          twelvehour: false, // change to 12 hour AM/PM clock from 24 hour
          cleartext: 'Limpar',
          donetext: 'OK',
        autoclose: false,
        vibrate: true // vibrate the device when dragging clock hand
         });
      
        $('.datepicker').pickadate({
          selectMonths: true,
          selectYears: 60,
          monthsFull: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro',
            'Outubro', 'Novembro', 'Dezembro'
          ],
          monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
          weekdaysFull: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabádo'],
          weekdaysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
          weekdaysLetter: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
          today: 'Hoje',
          clear: 'Limpar',
          close: '',
          format: 'dd/mm/yyyy',
          labelMonthNext: 'Próximo mês',
          labelMonthPrev: 'Mês anterior',
          labelMonthSelect: 'Selecione um mês',
          labelYearSelect: 'Selecione um ano',
          closeOnSelect: true
        });
      });
    </script>
    <script type="text/javascript">
      function showHint(str) {

        if (str.lenght == 0) {

        } else {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function () {

            if (this.readyState == 4 && this.status == 200) {
              $('#idcidade').empty();
              $('#idcidade').prop('disabled', false);
              $('#idcidade').append(this.responseText);
              $('#idcidade').material_select();


            }
          };
          xmlhttp.open("GET", "/estados?id=" + str, true);
          xmlhttp.send();
        }
      }
    </script>
</body>

</html>