<?php

// Classe que contem todas as queries SQL e o acesso ao banco de dados.
class Manager {

    private $db;

    function __construct() {
        $host = "localhost"; // Host
        $user = "Tiago"; // Usuário do banco
        $pass = ""; // Senha do usuário
        // Inicializa o objeto de acesso ao banco de dados
        $this->db = PDO(
            "mysql:host=$host;dbname=requests_system;charset=UTF-8", 
            $user, 
            $pass
        );
    }

    /*
    ** Executa uma query que insere dados no banco.
    ** Parâmetros:
    **      $table -> nome da tabela
    **      $fields -> array com os nomes dos campos
    **      $values -> array de arrays nomeados contendo os valores dos campos e seus tipos
    **          Chaves dos sub-arrays:
    **                - type (tipo do valor [int ou str])
    **                - value (valor)
    **
    **/
    public static function insert($table, $fields, $values) {
        // Cria a string para a query
        $q = "INSERT INTO $table ("; // String da query
        for ($i=0;$i<count($fields);$i++) {
            $q .= $fields[$i].",";
        }
        $q = substr($q, 0, -1);
        $q .= ") VALUES (";
        for ($i=0;$i<count($values);$i++) {
            $q .= ":value$i,";
        }
        $q = substr($q, 0, -1);
        $q .= ");";

        try {
            // Cria a query
            $query = $this->db->prepare($q);
            // Define os valores dos campos
            for ($i=0;$i<count($values);$i++) {
                // Define o tipo do valor do campo
                if ($values[$i]["type"] == "int") {
                    $type = PDO::PARAM_INT;
                } else {
                    $type = PDO::PARAM_STR;
                }
                $query->bindValue(":value$i", $values[$i]["value"], $type);
            }
            $query->execute(); // Executa a query
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}