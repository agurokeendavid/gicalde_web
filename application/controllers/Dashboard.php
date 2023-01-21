<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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

	public function admin_main() {
		$data['page_data'] = array(
			'module' => 'Dashboard',
			'section' => 'Main',
			'scripts_path' => array(
				'custom/modules/dashboard/admin_main'
			)
		);
		$this->load->view('layouts/dashboard_head', $data);
		$this->load->view('modules/dashboard/admin_main', $data);
		$this->load->view('layouts/dashboard_foot', $data);
	}
}
