<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Image extends Model
{
   protected $fillable=['path','post_id'];

   function post(){
       return $this->belongsTo(Post::class);
   }
}
