<?php
require_once(__ROOT__ . "view/View.php");

class CompanyView extends View
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
<br>
<br>
<br>
<br>

<section class="page-section" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase"> Companys</h2>
          <h3 class="section-subheading text-muted"> </h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">';
    $str.="<table class='section-heading text-uppercase' id='items border=1 width=100%'>";
    $str.="<tr><th>Company Name</th>
          <th>Email</th>
          <th>Phone Number</th>
          <th>Register Supplier Number  </th>
          <th>Commercial Record</th>
          </tr>";
    foreach($this->model->getCompanys() as $Company)
    {
      $str.="<tr>";
         $str.="<td>".$Company->getCompanyName()." </td> ";
        $str.="<td>".$Company->getemail()."</td> ";
        $str.="<td>". $Company->getphoneNumber() ."</td> ";
         $str.="<td>". $Company->getRegisterSupplierNumber() ."</td> ";
           $str.="<td>". $Company->getCommercialRecord() ."</td> ";
           if($_SESSION["Role"]==='Manager' )
           {
        $str.="<td>
         <div class='portfolio-caption'>
           <div class='btn-group btn-group-lg'>
           <button type='submit' class='btn btn-warning' name='Edit' id='Edit' onclick=\"location.href='Addcompany.php?action=edit&id=".$Company->getLocalCompanyID()."'\">Edit</button>

        <button type='submit' class='btn btn-warning' name='Delete' id='Delete' onclick=\"location.href='Addcompany.php?action=delete&id=".$Company->getLocalCompanyID()."'\">Delete </button>
        </td>
        </div>
        </div>";
           
        //$str.="</form>";
        $str.="</tr>";
           }
    }
    if($_SESSION["Role"]==='Manager' )
    {
      $str.="</table>
      <br>
      <br>
   <div class='portfolio-caption'>
           <div class='col-lg-12 text-center'>
           <div class='btn-group btn-group-lg'>
      <button type='submit' class='btn btn-warning' class='btn btn-primary btn-xl text-uppercase'  onclick=\"location.href='Addcompany.php?action=insert'\">Add Company</button>
      </div>
      </div>
      </div>";
  
    }

    return $str;
  }

public function View_addCompany()
{
   
     $str='<!DOCTYPE html>
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
<section class="page-section" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase"> Companys</h2>
          <h3 class="section-subheading text-muted"> </h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
    <form action="Addcompany.php?action=insertAction" method="post">
     <div class="row">
        <div class="col-lg-12">
          <form id="contactForm" name="sentMessage" novalidate="novalidate">
            <div class="row">
              <div class="col-md-6">
    <input type="text" pattern="[A-Za-z]{2,}" title="min 2 characters and no special or numiric characters" class="form-control" name="CompanyName" required="required" placeholder="Enter Company Name"/><br>
    </div>
    </div>
          <div class="row">
              <div class="col-md-6">
    <input type="text" pattern="[a-zA-Z0-9!#$%&*+\/=?^_`{|}~.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*" title="valid mail is required" class="form-control" validate="required:true" name="email" placeholder="Enter email"/>
    <br>
    </div>
    </div>
    <div class="row">
    <div class="col-md-6">
    <input type="text" pattern="[0-9]{11}" title="numiric characters and 11 number" class="form-control" name="phoneNumber" required="required" placeholder="Enter phone number"/>
    <br>
    </div>
    </div>
    <div class="row">
    <div class="col-md-6">
    <input type="text" class="form-control" name="RegisterSupplierNumber" required="required" placeholder="Enter RegisterSupplierNumber"/>
    <br>
    </div>
    </div>
    <div class="row">
    <div class="col-md-6">
    <input type="text" class="form-control" name="CommercialRecord" required="required" placeholder="Enter CommercialRecordme"/>
    <br>
    </div>
    </div>
  <div class="portfolio-caption">
           <div class="col-lg-12 text-center">
           <div class="btn-group btn-group-lg">
      <button type="submit" class="btn btn-warning" class="btn btn-primary btn-xl text-uppercase">Insert</button>
      </div>
      </div>
      </div>
    </form>
    </div>
    </div>
    </form>

<br>
<br>
       <div class="portfolio-caption">
           <div class="col-lg-12 text-center">
           <div class="btn-group btn-group-lg">
      <button type="submit" class="btn btn-warning" class="btn btn-primary btn-xl text-uppercase"  onclick=\'location.href="Addcompany.php"\'>Back</button>
      </div>
      </div>
      </div>';
                return $str;
    
}

  public function View_editCompany($id)
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
<br>
<br>
<section class="page-section" id="contact">
   <div class="container">
     <div class="row">
       <div class="col-lg-12 text-center">
         <h2 class="section-heading text-uppercase"> Companys</h2>
         <h3 class="section-subheading text-muted"> </h3>
       </div>
     </div>
     <div class="row">
       <div class="col-lg-12">';
   $str.="<table class='section-heading text-uppercase' id='items' id='items'border=1 width=100%>";
    $str.="<tr><th>Company Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Register Supplier Number</th>
            <th>Commercial Record</th>
            </tr>";
    foreach($this->model->getCompanys() as $Company)
    {
      if($Company->getLocalCompanyID()===$id)  
      {
        $str.="<tr>";
        $str.="<form action='Addcompany.php?action=editAction&id=".$Company->getLocalCompanyID()."' method='post'>";
         $str.="<td><input type='text' name='CompanyName'  required='required' value='".$Company->getCompanyName()."'>  </td> ";
        $str.="<td><input type='text' name='email' value='".$Company->getemail()."'></td> ";
        $str.="<td><input type='text' name='phoneNumber' value='". $Company->getphoneNumber() ."'></td> ";
         $str.="<td><input type='text' name='RegisterSupplierNumber' value='". $Company->getRegisterSupplierNumber() ."'></td> ";
           $str.="<td><input type='text' name='CommercialRecord' value='". $Company->getCommercialRecord() ."'></td> ";
           $str.=" <div class='portfolio-caption'>
           <div class='btn-group btn-group-lg'>
           <td><input type='submit' value='Change'/></td>
           </div>
           </div>";
        $str.="</form>";
        $str.="</tr>
       ";
      }
      else 
       {
        $str.="<tr>";
        $str.="<td>"
             .$Company->getCompanyName().
             "</td> ";
        $str.="<td>"
              .$Company->getemail().
              "</td> ";
        $str.="<td>"
              . $Company->getphoneNumber() .
              "</td> ";
        $str.="<td>"
              . $Company->getRegisterSupplierNumber() .
              "</td> ";
        $str.="<td>"
              . $Company->getCommercialRecord() .
              "</td> ";
        $str.="
        <td>
              <input type='submit' value='Change'/>
              </td>
              </div>
        </div>";
        $str.="<td>
              <a href='Addcompany.php?action=edit&id=".$Company->getLocalCompanyID()."'>Edit</a>
              </td>
              </div>
        </div>";
        $str.="</tr>";
      }
    }
    $str.="</table>";
    $str.="<a href='Addcompany.php'>Back to Companys </a>
    </div>
    </div>";
    return $str;
  }
} 
?>