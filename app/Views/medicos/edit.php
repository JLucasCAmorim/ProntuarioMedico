<form class="paciente-form col s12" action="/edit/medico" method="post">
  <div class="row">

    <div class="input-field col s12">
      <label for="nomeCompleto">Nome Completo: </label>

      <input type="text" name="nomeCompleto" id="nomeCompleto" value="<?php echo $medico['nomeCompleto']; ?>">
    </div>
  </div>
  <div class="row">

    <div class="input-field col s6">
      <label for="crm">CRM: </label>

      <input type="text" name="crm" id="crm" value="<?php echo $medico['crm']; ?>">
    </div>
    <div class="input-field col s6">
    <label for="cpf">CPF: </label>

    <input type="text" name="cpf" id="cpf" value="<?php echo $medico['cpf']; ?>">
  </div>
  </div>
  <div class="row">
     <div class="input-field col s6">
      <label for="rg">RG: </label>

      <input type="text" name="rg" id=" rg" value="<?php echo $medico['rg']; ?>">
    </div>
    <div class="input-field col s6">
      <label for="email">Email: </label>

      <input type="email" name="email" value="<?php echo $medico['email']; ?>" id="email">
    </div>
  </div>
  <div class="row">

    <div class="input-field col s6">
      <label for="naturalidade">Naturalidade: </label>

      <input type="text" name="naturalidade" value="<?php echo $medico['naturalidade']; ?>" id="naturalidade">
    </div>
    <div class="input-field col s6">
      <label for="nacionalidade">Nacionalidade: </label>

      <input type="text" name="nacionalidade" value="<?php echo $medico['nacionalidade']; ?>" id="nacionalidade">
    </div>
  </div>
  <div class="row">
    <div class="input-field col s6">
      <label for="telefone">Telefone: </label>

      <input type="text" name="telefone" value="<?php echo $medico['telefone']; ?>" id="telefone">
    </div>
    <div class="input-field col s6">
      <label for="celular">Celular: </label>

      <input type="text" maxlength="9" name="celular" id="celular" value="<?php echo $medico['celular']; ?>">
    </div>
  </div>
  <div class="row">
        <div class="input-field col s12">
            <label for="bairro">Bairro: </label>

            <input type="text" name="bairro" id="bairro" value="<?php echo $medico['bairro'] ?>" required>
        </div>
    </div>
    <div class="row">

        <div class="input-field col s12">
            <label for="endereco">Endereço: </label>

            <input type="text" name="endereco" id="endereco" value="<?php echo $medico['endereco'] ?>" required>
        </div>
    </div>
  <div class="row">

    <div class="input-field col s6">
      <label for="complemento">Complemento: </label>

      <input type="text" name="complemento" id="complemento" value="<?php echo $medico['complemento']; ?>">
    </div>

    <div class="input-field col s6">
      <label for="cep">Cep: </label>

      <input type="text" name="cep" id="cep" value="<?php echo $medico['cep']; ?>">
    </div>
  </div>
  
  <div class="row">

    <div class="input-field col s12">
      <label for="datanascimento">Data de Nascimento: </label>

      <input type="text" name="datanascimento" id="datanascimento" class="datepicker" value="<?php echo $medico['datanascimento']; ?>">
    </div>
  </div>
  <div class="row">

    <div class="input-field col s6">
      <label for="trabalho">Trabalho: </label>

      <input type="text" name="trabalho" id="trabalho" value="<?php echo $medico['trabalho']; ?>">
    </div>
    <div class="input-field col s6">
      <select id="idestado" name="idestado" onChange="showHint(this.value)">
        <option value="<?php echo $medicoestado['id']; ?>" selected><?php echo utf8_encode($medicoestado['nome']); ?></option>
        <?php foreach ($estados as $estado): ?>
        <option value="<?php echo $estado['id']; ?>">
          <?php echo utf8_encode($estado['nome']); ?>
        </option>
        <?php endforeach; ?>
      </select>
      <label for="idestado">Estado: </label>

    </div>
  </div>
  <div class="row">

    <div class="input-field col s12">
      <select name="idcidade" id="idcidade">
        <option value="<?php echo $cidademedico['id'] ?>">
          <?php echo utf8_encode($cidademedico['nome']) ?>
        </option>
      </select>

      <label for="idcidades">Cidade: </label>

    </div>
  </div>
  <div class="row">

        <div class="input-field col s12">

            <select id="idesp" name="idesp" >
                <option value="<?php echo $medicoesp['id']; ?>" selected><?php echo $medicoesp['nome']; ?></option>
                <?php foreach ($especialidades as $especialidade): ?>
                <option value="<?php echo $especialidade['id']; ?>">
                    <?php echo utf8_encode($especialidade['nome']); ?>
                </option>
                <?php endforeach; ?>
            </select>


            <label for="idesp">Especialidades: </label>

        </div>
        <span class="red-text">
            <?php echo $especialidade_error ?>
        </span>
    </div>
  <input type="hidden" name="idmedico" id="idmedico" value="<?php echo $medico['idmedico']; ?>">
  <div class="fixed-action-btn horizontal">
    <button class="btn-floating btn-large #ff1744 red accent-3" type="submit">
      <i class="large material-icons">edit</i>
    </button>
  </div>
</form>