<?php
namespace App\Helpers;


/**
 * image helper class
 */
use App\User;
use App\Helpers\Gravater_helper;
class Image_helper
{
	
	public static function getUserImage($id)
	{
		$user = User::find($id);
		$avatar_url = "";
		if (!is_null($user))
	   {
	   	if ($user->avatar == NULL)
	   	 {
 
				//return him gravatar image
		   	if (Gravater_helper::validate_gravater($user->email))
		   	{
		   		$avatar_url = Gravater_helper::gravater_image($user->email,100);
		   	}
		   	else
		   	{
		   		//when ther is no gravatar image
		   		$avatar_url = url('images/defaults/user.jpg'); 

		   	}
		}
		else
		{
			//return that image
			$avatar_url = url('images/user/'.$user->avatar);

		}

	}
	else
	{
		//return redirect()->route('index');
	}
	return $avatar_url;
 }
}