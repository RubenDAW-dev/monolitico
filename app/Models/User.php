<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // One-to-Many: A user can create many petitions
    public function petitions()
    {
        return $this->hasMany(Petition::class);
    }

    // Many-to-Many: A user can sign many petitions
    public function signatures()
    {
        return $this->belongsToMany(Petition::class, 'petition_user');
    }
}
