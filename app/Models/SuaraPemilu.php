<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuaraPemilu extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function caketum()
    {
        return $this->belongsTo(Caketum::class);
    }
}
