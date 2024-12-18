<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>R�sultats de recherche</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-800 text-white">

<header class="text-center py-6">
    <h1 class="text-3xl font-semibold">R�sultats pour "{{ $query }}"</h1>
</header>

<div class="text-center mb-6">
    <a href="/sae/plats" class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700">
        Retour � la liste des plats
    </a>
</div>

<div class="max-w-7xl mx-auto px-4">
    <ul class="space-y-6">
        @if($plats->isEmpty())
            <p class="text-gray-400 text-center">Aucun r�sultat trouv�.</p>
        @else
            @foreach($plats as $plat)
                <li class="bg-gray-900 p-6 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold mb-2">{{ $plat->nom }}</h2>
                    <p class="text-gray-400 mb-4">{{ $plat->description }}</p>
                    @if($plat->image)
                        <img src="{{ $plat->image->url }}" alt="{{ $plat->nom }}" class="w-full h-64 object-cover rounded-lg mb-4">
                    @else
                        <p class="text-gray-500">Aucune image disponible</p>
                    @endif
                    <p class="text-gray-400">
                        <span class="font-semibold">Ingr�dients : </span>
                        @foreach($plat->ingredients as $ingredient)
                            {{ $ingredient->nom }}@if(!$loop->last), @endif
                        @endforeach
                    </p>
                </li>
            @endforeach
        @endif
    </ul>
</div>

</body>
</html>
