<?php

namespace LaravelWordpressModels\Models;


use Illuminate\Database\Eloquent\Model;

class CommentMeta extends Model {
	protected $table = 'commentmeta';
	public $timestamps = false;
	protected $fillable = [ 'meta_key', 'meta_value' ];
	protected $primaryKey = 'meta_id';

	public function comment() {
		return $this->belongsTo( Comment::class );
	}
}
