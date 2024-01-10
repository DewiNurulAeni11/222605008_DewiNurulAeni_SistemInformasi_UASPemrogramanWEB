<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bahanbaku extends Model
{
    use HasFactory;
    protected $table = 'bahanbaku';
    protected $primaryKey = 'id_bb';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = true;

    protected $filable = ['nama', 'stock_min', 'stock',];
}
