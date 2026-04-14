<style>
    .recipe-poster {
        background: white;
        border-radius: 8px;
        overflow: hidden;
        transition: transform 0.3s ease;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        position: relative;
    }
    .recipe-poster:hover { transform: translateY(-8px); }
    
    .poster-img {
        width: 100%;
        aspect-ratio: 2/3; /* Proporción de póster de cine */
        object-fit: cover;
        background: #eee;
    }
    
    .poster-info { padding: 12px; }
    .poster-type { font-size: 11px; font-weight: 800; color: var(--main); text-transform: uppercase; }
    .poster-title { font-size: 16px; font-weight: 700; margin: 5px 0; display: block; height: 40px; overflow: hidden; }
</style>

<div class="recipe-poster">
    <img src="https://images.unsplash.com/photo-1493770348161-369560ae357d?q=80&w=400&auto=format&fit=crop" class="poster-img" alt="Foto">
    <div class="poster-info">
        <span class="poster-type">{{ $recipe['type'] }}</span>
        <span class="poster-title">{{ $recipe['name'] }}</span>
        <a href="{{ route('recetas.show', $recipe['id']) }}" class="btn-action" style="width: 100%; text-align: center; box-sizing: border-box; font-size: 12px;">VER DETALLES</a>
    </div>
</div>