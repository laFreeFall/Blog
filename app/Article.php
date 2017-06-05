<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $fillable = [
        'title',
        'body',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the tags associated with given article
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags() {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    public function comments() {
        return $this->hasMany('App\Comment')->withTimestamps();
    }

    public function getTagListAttribute() {
        return $this->tags->lists('id')->toArray();
//        return $this->tags->lists('id');
    }
}
