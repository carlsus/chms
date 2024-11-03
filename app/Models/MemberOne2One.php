<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberOne2One extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function chapter()
    {
        return $this->hasMany(Chapter::class);
    }
}
