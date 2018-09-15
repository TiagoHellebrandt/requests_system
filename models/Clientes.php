<?php
require_once "DAO/access.php";

class Clientes {

    function __construc() {

    }

    function getClientes() {

    }

    function getCliente($id) {
        global $objects;
        return $objects->get("Clientes", $id); // Retorna um cliente
    }

    function updateCliente($id, $nome, $telefone, $email, $nasc, $genero) {
        global $objects;
        // Atualiza um cliente no banco de dados
        return $objects->update(
                "Clientes",
                $id,
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

    function setCliente($nome, $telefone, $email, $nasc, $genero) {
        global $objects;
        // Insere um cliente no banco de dados
        return $objects->insert(
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

    function search($table, $search) {
        global $objects;
    }
}