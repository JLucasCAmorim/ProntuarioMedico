<div class="container">
    <div class="timeline">
      <div class="timeline-event">
      <div class="card timeline-content">
          <div class="card-image waves-effect waves-block waves-light">
            <img  style="height:150px; weight: 100px;" src="/public/images/pacientes.png">
          </div>
          <div class="card-content">
            <span class="card-title activator grey-text text-darken-4">Paciente</span>
            <p style="text-align: justify;">Nome: <?php echo $agendamento['nome']; ?><br/>
            DN: <?php echo $agendamento['datanascimento']; ?><br/>
            CPF: <?php echo $agendamento['cpf']; ?>
          </p>
          </div>
        </div>
        <div class="timeline-badge red white-text"><i class="material-icons">person</i></div>    
      </div>
      <div class="timeline-event">
        <div class="card timeline-content">
          <div class="card-image waves-effect waves-block waves-light">
            <img class="activator"  style="height:150px; weight: 100px;" src="/public/images/atendimento.png">
          </div>
          <div class="card-content">
            <span class="card-title activator grey-text text-darken-4">Atendimento</span>
            <p style="text-align: justify;">Queixa: <?php echo $agendamento['queixa']; ?><br/>
            Histórico: <?php echo $agendamento['historico']; ?>
            </p>
          </div>
        </div>
        <div class="timeline-badge red white-text"><i class="material-icons">perm_contact_calendar</i></div>
      </div>
      <div class="timeline-event">
        <div class="card timeline-content">
          <div class="card-image waves-effect waves-block waves-light">
            <img style="height:200px; weight: 150px;"  src="/public/images/hipotese.png">
          </div>
          <div class="card-content">
            <span class="card-title activator grey-text text-darken-4">Hipótese</span>
            <p style="text-align: justify;"><?php echo $agendamento['hipotese']; ?><br/>
            Observação: <?php echo $agendamento['observacoes']; ?>
            </p>
          </div>
        </div>
        <div class="timeline-badge red white-text"><i class="material-icons">help</i></div>
      </div>
      <div class="timeline-event">
        <div class="card timeline-content">
          <div class="card-image waves-effect waves-block waves-light">
            <img style="height:150px; weight: 150px;"  src="/public/images/prescricao.png">
          </div>
          <div class="card-content">
            <span class="card-title activator grey-text text-darken-4">Prescrição</span>
            <p style="text-align: justify;"><?php echo $agendamento['prescricao']; ?>
            </p>
          </div>
        </div>
        <div class="timeline-badge red white-text"><i class="material-icons">border_color</i></div>
      </div>
      <div class="timeline-event">
        <div class="card timeline-content">
          <div class="card-image waves-effect waves-block waves-light">
            <img style="height:150px; weight: 150px;"  src="/public/images/evolucao.png">
          </div>
          <div class="card-content">
            <span class="card-title activator grey-text text-darken-4">Evolução</span>
            <p style="text-align: justify;"><?php echo $agendamento['evolucao']; ?>
            </p>
          </div>
        </div>
        <div class="timeline-badge red white-text"><i class="material-icons">assessment</i></div>
      </div>
    </div>
  </div>