<?php

/**
 * Created by IntelliJ IDEA.
 * User: pajdal97
 * Date: 3.4.17
 * Time: 13:36
 */
class Main
{

    public $modules = [];

    public function __construct()
    {
        $this->loadModules();
    }

    public function loadModules() {
        $dir = scandir("./modules");
        foreach($dir as $moduleName) {
            if($moduleName != "." && $moduleName != ".." && $moduleName != "Main.php")
            $this->modules[substr($moduleName,0,-4)] = $moduleName;
        }
    }

    public function __call($func,$a){
        if(in_array($func,$this->modules)){
            require './modules/';
            //array_unshift($a,$this->conn);
            //return call_user_func_array($func,$a);
        }else{
            // replace with your own error handler.
            die("$func is not a valid FTP function");
        }
    }}