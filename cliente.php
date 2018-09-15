<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once './templates/base-head.php'; ?>
    <title>Pedidos - Requests System</title>
    <script>
        $(document).ready(function(){
            $('.datepicker').datepicker({
                format: "yyyy-mm-dd"
            });
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
                require_once 'models/Clientes.php';
                $clientes = new Clientes();
                $id = null;
                $nome = '';
                $telefone = '';
                $email = '';
                $nascimento = '';
                $genero = '';

                if (isset($_POST['nome']) 
                        && isset($_POST['telefone']) 
                        && isset($_POST['email'])
                        && isset($_POST['nascimento']) 
                        && isset($_POST['genero'])) {
                    $nome = trim($_POST['nome']); // Nome
                    $telefone = trim($_POST['telefone']); // Telefone
                    $email = trim($_POST['email']); // E-mail
                    $nascimento = trim($_POST['nascimento']); // Data de nascimento
                    $genero = trim($_POST['genero']); // Gênero
                    if (isset($_POST['id'])) {
                        $id = $_POST['id'];
                        $clientes->updateCliente($id, $nome, $telefone, $email, $nascimento, $genero);
                    } else {
                        $clientes->setCliente($nome, $telefone, $email, $nascimento, $genero);
                    }
                    header("location: clientes.php"); // redireciona para pagina dos clientes
                } else if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $cliente = $clientes->getCliente($_GET['id']);
                    $nome = $cliente->nome;
                    $telefone = $cliente->telefone;
                    $email = $cliente->email;
                    $nascimento = $cliente->nascimento;
                    $genero = $cliente->genero;
                }
            ?>
            <h2>Cliente</h2>
            <div class="row">
                <form class="col s12" method="post">
                    <?php if (isset($_GET['id'])): ?>
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <?php endif; ?>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">people</i>
                            <input id="name" type="text" class="validate" name="nome" value="<?php echo $nome; ?>">
                            <label for="name">Nome</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">phone</i>
                            <input id="phone" type="text" class="validate" name="telefone" value="<?php echo $telefone; ?>">
                            <label for="phone">Telefone</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">mail</i>
                            <input id="email" type="email" class="validate" name="email" value="<?php echo $email; ?>">
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">event_note</i>
                            <input type="text" id="nasc" class="datepicker" name='nascimento' value="<?php echo $nascimento; ?>">
                            <label for="nasc">Data de nascimento</label>
                        </div>
                    </div>
                    <div class="row">
                        <label>Gênero:</label>
                        <label>
                            <input name="genero" class="with-gap" type="radio" value="m" <?php if ($genero != "f"): ?>checked<?php endif; ?> />
                            <span>Masculino</span>
                        </label>
                        <label>
                            <input name="genero" class="with-gap" type="radio" value="f" <?php if ($genero == "f"): ?>checked<?php endif; ?> />
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