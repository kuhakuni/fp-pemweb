<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    /**
     * Table Name
     */
    protected $table = "kategori";

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = ["kategori"];

    /**
     * Get the barang record associated with the kategori.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function barang()
    {
        return $this->hasMany(Barang::class, "id_kategori");
    }
}