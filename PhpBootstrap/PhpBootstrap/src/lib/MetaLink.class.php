<?php
/**
 * @author : Guillaume Guerin
 *
 * Tag Link in head
 * 
 * @license MIT
 * @link https://github.com/GecTeam/PhpBootstrap
 * @copyright GecTeam 2012
 * @version 1.0
 */

// name space for lib PhpBoostrap
namespace Lib;

require_once 'Tag.class.php';

/**
 * 
 * <Link rel="stylesheet" href="">
 * @author Guillaume
 *
 */
class MetaLink extends Tag {

    /**************************************************************************
	 *						       CONSTRUCTOR
	 *************************************************************************/
	 
	/**
	 * 
	 * construct link
	 * @param string $type @example "stylesheet"
	 * @param string $href @example "../bootstrap/less/bootstrap.less"
	 */
	public function __construct($type, $href) {
		parent::__construct("link",
			array("rel" => $type,
				"href" => $href), NULL, true);
	}
}?>