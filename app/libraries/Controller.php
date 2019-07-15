<?php

/*
 * Base Controller
 * load moadel and view
 */


class controller
{
	//Load Model
	public function model($model){
		require_once '../app/model'.$model .'.php';

		//instantiate the nodel
		return new $model();
	}


	public function view($view , $data= []){
		if (file_exists('../app/views/'.$view.'.php' )){
			require_once'../app/views/'.$view.'.php'  ;
		}
		else
		{
			die('view does not exists');
		}
	}
	
}