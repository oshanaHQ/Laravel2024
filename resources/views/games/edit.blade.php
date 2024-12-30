@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Edit Game</h1>

    <div class="bg-white p-6 rounded-lg shadow-sm">
        <form action="{{ route('games.update', $game->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Game Name</label>
                <input type="text" 
                       name="name" 
                       id="name" 
                       value="{{ $game->name }}"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" 
                       required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" 
                          id="description" 
                          rows="3" 
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" 
                          required>{{ $game->description }}</textarea>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Game Image</label>
                @if($game->image && file_exists(public_path($game->image)))
                    <img src="{{ asset($game->image) }}" 
                         alt="{{ $game->name }}" 
                         class="w-48 h-48 object-cover rounded mb-2">
                @endif
                <input type="file" 
                       name="image" 
                       id="image" 
                       class="mt-1 block w-full">
                <p class="text-sm text-gray-500 mt-1">Leave empty to keep the current image</p>
            </div>

            <div class="flex space-x-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                    Update Game
                </button>
                <a href="{{ route('dashboard') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection