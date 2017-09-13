<?php
namespace App\Models;
use App\DB;
class Client {
   /** * Busca usuários * * Se o ID não for passado, busca todos. Caso contrário, filtra pelo ID especificado. */
   public static function selectAll($idclient = null) {
     $where = ''; if (!empty($idclient)) { $where = 'WHERE idclient = :idclient'; }
     $sql = sprintf("SELECT idclient, nomeCompleto, cpf, rg, datanascimento, naturalidade, nacionalidade, email, telefone, celular, idcidade, cep, complemento, nomePai, nomeMae, tipoSangue FROM clients %s ORDER BY nomeCompleto ASC", $where);
     $DB = new DB; $stmt = $DB->prepare($sql);

        if (!empty($where))
        {
            $stmt->bindParam(':idclient', $idclient, \PDO::PARAM_INT);
        }

        $stmt->execute();

        $users = $stmt->fetchAll(\PDO::FETCH_ASSOC);


        return $users;
    }


    /**
     * Salva no banco de dados um novo usuário
     */
    public static function save($nomeCompleto, $cpf, $rg, $datanascimento, $naturalidade, $nacionalidade, $email, $telefone, $celular, $idcidade, $cep, $complemento, $nomePai, $nomeMae, $tipoSangue)
    {
        // validação (bem simples, só pra evitar dados vazios)
        if (empty($nomeCompleto) || empty($cpf) || empty($rg) || empty($datanascimento)|| empty($naturalidade)|| empty($nacionalidade)|| empty($email)|| empty($telefone)|| empty($celular)|| empty($idcidade)|| empty($cep)|| empty($complemento)
         || empty($nomePai)|| empty($nomeMae)|| empty($tipoSangue))
        {

            echo"<script language='javascript' type='text/javascript'>alert('Volte e preencha todos os campos');window.location.href='/add';</script>";
            die();
            return false;
        }

        // a data vem no formato dd/mm/YYYY
        // então precisamos converter para YYYY-mm-dd


        // insere no banco
        $DB = new DB;
        $sql = "INSERT INTO clients
        (nomeCompleto, cpf, rg, datanascimento, naturalidade,
        nacionalidade, email, telefone, celular, idcidade,
         cep, complemento, nomePai, nomeMae, tipoSangue)
         VALUES(:nomeCompleto, :cpf, :rg, :datanascimento, :naturalidade,
           :nacionalidade, :email, :telefone, :celular,
           :idcidade, :cep, :complemento, :nomePai, :nomeMae, :tipoSangue)";
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':nomeCompleto', $nomeCompleto);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':rg', $rg);
        $stmt->bindParam(':datanascimento', $datanascimento);
        $stmt->bindParam(':naturalidade', $naturalidade);
        $stmt->bindParam(':nacionalidade', $nacionalidade);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':celular', $celular);
        $stmt->bindParam(':idcidade', $idcidade);
        $stmt->bindParam(':cep', $cep);
        $stmt->bindParam(':complemento', $complemento);
        $stmt->bindParam(':nomePai', $nomePai);
        $stmt->bindParam(':nomeMae', $nomeMae);
        $stmt->bindParam(':tipoSangue', $tipoSangue);

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
    public static function update($idclient,$nomeCompleto, $cpf, $rg, $datanascimento, $naturalidade, $nacionalidade, $email, $telefone, $celular, $idcidade, $cep, $complemento, $nomePai, $nomeMae, $tipoSangue)
    {
        // validação (bem simples, só pra evitar dados vazios)
        if (empty($nomeCompleto) || empty($cpf) || empty($rg) || empty($datanascimento)|| empty($naturalidade)|| empty($nacionalidade)|| empty($email)|| empty($telefone)|| empty($celular)|| empty($idcidade)|| empty($cep)|| empty($complemento)
         || empty($nomePai)|| empty($nomeMae)|| empty($tipoSangue))  {

             $errMsg = "Algum campo está vazio!";
        }

        // a data vem no formato dd/mm/YYYY
        // então precisamos converter para YYYY-mm-dd


        // insere no banco
        $DB = new DB;
        $sql = "UPDATE clients SET nomeCompleto = :nomeCompleto, cpf = :cpf, rg = :rg, datanascimento = :datanascimento, naturalidade = :naturalidade,
        nacionalidade = :nacionalidade, email = :email, telefone = :telefone, celular = :celular, idcidade = :idcidade,
         cep = :cep, complemento = :complemento, nomePai = :nomePai, nomeMae = : nomeMae, tipoSangue = :tipoSangue WHERE idclient = :idclient";
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':nomeCompleto', $nomeCompleto);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':rg', $rg);
        $stmt->bindParam(':datanascimento', $datanascimento);
        $stmt->bindParam(':naturalidade', $naturalidade);
        $stmt->bindParam(':nacionalidade', $nacionalidade);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':celular', $celular);
        $stmt->bindParam(':idcidade', $idcidade);
        $stmt->bindParam(':cep', $cep);
        $stmt->bindParam(':complemento', $complemento);
        $stmt->bindParam(':nomePai', $nomePai);
        $stmt->bindParam(':nomeMae', $nomeMae);
        $stmt->bindParam(':tipoSangue', $tipoSangue);
        $stmt->bindParam(':idclient', $idclient, \PDO::PARAM_INT);

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


    public static function remove($idclient)
    {
        // valida o ID
        if (empty($idclient))
        {
            echo "ID não informado";
            exit;
        }

        // remove do banco
        $DB = new DB;
        $sql = "DELETE FROM clients WHERE idclient = :idclient";
        $stmt = $DB->prepare($sql);
        $stmt->bindParam(':idclient', $idclient, \PDO::PARAM_INT);

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
