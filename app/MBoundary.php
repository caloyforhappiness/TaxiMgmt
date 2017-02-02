<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MBoundary extends Model
{
    //

    protected $table = 'tblboundary';
	protected $primaryKey = 'strBoundaryId';
	protected $fillable = array('strBoundaryId','strBoundaryName','strBoundaryDesc','dblBoundaryAmt', 'status');

	public function bdbound() {
		return $this->belongsTo('MBDBoundary', 'strBoundaryId', 'strBoundaryId');
	}
}
