<?php

class User extends Controller {
	public function index(){
		$data['title'] = 'Data List';
		$data['users'] = $this->model('User_model')->getAllUser();
		$this->view('templates/header', $data);
		$this->view('user/index', $data);
		$this->view('templates/footer');
	}

	public function detail($id){

		$data['title'] = 'User Detail';
		$data['user'] = $this->model('User_model')->getUserById($id);
		$this->view('templates/header', $data);
		$this->view('user/detail', $data);
		$this->view('templates/footer');
	}

	public function addUser(){		

		if( $this->model('User_model')->addUser($_POST) > 0 ) {
			Flasher::setMessage('Successfully','to add','success');
			header('location: '. BASEURL . '/user');
			exit;			
		}else{
			Flasher::setMessage('failed','to add','danger');
			header('location: '. BASEURL . '/user');
			exit;	
		}
	}

	public function updateUser(){	
		if( $this->model('User_model')->updateUserData($_POST) > 0 ) {
			Flasher::setMessage('Successfully','updated','success');
			header('location: '. BASEURL . '/user');
			exit;			
		}else{
			Flasher::setMessage('failed','to update','danger');
			header('location: '. BASEURL . '/user');
			exit;	
		}
	}

	public function delete($id){
		if( $this->model('User_model')->deleteUser($id) > 0 ) {
			Flasher::setMessage('Successfully','deleted','success');
			header('location: '. BASEURL . '/user');
			exit;			
		}else{
			Flasher::setMessage('failed','to remove','danger');
			header('location: '. BASEURL . '/user');
			exit;	
		}
	}

	public function getDataChange(){

		$id = $_POST['id'];

		echo json_encode($this->model('User_model')->getUserById($id));
	}

    public function search(){ 
		$data['title'] = 'Search Data User';
		$data['users'] = $this->model('User_model')->searchUserData($_POST);
		$this->view('templates/header', $data);
		$this->view('user/index', $data);
		$this->view('templates/footer');
    }
}