<?php if ((!empty ($_SESSION['mensagem']))): ?>
<div class="card-panel teal lighten-2 white-text"><?php echo  $_SESSION['mensagem']; unset($_SESSION['mensagem']); ?></div>
<?php endif; ?>
<form class="paciente-form col s12" action="/add/atestado" method="post">


<div class="row">
<div class="input-field col s12">
<label for="texto">Atestado: </label>

   <input type="text" name="texto" id="texto" class="materialize-textarea" data-length="500" value="<?php echo $dados['hipotese'] ?>">

    <span class="red-text">
    <?php echo $evolucao_error ?>
    </span>
  </div>
</div>

<input type="hidden" name="agendamento_id" id="agendamento_id" value="<?php echo $id; ?>">
<div class="right horizontal">
<button class="btn waves-effect waves-light 
#ff1744 red accent-3" type="submit">
  Finalizar Atendimento<i class="material-icons right">priority_high</i>
</button>
</div>
</form>