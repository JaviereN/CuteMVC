<?php
class TestsController extends Controller
{
	public function beforeAction($parameters = array())
	{
		
	}
	
	public function index()
	{
		$this->view->set('nombre', 'Admin!');
		$this->view->display();
	}
	
	public function afterAction($parameters = array())
	{
		
	}
}
?>