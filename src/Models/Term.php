<?php

namespace LaravelWordpressModels\Models;


use Illuminate\Database\Eloquent\Model;
use LaravelWordpressModels\Traits\HasMeta;

class Term extends Model {

	use HasMeta;

	protected $table = 'terms';
	protected $primaryKey = 'term_id';

	public function meta() {
		return $this->hasMany( Meta::class, 'term_id' )
		            ->select( [ 'term_id', 'meta_key', 'meta_value' ] );
	}

}
