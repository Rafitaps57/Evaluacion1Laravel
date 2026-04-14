@extends('layouts.app')

@section('title', 'Añadir Nueva Producción')

@section('content')
    <div style="max-width: 700px; margin: auto;">
        
        <div style="margin-bottom: 30px; text-align: center;">
            <h1 style="margin: 0; font-weight: 800; font-size: 28px;">➕ Nueva Receta</h1>
            <p style="color: #666;">Registra una nueva receta en el catálogo</p>
        </div>

        <div style="background: white; padding: 40px; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border-top: 5px solid var(--main);">
            
            <form action="{{ route('recetas.store') }}" method="POST">
                @csrf
                
                <div style="margin-bottom: 25px;">
                    <label style="display: block; font-weight: 700; margin-bottom: 8px; font-size: 14px; color: var(--dark);">Título de la Receta</label>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Ej: Lasagna de la Nonna" class="form-control" style="width: 100%; box-sizing: border-box;">
                    @error('name') 
                        <span style="color: #e74c3c; font-size: 12px; font-weight: 600;">{{ $message }}</span> 
                    @enderror
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 25px;">
                    <div>
                        <label style="display: block; font-weight: 700; margin-bottom: 8px; font-size: 14px;">Categoría (Género)</label>
                        <select name="type" class="form-control" style="width: 100%;">
                            <option value="Desayuno">Desayuno</option>
                            <option value="Almuerzo">Almuerzo</option>
                            <option value="Cena">Cena</option>
                            <option value="Postre">Postre</option>
                        </select>
                    </div>

                    <div>
                        <label style="display: block; font-weight: 700; margin-bottom: 8px; font-size: 14px;">Nivel de Dificultad</label>
                        <select name="difficulty" class="form-control" style="width: 100%;">
                            <option value="Fácil">Fácil</option>
                            <option value="Medio">Medio</option>
                            <option value="Difícil">Difícil</option>
                        </select>
                    </div>
                </div>

                <div style="margin-bottom: 25px;">
                    <label style="display: block; font-weight: 700; margin-bottom: 8px; font-size: 14px;">Ingredientes Principales</label>
                    <textarea name="ingredients" rows="4" placeholder="Separa los ingredientes con comas (Ej: Harina, Huevos, Leche...)" class="form-control" style="width: 100%; box-sizing: border-box; resize: vertical;">{{ old('ingredients') }}</textarea>
                    <small style="color: #888; display: block; margin-top: 5px;">Esto se usará para el desglose técnico de la receta.</small>
                    @error('ingredients') 
                        <span style="color: #e74c3c; font-size: 12px; font-weight: 600;">{{ $message }}</span> 
                    @enderror
                </div>

                <div style="display: flex; gap: 15px; margin-top: 40px; border-top: 1px solid #eee; padding-top: 25px;">
                    <button type="submit" class="btn-action" style="flex: 2; padding: 15px; font-size: 16px;">
                        GUARDAR EN CATÁLOGO
                    </button>
                    <a href="{{ route('recetas.index') }}" style="flex: 1; text-align: center; text-decoration: none; color: #666; font-weight: bold; padding: 15px; font-size: 14px;">
                        CANCELAR
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection