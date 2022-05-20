<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    /**
     * Primary Key
     * @var String
     */
    protected $primaryKey = "id_barang";

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        "nama",
        "harga",
        "stok",
        "id_kategori",
        "id_supplier",
    ];
}