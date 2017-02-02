<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MBDBoundary extends Model
{
    //
    protected $table = 'tblbreakboundary';
	protected $primaryKey = 'strBreakBoundaryId';
	protected $fillable = array('strBreakBoundaryId','strBreakBoundaryName','dblBreakBoundaryAmt','status','strBoundaryId');
	
	public function boundtemp() {
		return $this->hasMany('MBoundary', 'strBoundaryId');
	}
}
