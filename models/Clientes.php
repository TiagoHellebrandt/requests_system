<?php
require_once "../DAO/access.php";

class Clientes {

    function __construc() {

    }

    function getClientes() {

    }

    function setCliente($nome, $telefone, $email, $nasc, $genero) {
        global $objects;
        // Insere um cliente no banco de dados
        $objects->insert(
                "Clientes", 
                ["nome", "telefone", "email", "nascimento", "genero"], 
                [
                    ["value" => $nome, "type" => "str"],
                    ["value" => $telefone, "type" => "str"],
                    ["value" => $email, "type" => "str"],
                    ["value" => $nasc, "type" => "str"],
                    ["value" => $genero, "type" => "str"]
                ]
            );
    }
}