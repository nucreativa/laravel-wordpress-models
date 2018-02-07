<?php

namespace LaravelWordpressModels\Models;

use LaravelWordpressModels\Traits\HasMeta;

class Term extends \Illuminate\Database\Eloquent\Model {

	use HasMeta;

	protected $table = 'terms';
	protected $primaryKey = 'term_id';

	public function meta() {
		return $this->hasMany( Meta::class, 'term_id' )
		            ->select( [ 'term_id', 'meta_key', 'meta_value' ] );
	}

}
