<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberJourney extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function journey()
    {
        return $this->hasMany(Journey::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
