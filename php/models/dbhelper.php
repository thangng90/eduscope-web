<?php 
class dbhelper{
    protected $db_name  ='eduscope_db';
	protected $db_user	='root';
	protected $db_pass	= '';//'root';
	protected $db_host	= 'localhost';//'112.213.86.238';
	protected $connection;
	
	public function dbhelper(){
		$this->connection= mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
		//mysqli_select_db($this->connection, $this->db_name);
	}
	
	function execQuery($query) {
		mysqli_query($this->connection, "SET NAMES 'utf8'");
		$_select = mysqli_query($this->connection, $query);
		return $_select;
	}
    
	function getNumberRows($result) {
		return mysqli_num_rows($result);
	}
    
	function getAffectedRows() {
		return mysqli_affected_rows($this->connection);
	}
    
	function fetchArray($result) {
		return mysqli_fetch_array($result);
	}
    
	function execSQL($sql) {
		mysqli_query($this->connection, "SET NAMES 'utf8'");
		$q = mysqli_query($this->connection, $sql);
		if($q)
			return true;
		return false;
	}
    
	function execSQLReturnID($sql) {
		mysqli_query($this->connection, "SET NAMES 'utf8'");
		$q = mysqli_query($this->connection, $sql);
		$id = mysqli_insert_id($this->connection);
		if($q)
			return $id;
		return 0;
	}
}
?>