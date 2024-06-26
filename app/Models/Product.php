<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = array('name','category_id', 'description', 'price', 'quantity', 'image');
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
