<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/CarModel.php");

class Cars extends Model 
{
	private $Cars;
	
	function __construct()
	{
		$this->fillArray();
	}

	function fillArray() 
	{
		$this->Cars = array();
		$this->db = $this->connect();
		$result = $this->readCars();
		while ($row = $result->fetch_assoc()) 
		{
			array_push($this->Cars, new Car($row["CarID"]));
		}
	}
	function getCars() {
		$this->fillArray();  
		return $this->Cars;
	}

	function getCar($CarID)
	{
		foreach($this->Cars as $Car)
		{
			if ($CarID == $Car->getCarID())
			{
				return $Car;
			}
		}
		
	}
	function readCars()
	{
		$cars="SELECT * FROM `car`";
		
		$result=$this->db->query($cars);
		if ($result->num_rows > -1){
			return $result;
		}
		else
		{
			return false;
		}
	}

	function addcar($CarName, $CarModel,$CarYear,$imgName)
	{
		$sql="INSERT INTO car
		(
		CarName,
		CarModel,
		CarYear,
		imgName
		)
	 	VALUES 
	 	(
	 	'$CarName',
	 	'$CarModel',
	 	'$CarYear',
	 	'$imgName')";
		if($this->db->query($sql) === true)
		{
			echo "Records inserted successfully.";
			$this->fillArray();
		} 
		else
		{
			echo "ERROR: Could not able to execute $sql. " ;
		}
	}
}
?>