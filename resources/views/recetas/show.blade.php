@extends('layouts.app')

@section('title', $receta['name'])

@section('content')
    <div style="display: flex; gap: 40px; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.05);">
        
        <div style="width: 300px; flex-shrink: 0;">
            <img src="https://images.unsplash.com/photo-1493770348161-369560ae357d?q=80&w=400&auto=format&fit=crop" style="width: 100%; border-radius: 8px; aspect-ratio: 2/3; object-fit: cover;">
        </div>

        <div>
            <h1 style="margin: 0 0 10px 0;">{{ $receta['name'] }}</h1>
            
            @if($receta['difficulty'] == 'Fácil')
                <span style="background: #27ae60; color: white; padding: 5px 15px; border-radius: 50px; font-size: 12px; font-weight: bold;">Dificultad: Baja</span>
            @elseif($receta['difficulty'] == 'Medio')
                <span style="background: #f39c12; color: white; padding: 5px 15px; border-radius: 50px; font-size: 12px; font-weight: bold;">Dificultad: Media</span>
            @else
                <span style="background: #c0392b; color: white; padding: 5px 15px; border-radius: 50px; font-size: 12px; font-weight: bold;">Dificultad: Alta</span>
            @endif

            <p style="color: #666; margin-top: 20px;"><strong>Categoría:</strong> {{ $receta['type'] }}</p>

            <h3 style="border-bottom: 2px solid var(--main); padding-bottom: 5px;">Ingredientes</h3>
            <ul style="line-height: 1.8;">
                @foreach($receta['ingredients'] as $ing)
                    <li>{{ $ing }}</li>
                @endforeach
            </ul>

            <h3 style="border-bottom: 2px solid var(--main); padding-bottom: 5px;">Preparación</h3>
            <p style="line-height: 1.6;">{{ is_array($receta['steps']) ? implode(' ', $receta['steps']) : $receta['steps'] }}</p>
            
            <br>
            <a href="{{ route('recetas.index') }}" style="color: #666;">← Volver al catálogo</a>
        </div>
    </div>
@endsection