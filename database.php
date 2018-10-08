<?php
 
 
class Database{
	
	private $connection;
 
	
	function __construct()
	{
		$this->connect_db();
	}
 
	public function connect_db(){
		
		
		$this->connection = new mysqli('localhost', 'root', '', 'emp');
		if(mysqli_connect_error()){
			die("Database Connection Failed" . mysqli_connect_error() . mysqli_connect_errno());
		}
	}
 
	public function create($fname,$lname,$email,$gender,$age){
		
		$sqlselect="SELECT * FROM `crud` WHERE `email_id`='$email'";
		
		$resunique=mysqli_query($this->connection, $sqlselect);
		
		//row count 
		
		$row_cnt = $resunique->num_rows;
		
		if($row_cnt<1)
		{
			$sql="INSERT INTO `crud`(`first_name`, `last_name`, `gender`, `age`, `email_id`) VALUES ('$fname', '$lname','$gender', '$age','$email')";
			$res = mysqli_query($this->connection, $sql);
			if($res){
				header("Location:view.php");
				return true;
			}else{
				return false;
			}
		
		}
		else{
			
			echo"email is already available";
			return false;
		}
		
	}
 
	public function read($id=null){
		$sql = "SELECT * FROM `crud`";
		if($id){ $sql .= " WHERE id=$id";}
 		$res = mysqli_query($this->connection, $sql);
 		return $res;
	}
 
	public function update($fname,$lname,$gender,$age,$email, $id){
		$sql = "UPDATE `crud` SET first_name='$fname', last_name='$lname', gender='$gender', age='$age' , email_id='$email' WHERE id=$id";
		$res = mysqli_query($this->connection, $sql);
		if($res){
			return true;
		}else{
			return false;
		}
	}
 
	public function delete($id){
		$sql = "DELETE FROM `crud` WHERE id=$id";
 		$res = mysqli_query($this->connection, $sql);
 		if($res){
			
 			return true;
 		}else{
 			return false;
 		}
	}
 
	public function sanitize($var){
		$return = mysqli_real_escape_string($this->connection, $var);
		return $return;
	}
 
}
 
$database = new Database();
 
?>