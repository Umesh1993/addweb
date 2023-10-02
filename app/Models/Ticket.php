<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'ticket';
    protected $fillable = [
      'title',
      'description',
      'status',
      'user_id'
    ];

    public function users(){
      return $this->hasOne(User::class,'id','user_id');
    }
}
