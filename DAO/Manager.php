<?php

// Classe que contem todas as queries SQL e o acesso ao banco de dados.
class Manager {

    private $db;

    function __construct() {
        $host = "localhost"; // Host
        $user = "Tiago"; // Usuário do banco
        $pass = ""; // Senha do usuário
        // Inicializa o objeto de acesso ao banco de dados
        $this->db = new PDO(
            "mysql:host=$host;dbname=requests_system", 
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
    public function insert($table, $fields, $values) {
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

    /*
    ** Executa uma query que atualiza um registro no banco de dados.
    ** Parâmetros:
    **      $table -> nome da tabela
    **      $id -> id do registro
    **      $fields -> array com os nomes dos campos
    **      $values -> array de arrays nomeados contendo os valores dos campos e seus tipos
    **          Chaves dos sub-arrays:
    **                - type (tipo do valor [int ou str])
    **                - value (valor)
    **
    **/
    function update($table, $id, $fields, $values) {
        // Cria a string para a query
        $q = "UPDATE $table SET "; // String da query
        for ($i=0;$i<count($fields);$i++) {
            $q .= $fields[$i]."=:value$i,";
        }
        $q = substr($q, 0, -1);
        $q .= " WHERE id=:id;";

        try {
            // Cria a query
            $query = $this->db->prepare($q);
            $query->bindValue(":id", $id, PDO::PARAM_INT); // Define o id
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


    /*
    ** Retorna todas as colunas de uma tabela.
    **
    */
    function getColumns($table) {
        try {
            // Cria a query
            $query = $this->db->prepare("SHOW columns FROM $table;");
            $query->execute(); // Executa a query
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            $names = [];
            for ($i=0;$i<count($result);$i++) {
                $names[] = $result[$i]->Field;
            }
            return $names; // Retorna os nomes das colunas
        } catch (PDOException $e) {
            return false;
        }
    }

    /*
    ** Retorna todos os registro de uma tabela
    **
    */
    function selectAll($table) {
        try {
            // Cria a query
            $query = $this->db->prepare("SELECT * FROM $table;");
            $query->execute(); // Executa a query
            return $query->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            return false;
        }
    }

    /*
    ** Retorna todos os registro de uma tabela com join
    **
    */
    function selectAllJoin($table, $table2, $field) {
        try {
            // Cria a query
            $query = $this->db->prepare("SELECT *, NULL AS id, $table.id AS id1, $table2.id AS id2 FROM $table INNER JOIN $table2 ON $table.$field=$table2.id;");
            $query->execute(); // Executa a query
            return $query->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            return false;
        }
    }

    /*
    ** Retorna uma linha de uma tabela
    **
    */
    function get($table, $id) {
        try {
            // Cria a query
            $query = $this->db->prepare("SELECT * FROM $table WHERE id=:id;");
            $query->bindValue(":id", $id, PDO::PARAM_INT);
            $query->execute(); // Executa a query
            return $query->fetchAll(PDO::FETCH_OBJ)[0];
        } catch (PDOException $e) {
            return false;
        }
    }

    /*
    ** Retorna uma linha de uma tabela com join
    **
    */
    function getJoin($table, $table2, $field, $id) {
        try {
            // Cria a query
            $query = $this->db->prepare("SELECT *, NULL AS id, $table.id AS id1, $table2.id AS id2 FROM $table WHERE id=:id INNER JOIN $table2 ON $table.$field=$table2.id;");
            $query->bindValue(":id", $id, PDO::PARAM_INT);
            $query->execute(); // Executa a query
            return $query->fetchAll(PDO::FETCH_OBJ)[0];
        } catch (PDOException $e) {
            return false;
        }
    }

    function search($table, $search) {
        $q = "SELECT * FROM $table WHERE ";
        $columns = $this->getColumns($table);
        for ($i=0;$i<count($columns);$i++) {
            $q .= $columns[$i]." LIKE CONCAT('%', :value$i, '%') or ";
        }
        $q = substr($q, 0, -4);
        $q .= ";";
        try {
            $query = $this->db->prepare($q);
            for ($i=0;$i<count($columns);$i++) {
                $query->bindValue(":value$i", $search, PDO::PARAM_STR);
            }
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOExcepetion $e) {
            return false;
        }
    }

    function getNumRegistros($table) {
        try {
            // Cria a query
            $query = $this->db->prepare("SELECT count(*) FROM $table;");
            $query->execute(); // Executa a query
            return $query->fetchAll(PDO::FETCH_ASSOC)[0]["count(*)"];
        } catch (PDOException $e) {
            return false;
        }
    }

    function delete($table, $id) {
        try {
            // Cria a query
            $query = $this->db->prepare("DELETE FROM $table WHERE id=:id;");
            $query->bindValue(":id", $id, PDO::PARAM_INT);
            $query->execute(); // Executa a query
            return $query->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            return false;
        }
    }
}