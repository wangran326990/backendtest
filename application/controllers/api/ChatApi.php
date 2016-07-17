<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class ChatApi extends REST_Controller {

    private $api_data;
    private $api_data_by_id;
    private $api_data_larger_than_date;
    private $api_data_smaller_than_date;
    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
    }
    // api get method
    public function users_get()
    {
        // Users from a data store e.g. database
        $this->load->model('API');
        //get all  api data;
        $this->api_data = $this->API->get_api_data();
        //check input parameters
        $id = $this->get('id');
        $start_date = $this->get('start_date');
        $end_date = $this->get('end_date');

        if($id===NULL && $start_date===NULL && $end_date===NULL){
            $this->response($this->api_data, REST_Controller::HTTP_OK);
        }
        //have id parameter
        if($id!==NULL && $start_date===NULL && $end_date===NULL){
            //get api data by id;
            $this->api_data_by_id = $this->API->get_api_data_by_id($id);
            if($this->api_data_by_id){
                $this->response($this->api_data_by_id, REST_Controller::HTTP_OK);
            }else{
                $this->response([
                    'status' => FALSE,
                    'message' => 'No record was found'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }

        //have start date parameter? get api data larger than $start_date;
        else if($start_date!==NULL && $id===NULL && $end_date===NULL){
            //check date format

            if(preg_match('/^(\d{4})-(0?[1-9]|1[012])-(0?[1-9]|1[0-9]|2[0-9]|3[01])$/', $start_date)) {
                $start_date= strtotime($start_date);
                $this->api_data_larger_than_date = $this->API->get_api_data_larger_than_date(date('Y-m-d',$start_date));
            }else{
                $this->response([
                    'status' => FALSE,
                    'message' => 'Not Valid date format'
                ], REST_Controller::HTTP_NOT_FOUND);
            }

            //if get api data return data, if not return not find information
            if($this->api_data_larger_than_date && isset($this->api_data_larger_than_date)){
                $this->response($this->api_data_larger_than_date, REST_Controller::HTTP_OK);
            }else{
                $this->response([
                    'status' => FALSE,
                    'message' => 'No record was found'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
        //have end date parameter? get api data smaller than $end_date;
        else if($start_date===NULL && $id===NULL && $end_date!==NULL){
            //check date format

            if(preg_match('/^(\d{4})-(0?[1-9]|1[012])-(0?[1-9]|1[0-9]|2[0-9]|3[01])$/', $end_date)) {
                $end_date= strtotime($end_date);
                $this->api_data_smaller_than_date = $this->API->get_api_data_smaller_than_date(date('Y-m-d',$end_date));
            }else{
                $this->response([
                    'status' => FALSE,
                    'message' => 'Not Valid date format'
                ], REST_Controller::HTTP_NOT_FOUND);
            }

            //if get api data return data, if not return not find information
            if($this->api_data_smaller_than_date && isset($this->api_data_smaller_than_date)){
                $this->response($this->api_data_smaller_than_date, REST_Controller::HTTP_OK);
            }else{
                $this->response([
                    'status' => FALSE,
                    'message' => 'No record was found'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
        //others parameter pattern are not valid
        else{
            $this->response([
                'status' => FALSE,
                'message' => 'parameter pattern are not valid'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
        
    }



}
