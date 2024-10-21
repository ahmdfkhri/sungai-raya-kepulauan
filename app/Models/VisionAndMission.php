<?php

namespace App\Models;

use BackedEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisionAndMission extends Model
{
    /** @use HasFactory<\Database\Factories\VisionAndMissionFactory> */
    use HasFactory;

    public $fillable = [
        'type',
        'value',
    ];
}
