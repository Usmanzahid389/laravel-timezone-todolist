<?php
namespace App\Helpers;

class TimezoneHelper
{ 

  public function getTimeZone($request)
  {

		$ip = $request->ip();   
		$ipInfo = file_get_contents('http://ip-api.com/json/' . $ip);
		$ipInfo = json_decode($ipInfo);
	 
	 

		 
			$timezone = @$ipInfo->timezone;
		 
		return $timezone;
 
		 
  }



}