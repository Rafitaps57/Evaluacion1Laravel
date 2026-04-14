<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecetaController extends Controller
{
    private $recetas = [
        1 => [
            'id' => 1, 
            'name' => 'Spaghetti a la Carbonara', 
            'type' => 'Almuerzo', 
            'difficulty' => 'Medio', 
            'ingredients' => ['Pasta', 'Huevo', 'Panceta', 'Pimienta negra', 'Queso Pecorino'],
            'steps' => ['Hervir la pasta.', 'Dorar la panceta.', 'Mezclar huevo y queso.', 'Unir todo fuera del fuego.']
        ],
        2 => [
            'id' => 2, 
            'name' => 'Tostadas con Palta', 
            'type' => 'Desayuno', 
            'difficulty' => 'Fácil', 
            'ingredients' => ['Pan', 'Palta molida', 'Sal', 'Aceite de oliva'],
            'steps' => ['Tostar el pan.', 'Moler la palta con sal.', 'Untar en el pan.', 'Añadir un hilo de aceite.']
        ],
        3 => [
            'id' => 3, 
            'name' => 'Brownie de Chocolate', 
            'type' => 'Postre', 
            'difficulty' => 'Difícil', 
            'ingredients' => ['Chocolate', 'Mantequilla', 'Azúcar', 'Huevos', 'Harina'],
            'steps' => ['Derretir chocolate y mantequilla.', 'Batir huevos y azúcar.', 'Mezclar todo.', 'Hornear a 180°C por 30 mins.']
        ],
        4 => [
            'id' => 4,
            'name' => 'Ceviche de Pescado',
            'type' => 'Almuerzo',
            'difficulty' => 'Medio',
            'ingredients' => ['Pescado blanco', 'Limón', 'Cebolla morada', 'Cilantro', 'Ají'],
            'steps' => ['Cortar el pescado en cubos.', 'Picar la cebolla y el cilantro.', 'Mezclar con jugo de limón.', 'Dejar marinar 15 min.', 'Servir frío.']
        ],
        5 => [
            'id' => 5,
            'name' => 'Fajitas de Pollo',
            'type' => 'Almuerzo',
            'difficulty' => 'Difícil',
            'ingredients' => ['Tortillas de maíz', 'Pollo desmenuzado', 'Tomate', 'Crema', 'Palta', 'Lechuga'],
            'steps' => ['Tostar la tortilla.', 'Cocer el pollo', 'Picar los ingredientes.', 'Rellenar con pollo ', 'Servir y a disfrutar.']
        ],
        6 => [
            'id' => 6,
            'name' => 'Panqueques de Arándanos',
            'type' => 'Desayuno',
            'difficulty' => 'Fácil',
            'ingredients' => ['Harina', 'Leche', 'Huevo', 'Arándanos frescos', 'Miel'],
            'steps' => ['Mezclar harina, leche y huevo.', 'Agregar los arándanos a la mezcla.', 'Cocinar en sartén con un poco de mantequilla.', 'Servir con miel.']
        ],
        7 => [
            'id' => 7,
            'name' => 'Sopa de Tomate',
            'type' => 'Cena',
            'difficulty' => 'Fácil',
            'ingredients' => ['Tomates maduros', 'Ajo', 'Albahaca', 'Caldo de verduras', 'Aceite de oliva'],
            'steps' => ['Hornear tomates y ajos con aceite.', 'Licuar los vegetales horneados.', 'Calentar con el caldo de verduras.', 'Añadir albahaca fresca antes de servir.']
        ],
        8 => [
            'id' => 8,
            'name' => 'Lasaña de Carne',
            'type' => 'Almuerzo',
            'difficulty' => 'Difícil',
            'ingredients' => ['Láminas de pasta', 'Carne molida', 'Salsa de tomate', 'Queso Mozzarella', 'Bechamel'],
            'steps' => ['Cocinar la carne con la salsa.', 'Preparar la salsa bechamel.', 'Armar capas de pasta, carne y queso.', 'Hornear a 200°C por 40 minutos.']
        ],
        9 => [
            'id' => 9,
            'name' => 'Ensalada César',
            'type' => 'Cena',
            'difficulty' => 'Fácil',
            'ingredients' => ['Lechuga', 'Pollo a la plancha', 'Croutons', 'Queso parmesano', 'Aderezo César'],
            'steps' => ['Lavar y trocear la lechuga.', 'Cortar el pollo en tiras.', 'Mezclar todos los ingredientes.', 'Bañar con el aderezo al gusto.']
        ],
        10 => [
            'id' => 10,
            'name' => 'Mousse de Limón',
            'type' => 'Postre',
            'difficulty' => 'Fácil',
            'ingredients' => ['Leche condensada', 'Crema de leche', 'Jugo de limón', 'Ralladura de limón'],
            'steps' => ['Batir la crema de leche.', 'Mezclar leche condensada con jugo de limón.', 'Incorporar la crema suavemente.', 'Refrigerar por 4 horas.']
        ],
        11 => [
            'id' => 11,
            'name' => 'Tacos al Pastor',
            'type' => 'Almuerzo',
            'difficulty' => 'Difícil',
            'ingredients' => ['Carne de cerdo', 'Achiote', 'Piña', 'Cebolla', 'Cilantro', 'Tortillas'],
            'steps' => ['Marinar la carne en achiote.', 'Asar la carne y la piña.', 'Picar finamente.', 'Servir en tortillas con cebolla y cilantro.']
        ],
        12 => [
            'id' => 12,
            'name' => 'Tortilla Española',
            'type' => 'Cena',
            'difficulty' => 'Medio',
            'ingredients' => ['Papas', 'Huevos', 'Cebolla', 'Aceite de oliva', 'Sal'],
            'steps' => ['Freír las papas y la cebolla picada.', 'Escurrir el aceite.', 'Mezclar con los huevos batidos.', 'Cocinar en la sartén por ambos lados.']
        ],
        13 => [
            'id' => 13,
            'name' => 'Galletas de Avena y Plátano',
            'type' => 'Postre',
            'difficulty' => 'Fácil',
            'ingredients' => ['Avena en hojuelas', 'Plátanos maduros', 'Chips de chocolate'],
            'steps' => ['Triturar los plátanos.', 'Mezclar con la avena y los chips.', 'Formar bolitas y aplastarlas en la bandeja.', 'Hornear 15 min a 180°C.']
        ],
    ];

public function index(Request $request)
{
    // 1. Tomamos las recetas fijas del array
    $recetasBase = $this->recetas;

    // 2. Traemos las recetas que el usuario haya guardado en la sesión (si existen)
    $recetasSesion = session('recetas_nuevas', []);

    // 3. Las combinamos todas en una sola colección
    $recetas = collect($recetasBase)->merge($recetasSesion);

    // --- (Aquí mantienes tu lógica de filtrado que ya tienes) ---
    if ($request->filled('search')) {
        $searchTerm = strtolower($request->search);
        $recetas = $recetas->filter(fn($r) => str_contains(strtolower($r['name']), $searchTerm));
    }
    if ($request->filled('type')) $recetas = $recetas->where('type', $request->type);
    if ($request->filled('difficulty')) $recetas = $recetas->where('difficulty', $request->difficulty);

    return view('recetas.index', compact('recetas'));
}

    public function show($id)
    {
        if (!isset($this->recetas[$id])) {
            return redirect()->route('recetas.index')->with('error', 'Receta no encontrada.');
        }

        $receta = $this->recetas[$id];
        return view('recetas.show')->with('receta', $receta);
    }

    public function create()
    {
        return view('recetas.create');
    }

public function store(Request $request)
{
    // Validación (la que ya teníamos)
    $data = $request->validate([
        'name' => 'required|string|min:3',
        'type' => 'required',
        'difficulty' => 'required',
        'ingredients' => 'required|string',
    ]);

    // Creamos el formato de la nueva receta
    $nuevaReceta = [
        'id' => uniqid(), // Generamos un ID único temporal
        'name' => $data['name'],
        'type' => $data['type'],
        'difficulty' => $data['difficulty'],
        'ingredients' => explode(',', $data['ingredients']), // Convertimos texto a array
        'steps' => ['Paso 1: Preparar ingredientes.'], // Paso genérico
    ];

    // ¡EL TRUCO!: Guardamos en la sesión
    // Obtenemos las recetas existentes y añadimos la nueva
    $recetasExistentes = $request->session()->get('recetas_nuevas', []);
    $recetasExistentes[] = $nuevaReceta;
    $request->session()->put('recetas_nuevas', $recetasExistentes);

    return redirect()->route('recetas.index')->with('success', '¡Receta añadida con éxito!');
}
}