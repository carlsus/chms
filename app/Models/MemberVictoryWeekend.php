<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberVictoryWeekend extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function victoryweekend()
    {
        return $this->belongsTo(VictoryWeekend::class);
    }
}
