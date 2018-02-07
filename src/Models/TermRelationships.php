<?php

namespace LaravelWordpressModels\Models;

class TermRelationships extends \Illuminate\Database\Eloquent\Model {
	protected $table = 'term_relationships';
	protected $primaryKey = 'term_taxonomy_id';
}
