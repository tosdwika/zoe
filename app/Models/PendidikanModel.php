<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendidikanModel extends Model
{
    protected $table = 'pendidikan';

    protected $guarded = [];

    protected $casts = [
        'property_type' => 'array',
    ];
}
