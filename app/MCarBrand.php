<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MCarBrand extends Model
{
	protected $table = 'tblCarBrand';
	protected $primaryKey = 'strCarBrandId';
	protected $fillable = array('strCarBrandId','strCarBrandName','strCarBrandDesc', 'status');

	public function tmodel() {
		return $this->belongsTo('MTaxiModel', 'strCarBrandId', 'strCarBrandId');
	}
}
