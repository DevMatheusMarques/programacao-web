<nav class="navbar navbar-expand-lg border border-info-subtle bg-info-subtle">
    <div class="container-fluid">
        <a class="navbar-brand me-5" href="#">Projeto Composer</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active bg-info-hover" aria-current="page" href="/categoria">Categorias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/produto">Produtos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/fornecedor">Fornecedores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/cliente">Clientes</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Opções
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../categoria/inserir">Cadastrar Categoria</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="../produto/inserir">Cadastrar Produto</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="../fornecedor/inserir">Cadastrar Fornecedor</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="../cliente/inserir">Cadastrar Cliente</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex" role="search" action="/search" method="get">
                <input class="form-control me-2" type="search" name="query" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>