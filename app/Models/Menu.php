<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu';
    protected $primaryKey = 'menu_id';

    protected $fillable = [
        'nama_menu',
        'kategori',
        'price'
    ];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'menu_id');
    }
}
