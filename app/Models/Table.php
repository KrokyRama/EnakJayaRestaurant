<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $table = 'meja';
    protected $primaryKey = 'meja_id';

    protected $fillable = [
        'kapasitas',
        'status_meja'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'meja_id');
    }
}
