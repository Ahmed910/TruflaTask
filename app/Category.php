<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $fillable=['id','name'];

    public function movies()
    {
        return $this->belongsToMany(Movies::class,'categories_movies','category_id','movies_id');
    }
}
