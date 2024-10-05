<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts'; // Nama tabel di database

    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
    ];

    // Jika kamu ingin menonaktifkan timestamps (created_at & updated_at):
    // public $timestamps = false;
}
