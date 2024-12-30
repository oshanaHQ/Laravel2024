@extends('layouts.app')

@section('title', 'Your Wishlist')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Your Wishlist</h1>

        @if($games->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                @foreach ($games as $game)
                    <div class="game bg-white border p-4 rounded-lg shadow-sm">
                        <div class="game-image mb-4">
                            @if($game->image && file_exists(public_path($game->image)))
                                <img src="{{ asset($game->image) }}" 
                                     alt="{{ $game->name }}" 
                                     class="w-full h-48 object-cover rounded"
                                     onerror="this.onerror=null; this.src=''; this.parentElement.innerHTML='<div class=\'w-full h-48 bg-gray-200 flex items-center justify-center rounded\'><p class=\'text-gray-500\'>Image failed to load</p></div>';"
                                />
                            @else
                                <div class="w-full h-48 bg-gray-200 flex items-center justify-center rounded">
                                    <p class="text-gray-500">No image available</p>
                                </div>
                            @endif
                        </div>
                        
                        <h3 class="text-lg font-semibold mb-2">{{ $game->name }}</h3>
                        <p class="text-gray-700 mb-2">{{ $game->description }}</p>
                        <p class="text-sm text-gray-500">Added to wishlist: {{ $game->created_at->format('M d, Y') }}</p>

                        <div class="mt-4">
                            <form action="{{ route('games.removeFromWishlist', $game) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">
                                    Remove from Wishlist
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $games->links() }}
            </div>
        @else
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <p class="text-gray-600">You have no games in your wishlist yet.</p>
            </div>
        @endif
    </div>
@endsection