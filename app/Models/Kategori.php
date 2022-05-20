<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    /**
     * Primary Key
     * @var String
     */
    protected $primaryKey = "id_kategori";

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = ["kategori"];
}