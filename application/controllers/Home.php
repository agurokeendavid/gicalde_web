<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$data['page_data'] = array(
			'module' => 'Home',
			'section' => 'Main'
		);
		$this->load->view('layouts/home_head', $data);
		$this->load->view('modules/home/index', $data);
		$this->load->view('layouts/home_foot', $data);
	}

	public function about() {
		$data['page_data'] = array(
			'title' => 'About Us'
		);
		$this->load->view('layouts/home_head', $data);
		$this->load->view('modules/home/about', $data);
		$this->load->view('layouts/home_foot', $data);
	}

	public function book() {
		$data['page_data'] = array(
			'module' => 'Home',
			'section' => 'Book Reservation'
		);
		$this->load->view('layouts/home_head', $data);
		$this->load->view('modules/home/book', $data);
		$this->load->view('layouts/home_foot', $data);
	}
}
