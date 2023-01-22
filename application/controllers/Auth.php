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

	public function get()
	{
		$user_id = $this->session->userdata('user')['id'];
		$user = $this->M_users->get($user_id);
		if (!$user)
		{
			show_404();
			die();
		}

		exit(json_encode($user));
	}


	public function change_password()
	{
		if ($post_data = $this->input->post()) {
			$user_id = $this->session->userdata('user')['id'];
			if ($post_data['new_password_change_password'] != $post_data['verify_new_password_change_password']) {
				exit(json_encode(
					array(
						'status' => RESULT_FAILED,
						'message' => 'New Password and Verify New Password is not the same.'
					)
				));
			}
			$password_hashed = password_hash($post_data['new_password_change_password'], PASSWORD_DEFAULT);
			$user_data = array(
				'password' => $password_hashed
			) + $this->_update_additional;
			$this->M_users->update($user_data, $user_id);
			exit(json_encode(
				array(
					'status' => RESULT_SUCCESS,
					'message' => 'Password has been successfully changed.'
				)
			));
		}

	}

	public function update_profile()
	{
		if ($post_data = $this->input->post()) {
			$id = $this->session->userdata('user')['id'];
			$data = array(
					'code' => $post_data['update_profile_code'],
					'first_name' => $post_data['update_profile_first_name'],
					'middle_name' => $post_data['update_profile_middle_name'],
					'last_name' => $post_data['update_profile_last_name'],
					'dob' => $post_data['update_profile_dob'],
					'gender' => $post_data['update_profile_gender'],
					'contact_no' => $post_data['update_profile_contact_no'],
					'address' => $post_data['update_profile_address'],
				) + $this->_update_additional;

			$this->M_users->update($data, $id);
			exit(json_encode(
				array(
					'status' => RESULT_SUCCESS,
					'message' => 'Profile has been successfully updated.'
				)
			));
		}
		show_404();
		die();
	}

	public function logout()
	{
		insert_audit_trail($this->session->userdata('user')['username'], 'LOGGED OUT');
		$this->session->unset_userdata('user');
		$this->session->set_userdata('RESULT_STATUS', RESULT_SUCCESS);
		$this->session->set_userdata('RESULT_MESSAGE', 'Account has been successfully logged out.');
		redirect('auth/login');
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
					$redirect_url = site_url('dashboard/admin_main');
					break;
				default:
					$redirect_url = null;
					break;
			}

			$this->session->set_userdata('user', $user);
			insert_audit_trail($user['username'], 'LOGGED IN');
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
