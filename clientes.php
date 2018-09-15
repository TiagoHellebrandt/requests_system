<?php
    require_once 'DAO/access.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once './templates/base-head.php'; ?>
    <title>Clientes - Requests System</title>
</head>
<body>
    <nav>
        <div class="nav-wrapper blue">
            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <a href="./" class="brand-logo center">Requests System</a>
            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <li><a href="pedidos.php"><i class="material-icons left">assignment</i>Pedidos</a></li>
                <li><a href="produtos.php"><i class="material-icons left">shop</i>Produtos</a></li>
                <li class="active"><a href="clientes.php"><i class="material-icons left">group</i>Clientes</a></li>
            </ul>
        </div>
    </nav>
    <ul id="slide-out" class="sidenav">
        <li><div class="user-view"><h4>Requests System</h4></div></li>
        <li><a href="pedidos.php"><i class="material-icons left">assignment</i>Pedidos</a></li>
        <li><a href="produtos.php"><i class="material-icons left">shop</i>Produtos</a></li>
        <li class="active"><a href="clientes.php"><i class="material-icons left">group</i>Clientes</a></li>
    </ul>
    
    <main>
        <div class="container">
        <table class="highlight responsive-table">
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>E-mail</th>
                <th>Data de nascimento</th>
                <th>Gênero</th>
            </thead>

            <tbody>
                <?php
                    $registros = $objects->selectAll("Clientes");
                    foreach ($registros as $registro):
                ?>
                
                <tr>
                    <td><a href="cliente.php?id=<?php echo $registro->id; ?>"><?php echo $registro->id; ?></a></td>
                    <td><?php echo $registro->nome; ?></td>
                    <td><?php echo $registro->telefone; ?></td>
                    <td><?php echo $registro->email; ?></td>
                    <td><?php echo $registro->nascimento; ?></td>
                    <td><?php echo $registro->genero; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        </div>
    </main>

    <div class="fixed-action-btn">
        <a class="btn-floating btn-large blue waves-effect" href="cliente.php">
            <i class="large material-icons">add</i>
        </a>
    </div>

    <?php include_once './templates/footer.php' ?>
</body>
</html>