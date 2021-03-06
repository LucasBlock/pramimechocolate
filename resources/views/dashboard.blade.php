<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/all.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/js/bootstrap.min.js')}}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome/js/all.min.js')}}">

    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
        <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('plugins/fontawesome/js/all.min.js')}}"></script>
        <script
			  src="https://code.jquery.com/jquery-3.5.1.min.js"
			  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
			  crossorigin="anonymous"></script>
    <title>Pra Mim É Chocolate</title>
</head>
<body>
    <div class="flex-dashboard">
        <sidebar>
            <div class="sidebar-title">
                <img src="{{ asset('/images/pramimechocolate-logo.png')}}" alt="">
                <h2>Pra Mim É Chocolate</h2>
            </div>
            <div class="menu">
                <ul>
                    <li>
                        <i class="fas fa-home"></i>
                        <a href="/dashboard">Dashboard</a>
                    </li>
                    <li>
                        <a href="{{route('pedidos')}}">Pedidos</a>
                    </li>
                    <li>
                        <a href="{{route('produtos')}}">Produtos</a>
                    </li>
                    <li>
                        <a href="{{route('categorias')}}">Categorias</a>
                    </li>
                    <li>
                        <a href="{{route('clientes')}}">Clientes</a>
                    </li>
                </ul>
            </div>
        </sidebar>
        <main>
            <header>
                <a href="/"> <i class="fas fa-home"></i> Dashboard</a>
                <a href="/logout"> <i class="fas fa-sign-out-alt"></i> Sair</a>
            </header>
            <div class="main-content">
                <div class="panel">
                    <div class="container">
                        @include('flash-messages')
                        <!-- Page Content -->
                        @yield('content')

                    </div> <!-- container -->
                </div>

            </div>
        </main>
    </div>
</body>
</html>
