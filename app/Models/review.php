<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Review extends Model
{

    protected $connection = 'mongodb';

    protected $collection = 'reviews';

    protected $primaryKey = 'username';

    public $timestamps = false;

    public function recensioni(){
        return $this('App\Models\Review');
    }

}

