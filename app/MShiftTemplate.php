<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MShiftTemplate extends Model
{
    protected $table = 'tblshifttemplate';
	protected $primaryKey = 'strShiftTemplateId';
	protected $fillable = array('strShiftTemplateId','strShiftTemplateName','status');

	public function stdays() {
		return $this->belongsTo('MSTDaysShift', 'strSTShiftTempateId', 'strShiftTemplateId');
	}
}
