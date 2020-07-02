<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
	public $fillable=
	[
		'email',
		'phone',
		'address',
		'shipping_cost'


	];
	



}
