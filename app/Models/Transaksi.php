<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    /**
     * Table Name
     */
    protected $table = "transaksi";

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

    /**
     * Get the customer record associated with the transaksi.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class, "id_customer");
    }

    /**
     * Get the detail transaksi record associated with the transaksi.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class, "id_transaksi");
    }
}