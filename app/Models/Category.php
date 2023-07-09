<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    //relasi category ke product ( satu category memiliki banyak product)
    public function product(){
        return $this->hasMany(Product::class);
    }

}
