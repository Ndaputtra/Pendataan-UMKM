<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;

    protected $table = 'umkm'; // Jika nama tabel Anda bukan 'umkms'

    protected $fillable = [
        'name',
        'category',
        'district',
        'description',
        'image',
        'user_id', // Tambahkan ini
        // ... kolom lain yang bisa diisi
    ];

    // Jika Anda memiliki relasi, tambahkan ini juga
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}