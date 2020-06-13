<?php

require_once(__ROOT__ . "controller/Controller.php");

class CarController extends Controller
{	
	 function Con_addCar()
	{

		$CarName=$_REQUEST['CarName'];

		$CarModel=$_REQUEST['CarModel'];

		$imgName=$_REQUEST['imgName'];
		$CarYear=$_REQUEST['CarYear'];
		
		$this->model->addcar($CarName, $CarModel,$CarYear,$imgName);
		
	}

	public function editCar($CarID)
	 {
	 	$CarName = $_REQUEST["CarName"];
	 	
		$CarModel = $_REQUEST["CarModel"];

		$CarYear = $_REQUEST["CarYear"];
	
		$this->model->getCar($CarID)->Model_editCar($CarName,$CarModel,$CarYear);
	}

	public function delete($CarID)
	{
		
		$this->model->getCar($CarID)->deleteCar($CarID);
	}
}
?>