<form class="paciente-form col s12" action="/edit" method="post">
  <div class="row">

    <div class="input-field col s12">
    <label for="nomeCompleto">Nome Completo: </label>

    <input type="text" name="nomeCompleto" id="nomeCompleto" value="<?php echo $client['nomeCompleto']; ?>">
    </div>
  </div>
  <div class="row">

    <div class="input-field col s6">
      <label for="cpf">CPF: </label>

      <input type="text" name="cpf" id="cpf" value="<?php echo $client['cpf']; ?>">
    </div>
    <div class="input-field col s6">
      <label for="rg">RG: </label>

      <input type="text" name="rg" id=" rg"value="<?php echo $client['rg']; ?>">
    </div>
    </div>
    <div class="row">

      <div class="input-field col s6">
        <label for="naturalidade">Naturalidade: </label>

        <input type="text" name="naturalidade" value="<?php echo $client['naturalidade']; ?>" id="naturalidade">
      </div>
      <div class="input-field col s6">
        <label for="nacionalidade">Nacionalidade: </label>

        <input type="text" name="nacionalidade" value="<?php echo $client['nacionalidade']; ?>" id="nacionalidade" >
      </div>
      </div>
  <div class="row">

    <div class="input-field col s12">
    <label for="email">Email: </label>

    <input type="email" name="email" value="<?php echo $client['email']; ?>" id="email">
</div>
</div>
<div class="row">
<div class="input-field col s6">
  <label for="telefone">Telefone: </label>

  <input type="text" name="telefone" value="<?php echo $client['telefone']; ?>" id="telefone">
</div>
<div class="input-field col s6">
  <label for="celular">Celular: </label>

  <input type="text" name="celular" id="celular" value="<?php echo $client['celular']; ?>" >
</div>
</div>
<div class="row">

  <div class="input-field col s6">
  <label for="complemento">Complemento: </label>

  <input type="text" name="complemento" id="complemento" value="<?php echo $client['complemento']; ?>">
</div>

  <div class="input-field col s6">
  <label for="cep">Cep: </label>

  <input type="text" name="cep" id="cep" value="<?php echo $client['cep']; ?>">
</div>
</div>
<div class="row">

  <div class="input-field col s12">
  <label for="nomePai">Nome do pai: </label>

  <input type="text" name="nomePai" id="nomePai" value="<?php echo $client['nomePai']; ?>">
</div>
</div>
<div class="row">

  <div class="input-field col s12">
  <label for="nomeMae">Nome da mãe: </label>

  <input type="text" name="nomeMae" id="nomeMae" value="<?php echo $client['nomeMae']; ?>">
</div>
</div>
<div class="row">

  <div class="input-field col s12">
    <label for="datanascimento">Data de Nascimento: </label>

    <input type="text" name="datanascimento" id="datanascimento" class="datepicker" value="<?php echo $client['datanascimento']; ?>">
  </div>
  </div>
  <div class="row">

    <div class="input-field col s6">
    <label for="tipoSangue">Tipo Sanguineo: </label>

    <input type="text" name="tipoSangue" id="tipoSangue" value="<?php echo $client['tipoSangue']; ?>">
  </div>
  <div class="input-field col s6">
    <select name="idcidade" id="idcidade">
      <option value="" disabled selected>Escolha a cidade</option>
      <?php foreach ($cidades as $cidade): ?>
      <option value="<?php echo $cidade['id']; ?>"><?php echo utf8_encode($cidade['nome']); ?></option>
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
        <option value="<?php echo $estado['id']; ?>">
          <?php echo utf8_encode($estado['nome']); ?>
        </option>
        <?php endforeach; ?>
      </select>
    <label for="estado">Estado: </label>
  </div>
  </div>

  <input type="hidden" name="id" value="<?php echo $client['id']; ?>">
<div class="fixed-action-btn horizontal">
    <button class="btn-floating btn-large #ff1744 red accent-3" type="submit"><i class="large material-icons">edit</i></button>
  </div>
</form>
