@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <div style="display: flex; flex-direction: column; gap: 20px; margin-bottom: 40px;">
        <h1 style="margin: 0; font-weight: 800; font-size: 32px;">Cartelera Gourmet</h1>
        
        <form action="{{ route('recetas.index') }}" method="GET" style="display: flex; flex-wrap: wrap; gap: 15px; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
            
            <div style="flex: 1; min-width: 200px;">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Buscar por título o ingrediente..." class="form-control" style="width: 100%; box-sizing: border-box;">
            </div>

            <div>
                <select name="type" class="form-control">
                    <option value="">Todas las categorías</option>
                    <option value="Desayuno" {{ request('type') == 'Desayuno' ? 'selected' : '' }}>Desayuno</option>
                    <option value="Almuerzo" {{ request('type') == 'Almuerzo' ? 'selected' : '' }}>Almuerzo</option>
                    <option value="Cena" {{ request('type') == 'Cena' ? 'selected' : '' }}>Cena</option>
                    <option value="Postre" {{ request('type') == 'Postre' ? 'selected' : '' }}>Postre</option>
                </select>
            </div>

            <div>
                <select name="difficulty" class="form-control">
                    <option value="">Cualquier dificultad</option>
                    <option value="Fácil" {{ request('difficulty') == 'Fácil' ? 'selected' : '' }}>Fácil</option>
                    <option value="Medio" {{ request('difficulty') == 'Medio' ? 'selected' : '' }}>Medio</option>
                    <option value="Difícil" {{ request('difficulty') == 'Difícil' ? 'selected' : '' }}>Difícil</option>
                </select>
            </div>

            <div style="display: flex; gap: 10px;">
                <button type="submit" class="btn-action">Filtrar</button>
                <a href="{{ route('recetas.index') }}" style="padding: 10px 15px; color: #666; text-decoration: none; font-weight: bold; font-size: 14px; display: flex; align-items: center;">Limpiar</a>
            </div>
        </form>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(180px, 1fr)); gap: 25px;">
        @forelse($recetas as $receta)
            @include('components.recipe-card', ['recipe' => $receta])
        @empty
            <div style="grid-column: 1/-1; text-align: center; padding: 50px; background: white; border-radius: 8px;">
                <p style="color: #666; font-size: 18px;">No hay resultados que coincidan con tus filtros. 🎬</p>
                <a href="{{ route('recetas.index') }}" style="color: var(--main); font-weight: bold;">Volver al catálogo completo</a>
            </div>
        @endforelse
    </div>
@endsection