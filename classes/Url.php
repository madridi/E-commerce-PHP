<?php
class Url{
	public static $_page="page";
	public static $_folder=PAGES_DIR;
	public static $_params=array();

	public static function getParam($par){
		return isset($_GET[$par]) && $_GET[$par] != ""?
		       $_GET[$par] :
		       null ;
	}

	public static function cPage(){
		return isset($_GET[self::$_page])?
			   $_GET[self::$_page]:
			   "index";
	}

	public static function getPage(){
		$page=self::$_folder.DS.self::cPage().'.php';
		$erreur=self::$_folder.DS.'erreur.php';
		return (is_file($page))?
			 $page:
		     $erreur;
	}

	public static function getAll(){
		if (!emty($_GET))
			foreach($_GET as $key=>$value){
				if (!emty($value))
					self::$_params[$key]=$value;
			}
	}
}
?>