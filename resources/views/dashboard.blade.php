@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Welcome to Your Dashboard</h1>

        @if(Auth::user()->role === 'admin')
            <!-- Admin Game Creation Form -->
            <div class="mb-8 bg-white p-6 rounded-lg shadow-sm">
                <h2 class="text-xl font-semibold mb-4">Add New Game</h2>
                <form action="{{ route('games.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Game Name</label>
                        <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="image" class="block text-sm font-medium text-gray-700">Game Image</label>
                        <input type="file" name="image" id="image" class="mt-1 block w-full" required>
                    </div>

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                        Add Game
                    </button>
                </form>
            </div>
        @endif

        <h2 class="text-xl font-semibold mb-4">All Games</h2>

        @if($games->isEmpty())
            <p>No games available.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                @foreach($games as $game)
                    <div class="game bg-white border p-4 rounded-lg shadow-sm">
                        <div class="game-image mb-4">
                            @if($game->image && file_exists(public_path($game->image)))
                                <img src="{{ asset($game->image) }}" 
                                     alt="{{ $game->name }}" 
                                     class="w-full h-48 object-cover rounded">
                            @else
                                <div class="w-full h-48 bg-gray-200 flex items-center justify-center rounded">
                                    <p class="text-gray-500">No image available</p>
                                </div>
                            @endif
                        </div>
                        
                        <h3 class="text-lg font-semibold mb-2">{{ $game->name }}</h3>
                        <p class="text-gray-700 mb-2">{{ $game->description }}</p>
                        <p class="text-sm text-gray-500">Created at: {{ $game->created_at->format('M d, Y') }}</p>

                        <div class="mt-4 flex space-x-4">
                            @if(Auth::user()->role === 'admin')
                                <!-- Admin Actions -->
                                <form action="{{ route('games.edit', $game->id) }}" method="GET">
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">
                                        Edit
                                    </button>
                                </form>
                                <form action="{{ route('games.destroy', $game->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md" 
                                            onclick="return confirm('Are you sure you want to delete this game?')">
                                        Delete
                                    </button>
                                </form>
                            @else
                                <!-- Regular User Actions -->
                                <form action="{{ route('games.addToFavorites', $game->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">
                                        Add to Favorites
                                    </button>
                                </form>

                                <form action="{{ route('games.addToWishlist', $game->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded-md">
                                        Add to Wishlist
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection