<?php

namespace Nucreativa\LaravelWordpressModels\Models;


use Illuminate\Database\Eloquent\Model;

class UserMeta extends Model {
	protected $table = 'usermeta';
	public $timestamps = false;
	protected $fillable = [ 'meta_key', 'meta_value' ];
	protected $primaryKey = 'umeta_id';

	public function user() {
		return $this->belongsTo( User::class );
	}
}
