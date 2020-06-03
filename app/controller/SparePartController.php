<?php

require_once(__ROOT__ . "controller/Controller.php");

class SparePartController extends Controller
{
	public function Con_addSparePart($CarID)
	{
		$PartNumber=$_REQUEST['PartNumber'];
		// if(!preg_match('#^[0-9]+$#', $PartNumber))
		// {
		// 	echo"<script>alert('you have to enter Numeric Value in Part Number');
		//  		</script>";
		// }
		$PartName=$_REQUEST['PartName'];
		// if (!preg_match("/^[a-zA-Z ]*$/",$FullName)) 
		// {
 		// 	echo "<script>alert('Full Name must be Only letters and white space allowed');
		//  		</script>";
		// }

		$partCountry=$_REQUEST['partCountry'];
		// if (!preg_match("/^[a-zA-Z ]*$/",$partCountry)) 
		// {
 		// 	echo "<script>alert(' Name must be Only letters and white space allowed');
		//  		</script>";
		// }
		$partPrice=$_REQUEST['partPrice'];
		// if(!preg_match('#^[0-9]+$#', $partPrice))
		// {
		// 	echo"<script>alert('you have to enter Numeric Value in Part Price');
		//  		</script>";
		// }
		$partQuantity=$_REQUEST['partQuantity'];
		$image=$_REQUEST['image'];
		$user_ID=$_SESSION['ID'];
		// if(!preg_match('#^[0-9]+$#', $partQuantity))
		// {
		// 	echo"<script>alert('you have to enter Numeric Value in Part Quantity');
		//  		</script>";
		// }
		// else
		$this->model->addSparePart($PartNumber,$PartName,$partCountry,$partPrice,$partQuantity,$image,$CarID,$user_ID);
	}

	public function editSparePart($PartNumber)
	 {
	/*$PartNumber=$_REQUEST['PartNumber'];
		if(!preg_match('#^[0-9]+$#', $PartNumber))
		{
			echo"<script>alert('you have to enter Numeric Value in Part Number');
		 		</script>";
		}*/
		$PartName=$_REQUEST['PartName'];
		/*if (!preg_match("/^[a-zA-Z ]*$/",$PartName)) 
		{
 			echo "<script>alert('Full Name must be Only letters and white space allowed');
		 		</script>";
		}*/
	
		$partCountry=$_REQUEST['partCountry'];
		/*if (!preg_match("/^[a-zA-Z ]*$/",$partCountry)) 
		{
 			echo "<script>alert(' Name must be Only letters and white space allowed');
		 		</script>";
		}*/

		$partPrice=$_REQUEST['partPrice'];
		/*if(!preg_match('#^[0-9]+$#', $partPrice))
		{
			echo"<script>alert('you have to enter Numeric Value in Part Price');
		 		</script>";
		}*/
		//$partQuantity=$_REQUEST['partQuantity'];
		//$image=$_REQUEST['image'];
		//$CarID=$_REQUEST['CarID'];
		/*if(!preg_match('#^[0-9]+$#', $partQuantity))
		{
			echo"<script>alert('you have to enter Numeric Value in Part Quantity');
		 		</script>";
		}*/
	    //else
		$this->model->Model_editSparePart($PartNumber,$PartName,$partCountry,$partPrice);
	}

	public function delete($PartNumber)
	{
		$this->model->getSparePart($PartNumber)->deleteSparePart($PartNumber);
	}
	public function import($PartNumber, $partQuantity)
	{
		$this->model->getSparePart($PartNumber)->Model_IncQty($PartNumber, $partQuantity);
	}
	public function export($PartNumber, $partQuantity)
	{
		$this->model->getSparePart($PartNumber)->Model_decreseQty($PartNumber, $partQuantity);
	}

	

}
?>