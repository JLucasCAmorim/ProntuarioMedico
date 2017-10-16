<?php
namespace App\Models;
use App\DB;

class Especialidade {
   /** * Busca usuários * * Se o ID não for passado, busca todos. Caso contrário, filtra pelo ID especificado. */
   public static function selectAll($id = null) {
     $where = ''; if (!empty($id)) { $where = 'WHERE id = :id'; }
     $sql = sprintf("SELECT id, nome FROM especialidades %s ORDER BY nome ASC", $where);
     $DB = new DB; $stmt = $DB->prepare($sql);

        if (!empty($where))
        {
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        }

        $stmt->execute();

        $especialidades = $stmt->fetchAll(\PDO::FETCH_ASSOC);


        return $especialidades;
    }
    
}
