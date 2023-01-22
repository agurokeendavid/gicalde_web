<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rooms extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('user')) {
			redirect('auth/login');
		}

		$this->load->model(array(
			'Rooms_model' => 'M_rooms',
			'Room_photos_model' => 'M_room_photos'
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
			$this->M_rooms->delete($this->_delete_additional, $post_data['id']);
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
		$room = $this->M_rooms->get($id);
		if (!$room)
		{
			show_404();
			die();
		}
		exit(json_encode($room));
	}

	public function index()
	{
		$data['page_data'] = array(
			'module' => 'Rooms',
			'section' => 'Manage Rooms',
			'scripts_path' => array(
				'custom/modules/rooms/index'
			)
		);
		$data['rooms'] = $this->M_rooms->get_all();
		$this->load->view('layouts/dashboard_head', $data);
		$this->load->view('modules/rooms/index', $data);
		$this->load->view('layouts/dashboard_foot', $data);
	}

	public function form($id = null)
	{
		if ($post_data = $this->input->post()) {
			$photo_1_file_name = null;
			$photo_2_file_name = null;
			$photo_3_file_name = null;
			$photo_4_file_name = null;
			$photo_5_file_name = null;
			$photo_6_file_name = null;

			$config['upload_path'] = 'assets/uploads/rooms/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['encrypt_name'] = true;
			$config['max_size'] = '10000000000'; // max_size in kb

			if (!empty($_FILES['photo_1_file']['name'])) {
				$config['file_name'] = $_FILES['photo_1_file']['name'];
				$this->load->library('upload', $config);

				// File upload
				if ($this->upload->do_upload('photo_1_file')) {
					if (!is_dir('assets/uploads/rooms')) {
						//Directory does not exist, so lets create it.
						mkdir('assets/uploads/rooms', 0755);
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

			if (!empty($_FILES['photo_2_file']['name'])) {
				$config['file_name'] = $_FILES['photo_2_file']['name'];
				$this->load->library('upload', $config);

				// File upload
				if ($this->upload->do_upload('photo_2_file')) {
					if (!is_dir('assets/uploads/rooms')) {
						//Directory does not exist, so lets create it.
						mkdir('assets/uploads/rooms', 0755);
					}
					// Get data about the file
					$upload_data = $this->upload->data();
					$photo_2_file_name = $upload_data['file_name'];
				} else {
					exit(json_encode(
						array(
							'status' => RESULT_FAILED,
							'message' => 'Failed to upload file.'
						)
					));
				}
			}

			if (!empty($_FILES['photo_3_file']['name'])) {
				$config['file_name'] = $_FILES['photo_3_file']['name'];
				$this->load->library('upload', $config);

				// File upload
				if ($this->upload->do_upload('photo_3_file')) {
					if (!is_dir('assets/uploads/rooms')) {
						//Directory does not exist, so lets create it.
						mkdir('assets/uploads/rooms', 0755);
					}
					// Get data about the file
					$upload_data = $this->upload->data();
					$photo_3_file_name = $upload_data['file_name'];
				} else {
					exit(json_encode(
						array(
							'status' => RESULT_FAILED,
							'message' => 'Failed to upload file.'
						)
					));
				}
			}

			if (!empty($_FILES['photo_4_file']['name'])) {
				$config['file_name'] = $_FILES['photo_4_file']['name'];
				$this->load->library('upload', $config);

				// File upload
				if ($this->upload->do_upload('photo_4_file')) {
					if (!is_dir('assets/uploads/rooms')) {
						//Directory does not exist, so lets create it.
						mkdir('assets/uploads/rooms', 0755);
					}
					// Get data about the file
					$upload_data = $this->upload->data();
					$photo_4_file_name = $upload_data['file_name'];
				} else {
					exit(json_encode(
						array(
							'status' => RESULT_FAILED,
							'message' => 'Failed to upload file.'
						)
					));
				}
			}

			if (!empty($_FILES['photo_5_file']['name'])) {
				$config['file_name'] = $_FILES['photo_5_file']['name'];
				$this->load->library('upload', $config);

				// File upload
				if ($this->upload->do_upload('photo_5_file')) {
					if (!is_dir('assets/uploads/rooms')) {
						//Directory does not exist, so lets create it.
						mkdir('assets/uploads/rooms', 0755);
					}
					// Get data about the file
					$upload_data = $this->upload->data();
					$photo_5_file_name = $upload_data['file_name'];
				} else {
					exit(json_encode(
						array(
							'status' => RESULT_FAILED,
							'message' => 'Failed to upload file.'
						)
					));
				}
			}

			if (!empty($_FILES['photo_6_file']['name'])) {
				$config['file_name'] = $_FILES['photo_6_file']['name'];
				$this->load->library('upload', $config);

				// File upload
				if ($this->upload->do_upload('photo_6_file')) {
					if (!is_dir('assets/uploads/rooms')) {
						//Directory does not exist, so lets create it.
						mkdir('assets/uploads/rooms', 0755);
					}
					// Get data about the file
					$upload_data = $this->upload->data();
					$photo_6_file_name = $upload_data['file_name'];
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
				$room_data = array(
					'name' => strtoupper($post_data['name']),
					'description' => $post_data['description'],
					'no_of_houses' => $post_data['no_of_houses'],
					'no_of_guests' => $post_data['no_of_guests'],
					'no_of_rooms' => $post_data['no_of_rooms'],
					'price' => $post_data['price'],
					'slots' => $post_data['slots']
				) + $this->_update_additional;

				$photos = array(
					$photo_1_file_name,
					$photo_2_file_name,
					$photo_3_file_name,
					$photo_4_file_name,
					$photo_5_file_name,
					$photo_6_file_name,
				);

				$this->db->trans_start();
				$room_id = $this->M_rooms->update($room_data, $id);
				foreach ($photos as $key => $value) {

					if (!$value) continue;

					$room_photos_data = array(
						'room_id' => $room_id,
						'photo_file_name' => $value
					) + $this->_update_additional;

					$this->M_room_photos->update_by_room_id_and_photo_key($room_photos_data, $room_id, $key);
				}

				$this->db->trans_complete();
				exit(json_encode(
					array(
						'status' => RESULT_SUCCESS,
						'message' => 'Data has been successfully updated.'
					)
				));
			}

			$room_data = array(
					'name' => strtoupper($post_data['name']),
					'description' => $post_data['description'],
					'no_of_houses' => $post_data['no_of_houses'],
					'no_of_guests' => $post_data['no_of_guests'],
					'no_of_rooms' => $post_data['no_of_rooms'],
					'price' => $post_data['price'],
					'slots' => $post_data['slots']
				) + $this->_create_additional;

			$this->db->trans_start();
			$room_id = $this->M_rooms->insert($room_data);
			$photos = array(
				$photo_1_file_name,
				$photo_2_file_name,
				$photo_3_file_name,
				$photo_4_file_name,
				$photo_5_file_name,
				$photo_6_file_name,
			);
			foreach ($photos as $key => $value) {
				if (!$value) continue;

				$room_photos_data = array(
						'room_id' => $room_id,
						'photo_key' => $key,
						'photo_file_name' => $value
					) + $this->_create_additional;
				$this->M_room_photos->insert($room_photos_data);
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
			$room = $this->M_rooms->get($id);
			$room_photos = $this->M_room_photos->get_all_by_room_id($id);
			if (!$room) {
				show_404();
				die();
			}
			$data['info'] = $room;
			$data['info_photos'] = $room_photos;
			$data['page_data'] = array(
				'module' => 'Rooms',
				'section' => 'Update Room',
				'scripts_path' => array(
					'custom/modules/rooms/form'
				)
			);
			$this->load->view('layouts/dashboard_head', $data);
			$this->load->view('modules/rooms/form', $data);
			$this->load->view('layouts/dashboard_foot', $data);
			return;
		}
		$data['page_data'] = array(
			'module' => 'Rooms',
			'section' => 'Add Room',
			'scripts_path' => array(
				'custom/modules/rooms/form'
			)
		);
		$this->load->view('layouts/dashboard_head', $data);
		$this->load->view('modules/rooms/form', $data);
		$this->load->view('layouts/dashboard_foot', $data);
	}
}
