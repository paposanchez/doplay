<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
   protected $table = 'task';
   protected $fillable=["owner","category","name","isArchived","createdAt"];

public $timestamps = false;

   public function category()
    {
        return $this->belongsTo('App\Category', 'category');
    }
}
