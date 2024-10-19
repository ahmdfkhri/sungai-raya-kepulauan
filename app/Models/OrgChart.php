<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrgChart extends Model
{
    /** @use HasFactory<\Database\Factories\OrgChartFactory> */
    use HasFactory;

    protected $fillable = ['employee_id', 'position', 'level'];

    public function employee() {
        return $this->belongsTo(Employee::class);
    }
}
