<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Customer extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'customers';
    protected $primaryKey = 'customer_id';

    protected $fillable = [
        'nama',
        'email',
        'nomor_telepon',
        'gender'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }
}
