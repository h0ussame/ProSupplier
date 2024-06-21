<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;


    protected $table='order';
    
    protected $fillable = [
        'manager_id',
        'supplier_id',
        'product',
        'quantity',
        'offered_price',
        'status',
        'motif',
    ];

    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

}
