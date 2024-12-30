<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Allow the role field to be mass-assignable
    ];

    protected $hidden = [
        'password',
        'remember_token', // Hide password and remember token for serialization
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', // Ensure password is stored as hashed
    ];

    public function favorites(): BelongsToMany
    {
        return $this->belongsToMany(Game::class, 'favorites'); // Get all user's favorite games
    }

    public function wishlist(): BelongsToMany
    {
        return $this->belongsToMany(Game::class, 'wishlists'); // Get all user's wishlist games
    }

    public function isAdmin()
    {
        return $this->role === 'admin'; // Check if the user has admin role
    }
}
