<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = ["id_transaksi", "id_barang", "jumlah", "subtotal"];
}