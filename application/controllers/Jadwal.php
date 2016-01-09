<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jadwal extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Jadwal_model');
        $this->load->library('form_validation');
        if (!$this->ion_auth->logged_in())
    		{
    			redirect('auth/login', 'refresh');
    		}
    }

    public function index()
    {
        $jadwal = $this->Jadwal_model->get_all();

        $data = array(
            'jadwal_data' => $jadwal
        );

        $this->load->view('jadwal_list', $data);
    }

    public function read($id)
    {
        $row = $this->Jadwal_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_jadwal' => $row->id_jadwal,
		'id_tes' => $row->id_tes,
		'id_kelas' => $row->id_kelas,
		'tgl_tes' => $row->tgl_tes,
	    );
            $this->load->view('jadwal_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jadwal'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jadwal/create_action'),
	    'id_jadwal' => set_value('id_jadwal'),
	    'id_tes' => set_value('id_tes'),
	    'id_kelas' => set_value('id_kelas'),
	    'tgl_tes' => set_value('tgl_tes'),
	);
        $this->load->view('jadwal_form', $data);
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
		'id_tes' => $this->input->post('id_tes',TRUE),
		'id_kelas' => $this->input->post('id_kelas',TRUE),
		'tgl_tes' => $this->input->post('tgl_tes',TRUE),
	    );

               $this->Jadwal_model->insert($data);
              // $this->session->set_flashdata('message', 'Create Record Success');
              // redirect(site_url('jadwal'));
               $res['success']='<div class="card-panel teal"><span class="white-text">Hai kamu berhasil menyimpan data</span></div>';
        }

        header('Content-Type: application/json');
        echo json_encode($res);
        exit;
    }

    public function update($id)
    {
        $row = $this->Jadwal_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jadwal/update_action'),
		'id_jadwal' => set_value('id_jadwal', $row->id_jadwal),
		'id_tes' => set_value('id_tes', $row->id_tes),
		'id_kelas' => set_value('id_kelas', $row->id_kelas),
		'tgl_tes' => set_value('tgl_tes', $row->tgl_tes),
	    );
            $this->load->view('jadwal_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jadwal'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        $res['error']="";
        $res['success']="";

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jadwal', TRUE));
            $res['error']='<div class="card-panel red lighten-1"><span class="white-text">Ups, Kayaknya inputanmu ada yang salah! </span></div>';

        } else {
            $data = array(
		'id_tes' => $this->input->post('id_tes',TRUE),
		'id_kelas' => $this->input->post('id_kelas',TRUE),
		'tgl_tes' => $this->input->post('tgl_tes',TRUE),
	    );

            $this->Jadwal_model->update($this->input->post('id_jadwal', TRUE), $data);
            // $this->session->set_flashdata('message', 'Update Record Success');
            // redirect(site_url('jadwal'));
            $res['success']='<div class="card-panel teal"><span class="white-text">Yuhuuu berhasil update data!!</span></div>';


        }
        header('Content-Type: application/json');
        echo json_encode($res);
        exit;
    }

    public function delete($id)
    {
        $id =  $this->input->POST('id');
        $row = $this->Jadwal_model->get_by_id($id);
        $res['error']="";
        $res['success']="";

        if ($row) {
            $this->Jadwal_model->delete($id);
            // $this->session->set_flashdata('message', 'Delete Record Success');
            //  redirect(site_url('jadwal'));

            $res['success']='<div class="card-panel teal"><span class="white-text">Berhasil menghapus data!!</span></div>';
        } else {
            // $this->session->set_flashdata('message', 'Record Not Found');
            // redirect(site_url('jadwal'));
            $res['error']='<div class="card-panel teal"><span class="white-text">Hmm, data tidak ditemukan!!</span></div>';
        }

        header('Content-Type: application/json');
        echo json_encode($res);
        exit;
    }

    public function _rules()
    {
	$this->form_validation->set_rules('id_tes', 'id tes', 'trim|required');
	$this->form_validation->set_rules('id_kelas', 'id kelas', 'trim|required');
	$this->form_validation->set_rules('tgl_tes', 'tgl tes', 'trim|required');

	$this->form_validation->set_rules('id_jadwal', 'id_jadwal', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "jadwal.xls";
        $judul = "jadwal";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Tes");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Kelas");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Tes");

	foreach ($this->Jadwal_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_tes);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_kelas);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_tes);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Jadwal.php */
/* Location: ./application/controllers/Jadwal.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-01-09 03:55:28 */
/* http://harviacode.com */