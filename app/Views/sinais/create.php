<?php if ((!empty ($_SESSION['mensagem']))): ?>
<div class="card-panel teal lighten-2 white-text"><?php echo  $_SESSION['mensagem']; unset($_SESSION['mensagem']); ?></div>
<?php endif; ?>
<form class="paciente-form col s12" action="/add/sinais" method="post">


  <div class="row">

    <div class="input-field col s6">
      <label for="data">Data da Medição: </label>

      <input type="text" name="data" id="data" class="datepicker" value="<?php echo $dados['data'] ?>" required>
      <span class="red-text">
      <?php echo $data_error ?>
    </span>
    </div>


    <div class="input-field col s6">
      <label for="hora">Hora da Medição: </label>

      <input type="text" name="hora" id="hora" class="timepicker" value="<?php echo $dados['hora'] ?>">
      <span class="red-text">
      <?php echo $hora_error ?>
    </span>
    </div>
  </div>
  <div class="row">
  
      <div class="input-field col s6">
        <label for="altura">Altura: </label>
  
        <input type="number" step="0.01" min="0"name="altura" id="altura"  value = "<?php echo $dados['altura'] ?>" required >
        <span class="red-text"><?php echo $altura_error ?></span>
       </div>
      <div class="input-field col s6">
        <label for="peso">Peso: </label>
  
        <input type="number" step="0.01" min="0" name="peso" id="peso"  value = "<?php echo $dados['peso'] ?>" required >
        <span class="red-text"><?php echo $peso_error ?></span>
      </div>
  </div>
  <div class="row">
  
      <div class="input-field col s6">
        <label for="temperatura">Temperatura: </label>
  
        <input type="number" step="0.01" name="temperatura" id="temperatura"  value = "<?php echo $dados['temperatura'] ?>" required >
        <span class="red-text"><?php echo $temperatura_error ?></span>
       </div>
       <div class="input-field col s6">
        <label for="imc">Indice de Massa Corporal: </label>
  
        <input type="number" step="0.01" min="0"  id="imc" name="imc"  value = "<?php echo $dados['imc'] ?>" required >
        <span class="red-text"><?php echo $imc_error ?></span>
      </div>
  </div>
  <div class="row">
      <div class="input-field col s12">
        <label for="dor">Dor: </label>
  
        <input type="text" name="dor" id="dor"  value = "<?php echo $dados['dor'] ?>" required >
        <span class="red-text"><?php echo $dor_error ?></span>
      </div>
  </div>
  <input type="hidden" name="agendamento_id" id="agendamento_id" value="<?php echo $id; ?>">
  <div class="right horizontal">
  <button class="btn waves-effect waves-light 
#ff1744 red accent-3" type="submit">
    Hipótese<i class="material-icons right">book</i>
  </button>
</div>
</form>