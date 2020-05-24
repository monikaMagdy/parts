<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/CarModel.php");
include_once("database.php");

class Cars extends Model 
{
	private $Cars;
	
	function __construct()
	{
       $d1= Database::GetInstance();
       $d1->GetConnection();
	   $this->fillArray();
	}

	function fillArray() 
	{
		$this->Cars = array();
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
		$d1= Database::GetInstance();
        $result = mysqli_query($d1->GetConnection(), $cars);

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
	 	$d1= Database::GetInstance();
        $result = mysqli_query($d1->GetConnection(), $sql);
		if ($sql)
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