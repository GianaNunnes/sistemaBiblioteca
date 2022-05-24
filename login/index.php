<?php
if (isset($_POST['email']) && isset($_POST['senha'])){
    session_start();
    $mensagem = '';
    require('../assets/db/conectar.php');
    $sql = 'SELECT * FROM usuarios WHERE email = :email';
    $usuarioAtual = execute($sql, ['email' => $_POST['email']])->fetch();
    if ($usuarioAtual && password_verify($_POST['senha'], $usuarioAtual['senha'])){
        $_SESSION['usuarioAtual'] = $usuarioAtual;
        header('Location: /');
    } else {
        $mensagem = 'Email ou senha incorretos';
    }
}
$paginaAtual = 'login';
$tituloPagina = "Sebum Digital - Login";
include('../assets/includes/head.php');


?>



<body class="bg-verde">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="/assets/img/logos/logo_sem_fundo.png" alt="Sebum Digital" class="img-fluid w-50 mx-auto d-block">
                <form action="" method="post">
                    <div class="my-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>

                    <div class="my-2">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha">
                    </div>

                    <div class="text-center my-2"><input type="submit" class="btn btn-lg btn-warning" value="Login"></div>
                </form>
            </div>
        </div>
    </div>


    <?php include('../assets/includes/footer.php') ?>

    <script>
        <?php if ($mensagem) {?>
            alert('<?= $mensagem ?>');
        <?php }?>
    </script>
</body>

</html>