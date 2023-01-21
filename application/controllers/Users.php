<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('user')) {
			redirect('auth/login');
		}

		$this->load->model(array(
			'Users_model' => 'M_users'
		));

		$this->_create_additional = array(
			'created_by' => isset($_SESSION['user']) ? $this->session->userdata('user')['id'] : DEFAULT_ADMIN_ID,
			'created_at' => NOW
		);

		$this->_update_additional = array(
			'updated_by' => isset($_SESSION['user']) ? $this->session->userdata('user')['id'] : DEFAULT_ADMIN_ID,
			'updated_at' => NOW
		);

		$this->_delete_additional = array(
			'deleted_by' => isset($_SESSION['user']) ? $this->session->userdata('user')['id'] : DEFAULT_ADMIN_ID,
			'deleted_at' => NOW
		);
	}

	public function form($id = null)
	{
		$data['page_data'] = array(
			'module' => 'Users',
			'section' => 'Add Staff',
			'scripts_path' => array(
				'custom/modules/users/form'
			)
		);
		$this->load->view('layouts/dashboard_head', $data);
		$this->load->view('modules/users/form', $data);
		$this->load->view('layouts/dashboard_foot', $data);
	}

}
