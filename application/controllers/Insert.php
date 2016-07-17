<?php

/**
 * Created by PhpStorm.
 * User: wr
 * Date: 2016/7/14
 * Time: 7:28
 */

defined('BASEPATH') OR exit('No direct script access allowed');
class Insert extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function saveCSVData(){
        //$data="";
        $this->load->helper('execl');
        $this->load->model('CSV');
        $data=execl();
        $this->CSV->save_csv($data);
        
    }

    public function index(){

    }

}