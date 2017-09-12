<h2>Cadastro de Pacientes</h2>

<form class="paciente-form col s12" action="/add" method="post">
  <div class="row">

    <div class="input-field col s12">
    <label for="name">Nome Completo: </label>

    <input type="text" name="nomeCompleto" id="nomeCompleto">
    </div>
  </div>
  <div class="row">

    <div class="input-field col s6">
      <label for="cpf">CPF: </label>

      <input type="text" name="cpf" id="cpf">
    </div>
    <div class="input-field col s6">
      <label for="rg">RG: </label>

      <input type="text" name="rg" id="rg">
    </div>
    </div>
    <div class="row">

      <div class="input-field col s6">
        <label for="naturalidade">Naturalidade: </label>

        <input type="text" name="naturalidade" id="naturalidade">
      </div>
      <div class="input-field col s6">
        <label for="nacionalidade">Nacionalidade: </label>

        <input type="text" name="nacionalidade" id="nacionalidade" >
      </div>
      </div>
  <div class="row">

    <div class="input-field col s12">
    <label for="email">Email: </label>

    <input type="email" name="email" id="email">
</div>
</div>
<div class="row">
<div class="input-field col s6">
  <label for="telefone">Telefone: </label>

  <input type="text" name="telefone" id="telefone">
</div>
<div class="input-field col s6">
  <label for="celular">Celular: </label>

  <input type="text" name="celular" id="celular" >
</div>
</div>
<div class="row">

  <div class="input-field col s12">
  <label for="complemento">Complemento: </label>

  <input type="text" name="complemento" id="complemento">
</div>
</div>
<div class="row">

  <div class="input-field col s12">
  <label for="nomePai">Nome do pai: </label>

  <input type="text" name="nomePai" id="nomePai">
</div>
</div>
<div class="row">

  <div class="input-field col s12">
  <label for="nomeMae">Nome da mãe: </label>

  <input type="text" name="nomeMae" id="nomeMae">
</div>
</div>
<div class="row">

  <div class="input-field col s12">
    <label for="datanascimento">Data de Nascimento: </label>

    <input type="text" name="datanascimento" id="datanascimento" class="datepicker">
  </div>
  </div>
  <div class="row">

    <div class="input-field col s6">
    <label for="tipoSangue">Tipo Sanguineo: </label>

    <input type="text" name="tipoSangue" id="tipoSangue">
  </div>
  <div class="input-field col s6">
    <select id = "#paciente_cidades">
      <option value="" disabled selected>Escolha a cidade</option>
      <?php foreach ($cidades as $cidade): ?>
      <option value="<?php echo $cidade['id']; ?>"><?php echo $cidade['nome']; ?></option>
      <?php endforeach; ?>
    </select>

  <label for="idcidades">Cidade: </label>
</div>
  </div>
  <div class="row">

    <div class="input-field col s12">

      <select id = "#paciente_estados">
        <option value="" disabled selected>Escolha o Estado</option>
        <?php foreach ($estados as $estado): ?>
        <option value="<?php echo $estado['id']; ?>"><?php echo $estado['nome']; ?></option>
        <?php endforeach; ?>
      </select>
    <label for="estado">Estado: </label>
  </div>
  </div>

<div class="fixed-action-btn horizontal">
    <button class="btn-floating btn-large white" type="submit"><i class="large material-icons icon-red ">save</i></button>
  </div>
</form>
