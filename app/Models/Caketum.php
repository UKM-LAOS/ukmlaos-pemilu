<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Caketum extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $guarded = ['id'];

    public function suaraPemilu()
    {
        return $this->hasMany(SuaraPemilu::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('caketum-image')
            ->singleFile();
    }
}
