<?php

class User_model{
	
	private $table = 'users';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllUser()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function getUserById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		return $this->db->single();
	}

	public function addUser($data)
	{
		$query = "INSERT INTO " . $this->table . " (full_name, email) VALUES(:full_name, :email)";
		$this->db->query($query);
		$this->db->bind('full_name',$data['full_name']);
		$this->db->bind('email',$data['email']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateUserData($data)
	{
		$query = "UPDATE " . $this->table . " SET full_name=:full_name, email=:email WHERE id=:id";
		$this->db->query($query);
		$this->db->bind('id',$data['id']);
		$this->db->bind('full_name',$data['full_name']);
		$this->db->bind('email',$data['email']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteUser($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		$this->db->execute();
		return $this->db->rowCount();
	}

	public function searchUserData($data) {
		$this->db->query("SELECT * FROM " . $this->table . " WHERE full_name LIKE '%" . $data['search'] . "%' OR email LIKE '%" . $data['search'] . "%'");
		return $this->db->resultSet();
	}
}