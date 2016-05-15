<?php
session_start();
require_once('config.php');
function  __autoload($class_name){ //fonction prédifinie qui permet de charger les class

	$class=explode('_', $class_name);// diviser le string la resultat un tableau
	$path=implode('/', $class).'.php';//concatener le tableau et la res string
	require_once($path);
}

