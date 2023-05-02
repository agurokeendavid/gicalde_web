<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galleries extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('user')) {
			redirect('auth/login');
		}

		$this->load->model(array(
			'Galleries_model' => 'M_galleries'
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

	public function delete()
	{
		if ($post_data = $this->input->post()) {
			$this->M_galleries->delete($this->_delete_additional, $post_data['id']);
			exit(json_encode(array(
				'status' => RESULT_SUCCESS,
				'message' => 'Data has been successfully deleted.'
			)));
		}

		show_404();
		die();
	}

	public function get($id = null)
	{
		$gallery = $this->M_galleries->get($id);
		if (!$gallery)
		{
			show_404();
			die();
		}
		exit(json_encode($gallery));
	}

	public function index()
	{
		$data['page_data'] = array(
			'module' => 'Galleries',
			'section' => 'Index',
			'scripts_path' => array(
				'custom/modules/galleries/index'
			)
		);
		$data['galleries'] = $this->M_galleries->get_all();
		$this->load->view('layouts/dashboard_head', $data);
		$this->load->view('modules/galleries/index', $data);
		$this->load->view('layouts/dashboard_foot', $data);
	}

	public function add()
	{
		$photo_file_name = null;

		$config['upload_path'] = 'assets/uploads/galleries/';
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$config['encrypt_name'] = true;
		$config['max_size'] = '10000000000'; // max_size in kb

		if (!empty($_FILES['photo_file']['name'])) {
			$config['file_name'] = $_FILES['photo_file']['name'];
			$this->load->library('upload', $config);

			// File upload
			if ($this->upload->do_upload('photo_file')) {
				if (!is_dir('assets/uploads/galleries')) {
					//Directory does not exist, so let's create it.
					mkdir('assets/uploads/galleries', 0755);
				}
				// Get data about the file
				$upload_data = $this->upload->data();
				$photo_file_name = $upload_data['file_name'];
			} else {
				exit(json_encode(
					array(
						'status' => RESULT_FAILED,
						'message' => 'Failed to upload file.'
					)
				));
			}
		}

		$gallery_data = array(
				'photo_file_name' => $photo_file_name
			) + $this->_create_additional;

		$this->M_galleries->insert($gallery_data);
		exit(json_encode(
			array(
				'status' => RESULT_SUCCESS,
				'message' => 'Data has been successfully created.'
			)
		));
	}
}
