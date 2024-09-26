<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TakeAway extends Model
{
    use HasFactory;

    protected $table = 'takeaway';
    protected $primaryKey = 'takeaway_id';

    protected $fillable = [
        'order_id',
        'waktu_pengambilan',
        'status_pengambilan'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
