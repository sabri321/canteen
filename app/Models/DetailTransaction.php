<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Psy\Readline\Transient;

class DetailTransaction extends Model
{
    use HasFactory;

    //relasi detail transaction ke user ( satu detail transaksi di miliki satu user)
    public function user(){
        return $this->belongsTo(User::class);
    }

    //relasi detail transaction ke product ( satu detail transaction di miliki satu product)
    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }

    // //relasi detail transaction ke product ( satu detail transaction di miliki satu product)
    public function product(){
        return $this->belongsTo(Product::class);
    }

    
}
