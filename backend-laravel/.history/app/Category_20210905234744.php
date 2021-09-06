<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /*
     * @var array
     */
    protected $fillable = [
        'name',
        'highlight'
    ];

    /**
     * Get all articles with this category
     */
    public function categories() {
        return $this->belongsToMany(Article::class)->latest();
    }
}