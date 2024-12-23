<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Студенты и группы')</title>
    <!-- Подключение Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ url('/') }}">Главная</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('groups.index') }}">Список групп</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('groups.create') }}">Создать группу</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('students.index') }}">Список студентов</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-4">
        @yield('content')
    </div>
    <footer class="text-center mt-4">
        <p>&copy; {{ date('Y') }}. Все права защищены.</p>
    </footer>
    <!-- Подключение скриптов -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
