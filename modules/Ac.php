<?php

/**
 * Created by IntelliJ IDEA.
 * User: pajdal97
 * Date: 3.4.17
 * Time: 13:33
 */
class Ac extends Main
{
    public $db = [];
    public $ftp = [];
    private $MAIN = [];

    public function __construct($main)
    {
        global $_CONFIG;
        $this->MAIN = $main;

        if(count($_CONFIG['db']) > 0) {
            foreach ($_CONFIG['db'] as $id => $dbData) {
                $this->addDatabase($id, $dbData['host'], $dbData['user'], $dbData['pass'], $dbData['database']);
            }
        }

    }

    public function addDatabase($id,$host,$username,$password,$database) {
        $this->db[$id] = new mysqli($host, $username, $password,$database);
    }

    public function useDatabase($id,$query) {
        $query = $this->db[$id]->query($query);
        while($row = $query->fetch_accos()) {
            $return[] = $row;
        }
        return $row;
    }

}