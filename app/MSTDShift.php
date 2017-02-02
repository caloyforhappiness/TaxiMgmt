<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MSTDShift extends Model
{
    protected $table = 'tblstdaysshift';
	protected $primaryKey = 'strSTDSId';
	protected $fillable = array('strSTDSId','strSTShiftTempateId','intSTDay','tmSTShiftIn','tmSTShiftOut','status');
	
	public function shifttemp() {
		return $this->hasMany('MShiftTemplate', 'strShiftTemplateId');
	}
}
