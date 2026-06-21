<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','category_id','thumbnail','first_image'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function sizes(){
        return $this->belongsToMany(Size::class);
    }

    public function colors(){
        return $this->belongsToMany(Color::class);
    }
}
