<?php
$mensagem = '';
$paginaAtual = 'admin';
$paginaAdmin = true;
$tituloPagina = "Sebum Digital - Admin";
include('../../../assets/includes/head.php');
require('../../../assets/db/conectar.php');
if (isset($_POST['titulo'])) {
    $sucesso = true;
    $_POST['disponiveis'] = $_POST['quantidade'];
    if (isset($_FILES)) {
        $imagem = $_FILES['imagem'];
        if ($imagem['size'] > 5 * 1024 * 1024) {
            $mensagem = "Tamanho do arquivo acima do limite de de 5MB";
            $sucesso = false;
        } else if ($imagem['type'] != 'image/jpeg' && $imagem['type'] != 'image/png') {
            $mensagem = "Formato de arquivo inválido, somente é aceito JPG ou PNG";
            $sucesso = false;
        } else {
            $enderecoNovo = __ROOT__ . "/assets/img/capa livros/";
            $novaImagem =  time() . $imagem['name'];

            if (!move_uploaded_file($imagem['tmp_name'], $enderecoNovo . $novaImagem)) {
                $mensagem = 'Erro ao carregar a imagem, por favor tente novamente';
                $sucesso = false;
            } else {
                $_POST['imagem'] = $novaImagem;
            }
        }
    }

    if ($sucesso) {
        $sql = 'INSERT INTO acervo (';
        $sqlValues = '';
        $primeiro = true;
        foreach ($_POST as $campo => $dado) {
            $sql .= ($primeiro ? '' : ', ') . "$campo";
            $sqlValues .= ($primeiro ? '' : ', ') . ":$campo";
            $primeiro = false;
        }
        $sql .= ") VALUES (${sqlValues});";
        $stmt = execute($sql, $_POST);

        $mensagem = 'Livro Cadastrado';
    }
}

?>

<body>
    <?php include('../../../assets/includes/cabecalho.php') ?>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row mt-5">
                <div class="col">
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" id="titulo" name="titulo" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="autor" class="form-label">Autor</label>
                        <input type="text" id="autor" name="autor" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="categoria" class="form-label">Categoria</label>
                        <input type="text" id="categoria" name="categoria" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descrição</label>
                        <textarea name="descricao" id="descricao" rows="5" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="isbn" class="form-label">ISBN</label>
                        <input type="text" id="isbn" name="isbn" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="quantidade" class="form-label">Quantidade</label>
                        <input type="number" id="quantidade" name="quantidade" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="edicao" class="form-label">Edição</label>
                        <input type="text" id="edicao" name="edicao" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="imagem" class="form-label">Imagem de capa</label>
                        <input type="file" id="imagem" name="imagem" class="form-control">
                    </div>
                </div>
            </div>
            <input type="submit" value="Cadastrar" class="btn btn-marrom btn-lg d-block mx-auto">
        </form>
    </div>





    <?php include('../../../assets/includes/footer.php') ?>

    <script>
        <?php if ($mensagem) { ?>
            alert('<?= $mensagem ?>')
        <?php } ?>
    </script>
</body>

</html>