<form class="paciente-form col s12" action="/add/agendamento" method="post">


  <div class="row">

    <div class="input-field col s6">
      <label for="data">Data do Atendimento: </label>

      <input type="text" name="data" id="data" class="datepicker" value="<?php echo $dados['data'] ?>" required>
      <span class="red-text">
      <?php echo $data_error ?>
    </span>
    </div>


    <div class="input-field col s6">
      <label for="hora">Hora do Atendimento: </label>

      <input type="text" name="hora" id="hora" class="timepicker" value="<?php echo $dados['hora'] ?>">
      <span class="red-text">
      <?php echo $hora_error ?>
    </span>
    </div>
  </div>
  <div class="row">
    <div class="input-field col s6">
      <select id="idmedico" name="idmedico" onChange="showHint(this.value)">
        <option value="" disabled selected>Escolha o Médico</option>
        <?php foreach ($medicos as $medico): ?>
        <option value="<?php echo $medico['idmedico']; ?>">
          <?php echo $medico['nomeCompleto']; ?>
        </option>
        <?php endforeach; ?>
      </select>
      <label for="idmedico">Médico: </label>
      <span class="red-text">
      <?php echo $medico_error ?>
    </span>
    </div>
   

    <div class="input-field col s6">

      <select name="idclient" id="idclient">
        <option value="" disabled selected>Escolha o Paciente</option>
        <?php foreach ($pacientes as $paciente): ?>
        <option value="<?php echo $paciente['idclient']; ?>">
          <?php echo $paciente['nome']; ?>
        </option>
        <?php endforeach; ?>
      </select>

      <label for="idclient">Paciente: </label>
      <span class="red-text">
      <?php echo $paciente_error ?>
    </span>
    </div>
   
  </div>

  <div class="fixed-action-btn horizontal">
    <button class="btn-floating btn-large #ff1744 red accent-3" type="submit">
      <i class="large material-icons">save</i>
    </button>
  </div>
</form>