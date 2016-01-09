<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Matpel extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Matpel_model');
        $this->load->library('form_validation');
        if (!$this->ion_auth->logged_in())
    		{
    			redirect('auth/login', 'refresh');
    		}
    }

    public function index()
    {
        $matpel = $this->Matpel_model->get_all();

        $data = array(
            'matpel_data' => $matpel
        );

        $this->load->view('matpel_list', $data);
    }

    public function read($id)
    {
        $row = $this->Matpel_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_matpel' => $row->id_matpel,
		'nama_matpel' => $row->nama_matpel,
		'kkm' => $row->kkm,
	    );
            $this->load->view('matpel_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('matpel'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('matpel/create_action'),
	    'id_matpel' => set_value('id_matpel'),
	    'nama_matpel' => set_value('nama_matpel'),
	    'kkm' => set_value('kkm'),
	);
        $this->load->view('matpel_form', $data);
    }

    public function create_action()
    {
        $this->_rules();
        $res['error']="";
        $res['success']="";
        if ($this->form_validation->run() == FALSE) {
            // $this->create();
            $res['error']='<div class="card-panel red lighten-1"><span class="white-text">Ups, Kayaknya inputanmu ada yang salah! </span></div>';
        } else {
            $data = array(
		'nama_matpel' => $this->input->post('nama_matpel',TRUE),
		'kkm' => $this->input->post('kkm',TRUE),
	    );

               $this->Matpel_model->insert($data);
              // $this->session->set_flashdata('message', 'Create Record Success');
              // redirect(site_url('matpel'));
               $res['success']='<div class="card-panel teal"><span class="white-text">Hai kamu berhasil menyimpan data</span></div>';
        }

        header('Content-Type: application/json');
        echo json_encode($res);
        exit;
    }

    public function update($id)
    {
        $row = $this->Matpel_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('matpel/update_action'),
		'id_matpel' => set_value('id_matpel', $row->id_matpel),
		'nama_matpel' => set_value('nama_matpel', $row->nama_matpel),
		'kkm' => set_value('kkm', $row->kkm),
	    );
            $this->load->view('matpel_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('matpel'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        $res['error']="";
        $res['success']="";

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_matpel', TRUE));
            $res['error']='<div class="card-panel red lighten-1"><span class="white-text">Ups, Kayaknya inputanmu ada yang salah! </span></div>';

        } else {
            $data = array(
		'nama_matpel' => $this->input->post('nama_matpel',TRUE),
		'kkm' => $this->input->post('kkm',TRUE),
	    );

            $this->Matpel_model->update($this->input->post('id_matpel', TRUE), $data);
            // $this->session->set_flashdata('message', 'Update Record Success');
            // redirect(site_url('matpel'));
            $res['success']='<div class="card-panel teal"><span class="white-text">Yuhuuu berhasil update data!!</span></div>';


        }
        header('Content-Type: application/json');
        echo json_encode($res);
        exit;
    }

    public function delete($id)
    {
        $id =  $this->input->POST('id');
        $row = $this->Matpel_model->get_by_id($id);
        $res['error']="";
        $res['success']="";

        if ($row) {
            $this->Matpel_model->delete($id);
            // $this->session->set_flashdata('message', 'Delete Record Success');
            //  redirect(site_url('matpel'));

            $res['success']='<div class="card-panel teal"><span class="white-text">Berhasil menghapus data!!</span></div>';
        } else {
            // $this->session->set_flashdata('message', 'Record Not Found');
            // redirect(site_url('matpel'));
            $res['error']='<div class="card-panel teal"><span class="white-text">Hmm, data tidak ditemukan!!</span></div>';
        }

        header('Content-Type: application/json');
        echo json_encode($res);
        exit;
    }

    public function _rules()
    {
	$this->form_validation->set_rules('nama_matpel', 'nama matpel', 'trim|required');
	$this->form_validation->set_rules('kkm', 'kkm', 'trim|required');

	$this->form_validation->set_rules('id_matpel', 'id_matpel', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "matpel.xls";
        $judul = "matpel";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Matpel");
	xlsWriteLabel($tablehead, $kolomhead++, "Kkm");

	foreach ($this->Matpel_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_matpel);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kkm);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Matpel.php */
/* Location: ./application/controllers/Matpel.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-01-09 03:55:35 */
/* http://harviacode.com */