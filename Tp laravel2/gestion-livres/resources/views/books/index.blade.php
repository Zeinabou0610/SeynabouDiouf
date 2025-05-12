<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Livres</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <header class="mb-8">
            <h1 class="text-3xl font-bold text-indigo-700">Bibliothèque en Ligne</h1>
            <p class="text-gray-600">Gestion des livres disponibles</p>
        </header>

        <!-- Liste des livres -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($books as $book)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <div class="p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $book->title }}</h2>
                    <p class="text-gray-600 mb-1"><span class="font-medium">Auteur :</span> {{ $book->author }}</p>
                    
                    @if($book->reviews_count)
                    <div class="flex items-center mt-2">
                        <div class="flex text-yellow-400">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= floor($book->averageRating()))
                                    ★
                                @else
                                    ☆
                                @endif
                            @endfor
                        </div>
                        <span class="ml-2 text-gray-700">
                            {{ number_format($book->averageRating(), 1) }}/5 ({{ $book->reviews_count }} avis)
                        </span>
                    </div>
                    @else
                    <p class="text-gray-500 mt-2">Aucun avis pour ce livre</p>
                    @endif

                    <div class="mt-4">
                        <a href="{{ route('books.show', $book) }}" 
                           class="inline-block bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition-colors">
                            Voir détails
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $books->links() }}
        </div>

        <!-- Style personnalisé pour la pagination -->
        <style>
            .pagination {
                display: flex;
                justify-content: center;
                list-style: none;
                padding: 0;
            }
            .page-item {
                margin: 0 4px;
            }
            .page-link {
                display: block;
                padding: 8px 16px;
                border: 1px solid #ddd;
                border-radius: 4px;
                color: #4b5563;
                text-decoration: none;
            }
            .page-item.active .page-link {
                background-color: #4f46e5;
                color: white;
                border-color: #4f46e5;
            }
            .page-item.disabled .page-link {
                color: #9ca3af;
                pointer-events: none;
            }
        </style>
    </div>
</body>
</html>