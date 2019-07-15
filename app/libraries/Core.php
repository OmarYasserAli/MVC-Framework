<?php

/*
 * App core class
 * Create Url & load core controller 
 * URL format -/controller/method/params
 */


class Core
{
	protected $currentController = 'pages';
	protected $currentMethod ='index';
	protected $params = [5];

	public function __construct()
	{
		//print_r ($this->getUrl());
		$url = $this->getUrl();

		if(file_exists('../app/controllers/' .ucwords($url[0]). '.php')){
			$this->currentController = ucwords($url[0]);
			unset($url[0]);
		}

		// require controller

		require_once '../app/controllers/'.$this->currentController .'.php' ;
		// instatiate controller
		$this->currentController = new $this->currentController;

		//-------------
		// the second part of url 

		if (isset($url[1])){
			if(method_exists($this->currentController, $url[1])){
					$this->currentMethod =$url[1];
					unset($url[1]);

			}
		}
		// Get params

		$this->params = $url ? array_values($url) : [0];
		
		call_user_func_array([$this->currentController , $this->currentMethod], $this->params);
	}

	

	public function getUrl(){
		if(isset($_GET['url']))
		{
			$url =  rtrim($_GET['url'], '/');
			$url = filter_var($url , FILTER_SANITIZE_URL);
			$url = explode('/', $url);
			return $url;
		}
	}
}