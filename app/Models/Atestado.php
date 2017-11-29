<?php
namespace App\Models;
use App\DB;
class Atestado {
   /** * Busca usuários * * Se o ID não for passado, busca todos. Caso contrário, filtra pelo ID especificado. */
   public static function selectAll($id = null) {
     $where = ''; if (!empty($id)) { $where = 'WHERE id = :id'; }
     $sql = sprintf("SELECT id, texto,agendamento_id FROM atestado ORDER BY id ASC", $where);
     $DB = new DB; $stmt = $DB->prepare($sql);

        if (!empty($where))
        {
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        }

        $stmt->execute();

        $atestados = $stmt->fetchAll(\PDO::FETCH_ASSOC);


        return $atestados;
    }
   
    /*
    Salva no banco de dados um novo usuário
     */
    public static function save($texto,$agendamento_id)
    {
        // validação (bem simples, só pra evitar dados vazios)
        
        // então precisamos converter para YYYY-mm-dd
       

        // insere no banco
        $DB = new DB;
        $sql = "INSERT INTO atestado
        (texto,agendamento_id)
         VALUES(:texto, :agendamento_id)";
          $stmt = $DB->prepare($sql);
          $stmt->bindParam(':texto', $texto);
          $stmt->bindParam(':agendamento_id', $agendamento_id);
         
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



    /*
     Altera no banco de dados um usuário
     */
    public static function upload($id, $queixa, $p_renal, $p_articular, $p_cardiaco, $p_respiratorio, $p_gastrico, $p_cicatrizar, $alergias, $hepatite, $gravidez, $diabetes, $medicamentos, $agendamento_id)
    {

        // validação (bem simples, só pra evitar dados vazios)
     

        // a data vem no formato dd/mm/YYYY
        // então precisamos converter para YYYY-mm-dd


        // insere no banco
        $DB = new DB;
        $sql = "UPDATE atendimentos SET queixa = :queixa,p_renal = :p_renal ,p_articular = :p_articular, p_cardiaco = :p_cardiaco, p_respiratorio = :p_respiratorio, p_gastrico = :p_gastrico, p_cicatrizar = :p_cicatrizar, alergias = :alergias, hepatite = :hepatite, gravidez = :gravidez, diabetes = :diabetes,
        medicamentos = :medicamentos, agendamento_id = :agendamento_id WHERE id = :id";
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':queixa', $queixa);
        $stmt->bindParam(':p_renal', $p_renal);
        $stmt->bindParam(':p_articular', $p_articular);
        $stmt->bindParam(':p_cardiaco', $p_cardiaco);
        $stmt->bindParam(':p_respiratorio', $p_respiratorio);
        $stmt->bindParam(':p_gastrico', $p_gastrico);
        $stmt->bindParam(':p_cicatrizar', $p_cicatrizar);
        $stmt->bindParam(':alergias', $alergias);
        $stmt->bindParam(':hepatite', $hepatite);
        $stmt->bindParam(':gravidez', $gravidez);
        $stmt->bindParam(':diabetes', $diabetes);
        $stmt->bindParam(':medicamentos', $medicamentos);
        $stmt->bindParam(':agendamento_id', $agendamento_id);
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
        $sql = "DELETE FROM atendimentos WHERE id = :id";
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
