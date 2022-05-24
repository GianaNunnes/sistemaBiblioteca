<?php
require('../assets/db/conectar.php');
$sql = 'SELECT * FROM acervo WHERE id = :id';
$livro = execute($sql, $_GET)->fetch();
if (!$livro) {
    echo ('livro inexistente');
    exit();
}
$tituloPagina = "Sebum Digital - ${livro['titulo']}";
$paginaAtual = 'acervo';
include('../assets/includes/head.php');
$livros = execute('SELECT * FROM acervo', [])->fetchAll();
?>

<body>
    <?php include('../assets/includes/cabecalho.php') ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <img src="/assets/img/capa livros/<?= $livro['imagem'] ?>" alt="Capa <?= $livro['titulo'] ?>" class="img-fluid">
            </div>
            <div class="col-md-3">
                <p><strong>Título:</strong> <?= $livro['titulo'] ?></p>
                <p><strong>Autor:</strong> <?= $livro['autor'] ?></p>
                <p><strong>Descrição:</strong> <?= $livro['descricao'] ?></p>
                <p><strong>ISBN:</strong> <?= $livro['isbn'] ?></p>
                <p><strong>Categoria:</strong> <?= $livro['categoria'] ?></p>
                <p><strong>Edição:</strong> <?= $livro['edicao'] ?></p>
                <p><strong>Quantidade:</strong> <?= $livro['quantidade'] ?></p>
                <p><strong>Disponíveis:</strong> <?= $livro['disponiveis'] ?></p>
                <a href="#" class="btn btn-marrom btn mt-md-5" onclick="history.back()">&larr; Voltar</a>
            </div>
        </div>
    </div>

    <?php include('../assets/includes/footer.php') ?>
</body>

</html>