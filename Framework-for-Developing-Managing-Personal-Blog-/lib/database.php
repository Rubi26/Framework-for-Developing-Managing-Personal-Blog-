<?php
class database{
	public $host = DB_HOST;
	public $user = DB_USER;
	public $pass = DB_PASS;
	public $dbname = DB_NAME;

	public $link;
	public $error;

	public function __construct(){
		$this->connectDB();
	}

	private function connectDB(){
		$this->link = new mysqli($this->host ,$this->user ,$this->pass ,$this->dbname);

		if(!$this->link){
			$this->error = "Connection Failed".$this->link->connect_error;
			return false;
		}
	}

	//for selecting or reading data
	public function select($query){
		$result = $this->link->query($query) or die($this->link->error);
		
		if($result->num_rows > 0){
			return $result;
		}else{
			return false;
		}
	}

	//for inserting or creating data
	public function insert($query){
		$insert_row = $this->link->query($query) or die($this->link->error);
		if($insert_row){
			return $insert_row;
		}else{
			return false;
		}
	}

	//for updating data
	public function update($query){
		$update_row = $this->link->query($query) or die($this->link->error);
		if($update_row){
			return $update_row;
		}else{
			return false;
		}
	}

	//for deleting data
	public function delete($query){
		$delete_row = $this->link->query($query) or die($this->link->error);
		if($delete_row){
			return $delete_row;
		}else{
			return false;
		}
	}

}
?>