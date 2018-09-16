<?php
require_once "DAO/access.php";

class Pedidos {

    function getPedido($id) {
        global $objects;
        return $objects->get("Pedidos", $id); // Retorna um pedidos
    }

    function getItens($id) {
        global $objects;
        return $objects->getRelations("Itens", "pedido", $id);
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

    function setItens($pedido, $itens) {
        global $objects;
        $itens_antigos = $this->getItens($pedido);
        
        foreach($itens_antigos as $item) {
            $objects->delete("Itens", $item->id);
        }
        foreach($itens as $item) {
            $objects->insert(
                "Itens",
                ["pedido", "produto", "quantidade"],
                [
                    ["value" => $pedido, "type" => "int"],
                    ["value" => $item, "type" => "int"],
                    ["value" => 1, "type" => "int"]
                ]
            );
        }
    }

    function delete($id) {
        global $objects;
        // Deleta um pedido
        return $objects->delete("Pedidos", $id);
    }

}