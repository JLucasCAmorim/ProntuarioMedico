<form class="paciente-form col s12" action="/editar/agendamento" method="post">
<div class="row">

    <div class="input-field col s6">
      <label for="data">Data do Atendimento: </label>

      <input type="text" name="data" id="data" class="datepicker" value="<?php echo $agendamento['data'] ?>" required>
    </div>


    <div class="input-field col s6">
      <label for="hora">Hora do Atendimento: </label>

      <input type="text" name="hora" id="hora" class="timepicker" value="<?php echo $agendamento['hora'] ?>" required>
    </div>
  </div>
  <div class="row">
    <div class="input-field col s6">
      <select id="idmedico" name="idmedico" onChange="showHint(this.value)">
        <option value="<?php echo $agendamento['idmedico']; ?>" disabled selected><?php echo $agendamento['nomeCompleto']; ?></option>
        <?php foreach ($medicos as $medico): ?>
        <option value="<?php echo $medico['idmedico']; ?>">
          <?php echo $medico['nomeCompleto']; ?>
        </option>
        <?php endforeach; ?>
      </select>
      <label for="idmedico">Médico: </label>

    </div>


    <div class="input-field col s6">

      <select name="idclient" id="idclient">
      <option value="<?php echo $agendamento['idclient']; ?>" selected><?php echo $agendamento['nome']; ?></option>
        <?php foreach ($pacientes as $paciente): ?>
        <option value="<?php echo $paciente['idclient']; ?>">
          <?php echo $paciente['nome']; ?>
        </option>
        <?php endforeach; ?>
      </select>

      <label for="idclient">Paciente: </label>

    </div>
    <span class="red-text">
      <?php echo $cidade_error ?>
    </span>
  </div>
  <input type="hidden" name="id" id="id" value="<?php echo $agendamento['id']; ?>">
  <div class="fixed-action-btn horizontal">
    <button class="btn-floating btn-large #ff1744 red accent-3" type="submit">
      <i class="large material-icons">edit</i>
    </button>
  </div>
</form>