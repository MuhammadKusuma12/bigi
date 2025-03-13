<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Illustration extends Model
{
    protected $fillable = [
        'title',
        'caption',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
