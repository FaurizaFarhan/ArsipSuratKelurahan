<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelurahanArsipSurat extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_surat',
    ];
}
