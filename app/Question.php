<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title','body'];

    public function user()
    {
        $this->belongTo('User::class');
    }
}
