<?php

namespace LaravelWordpressModels\Models;


use Illuminate\Database\Eloquent\Model;

class TermTaxonomy extends Model {
	protected $table = 'term_taxonomy';

	public function term() {
		return $this->belongsTo( Term::class, 'term_id', 'term_id' );
	}
}
