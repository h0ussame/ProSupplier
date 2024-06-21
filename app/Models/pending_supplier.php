<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class pending_supplier extends Authenticatable
{
    use HasFactory,Notifiable;

    protected $table='pending_supplier';
    
    protected $fillable=[
           'first_name',
           'last_name',
           'email',
           'password',
           'number',
           'category',
           'city',
           'zip_code',
           'state'
    ];
}
