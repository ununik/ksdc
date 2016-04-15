<?php
class HTML
{
	private $_title = '';
	private $_getPage = 'home';
	private $_topNavigation = array();
	private $_sideNavigation = array();
	private $_content = '';
	private $_metaDescription = 'Stránky církve Křesťanské společenství Děčín.';
	
	public function setPage($new)
	{
		$this->_getPage = $new;
	}
	public function getPage()
	{
		return $this->_getPage;
	}
	
	public function setTitle($new)
	{
		$this->_title = $new;
	}
	public function getTitle()
	{
		return $this->_title;
	}
	
	public function addToTopNavigation($new)
	{
		$this->_topNavigation[] = $new;
	}
	public function getTopNavigation()
	{
		return $this->_topNavigation;
	}
	
	public function addToSideNavigation($new)
	{
	    $this->_sideNavigation[] = $new;
	}
	public function getSideNavigation()
	{
	    return $this->_sideNavigation;
	}
	
	public function addToContent($new)
	{
		$this->_content .= $new;
	}
	public function getContent()
	{
		return $this->_content;
	}
	public function setDescription($new)
	{
	    $this->_metaDescription = $new;
	}
	public function getDescription()
	{
	    return $this->_metaDescription;
	}
}