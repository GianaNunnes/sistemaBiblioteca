<?php
$tituloPagina = "Sebum Digital";
$paginaAtual = 'admin';
$paginaAdmin = true;
include('../assets/includes/head.php');
require('../assets/db/conectar.php');

?>

<body>
    <?php include('../assets/includes/cabecalho.php') ?>


    <div class="container">
        <div class="row justify-content-around mt-5 text-center">
            <div class="col">
                <a href="/admin/usuarios" class="btn btn-marrom">Listar Usuários</a>
            </div>
            <div class="col">
                <a href="/admin/usuarios/adicionar" class="btn btn-marrom">Adicionar Usuário</a>
            </div>
            <div class="col">
                <a href="/admin/cadastro-livro" class="btn btn-marrom">Cadastrar Livro</a>
            </div>
        </div>
    </div>


    <?php include('../assets/includes/footer.php') ?>
</body>

</html>