<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    //relasi product ke user ( satu product di miliki satu user)
    public function user(){
        return $this->belongsTo(User::class);
    }

    //relasi product ke category ( satu product di miliki satu category)
    public function category(){
        return $this->belongsTo(Category::class);
    }

    //relasi product ke detail history (satu product memiliki banyak detail transaksi)
    public function detailtransaksi(){
        return $this->hasMany(DetailTransaction::class);
    }
    

}
