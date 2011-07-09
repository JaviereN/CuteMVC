<?php
class View
{
	protected $_twigLoader;
	protected $_twigEnv;
	protected $_variables = array();
	protected $_template;
	protected $_templateName;
	
	public function __construct($templateName, $templateBasePath, $envOptions = array())
	{
		$this->_templateName = $templateName;
		$this->_twigLoader = new Twig_Loader_Filesystem($templateBasePath);
        $this->_twigEnv = new Twig_Environment($this->_twigLoader, $envOptions);
	}
	
	public function set($key, $value)
    {
        $this->_variables[$key] = $value;
    }
	
	protected function _clearVars()
    {
        $this->_variables = array();
    }
	
	private function _loadTemplate()
    {
        $template = $this->_twigEnv->loadTemplate($this->_templateName);
        $this->_template = $template;
    }
    
	public function render()
    {
    	$this->_loadTemplate();
    	$render = $this->_template->render($this->_variables);
    	$this->_clearVars();
		return $render;
    }
	
    public function display()
    {
    	$this->_loadTemplate();
    	$this->_template->display($this->_variables);
    	$this->_clearVars();
    }
}
?>