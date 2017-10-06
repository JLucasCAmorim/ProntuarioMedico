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
  $(document).ready(function(){
    $('.parciente-form')
    $('#cep').mask('00000-000', {reverse: false});
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
    function showHint(str) {

      if(str.lenght == 0){

      }else{
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {

          if (this.readyState == 4 && this.status == 200) {
            $('#idcidade').empty();
            $('#idcidade').prop('disabled', false);
            $('#idcidade').append(this.responseText);
            $('#idcidade').material_select();


          }
        };
        xmlhttp.open("GET", "/estados?id="+ str, true);
        xmlhttp.send();
      }
    }
  </script>
  </body>
  </html>
