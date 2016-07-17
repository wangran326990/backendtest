<?php

/**
 * Created by PhpStorm.
 * User: wr
 * Date: 2016/7/14
 * Time: 7:51
 */
class CSV extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function save_csv($data)
    {
        foreach($data as $row) {
            $this->db->insert('chat', $row);
        }
    }
}