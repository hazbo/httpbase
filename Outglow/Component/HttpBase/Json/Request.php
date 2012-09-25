<?php namespace Outglow\Component\HttpBase;

/**
 * SIMPLE SET OF FILES THAT ALLOW
 * YOU TO DEAL WITH HTTP REQUESTS
 * ELEGANTLY
 * 
 * FEEL FREE TO USE / MODIFY ANY OF THIS
 * CODE FOR YOUR OWN PROJECTS
 * OPEN SOURCE / COMMERCIAL
 *
 * @author Harry Lawrence
 * @copyright Outglow Components 2012
 * @package HttpBase
 * @version 1.0
 * @license The MIT License (MIT)
*/

class Json_Request
{
	/**
	 * - post
	 * POSTS JSON DATA TO A URL
	 * USING HTTP POST
	 * @param String
	 * @param JSON
	 * @return String
	 */
	public function post($url, $jsonData)
	{
		$stream = curl_init($url);
		curl_setopt($stream, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($stream, CURLOPT_POSTFIELDS, $jsonData);                                                                  
		curl_setopt($stream, CURLOPT_RETURNTRANSFER, true);                                                                      
		curl_setopt($stream, CURLOPT_HTTPHEADER, array(
		    'Content-Type: application/json',                                                                                
		    'Content-Length: ' . strlen($jsonData))                                                                       
		);
		return curl_exec($stream);
	}
}

?>