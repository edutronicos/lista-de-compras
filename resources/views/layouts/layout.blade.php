<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css')}}" rel="stylesheet">
    @livewireStyles
</head>
<body>
    <div class="container mt-2 text-center  col-sm-4">

        <header>
            <div class="card text-center">
                <div class="card-header">
                    Adicione itens a sua lista de compras
                </div>
            </div>
        </header>

        <section>
            @yield('content')
        </section>

        @livewireScripts
        
        <footer>
            <div class="card text-center">
                <div class="card-header">
                    Edutronicos
                </div>
            </div> 
        </footer>

    </div>

    <script src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js')}}"></script>

</body>
</html>