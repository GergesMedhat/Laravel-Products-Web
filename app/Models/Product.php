<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;


class Product extends Model
{
    use HasFactory;
    // public $timestamps=false;
    
    protected $fillable = ['name', 'price', 'image','description', 'category_id','creator_id'];


    function category(){
        return $this->belongsTo(Category::class);
    }
}
