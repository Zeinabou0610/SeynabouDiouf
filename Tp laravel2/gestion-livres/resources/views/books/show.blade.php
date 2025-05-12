@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <!-- Détails du livre -->
    <div class="bg-white p-6 rounded-lg shadow-md mb-8">
        <h1 class="text-3xl font-bold">{{ $book->title }}</h1>
        <p class="text-gray-600 mt-2">Auteur : {{ $book->author }}</p>
    </div>

    <!-- Formulaire d'avis - Visible seulement si connecté -->
    @auth
    <div class="bg-white p-6 rounded-lg shadow-md mb-8">
        <h2 class="text-2xl font-semibold mb-4">Donnez votre avis</h2>
        <form action="{{ route('reviews.store', $book) }}" method="POST">
            @csrf
            
            <!-- Champ caché user_id si non-admin -->
            @unless(auth()->user()->isAdmin())
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            @else
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Utilisateur</label>
                    <select name="user_id" class="w-full p-2 border rounded">
                        @foreach(App\Models\User::all() as $user)
                            <option value="{{ $user->id }}" {{ $user->id == auth()->id() ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            @endunless

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Note</label>
                <select name="rating" class="w-full p-2 border rounded" required>
                    @for($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}">{{ $i }} étoile{{ $i > 1 ? 's' : '' }}</option>
                    @endfor
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Commentaire</label>
                <textarea name="comment" rows="4" class="w-full p-2 border rounded" required></textarea>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Envoyer l'avis
            </button>
        </form>
    </div>
    @endauth

    <!-- Liste des avis existants -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Avis des lecteurs</h2>
        
        @forelse($book->reviews as $review)
            <div class="border-b border-gray-200 pb-4 mb-4">
                <div class="flex justify-between">
                    <div>
                        <h3 class="font-medium">{{ $review->user->name }}</h3>
                        <div class="flex items-center my-1">
                            @for($i = 0; $i < 5; $i++)
                                @if($i < $review->rating)
                                    <span class="text-yellow-400">★</span>
                                @else
                                    <span class="text-gray-300">★</span>
                                @endif
                            @endfor
                        </div>
                    </div>
                    <span class="text-sm text-gray-500">
                        {{ $review->created_at->format('d/m/Y') }}
                    </span>
                </div>
                <p class="text-gray-700 mt-2">{{ $review->comment }}</p>
            </div>
        @empty
            <p class="text-gray-500">Aucun avis pour ce livre.</p>
        @endforelse
    </div>
</div>
@endsection