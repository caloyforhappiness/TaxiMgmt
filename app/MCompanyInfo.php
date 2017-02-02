<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MCompanyInfo extends Model
{
    //
    protected $table = 'tblcompany';
	protected $primaryKey = 'strCompanyId';
	protected $fillable = array('strCompanyId','strCompanyName','strCompanyAddress','strCompanyContNo','strCompanyLogo','strCompanyEmail','tmCompanyWHFrom','tmCompanyWHTo');
}
