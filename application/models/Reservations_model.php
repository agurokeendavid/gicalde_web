<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reservations_model extends CI_Model
{
	private $_table_name = 'reservations';

	public function __construct()
	{
		parent::__construct();
	}

	public function does_reservation_exist($check_in_date)
	{
		return $this->db->where('deleted_at', null)
			->where('check_in_date', $check_in_date)
			->where('reservation_status', RESERVATION_STATUS_APPROVED)
			->get($this->_table_name)
			->num_rows();
	}

	public function get_all_by_reservation_status($reservation_status)
	{
		return $this->db->where('reservation_status', $reservation_status)
			->where('deleted_at', null)
			->get($this->_table_name)
			->result_array();
	}


	public function get_all_room_reservations_by_room_id($room_id)
	{
		return $this->db->where('room_id', $room_id)
			->where('deleted_at', null)
			->order_by('created_at', 'desc')
			->get($this->_table_name)
			->result_array();
	}

	public function get_all_room_reservations()
	{
		return $this->db->where('room_id !=', null)
			->where('deleted_at', null)
			->order_by('created_at', 'desc')
			->get($this->_table_name)
			->result_array();
	}

	public function get_all_cottage_reservations()
	{
		return $this->db->where('cottage !=', null)
			->where('deleted_at', null)
			->order_by('created_at', 'desc')
			->get($this->_table_name)
			->result_array();
	}

	public function get_all_cottage_reservations_by_cottage_id($cottage_id)
	{
		return $this->db->where('cottage', $cottage_id)
			->where('deleted_at', null)
			->order_by('created_at', 'desc')
			->get($this->_table_name)
			->result_array();
	}

	public function get_all()
	{
		return $this->db->where('deleted_at', null)
			->order_by('created_at', 'desc')
			->get($this->_table_name)
			->result_array();
	}

	public function insert($data)
	{
		$this->db->insert($this->_table_name, $data);
		return $this->db->insert_id();
	}

	public function delete($data, $id)
	{
		$this->db->where('id', $id)
			->update($this->_table_name, $data);

		return $id;
	}

	public function update($data, $id)
	{
		$this->db->where('id', $id)
			->update($this->_table_name, $data);

		return $id;
	}

	public function get($id)
	{
		return $this->db->where('id', $id)
			->where('deleted_at', null)
			->get($this->_table_name)
			->row_array();
	}

	public function get_all_by_room_id($room_id)
	{
		return $this->db->where('room_id', $room_id)
			->where('deleted_at', null)
			->get($this->_table_name)
			->result_array();
	}
}

