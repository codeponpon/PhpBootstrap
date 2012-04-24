<?php 
/**
 * @author : Guillaume Guerin
 *
 * Description : Html Tag Class
 * 
 * @license MIT
 * @link https://github.com/GecTeam/PhpBootstrap
 * @copyright GecTeam 2012
 * @version 1.0
 * @version bootstrap 2.0.3
 */

namespace Library;

class Tag {

	private $cssProperty;
	private $javascript;
	private $option;
	private $name;
	private $unitaryTag;
	private $content;
	
	function __construct($name, $content = NULL ,$option = NULL,
	$unitaryTag = NULL, $javascript = NULL, $cssProperty = NULL) {
		$this->cssProperty = $cssProperty;
		// TODO Guillaume completer le const
	}
	
	
	function getHTML() {
		
	}
	
}

?>