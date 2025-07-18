<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function news()
    {
        return $this->hasMany(News::class);
    }
    protected $fillable = ['name', 'slug'];
}
