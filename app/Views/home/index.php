<?php if ((!empty ($_SESSION['mensagem']))): ?>
<div class="card-panel teal lighten-2 white-text"><?php echo  $_SESSION['mensagem']; unset($_SESSION['mensagem']); ?></div>
<?php endif; ?>
<?php if (count($agendamentos) > 0): ?>

  <div class="section"></div>
  <div class="row">
  <?php foreach ($agendamentos as $agendamento): ?>
         <div class="col s12 m6">
           <div class="card medium ">
             <div class=" col s12 center">
             <img src="public/images/clock.png" alt="default" class="circle responsive-img valign profile-image-login" style="height:150px; weight: 150px;">
             </div>
                <div class="card-content black-text">
                  <p>Data: <?php echo $agendamento['data']; ?></p>
                  <p>Hora: <?php echo $agendamento['hora']; ?></p>
                  <p>Paciente: <?php echo $agendamento['nome']; ?>  </p>
                  <p>Médico: <?php echo $agendamento['nomeCompleto']; ?>  </p>
                </div>
<<<<<<< HEAD
                <div class="card-action">
                 
                  <a class="btn btn-primary right btn-sm red" href="/add/atendimento/<?php echo $agendamento['id']; ?>">Atender</a>
                  
               
                </div>
=======
               
>>>>>>> d6e730b15053ac0e10bfb44c9d73c91981ec1eed
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
<<<<<<< HEAD
 <h5 class="red-text">Nenhum agendamento cadastrado para hoje</h5>
=======
 <h5 class="red-text">Nenhum agendamento cadastrado</h5>
>>>>>>> d6e730b15053ac0e10bfb44c9d73c91981ec1eed
</center>
</div>

</div>



<?php endif; ?>
