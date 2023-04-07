<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Posts extends Model
{
    use HasFactory;
    protected $fillable = ['title','content', 'nsfw', 'spoiler', 'OC'];

    public function comments(): HasMany
    {
        return $this->hasMany(Comments::class);
    }
}
