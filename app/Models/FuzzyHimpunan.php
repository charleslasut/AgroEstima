<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuzzyHimpunan extends Model
{
    use HasFactory;

    protected $table = 'fuzzy_himpunan';
    protected $fillable = [
        'id',
        'id_variabel',
        'nama',
        'jenis_kurva',
        'nilai_bawah',
        'nilai_atas',
    ];
}