<?php $title = 'Listagem'; ?>
<?php if ((!empty ($_SESSION['mensagem']))): ?>
<div class="card-panel teal lighten-2 white-text"><?php echo  $_SESSION['mensagem']; unset($_SESSION['mensagem']); ?></div>
<?php endif; ?>
<div class="fixed-action-btn horizontal">

<a class="btn-floating btn-large #ff1744 red accent-3" href="/add/agendamento"><i class="large material-icons ">add</i></a>

 </div>
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
                <div class="card-action">
                  <center>
                  <a class="btn btn-primary btn-sm red" href="/editar/agendamento/<?php echo $agendamento['id']; ?>"><i class="small material-icons">edit</i></a>
                  <a class="btn btn-primary btn-sm red" href="/remove/agendamento/<?php echo $agendamento['id']; ?>" onclick="return confirm('Tem certeza de que deseja remover?');"><i class="small material-icons">delete</i></a>
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
 <h5 class="red-text">Nenhum agendamento cadastrado</h5>
</center>
</div>

</div>



<?php endif; ?>
