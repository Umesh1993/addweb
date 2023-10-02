<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Notification extends Model
{
    use HasFactory;
    protected $table="notifications";

    public function user(){
        return $this->hasOne(User::class,'id','notifiable_id');
    }
}
