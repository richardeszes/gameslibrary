<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
     protected $fillable = ['title', 'console_id', 'published', 'publisher_id', 'url', 'coverimage', 'metagamescore', 'category_id'];

    public function category() {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, 'games_tags');
    }

    public function console() {
        return $this->hasOne(Console::class, 'id', 'console_id');
    }

    public function publisher() {
        return $this->hasOne(Publisher::class, 'id', 'publisher_id');
    }
}
