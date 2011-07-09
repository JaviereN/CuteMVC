<?php
class HomeController extends Controller
{
	public function beforeAction($parameters = array())
	{
		
	}
	
	public function index()
	{
		$this->view->display();
	}
	
	public function afterAction($parameters = array())
	{
		
	}
}
?>