<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengalamanModel extends Model
{
    protected $table = 'pengalaman';

    protected $guarded = [];

    protected $casts = [
        'property_type' => 'array',
    ];
}
