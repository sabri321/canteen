<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'status'
    ];

    //relasi transaction ke user ( satu transaksi di miliki satu user)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //relasi transaction ke detail transaction (satu transaction memiliki banyak detail transaksi)
    public function detailTransaction()
    {
        return $this->hasMany(DetailTransaction::class);
    }

    // Model Transaction
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
