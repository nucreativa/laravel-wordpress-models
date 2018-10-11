<?php

namespace Nucreativa\LaravelWordpressModels\Models;


use Illuminate\Database\Eloquent\Model;
use Nucreativa\LaravelWordpressModels\Traits\HasMeta;
use Nucreativa\LaravelWordpressModels\Traits\HasRoles;

class User extends Model {

	use HasMeta, HasRoles;

	protected $table = 'users';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	const CREATED_AT = 'user_registered';

	public function posts() {
		return $this->hasMany( Post::class, 'post_author' )
		            ->where( 'post_status', 'publish' )
		            ->where( 'post_type', 'post' );
	}

	public function comments() {
		return $this->hasMany( Comment::class, 'user_id' );
	}

	public function meta() {
		return $this->hasMany( UserMeta::class, 'user_id' )
		            ->select( [ 'user_id', 'meta_key', 'meta_value' ] );
	}

	public function totalPost() {
		return $this->posts()->count();
	}

	public function scopeHasPost( $query ) {
		return $query->whereHas( 'posts', function ( $query ) {
			$query
				->selectRaw( 'COUNT(ID) as total_post' )
				->having( 'total_post', '>', 0 );
		} );
	}

}
