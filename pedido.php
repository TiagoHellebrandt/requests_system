<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once './templates/base-head.php'; ?>
    <title>Pedido - Requests System</title>
    <script>
        $(document).ready(function(){
            $('.datepicker').datepicker({
                format: "yyyy-mm-dd"
            });
            $('select').formSelect();
        });
    </script>
</head>
<body>
    <nav>
        <div class="nav-wrapper blue">
            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <a href="./" class="brand-logo center">Requests System</a>
            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <li><a href="pedidos.php"><i class="material-icons left">assignment</i>Pedidos</a></li>
                <li><a href="produtos.php"><i class="material-icons left">shop</i>Produtos</a></li>
                <li><a href="clientes.php"><i class="material-icons left">group</i>Clientes</a></li>
            </ul>
        </div>
    </nav>
    <ul id="slide-out" class="sidenav">
        <li><div class="user-view"><h4>Requests System</h4></div></li>
        <li><a href="pedidos.php"><i class="material-icons left">assignment</i>Pedidos</a></li>
        <li><a href="produtos.php"><i class="material-icons left">shop</i>Produtos</a></li>
        <li><a href="clientes.php"><i class="material-icons left">group</i>Clientes</a></li>
    </ul>
    
    <main>
        <div class="container">

            <?php
                // Verifica se os dados foram submetidos
                require_once 'models/Pedidos.php';
                require_once 'DAO/access.php';
                $pedidos = new Pedidos();
                $id = null;
                $data_pedido = '';
                $status = '';
                $cliente = '';
                if (isset($_POST["remove"]) && isset($_GET["id"])) {
                    $pedidos->delete($_GET["id"]);
                    header("location: pedidos.php"); // redireciona para pagina dos pedidos
                } else if (isset($_POST['data_pedido']) 
                        && isset($_POST['status'])
                        && isset($_POST["cliente"])) {
                    $data_pedido = trim($_POST['data_pedido']); // Nome
                    $status = trim($_POST['status']); // status
                    $cliente = trim($_POST['cliente']); // cliente
                    if (isset($_POST['id'])) {
                        $id = $_POST['id'];
                        $pedidos->updatePedido($id, $data_pedido, $status, $cliente);
                    } else {
                        $pedidos->setPedido($data_pedido, $status, $cliente);
                    }
                    header("location: pedidos.php"); // redireciona para pagina dos pedidos
                } else if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $pedidos = $pedidos->getPedido($_GET['id']);
                    $data_pedido = $pedidos->data;
                    $status = $pedidos->status;
                    $cliente = $pedidos->cliente;
                }
            ?>
            <h2>Pedido</h2>
            <div class="row">
                <form class="col s12" method="post">
                    <?php if (isset($_GET['id'])): ?>
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <?php endif; ?>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">event_note</i>
                            <input type="text" id="data_pedido" class="datepicker" name='data_pedido' value="<?php echo $data_pedido; ?>">
                            <label for="data_pedido">Data do pedido</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">description</i>
                            <input id="status" type="text" class="validate" name="status" value="<?php echo $status; ?>">
                            <label for="status">Situação</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <?php
                                $clientes = $objects->selectAll("Clientes");
                            ?>
                            <select name="cliente">
                                <option value="" disabled <?php if (!isset($_GET["id"])): ?>selected<?php endif; ?>>Escolha um cliente</option>
                                <?php for ($i=0;$i<count($clientes);$i++):?>
                                <option value="<?php echo $clientes[$i]->id; ?>" <?php if($clientes[$i]->id == $cliente): ?>selected<?php endif; ?>><?php echo $clientes[$i]->nome; ?></option>
                                <?php endfor; ?>
                            </select>
                            <label>Cliente</label>
                        </div>
                    </div>
                    <button class="waves-effect waves-light btn-large blue"><i class="material-icons left">save</i>Salvar</button>
                </form>
                <?php if (isset($_GET['id'])): ?>
                    <form method="post">
                        <input type="hidden" value="true" name="remove" />
                        <button class="waves-effect waves-light btn-large red"><i class="material-icons left">delete</i>Apagar</button>
                    </form>
                <?php endif; ?>
                
            </div>

        </div>
    </main>

    <?php include_once './templates/footer.php' ?>
</body>
</html>