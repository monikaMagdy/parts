<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/Employee.php");

class Employees extends Model
{
	private $Employees;
	function __construct() 
	{
		$this->fillArray();
	} 

	function fillArray()
	{
		$this->Employees = array();
		$this->db = $this->connect();
		$result = $this->readEmployees();
		while ($row = $result->fetch_assoc())
		{
			/*array_push($this->Employees, new Employee($row["MangerID"],$row["MangerName"],$row["MangerUserName"],$row["MangerEmail"],$row["password"],$row["age"],$row["phone"]));
			*/
		}
	}

	function getEmployees()
	{
		return $this->Employees;
	}

	function readEmployees()
	{
		
	}

}

?>