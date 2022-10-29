<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield("title")Biblia OnLine</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/styles.min.css">
    <link rel="stylesheet" href="/css/custom.css">
</head>

<body>
<nav class="navbar navbar-dark navbar-expand-md bg-dark py-3">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <span
                class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon">
                <i class="fa fa-book"></i>
            </span>
            <span>Minha bíblia</span>
        </a>
        <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-5">
            <span class="visually-hidden">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navcol-5">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="{{route("home")}}">Home</a></li>
                {{--                <li class="nav-item"><a class="nav-link active" href="{{ route("rota_teste", ["ZYX"]) }}">Home</a></li>--}}
                @if(Auth::check())
                <li class="nav-item"><a class="nav-link" href="{{route("listar_favoritos")}}">Favoritos</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Minhas anotações</a></li>
                @endif
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">Testamentos</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route("livros_biblia", "antigo-testamento") }}">Antigo Testamentos</a>
                        <a class="dropdown-item" href="{{ route("livros_biblia", "novo-testamento") }}">Novo Testamentos</a>
                        <a class="dropdown-item" href="{{ route("livros_biblia") }}">Todos Testamentos</a>
                    </div>
                </li>
                @unless(Auth::check())
                <li class="nav-item"><a class="nav-link" href="{{ route("registrar") }}">Cadastre-se</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route("login") }}">Login</a></li>
                @endunless
                @if(Auth::check())
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                        Olá {{Auth::user()->nome}}
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route("sair")}}">Sair</a>
                    </div>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<div class="container py-4 py-xl-5">
    @yield("content")
</div>
<footer>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="/js/scripts.js" type="text/javascript"></script>

</body>

</html>
