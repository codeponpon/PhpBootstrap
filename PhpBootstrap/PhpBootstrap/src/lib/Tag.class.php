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
 */

// Name space of lib PhpBoostrap
namespace Lib;

// Need Page type for contexte
require_once 'Page.class.php';

/**
 * 
 * Generique HTML Tag
 * @author Guillaume
 *
 */
class Tag {
	
	/**************************************************************************
	 *						INTANCE VAR (private)
	 *************************************************************************/
	
	/**
	 * @example {"background-color" -> "white", ...}
	 * @var array of string (dic)
	 */
	private $_cssProperty;
	/** 
	 * @example {"oneclick"=>"", ...}
	 * @var array of string (dict)
	 */
	private $_javascript;
	/**
	 * @example {"charset" -> "UTF8"}
	 * @var array of string (dict)
	 */
	private $_option;
	/**
	 * @example {Tag(), Tag()}
	 * @var array
	 */
	private $_content;
	/**
	 * @var boolean true if it's unitary tag
	 */
	private $_unitaryTag;
	/**
	 * @example "p" or "body"
	 * @var string
	 */
	private $_name;
	/**
	 @var boolean true if this is just text
	 */
	private $_textOnly;
	
	
	/**************************************************************************
	 * 							PRIVATE STATIC VAR
	 *************************************************************************/
	
	/**
	 * Page is contexte to add library CSS, js...
	 * 
	 * @var Page $_contexte
	 */
	private static $_contexte;
	
	/**
	 * Mode for display (fixed or fluid)
	 * 
	 * @var int
	 */
	private static $_mode;
	
	
	/*************************************************************************
	 * 							CONSTANTE
	 ************************************************************************/
	
	/**
	 * Value for $_mode
	 *
	 * @var int
	 */
	const FLUID = 1;
	
	/**
	 * value for $_mode
	 * 
	 * @var int
	 */
	const FIXED = 2;
	
	/**************************************************************************
	 * 							Consctructor
	 *************************************************************************/
	
	/**
	 * 
	 * Construct of Tag
	 * @param string $name @example html
	 * 
	 * optional :
	 * @param array of string $option @example {key->val, {"chaset"->"UTF8"}
	 * @param array $content @example {Tag(), Tag()}
	 * @param boolean $unitaryTag
	 * @param array of string $javascript
	 * @param array of string $cssProperty
	 * @param boolean $textOnly
	 */
	public function __construct($name, $option = NULL, $content = NULL,
	$unitaryTag = false, $javascript = NULL, $cssProperty = NULL,
	$textOnly = false) {
		if ($name == NULL or !is_string($name)) {
			throw new \InvalidArgumentException("String is require!");
		}
		$this->_name = $name;
		
		$this->_option = $option;
		$this->_content = $content;
		$this->_unitaryTag = $unitaryTag;
		$this->_javascript = $javascript;
		$this->_cssProperty = $cssProperty;
		$this->_textOnly = $textOnly;
	}
	
	/**************************************************************************
	 * 								GETTERS
	 *************************************************************************/
	
	/**
	 * 
	 * @return string html code
	 */
	public function getHtml() {
		if ($this->_textOnly) {
			return $content;
		}
		
		$html = "<" . $this->_name;
		$html .= $this->compileCSS();
		$html .= $this->compileJavascript();
		$html .= $this->compileOption();
		
		if ($this->_unitaryTag) {
			return $html . '/>';
		}
		
		$html .= '>';
		
		if ($this->_content != NULL) {
			foreach ($this->_content as $value) {
				$html .= $value->getHtml();
			}
		}
		return $html . '</' . $this->_name . '>'; 
	}
	
	public final static function getMode() {
		return self::$_mode;
	}
	
	/**************************************************************************
	 * 								SETTERS
	 *************************************************************************/
	
	/**
	 * add Content into Tag
	 * @example <tag>content<tag>
	 * 
	 * @param Tag $content
	 */
	public final function addContent(Tag $content) {
		if ($content == NULL) return;
		
		if ($this->_content == NULL) {
			$this->_content = array($content);
			return;
		}
		
		$this->_content[count($this->_content)] = $content;
	}
	
	public final function addOption($option) {
		if ($option == NULL || is_array($option)) return;
		
		if($this->_option == NULL) {
			$this->option = array();
		}
		$this->_option = array_merge($this->_option, $option);
	}
	
	/**
	 * 
	 * @example entry : ["background-color"=>"white",...]
	 * @param array $property
	 */
	public final function addCSSProperty($property) {
		if ($property == NULL) return;
		
		if (!is_array($property)) {
			throw \InvalidArgumentException("Property need be array");
		}
		
		if ($this->_cssProperty == NULL) $this->_cssProperty = array();
		$this->_cssProperty = array_merge($this->_cssProperty, $property);
	}
	
	/**
	 * 
	 * @param array $javascript ["onclick"=>'alert("toto!");', ...]
	 */
	public final function addJavascript($javascript) {
		if ($javascript == NULL) return;
		
		if (!is_array($javascript)) {
			throw \InvalidArgumentException("javascript need be array");
		}
		
		if ($this->_javascript == NULL)$this->_javascript = array();
		$this->_javascript = array_merge($this->_javascript, $javascript);
	}
	
	/**
	 * 
	 * change contexte of Tag
	 * @param Page $contexte
	 */
	public static final function setContext(Page $contexte) {
		Tag::$_contexte = $contexte;
	}
	
	/**************************************************************************
	 * 						PRIVATE METHODE
	 *************************************************************************/
	
	/**
	 * Transforms the CSS list into HTML
	 * 
	 * @return string contain html code of CSS
	 * @example of return : style="background-color=white;...;"
	 */
	private function compileCSS() {
		if ($this->_cssProperty == NULL) {
			return "";
		}
		
		$html = " style=\"";
		foreach ($this->_cssProperty as $key => $value) {
			$html .= $key . '=' . $value . ';';
		}
		return $html . '"';
	}
	
	/**
	 * Transforms the javascript list into HTML
	 * 
	 * @return string contain js
	 */
	private function compileJavascript() {
		if ($this->_javascript == NULL) {
			return "";
		}
		
		$html = " ";
		foreach ($this->_javascript as $key => $value) {
			$html .= $key . '="' . $value . '" '; 
			
		}
		return $html;
	}
	
	/**
	 * 
	 * Transforms the option list into HTML
	 * 
	 * @return string contain html code of option
	 * @example of return : charset="UTF8"
	 */
	private function compileOption() {
		if ($this->_option == NULL) {
			return "";
		}
		
		$html = " ";
		foreach ($this->_option as $key => $value) {
			$html .= $key . '="' . $value . '" '; 	
		}
		return $html;
	}
	
} ?>