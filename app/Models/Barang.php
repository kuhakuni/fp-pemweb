<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    /**
     * Table Name
     */
    protected $table = "barang";

    /**
     * Relasi Table lain
     */
    protected $with = ["kategori", "supplier"];
    
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        "nama_barang",
        "harga",
        "stok",
        "id_kategori",
        "id_supplier",
    ];
    /**
     * Get the kategori record associated with the barang.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, "id_kategori");
    }

    /**
     * Get the supplier record associated with the barang.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, "id_supplier");
    }

    /**
     * Get the detail transaksi record associated with the barang.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detail_transaksi()
    {
        return $this->hasMany(DetailTransaksi::class, "id_barang");
    }
}