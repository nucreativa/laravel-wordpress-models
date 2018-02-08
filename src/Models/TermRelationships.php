<?php

namespace LaravelWordpressModels\Models;


use Illuminate\Database\Eloquent\Model;

class TermRelationships extends Model {
	protected $table = 'term_relationships';
	protected $primaryKey = 'term_taxonomy_id';
}
