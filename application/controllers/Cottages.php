<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cottages extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('user')) {
			redirect('auth/login');
		}

		$this->load->model(array(
			'Cottages_model' => 'M_cottages',
			'Cottages_photos_model' => 'M_cottages_photos'
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
			$this->M_cottages->delete($this->_delete_additional, $post_data['id']);
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
			'module' => 'Cottages',
			'section' => 'Manage Cottages',
			'scripts_path' => array(
				'custom/modules/cottages/index'
			)
		);
		$data['cottages'] = $this->M_cottages->get_all();
		$this->load->view('layouts/dashboard_head', $data);
		$this->load->view('modules/cottages/index', $data);
		$this->load->view('layouts/dashboard_foot', $data);
	}

	public function get($id = null)
	{
		$cottage = $this->M_cottages->get($id);
		if (!$cottage)
		{
			show_404();
			die();
		}
		exit(json_encode($cottage));
	}

	public function form($id = null)
	{
		if ($post_data = $this->input->post()) {
			$photo_1_file_name = null;

			$config['upload_path'] = 'assets/uploads/cottages/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['encrypt_name'] = true;
			$config['max_size'] = '10000000000'; // max_size in kb

			if (!empty($_FILES['photo_1_file']['name'])) {
				$config['file_name'] = $_FILES['photo_1_file']['name'];
				$this->load->library('upload', $config);

				// File upload
				if ($this->upload->do_upload('photo_1_file')) {
					if (!is_dir('assets/uploads/cottages')) {
						//Directory does not exist, so lets create it.
						mkdir('assets/uploads/cottages', 0755);
					}
					// Get data about the file
					$upload_data = $this->upload->data();
					$photo_1_file_name = $upload_data['file_name'];
				} else {
					exit(json_encode(
						array(
							'status' => RESULT_FAILED,
							'message' => 'Failed to upload file.'
						)
					));
				}
			}

			if ($id) {
				$cottages_data = array(
						'name' => strtoupper($post_data['name']),
						'description' => $post_data['description'],
						'no_of_guests' => $post_data['no_of_guests'],
						'price' => $post_data['price'],
						'slots' => $post_data['slots']
					) + $this->_update_additional;
				$this->db->trans_start();
				$cottages_id = $this->M_cottages->update($cottages_data, $id);
				$photos = array(
					$photo_1_file_name
				);
				foreach ($photos as $key => $value) {

					if (!$value) continue;

					$cottages_photos = array(
							'photo_key' => $key,
							'photo_file_name' => $value
						) + $this->_update_additional;
					$this->M_cottages_photos->update_by_cottages_id_and_photo_key($cottages_photos, $cottages_id, $key);
				}
				$this->db->trans_complete();
				exit(json_encode(
					array(
						'status' => RESULT_SUCCESS,
						'message' => 'Data has been successfully updated.'
					)
				));
			}

			$cottages_data = array(
					'name' => strtoupper($post_data['name']),
					'description' => $post_data['description'],
					'no_of_guests' => $post_data['no_of_guests'],
					'price' => $post_data['price'],
					'slots' => $post_data['slots']
				) + $this->_create_additional;

			$this->db->trans_start();
			$cottages_id = $this->M_cottages->insert($cottages_data);
			$photos = array(
				$photo_1_file_name,
			);
			foreach ($photos as $key => $value) {
				$cottages_photos = array(
						'cottages_id' => $cottages_id,
						'photo_key' => $key,
						'photo_file_name' => $value
					) + $this->_create_additional;
				$this->M_cottages_photos->insert($cottages_photos);
			}
			$this->db->trans_complete();
			exit(json_encode(
				array(
					'status' => RESULT_SUCCESS,
					'message' => 'Data has been successfully created.'
				)
			));

		}
		if ($id) {
			$cottage = $this->M_cottages->get($id);
			$cottages_photos = $this->M_cottages_photos->get_all_by_cottages_id($id);
			if (!$cottage) {
				show_404();
				die();
			}

			$data['info'] = $cottage;
			$data['info_photo'] = $cottages_photos;
			$data['page_data'] = array(
				'module' => 'Cottages',
				'section' => 'Update Cottage',
				'scripts_path' => array(
					'custom/modules/cottages/form'
				)
			);
			$this->load->view('layouts/dashboard_head', $data);
			$this->load->view('modules/cottages/form', $data);
			$this->load->view('layouts/dashboard_foot', $data);
			return;
		}
		$data['page_data'] = array(
			'module' => 'Cottages',
			'section' => 'Add Cottage',
			'scripts_path' => array(
				'custom/modules/cottages/form'
			)
		);
		$this->load->view('layouts/dashboard_head', $data);
		$this->load->view('modules/cottages/form', $data);
		$this->load->view('layouts/dashboard_foot', $data);
	}
}
