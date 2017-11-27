<?php $title = 'Listagem'; ?>
<?php if ((!empty ($_SESSION['mensagem']))): ?>
<div class="card-panel teal lighten-2 white-text"><?php echo  $_SESSION['mensagem']; unset($_SESSION['mensagem']); ?></div>
<?php endif; ?>
<div class="fixed-action-btn horizontal">

<a class="btn-floating btn-large #ff1744 red accent-3" href="/add"><i class="large material-icons ">add</i></a>

 </div>
<?php if (count($clients) > 0): ?>

  <div class="section"></div>
  <div class="row">
  <?php foreach ($clients as $client): ?>
         <div class="col s12 m6">
           <div class="card medium ">
             <div class=" col s12 center">
             <img src="public/images/pacientes.png" alt="default" class="circle responsive-img valign profile-image-login" style="height:150px; weight: 150px;">
             </div>
                <div class="card-content black-text">
                  <p>Nome: <?php echo $client['nome']; ?></p>
                  <p>CPF: <?php echo $client['cpf']; ?><span class="secondary-content black-text"> RG: <?php echo $client['rg']; ?></span></p>
                  <p>Email: <?php echo $client['email']; ?>  </p>
                  <p>Celular: <?php echo $client['celular']; ?>  </p>
                  <p>Data de Nascimento: <?php echo $client['datanascimento']; ?> </p>
                </div>
                <div class="card-action">
                  <center>
                  <a class="btn btn-primary btn-sm red" href="/edit/<?php echo $client['idclient']; ?>/<?php echo $client['idcidade']; ?>"><i class="small material-icons">edit</i></a>
                  <a class="btn btn-primary btn-sm red" href="/remove/<?php echo $client['idclient']; ?>" onclick="return confirm('Tem certeza de que deseja remover?');"><i class="small material-icons">delete</i></a>
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
 <h5 class="red-text">Nenhum paciente cadastrado</h5>
</center>
</div>


<?php endif; ?>
