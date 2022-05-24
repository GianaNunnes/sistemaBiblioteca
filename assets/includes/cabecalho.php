<?php (isset($paginaAtual) ?: $paginaAtual = false) ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-verde mango">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand col-4 col-sm-3 col-md-1" href="/"><img src="/assets/img/logos/logo.png" alt="" class="img-fluid"></a>
        <h6 class="mb-0 me-5 text-white">Olá, <?= explode(' ', $_SESSION['usuarioAtual']['nome'])[0] ?></h6>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link <?= ($paginaAtual == 'acervo' ? 'active' : '') ?>" href="/">Acervo</a>
                </li>
                <li>
                    <h4 class="mb-0 mt-1 text-white d-none d-lg-block">|</h4>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($paginaAtual == 'minhaLista' ? 'active' : '') ?>" href="/minha-lista">Minha Lista</a>
                </li>
                <?php if ($_SESSION['usuarioAtual']['professor']) { ?>
                    <li>
                        <h4 class="mb-0 mt-1 text-white d-none d-lg-block">|</h4>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link <?= ($paginaAtual == 'emprestimos' ? 'active' : '') ?>" href="/emprestimos">Empréstimos</a>
                    </li> 
                    <li>
                        <h4 class="mb-0 mt-1 text-white d-none d-lg-block">|</h4>
                    </li> -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?= ($paginaAtual == 'admin' ? 'active' : '') ?>" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Admin
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/admin/livros">Livros</a></li>
                            <li><a class="dropdown-item" href="/admin/usuarios">Usuários</a></li>
                            <li><a class="dropdown-item" href="/admin/emprestimos">Empréstimos</a></li>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Procurar" aria-label="Procurar">
                <button class="btn btn-marrom" type="submit">Procurar</button>
            </form>
        </div>
    </div>
</nav>