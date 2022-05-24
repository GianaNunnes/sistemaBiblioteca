<?php
$tituloPagina = "Sebum Digital - Admin";
$paginaAtual = 'admin';
$paginaAdmin = true;
include('../../assets/includes/head.php');
require('../../assets/db/conectar.php');
$sql = 'SELECT * FROM usuarios';
$usuarios = execute($sql, [])->fetchAll();
?>

<body>
    <?php include('../../assets/includes/cabecalho.php') ?>
    <div class="container mt-5">
        <div class="text-end"><a href="/admin/usuarios/cadastro/" class="btn btn-marrom">Cadastrar Usuário</a></div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Email</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Admin</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario) { ?>
                    <tr>
                        <th scope="row"><?= $usuario['id'] ?></th>
                        <td><?= $usuario['email'] ?></td>
                        <td><?= $usuario['nome'] ?></td>
                        <td><?= ($usuario['professor'] ? 'SIM' : 'NÃO') ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php include('../../assets/includes/footer.php') ?>
</body>

</html>