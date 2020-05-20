<?php
require_once(__ROOT__ . "model/Model.php");
include_once("database.php");

class Car extends Model
{
	private $CarID;
	private $CarName;
	private $CarModel;
	private $CarYear;
	private $imgName;
	

	function __construct($CarID, $CarName="",$CarModel="",$CarYear="",$imgName="")
	{
		$this->CarID = $CarID;
		
        $d1= Database::GetInstance();
        $d1->GetConnection();
		if(""===$CarName)
		{
			$this->readCar($CarID);
		}
		else
		{
			$this->CarName = $CarName;
			$this->CarModel = $CarModel;
			$this->CarYear = $CarYear;
			$this->imgName = $imgName;
			
		}
	}

	function getCarName() 
	{
		return $this->CarName;
	}	
	function setCarName($CarName)
	{
		return $this->CarName = $CarName;
	}

	function getCarModel() 
	{
		return $this->CarModel;
	}
	function setCarModel($CarModel) 
	{
		return $this->CarModel = $CarModel;
	}

	function getCarYear() 
	{
		return $this->CarYear;
	}
	function setCarYear($CarYear) 
	{
		return $this->CarYear = $CarYear;
	}

	function getimgName() 
	{
		return $this->imgName;
	}	
	function setimgName($imgName)
	{
		return $this->imgName = $imgName;
	}
	function getCarID()
	{
		return $this->CarID;
	}

	function readCar($CarID)
	{
		$sql = "SELECT * FROM car where CarID=".$CarID;

	    $d1= Database::GetInstance();
        $result = mysqli_query($d1->GetConnection(), $sql);
		if ($result->num_rows == 1)
		{
			$row=mysqli_fetch_array($result);
			$this->CarName = $row["CarName"];
			$this->CarModel = $row["CarModel"];
			$this->CarYear = $row["CarYear"];
			$this->imgName=$row["imgName"];
		}
		else 
		{
			$this->CarName = "";
			$this->CarModel = "";
			$this->CarYear= "";
			$this->imgName="";
		}	
	}

	function Model_editCar($CarName,$CarModel,$CarYear)
	{
		$edit = "UPDATE `car` SET CarName='$CarName',CarModel='$CarModel',CarYear='$CarYear' where CarID=$this->CarID" ;

        $d1= Database::GetInstance();
        $result = mysqli_query($d1->GetConnection(), $edit);
		if($edit)
		{
			echo "updated successfully.";
			$this->readCar($this->CarID);
		} 
		else
		{
			echo "ERROR: Could not able to execute $sql. " ;
		}
	}

	function deleteCar($CarID)
	{
		$sqlCar="DELETE FROM car WHERE CarID=$this->CarID";
		$d1= Database::GetInstance();
        $result = mysqli_query($d1->GetConnection(), $sqlCar);
		if($sqlCar)
		{
			$sqlSP="DELETE FROM sparepart INNER JOIN car on sparepart.CarID=car.CarID";
			echo "deleted successfully.";
			echo"Deleted the spare parts of this car successfully.";
		} 
		else
		{
			echo "ERROR: Could not able to execute $sqlCar. " ;
		}
	}
 }
?>