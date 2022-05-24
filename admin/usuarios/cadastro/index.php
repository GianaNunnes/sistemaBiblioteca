<?php
$mensagem = '';
$paginaAtual = 'admin';
$paginaAdmin = true;
$tituloPagina = "Sebum Digital - Admin";
include('../../../assets/includes/head.php');
require('../../../assets/db/conectar.php');
if (isset($_POST['email'])) {
    $sql = 'SELECT * FROM usuarios WHERE email = :email';
    $usuarioExiste = execute($sql, ['email' => $_POST['email']])->fetch();
    if (!$usuarioExiste) {
        $sql = "INSERT INTO usuarios (email, nome, professor) VALUES (:email, :nome, " . ((isset($_POST['admin']) && $_POST['admin']) ? 'true' : 'false') . ")";
        unset($_POST['admin']);
        $stmt = execute($sql, $_POST);

        $mensagem = 'Usuário Cadastrado';
    } else {
        $mensagem = 'Email já é utilizado';
    }
}

?>

<body>
    <?php include('../../../assets/includes/cabecalho.php') ?>
    <div class="container mt-5">
        <form action="" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" id="nome" name="nome" class="form-control" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" id="admin" name="admin" class="form-check-input" value="true">
                <label for="admin" class="form-check-label">Admin</label>
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