<?php
  require_once(__ROOT__ . "model/Model.php");
?>

<?php
class Export extends Model 
{
  private $ExportID;
  private $companyID;
  private $CarID;
  private $PartNumber;
  private $PartName;    
  private $Quantity;
  private $itemPrice;
  private $TotalCost;

 function __construct($ExportID,$companyID="",$CarID="",$PartNumber="",$PartName="",$Quantity="",$itemPrice="",$TotalCost="")
  {
    $this->ExportID = $ExportID;
      $this->db = $this->connect();

    if(""===$ExportID)
    {
      $this->readExport($ExportID);
    }
    else
    {
      $this->companyID=$companyID;
      $this->CarID = $CarID;
      $this->PartNumber=$PartNumber;
      $this->PartName=$PartName;
      $this->Quantity=$Quantity;
      $this->itemPrice = $itemPrice;
      $this->TotalCost = $TotalCost;
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
  function getCarID()
  {
    return $this->CarID;
  }
  function setCarID($CarID)
  {
     return $this->CarID =$CarID;
  }
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
  function getQuantity()
  {
     $this->Quantity;
  }
  function setQuantity($Quantity)
  {
     $this->Quantity=$Quantity;
  }
  function getitemPrice() 
  {
    return $this->itemPrice;
  }
  function setitemPrice($itemPrice)
  {
    return $this->itemPrice = $itemPrice;
  }
  
  function getTotalCost()
  {
    return $this->TotalCost;
  }
  
  function setPhone($TotalCost) 
  {
    return $this->TotalCost = $TotalCost;
  }

  function getExportID()
  {
    return $this->ExportID;
  }

  function readExport($ExportID)
  {
    $Export=" SELECT * FROM export where ExportID=".$ExportID;
    $db = $this->connect();

    $result = $db->query($Export);

    if ($result->num_rows == 1)
    {
        $row = $db->fetchRow();
        $this->companyID=$row["localCompanyID"];
        $this->CarID = $row["CarID"];
        $this->PartNumber=$row["PartNumber"];
        $this->PartName=$row["PartName"];
        $this->Quantity=$row["Quantity"];
        $this->itemPrice = $row["itemPrice"];
        $this->TotalCost = $row["TotalCost"];
    }
    else 
    {
      $this->companyID="";
      $this->CarID="";
      $this->PartNumber="";
      $this->PartName="";
      $this->Quantity="";
      $this->itemPrice="";
      $this->TotalCost="";
    }
  }

  function Model_editExport($companyID,$CarID,$PartNumber,$PartName,$Quantity,$itemPrice,$TotalCost)
  {
    $editExport="UPDATE `export` SET `localCompanyID`='$companyID',`CarID`='$CarID',`PartNumber`='$PartNumber',`PartName`='$PartName',`Quantity`='$Quantity',`itemPrice`='$itemPrice',`TotalCost`='$TotalCost' WHERE ExportID=$this->ExportID; ";
    if($this->db->query($editExport)===true)
    {
      echo"updated successfully.";
      $this->readExport($this->ExportID);
    }
    else
    {
            echo "ERROR: Could not able to execute $editExport. " . $conn->error;
      }
  }

  function Model_deleteExport()
  {       
    $deleteExport="DELETE FROM export WHERE  ExportID=$this->ExportID ;";
    if($this->db->query($deleteExport)===true)
    {
       echo "deletet successfully.";
    }
    else
    {
            echo "ERROR: Could not able to execute $deleteExport. " . $conn->error;
        }
  }

  //fadel edit employee henas
}
?>