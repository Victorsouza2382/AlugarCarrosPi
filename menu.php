<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="js/ajax.js"></script>
    <title>Alugar Carros</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Alugar Carros</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" onclick="requisitarPagina('paginas/receber_carro.php')">Receber Carro</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Funcionarios
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#" onclick="requisitarPagina('paginas/todos_funcionarios.php')">Todos
                        os Funcionario</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" onclick="requisitarPagina('paginas/cadastrar_funcionario.php')">Cadastrar
                        Um Funcionario</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Reserva
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#" onclick="requisitarPagina('paginas/todos_reservados.php')">Carros
                        Reservados</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" onclick="requisitarPagina('paginas/reservar_carro.php')">Reservar
                        Um Carro</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" onclick="requisitarPagina('paginas/deletar_reservado.php')">Deletar
                        Carro Reservado</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Alugar
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#" onclick="requisitarPagina('paginas/todos_alugados.php')">Carros
                        Alugados</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" onclick="requisitarPagina('paginas/alugar_carro.php')">Alugar Um
                        Carro</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Carros
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#" onclick="requisitarPagina('paginas/todos_carros.php')">Todos os
                        Carros</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" onclick="requisitarPagina('paginas/cadastrar_carro.php')">Cadastrar
                        um Carro</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" onclick="requisitarPagina('paginas/deletar_carro.php')">Deletar
                        Carro</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Usuarios
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#" onclick="requisitarPagina('paginas/todos_usuarios.php')">LIstar
                        Usuarios</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" onclick="requisitarPagina('paginas/cadastrar_usuario.php')">Cadastrar
                        Usuario</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<div class="container mt-5">

    <div class="row">
        <div class="col-md-1"></div>

        <div class="col-md-10" id="conteudo"></div>

        <div class="col-md-1"></div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>