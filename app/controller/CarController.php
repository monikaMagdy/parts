<?php

require_once(__ROOT__ . "controller/Controller.php");

class CarController extends Controller
{	
	 function Con_addCar()
	{

		$CarName=$_REQUEST['CarName'];
		if (!preg_match("/^[a-zA-Z ]*$/",$CarName)) 
		{
 			echo "<script>alert('Only letters and white space allowed');
		 		</script>";
		}

		$CarModel=$_REQUEST['CarModel'];

		$imgName=$_REQUEST['imgName'];
		$CarYear=$_REQUEST['CarYear'];
		if(!preg_match('#^[0-9]+$#', $CarYear))
		{
			echo"<script>alert('you have to enter Numeric Value in the CarYear');
		 		</script>";
		}else
		$this->model->addcar($CarName, $CarModel,$CarYear,$imgName);
		
	}

	public function editCar($CarID)
	 {
	 	$CarName = $_REQUEST["CarName"];
	 	/*if (!preg_match("/^[a-zA-Z ]*$/",$CarName)) 
		{
 			echo "<script>alert('Only letters and white space allowed');
		 		</script>";
		}*/

		$CarModel = $_REQUEST["CarModel"];

		$CarYear = $_REQUEST["CarYear"];
		/*	if(filter_var($CarYear, FILTER_VALIDATE_INT))
		{
			echo"<script>alert('you have to enter Numeric Value in the Car year');
		 		</script>";
		}*/
	    // else
		$this->model->getCar($CarID)->Model_editCar($CarName,$CarModel,$CarYear);
	}

	public function delete($CarID)
	{
		
		$this->model->getCar($CarID)->deleteCar($CarID);
	}
}
?>