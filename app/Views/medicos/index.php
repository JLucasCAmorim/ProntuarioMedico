<?php $title = 'Listagem'; ?>
<?php if ((!empty ($_SESSION['mensagem']))): ?>
<div class="card-panel teal lighten-2 white-text"><?php echo  $_SESSION['mensagem']; unset($_SESSION['mensagem']); ?></div>
<?php endif; ?>
<div class="fixed-action-btn horizontal">

<a class="btn-floating btn-large #ff1744 red accent-3" href="/add/medico"><i class="large material-icons ">add</i></a>

 </div>
<?php if (count($medicos) > 0): ?>

  <div class="section"></div>
  <div class="row">
  <?php foreach ($medicos as $medico): ?>
         <div class="col s12 m6">
           <div class="card medium ">
             <div class=" col s12 center">
             <img src="public/images/medico.png" alt="default" class="circle responsive-img valign profile-image-login" style="height:150px; weight: 150px;">
             </div>
                <div class="card-content black-text">
                  <p>Nome: <?php echo $medico['nomeCompleto']; ?></p>
                  <p>CRM: <?php echo $medico['crm']; ?><span class="secondary-content black-text"> RG: <?php echo $medico['rg']; ?></span></p>
                  <p>Email: <?php echo $medico['email']; ?>  </p>
                  <p>Celular: <?php echo $medico['celular']; ?>  </p>
                  <p>Data de Nascimento: <?php echo $medico['datanascimento']; ?> </p>
                </div>
                <div class="card-action">
                  <center>
                  <a class="btn btn-primary btn-sm red" href="/edit/medico/<?php echo $medico['idmedico']; ?>/<?php echo $medico['idcidade']; ?>/<?php echo $medico['idestado']; ?>/<?php echo $medico['idesp']; ?>"><i class="small material-icons">edit</i></a>
                  <a class="btn btn-primary btn-sm red" href="/remove/medico/<?php echo $medico['idmedico']; ?>" onclick="return confirm('Tem certeza de que deseja remover?');"><i class="small material-icons">delete</i></a>
                </center>
                </div>
              </div>
            </div>


  <?php endforeach; ?>
    </div>

<?php else: ?>


<div class="container">
<div class="section"></div>
<div class="section"></div>
<div class="section"></div>
<div class="section">
<center>
 <h5 class="red-text">Nenhum médico cadastrado</h5>
</center>
</div>

</div>



<?php endif; ?>
