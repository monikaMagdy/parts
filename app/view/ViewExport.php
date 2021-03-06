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
              <h2 class="section-heading text-uppercase">History module</h2>
              <h3 class="section-subheading text-muted">Display all Checkouts </h3>
            </div>
          </div>
          
           <table id="items" border=1 width=100%  >
            <tr>
            <td>
              export Id 
              </td>
             <td>
                companyID:
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
                part price :
              </td>
              <td>
                TotalPrice:
              </td>
              <td>
              time Stamp
              </td>
            </tr>';
          foreach($this->model->getExports() as $export)
        {
          
          $str.="<td >".$export->getExportID() ."</td> ";
          $str.="<td >".$export->getCompanyID() ."</td> ";
          $str.="<td >".$export->getPartNumber()."</td> ";
          $str.="<td >".$export->getPartName()."</td> ";
          $str.="<td >".$export->getitemPrice()."</td> ";
          $str.="<td >".$export->getTotalPrice()."</td> ";
          $str.="<td >
           <div class='portfolio-caption'>
          <div class='btn-group btn-group-lg'>
            <button type='submit' class='btn btn-primary btn-xl
             name='delete' id='delete' 
             onclick=\"location.href='exportIndex.php?action=delete&id=".$export->getExportID()."'\">
            Delete</button>
          </div>
        </div></td> ";
          $str.="<tr>";
         /* $str.="<td>
          <a href='exportIndex.php?action=delete&id=".$export->getExportID()."'>Delete</a>
          </td>
          ";*/
         
        }
         
        $str.='
        </table>
         </div>
        ';
    
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
