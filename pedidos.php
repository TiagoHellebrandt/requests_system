<?php
    require_once 'DAO/access.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once './templates/base-head.php'; ?>
    <title>Pedidos - Requests System</title>
</head>
<body>
    <nav>
        <div class="nav-wrapper blue">
            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <a href="./" class="brand-logo center">Requests System</a>
            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <li class="active"><a href="pedidos.php"><i class="material-icons left">assignment</i>Pedidos</a></li>
                <li><a href="produtos.php"><i class="material-icons left">shop</i>Produtos</a></li>
                <li><a href="clientes.php"><i class="material-icons left">group</i>Clientes</a></li>
            </ul>
        </div>
    </nav>
    <ul id="slide-out" class="sidenav">
        <li><div class="user-view"><h4>Requests System</h4></div></li>
        <li class="active"><a href="pedidos.php"><i class="material-icons left">assignment</i>Pedidos</a></li>
        <li><a href="produtos.php"><i class="material-icons left">shop</i>Produtos</a></li>
        <li><a href="clientes.php"><i class="material-icons left">group</i>Clientes</a></li>
    </ul>
    
    <main>
        <div class="container">
        <?php require_once 'templates/search.php' ?>
        <table class="highlight responsive-table">
            <thead>
                <th>ID</th>
                <th>Data</th>
                <th>Total de itens</th>
                <th>Total do pedido</th>
                <th>Cliente</th>
                <th>Situação</th>
            </thead>

            <tbody>
                <?php
                    if (!isset($_GET['search'])) {
                        $registros = $objects->selectAllJoin("Pedidos", "Clientes", "cliente");
                    } else {
                        $registros = $objects->searchJoin("Pedidos", "Clientes", "cliente", $_GET['search']);
                    }
                    foreach ($registros as $registro):
                ?>
                
                <tr>
                    <td><a href="pedido.php?id=<?php echo $registro->id1; ?>"><?php echo $registro->id1; ?></a></td>
                    <td><?php echo $registro->data; ?></td>
                    <td><?php echo $registro->data; ?></td>
                    <td><?php echo $registro->data; ?></td>
                    <td><?php echo $registro->nome; ?></td>
                    <td><?php echo $registro->status; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        </div>
    </main>

    <div class="fixed-action-btn">
        <a class="btn-floating btn-large blue waves-effect" href="pedido.php">
            <i class="large material-icons">add</i>
        </a>
    </div>

    <?php include_once './templates/footer.php' ?>
</body>
</html>