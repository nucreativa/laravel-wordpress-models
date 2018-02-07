<?php

namespace LaravelWordpressModels\Models;

class CommentMeta extends \Illuminate\Database\Eloquent\Model {
	protected $table = 'commentmeta';
	public $timestamps = false;
	protected $fillable = [ 'meta_key', 'meta_value' ];
	protected $primaryKey = 'meta_id';

	public function comment() {
		return $this->belongsTo( Comment::class );
	}
}
