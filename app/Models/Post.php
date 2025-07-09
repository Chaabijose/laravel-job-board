<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;
    protected $table = "post";
    //use HasFactory;
    protected $fillable = [
        "title",
        "body",
        "author",
        "published",
    ]; // fields that can be updated

    protected $guarded = ["id"]; // fields that cannot be updated (readonly)

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

}

