<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Backend Programming Exam') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        main {
            min-height: 100vh;
        }
    </style>
</head>

<body>
    <header class="bg-dark text-white py-3">
        <nav class="container d-flex justify-content-between align-items-center">
            <h1 class="h5 mb-0">{{ config('app.name', 'Backend Programming Exam') }}</h1>
            <ul class="nav">
                <li class="nav-item">
                    <a href="{{ route('books') }}" class="nav-link text-white">Books</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('authors') }}" class="nav-link text-white">Authors</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('ratings.create') }}" class="nav-link text-white">Give Rates</a>
                </li>
            </ul>
        </nav>
    </header>
    <main class="container mt-4">
        @yield('content')
    </main>
    <footer class="bg-light text-center py-3 mt-4">
        <p class="mb-0">© {{ date('Y') }} {{ config('app.name', 'Backend Programming Exam') }}</p>
    </footer>
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</html>