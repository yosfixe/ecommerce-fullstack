<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    protected $fillable = ['name', 'description', 'production_date', 'type', 'picture', 'cat_id'];
    
    public function category() 
    {
        return $this->hasone(Category::class, "id", "cat_id");
    }
}
