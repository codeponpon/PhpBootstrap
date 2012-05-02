<?php
/**
 * @author : Guillaume Guerin
 *
 * description struct generique HTMl page
 * 
 * @license MIT
 * @link https://github.com/GecTeam/PhpBootstrap
 * @copyright GecTeam 2012
 * @version 1.0
 */

// Name space of lib PhpBoostrap
namespace Lib;

require_once 'Tag.class.php';

// HTML factory :
require_once 'HTMLFactory.class.php';
require_once 'MetaLink.class.php';


/**
 * 
 * Generique HTML Page
 * @author Guillaume
 *
 */
class Page extends Tag {
	
	/**************************************************************************
	 *						INTANCE VAR (private)
	 *************************************************************************/
	
	/**
	 * Head -> html tag <head></head>
	 * contain metadata
	 * 
	 * @var Head
	 */
	private $_head;
	
	/**
	 * @example <body></body>
	 * @var Body
	 */
	private $_body;
	
	/**
	 * @example <header></header>
	 * @var Header
	 */
	private $_header;
	
	/**
	 * @example <nav></nav>
	 * @var Nav
	 */
	private $_nav;
	
	/**
	 * @example <footer></footer>
	 * @var Footer
	 */
	private $_footer;
	
	
	/**************************************************************************
	 * 								CONSTRUCTOR
	 *************************************************************************/
	
	/**
	 * 
	 * Create HTML5 page
	 * @param Head $head
	 * @param Body $body
	 * @param Nav $_nav
	 * @param Header $header
	 * @param Nav $nav
	 * @param Footer $footer
	 */
	public function __construct(Head $head = NULL, Body $body = NULL,
	Nav $_nav = NULL, Header $header = NULL, Nav $nav = NULL,
	Footer $footer = NULL) {
		// super constructor :
		parent::__construct("html");
		
		// set default conexte
		$this::setContext($this);
		
		// head
		if ($head == NULL) $this->_head = HTMLFactory::default_head();
		else $this->_head = $head;
		
		// body
		if ($body == NULL) $this->_body = HTMLFactory::default_body();
		else $this->_body = $body;
		
		// nav
		if ($nav == NULL) $this->_nav = HTMLFactory::default_nav();
		else $this->_nav = $nav;
		
		// footer
		if ($footer == NULL) $this->_footer = HTMLFactory::default_footer();
		else $this->_footer = $footer;
		
		// header
		if ($header == NULL) $this->_header = HTMLFactory::default_header();
		else $this->_header = $header;
		
		
		// add header, nav and footer into body
		$this->_body->addContent($this->_header);
		$this->_body->addContent($this->_nav);
		$this->_body->addContainer(HTMLFactory::default_bodyContainer());
		
		$this->_body->addContent($this->_footer);
		
		// add into Page
		$this->addContent($this->_head);
		$this->addContent($this->_body);
		
		
		// link bootstrap
		$this->_head->addContent(new MetaLink("stylesheet",
			$_SERVER["PHP_SELF"] . "/bootstrap/less/bootstrap.less"));
	}
	
	/**
	 * 
	 * Add element
	 * @param Tag $element
	 */
	public function addElement(Tag $element) {
		$this->_body->addElement($element);
	}
}
?>