<?php

/**
 * Created by PhpStorm.
 * User: wr
 * Date: 2016/7/17
 * Time: 5:23
 */
class API extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_api_data(){
        $query = $this->db->get('chat');
        return $query->result();
    }

    public function get_api_data_by_id($id){
         $this->db->select('*');
         $this->db->from('chat');
         $this->db->where('id', $id);
         $query =$this->db->get();
        return $query->result();
    }

    public function get_api_data_larger_than_date($date){

        $this->db->select('*');
        $this->db->from('chat');
        $this->db->where('date >=',$date);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_api_data_smaller_than_date($date){

        $this->db->select('*');
        $this->db->from('chat');
        $this->db->where('date <=',$date);
        $query = $this->db->get();
        return $query->result();
    }
}