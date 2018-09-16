<?php
require_once "DAO/access.php";

class Pedidos {

    function getPedido($id) {
        global $objects;
        return $objects->get("Pedidos", $id); // Retorna um pedidos
    }

    function updatePedido($id, $data, $status, $cliente) {
        global $objects;
        // Atualiza um pedido no banco de dados
        return $objects->update(
                "Pedidos",
                $id,
                ["data", "status", "cliente"], 
                [
                    ["value" => $data, "type" => "str"],
                    ["value" => $status, "type" => "str"],
                    ["value" => $cliente, "type" => "int"]
                ]
            );
    }

    function setPedido($data, $status, $cliente) {
        global $objects;
        // Insere um pedido no banco de dados
        return $objects->insert(
                "Pedidos", 
                ["data", "status", "cliente"], 
                [
                    ["value" => $data, "type" => "str"],
                    ["value" => $status, "type" => "str"],
                    ["value" => $cliente, "type" => "int"]
                ]
            );
    }

    function delete($id) {
        global $objects;
        // Deleta um pedido
        return $objects->delete("Pedidos", $id);
    }

}