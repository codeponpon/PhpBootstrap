<?php
/**
 * @author : Guillaume Guerin
 *
 * Footer
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
 * Generique Footer
 * @author Guillaume
 *
 */
class Footer extends Tag {
	
	/**************************************************************************
	 *						INTANCE VAR (private)
	 *************************************************************************/


    /**************************************************************************
	 *						       CONSTRUCTOR
	 *************************************************************************/
	 
	/**
	 * constructor
	 */
	public function __construct() {
		parent::__construct("footer");
	}
	 
	 /**************************************************************************
	 *						           GETTERS
	 **************************************************************************/
	 
	 
	 /**************************************************************************
	 *						           SETTERS
	 **************************************************************************/

}?>