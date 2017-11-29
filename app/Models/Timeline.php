<?php
namespace App\Models;
use App\DB;
class Timeline {
   /** * Busca usuários * * Se o ID não for passado, busca todos. Caso contrário, filtra pelo ID especificado. */
   public static function selectAll($id) {

     $sql = sprintf("SELECT agendamento.id, agendamento.data, agendamento.hora, agendamento.idclient, agendamento.idmedico, clients.nome, clients.cpf, clients.datanascimento, medicos.nomeCompleto, atendimentos.queixa, atendimentos.historico, evolucao.evolucao, hipoteses.hipotese, hipoteses.observacoes, prescricao.prescricao FROM  agendamento  
     INNER JOIN clients ON agendamento.idclient = clients.idclient
     INNER JOIN atendimentos ON agendamento.id = atendimentos.agendamento_id
     INNER JOIN evolucao ON agendamento.id = evolucao.agendamento_id
     INNER JOIN hipoteses ON agendamento.id = hipoteses.agendamento_id
     INNER JOIN prescricao ON agendamento.id = prescricao.agendamento_id
     INNER JOIN medicos ON agendamento.idmedico = medicos.idmedico WHERE agendamento.id = '$id' ORDER BY id");
     $DB = new DB; $stmt = $DB->prepare($sql);
    
        $stmt->execute();

        $agendamentos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
      

        return $agendamentos;
    }

  
}
