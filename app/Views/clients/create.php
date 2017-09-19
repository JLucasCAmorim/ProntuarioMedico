<form class="paciente-form col s12" action="/add" method="post">
  <span><?php echo $errMsg;?></span>
  <div class="row">

    <div class="input-field col s12">
    <label for="nomeCompleto">Nome Completo: </label>

    <input type="text" name="nomeCompleto" id="nomeCompleto" required>
    </div>
  </div>
  <div class="row">

    <div class="input-field col s6">
      <label for="cpf">CPF: </label>

      <input type="text" name="cpf" id="cpf" required>
    </div>
    <div class="input-field col s6">
      <label for="rg">RG: </label>

      <input type="text" name="rg" id="rg" required>
    </div>
    </div>
    <div class="row">

      <div class="input-field col s6">
        <label for="naturalidade">Naturalidade: </label required>

        <input type="text" name="naturalidade" id="naturalidade">
      </div>
      <div class="input-field col s6">
        <label for="nacionalidade">Nacionalidade: </label required>

        <input type="text" name="nacionalidade" id="nacionalidade" >
      </div>
      </div>
  <div class="row">

    <div class="input-field col s12">
    <label for="email">Email: </label>

    <input type="email" name="email" id="email" required>
</div>
</div>
<div class="row">
<div class="input-field col s6">
  <label for="telefone">Telefone: </label>

  <input type="text" name="telefone" id="telefone">
</div>
<div class="input-field col s6">
  <label for="celular">Celular: </label>

  <input type="text" name="celular" id="celular" required >
</div>
</div>
<div class="row">

  <div class="input-field col s6">
  <label for="complemento">Complemento: </label>

  <input type="text" name="complemento" id="complemento">
</div>

  <div class="input-field col s6">
  <label for="cep">Cep: </label>

  <input type="text" name="cep" id="cep" required>
</div>
</div>
<div class="row">

  <div class="input-field col s12">
  <label for="nomePai">Nome do pai: </label>

  <input type="text" name="nomePai" id="nomePai" required>
</div>
</div>
<div class="row">

  <div class="input-field col s12">
  <label for="nomeMae">Nome da mãe: </label>

  <input type="text" name="nomeMae" id="nomeMae" required>
</div>
</div>
<div class="row">

  <div class="input-field col s12">
    <label for="datanascimento">Data de Nascimento: </label>

    <input type="text" name="datanascimento" id="datanascimento" class="datepicker" required>
  </div>
  </div>
  <div class="row">

    <div class="input-field col s6">
    <label for="tipoSangue">Tipo Sanguineo: </label>

    <input type="text" name="tipoSangue" id="tipoSangue" required>
  </div>

  <div class="input-field col s6">
    <select id="paciente_estados" onChange="showHint(this.value)">
      <option value="" disabled selected>Escolha o Estado</option>
      <?php foreach ($estados as $estado): ?>
      <option value="<?php echo $estado['id']; ?>">
        <?php echo utf8_encode($estado['nome']); ?>
      </option>
      <?php endforeach; ?>
    </select>
  <label for="estado">Estado: </label>

</div>
  </div>
  <div class="row">

    <div class="input-field col s12">
      <select name="idcidade" disabled id="idcidade">
        <option>Escolha a cidade</option>

      </select>

    <label for="idcidades">Cidade: </label>

  </div>
  </div>

<div class="fixed-action-btn horizontal">
    <button class="btn-floating btn-large #ff1744 red accent-3" type="submit"><i class="large material-icons">save</i></button>
  </div>
</form>
