<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EncuestasList extends Model
{
    protected $table = 'encuestas_list';
    public $timestamps = false;

    protected $casts = [
        'list' => 'array'
    ];
}
