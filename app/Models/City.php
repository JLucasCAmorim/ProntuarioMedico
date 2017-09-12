<?php
namespace App\Models;
use App\DB;
class City {
   /** * Busca usuários * * Se o ID não for passado, busca todos. Caso contrário, filtra pelo ID especificado. */
   public static function selectAll($estado = null) {
     $where = ''; if (!empty($estado)) { $where = 'WHERE estado = :estado'; }
     $sql = sprintf("SELECT id, nome, estado FROM cidade %s ORDER BY nome ASC", $where);
     $DB = new DB; $stmt = $DB->prepare($sql);

        if (!empty($where))
        {
            $stmt->bindParam(':estado', $estado, \PDO::PARAM_INT);
        }
        
        $stmt->execute();

        $cidades = $stmt->fetchAll(\PDO::FETCH_ASSOC);


        return $cidades;
    }

}
