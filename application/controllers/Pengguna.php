<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengguna extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Pengguna_model');
        $this->load->library('form_validation');
        if (!$this->ion_auth->logged_in())
    		{
    			redirect('auth/login', 'refresh');
    		}
    }

    public function index()
    {
        $pengguna = $this->Pengguna_model->get_all();

        $data = array(
            'pengguna_data' => $pengguna
        );

        $this->load->view('pengguna_list', $data);
    }

    public function read($id)
    {
        $row = $this->Pengguna_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pengguna' => $row->id_pengguna,
		'pengguna' => $row->pengguna,
		'password' => $row->password,
		'level' => $row->level,
		'status' => $row->status,
	    );
            $this->load->view('pengguna_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengguna'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pengguna/create_action'),
	    'id_pengguna' => set_value('id_pengguna'),
	    'pengguna' => set_value('pengguna'),
	    'password' => set_value('password'),
	    'level' => set_value('level'),
	    'status' => set_value('status'),
	);
        $this->load->view('pengguna_form', $data);
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
		'pengguna' => $this->input->post('pengguna',TRUE),
		'password' => $this->input->post('password',TRUE),
		'level' => $this->input->post('level',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

               $this->Pengguna_model->insert($data);
              // $this->session->set_flashdata('message', 'Create Record Success');
              // redirect(site_url('pengguna'));
               $res['success']='<div class="card-panel teal"><span class="white-text">Hai kamu berhasil menyimpan data</span></div>';
        }

        header('Content-Type: application/json');
        echo json_encode($res);
        exit;
    }

    public function update($id)
    {
        $row = $this->Pengguna_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pengguna/update_action'),
		'id_pengguna' => set_value('id_pengguna', $row->id_pengguna),
		'pengguna' => set_value('pengguna', $row->pengguna),
		'password' => set_value('password', $row->password),
		'level' => set_value('level', $row->level),
		'status' => set_value('status', $row->status),
	    );
            $this->load->view('pengguna_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengguna'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        $res['error']="";
        $res['success']="";

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pengguna', TRUE));
            $res['error']='<div class="card-panel red lighten-1"><span class="white-text">Ups, Kayaknya inputanmu ada yang salah! </span></div>';

        } else {
            $data = array(
		'pengguna' => $this->input->post('pengguna',TRUE),
		'password' => $this->input->post('password',TRUE),
		'level' => $this->input->post('level',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Pengguna_model->update($this->input->post('id_pengguna', TRUE), $data);
            // $this->session->set_flashdata('message', 'Update Record Success');
            // redirect(site_url('pengguna'));
            $res['success']='<div class="card-panel teal"><span class="white-text">Hai kamu berhasil menyimpan data</span></div>';


        }
        header('Content-Type: application/json');
        echo json_encode($res);
        exit;
    }

    public function delete($id)
    {
        $id =  $this->input->POST('id');
        $row = $this->Pengguna_model->get_by_id($id);
        $res['error']="";
        $res['success']="";

        if ($row) {
            $this->Pengguna_model->delete($id);
            // $this->session->set_flashdata('message', 'Delete Record Success');
            //  redirect(site_url('pengguna'));

            $res['success']='<div class="card-panel teal"><span class="white-text">Berhasil menghapus data!!</span></div>';
        } else {
            // $this->session->set_flashdata('message', 'Record Not Found');
            // redirect(site_url('pengguna'));
            $res['error']='<div class="card-panel teal"><span class="white-text">Hmm, data tidak ditemukan!!</span></div>';
        }

        header('Content-Type: application/json');
        echo json_encode($res);
        exit;
    }

    public function _rules()
    {
	$this->form_validation->set_rules('pengguna', 'pengguna', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('level', 'level', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id_pengguna', 'id_pengguna', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "pengguna.xls";
        $judul = "pengguna";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Pengguna");
	xlsWriteLabel($tablehead, $kolomhead++, "Password");
	xlsWriteLabel($tablehead, $kolomhead++, "Level");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->Pengguna_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pengguna);
	    xlsWriteLabel($tablebody, $kolombody++, $data->password);
	    xlsWriteLabel($tablebody, $kolombody++, $data->level);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=pengguna.doc");

        $data = array(
            'pengguna_data' => $this->Pengguna_model->get_all(),
            'start' => 0
        );

        $this->load->view('pengguna_doc',$data);
    }

}

/* End of file Pengguna.php */
/* Location: ./application/controllers/Pengguna.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-01-09 03:46:17 */
/* http://harviacode.com */