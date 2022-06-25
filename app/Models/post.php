<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function posts(){
        return $this('App\Models\Post');
    }

}

