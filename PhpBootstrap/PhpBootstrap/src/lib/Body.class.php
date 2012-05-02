<?php
/**
 * @author : Guillaume Guerin
 *
 * body
 * 
 * @license MIT
 * @link https://github.com/GecTeam/PhpBootstrap
 * @copyright GecTeam 2012
 * @version 1.0
 */

// name space for lib PhpBoostrap
namespace Lib;

// parent class
require_once 'Tag.class.php';


/**
 * 
 * description...
 * @author Guillaume
 *
 */
class Body extends Tag {
	
	/**************************************************************************
	 *						INTANCE VAR (private)
	 *************************************************************************/

	private $_container;

    /**************************************************************************
	 *						       CONSTRUCTOR
	 *************************************************************************/
	 
	/**
	 * constructor
	 */
	public function __construct() {
		parent::__construct("body");
		$this->_container = NULL;
	}
	 
	 /**************************************************************************
	 *						           GETTERS
	 **************************************************************************/
	 
	 
	 /**************************************************************************
	 *						           SETTERS
	 **************************************************************************/

	/**
	 * 
	 * Add container
	 * @param BodyContainer $bodyContainer
	 */
	public function addContainer(BodyContainer $bodyContainer) {
		$this->_container = $bodyContainer;
		$this->addContent($bodyContainer);
	}
	
	/**
	 * 
	 * Add element in container
	 * @param Tag $element
	 * @throws \Exception if container is NULL
	 */
	public function addElement(Tag $element) {
		if ($element == NULL) return;
		if ($this->_container == NULL) {
			throw new \Exception("Container not define in body");
		}
		
		$this->_container->addContent($element);	
	}
	
}?>