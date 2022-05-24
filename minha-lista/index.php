<?php
$tituloPagina = "Sebum Digital";
$paginaAtual = 'minhaLista';
include('../assets/includes/head.php');
require('../assets/db/conectar.php');
$lista = json_decode($_SESSION['usuarioAtual']['lista']);
if ($lista) {
    $sql = 'SELECT * FROM acervo WHERE ';
    $primeiro = true;
    foreach ($lista as $livro) {
        $sql .= ($primeiro ? '' : ' OR ') . 'id = ' . $livro;
        $primeiro = false;
    }

    $lista = execute($sql, [])->fetchAll();
}
?>

<body>
    <?php include('../assets/includes/cabecalho.php') ?>
    <div class="container my-3">
        <hr class="my-3">
        <div class="row row-cols-2 row-cols-md-3 row-cols-xxl-4 gy-3 cards-clarinhos">
            <?php foreach ($lista as $livro) { 
                $pertenceLista = true;
                ?>
                <div class="col">
                    <div class="card h-100">
                        <div class="row g-0 align-items-center">
                            <div class="col-md-4">
                                <img src="/assets/img/capa livros/<?= $livro['imagem'] ?>" class="img-fluid" alt="Capa <?= $livro['titulo'] ?>">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $livro['titulo'] ?></h5>
                                    <p class="card-text mb-0">Autor: <?= $livro['autor'] ?></p>
                                    <p class="card-text mb-0">Categoria: <?= $livro['categoria'] ?></p>
                                    <?php if ($livro['disponiveis']) { ?>
                                        <p class="card-text text-success">Disponível</p>
                                    <?php } else { ?>
                                        <p class="card-text text-danger">Indisponível</p>
                                    <?php } ?>
                                    <div class="row justify-content-around">
                                        <div class="col">
                                            <a href="/livro/?id=<?= $livro['id'] ?>" class="btn btn-marrom">Detalhes</a>
                                        </div>
                                        <div class="col-3">
                                            <btn class="btn btn-<?= ($pertenceLista ? 'danger' : 'success') ?> text-white rounded p-2" onclick="return false"><i class="bi bi-heart<?= ($pertenceLista ? 'break' : '') ?>-fill"></i></btn>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <?php include('../assets/includes/footer.php') ?>
</body>

</html>