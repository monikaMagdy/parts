<?php
  require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ ."db/database.php");
?>

<?php
class Export extends Model 
{
  private $ExportID;
  private $companyID;
  private $PartNumber;
  private $PartName;    
  private $partQuantity;
  private $itemPrice;
  private $TotalPrice;

 function __construct($ExportID,$companyID,$PartNumber,$PartName,$partQuantity,$itemPrice,$TotalPrice)
  {
    $this->ExportID = $ExportID;
    $d1= Database::GetInstance();
    $d1->GetConnection();

    if(""===$ExportID)
    {
      $this->readExport($ExportID);
    }
    else
    {
      $this->companyID=$companyID;
      $this->PartNumber=$PartNumber;
      $this->PartName=$PartName;
      $this->partQuantity=$partQuantity;
      $this->itemPrice = $itemPrice;
      $this->TotalPrice = $TotalPrice;
    }
  }

  function getCompanyID()
  {
    return $this->companyID;
  }
  function setCompanyID($companyID)
  {
    return $this->companyID = $companyID;
  }
  /*function getCompanyName()
  {
    return $this->CompanyName;
  }
  function setcompnayName($compnayName)
  {
    return $this->compnayName = $compnayName;
  }
  function getCarID()
  {
    return $this->CarID;
  }
  function setCarID($CarID)
  {
     return $this->CarID =$CarID;
  }*/
  function getPartNumber()
  {
    return $this->PartNumber;
  }
  function setPartNumber($PartNumber)
  {
    return $this->PartNumber=$PartNumber; 
  }
  function getPartName()
  {
    return  $this->PartName;
  }
  function setPartName($PartName)
  {
    return  $this->PartName=$PartName;
  }
  function getpartQuantity()
  {
     $this->partQuantity;
  }
  
  function getitemPrice() 
  {
    return $this->itemPrice;
  }
  function setitemPrice($itemPrice)
  {
    return $this->itemPrice = $itemPrice;
  }
  
  function getTotalPrice()
  {
    return $this->TotalPrice;
  }
  
  function setTotalPrice($TotalPrice) 
  {
    return $this->TotalPrice = $TotalPrice;
  }

  function getExportID()
  {
    return $this->ExportID;
  }

  function readExport($ExportID)
  {
    $Export=" SELECT * FROM export where ExportID=".$ExportID;
    $db = $this->connect();
    $d1= Database::GetInstance();
    $result = mysqli_query($d1->GetConnection(), $Export);

    if ($result->num_rows == 0)
    {
        $row=mysqli_fetch_array($result);
        $this->companyID=$row["localCompanyID"];
        $this->PartNumber=$row["PartNumber"];
        $this->PartName=$row["PartName"];
        $this->partQuantity=$row["partQuantity"];
        $this->itemPrice = $row["ItemPrice"];
        $this->TotalPrice = $row["TotalPrice"];
    }
    else 
    {
      $this->companyID="";
      $this->PartNumber="";
      $this->PartName="";
      $this->partQuantity="";
      $this->itemPrice="";
      $this->TotalCost="";
    }
  }

  function Model_editExport($companyID,$PartNumber,$PartName,$partQuantity,$itemPrice,$TotalCost)
  {
    $editExport="UPDATE `export` SET 
    `localCompanyID`='$companyID',
    `PartNumber`='$PartNumber',
    `PartName`='$PartName',
    `Quantity`='$Quantity',
    `ItemPrice`='$itemPrice',
    `TotalCost`='$TotalCost'
     WHERE ExportID=$this->ExportID; ";
    $d1= Database::GetInstance();
    $result = mysqli_query($d1->GetConnection(), $editExport);
    if($editExport)
    {
      echo"updated successfully.";
      $this->readExport($this->ExportID);
    }
    else
    {
            echo "ERROR: Could not able to execute $editExport. " ;
    }
  }

  function Model_deleteExport($ExportID)
  {       
    $deleteExport="DELETE FROM export WHERE  ExportID=$this->ExportID ;";
    $d1= Database::GetInstance();
    $result = mysqli_query($d1->GetConnection(), $deleteExport);
    if($deleteExport){
       echo "<script>alert('deletet successfully.');
       window.history.back();</script>";
    }
    else
    {
            echo "ERROR: Could not able to execute $deleteExport. " ;
    }
  }

  //fadel edit employee henas
}
?>