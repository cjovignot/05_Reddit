<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Posts;
use App\Models\Comments;
use Illuminate\Database\Eloquent\Relations\HasMany;



class Subraddits extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        "about",
        "subraddit_picture_URL",
        "banner_picture_URL",
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Posts::class);
    }
    public function comments(): HasMany
    {
        return $this->hasMany(Comments::class);
    }
}
