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
			'Cottages_photos_model' => 'M_cottages_photos'
		));
	}

	public function index()
	{
		$data['page_data'] = array(
			'module' => 'Home',
			'section' => 'Main'
		);
		$rooms = $this->M_rooms->get_all_for_viewing();
		if (!empty($rooms)) {
			foreach ($rooms as $key => $value) {
				$room_photo = $this->M_room_photos->get_first_by_room_id($value['id']);
				if (empty($room_photo)) continue;

				$rooms[$key]['room_photos_id'] = $room_photo['id'];
				$rooms[$key]['photo_key'] = $room_photo['photo_key'];
				$rooms[$key]['photo_file_name'] = $room_photo['photo_file_name'];
			}
		}
		$data['rooms'] = $rooms;
		$cottages = $this->M_cottages->get_all_for_viewing();
		if (!empty($cottages)) {
			foreach ($cottages as $key => $value) {
				$cottage_photo = $this->M_cottages_photos->get_first_by_cottages_id($value['id']);
				if (empty($cottage_photo)) continue;

				$cottages[$key]['cottages_photos_id'] = $cottage_photo['id'];
				$cottages[$key]['photo_key'] = $cottage_photo['photo_key'];
				$cottages[$key]['photo_file_name'] = $cottage_photo['photo_file_name'];
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
		$data['page_data'] = array(
			'module' => 'Home',
			'section' => 'Book Reservation'
		);
		$this->load->view('layouts/home_head', $data);
		$this->load->view('modules/home/book', $data);
		$this->load->view('layouts/home_foot', $data);
	}

	public function contact_us()
	{
		$data['page_data'] = array(
			'module' => 'Home',
			'section' => 'Contact Us'
		);
		$this->load->view('layouts/home_head', $data);
		$this->load->view('modules/home/contact_us', $data);
		$this->load->view('layouts/home_foot', $data);
	}

	public function gallery()
	{
		$photos = array();
		$room_photos = $this->M_room_photos->get_all();
		$cottages_photos = $this->M_cottages_photos->get_all();

		if ($room_photos) {
			foreach ($room_photos as $key => $value) {
				if (empty($value['photo_file_name'])) continue;

				$photos[] = $value + array('photo_type' => 'rooms');
			}
		}

		if ($cottages_photos) {
			foreach ($cottages_photos as $key => $value) {

				if (empty($value['photo_file_name'])) continue;

				$photos[] = $value + array('photo_type' => 'cottages');
			}
		}

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
