<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once './templates/base-head.php'; ?>
    <title>Pedidos - Requests System</title>
    <script>
        $(document).ready(function(){
            $('.datepicker').datepicker();
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

            ?>
            <h2>Cliente</h2>
            <div class="row">
                <form class="col s12" method="post">
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">people</i>
                            <input id="name" type="text" class="validate" name="nome">
                            <label for="name">Nome</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">phone</i>
                            <input id="phone" type="text" class="validate" name="telefone">
                            <label for="phone">Telefone</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">mail</i>
                            <input id="email" type="email" class="validate" name="email">
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">event_note</i>
                            <input type="text" id="nasc" class="datepicker">
                            <label for="nasc">Data de nascimento</label>
                        </div>
                    </div>
                    <div class="row">
                        <label>Gênero:</label>
                        <label>
                            <input name="genero" class="with-gap" type="radio" value="m" checked />
                            <span>Masculino</span>
                        </label>
                        <label>
                            <input name="genero" class="with-gap" type="radio" value="f" />
                            <span>Feminino</span>
                        </label>
                    </div>
                    <button class="waves-effect waves-light btn-large blue"><i class="material-icons left">save</i>Salvar</button>
                </form>
            </div>

        </div>
    </main>

    <?php include_once './templates/footer.php' ?>
</body>
</html>