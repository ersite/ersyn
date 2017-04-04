<?php
/**
 * Created by IntelliJ IDEA.
 * User: pajdal97
 * Date: 3.4.17
 * Time: 13:22
 */

// Load config
foreach(scandir("./config/") as $fileName)
{
    if($fileName != "." && $fileName != "..") require "./config/".$fileName;
}

// Init module system
require "./modules/Main.php";
$MAIN = new Main();

$_ERSYN['path'] = $_GET['ERSYN_path'];
unset($_GET['ERSYN_path']);

$MAIN->Ac();

// Load page by
if(substr($_ERSYN['path'],-1) == "/" || substr($_ERSYN['path'],-1) == "") $_ERSYN['path'] .= "index";
$pathLoad = './pages/'.$_ERSYN['path'].'.php';
if(!file_exists($pathLoad)) $pathLoad = "./templates/".$_CONFIG['templ']['defaultTemplate']."/404.php";
include $pathLoad;