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

class Query
{
	/**
	 * CREATES THE TWO GET AND
	 * POST CONTAINER PROPERTIES
	 * @var array
	 * @var array
	 */
	private $get;
	private $post;

	/**
	 * - setGet
	 * SETS THE GET PROPERTY TO
	 * THE VALUES OF SUPER
	 * GLOBAL, GET
	 * @return bool
	 */
	private function setGet()
	{
		return $this->get = $_GET;
	}

	/**
	 * - setPost
	 * SETS THE GET PROPERTY TO
	 * THE VALUES OF SUPER
	 * GLOBAL, POST
	 * @return bool
	 */
	private function setPost()
	{
		return $this->post = $_POST;
	}

	/**
	 * - getGet
	 * RETURNS THE VALUE OF
	 * PROPERTY GET
	 * @return array
	 */
	private function getGet()
	{
		return $this->get;
	}

	/**
	 * - getGet
	 * RETURNS THE VALUE OF
	 * PROPERTY POST
	 * @return array
	 */
	private function getPost()
	{
		return $this->post;
	}

	/**
	 * - constructor
	 * CALLS SETGET AND SETPOST
	 * METHODS
	 * @return NULL
	 */
	public function __construct()
	{
		$this->setGet();
		$this->setPost();
	}

	/**
	 * - get
	 * RETURNS EITHER STRING
	 * VALUE OF ARRAY GET OF
	 * THE GET PROPERTY OR
	 * ARRAY IF KEY IS UNSET
	 * @param NULL/String
	 * @return String/NULL
	 */
	public function get($key = NULL)
	{
		if (!is_null($key)) {
			$local = $this->getGet();
			if (!isset($local[$key]))
			{
				return NULL;
			}
			return $local[$key];
		}
		return $this->getGet();
	}

	/**
	 * - post
	 * RETURNS EITHER STRING
	 * VALUE OF ARRAY POST OF
	 * THE POST PROPERTY OR
	 * ARRAY IF KEY IS UNSET
	 * @param NULL/String
	 * @return String/NULL
	 */
	public function post($key = NULL)
	{
		if (!is_null($key)) {
			$local = $this->getPost();
			if (!isset($local[$key]))
			{
				return NULL;
			}
			return $local[$key]; 
		}
		return $this->getPost();
	}
}

?>