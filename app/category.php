<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = 'category';
   protected $fillable=["name"];

   public function task()
    {
        return $this->belongsTo('App\Task', 'id');
    }
}
