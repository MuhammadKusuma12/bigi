<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Art extends Model
{
    protected $fillable = [
      'image',
    ];

    public function illustration()
    {
        return $this->belongsTo(Illustration::class);
    }
}
