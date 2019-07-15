<?php

class Pages extends controller
{
	public function __construct()
	{
		
	}
	public function index()
	{
		$this->view('pages/index' ,['title'=> 'welcome']);
	}

	public function about()
	{
		$this->view('pages/about');
	}

}