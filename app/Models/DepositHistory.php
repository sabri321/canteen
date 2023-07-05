<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepositHistory extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    //relasi deposit detail ke user ( satu deposite detail di miliki satu user)
    public function user(){
        return $this->belongsTo(User::class);
    }
}
