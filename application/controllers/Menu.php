<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menu extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        $this->load->library('form_validation');
        if (!$this->ion_auth->logged_in())
    		{
    			redirect('auth/login', 'refresh');
    		}
    }

    public function index()
    {
        $menu = $this->Menu_model->get_all();

        $data = array(
            'menu_data' => $menu
        );

        //$this->template->load('template_master','menu_list', $data);
        $this->load->view('menu_list', $data);
    }

    public function read($id)
    {
        $row = $this->Menu_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'name' => $row->name,
		'link' => $row->link,
		'icon' => $row->icon,
		'is_active' => $row->is_active,
		'is_parent' => $row->is_parent,
	    );
            //$this->template->load('template_master','menu_read', $data);
            $this->load->view('menu_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('menu/create_action'),
	    'id' => set_value('id'),
	    'name' => set_value('name'),
	    'link' => set_value('link'),
	    'icon' => set_value('icon'),
	    'is_active' => set_value('is_active'),
	    'is_parent' => set_value('is_parent'),
	);
        //$this->template->load('template_master','menu_form', $data);
        $this->load->view('menu_form', $data);
    }

    public function create_action()
    {
        $this->_rules();
        $res['error']="";
        $res['success']="";

        if ($this->form_validation->run() == FALSE) {
            //$this->create();

            $res['error']='<div class="card-panel red lighten-1"><span class="white-text">Ups, Kayaknya inputanmu ada yang salah! </span></div>';
        } else {
            $data = array(
        		'name' => $this->input->post('name',TRUE),
        		'link' => $this->input->post('link',TRUE),
        		'icon' => $this->input->post('icon',TRUE),
        		'is_active' => $this->input->post('is_active',TRUE),
        		'is_parent' => $this->input->post('is_parent',TRUE),
	          );

            $this->Menu_model->insert($data);
            //$this->session->set_flashdata('message', 'Create Record Success');
            //redirect(site_url('menu'));
            $res['success']='<div class="card-panel teal"><span class="white-text">Hai kamu berhasil menyimpan data</span></div>';
        }

        header('Content-Type: application/json');
        echo json_encode($res);
        exit;
    }

    public function update($id)
    {
        $row = $this->Menu_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('menu/update_action'),
            		'id' => set_value('id', $row->id),
            		'name' => set_value('name', $row->name),
            		'link' => set_value('link', $row->link),
            		'icon' => set_value('icon', $row->icon),
            		'is_active' => set_value('is_active', $row->is_active),
            		'is_parent' => set_value('is_parent', $row->is_parent),
            	  );
            //$this->template->load('template_master','menu_form', $data);
            $this->load->view('menu_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu'));
        }
    }

    public function update_action()
    {
        $this->_rules();
        $res['error']="";
        $res['success']="";

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));

            $res['error']='<div class="card-panel red lighten-1"><span class="white-text">Yah gagal mengupdate! </span></div>';
        } else {
            $data = array(
        		'name' => $this->input->post('name',TRUE),
        		'link' => $this->input->post('link',TRUE),
        		'icon' => $this->input->post('icon',TRUE),
        		'is_active' => $this->input->post('is_active',TRUE),
        		'is_parent' => $this->input->post('is_parent',TRUE),
        	  );

            $this->Menu_model->update($this->input->post('id', TRUE), $data);
            //$this->session->set_flashdata('message', 'Update Record Success');
            //redirect(site_url('menu'));

            $res['success']='<div class="card-panel teal"><span class="white-text">Update berhasil, Yeah!!</span></div>';
        }

        header('Content-Type: application/json');
        echo json_encode($res);
        exit;
    }

    public function delete($id)
    {
        $id =  $this->input->POST('id');
        $row = $this->Menu_model->get_by_id($id);
        $res['error']="";
        $res['success']="";

        if ($row) {
            $this->Menu_model->delete($id);
            //$this->session->set_flashdata('message', 'Delete Record Success');
            //redirect(site_url('menu'));

            $res['success']='<div class="card-panel teal"><span class="white-text">Berhasil menghapus data!!</span></div>';
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            //redirect(site_url('menu'));

            $res['error']='<div class="card-panel teal"><span class="white-text">Hmm, data tidak ditemukan!!</span></div>';
        }

        header('Content-Type: application/json');
        echo json_encode($res);
        exit;
    }

    public function _rules()
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('link', 'link', 'trim|required');
	$this->form_validation->set_rules('icon', 'icon', 'trim|required');
	$this->form_validation->set_rules('is_active', 'is active', 'trim|required');
	$this->form_validation->set_rules('is_parent', 'is parent', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-01-07 11:35:04 */
/* http://harviacode.com */
