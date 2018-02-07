<?php

namespace LaravelWordpressModels\Models;

class Link extends \Illuminate\Database\Eloquent\Model {
	protected $table = 'links';
	protected $primaryKey = 'link_id';
	public $timestamps = false;
}
