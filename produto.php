<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once './templates/base-head.php'; ?>
    <title>Produto - Requests System</title>
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
                require_once 'models/Produtos.php';
                $produtos = new Produtos();
                $id = null;
                $descricao = '';
                $valor = '';
                if (isset($_POST["remove"]) && isset($_GET["id"])) {
                    $produtos->delete($_GET["id"]);
                    header("location: produtos.php"); // redireciona para pagina dos produtos
                } else if (isset($_POST['descricao']) 
                        && isset($_POST['valor'])) {
                    $descricao = trim($_POST['descricao']); // Nome
                    $valor = trim($_POST['valor']); // valor
                    if (isset($_POST['id'])) {
                        $id = $_POST['id'];
                        $produtos->updateProduto($id, $descricao, $valor);
                    } else {
                        $produtos->setProduto($descricao, $valor);
                    }
                    header("location: produtos.php"); // redireciona para pagina dos produtos
                } else if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $produto = $produtos->getProduto($_GET['id']);
                    $descricao = $produto->descricao;
                    $valor = $produto->valor;
                }
            ?>
            <h2>Produto</h2>
            <div class="row">
                <form class="col s12" method="post" id="form_save">
                    <?php if (isset($_GET['id'])): ?>
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <?php endif; ?>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">description</i>
                            <input id="name" type="text" class="validate" name="descricao" value="<?php echo $descricao; ?>">
                            <label for="name">Descrição</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">attach_money</i>
                            <input id="valor" type="text" class="validate" name="valor" value="<?php echo $valor; ?>">
                            <label for="valor">Valor</label>
                        </div>
                    </div>
                    <button class="waves-effect waves-light btn-large blue" id="btn_save"><i class="material-icons left">save</i>Salvar</button>
                </form>
                <?php if (isset($_GET['id'])): ?>
                    <form method="post" id="form_remove">
                        <input type="hidden" value="true" name="remove" />
                        <button class="waves-effect waves-light btn-large red" id="btn_remove"><i class="material-icons left">delete</i>Apagar</button>
                    </form>
                <?php endif; ?>
                
            </div>

        </div>
    </main>

    <?php include_once './templates/footer.php' ?>
</body>
</html>