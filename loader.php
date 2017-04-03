<?php
/**
 * Created by IntelliJ IDEA.
 * User: pajdal97
 * Date: 3.4.17
 * Time: 13:22
 */
require "./modules/Main.php";
$MAIN = new Main();

//print_r($MAIN->modules);
foreach($MAIN->modules as $name => $fileName)
{
    include "./modules/".$fileName.".php";
}


$_ERSYN['path'] = $_GET['ERSYN_path'];
$_ERSYN['GET'] = $_GET;
$_ERSYN['POST'] = $_POST;


if(substr($_ERSYN['path'],-1) == "/" || substr($_ERSYN['path'],-1) == "") $_ERSYN['path'] .= "index";
$pathLoad = './pages/'.$_ERSYN['path'].'.php';
if(!file_exists($pathLoad)) $pathLoad = "./templates/default/404.php";
include $pathLoad;