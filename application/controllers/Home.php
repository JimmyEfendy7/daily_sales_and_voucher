<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Customer_model');
        $this->load->model('Sales_model');
        $this->load->helper('url');
    }

    public function index(){
        redirect('home/poin');
    }

    // Menu Poin: menampilkan data customer dan poin
    public function poin(){
        $data['customers'] = $this->Customer_model->get_all_customers();
        $this->load->view('templates/header');
        $this->load->view('poin', $data);
        $this->load->view('templates/footer');
    }

    // Aksi generate voucher via AJAX
    public function generate_voucher($customer_id){
        $customer = $this->Customer_model->get_customer($customer_id);
        $currentPoint = isset($customer->point) ? (int)$customer->point : 0;
        
        if($customer && $currentPoint >= 500000){
            // Hasilkan kode voucher 6 digit
            $voucher = sprintf('%06d', mt_rand(0, 999999));
            $newPoint = $currentPoint - 500000;
            $updated = $this->Customer_model->update_customer_points($customer_id, $newPoint);
            if($updated){
                echo json_encode(['success' => true, 'voucher' => $voucher, 'new_point' => $newPoint]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Gagal mengupdate poin customer.']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Poin tidak mencukupi untuk generate voucher']);
        }
    }

    // Menu Report: menampilkan laporan penjualan harian
    public function report(){
        $data['sales'] = $this->Sales_model->get_daily_sales();
        $this->load->view('templates/header');
        $this->load->view('report', $data);
        $this->load->view('templates/footer');
    }
}
