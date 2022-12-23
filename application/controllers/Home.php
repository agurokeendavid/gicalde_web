<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$data['page_data'] = array(
			'title' => 'Home'
		);
		$this->load->view('layouts/home_header', $data);
		$this->load->view('pages/home/index', $data);
		$this->load->view('layouts/home_footer', $data);
	}

	public function about() {
		$data['page_data'] = array(
			'title' => 'About Us'
		);
		$this->load->view('layouts/home_header', $data);
		$this->load->view('pages/home/about', $data);
		$this->load->view('layouts/home_footer', $data);
	}

	public function book() {
		$data['page_data'] = array(
			'title' => 'Book Now'
		);
		$this->load->view('layouts/home_header', $data);
		$this->load->view('pages/home/book', $data);
		$this->load->view('layouts/home_footer', $data);
	}
}
