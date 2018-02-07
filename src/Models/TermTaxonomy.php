<?php

namespace LaravelWordpressModels\Models;

class TermTaxonomy extends \Illuminate\Database\Eloquent\Model {
	protected $table = 'term_taxonomy';

	public function term() {
		return $this->belongsTo( Term::class, 'term_id', 'term_id' );
	}
}
