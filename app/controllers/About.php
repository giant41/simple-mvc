<?php

class About extends Controller{

	public function index($nama = 'itep', $pekerjaan = 'WAD'){
		$data['title'] = 'About Page';
		$this->view('templates/header', $data);
		$this->view('about/index');
		$this->view('templates/footer');
	}

}