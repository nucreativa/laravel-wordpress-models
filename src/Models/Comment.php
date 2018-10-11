<?php

namespace Nucreativa\LaravelWordpressModels\Models;


use Illuminate\Database\Eloquent\Model;
use Nucreativa\LaravelWordpressModels\Traits\HasMeta;

class Comment extends Model {

	use HasMeta;

	protected $table = 'comments';
	protected $primaryKey = 'comment_ID';
	protected $fillable = [];
	public $timestamps = false;

	const CREATED_AT = 'comment_date';

	public function post() {
		return $this->belongsTo( Post::class, 'comment_post_ID' );
	}

	public function meta() {
		return $this->hasMany( CommentMeta::class, 'comment_id' )
		            ->select( [ 'comment_id', 'meta_key', 'meta_value' ] );
	}

	public function commentator() {
		return $this->hasOne( User::class, 'ID', 'user_id' );
	}

    public function child() {
        return $this->hasMany( Comment::class, 'comment_parent');
    }

}
