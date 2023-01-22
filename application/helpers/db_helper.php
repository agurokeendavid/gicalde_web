<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
