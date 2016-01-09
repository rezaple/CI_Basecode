<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Siswa extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_model');
        $this->load->library('form_validation');
        if (!$this->ion_auth->logged_in())
    		{
    			redirect('auth/login', 'refresh');
    		}
    }

    public function index()
    {
        $siswa = $this->Siswa_model->get_all();

        $data = array(
            'siswa_data' => $siswa
        );

        $this->load->view('siswa_list', $data);
    }

    public function read($id)
    {
        $row = $this->Siswa_model->get_by_id($id);
        if ($row) {
            $data = array(
		'nis' => $row->nis,
		'nama_siswa' => $row->nama_siswa,
		'jenkel' => $row->jenkel,
		'tmp_lahir' => $row->tmp_lahir,
		'tgl_lahir' => $row->tgl_lahir,
		'id_kelas' => $row->id_kelas,
	    );
            $this->load->view('siswa_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('siswa'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('siswa/create_action'),
	    'nis' => set_value('nis'),
	    'nama_siswa' => set_value('nama_siswa'),
	    'jenkel' => set_value('jenkel'),
	    'tmp_lahir' => set_value('tmp_lahir'),
	    'tgl_lahir' => set_value('tgl_lahir'),
	    'id_kelas' => set_value('id_kelas'),
	);
        $this->load->view('siswa_form', $data);
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
		'nama_siswa' => $this->input->post('nama_siswa',TRUE),
		'jenkel' => $this->input->post('jenkel',TRUE),
		'tmp_lahir' => $this->input->post('tmp_lahir',TRUE),
		'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
		'id_kelas' => $this->input->post('id_kelas',TRUE),
	    );

               $this->Siswa_model->insert($data);
              // $this->session->set_flashdata('message', 'Create Record Success');
              // redirect(site_url('siswa'));
               $res['success']='<div class="card-panel teal"><span class="white-text">Hai kamu berhasil menyimpan data</span></div>';
        }

        header('Content-Type: application/json');
        echo json_encode($res);
        exit;
    }

    public function update($id)
    {
        $row = $this->Siswa_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('siswa/update_action'),
		'nis' => set_value('nis', $row->nis),
		'nama_siswa' => set_value('nama_siswa', $row->nama_siswa),
		'jenkel' => set_value('jenkel', $row->jenkel),
		'tmp_lahir' => set_value('tmp_lahir', $row->tmp_lahir),
		'tgl_lahir' => set_value('tgl_lahir', $row->tgl_lahir),
		'id_kelas' => set_value('id_kelas', $row->id_kelas),
	    );
            $this->load->view('siswa_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('siswa'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        $res['error']="";
        $res['success']="";

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('nis', TRUE));
            $res['error']='<div class="card-panel red lighten-1"><span class="white-text">Ups, Kayaknya inputanmu ada yang salah! </span></div>';

        } else {
            $data = array(
		'nama_siswa' => $this->input->post('nama_siswa',TRUE),
		'jenkel' => $this->input->post('jenkel',TRUE),
		'tmp_lahir' => $this->input->post('tmp_lahir',TRUE),
		'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
		'id_kelas' => $this->input->post('id_kelas',TRUE),
	    );

            $this->Siswa_model->update($this->input->post('nis', TRUE), $data);
            // $this->session->set_flashdata('message', 'Update Record Success');
            // redirect(site_url('siswa'));
            $res['success']='<div class="card-panel teal"><span class="white-text">Yuhuuu berhasil update data!!</span></div>';


        }
        header('Content-Type: application/json');
        echo json_encode($res);
        exit;
    }

    public function delete($id)
    {
        $id =  $this->input->POST('id');
        $row = $this->Siswa_model->get_by_id($id);
        $res['error']="";
        $res['success']="";

        if ($row) {
            $this->Siswa_model->delete($id);
            // $this->session->set_flashdata('message', 'Delete Record Success');
            //  redirect(site_url('siswa'));

            $res['success']='<div class="card-panel teal"><span class="white-text">Berhasil menghapus data!!</span></div>';
        } else {
            // $this->session->set_flashdata('message', 'Record Not Found');
            // redirect(site_url('siswa'));
            $res['error']='<div class="card-panel teal"><span class="white-text">Hmm, data tidak ditemukan!!</span></div>';
        }

        header('Content-Type: application/json');
        echo json_encode($res);
        exit;
    }

    public function _rules()
    {
	$this->form_validation->set_rules('nama_siswa', 'nama siswa', 'trim|required');
	$this->form_validation->set_rules('jenkel', 'jenkel', 'trim|required');
	$this->form_validation->set_rules('tmp_lahir', 'tmp lahir', 'trim|required');
	$this->form_validation->set_rules('tgl_lahir', 'tgl lahir', 'trim|required');
	$this->form_validation->set_rules('id_kelas', 'id kelas', 'trim|required');

	$this->form_validation->set_rules('nis', 'nis', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "siswa.xls";
        $judul = "siswa";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Siswa");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenkel");
	xlsWriteLabel($tablehead, $kolomhead++, "Tmp Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Kelas");

	foreach ($this->Siswa_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_siswa);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenkel);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tmp_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_lahir);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_kelas);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Siswa.php */
/* Location: ./application/controllers/Siswa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-01-09 03:55:19 */
/* http://harviacode.com */