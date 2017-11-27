<form class="paciente-form col s12" action="/add/agendamento" method="post">


  <div class="row">

    <div class="input-field col s12">
      <label for="queixa">Queixa: </label>

      <input type="text" name="queixa" id="queixa" class="materialize-textarea" data-length="300" value = "<?php echo $dados['queixa'] ?>" required >
      <span class="red-text">
      <?php echo $queixa_error ?>
    </span>
    </div>
</div>
  <div class="row">
  <div class="input-field col s12">
      <label for="historico">Histórico: </label>

      <input type="text" name="historico" class="materialize-textarea" data-length="300" id="historico" value="<?php echo $dados['historico'] ?>">
      <span class="red-text">
      <?php echo $historico_error ?>
    </span>
    </div>
  </div>
  <div class="row">
  <div class="input-field col s6">
  <label for="p_renal">Problemas Renais: </label>

     <input type="text" name="p_renal" id="p_renal" class="materialize-textarea" data-length="300" value="<?php echo $dados['p_renal'] ?>">
  
      <span class="red-text">
      <?php echo $p_renal_error ?>
    </span>
    </div>
   

    <div class="input-field col s6">
    <label for="p_articular">Problemas Articulares: </label>
  
       <input type="text" name="p_articular" id="p_articular" class="materialize-textarea" data-length="300" value="<?php echo $dados['p_articular'] ?>">
    
        <span class="red-text">
        <?php echo $p_articular_error ?>
      </span>
      </div>
   
  </div>
  <div class="row">
  <div class="input-field col s12">
  <label for="p_cardiaco">Problemas Cardiacos: </label>

     <input type="text" name="p_cardiaco" id="p_cardiaco" class="materialize-textarea" data-length="300" value="<?php echo $dados['p_cardiaco'] ?>">
  
      <span class="red-text">
      <?php echo $p_cardiaco_error ?>
    </span>
    </div>

  </div>
  <div class="row">
  <div class="input-field col s12">
  <label for="p_respiratorio">Problemas Respiratórios: </label>

     <input type="text" name="p_respiratorio" id="p_respiratorio" class="materialize-textarea" data-length="300" value="<?php echo $dados['p_respiratorio'] ?>">
  
      <span class="red-text">
      <?php echo $p_respiratorio_error ?>
    </span>
    </div>

  </div>
  <div class="row">
  <div class="input-field col s12">
  <label for="p_gastrico">Problemas Gástricos: </label>

     <input type="text" name="p_gastrico" id="p_gastrico" class="materialize-textarea" data-length="300" value="<?php echo $dados['p_gastrico'] ?>">
  
      <span class="red-text">
      <?php echo $p_gastrico_error ?>
    </span>
    </div>
  </div>
  <div class="row">
  <div class="input-field col s12">
  <label for="alergias">Alergias: </label>

     <input type="text" name="alergias" id="alergias" class="materialize-textarea" data-length="300" value="<?php echo $dados['alergias'] ?>">
  
      <span class="red-text">
      <?php echo $alergias_error ?>
    </span>
    </div>
  </div>
  <div class="row">
  <div class="input-field col s12">
  <label for="medicamentos">Medicamentos: </label>

     <input type="text" name="medicamentos" id="medicamentos" class="materialize-textarea" data-length="300" value="<?php echo $dados['medicamentos'] ?>">
  
      <span class="red-text">
      <?php echo $medicamentos_error ?>
    </span>
    </div>
  </div>
  <div class="row">
  
  <div>
  <label for="p_cicatrizar">Problemas de Cicatrização: </label>

  <p>
  
    <input name="p_cicatrizar" value="1" type="radio" id="p_cicatrizar" />
   <label for="p_cicatrizar">Sim</label>
  
  
  <input name="p_cicatrizar" value="0" type="radio" id="p_cicatrizar2" />
  <label for="p_cicatrizar2">Não</label>
  
  </p>
      <span class="red-text">
      <?php echo $p_cicatrizar_error ?>
    </span>
    </div>
  </div>
  <div class="row">
  
  <div>
  <label for="hepatite">Hepatite: </label>

  <p>
  
    <input name="hepatite" value="1" type="radio" id="hepatite" />
   <label for="hepatite">Sim</label>
  
  
  <input name="hepatite" value="0" type="radio" id="hepatite2" />
  <label for="hepatite2">Não</label>
  
  </p>
      <span class="red-text">
      <?php echo $hepatite_error ?>
    </span>
    </div>
  </div>
  <div class="row">
  
  <div>
  <label for="gravidez">Gravidez: </label>

  <p>
  
    <input name="gravidez" value="1" type="radio" id="gravidez" />
   <label for="gravidez">Sim</label>
  
  
  <input name="gravidez" value="0" type="radio" id="gravidez2" />
  <label for="gravidez2">Não</label>
  
  </p>
      <span class="red-text">
      <?php echo $gravidez_error ?>
    </span>
    </div>
  </div>
  <div class="row">
  
  <div>
  <label for="diabetes">Diabetes: </label>

  <p>
  
    <input name="diabetes" value="1" type="radio" id="diabetes" />
   <label for="diabetes">Sim</label>
  
  
  <input name="diabetes" value="0" type="radio" id="diabetes2" />
  <label for="diabetes2">Não</label>
  
  </p>
      <span class="red-text">
      <?php echo $diabetes_error ?>
    </span>
    </div>
  </div>
  <div class="fixed-action-btn horizontal">
    <button class="btn-floating btn-large #ff1744 red accent-3" type="submit">
      <i class="large material-icons">save</i>
    </button>
  </div>
</form>