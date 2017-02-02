<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MTaxiModel extends Model
{
    protected $table = 'tbtaxiowned';
	protected $primaryKey = 'strTaxiOwnedId';
	protected $fillable = array('strTaxiOwnedId','strTaxiOwnedMName','strTaxiOwnedPNum','strTaxiOwnedDesc', 'status','strCarBrandId');

	public function cbrand() {
		return $this->hasMany('tblCarBrand', 'strCarBrandId');
	}
}
