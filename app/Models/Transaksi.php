<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    /**
     * change default timestamp name
     */
    const CREATED_AT = "waktu_transaksi";
    /**
     * Primary Key
     * @var String
     */
    protected $primaryKey = "id_transaksi";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "id_customer",
        "id_barang",
        "jumlah",
        "total_harga",
        "tanggal",
    ];
}