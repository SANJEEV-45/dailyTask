<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;

    public function productsbyCategory($category_id){
        return self::where('category_id',$category_id)->get();
    } 
}
