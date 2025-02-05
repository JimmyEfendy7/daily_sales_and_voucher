<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    // Mendapatkan laporan penjualan harian
    public function get_daily_sales(){
        $this->db->select('sl_invoice_hdr.invoiceno, sl_invoice_hdr.invoicedate, customers.fullname, sl_invoice_hdr.status');
        $this->db->from('sl_invoice_hdr');
        $this->db->join('customers', 'sl_invoice_hdr.customerid = customers.id', 'left');
        $this->db->where('DATE(sl_invoice_hdr.invoicedate)', date('Y-m-d'));
        $query = $this->db->get();
        return $query->result();
    }
}
