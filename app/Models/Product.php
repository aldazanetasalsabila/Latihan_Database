<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Ganti 'menus' menjadi 'products'
    protected $table = 'products'; 
    
    // Ganti 'nama_menu' menjadi 'nama_produk'
    protected $fillable = ['nama_produk', 'harga', 'foto'];
}