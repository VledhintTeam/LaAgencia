<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
	protected $table = 'contacts';	
	protected $fillable = ['team_id', 'name', 'phone', 'email', 'sticky_phone_number_id'];

	/**
	 * Relation function
	 *
	 * @return void
	 */
	public function attributes()
	{
		return $this->hasMany('App\Models\CustomAttribute', 'contact_id');
	}
	

}
