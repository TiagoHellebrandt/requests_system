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

            <?php include 'templates/list.php' ?>

        </div>
    </main>

    <?php include_once './templates/footer.php' ?>
</body>
</html>