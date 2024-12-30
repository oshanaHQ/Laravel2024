<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function showDashboard()
    {
        $games = Game::all(); // Get all games, not just favorites
        return view('dashboard', compact('games'));
    }

    public function show(Game $game)
    {
        return view('games.show', compact('game'));
    }

    public function showFavorites()
    {
        $games = auth()->user()->favorites()->paginate(20); // Get user's favorite games
        return view('favorites', compact('games'));
    }

    public function showWishlist()
    {
        $games = auth()->user()->wishlist()->paginate(20); // Get user's wishlist games
        return view('wishlist', compact('games'));
    }

    public function addToFavorites(Game $game)
    {
        if (auth()->user()->favorites()->where('game_id', $game->id)->exists()) {
            return redirect()->route('dashboard')->with('message', 'Game is already in your favorites!');
        }

        auth()->user()->favorites()->attach($game->id); // Add game to user's favorites
        return redirect()->route('dashboard')->with('message', 'Game added to your favorites!');
    }

    public function removeFromFavorites(Game $game)
    {
        auth()->user()->favorites()->detach($game->id); // Remove game from user's favorites
        return redirect()->route('dashboard')->with('message', 'Game removed from your favorites!');
    }

    public function addToWishlist(Game $game)
    {
        if (auth()->user()->wishlist()->where('game_id', $game->id)->exists()) {
            return redirect()->route('dashboard')->with('message', 'Game is already in your wishlist!');
        }

        auth()->user()->wishlist()->attach($game->id); // Add game to user's wishlist
        return redirect()->route('dashboard')->with('message', 'Game added to your wishlist!');
    }

    public function removeFromWishlist(Game $game)
    {
        auth()->user()->wishlist()->detach($game->id); // Remove game from user's wishlist
        return redirect()->route('dashboard')->with('message', 'Game removed from your wishlist!');
    }

    public function edit(Game $game)
    {
        return view('games.edit', compact('game')); // Show edit form for a specific game
    }

    public function update(Request $request, Game $game)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $updateData = [
            'name' => $validated['name'],
            'description' => $validated['description'],
        ];

        if ($request->hasFile('image')) {
            if ($game->image && file_exists(public_path($game->image))) {
                unlink(public_path($game->image)); // Delete old image if exists
            }
            
            $imagePath = $request->file('image')->store('games', 'public');
            $updateData['image'] = 'storage/' . $imagePath; // Store new image path
        }

        $game->update($updateData); // Update game details
        return redirect()->route('dashboard')->with('message', 'Game updated successfully!');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imagePath = $request->file('image')->store('games', 'public'); // Store image in 'public/games'
        $game = Game::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'image' => 'storage/' . $imagePath, // Store relative image path
        ]);

        return redirect()->route('dashboard')->with('message', 'Game created successfully!');
    }

    public function destroy(Game $game)
    {
        auth()->user()->favorites()->detach($game->id); // Remove game from favorites
        auth()->user()->wishlist()->detach($game->id); // Remove game from wishlist
        $game->delete(); // Delete the game record
        return redirect()->route('dashboard')->with('message', 'Game deleted successfully!');
    }
}
