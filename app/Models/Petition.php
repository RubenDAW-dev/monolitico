<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Petition extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'recipient',
        'signers',
        'status',
        'user_id',
        'category_id',
    ];

    // Belongs to a user (creator)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Belongs to a category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Many-to-Many: Petition can be signed by many users
    public function signatures()
    {
        return $this->belongsToMany(User::class, 'petition_user');
    }

    // One-to-Many: Petition can have many files
    public function files()
    {
        return $this->hasMany(File::class);
    }
}
