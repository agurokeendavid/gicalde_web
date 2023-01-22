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

	public function get($id)
	{
		$user = $this->M_users->get($id);
		if (!$user)
		{
			show_404();
			die();
		}

		exit(json_encode($user));
	}

	public function delete()
	{
		if ($post_data = $this->input->post()) {
			$this->M_users->delete($this->_delete_additional, $post_data['id']);
			exit(json_encode(array(
				'status' => RESULT_SUCCESS,
				'message' => 'Data has been successfully deleted.'
			)));
		}

		show_404();
		die();
	}

	public function index()
	{
		$data['page_data'] = array(
			'module' => 'Users',
			'section' => 'Manage Staffs',
			'scripts_path' => array(
				'custom/modules/users/index'
			)
		);
		$data['users'] = $this->M_users->get_all_by_role_id(ROLE_STAFF);
		$this->load->view('layouts/dashboard_head', $data);
		$this->load->view('modules/users/index', $data);
		$this->load->view('layouts/dashboard_foot', $data);
	}


	public function form($id = null)
	{
		if ($post_data = $this->input->post())
		{
			if ($id)
			{
				$data = array(
						'code' => $post_data['code'],
						'first_name' => $post_data['first_name'],
						'middle_name' => $post_data['middle_name'],
						'last_name' => $post_data['last_name'],
						'dob' => $post_data['dob'],
						'gender' => $post_data['gender'],
						'contact_no' => $post_data['contact_no'],
						'address' => $post_data['address'],
					) + $this->_update_additional;

				$this->M_users->update($data, $id);
				exit(json_encode(
					array(
						'status' => RESULT_SUCCESS,
						'message' => 'Data has been successfully updated.'
					)
				));
			}
			$data = array(
				'code' => $post_data['code'],
				'username' => strtolower($post_data['username']),
				'password' => password_hash(strtolower($post_data['username']), PASSWORD_DEFAULT),
				'role_id' => ROLE_STAFF,
				'first_name' => $post_data['first_name'],
				'middle_name' => $post_data['middle_name'],
				'last_name' => $post_data['last_name'],
				'dob' => $post_data['dob'],
				'gender' => $post_data['gender'],
				'contact_no' => $post_data['contact_no'],
				'address' => $post_data['address'],
				'is_activated' => BOOL_YES
			) + $this->_create_additional;

			$this->M_users->insert($data);
			exit(json_encode(
				array(
					'status' => RESULT_SUCCESS,
					'message' => 'Data has been successfully created.'
				)
			));
		}
		if ($id)
		{
			$data['info'] = $this->M_users->get($id);
			$data['page_data'] = array(
				'module' => 'Users',
				'section' => 'Update Staff',
				'scripts_path' => array(
					'custom/modules/users/form'
				)
			);
			$this->load->view('layouts/dashboard_head', $data);
			$this->load->view('modules/users/form', $data);
			$this->load->view('layouts/dashboard_foot', $data);
			return;
		}
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
