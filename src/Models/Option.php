<?php

namespace Nucreativa\LaravelWordpressModels\Models;

use Illuminate\Database\Eloquent\Model;
use Nucreativa\LaravelWordpressModels\WordpressHelper;

class Option extends Model {
	protected $table = 'options';
	protected $primaryKey = 'option_id';
	public $timestamps = false;

	public static function getValue( $key = '' ) {
		$value = '';

		if ( $key ) {
			$value = self::where( 'option_name', '=', $key )->value( 'option_value' );
		}

		if ( WordpressHelper::isSerialized( $value ) ) {
			$value = unserialize( $value );
		}

		return $value;
	}
}
