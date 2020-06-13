<?php

require_once(__ROOT__ . "controller/Controller.php");

class CarController extends Controller
{	
	 function Con_addCar()
	{

		$CarName=	filter_var($_REQUEST['CarName'],FILTER_SANITIZE_STRING);
		$CarModel=	filter_var($_REQUEST['CarModel'], FILTER_SANITIZE_STRING);
		$imgName=	filter_var($_REQUEST['imgName'], FILTER_SANITIZE_STRING);
		$CarYear=	filter_var($_REQUEST['CarYear'],FILTER_VALIDATE_INT);
		
		$this->model->addcar($CarName, $CarModel,$CarYear,$imgName);
		
	}

	public function editCar($CarID)
	 {
	 	$CarName = 	filter_var($_REQUEST["CarName"], FILTER_SANITIZE_STRING);
		 $CarModel= filter_var($_REQUEST["CarModel"], FILTER_SANITIZE_STRING);
		 $CarYear = filter_var($_REQUEST["CarYear"],FILTER_VALIDATE_INT);
	
		$this->model->getCar($CarID)->Model_editCar($CarName,$CarModel,$CarYear);
	}

	public function delete($CarID)
	{
		
		$this->model->getCar($CarID)->deleteCar($CarID);
	}
}
?>