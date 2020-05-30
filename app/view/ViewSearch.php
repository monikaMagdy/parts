<?php


include"View.php";

class ViewSparePart extends View
{ 
  public function output()
    {
    $str='
<!DOCTYPE html>
<html lang="en">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
type="text/javascript"></script>
<script>
  function getResult(){
  jQuery.ajax(
  {
    url:"SparePart.php",
    data:"search="+$("#search").val(),
    type:"POST",
    success:function(data2)
    {
      $("#result").html(data2);
    }
  });
}
</script>
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
<section class="page-section" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Search</h2>
          <h3 class="section-subheading text-muted"> </h3>
        </div>
        <input name="search" type="text" id="search" onKeyup="getPart()" placeholder="Search Term..."/>
        <div id="result"></div>
      </div>
    </div>
    </section>
   
    <table border=1 width=100%>
        <tr>
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
            </tr>
  </body>
  </html>';
  return $str;
}}
?>
