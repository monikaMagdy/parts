<?php

require_once(__ROOT__ . "controller/Controller.php");

class CarController extends Controller
{	
	 function Con_addCar()
	{

		$CarName=$_REQUEST['CarName'];
		$CarModel=$_REQUEST['CarModel'];
		$CarYear=$_REQUEST['CarYear'];
		$imgName=$_REQUEST['imgName'];


		//validation
		// if(empty($_REQUEST['CarName']) || empty($_REQUEST['CarModel'])|| empty($_REQUEST['CarYear'])||$_REQUEST['imgName'])	
	    // {
		//  echo "<script>alert('Please Fill The empty space');
		//  </script>";
	    // }
	    // else{
		$this->model->addcar($CarName, $CarModel,$CarYear,$imgName);
		//}
	}

	public function editCar($CarID)
	 {
	 	$CarName = $_REQUEST['CarName'];
		$CarModel = $_REQUEST['CarModel'];
		$CarYear = $_REQUEST['CarYear'];

		//validation
		// if(empty($_REQUEST['CarName']) || empty($_REQUEST['CarModel'])|| empty($_REQUEST['CarYear']))	
	    // {
		//  echo "<script>alert('Please Fill The empty space');
		//  </script>";
	    // }
	    // else
		$this->model->getCar($CarID)->Model_editCar($CarName,$CarModel,$CarYear);
	}

	public function delete($CarID)
	{
		
		$this->model->getCar($CarID)->deleteCar($CarID);
	}
}
?>