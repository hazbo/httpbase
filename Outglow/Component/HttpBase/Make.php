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

class Make
{
	/**
	 * CREATE CONTAINER FOR THE CURL OBJECT
	 * AND THE JSON POST OBJECT
	 * @var Object
	 * @var Object
	*/
	private $curl;
	private $json;
	
	/**
	 * - makeRequest
	 * MAKES THE REQUEST BASED ON TYPE CALLED
	 * THROUGH THE MAKE OBJECT
	 * @param String
	 * @param String
	 * @param Array
	 * @param Function
	 */
	private function makeRequest($type, $url, $vars = array(), $callback = NULL)
	{
		$types = array('head','get','post','put','delete');
		if(! in_array($type, $types ) ) {
			throw new \InvalidArgumentException("Request type " . $type . " was not recognised");
		}
		$response = $this->curl->$type($url, $vars);
		if (!is_null($callback)) {
			return $callback($response);
		}
		return $response;
	}

	/**
	 * - constructor
	 * ASSIGNS THE CURL PROPERTY TO
	 * AN INSTANCE OF THE CURL CLASS
	 * @return NULL
	 */
	public function __construct()
	{
		$this->curl = new Curl_Curl();
		$this->json = new Json_Request();
	}

	/**
	 * - head
	 * CREATES A HEAD REQUEST USING
	 * THE CURL OBJECT
	 * @param String
	 * @param Array
	 * @param Function
	 * @return String
	 */
	public function head($url, $vars = array(), $callback = NULL)
	{
		return $this->makeRequest('head', $url, $vars, $callback );
	}

	/**
	 * - get
	 * CREATES A GET REQUEST USING
	 * THE CURL OBJECT
	 * @param String
	 * @param Array
	 * @param Function
	 * @return String
	 */
	public function get($url, $vars = array(), $callback = NULL)
	{
		return $this->makeRequest('get', $url, $vars, $callback );
	}

	/**
	 * - post
	 * CREATES A POST REQUEST USING
	 * THE CURL OBJECT
	 * @param String
	 * @param Array
	 * @param Function
	 * @return String
	 */
	public function post($url, $vars = array(), $callback = NULL)
	{
		return $this->makeRequest('post', $url, $vars, $callback );
	}

	/**
	 * - put
	 * CREATES A PUT REQUEST USING
	 * THE CURL OBJECT
	 * @param String
	 * @param Array
	 * @param Function
	 * @return String
	 */
	public function put($url, $vars = array(), $callback = NULL)
	{
		return $this->makeRequest('put', $url, $vars, $callback );
	}

	/**
	 * - delete
	 * CREATES A DELETE REQUEST USING
	 * THE CURL OBJECT
	 * @param String
	 * @param Array
	 * @param Function
	 * @return String
	 */
	public function delete($url, $vars = array(), $callback = NULL)
	{
		return $this->makeRequest('delete', $url, $vars, $callback );
	}

	/**
	 * - postJson
	 * ALLOWS YOU TO POST A JSON
	 * STRING TO A URL USING POST
	 * @param String
	 * @param Array/JSON
	 * @return String
	 */
	public function postJson($url, $data)
	{
		if (is_array($data)) {
			$data = json_encode($data);
		}
		return $this->json->post($url, $data);
	}
}

?>