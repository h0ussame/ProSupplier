<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class admin extends Authenticatable
{
    use HasFactory,Notifiable;

   protected $table='admin';
   
   protected $fillable=[
    'first_name',
    'last_name',
    'email',
    'password',
    'number'
   ];

}
