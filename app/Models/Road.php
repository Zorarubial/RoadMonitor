<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Road extends Model
{
    use HasFactory;

    protected $fillable = [
        'roadname', // existing columns
        'segment_number',
        'description', // existing columns
        'image_path',
        'latitude',
        'longitude',
    ];

}
