<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    // protected $guarded = ['id'];
    // protected $with = ['nama'];
    protected $fillable = [
        'id',
        'nama'
    ];
}
