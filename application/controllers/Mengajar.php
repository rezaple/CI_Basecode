<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mengajar extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Mengajar_model');
        $this->load->library('form_validation');
        if (!$this->ion_auth->logged_in())
    		{
    			redirect('auth/login', 'refresh');
    		}
    }

    public function index()
    {
        $mengajar = $this->Mengajar_model->get_all();

        $data = array(
            'mengajar_data' => $mengajar
        );

        $this->load->view('mengajar_list', $data);
    }

    public function read($id)
    {
        $row = $this->Mengajar_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kd' => $row->kd,
		'nip' => $row->nip,
		'id_kelas' => $row->id_kelas,
	    );
            $this->load->view('mengajar_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mengajar'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mengajar/create_action'),
	    'kd' => set_value('kd'),
	    'nip' => set_value('nip'),
	    'id_kelas' => set_value('id_kelas'),
	);
        $this->load->view('mengajar_form', $data);
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
		'nip' => $this->input->post('nip',TRUE),
		'id_kelas' => $this->input->post('id_kelas',TRUE),
	    );

               $this->Mengajar_model->insert($data);
              // $this->session->set_flashdata('message', 'Create Record Success');
              // redirect(site_url('mengajar'));
               $res['success']='<div class="card-panel teal"><span class="white-text">Hai kamu berhasil menyimpan data</span></div>';
        }

        header('Content-Type: application/json');
        echo json_encode($res);
        exit;
    }

    public function update($id)
    {
        $row = $this->Mengajar_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mengajar/update_action'),
		'kd' => set_value('kd', $row->kd),
		'nip' => set_value('nip', $row->nip),
		'id_kelas' => set_value('id_kelas', $row->id_kelas),
	    );
            $this->load->view('mengajar_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mengajar'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        $res['error']="";
        $res['success']="";

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kd', TRUE));
            $res['error']='<div class="card-panel red lighten-1"><span class="white-text">Ups, Kayaknya inputanmu ada yang salah! </span></div>';

        } else {
            $data = array(
		'nip' => $this->input->post('nip',TRUE),
		'id_kelas' => $this->input->post('id_kelas',TRUE),
	    );

            $this->Mengajar_model->update($this->input->post('kd', TRUE), $data);
            // $this->session->set_flashdata('message', 'Update Record Success');
            // redirect(site_url('mengajar'));
            $res['success']='<div class="card-panel teal"><span class="white-text">Yuhuuu berhasil update data!!</span></div>';


        }
        header('Content-Type: application/json');
        echo json_encode($res);
        exit;
    }

    public function delete($id)
    {
        $id =  $this->input->POST('id');
        $row = $this->Mengajar_model->get_by_id($id);
        $res['error']="";
        $res['success']="";

        if ($row) {
            $this->Mengajar_model->delete($id);
            // $this->session->set_flashdata('message', 'Delete Record Success');
            //  redirect(site_url('mengajar'));

            $res['success']='<div class="card-panel teal"><span class="white-text">Berhasil menghapus data!!</span></div>';
        } else {
            // $this->session->set_flashdata('message', 'Record Not Found');
            // redirect(site_url('mengajar'));
            $res['error']='<div class="card-panel teal"><span class="white-text">Hmm, data tidak ditemukan!!</span></div>';
        }

        header('Content-Type: application/json');
        echo json_encode($res);
        exit;
    }

    public function _rules()
    {
	$this->form_validation->set_rules('nip', 'nip', 'trim|required');
	$this->form_validation->set_rules('id_kelas', 'id kelas', 'trim|required');

	$this->form_validation->set_rules('kd', 'kd', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "mengajar.xls";
        $judul = "mengajar";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nip");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Kelas");

	foreach ($this->Mengajar_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nip);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_kelas);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Mengajar.php */
/* Location: ./application/controllers/Mengajar.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-01-09 03:55:45 */
/* http://harviacode.com */