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
      <a id="logo-container" href="/home" class="brand-logo"><?php echo $pagetitle; ?></a>
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
    <?php if (isset($viewName)) { $path = viewsPath() . $viewName . '.php'; if (file_exists($path)) { require_once $path; } } ?>
    </div>
  </div>
  <footer class="page-footer #c62828 red darken-3">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Materialize</a>
      </div>
    </div>
  </footer>
  </div



  <!--  Scripts-->
  <script src="/public/js/jquery.min.js"></script>
  <script src="/public/js/jquery-ui.min.js"></script>
  <script src="/public/js/materialize.min.js"></script>
  <script src="/public/js/jquery-mask.js"></script>
  <script>
  $(document).ready(function(){
    $('.parciente-form')
    $('#cpf').mask('000.000.000-00', {reverse: false});
    $(".dropdown-button").dropdown();
     $('.parallax').parallax();
     // Initialize collapse button
     $(".button-collapse").sideNav();
     // Initialize collapsible (uncomment the line below if you use the dropdown variation)
     //$('.collapsible').collapsible()
     $('.carousel').carousel();
     $('select').material_select();
     $('.datepicker').pickadate({
       selectMonths: true,
       selectYears: 60,
       monthsFull: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
       monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
       weekdaysFull: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabádo'],
       weekdaysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
       weekdaysLetter: [ 'D', 'S', 'T', 'Q', 'Q', 'S', 'S' ],
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
  $(document).on('change', '.parciente-form #paciente_estados', function(){
  $.ajax ({
  url:'/estados',
  type: 'GET',
  dataType: 'script',
  data: {
    select_input: '#paciente_cidades',
    id: $('#paciente_estados option:selected').val()
  }
});
  });
  </script>
  </body>
  </html>
