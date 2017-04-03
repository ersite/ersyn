<?php

/**
 * Created by IntelliJ IDEA.
 * User: pajdal97
 * Date: 3.4.17
 * Time: 13:30
 */
class Config
{
    public $get = [];

    public function __construct($main)
    {
        $this->main = $main;
        $this->configList();
    }

    private function configList() // Get list of config files
    {
        foreach(scandir("./config/") as $fileName)
        {
            if($this->main->isValidDir($fileName)) $configList = $fileName;
        }
        return $configList;
    }

    public function getConfig($force=false) // Update global config variable
    {
        if($force == true) unset($this->get);
        $configList = $this->configList();
        foreach($configList as $fileName) {
            unset($_CONFIG); $_CONFIG = []; // Clear variable $_CONFIG to next use
            include './config/'.$fileName;
            $this->get[substr($fileName,0,-4)] = $_CONFIG;
        }
    }

}