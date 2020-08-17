<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomAttribute extends Model
{
	protected $table = 'custom_attributes';	
	protected $fillable = ['contact_id', 'key', 'value'];

	/**
	 * undocumented function
	 *
	 * @return void
	 */
	public function contact()
	{
		return $this->belongsTo('App\Models\Contact', 'contact_id');
	}
	
}
