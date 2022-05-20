<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    /**
     * Primary Key
     * @var String
     */
    protected $primaryKey = "id_supplier";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ["nama", "alamat", "no_telp"];
}