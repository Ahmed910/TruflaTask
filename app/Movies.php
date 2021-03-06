<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    protected $fillable=['adult','backdrop_path','original_language','original_title','overview','popularity','poster_path','release_date','title','video','vote_average','vote_count'];

    public function categories(){
        return $this->belongsToMany(Category::class,'categories_movies','movies_id','category_id');
    }
}
