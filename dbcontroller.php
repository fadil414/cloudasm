<?php
class DBController {
	private $host = "ec2-174-129-240-67.compute-1.amazonaws.com";
	private $user = "fmzlacwmckgrka";
	private $password = "c98b05ecad8f873e0db1aef7ec1426310d893d3c1a77c824d51605383ff5c1f3";
	private $database = "d5oe7semr8nmd6";
	private $conn;
	
	function __construct() {
		$this->conn = $this->connectDB();
	}
	
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}
	
	function runQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
        
        function query($query) {
            $result = mysqli_query($this->conn, $query);
            return $result;
        }
        
        function printError() {
            return mysqli_error($this->conn);
        }
}
?>
