<?php

class Home extends Controller {
	public function index()
	{
		$data['nama'] = "Simple CRUD MVC";
		$data['title'] = 'Home Page';

		$this->view('templates/header', $data);
		$this->view('home/index', $data);
		$this->view('templates/footer');
	}
}