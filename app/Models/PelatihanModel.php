<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelatihanModel extends Model
{
    protected $table = 'pelatihan';

    protected $guarded = [];

    protected $casts = [
        'property_type' => 'array',
    ];
}
