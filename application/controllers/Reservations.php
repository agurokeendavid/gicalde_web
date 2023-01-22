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
		$data['reservation_status'] = $reservation_status;
		$this->load->view('layouts/dashboard_head', $data);
		$this->load->view('modules/reservations/index', $data);
		$this->load->view('layouts/dashboard_foot', $data);
	}

	public function get($id = null)
	{
		$reservation = $this->M_reservations->get($id);
		if (!$reservation)
		{
			show_404();
			die();
		}
		$reservation['room_id'] = get_value_by_table_name($reservation['room_id'], 'rooms', 'name');
		$reservation['cottage_id'] = get_value_by_table_name($reservation['cottage_id'], 'cottages', 'name');
		exit(json_encode($reservation));
	}

	public function update_status($reservation_status)
	{
		if ($post_data = $this->input->post()) {
			if ($reservation_status == RESERVATION_STATUS_APPROVED) {
				$reservation_id = $post_data['approve_reservation_id'];
				$reservation = $this->M_reservations->get($reservation_id);

				if (empty($reservation))
				{
					show_404();
					die();
				}

				$reservation_data = array(
						'paid_amount' => $post_data['approve_reservation_paid_amount'],
						'paid_date' => $post_data['approve_reservation_paid_date'],
						'reservation_status' => RESERVATION_STATUS_APPROVED
					) + $this->_update_additional;
				$this->M_reservations->update($reservation_data, $reservation_id);
				send_update_reservation_status($reservation['name'], $reservation['email_address'], RESERVATION_STATUS_APPROVED);
				exit(json_encode(
					array(
						'status' => RESULT_SUCCESS,
						'message' => 'Reservation has been successfully approved.'
					)
				));
			} else if ($reservation_status == RESERVATION_STATUS_COMPLETED) {

				$reservation_id = $post_data['complete_reservation_id'];
				$reservation = $this->M_reservations->get($reservation_id);

				if (empty($reservation))
				{
					show_404();
					die();
				}

				$reservation_data = array(
						'paid_amount' => $reservation['paid_amount'] + $post_data['complete_reservation_paid_amount'],
						'paid_date' => $post_data['complete_reservation_paid_date'],
						'reservation_status' => RESERVATION_STATUS_COMPLETED
					) + $this->_update_additional;
				$this->M_reservations->update($reservation_data, $reservation_id);
				send_update_reservation_status($reservation['name'], $reservation['email_address'], RESERVATION_STATUS_APPROVED);
				exit(json_encode(
					array(
						'status' => RESULT_SUCCESS,
						'message' => 'Reservation has been successfully completed.'
					)
				));
			} else if ($reservation_status == RESERVATION_STATUS_CANCELLED) {

				$reservation_id = $post_data['id'];
				$reservation = $this->M_reservations->get($reservation_id);
				if (empty($reservation))
				{
					show_404();
					die();
				}
				$reservation_data = array(
						'reservation_status' => RESERVATION_STATUS_CANCELLED
					) + $this->_update_additional;

				$this->M_reservations->update($reservation_data, $reservation_id);
				send_update_reservation_status($reservation['name'], $reservation['email_address'], RESERVATION_STATUS_APPROVED);
				exit(json_encode(
					array(
						'status' => RESULT_SUCCESS,
						'message' => 'Reservation has been successfully cancelled.'
					)
				));
			}



			show_404();
			die();
		}
	}
}
