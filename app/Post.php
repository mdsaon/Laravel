<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //delaring the table name
    protected $table = "posts";
    //If you want to change the primary key of you table
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    public function user()
    {
      return $this->belongsTo('App\User');
    }

}
