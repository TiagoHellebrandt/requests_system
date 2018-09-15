<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include_once 'templates/base-head.php' ?>
    <title>Requests System</title>
</head>
<body>
    <nav>
        <div class="nav-wrapper blue">
            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <a href="#" class="brand-logo center">Requests System</a>
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
            <div class="row">
                <div class="col s12">
                    <div class="card horizontal">
                        <div class="card-image">
                            <img src="statics/img/banner.png">
                        </div>
                        <div class="card-stacked">
                            <div class="card-content">
                                <h3>Sistema de pedidos.</h3>
                                <p>I am a very simple card. I am good at containing small bits of information.</p>
                            </div>
                            <div class="card-action">
                                <a class="waves-effect waves-light btn-large blue" href="https://github.com/TiagoHellebrandtSilva/requests_system" target="_blank"><i class="icon ion-logo-github left"></i>Github</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s12 m4">
                    <div class="card horizontal">
                        <div class="card-stacked">
                            <div class="card-content">
                                <h5>Pedidos</h5>
                                <h3>0</h3>
                            </div>
                            <div class="card-action">
                                <a href="pedidos.php">Mais</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col s12 m4">
                    <div class="card horizontal">
                        <div class="card-stacked">
                            <div class="card-content">
                                <h5>Produtos</h5>
                                <h3>0</h3>
                            </div>
                            <div class="card-action">
                                <a href="produtos.php">Mais</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col s12 m4">
                    <div class="card horizontal">
                        <div class="card-stacked">
                            <div class="card-content">
                                <h5>Clientes</h5>
                                <h3>0</h3>
                            </div>
                            <div class="card-action">
                                <a href="clientes.php">Mais</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include_once './templates/footer.php' ?>
</body>
</html>