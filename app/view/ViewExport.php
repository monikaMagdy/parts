<?php

require_once(__ROOT__ . "view/View.php");

class ViewExport extends View
{	
	public function output()
	{
		$str = "";
    $str.='<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Auto spare parts</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/agency.min.css" rel="stylesheet">

</head>

<body id="page-top">

      <section class="bg-light page-section" id="team">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Check out</h2>
          <h3 class="section-subheading text-muted">Our Order </h3>
        </div>
        </section>';
		$str.="
     <style>
    
   * { margin: 0; padding: 0; }
   body { font: 14px/1.4 Georgia, serif; }
   #page-wrap { width: 800px; margin: 0 auto; }
   
   textarea { border: 0; font: 14px Georgia, Serif; overflow: hidden; resize: none; }
   table { border-collapse: collapse; }
   table td, table th { border: 1px solid black; padding: 5px; }
   
   #header { height: 15px; width: 100%; margin: 20px 0; background: #222; text-align: center; color: white; font: bold 15px Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 20px; padding: 8px 0px; }
   
   #address { width: 250px; height: 150px; float: left; }
   #customer { overflow: hidden; }
   
   #logo { text-align: right; float: right; position: relative; margin-top: 25px; border: 1px solid #fff; max-width: 540px; max-height: 100px; overflow: hidden; }
   #logo:hover, #logo.edit { border: 1px solid #000; margin-top: 0px; max-height: 125px; }
   #logoctr { display: none; }
   #logo:hover #logoctr, #logo.edit #logoctr { display: block; text-align: right; line-height: 25px; background: #eee; padding: 0 5px; }
   #logohelp { text-align: left; display: none; font-style: italic; padding: 10px 5px;}
   #logohelp input { margin-bottom: 5px; }
   .edit #logohelp { display: block; }
   .edit #save-logo, .edit #cancel-logo { display: inline; }
   .edit #image, #save-logo, #cancel-logo, .edit #change-logo, .edit #delete-logo { display: none; }
   #customer-title { font-size: 20px; font-weight: bold; float: left; }
   
   #meta { margin-top: 1px; width: 300px; float: right; }
   #meta td { text-align: right;  }
   #meta td.meta-head { text-align: left; background: #df0a0a; }
   #meta td textarea { width: 100%; height: 20px; text-align: right; }
   
   #items { clear: both; width: 100%; margin: 30px 0 0 0; border: 1px solid black; }
   #items th { background: #ffc107; }
   #items textarea { width: 80px; height: 50px; }
   #items tr.item-row td { border: 0; vertical-align: top; }
   #items td.description { width: 300px; }
   #items td.item-name { width: 175px; }
   #items td.description textarea, #items td.item-name textarea { width: 100%; }
   #items td.total-line { border-right: 0; text-align: right; }
   #items td.total-value { border-left: 0; padding: 10px; }
   #items td.total-value textarea { height: 20px; background: none; }
   #items td.balance { background: #eee; }
   #items td.blank { border: 0; }
   
   #terms { text-align: center; margin: 20px 0 0 0; }
   #terms h5 { text-transform: uppercase; font: 13px Helvetica, Sans-Serif; letter-spacing: 10px; border-bottom: 1px solid black; padding: 0 0 8px 0; margin: 0 0 8px 0; }
   #terms textarea { width: 100%; text-align: center;}
   
   textarea:hover, textarea:focus, #items td.total-value textarea:hover, #items td.total-value textarea:focus, .delete:hover { background-color:#EEFF88; }
   
   .delete-wpr { position: relative; }
   .delete { display: block; color: #000; text-decoration: none; position: absolute; background: #EEEEEE; font-weight: bold; padding: 0px 3px; border: 1px solid; top: -6px; left: -22px; font-family: Verdana; font-size: 12px; }</style>
   <style>#hiderow,
    .delete {
      display: none;
    }</style>
		<form action='' method='post'>
     <table id='items'>
        <tr >
            <td>
              ExportID:  
            </td>
            <td>
             companyID:
            </td>
            <td>
              carID:
            </td>
            <td>
              PartNumber :
            </td>
            <td>
              PartName :
            </td>
            <td>
              quantity:
            </td>
            <td>
              ItemPrice:
            </td>
            <td>
              TotalPrice:
            </td>
            <td>
            	Remove
            </td>
            </tr>
            </table>
            <br>
            <br>";
$str.="
     
        <div class='clearfix'></div>
         <div class='col-lg-12 text-center'>
          <div id='success'></div>
            <button id='SubmitCheckout' class='btn btn-primary btn-xl text-uppercase' name='SubmitCheckout' type='submit'>Submit Checkout
				    </button>
          </div>
        </div>

		</form>
    <br>
        <br>
        <hr>
    <form method='post' action='exportIndex.php?action=history'>
     <section class='bg-light page-section' id='team'>
    <div class='container'>
      <div class='row'>
        <div class='col-lg-12 text-center'>
          <h2 class='section-heading text-uppercase'>History module</h2>
          <h3 class='section-subheading text-muted'>Display all Checkouts </h3>
        </div>
      </div>
      <div class='container'>
        <div class='row-2'>
          <div class='col-lg-3 mx-auto'>
       <div class='modal-body'>
        <button id= 'DisplayCheckouts' class='btn btn-primary btn-xl text-uppercase'' name= 'DisplayCheckouts' type='submit'> Display Checkouts
            </button>
 </form>";

		
		return $str;
	}

	public function ViewExportEdit($id)
	{
		$str = "";
		$str.="<table>";
		$str.="<tr><th>Name</th><th>Model</th><th>Year</th><th>Action</th></tr>";
		foreach($this->model->getExports() as $export){
			if($Car->getExportID()===$id) 	{
				$str.="<tr>";
				$str.="<form 
				action='exportIndex.php?action=editAction&id=".$export->getExportID()."' method='post'>";
				$str.="<td><input type='text' name='CarName' value='".$Car->getCarName() ."'>  </td> ";
				$str.="<td><input type='text' name='CarModel' value='".$Car->getCarModel() ."'></td> ";
				$str.="<td><input type='text' name='CarYear' value='".$Car->getCarYear() ."'>
				</td> ";
				$str.="<td><input type='submit' value='Change'/></td>";
				$str.="</form>";
				$str.="</tr>";
			}
		}
	
		$str.="<a href='exportIndex.php'>Back to Movies </a>";
		return $str;
  }
  public function ViewHistory(){
   $str=' <!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Auto spare parts</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/agency.min.css" rel="stylesheet">

</head>

<body id="page-top">

      <section class="bg-light page-section" id="team">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">History module</h2>
          <h3 class="section-subheading text-muted">Display all Checkouts </h3>
        </div>
      </div>
      
       <table id="items">
        <tr >
            <td>
              ExportID:  
            </td>
            <td>
             companyID:
            </td>
            <td>
              carID:
            </td>
            <td>
              PartNumber :
            </td>
            <td>
              PartName :
            </td>
            <td>
              quantity:
            </td>
            <td>
              ItemPrice:
            </td>
            <td>
              TotalPrice:
            </td>
            <td>
              Date
            </td>
            </tr>';
      foreach($this->model->getExports() as $export)
    {
      $str.="<tr>";
       $str.="<td ><label name='companyID'>".$export->getExportID() ."</label>  </td> ";
      $str.="<td ><label name='companyID'>".$export->getCompanyID() ."</label>  </td> ";
      $str.="<td ><label name='CarID'>".$export->getCarID() ."</label></td> ";
      $str.="<td ><label name='PartNumber'>".$export->getPartNumber()."</label></td> ";
      $str.="<td ><label name='PartName'>".$export->getPartName()."</label></td> ";
      $str.="<td ><label name='Quantity'>".$export->getQuantity()."</label></td> ";
      $str.="<td ><label name='itemPrice'>".$export->getitemPrice()."</label></td> ";
      $str.="<td ><label name='TotalCost'>".$export->getTotalCost()."</label></td> ";
     /* $str.="<td>
      <a href='exportIndex.php?action=delete&id=".$export->getExportID()."'>Delete</a>
      </td>
      ";*/
    }
      $str.='
      </table>
     
     
            </div>
          </div>
        </div>
      </div>
      

      ';
      $str.="<form method='post' action='exportIndex.php'>
      <div class='container'>
        <div class='row-2'>
          <div class='col-lg-3 mx-auto'>
       <div class='modal-body'>
        <button id= 'back' class='btn btn-primary btn-xl text-uppercase'' name= 'back' type='submit'> back            </button>
 </form>";

      return $str;
  }

}
/* <script>

       var click = document.getElementById("DisplayCheckouts");
      click.addEventListener("click", myfunction);
       .hidden {
  display: none;
}

.placeholder {
  font-size: 12px;
}
       function myfunction(){    
     var tablewrap=document.getElementById("row-2");
      tablewrap.classList.toggle("hidden")   
      };
      </script>*/
?>
