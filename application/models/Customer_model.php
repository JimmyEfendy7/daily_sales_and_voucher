<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    // Mendapatkan semua data customer beserta poin
    public function get_all_customers(){
        $this->db->select('customers.id, customers.fullname, ms_point.point');
        $this->db->from('customers');
        $this->db->join('ms_point', 'customers.id = ms_point.customerid', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    // Mendapatkan data customer berdasarkan ID
    public function get_customer($id){
        $this->db->select('customers.id, customers.fullname, ms_point.point');
        $this->db->from('customers');
        $this->db->join('ms_point', 'customers.id = ms_point.customerid', 'left');
        $this->db->where('customers.id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function update_customer_points($customer_id, $new_point){
        $this->db->where('customerid', $customer_id);
        $query = $this->db->get('ms_point');
        $data = [
            'point'     => $new_point,
            'updatedate'=> date('Y-m-d H:i:s')
        ];
        if($query->num_rows() > 0){
            $this->db->where('customerid', $customer_id);
            return $this->db->update('ms_point', $data);
        } else {
            $data['customerid'] = $customer_id;
            return $this->db->insert('ms_point', $data);
        }
    }
}
