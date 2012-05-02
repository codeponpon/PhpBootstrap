<?php
/**
 * @author : Guillaume Guerin
 *
 * Head
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
 * Generique head
 * @author Guillaume
 *
 */
class Head extends Tag {

    /**************************************************************************
	 *						       CONSTRUCTOR
	 *************************************************************************/

	/**
	 * constructor
	 */
	public function __construct() {
		parent::__construct("head");
	 }
	 
	 /**************************************************************************
	 *						           SETTERS
	 **************************************************************************/

	 /**
	  * Meta author
	  * @param string $author
	  */
	 public function addAuthor($author) {
	 	if ($author == NULL || !is_string($author)) return;
	 	
	 	$this->addContent(
	 		new Tag("meta", array("name" => "author", "content" => $author),
	 		NULL, true));
	 }
	 
	 /**
	  * 
	  * @param string $description
	  */
	 public function addDescription($description) {
	 	if ($description == NULL || !is_string($description)) return;
	 	
	 	$this->addContent(new Tag("meta",
	 		array("name" => "description", "content" => $description), NULL,
	 		TRUE));
	 }
	 
	 /**
	  * 
	  * @param array of string $listKeyWords
	  */
	 public function addKeyWords($listKeyWords) {
	 	if ($listKeyWords == NULL || !is_array($listKeyWords)) return;
	 	
	 	$str = "";
	 	foreach ($listKeyWords as $value) {
	 		$str .= $value + ",";
	 	}

	 	// remove ","
	 	$str = substr($str, 0, -1);
	 	
	 	$this->addContent(new Tag("meta",
	 		array("name" => "keywords", "content" => $str), NULL, true));
	 }
	 
	 
	 
}?>