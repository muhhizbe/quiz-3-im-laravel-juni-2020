<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArtikelModel extends Model
{
    protected $table = "artikels";
    
    protected $fillable = ["judul", "isi", "tag", "user_id", "vote", "like", "dislike", "slug"];
}
