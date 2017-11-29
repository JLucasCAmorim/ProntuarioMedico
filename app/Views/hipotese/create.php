<?php if ((!empty ($_SESSION['mensagem']))): ?>
<div class="card-panel teal lighten-2 white-text"><?php echo  $_SESSION['mensagem']; unset($_SESSION['mensagem']); ?></div>
<?php endif; ?>
<form class="paciente-form col s12" action="/add/hipotese" method="post">


<div class="row">
<div class="input-field col s12">
<label for="hipotese">Hipótese: </label>

   <input type="text" name="hipotese" id="hipotese" class="materialize-textarea" data-length="300" value="<?php echo $dados['hipotese'] ?>">

    <span class="red-text">
    <?php echo $hipotese_error ?>
    </span>
  </div>
</div>
<div class="row">
<div class="input-field col s12">
<label for="observacoes">Observações: </label>

   <input type="text" name="observacoes" id="observacoes" class="materialize-textarea" data-length="300" value="<?php echo $dados['medicamentos'] ?>">

    <span class="red-text">
    <?php echo $observacoes_error ?>
  </span>
  </div>
</div>
<input type="hidden" name="agendamento_id" id="agendamento_id" value="<?php echo $id; ?>">
<div class="right horizontal">
<button class="btn waves-effect waves-light 
#ff1744 red accent-3" type="submit">
  Prescrição<i class="material-icons right">border_color</i>
</button>
</div>
</form>