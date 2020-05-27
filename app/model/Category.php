
<?php
require_once(__ROOT__ . "model/Model.php");

class Category extends Model 
{
	private $categoryID;
	private $categoryName;
	private $categoryCode;

	function getCategoryID() 
	{
		return $this->categoryID;
	}	
	function getCategoryName() 
	{
		return $this->categoryName;
	}
	function setCategoryName($categoryName)
	{
		return $this->categoryName = $categoryName;
	}
	function getCategoryCode()
	{
		return $this->categoryCode;
	}
	function setCategoryCode($categoryCode)
	{
		return $this->categoryCode=$categoryCode;
	}
}
?>