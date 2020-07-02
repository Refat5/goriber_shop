<?php 
namespace App\Helpers;


class Gravater_helper 
{
		
		public static function validate_gravater($email)
	{
		$hash = md5($email);
		$uri ='http://www.gravater.com/avater/'.$hash . '?d=404';
		$headers = @get_headers($uri);
		if (!preg_match("|200|", $headers[0]))
		 {
			$has_valid_avater = FALSE;
		}
		else
		{
			$has_valid_avater = TRUE;
		}
		return $has_valid_avater;
	}

  
  public static function gravater_image($email,$size=0,$d="")	
  {
  	$hash = md5($email);
  	$image_url = 'http://www.gravatar.com/avatar/' . $hash. '?s='.$size.'&d='.$d;
  	return $image_url;
  }

}


