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
    public $com = [];

    public function __construct()
    {
        $this->loadModules();
    }

    public function modulesLoaded()
    {
        $this->config = new Config($this);
    }

    public static function isValidDir($name) {
        return ($name != "." && $name != "..")? true : false;
    }

    public function loadModules() {
        $dir = scandir("./modules");
        foreach($dir as $moduleName) {
            if($moduleName != "." && $moduleName != ".." && $moduleName != "Main.php")
            $this->modules[] = substr($moduleName,0,-4);
        }
    }

    public function __call($func,$a){
        if(in_array($func,$this->modules)){
            array_unshift($a,$this);
            $return = "";
            foreach($a as $num => $data) {
                $end[] = '$a['.$num.']';
            }
            eval('$return = new '.$func.'('.implode(",",$end).');');
            return $return;
        }
    }
}