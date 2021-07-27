<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('My_model', 'm');
    }


    public function index()
    {
        $data['title'] = "CI Single Page Aplication";
        $this->load->view("header", $data);
        $this->load->view('home', $data);
        $this->load->view('footer');
    }

    public function ambildata()
    {
        $dataBarang = $this->m->ambildata('tb_barang')->result();

        echo json_encode($dataBarang);
    }

    public function tambahdata()
    {
        $datapost = $_POST;

        $hasil = $this->m->tambahdata('tb_barang', $datapost);

        echo json_encode($hasil);
    }

    public function ubahdata()
    {
        $datapost['id'] = $_POST['id'];
        $datapost['data'] = $_POST['data'];
        $hasil = $this->m->ubahdata('tb_barang', 'id', $datapost);

        echo json_encode($hasil);
    }

    public function deletedata()
    {
        $id = $_POST['id'];
        $hasil = $this->m->deletedata('tb_barang', 'id', $id);

        echo json_encode($hasil);
    }
}
