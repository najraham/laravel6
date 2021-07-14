<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable =['title', 'description'];

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function users() {
        return $this->belongsTo(User::class);
    }
}
