<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangjadi extends Model
{
    use HasFactory;
    protected $table = 'barangjadi';
    protected $primaryKey = 'id_bj';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = true;

    protected $filable = ['nama', 'stock_min', 'stock',];
}
