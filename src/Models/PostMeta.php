<?php

namespace LaravelWordpressModels\Models;

class PostMeta extends \Illuminate\Database\Eloquent\Model {
	protected $table = 'postmeta';
	public $timestamps = false;
	protected $fillable = [ 'meta_key', 'meta_value' ];
	protected $primaryKey = 'meta_id';

	public function post() {
		return $this->belongsTo( Post::class );
	}
}
