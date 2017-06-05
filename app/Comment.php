<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'body'
    ];

    public function articles() {
        return $this->belongsTo('App\Article');
    }

    public function users() {
        return $this->belongsTo('App\User');
    }
}
