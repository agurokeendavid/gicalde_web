<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Room_photos_model extends CI_Model
{
	private $_table_name = 'room_photos';

	public function __construct()
	{
		parent::__construct();
	}

	public function get_first_by_room_id($room_id)
	{
		return $this->db->where('room_id', $room_id)
			->where('deleted_at', null)
			->order_by('photo_key')
			->limit(1)
			->get($this->_table_name)
			->row_array();
	}

	public function update_by_room_id_and_photo_key($data, $room_id, $photo_key)
	{
		$this->db->where('room_id', $room_id)
			->where('photo_key', $photo_key)
			->update($this->_table_name, $data);

		return $room_id;
	}

	public function get_all_by_room_id($room_id)
	{
		return $this->db->where('room_id', $room_id)
			->where('deleted_at', null)
			->get($this->_table_name)
			->result_array();
	}

	public function get_all()
	{
		return $this->db->where('deleted_at', null)
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
}

