<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;
    /**
     * Table Name
     */
    protected $table = "detail_transaksi";
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = ["id_transaksi", "id_barang", "jumlah", "subtotal"];

    protected $with = ["barang", "transaksi"];
    /**
     * Get the transaksi that owns the detail transaksi.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, "id_transaksi");
    }

    /**
     * Get the barang that owns the detail transaksi.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function barang()
    {
        return $this->belongsTo(Barang::class, "id_barang");
    }
}