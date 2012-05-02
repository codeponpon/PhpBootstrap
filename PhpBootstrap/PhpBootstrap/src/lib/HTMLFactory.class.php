<?php
/**
 * @author : Guillaume Guerin
 *
 * Factory to creat default HTML element
 * 
 * @license MIT
 * @link https://github.com/GecTeam/PhpBootstrap
 * @copyright GecTeam 2012
 * @version 1.0
 */

namespace Lib;

// Tag...

require_once 'Body.class.php';
require_once 'Head.class.php';
require_once 'Header.class.php';
require_once 'Nav.class.php';
require_once 'Footer.class.php';

require_once 'BodyContainer.class.php';



/**
 * 
 * factory
 * @author Guillaume
 *
 */
final class HTMLFactory {
	
	private function __construct() {}
	
	
	/**
	 * 
	 * @return Head
	 */
	public final static function default_head() {
		return new Head();
	}

	/**
	 * 
	 * @return Header
	 */
	public final static function default_header() {
		return new Header();
	}

	/**
	 * 
	 * @return Footer
	 */
	public final static function default_footer() {
		return new Footer();
	}
	
	/**
	 * 
	 * @return Nav
	 */
	public final static function default_nav() {
		return new Nav();
	}
	
	/**
	 * 
	 * @return Body
	 */
	public final static function default_body() {
		return new Body();
	}
	
	/**
	 * 
	 * @return BodyContainer
	 */
	public final static function default_bodyContainer() {
		return new BodyContainer();
	}

}?>