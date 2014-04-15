<?php
	$_ = new stdClass();

	if(substr($_SERVER['DOCUMENT_ROOT'], -1) == '/')
		$_->raiz = substr($_SERVER['DOCUMENT_ROOT'], 0, -1);
	else $_->raiz = $_SERVER['DOCUMENT_ROOT'];

	if(file_exists($_->raiz."/util/autoload.php"))
		include_once($_->raiz."/util/autoload.php");
	if(file_exists($_->raiz."/util/autoload.php"))
		include_once($_->raiz."/util/Util.php");

	$url = $_->raiz."/_data.json";
    $json = file_get_contents($url);
    $_data = json_decode($json, TRUE);
    if(function_exists("json_last_error") && json_last_error() != JSON_ERROR_NONE){
		throw new LogicException("O JSON _data contém um erro");
	}
   	foreach($_data as $key => $d){
   		$_->$key = $d;
   	}

	if(isset($_GET['folder']))
		$_->folder = $_GET['folder'];
	else $_->folder = 'index';

	if(isset($_GET['file']))
		$_->file = $_GET['file'];
	else if($_->folder != 'index')
		$_->file = 'index';
	else $_->file = '';

	$_->bodyClass = '';
	if($_->folder != ''){
		$_->bodyClass = $_->folder;
		if($_->file != '')
			$_->bodyClass .= '-'.$_->file;
	}

	if($_->folder == 'index'){
		$container = $_->raiz.'/'.$_->appPath.'/index.php';
	}else $container = $_->raiz.'/'.$_->appPath.'/'.$_->folder."/".$_->file.".php";

	if(file_exists($container)){
		$_->container = $container;
	}else{
		$container = $_->raiz.'/'.$_->appPath.'/'.$_->folder."/404.php";
		if(file_exists($container)){
			$_->container = $container;
		}else $_->container = $_->raiz.'/'.$_->appPath.'/errors/404.php';
	}

   	if($_->folder != 'index'){
   		$url = $_->raiz.'/'.$_->appPath.'/'.$_->folder."/_data.json";
   		if(file_exists($url)){
		    $json = file_get_contents($url);
		    $_data = json_decode($json, TRUE);
			if(function_exists("json_last_error") && json_last_error() != JSON_ERROR_NONE){
				throw new LogicException("O JSON _data contém um erro");
			}
		   	foreach($_data as $key => $d){
		   		if($key == "assets"){
		   			$_->assets['scripts'] = array_merge($_->assets['scripts'], $d['scripts']);
		   			$_->assets['styles'] = array_merge($_->assets['styles'], $d['styles']);
		   			$_->assets['fonts'] = array_merge($_->assets['fonts'], $d['fonts']);
		   		}else{
		   			$_->$key .= $d;
		   		}
		   	}
		}
   	}
   	

	/**
	 * Inclui todos os arquivos .php em /helpers ----------------------------------------------
	 */

	foreach(glob($_->raiz.'/helpers/*.php') as $filename){ include_once($filename); }
?>