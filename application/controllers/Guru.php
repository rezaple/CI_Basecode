<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Guru extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Guru_model');
        $this->load->library('form_validation');
        if (!$this->ion_auth->logged_in())
    		{
    			redirect('auth/login', 'refresh');
    		}
    }

    public function index()
    {
        $guru = $this->Guru_model->get_all();

        $data = array(
            'guru_data' => $guru
        );

        $this->load->view('guru_list', $data);
    }

    public function read($id)
    {
        $row = $this->Guru_model->get_by_id($id);
        if ($row) {
            $data = array(
		'nip' => $row->nip,
		'nuptk' => $row->nuptk,
		'nama_guru' => $row->nama_guru,
		'tmp_lahir' => $row->tmp_lahir,
		'tgl_lahir' => $row->tgl_lahir,
		'golongan' => $row->golongan,
		'pend_guru' => $row->pend_guru,
		'id_matpel' => $row->id_matpel,
	    );
            $this->load->view('guru_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('guru'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('guru/create_action'),
	    'nip' => set_value('nip'),
	    'nuptk' => set_value('nuptk'),
	    'nama_guru' => set_value('nama_guru'),
	    'tmp_lahir' => set_value('tmp_lahir'),
	    'tgl_lahir' => set_value('tgl_lahir'),
	    'golongan' => set_value('golongan'),
	    'pend_guru' => set_value('pend_guru'),
	    'id_matpel' => set_value('id_matpel'),
	);
        $this->load->view('guru_form', $data);
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
		'nuptk' => $this->input->post('nuptk',TRUE),
		'nama_guru' => $this->input->post('nama_guru',TRUE),
		'tmp_lahir' => $this->input->post('tmp_lahir',TRUE),
		'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
		'golongan' => $this->input->post('golongan',TRUE),
		'pend_guru' => $this->input->post('pend_guru',TRUE),
		'id_matpel' => $this->input->post('id_matpel',TRUE),
	    );

               $this->Guru_model->insert($data);
              // $this->session->set_flashdata('message', 'Create Record Success');
              // redirect(site_url('guru'));
               $res['success']='<div class="card-panel teal"><span class="white-text">Hai kamu berhasil menyimpan data</span></div>';
        }

        header('Content-Type: application/json');
        echo json_encode($res);
        exit;
    }

    public function update($id)
    {
        $row = $this->Guru_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('guru/update_action'),
		'nip' => set_value('nip', $row->nip),
		'nuptk' => set_value('nuptk', $row->nuptk),
		'nama_guru' => set_value('nama_guru', $row->nama_guru),
		'tmp_lahir' => set_value('tmp_lahir', $row->tmp_lahir),
		'tgl_lahir' => set_value('tgl_lahir', $row->tgl_lahir),
		'golongan' => set_value('golongan', $row->golongan),
		'pend_guru' => set_value('pend_guru', $row->pend_guru),
		'id_matpel' => set_value('id_matpel', $row->id_matpel),
	    );
            $this->load->view('guru_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('guru'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        $res['error']="";
        $res['success']="";

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('nip', TRUE));
            $res['error']='<div class="card-panel red lighten-1"><span class="white-text">Ups, Kayaknya inputanmu ada yang salah! </span></div>';

        } else {
            $data = array(
		'nuptk' => $this->input->post('nuptk',TRUE),
		'nama_guru' => $this->input->post('nama_guru',TRUE),
		'tmp_lahir' => $this->input->post('tmp_lahir',TRUE),
		'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
		'golongan' => $this->input->post('golongan',TRUE),
		'pend_guru' => $this->input->post('pend_guru',TRUE),
		'id_matpel' => $this->input->post('id_matpel',TRUE),
	    );

            $this->Guru_model->update($this->input->post('nip', TRUE), $data);
            // $this->session->set_flashdata('message', 'Update Record Success');
            // redirect(site_url('guru'));
            $res['success']='<div class="card-panel teal"><span class="white-text">Yuhuuu berhasil update data!!</span></div>';


        }
        header('Content-Type: application/json');
        echo json_encode($res);
        exit;
    }

    public function delete($id)
    {
        $id =  $this->input->POST('id');
        $row = $this->Guru_model->get_by_id($id);
        $res['error']="";
        $res['success']="";

        if ($row) {
            $this->Guru_model->delete($id);
            // $this->session->set_flashdata('message', 'Delete Record Success');
            //  redirect(site_url('guru'));

            $res['success']='<div class="card-panel teal"><span class="white-text">Berhasil menghapus data!!</span></div>';
        } else {
            // $this->session->set_flashdata('message', 'Record Not Found');
            // redirect(site_url('guru'));
            $res['error']='<div class="card-panel teal"><span class="white-text">Hmm, data tidak ditemukan!!</span></div>';
        }

        header('Content-Type: application/json');
        echo json_encode($res);
        exit;
    }

    public function _rules()
    {
	$this->form_validation->set_rules('nuptk', 'nuptk', 'trim|required');
	$this->form_validation->set_rules('nama_guru', 'nama guru', 'trim|required');
	$this->form_validation->set_rules('tmp_lahir', 'tmp lahir', 'trim|required');
	$this->form_validation->set_rules('tgl_lahir', 'tgl lahir', 'trim|required');
	$this->form_validation->set_rules('golongan', 'golongan', 'trim|required');
	$this->form_validation->set_rules('pend_guru', 'pend guru', 'trim|required');
	$this->form_validation->set_rules('id_matpel', 'id matpel', 'trim|required');

	$this->form_validation->set_rules('nip', 'nip', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "guru.xls";
        $judul = "guru";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nuptk");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Guru");
	xlsWriteLabel($tablehead, $kolomhead++, "Tmp Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Golongan");
	xlsWriteLabel($tablehead, $kolomhead++, "Pend Guru");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Matpel");

	foreach ($this->Guru_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nuptk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_guru);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tmp_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->golongan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pend_guru);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_matpel);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Guru.php */
/* Location: ./application/controllers/Guru.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-01-09 03:55:53 */
/* http://harviacode.com */