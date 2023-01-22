<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('get_all_audit_trail')) {
	function get_all_audit_trail()
	{
		$ci = &get_instance();
		$ci->load->model('Audit_trail_model', 'M_audit_trail');
		return $ci->M_audit_trail->get_all();
	}
}

if (!function_exists('insert_audit_trail')) {
	function insert_audit_trail($email_address, $action_taken)
	{
		$ci = &get_instance();
		$ci->load->model('Audit_trail_model', 'M_audit_trail');
		$audit_trail_data = array(
			'email_address' => $email_address,
			'action_taken' => $action_taken,
			'created_by' => DEFAULT_ADMIN_ID,
			'created_at' => NOW
		);

		return $ci->M_audit_trail->insert($audit_trail_data);
	}
}

if (!function_exists('count_all_reservations_by_reservation_status')) {
	function count_all_reservations_by_reservation_status($reservation_status)
	{
		$ci = &get_instance();
		$data = $ci->db->select('COUNT(1) total_reservations')
			->where('reservation_status', $reservation_status)
			->where('deleted_at', null)
			->get('reservations')
			->row_array();

		if (empty($data)) return null;

		return $data['total_reservations'];
	}
}

if (!function_exists('get_total_earning')) {
	function get_total_earning()
	{
		$ci = &get_instance();
		$data = $ci->db->select('SUM(paid_amount) total_paid_amount')
			->where('reservation_status', RESERVATION_STATUS_COMPLETED)
			->where('deleted_at', null)
			->get('reservations')
			->row_array();

		if (empty($data)) return null;

		return $data['total_paid_amount'];
	}
}

if (!function_exists('get_value_by_table_name')) {
	function get_value_by_table_name($id, $table_name, $column)
	{
		$ci = &get_instance();
		$data = $ci->db->where('id', $id)
			->where('deleted_at', null)
			->get($table_name)
			->row_array();

		if (empty($data)) return null;

		return $data[$column];
	}
}

if (!function_exists('get_person_name')) {
	function get_person_name($user_id)
	{
		$ci = &get_instance();
		$ci->load->model('Users_model', 'M_users');
		$user = $ci->M_users->get($user_id);

		if (empty($user)) return null;

		return $user['first_name'] . ' ' . $user['last_name'];
	}
}


if (!function_exists('count_all_users_by_role_id')) {
	function count_all_users_by_role_id($role_id)
	{
		$ci = &get_instance();
		return $ci->db->where('role_id', $role_id)
			->where('deleted_at', null)
			->get('users')
			->num_rows();
	}
}

if (!function_exists('count_all')) {
	function count_all($table_name)
	{
		$ci = &get_instance();
		return $ci->db->where('deleted_at', null)
			->get($table_name)
			->num_rows();
	}
}
