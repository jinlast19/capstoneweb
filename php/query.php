<?php
class conn{
	protected $connection;
	protected $string;
	function __construct($host,$username,$password,$table){
		$this->connection = mysqli_connect($host, $username, $password, $table);
	}

	function select($select){
		$this->string = "SELECT $select";
		return $this;
	}
	function from($table){
		$this->string .= "FROM $table";
		return $this;
	}
	function where($where){
		$this->string .= " WHERE $where";
		return $this;
	}
	function query(){
		$result = mysqli_query($this->connection , $this->string);
		while($data = mysqli_fetch_assoc($result)){
			$info[] = $data;
		}
		
		echo json_encode($info);
	}
	




}



?>