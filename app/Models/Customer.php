<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    /**
     * Table Name
     */
    protected $table = "customer";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ["nama", "alamat", "no_telp"];

    /**
     * Get the transaksi record associated with the customer.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, "id_customer");
    }
}