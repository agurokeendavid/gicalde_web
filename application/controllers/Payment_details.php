<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment_details extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('user')) {
			redirect('auth/login');
		}

		$this->load->model(array(
			'Payment_details_model' => 'M_payment_details'
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

	public function get_first() {
		$payment_details = $this->M_payment_details->get_first();
		exit(json_encode($payment_details));
	}

	public function update()
	{
		if ($post_data = $this->input->post())
		{
			$data = array(
				'gcash_name' => $post_data['set_payment_details_gcash_name'],
				'gcash_account_number' => $post_data['set_payment_details_gcash_mobile_number'],
				'bank_account_name' => $post_data['set_payment_details_bank_account_name'],
				'bank_account_number' => $post_data['set_payment_details_bank_account_number']
			) + $this->_update_additional;

			$this->M_payment_details->update($data, $post_data['set_payment_details_id']);
			exit(json_encode(array(
				'status' => RESULT_SUCCESS,
				'message' => 'Data has been successfully updated.'
			)));
		}

		show_404();
		die();
	}
}
