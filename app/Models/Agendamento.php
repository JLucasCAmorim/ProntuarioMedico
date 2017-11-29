<?php
namespace App\Models;
use App\DB;
class Agendamento {
   /** * Busca usuários * * Se o ID não for passado, busca todos. Caso contrário, filtra pelo ID especificado. */
   public static function selectAll() {


    
    $sql = sprintf("SELECT agendamento.id, agendamento.data, agendamento.hora, agendamento.idclient, agendamento.idmedico, clients.nome, medicos.nomeCompleto FROM  agendamento  
     INNER JOIN clients ON agendamento.idclient = clients.idclient
     INNER JOIN medicos ON agendamento.idmedico = medicos.idmedico ORDER BY id DESC ");
     $DB = new DB; $stmt = $DB->prepare($sql);
        if (!empty($where))
        {
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
            
        }
    
        $stmt->execute();

        $agendamentos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
      

        return $agendamentos;
    }
    public static function selectId($id) {
       
    
        
        $sql = sprintf("SELECT agendamento.id, agendamento.data, agendamento.hora, agendamento.idclient, agendamento.idmedico, clients.nome, medicos.nomeCompleto FROM  agendamento  
         INNER JOIN clients ON agendamento.idclient = clients.idclient
         INNER JOIN medicos ON agendamento.idmedico = medicos.idmedico WHERE agendamento.id = '$id'  ORDER BY id DESC ");
         $DB = new DB; $stmt = $DB->prepare($sql);
            if (!empty($where))
            {
                $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
                
            }
        
            $stmt->execute();
    
            $agendamentos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
          
    
            return $agendamentos;
        }
    public static function selectDate($id = null) {
        $email = $_SESSION['login'];
        $where = ''; if (!empty($id)) { $where = 'WHERE agendamento.id = :id'; }
    
        $data = date('d/m/Y');   
         $sql = sprintf("SELECT agendamento.id, agendamento.data, agendamento.hora, agendamento.idclient, agendamento.idmedico, clients.nome, medicos.nomeCompleto FROM  agendamento 
         INNER JOIN clients ON agendamento.idclient = clients.idclient
         INNER JOIN medicos ON agendamento.idmedico = medicos.idmedico AND '$email' = medicos.email AND agendamento.data = '$data' ORDER BY id DESC ", $where);
        $DB = new DB; $stmt = $DB->prepare($sql);
    
            if (!empty($where))
            {
                $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
                
            }
        
            $stmt->execute();
    
            $agendamentos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
          
    
            return $agendamentos;
        }
    
    public static function select($id = null) {
    $email = $_SESSION['login'];
    $where = ''; if (!empty($id)) { $where = 'WHERE agendamento.id = :id'; }

    $data = date('d/m/Y');   
   
     $sql = sprintf("SELECT agendamento.id, agendamento.data, agendamento.hora, agendamento.idclient, agendamento.idmedico, clients.nome, medicos.nomeCompleto, atendimentos.agendamento_id FROM  agendamento 
     INNER JOIN clients ON agendamento.idclient = clients.idclient
     INNER JOIN medicos ON agendamento.idmedico = medicos.idmedico 
     LEFT OUTER JOIN atendimentos ON agendamento.id = atendimentos.agendamento_id AND medicos.email = '$email' WHERE agendamento.data = '$data' ORDER BY id DESC ");
    $DB = new DB; $stmt = $DB->prepare($sql);

        if (!empty($where))
        {
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
            
        }
    
        $stmt->execute();

        $agendamentos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
    
        if (count($agendamentos) == 0){
            
            $agendamentos = 0;
          
            return $agendamentos;

        }

        return $agendamentos;
    }

    public static function selectUser($id = null) {
        $email = $_SESSION['login'];
     
      
         $sql = sprintf("SELECT agendamento.id, agendamento.data, agendamento.hora, agendamento.idclient, agendamento.idmedico, clients.nome, medicos.nomeCompleto, atendimentos.agendamento_id FROM  agendamento 
         INNER JOIN clients ON agendamento.idclient = clients.idclient
         INNER JOIN medicos ON agendamento.idmedico = medicos.idmedico
         LEFT OUTER JOIN atendimentos ON agendamento.id = atendimentos.agendamento_id AND  medicos.email = '$email'  ORDER BY agendamento.data DESC ");
        $DB = new DB; $stmt = $DB->prepare($sql);
    
           
        
            $stmt->execute();
    
            $agendamentos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
           
          
        
            return $agendamentos;
        }

    /**
     * Salva no banco de dados um novo usuário
     */
    public static function save( $id, $data, $hora, $idclient, $idmedico)
    {
        // validação (bem simples, só pra evitar dados vazios)
      

        // a data vem no formato dd/mm/YYYY
        // então precisamos converter para YYYY-mm-dd


        // insere no banco
        $DB = new DB;
        $sql = "INSERT INTO agendamento
        (data, hora, idclient, idmedico)
         VALUES(:data, :hora, :idclient, :idmedico)";
          $stmt = $DB->prepare($sql);
          $stmt->bindParam(':data', $data);
          $stmt->bindParam(':hora', $hora);
          $stmt->bindParam(':idclient', $idclient);
          $stmt->bindParam(':idmedico', $idmedico);


        if ($stmt->execute())
        {
            return true;
        }
        else
        {
            echo "Erro ao cadastrar";
            print_r($stmt->errorInfo());
            return false;
        }
    }



    /**
     * Altera no banco de dados um usuário
     */
    public static function update($id, $data, $hora, $idclient, $idmedico)
    {

        // validação (bem simples, só pra evitar dados vazios)
   
        
        // a data vem no formato dd/mm/YYYY
        // então precisamos converter para YYYY-mm-dd


        // insere no banco
        $DB = new DB;
        $sql = "UPDATE agendamento SET data = :data,hora = :hora ,idclient = :idclient, idmedico = :idmedico WHERE id = :id";
        $stmt = $DB->prepare($sql);
         $stmt->bindParam(':data', $data);
          $stmt->bindParam(':hora', $hora);
          $stmt->bindParam(':idclient', $idclient);
          $stmt->bindParam(':idmedico', $idmedico);
         $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        if ($stmt->execute())
        {
            return true;
        }
        else
        {
            echo "Erro ao cadastrar";
            print_r($stmt->errorInfo());
            return false;
        }
    }


    public static function remove($id)
    {
        // valida o ID
        if (empty($id))
        {
            echo "ID não informado";
            exit;
        }

        // remove do banco
        $DB = new DB;
        $sql = "DELETE FROM agendamento WHERE id = :id";
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);

        if ($stmt->execute())
        {
            return true;
        }
        else
        {
            echo "Erro ao remover";
            print_r($stmt->errorInfo());
            return false;
        }
    }
}
