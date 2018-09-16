<?php
require_once "DAO/access.php";

class Produtos {

    function getProduto($id) {
        global $objects;
        return $objects->get("Produtos", $id); // Retorna um produto
    }

    function updateProduto($id, $descricao, $valor) {
        global $objects;
        // Atualiza um produto no banco de dados
        return $objects->update(
                "Produtos",
                $id,
                ["descricao", "valor"], 
                [
                    ["value" => $descricao, "type" => "str"],
                    ["value" => $valor, "type" => "str"]
                ]
            );
    }

    function setProduto($descricao, $valor) {
        global $objects;
        // Insere um produto no banco de dados
        return $objects->insert(
                "Produtos", 
                ["descricao", "valor"], 
                [
                    ["value" => $descricao, "type" => "str"],
                    ["value" => $valor, "type" => "str"]
                ]
            );
    }

    function delete($id) {
        global $objects;
        // Deleta um produto
        return $objects->delete("Produtos", $id);
    }
}