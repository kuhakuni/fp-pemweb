<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    /**
     * Table Name
     */
    protected $table = "supplier";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ["nama_supplier", "alamat", "no_telp"];

    /**
     * Get the barang record associated with the supplier.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function barang()
    {
        return $this->hasMany(Barang::class, "id_supplier");
    }
}