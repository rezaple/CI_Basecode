<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tes extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Tes_model');
        $this->load->library('form_validation');
        if (!$this->ion_auth->logged_in())
    		{
    			redirect('auth/login', 'refresh');
    		}
    }

    public function index()
    {
        $tes = $this->Tes_model->get_all();

        $data = array(
            'tes_data' => $tes
        );

        $this->load->view('tes_list', $data);
    }

    public function read($id)
    {
        $row = $this->Tes_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_tes' => $row->id_tes,
		'nama_tes' => $row->nama_tes,
		'nip' => $row->nip,
		'jumlah_soal' => $row->jumlah_soal,
		'waktu' => $row->waktu,
		'status_tes' => $row->status_tes,
	    );
            $this->load->view('tes_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tes'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tes/create_action'),
	    'id_tes' => set_value('id_tes'),
	    'nama_tes' => set_value('nama_tes'),
	    'nip' => set_value('nip'),
	    'jumlah_soal' => set_value('jumlah_soal'),
	    'waktu' => set_value('waktu'),
	    'status_tes' => set_value('status_tes'),
	);
        $this->load->view('tes_form', $data);
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
		'nama_tes' => $this->input->post('nama_tes',TRUE),
		'nip' => $this->input->post('nip',TRUE),
		'jumlah_soal' => $this->input->post('jumlah_soal',TRUE),
		'waktu' => $this->input->post('waktu',TRUE),
		'status_tes' => $this->input->post('status_tes',TRUE),
	    );

               $this->Tes_model->insert($data);
              // $this->session->set_flashdata('message', 'Create Record Success');
              // redirect(site_url('tes'));
               $res['success']='<div class="card-panel teal"><span class="white-text">Hai kamu berhasil menyimpan data</span></div>';
        }

        header('Content-Type: application/json');
        echo json_encode($res);
        exit;
    }

    public function update($id)
    {
        $row = $this->Tes_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tes/update_action'),
		'id_tes' => set_value('id_tes', $row->id_tes),
		'nama_tes' => set_value('nama_tes', $row->nama_tes),
		'nip' => set_value('nip', $row->nip),
		'jumlah_soal' => set_value('jumlah_soal', $row->jumlah_soal),
		'waktu' => set_value('waktu', $row->waktu),
		'status_tes' => set_value('status_tes', $row->status_tes),
	    );
            $this->load->view('tes_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tes'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        $res['error']="";
        $res['success']="";

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_tes', TRUE));
            $res['error']='<div class="card-panel red lighten-1"><span class="white-text">Ups, Kayaknya inputanmu ada yang salah! </span></div>';

        } else {
            $data = array(
		'nama_tes' => $this->input->post('nama_tes',TRUE),
		'nip' => $this->input->post('nip',TRUE),
		'jumlah_soal' => $this->input->post('jumlah_soal',TRUE),
		'waktu' => $this->input->post('waktu',TRUE),
		'status_tes' => $this->input->post('status_tes',TRUE),
	    );

            $this->Tes_model->update($this->input->post('id_tes', TRUE), $data);
            // $this->session->set_flashdata('message', 'Update Record Success');
            // redirect(site_url('tes'));
            $res['success']='<div class="card-panel teal"><span class="white-text">Hai kamu berhasil menyimpan data</span></div>';


        }
        header('Content-Type: application/json');
        echo json_encode($res);
        exit;
    }

    public function delete($id)
    {
        $id =  $this->input->POST('id');
        $row = $this->Tes_model->get_by_id($id);
        $res['error']="";
        $res['success']="";

        if ($row) {
            $this->Tes_model->delete($id);
            // $this->session->set_flashdata('message', 'Delete Record Success');
            //  redirect(site_url('tes'));

            $res['success']='<div class="card-panel teal"><span class="white-text">Berhasil menghapus data!!</span></div>';
        } else {
            // $this->session->set_flashdata('message', 'Record Not Found');
            // redirect(site_url('tes'));
            $res['error']='<div class="card-panel teal"><span class="white-text">Hmm, data tidak ditemukan!!</span></div>';
        }

        header('Content-Type: application/json');
        echo json_encode($res);
        exit;
    }

    public function _rules()
    {
	$this->form_validation->set_rules('nama_tes', 'nama tes', 'trim|required');
	$this->form_validation->set_rules('nip', 'nip', 'trim|required');
	$this->form_validation->set_rules('jumlah_soal', 'jumlah soal', 'trim|required');
	$this->form_validation->set_rules('waktu', 'waktu', 'trim|required');
	$this->form_validation->set_rules('status_tes', 'status tes', 'trim|required');

	$this->form_validation->set_rules('id_tes', 'id_tes', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tes.xls";
        $judul = "tes";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Tes");
	xlsWriteLabel($tablehead, $kolomhead++, "Nip");
	xlsWriteLabel($tablehead, $kolomhead++, "Jumlah Soal");
	xlsWriteLabel($tablehead, $kolomhead++, "Waktu");
	xlsWriteLabel($tablehead, $kolomhead++, "Status Tes");

	foreach ($this->Tes_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_tes);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nip);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jumlah_soal);
	    xlsWriteNumber($tablebody, $kolombody++, $data->waktu);
	    xlsWriteNumber($tablebody, $kolombody++, $data->status_tes);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tes.doc");

        $data = array(
            'tes_data' => $this->Tes_model->get_all(),
            'start' => 0
        );

        $this->load->view('tes_doc',$data);
    }

}

/* End of file Tes.php */
/* Location: ./application/controllers/Tes.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-01-09 03:46:22 */
/* http://harviacode.com */