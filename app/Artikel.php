<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikel';

    public static function boot() {
        parent::boot();
        static::saving(function ($model) {
            $model->slug = str_slug($model->judul);
        });
    }

    public function tag() {
        return $this->belongsToMany('App\Tag');
    }
}
