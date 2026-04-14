<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recetario Web - @yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        :root { --main: #e67e22; --dark: #1a1a1b; --bg: #fdfdfd; }
        body { font-family: 'Inter', sans-serif; background: var(--bg); margin: 0; color: #333; }
        
        /* Nav Estilo Películas */
        nav { background: var(--dark); padding: 15px 5%; display: flex; justify-content: space-between; align-items: center; position: sticky; top: 0; z-index: 100; }
        .logo { color: var(--main); font-weight: 800; font-size: 24px; text-transform: uppercase; letter-spacing: -1px; }
        .nav-links a { color: white; text-decoration: none; margin-left: 20px; font-weight: 600; font-size: 14px; transition: 0.3s; }
        .nav-links a:hover { color: var(--main); }

        .container { padding: 40px 5%; max-width: 1200px; margin: auto; min-height: 80vh; }
        
        /* Footer */
        footer { background: var(--dark); color: #777; text-align: center; padding: 30px; border-top: 4px solid var(--main); margin-top: 50px; }
        
        /* Botón Estilo "Play" */
        .btn-action { background: var(--main); color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer; text-decoration: none; font-weight: bold; display: inline-block; transition: 0.3s; }
        .btn-action:hover { background: #d35400; transform: scale(1.05); }

        .form-control { padding: 10px; border: 1px solid #ddd; border-radius: 4px; }
    </style>
</head>
<body>
    <nav>
        <div class="logo">RECETARIO WEB</div>
        <div class="nav-links">
            <a href="{{ route('recetas.index') }}">Catálogo</a>
            <a href="{{ route('recetas.index', ['type' => 'Almuerzo']) }}">Almuerzos</a>
            <a href="{{ route('recetas.index', ['type' => 'Postre']) }}">Postres</a>
            <a href="{{ route('recetas.create') }}" class="btn-action">+ Añadir</a>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <footer>
        <p>Recetario Web &copy; 2026 - Por Rafael Aruti</p>
    </footer>
</body>
</html>