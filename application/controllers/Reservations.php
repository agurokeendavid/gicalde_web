<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reservations extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('user')) {
			redirect('auth/login');
		}

		$this->load->model(array(
			'Reservations_model' => 'M_reservations'
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

	public function index($reservation_status)
	{
		$data['page_data'] = array(
			'module' => 'Reservations',
			'section' => ucfirst(strtolower(Dropdown::get_static('reservation_status', $reservation_status, 'view'))) . ' Reservations',
			'scripts_path' => array(
				'custom/modules/reservations/index'
			)
		);
		$data['reservations'] = $this->M_reservations->get_all_by_reservation_status($reservation_status);
		$this->load->view('layouts/dashboard_head', $data);
		$this->load->view('modules/reservations/index', $data);
		$this->load->view('layouts/dashboard_foot', $data);
	}
}
