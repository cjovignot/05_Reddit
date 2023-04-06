<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Posts;
use App\Models\Comments;



class Subraddits extends Model
{
    use HasFactory;
    public function posts(): HasMany
    {
        return $this->hasMany(Posts::class);
    }
    public function comments(): HasMany
    {
        return $this->hasMany(Comments::class);
    }
    
}
