<?php
$tituloPagina = "Sebum Digital - Admin";
$paginaAtual = 'admin';
$paginaAdmin = true;
include('../../assets/includes/head.php');
require('../../assets/db/conectar.php');
$sql = 'SELECT * FROM acervo';
$livros = execute($sql, [])->fetchAll();
?>

<body>
    <?php include('../../assets/includes/cabecalho.php') ?>
    <div class="container mt-5">
        <div class="text-end"><a href="/admin/livros/cadastro/" class="btn btn-marrom">Cadastrar Livro</a></div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Título</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Edição</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">ISBN</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Disponíveis</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($livros as $livro){ 
                    if (strlen($livro['descricao']) < 30){
                        $resumo = $livro['descricao'];
                    } else {
                        $resumo = substr($livro['descricao'], 0, 30) . '...';
                    }
                    ?>
                    <tr>
                    <th scope="row"><?= $livro['id'] ?></th>
                    <td><?= $livro['titulo'] ?></td>
                    <td><?= $livro['autor'] ?></td>
                    <td><?= $livro['categoria'] ?></td>
                    <td><?= $livro['edicao'] ?></td>
                    <td><?= $resumo ?></td>
                    <td><?= $livro['isbn'] ?></td>
                    <td><?= $livro['quantidade'] ?></td>
                    <td><?= $livro['disponiveis'] ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php include('../../assets/includes/footer.php') ?>
</body>

</html>