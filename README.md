

# Catálogo de Recetas en Laravel

Este proyecto es la evaluación práctica de Desarrollo Web con Laravel. Consiste en una aplicación web tipo catálogo que permite visualizar, filtrar y registrar nuevas recetas de cocina de forma temporal mediante el uso de sesiones y colecciones.

---
## 1. Servidor Activo

<img width="1908" height="958" alt="image" src="https://github.com/user-attachments/assets/acbd33ad-2355-4e38-820c-a5c9255a7cea" />


---

## 2. Árbol de Directorios del Proyecto

```text
Evaluacion1Laravel/
├── app/
│   └── Http/
│       └── Controllers/
│           └── RecetaController.php   
├── routes/
│   └── web.php                         
├── resources/
│   └── views/
│       ├── components/
│       │   └── recipe-card.blade.php   
│       ├── layouts/
│       │   └── app.blade.php           
│       └── recetas/
│           ├── index.blade.php         
│           ├── show.blade.php          
│           └── create.blade.php
```
---

## 3.Instalación y Ejecución 

# 1. Clonar el repositorio
git clone [https://github.com/Rafitaps/Evaluacion1Laravel.git]

# 2. Entrar a la carpeta del proyecto
cd Evaluacion1Laravel

# 3. Instalar dependencias de PHP
composer install
<img width="946" height="56" alt="image" src="https://github.com/user-attachments/assets/aaca870b-c0ac-43bc-ab16-60499db2c999" />

# 4. Copiar el archivo de entorno
cp .env.example .env

# 5. Generar la clave de la aplicación
php artisan key:generate

# 6. Iniciar el servidor local
php artisan serve
<img width="914" height="215" alt="image" src="https://github.com/user-attachments/assets/7de857f8-85ca-456d-bd1f-42d4fd1c67a9" />

## 4. Desarrollo y Explicación de Conceptos

-- ¿Qué es un Controlador? --
Es una clase que actúa como intermediario entre las rutas, los datos y las vistas. Contiene la lógica de negocio.

-- Uso de Colecciones y Filtrado: --
En Laravel, las colecciones son una envoltura para los arrays de PHP. Permiten manipular datos encadenando métodos como filter() o where() de forma limpia, sin usar bucles foreach tradicionales en el backend.

--Fragmento de Receta.Controller.php:--

public function index(Request $request)
{
    // Convertimos el array normal a una Colección de Laravel
    $recetas = collect($this->recetas);

    // Filtrado condicional usando colecciones
    if ($request->filled('search')) {
        $searchTerm = strtolower($request->search);
        // Usamos el método filter() de la colección
        $recetas = $recetas->filter(function ($receta) use ($searchTerm) {
            return str_contains(strtolower($receta['name']), $searchTerm);
        });
    }

    if ($request->filled('difficulty')) {
        // Usamos el método where() para búsquedas exactas
        $recetas = $recetas->where('difficulty', $request->difficulty);
    }

    return view('recetas.index', compact('recetas'));
}

-- ¿Cómo actúan los parámetros de ruta? --
Los parámetros de ruta permiten capturar segmentos dinámicos de la URL. En nuestra ruta Route::get('/receta/{id}', ...), el {id} es el parámetro. Laravel lo extrae de la URL (ej: /receta/3) y se lo pasa automáticamente como argumento a la función show($id) del controlador.

-- Diferencia entre @extends y @component: --

@extends('layouts.app'): Se usa para heredar la estructura de una página "madre" (Layout). Define el cascarón de la página y deja "huecos" (@yield) para que las vistas hijas inyecten su contenido.

@component o @include: Se usa para incrustar un trozo pequeño de código (un componente reutilizable) dentro de una vista más grande.

-- Ejemplo de herencia: --
@extends('layouts.app') @section('content')
    @endsection

-- Uso de @foreach vs @forelse: --

@foreach: Itera sobre una lista o array. 

@forelse: Es una mejora de Laravel. Hace lo mismo que @foreach, pero incluye la cláusula @empty, que permite definir un diseño alternativo en caso de que la colección no tenga datos.

-- Ejemplo: --
<div class="grid">
    @forelse($recetas as $receta)
        @include('components.recipe-card', ['recipe' => $receta])
    @empty
        <div class="mensaje-vacio">
            <p>No hay resultados que coincidan con tus filtros.</p>
        </div>
    @endforelse
</div>

-- Subir proyecto a Github --
<img width="922" height="229" alt="image" src="https://github.com/user-attachments/assets/3944e4ce-254e-40fb-8cf0-3066d1bb6927" />
<img width="942" height="234" alt="image" src="https://github.com/user-attachments/assets/2cb0f666-b837-4aea-a8e3-d95bc523a979" />
