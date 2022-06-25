<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    protected $table = 'likes';
    protected $primaryKey = 'post';
    public $timestamps = false;

    public function user(){
        return $this->belongsTo('App/User');
    }

    public function post()
    {
        return $this->belongsTo('App\Models\post');
    }

} 