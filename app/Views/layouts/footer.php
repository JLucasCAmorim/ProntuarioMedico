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
</div>



<!--  Scripts-->
<script src="/public/js/jquery.min.js"></script>
<script src="/public/js/jquery-ui.min.js"></script>
<script src="/public/js/materialize.min.js"></script>
<script src="/public/js/jquery-mask.js"></script>
<script>
$(document).ready(function(){
$('#cpf').mask('000.000.000-00', {reverse: true});
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
