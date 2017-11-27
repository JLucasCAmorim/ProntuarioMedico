<?php if ((!empty ($_SESSION['mensagem']))): ?>
<div class="card-panel teal lighten-2 white-text"><?php echo  $_SESSION['mensagem']; unset($_SESSION['mensagem']); ?></div>
<?php endif; ?>
<?php if (count($users) > 0): ?>

  <div class="section"></div>
  <div class="row">
  <?php foreach ($users as $user): ?>
         <div class="col s12 m6">
           <div class="card medium ">
             <div class=" col s12 center">
             <img src="public/images/user.png" alt="default" class="circle responsive-img valign profile-image-login" style="height:150px; weight: 150px;">
             </div>
                <div class="card-content black-text">
                  <p>Nome: <?php echo $user['nome']; ?></p>
                  <p>Email: <?php echo $user['email']; ?></p>
                  <p>Permissão: <?php echo $user['role']; ?> </p>
                </div>
                <div class="card-action">
                 
                  <a class="btn btn-primary right btn-sm red" href="/remove/user/<?php echo $user['id']; ?>" onclick="return confirm('Tem certeza de que deseja remover?');"><i class="small material-icons">delete</i></a>
               
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
 <h5 class="red-text">Nenhum usuário cadastrado</h5>
</center>
</div>

</div>



<?php endif; ?>
