<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    use HasFactory;

    /**
     * Table Name
     */
    protected $table = "administrator";

    /**
     * Primary Key
     * @var String
     */
    protected $primaryKey = "id_administrator";

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = ["nama", "username", "password"];
}