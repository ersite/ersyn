<?php

/**
 * Created by IntelliJ IDEA.
 * User: pajdal97
 * Date: 3.4.17
 * Time: 13:33
 */
class Ac
{
    public $db = [];
    public $ftp = [];

    public function __construct()
    {
        global $_CONFIG;
        foreach($_CONFIG['db'] as $id) {
            $this->addDatabase($id,$);
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