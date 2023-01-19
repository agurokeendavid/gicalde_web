<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
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


	public function login()
	{
		if ($post_data = $this->input->post()) {
			$user = $this->M_users->login($post_data['username'], $post_data['password']);

			if (!$user) {
				exit(json_encode(array(
					'status' => RESULT_FAILED,
					'message' => 'Invalid username or password!'
				)));
			}

			switch ($user['role_id']) {
				case ROLE_ADMINISTRATOR:
					$redirect_url = site_url('dashboard/admin_main');
					break;
				case ROLE_STAFF:
					$redirect_url = site_url('dashboard/staff_main');
					break;
				default:
					$redirect_url = null;
					break;
			}

			$this->session->set_userdata('user', $user);
			exit(json_encode(
				array(
					'status' => RESULT_SUCCESS,
					'message' => 'Account has been logged in successfully!',
					'redirect_url' => $redirect_url
				)
			));
		}
		$data['page_data'] = array(
			'module' => 'Auth',
			'section' => 'Login',
			'styles_path' => array(
				'custom/modules/auth/login'
			),
			'scripts_path' => array(
				'custom/modules/auth/login'
			)
		);
		$this->load->view('layouts/auth_head', $data);
		$this->load->view('modules/auth/login', $data);
		$this->load->view('layouts/auth_foot', $data);
	}
}
