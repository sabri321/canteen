<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guarded = ['$id'];

    
    //relasi users ke product ( satu user memiliki banyak product)
    public function product(){
        return $this->hasMany(Product::class);
    }

    //relasi users ke deposit history ( satu user memiliki banyak hisyory)
    public function deposithistory(){
        return $this->hasMany(DepositHistory::class);
    }

        //relasi users ke transaction ( satu user memiliki banyak transaksi)
    public function transaction(){
        return $this->hasMany(Transaction::class);
    }
    
    //relasi users ke detail transaksi ( satu user memiliki banyak detail transaksi)
    public function detailtransaction(){
        return $this->hasMany(DetailTransaction::class);
    }

    
}
