<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';
    protected $primaryKey = 'payment_id';

    protected $fillable = [
        'order_id',
        'metode_pembayaran',
        'status_pembayaran',
        'payment_date'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
