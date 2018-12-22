<?php

namespace Nucreativa\LaravelWordpressModels\Models;


use Illuminate\Database\Eloquent\Model;

class PostMeta extends Model
{
    protected $table = 'postmeta';
    public $timestamps = false;
    protected $fillable = ['meta_key', 'meta_value'];
    protected $primaryKey = 'meta_id';

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
