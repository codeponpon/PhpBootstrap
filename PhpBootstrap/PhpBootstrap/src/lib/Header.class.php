<?php
/**
 * @author : Guillaume Guerin
 *
 * Header
 * 
 * @license MIT
 * @link https://github.com/GecTeam/PhpBootstrap
 * @copyright GecTeam 2012
 * @version 1.0
 */

// name space for lib PhpBoostrap
namespace Lib;

// parent
require_once 'Tag.class.php';


/**
 * 
 * Generique Header
 * @author Guillaume
 *
 */
class Header extends Tag {
	
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
		parent::__construct("header");
	}
	 
	 /**************************************************************************
	 *						           GETTERS
	 **************************************************************************/
	 
	 
	 /**************************************************************************
	 *						           SETTERS
	 **************************************************************************/

}?>