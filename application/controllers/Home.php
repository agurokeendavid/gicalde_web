<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'Rooms_model' => 'M_rooms',
			'Room_photos_model' => 'M_room_photos',
			'Cottages_model' => 'M_cottages',
			'Cottages_photos_model' => 'M_cottages_photos',
			'Reservations_model' => 'M_reservations',
			'Users_model' => 'M_users',
			'Galleries_model' => 'M_galleries',
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

	public function index()
	{
		$data['page_data'] = array(
			'module' => 'Home',
			'section' => 'Main'
		);
		$rooms = $this->M_rooms->get_all();
		if (!empty($rooms)) {
			foreach ($rooms as $key => $value) {
				$room_photos = $this->M_room_photos->get_all_by_room_id($value['id']);
				if (empty($room_photos)) continue;

//				$rooms[$key]['room_photos_id'] = $room_photo['id'];
//				$rooms[$key]['photo_key'] = $room_photo['photo_key'];
//				$rooms[$key]['photo_file_name'] = $room_photos['photo_file_name'];
				$rooms[$key]['room_photos'] = $room_photos;
			}
		}
		$data['rooms'] = $rooms;
		$cottages = $this->M_cottages->get_all();
		if (!empty($cottages)) {
			foreach ($cottages as $key => $value) {
				$cottage_photos = $this->M_cottages_photos->get_all_by_cottages_id($value['id']);
				if (empty($cottage_photos)) continue;

//				$cottages[$key]['cottages_photos_id'] = $cottage_photo['id'];
//				$cottages[$key]['photo_key'] = $cottage_photo['photo_key'];
//				$cottages[$key]['photo_file_name'] = $cottage_photo['photo_file_name'];
				$cottages[$key]['cottage_photos'] = $cottage_photos;
			}
		}
		$data['cottages'] = $cottages;

		$this->load->view('layouts/home_head', $data);
		$this->load->view('modules/home/index', $data);
		$this->load->view('layouts/home_foot', $data);
	}

	public function about()
	{
		$data['page_data'] = array(
			'module' => 'Home',
			'section' => 'About Us'
		);
		$this->load->view('layouts/home_head', $data);
		$this->load->view('modules/home/about', $data);
		$this->load->view('layouts/home_foot', $data);
	}

	public function book()
	{
		if ($post_data = $this->input->post()) {
			$reservation = $this->M_reservations->does_reservation_exist($post_data['check_in_date']);
			if ($reservation) {
				exit(json_encode(
					array(
						'status' => RESULT_FAILED,
						'message' => 'Your check in date has been already book by the another user.'
					)
				));
			}
			$this->db->trans_start();
			$generated_reference = "GICALDE" . date('Y') . '-' . strtoupper(generateRandomString());
			$email_address = strtolower($post_data['email_address']);
			$no_of_guests = (int)$post_data['no_of_guests'];
			$total_price = 0;
			$reservation_data = array(
					'reference_no' => $generated_reference,
					'check_in_date' => $post_data['check_in_date'],
					'check_out_date' => $post_data['check_out_date'],
					'no_of_guests' => $no_of_guests,
					'mode_of_payment' => $post_data['mode_of_payment'],
					'first_name' => $post_data['first_name'],
					'middle_name' => $post_data['middle_name'],
					'last_name' => $post_data['last_name'],
					'contact_no' => $post_data['contact_no'],
					'email_address' => $email_address,
					'address' => $post_data['address'],
					'reservation_status' => RESERVATION_STATUS_PENDING,
					'payment_status' => PAYMENT_STATUS_PENDING
				) + $this->_create_additional;
			if (isset($post_data['room_id'])) {
				$reservation_data['room_id'] = $room_id = $post_data['room_id'];
				$room = $this->M_rooms->get($room_id);
				if (!$room) {
					show_404();
					die();
				}
				$reservation_data['total_price'] = $total_price = $room['price'];
				$room_data = array(
						'slots' => $room['slots'] - 1
					) + $this->_update_additional;
				$this->M_rooms->update($room_data, $room_id);
			} else if (isset($post_data['cottage_id'])) {
				$reservation_data['cottage_id'] = $cottage_id = $post_data['cottage_id'];
				$cottage = $this->M_cottages->get($cottage_id);

				if (!$cottage) {
					show_404();
					die();
				}

				$reservation_data['total_price'] = $total_price = $cottage['price'];
				$cottage_data = array(
						'slots' => $cottage['slots'] - 1
					) + $this->_update_additional;
				$this->M_cottages->update($cottage_data, $cottage_id);
			}

			if (!$this->M_users->does_user_exist_by_username($post_data['email_address'])) {
				$generated_password = password_hash(USER_DEFAULT_PASSWORD, PASSWORD_DEFAULT);
				$user_data = array(
						'username' => $email_address,
						'password' => $generated_password,
						'role_id' => ROLE_CLIENT,
						'first_name' => $post_data['first_name'],
						'middle_name' => $post_data['middle_name'],
						'last_name' => $post_data['last_name'],
						'contact_no' => $post_data['contact_no'],
						'address' => $post_data['address'],
						'is_activated' => BOOL_YES
					) + $this->_create_additional;

				$this->M_users->insert($user_data);
//				send_account_info($post_data['first_name'], $post_data['last_name'], $email_address, USER_DEFAULT_PASSWORD);
			}

			$this->M_reservations->insert($reservation_data);
			$this->db->trans_complete();
			send_payment_details($post_data['first_name'], $post_data['last_name'], $generated_reference, $email_address, $post_data['check_in_date'], $post_data['check_out_date'], $no_of_guests, $total_price, RESERVATION_STATUS_PENDING, $post_data['mode_of_payment']);
			exit(json_encode(
				array(
					'status' => RESULT_SUCCESS,
					'message' => 'Your booking reservation has been successfully submitted. Please wait for the email confirmation of the staff.'
				)
			));
		}

		if (!empty($_GET['room_id'])) {
			$room = $this->M_rooms->get($_GET['room_id']);
			if (!$room) {
				show_404();
				exit();
			}
			$data['reservation_type'] = 'room';
			$data['info'] = $room;
		} else if (!empty($_GET['cottage_id'])) {
			$cottage = $this->M_cottages->get($_GET['cottage_id']);
			if (!$cottage) {
				show_404();
				exit();
			}
			$data['reservation_type'] = 'cottage';
			$data['info'] = $cottage;
		} else {
			show_404();
			exit();
		}
		$data['page_data'] = array(
			'module' => 'Home',
			'section' => 'Book Reservation',
			'scripts_path' => array(
				'custom/modules/home/book'
			)
		);
		$this->load->view('layouts/home_head', $data);
		$this->load->view('modules/home/book', $data);
		$this->load->view('layouts/home_foot', $data);
	}

	public function contact_us()
	{
		if ($post_data = $this->input->post())
		{
			send_contact_us($post_data['name'], $post_data['email_address'], $post_data['subject'], $post_data['message']);
			exit(json_encode(
				array(
					'status' => RESULT_SUCCESS,
					'message' => 'Your have successfully sent a message.'
				)
			));
		}
		$data['page_data'] = array(
			'module' => 'Home',
			'section' => 'Contact Us',
			'scripts_path' => array(
				'custom/modules/home/contact_us'
			)
		);
		$this->load->view('layouts/home_head', $data);
		$this->load->view('modules/home/contact_us', $data);
		$this->load->view('layouts/home_foot', $data);
	}

	public function gallery()
	{
		$photos = $this->M_galleries->get_all();

		$data['page_data'] = array(
			'module' => 'Home',
			'section' => 'Gallery'
		);
		$data['photos'] = $photos;
		$this->load->view('layouts/home_head', $data);
		$this->load->view('modules/home/gallery', $data);
		$this->load->view('layouts/home_foot', $data);
	}
}
