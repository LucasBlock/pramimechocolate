<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

		<link rel="shortcut icon" href="{{ asset('images/favicon_1.ico') }}">
        <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
        <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <title>Titulo</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	</head>

	<body>

        <nav class="navbar sticky-top navbar-light bg-light">
            <a class="navbar-brand" href="/">Página Inicial</a>
            <a class="navbar-brand" href="{{route('pedidos')}}">Pedidos</a>
            <a class="navbar-brand" href="{{route('produtos')}}">Produtos</a>
            <a class="navbar-brand" href="{{route('categorias')}}">Categorias</a>
            <a class="navbar-brand" href="{{route('clientes')}}">Clientes</a>
        </nav>
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container">
                    @include('flash-messages')
                    <!-- Page Content -->
                    @yield('content')

                </div> <!-- container -->

            </div> <!-- content -->
            <footer class="footer text-right">
                    Gegeu 2020
            </footer>
        </div>
	</body>
</html>

<style>
    .content {
        margin-top: 10px;
    }
</style>